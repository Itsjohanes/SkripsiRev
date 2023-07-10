<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaYoutube extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Kelolayoutube_model');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = 'Youtube';
            $data['user'] = $this->Kelolayoutube_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolayoutube_model->getYoutubeMateri();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/youtube', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function tambahYoutube()
    {
            $pertemuan = $this->input->post('pertemuan');
            $link = $this->input->post('link');
            $data = array(
                'id_pertemuan' => $pertemuan,
                'youtube' => $link
            );
            $this->Kelolayoutube_model->tambahYoutubeMateri($data);
            redirect('KelolaYoutube');
        
    }

    public function hapusYoutube($id)
    {
            $this->Kelolayoutube_model->hapusYoutubeMateri($id);

            $this->session->set_flashdata('category_success', 'Materi berhasil dihapus');
            redirect('KelolaYoutube');
        
    }

    public function editYoutube($id_materi)
    {
            $data['title'] = 'Edit Youtube';
            $data['user'] = $this->Kelolayoutube_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolayoutube_model->getYoutubeMateriById($id_materi);

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/edityoutube', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function runEditYoutube()
    {
            $id_materi = $this->input->post('id_materi');
            $pertemuan = $this->input->post('pertemuan');
            $youtube = $this->input->post('youtube');
            $data = array(
                'id_pertemuan' => $pertemuan,
                'youtube' => $youtube
            );
            $this->Kelolayoutube_model->updateYoutubeMateri($id_materi, $data);
            redirect('KelolaYoutube');
       
    }

}
