<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertemuan_model extends CI_Model {

   
    public function insertHasilTugas($data) {
        $this->db->insert('tb_hasiltugas', $data);
    }

    public function deleteHasilTugas($id) {
        $this->db->where('id_hasiltugas', $id);
        $this->db->delete('tb_hasiltugas');
    }

    public function getHasilTugasById($id) {
        return $this->db->get_where('tb_hasiltugas', ['id_hasiltugas' => $id])->row_array();
    }
    public function getPertemuanById($id){
        return $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array();
    }

    public function updateHasilTugas($id, $data) {
        $this->db->where('id_hasiltugas', $id);
        $this->db->update('tb_hasiltugas', $data);
    }
    public function insertRefleksi($data){
        $this->db->insert('tb_hasilrefleksi', $data);

    }
    public function getRefleksi($id_pert,$id_siswa){
        return $this->db->get_where('tb_hasilrefleksi', ['id_pertemuan' => $id_pert,'id_siswa'=>$id_siswa])->row_array();

    }
    public function getKelompokByIdUser($id)
    {
        return $this->db->get_where('tb_random', ['id_user' => $id])->row_array();
    }
}
