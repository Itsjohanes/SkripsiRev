<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilai_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');

        // Load the user agent library
        $this->load->library('user_agent');
        checkRole(1);

    }

    public function index()
    {
            // Select siswa from database
            $data['siswa'] = $this->Menilai_model->getSiswa();
            $data['title'] = 'Menilai';
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Menilai_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Menilai_model->getMateri();
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/menilai/menilai', $data);
            $this->load->view('admin/template/footer');
       
    }

    

    

}
