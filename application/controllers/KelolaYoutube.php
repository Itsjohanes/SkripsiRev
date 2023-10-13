<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaYoutube extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Kelolayoutube_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = 'Youtube';
            $data['user'] = $this->Kelolayoutube_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolayoutube_model->getYoutubeMateri();
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $data['notifchat'] = $this->Chat_model->getChatData();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolayoutube/youtube', $data);
            $this->load->view('admin/template/footer');
        
    }

    public function tambahYoutube()
    {
            $pertemuan = $this->input->post('pertemuan');
            $link = $this->input->post('link');
            $kategori = $this->input->post('kategori');
            $data = array(
                'id_pertemuan' => $pertemuan,
                'youtube' => $link,
                'kategori' =>$kategori
            );
            $this->Kelolayoutube_model->tambahYoutubeMateri($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Video Berhasil ditambahkan!</div>');

            redirect('kelolayoutube');

        
    }

    public function hapusYoutube($id)
    {
            $this->Kelolayoutube_model->hapusYoutubeMateri($id);

            $this->session->set_flashdata('category_success', 'Video berhasil dihapus');
            redirect('kelolayoutube');
        
    }

    public function editYoutube($id_youtube)
    {
            $data['title'] = 'Edit Youtube';
            $data['user'] = $this->Kelolayoutube_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolayoutube_model->getYoutubeMateriById($id_youtube);
            $data['notifchat'] = $this->Chat_model->getChatData();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolayoutube/edityoutube', $data);
            $this->load->view('admin/template/footer');
        
    }

    public function runEditYoutube()
    {
            $id_youtube = $this->input->post('id_youtube');
            $pertemuan = $this->input->post('pertemuan');
            $youtube = $this->input->post('youtube');
            $kategori = $this->input->post('kategori');
            $data = array(
                'id_pertemuan' => $pertemuan,
                'youtube' => $youtube,
                'kategori' =>$kategori
            );
            $this->Kelolayoutube_model->updateYoutubeMateri($id_youtube, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Video Berhasil diubah!</div>');

            redirect('kelolayoutube');
       
    }

}
