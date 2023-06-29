<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Komentar_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Komentar";
            $data['user'] = $this->Komentar_model->getUserByEmail($this->session->userdata('email'));
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/komentar', $data);
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
