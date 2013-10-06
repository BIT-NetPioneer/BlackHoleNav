<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admin
 *  _      _  _                 
 * | |    (_)| |                
 * | |__   _ | |_  _ __   _ __  
 * | '_ \ | || __|| '_ \ | '_ \ 
 * | |_) || || |_ | | | || |_) |
 * |_.__/ |_| \__||_| |_|| .__/ 
 *                       | |    
 *                       |_|    
 * @author HacRi <linleqi@gmail.com>
 * @todo Clean_data
 * 
 * 
 */
class Task extends CI_Controller {

    /**
     * 测试用
     * 
     * @todo 删掉
     */
    function test() {
        $this->load->model('config_m');
        echo $this->config_m->get_config('on_task');
    }

    /**
     * 事务的引导页面
     * 
     * 引导导航站的周期性事务的，通过浏览器端访问触发。
     * 分别分析各周期性任务的执行时间，然后运行各任务
     * 通过get方式提交do参数来控制
     *  do = 0
     *      不做任何事情
     *  do = 1
     *      执行周期性任务
     *  do = 2
     *      强制解除全局锁。附加all=1参数则解除所有锁
     *  do = 3
     *      检查所有周期锁信息
     *  do = 4
     *      强制上锁。时间用ttl参数提交
     * 
     * @todo
     */
    function index() {
        //$this->output->enable_profiler(TRUE);
        $do = $this->input->get('do', TRUE);
        if ($do == 0) // 没有参数
            exit;
        else if ($do == 1) { // 正常执行
            $this->load->driver('cache', array('adapter' => 'file'));
            $this->load->model('config_m');

            // 检查全局锁
            if ($this->cache->get('task_lock')) {
                echo "Locked\n";
                exit;
            }

            // 上全局锁
            if ($this->cache->save('task_lock', 1, 180)) {
                echo "Lock\n";
            } else {
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
        } else if ($do == 2) { // 强制解锁
            $this->load->driver('cache', array('adapter' => 'file'));
            if ($this->cache->get('task_lock')) {
                if ($this->cache->delete('task_lock')) {
                    echo "Force Unlock is successed\n";
                } else {
                    echo "Unknow Error\n";
                }
            } else {
                echo "Not Locked\n";
            }
            $all = $this->input->get('all', TRUE);
            if ($all == 1) {
                $this->load->model('config_m');
                $tmp['time'] = 0;
                $tmp_json = json_encode($tmp);
                $this->config_m->set_config('bit_news_time', $tmp_json);
                $this->config_m->set_config('jwc_news_time', $tmp_json);
                $this->config_m->set_config('count_heat_time', $tmp_json);
                $this->config_m->set_config('common_url_time', $tmp_json);
                $this->config_m->set_config('clean_data_time', $tmp_json);
                echo "Unlock All\n";
            }
        } else if ($do == 3) { // 查看锁信息
            $this->load->driver('cache', array('adapter' => 'file'));
            $tmp = $this->cache->cache_info();
            $cache_file = @file_get_contents($tmp["task_lock"]["server_path"]);
            if ($cache_file != null) {
                $ttl_data_o = null;
                preg_match('/"ttl";i:\w+/', $cache_file, $ttl_data_o);
                $ttl_data = str_replace('"ttl";i:', '', $ttl_data_o[0]);
                echo 'Time after lock: ' . (time() - ($tmp["task_lock"]["date"])) . "s\n";
                echo "ttl = $ttl_data\n";
                if (time() - ($tmp["task_lock"]["date"]) > $ttl_data) {
                    echo "Lock is disable\n";
                } else {
                    echo "Locked\n";
                }
            } else {
                echo "Missing Cache File\n";
            }
        } else if ($do == 4) { // 强制上锁
            $ttl = $this->input->get('ttl', TRUE);
            $this->load->driver('cache', array('adapter' => 'file'));
            $ttl = (int) $ttl;
            if ($ttl != 0) {
                if ($this->cache->save('task_lock', 1, $ttl)) {
                    echo "Locked; ttl = $ttl\n";
                } else {
                    echo "Lock failed\n";
                }
            }
        }
    }

    /**
     * 统计各连接的热度
     * 
     * @param integer $check 保证不会由浏览器访问直接触发
     * @return boolean 是否执行成功
     */
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

    /**
     * @todo 重写，移植到后台
     */
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

    /**
     * 根据链接热度信息生成常用链接
     * 
     * @param integer $check 保证不会由浏览器访问直接触发
     * @return boolean 是否执行成功
     */
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

    /**
     * 抓取www.bit.edu.cn域上的新闻
     * 
     * 抓取校园新闻和学校公告
     * 
     * @param integer $check 保证不会由浏览器访问直接触发
     * @return boolean 是否执行成功
     * @todo 错误记录
     */
    function get_news_from_bit($check = 0) {
        //if (!$check)
        //  show_404();

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

            $i1 = 0; // 校园新闻计数
            $i2 = 0; // 学校公告计数

            $html = file_get_html("http://www.bit.edu.cn/xww/", false, $context);
            if (!$html)
                return false;
            foreach ($html->find('a[class=biaozhun]') as $element) {
                if ($i1 < 5) {
                    //echo trim($element->innertext) . '---' . "http://www.bit.edu.cn/xww/" . $element->href . '</br>';
                    $url_s = trim($element->href);
                    if (substr($url_s, 0, 5) != "http:") {
                        $url_s = "http://www.bit.edu.cn/ggfw/tzgg17/" . $url_s;
                    }
                    $this->news_m->insert_news(trim($element->innertext), $url_s, $addtime, 2);
                    $i1++;
                }
                else
                    break;
            }

            $html = file_get_html("http://www.bit.edu.cn/ggfw/tzgg17/index.htm", false, $context);
            if (!$html)
                return false;
            //foreach ($html->find('a[class=huizi]') as $element) {
            foreach ($html->find('div[class=list01_lf] a') as $element) {
                if ($i2 < 5) {
                    $url_s = trim($element->href);
                    if (substr($url_s, 0, 5) != "http:") {
                        $url_s = "http://www.bit.edu.cn/ggfw/tzgg17/" . $url_s;
                    }
                    //echo trim($element->title) . '---' . $url_s . '</br>';
                    $this->news_m->insert_news(trim($element->title), $url_s, $addtime, 3);
                    $i2++;
                }
                else
                    break;
            }

            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    /**
     * 抓取jwc上的新闻
     * 
     * @param integer $check 保证不会由浏览器访问直接触发
     * @return boolean 是否执行成功
     * @todo 错误记录
     */
    function get_news_from_jwc($check = 0) {
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
            error_reporting(E_ERROR);
            $context = stream_context_create($opts);
            $html = file_get_html("http://jwc.bit.edu.cn/index.php", false, $context, -1, -1, true, true, 'GBK');
            if (!$html)
                return FALSE;
            $i = 0;
            foreach ($html->find('#AutoNumber5 a[class=middle]') as $element) {
                if (substr($element->href, 6, 4) == 'view') {
                    $news_title = mb_convert_encoding(strip_tags($element->innertext), 'UTF-8', 'GBK, UTF-8');

                    $url_s = trim($element->href);
                    if (substr($url_s, 0, 5) != "http:") {
                        $url_s = "http://jwc.bit.edu.cn/" . $url_s;
                    }

                    //$news_url = 'http://jwc.bit.edu.cn' . $element->href;
                    //echo $news_title . '---' . $news_url . "<br/>";
                    $this->news_m->insert_news(trim($news_title), $url_s, $addtime, 1);
                    $i++;
                }
                if ($i == 5)
                    break;
            }
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    /*
     * 待删除
     */

    function get_news_from_jwc_test() {

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
            $html = file_get_html("http://jwc.bit.edu.cn", false, $context, -1, -1, true, true, 'GBK');
            if (!$html)
                return FALSE;
            $i = 0;
            foreach ($html->find('#AutoNumber5 a[class=middle]') as $element) {
                if (substr($element->href, 6, 4) == 'view') {
                    $news_title = strip_tags(mb_convert_encoding($element->innertext, 'UTF-8', 'GBK, UTF-8'));
                    $news_url = 'http://jwc.bit.edu.cn' . $element->href;
                    echo $element->innertext . '---' . $news_title . '---' . $news_url . '---' . mb_convert_encoding($element->innertext, 'UTF-8', 'GBK, UTF-8') . "<br/>";
                    //$this->news_m->insert_news(trim($news_title), $news_url, $addtime, 1);
                    $i++;
                }
                if ($i == 10)
                    break;
            }
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    /**
     * 清理网站多余的数据
     * 
     * @param integer $check 保证不会由浏览器访问直接触发
     * @return boolean 是否执行成功
     * @todo 还什么都没写
     */
    function clean_data($check = 0) {
        if (!$check)
            show_404();

        // 清理过期一个月以上的特别推荐
        // 清理六个月以前的统计数据
        // 清理无效申请

        return TRUE;
    }

    /**
     * 测试用
     * 
     * @todo 删掉
     * @return boolean
     */
    function get_news_test() {
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

            $i1 = 0; // 校园新闻计数
            $i2 = 0; // 学校公告计数

            $html = file_get_html("http://www.bit.edu.cn/xww/", false, $context);
            if (!$html)
                return false;
            foreach ($html->find('a[class=biaozhun]') as $element) {
                if ($i1 < 5) {
                    echo trim($element->innertext) . '---' . "http://www.bit.edu.cn/xww/" . $element->href . '</br>';
                    //$this->news_m->insert_news(trim($element->innertext), "http://www.bit.edu.cn/xww/{$element->href}", $addtime, 2);
                    $i1++;
                }
                else
                    break;
            }

            $html = file_get_html("http://www.bit.edu.cn/ggfw/tzgg17/index.htm", false, $context);
            if (!$html)
                return false;
            foreach ($html->find('a[class=huizi]') as $element) {
                if ($i2 < 5) {
                    echo trim($element->innertext) . '---' . "http://www.bit.edu.cn/ggfw/tzgg17/" . $element->href . '</br>';
                    $i2++;
                }
                else
                    break;
            }

            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

}

?>
