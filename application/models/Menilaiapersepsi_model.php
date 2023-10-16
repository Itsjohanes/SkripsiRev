<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menilaiapersepsi_model extends CI_Model
{

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getHasilApersepsi($id)
    {
        $this->db->select('*');
        $this->db->from('tb_hasilapersepsi');
        $this->db->where('id_pertemuan', $id);
        $this->db->join('tb_akun', 'tb_akun.id = tb_hasilapersepsi.id_siswa');
        $this->db->order_by('tb_akun.nama', 'asc');

        return $this->db->get()->result_array();
    }

}
