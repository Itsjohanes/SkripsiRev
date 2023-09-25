<?php

class Pertemuan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Komentar_model');
        $this->load->model('Pertemuan_model'); 
        $this->load->model('Quiz_model');
        $this->load->library('user_agent');
        $this->load->model('Chat_model');
        checkRole(0);

    }
    public function penjelasan($id = ''){
        $data['notifchat'] = $this->Chat_model->getChatData();
        $data['title'] = "Penjelasan";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $id;
        $status = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array(); 
        if($status['aktif'] == 1){
            $this->load->view('siswa/template/header', $data);
            $this->load->view('siswa/template/sidebar', $data);
            $this->load->view('siswa/pertemuan/penjelasan', $data);
            $this->load->view('siswa/template/footer');

        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
            redirect('materi');
        }
        
    }
    public function tp($id = ''){
        $data['notifchat'] = $this->Chat_model->getChatData();
        $data['title'] = "Tujuan Pembelajaran";
        $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $id;
        $status = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array(); 
        $data['tp'] = $status;
        if($status['aktif'] == 1){
            $this->load->view('siswa/template/header', $data);
            $this->load->view('siswa/template/sidebar', $data);
            $this->load->view('siswa/pertemuan/tujuanpembelajaran', $data);
            $this->load->view('siswa/template/footer');

        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
            redirect('materi');
        }
        
    }
    

    public function index($id = '') {
            //Query semua id_materi pada tb_pertemuan jika $id terdaftar
            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            if($id_pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Pertemuan";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['pertemuan'] = $id;
                //query status dari tb_pertemuan
                $status = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array();
                $data['tp'] = $status;
                
                //query aktif
                if($status['aktif'] == '1'){
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/menu', $data);
                    $this->load->view('siswa/template/footer');
                } else {
                    //tampilkan tulisan belum diaktifasi
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }

            }else{
                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan tidak ada</div>');
                redirect('materi');
            }
            
        

       
    }
     public function video($id = '') {
            //Query semua id_materi pada tb_pertemuan jika $id terdaftar
            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            if($id_pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Video Pertemuan";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['pertemuan'] = $id;
                $data['materi'] = $this->db->get_where('tb_youtube', ['id_pertemuan' => $id])->result_array();
                
                //query status dari tb_pertemuan
                $status = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array();
                $data['tp'] = $status;
                
                //query aktif
                if($status['aktif'] == '1'){
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/video', $data);
                    $this->load->view('siswa/template/footer');
                } else {
                    //tampilkan tulisan belum diaktifasi
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }

            }else{
                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan tidak ada</div>');
                redirect('materi');
            }
            
        

       
    }
    public function form($id = '') {
            //Query semua id_materi pada tb_pertemuan jika $id terdaftar
            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            if($id_pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Pengumpulan Tugas";
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
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/form', $data);
                    $this->load->view('siswa/pertemuan/comments', $data);
                    $this->load->view('siswa/template/footer');
                } else {
                    //tampilkan tulisan belum diaktifasi
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }

            }else{
                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan tidak ada</div>');
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komentar berhasil terkirim</div>');

            redirect($this->agent->referrer());

            
        
    }

     public function materiPertemuan($id = ''){

            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            if($id_pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Materi Pertemuan ". $id;
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['materi'] = $this->db->get_where('tb_materi', ['id_pertemuan' => $id])->result_array();
                $status = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array(); 
                $data['pertemuan']  = $id;
                if($status['aktif'] == '1'){
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/materipertemuan', $data);
                    $this->load->view('siswa/template/footer');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }    
            }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan tidak ada</div>');
                    redirect('materi');
                
            }
          
         
    }

    public function tugas($id = ''){

            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            if($id_pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Tugas Pertemuan ". $id;
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['tugas'] = $this->db->get_where('tb_tugas', ['id_pertemuan' => $id])->result_array();
                $status = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array(); 
                $data['pertemuan'] = $id;
                if($status['aktif'] == '1'){
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/tugas', $data);
                    $this->load->view('siswa/template/footer');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }    
            }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan tidak ada</div>');
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Reply berhasil terkirim</div>');

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
                        'upload' => $new_upload,
                        'created_at' => date('Y-m-d H:i:s')
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

    public function hapusTugas($id = '') {
            //cek apakah id_usernya sama dengan id_pemilik tugas
            $id_siswa = $this->session->userdata('id');
            $id_hasiltugas = $this->Pertemuan_model->getHasilTugasById($id);
            $id_user = $id_hasiltugas['id_siswa'];
            if ($id_siswa != $id_user) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Tidak Dapat Menghapus Tugas Milik Orang Lain!</div>');
                redirect('siswa');
            }else{
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
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil dihapus</div>');
                    redirect($this->agent->referrer());
                }

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
                            'text' => $text,
                            'updated_at' => date('Y-m-d H:i:s')
                        ];
                        $this->Pertemuan_model->updateHasilTugas($id, $data);
                    } else {
                        echo $this->upload->display_errors();
                    }
                } else {
                    $upload = $filelama;
                }
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil diubah</div>');

            }

            redirect($this->agent->referrer());
        
    }
    public function scratch($id = ''){

            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            if($id_pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Scratch";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['pertemuan'] = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array(); 
                if($data['pertemuan']['aktif'] == '1'){
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/scratch', $data);
                    $this->load->view('siswa/template/footer');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }    
            }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan tidak ada</div>');
                    redirect('materi');
                
            }
          
         
    }
    public function ide($id = ''){

            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            if($id_pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Online IDE";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $data['pertemuan'] = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array(); 
                if($data['pertemuan']['aktif'] == '1'){
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/ide', $data);
                    $this->load->view('siswa/template/footer');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                    redirect('materi');
                }    
            }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan tidak ada</div>');
                    redirect('materi');
                
            }
          
         
    }
    public function Quiz($id = ''){
        $data['title'] = "Quiz";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Quiz_model->getQuizQuestions($id);
            $data['jumlah'] = $this->Quiz_model->getQuizQuestionCount($id);
            $data['pertemuan'] = $this->db->get_where('tb_pertemuan', ['id_pertemuan' => $id])->row_array(); 
            $id_pertemuan = $this->Pertemuan_model->getPertemuanById($id);
            $data['id_pertemuan'] = $id;
            if($id_pertemuan){
            if($data['pertemuan']['aktif'] == '1'){
            $data['quiz'] = $this->Quiz_model->getQuizCountBySiswaId($this->session->userdata('id'),$id);
                if ($data['quiz'] > 0) {
                    $data['jawaban'] = $this->Quiz_model->getQuizAnswers($id, $this->session->userdata('id'));
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/pembahasanquiz', $data);
                    $this->load->view('siswa/template/footer');
                }else{
                    
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pertemuan/quiz', $data);
                    $this->load->view('siswa/template/footer');

                }
            
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan belum aktif</div>');
                redirect('materi');

            }
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pertemuan tidak ada</div>');
                redirect('materi');
            }
        

    }

    public function simpanQuiz()
    {
            $pilihan = $this->input->post('pilihan');
            $id_quiz = $this->input->post('id_quiz');
            $jumlah = $this->input->post('jumlah');
            $id_pertemuan  = $this->input->post('id_pertemuan');
            $score = 0;
            $benar = 0;
            $salah = 0;
            $kosong = 0;
            $str_jawaban = "";

            for ($i = 0; $i < $jumlah; $i++) {
                $nomor = $id_quiz[$i];

                if (empty($pilihan[$nomor])) {
                    $kosong++;
                    $str_jawaban = $str_jawaban . "X";
                } else {
                    $jawaban = $pilihan[$nomor];
                    $str_jawaban = $str_jawaban . $pilihan[$nomor];
                    $isAnswerCorrect = $this->Quiz_model->checkAnswer($nomor, $jawaban,$id_pertemuan);

                    if ($isAnswerCorrect) {
                        $benar++;
                    } else {
                        $salah++;
                    }
                }
            }

            $jumlah_soal = $this->Quiz_model->getQuizQuestionCount($id_pertemuan);
            $score = 100 / $jumlah_soal * $benar;
            $hasil = number_format($score, 2);

            $id = $this->session->userdata('id');
            //buat timestamp
            
           

            $data = [
                'id_siswa' => $id,
                'jawaban' => $str_jawaban,
                'id_pertemuan' => $id_pertemuan,
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'nilai' => $hasil,
                'timestamp' => date('Y-m-d H:i:s')
            ];

            $this->Quiz_model->saveQuizResult($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah pernah mengerjakan Quiz</div>');
            redirect('materi');
        
    }
}

   

