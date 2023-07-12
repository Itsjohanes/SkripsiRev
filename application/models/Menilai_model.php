<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilai_model extends CI_Model {

    public function getSiswa()
    {
       $this->db->order_by('nama', 'ASC');
       $result = $this->db->get_where('tb_akun', ['role' => 0])->result_array();
       return $result;

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
