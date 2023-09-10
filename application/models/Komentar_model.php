<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar_model extends CI_Model {

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function get_comments($id) {
    $comments = array();

    // Query untuk mengambil komentar utama
    $query = $this->db->query("SELECT c.id_comment, c.id_user, c.comment, a.nama 
        FROM tb_comments AS c 
        JOIN tb_akun AS a ON c.id_user = a.id 
        WHERE c.parent_id = 0 AND c.id_pertemuan = ?", array($id));

    foreach ($query->result() as $row) {
        $comment_id = $row->id_comment;
        
        // Query untuk mengambil reply (balasan) dengan nama pengirim yang sesuai
        $reply_query = $this->db->query("SELECT r.id_comment, r.id_user, r.comment, b.nama 
            FROM tb_comments AS r 
            JOIN tb_akun AS b ON r.id_user = b.id 
            WHERE r.parent_id = ?", array($comment_id));

        $replies = $reply_query->result();

        $comment = (object) array(
            'id_comment' => $row->id_comment,
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
