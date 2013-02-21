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
 * @author HacRi <linleqi@gmail.com>
 */
class submit_url_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getall($page = 1, $limit = 10) {
        $this->db->where('status', 1);
        $this->db->select('url, submit_time, ip_addr');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, ($page - 1 ) * $limit);
        $query = $this->db->get('submit_url');

        return $query->result();
    }

    function insert_one($url, $ip) {
        $data = array(
            'url' => $url,
            'ip_addr' => $ip
        );

        $this->db->insert('submit_url', $data);
    }

}

?>
