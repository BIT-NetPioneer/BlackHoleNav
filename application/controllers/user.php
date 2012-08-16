<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of user
 *
 * @author HacRi
 */
class User extends CI_Controller {

    function insert() {
        $this->load->model('user_m');

        $arr = array('uname' => 'admin2', 'upass' => do_hash('ceshi'), 'info1' => 'ceshi', 'info2' => '中文测试');
        $this->user_m->userinsert($arr);
    }

    function update() {
        $this->load->model('user_m');

        $arr = array('upass' => do_hash('123'));
        $this->user_m->UserUpdate(1, $arr);
    }

    function select() {
        $this->load->model('user_m');

        $result = $this->user_m->userselect(1);
        
        foreach($result as $row){
            echo $row->upass;
            echo $row->uname;
        }
        
    }

}

?>
