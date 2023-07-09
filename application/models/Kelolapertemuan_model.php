<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPertemuan_model extends CI_Model {

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
    public function editTp($id,$tp,$link){
        $this->db->set('videoconference',$link);
        $this->db->set('tp', $tp);
        $this->db->where('id_pertemuan', $id);
        $this->db->update('tb_pertemuan');
    }
    
}
