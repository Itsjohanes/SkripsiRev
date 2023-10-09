<?php
defined('BASEPATH') or exit('No direct script access allowed');


class FileManager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Filemanager_model');
        $this->load->model('Chat_model');
        checkRole(0);
       
    }
    public function index() {
        $data['title'] = "File Manager";
        $data['notifchat'] = $this->Chat_model->getChatData();
        $data['user'] = $this->Filemanager_model->getUserByEmail($this->session->userdata('email'));
        $data['kelompok'] = $this->Filemanager_model->getKelompokByIdUser($this->session->userdata('id'));
        $kelompokku = $this->Filemanager_model->getKelompokByIdUser($this->session->userdata('id'));
        $this->load->helper('url');
        $data['files'] = $this->get_files($kelompokku['kelompok']);
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/template/sidebar', $data);
        $this->load->view('siswa/groupchat/filemanager', $data);
        $this->load->view('siswa/template/footer');
    }

    public function upload($kelompok) {
    $config['upload_path'] = './uploads/'.$kelompok;
    $config['allowed_types'] = 'json|zip'; // Perhatikan tanda kutip di dalam karakter pipa
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('file')) {
        redirect('FileManager');
    } else {
        echo $this->upload->display_errors();
    }
}


    public function delete($kelompok,$file_name) {
        $file_path = './uploads/'.$kelompok.'/' . $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        redirect('FileManager');
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
