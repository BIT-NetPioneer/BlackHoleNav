<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of user_auth
 *
 * @author HacRi
 */
class user_auth {

    protected $_CI;
    private $user_data;

    function __construct() {
        $this->_CI = & get_instance();
        $this->_CI->load->library('session');
        $this->_CI->load->model('user_m');
    }

    /**
     * 根据session的信息返回/验证用户信息
     */
    function valid_user() {
        if (!$this->_CI->session->userdata('uid')
                || !$this->_CI->session->userdata('hash'))
            return FALSE;

        $uid = $this->_CI->session->userdata('uid');
        $hash = $this->_CI->session->userdata('hash');

        $user_data = $this->_CI->user_m->get_user_by_id($uid);

        if ($user_data == NULL)
            return FALSE;

        $valid_hash = $this->generate_hash(
                $uid, $user_data['uname'],$user_data['pwd']);

        if ($hash != $valid_hash) {
            $this->logout();
            return FALSE;
        }

        $this->user_data = $user_data;

        return TRUE;
    }

    function set_valid_user($uid, $pwd, $uname) {
        $hash = $this->generate_hash($uid, $uname, $pwd);
        $sess_data = array(
            'uid' => $uid,
            'hash' => $hash
        );
        $this->_CI->session->set_userdata($sess_data);
    }

    /**
     * 根据相关信息生成验证hash
     * 
     * @param type $uid
     * @param type $pwd
     * @param type $lgtime
     * @return type
     */
    function generate_hash($uid, $uname, $pwd) {
        $salt1 = $this->_CI->config->item('salt1');
        $salt2 = $this->_CI->config->item('salt2');
        $hash = $uid + $salt1 + $uname + $salt2 + $pwd;
        return sha1($hash);
    }

    function is_logged_in() {
        if ($this->valid_user()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function login($uname, $pwd) {
        $this->logout();

        $user_data = $this->_CI->user_m->get_user_by_name($uname);
        if ($user_data == null)
            return FALSE; // 用户名不存在

        $this->user_data = $user_data;

        if ($pwd == $user_data['pwd']) {
            $uid = $user_data['uid'];
            $this->set_valid_user($uid, $pwd, $uname);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function logout() {
        $this->_CI->session->unset_userdata('uid');
        $this->_CI->session->unset_userdata('hash');
    }

}