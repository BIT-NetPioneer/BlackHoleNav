<?php

/**
 * Description of statistics_m
 *
 * @author HacRi
 */
class statistics_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

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

    function count_by_url($url, $iscommon, $timestamp) {
        $this->db->where('`timestamp` > "'. $timestamp. '"');
        if($iscommon != 2) $this->db->where("`iscommon` = $iscommon");
        $this->db->where('`url` = "'. $url. '"');
        $this->db->from('statistics');
        return $this->db->count_all_results();
    }

    function count_by_urlid($urlid, $iscommon, $timestamp) {
        $this->db->where('`timestamp` > "'. $timestamp. '"');
        if($iscommon != 2) $this->db->where("`iscommon` = $iscommon");
        $this->db->where("`uid` = $urlid");
        $this->db->from('statistics');
        return $this->db->count_all_results();
    }

}

?>
