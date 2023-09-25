<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menilaiquiz_model extends CI_Model
{

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getHasilQuiz($id)
    {
        $this->db->select('*');
        $this->db->from('tb_hasilquiz');
        $this->db->where('id_pertemuan', $id);
        $this->db->join('tb_akun', 'tb_akun.id = tb_hasilquiz.id_siswa');
        $this->db->order_by('tb_akun.nama', 'asc');

        return $this->db->get()->result_array();
    }
    public function deleteHasilQuiz($id,$id_pertemuan,$id_siswa){
        $this->db->where('id_hasilquiz', $id);
        $this->db->delete('tb_hasilquiz');
        //delete juga dari tb_nilai nilai dari column quiz_.$id_pertemuan berdasarkan id_siswa
        $this->db->where('id_siswa', $id_siswa);
        $this->db->set('quiz_'.$id_pertemuan, null);
        $this->db->update('tb_nilai');

    }

}
