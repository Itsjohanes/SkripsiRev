<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenilaiPretest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaipretest_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pre-Test";
            $data['user'] = $this->Menilaipretest_model->getUserByEmail($this->session->userdata('email'));
            // Join id_siswa dengan table siswa
            $data['pretest'] = $this->Menilaipretest_model->getHasilPretest();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasilpretest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function hapusHasilPretest($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            // Delete berdasarkan id
            $this->Menilaipretest_model->deleteHasilPretest($id);
            $this->session->set_flashdata('category_success', 'Hasil Pre-Test berhasil dihapus');
            redirect('MenilaiPretest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

}
