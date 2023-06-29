<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenilaiPertemuan4 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaipertemuan4_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 4";
            $data['user'] = $this->Menilaipertemuan4_model->getUserByEmail($this->session->userdata('email'));
            // Join id_siswa dengan table siswa
            $data['hasiltugas'] = $this->Menilaipertemuan4_model->getHasilTugasPertemuan(4);
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasil4', $data);
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
            $data['title'] = "Hasil Pertemuan 4";
            $data['user'] = $this->Menilaipertemuan4_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan4'] = $this->Menilaipertemuan4_model->getHasilTugasById($id);
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/nilaitugas4', $data);
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
            $this->Menilaipertemuan4_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('MenilaiPertemuan4');
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
            $this->Menilaipertemuan4_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect('MenilaiPertemuan4');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

}
