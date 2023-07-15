<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPosttest extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolaposttest_model');
        $this->load->model('ChatModel');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Post-Test";
            $data['notifchat'] = $this->ChatModel->getChatData();
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaposttest_model->getPosttest();
            $data['aktif'] = $this->db->get_where('tb_test', ['id_tes' => 2])->row_array();
           
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/posttest', $data);
            $this->load->view('backend/admin/footer');
        
    }
    public function aturWaktu(){
        $waktu = $this->input->post('waktu');
        $data = [
            'waktu' => $waktu
        ];
        $this->Kelolaposttest_model->aturWaktu($data);
        redirect('kelolaposttest');
    }


    public function tambahPostTest()
    {
            //memasukan soal dan gambar ke tb_pretest
            
            $soal = $this->input->post('soal');
            $opsi_a = $this->input->post('a');
            $opsi_b = $this->input->post('b');
            $opsi_c = $this->input->post('c');
            $opsi_d = $this->input->post('d');
            $opsi_e = $this->input->post('e');
            $kunci = $this->input->post('kunci');

            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/posttest/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'soal' => $soal,
                'opsi_a' => $opsi_a,
                'opsi_b' => $opsi_b,
                'opsi_c' => $opsi_c,
                'opsi_d' => $opsi_d,
                'opsi_e' => $opsi_e,
                'kunci' => $kunci,
                'gambar' => $gambar,
                'id_test'=>2
            ];
            $this->Kelolaposttest_model->tambahPosttest($data);
            //Berikan alert soal berhasil ditambahkan
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil ditambahkan!</div>');



            redirect('kelolaposttest');
        
    }
    
    public function hapusPosttest($id)
    {
            //delete soal and unlink picture by id 
            $gambar = $this->Kelolaposttest_model->getPosttestById($id)['gambar'];
            unlink(FCPATH . 'assets/img/posttest/' . $gambar);
            $this->Kelolaposttest_model->hapusPosttest($id);
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            redirect('kelolaposttest');
        
    }

    public function editPostTest($id)
    {
            $data['title'] = 'Edit Post-Test';
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaposttest_model->getPosttestById($id);
            $data['notifchat'] = $this->ChatModel->getChatData();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editPostTest', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function runEditPostTest()
    {
            $id_posttest = $this->input->post('id_posttest');
            $soal = $this->input->post('soal');
            $gambar_lama = $this->input->post('gambar_lama');
            $opsi_a = $this->input->post('opsi_a');
            $opsi_b = $this->input->post('opsi_b');
            $opsi_c = $this->input->post('opsi_c');
            $opsi_d = $this->input->post('opsi_d');
            $opsi_e = $this->input->post('opsi_e');
            $kunci = $this->input->post('kunci');
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/posttest/';
                if ($gambar_lama != $gambar) {
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('gambar')) {
                        unlink(FCPATH . 'assets/img/posttest/' . $gambar_lama);
                        $gambar = $this->upload->data('file_name');
                    } else {
                        echo $this->upload->display_errors();
                    }
                } else {
                    $gambar = $gambar_lama;
                }
            }
            $data = [
                'soal' => $soal,
                'opsi_a' => $opsi_a,
                'opsi_b' => $opsi_b,
                'opsi_c' => $opsi_c,
                'opsi_d' => $opsi_d,
                'opsi_e' => $opsi_e,
                'kunci' => $kunci,
                'gambar' => $gambar
            ];
            $this->Kelolaposttest_model->updatePosttest($id_posttest, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil diedit!</div>');

            redirect('kelolaposttest');
        
    }
     public function postTestHandler(){
        if ($this->input->post('posttes')) {
        $this->activasiPosttest();
    } else {
        $this->mematikanPosttest();
    }

    }

    public function activasiPosttest(){
            $this->db->set('aktif', 1);
            $this->db->where('id_tes', 2);
            $this->db->update('tb_test');
            redirect('kelolaposttest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Posttest telah diaktifkan</div>');


        
    }
    public function mematikanPosttest(){
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 0);
            $this->db->where('id_tes', 2);
            $this->db->update('tb_test');
            redirect('kelolaposttest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Posttest telah dimatikan</div>');

        
    }
}
