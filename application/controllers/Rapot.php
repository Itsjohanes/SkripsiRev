<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rapot_model'); // Load the Rapot_model
    }

    public function index()
    {
        // Only accessible if session exists
        if ($this->session->userdata('email') != '') {
            $data['title'] = "Report";
            $data['user'] = $this->Rapot_model->getUserByEmail($this->session->userdata('email'));
            $data['pretest'] = $this->Rapot_model->getPretestBySiswaId($this->session->userdata('id'));
            $data['posttest'] = $this->Rapot_model->getPosttestBySiswaId($this->session->userdata('id'));
            $data['tugas1'] = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), '1');
            $data['tugas2'] = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), '2');
            $data['tugas3'] = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), '3');
            $data['tugas4'] = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), '4');

            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/report', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }
    }
}
