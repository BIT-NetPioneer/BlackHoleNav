<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Index
 *
 * @author HacRi
 */
class Nav extends CI_Controller {

    function index() {
        $baseurl = base_url();
        $baseurlwithindex = $baseurl . "index.php";
        $head_data = '';
        $data_l = '';
        $data_r = '';

        $head_data['title'] = "BlackHole导航";
        $head_data['date_info'] = date("Y年m月d日");

        $dayOfYear = $d = date("z") + 1;
        $w = ceil($dayOfYear / 7);
        $d = 244 - $dayOfYear;
        $head_data['week'] = "今年第{$w}周，据开学还有{$d}天";

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

        // commonUrl
        $this->load->model('common_m');
        $rowMax = array(6, 8, 8, 8);
        $allcommon = array();

        //$commons = $this->common_m->get_all();
        $rowCount = 0;
        for ($i = 1; $i <= 4; $i++) {
            if ($i == 3) {
                $allcommon[$rowCount]['type'] = 'hr';
                $rowCount++;
            }
            $tmpCommon = $this->common_m->get_by_status($i);
            $commonCount = 0;
            foreach ($tmpCommon as $row) {
                if ($commonCount == $rowMax[$i]) {
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


        // getClass;
        $this->load->model('class_m');
        $classes = $this->class_m->get_all();

        // getUrlByClass
        $this->load->model('url_m');

        $classCount = 0;
        $data_l['classes'] = array();

        foreach ($classes as $row) {
            $urls = $this->url_m->get_by_class($row->id);
            if (!empty($urls)) {
                $tmpClass = null;
                $tmpClass['name'] = $row->name;
                //$tmpClass['urls'] = array();
                $urlCount = 0;
                foreach ($urls as $url) {
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
            foreach ($specials as $row) {
                $tmpSpecial = array(
                    'name' => $row->name,
                    'url' => $row->url,
                    'image' => "{$baseurl}upload/special/$row->image.jpg",
                    'description' => $row->description
                );

                $data_r['specials'][$specialCount] = $tmpSpecial;
                $specialCount++;
            }
        }


        $this->load->view('mainleft', $data_l);
        $this->load->view('mainright', $data_r);
        $this->load->view('all_footer');
    }

    function test() {
        $this->load->model('common_m');
        $allcommon = array();

        //$commons = $this->common_m->get_all();
        $rowCount = 0;
        for ($i = 1; $i <= 4; $i++) {
            if ($i == 3) {
                $allcommon[$rowCount]['style'] = 'hr';
                $rowCount++;
            }
            $tmpCommon = $this->common_m->get_by_status($i);
            $commonCount = 0;
            foreach ($tmpCommon as $row) {
                if ($commonCount == 6) {
                    $commonCount = 0;
                    $rowCount++;
                }
                if ($commonCount == 0) {
                    $allcommon[$rowCount]['style'] = 'row' . $i;
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
        var_dump($allcommon);
    }

}

?>
