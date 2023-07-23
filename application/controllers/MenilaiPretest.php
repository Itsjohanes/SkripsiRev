<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class MenilaiPretest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaipretest_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Hasil Pre-Test";
            $data['user'] = $this->Menilaipretest_model->getUserByEmail($this->session->userdata('email'));
            $data['notifchat'] = $this->Chat_model->getChatData();
            // Join id_siswa dengan table siswa
            $data['pretest'] = $this->Menilaipretest_model->getHasilPretest();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasilpretest', $data);
            $this->load->view('backend/admin/footer');
        
    }

    public function hapusHasilPretest($id)
    {
            // Delete berdasarkan id
            $this->Menilaipretest_model->deleteHasilPretest($id);
            $this->session->set_flashdata('category_success', 'Hasil Pre-Test berhasil dihapus');
            redirect('MenilaiPretest');
        
    }
    public function cetakExcel(){
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'No');
			$sheet->setCellValue('B1', 'Nama');
			$sheet->setCellValue('C1', 'Jawaban');
			$sheet->setCellValue('D1', 'Score');
			$sheet->setCellValue('E1', 'Benar');
			$sheet->setCellValue('F1', 'Salah');
            $sheet->setCellValue('G1', 'Kosong');
			$siswa = $this->Menilaipretest_model->getHasilPretest();
			$no = 1;
			$x = 2;
			foreach($siswa as $row)
			{
				$sheet->setCellValue('A'.$x, $no++);
				$sheet->setCellValue('B'.$x, $row['nama']);
				$sheet->setCellValue('C'.$x, $row['jawaban']);
				$sheet->setCellValue('D'.$x, $row['score']);
				$sheet->setCellValue('E'.$x, $row['benar']);
                $sheet->setCellValue('F'.$x, $row['salah']);
                $sheet->setCellValue('G'.$x, $row['kosong']);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-Pretest';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');


        

    }

}
