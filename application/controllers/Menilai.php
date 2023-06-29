<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilai_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            // Select siswa from database
            $data['siswa'] = $this->Menilai_model->getSiswa();
            $data['title'] = 'Menilai';
            $data['user'] = $this->Menilai_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Menilai_model->getMateri();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/tugastes', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    

}
