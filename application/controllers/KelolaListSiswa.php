<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaListSiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ChatModel');
        $this->load->model('Kelolalistsiswa_model'); // Load the ListSiswa_model
        checkRole(1);
    }

    public function index()
    {
        $data['title'] = "List Siswa";
        $data['user'] = $this->Kelolalistsiswa_model->getUserByEmail($this->session->userdata('email'));
        $data['siswa'] = $this->Kelolalistsiswa_model->getSiswa();
        $data['notifchat'] = $this->ChatModel->getChatData();
        $this->load->view('backend/admin/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/listsiswa', $data);
        $this->load->view('backend/admin/footer');
        
    }

    public function editSiswa($id)
    {
        $data['title'] = "List Siswa";
        $data['user'] = $this->Kelolalistsiswa_model->getUserByEmail($this->session->userdata('email'));
        $data['siswa'] = $this->Kelolalistsiswa_model->getSiswaById($id);
        $data['notifchat'] = $this->ChatModel->getChatData();
        $this->load->view('backend/admin/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/editsiswa', $data);
        $this->load->view('backend/admin/footer');
        
    }

    public function runEditSiswa()
    {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                'matches' => 'Password doesn\'t match!',
                'min_length' => 'Password is too short!'
            ]);
            $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|matches[password1]');

            if ($this->form_validation->run('runEditSiswa') == false) {
                $data['title'] = "Home Admin";
                $data['user'] = $this->Kelolalistsiswa_model->getUserByEmail($this->session->userdata('email'));
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Passwords do not match</div>');
                redirect('kelolalistsiswa/editSiswa/' . $this->input->post('id'));
            } else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                ];
                $this->Kelolalistsiswa_model->updateSiswa($this->input->post('id'), $data);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Your account has been edited</div>');
                    redirect('kelolalistsiswa');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Your account has not been edited</div>');
                    redirect('kelolalistsiswa');
                }
            }
        
    }

    public function deleteSiswa($id)
    {
            
            $this->Kelolalistsiswa_model->deleteSiswa($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! The account has been deleted</div>');
            redirect('listsiswa'); 
        
    }

}
