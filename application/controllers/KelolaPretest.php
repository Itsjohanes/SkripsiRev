<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPretest extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolapretest_model');
        
    }


     public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolapretest_model->getPretest();
            //select aktif dari tb_test
            $data['aktif'] = $this->db->get_where('tb_test', ['id_tes' => 1])->row_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/pretest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function tambahPreTest()
    {

        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
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
                'gambar' => $gambar
            ];
            $this->Kelolapretest_model->tambahPretest($data);
            redirect('KelolaPreTest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function hapusPretest($id)
    {

        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //delete soal and unlink picture by id 
            $this->Kelolapretest_model->hapusPretest($id);
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            redirect('KelolaPreTest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function editPretest($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Edit Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolapretest_model->getPretestById($id);
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editPretest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function runEditPreTest()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
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
                if ($gambar_lama != $gambar) {
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('gambar')) {
                        //unlink
                        unlink(FCPATH . 'assets/img/pretest/' . $gambar_lama);
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
            $this->Kelolapretest_model->updatePretest($id_pretest, $data);
            redirect('KelolaPreTest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }


    public function preTestHandler(){
        if ($this->input->post('pretes')) {
        $this->activasiPretest();
    } else {
        $this->mematikanPretest();
    }

    }

    public function activasiPretest(){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 1);
            $this->db->where('id_tes', 1);
            $this->db->update('tb_test');
            redirect('KelolaPretest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pretest telah diaktifkan</div>');


        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function mematikanPretest(){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 0);
            $this->db->where('id_tes', 1);
            $this->db->update('tb_test');
            redirect('KelolaPretest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pretest telah dimatikan</div>');

        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
}
