<?php

/**
 * Description of config_m
 *
 * @author HacRi
 */
class Config_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_config($item){
        $this->db->where('item', $item);
        $this->db->select('value');
        $query = $this->db->get('config');
        $row = $query->row();
        return $row->value;
    }
    
    function set_config($item, $value){
        $this->db->where('item', $item);
        $data = array('value' => $value);
        $this->db->update('config', $data);
    }

}

?>
