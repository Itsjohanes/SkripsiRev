<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menilaipertemuan_model extends CI_Model
{

    public function getSiswa()
    {
        return $this->db->get_where('tb_akun', ['role' => 0])->result_array();
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getHasilTugasPertemuan($pertemuan)
    {
        $this->db->select('*');
        $this->db->from('tb_hasiltugas');
        $this->db->where('id_pertemuan', $pertemuan);
        $this->db->join('tb_akun', 'tb_akun.id = tb_hasiltugas.id_siswa');
        $this->db->order_by('tb_akun.nama', 'asc');

        return $this->db->get()->result_array();
    }

    public function getHasilTugasById($id)
    {
        return $this->db->get_where('tb_hasiltugas', ['id_hasiltugas' => $id])->row_array();
    }

    public function updateHasilTugas($id, $data)
    {

        // Mendapatkan id_pertemuan berdasarkan id_hasil_tugas
        $this->db->select('id_pertemuan');
        $this->db->where('id_hasiltugas', $id);
        $query = $this->db->get('tb_hasiltugas');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $id_pertemuan = $row->id_pertemuan;

            // Mendapatkan id_siswa dari tb_hasiltugas berdasarkan id_hasil_tugas
            $this->db->select('id_siswa');
            $this->db->where('id_hasiltugas', $id);
            $query = $this->db->get('tb_hasiltugas');

            if ($query->num_rows() > 0) {
                $row = $query->row();
                $id_siswa = $row->id_siswa;

                $this->db->set('tugas_' . $id_pertemuan, $data['nilai']);
                $this->db->where('id_siswa', $id_siswa);
                $this->db->update('tb_nilai');
            }

            $this->db->where('id_hasiltugas', $id);
            $this->db->update('tb_hasiltugas', $data);
        }
    }
}
