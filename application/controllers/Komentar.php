<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Komentar_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Komentar";
            $data['user'] = $this->Komentar_model->getUserByEmail($this->session->userdata('email'));
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/komentar', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function halamanKomentar($id = ''){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1){
              if($id == ''){
                redirect('Komentar');
              }
              if ($id >= 1 && $id <= 4) {
                $data['title'] = "Komentar Pertemuan ". $id;
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['pertemuan'] = $id;
                $data['comments'] = $this->Komentar_model->get_comments($id);
                $this->load->view('backend/admin/header', $data);
                $this->load->view('backend/admin/sidebar', $data);
                $this->load->view('backend/admin/comments', $data);
                $this->load->view('backend/admin/footer');
            }else{
                redirect('Komentar');
            }
        }else{
            redirect('Auth');
        }

    }

    public function save_comment()
    {
        // Proses menyimpan komentar
        if ($this->session->userdata('email') != ''){
            $pertemuan = $this->input->post('pertemuan');
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => 0, // Set parent_id sebagai 0 untuk komentar utama
                'pertemuan' => $pertemuan
            );

            $this->Komentar_model->save_comment($data);
            redirect('Komentar/halamanKomentar/'.$pertemuan);
        }
    }

    public function save_reply()
    {
        if ($this->session->userdata('email') != ''){
            $pertemuan = $this->input->post('pertemuan');
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => $this->input->post('parent_id'),
                'pertemuan' => $pertemuan
            );

            $this->Komentar_model->save_reply($data);
            redirect('Komentar/halamanKomentar/'.$pertemuan);
        }
    }

}
