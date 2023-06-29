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

}
