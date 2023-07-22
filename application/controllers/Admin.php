<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('ChatModel');
        checkRole(1);
       
    }
    public function index()
    {
            $data['title'] = "Home Admin";
            $data['user'] = $this->Admin_model->getUserByEmail($this->session->userdata('email'));
            $data['siswa'] = $this->Admin_model->getTotalStudents();
            
            $data['pretest'] = $this->Admin_model->getTotalPretests();
            $data['posttest'] = $this->Admin_model->getTotalPosttests();
            $data['ranking'] = $this->Admin_model->getRanking();
            $jumlahSiswa = $this->Admin_model->getTotalStudents();
            $pertemuan = $this->Kelolapertemuan_model->getPertemuan();
            $jumlahPretest = $this->Admin_model->getTotalHasilPretest();
            $jumlahPosttest = $this->Admin_model->getTotalHasilPosttest();
             $this->db->select_max('id_pertemuan');
            $query = $this->db->get('tb_pertemuan');
            $result = $query->row_array();
            $jumlahPertemuan = $result['id_pertemuan'];
            for($i = 1;$i<=$jumlahPertemuan;$i++){
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $tugas[$i] = $this->Admin_model->getTotalHasilTugas($i);
                }
                
            }
            if ($jumlahSiswa != 0) {
                $data['persentasepretest'] = ($jumlahPretest / $jumlahSiswa) * 100;
                $data['persentaseposttest'] = ($jumlahPosttest / $jumlahSiswa) * 100;
                for($i = 1;$i<=$jumlahPertemuan;$i++){
                    if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                        $data['persentasetugas'.$i] = ($tugas[$i] / $jumlahSiswa) * 100;
                    }
                }
              
            } else {
                $data['persentasetugas'.$i] = 0 * 100;
            }
            //ambil id dari session
            $id_lawan_sesi = $this->session->userdata('id');
            
            $this->db->select('tb_pesan.*, tb_akun.nama');
            $this->db->from('tb_pesan');
            $this->db->join('tb_akun', 'tb_pesan.id = tb_akun.id');
            $this->db->where('tb_pesan.id_lawan', $id_lawan_sesi);
            $query = $this->db->get();
            $data['pertemuan'] = $pertemuan;
            $data['notifchat'] = $this->ChatModel->getChatData();
            $data['jumlahpertemuan'] = $jumlahPertemuan;
            $data['nilaiTertinggi'] = $this->Admin_model->getNilaiTertinggi();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/index', $data);
            $this->load->view('backend/admin/footer');
        
    }
}
