<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolaquiz_model extends CI_Model {

    public function getQuiz()
    {
       //return dari tb_prepost dengan id_test = 1
        return $this->db->get_where('tb_quiz')->result_array();

    }

    public function tambahQuiz($data)
    {
        $this->db->insert('tb_quiz', $data);
    }
    
    public function hapusQuiz($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->delete('tb_quiz');
    }

    public function getQuizById($id)
    {
        return $this->db->get_where('tb_quiz', ['id_soal' => $id])->row_array();
    }

    public function updateQuiz($id, $data)
    {
        $this->db->where('id_soal', $id);
        $this->db->update('tb_quiz', $data);
    }

}
