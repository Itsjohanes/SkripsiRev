<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Awal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->model('Kelolapertemuan_model');
    }
    public function index()
    {
        $data['title'] = "Home";
        $this->load->view('frontend/header.php', $data);
        $this->load->view('frontend/index.php');
        $this->load->view('frontend/footer.php');
    }
    public function informasi()
    {
        $data['title'] = "Informasi";
        $this->load->view('frontend/header.php', $data);
        $this->load->view('frontend/informasi.php');
        $this->load->view('frontend/footer.php');
    }
    public function materi()
    {
        $data['title'] = "Materi";

        //ambil data dari tb_pertemuan
        $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
        $this->load->view('frontend/header.php', $data);
        $this->load->view('frontend/materi.php',$data);
        $this->load->view('frontend/footer.php');
    }
    public function tambahKontak()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $pesan = $this->input->post('pesan');
        $data = array(
            'nama_pengirim' => $nama,
            'email_pengirim' => $email,
            'pesan_pengirim' => $pesan
        );
        if ($this->Contact_model->tambahKontak($data, 'tb_contact') == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan berhasil dikirim!</div>');
            redirect('awal/informasi');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pesan gagal dikirim!</div>');
            redirect('awal/informasi');
        }
    }
}
