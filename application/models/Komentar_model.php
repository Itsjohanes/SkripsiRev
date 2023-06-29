<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar_model extends CI_Model {

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function get_comments($id) {
    
        //select nama pengirim dari tabel tb_akun yang dijoinkan dengan id_user pada tabel comment
    
        $query = $this->db->query("SELECT c.id, c.id_user, c.comment, a.nama FROM tb_comments AS c JOIN tb_akun AS a ON c.id_user = a.id WHERE c.parent_id = 0 and c.pertemuan = $id");
    
    $comments = array();

    foreach ($query->result() as $row) {
        $comment_id = $row->id;
        
        // Mengambil reply berdasarkan komentar utama
        //dapatkan juga nama pengirim dari tabel tb_akun yang dijoinkan dengan id_user pada tabel comment
        $reply_query = $this->db->query("SELECT c.id, c.id_user, c.comment, a.nama FROM tb_comments AS c JOIN tb_akun AS a ON c.id_user = a.id WHERE c.parent_id = $comment_id");
     
        $replies = $reply_query->result();

        $comment = (object) array(
            'id' => $row->id,
            'id_user' => $row->id_user,
            'comment' => $row->comment,
            'nama' => $row->nama,
            'replies' => $replies           
        );
        $comments[] = $comment;
    }
    return $comments;
}
    public function save_comment($data) {
        $this->db->insert('tb_comments', $data);
    }

    public function save_reply($data) {
        $this->db->insert('tb_comments', $data);
    }

}
