<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPretest extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolapretest_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }


     public function index()
    {
            $data['title'] = "Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolapretest_model->getPretest();
            //select aktif dari tb_test
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['aktif'] = $this->db->get_where('tb_test', ['id_tes' => 1])->row_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/pretest', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function tambahPreTest()
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
                $config['upload_path'] = './assets/img/pretest/';
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
                'id_test' => 1
            ];
            $this->Kelolapretest_model->tambahPretest($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil ditambahkan!</div>');

            redirect('kelolapretest');
        
    }

    public function hapusPretest($id)
    {

            //delete soal and unlink picture by id 
            $pretest = $this->Kelolapretest_model->getPretestById($id);
            $gambar = $pretest['gambar'];
            unlink(FCPATH . 'assets/img/pretest/' . $gambar);
            $this->Kelolapretest_model->hapusPretest($id);
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            //Hapus juga file gambarnya


            redirect('kelolapretest');
        
    }

    public function editPretest($id)
    {
            $data['title'] = "Edit Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolapretest_model->getPretestById($id);
            $data['notifchat'] = $this->Chat_model->getChatData();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editPretest', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function runEditPreTest()
    {
            $id_pretest = $this->input->post('id_pretest');
            $soal = $this->input->post('soal');
            $gambar_lama = $this->input->post('gambar_lama');
            $opsi_a = $this->input->post('opsi_a');
            $opsi_b = $this->input->post('opsi_b');
            $opsi_c = $this->input->post('opsi_c');
            $opsi_d = $this->input->post('opsi_d');
            $opsi_e = $this->input->post('opsi_e');
            $kunci = $this->input->post('kunci');
            $gambar = $_FILES['gambar']['name'];
            //jika gambar lama sama dengan gambar baru tidak perlu diganti
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pretest/';
                $this->load->library('upload', $config);
                unlink(FCPATH . 'assets/img/pretest/' . $gambar_lama);
                if ($this->upload->do_upload('gambar')) {                   
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
                
            }else{
                //Jika tidak dimasukan gambar baru hapus saja yang sebelumnya
                unlink(FCPATH . 'assets/img/pretest/' . $gambar_lama);
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
            $this->Kelolapretest_model->updatePretest($id_pretest, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil diedit!</div>');

            redirect('kelolapretest');
        
    }


    public function preTestHandler(){
        if ($this->input->post('pretes')) {
        $this->activasiPretest();
    } else {
        $this->mematikanPretest();
    }

    }
    public function aturWaktu(){
        $waktu = $this->input->post('waktu');
        $data = [
            'waktu' => $waktu
        ];
        $this->Kelolapretest_model->aturWaktu($data);
        redirect('kelolapretest');
    }

    public function activasiPretest(){
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 1);
            $this->db->where('id_tes', 1);
            $this->db->update('tb_test');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pretest telah diaktifkan</div>');

            redirect('kelolapretest');


        
    }
    public function mematikanPretest(){
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 0);
            $this->db->where('id_tes', 1);
            $this->db->update('tb_test');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pretest telah dimatikan</div>');

            redirect('kelolapretest');

        
    }
}
