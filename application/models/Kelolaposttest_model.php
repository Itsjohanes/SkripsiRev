<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolaposttest_model extends CI_Model {

    public function getPosttest()
    {
        return $this->db->get_where('tb_prepost', ['id_test' => 2])->result_array();
    }

    public function getPosttestById($id)
    {
        return $this->db->get_where('tb_prepost', ['id_soal' => $id])->row_array();
    }
    public function aturWaktu($data){
        $this->db->where('id_tes', 2);
        $this->db->update('tb_test', $data);
    }

    public function tambahPosttest($data)
    {
        $this->db->insert('tb_prepost', $data);
    }

    public function hapusPosttest($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->delete('tb_prepost');
    }

    public function updatePosttest($id, $data)
    {
        $this->db->where('id_soal', $id);
        $this->db->update('tb_prepost', $data);
    }
}
