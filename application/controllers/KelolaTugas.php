<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Kelolatugas_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = 'Tugas';
            $data['user'] = $this->Kelolatugas_model->getUserByEmail($this->session->userdata('email'));
            $data['tugas'] = $this->Kelolatugas_model->getTugas();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/tugas', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function tambahTugas()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
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
                        'pertemuan' => $pertemuan,
                        'tugas' => $tugas
                    );
                    $this->Kelolatugas_model->tambahTugas($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil ditambahkan</div>');
                    redirect('KelolaTugas');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal ditambahkan</div>');
                    redirect('KelolaTugas');
                }
            }
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function hapusTugas($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $tugas = $this->Kelolatugas_model->getTugasById($id);
            $pdf = $tugas['tugas'];
            unlink(FCPATH . 'assets/tugas/' . $pdf);
            $this->Kelolatugas_model->hapusTugas($id);
            $this->session->set_flashdata('category_success', 'Tugas berhasil dihapus');
            redirect('KelolaTugas');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function editTugas($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Edit Tugas";
            $data['user'] = $this->Kelolatugas_model->getUserByEmail($this->session->userdata('email'));
            $data['tugas'] = $this->Kelolatugas_model->getTugasById($id);
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/edittugas', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function runEditTugas()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $id = $this->input->post('id_tugas');
            $pertemuan = $this->input->post('pertemuan');
            $tugasLama = $this->input->post('file_lama');

            $tugas = $_FILES['tugas']['name'];
            if ($tugas) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/tugas/';
                if ($tugasLama != $tugas) {
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('tugas')) {
                        unlink(FCPATH . './assets/tugas/' . $tugasLama);
                        $tugas = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal diubah</div>');
                        redirect('KelolaTugas');
                    }
                } else {
                    $tugas = $tugasLama;
                }
            } else {
                $tugas = $tugasLama;
            }

            $data = array(
                'pertemuan' => $pertemuan,
                'tugas' => $tugas
            );

            $this->Kelolatugas_model->updateTugas($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil diubah</div>');
            redirect('KelolaTugas');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

}
