<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of showip
 *
 * @author HacRi
 */
class Showip extends CI_Controller {

    function index() {
        $this->load->library('user_agent');
        $tmp = array(
            'ip' => $this->input->ip_address(),
            'ua' => $this->agent->platform() .' / '.
            $this->agent->browser() . ' ' . $this->agent->version()
        );

        echo json_encode($tmp);
    }

}

?>
