<?php

class Comments extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('comments_model');
    }

    public function index() {
         if ($this->session->userdata('email') != '') {
            $data['title'] = "Komentar";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments_model->get_comments();
            $this->load->view('backend/komentar/comments', $data);
        } else {
            redirect('Auth/backLogin');
        }

        
    }

    public function save_comment() {
        // Proses menyimpan komentar
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => 0 // Set parent_id sebagai 0 untuk komentar utama
        );

        $this->comments_model->save_comment($data);
        redirect('comments');
    }

    public function save_reply() {
        // Proses menyimpan reply
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => $this->input->post('parent_id')
        );

        $this->comments_model->save_reply($data);
        redirect('comments');
    }
}
