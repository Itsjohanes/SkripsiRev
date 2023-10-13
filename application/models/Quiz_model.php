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
        $nilai = $data['nilai'];
        $this->db->where('id_siswa', $id);
        $this->db->update('tb_nilai', array('quiz_'.$id_pertemuan => $nilai));
    }
   // Define a function to get quiz answers by pertemuan and siswa id
    public function getQuizAnswers($id_pertemuan, $id_siswa) {
        // Select the 'jawaban' field
        $this->db->select('jawaban');
        // Specify the table
        $this->db->from('tb_hasilquiz');
        // Add the WHERE clauses for id_pertemuan and id_siswa
        $this->db->where('id_pertemuan', $id_pertemuan);
        $this->db->where('id_siswa', $id_siswa);
        
        // Execute the query
        $query = $this->db->get();
        
        // Check if the query was successful
        if ($query) {
            // Return the result as an array of objects
            return $query->result();
        } else {
            // Handle the case where the query failed (e.g., log an error, return an error message)
            return false;
        }
    }
    public function getNilai($id_pertemuan,$id_siswa){
        $this->db->select('nilai');
        $this->db->from('tb_hasilquiz');
        $this->db->where('id_pertemuan', $id_pertemuan);
        $this->db->where('id_siswa', $id_siswa);
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function checkPs($nomor){
        $query = $this->db->query("SELECT id_ps FROM tb_quiz WHERE id_soal='$nomor'");
        //kembalikan id_ps
        return $query->row_array();
        
    }
    public function getCountIndikatorPS1($id_pertemuan){
        $query = $this->db->query("SELECT COUNT(id_ps) as jumlah FROM tb_quiz WHERE id_ps = 1 AND  id_pertemuan='$id_pertemuan'");
        return $query->row_array();
        
    }
    public function getCountIndikatorPS2($id_pertemuan){
        $query = $this->db->query("SELECT COUNT(id_ps) as jumlah FROM tb_quiz WHERE id_ps = 2 AND  id_pertemuan='$id_pertemuan'");
        return $query->row_array();
    }
    public function getCountIndikatorPS3($id_pertemuan){
        $query = $this->db->query("SELECT COUNT(id_ps) as jumlah FROM tb_quiz WHERE id_ps = 3 AND id_pertemuan='$id_pertemuan'");
        return $query->row_array();
    }
    public function getCountIndikatorPS4($id_pertemuan){
        $query = $this->db->query("SELECT COUNT(id_ps) as jumlah FROM tb_quiz WHERE id_ps = 4 AND id_pertemuan='$id_pertemuan'");
        return $query->row_array();
    }
   
}
