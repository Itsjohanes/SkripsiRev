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

        $this->db->where('id_test', 1);
        $result = $this->db->get('tb_prepost')->result_array();
        return $result;
    }
    public function getWaktu()
    {
        $this->db->where('id_tes', 1);
        $result = $this->db->get('tb_test')->row_array();
        return $result;
    }

    public function getPretestQuestionCount()
    {
        $this->db->where('id_test', 1);
        $result = $this->db->get('tb_prepost')->num_rows();
        return $result;
    }

    public function getPretestCountBySiswaId($siswaId)
    {
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $siswaId, 'id_test' => 1])->num_rows();
    }

    public function getPretestStatus()
    {
        return $this->db->get_where('tb_test', ['id_tes' => 1])->row_array();
    }

    public function checkAnswer($nomor, $jawaban)
    {
        $query = $this->db->query("SELECT * FROM tb_prepost WHERE id_soal='$nomor' AND kunci='$jawaban' AND id_test = 1");
        $cek = $query->result_array();

        if ($cek) {
            return true;
        } else {
            return false;
        }
    }

    public function savePretestResult($data)
    {
        $this->db->insert('tb_hasilprepost', $data);

        $id = $data['id_siswa'];
        $score = $data['score'];
        $this->db->where('id_siswa', $id);
        $this->db->update('tb_nilai', array('pretest' => $score));
    }
    public function checkPs($nomor){
        $query = $this->db->query("SELECT id_ps FROM tb_prepost WHERE id_soal='$nomor' AND id_test = 1");
        //kembalikan id_ps
        return $query->row_array();
        
    }
    public function getCountIndikatorPS1(){
        $query = $this->db->query("SELECT COUNT(id_ps) as jumlah FROM tb_prepost WHERE id_ps = 1 AND id_test = 1");
        return $query->row_array();
        
    }
    public function getCountIndikatorPS2(){
        $query = $this->db->query("SELECT COUNT(id_ps) as jumlah FROM tb_prepost WHERE id_ps = 2 AND id_test = 1");
        return $query->row_array();
    }
    public function getCountIndikatorPS3(){
        $query = $this->db->query("SELECT COUNT(id_ps) as jumlah FROM tb_prepost WHERE id_ps = 3 AND id_test = 1");
        return $query->row_array();
    }
    public function getCountIndikatorPS4(){
        $query = $this->db->query("SELECT COUNT(id_ps) as jumlah FROM tb_prepost WHERE id_ps = 4 AND id_test = 1");
        return $query->row_array();
    }
}
