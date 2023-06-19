<?php
class GroupChat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('chatgroup_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
        //$data['chat_messages'] = $this->chatgroup_model->get_chat_messages();


        $data['title'] = "Group Chat";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('backend/admin/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/chat/pilih', $data);
        $this->load->view('backend/admin/footer');

        }else if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 0) {
                $id_user = $this->session->userdata('id');
                $query = $this->db->get_where('tb_random', ['id_user' => $id_user]);
            if($query->num_rows() > 0){
                 $result = $query->row();
                $kelompok = $result->kelompok;
                $data['chat_messages'] = $this->chatgroup_model->get_chat_messages($kelompok);
                $data['title'] = "Group Chat";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('backend/siswa/header', $data);
                $this->load->view('backend/siswa/sidebar', $data);
                $this->load->view('backend/chat/group', $data);
                $this->load->view('backend/siswa/footer');
            }else{
                redirect('Siswa');
        
            }

        }else{
             redirect('Auth/login');
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
        $chat_messages = $this->chatgroup_model->get_chat_messages($kelompok);
        echo json_encode($chat_messages);
    }


    public function fetchadmin_chat_messages($kelompok)
    {
         $id_user = $this->session->userdata('id');
         $query = $this->db->get_where('tb_random', ['id_user' => $id_user]);
         
        $chat_messages = $this->chatgroup_model->get_chat_messages($kelompok);
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

        $this->chatgroup_model->insert_chat_message($data);
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

        $this->chatgroup_model->insert_chat_message($data);
    }
    public function chooseGroup(){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
        $data['title'] = "Group Chat";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompok'] = $this->input->post('kelompok');
        $kelompok = $this->input->post('kelompok');
        $data['chat_messages'] = $this->chatgroup_model->get_chat_messages($kelompok);
        $this->load->view('backend/admin/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/chat/group_admin', $data);
        $this->load->view('backend/admin/footer');

        } else if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 0){
                redirect('Siswa');
        }else{
                redirect('Auth/login');
        }
    }
}
?>
