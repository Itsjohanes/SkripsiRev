<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPertemuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolapertemuan_model'); // Load the KelolaPertemuan_model
        $this->load->model('ChatModel');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Atur Pertemuan";
            $data['user'] = $this->Kelolapertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $data['notifchat'] = $this->ChatModel->getChatData();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/aturpertemuan', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function aktifkanPertemuan($id)
    {
       
            $this->Kelolapertemuan_model->aktifkanPertemuan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pertemuan Berhasil diaktifkan!</div>');

            redirect('kelolapertemuan');
        
    }

    public function matikanPertemuan($id)
    {
            $this->Kelolapertemuan_model->matikanPertemuan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pertemuan Berhasil dimatikan!</div>');

            redirect('kelolapertemuan');
        
    }
    public function editPertemuan($id){
            $data['title'] = "Edit Pertemuan";
            $data['user'] = $this->Kelolapertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['materi'] = $this->Kelolapertemuan_model->getPertemuanbyId($id);
            $data['notifchat'] = $this->ChatModel->getChatData();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/editpertemuan', $data);
            $this->load->view('backend/admin/footer');

       

    }
    public function tambahPertemuan(){
            $pertemuan = $this->input->post('pertemuan');
            $gambar = $_FILES['gambar']['name'];
            $penjelasan = $this->input->post('penjelasan');
            $tp = $this->input->post('tp');
            $videoconference = $this->input->post('videoconference');
            if ($gambar) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/pertemuan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $data = array(
                        'id_pertemuan' => $pertemuan,
                        'pertemuan'    => $pertemuan,
                        'penjelasan'   => $penjelasan,
                        'videoconference' => $videoconference,
                        'tp'               => $tp,
                        'aktif'        => 0,
                        'gambar' => $gambar
                    );
                    $this->Kelolapertemuan_model->tambahPertemuan($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pertemuan berhasil ditambahkan</div>');
                    redirect('kelolapertemuan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pertemuan gagal ditambahkan</div>');
                    redirect('kelolapertemuan');
                }
            }

    }
    public function deletePertemuan($id)
    {
            $pertemuan = $this->Kelolapertemuan_model->getPertemuanById($id);
            if($this->Kelolapertemuan_model->hapusPertemuan($id) == "Gagal"){
                $gambar = $pertemuan['gambar'];
                unlink(FCPATH . 'assets/pertemuan/' . $gambar);
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pertemuan gagal dihapus karena ada foreign key</div>');
                redirect('kelolapertemuan');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pertemuan berhasil dihapus</div>');
                redirect('kelolapertemuan');
            }
            
        
    }
    public function runEditPertemuan(){
           $tp = $this->input->post('tp');
           $id_pertemuan = $this->input->post('id_pertemuan');
           $penjelasan = $this->input->post('penjelasan');
           $link = $this->input->post('link');
           $gambarLama = $this->input->post('gambar_lama');
           $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/pertemuan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    unlink(FCPATH . './assets/pertemuan/' . $gambarLama);
                    $gambar = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pertemuan gagal diubah</div>');
                    redirect('kelolaPertemuan');
                }
            } else {
                $gambar = $gambarLama;
            }

           $this->Kelolapertemuan_model->editPertemuan($id_pertemuan,$penjelasan,$gambar,$tp,$link);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pertemuan berhasil diubah!</div>');
           redirect('kelolapertemuan');
    }

}
