<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Fileglobal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Filemanager_model');
        $this->load->model('Chat_model');
        checkRole(0);
       
    }
    public function index() {
        $data['title'] = "File Manager Global";
        $data['notifchat'] = $this->Chat_model->getChatData();
        $data['user'] = $this->Filemanager_model->getUserByEmail($this->session->userdata('email'));
        $data['kelompok'] = $this->Filemanager_model->getKelompokByIdUser($this->session->userdata('id'));
        $kelompokku = $this->Filemanager_model->getKelompokByIdUser($this->session->userdata('id'));
        $this->load->helper('url');
        $data['files'] = $this->get_files();
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/template/sidebar', $data);
        $this->load->view('siswa/globalchat/filemanager', $data);
        $this->load->view('siswa/template/footer');
    }

    public function upload() {
    $config['upload_path'] = './uploads/global/';
    $config['allowed_types'] = 'pdf';
    $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            redirect('Fileglobal');
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

}
