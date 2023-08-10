<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menilaiposttest_model extends CI_Model
{

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getHasilPosttest()
    {
        $this->db->select('*');
        $this->db->from('tb_hasilprepost');
        $this->db->where('id_test', 2);
        $this->db->join('tb_akun', 'tb_akun.id = tb_hasilprepost.id_siswa');
        $this->db->order_by('tb_akun.nama', 'asc');

        return $this->db->get()->result_array();
    }

    public function deleteHasilPosttest($id)
    {
        $this->db->select('id_siswa');
        $this->db->where('id_hasiltest', $id);
        $query = $this->db->get('tb_hasilprepost');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $id_siswa = $row->id_siswa;
            $this->db->where('id_siswa', $id_siswa);
            $this->db->update('tb_nilai', array('posttest' => null));
        }

        $this->db->where('id_hasiltest', $id);
        $this->db->delete('tb_hasilprepost');
    }
}
