<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaPertemuan_model extends CI_Model
{



    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getPertemuan()
    {
        return $this->db->get('tb_pertemuan')->result_array();
    }
    public function getPertemuanbyId($id)
    {
        return $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array();
    }
    public function getMax()
    {

        $this->db->select_max('id_pertemuan');
        $query = $this->db->get('tb_pertemuan');
        $result = $query->row_array();
        return $result['id_pertemuan'];
    }
    public function tambahPertemuan($data)
    {
        $this->db->insert('tb_pertemuan', $data);
        //tambahkan collumn pada tb_akun 
        $this->db->query("ALTER TABLE tb_nilai ADD COLUMN `tugas_" . $this->db->insert_id() . "` INT  NULL  AFTER `posttest`");
        $this->db->query("ALTER TABLE tb_nilai ADD COLUMN `quiz_" . $this->db->insert_id() . "` INT  NULL  AFTER `posttest`");

    }
    public function hapusPertemuan($id)
    {
        // Check if data exists in tb_materi
        $this->db->where('id_pertemuan', $id);
        $materi_exists = $this->db->count_all_results('tb_materi');

        $this->db->where('id_pertemuan', $id);
        $komentar_exists = $this->db->count_all_results('tb_comments');

        // Check if data exists in tb_youtube
        $this->db->where('id_pertemuan', $id);
        $youtube_exists = $this->db->count_all_results('tb_youtube');

        $this->db->where('id_pertemuan',$id);
        $quiz_exists = $this->db->count_all_results('tb_quiz');

        // Check if data exists in tb_tugas
        $this->db->where('id_pertemuan', $id);
        $tugas_exists = $this->db->count_all_results('tb_tugas');

        // Check if data exists in tb_hasiltugas
        $this->db->where('id_pertemuan', $id);
        $hasiltugas_exists = $this->db->count_all_results('tb_hasiltugas');

        // Check if any of the tables have data related to the id_pertemuan
        if ($materi_exists > 0 || $youtube_exists > 0 || $tugas_exists > 0 || $hasiltugas_exists > 0 || $komentar_exists > 0 || $quiz_exists > 0) {
            // If data exists in any of the related tables, do not delete
            return ("Gagal");
        } else {
            // If no data exists in any of the related tables, proceed with deleting the record from 'tb_pertemuan'
            $this->db->where('id_pertemuan', $id);
            $this->db->delete('tb_pertemuan');
            $this->db->query("ALTER TABLE tb_nilai DROP COLUMN `tugas_" . $id . "`");
            $this->db->query("ALTER TABLE tb_nilai DROP COLUMN `quiz_" . $id . "`");
            return ("Berhasil");
        }
    }


    public function aktifkanPertemuan($id)
    {
        $this->db->set('aktif', '1');
        $this->db->where('id_pertemuan', $id);
        $this->db->update('tb_pertemuan');
    }

    public function matikanPertemuan($id)
    {
        $this->db->set('aktif', '0');
        $this->db->where('id_pertemuan', $id);
        $this->db->update('tb_pertemuan');
    }
    public function editPertemuan($id, $penjelasan, $gambar, $tp,$dateline_tgs,$apersepsi)
    {
        $this->db->set('tp', $tp);
        $this->db->set('gambar', $gambar);
        $this->db->set('penjelasan', $penjelasan);
        $this->db->set('dateline_tgs',$dateline_tgs);
        $this->db->set('kktp',$kktp);
        $this->db->set('apersepsi',$apersepsi);
        $this->db->where('id_pertemuan', $id);
        $this->db->update('tb_pertemuan');
    }
}
