<?php
class AdminGroupChat extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('Chat_model');
        $this->load->model('Chatgroup_model');
        checkRole(1);
        $this->role = $this->session->userdata('role');
    }

    public function index()
    {
        
        $data['notifchat'] = $this->Chat_model->getChatData();
        $data['title'] = "Group Chat";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/groupchat/pilih', $data);
        $this->load->view('admin/template/footer');
        
    }
     

    public function fetchadmin_chat_messages($kelompok)
    {
         $id_user = $this->session->userdata('id');
         $query = $this->db->get_where('tb_random', ['id_user' => $id_user]);
         
        $chat_messages = $this->Chatgroup_model->get_chat_messages($kelompok);
        echo json_encode($chat_messages);
    }
   
    public function saveadmin_message()
    {


        $id_user= $this->session->userdata('id');
        $message = $this->input->post('message');
        $kelompok = $this->input->post('kelompok');

        $data = array(
            'sender_id' =>  $id_user,
            'message' => $message,
            'kelompok' =>$kelompok,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->Chatgroup_model->insert_chat_message($data);
    }
    public function chooseGroup(){
        if ($this->role  == 1) {
        $data['notifchat'] = $this->Chat_model->getChatData();
        $data['title'] = "Group Chat";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompok'] = $this->input->post('kelompok');
        $kelompok = $this->input->post('kelompok');
        $data['chat_messages'] = $this->Chatgroup_model->get_chat_messages($kelompok);
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/groupchat/group', $data);
        $this->load->view('admin/template/footer');
        } else{
           redirect('siswa');
        }
    }
}
?>
