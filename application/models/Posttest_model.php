<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posttest_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getPosttestQuestions()
    {
        $this->db->where('id_test', 2);
        $result = $this->db->get('tb_prepost')->result_array();
        return $result;
    }

    public function getPosttestQuestionCount()
    {
       $this->db->where('id_test', 2);
        $result = $this->db->get('tb_prepost')->num_rows();
        return $result;
    }

    public function getPosttestCountBySiswaId($siswaId)
    {
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $siswaId, 'id_test' => 2])->num_rows();
    }

    public function getPosttestStatus()
    {
        return $this->db->get_where('tb_test', ['id_tes' => 2])->row_array();
    }

    public function checkAnswer($nomor, $jawaban)
    {
        $query = $this->db->query("SELECT * FROM tb_prepost WHERE id_soal='$nomor' AND kunci='$jawaban' AND id_test = 2");
        $cek = $query->result_array();

        if ($cek) {
            return true;
        } else {
            return false;
        }
    }

    public function savePosttestResult($data)
    {
        $this->db->insert('tb_hasilprepost', $data);
    }
}
