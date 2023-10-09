<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPretest extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelolapretest_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }


     public function index()
    {
            $data['title'] = "Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolapretest_model->getPretest();
            //select aktif dari tb_test
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['aktif'] = $this->db->get_where('tb_test', ['id_tes' => 1])->row_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolapretest/pretest', $data);
            $this->load->view('admin/template/footer');
        
    }

    public function tambahPreTest()
    {

            //memasukan soal dan gambar ke tb_pretest
            $soal = $this->input->post('soal');
            $kunci = $this->input->post('kunci');
            $id_ps = $this->input->post('id_ps');
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                'gambar' => $gambar,
                'id_ps' => $id_ps,
                'id_test' => 1
            ];
            $this->Kelolapretest_model->tambahPretest($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil ditambahkan!</div>');

            redirect('kelolapretest');
        
    }

    public function hapusPretest($id)
    {

            //delete soal and unlink picture by id 
            $pretest = $this->Kelolapretest_model->getPretestById($id);
            $gambar = $pretest['gambar'];
            $opsi_a = $pretest['opsi_a'];
            $opsi_b = $pretest['opsi_b'];
            $opsi_c = $pretest['opsi_c'];
            $opsi_d = $pretest['opsi_d'];
            $opsi_e = $pretest['opsi_e'];
            if(file_exists('./assets/img/pretest/' . $gambar) && $gambar != ''){
                unlink('./assets/img/pretest/' . $gambar);
            }
            //lanjut buat a sampe e
            if (file_exists('./assets/img/pretest/'.$opsi_a )&&$opsi_a!=''){
                unlink('./assets/img/pretest/'.$opsi_a);
            }
            if (file_exists('./assets/img/pretest/'.$opsi_b )&&$opsi_b!=''){
                unlink('./assets/img/pretest/'.$opsi_b);
            }
            if (file_exists('./assets/img/pretest/'.$opsi_c )&&$opsi_c!=''){
                unlink('./assets/img/pretest/'.$opsi_c);
            }
            if (file_exists('./assets/img/pretest/'.$opsi_d )&&$opsi_d!=''){
                unlink('./assets/img/pretest/'.$opsi_d);
            }
            if (file_exists('./assets/img/pretest/'.$opsi_e )&&$opsi_e!=''){
                unlink('./assets/img/pretest/'.$opsi_e);
            }
            $this->Kelolapretest_model->hapusPretest($id);
            $this->session->set_flashdata('category_success', 'Soal berhasil dihapus');
            redirect('kelolapretest');
        
    }

    public function editPretest($id)
    {
            $data['title'] = "Edit Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->Kelolapretest_model->getPretestById($id);
            $data['notifchat'] = $this->Chat_model->getChatData();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/kelolapretest/editpretest', $data);
            $this->load->view('admin/template/footer');
        
    }

    public function runEditPreTest()
    {
            $id_pretest = $this->input->post('id_pretest');
            $soal = $this->input->post('soal');
            $opsi_a = $this->input->post('a');
            $opsi_b = $this->input->post('b');
            $opsi_c = $this->input->post('c');
            $opsi_d = $this->input->post('d');
            $opsi_e = $this->input->post('e');
            $kunci = $this->input->post('kunci');
            $id_ps = $this->input->post('id_ps');
            $dataSoal = $this->Kelolapretest_model->getPretestById($id_pretest);
            $gambar = $dataSoal['gambar'];
            $gambar1 = $dataSoal['opsi_a'];
            $gambar2 = $dataSoal['opsi_b'];
            $gambar3 = $dataSoal['opsi_c'];
            $gambar4 = $dataSoal['opsi_d'];
            $gambar5= $dataSoal['opsi_e'];

            if (file_exists('./assets/img/pretest/' . $gambar) && $gambar != '') {
                unlink('./assets/img/pretest/' . $gambar);
            }
            if (file_exists('./assets/img/pretest/' . $gambar1) && $gambar1 != '') {
                unlink('./assets/img/pretest/' . $gambar1);
            }
            if (file_exists('./assets/img/pretest/' . $gambar2)) {
                unlink('./assets/img/pretest/' . $gambar2);
            }
            if (file_exists('./assets/img/pretest/' . $gambar3)) {
                unlink('./assets/img/pretest/' . $gambar3);
            }
            if (file_exists('./assets/img/pretest/' . $gambar4)) {
                unlink('./assets/img/pretest/' . $gambar4);
            }
            if (file_exists('./assets/img/pretest/' . $gambar5)) {
                unlink('./assets/img/pretest/' . $gambar5);
            }

            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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
                $config['upload_path'] = './assets/img/pretest/';
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

            $this->Kelolapretest_model->updatePretest($id_pretest, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil diedit!</div>');

            redirect('kelolapretest');
    }


    public function preTestHandler(){
        if ($this->input->post('pretes')) {
        $this->activasiPretest();
    } else {
        $this->mematikanPretest();
    }

    }
    public function aturWaktu(){
        $waktu = $this->input->post('waktu');
        $data = [
            'waktu' => $waktu
        ];
        $this->Kelolapretest_model->aturWaktu($data);
        redirect('kelolapretest');
    }

    public function activasiPretest(){
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 1);
            $this->db->where('id_tes', 1);
            $this->db->update('tb_test');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pretest telah diaktifkan</div>');

            redirect('kelolapretest');


        
    }
    public function mematikanPretest(){
            //mengubah status pada tb_test menjadi 1
            $this->db->set('aktif', 0);
            $this->db->where('id_tes', 1);
            $this->db->update('tb_test');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pretest telah dimatikan</div>');
            redirect('kelolapretest');

        
    }
}
