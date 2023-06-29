<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  public function get_user_by_email($email)
  {
    return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
  }

  public function register_user($email, $nama, $password, $role)
  {
    $data = [
      'email' => $email,
      'nama' => $nama,
      'password' => $password,
      'role' => $role
    ];
    $this->db->insert('tb_akun', $data);
  }
}
