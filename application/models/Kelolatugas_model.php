<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolatugas_model extends CI_Model {

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getTugas()
    {
        return $this->db->get('tb_tugas')->result_array();
    }

    public function getTugasById($id)
    {
        return $this->db->get_where('tb_tugas', ['id_tugas' => $id])->row_array();
    }

    public function tambahTugas($data)
    {
        $this->db->insert('tb_tugas', $data);
    }

    public function hapusTugas($id)
    {
        $tugas = $this->getTugasById($id);
        $pdf = $tugas['tugas'];
        unlink(FCPATH . 'assets/tugas/' . $pdf);
        $this->db->where('id_tugas', $id);
        $this->db->delete('tb_tugas');
    }

    public function updateTugas($id, $data)
    {
        $this->db->where('id_tugas', $id);
        $this->db->update('tb_tugas', $data);
    }

}
