<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Index
 *  _      _  _                 
 * | |    (_)| |                
 * | |__   _ | |_  _ __   _ __  
 * | '_ \ | || __|| '_ \ | '_ \ 
 * | |_) || || |_ | | | || |_) |
 * |_.__/ |_| \__||_| |_|| .__/ 
 *                       | |    
 *                       |_|    
 * @author HacRi <linleqi@gmail.com>
 */
class Nav extends CI_Controller {

    /**
     * 显示主页
     * 
     * @author HacRi <linleqi@gmail.com>
     */
    function index() {
        //$this->output->enable_profiler(TRUE);
        // 缓存
        if ($this->uri->total_segments() > 2) {
            show_404();
        }
        //$this->output->cache($this->config->item('index_cache_ttl'));
        
        $baseurl = base_url();
        $baseurlwithindex = $baseurl . "index.php";
        $head_data = '';
        $data_l = '';
        $data_r = '';

        $csses = array(
            'reset',
            'header',
            'main',
            'footer',
            'jquery.autocomplete'
        );

        $jses = array(
            $this->config->item('jquery'),
            'jquery.autocomplete.min',
            's3Slider',
            'title'
        );

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;

// commonUrl
        $this->load->model('common_m');
        $rowMax = array(6, 8);
        $allcommon = array();

//$commons = $this->common_m->get_all();
        $rowCount = 0;
        for ($i = 1; $i <= 2; $i++) {
            $tmpCommon = $this->common_m->get_by_status($i);
            $commonCount = 0;
            foreach ($tmpCommon as &$row) {
                if ($commonCount == $rowMax[$i - 1]) {
                    $commonCount = 0;
                    $rowCount++;
                }
                if ($commonCount == 0) {
                    $allcommon[$rowCount]['type'] = 'row' . $i;
                }
                $tmp = array(
                    'name' => $row->name,
                    'url' => $row->url,
                    'uid' => $row->id
                );
                $allcommon[$rowCount]['urls'][$commonCount] = $tmp;
                $commonCount++;
            }
            $rowCount++;
        }
        $data_l['commons'] = $allcommon;

        // getHotUrl
        $hotUrl = null;
        $commonCount = 0;
        $sumAll = 8;
        $sumStatic = 0;
        for ($i = 3; $i <= 4; $i++) {
            $tmpCommon = $this->common_m->get_by_status($i, $sumStatic);
            $sumStatic = $sumAll - $sumStatic;
            foreach ($tmpCommon as &$row) {
                $tmp = array(
                    'name' => $row->name,
                    'url' => $row->url,
                    'uid' => $row->id
                );
                $hotUrl[$commonCount] = $tmp;
                $commonCount++;
            }
        }
        $data_l['hoturl'] = $hotUrl;

// getClass;
        $this->load->model('class_m');
        $classes = $this->class_m->get_all();

// getUrlByClass
        $this->load->model('url_m');

        $classCount = 0;
        $data_l['classes'] = array();

        foreach ($classes as &$row) {
            $urls = $this->url_m->get_by_class($row->id);
            if (!empty($urls)) {
                $tmpClass = null;
                $tmpClass['name'] = $row->name;
//$tmpClass['urls'] = array();
                $urlCount = 0;
                foreach ($urls as &$url) {
                    $urlclass = "";
                    switch ($url->status) {
                        case 2:
                            $urlclass = " urlspan2-red";
                            break;
                        case 3:
                            $urlclass = " urlspan2-blue";
                            break;
                        case 4:
                            $urlclass = " urlspan2-green";
                            break;
                        case 8:
                            $urlclass = " urlspan2-gray";
                            break;
                    }
                    $tmpUrl = array(
                        'uid' => $url->id,
                        'name' => $url->name,
                        'url' => $url->url,
                        'style' => $urlclass,
                        'content' => $url->content
                    );
                    $tmpClass['urls'][$urlCount] = $tmpUrl;
                    $urlCount++;
                }
                $data_l['classes'][$classCount] = $tmpClass;
                $classCount++;
            }
        }


        $data_r['specials'] = '';
// getSpecial
        $this->load->model('special_m');
        $specials = $this->special_m->get_normal();
        if (!empty($specials)) {
            $specialCount = 0;
            foreach ($specials as &$row) {
                $tmpSpecial = array(
                    'name' => $row->name,
                    'url' => $row->url,
                    'image' => "{$baseurl}upload/special/$row->image",
                    'description' => $row->description
                );

                $data_r['specials'][$specialCount] = $tmpSpecial;
                $specialCount++;
            }
        }

        // getNews
        $this->load->model('news_m');
        $data_r['allnews'] = array();
        $data_r['allnews'][0] = null;
        $data_r['allnews'][1] = null;
        $data_r['allnews'][2] = null;
        for ($i = 1; $i <= 3; $i++) {
            $newses = $this->news_m->get_by_source($i);
            $newsCount = 0;
            foreach ($newses as &$row) {
                $tmp = array(
                    'title' => $row->title,
                    'url' => $row->url
                );
                $data_r['allnews'][$i - 1][$newsCount] = $tmp;
                $newsCount++;
            }
        }

        // 添加helper层
        array_push($head_data['csses'], 'helper');

        $this->load->view('all_header', $head_data);
        $this->load->view('mainleft', $data_l);
        $this->load->view('mainright', $data_r);
        $this->load->view('nav_helper');
        $this->load->view('all_footer');
    }

    function test() {
        var_dump($_SERVER);
    }

}

?>
