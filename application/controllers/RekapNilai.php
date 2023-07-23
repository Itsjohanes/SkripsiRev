<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapNilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->library('cetak_pdf');
        $this->load->model('ReportNilai_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Rekap Nilai";
            // Mendapatkan data user
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['jumlahTugas'] = $this->Kelolapertemuan_model->getMax();

            // Mendapatkan data report
            $data['report'] = $this->ReportNilai_model->getReportData();
            $pertemuan = $this->Kelolapertemuan_model->getPertemuan();
            $data['pertemuan'] = array();
            foreach ($pertemuan as $item) {
                $data['pertemuan'][$item['id_pertemuan']] = $item;
            }
            $totalPertemuan = $data['jumlahTugas'];
            for ($i = 1; $i <= $totalPertemuan; $i++) {
                if (!isset($data['pertemuan'][$i])) {
                    $data['pertemuan'][$i] = null;
                }
            }            
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/rekapnilai', $data);
            $this->load->view('backend/admin/footer');
       
    }



	public function cetakPDF()
	{
        $pertemuan = $this->Kelolapertemuan_model->getPertemuan();
        $jumlahTugas = $this->Kelolapertemuan_model->getMax();
        $pdf = new FPDF('L', 'mm', 'a3');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DAFTAR NILAI SISWA', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(8, 10, 'No', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Nama Siswa', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Pre-Test', 1, 0, 'C');
        for($i = 1;$i<=$jumlahTugas;$i++){
            if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                $pdf->Cell(35, 10, 'Tugas '.$i, 1, 0, 'C');
            }
            

        }
        $pdf->Cell(35, 10, 'Post-Test', 1, 1, 'C');
       

        $pdf->SetFont('Arial', '', 10);
        $data = $this->ReportNilai_model->getReportData();
        $no = 1;
        foreach ($data as $data) {
            $pdf->Cell(8, 10, $no, 1, 0);
            $pdf->Cell(100, 10, $data['nama'], 1, 0);
            $pdf->Cell(35, 10, $data['pretest'], 1, 0);
            for($i = 1;$i<=$jumlahTugas;$i++){
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $pdf->Cell(35, 10, $data['tugas_'.$i], 1, 0);
                }

            }
            $pdf->Cell(35, 10, $data['posttest'], 1, 1);
            $no++;
        }

        $pdf->Output('D','Rekap_Nilai.pdf');
    

	}
}
