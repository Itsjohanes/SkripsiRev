<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapNilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->library('cetak_pdf');
        $this->load->model('ReportNilai_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Rekap Nilai";
            // Mendapatkan data user
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            // Mendapatkan data report
            $data['report'] = $this->ReportNilai_model->getReportData();

            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/rekapnilai', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }



	public function cetakPDF()
	{
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
        $pdf = new FPDF('L', 'mm', 'a3');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DAFTAR NILAI SISWA', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(8, 10, 'No', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Nama Siswa', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Pre-Test', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Pertemuan 1', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Pertemuan 2', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Pertemuan 3', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Pertemuan 4', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Post-Test', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $data = $this->ReportNilai_model->getReportData();
        $no = 1;
        foreach ($data as $data) {
            $pdf->Cell(8, 10, $no, 1, 0);
            $pdf->Cell(100, 10, $data['nama'], 1, 0);
            $pdf->Cell(35, 10, $data['pretest'], 1, 0);
            $pdf->Cell(35, 10, $data['tugas_1'], 1, 0);
            $pdf->Cell(35, 10, $data['tugas_2'], 1, 0);
            $pdf->Cell(35, 10, $data['tugas_3'], 1, 0);
            $pdf->Cell(35, 10, $data['tugas_4'], 1, 0);
            $pdf->Cell(35, 10, $data['posttest'], 1, 1);
            $no++;
        }

        $pdf->Output();
    }else{
        if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
    }

	}
}
