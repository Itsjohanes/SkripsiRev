<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Randomkelompok_model extends CI_Model {

    public function getRandoms()
    {
        return $this->db->get('tb_random')->result_array();
    }

    public function insertRandom($data)
    {
        $this->db->insert('tb_random', $data);
    }

    public function deleteRandom()
    {
        $this->db->empty_table('tb_random');
        $this->db->empty_table('tb_groupchat');
    }
}
