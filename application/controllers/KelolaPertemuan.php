<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPertemuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolapertemuan_model'); // Load the KelolaPertemuan_model
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Atur Pertemuan";
            $data['user'] = $this->Kelolapertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/aturpertemuan', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function aktifkanPertemuan($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $this->Kelolapertemuan_model->aktifkanPertemuan($id);
            redirect('KelolaPertemuan');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function matikanPertemuan($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $this->Kelolapertemuan_model->matikanPertemuan($id);
            redirect('KelolaPertemuan');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function editTp($id){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Edit Tujuan Pembelajaran";
            $data['user'] = $this->Kelolapertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolapertemuan_model->getPertemuanbyId($id);

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/edittp', $data);
            $this->load->view('backend/admin/footer');

        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }

    }
    public function runEditTp(){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
           $tp = $this->input->post('tp');
           $id_pertemuan = $this->input->post('id_pertemuan');
           $link = $this->input->post('link');
           $this->Kelolapertemuan_model->editTp($id_pertemuan,$tp,$link);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tujuan Pembelajaran berhasil diubah!</div>');
           redirect('KelolaPertemuan');
                
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }

    }

}
