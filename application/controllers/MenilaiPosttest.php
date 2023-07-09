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
    }

    public function index()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            $data['title'] = "Hasil Post-Test";
            $data['user'] = $this->Menilaiposttest_model->getUserByEmail($this->session->userdata('email'));
            // Join id_siswa dengan table siswa
            $data['posttest'] = $this->Menilaiposttest_model->getHasilPosttest();
            $this->load->view('backend/admin/header', $data);
            $this->load->view('backend/admin/sidebar', $data);
            $this->load->view('backend/admin/hasilposttest', $data);
            $this->load->view('backend/admin/footer');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

    public function hapusHasilPosttest($id)
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
            // Delete berdasarkan id
            $this->Menilaiposttest_model->deleteHasilPosttest($id);
            $this->session->set_flashdata('category_success', 'Hasil Post-Test berhasil dihapus');
            redirect('MenilaiPosttest');
        } else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }
    public function cetakExcel(){
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') == 1) {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'No');
			$sheet->setCellValue('B1', 'Nama');
			$sheet->setCellValue('C1', 'Jawaban');
			$sheet->setCellValue('D1', 'Score');
			$sheet->setCellValue('E1', 'Benar');
			$sheet->setCellValue('E1', 'Salah');
            $sheet->setCellValue('E1', 'Kosong');
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
                $sheet->setCellValue('E'.$x, $row['salah']);
                $sheet->setCellValue('E'.$x, $row['kosong']);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-Posttest';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');


        }else {
            if ($this->session->userdata('role') == 0 && $this->session->userdata('email') != '') {
                redirect('Auth/blocked');
            } else {
                redirect('Auth/backLogin');
            }
        }
    }

}
