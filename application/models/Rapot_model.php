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
        return $this->db->get_where('tb_hasilpretest', ['id_siswa' => $siswaId])->row_array();
    }

    public function getPosttestBySiswaId($siswaId)
    {
        return $this->db->get_where('tb_hasilposttest', ['id_siswa' => $siswaId])->row_array();
    }

    public function getTugasBySiswaIdAndPertemuan($siswaId, $pertemuan)
    {
        return $this->db->get_where('tb_hasiltugas', ['id_siswa' => $siswaId, 'pertemuan' => $pertemuan])->row_array();
    }
}
