<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapNilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ReportNilai_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Rekap Nilai";
            // Mendapatkan data user
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            // Mendapatkan data report
            $data['report'] = $this->ReportNilai_model->getReportData();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/rekapnilai', $data);
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