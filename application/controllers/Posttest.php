<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posttest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posttest_model'); // Load the Posttest_model
        checkRole(0);
    }

    public function index()
    {
            $data['title'] = "Post-Test";
            $data['user'] = $this->Posttest_model->getUserByEmail($this->session->userdata('email'));
            $data['soal'] = $this->Posttest_model->getPosttestQuestions();
            $data['jumlah'] = $this->Posttest_model->getPosttestQuestionCount();
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
                    $this->load->view('backend/siswa/header', $data);
                    $this->load->view('backend/siswa/sidebar', $data);
                    $this->load->view('backend/siswa/posttest', $data);
                    $this->load->view('backend/siswa/footer');
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

            for ($i = 0; $i < $jumlah; $i++) {
                $nomor = $id_posttest[$i];

                if (empty($pilihan[$nomor])) {
                    $kosong++;
                    $str_jawaban = $str_jawaban . " ";
                } else {
                    $jawaban = $pilihan[$nomor];
                    $str_jawaban = $str_jawaban . $pilihan[$nomor];
                    $isAnswerCorrect = $this->Posttest_model->checkAnswer($nomor, $jawaban);

                    if ($isAnswerCorrect) {
                        $benar++;
                    } else {
                        $salah++;
                    }
                }
            }

            $jumlah_soal = $this->Posttest_model->getPosttestQuestionCount();
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
                'id_test' => 2
            ];

            $this->Posttest_model->savePosttestResult($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah mengerjakan Post-Test</div>');
            redirect('Materi');
        
    }
}
