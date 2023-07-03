<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilaiposttest_model extends CI_Model {

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
        return $this->db->get()->result_array();
    }

    public function deleteHasilPosttest($id)
    {
        $this->db->where('id_hasiltest', $id);
        $this->db->delete('tb_hasilprepost');
    }

}
