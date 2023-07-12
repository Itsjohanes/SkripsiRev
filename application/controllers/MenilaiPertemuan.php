<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenilaiPertemuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaipertemuan_model');
        $this->load->model('Kelolapertemuan_model');
        // Load the user agent library
        $this->load->library('user_agent');
        checkRole(1);

    }

    public function index($id = '')
    {
            $pertemuan = $this->Kelolapertemuan_model->getPertemuanbyId($id);

            if($pertemuan){
                $data['title'] = "Hasil Pertemuan ". $id;
                $data['user'] = $this->Menilaipertemuan_model->getUserByEmail($this->session->userdata('email'));
                $data['hasiltugas'] = $this->Menilaipertemuan_model->getHasilTugasPertemuan($id);
                $data['pertemuan'] = $id;
                $this->load->view('backend/admin/header', $data);
                $this->load->view('backend/admin/sidebar', $data);
                $this->load->view('backend/admin/hasiltugas', $data);
                $this->load->view('backend/admin/footer');
            }else{
                redirect('menilai');
            }
            
       
    }

    public function menilaiById($id = '')
    {
            $data['title'] = "Hasil Tugas";
            $data['user'] = $this->Menilaipertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Menilaipertemuan_model->getHasilTugasById($id);
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/nilaitugas', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function runMenilai()
    {
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
            redirect('menilaipertemuan/'.$pertemuan);
        
    }

    public function deleteMenilai($id)
    {
            // Menghapus by id
            $data = [
                'nilai' => null,
                'komentar' => null
            ];
            $this->Menilaipertemuan_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect($this->agent->referrer());
        
    }

    

}
