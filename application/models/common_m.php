<?php

/**
 * Description of url_m
 *
 * @author HacRi
 */
class Common_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_by_id($commonid) {

        $condictions = array('id' => $commonid);

        $this->db->where($condictions);

        $fields = array('url', 'name', 'is_static');
        $this->db->select($fields);

        $query = $this->db->get('common');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function get_all() {
        $this->db->select('*');
        $this->db->order_by('rank', 'asc');
        $query = $this->db->get('common');

        return $query->result();
    }

    function get_by_status($status) {
        $this->db->where('status', $status);
        $this->db->select('*');
        $this->db->order_by('rank', 'asc');
        $query = $this->db->get('common');

        return $query->result();
    }

}

?>
