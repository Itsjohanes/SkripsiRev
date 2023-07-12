<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolapretest_model extends CI_Model {

    public function getPretest()
    {
       //return dari tb_prepost dengan id_test = 1
        return $this->db->get_where('tb_prepost', ['id_test' => 1])->result_array();

    }

    public function tambahPretest($data)
    {
        $this->db->insert('tb_prepost', $data);
    }
    public function aturWaktu($data){
        $this->db->where('id_tes', 1);
        $this->db->update('tb_test', $data);
    }

    public function hapusPretest($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->delete('tb_prepost');
    }

    public function getPretestById($id)
    {
        return $this->db->get_where('tb_prepost', ['id_soal' => $id])->row_array();
    }

    public function updatePretest($id, $data)
    {
        $this->db->where('id_soal', $id);
        $this->db->update('tb_prepost', $data);
    }

}
