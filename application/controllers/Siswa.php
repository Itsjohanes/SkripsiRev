<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        //hanya bisa diakses jika memiliki session

        if ($this->session->userdata('email') != '') {
            $data['title'] = "Home Siswa";
            //Jika kelompoknya belum di random
            $data['kelompok'] = $this->db->get_where('tb_random', ['id_user' => $this->session->userdata('id')])->row_array();
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            //mendapatkan jumlah siswa dari tabel tb_akun yang rolenya adalah 0
            $data['jumlahSiswa'] = $this->db->get_where('tb_akun', ['role' => 0])->num_rows();
            
            $pretest = $this->db->get_where('tb_hasilpretest', ['id_siswa' => $this->session->userdata('id')])->num_rows();
            $posttest = $this->db->get_where('tb_hasilposttest', ['id_siswa' => $this->session->userdata('id')])->num_rows();
            $tugas1 = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => 1])->num_rows();
            $tugas2 = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => 2])->num_rows();
            $tugas3 = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => 3])->num_rows();
            $tugas4 = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => 4])->num_rows();
            $jumlah = $tugas1 + $tugas2 + $tugas3 + $tugas4;
            $data['persentasetugas'] = ($jumlah / 4) * 100;

            $data['persentasetest'] = ($pretest + $posttest)/2 * 100;
            $belumSelesai = "";
            $sudahSelesai = "";

            $tesSudah = "";
            if($pretest != 0){
                $tesSudah = $tesSudah . "Pretest, ";
                
            }
            if($posttest != 0){
                $tesSudah = $tesSudah . "Posttest ";

            }


            if ($tugas1 == 0) {
                $belumSelesai = $belumSelesai . "Tugas 1, ";
            }else{
                $sudahSelesai = $sudahSelesai . "Tugas 1, ";
            }
            if ($tugas2 == 0) {
                $belumSelesai = $belumSelesai . "Tugas 2, ";
            }else{
                $sudahSelesai = $sudahSelesai . "Tugas 2, ";
            }
            if ($tugas3 == 0) {
                $belumSelesai = $belumSelesai . "Tugas 3, ";
            }else{
                $sudahSelesai = $sudahSelesai . "Tugas 3, ";

            }
            if ($tugas4 == 0) {
                $belumSelesai = $belumSelesai . "Tugas 4 ";
            }else{
                $sudahSelesai = $sudahSelesai . "Tugas 4 ";
            }
            
            $data['tesSudah'] = $tesSudah;
            $data['sudahSelesai'] = $sudahSelesai;
            $data['belumSelesai'] = $belumSelesai;

            $data['tugasbelumselesai'] = array();
            if ($tugas1 == 0) {
                array_push($data['tugasbelumselesai'], "Tugas 1");
            }
            if ($tugas2 == 0) {
                array_push($data['tugasbelumselesai'], "Tugas 2");
            }
            if ($tugas3 == 0) {
                array_push($data['tugasbelumselesai'], "Tugas 3");
            }
            if ($tugas4 == 0) {
                array_push($data['tugasbelumselesai'], "Tugas 4");
            }

            //mendapatkan data seluruh siswa

            $data['siswa'] = $this->db->get_where('tb_akun', ['role' => 0])->result_array();
            

            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/index', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function editProfile()
    {
        //hanya bisa diakses jika memiliki session

        if ($this->session->userdata('email') != '') {
            $data['title'] = "Home Siswa";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/topbar', $data);
            $this->load->view('backend/siswa/editprofile', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function runEdit()
    {
        if ($this->session->userdata('email') != '' && $this->session->userdata('role') ==  0) {

            $this->form_validation->set_rules('nama', 'Nama', 'required');

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            if ($this->form_validation->run('runEdit') == false) {
                $data['title'] = "Home Admin";
                $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('backend/admin/header', $data);
                $this->load->view('backend/admin/sidebar', $data);
                $this->load->view('backend/admin/topbar', $data);
                $this->load->view('backend/admin/editProfile', $data);
                $this->load->view('backend/admin/footer');
            } else {
                //data masuk ke db
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                ];
                //ubah
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('tb_akun', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been Edited</div>');
                redirect('Siswa');
            }
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function preTest()
    {

        if ($this->session->userdata('email') != '') {
            $data['title'] = "Pre-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->db->get('tb_pretest')->result_array();
            //menghitung jumlah baris
            $data['jumlah'] = $this->db->get('tb_pretest')->num_rows();
            //mengambil data dari database apakah sudah pernah mengerjakan pretest
            $data['pretest'] = $this->db->get_where('tb_hasilpretest', ['id_siswa' => $this->session->userdata('id')])->num_rows();
            if ($data['pretest'] > 0) {
                //buatkan alert
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah pernah mengerjakan Pre-Test</div>');
                redirect('Siswa/materi');
            } else {
                $this->load->view('backend/siswa/header', $data);
                $this->load->view('backend/siswa/sidebar', $data);
                $this->load->view('backend/siswa/pretest', $data);
                $this->load->view('backend/siswa/footer');
            }
        } else {
            redirect('Auth/backLogin');
        }
    }

    public function simpanPreTest()
    {
        if ($this->session->userdata('email') != '') {
            $pilihan = $this->input->post('pilihan');
            $id_pretest = $this->input->post('id_pretest');
            $jumlah = $this->input->post('jumlah');
            $score    = 0;
            $benar    = 0;
            $salah    = 0;
            $kosong    = 0;
            $str_jawaban = ""; //inisialisasi

            for ($i = 0; $i < $jumlah; $i++) {
                $nomor    = $id_pretest[$i];

                // jika peserta tidak memilih jawaban
                if (empty($pilihan[$nomor])) {
                    $kosong++;
                    $str_jawaban  = $str_jawaban . " ";
                }
                // jika memilih
                else {
                    $jawaban    = $pilihan[$nomor];
                    $str_jawaban  = $str_jawaban . $pilihan[$nomor];
                    // cocokan kunci jawaban dengan database
                    $query    = $this->db->query("SELECT * FROM tb_pretest WHERE id_pretest='$nomor' AND kunci='$jawaban'");
                    $cek = $query->result_array();

                    // jika jawaban benar (cocok dengan database)
                    if ($cek) {
                        $benar++;
                    }
                    // jika jawaban salah (tidak cocok dengan database)
                    else {
                        $salah++;
                    }
                }
            }
            $hitung = $this->db->query("SELECT * FROM tb_pretest");
            $jumlah_soal    = $this->db->query("SELECT * FROM tb_pretest")->num_rows();
            $score    = 100 / $jumlah_soal * $benar;
            $hasil    = number_format($score, 2);
            //masukan
            $id = $this->session->userdata('id');

            //memasukan hasil ke tabel hasil_pretest
            $data = [
                'id_siswa' => $id,
                'jawaban' => $str_jawaban,
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'score' => $hasil
            ];
            $this->db->insert('tb_hasilpretest', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah pernah mengerjakan Pre-Test</div>');
            redirect('Siswa/materi');        
        } else {
            redirect('Auth/backlogin');
        }
    }
    public function postTest()
    {
        if ($this->session->userdata('email') != '') {
            $data['title'] = "Post-Test";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['soal'] = $this->db->get('tb_posttest')->result_array();
            $data['jumlah'] = $this->db->get('tb_posttest')->num_rows();
            $data['posttest'] = $this->db->get_where('tb_hasilposttest', ['id_siswa' => $this->session->userdata('id')])->num_rows();
            if ($data['posttest'] > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah mengerjakan Post-Test</div>');
            redirect('Siswa/materi');
            } else {
                $this->load->view('backend/siswa/header', $data);
                $this->load->view('backend/siswa/sidebar', $data);
                $this->load->view('backend/siswa/posttest', $data);
                $this->load->view('backend/siswa/footer');
            }   
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function simpanPostTest()
    {
        if ($this->session->userdata('email') != '') {
            $pilihan = $this->input->post('pilihan');
            $id_posttest = $this->input->post('id_posttest');
            $jumlah = $this->input->post('jumlah');
            $score    = 0;
            $benar    = 0;
            $salah    = 0;
            $kosong    = 0;
            $str_jawaban = ""; //inisialisasi
            for ($i = 0; $i < $jumlah; $i++) {
                $nomor    = $id_posttest[$i];

                // jika peserta tidak memilih jawaban
                if (empty($pilihan[$nomor])) {
                    $kosong++;
                    $str_jawaban  = $str_jawaban . " ";
                }
                // jika memilih
                else {
                    $jawaban    = $pilihan[$nomor];
                    $str_jawaban  = $str_jawaban . $pilihan[$nomor];
                    // cocokan kunci jawaban dengan database
                    $query    = $this->db->query("SELECT * FROM tb_posttest WHERE id_posttest='$nomor' AND kunci='$jawaban'");
                    $cek = $query->result_array();

                    // jika jawaban benar (cocok dengan database)
                    if ($cek) {
                        $benar++;
                    }
                    // jika jawaban salah (tidak cocok dengan database)
                    else {
                        $salah++;
                    }
                }
            }
            $hitung = $this->db->query("SELECT * FROM tb_posttest");
            $jumlah_soal    = $this->db->query("SELECT * FROM tb_posttest")->num_rows();
            $score    = 100 / $jumlah_soal * $benar;
            $hasil    = number_format($score, 2);
            //masukan
            $id = $this->session->userdata('id');

            //memasukan hasil ke tabel hasil_posttest
            $data = [
                'id_siswa' => $id,
                'jawaban' => $str_jawaban,
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'score' => $hasil
            ];
            $this->db->insert('tb_hasilposttest', $data);
             $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda sudah  mengerjakan Pre-Test</div>');
            redirect('Siswa/materi');  
        } else {
            redirect('Auth/backlogin');
        }
    }
    public function materi(){
         $data['title'] = "Materi";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['jumlahSiswa'] = $this->db->get_where('tb_akun', ['role' => 0])->num_rows();
            $pretest = $this->db->get_where('tb_hasilpretest', ['id_siswa' => $this->session->userdata('id')])->num_rows();
            $posttest = $this->db->get_where('tb_hasilposttest', ['id_siswa' => $this->session->userdata('id')])->num_rows();
            $tugas1 = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => 1])->num_rows();
            $tugas2 = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => 2])->num_rows();
            $tugas3 = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => 3])->num_rows();
            $tugas4 = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => 4])->num_rows();
            $data['pretest'] = $pretest;
            $data['posttest'] = $posttest;
            $data['tugas1'] = $tugas1;
            $data['tugas2'] = $tugas2;
            $data['tugas3'] = $tugas3;
            $data['tugas4'] = $tugas4;
            $data['siswa'] = $this->db->get_where('tb_akun', ['role' => 0])->result_array();
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/materi', $data);
            $this->load->view('backend/siswa/footer');
    }
    public function pertemuan1()
    {
        if ($this->session->userdata('email') != '') {
            $data['title'] = "Materi Pertemuan 1";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->db->get_where('tb_materi', ['pertemuan' => 1])->result_array();
            $data['hasiltugas'] = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 1, 'id_siswa' => $this->session->userdata('id')])->row_array();
            $data['banyakHasilTugas'] =   $this->db->get_where('tb_hasiltugas', ['pertemuan' => 1, 'id_siswa' => $this->session->userdata('id')])->num_rows();
            $data['tugas']  = $this->db->get_where('tb_tugas', ['pertemuan' => 1])->row_array();
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/pertemuan1', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }
    }

    
    public function tambahTugas()
    {
        if ($this->session->userdata('email') != '') {
            $slide = $this->input->post('slide');
            $id_siswa = $this->session->userdata('id');
            $pertemuan = $this->input->post('pertemuan');
            $text = $this->input->post('text');
            //file upload pdf dari name = "upload"
            $upload = $_FILES['upload']['name'];
            if ($upload) {
                $config['allowed_types'] = 'pdf';
                $config['encrypt_name'] = TRUE;
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/tugassiswa/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('upload')) {
                    $new_upload = $this->upload->data('file_name');

                    $this->db->set('upload', $new_upload);
                    $data = [
                        'id_siswa' => $id_siswa,
                        'pertemuan' => $pertemuan,
                        'text' => $text,
                        'upload' => $new_upload
                    ];
                    //setAlert 
                    $this->db->insert('tb_hasiltugas', $data);
                    //set flashdata
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil diupload</div>');
                } else {
                    //setAlert 
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal diupload</div>');
                }
            }

            redirect('Siswa/' . $slide);
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function pertemuan2()
    {
        if ($this->session->userdata('email') != '') {
            $data['title'] = "Materi Pertemuan 2";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->db->get_where('tb_materi', ['pertemuan' => 2])->result_array();
            $data['hasiltugas'] = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 2, 'id_siswa' => $this->session->userdata('id')])->row_array();
            $data['banyakHasilTugas'] =   $this->db->get_where('tb_hasiltugas', ['pertemuan' => 2, 'id_siswa' => $this->session->userdata('id')])->num_rows();
            $data['tugas']  = $this->db->get_where('tb_tugas', ['pertemuan' => 2])->row_array();
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/pertemuan2', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function pertemuan3()
    {
        if ($this->session->userdata('email') != '') {
            $data['title'] = "Materi Pertemuan 3";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->db->get_where('tb_materi', ['pertemuan' => 3])->result_array();
            $data['hasiltugas'] = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 3, 'id_siswa' => $this->session->userdata('id')])->row_array();
            $data['banyakHasilTugas'] =   $this->db->get_where('tb_hasiltugas', ['pertemuan' => 3, 'id_siswa' => $this->session->userdata('id')])->num_rows();
            $data['tugas']  = $this->db->get_where('tb_tugas', ['pertemuan' => 3])->row_array();


            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/pertemuan3', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function pertemuan4()
    {
        if ($this->session->userdata('email') != '') {
            $data['title'] = "Materi Pertemuan 4";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->db->get_where('tb_materi', ['pertemuan' => 4])->result_array();
            $data['hasiltugas'] = $this->db->get_where('tb_hasiltugas', ['pertemuan' => 4, 'id_siswa' => $this->session->userdata('id')])->row_array();
            $data['banyakHasilTugas'] =   $this->db->get_where('tb_hasiltugas', ['pertemuan' => 4, 'id_siswa' => $this->session->userdata('id')])->num_rows();
            $data['tugas']  = $this->db->get_where('tb_tugas', ['pertemuan' => 4])->row_array();
            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/pertemuan4', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function report()
    {
        if ($this->session->userdata('email') != '') {
            $data['title'] = "Report";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['pretest'] = $this->db->get_where('tb_hasilpretest', ['id_siswa' => $this->session->userdata('id')])->row_array();
            $data['posttest'] = $this->db->get_where('tb_hasilposttest', ['id_siswa' => $this->session->userdata('id')])->row_array();
            $data['tugas1'] = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => '1'])->row_array();
            $data['tugas2'] = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => '2'])->row_array();
            $data['tugas3'] = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => '3'])->row_array();
            $data['tugas4'] = $this->db->get_where('tb_hasiltugas', ['id_siswa' => $this->session->userdata('id'), 'pertemuan' => '4'])->row_array();

            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/report', $data);
            $this->load->view('backend/siswa/footer');
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function hapusTugas($id)
    {
        if ($this->session->userdata('email') != '') {
            $file = $this->db->get_where('tb_hasiltugas', ['id_hasiltugas' => $id])->row_array();
            $filename = $file['upload'];
            $pertemuan = $file['pertemuan'];

            $this->db->where('id_hasiltugas', $id);
            $this->db->delete('tb_hasiltugas');
            //unlink file berdasarkan id_hasiltugas

            unlink(FCPATH . 'assets/tugassiswa/' . $filename);
            //setflash
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil dihapus</div>');
            redirect('Siswa/' . "pertemuan" . $pertemuan);
        } else {
            redirect('Auth/backLogin');
        }
    }
    public function editTugas()
    {
        if ($this->session->userdata('email') != '') {
            $id = $this->input->post('id_hasiltugas');
            $pertemuan = $this->input->post('pertemuan');
            $slide = $this->input->post('slide');
            $filelama = $this->input->post('filelama');
            $text = $this->input->post('text');
            $upload = $_FILES['upload']['name'];
            if ($upload) {
                $config['encrypt_name'] = TRUE;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/tugassiswa/';
                if ($upload != $filelama) {
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('upload')) {
                        unlink(FCPATH . 'assets/tugassiswa/' . $filelama);
                        $new_upload = $this->upload->data('file_name');
                        $this->db->set('upload', $new_upload);
                        $data = [
                            'id_hasiltugas' => $id,
                            'pertemuan' => $pertemuan,
                            'upload' => $new_upload,
                            'text' => $text
                        ];
                        $this->db->where('id_hasiltugas', $id);
                        $this->db->update('tb_hasiltugas', $data);
                    } else {
                        echo $this->upload->display_errors();
                    }
                } else {
                    $upload = $filelama;
                }
            }


            redirect('Siswa/' . $slide);
        } else {
            redirect('Auth/backLogin');
        }
    }

    public function profile(){

         if ($this->session->userdata('email') != '') {
            $data['title'] = "Profile";
            $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('backend/siswa/header', $data);
            $this->load->view('backend/siswa/sidebar', $data);
            $this->load->view('backend/siswa/profile', $data);
            $this->load->view('backend/siswa/footer');

        } else {
            redirect('Auth/backLogin');
        }

    }
}
