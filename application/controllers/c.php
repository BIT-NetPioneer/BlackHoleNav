<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of c
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
class C extends CI_Controller {

    /**
     * 用于统计点击数的链接跳转(普通链接)
     */
    function jmp() {
        $urlid = $this->input->get('uid', TRUE);
        $url = $this->input->get('url', TRUE);

        $this->load->model('statistics_m');
        $this->statistics_m->save_click($urlid, $url);

        redirect($url);
    }

    /**
     * 用于统计点击数的链接跳转（常用链接）
     */
    function jmpc() {
        $urlid = $this->input->get('uid', TRUE);
        $url = $this->input->get('url', TRUE);
        
        $this->load->model('statistics_m');
        $this->statistics_m->save_click($urlid, $url, 1);

        redirect($url);
    }

}

?>
