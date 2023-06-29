<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenilaiPertemuan1 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaipertemuan1_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 1";
            $data['user'] = $this->Menilaipertemuan1_model->getUserByEmail($this->session->userdata('email'));
            // Join id_siswa dengan table siswa
            $data['hasiltugas'] = $this->Menilaipertemuan1_model->getHasilTugasPertemuan(1);
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasil1', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function menilaiById($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 1";
            $data['user'] = $this->Menilaipertemuan1_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan1'] = $this->Menilaipertemuan1_model->getHasilTugasById($id);
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/nilaitugas1', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function runMenilai()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            // Run edit
            $id = $this->input->post('id_hasiltugas');
            $nilai = $this->input->post('nilai');
            $komentar = $this->input->post('komentar');
            $data = [
                'nilai' => $nilai,
                'komentar' => $komentar
            ];
            $this->Menilaipertemuan1_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('MenilaiPertemuan1');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function deleteMenilai($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            // Menghapus by id
            $data = [
                'nilai' => null,
                'komentar' => null
            ];
            $this->Menilaipertemuan1_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect('MenilaiPertemuan1');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

}
