<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolaposttest_model extends CI_Model {

    public function getPosttest()
    {
        return $this->db->get('tb_posttest')->result_array();
    }

    public function getPosttestById($id)
    {
        return $this->db->get_where('tb_posttest', ['id_posttest' => $id])->row_array();
    }

    public function tambahPosttest($data)
    {
        $this->db->insert('tb_posttest', $data);
    }

    public function hapusPosttest($id)
    {
        $this->db->where('id_posttest', $id);
        $this->db->delete('tb_posttest');
    }

    public function updatePosttest($id, $data)
    {
        $this->db->where('id_posttest', $id);
        $this->db->update('tb_posttest', $data);
    }
}
