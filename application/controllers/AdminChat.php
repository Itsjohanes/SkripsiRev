<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminChat extends CI_Controller
{
    private $role;
    public function __construct()
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');
        parent::__construct();
        $this->load->model('Chat_model');
        checkRole(1);
    }


    public function index()
    {
        
            $no =  $this->uri->segment(2);
            
            $data['data'] = $this->Chat_model->getDataById($no);
            $data['notifchat'] = $this->Chat_model->getChatData();
            if ($data['data'] == null) {
                redirect('chat/menu');
            } else {
                $data['title']  = 'Chat';
                $data['id'] = $this->session->userdata('id');
                $data['nama'] = $this->session->userdata('nama');
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/template/sidebar');
                $this->load->view('admin/chat/chat', $data);
                $this->load->view('admin/template/footer');
                
            }
        
    }
    
    public function loadChat()
    {
        $id_pengirim =     $this->input->post('id_pengirim');
        $id_lawan =     $this->input->post('id_lawan');
        $data = $this->Chat_model->getPesan($id_pengirim, $id_lawan);

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
            'id_pengirim' => $id,
            'id_lawan' => $id_lawan,
            'pesan' => $pesan,
            'waktu' => $now,
        );

        $this->Chat_model->TambahChatKeSatu($in);
        $log = array('status' => true);
        echo json_encode($log);
        return true;


       
    }

    public function GetAllOrang()
    {
        $id = $this->input->post('id');
        $data = $this->Chat_model->GetAllOrangKecUser($id);

        echo json_encode(array(
            'data' => $data
        ));

        
    }
    public function menu()
    {
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['id'] = $this->session->userdata('id');
            $data['nama'] = $this->session->userdata('nama');
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

            $data['title'] = 'Chat';
            
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/chat/menu');
            $this->load->view('admin/template/footer');
            
        
    }
   
}
        

