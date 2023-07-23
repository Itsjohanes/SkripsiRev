<?php
class Chatglobal_model extends CI_Model
{
    public function get_chat_messages()
    {
        $this->db->select('tb_akun.id, tb_akun.nama, tb_globalchat.message, tb_globalchat.created_at');
        $this->db->join('tb_akun', 'tb_akun.id = tb_globalchat.sender_id');

        $this->db->order_by('created_at', 'asc');
        return $this->db->get('tb_globalchat')->result_array();
    }

    public function insert_chat_message($data)
    {
        $this->db->insert('tb_globalchat', $data);
    }
    
}
?>
