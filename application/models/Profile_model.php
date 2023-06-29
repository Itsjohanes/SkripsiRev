<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function updateUser($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('tb_akun', $data);
    }
}
