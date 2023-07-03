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
        //where id_test = 1

        $this->db->where('id_test', 1);
        $result = $this->db->get('tb_prepost')->num_rows();
        return $result;
    }

    public function getTotalPosttests()
    {
        $this->db->where('id_test', 2);
        $result = $this->db->get('tb_prepost')->num_rows();
        return $result;
    }

    public function getTotalHasilPretest()
    {
         $this->db->where('id_test', 1);
        $result = $this->db->get('tb_hasilprepost')->num_rows();
        return $result;
    }

    public function getTotalHasilPosttest()
    {
        $this->db->where('id_test', 2);
        $result = $this->db->get('tb_hasilprepost')->num_rows();
        return $result;
    }

    public function getTotalHasilTugas($pertemuan)
    {
        return $this->db->get_where('tb_hasiltugas', ['id_pertemuan' => $pertemuan])->num_rows();
    }
}
