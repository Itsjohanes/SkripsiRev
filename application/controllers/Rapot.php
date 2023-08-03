<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rapot_model');
        $this->load->library('cetak_pdf');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        checkRole(0);
    }

    public function index()
    {
        
            $data['title'] = "Report";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Rapot_model->getUserByEmail($this->session->userdata('email'));
            $data['pretest'] = $this->Rapot_model->getPretestBySiswaId($this->session->userdata('id'));
            $data['posttest'] = $this->Rapot_model->getPosttestBySiswaId($this->session->userdata('id'));
            $maxPertemuan = $this->Kelolapertemuan_model->getMax();
            //Pertemuan dimulai dari 1
            for($i = 1; $i<=$maxPertemuan; $i++){
                if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                    $tugas[$i] = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), $i);
                }

            }
            //send data
            $data['tugas'] = $tugas;
            $data['maxpertemuan'] = $maxPertemuan;
            $data['jumlahTugas'] = $this->Kelolapertemuan_model->getMax();

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
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/rapot', $data);
            $this->load->view('backend/siswa/footer');
        
    }
    public function cetakPDF()
	{

        $user = $this->Rapot_model->getUserByEmail($this->session->userdata('email'));
        $pretest = $this->Rapot_model->getPretestBySiswaId($this->session->userdata('id'));
        $posttest = $this->Rapot_model->getPosttestBySiswaId($this->session->userdata('id'));
        $maxPertemuan = $this->Kelolapertemuan_model->getMax();
        for($i = 1; $i<=$maxPertemuan; $i++){
            if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                $tugas[$i] = $this->Rapot_model->getTugasBySiswaIdAndPertemuan($this->session->userdata('id'), $i);
            }
        }
        $pdf = new FPDF('P', 'mm', 'a4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $backgroundurl = base_url('assets/img/rapot.jpg'); 
         $pdf->Image($backgroundurl, 0, 0, 210, 270);
        $pdf->Cell(0, 7, 'Rapot Nilai Siswa', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', '' , 10);
        $pdf->Cell(80, 10, 'Nama Siswa', 1, 0,);
        $pdf->Cell(80, 10, $user['nama'], 1, 1);
        $pdf->Cell(80, 10, 'Pre-Test', 1, 0);
        if ($pretest == null) {
            $pdf->Cell(80, 10, "Belum dikerjakan", 1, 1);
        } else {
            $pdf->Cell(80, 10, $pretest['score'], 1, 1);
        }
        for($i = 1;$i<= $maxPertemuan;$i++){
            if($this->Kelolapertemuan_model->getPertemuanbyId($i) != null){
                $pdf->Cell(80, 10, 'Pertemuan '.$i, 1, 0);
                if ($tugas[$i] == null) {
                    $pdf->Cell(80, 10, "Belum dikerjakan", 1, 1);
                } else {
                    if ($tugas[$i]['nilai'] == null) {
                        $pdf->Cell(80, 10, "Belum dinilai", 1, 1);
                    } else {
                        $pdf->Cell(80, 10, $tugas[$i]['nilai'], 1, 1);
                    }
                }
            }
        }
        $pdf->Output('D','Raport.pdf');
	}
}
