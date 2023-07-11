<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPertemuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolapertemuan_model'); // Load the KelolaPertemuan_model
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Atur Pertemuan";
            $data['user'] = $this->Kelolapertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
        
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/aturpertemuan', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function aktifkanPertemuan($id)
    {
       
            $this->Kelolapertemuan_model->aktifkanPertemuan($id);
            redirect('kelolapertemuan');
        
    }

    public function matikanPertemuan($id)
    {
            $this->Kelolapertemuan_model->matikanPertemuan($id);
            redirect('kelolapertemuan');
        
    }
    public function editTp($id){
            $data['title'] = "Edit Tujuan Pembelajaran";
            $data['user'] = $this->Kelolapertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolapertemuan_model->getPertemuanbyId($id);

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/edittp', $data);
            $this->load->view('backend/admin/footer');

       

    }
    public function runEditTp(){
           $tp = $this->input->post('tp');
           $id_pertemuan = $this->input->post('id_pertemuan');
           $link = $this->input->post('link');
           $this->Kelolapertemuan_model->editTp($id_pertemuan,$tp,$link);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tujuan Pembelajaran berhasil diubah!</div>');
           redirect('kelolapertemuan');
    }

}
