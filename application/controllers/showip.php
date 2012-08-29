<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of showip
 *  _      _  _                 
 * | |    (_)| |                
 * | |__   _ | |_  _ __   _ __  
 * | '_ \ | || __|| '_ \ | '_ \ 
 * | |_) || || |_ | | | || |_) |
 * |_.__/ |_| \__||_| |_|| .__/ 
 *                       | |    
 *                       |_|    
 * @author HacRi
 */
class Showip extends CI_Controller {

    /**
     * 返回客户端信息
     * 
     * 返回客户端的IP地址和UA头中的操作系统、浏览器信息
     * @author HacRi <linleqi@gmail.com>
     */
    function index() {
        $this->load->library('user_agent');
        $tmp = array(
            'ip' => $this->input->ip_address(),
            'ua' => $this->agent->platform() .' / '.
            $this->agent->browser() . ' ' . $this->agent->version()
        );

        echo json_encode($tmp);
    }

}

?>
