<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admin
 *
 * @author HacRi
 */
class Task extends CI_Controller {

    function index() {
        $this->load->model('url_m');
        $this->load->model('statistics_m');

        $urls = $this->url_m->get_all();
        foreach ($urls as $row) {
            $num = $this->statistics_m->count_by_url($row->url, 2, $row->heattimestamp);
            echo "<p>$row->url -------- $num</p>";
        }
    }

    function countheat() {
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
            echo "<p>$row->url --- $time --- $num --- $heat</p>";

            $this->url_m->update_heat($row->id, $heat);
        }
    }

    function heatpreview() {
        $baseurl = base_url();
        $baseurlwithindex = $baseurl . "index.php";

        $head_data['title'] = "Hentai的XX导航";
        $head_data['date_info'] = "2012年11月11日";
        $head_data['week'] = '9';

        $head_data['csses'] = <<<theEnd
        <link href="{$baseurl}css/reset.css" type="text/css" rel="stylesheet" />
        <link href="{$baseurl}css/css.css" type="text/css" rel="stylesheet" />
        <link href="{$baseurl}css/jquery-ui-1.8.22.custom.css" type="text/css" rel="stylesheet" />
theEnd;
        $head_data['jses'] = <<<theEnd
        <script src="{$baseurl}js/html5.js"></script> 
        <script src="{$baseurl}js/jquery-1.7.2.min.js"></script> 
        <script src="{$baseurl}js/jquery-ui-1.8.22.custom.min.js"></script> 
theEnd;
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

    function generatecommon() {
        $do = $this->input->get('do', TRUE);
        echo "<p>$do</p>";

        $this->load->model('url_m');
        $this->load->model('common_m');
        $topurl = $this->url_m->get_by_heat(12);

        foreach ($topurl as $row) {
            $tmp = array();
            $tmp['url'] = $row->url;
            $tmp['name'] = $row->name;
            $tmp['rank'] = ceil(200 - log1p($row->heat) * 10);

            if ($do)
                $this->common_m->insert_url($tmp);
            else
                echo "<p>{$tmp['url']}------{$tmp['name']}------{$tmp['rank']}</p>";
        }
    }

    function get_news_from_bit() {
        $this->load->helper('htmldom');
        try {
            $addtime = date('Y:m:d H:i:d');
            $this->load->model('news_m');
            $html = file_get_html("http://www.bit.edu.cn");
            $i1 = 0; // 校园新闻计数
            $i2 = 0; // 学校公告计数
            //$this->news_m->empty_news();
            foreach ($html->find('a[class=huizi]') as $element) {
                echo $element->href . "---" . trim($element->innertext);
                echo '===' . substr($element->href, 0, 3);
                
                switch (substr($element->href, 0, 3)) {
                    case 'xww' :
                        if ($i1++ >= 5)
                            break;
                        $this->news_m->insert_news(trim($element->innertext), "http://www.bit.edu.cn/{$element->href}", $addtime, 2);
                        echo '*';
                        break;
                    case 'ggf' :
                        if ($i2++ >= 5)
                            break;
                        $this->news_m->insert_news(trim($element->innertext), "http://www.bit.edu.cn/{$element->href}", $addtime, 3);
                        echo '*';
                        break;
                }
                echo "<br />";
                if ($i1 >= 5 && $i2 >= 5)
                    break;
            }

            // 学校公告
            //foreach ($html->find)
        } catch (Exception $e) {
            echo "<p>貌似出了点错误</p>";
        }
    }

    function get_news_test() {
        $this->load->helper('htmldom');
        try {
            $html = file_get_html("http://www.bit.edu.cn");
            foreach ($html->find('a[class=huizi]') as $element) {
                echo $element->href . "---" . trim($element->innertext) . '<br />';
                //$this->load->model('news_m');
                //$this->news_m->insert_news(trim($element->innertext), "http://www.bit.edu.cn/{$element->href}", $addtime, 2);
            }
        } catch (Exception $e) {
            echo "<p>貌似出了点错误</p>";
        }
    }

}

?>
