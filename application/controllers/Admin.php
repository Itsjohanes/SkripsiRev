<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Home Admin";
            $data['user'] = $this->Admin_model->getUserByEmail($this->session->userdata('email'));
            $data['siswa'] = $this->Admin_model->getTotalStudents();

            $data['pretest'] = $this->Admin_model->getTotalPretests();
            $data['posttest'] = $this->Admin_model->getTotalPosttests();

            $jumlahSiswa = $this->Admin_model->getTotalStudents();
            $jumlahPretest = $this->Admin_model->getTotalHasilPretest();
            $jumlahPosttest = $this->Admin_model->getTotalHasilPosttest();
            $tugas1 = $this->Admin_model->getTotalHasilTugas(1);
            $tugas2 = $this->Admin_model->getTotalHasilTugas(2);
            $tugas3 = $this->Admin_model->getTotalHasilTugas(3);
            $tugas4 = $this->Admin_model->getTotalHasilTugas(4);

            if ($jumlahSiswa != 0) {
                $data['persentasepretest'] = ($jumlahPretest / $jumlahSiswa) * 100;
                $data['persentaseposttest'] = ($jumlahPosttest / $jumlahSiswa) * 100;
                $data['persentasetugas1'] = ($tugas1 / $jumlahSiswa) * 100;
                $data['persentasetugas2'] = ($tugas2 / $jumlahSiswa) * 100;
                $data['persentasetugas3'] = ($tugas3 / $jumlahSiswa) * 100;
                $data['persentasetugas4'] = ($tugas4 / $jumlahSiswa) * 100;
            } else {
                $data['persentasepretest'] = 0 * 100;
                $data['persentaseposttest'] = 0 * 100;
                $data['persentasetugas1'] = 0 * 100;
                $data['persentasetugas2'] = 0 * 100;
                $data['persentasetugas3'] = 0 * 100;
                $data['persentasetugas4'] = 0 * 100;
            }

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/index', $data);
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
