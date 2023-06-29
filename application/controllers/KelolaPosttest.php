<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPosttest extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolaposttest_model');
       
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Post-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaposttest_model->getPosttest();
            $data['aktif'] = $this->db->get_where('tb_test', ['id_tes' => 2])->row_array();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/posttest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function tambahPostTest()
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
                'gambar' => $gambar
            ];
            $this->Kelolaposttest_model->tambahPosttest($data);
            redirect('KelolaPosttest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    
    public function hapusPosttest($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //delete soal and unlink picture by id 
            $gambar = $this->Kelolaposttest_model->getPosttestById($id)['gambar'];
            unlink(FCPATH . 'assets/img/posttest/' . $gambar);
            $this->Kelolaposttest_model->hapusPosttest($id);
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            redirect('KelolaPosttest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function editPostTest($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = 'Edit Post-Test';
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaposttest_model->getPosttestById($id);

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editPostTest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function runEditPostTest()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
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
            redirect('KelolaPosttest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
     public function postTestHandler(){
        if ($this->input->post('posttes')) {
        $this->activasiPosttest();
    } else {
        $this->mematikanPosttest();
    }

    }

    public function activasiPosttest(){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $this->db->set('aktif', 1);
            $this->db->where('id_tes', 2);
            $this->db->update('tb_test');
            redirect('KelolaPosttest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Posttest telah diaktifkan</div>');


        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function mematikanPosttest(){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 0);
            $this->db->where('id_tes', 2);
            $this->db->update('tb_test');
            redirect('KelolaPosttest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Posttest telah dimatikan</div>');

        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
}
