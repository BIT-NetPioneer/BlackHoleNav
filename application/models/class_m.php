<?php

/**
 * Description of class_m
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
class Class_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_by_id($classid, $all = 0) {
        if ($all == 1) {
            $condictions = array('id' => $classid);
        } else {
            $condictions = array('id' => $classid, 'status' => 1);
        }
        $this->db->where($condictions);

        $fields = array('name');
        $this->db->select($fields);

        $query = $this->db->get('class');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        } else {
            return null;
        }
    }

    function get_all($all = 0) {
        if ($all == 0) {
            $this->db->where('status', 1);
        }
        $this->db->select('*');
        $this->db->order_by('rank','asc');
        $query = $this->db->get('class');
        
        return $query->result();
    }

}

?>
