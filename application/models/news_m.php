<?php
/**
 * Description of news
 *
 * @author HacRi
 */
class News_m extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function get_by_source($source){
        $this->db->where('`status` > 0');
        $this->db->where('source', $source);
        $this->db->limit(5);
        $this->db->order_by('date', 'desc');
        $this->db->order_by('id', 'asc');
        
        $fields = array('title', 'url', 'status');
        $this->db->select($fields);
        
        $query = $this->db->get('news');
        return $query->result();
    }
}

?>
