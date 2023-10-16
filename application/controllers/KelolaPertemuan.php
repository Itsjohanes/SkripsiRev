<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPertemuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolapertemuan_model'); 
        $this->load->model('Chat_model');
        $this->load->model('Pertemuan_model'); 
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Atur Pertemuan";
            $data['user'] = $this->Kelolapertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $data['notifchat'] = $this->Chat_model->getChatData();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolapertemuan/pertemuan', $data);
            $this->load->view('admin/template/footer');
        
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
            $data['notifchat'] = $this->Chat_model->getChatData();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolapertemuan/editpertemuan', $data);
            $this->load->view('admin/template/footer');

       

    }
    public function tambahPertemuan(){
            $pertemuan = $this->input->post('pertemuan');
            $gambar = $_FILES['gambar']['name'];
            $penjelasan = $this->input->post('penjelasan');
            $tp = $this->input->post('tp');
            $dateline_tgs = $this->input->post('dateline-tgs');
            $kktp = $this->input->post('kktp');
            $apersepsi = $this->input->post('apersepsi');
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
                        'tp'               => $tp,
                        'dateline_tgs'   => $dateline_tgs,
                        'aktif'        => 0,
                        'gambar' => $gambar,
                        'kktp' => $kktp,
                        'apersepsi' => $apersepsi
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
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pertemuan gagal dihapus karena ada foreign key</div>');
                redirect('kelolapertemuan');
            }else{
                $gambar = $pertemuan['gambar'];
                unlink(FCPATH . 'assets/pertemuan/' . $gambar);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pertemuan berhasil dihapus</div>');
                redirect('kelolapertemuan');
            }
            
        
    }
    public function runEditPertemuan(){
           $tp = $this->input->post('tp');
           $id_pertemuan = $this->input->post('id_pertemuan');
           $penjelasan = $this->input->post('penjelasan');
           $gambarLama = $this->input->post('gambar_lama');
           $gambar = $_FILES['gambar']['name'];
           $apersepsi = $this->input->post('apersepsi');
           $kktp = $this->input->post('kktp');
           $dateline_tgs = $this->input->post('dateline-tgs');
            if ($gambar) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/pertemuan/';
                $this->load->library('upload', $config);
                //Hapus dulu gambar sebelumnya
                unlink(FCPATH . './assets/pertemuan/' . $gambarLama);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pertemuan gagal diubah</div>');
                    redirect('kelolaPertemuan');
                }
                $this->Kelolapertemuan_model->editPertemuan($id_pertemuan,$penjelasan,$gambar,$tp,$dateline_tgs,$kktp,$apersepsi);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pertemuan berhasil diubah!</div>');
                redirect('kelolapertemuan');
            }

           
    }
    
}
