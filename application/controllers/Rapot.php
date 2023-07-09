<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rapot_model');
        $this->load->library('cetak_pdf');
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
    public function cetakPDF()
	{
        if ($this->session->userdata('email') != '') {

        $user = $this->Rapot_model->getUserByEmail($this->session->userdata('email'));
        $pretest = $this->Rapot_model->getPretestBySiswaId($this->session->userdata('id'));
        $posttest = $this->Rapot_model->getPosttestBySiswaId($this->session->userdata('id'));
        $tugas1 = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), '1');
        $tugas2 = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), '2');
        $tugas3 = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), '3');
        $tugas4 = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), '4');    
        $pdf = new FPDF('L', 'mm', 'a3');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Rapot Nilai Siswa', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(8, 10, 'No', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Nama Siswa', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Pre-Test', 1, 0, 'C');
        $pdf->Cell(45, 10, 'Pertemuan 1', 1, 0, 'C');
        $pdf->Cell(45, 10, 'Pertemuan 2', 1, 0, 'C');
        $pdf->Cell(45, 10, 'Pertemuan 3', 1, 0, 'C');
        $pdf->Cell(45, 10, 'Pertemuan 4', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Post-Test', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        
        $pdf->Cell(8, 10, $no, 1, 0);
        $pdf->Cell(100, 10, $user['nama'], 1, 0);
        if($pretest == null){
            $pdf->Cell(35, 10, "Belum dikerjakan", 1, 0);
        }else{
            $pdf->Cell(35, 10, $pretest['score'], 1, 0);

        }
        if($tugas1 == null){
           $pdf->Cell(45, 10, "Belum dikerjakan", 1, 0);

        }else{
            if($tugas1['nilai'] == null){
                $pdf->Cell(45, 10, "Belum dinilai", 1, 0);
            }else{
                $pdf->Cell(45, 10, $tugas1['nilai'], 1, 0);
            }
           

        }
        if($tugas2 == null){
           $pdf->Cell(45, 10, "Belum dikerjakan", 1, 0);

        }else{
             if($tugas2['nilai'] == null){
                $pdf->Cell(45, 10, "Belum dinilai", 1, 0);
            }else{
           $pdf->Cell(45, 10, $tugas2['nilai'], 1, 0);
            }

        }
        if($tugas3 == null){
           $pdf->Cell(45, 10, "Belum dikerjakan", 1, 0);

        }else{
            if($tugas3['nilai'] == null){
                $pdf->Cell(45, 10, "Belum dinilai", 1, 0);
            }else{
           $pdf->Cell(45, 10, $tugas3['nilai'], 1, 0);
            }
        }
        if($tugas4 == null){
           $pdf->Cell(45, 10, "Belum dikerjakan", 1, 0);

        }else{
            if($tugas4['nilai'] == null){
                $pdf->Cell(45, 10, "Belum dinilai", 1, 0);
            }else{
           $pdf->Cell(45, 10, $tugas4['nilai'], 1, 0);
            }
        }
        if($posttest == null){
            $pdf->Cell(35, 10, "Belum dikerjakan", 1, 1);
        }else{
            $pdf->Cell(35, 10, $posttest['score'], 1, 1);

        }
       
        

        $pdf->Output();
    }else{
       
                redirect('Auth/backLogin');
            
    }

	}
}
