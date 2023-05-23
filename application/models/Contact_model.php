<?php
class Contact_model extends CI_Model
{


    function tambahKontak($data, $table)
    {
        $this->db->insert($table, $data);
        //validasi berhasil
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
