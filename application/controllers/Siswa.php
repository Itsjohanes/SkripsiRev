<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Kelolapertemuan_model');
        checkRole(0); 
    }
    public function index()
    {

            $data['title'] = "Home Siswa";
            $data['kelompok'] = $this->Siswa_model->getKelompokByIdUser($this->session->userdata('id'));
            $data['user'] = $this->Siswa_model->getUserByEmail($this->session->userdata('email'));
            $data['jumlahSiswa'] = $this->Siswa_model->getJumlahSiswa();

            $pretest = $this->Siswa_model->getPretestCount($this->session->userdata('id'));
            $posttest = $this->Siswa_model->getPosttestCount($this->session->userdata('id'));
            $pertemuan = $this->Kelolapertemuan_model->getPertemuan();
            $countPertemuan = count($pertemuan);
            //Pertemuan dimulai dari 1
            for($i = 1; $i<=$countPertemuan; $i++){
                $tugas[$i] = $this->Siswa_model->getTugasCount($this->session->userdata('id'), $i);

            }
            $jumlah = 0;
            for($i = 1;$i<=$countPertemuan;$i++){
                 $jumlah = $jumlah + $tugas[$i];
            }

            $data['persentasetugas'] = ($jumlah / $countPertemuan) * 100;
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
            for($i = 1;$i<=$countPertemuan;$i++){
                if ($tugas[$i] != null) {
                    $sudahSelesai = $sudahSelesai . "Tugas " . $i . ", ";
                }else{
                    $belumSelesai = $belumSelesai . "Tugas " . $i . ", ";
                }
            }
            
            $data['tesSudah'] = $tesSudah;
            $data['sudahSelesai'] = $sudahSelesai;
            $data['belumSelesai'] = $belumSelesai;
            $data['siswa'] = $this->Siswa_model->getSiswaByRole(0);
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/index', $data);
            $this->load->view('backend/siswa/footer');
        
    } 
}
