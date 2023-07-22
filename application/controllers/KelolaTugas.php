<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Kelolatugas_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('ChatModel');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = 'Tugas';
            $data['user'] = $this->Kelolatugas_model->getUserByEmail($this->session->userdata('email'));
            $data['tugas'] = $this->Kelolatugas_model->getTugas();
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $data['notifchat'] = $this->ChatModel->getChatData();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/tugas', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function tambahTugas()
    {
            $pertemuan = $this->input->post('pertemuan');
            $tugas = $_FILES['tugas']['name'];
            if ($tugas) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/tugas/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('tugas')) {
                    $tugas = $this->upload->data('file_name');
                    $data = array(
                        'id_pertemuan' => $pertemuan,
                        'tugas' => $tugas
                    );
                    $this->Kelolatugas_model->tambahTugas($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil ditambahkan</div>');
                    redirect('kelolatugas');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal ditambahkan</div>');
                    redirect('kelolatugas');
                }
            }
        
    }

    public function hapusTugas($id)
    {
            $tugas = $this->Kelolatugas_model->getTugasById($id);
            $pdf = $tugas['tugas'];
            unlink(FCPATH . 'assets/tugas/' . $pdf);
            $this->Kelolatugas_model->hapusTugas($id);
            $this->session->set_flashdata('category_success', 'Tugas berhasil dihapus');
            redirect('kelolatugas');
        
    }

    public function editTugas($id)
    {
            $data['title'] = "Edit Tugas";
            $data['user'] = $this->Kelolatugas_model->getUserByEmail($this->session->userdata('email'));
            $data['tugas'] = $this->Kelolatugas_model->getTugasById($id);
            $data['notifchat'] = $this->ChatModel->getChatData();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/edittugas', $data);
            $this->load->view('backend/admin/footer');
       
    }

    public function runEditTugas()
    {
            $id = $this->input->post('id_tugas');
            $pertemuan = $this->input->post('pertemuan');
            $tugasLama = $this->input->post('file_lama');

            $tugas = $_FILES['tugas']['name'];
            if ($tugas) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/tugas/';
                $this->load->library('upload', $config);
                unlink(FCPATH . './assets/tugas/' . $tugasLama);
                if ($this->upload->do_upload('tugas')) {
                    $tugas = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal diubah</div>');
                    redirect('kelolatugas');
                }
                
            }

            $data = array(
                'id_pertemuan' => $pertemuan,
                'tugas' => $tugas
            );

            $this->Kelolatugas_model->updateTugas($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil diubah</div>');
            redirect('kelolatugas');
        
    }

}
