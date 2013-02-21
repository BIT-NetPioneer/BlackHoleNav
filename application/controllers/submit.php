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
class Submit extends CI_Controller {

    function url() {
        $csses = array(
            'reset',
            'header',
            'admin',
            'footer'
        );
        $jses = array(
            'jquery-1.7.2.min',
        );

        $head_data['csses'] = $csses;
        $head_data['jses'] = $jses;

        $this->load->view('all_header', $head_data);

        $this->load->helper(array('form', 'url', 'captcha'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('url-addr', 'URL地址', 'trim|required|prep_url');
        $this->form_validation->set_rules('cap', '验证码', "trim|required|strtolower|callback_expire_check[{$this->input->post('cap-time')}]|callback_cap_check[{$this->input->post('cap-time')},{$this->input->post('cap-hash')}]");

        if ($this->form_validation->run() == FALSE) {
            $vals = array(
                'img_path' => './tmp/captcha/',
                'img_url' => base_url('tmp/captcha/') . '/',
                'img_width' => 120,
                'img_height' => 35,
                'expiration' => 120
            );
            $cap = create_captcha($vals);
            $hash = sha1($this->input->ip_address() . '!NPNAV!' . strtolower($cap['word']) . $cap['time']);
            $form_date = array(
                'cap_url' => $cap['image'],
                'cap_ts' => $cap['time'],
                'cap_hash' => $hash
            );
            $this->load->view('submiturl', $form_date);
        } else {
            $this->load->driver('cache', array('adapter' => 'file'));
            $foo = $this->cache->get($this->input->post('cap-hash'));
            if (!$foo) {
                $this->cache->save($this->input->post('cap-hash'), '1', '120');
                $this->load->model('submit_url_m');
                $this->submit_url_m->insert_one($this->input->post('url-addr'), $this->input->ip_address());
            }
            $this->load->view('submiturlsuccess');
        }
        $this->load->view('all_footer');
    }

    function expire_check($cpa, $cpatime) {
        if (time() - (int) $cpatime > 120) {
            $this->form_validation->set_message('expire_check', '%s 已过期，请刷新页面后再尝试。');
            return FALSE;
        }
        else
            return TRUE;
    }

    function cpa_check($cap, $captime, $caphash) {
        $hash = sha1($this->input->ip_address() . '!NPNAV!' . strtolower($cap) . $captime);
        if ($hash != $caphash) {
            $this->form_validation->set_message('cpa_check', '%s 错误。');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

?>
