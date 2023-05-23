<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ChatModel extends CI_Model
{


    public function getPesan($id, $id_lawan)
    {
        $this->db->from('tb_pesan');
        $this->db->where('id= ' . $id . ' 
	and id_lawan=' . $id_lawan . ' 
	or id= ' . $id_lawan . ' 
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
}
                        
/* End of file ChatModel.php */
