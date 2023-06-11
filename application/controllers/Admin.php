<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('comments1_model');
        $this->load->model('comments2_model');
        $this->load->model('comments3_model');
        $this->load->model('comments4_model');


    }
    public function index()
    {
        //hanya bisa diakses jika memiliki session dan role nya adalah 

        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Home Admin";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['siswa'] = $this->db->get_where('tb_akun', ['role' => 0])->num_rows();

            $data['pretest'] = $this->db->get_where('tb_pretest')->num_rows();
            $data['posttest'] = $this->db->get_where('tb_posttest')->num_rows();
            //jumlah data
            $jumlahSiswa = $this->db->get_where('tb_akun', ['role' => 0])->num_rows();
            $jumlahPretest = $this->db->get_where('tb_hasilpretest')->num_rows();
            $jumlahPosttest = $this->db->get_where('tb_hasilposttest')->num_rows();
            $tugas1 = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 1])->num_rows();
            $tugas2 = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 2])->num_rows();
            $tugas3 = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 3])->num_rows();
            $tugas4 = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 4])->num_rows();

            //persentase
            if ($jumlahSiswa != 0) {
                $data['persentasepretest'] = ($jumlahPretest / $jumlahSiswa) * 100;
                $data['persentaseposttest'] = ($jumlahPosttest / $jumlahSiswa) * 100;
                $data['persentasetugas1'] = ($tugas1 / $jumlahSiswa) * 100;
                $data['persentasetugas2'] = ($tugas2 / $jumlahSiswa) * 100;
                $data['persentasetugas3'] = ($tugas3 / $jumlahSiswa) * 100;
                $data['persentasetugas4'] = ($tugas4 / $jumlahSiswa) * 100;
            } else {
                $data['persentasepretest'] = 0 * 100;
                $data['persentaseposttest'] = 0 * 100;
                $data['persentasetugas1'] = 0 * 100;
                $data['persentasetugas2'] = 0 * 100;
                $data['persentasetugas3'] = 0 * 100;
                $data['persentasetugas4'] = 0 * 100;
            }


            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/index', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function profile(){

         if ($this->session->userdata('email') != '') {
            $data['title'] = "Profile";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/profile', $data);
            $this->load->view('backend/admin/footer');

        } else {
            redirect('Auth/backLogin');
        }

    }


    public function editProfile()
    {
        //hanya bisa diakses jika memiliki session dan role nya adalah 

        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Edit Profile";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editprofile', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function runEdit()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') ==  1) {

            $this->form_validation->set_rules('nama', 'Nama', 'required');

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            if ($this->form_validation->run('runEdit') == false) {
                $data['title'] = "Edit Profile";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('backend/admin/header', $data);
                $this->load->view('backend/admin/sidebar', $data);
                $this->load->view('backend/admin/editProfile', $data);
                $this->load->view('backend/admin/footer');
            } else {
                //data masuk ke db
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                ];
                //ubah
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('tb_akun', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been Edited</div>');
                redirect('Admin/profile');
            }
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function listSiswa()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "List Siswa";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['siswa'] = $this->db->get_where('tb_akun', ['role' => "0"])->result_array();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/listsiswa', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function editSiswa($id)
    {

        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "List Siswa";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['siswa'] = $this->db->get_where('tb_akun', ['id' => $id])->row_array();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editsiswa', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function runEditSiswa()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {

            $this->form_validation->set_rules('nama', 'Nama', 'required');

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            if ($this->form_validation->run('runEditSiswa') == false) {
                $data['title'] = "Home Admin";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Password Not Match</div>');
                redirect('Admin/editSiswa/' . $this->input->post('id'));
            } else {
                //data masuk ke db
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                ];
                //ubah
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('tb_akun', $data);


                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been Edited</div>');
                    redirect('Admin/listSiswa');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! your account has not been Edited</div>');
                    redirect('Admin/listSiswa');
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
    public function deleteSiswa($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {

            $this->db->where('id', $id);
            $this->db->delete('tb_akun');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation!  account has been Deleted</div>');
            redirect('Admin/listSiswa');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function random()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Random";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['siswa'] = $this->db->get_where('tb_akun', ['role' => "0"])->result_array();
            $data['randoms'] = $this->db->get_where('tb_random')->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/random', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function runRandom()
    {

        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {

            $siswa = $this->db->get_where('tb_akun', ['role' => "0"])->result_array();
            $kelompok = 6;
            $jumlah = count($siswa);
            $siswaPerKelompok = ceil($jumlah / $kelompok);
            $siswa = array_chunk($siswa, $siswaPerKelompok);
            $i = 1;
            foreach ($siswa as $siswas) {
                foreach ($siswas as $siswa1) {
                    $data = [
                        'id_user' => $siswa1['id'],
                        'kelompok' => $i,
                        'nama' => $siswa1['nama']
                    ];
                    $this->db->insert('tb_random', $data);
                }
                $i++;
            }
            redirect('Admin/random');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function deleteRandom()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {

            //delete tb_random

            $this->db->empty_table('tb_random');

            redirect('Admin/random');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function preTest()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->db->get('tb_pretest')->result_array();
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
    public function postTest()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Post-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->db->get('tb_posttest')->result_array();
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
            $this->db->insert('tb_pretest', $data);
            redirect('Admin/preTest');
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
            $gambar = $this->db->get_where('tb_pretest', ['id_pretest' => $id])->row_array();
            $gambar = $gambar['gambar'];
            unlink(FCPATH . 'assets/img/pretest/' . $gambar);
            $this->db->where('id_pretest', $id);
            $this->db->delete('tb_pretest');

            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');


            redirect('Admin/preTest');
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
            $data['soal'] = $this->db->get_where('tb_pretest', ['id_pretest' => $id])->row_array();
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
            $this->db->where('id_pretest', $id_pretest);
            $this->db->update('tb_pretest', $data);
            redirect('Admin/preTest');
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
            $this->db->insert('tb_posttest', $data);
            redirect('Admin/postTest');
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
            $gambar = $this->db->get_where('tb_posttest', ['id_posttest' => $id])->row_array();
            $gambar = $gambar['gambar'];
            unlink(FCPATH . 'assets/img/posttest/' . $gambar);
            $this->db->where('id_posttest', $id);
            $this->db->delete('tb_posttest');

            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');


            redirect('Admin/postTest');
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
            $data['soal'] = $this->db->get_where('tb_posttest', ['id_posttest' => $id])->row_array();

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
            $this->db->where('id_posttest', $id_posttest);
            $this->db->update('tb_posttest', $data);
            redirect('Admin/postTest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function materi()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = 'Materi';
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->db->get('tb_materi')->result_array();
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
            //masukan ke db
            $pertemuan = $this->input->post('pertemuan');
            $link = $this->input->post('link');
            $data = [
                'pertemuan' => $pertemuan,
                'youtube' => $link
            ];
            $this->db->insert('tb_materi', $data);
            redirect('Admin/materi');
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
            $this->db->where('id_materi', $id);
            $this->db->delete('tb_materi');

            $this->session->set_flashdata('category_success', 'Materi berhasil dihapus');
            redirect('Admin/materi');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function editMateri($id_materi)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = 'Edit Materi';
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->db->get_where('tb_materi', ['id_materi' => $id_materi])->row_array();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editMateri', $data);
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
            $id_materi = $this->input->post('id_materi');
            $pertemuan = $this->input->post('pertemuan');
            $youtube = $this->input->post('youtube');
            $data = [
                'pertemuan' => $pertemuan,
                'youtube' => $youtube
            ];
            $this->db->where('id_materi', $id_materi);
            $this->db->update('tb_materi', $data);
            redirect('Admin/materi');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function menilai()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //select siswa from db
            $data['siswa'] = $this->db->get_where('tb_akun', ['role' => 0])->result_array();
            $data['title'] = 'Menilai';
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->db->get('tb_materi')->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/tugastes', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }


    
    public function hasilPretest()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            //join id_siswa dengan table siswa
            $this->db->select('*');
            $this->db->from('tb_hasilpretest');
            $this->db->join('tb_akun', 'tb_akun.id = tb_hasilpretest.id_siswa');
            $data['pretest'] = $this->db->get()->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasilpretest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function hapusHasilPretest($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //delete berdasarkan id
            $this->db->where('id_hasilpretest', $id);
            $this->db->delete('tb_hasilpretest');
            $this->session->set_flashdata('category_success', 'Hasil Pre-Test berhasil dihapus');
            redirect('Admin/hasilPretest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }


    public function hasilPostTest()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Post-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            //join id_siswa dengan table siswa
            $this->db->select('*');
            $this->db->from('tb_hasilposttest');
            $this->db->join('tb_akun', 'tb_akun.id = tb_hasilposttest.id_siswa');
            $data['posttest'] = $this->db->get()->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasilposttest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function hapusHasilPosttest($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //delete berdasarkan id
            $this->db->where('id_hasilposttest', $id);
            $this->db->delete('tb_hasilposttest');
            $this->session->set_flashdata('category_success', 'Hasil Pre-Test berhasil dihapus');
            redirect('Admin/hasilPosttest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function hasilPertemuan1()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 1";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            //join id_siswa dengan table siswa
            $this->db->select('*');

            $this->db->from('tb_hasiltugas');
            $this->db->where('pertemuan', 1);
            $this->db->join('tb_akun', 'tb_akun.id = tb_hasiltugas.id_siswa');
            $data['hasiltugas'] = $this->db->get()->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasil1', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function hasilPertemuan2()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 2";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            //join id_siswa dengan table siswa
            $this->db->select('*');

            $this->db->from('tb_hasiltugas');
            $this->db->where('pertemuan', 2);
            $this->db->join('tb_akun', 'tb_akun.id = tb_hasiltugas.id_siswa');
            $data['hasiltugas'] = $this->db->get()->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasil2', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function hasilPertemuan3()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 3";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            //join id_siswa dengan table siswa
            $this->db->select('*');

            $this->db->from('tb_hasiltugas');
            $this->db->where('pertemuan', 3);
            $this->db->join('tb_akun', 'tb_akun.id = tb_hasiltugas.id_siswa');
            $data['hasiltugas'] = $this->db->get()->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasil3', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function hasilPertemuan4()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 4";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            //join id_siswa dengan table siswa
            $this->db->select('*');

            $this->db->from('tb_hasiltugas');
            $this->db->where('pertemuan', 4);
            $this->db->join('tb_akun', 'tb_akun.id = tb_hasiltugas.id_siswa');
            $data['hasiltugas'] = $this->db->get()->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasil4', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function tugas()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Tugas";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
           
            $data['tugas'] = $this->db->get('tb_tugas')->result_array();
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


    public function komentar()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Komentar";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/komentar', $data);
            $this->load->view('backend/admin/footer');
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
            redirect('Admin/preTest');
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
            redirect('Admin/preTest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pretest telah dimatikan</div>');

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
            redirect('Admin/postTest');
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
            redirect('Admin/postTest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Posttest telah dimatikan</div>');

        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }


    public function message(){
         if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Message";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['pesan'] = $this->db->get('tb_contact')->result_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/message', $data);
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
                    $this->db->set('pertemuan', $pertemuan);
                    $this->db->set('tugas', $tugas);
                    $this->db->insert('tb_tugas');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil ditambahkan</div>');
                    redirect('Admin/tugas');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal ditambahkan</div>');
                    redirect('Admin/tugas');
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
            //delete by id
            $tugas = $this->db->get_where('tb_tugas', ['id_tugas' => $id])->row_array();
            $pdf = $tugas['tugas'];
            unlink(FCPATH . 'assets/tugas/' . $pdf);
            $this->db->where('id_tugas', $id);
            $this->db->delete('tb_tugas');
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            redirect('Admin/tugas');
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
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['tugas'] = $this->db->get_where('tb_tugas', ['id_tugas' => $id])->row_array();
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
        //gagal unlink
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
                    }
                } else {
                    $tugas = $tugasLama;
                }
                $data = [
                    'pertemuan' => $pertemuan,
                    'tugas' => $tugas
                ];
                $this->db->where('id_tugas', $id);
                $this->db->update('tb_tugas', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil diubah</div>');
                redirect('Admin/tugas');
            }
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function menilaiPertemuan1ById($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 1";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['pertemuan1'] = $this->db->get_where('tb_hasiltugas', ['id_hasiltugas' => $id])->row_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/nilaitugas1', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function runMenilaiPertemuan1()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //run edit
            $id = $this->input->post('id_hasiltugas');
            $nilai = $this->input->post('nilai');
            $komentar = $this->input->post('komentar');
            $data = [
                'nilai' => $nilai,
                'komentar' => $komentar
            ];
            $this->db->where('id_hasiltugas', $id);
            $this->db->update('tb_hasiltugas', $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('Admin/hasilPertemuan1');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function deleteMenilaiPertemuan1($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            //Menghapus by id
            $this->db->where('id_hasiltugas', $id);
            $data = [
                'nilai' => null,
                'komentar' => null
            ];
            $this->db->update('tb_hasiltugas', $data);

            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect('Admin/hasilPertemuan1');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function menilaiPertemuan2ById($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 2";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['pertemuan2'] = $this->db->get_where('tb_hasiltugas', ['id_hasiltugas' => $id])->row_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/nilaitugas2', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function runMenilaiPertemuan2()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $id = $this->input->post('id_hasiltugas');
            $nilai = $this->input->post('nilai');
            $komentar = $this->input->post('komentar');
            $data = [
                'nilai' => $nilai,
                'komentar' => $komentar
            ];
            $this->db->where('id_hasiltugas', $id);
            $this->db->update('tb_hasiltugas', $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('Admin/hasilPertemuan2');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function deleteMenilaiPertemuan2($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $this->db->where('id_hasiltugas', $id);
            $data = [
                'nilai' => null,
                'komentar' => null
            ];
            $this->db->update('tb_hasiltugas', $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect('Admin/hasilPertemuan2');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function menilaiPertemuan3ById($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 3";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['pertemuan3'] = $this->db->get_where('tb_hasiltugas', ['id_hasiltugas' => $id])->row_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/nilaitugas3', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function runMenilaiPertemuan3()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $id = $this->input->post('id_hasiltugas');
            $nilai = $this->input->post('nilai');
            $komentar = $this->input->post('komentar');
            $data = [
                'nilai' => $nilai,
                'komentar' => $komentar
            ];
            $this->db->where('id_hasiltugas', $id);
            $this->db->update('tb_hasiltugas', $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('Admin/hasilPertemuan3');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function deleteMenilaiPertemuan3($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $this->db->where('id_hasiltugas', $id);
            $data = [
                'nilai' => null,
                'komentar' => null
            ];
            $this->db->update('tb_hasiltugas', $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect('Admin/hasilPertemuan3');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function menilaiPertemuan4ById($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Pertemuan 4";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['pertemuan4'] = $this->db->get_where('tb_hasiltugas', ['id_hasiltugas' => $id])->row_array();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/nilaitugas4', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function runMenilaiPertemuan4()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $id = $this->input->post('id_hasiltugas');
            $nilai = $this->input->post('nilai');
            $komentar = $this->input->post('komentar');
            $data = [
                'nilai' => $nilai,
                'komentar' => $komentar
            ];
            $this->db->where('id_hasiltugas', $id);
            $this->db->update('tb_hasiltugas', $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('Admin/hasilPertemuan4');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function deleteMenilaiPertemuan4($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $this->db->where('id_hasiltugas', $id);
            $data = [
                'nilai' => null,
                'komentar' => null
            ];
            $this->db->update('tb_hasiltugas', $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect('Admin/hasilPertemuan4');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function halamanKomentar1(){

         if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1){
            $data['title'] = "Komentar Pertemuan 1";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments1_model->get_comments();
              $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/comments1', $data);
            $this->load->view('backend/admin/footer');

        }else{
            redirect('Auth');
        }



    }
    public function halamanKomentar2(){

         if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1){
            $data['title'] = "Komentar Pertemuan 2";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments2_model->get_comments();
              $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/comments2', $data);
            $this->load->view('backend/admin/footer');

        }else{
            redirect('Auth');
        }



    }
    public function halamanKomentar3(){

         if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1){
            $data['title'] = "Komentar Pertemuan 3";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments3_model->get_comments();
              $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/comments3', $data);
            $this->load->view('backend/admin/footer');

        }else{
            redirect('Auth');
        }



    }
    public function halamanKomentar4(){

         if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1){
            $data['title'] = "Komentar Pertemuan 4";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['comments'] = $this->comments1_model->get_comments();
              $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/comments4', $data);
            $this->load->view('backend/admin/footer');

        }else{
            redirect('Auth');
        }
        



    }
    
public function save_comment1() {
        // Proses menyimpan komentar
        if($this->session->userdata('email') != ''){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => 0 // Set parent_id sebagai 0 untuk komentar utama
        );

        $this->comments1_model->save_comment($data);
        redirect('Admin/halamanKomentar1');
    }
    }

    public function save_reply1() {
        if($this->session->userdata('email') != ''){
        // Proses menyimpan reply
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => $this->input->post('parent_id')
        );

        $this->comments1_model->save_reply($data);
        redirect('Admin/halamanKomentar1');
    }
    }
     public function save_comment2() {
        // Proses menyimpan komentar
        if($this->session->userdata('email') != ''){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => 0 // Set parent_id sebagai 0 untuk komentar utama
        );

        $this->comments1_model->save_comment($data);
        redirect('Admin/halamanKomentar2');
    }
    }

    public function save_reply2() {
        if($this->session->userdata('email') != ''){
        // Proses menyimpan reply
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => $this->input->post('parent_id')
        );

        $this->comments1_model->save_reply($data);
        redirect('Admin/halamanKomentar2');
    }
    }
     public function save_comment3() {
        // Proses menyimpan komentar
        if($this->session->userdata('email') != ''){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => 0 // Set parent_id sebagai 0 untuk komentar utama
        );

        $this->comments1_model->save_comment($data);
        redirect('Admin/halamanKomentar3');
    }
    }

    public function save_reply3() {
        if($this->session->userdata('email') != ''){
        // Proses menyimpan reply
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => $this->input->post('parent_id')
        );

        $this->comments1_model->save_reply($data);
        redirect('Admin/halamanKomentar3');
    }
    }
     public function save_comment4() {
        // Proses menyimpan komentar
        if($this->session->userdata('email') != ''){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => 0 // Set parent_id sebagai 0 untuk komentar utama
        );

        $this->comments1_model->save_comment($data);
        redirect('Admin/halamanKomentar4');
    }
    }

    public function save_reply4() {
        if($this->session->userdata('email') != ''){
        // Proses menyimpan reply
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => $this->input->post('parent_id')
        );

        $this->comments1_model->save_reply($data);
        redirect('Admin/halamanKomentar4');
    }
    }

























}
