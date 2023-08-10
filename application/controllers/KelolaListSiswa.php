<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaListSiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_model');
        $this->load->model('Kelolalistsiswa_model'); // Load the ListSiswa_model
        checkRole(1);
    }

    public function index()
    {
        $data['title'] = "List Siswa";
        $data['user'] = $this->Kelolalistsiswa_model->getUserByEmail($this->session->userdata('email'));
        $data['siswa'] = $this->Kelolalistsiswa_model->getSiswa();
        $data['notifchat'] = $this->Chat_model->getChatData();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/kelolalistsiswa/listsiswa', $data);
        $this->load->view('admin/template/footer');
    }

    public function editSiswa($id)
    {
        $data['title'] = "List Siswa";
        $data['user'] = $this->Kelolalistsiswa_model->getUserByEmail($this->session->userdata('email'));
        $data['siswa'] = $this->Kelolalistsiswa_model->getSiswaById($id);
        $data['notifchat'] = $this->Chat_model->getChatData();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/kelolalistsiswa/editsiswa', $data);
        $this->load->view('admin/template/footer');
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
                'role' => htmlspecialchars($this->input->post('role', true))
            ];
            if ($this->input->post('role') == 1) {
                //cek dulu apakah ada data / tidak
                $this->db->where('id_user', $this->input->post('id'));
                $random_exists = $this->db->count_all_results('tb_random');
                $this->db->where('id_siswa', $this->input->post('id'));
                $hasiltugas_exists = $this->db->count_all_results('tb_hasiltugas');
                $this->db->where('id_siswa', $this->input->post('id'));
                $hasilprepost_exists = $this->db->count_all_results('tb_hasilprepost');
                if ($random_exists > 0 || $hasiltugas_exists > 0 || $hasilprepost_exists > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Your account has not been edited because of Some Data</div>');
                    redirect('kelolalistsiswa');
                } else {
                    $this->Kelolalistsiswa_model->deleteNilai($this->input->post('id'));
                    $this->Kelolalistsiswa_model->updateSiswa($this->input->post('id'), $data);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Your account has been edited</div>');
                        redirect('kelolalistsiswa');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Your account has not been edited</div>');
                        redirect('kelolalistsiswa');
                    }
                }
            } else {
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
    }

    public function deleteSiswa($id)
    {

        if ($this->Kelolalistsiswa_model->deleteSiswa($id) == "Gagal") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Siswa Gagal Dihapus Karena Ada Data Terkait</div>');
            redirect('kelolalistsiswa');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Siswa Berhasil Dihapus</div>');
            sredirect('kelolalistsiswa');
        }
    }
}
