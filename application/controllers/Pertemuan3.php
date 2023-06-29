<?php

class Pertemuan3 extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Comments3_model');
        $this->load->model('Pertemuan3_model'); // Load the model
    }

    public function index() {
        if ($this->session->userdata('email') != '') {
            $data['title'] = "Materi Pertemuan 3";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->db->get_where('tb_youtube', ['pertemuan' => 3])->result_array();
            $data['hasiltugas'] = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 3, 'id_siswa' => $this->session->userdata('id')])->row_array();
            $data['banyakHasilTugas'] =   $this->db->get_where('tb_hasiltugas', ['pertemuan' => 3, 'id_siswa' => $this->session->userdata('id')])->num_rows();
            $data['tugas']  = $this->db->get_where('tb_tugas', ['pertemuan' => 3])->row_array();
            $data['comments'] = $this->Comments3_model->get_comments();
            //query status dari tb_pertemuan
            $status = $this->db->get_where('tb_pertemuan', ['pertemuan' => 3])->row_array();
            //query aktif
            if($status['aktif'] == '1'){
                $this->load->view('backend/siswa/header', $data);
                $this->load->view('backend/siswa/sidebar', $data);
                $this->load->view('backend/siswa/pertemuan3', $data);
                $this->load->view('backend/siswa/comments3', $data);
                $this->load->view('backend/siswa/footer');
            } else {
                //tampilkan tulisan belum diaktifasi
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                redirect('Materi');
            }
        } else {
            redirect('Auth/backLogin');
        }
    }

    public function save_comment3() {
        // Proses menyimpan komentar
        if ($this->session->userdata('email') != '') {
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => 0,
                'pertemuan' => 3 // Set parent_id as 0 for main comments
            );

            $this->Comments3_model->save_comment($data);
            redirect('Pertemuan3');
        }
    }

     public function materiPertemuan3(){

         if ($this->session->userdata('email') != '') {
           $data['title'] = "Materi Pertemuan 3";
           $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
           $data['materi'] = $this->db->get_where('tb_materi', ['pertemuan' => 3])->row_array();
           $status = $this->db->get_where('tb_pertemuan', ['pertemuan' => 3])->row_array(); 
           if($status['aktif'] == '1'){
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/materipertemuan', $data);
            $this->load->view('backend/siswa/footer');
           }else{
             $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
             redirect('Materi');
           }
         }else{
             redirect('Auth/backLogin');
         }
    }

    public function save_reply3() {
        if ($this->session->userdata('email') != '') {
            // Proses menyimpan reply
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => $this->input->post('parent_id'),
                'pertemuan' => 3
            );

            $this->Comments3_model->save_reply($data);
            redirect('Pertemuan3');
        }
    }

    public function tambahTugas() {
        if ($this->session->userdata('email') != '') {
            $id_siswa = $this->session->userdata('id');
            $pertemuan = $this->input->post('pertemuan');
            $text = $this->input->post('text');
            //file upload pdf from name = "upload"
            $upload = $_FILES['upload']['name'];
            if ($upload) {
                $config['allowed_types'] = 'pdf';
                $config['encrypt_name'] = TRUE;
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/tugassiswa/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('upload')) {
                    $new_upload = $this->upload->data('file_name');

                    $this->db->set('upload', $new_upload);
                    $data = [
                        'id_siswa' => $id_siswa,
                        'pertemuan' => $pertemuan,
                        'text' => $text,
                        'upload' => $new_upload
                    ];
                    //setAlert
                    $this->Pertemuan3_model->insertHasilTugas($data);
                    //set flashdata
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil diupload</div>');
                } else {
                    //setAlert
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal diupload</div>');
                }
            }

            redirect('Pertemuan3');
        } else {
            redirect('Auth/backLogin');
        }
    }

    public function hapusTugas($id) {
        if ($this->session->userdata('email') != '') {
            $file = $this->Pertemuan3_model->getHasilTugasById($id);
            $filename = $file['upload'];
            $pertemuan = $file['pertemuan'];

            $this->Pertemuan3_model->deleteHasilTugas($id);
            //unlink file based on id_hasiltugas
            unlink(FCPATH . 'assets/tugassiswa/' . $filename);
            //setflash
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil dihapus</div>');
            redirect('Pertemuan3');
        } else {
            redirect('Auth/backLogin');
        }
    }

    public function editTugas() {
        if ($this->session->userdata('email') != '') {
            $id = $this->input->post('id_hasiltugas');
            $pertemuan = $this->input->post('pertemuan');
            $slide = $this->input->post('slide');
            $filelama = $this->input->post('filelama');
            $text = $this->input->post('text');
            $upload = $_FILES['upload']['name'];
            if ($upload) {
                $config['encrypt_name'] = TRUE;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/tugassiswa/';
                if ($upload != $filelama) {
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('upload')) {
                        unlink(FCPATH . 'assets/tugassiswa/' . $filelama);
                        $new_upload = $this->upload->data('file_name');
                        $this->db->set('upload', $new_upload);
                        $data = [
                            'id_hasiltugas' => $id,
                            'pertemuan' => $pertemuan,
                            'upload' => $new_upload,
                            'text' => $text
                        ];
                        $this->Pertemuan3_model->updateHasilTugas($id, $data);
                    } else {
                        echo $this->upload->display_errors();
                    }
                } else {
                    $upload = $filelama;
                }
            }

            redirect('Pertemuan3');
        } else {
            redirect('Auth/backLogin');
        }
    }
}
