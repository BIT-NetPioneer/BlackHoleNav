<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of c
 *
 * @author HacRi
 */
class C extends CI_Controller {

    function jmp() {
        parse_str($_SERVER['QUERY_STRING'], $_GET);
        $urlid = $_GET['uid'];
        $url = $_GET['url'];

        $this->load->model('statistics_m');
        $this->statistics_m->save_click($urlid, $url);

        redirect($url);
    }

    function jmpc() {
        parse_str($_SERVER['QUERY_STRING'], $_GET);
        $urlid = $_GET['uid'];
        $url = $_GET['url'];
        $this->load->model('statistics_m');
        $this->statistics_m->save_click($urlid, $url, 1);

        redirect($url);
    }

}

?>
