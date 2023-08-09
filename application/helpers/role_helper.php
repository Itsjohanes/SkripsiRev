<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('checkRole')) {
    function checkRole($role)
    {
        $CI = &get_instance();

        // Periksa apakah ada sesi yang aktif
        if (!$CI->session->userdata('email')) {
            // Jika tidak ada sesi, arahkan pengguna ke halaman login
            redirect('auth/login');
        }

        // Periksa role pengguna
        if ($role == '1') {
            if ($CI->session->userdata('role') !== '1') {
                redirect('siswa');
            }
        }
        if($role == '0'){
            if ($CI->session->userdata('role') !== '0') {
                redirect('admin');
            }
        }
       

    }
}
