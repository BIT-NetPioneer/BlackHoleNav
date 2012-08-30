<?php

/**
 * Description of config_m
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
class Config_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 获取数据库中保存的config
     * 
     * 获取数据库中保存的config值，如果数据库中不存在该值，则自动新建，并返回空值。
     * @param string $item config名称
     * @return string 结果
     */
    function get_config($item) {
        $this->db->where('item', $item);
        $this->db->select('value');
        $query = $this->db->get('config');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->value;
        } else {
            $data = array('item' => $item);
            $this->db->insert('config', $data);
            return null;
        }
    }

    /**
     * 保存config值
     * 
     * @param string $item config值的名称，数据库表中必须已经存在该值
     * @param string $value config值的内容
     */
    function set_config($item, $value) {
        $this->db->where('item', $item);
        $data = array('value' => $value);
        $this->db->update('config', $data);
    }

}

?>
