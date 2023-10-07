<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AdminFileManager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_model');
        $this->load->model('Admin_model');
        $this->load->library('user_agent');

        checkRole(1);
       
    }
    public function index($kelompok = '') {
        $data['title'] = "File Manager";
        $data['notifchat'] = $this->Chat_model->getChatData();
        $data['user'] = $this->Admin_model->getUserByEmail($this->session->userdata('email'));
        $data['kelompok'] = $kelompok;
        $this->load->helper('url');
        $data['files'] = $this->get_files($kelompok);
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/groupchat/filemanager', $data);
        $this->load->view('admin/template/footer');
    }

    public function upload($kelompok) {
    $config['upload_path'] = './uploads/'.$kelompok;
    $config['allowed_types'] = 'json|zip'; // Perhatikan tanda kutip di dalam karakter pipa
    $this->load->library('upload', $config);
    
    if ($this->upload->do_upload('file')) {
        //redirect agent refferer
        redirect($this->agent->referrer());

    } else {
        echo $this->upload->display_errors();
    }
}


    public function delete($kelompok,$file_name) {
        $file_path = './uploads/'.$kelompok.'/' . $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        redirect($this->agent->referrer());
    }

    private function get_files($kelompok) {
        $file_list = array();
        $dir = "./uploads/".$kelompok."/";
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $file_list[] = $file;
            }
        }
        return $file_list;
    }
    public function download($kelompok, $filename) {
    $file = './uploads/' . $kelompok . '/' . $filename; // Tentukan path file yang akan diunduh

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        // Handle jika file tidak ditemukan
        echo "File tidak ditemukan.";
    }
}
}
