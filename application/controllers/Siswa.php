<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
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
            $tugas1 = $this->Siswa_model->getTugasCount($this->session->userdata('id'), 1);
            $tugas2 = $this->Siswa_model->getTugasCount($this->session->userdata('id'), 2);
            $tugas3 = $this->Siswa_model->getTugasCount($this->session->userdata('id'), 3);
            $tugas4 = $this->Siswa_model->getTugasCount($this->session->userdata('id'), 4);
            $jumlah = $tugas1 + $tugas2 + $tugas3 + $tugas4;
            $data['persentasetugas'] = ($jumlah / 4) * 100;
            $data['ranking'] = $this->Siswa_model->getRanking();
            $data['persentasetest'] = ($pretest + $posttest) / 2 * 100;
            $belumSelesai = "";
            $sudahSelesai = "";

            $tesSudah = "";
            if ($pretest != 0) {
                $tesSudah = $tesSudah . "Pretest, ";
            }
            if ($posttest != 0) {
                $tesSudah = $tesSudah . "Posttest ";
            }

            if ($tugas1 == 0) {
                $belumSelesai = $belumSelesai . "Tugas 1, ";
            } else {
                $sudahSelesai = $sudahSelesai . "Tugas 1, ";
            }
            if ($tugas2 == 0) {
                $belumSelesai = $belumSelesai . "Tugas 2, ";
            } else {
                $sudahSelesai = $sudahSelesai . "Tugas 2, ";
            }
            if ($tugas3 == 0) {
                $belumSelesai = $belumSelesai . "Tugas 3, ";
            } else {
                $sudahSelesai = $sudahSelesai . "Tugas 3, ";
            }
            if ($tugas4 == 0) {
                $belumSelesai = $belumSelesai . "Tugas 4 ";
            } else {
                $sudahSelesai = $sudahSelesai . "Tugas 4 ";
            }

            $data['tesSudah'] = $tesSudah;
            $data['sudahSelesai'] = $sudahSelesai;
            $data['belumSelesai'] = $belumSelesai;

            $data['tugasbelumselesai'] = array();
            if ($tugas1 == 0) {
                array_push($data['tugasbelumselesai'], "Tugas 1");
            }
            if ($tugas2 == 0) {
                array_push($data['tugasbelumselesai'], "Tugas 2");
            }
            if ($tugas3 == 0) {
                array_push($data['tugasbelumselesai'], "Tugas 3");
            }
            if ($tugas4 == 0) {
                array_push($data['tugasbelumselesai'], "Tugas 4");
            }

            $data['siswa'] = $this->Siswa_model->getSiswaByRole(0);

            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/index', $data);
            $this->load->view('backend/siswa/footer');
        
    } 
}
