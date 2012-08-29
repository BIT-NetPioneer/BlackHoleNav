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
 * @author HacRi
 */
class Special_m extends CI_Model{
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
