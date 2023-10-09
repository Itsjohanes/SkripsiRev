<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class MenilaiPosttest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaiposttest_model');
        $this->load->model('Chat_model');
        checkRole(1);
    }

    public function index()
    {
            $data['title'] = "Hasil Post-Test";
            $data['user'] = $this->Menilaiposttest_model->getUserByEmail($this->session->userdata('email'));
            $data['notifchat'] = $this->Chat_model->getChatData();
            // Join id_siswa dengan table siswa
            $data['posttest'] = $this->Menilaiposttest_model->getHasilPosttest();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/menilaiposttest/hasilposttest', $data);
            $this->load->view('admin/template/footer');
        
    }

    public function hapusHasilPosttest($id)
    {
            // Delete berdasarkan id
            $this->Menilaiposttest_model->deleteHasilPosttest($id);
            $this->session->set_flashdata('category_success', 'Hasil Post-Test berhasil dihapus');
            redirect('MenilaiPosttest');
        
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
            $sheet->setCellValue('H1', 'Memahami Masalah');
            $sheet->setCellValue('I1', 'Merencanakan Penyelesaian Masalah');
            $sheet->setCellValue('J1', 'Melaksanakan Penyelesaian Masalah');
            $sheet->setCellValue('K1', 'Memeriksa Kembali');
			$siswa = $this->Menilaiposttest_model->getHasilPosttest();
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
                $sheet->setCellValue('H'.$x, $row['memahami_masalah']);
                $sheet->setCellValue('I'.$x, $row['merencanakan_pemecahan_masalah']);
                $sheet->setCellValue('J'.$x, $row['melaksanakan_pemecahan_masalah']);
                $sheet->setCellValue('K'.$x, $row['memeriksa_kembali']);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-Posttest';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');


        
    }

}
