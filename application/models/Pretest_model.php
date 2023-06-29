<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pretest_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getPretestQuestions()
    {
        return $this->db->get('tb_pretest')->result_array();
    }

    public function getPretestQuestionCount()
    {
        return $this->db->get('tb_pretest')->num_rows();
    }

    public function getPretestCountBySiswaId($siswaId)
    {
        return $this->db->get_where('tb_hasilpretest', ['id_siswa' => $siswaId])->num_rows();
    }

    public function getPretestStatus()
    {
        return $this->db->get_where('tb_test', ['id_tes' => 1])->row_array();
    }

    public function checkAnswer($nomor, $jawaban)
    {
        $query = $this->db->query("SELECT * FROM tb_pretest WHERE id_pretest='$nomor' AND kunci='$jawaban'");
        $cek = $query->result_array();

        if ($cek) {
            return true;
        } else {
            return false;
        }
    }

    public function savePretestResult($data)
    {
        $this->db->insert('tb_hasilpretest', $data);
    }
}
