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
        return $this->db->get('tb_posttest')->result_array();
    }

    public function getPosttestQuestionCount()
    {
        return $this->db->get('tb_posttest')->num_rows();
    }

    public function getPosttestCountBySiswaId($siswaId)
    {
        return $this->db->get_where('tb_hasilposttest', ['id_siswa' => $siswaId])->num_rows();
    }

    public function getPosttestStatus()
    {
        return $this->db->get_where('tb_test', ['id_tes' => 2])->row_array();
    }

    public function checkAnswer($nomor, $jawaban)
    {
        $query = $this->db->query("SELECT * FROM tb_posttest WHERE id_posttest='$nomor' AND kunci='$jawaban'");
        $cek = $query->result_array();

        if ($cek) {
            return true;
        } else {
            return false;
        }
    }

    public function savePosttestResult($data)
    {
        $this->db->insert('tb_hasilposttest', $data);
    }
}
