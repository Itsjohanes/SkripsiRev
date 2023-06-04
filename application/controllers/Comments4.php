<?php

class Comments4 extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('comments4_model');
    }

    public function index() {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1){
            $data['title'] = "Komentar Pertemuan 4";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments4_model->get_comments();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/komentar/comments4', $data);
            $this->load->view('backend/admin/footer');
        }
        else if ($this->session->userdata('email') != '') {
            $data['title'] = "Komentar Pertemuan 4";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments4_model->get_comments();
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/komentar/comments4', $data);
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
            'parent_id' => 0 
        );

        $this->comments4_model->save_comment($data);
        redirect('Comments4');
        }
    }
    public function save_reply() {
        if($this->session->userdata('email') != ''){

            $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => $this->input->post('parent_id')
        );

        $this->comments4_model->save_reply($data);
        redirect('Comments4');

        } 
    }
}
