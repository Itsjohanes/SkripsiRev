<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilaipretest_model extends CI_Model {

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getHasilPretest()
    {
        $this->db->select('*');
        $this->db->from('tb_hasilpretest');
        $this->db->join('tb_akun', 'tb_akun.id = tb_hasilpretest.id_siswa');
        return $this->db->get()->result_array();
    }

    public function deleteHasilPretest($id)
    {
        $this->db->where('id_hasilpretest', $id);
        $this->db->delete('tb_hasilpretest');
    }

}
