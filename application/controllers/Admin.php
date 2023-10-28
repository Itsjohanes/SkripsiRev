<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
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
            
            $jumlahPertemuan = $this->Kelolapertemuan_model->getMax();
            for($i = 1;$i<=$jumlahPertemuan;$i++){
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $tugas[$i] = $this->Admin_model->getTotalHasilTugas($i);
                }
                
            }
            if ($jumlahSiswa != 0) {
                $data['jumlahsiswa'] = $jumlahSiswa;
                $data['jumlahsiswapretest'] = $jumlahPretest;
                $data['jumlahsiswaposttest'] = $jumlahPosttest;

                $data['persentasepretest'] = ($jumlahPretest / $jumlahSiswa) * 100;
                $data['persentaseposttest'] = ($jumlahPosttest / $jumlahSiswa) * 100;
                for($i = 1;$i<=$jumlahPertemuan;$i++){
                    if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                        $data['jumlahsiswatugas'][$i] = $tugas[$i];
                        $data['persentasetugas'.$i] = ($tugas[$i] / $jumlahSiswa) * 100;
                    }
                }
              
            } else {
                $data['persentasetugas'.$i] = 0 * 100;
            }

            for($i = 1;$i<=$jumlahPertemuan;$i++){
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $quiz[$i] = $this->Admin_model->getTotalHasilQuiz($i);
                }
                
            }
            if ($jumlahSiswa != 0) {
              
                for($i = 1;$i<=$jumlahPertemuan;$i++){
                    if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                        $data['jumlahsiswaquiz'][$i] = $quiz[$i];
                        $data['persentasequiz'.$i] = ($quiz[$i] / $jumlahSiswa) * 100;
                    }
                }
              
            } else {
                $data['persentasequiz'.$i] = 0 * 100;
            }

            $pertemuan = $this->Kelolapertemuan_model->getPertemuan();
            $data['pertemuan'] = array();

            // Membuat array baru untuk menyimpan data pertemuan dengan indeks dimulai dari 1
            foreach ($pertemuan as $item) {
                $data['pertemuan'][$item['id_pertemuan']] = $item;
            }
            $totalPertemuan = $jumlahPertemuan; 
            for ($i = 1; $i <= $totalPertemuan; $i++) {
                if (!isset($data['pertemuan'][$i])) {
                    $data['pertemuan'][$i] = null;
                }
            }
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['jumlahpertemuan'] = $jumlahPertemuan;
            $data['nilaiTertinggi'] = $this->Admin_model->getNilaiTertinggi();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/home/index', $data);
            $this->load->view('admin/template/footer');
        
    }
}
