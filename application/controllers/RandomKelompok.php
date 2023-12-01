<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RandomKelompok extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Randomkelompok_model');
        $this->load->model('Kelolalistsiswa_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Random";
            $query = $this->db->select_max('kelompok')->get('tb_random');
            $result = $query->row();
            $maxKelompok = $result->kelompok;
            $data['jumkel'] = $maxKelompok;
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['siswa'] = $this->Kelolalistsiswa_model->getSiswa();
            $data['randoms'] = $this->Randomkelompok_model->getRandoms();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/randomkelompok/random', $data);
            $this->load->view('admin/template/footer');
        
    }

public function runRandom()
{
    // Fetch students ordered by pretest score (descending)
    $siswa = $this->db->query("SELECT akun.*, nilai.pretest 
                               FROM tb_akun akun 
                               JOIN tb_nilai nilai ON akun.id = nilai.id_siswa 
                               WHERE akun.role = '0'
                               ORDER BY nilai.pretest DESC")->result_array();

    $jumlahSiswa = count($siswa);

    if (!$this->Randomkelompok_model->getRandoms()) {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Mengambil nilai jumlah kelompok dari POST
            $jumlahKelompok = $this->input->post('jumlah_kelompok');

            if (!is_numeric($jumlahKelompok) || $jumlahKelompok <= 0) {
                echo "Jumlah kelompok harus merupakan bilangan positif. Silakan coba lagi.";
                exit;
            }

            $siswa = array_values($siswa); // Reset array keys to start from 0
            $siswaPerKelompok = ceil($jumlahSiswa / $jumlahKelompok);
            $i = 0;
            $assignedKelompok = [];
            foreach ($siswa as $siswa1) {
                $kelompokIndex = ($i % $jumlahKelompok) + 1;
                $data = [
                    'id_user' => $siswa1['id'],
                    'kelompok' => $kelompokIndex,
                    'nama' => $siswa1['nama']
                ];
                $this->Randomkelompok_model->insertRandom($data);
                $assignedKelompok[] = $kelompokIndex;
                $i++;
            }

             $folderPath = './uploads/';
                for ($i = 1; $i <= $jumlahKelompok; $i++) {
                $folderName = $i;
                // Path lengkap ke folder yang akan dibuat
                $folderFullPath = $folderPath . $folderName;

                // Cek apakah folder sudah ada atau belum
                if (!is_dir($folderFullPath)) {
                    // Jika folder belum ada, buat folder tersebut
                    if (mkdir($folderFullPath)) {
                        // Folder berhasil dibuat
                        echo "Folder '$folderName' berhasil dibuat.<br>";
                    } else {
                        // Gagal membuat folder
                        echo "Gagal membuat folder '$folderName'.<br>";
                    }
                } else {
                    // Folder sudah ada
                    echo "Folder '$folderName' sudah ada.<br>";
                }
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelompok Berhasil ditambahkan!</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kelompok sudah ada!</div>');
    }
    redirect('randomkelompok');
}



    public function deleteRandom()
    {

            $this->Randomkelompok_model->deleteRandom();
            // Path ke direktori tempat folder-folder disimpan
            $folderPath = './uploads/';
            $folders = scandir($folderPath);
             // Hapus setiap folder
            foreach ($folders as $folder) {
                // Hanya proses folder yang bukan . (current directory) atau .. (parent directory)
                if ($folder != "." && $folder != "..") {
                    // Hapus folder dan isinya rekursif
                    $this->deleteFolder($folderPath . $folder);
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelompok berhasil dihapus</div>');

            redirect('randomkelompok');
        
    }

    private function deleteFolder($folderPath)
    {
        if (is_dir($folderPath)) {
            // Ambil daftar file dalam folder
            $files = glob($folderPath . '/*');

            // Hapus file dalam folder
            foreach ($files as $file) {
                unlink($file);
            }

            // Hapus folder itu sendiri
            rmdir($folderPath);
        }
    }

}
