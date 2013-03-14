<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admin
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
class Api extends CI_Controller {

    function index() {
        $func = $this->input->get('function');

        $api_key = $this->input->get('apikey');
        
        $result = array();
        if ($api_key == '123') {
            switch ($func) {
                case 'getnews':
                    $news_range = $this->input->get('range');
                    if(! $this->input->get('range'))
                        $news_range = 1;
                    $this->load->model('news_m');
                    $news_tmp = $this->news_m->get_by_source($news_range);
                    
                    $news_data = array();
                    $i = 0;
                    foreach ($news_tmp as &$row) {
                        $news_data[$i] = array(
                            'Title' => $row->title,
                            'Url' => $row->url,
                            'Source' => $row->source,
                            'Date' => $row->date
                        );
                        $i++;
                    }
                    $result['Result'] = 'OK';
                    $result['Data'] = $news_data;
                    break;
                default:
                    break;
            }
        } else {
            $result = array('result' => 'FAIL');
        }
        echo json_encode($result);
    }

}

?>
