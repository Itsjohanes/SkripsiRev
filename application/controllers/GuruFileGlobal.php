<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gurufileglobal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Filemanager_model');
        $this->load->model('Chat_model');
        checkRole(1);
       
    }
    public function index() {
        $data['title'] = "File Manager Global";
        $data['notifchat'] = $this->Chat_model->getChatData();
        $data['user'] = $this->Filemanager_model->getUserByEmail($this->session->userdata('email'));
        $data['kelompok'] = $this->Filemanager_model->getKelompokByIdUser($this->session->userdata('id'));
        $kelompokku = $this->Filemanager_model->getKelompokByIdUser($this->session->userdata('id'));
        $this->load->helper('url');
        $data['files'] = $this->get_files();
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/sidebar', $data);
        $this->load->view('guru/globalchat/filemanager', $data);
        $this->load->view('guru/template/footer');
    }

    public function upload() {
    $config['upload_path'] = './uploads/global/';
    $config['allowed_types'] = 'pdf|zip';
    $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            redirect('FileGlobal');
        } else {
            echo $this->upload->display_errors();
        }
    }

    private function get_files() {
        $file_list = array();
        $dir = "./uploads/global";
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $file_list[] = $file;
            }
        }
        return $file_list;
    }
     public function delete($file_name) {
        $file_path = './uploads/global/'. $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        redirect('gurufileglobal');
    }


}
