<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getKelompokByIdUser($id)
    {
        return $this->db->get_where('tb_random', ['id_user' => $id])->row_array();
    }

    public function getJumlahSiswa()
    {
        return $this->db->get_where('tb_akun', ['role' => 0])->num_rows();
    }

    public function getPretestCount($id_siswa)
    {
        
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $id_siswa,'id_test' => 1])->num_rows();
    }

    public function getPosttestCount($id_siswa)
    {
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $id_siswa,'id_test' => 2])->num_rows();
    }

    public function getTugasCount($id_siswa, $pertemuan)
    {
        return $this->db->get_where('tb_hasiltugas', ['id_siswa' => $id_siswa, 'id_pertemuan' => $pertemuan])->num_rows();
    }

    public function getSiswaByRole($role)
    {
        return $this->db->get_where('tb_akun', ['role' => $role])->result_array();
    }
    public function getRanking(){

        $pertemuan =  $this->db->get('tb_pertemuan')->result_array();
        $jumlahPertemuan = count($pertemuan);
        $string = "nama, (COALESCE(pretest, 0) + COALESCE(posttest, 0)";
        for($i = 1;$i<=$jumlahPertemuan;$i++){
            $string = $string." + COALESCE(tugas_".$i.", 0)";

        }
        $string = $string.") AS total_nilai";
        $this->db->select($string);
        $this->db->from('tb_akun');
        $this->db->where('role','0');
        $this->db->order_by('total_nilai', 'desc');
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();

        $data['ranking_siswa'] = array();

        $ranking = 1;
        foreach ($query->result() as $row) {
            $data['ranking_siswa'][] = array(
                'ranking' => $ranking,
                'nama' => $row->nama,
                'total_nilai' => $row->total_nilai
            );
            $ranking++;
        }

        return $data['ranking_siswa'];


    }
}
