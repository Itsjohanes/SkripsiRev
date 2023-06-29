<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilai_model extends CI_Model {

    public function getSiswa()
    {
        return $this->db->get_where('tb_akun', ['role' => 0])->result_array();
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getMateri()
    {
        return $this->db->get('tb_youtube')->result_array();
    }

    public function getHasilTugasPertemuan($pertemuan)
    {
        $this->db->select('*');
        $this->db->from('tb_hasiltugas');
        $this->db->where('pertemuan', $pertemuan);
        $this->db->join('tb_akun', 'tb_akun.id = tb_hasiltugas.id_siswa');
        return $this->db->get()->result_array();
    }

    public function getHasilTugasById($id)
    {
        return $this->db->get_where('tb_hasiltugas', ['id_hasiltugas' => $id])->row_array();
    }

    public function updateHasilTugas($id, $data)
    {
        $this->db->where('id_hasiltugas', $id);
        $this->db->update('tb_hasiltugas', $data);
    }

}
