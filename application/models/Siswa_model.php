<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getKelompokByIdUser($id)
    {
        return $this->db->get_where('tb_random', ['id_user' => $id])->row_array();
    }

    public function getJumlahSiswa()
    {
        return $this->db->get_where('tb_akun', ['role' => 0])->num_rows();
    }

    public function getPretestCount($id_siswa)
    {
        
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $id_siswa,'id_test' => 1])->num_rows();
    }

    public function getPosttestCount($id_siswa)
    {
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $id_siswa,'id_test' => 2])->num_rows();
    }

    public function getTugasCount($id_siswa, $pertemuan)
    {
        return $this->db->get_where('tb_hasiltugas', ['id_siswa' => $id_siswa, 'id_pertemuan' => $pertemuan])->num_rows();
    }

    public function getSiswaByRole($role)
    {
        return $this->db->get_where('tb_akun', ['role' => $role])->result_array();
    }
}
