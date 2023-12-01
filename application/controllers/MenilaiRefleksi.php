<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenilaiRefleksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilairefleksi_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        $this->load->library('user_agent');
        checkRole(1);

    }

    public function index($id = '')
    {
            $pertemuan = $this->Kelolapertemuan_model->getPertemuanbyId($id);

            if($pertemuan){
                $data['title'] = "Hasil Refleksi Pertemuan " . $id;
                $data['user'] = $this->Menilairefleksi_model->getUserByEmail($this->session->userdata('email'));
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['refleksi'] = $this->Menilairefleksi_model->getHasilRefleksi($id);
                $this->load->view('guru/template/header', $data);
                $this->load->view('guru/template/sidebar', $data);
                $this->load->view('guru/menilairefleksi/menilairefleksi', $data);
                $this->load->view('guru/template/footer');
            }else{
                redirect('menilai');
            }
    }
}
