<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolapretest_model extends CI_Model {

    public function getPretest()
    {
        return $this->db->get('tb_pretest')->result_array();
    }

    public function tambahPretest($data)
    {
        $this->db->insert('tb_pretest', $data);
    }

    public function hapusPretest($id)
    {
        $this->db->where('id_pretest', $id);
        $this->db->delete('tb_pretest');
    }

    public function getPretestById($id)
    {
        return $this->db->get_where('tb_pretest', ['id_pretest' => $id])->row_array();
    }

    public function updatePretest($id, $data)
    {
        $this->db->where('id_pretest', $id);
        $this->db->update('tb_pretest', $data);
    }

}
