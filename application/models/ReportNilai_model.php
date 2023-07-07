<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportNilai_model extends CI_Model
{
    public function getReportData()
    {
        $query = $this->db->select('*')
            ->from('tb_akun')
            ->where('role', 0)
            ->order_by('nama', 'ASC')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
}
