<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelolalistsiswa_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Kelolapertemuan_model');
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getSiswa()
    {
        $this->db->select_max('id_pertemuan');
        $query = $this->db->get('tb_pertemuan');
        $result = $query->row_array();
        $jumlahPertemuan = $result['id_pertemuan'];
        $string = "tb_akun.*, tb_nilai.pretest, tb_nilai.posttest";
        for ($i = 1; $i <= $jumlahPertemuan; $i++) {
            if ($this->Kelolapertemuan_model->getPertemuanbyId($i) != null) {
                $string = $string . ",tb_nilai.tugas_" . $i . "";
            }
        }
        for ($i = 1; $i <= $jumlahPertemuan; $i++) {
            if ($this->Kelolapertemuan_model->getPertemuanbyId($i) != null) {
                $string = $string . ", tb_nilai.quiz_" . $i . "";
            }
        }
        $this->db->select($string);
        $this->db->from('tb_nilai');
        //joinkan dengan table tb_akun
        $this->db->join('tb_akun', 'tb_nilai.id_siswa = tb_akun.id');
        $this->db->order_by('nama', 'asc');
        //get array
        $siswa = $this->db->get()->result_array();
        return $siswa;
    }

    public function getSiswaById($id)
    {
        return $this->db->get_where('tb_akun', ['id' => $id])->row_array();
    }

    public function updateSiswa($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_akun', $data);
    }

    public function deleteSiswa($id)
    {
        $this->db->where('sender_id', $id);
        $groupchat_exists = $this->db->count_all_results('tb_groupchat');
        $this->db->where('sender_id', $id);
        $globalchat_exists = $this->db->count_all_results('tb_globalchat');
        $this->db->where('id', $id);
        $pesan1_exists = $this->db->count_all_results('tb_pesan');
        $this->db->where('id_lawan', $id);
        $pesan2_exists = $this->db->count_all_results('tb_pesan');
        $this->db->where('id_user', $id);
        $comments_exists = $this->db->count_all_results('tb_comments');
        $this->db->where('id_user', $id);
        $random_exists = $this->db->count_all_results('tb_random');
        $this->db->where('id_siswa', $id);
        $hasiltugas_exists = $this->db->count_all_results('tb_hasiltugas');
        $this->db->where('id_siswa', $id);
        $hasilprepost_exists = $this->db->count_all_results('tb_hasilprepost');

        if ($groupchat_exists > 0 || $globalchat_exists > 0 || $pesan1_exists > 0 || $pesan2_exists > 0 || $comments_exists > 0 || $random_exists > 0 || $hasiltugas_exists > 0 || $hasilprepost_exists > 0) {
            return ("Gagal");
        } else {
            //Delete dari tb_nilai
            $this->db->where('id_siswa', $id);
            $this->db->delete('tb_nilai');
            //Delete dari tb_akun
            $this->db->where('id', $id);
            $this->db->delete('tb_akun');
        }
    }
    public function deleteNilai($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete('tb_nilai');
    }
}
