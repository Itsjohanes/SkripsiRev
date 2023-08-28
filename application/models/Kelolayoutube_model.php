<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolayoutube_model extends CI_Model {

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getYoutubeMateri()
    {
        return $this->db->get('tb_youtube')->result_array();
    }

    public function tambahYoutubeMateri($data)
    {
        $this->db->insert('tb_youtube', $data);
    }

    public function getYoutubeMateriById($id)
    {
        return $this->db->get_where('tb_youtube', ['id_youtube' => $id])->row_array();
    }

    public function hapusYoutubeMateri($id)
    {
        $this->db->where('id_youtube', $id);
        $this->db->delete('tb_youtube');
    }

    public function updateYoutubeMateri($id, $data)
    {
        $this->db->where('id_youtube', $id);
        $this->db->update('tb_youtube', $data);
    }

}
