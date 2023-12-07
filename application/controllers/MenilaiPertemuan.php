<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menilaipertemuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Menilaipertemuan_model');
        $this->load->model('Kelolapertemuan_model');
        $this->load->model('Chat_model');
        // Load the user agent library
        $this->load->library('user_agent');
        checkRole(1);

    }

    public function index($id = '')
    {
            $pertemuan = $this->Kelolapertemuan_model->getPertemuanbyId($id);

            if($pertemuan){
                $data['notifchat'] = $this->Chat_model->getChatData();
                $data['title'] = "Hasil Pertemuan ". $id;
                $data['user'] = $this->Menilaipertemuan_model->getUserByEmail($this->session->userdata('email'));
                $data['hasiltugas'] = $this->Menilaipertemuan_model->getHasilTugasPertemuan($id);
                $data['pertemuan'] = $id;
                $this->load->view('guru/template/header', $data);
                $this->load->view('guru/template/sidebar', $data);
                $this->load->view('guru/menilaipertemuan/hasiltugas', $data);
                $this->load->view('guru/template/footer');
            }else{
                redirect('menilai');
            }
            
       
    }

    public function menilaiById($id = '')
    {
            $data['title'] = "Hasil Tugas";
            $data['notifchat'] = $this->Chat_model->getChatData();
            $data['user'] = $this->Menilaipertemuan_model->getUserByEmail($this->session->userdata('email'));
            $data['pertemuan'] = $this->Menilaipertemuan_model->getHasilTugasById($id);
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/template/sidebar', $data);
            $this->load->view('guru/menilaipertemuan/menilaitugas', $data);
            $this->load->view('guru/template/footer');
        
    }

    public function runMenilai()
    {
            // Run edit
            $id = $this->input->post('id_hasiltugas');
            $nilai = $this->input->post('nilai');
            $komentar = $this->input->post('komentar');
            $pertemuan = $this->input->post('pertemuan');
            $penilaian = $this->input->post('penilaian');
            $nilai_sikap = $this->input->post('nilai_sikap');
            $penilaian_sikap = $this->input->post('penilaian_sikap');
            $nilaips = $this->input->post('nilaips');
            $indikatorps = $this->input->post('indikatorps');


            //Ubah nilaips menjadi array of integer
            $nilaips = explode(',', $nilaips);
            $nilaips = array_map('intval', $nilaips);

            $indikatorps = explode(',', $indikatorps);

            $jumlah_elemen = count($indikatorps);

            $jumlahIndikator1 = 0;
            $jumlahIndikator2 = 0;
            $jumlahIndikator3 = 0;
            $jumlahIndikator4 = 0;

            $totalIndikator1 = 0;
            $totalIndikator2 = 0;
            $totalIndikator3 = 0;
            $totalIndikator4 = 0;

            for($i = 0;$i<$jumlah_elemen-1;$i++){

                //jika value dari indikatorps adalah memahami_masalah
                if($indikatorps[$i] == "memahami_masalah"){
                    $jumlahIndikator1++;
                    $totalIndikator1 += $nilaips[$i];
                }else{
                    //jika value dari indikatorps adalah menyelesaikan_masalah
                    if($indikatorps[$i] == "merencanakan_pemecahan_masalah"){
                        $jumlahIndikator2++;
                        $totalIndikator2 += $nilaips[$i];
                    }else{
                        //jika value dari indikatorps adalah mengkomunikasikan_masalah
                        if($indikatorps[$i] == "melaksanakan_pemecahan_masalah"){
                            $jumlahIndikator3++;
                            $totalIndikator3 += $nilaips[$i];
                        }else{
                            //jika value dari indikatorps adalah mengaplikasikan_masalah
                            if($indikatorps[$i] == "memeriksa_kembali"){
                                $jumlahIndikator4++;
                                $totalIndikator4 += $nilaips[$i];
                            }
                        }
                    }
                }

            }
            $rataRataIndikator1 = $totalIndikator1/($jumlahIndikator1 * 4) *100;
            $rataRataIndikator2 = $totalIndikator2/($jumlahIndikator2 * 4) *100;
            $rataRataIndikator3 = $totalIndikator3/($jumlahIndikator3 * 4) *100;
            $rataRataIndikator4 = $totalIndikator4/($jumlahIndikator4 * 4) *100;

            $data = [
                'penilaian' => $penilaian,
                'penilaian_sikap' => $penilaian_sikap,
                'nilai_sikap' => $nilai_sikap,
                'nilai' => $nilai,
                'memahami_masalah' => $rataRataIndikator1,
                'merencanakan_pemecahan_masalah' => $rataRataIndikator2,
                'melaksanakan_pemecahan_masalah' => $rataRataIndikator3,
                'memeriksa_kembali' => $rataRataIndikator4,
                'komentar' => $komentar,
                'scored_at' => date('Y-m-d H:i:s')
            ];
            $this->Menilaipertemuan_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil diubah');
            redirect('menilaipertemuan/'.$pertemuan);
        
    }

    public function deleteMenilai($id)
    {
            // Menghapus by id
            $data = [
                'penilaian' => null,
                'nilai' => null,
                'komentar' => null,
                'scored_at' => null
            ];
            $this->Menilaipertemuan_model->updateHasilTugas($id, $data);
            $this->session->set_flashdata('category_success', 'Nilai berhasil dihapus');
            redirect($this->agent->referrer());
        
    }

    

}
