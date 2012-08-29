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
 * @author HacRi
 */
class Admin extends CI_Controller {

    //验证session
    function check_session() {
        $this->load->library('session');
        if ($this->session->userdata('permission') > 2) {
            return true;
        } else {
            redirect(base_url('index.php/admin/login'));
            exit();
        }
    }

    function index() {
        $this->check_session();

        echo '成功';
    }

    function login() {
        $baseurl = base_url();
        $baseurlwithindex = $baseurl . "index.php";

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
        $this->load->view('admin/login');
        $this->load->view('all_footer');
    }

    function checklogin() {
        $uname = $this->input->post('uname');
        $uname = str_replace(' ', null, $uname);
        $uname = strtolower(trim($uname));

        $upass = $this->input->post('upass');

        echo "<p>...获取用户名/密码：uname = $uname</p>";
        echo "<p>...验证中</p>";
        if ($uname == $this->config->item('nav_root_username') && $upass == $this->config->item('nav_root_password')) {
            echo "<p>...通过</p>";

            $this->load->library('session');
            echo "<p>...构建session</p>";
            $data = array(
                'uname' => $uname,
                'upass' => sha1($upass),
                'permission' => '9'
            );
            echo "<p>...写入session</p>";
            $this->session->set_userdata($data);

            echo "<p>...显示权限</p>";
            echo "权限:" . $this->session->userdata('permission');
            $permissionDes[9] = '最高';
            echo '---' . $permissionDes[$this->session->userdata('permission')];
            $adminIndexurl = base_url('index.php/admin/');
            echo <<<theEnd
<p>
   <a href={$adminIndexurl}>跳转到管理主页</a>
</p>
   
theEnd;
        } else {
            echo "<p>...验证失败</p>";
        }
    }

    function logout() {
        $this->load->library('session');
        $this->session->unset_userdata('permission');
    }

}

?>
