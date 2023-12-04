<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilaiquiz extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaiquiz_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }

    public function index($id = '')
    {
            $data['title'] = "Hasil Quiz Pertemuan " . $id;
            $data['user'] = $this->Menilaiquiz_model->getUserByEmail($this->session->userdata('email'));
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['quiz'] = $this->Menilaiquiz_model->getHasilQuiz($id);
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/template/sidebar', $data);
            $this->load->view('guru/menilaiquiz/hasilquiz', $data);
            $this->load->view('guru/template/footer');
        
    }
    public function delete($id = ''){
        //mendapat pertemuan
        $this->db->select('*');
        $this->db->from('tb_hasilquiz');
        $this->db->where('id_hasilquiz', $id);
        $data = $this->db->get()->row_array();
        var_dump($data);
        $id_pertemuan = $data['id_pertemuan'];
        $id_siswa = $data['id_siswa'];
        $this->Menilaiquiz_model->deleteHasilQuiz($id,$id_pertemuan,$id_siswa);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('menilaiquiz');
    }
}
