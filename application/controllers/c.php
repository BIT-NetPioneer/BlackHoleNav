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
        $urlid = $this->input->get('uid', TRUE);
        $url = $this->input->get('url', TRUE);

        $this->load->model('statistics_m');
        $this->statistics_m->save_click($urlid, $url);

        redirect($url);
    }

    function jmpc() {
        $urlid = $this->input->get('uid', TRUE);
        $url = $this->input->get('url', TRUE);
        
        $this->load->model('statistics_m');
        $this->statistics_m->save_click($urlid, $url, 1);

        redirect($url);
    }

}

?>
