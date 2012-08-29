<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of about
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
class About extends CI_Controller {

    // 关于BlackHole导航
    function index() {
        $head_data=null;
        $csses = array('reset', 'header', 'about','footer');
        $jses = array($this->config->item('jquery'));

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;
        $this->load->view('all_header', $head_data);
        $this->load->view('about/index');
        $this->load->view('all_footer');
    }

    // 加入网协
    function join() {
        $head_data=null;
        $csses = array('reset', 'header', 'about','footer');
        $jses = array($this->config->item('jquery'));

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;
        $this->load->view('all_header', $head_data);
        $this->load->view('about/join');
        $this->load->view('all_footer');
    }

    // 关于网协技术
    function np_tech() {
        $head_data=null;
        $csses = array('reset', 'header', 'about','footer');
        $jses = array($this->config->item('jquery'));

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;
        $this->load->view('all_header', $head_data);
        $this->load->view('about/nptech');
        $this->load->view('all_footer');
    }

    // 联系我们
    function contact() {
        $head_data=null;
        $csses = array('reset', 'header', 'about','footer');
        $jses = array($this->config->item('jquery'));

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;
        $this->load->view('all_header', $head_data);
        $this->load->view('about/contact');
        $this->load->view('all_footer');
    }

}

?>
