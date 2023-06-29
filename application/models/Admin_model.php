<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getTotalStudents()
    {
        return $this->db->get_where('tb_akun', ['role' => 0])->num_rows();
    }

    public function getTotalPretests()
    {
        return $this->db->get('tb_pretest')->num_rows();
    }

    public function getTotalPosttests()
    {
        return $this->db->get('tb_posttest')->num_rows();
    }

    public function getTotalHasilPretest()
    {
        return $this->db->get('tb_hasilpretest')->num_rows();
    }

    public function getTotalHasilPosttest()
    {
        return $this->db->get('tb_hasilposttest')->num_rows();
    }

    public function getTotalHasilTugas($pertemuan)
    {
        return $this->db->get_where('tb_hasiltugas', ['pertemuan' => $pertemuan])->num_rows();
    }
}
