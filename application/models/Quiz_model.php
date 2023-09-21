<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getQuizQuestions($id)
    {

        $this->db->where('id_pertemuan', $id);
        $result = $this->db->get('tb_quiz')->result_array();
        return $result;
    }
    
    public function getQuizQuestionCount($id)
    {
        $this->db->where('id_pertemuan', $id);
        $result = $this->db->get('tb_quiz')->num_rows();
        return $result;
    }

  
    public function getQuizCountBySiswaId($siswaId, $id)
    {
        return $this->db->get_where('tb_hasilquiz', ['id_siswa' => $siswaId, 'id_pertemuan' => $id])->num_rows();
    }
    
    public function checkAnswer($nomor, $jawaban, $id_pertemuan)
    {
        $query = $this->db->query("SELECT * FROM tb_quiz WHERE id_soal='$nomor' AND kunci='$jawaban' AND id_pertemuan = '$id_pertemuan' ");
        $cek = $query->result_array();

        if ($cek) {
            return true;
        } else {
            return false;
        }
    }

    public function saveQuizResult($data)
    {
        $this->db->insert('tb_hasilquiz', $data);

        $id = $data['id_siswa'];
        $id_pertemuan = $data['id_pertemuan'];
        $score = $data['score'];
        $this->db->where('id_siswa', $id);
        $this->db->update('tb_nilai', array('quiz_'.$id_pertemuan => $score));
    }
   
}
