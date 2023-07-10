<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        checkRole(1);
       
    }
    public function index()
    {
            $data['title'] = "Home Admin";
            $data['user'] = $this->Admin_model->getUserByEmail($this->session->userdata('email'));
            $data['siswa'] = $this->Admin_model->getTotalStudents();

            $data['pretest'] = $this->Admin_model->getTotalPretests();
            $data['posttest'] = $this->Admin_model->getTotalPosttests();
            $data['ranking'] = $this->Admin_model->getRanking();
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

            //ambil data dari tb_akun yang memiliki nilai total nilai tertinggi
            $data['nilaiTertinggi'] = $this->Admin_model->getNilaiTertinggi();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/index', $data);
            $this->load->view('backend/admin/footer');
        
    }
}
