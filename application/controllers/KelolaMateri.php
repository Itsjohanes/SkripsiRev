<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaMateri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolamateri_model'); // Load the KelolaMateri_model
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Materi";
            $data['user'] = $this->Kelolamateri_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolamateri_model->getMateri();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/materi', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function tambahMateri()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $pertemuan = $this->input->post('pertemuan');
            $materi = $_FILES['materi']['name'];

            if ($materi) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '8192';
                $config['upload_path'] = './assets/materi/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('materi')) {
                    $materi = $this->upload->data('file_name');
                    $this->Kelolamateri_model->tambahMateri($pertemuan, $materi);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi berhasil ditambahkan</div>');
                    redirect('KelolaMateri');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Materi gagal ditambahkan</div>');
                    redirect('KelolaMateri');
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

    public function hapusMateri($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $materi = $this->Kelolamateri_model->getMateriById($id);
            $pdf = $materi['materi'];
            unlink(FCPATH . 'assets/materi/' . $pdf);
            $this->Kelolamateri_model->hapusMateri($id);
            $this->session->set_flashdata('category_success', 'Materi berhasil dihapus');
            redirect('KelolaMateri');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function editMateri($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Edit Materi";
            $data['user'] = $this->Kelolamateri_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolamateri_model->getMateriById($id);

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editmateri', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function runEditMateri()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $id = $this->input->post('id_materi');
            $pertemuan = $this->input->post('pertemuan');
            $materiLama = $this->input->post('file_lama');
            $materi = $_FILES['materi']['name'];

            if ($materi) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '8192';
                $config['upload_path'] = './assets/materi/';

                if ($materiLama != $materi) {
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('materi')) {
                        unlink(FCPATH . './assets/materi/' . $materiLama);
                        $materi = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Materi gagal diubah</div>');
                    }
                } else {
                    $materi = $materiLama;
                }

                $data = array(
                    'pertemuan' => $pertemuan,
                    'materi' => $materi
                );

                $this->Kelolamateri_model->updateMateri($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi berhasil diubah</div>');
                redirect('KelolaMateri');
            }
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

}
