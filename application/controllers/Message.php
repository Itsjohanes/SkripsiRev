<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Message_model'); // Load the Message_model
        $this->load->model('ChatModel');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Message";
            $data['notifchat'] = $this->ChatModel->getChatData();
            $data['user'] = $this->Message_model->getUserByEmail($this->session->userdata('email'));
            $data['pesan'] = $this->Message_model->getMessages();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/message', $data);
            $this->load->view('backend/admin/footer');
        
    }
}
