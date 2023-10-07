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
    function coba(){
        $this->load->view('coba');
    }
    public function index()
    {
        $data['title'] = "Home";
        $this->load->view('halaman_awal/header.php', $data);
        $this->load->view('halaman_awal/index.php');
        $this->load->view('halaman_awal/footer.php');
    }
    public function informasi()
    {
        $data['title'] = "Informasi";
        $this->load->view('halaman_awal/header.php', $data);
        $this->load->view('halaman_awal/informasi.php');
        $this->load->view('halaman_awal/footer.php');
    }
    public function petunjuk()
    {
        $data['title'] = "Petunjuk";
        $this->load->view('halaman_awal/header.php', $data);
        $this->load->view('halaman_awal/petunjuk.php');
        $this->load->view('halaman_awal/footer.php');
    }
    public function materi()
    {
        $data['title'] = "Materi";

        //ambil data dari tb_pertemuan
        $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
        $this->load->view('halaman_awal/header.php', $data);
        $this->load->view('halaman_awal/materi.php',$data);
        $this->load->view('halaman_awal/footer.php');
    }
    
}
