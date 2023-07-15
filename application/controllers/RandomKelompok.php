<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RandomKelompok extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Randomkelompok_model');
        $this->load->model('Kelolalistsiswa_model');
        $this->load->model('ChatModel');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Random";
            $query = $this->db->select_max('kelompok')->get('tb_random');
            $result = $query->row();
            $maxKelompok = $result->kelompok;
            $data['jumkel'] = $maxKelompok;
            $data['notifchat'] = $this->ChatModel->getChatData();
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['siswa'] = $this->Kelolalistsiswa_model->getSiswa();
            $data['randoms'] = $this->Randomkelompok_model->getRandoms();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/random', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function runRandom()
    {
            $siswa = $this->db->get_where('tb_akun', ['role' => "0"])->result_array();
            $jumlahSiswa = count($siswa);
            if(!$this->Randomkelompok_model->getRandoms()){

            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                // Mengambil nilai jumlah kelompok dari POST
                $jumlahKelompok = $this->input->post('jumlah_kelompok');

                if (!is_numeric($jumlahKelompok) || $jumlahKelompok <= 0) {
                    echo "Jumlah kelompok harus merupakan bilangan positif. Silakan coba lagi.";
                    exit;
                }

                $siswaPerKelompok = ceil($jumlahSiswa / $jumlahKelompok);
                shuffle($siswa); // Mengacak urutan siswa secara acak
                $siswa = array_chunk($siswa, $siswaPerKelompok);
                $i = 1;
                $assignedKelompok = [];
                foreach ($siswa as $siswas) {
                    $kelompokIndex = $i % $jumlahKelompok;
                    if ($kelompokIndex == 0) {
                        $kelompokIndex = $jumlahKelompok;
                    }
                    foreach ($siswas as $siswa1) {
                        $data = [
                            'id_user' => $siswa1['id'],
                            'kelompok' => $kelompokIndex,
                            'nama' => $siswa1['nama']
                        ];
                        $this->Randomkelompok_model->insertRandom($data);
                        $assignedKelompok[] = $kelompokIndex;
                    }
                    $i++;
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelompok Berhasil ditambahkan!</div>');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kelompok sudah ada!</div>');
            }
            redirect('randomkelompok');
        
    }

    public function deleteRandom()
    {

            $this->Randomkelompok_model->deleteRandom();

            redirect('randomkelompok');
        
    }

}
