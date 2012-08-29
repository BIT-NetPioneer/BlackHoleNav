<?php

/**
 * Description of url_m
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
class Url_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 通过链接IP返回信息
     * 
     * all默认为0，如果为1，将返回status为0的字段
     * @param integer $urlid 链接的id
     * @param bool $all 是否返回不生效的链接
     * @return object ActiveRecord结果
     */
    function get_by_id($urlid, $all = 0) {
        if ($all == 1) {
            $condictions = array('id' => $urlid);
        } else {
            $condictions = array('id' => $urlid, 'status' => 1);
        }
        $this->db->where($condictions);

        $fields = array('url', 'name', 'content', 'is_direct');
        $this->db->select($fields);

        $query = $this->db->get('urllist');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        } else {
            return null;
        }
    }

    /**
     * 返回所有链接
     * 
     * @param bool $all 默认false，为true则包含不启用的链接
     * @return array ActiveRecord结果集
     */
    function get_all($all = 0) {
        if ($all == 0) {
            $this->db->where('`status` > 0');
        }
        $this->db->select('*');
        $this->db->order_by('rank', 'asc');
        $query = $this->db->get('urllist');

        return $query->result();
    }

    /**
     * 根据链接分类返回链接
     * 
     * @param integer $classid
     * @param bool $all 默认false，为true则包含不启用的链接
     * @return array ActiveRecord结果集
     */
    function get_by_class($classid, $all = 0) {
        if ($all == 0) {
            $this->db->where('`status` > 0');
        }
        $this->db->where('class', $classid);

        $fields = array('id', 'url', 'name', 'content', 'is_direct', 'status');
        $this->db->select($fields);
        $this->db->order_by('rank', 'asc');

        $query = $this->db->get('urllist');

        return $query->result();
    }

    /**
     * 更新链接的热度
     * 
     * @param integer $urlid 链接id
     * @param integer $newheat 链接的热度
     */
    function update_heat($urlid, $newheat) {
        $this->db->query("UPDATE `urllist` SET `heat`= $newheat ,`heattimestamp` = NOW() WHERE `id`= $urlid");
    }
    
    /**
     * 按照热度排序返回链接
     * 
     * @param integer $num 默认为8，返回链接的数目
     * @param bool $all 默认false，为true则包含不启用的链接
     * @return array ActiveRecord结果集
     */
    function get_by_heat($num = 8, $all = 0) {
        if ($all == 0) {
            $this->db->where('`status` > 0');
        }
        $this->db->limit($num);
        $this->db->select('*');
        $this->db->order_by('heat', 'desc');
        $this->db->order_by('rank', 'asc');
        $query = $this->db->get('urllist');

        return $query->result();
    }
    
    /**
     * 根据名称返回链接
     * 
     * @param string $match 搜索的关键词
     * @return array ActiveRecord结果集
     */
    function search_url($match){
        $this->db->like('url', $match);
        $this->db->or_like('content', $match);
        
        $this->db->where('`status` > 0');
        $this->db->limit(9);
        $this->db->select(array('url', 'content', 'name'));
        $query = $this->db->get('urllist');
        
        return $query->result();
    }

}

?>
