<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
    private $role;
    public function __construct()
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');
        parent::__construct();
        $this->load->model('ChatModel');
        $this->load->model('ChatModel');
        //default role = 0
        checkRole(0);
        $this->role = $this->session->userdata('role');
    }


    public function index()
    {
        
            $no =  $this->uri->segment(2);
            $data['data'] = $this->ChatModel->getDataById($no);
            $data['notifchat'] = $this->ChatModel->getChatData();
            if ($data['data'] == null) {
                die("user tidak ada nih");
            } else {
                $data['title']  = 'Chat';
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                if ($data['user']['role'] == '1') {
                    $this->load->view('backend/admin/header', $data);
                    $this->load->view('backend/admin/sidebar');
                    $this->load->view('backend/chat/chat', $data);
                    $this->load->view('backend/admin/footer');
                } else if($data['user']['role'] == '0'){
                    $this->load->view('backend/siswa/header', $data);
                    $this->load->view('backend/siswa/sidebar');
                    $this->load->view('backend/chat/chat', $data);
                    $this->load->view('backend/siswa/footer');
                }
            }
        
    }
    public function dua()
    {
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifchat'] = $this->ChatModel->getChatData();
        $data['title'] = 'Chat';
        if ($this->role == '1') {
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar',$data);
            $this->load->view('backend/chat/dua');
            $this->load->view('backend/admin/footer');
        } else if($this->role == '0') {
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar');
            $this->load->view('backend/chat/dua');
            $this->load->view('backend/siswa/footer');
        }else{
            redirect('Auth/login');
        }
    }
    public function loadChat()
    {
        $id =     $this->input->post('id');
        $id_lawan =     $this->input->post('id_lawan');
        $data = $this->ChatModel->getPesan($id, $id_lawan);

        echo json_encode(array(
            'data' => $data
        ));

        
    }
    public function KirimPesan()
    {
        $now = date("Y-m-d H:i:s");
        // var_dump($now);die;
        $pesan = $this->input->post('pesan');
        $id = $this->input->post('id');
        $id_lawan = $this->input->post('id_lawan');

        // $id_user =2;
        // $id_lawan =1;
        $in = array(
            'id' => $id,
            'id_lawan' => $id_lawan,
            'pesan' => $pesan,
            'waktu' => $now,
        );

        $this->ChatModel->TambahChatKeSatu($in);
        $log = array('status' => true);
        echo json_encode($log);
        return true;


       
    }

    public function GetAllOrang()
    {
        $id = $this->input->post('id');
        $data = $this->ChatModel->GetAllOrangKecUser($id);

        echo json_encode(array(
            'data' => $data
        ));

        
    }
    public function menu()
    {
            $data['notifchat'] = $this->ChatModel->getChatData();
       
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

            $data['title'] = 'Chat';
            if ($data['user']['role'] == '1') {
                $this->load->view('backend/admin/header', $data);
                $this->load->view('backend/admin/sidebar');
                $this->load->view('backend/chat/menu');
                $this->load->view('backend/admin/footer');
            } else if($data['user']['role'] == '0') {
                $this->load->view('backend/siswa/header', $data);
                $this->load->view('backend/siswa/sidebar');
                $this->load->view('backend/chat/menu');
                $this->load->view('backend/siswa/footer');
            }
        
    }
   
}
        

