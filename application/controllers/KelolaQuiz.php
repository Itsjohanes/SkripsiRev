<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaQuiz extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolaquiz_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }


     public function index()
    {
            $data['title'] = "Quiz";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaquiz_model->getQuiz();
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/template/sidebar', $data);
            $this->load->view('guru/kelolaquiz/quiz', $data);
            $this->load->view('guru/template/footer');
        
    }

    public function tambahQuiz()
    {

            $soal = $this->input->post('soal');
            $id_ps = $this->input->post('id_ps');
            $kunci = $this->input->post('kunci');
            $pembahasan = $this->input->post('pembahasan');
            $pertemuan = $this->input->post('pertemuan');

            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/quiz/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            
            $gambarA = "";
            $opsiA = "";

            if ($this->input->post('pilihana') == "Gambar") {

                $gambarA = $_FILES['a']['name'];
                $opsiA = $gambarA;

                if ($gambarA != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('a')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiA = $this->upload->data('file_name');
                }
            }
            } else {
                $opsiA = $this->input->post('a');
            }
            

            $gambarB = "";
            $opsiB = "";
            if ($this->input->post('pilihanb') == "Gambar") {
                $gambarB = $_FILES['b']['name'];
                $opsiB = $gambarB;
                if ($gambarB != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('b')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiB = $this->upload->data('file_name');
                }
            }
            } else {
                $opsiB = $this->input->post('b');
            }


            $gambarC = "";
            $opsiC = "";
            if ($this->input->post('pilihanc') == "Gambar") {
                $gambarC = $_FILES['c']['name'];
                $opsiC = $gambarC;
                if ($gambarC != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('c')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiC = $this->upload->data('file_name');
                }
            }
            } else {
                $opsiC = $this->input->post('c');
            }



            $gambarD = "";
            $opsiD = "";
            if ($this->input->post('pilihand') == "Gambar") {
                $gambarD = $_FILES['d']['name'];
                $opsiD = $gambarD;
                if ($gambarD != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('d')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiD = $this->upload->data('file_name');
                }
            }
            } else {
                $opsiD = $this->input->post('d');
            }
            $gambarE = "";
            $opsiE = "";
            if ($this->input->post('pilihane') == "Gambar") {
                $gambarE = $_FILES['e']['name'];
                $opsiE = $gambarE;
                if ($gambarE != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('e')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiE = $this->upload->data('file_name');
                }
            }
            } else {
                $opsiE = $this->input->post('e');
            }

           
            $data = [
                'soal' => $soal,
                'opsi_a' => $opsiA,
                'opsi_b' => $opsiB,
                'opsi_c' => $opsiC,
                'opsi_d' => $opsiD,
                'opsi_e' => $opsiE,
                'pembahasan' => $pembahasan,
                'kunci' => $kunci,
                'gambar' => $gambar,
                'id_ps' => $id_ps,
                'id_pertemuan' => $pertemuan
            ];
            $this->Kelolaquiz_model->tambahQuiz($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil ditambahkan!</div>');

            redirect('kelolaquiz');
        
    }

    public function hapusQuiz($id)
    {

            //delete soal and unlink picture by id 
            $quiz = $this->Kelolaquiz_model->getQuizById($id);
            $gambar = $quiz['gambar'];
            $opsi_a = $quiz['opsi_a'];
            $opsi_b = $quiz['opsi_b'];
            $opsi_c = $quiz['opsi_c'];
            $opsi_d = $quiz['opsi_d'];
            $opsi_e = $quiz['opsi_e'];
            //hapus jika ada
            if (file_exists('./assets/img/quiz/'.$opsi_a )&&$opsi_a!=''){
                unlink('./assets/img/quiz/'.$opsi_a);
            }
            //lanjut buat a-e
            if (file_exists('./assets/img/quiz/'.$opsi_b )&&$opsi_b!=''){
                unlink('./assets/img/quiz/'.$opsi_b);
            }
            if (file_exists('./assets/img/quiz/'.$opsi_c )&&$opsi_c!=''){
                unlink('./assets/img/quiz/'.$opsi_c);
            }
            if (file_exists('./assets/img/quiz/'.$opsi_d )&&$opsi_d!=''){
                unlink('./assets/img/quiz/'.$opsi_d);
            }
            if (file_exists('./assets/img/quiz/'.$opsi_e )&&$opsi_e!=''){
                unlink('./assets/img/quiz/'.$opsi_e);
            }
            if(file_exists('./assets/img/quiz/' . $gambar) && $gambar != ''){
            unlink(FCPATH . './assets/img/quiz/' . $gambar);
            }


            $this->Kelolaquiz_model->hapusQuiz($id);
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            //Hapus juga file gambarnya


            redirect('kelolaquiz');
        
    }

    public function editQuiz($id)
    {
            $data['title'] = "Edit Quiz";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaquiz_model->getQuizById($id);
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['pertemuan'] = $this->Kelolapertemuan_model->getPertemuan();
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/template/sidebar', $data);
            $this->load->view('guru/kelolaquiz/editquiz', $data);
            $this->load->view('guru/template/footer');
        
    }

    public function runEditQuiz()
    {
            $id_quiz = $this->input->post('id_quiz');
            $id_ps = $this->input->post('id_ps');
            $soal = $this->input->post('soal');
            $opsi_a = $this->input->post('a');
            $opsi_b = $this->input->post('b');
            $opsi_c = $this->input->post('c');
            $opsi_d = $this->input->post('d');
            $opsi_e = $this->input->post('e');
            $kunci = $this->input->post('kunci');
            $dataSoal = $this->Kelolaquiz_model->getQuizById($id_quiz);
            $gambar = $dataSoal['gambar'];
            $gambar1 = $dataSoal['opsi_a'];
            $gambar2 = $dataSoal['opsi_b'];
            $gambar3 = $dataSoal['opsi_c'];
            $gambar4 = $dataSoal['opsi_d'];
            $gambar5= $dataSoal['opsi_e'];
            $pertemuan = $this->input->post('pertemuan');
            $pembahasan = $this->input->post('pembahasan');

            if (file_exists('./assets/img/quiz/' . $gambar) && $gambar != '') {
                unlink('./assets/img/quiz/' . $gambar);
            }
            if (file_exists('./assets/img/quiz/' . $gambar1) && $gambar1 != '') {
                unlink('./assets/img/quiz/' . $gambar1);
            }
            if (file_exists('./assets/img/quiz/' . $gambar2)) {
                unlink('./assets/img/quiz/' . $gambar2);
            }
            if (file_exists('./assets/img/quiz/' . $gambar3)) {
                unlink('./assets/img/quiz/' . $gambar3);
            }
            if (file_exists('./assets/img/quiz/' . $gambar4)) {
                unlink('./assets/img/quiz/' . $gambar4);
            }
            if (file_exists('./assets/img/quiz/' . $gambar5)) {
                unlink('./assets/img/quiz/' . $gambar5);
            }

            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/quiz/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $gambarA = "";
            $opsiA = "";

            if ($this->input->post('pilihana') == "Gambar") {

                $gambarA = $_FILES['a']['name'];
                $opsiA = $gambarA;
            } else {
                $opsiA = htmlspecialchars($this->input->post('a', true));
            }
            if ($gambarA != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('a')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiA = $this->upload->data('file_name');
                }
            }

            $gambarB = "";
            $opsiB = "";
            if ($this->input->post('pilihanb') == "Gambar") {
                $gambarB = $_FILES['b']['name'];
                $opsiB = $gambarB;
            } else {
                $opsiB = htmlspecialchars($this->input->post('b', true));
            }

            if ($gambarB != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('b')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiB = $this->upload->data('file_name');
                }
            }
            $gambarC = "";
            $opsiC = "";
            if ($this->input->post('pilihanc') == "Gambar") {
                $gambarC = $_FILES['c']['name'];
                $opsiC = $gambarC;
            } else {
                $opsiC = htmlspecialchars($this->input->post('c', true));
            }

            if ($gambarC != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('c')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiC = $this->upload->data('file_name');
                }
            }

            $gambarD = "";
            $opsiD = "";
            if ($this->input->post('pilihand') == "Gambar") {
                $gambarD = $_FILES['d']['name'];
                $opsiD = $gambarD;
            } else {
                $opsiD = htmlspecialchars($this->input->post('d', true));
            }

            if ($gambarD != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('d')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiD = $this->upload->data('file_name');
                }
            }

            $gambarE = "";
            $opsiE = "";
            if ($this->input->post('pilihane') == "Gambar") {
                $gambarE = $_FILES['e']['name'];
                $opsiE = $gambarE;
            } else {
                $opsiE = htmlspecialchars($this->input->post('e', true));
            }

            if ($gambarE != '') {
                $config['upload_path'] = './assets/img/quiz/';
                $config['allowed_types'] = 'png|jpeg|jpg|bmp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('e')) {
                    echo "File Gagal Diupload!";
                } else {
                    $opsiE = $this->upload->data('file_name');
                }
            }
      
            $data = [
                'soal' => $soal,
                'opsi_a' => $opsi_a,
                'opsi_b' => $opsi_b,
                'opsi_c' => $opsi_c,
                'opsi_d' => $opsi_d,
                'opsi_e' => $opsi_e,
                'id_pertemuan' => $pertemuan,
                'kunci' => $kunci,
                'pembahasan' => $pembahasan,
                'id_ps' => $id_ps,
                'gambar' => $gambar
            ];
            //cara test apakah edit berhasil
            $this->Kelolaquiz_model->updateQuiz($id_quiz, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil diedit!</div>');
            redirect('kelolaquiz');
        
    }


   

}
