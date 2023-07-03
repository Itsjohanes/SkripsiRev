<?php

class Materi_model extends CI_Model {
    public function getUserByEmail($email) {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getJumlahSiswa() {
        return $this->db->get_where('tb_akun', ['role' => 0])->num_rows();
    }

    public function getJumlahPretest($id) {
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $id,'id_test' => 1])->num_rows();
    }

    public function getJumlahPosttest($id) {
        return $this->db->get_where('tb_hasilprepost', ['id_siswa' => $id,'id_test' => 2])->num_rows();
    }

    public function getJumlahTugas($id, $pertemuan) {
        
        return $this->db->get_where('tb_hasiltugas', ['id_siswa' => $id, 'id_pertemuan' => $pertemuan])->num_rows();
    }

    public function getKelompok($id) {
        return $this->db->get_where('tb_random', ['id_user' => $id])->row_array();
    }

    public function getSiswaByKelompok($kelompok) {
        return $this->db->get_where('tb_random', ['kelompok' => $kelompok])->result_array();
    }
}
