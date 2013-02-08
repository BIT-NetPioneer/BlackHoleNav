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
        $maindata = array(
            'adminfuncs' => array(
                '添加新特别推荐' => base_url('index.php/admin/addspecial'),
                '注销登录' => base_url('index.php/admin/logout')
            )
        );
        $this->load->view('admin/main', $maindata);
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

        $config['upload_path'] = './upload/special/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['encrypt_name'] = TRUE;
        $config['max_width'] = '240';
        $config['max_height'] = '180';
        $this->load->library('upload', $config);

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
        $this->form_validation->set_rules('image', '图片', '');
        $this->form_validation->set_rules('date', '过期日期', 'trim|required|callback_isdate_check');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/addspecial');
        } else {
            $expire_date = strtotime($this->input->post('date'));
            if ($expire_date == FALSE) {
                // 感觉是多余的
                $this->load->view('admin/addspecialfail', array('error_reason' => '日期错误'));
            } else {
                //$out = '<p>success</p>';
                //$out .= '<a href="javascript:history.go(-1);">后退</a>';

                if (!$this->upload->do_upload('image')) {
                    $this->load->view('admin/addspecialfail', array('error_reason' => $this->upload->display_errors()));
                } else {
                    $upload_data = $this->upload->data();
                    //$this->load->view('blank', $data);
                    $this->load->model('special_m');
                    $form_data = $this->input->post();

                    $this->special_m->insert_one($form_data['name'], $form_data['url'], $form_data['description'], $upload_data['file_name'], $expire_date);
                    $img_addr = base_url('upload/special/' . $upload_data['file_name']);
                    $this->load->view('admin/addspecialsuccess', array('img_addr' => $img_addr));
                }
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

    function isdate_check($str) {
        if (strtotime($str) != FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('isdate_check', 'The %s field is not a date type');
            return FALSE;
        }
    }

}

?>
