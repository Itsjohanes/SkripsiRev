<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Randomkelompok extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Randomkelompok_model');
        $this->load->model('Kelolalistsiswa_model');
        $this->load->model('Kelolapertemuan_model');
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
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/template/sidebar', $data);
            $this->load->view('guru/randomkelompok/random', $data);
            $this->load->view('guru/template/footer');
        
    }

public function runRandom()
{
    // Fetch students ordered by pretest score (descending)
    /*$siswa = $this->db->query("SELECT akun.*, nilai.pretest 
                               FROM tb_akun akun 
                               JOIN tb_nilai nilai ON akun.id = nilai.id_siswa 
                               WHERE akun.role = '0'
                               ORDER BY nilai.pretest DESC")->result_array();

                               */

        $this->db->select_max('id_pertemuan');
        $query = $this->db->get('tb_pertemuan');
        $result = $query->row_array();
        $jumlahPertemuan = $result['id_pertemuan'];
        $string = "tb_akun.*, (COALESCE(tb_nilai.pretest, 0) + COALESCE(tb_nilai.posttest, 0)";
        for ($i = 1; $i <= $jumlahPertemuan; $i++) {
            if ($this->Kelolapertemuan_model->getPertemuanbyId($i) != null) {
                $string = $string . " + COALESCE(tb_nilai.tugas_" . $i . ", 0)";
            }
        }
        for ($i = 1; $i <= $jumlahPertemuan; $i++) {
            if ($this->Kelolapertemuan_model->getPertemuanbyId($i) != null) {
                $string = $string . " + COALESCE(tb_nilai.quiz_" . $i . ", 0)";
            }
        }
        $string = $string . ") AS total_nilai";
        $this->db->select($string);
        $this->db->from('tb_nilai');
        //joinkan dengan table tb_akun
        $this->db->join('tb_akun', 'tb_nilai.id_siswa = tb_akun.id');
        $this->db->order_by('total_nilai', 'desc');
        $this->db->order_by('nama', 'asc');
        //get array
        $siswa = $this->db->get()->result_array();
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

            // Hapus setiap folder kecuali folder "global"
            foreach ($folders as $folder) {
                // Hanya proses folder yang bukan . (current directory) atau .. (parent directory)
                if ($folder != "." && $folder != "..") {
                    // Periksa apakah folder adalah "global"
                    if ($folder != "global") {
                        // Hapus folder dan isinya rekursif
                        $this->deleteFolder($folderPath . $folder);
                    }
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
