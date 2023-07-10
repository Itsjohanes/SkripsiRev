<?php

class Materi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Materi_model'); // Load the model
        checkRole(0);
    }

    public function index() {
            $data['title'] = "Materi";
            $data['user'] = $this->Materi_model->getUserByEmail($this->session->userdata('email'));
            $data['jumlahSiswa'] = $this->Materi_model->getJumlahSiswa();
            $pretest = $this->Materi_model->getJumlahPretest($this->session->userdata('id'));
            $posttest = $this->Materi_model->getJumlahPosttest($this->session->userdata('id'));
            $tugas1 = $this->Materi_model->getJumlahTugas($this->session->userdata('id'), 1);
            $tugas2 = $this->Materi_model->getJumlahTugas($this->session->userdata('id'), 2);
            $tugas3 = $this->Materi_model->getJumlahTugas($this->session->userdata('id'), 3);
            $tugas4 = $this->Materi_model->getJumlahTugas($this->session->userdata('id'), 4);
            $data['pretest'] = $pretest;
            $data['posttest'] = $posttest;
            $data['tugas1'] = $tugas1;
            $data['tugas2'] = $tugas2;
            $data['tugas3'] = $tugas3;
            $data['tugas4'] = $tugas4;
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
