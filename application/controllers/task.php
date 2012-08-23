<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admin
 *
 * @author HacRi
 * @todo Clean_data
 * 
 * 
 */
class Task extends CI_Controller {

    function test() {
        $this->load->model('config_m');
        echo $this->config_m->get_config('on_task');
    }

    function index() {
        //$this->output->enable_profiler(TRUE);
        $do = $this->input->get('do', TRUE);
        if ($do == 1) {
            $this->load->driver('cache', array('adapter' => 'file'));
            $this->load->model('config_m');

            // 检查全局锁
            if ($this->cache->get('task_lock')) {
                echo "Locked\n";
                exit;
            }

            // 上全局锁
            if($this->cache->save('task_lock', 1, 180)){
                echo "Lock\n";
            }else{
                echo "Lock failed\n";
                exit;
            }

            $this->benchmark->mark('start');

            // bit主页新闻更新
            $tmp = $this->config_m->get_config('bit_news_time');
            $bit_news_time = json_decode($tmp, true);
            $tmp_date = $bit_news_time['time'];
            //echo $tmp_date;
            if ((time() - $tmp_date) > $this->config->item('bit_ttl')) {
                echo "do-bit\n";
                if ($this->get_news_from_bit(1)) {
                    $bit_news_time['time'] = time();
                    $tmp = json_encode($bit_news_time);
                    $this->config_m->set_config('bit_news_time', $tmp);
                }
            }

            $this->benchmark->mark('bit_end');
            echo $this->benchmark->elapsed_time('start', 'bit_end') . "s: bit_end\n";

            // jwc新闻更新
            $tmp = $this->config_m->get_config('jwc_news_time');
            $jwc_news_time = json_decode($tmp, true);
            $tmp_date = $jwc_news_time['time'];
            //echo $tmp_date;
            if ((time() - $tmp_date) > $this->config->item('jwc_ttl')) {
                echo "do-jwc\n";
                if ($this->get_news_from_jwc(1)) {
                    $jwc_news_time['time'] = time();
                    $tmp = json_encode($jwc_news_time);
                    $this->config_m->set_config('jwc_news_time', $tmp);
                }
            }

            $this->benchmark->mark('jwc_end');
            echo $this->benchmark->elapsed_time('start', 'jwc_end') . "s: jwc_end\n";

            // 统计热度
            $tmp = $this->config_m->get_config('count_heat_time');
            $count_heat_time = json_decode($tmp, true);
            $tmp_date = $count_heat_time['time'];
            //echo $tmp_date;
            if ((time() - $tmp_date) > ($this->config->item('count_heat_ttl') * 60)) {
                echo "do-heat\n";
                if ($this->count_heat(1)) {
                    $count_heat_time['time'] = time();
                    $tmp = json_encode($count_heat_time);
                    $this->config_m->set_config('count_heat_time', $tmp);
                }
            }

            $this->benchmark->mark('heat_end');
            echo $this->benchmark->elapsed_time('start', 'heat_end') . "s: heat_end\n";

            // 生成常用链接
            $tmp = $this->config_m->get_config('common_url_time');
            $common_url_time = json_decode($tmp, true);
            $tmp_date = $common_url_time['time'];
            //echo $tmp_date;
            if ((time() - $tmp_date) > ($this->config->item('common_url_ttl') * 60)) {
                echo "do-common\n";
                if ($this->generate_common(1)) {
                    $common_url_time['time'] = time();
                    $tmp = json_encode($common_url_time);
                    $this->config_m->set_config('common_url_time', $tmp);
                }
            }

            $this->benchmark->mark('common_end');
            echo $this->benchmark->elapsed_time('start', 'common_end') . "s: common_end\n";

            // 清理奇怪的垃圾
            $tmp = $this->config_m->get_config('clean_data_time');
            $clean_data_time = json_decode($tmp, true);
            $tmp_date = $clean_data_time['time'];
            //echo $tmp_date;
            if ((time() - $tmp_date) > ($this->config->item('clean_data_ttl') * 60)) {
                echo "do-clean\n";
                if ($this->clean_data(1)) {
                    $clean_data_time['time'] = time();
                    $tmp = json_encode($clean_data_time);
                    $this->config_m->set_config('clean_data_time', $tmp);
                }
            }

            $this->benchmark->mark('clean_end');
            echo $this->benchmark->elapsed_time('start', 'clean_end') . "s: clean_end\n";

            // 取消全局锁
            //echo "Unlock\n";
            //$this->config_m->set_config('on_task', 0);
        }else if($do == 2){
            $this->load->driver('cache', array('adapter' => 'file'));
            if($this->cache->delete('task_lock')){
                echo 'Force Unlock is successed\n';
            }else{
                echo 'Unknow Error\n';
            }
        }
    }

    function count_heat($check = 0) {
        if (!$check)
            show_404();

        $this->load->model('url_m');
        $this->load->model('statistics_m');

        $urls = $this->url_m->get_all();
        foreach ($urls as $row) {
            $num = $this->statistics_m->count_by_url($row->url, 2, $row->heattimestamp);
            $time = $row->heattimestamp;
            if ($time == 0) {
                $time = 0;
            } else {
                $time = time() - strtotime($time);
                $time /= 86400;
            }
            $heat = $row->heat * exp(-0.0231 * $time) + $num;
            //echo "<p>$row->url --- $time --- $num --- $heat</p>";

            $this->url_m->update_heat($row->id, $heat);
        }

        return TRUE;
    }

    function heatpreview() {
        $baseurl = base_url();

        $csses = array(
            'reset',
            'header',
            'main',
            'footer');

        $jses = array(
            'jquery-1.7.2.min',
            's3Slider'
        );
        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;
        $this->load->view('all_header', $head_data);

        $this->load->model('url_m');
        $this->load->model('statistics_m');

        $contont = '';

        $urls = $this->url_m->get_all();
        $contont .= "<p>url --- time(day) --- click --- newHeat</p>";
        foreach ($urls as $row) {
            $num = $this->statistics_m->count_by_url($row->url, 2, $row->heattimestamp);
            $time = $row->heattimestamp;
            if ($time == 0) {
                $time = 0;
            } else {
                $time = time() - strtotime($time);
                $time /= 86400;
            }
            $heat = $row->heat * exp(-0.0231 * $time) + $num;
            $contont .= "<p>$row->url --- $time --- $num --- $heat</p>";
        }

        $this->load->view('blank', array('content' => $contont));

        $this->load->view('all_footer');
    }

    function generate_common($check = 0) {
        if (!$check)
            show_404();

        $this->load->model('url_m');
        $this->load->model('common_m');
        $topurl = $this->url_m->get_by_heat(8);

        $this->common_m->clean(4);

        foreach ($topurl as $row) {
            $tmp = array();
            $tmp['url'] = $row->url;
            $tmp['name'] = $row->name;
            $tmp['rank'] = ceil(200 - log1p($row->heat) * 10);

            $this->common_m->insert_url($tmp);
        }

        return TRUE;
    }

    function get_news_from_bit($check = 0) {
        if (!$check)
            show_404();

        $this->load->helper('htmldom');
        try {
            $addtime = date('Y:m:d H:i:d');
            $this->load->model('news_m');
            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'timeout' => 5,
                )
            );
            $context = stream_context_create($opts);
            $html = file_get_html("http://www.bit.edu.cn", false, $context);
            if (!$html)
                return false;
            $i1 = 0; // 校园新闻计数
            $i2 = 0; // 学校公告计数
            //$this->news_m->empty_news();
            foreach ($html->find('a[class=huizi]') as $element) {
                switch (substr($element->href, 0, 3)) {
                    case 'xww' :
                        if ($i1++ >= 5)
                            break;
                        $this->news_m->insert_news(trim($element->innertext), "http://www.bit.edu.cn/{$element->href}", $addtime, 2);
                        //echo '*';
                        break;
                    case 'ggf' :
                        if ($i2++ >= 5)
                            break;
                        $this->news_m->insert_news(trim($element->innertext), "http://www.bit.edu.cn/{$element->href}", $addtime, 3);
                        //echo '*';
                        break;
                }
                //echo "<br />";
                if ($i1 >= 5 && $i2 >= 5)
                    break;
            }
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function get_news_from_jwc($check = 0) {
        if (!$check)
            show_404();
        $this->load->helper('htmldom');
        try {
            return true;
            $addtime = date('Y:m:d H:i:d');
            $this->load->model('news_m');
            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'timeout' => 5,
                )
            );
            $context = stream_context_create($opts);
            $html = file_get_html("http://jwc.bit.edu.cn", false, $context);
            if (!$html)
                return false;
            //$this->news_m->empty_news();
            foreach ($html->find('a[class=huizi]') as $element) {
                
            }
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function clean_data($check = 0) {
        if (!$check)
            show_404();

        // 清理过期一个月以上的特别推荐
        // 清理六个月以前的统计数据
        // 清理无效申请

        return TRUE;
    }

    function get_news_test() {
        $this->load->helper('htmldom');
        try {
            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'timeout' => 1,
                )
            );
            $html = file_get_contents('http://www.bit.edu.cn', false, $opts);
            if (!$html)
                echo 'error';
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

}

?>
