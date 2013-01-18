<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author HacRi <linleqi@gmail.com>
 */
class User_m extends CI_Model {

    private $user_info;

    function __construct() {
        parent::__construct();

        $this->user_info = array(
            1 => array(
                'uid' => 1,
                'uname' => 'admin',
                'pwd' => 'Admin@Bitnp'
            ),
            2 => array(
            )
        );
    }

    function UserInsert($arr) {
        $this->db->insert("user", $arr);
    }

    function UserUpdate($uid, $arr) {
        $this->db->where("id", $uid);
        $this->db->update("user", $arr);
    }

    function UserSelect($uid) {
        $this->db->where('id', $uid);
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query->result();
    }

    function get_user_by_id($uid) {
        return $this->user_info[$uid];
    }

    function get_user_by_name($uname) {
        foreach ($this->user_info as $user) {
            if ($user['uname'] == $uname)
                return $user;
        }

        return NULL;
    }

}

?>
