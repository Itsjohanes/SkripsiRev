<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenilaiPosttest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaiposttest_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Post-Test";
            $data['user'] = $this->Menilaiposttest_model->getUserByEmail($this->session->userdata('email'));
            // Join id_siswa dengan table siswa
            $data['posttest'] = $this->Menilaiposttest_model->getHasilPosttest();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasilposttest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function hapusHasilPosttest($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            // Delete berdasarkan id
            $this->Menilaiposttest_model->deleteHasilPosttest($id);
            $this->session->set_flashdata('category_success', 'Hasil Post-Test berhasil dihapus');
            redirect('MenilaiPosttest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

}
