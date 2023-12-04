<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posttest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posttest_model'); // Load the Posttest_model
        $this->load->model('Chat_model');
        checkRole(0);
    }

    public function index()
    {
            $data['title'] = "Post-Test";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Posttest_model->getUserByEmail($this->session->userdata('email'));
            $data['posttest'] = $this->Posttest_model->getPosttestCountBySiswaId($this->session->userdata('id'));
            if ($data['posttest'] > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah mengerjakan Post-Test</div>');
                redirect('Materi');
            } else {
                $aktif = $this->Posttest_model->getPosttestStatus();
                if ($aktif['aktif'] == 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Post-Test belum aktif</div>');
                    redirect('Materi');
                } else {
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/posttest/ketentuan', $data);
                    $this->load->view('siswa/template/footer');
                }
            }
        
    }
    public function posttest()
    {
            $data['title'] = "Post-Test";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Posttest_model->getUserByEmail($this->session->userdata('email'));
            $data['soal'] = $this->Posttest_model->getPosttestQuestions();
            $data['jumlah'] = $this->Posttest_model->getPosttestQuestionCount();
            $data['posttest'] = $this->Posttest_model->getPosttestCountBySiswaId($this->session->userdata('id'));
            $posttest = $this->Posttest_model->getWaktu();
            $data['waktu'] = ($posttest['waktu'] * 60);
            if ($data['posttest'] > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah mengerjakan Post-Test</div>');
                redirect('Materi');
            } else {
                $aktif = $this->Posttest_model->getPosttestStatus();
                if ($aktif['aktif'] == 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Post-Test belum aktif</div>');
                    redirect('Materi');
                } else {
                    //simpan attempt jika belum ada
                    $cek = $this->Posttest_model->getAttemptPosttest();
                    if(empty($cek)){
                        $this->Posttest_model->saveAttemptPosttest();
                    }
                    $this->load->view('siswa/template/header', $data);
                    $this->load->view('siswa/template/sidebar', $data);
                    $this->load->view('siswa/posttest/posttest', $data);
                    $this->load->view('siswa/template/footer');
                }
            }
        
    }


    public function simpanPostTest()
    {
            $pilihan = $this->input->post('pilihan');
            $id_posttest = $this->input->post('id_posttest');
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

            $jumlahSoalPs1 = $this->Posttest_model->getCountIndikatorPS1();
            $jumlahSoalPs2 = $this->Posttest_model->getCountIndikatorPS2();
            $jumlahSoalPs3 = $this->Posttest_model->getCountIndikatorPS3();
            $jumlahSoalPs4 = $this->Posttest_model->getCountIndikatorPS4();

            for ($i = 0; $i < $jumlah; $i++) {
                $nomor = $id_posttest[$i];

                if (empty($pilihan[$nomor])) {
                    $kosong++;
                    $str_jawaban = $str_jawaban . "X";
                } else {
                    $jawaban = $pilihan[$nomor];
                    $str_jawaban = $str_jawaban . $pilihan[$nomor];
                    $isAnswerCorrect = $this->Posttest_model->checkAnswer($nomor, $jawaban);
                    $id_ps = $this->Posttest_model->checkPs($nomor);


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
            $jumlah_soal = $this->Posttest_model->getPosttestQuestionCount();
            $score = 100 / $jumlah_soal * $benar;
            $hasil = number_format($score, 2);

            $id = $this->session->userdata('id');
            //hitung lama waktu mengerjakan

            $data = [
                'id_siswa' => $id,
                'jawaban' => $str_jawaban,
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'score' => $hasil,
                'id_test' => 2,
                'memahami_masalah' => $score1,
                'merencanakan_pemecahan_masalah' => $score2,
                'melaksanakan_pemecahan_masalah' => $score3,
                'memeriksa_kembali' => $score4,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Posttest_model->savePosttestResult($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah mengerjakan Post-Test</div>');
            redirect('materi');
        
    }
}
