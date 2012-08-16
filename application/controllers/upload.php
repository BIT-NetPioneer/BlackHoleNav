<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    function face() {
        $this->load->view('up');
    }

    function up() {
        if (!empty($_POST['sub'])) {
            $fileInfo = ($_FILES['upfile']);
            if ($fileInfo['size'] >= 2 * 2048 * 2048) {
                echo 'size Error';
            } else {
                switch ($fileInfo['type']) {
                    case 'image/jpeg':
                        $hz = '.jpg';
                        break;
                    default:
                        $hz = false;
                }

                if ($hz == FALSE) {
                    echo 'Error Type';
                } else {
                    $time = time();
                    move_uploaded_file($fileInfo['tmp_name'], "./upload/$time");
                }
            }
        }
    }

    function upCI() {
        $config['upload_path'] = './upload';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = 2 * 1024 * 1024;
        
        $this->load->library('upload', $config);
        
        $this->upload->do_upload('upfile');
        
        var_dump($this->upload->data());
    }

}

?>
