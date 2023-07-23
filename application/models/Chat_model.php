<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chat_model extends CI_Model
{


    public function getPesan($id, $id_lawan)
    {
        $this->db->from('tb_pesan');
        $this->db->where('id_pengirim= ' . $id . ' 
	and id_lawan=' . $id_lawan . ' 
	or id_pengirim= ' . $id_lawan . ' 
	and id_lawan=' . $id);

        $r = $this->db->get();

        return $r->result();
    }
    public function TambahChatKeSatu($in)
    {
        $this->db->insert('tb_pesan', $in);

        # code...
    }


    public function getDataById($no)
    {
        $this->db->from('tb_akun');
        $this->db->where('id', $no);
        $sql = $this->db->get()->row();
        if ($sql == null) {
            return null;
        } else {
            return $sql;
        }
        # code...
    }
    public function GetAllOrangKecUser($id)
    {

        $this->db->from('tb_akun');
        $this->db->where('id !=', $id);
        return $sql = $this->db->get()->result();
        # code...
    }
    public function Tambah($tabel, $in)
    {
        $this->db->insert($tabel, $in);
    }

    public function getChatData()
    {
        $id_lawan_sesi = $this->session->userdata('id');

        $this->db->select('tb_pesan.*, tb_akun.nama');
        $this->db->from('tb_pesan');
        $this->db->join('tb_akun', 'tb_pesan.id_pengirim = tb_akun.id');
        $this->db->where('tb_pesan.id_lawan', $id_lawan_sesi);
        $query = $this->db->get();
        return $query->result();
    }
}
                        
/* End of file ChatModel.php */
