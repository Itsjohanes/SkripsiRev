<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilaipertemuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaipertemuan_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        // Load the user agent library
        $this->load->library('user_agent');
        checkRole(1);

    }

    public function index($id = '')
    {
            $pertemuan = $this->Kelolapertemuan_model->getPertemuanbyId($id);

            if($pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Hasil Pertemuan ". $id;
                $data['user'] = $this->Menilaipertemuan_model->getUserByEmail($this->session->userdata('email'));
                $data['hasiltugas'] = $this->Menilaipertemuan_model->getHasilTugasPertemuan($id);
                $data['pertemuan'] = $id;
                $this->load->view('guru/template/header', $data);
                $this->load->view('guru/template/sidebar', $data);
                $this->load->view('guru/menilaipertemuan/hasiltugas', $data);
                $this->load->view('guru/template/footer');
            }else{
                redirect('menilai');
            }
            
       
    }

    public function menilaiById($id = '')
    {
            $data['title'] = "Hasil Tugas";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Menilaipertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Menilaipertemuan_model->getHasilTugasById($id);
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/template/sidebar', $data);
            $this->load->view('guru/menilaipertemuan/menilaitugas', $data);
            $this->load->view('guru/template/footer');
        
    }

    public function runMenilai()
    {
            // Run edit
            $id = $this->input->post('id_hasiltugas');
            $nilai = $this->input->post('nilai');
            $komentar = $this->input->post('komentar');
            $pertemuan = $this->input->post('pertemuan');
            $penilaian = $this->input->post('penilaian');
            $nilai_sikap = $this->input->post('nilai_sikap');
            $penilaian_sikap = $this->input->post('penilaian_sikap');
            $data = [
                'penilaian' => $penilaian,
                'penilaian_sikap' => $penilaian_sikap,
                'nilai_sikap' => $nilai_sikap,
                'nilai' => $nilai,
                'komentar' => $komentar,
                'scored_at' => date('Y-m-d H:i:s')
            ];
            $this->Menilaipertemuan_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('menilaipertemuan/'.$pertemuan);
        
    }

    public function deleteMenilai($id)
    {
            // Menghapus by id
            $data = [
                'penilaian' => null,
                'nilai' => null,
                'komentar' => null,
                'scored_at' => null
            ];
            $this->Menilaipertemuan_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect($this->agent->referrer());
        
    }

    

}
