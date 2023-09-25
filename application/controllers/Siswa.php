<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        checkRole(0); 
    }
    public function index()
    {

            $data['title'] = "Home Siswa";
            $data['kelompok'] = $this->Siswa_model->getKelompokByIdUser($this->session->userdata('id'));
            $data['user'] = $this->Siswa_model->getUserByEmail($this->session->userdata('email'));
            $data['jumlahSiswa'] = $this->Siswa_model->getJumlahSiswa();
            $data['notifchat'] = $this->Chat_model->getChatData();

            $pretest = $this->Siswa_model->getPretestCount($this->session->userdata('id'));
            $posttest = $this->Siswa_model->getPosttestCount($this->session->userdata('id'));
            $pertemuan = $this->Kelolapertemuan_model->getPertemuan();
            //Mendapatkan jumlah Pertemuan
            $countPertemuan = count($pertemuan);
            //Mendapatkan id_pertemuan terakhir
            $maxPertemuan = $this->Kelolapertemuan_model->getMax();
            for($i = 1; $i<=$maxPertemuan; $i++){
                //Jika id_pertemuan ada pada table tb_pertemuan
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $tugas[$i] = $this->Siswa_model->getTugasCount($this->session->userdata('id'), $i);
                    $quiz[$i] = $this->Siswa_model->getQuizCount($this->session->userdata('id'), $i);
                 }
            }
            $jumlah = 0;
            for($i = 1;$i<=$maxPertemuan;$i++){
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $jumlah = $jumlah + $tugas[$i];
                } 
               
            }
            for($i = 1;$i<=$maxPertemuan;$i++){
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $jumlah = $jumlah + $quiz[$i];
                } 
               
            }
            $data['persentasetugas'] = ($jumlah / ($countPertemuan * 2)) * 100;
            $data['ranking'] = $this->Siswa_model->getRanking();
            $data['persentasetest'] = ($pretest + $posttest) / 2 * 100;
            $belumSelesai = "";
            $sudahSelesai = "";
            $tesSudah = "";

            if ($pretest != null) {
                $tesSudah = $tesSudah . "Pretest, ";
            }
            if ($posttest != null) {
                $tesSudah = $tesSudah . "Posttest ";
            }
            for($i = 1;$i<=$maxPertemuan;$i++){

                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    if ($tugas[$i] != null ) {
                    $sudahSelesai = $sudahSelesai . "Tugas " . $i . ", ";
                    }else{
                        $belumSelesai = $belumSelesai . "Tugas " . $i . ", ";
                    }
                }
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    if ($quiz[$i] != null ) {
                    $sudahSelesai = $sudahSelesai . "Quiz " . $i . ", ";
                    }else{
                        $belumSelesai = $belumSelesai . "Quiz " . $i . ", ";
                    }
                }
            }
            $data['tesSudah'] = $tesSudah;
            $data['sudahSelesai'] = $sudahSelesai;
            $data['belumSelesai'] = $belumSelesai;
            $data['siswa'] = $this->Siswa_model->getSiswaByRole(0);
            $this->load->view('siswa/template/header', $data);
            $this->load->view('siswa/template/sidebar', $data);
            $this->load->view('siswa/home/index', $data);
            $this->load->view('siswa/template/footer');
        
    } 
    
}
