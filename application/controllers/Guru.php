<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        checkRole(1);
       
    }
    public function index()
    {
            $data['title'] = "Home Guru";
            $data['user'] = $this->Guru_model->getUserByEmail($this->session->userdata('email'));
            $data['siswa'] = $this->Guru_model->getTotalStudents();
            $data['pretest'] = $this->Guru_model->getTotalPretests();
            $data['posttest'] = $this->Guru_model->getTotalPosttests();
            $data['ranking'] = $this->Guru_model->getRanking();
            $jumlahSiswa = $this->Guru_model->getTotalStudents();
            $jumlahPretest = $this->Guru_model->getTotalHasilPretest();
            $jumlahPosttest = $this->Guru_model->getTotalHasilPosttest();
            
            $jumlahPertemuan = $this->Kelolapertemuan_model->getMax();
            for($i = 1;$i<=$jumlahPertemuan;$i++){
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $tugas[$i] = $this->Guru_model->getTotalHasilTugas($i);
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
                    $quiz[$i] = $this->Guru_model->getTotalHasilQuiz($i);
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
            $data['nilaiTertinggi'] = $this->Guru_model->getNilaiTertinggi();
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/template/sidebar', $data);
            $this->load->view('guru/home/index', $data);
            $this->load->view('guru/template/footer');
        
    }
}
