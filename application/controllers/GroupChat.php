<?php
class GroupChat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
        $data['chat_messages'] = $this->chat_model->get_chat_messages();


        $data['title'] = "Group Chat";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
    
        $this->load->view('backend/admin/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/chat/global', $data);
        $this->load->view('backend/admin/footer');

        }else if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 0) {
             $data['chat_messages'] = $this->chat_model->get_chat_messages();
        $data['title'] = "Group Chat";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

         $this->load->view('backend/siswa/header', $data);
        $this->load->view('backend/siswa/sidebar', $data);
        $this->load->view('backend/chat/global', $data);
        $this->load->view('backend/siswa/footer');

            
        }else{
             redirect('Auth/login');
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
