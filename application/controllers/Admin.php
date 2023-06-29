<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('comments1_model');
        $this->load->model('comments2_model');
        $this->load->model('comments3_model');
        $this->load->model('comments4_model');
    }
    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Home Admin";
            $data['user'] = $this->Admin_model->getUserByEmail($this->session->userdata('email'));
            $data['siswa'] = $this->Admin_model->getTotalStudents();

            $data['pretest'] = $this->Admin_model->getTotalPretests();
            $data['posttest'] = $this->Admin_model->getTotalPosttests();

            $jumlahSiswa = $this->Admin_model->getTotalStudents();
            $jumlahPretest = $this->Admin_model->getTotalHasilPretest();
            $jumlahPosttest = $this->Admin_model->getTotalHasilPosttest();
            $tugas1 = $this->Admin_model->getTotalHasilTugas(1);
            $tugas2 = $this->Admin_model->getTotalHasilTugas(2);
            $tugas3 = $this->Admin_model->getTotalHasilTugas(3);
            $tugas4 = $this->Admin_model->getTotalHasilTugas(4);

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
    
     public function save_comment2() {
        // Proses menyimpan komentar
        if($this->session->userdata('email') != ''){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'comment' => $this->input->post('comment'),
            'parent_id' => 0,
            'pertemuan' => 2 // Set parent_id sebagai 0 untuk komentar utama
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
            'parent_id' => $this->input->post('parent_id'),
            'pertemuan' => 2
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
            'parent_id' => 0, // Set parent_id sebagai 0 untuk komentar utama
            'pertemuan' => 3
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
            'parent_id' => $this->input->post('parent_id'),
            'pertemuan' => 3
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
            'parent_id' => 0,
            'pertemuan' => 4// Set parent_id sebagai 0 untuk komentar utama
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
            'parent_id' => $this->input->post('parent_id'),
            'pertemuan' => 4
        );

        $this->comments1_model->save_reply($data);
        redirect('Admin/halamanKomentar4');
    }
    }
}
