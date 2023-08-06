<?php
class GlobalChat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chatglobal_model');
        $this->load->model('Chat_model');
        checkRole(0);
    }

    public function index()
    {
      
        $data['notifchat'] = $this->Chat_model->getChatData();   
        $data['chat_messages'] = $this->Chatglobal_model->get_chat_messages();
        $data['title'] = "Global Chat";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/template/sidebar', $data);
        $this->load->view('siswa/globalchat/global', $data);
        $this->load->view('siswa/template/footer');
    }
     public function fetch_chat_messages()

    {
        $chat_messages = $this->Chatglobal_model->get_chat_messages();
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

        $this->Chatglobal_model->insert_chat_message($data);
    }
}
?>
