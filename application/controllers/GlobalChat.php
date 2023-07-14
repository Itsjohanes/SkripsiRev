<?php
class GlobalChat extends CI_Controller
{
    private $role;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
        $this->load->model('ChatModel');
        checkRole(0);
        $this->role = $this->session->userdata('role');
    }

    public function index()
    {
        if ($this->role == 1) {
        $data['notifchat'] = $this->ChatModel->getChatData();
        $data['chat_messages'] = $this->chat_model->get_chat_messages();


        $data['title'] = "Global Chat";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
    
        $this->load->view('backend/admin/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/chat/global', $data);
        $this->load->view('backend/admin/footer');

        }else{
        $data['notifchat'] = $this->ChatModel->getChatData();   
        $data['chat_messages'] = $this->chat_model->get_chat_messages();
        $data['title'] = "Global Chat";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('backend/siswa/header', $data);
        $this->load->view('backend/siswa/sidebar', $data);
        $this->load->view('backend/chat/global', $data);
        $this->load->view('backend/siswa/footer');
         }   
    }
     public function fetch_chat_messages()

    {
        $chat_messages = $this->chat_model->get_chat_messages();
        echo json_encode($chat_messages);
    }

    public function save_message()
    {

        $id_user= $this->session->userdata('id');
        $message = $this->input->post('message');

        $data = array(
            'sender_id' =>  $id_user,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->chat_model->insert_chat_message($data);
    }
}
?>
