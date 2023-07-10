<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('checkRole')) {
    function checkRole($role)
    {
        $CI = &get_instance();

        // Periksa apakah ada sesi yang aktif
        if (!$CI->session->userdata('email')) {

            // Jika tidak ada sesi, arahkan pengguna ke halaman login
            redirect('Auth/login');
        }

        // Periksa role pengguna
        if ($role == '1') {
            if ($CI->session->userdata('role') !== '1') {
                // Jika pengguna bukan admin, arahkan ke halaman blokir
                redirect('Auth/blocked');
            }
        }
    }
}
