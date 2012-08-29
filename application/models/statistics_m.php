<?php

/**
 * Description of statistics_m
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
class statistics_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 记录一次链接点击
     * 
     * @param integer $urlid 链接id
     * @param string $url 链接URL
     * @param bool $iscommon 是否为常用、热门链接
     */
    function save_click($urlid, $url, $iscommon = 0) {
        $data = array(
            'uid' => $urlid,
            'url' => $url,
            'ua' => $this->input->user_agent(),
            'ip' => $this->input->ip_address(),
            'iscommon' => $iscommon
        );
        $this->db->insert('statistics', $data);
    }

    /**
     * 根据url地址统计点击数
     * 
     * @param string $url url地址
     * @param bool $iscommon 是否为热门、常用链接
     * @param mixed $timestamp 统计起始的时间戳
     * @return integer 点击数
     */
    function count_by_url($url, $iscommon, $timestamp) {
        $this->db->where('`timestamp` > "'. $timestamp. '"');
        if($iscommon != 2) $this->db->where("`iscommon` = $iscommon");
        $this->db->where('`url` = "'. $url. '"');
        $this->db->from('statistics');
        return $this->db->count_all_results();
    }

    /**
     * 根据url的id统计热度
     * 
     * @param integer $urlid url的id
     * @param bool $iscommon 是否为热门、常用链接
     * @param mixed $timestamp 统计起始的时间戳
     * @return integer 点击数
     */
    function count_by_urlid($urlid, $iscommon, $timestamp) {
        $this->db->where('`timestamp` > "'. $timestamp. '"');
        if($iscommon != 2) $this->db->where("`iscommon` = $iscommon");
        $this->db->where("`uid` = $urlid");
        $this->db->from('statistics');
        return $this->db->count_all_results();
    }

}

?>
