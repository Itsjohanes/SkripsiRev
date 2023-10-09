<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pretest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pretest_model'); // Load the Pretest_model
        $this->load->model('Chat_model');
        checkRole(0);
    }

    public function index()
    {
            $data['title'] = "Pre-Test";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Pretest_model->getUserByEmail($this->session->userdata('email'));
            $data['pretest'] = $this->Pretest_model->getPretestCountBySiswaId($this->session->userdata('id'));
            if ($data['pretest'] > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah pernah mengerjakan Pre-Test</div>');
                redirect('materi');
            } else {
                $aktif = $this->Pretest_model->getPretestStatus();
                if ($aktif['aktif'] == 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pre-Test belum aktif</div>');
                    redirect('materi');
                } else {
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pretest/ketentuan', $data);
                    $this->load->view('siswa/template/footer');
                }
            }
        
    }
    public function pretest(){
        $data['title'] = "Pre-Test";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Pretest_model->getUserByEmail($this->session->userdata('email'));
            $data['soal'] = $this->Pretest_model->getPretestQuestions();
            $data['jumlah'] = $this->Pretest_model->getPretestQuestionCount();
            $data['pretest'] = $this->Pretest_model->getPretestCountBySiswaId($this->session->userdata('id'));
            $pretest = $this->Pretest_model->getWaktu();
            //waktu yang dikirim dalam detik
            $data['waktu'] = ($pretest['waktu'] * 60);
            if ($data['pretest'] > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah pernah mengerjakan Pre-Test</div>');
                redirect('materi');
            } else {
                $aktif = $this->Pretest_model->getPretestStatus();
                if ($aktif['aktif'] == 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pre-Test belum aktif</div>');
                    redirect('materi');
                } else {
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/pretest/pretest', $data);
                    $this->load->view('siswa/template/footer');
                }
            }

    }

    public function simpanPreTest()
    {
            $pilihan = $this->input->post('pilihan');
            $id_pretest = $this->input->post('id_pretest');
            $jumlah = $this->input->post('jumlah');
            $score = 0;
            $benar = 0;
            $salah = 0;
            $kosong = 0;
            $str_jawaban = "";
            $benar1 = 0;
            $benar2 = 0;
            $benar3 = 0;
            $benar4 = 0;

            $jumlahSoalPs1 = $this->Pretest_model->getCountIndikatorPS1();
            $jumlahSoalPs2 = $this->Pretest_model->getCountIndikatorPS2();
            $jumlahSoalPs3 = $this->Pretest_model->getCountIndikatorPS3();
            $jumlahSoalPs4 = $this->Pretest_model->getCountIndikatorPS4();

            for ($i = 0; $i < $jumlah; $i++) {
                $nomor = $id_pretest[$i];
            
                if (empty($pilihan[$nomor])) {
                    $kosong++;
                    $str_jawaban = $str_jawaban . "X";
                } else {
                    $jawaban = $pilihan[$nomor];
                    $str_jawaban = $str_jawaban . $pilihan[$nomor];
                    $isAnswerCorrect = $this->Pretest_model->checkAnswer($nomor, $jawaban);
                    //cek bahwa nomor itu punya id_problemsolving apa dari database
                    $id_ps = $this->Pretest_model->checkPs($nomor);


                    if ($isAnswerCorrect) {

                        switch($id_ps['id_ps']){
                            case 1:
                                $benar1++;
                            break;
                            case 2:
                                $benar2++;
                            break;
                            case 3:
                                $benar3++;
                            break;
                            case 4:
                                $benar4++;
                            break;
                        }
                        
                        $benar++;
                    } else {
                        $salah++;
                    }
                }
            }
            $jumlahSoalPs1 = $jumlahSoalPs1['jumlah'];
            $jumlahSoalPs2 = $jumlahSoalPs2['jumlah'];
            $jumlahSoalPs3 = $jumlahSoalPs3['jumlah'];
            $jumlahSoalPs4 = $jumlahSoalPs4['jumlah'];

            if($jumlahSoalPs1 != 0){
                $score1 = 100 / $jumlahSoalPs1 * $benar1;
            }else{
                $score1 = 0;
            }
            if($jumlahSoalPs2 != 0){
                $score2 = 100 / $jumlahSoalPs2 * $benar2;
            }else{
                $score2 = 0;
            }
            if($jumlahSoalPs3 != 0){
                $score3 = 100 / $jumlahSoalPs3 * $benar3;
            }else{
                $score3 = 0;
            }
            if($jumlahSoalPs4 != 0){
                $score4 = 100 / $jumlahSoalPs4 * $benar4;
            }else{
                $score4 = 0;
            }

            $jumlah_soal = $this->Pretest_model->getPretestQuestionCount();
            $score = 100 / $jumlah_soal * $benar;
            $hasil = number_format($score, 2);

            $id = $this->session->userdata('id');
            //buat timestamp
            
           

            $data = [
                'id_siswa' => $id,
                'jawaban' => $str_jawaban,
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'score' => $hasil,
                'id_test' => 1,
                'memahami_masalah' => $score1,
                'merencanakan_pemecahan_masalah' => $score2,
                'melaksanakan_pemecahan_masalah' => $score3,
                'memeriksa_kembali' => $score4,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Pretest_model->savePretestResult($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah pernah mengerjakan Pre-Test</div>');
            redirect('materi');
         
        
    }
}
