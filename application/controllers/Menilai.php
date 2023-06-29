<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilai_model');
        // Load the user agent library
        $this->load->library('user_agent');

    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            // Select siswa from database
            $data['siswa'] = $this->Menilai_model->getSiswa();
            $data['title'] = 'Menilai';
            $data['user'] = $this->Menilai_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Menilai_model->getMateri();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/tugastes', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function MenilaiPertemuan($id = '')
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            if($id >= 1 && $id <= 4){
                $data['title'] = "Hasil Pertemuan ". $id;
                $data['user'] = $this->Menilai_model->getUserByEmail($this->session->userdata('email'));
                // Join id_siswa dengan table siswa
                $data['hasiltugas'] = $this->Menilai_model->getHasilTugasPertemuan($id);
                $data['pertemuan'] = $id;
                $this->load->view('backend/admin/header', $data);
                $this->load->view('backend/admin/sidebar', $data);
                $this->load->view('backend/admin/hasil', $data);
                $this->load->view('backend/admin/footer');
            }
            
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function menilaiById($id = '')
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Tugas";
            $data['user'] = $this->Menilai_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Menilai_model->getHasilTugasById($id);
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/nilaitugas', $data);
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
            $pertemuan = $this->input->post('pertemuan');
            $data = [
                'nilai' => $nilai,
                'komentar' => $komentar
            ];
            $this->Menilai_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('Menilai/menilaiPertemuan/'.$pertemuan);
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
            $this->Menilai_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect($this->agent->referrer());
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    

}
