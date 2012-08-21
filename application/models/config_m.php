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

    function get_config($item) {
        $this->db->where('item', $item);
        $this->db->select('value');
        $query = $this->db->get('config');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->value;
        } else {
            $data = array('item' => $item);
            $this->db->insert($data);
        }
    }

    function set_config($item, $value) {
        $this->db->where('item', $item);
        $data = array('value' => $value);
        $this->db->update('config', $data);
    }

}

?>
