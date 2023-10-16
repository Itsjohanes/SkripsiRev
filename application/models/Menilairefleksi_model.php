<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menilairefleksi_model extends CI_Model
{

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getHasilRefleksi($id)
    {
        $this->db->select('*');
        $this->db->from('tb_hasilrefleksi');
        $this->db->where('id_pertemuan', $id);
        $this->db->join('tb_akun', 'tb_akun.id = tb_hasilrefleksi.id_siswa');
        $this->db->order_by('tb_akun.nama', 'asc');

        return $this->db->get()->result_array();
    }

}
