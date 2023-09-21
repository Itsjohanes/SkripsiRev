<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapot_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getPretestBySiswaId($siswaId)
    {
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $siswaId,'id_test' => 1])->row_array();
    }

    public function getPosttestBySiswaId($siswaId)
    {
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $siswaId,'id_test' => 2])->row_array();
    }

    public function getTugasBySiswaIdAndPertemuan($siswaId, $pertemuan)
    {
        return $this->db->get_where('tb_hasiltugas', ['id_siswa' => $siswaId, 'id_pertemuan' => $pertemuan])->row_array();
    }
    public function getQuizBySiswaIdAndPertemuan($siswaId, $pertemuan)
    {
        return $this->db->get_where('tb_hasilquiz', ['id_siswa' => $siswaId, 'id_pertemuan' => $pertemuan])->row_array();
    }
}
