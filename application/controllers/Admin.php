<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Kelolapertemuan_model');
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
            $pertemuan = $this->Kelolapertemuan_model->getPertemuan();
            $jumlahPertemuan = count($pertemuan);
            for($i = 1;$i<=$jumlahPertemuan;$i++){
                $tugas[$i] = $this->Admin_model->getTotalHasilTugas($i);
            }

           
            
            if ($jumlahSiswa != 0) {
                $data['persentasepretest'] = ($jumlahPretest / $jumlahSiswa) * 100;
                $data['persentaseposttest'] = ($jumlahPosttest / $jumlahSiswa) * 100;
                for($i = 1;$i<=$jumlahPertemuan;$i++){
                    $data['persentasetugas'.$i] = ($tugas[$i] / $jumlahSiswa) * 100;
              
                }
              
            } else {
                $data['persentasetugas'.$i] = 0 * 100;
            }

            //ambil data dari tb_akun yang memiliki nilai total nilai tertinggi
            $data['nilaiTertinggi'] = $this->Admin_model->getNilaiTertinggi();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/index', $data);
            $this->load->view('backend/admin/footer');
        
    }
}
