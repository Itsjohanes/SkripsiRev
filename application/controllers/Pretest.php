<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pretest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pretest_model'); // Load the Pretest_model
        $this->load->model('ChatModel');
        checkRole(0);
    }

    public function index()
    {
            $data['title'] = "Pre-Test";
            $data['notifchat'] = $this->ChatModel->getChatData();
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
                    $this->load->view('backend/siswa/header', $data);
                    $this->load->view('backend/siswa/sidebar', $data);
                    $this->load->view('backend/siswa/pretest', $data);
                    $this->load->view('backend/siswa/footer');
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

            for ($i = 0; $i < $jumlah; $i++) {
                $nomor = $id_pretest[$i];

                if (empty($pilihan[$nomor])) {
                    $kosong++;
                    $str_jawaban = $str_jawaban . " ";
                } else {
                    $jawaban = $pilihan[$nomor];
                    $str_jawaban = $str_jawaban . $pilihan[$nomor];
                    $isAnswerCorrect = $this->Pretest_model->checkAnswer($nomor, $jawaban);

                    if ($isAnswerCorrect) {
                        $benar++;
                    } else {
                        $salah++;
                    }
                }
            }

            $jumlah_soal = $this->Pretest_model->getPretestQuestionCount();
            $score = 100 / $jumlah_soal * $benar;
            $hasil = number_format($score, 2);

            $id = $this->session->userdata('id');

            $data = [
                'id_siswa' => $id,
                'jawaban' => $str_jawaban,
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'score' => $hasil,
                'id_test' => 1
            ];

            $this->Pretest_model->savePretestResult($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah pernah mengerjakan Pre-Test</div>');
            redirect('materi');
        
    }
}
