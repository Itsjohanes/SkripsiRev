<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Randomkelompok_model');
        $this->load->model('Kelolalistsiswa_model');
        $this->load->model('Chat_model');
    }



public function index()
{
    // Fetch students ordered by pretest score (descending)
    $siswa = $this->db->query("SELECT akun.*, nilai.pretest 
                               FROM tb_akun akun 
                               JOIN tb_nilai nilai ON akun.id = nilai.id_siswa 
                               WHERE akun.role = '0'
                               ORDER BY nilai.pretest DESC")->result_array();

    $jumlahSiswa = count($siswa);

   
          // Fetch students ordered by pretest score (descending)
                $siswa = $this->db->query("SELECT akun.*, nilai.pretest 
                               FROM tb_akun akun 
                               JOIN tb_nilai nilai ON akun.id = nilai.id_siswa 
                               WHERE akun.role = '0'
                               ORDER BY nilai.pretest DESC")->result_array();

            $siswa = array_values($siswa); // Reset array keys to start from 0
            
            /*
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
            */
            var_dump($siswa);

           
        }
   
}


