<?php

class Materi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Materi_model'); // Load the model
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('ChatModel');
        checkRole(0);
    }

    public function index() {
            $data['title'] = "Materi";
            $data['notifchat'] = $this->ChatModel->getChatData();
            $pretest = $this->Materi_model->getJumlahPretest($this->session->userdata('id'));
            $posttest = $this->Materi_model->getJumlahPosttest($this->session->userdata('id'));
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $data['user'] = $this->Materi_model->getUserByEmail($this->session->userdata('email'));
            $data['jumlahSiswa'] = $this->Materi_model->getJumlahSiswa();
            $data['pretest'] = $pretest;
            $data['posttest'] = $posttest;
            $kelompok = $this->Materi_model->getKelompok($this->session->userdata('id'));
            if ($kelompok != '') {
                $data['siswa'] = $this->Materi_model->getSiswaByKelompok($kelompok['kelompok']);
            } else {
                $data['siswa'] = $this->Materi_model->getSiswaByKelompok(0);
            }

            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/materi', $data);
            $this->load->view('backend/siswa/footer');
        
    }
}
