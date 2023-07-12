<?php

class Pertemuan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Komentar_model');
        $this->load->model('Pertemuan_model'); // Load the model
        $this->load->library('user_agent');
        checkRole(0);

    }

    public function index($id = '') {
            //Query semua id_materi pada tb_pertemuan jika $id terdaftar
            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);

            if($id_pertemuan){
                $data['title'] = "Materi Pertemuan 1";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['materi'] = $this->db->get_where('tb_youtube', ['id_pertemuan' => $id])->result_array();
                $data['hasiltugas'] = $this->db->get_where('tb_hasiltugas', ['id_pertemuan' => $id, 'id_siswa' => $this->session->userdata('id')])->row_array();
                $data['banyakHasilTugas'] =   $this->db->get_where('tb_hasiltugas', ['id_pertemuan' => $id, 'id_siswa' => $this->session->userdata('id')])->num_rows();
                $data['tugas']  = $this->db->get_where('tb_tugas', ['id_pertemuan' => $id])->row_array();
                $data['comments'] = $this->Komentar_model->get_comments($id);
                $data['pertemuan'] = $id;
                //query status dari tb_pertemuan
                $status = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array();
                $data['tp'] = $status;
                //query aktif
                if($status['aktif'] == '1'){
                    $this->load->view('backend/siswa/header', $data);
                    $this->load->view('backend/siswa/sidebar', $data);
                    $this->load->view('backend/siswa/pertemuan', $data);
                    $this->load->view('backend/siswa/comments', $data);
                    $this->load->view('backend/siswa/footer');
                } else {
                    //tampilkan tulisan belum diaktifasi
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }

            }else{
                redirect('materi');
            }
            
        

       
    }

    public function save_comment() {
        // Proses menyimpan komentar
            
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => 0,
                'id_pertemuan' => $this->input->post('pertemuan')
            );
            $this->Komentar_model->save_comment($data);
            redirect($this->agent->referrer());

            
        
    }

     public function materiPertemuan($id = ''){

            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            if($id_pertemuan){
                $data['title'] = "Materi Pertemuan ". $id;
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['materi'] = $this->db->get_where('tb_materi', ['id_pertemuan' => $id])->row_array();
                $status = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array(); 
                if($status['aktif'] == '1'){
                    $this->load->view('backend/siswa/header', $data);
                    $this->load->view('backend/siswa/sidebar', $data);
                    $this->load->view('backend/siswa/materipertemuan', $data);
                    $this->load->view('backend/siswa/footer');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }    
            }else{
                    redirect('materi');
                
            }
          
         
    }

    public function save_reply() {
            // Proses menyimpan reply
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'comment' => $this->input->post('comment'),
                'parent_id' => $this->input->post('parent_id'),
                'id_pertemuan' => $this->input->post('pertemuan')
            );

            $this->Komentar_model->save_reply($data);
            redirect($this->agent->referrer());

        
    }

    public function tambahTugas() {
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
                        'id_pertemuan' => $pertemuan,
                        'text' => $text,
                        'upload' => $new_upload
                    ];
                    //setAlert
                    $this->Pertemuan_model->insertHasilTugas($data);
                    //set flashdata
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil diupload</div>');
                } else {
                    //setAlert
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal diupload</div>');
                }
            }

            redirect($this->agent->referrer());
        
    }

    public function hapusTugas($id) {
            $file = $this->Pertemuan_model->getHasilTugasById($id);
            $filename = $file['upload'];

            //cek kolom nilai pada tb_hasiltugas sudah ada isi
            $hasiltugas = $this->Pertemuan_model->getHasilTugasById($id);
            $nilai = $hasiltugas['nilai'];
            var_dump($nilai);
            if ($nilai != null) {
                //jika sudah ada nilai
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas sudah dinilai</div>');
                redirect($this->agent->referrer());
            }else{
                $this->Pertemuan_model->deleteHasilTugas($id);
                //unlink file based on id_hasiltugas
                unlink(FCPATH . 'assets/tugassiswa/' . $filename);
                //setflash
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil dihapus</div>');
                redirect($this->agent->referrer());
            }

            

       
    }

    public function editTugas() {
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
                            'id_pertemuan' => $pertemuan,
                            'upload' => $new_upload,
                            'text' => $text
                        ];
                        $this->Pertemuan_model->updateHasilTugas($id, $data);
                    } else {
                        echo $this->upload->display_errors();
                    }
                } else {
                    $upload = $filelama;
                }
            }

            redirect($this->agent->referrer());
        
    }
}
