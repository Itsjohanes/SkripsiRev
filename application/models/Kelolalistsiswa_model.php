<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolalistsiswa_model extends CI_Model {

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getSiswa()
    {
        return $this->db->get_where('tb_akun', ['role' => "0"])->result_array();
    }

    public function getSiswaById($id)
    {
        return $this->db->get_where('tb_akun', ['id' => $id])->row_array();
    }

    public function updateSiswa($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_akun', $data);
    }

    public function deleteSiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_akun');
    }
}
