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
 */
class Admin extends CI_Controller {

    /**
     * 后台管理的首页
     */
    function index() {
        $this->load->library('user_auth');

        $isuser = $this->user_auth->valid_user();
        if (!$isuser)
            redirect(base_url('index.php/admin/login'));

        $csses = array(
            'reset',
            'header',
            'admin',
            'footer'
        );

        $jses = array(
            'jquery-1.7.2.min',
        );

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;
        $this->load->view('all_header', $head_data);
        $this->load->view('admin/main');
        $this->load->view('all_footer');
    }

    /**
     * 后台登录页面
     */
    function login() {
        $baseurl = base_url();
        $baseurlwithindex = $baseurl . "index.php";

        $csses = array(
            'reset',
            'header',
            'admin',
            'footer'
        );

        $jses = array(
            'jquery-1.7.2.min',
            's3Slider'
        );

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;
        $this->load->view('all_header', $head_data);
        $this->load->view('admin/login');
        $this->load->view('all_footer');
    }

    /**
     * 登录的验证页
     * 
     * 登录跳转到此验证，用户名密码通过post传送
     * @todo 用户名密码存入数据库
     */
    function checklogin() {
        $uname = $this->input->post('uname');
        $uname = str_replace(' ', null, $uname);
        $uname = strtolower(trim($uname));

        $upass = $this->input->post('upass');

        $this->load->library('user_auth');

        $issucess = $this->user_auth->login($uname, $upass);

        if ($issucess) {
            echo 'ok';
            redirect(base_url('index.php/admin'));
        } else {
            echo 'fail';
        }
    }

    /**
     * 登出页面
     */
    function logout() {
        $this->load->library('user_auth');
        $this->user_auth->logout();
    }

    /*
     * 增加特别推荐
     */

    function addspecial() {
        $this->load->library('user_auth');
        $isuser = $this->user_auth->valid_user();
        if (!$isuser)
            redirect(base_url('index.php/admin/login'));

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        $csses = array(
            'reset',
            'header',
            'admin',
            'footer'
        );

        $jses = array(
            'jquery-1.7.2.min',
            's3Slider'
        );

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;
        $this->load->view('all_header', $head_data);

        $this->form_validation->set_rules('name', '标题', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('url', '链接地址', 'trim|required');
        $this->form_validation->set_rules('description', '描述', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('date', '过期日期', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/addspecial');
        } else {
            //$this->load->view('admin/addspecialsuccess');
            echo '<p>success</p>';
            echo '<a href="javascript:history.go(-1);">后退</a>';
            #var_dump($_POST);
            $config['upload_path'] = './upload/special/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100';
            $config['encrypt_name'] = TRUE;
            //$config['max_width'] = '240';
            //$config['max_height'] = '180';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo 'upload fail';
                echo $this->upload->display_errors();
            } else {
                $data = array('upload_data' => $this->upload->data());
                var_dump($data);
            }
        }
        $this->load->view('all_footer');
    }

    function doaddspecial() {
        $this->load->library('user_auth');
        $isuser = $this->user_auth->valid_user();
        if (!$isuser)
            redirect(base_url('index.php/admin/login'));


        var_dump($_POST);

        echo '<a href="javascript:history.go(-1);">后退</a>';
    }

}

?>
