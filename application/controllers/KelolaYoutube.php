<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaYoutube extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Kelolayoutube_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = 'Youtube';
            $data['user'] = $this->Kelolayoutube_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolayoutube_model->getYoutubeMateri();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/youtube', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function tambahYoutube()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $pertemuan = $this->input->post('pertemuan');
            $link = $this->input->post('link');
            $data = array(
                'pertemuan' => $pertemuan,
                'youtube' => $link
            );
            $this->Kelolayoutube_model->tambahYoutubeMateri($data);
            redirect('KelolaYoutube');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function hapusYoutube($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $this->Kelolayoutube_model->hapusYoutubeMateri($id);

            $this->session->set_flashdata('category_success', 'Materi berhasil dihapus');
            redirect('KelolaYoutube');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function editYoutube($id_materi)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = 'Edit Youtube';
            $data['user'] = $this->Kelolayoutube_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolayoutube_model->getYoutubeMateriById($id_materi);

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/edityoutube', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function runEditYoutube()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $id_materi = $this->input->post('id_materi');
            $pertemuan = $this->input->post('pertemuan');
            $youtube = $this->input->post('youtube');
            $data = array(
                'pertemuan' => $pertemuan,
                'youtube' => $youtube
            );
            $this->Kelolayoutube_model->updateYoutubeMateri($id_materi, $data);
            redirect('KelolaYoutube');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

}
