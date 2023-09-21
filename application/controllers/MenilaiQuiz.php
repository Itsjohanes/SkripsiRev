<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenilaiQuiz extends CI_Controller {

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
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/menilaiquiz/hasilquiz', $data);
            $this->load->view('admin/template/footer');
        
    }
}
