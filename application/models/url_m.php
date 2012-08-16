<?php

/**
 * Description of url_m
 *
 * @author HacRi
 */
class Url_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

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

    function get_all($all = 0) {
        if ($all == 0) {
            $this->db->where('`status` > 0');
        }
        $this->db->select('*');
        $this->db->order_by('rank', 'asc');
        $query = $this->db->get('urllist');

        return $query->result();
    }

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

    function update_heat($urlid, $newheat) {
        $this->db->query("UPDATE `urllist` SET `heat`= $newheat ,`heattimestamp` = NOW() WHERE `id`= $urlid");
    }

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

}

?>
