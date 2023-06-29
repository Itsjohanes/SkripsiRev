<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HalamanKomentar3 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Comments3_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1){
            $data['title'] = "Komentar Pertemuan 3";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->Comments3_model->get_comments();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/comments3', $data);
            $this->load->view('backend/admin/footer');
        }else{
            redirect('Auth');
        }
    }

    public function save_comment()
    {
        // Proses menyimpan komentar
        if ($this->session->userdata('email') != ''){
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => 0, // Set parent_id sebagai 0 untuk komentar utama
                'pertemuan' => 3
            );

            $this->Comments3_model->save_comment($data);
            redirect('HalamanKomentar3');
        }
    }

    public function save_reply()
    {
        if ($this->session->userdata('email') != ''){
            // Proses menyimpan reply
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => $this->input->post('parent_id'),
                'pertemuan' => 3
            );

            $this->Comments3_model->save_reply($data);
            redirect('HalamanKomentar3');
        }
    }

}
