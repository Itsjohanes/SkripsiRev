<?php
class GroupChat extends CI_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('Chat_model');
        $this->load->model('Chatgroup_model');
        checkRole(0);
    }

    public function index()
    {
     
            $id_user = $this->session->userdata('id');
            $query = $this->db->get_where('tb_random', ['id_user' => $id_user]);
            if($query->num_rows() > 0){
                 $result = $query->row();
                $kelompok = $result->kelompok;
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['chat_messages'] = $this->Chatgroup_model->get_chat_messages($kelompok);
                $data['title'] = "Group Chat";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('backend/siswa/header', $data);
                $this->load->view('backend/siswa/sidebar', $data);
                $this->load->view('backend/chat/group', $data);
                $this->load->view('backend/siswa/footer');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum memiliki kelompok</div>');
                redirect('siswa');
            }
        
        
    }
     public function fetch_chat_messages()
    {
         $id_user = $this->session->userdata('id');
         $query = $this->db->get_where('tb_random', ['id_user' => $id_user]);
         if ($query->num_rows() > 0) {
            $result = $query->row();
            $kelompok = $result->kelompok;
        }
        $chat_messages = $this->Chatgroup_model->get_chat_messages($kelompok);
        echo json_encode($chat_messages);
    }


    
    public function save_message()
    {


        $id_user= $this->session->userdata('id');
        $query = $this->db->get_where('tb_random', ['id_user' => $id_user]);
         if ($query->num_rows() > 0) {
            $result = $query->row();
            $kelompok = $result->kelompok;
        }
        $message = $this->input->post('message');

        $data = array(
            'sender_id' =>  $id_user,
            'message' => $message,
            'kelompok' =>$kelompok,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->Chatgroup_model->insert_chat_message($data);
    }

  
}
?>
