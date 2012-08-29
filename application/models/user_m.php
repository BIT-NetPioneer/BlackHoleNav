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
    function __construct() {
        parent::__construct();
    }
    
    function UserInsert($arr)
    {
        $this->db->insert("user",$arr);
    }
    
    function UserUpdate($uid, $arr)
    {
        $this->db->where("id", $uid);
        $this->db->update("user", $arr);
    }
    
    function UserSelect($uid)
    {
        $this->db->where('id', $uid);
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query->result();
    }
}

?>
