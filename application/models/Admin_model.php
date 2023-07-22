<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kelolapertemuan_model');
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    }

    public function getTotalStudents()
    {
        return $this->db->get_where('tb_akun', ['role' => 0])->num_rows();
    }

    public function getTotalPretests()
    {
        //where id_test = 1

        $this->db->where('id_test', 1);
        $result = $this->db->get('tb_prepost')->num_rows();
        return $result;
    }

    public function getTotalPosttests()
    {
        $this->db->where('id_test', 2);
        $result = $this->db->get('tb_prepost')->num_rows();
        return $result;
    }

    public function getTotalHasilPretest()
    {
         $this->db->where('id_test', 1);
        $result = $this->db->get('tb_hasilprepost')->num_rows();
        return $result;
    }

    public function getTotalHasilPosttest()
    {
        $this->db->where('id_test', 2);
        $result = $this->db->get('tb_hasilprepost')->num_rows();
        return $result;
    }

    public function getTotalHasilTugas($pertemuan)
    {
        return $this->db->get_where('tb_hasiltugas', ['id_pertemuan' => $pertemuan])->num_rows();
    }
    public function getNilaiTertinggi(){
        $this->db->select_max('id_pertemuan');
        $query = $this->db->get('tb_pertemuan');
        $result = $query->row_array();
        $jumlahPertemuan = $result['id_pertemuan'];

        $string = "nama, (COALESCE(pretest, 0) + COALESCE(posttest, 0)";
        for($i = 1;$i<=$jumlahPertemuan;$i++){
            if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                 $string = $string." + COALESCE(tugas_".$i.", 0)";
            }
           

        }
        $string = $string.") AS total_nilai";
        $this->db->select($string);
        $this->db->from('tb_akun');
        $this->db->order_by('total_nilai', 'desc');
        $this->db->order_by('nama', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();

        $data['siswa'] = null;

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data['siswa'] = array(
                'nama' => $row->nama,
                'total_nilai' => $row->total_nilai
            );
        }

        return $data['siswa'];

    }
    public function getRanking(){

        $this->db->select_max('id_pertemuan');
        $query = $this->db->get('tb_pertemuan');
        $result = $query->row_array();
        $jumlahPertemuan = $result['id_pertemuan'];
        $string = "nama, (COALESCE(pretest, 0) + COALESCE(posttest, 0)";
        for($i = 1;$i<=$jumlahPertemuan;$i++){
            if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                $string = $string." + COALESCE(tugas_".$i.", 0)";
            }

        }
        $string = $string.") AS total_nilai";
        $this->db->select($string);
        $this->db->from('tb_akun');
        $this->db->where('role','0');
        $this->db->order_by('total_nilai', 'desc');
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();

        $data['ranking_siswa'] = array();

        $ranking = 1;
        foreach ($query->result() as $row) {
            $data['ranking_siswa'][] = array(
                'ranking' => $ranking,
                'nama' => $row->nama,
                'total_nilai' => $row->total_nilai
            );
            $ranking++;
        }

        return $data['ranking_siswa'];


    }
}
