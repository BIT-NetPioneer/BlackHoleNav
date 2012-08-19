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

    function get_by_source($source) {
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

    function insert_news($title, $url, $addtime, $source) {
        $this->db->where('url', $url);
        //$this->db->where('source' , $source);
        $this->db->select('status');
        $query = $this->db->get('news');

        if ($query->num_rows() == 0) {
            $data = array(
                'url' => $url,
                'title' => $title,
                'source' => $source,
                'date' => $addtime,
                'status' => 1
            );
            $this->db->insert('news', $data);
        }
    }
    
    
    
    function empty_news(){
        $this->db->empty_table('news');
    }

}

?>
