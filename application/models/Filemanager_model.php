<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Filemanager_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getKelompokByIdUser($id)
    {
        return $this->db->get_where('tb_random', ['id_user' => $id])->row_array();
    }

    
}
