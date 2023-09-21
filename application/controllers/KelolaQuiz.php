<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaQuiz extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolaquiz_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }


     public function index()
    {
            $data['title'] = "Quiz";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaquiz_model->getQuiz();
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolaquiz/quiz', $data);
            $this->load->view('admin/template/footer');
        
    }

    public function tambahQuiz()
    {

            $soal = $this->input->post('soal');
            $opsi_a = $this->input->post('a');
            $opsi_b = $this->input->post('b');
            $opsi_c = $this->input->post('c');
            $opsi_d = $this->input->post('d');
            $opsi_e = $this->input->post('e');
            $kunci = $this->input->post('kunci');
            $pertemuan = $this->input->post('pertemuan');

            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/quiz/';
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
                'id_pertemuan' => $pertemuan
            ];
            $this->Kelolaquiz_model->tambahQuiz($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil ditambahkan!</div>');

            redirect('kelolaquiz');
        
    }

    public function hapusQuiz($id)
    {

            //delete soal and unlink picture by id 
            $quiz = $this->Kelolaquiz_model->getQuizById($id);
            $gambar = $quiz['gambar'];
            unlink(FCPATH . 'assets/img/quiz/' . $gambar);
            $this->Kelolaquiz_model->hapusQuiz($id);
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            //Hapus juga file gambarnya


            redirect('kelolaquiz');
        
    }

    public function editQuiz($id)
    {
            $data['title'] = "Edit Quiz";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaquiz_model->getQuizById($id);
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolaquiz/editquiz', $data);
            $this->load->view('admin/template/footer');
        
    }

    public function runEditQuiz()
    {
            $id_soal = $this->input->post('id_soal');
            $soal = $this->input->post('soal');
            $pertemuan = $this->input->post('pertemuan');
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
                $config['upload_path'] = './assets/img/quiz/';
                $this->load->library('upload', $config);
                unlink(FCPATH . 'assets/img/quiz/' . $gambar_lama);
                if ($this->upload->do_upload('gambar')) {                   
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
                
            }else{
                //Jika tidak dimasukan gambar baru hapus saja yang sebelumnya
                unlink(FCPATH . 'assets/img/quiz/' . $gambar_lama);
            }
            $data = [
                'soal' => $soal,
                'opsi_a' => $opsi_a,
                'opsi_b' => $opsi_b,
                'opsi_c' => $opsi_c,
                'opsi_d' => $opsi_d,
                'opsi_e' => $opsi_e,
                'id_pertemuan' => $pertemuan,
                'kunci' => $kunci,
                'gambar' => $gambar
            ];
            $this->Kelolaquiz_model->updateQuiz($id_soal, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil diedit!</div>');

            redirect('kelolaquiz');
        
    }


   
}
