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
  public function getIdAkun($email, $nama, $password)
  {
    $this->db->select('id');
    $this->db->where('email', $email);
    $this->db->where('nama', $nama);
    $this->db->where('password', $password);

    $query = $this->db->get('tb_akun');

    if ($query->num_rows() > 0) {
      $row = $query->row();
      return $row->id;
    } else {
      return null;
    }
  }
  public function RegisterNilai($id_akun)
  {
    $data = [
      'id_siswa' => $id_akun
    ];
    $this->db->insert('tb_nilai', $data);
  }
}
