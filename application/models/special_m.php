<?php
/**
 * Description of special_m
 *
 * @author HacRi
 */
class Special_m extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_normal($count = 3){
        $this->db->where('`date` >= CURDATE()');
        //$this->db->where('status', 1);
        
        $this->db->select('*');
        $this->db->order_by('id','random');
        $this->db->limit($count);
        
        $query = $this->db->get('special');
        return $query->result();
    }
}

?>
