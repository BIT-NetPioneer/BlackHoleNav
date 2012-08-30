<?php

/**
 * Description of news
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
class News_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 按照新闻来源抓取新闻
     * 
     * @param integer $source 新闻来源：1-教务处新闻，2-校园新闻，3-校园公告
     * @return array ActiveRecord结果集
     */
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

    /**
     * 插入新闻
     * 
     * @param string $title 新闻标题
     * @param string $url 新闻链接
     * @param mixed $addtime 插入时间
     * @param integer $source 新闻来源：1-教务处新闻，2-校园新闻，3-校园公告
     */
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
    
    
    /**
     * 清楚全部新闻
     */
    function empty_news(){
        $this->db->empty_table('news');
    }

}

?>
