<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenilaiPertemuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaipertemuan_model');
        // Load the user agent library
        $this->load->library('user_agent');

    }

    public function index($id = '')
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            if($id >= 1 && $id <= 4){
                $data['title'] = "Hasil Pertemuan ". $id;
                $data['user'] = $this->Menilaipertemuan_model->getUserByEmail($this->session->userdata('email'));
                // Join id_siswa dengan table siswa
                $data['hasiltugas'] = $this->Menilaipertemuan_model->getHasilTugasPertemuan($id);
                $data['pertemuan'] = $id;
                $this->load->view('backend/admin/header', $data);
                $this->load->view('backend/admin/sidebar', $data);
                $this->load->view('backend/admin/hasiltugas', $data);
                $this->load->view('backend/admin/footer');
            }else{
                redirect('Menilai');
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
            $data['user'] = $this->Menilaipertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Menilaipertemuan_model->getHasilTugasById($id);
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
            $this->Menilaipertemuan_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('MenilaiPertemuan/'.$pertemuan);
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
            $this->Menilaipertemuan_model->updateHasilTugas($id, $data);
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
