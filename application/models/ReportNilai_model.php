<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportNilai_model extends CI_Model
{
    public function getReportData()
    {
        $query = $this->db->select('tb_nilai.*, tb_akun.nama')
            ->from('tb_nilai')
            ->join('tb_akun', 'tb_akun.id = tb_nilai.id_siswa')
            ->order_by('tb_akun.nama', 'ASC')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
}
