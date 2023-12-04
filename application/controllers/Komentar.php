<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Komentar_model');
        $this->load->model('Chat_model');
        $this->load->model('Kelolapertemuan_model');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Komentar";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Komentar_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/template/sidebar', $data);
            $this->load->view('guru/komentar/komentar', $data);
            $this->load->view('guru/template/footer');
        
    }
    public function halamanKomentar($id = ''){
        
              $pertemuan = $this->Kelolapertemuan_model->getPertemuanbyId($id);
              if ($pertemuan) {
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Komentar Pertemuan ". $id;
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['pertemuan'] = $id;
                $data['comments'] = $this->Komentar_model->get_comments($id);
                $this->load->view('guru/template/header', $data);
                $this->load->view('guru/template/sidebar', $data);
                $this->load->view('guru/komentar/tambahkomentar', $data);
                $this->load->view('guru/template/footer');
            }else{
                redirect('komentar');
            }
       

    }

    public function save_comment()
    {
        // Proses menyimpan komentar
            $pertemuan = $this->input->post('pertemuan');
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => 0, // Set parent_id sebagai 0 untuk komentar utama
                'id_pertemuan' => $pertemuan
            );

            $this->Komentar_model->save_comment($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komentar berhasil terkirim</div>');

            redirect('komentar/halamankomentar/'.$pertemuan);
        
    }

    public function save_reply()
    {
            $pertemuan = $this->input->post('pertemuan');
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => $this->input->post('parent_id'),
                'id_pertemuan' => $pertemuan
            );

            $this->Komentar_model->save_reply($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Reply berhasil terkirim</div>');

            redirect('komentar/halamankomentar/'.$pertemuan);
        
    }

}
