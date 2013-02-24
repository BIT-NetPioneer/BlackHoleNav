<?php

/**
 * Description of special_m
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
class Special_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 返回三条特别推荐
     * 
     * @param integer $count 返回的数量，默认3
     * @return array ActiveRecord信息
     * 
     * @todo 修改排序方式
     */
    function get_normal($count = 3) {
        $this->db->where('`date` >= CURDATE()');
        $this->db->where('status', 1);

        $this->db->select('name, url, description, image');
        $this->db->order_by('id', 'random');
        $this->db->limit($count);

        $query = $this->db->get('special');
        return $query->result();
    }
    
    function get_normal_b($count = 9){
        $this->db->where('`status` = 1 OR `status` = 10');
        $this->db->where('`date` >= CURDATE()');
        
        $this->db->order_by('status', 'asc');
        $this->db->order_by('id', 'random');
        $this->db->select('name, url, description, image');
        $this->db->limit($count);
        
        $query = $this->db->get('special');
        return $query->result();
    }

    /**
     * 插入一个特别推荐
     */
    function insert_one($name, $url, $des, $image_add, $expire_date) {
        $data = array(
            'name' => $name,
            'url' => $url,
            'description' => $des,
            'image' => $image_add,
            'date' => date('Y-m-d', $expire_date)
        );
        $this->db->insert('special', $data);
    }

}

?>
