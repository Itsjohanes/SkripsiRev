<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPosttest extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolaposttest_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Post-Test";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaposttest_model->getPosttest();
            $data['aktif'] = $this->db->get_where('tb_test', ['id_tes' => 2])->row_array();
           
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolaposttest/posttest', $data);
            $this->load->view('admin/template/footer');
        
    }
    public function aturWaktu(){
        $waktu = $this->input->post('waktu');
        $data = [
            'waktu' => $waktu
        ];
        $this->Kelolaposttest_model->aturWaktu($data);
        redirect('kelolaposttest');
    }


    public function tambahPostTest()
    {
            $soal = $this->input->post('soal');
            $kunci = $this->input->post('kunci');
            $gambar = $_FILES['gambar']['name'];
            $id_ps = $this->input->post('id_ps');
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                'opsi_a' => $opsiA,
                'opsi_b' => $opsiB,
                'opsi_c' => $opsiC,
                'opsi_d' => $opsiD,
                'opsi_e' => $opsiE,
                'kunci' => $kunci,
                'id_ps' => $id_ps,
                'gambar' => $gambar,
                'id_test'=>2
            ];
            $this->Kelolaposttest_model->tambahPosttest($data);
            //Berikan alert soal berhasil ditambahkan
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil ditambahkan!</div>');



            redirect('kelolaposttest');
        
    }
    
    public function hapusPosttest($id)
    {
            //delete soal and unlink picture by id 
            $posttest = $this->Kelolaposttest_model->getPosttestById($id);
            $gambar = $posttest['gambar'];
            $opsi_a = $posttest['opsi_a'];
            $opsi_b = $posttest['opsi_b'];
            $opsi_c = $posttest['opsi_c'];
            $opsi_d = $posttest['opsi_d'];
            $opsi_e = $posttest['opsi_e'];
            //hapus jika ada
            if (file_exists('./assets/img/posttest/'.$opsi_a )&&$opsi_a!=''){
                unlink('./assets/img/posttest/'.$opsi_a);
            }
            //lanjut buat a-e
            if (file_exists('./assets/img/posttest/'.$opsi_b )&&$opsi_b!=''){
                unlink('./assets/img/posttest/'.$opsi_b);
            }
            if (file_exists('./assets/img/posttest/'.$opsi_c )&&$opsi_c!=''){
                unlink('./assets/img/posttest/'.$opsi_c);
            }
            if (file_exists('./assets/img/posttest/'.$opsi_d )&&$opsi_d!=''){
                unlink('./assets/img/posttest/'.$opsi_d);
            }
            if (file_exists('./assets/img/posttest/'.$opsi_e )&&$opsi_e!=''){
                unlink('./assets/img/posttest/'.$opsi_e);
            }
            if(file_exists('./assets/img/posttest/' . $gambar) && $gambar != ''){
            unlink(FCPATH . 'assets/img/posttest/' . $gambar);
            }
            $this->Kelolaposttest_model->hapusPosttest($id);
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            redirect('kelolaposttest');
        
    }

    public function editPostTest($id)
    {
            $data['title'] = 'Edit Post-Test';
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolaposttest_model->getPosttestById($id);
            $data['notifchat'] = $this->Chat_model->getChatData();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolaposttest/editPostTest', $data);
            $this->load->view('admin/template/footer');
        
    }

    public function runEditPostTest()
    {
            $id_posttest = $this->input->post('id_posttest');
            $soal = $this->input->post('soal');
            $opsi_a = $this->input->post('a');
            $opsi_b = $this->input->post('b');
            $opsi_c = $this->input->post('c');
            $opsi_d = $this->input->post('d');
            $opsi_e = $this->input->post('e');
            $kunci = $this->input->post('kunci');
            $id_ps = $this->input->post('id_ps');
            $dataSoal = $this->Kelolaposttest_model->getPosttestById($id_posttest);
            $gambar = $dataSoal['gambar'];
            $gambar1 = $dataSoal['opsi_a'];
            $gambar2 = $dataSoal['opsi_b'];
            $gambar3 = $dataSoal['opsi_c'];
            $gambar4 = $dataSoal['opsi_d'];
            $gambar5= $dataSoal['opsi_e'];

            if (file_exists('./assets/img/posttest/' . $gambar) && $gambar != '') {
                unlink('./assets/img/posttest/' . $gambar);
            }
            if (file_exists('./assets/img/posttest/' . $gambar1) && $gambar1 != '') {
                unlink('./assets/img/posttest/' . $gambar1);
            }
            if (file_exists('./assets/img/posttest/' . $gambar2)) {
                unlink('./assets/img/posttest/' . $gambar2);
            }
            if (file_exists('./assets/img/posttest/' . $gambar3)) {
                unlink('./assets/img/posttest/' . $gambar3);
            }
            if (file_exists('./assets/img/posttest/' . $gambar4)) {
                unlink('./assets/img/posttest/' . $gambar4);
            }
            if (file_exists('./assets/img/posttest/' . $gambar5)) {
                unlink('./assets/img/posttest/' . $gambar5);
            }

            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                $config['upload_path'] = './assets/img/posttest/';
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
                'opsi_a' => $opsiA,
                'opsi_b' => $opsiB,
                'opsi_c' => $opsiC,
                'opsi_d' => $opsiD,
                'opsi_e' => $opsiE,
                'kunci' => $kunci,
                'id_ps' => $id_ps,
                'gambar' => $gambar
            ];



            $this->Kelolaposttest_model->updatePosttest($id_posttest, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil diedit!</div>');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil diedit!</div>');

            redirect('kelolaposttest');
        
    }
     public function postTestHandler(){
        if ($this->input->post('posttes')) {
        $this->activasiPosttest();
    } else {
        $this->mematikanPosttest();
    }

    }

    public function activasiPosttest(){
            $this->db->set('aktif', 1);
            $this->db->where('id_tes', 2);
            $this->db->update('tb_test');
            redirect('kelolaposttest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Posttest telah diaktifkan</div>');
    }
    public function mematikanPosttest(){
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 0);
            $this->db->where('id_tes', 2);
            $this->db->update('tb_test');
            redirect('kelolaposttest');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Posttest telah dimatikan</div>');

        
    }
}
