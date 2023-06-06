<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timer extends CI_Controller {

    public function index() {
        $this->load->view('timer_view');
    }

    public function start_timer() {
        // Mengatur waktu batas dalam detik (misalnya 1 jam = 3600 detik)
        $time_limit = 3600;

        // Menyimpan waktu batas dalam session
        $this->session->set_userdata('time_limit', $time_limit);

        // Menyimpan waktu mulai dalam session
        $this->session->set_userdata('start_time', time());
    }

    public function check_timer() {
    // Mengambil waktu batas dari session
    $time_limit = $this->session->userdata('time_limit');

    // Mengambil waktu mulai dari session
    $start_time = $this->session->userdata('start_time');

    // Menghitung waktu yang telah berlalu
    $elapsed_time = time() - $start_time;

    // Memeriksa apakah waktu yang berlalu sudah melebihi waktu batas
    if ($elapsed_time >= $time_limit) {
        // Menampilkan pesan jika waktu telah habis
        $message = "Waktu telah habis!";
    } else {
        // Menghitung sisa waktu
        $remaining_time = $time_limit - $elapsed_time;

        // Mengonversi sisa waktu ke format jam:menit:detik
        $hours = floor($remaining_time / 3600);
        $minutes = floor(($remaining_time % 3600) / 60);
        $seconds = $remaining_time % 60;

        // Menampilkan sisa waktu
        $message = "Sisa waktu: " . sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

    echo $message;
}


}
