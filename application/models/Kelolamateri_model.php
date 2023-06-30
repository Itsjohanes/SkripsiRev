<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaMateri_model extends CI_Model {

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getMateri()
    {
        return $this->db->get('tb_materi')->result_array();
    }

    public function tambahMateri($pertemuan, $materi)
    {
        $data = array(
            'id_pertemuan' => $pertemuan,
            'materi' => $materi
        );

        $this->db->insert('tb_materi', $data);
    }

    public function getMateriById($id)
    {
        return $this->db->get_where('tb_materi', ['id_materi' => $id])->row_array();
    }

    public function hapusMateri($id)
    {
        $this->db->where('id_materi', $id);
        $this->db->delete('tb_materi');
    }

    public function updateMateri($id, $data)
    {
        $this->db->where('id_materi', $id);
        $this->db->update('tb_materi', $data);
    }

}
