<?php
class Chatgroup_model extends CI_Model
{
    public function get_chat_messages($kelompok)
    {
        $this->db->select('tb_akun.id, tb_akun.nama, tb_groupchat.message, tb_groupchat.created_at');
        $this->db->join('tb_akun', 'tb_akun.id = tb_groupchat.sender_id');
        $this->db->where('tb_groupchat.kelompok', $kelompok);
        $this->db->order_by('created_at', 'asc');
        return $this->db->get('tb_groupchat')->result_array();
    }

    public function insert_chat_message($data)
    {
        $this->db->insert('tb_groupchat', $data);
    }
}
?>
