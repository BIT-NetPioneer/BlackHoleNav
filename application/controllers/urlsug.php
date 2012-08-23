<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Index
 *
 * @author HacRi
 * @todo 添加缓存设置
 */
class urlsug extends CI_Controller {

    function index() {
        $keyword = $this->input->get('q');
        //echo $keyword;
        if ($keyword != '') {
            $keyword = trim($keyword);
            //$this->db->like('title', 'match');
            $this->load->model('url_m');

            $result = $this->url_m->search_url($keyword);

            $sug = null;
            $i = 0;
            foreach ($result as $row) {
                $tmp = array(
                    'to' => $row->url,
                    'name' => $row->name,
                        //'content' => $row->content
                );
                $sug[$i] = $tmp;
                $i++;
            }
            //var_dump($sug);
            echo json_encode($sug);
        }
    }

    function urls() {
        // 缓存
        if ($this->uri->total_segments() > 2) {
            show_404();
        }
        //$this->output->cache($this->config->item('index_cache_ttl'));

        $this->load->helper('pinyin');
        $this->load->model('url_m');

        $result = $this->url_m->get_all();

        $sug = null;
        $i = 0;
        foreach ($result as $row) {
            $tmp = array(
                $row->name,
                $row->url,
                Pinyin($row->name,1),
                $row->id
            );
            $sug[$i] = $tmp;
            $i++;
        }
        //var_dump($sug);
        echo "var urls = ";
        echo json_encode($sug);
        echo ";";
    }

    function u() {
        $this->load->helper('pinyin');
        $this->load->model('url_m');

        $result = $this->url_m->get_all();

        $sug = null;
        $i = 0;
        foreach ($result as $row) {
            $tmp = array(
                $row->name,
                $row->url,
                Pinyin($row->name)
                    //'content' => $row->content
            );
            $sug[$i] = $tmp;
            $i++;
        }
        //var_dump($sug);

        echo json_encode($sug);
    }

}

?>
