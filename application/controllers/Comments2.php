<?php

class Comments2 extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('comments2_model');
    }

    public function index() {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1){
            $data['title'] = "Komentar Pertemuan 2";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments2_model->get_comments();
              $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/komentar/comments2', $data);
            $this->load->view('backend/admin/footer');
        }
        else if ($this->session->userdata('email') != '') {
         $data['title'] = "Komentar Pertemuan 2";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments2_model->get_comments();
              $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/komentar/comments2', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }   
    }
    public function save_comment() {

        if($this->session->userdata('email') != ''){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => 0 // Set parent_id sebagai 0 untuk komentar utama
        );

        $this->comments2_model->save_comment($data);
        redirect('Comments2');
    }
    }

    public function save_reply() {
       if($this->session->userdata('email') != ''){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => $this->input->post('parent_id')
        );

        $this->comments2_model->save_reply($data);
        redirect('Comments2');
    }
    }
}
