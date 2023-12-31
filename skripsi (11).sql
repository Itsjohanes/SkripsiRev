-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2023 at 09:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `email`, `nama`, `password`, `role`) VALUES
(1, 'johanesalex774@gmail.com', 'Johannes Alexander Putra', '$2y$10$iWREPkkavBeyov1YIwiQluRgpMQPgQChxnWdvrEhVLpWUBQGJVgRm', 1),
(2, 'johannes@upi.edu', 'Doni', '$2y$10$XdQ8opCY.6gbke5wfwJXGOdSXP3wds1Fz9kAimgSfQ1RtUE1kga7u', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_attempttest`
--

CREATE TABLE `tb_attempttest` (
  `id_attempt` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_test` int NOT NULL,
  `masuk` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_attempttest`
--

INSERT INTO `tb_attempttest` (`id_attempt`, `id_siswa`, `id_test`, `masuk`) VALUES
(1, 2, 2, '2023-12-30 22:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id_comment` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `id_user` int NOT NULL,
  `comment` text NOT NULL,
  `parent_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_globalchat`
--

CREATE TABLE `tb_globalchat` (
  `id_globalchat` int NOT NULL,
  `sender_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_groupchat`
--

CREATE TABLE `tb_groupchat` (
  `id_groupchat` int NOT NULL,
  `sender_id` int NOT NULL,
  `message` text NOT NULL,
  `kelompok` int NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilapersepsi`
--

CREATE TABLE `tb_hasilapersepsi` (
  `id_hasilapersepsi` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `jawaban` text NOT NULL,
  `orientasi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilprepost`
--

CREATE TABLE `tb_hasilprepost` (
  `id_hasiltest` int NOT NULL,
  `id_siswa` int NOT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `memahami_masalah` int NOT NULL,
  `merencanakan_pemecahan_masalah` int NOT NULL,
  `melaksanakan_pemecahan_masalah` int NOT NULL,
  `memeriksa_kembali` int NOT NULL,
  `score` int NOT NULL,
  `benar` int NOT NULL,
  `salah` int NOT NULL,
  `kosong` int NOT NULL,
  `id_test` int NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_hasilprepost`
--

INSERT INTO `tb_hasilprepost` (`id_hasiltest`, `id_siswa`, `jawaban`, `memahami_masalah`, `merencanakan_pemecahan_masalah`, `melaksanakan_pemecahan_masalah`, `memeriksa_kembali`, `score`, `benar`, `salah`, `kosong`, `id_test`, `created_at`) VALUES
(1, 2, 'ABAABAEABAACEBACABBCABBABAABBA', 88, 100, 100, 100, 97, 29, 1, 0, 2, '2023-12-30 23:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilquiz`
--

CREATE TABLE `tb_hasilquiz` (
  `id_hasilquiz` int NOT NULL,
  `id_siswa` int NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `benar` int NOT NULL,
  `salah` int NOT NULL,
  `nilai` int NOT NULL,
  `memahami_masalah` int NOT NULL,
  `merencanakan_pemecahan_masalah` int NOT NULL,
  `melaksanakan_pemecahan_masalah` int NOT NULL,
  `memeriksa_kembali` int NOT NULL,
  `kosong` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilrefleksi`
--

CREATE TABLE `tb_hasilrefleksi` (
  `id_refleksi` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `seberapa_paham` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `seberapa_baik` text NOT NULL,
  `seberapa_sulit` text NOT NULL,
  `seberapa_cukup` text NOT NULL,
  `penghambat` text NOT NULL,
  `saran` text NOT NULL,
  `komentar` text NOT NULL,
  `id_siswa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasiltugas`
--

CREATE TABLE `tb_hasiltugas` (
  `id_hasiltugas` int NOT NULL,
  `nilai` int DEFAULT NULL,
  `id_pertemuan` int NOT NULL,
  `id_siswa` int NOT NULL,
  `komentar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `penilaian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `penilaian_sikap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nilai_sikap` int DEFAULT NULL,
  `text` text NOT NULL,
  `upload` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `scored_at` timestamp NULL DEFAULT NULL,
  `memahami_masalah` int DEFAULT NULL,
  `merencanakan_pemecahan_masalah` int DEFAULT NULL,
  `melaksanakan_pemecahan_masalah` int DEFAULT NULL,
  `memeriksa_kembali` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `materi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `id_pertemuan`, `materi`) VALUES
(16, 1, 'Pertemuan1_PercabanganTunggal.pdf'),
(18, 2, 'Pertemuan2_Pecabangan2.pdf'),
(19, 3, 'Pertemuan3_PerulanganI.pdf'),
(20, 4, 'Pertemuan4_PerulanganII.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int NOT NULL,
  `id_siswa` int NOT NULL,
  `pretest` int DEFAULT NULL,
  `posttest` int DEFAULT NULL,
  `tugas_1` int DEFAULT NULL,
  `tugas_2` int DEFAULT NULL,
  `tugas_3` int DEFAULT NULL,
  `tugas_4` int DEFAULT NULL,
  `quiz_1` int DEFAULT NULL,
  `quiz_2` int DEFAULT NULL,
  `quiz_3` int DEFAULT NULL,
  `quiz_4` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_siswa`, `pretest`, `posttest`, `tugas_1`, `tugas_2`, `tugas_3`, `tugas_4`, `quiz_1`, `quiz_2`, `quiz_3`, `quiz_4`) VALUES
(10, 2, NULL, 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertemuan`
--

CREATE TABLE `tb_pertemuan` (
  `id_pertemuan` int NOT NULL,
  `pertemuan` int NOT NULL,
  `penjelasan` text NOT NULL,
  `aktif` int NOT NULL,
  `tp` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `apersepsi` text NOT NULL,
  `dateline_tgs` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pertemuan`
--

INSERT INTO `tb_pertemuan` (`id_pertemuan`, `pertemuan`, `penjelasan`, `aktif`, `tp`, `gambar`, `apersepsi`, `dateline_tgs`) VALUES
(1, 1, 'Pada pertemuan pertama kita akan membahas jenis-jenis percabangan dan percabangan tunggal', 1, 'Siswa mampu menentukan solusi permasalahan dengan percabangan tunggal, Siswa mampu menerapkan percabangan satu kasus untuk menyelesaikan permasalahan, Siswa mampu memanipulasi percabangan satu kasus untuk menyelesaikan permasalahan \n', 'percabangantunggal.png', 'Apakah Anda pernah mendengar mengenai percabangan tunggal dan apa itu percabangan dan bagaimana percabangan tunggal menurut anda?', '2023-09-23 07:10:00'),
(2, 2, 'Pada pertemuan kedua kita akan membahas percabangan dua kasus, tiga kasus atau lebih, dan switch', 1, 'Siswa mampu menentukan solusi permasalahan dengan percabangan dua kasus, Siswa mampu menerapkan percabangan dua kasus untuk menyelesaikan permasalahan, Siswa mampu memanipulasi percabangan dua kasus untuk menyelesaikan permasalahan, Siswa mampu menentukan solusi permasalahan dengan percabangan  tiga kasus/lebih, Siswa mampu menerapkan percabangan tiga kasus / lebih untuk menyelesaikan permasalahan, Siswa mampu memanipulasi percabangan tiga kasus / lebih untuk menyelesaikan permasalahan, Siswa mampu menentukan solusi permasalahan dengan percabangan switch, Siswa mampu menerapkan switch , Siswa mampu memanipulasi percabangan switch untuk menyelesaikan permasalahan', 'percabanganduakasus.png', 'Apakah Anda pernah mendengar percabangan dua kasus, tiga kasus, dan switch, jika pernah bagaimana perbedaannya?', '2023-08-30 14:23:25'),
(3, 3, 'Pada pertemuan ketiga kita akan membahas jenis-jenis perulangan dan perulangan for', 0, 'Siswa mampu menentukan solusi permasalahan dengan perulangan for,  Siswa mampu menerapkan perulangan for untuk menyelesaikan permasalahan, Siswa mampu memanipulasi perulangan for untuk menyelesaikan permasalahan, Siswa mampu menentukan solusi permasalahan dengan perulangan while, Siswa mampu menerapkan perulangan while untuk menyelesaikan permasalahan, Siswa mampu memanipulasi perulangan while untuk menyelesaikan permasalahan', 'perulanganwhile.png', 'Apakah anda pernah mendengar perulangan for dan while, jika pernah kira-kira bagaimana perbedaannya?', '2023-08-31 14:24:02'),
(4, 4, 'Pada pertemuan keempat kita akan mempelajari perulangan while dan perulangan do while', 1, 'Siswa mampu menentukan solusi permasalahan dengan perulangan do while, Siswa mampu menerapkan perulangan do while untuk menyelesaikan permasalahan, Siswa mampu memanipulasi perulangan do while untuk menyelesaikan permasalahan', 'perulangandowhile.png', 'Apakah anda pernah mendengar perulangan do while, jika pernah kira-kira bagaimana perbedaan dengan perulangan sebelum-sebelumnya?', '2023-11-30 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int NOT NULL,
  `id_pengirim` int NOT NULL,
  `id_lawan` int NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prepost`
--

CREATE TABLE `tb_prepost` (
  `id_soal` int NOT NULL,
  `soal` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `opsi_e` varchar(255) NOT NULL,
  `kunci` varchar(255) NOT NULL,
  `id_test` int NOT NULL,
  `id_ps` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_prepost`
--

INSERT INTO `tb_prepost` (`id_soal`, `soal`, `gambar`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `kunci`, `id_test`, `id_ps`) VALUES
(1, 'Andi ingin membuat program dalam bahasa C++ yang meminta pengguna memasukkan angka-angka positif. Program akan terus meminta input angka dari pengguna hingga pengguna memasukkan angka negatif. Jika angka yang dimasukkan adalah bilangan ganjil, program akan mencetak \"Ganjil\" .Perulangan minimal dilakukan satu kali. Apa data yang diketahui dan apakah data yang diberikan sudah cukup untuk menentukan bahwa perulangan yang digunakan adalah do while?', '', ' Perulangan minimal dilakukan satu kali dan cukup ', ' Perulangan berhenti ketika dimasukan angka negatif dan kontradiktif ', ' Perulangan minimal dilakukan satu kali dan dan belum cukup ', 'Perulangan berhenti ketika dimasukan angka negatif dan berlebihan ', 'Tidak ada konteks yang jelas', 'A', 1, 1),
(2, 'Evan ingin membuat program untuk memeriksa apakah sebuah bilangan itu ganjil atau genap. Jika bilangannya ganjil program akan mencetak bilangan/5 sedangkan jika genap program akan mencetak bilangan / 2. Apa yang perlu dilengkapi dari code di bawah ini jika bilangan awal adalah 10?', '2_soal.PNG', 'Pada kondisi if tambahkan a % 2 == 0 pada kode c++ dan a mod 2  = 0 pada Scratch', 'Pada kondisi if tambahkan a % 2 != 0 pada kode c++ dan not a mod 2  = 0 pada Scratch', 'Pada kondisi if tambahkan a % 2 == 0 pada kode c++ dan a mod 2  = 0 pada Scratch dan tambahkan kondisi else berupa cout<<a/5 pada C++ dan say a/5', 'Pada kondisi if tambahkan a % 2 != 0 pada kode c++ dan not a mod 2  = 0 pada Scratch dan tambahkan kondisi else berupa cout<<a/5 pada C++ dan say a/5', 'Kode tidak perlu ditambahkan', 'C', 1, 4),
(3, 'Anda ingin membuat program yang meminta pengguna untuk menginputkan bilangan-bilangan positif dan bilangan nol hingga pengguna memasukkan bilangan negatif. Progam tersebut akan melakukan pengecekan di awal. Jika dimasukan bilangan negatif di awal maka blok perulangan tidak dikerjakan. Program akan mencetak jumlah dari bilangan-bilangan tersebut jika diberikan flowchart sebagai berikut.', '3_soal.PNG', '3_a.PNG', '3_b.PNG', '3_c.PNG', '3_d.PNG', '3_e.PNG', 'A', 1, 3),
(4, 'Andre ingin membuat sebuah program untuk percabangan tunggal untuk memeriksa apakah suatu bilangan a itu habis dibagi b atau tidak, bagaimana agar kode ini dapat berjalan sesuai dengan apa yang andra mau dengan melengkapi kode yang hilang?', '4_soal.PNG', 'Pada code C++ lengkapi kondisi percabangan a % b != 0 dan pada Scratch not a mod b = 0', 'Pada code C++ lengkapi kondisi percabangan a % b == 0 dan pada Scratch a mod b = 0', 'Pada code C++ lengkapi kondisi percabangan b % a != 0 dan pada Scratch not b mod a= 0', 'Pada code C++ lengkapi kondisi percabangan b % a == 0 dan pada Scratch b mod a = 0', 'Pada code C++ lengkapi kondisi percabangan umur a % b == 0 dan pada Scratch a mod b = 0 dan buatkan kondisi else nya pada c++ tambahkan cout<<”a tidak habis dibagi b” dan pada Scratch tambahkan say a tidak habis dibagi b', 'B', 1, 4),
(5, 'Rahma ingin membuat program dalam bahasa C++ yang menghitung total belanja saat berbelanja online. Program tersebut akan terus mengulang minimal satu kali hingga pengguna memasukkan angka nol sebagai tanda akhir pembelian. Pengecekan perulangan dilakukan di awal sebelum masuk ke blok perulangan. Apa data yang diketahui dan apakah data ini sudah cukup bagi Rahma untuk menentukan bahwa bahwa perulangan yang digunakan adalah do while?', '', ' Perulangan minimal dilakukan satu kali dan kontradiktif ', ' Perulangan berhenti ketika dimasukan angka nol dan dan belum cukup ', ' Perulangan minimal dilakukan satu kali dan Dan berlebihan ', 'Tidak ada konteks yang jelas', 'Perulangan minimal dilakukan satu kali dan cukup', 'A', 1, 1),
(6, 'Seorang guru akan memberikan nilai berdasarkan performa siswa dalam ujian. Jika nilai lebih besar atau sama dengan 90, maka siswa tersebut akan mendapatkan nilai A. Jika nilai 70 hingga 89, dia akan mendapatkan nilai B. Jika nilai kurang dari 70, dia akan mendapatkan nilai C. Bagaimana potongan kode C++ yang paling tepat untuk kasus ini jika flowchart diagramnya sebagai berikut?', '6_soal.PNG', '6_a.PNG', '6_b.PNG', '6_c.PNG', '6_d.PNG', '6_e.PNG', 'A', 1, 3),
(7, 'Doni sedang berpikir untuk mencetak angka dari 1 sampai 5 kira-kira apa yang perlu diubah dalam code ini. Bantulah Doni untuk memilih perubahan yang paling efektif?', '7_soal.PNG', 'Tambahkan for(int i = 1; i<6;i++)', 'Tambahkan for (int i = 1; i<5;i++)', 'Tambahkan kondisi while(i<6)', ' Tambahkan kondisi while(i<6) dan inisialisasi variable int i = 1', 'Tambahkan kondisi while(i<6), inisialisasi variable int i = 1 dan increment i++', 'A', 1, 4),
(8, 'Seorang pelanggan restoran memesan makanan. Jika pelanggan memesan \"Mie Goreng,\" maka harga makanan yang dipesan didiskon 2500 rupiah. Namun, jika pelanggan tidak memesan \"Mie Goreng,\" maka harga makanan tidak akan didiskon (dikurangi 0 rupiah tetap ditulis). Jenis percabangan yang digunakan dalam situasi ini jika menggunakan bahasa pemrograman C++ maupun Scratch dan Bagaimana gambaran flowchartnya? ', '', '8_a.PNG', '8_b.PNG', '8_c.PNG', '8_d.PNG', '8_e.PNG', 'D', 1, 2),
(9, 'Andi ingin membuat program yang mencetak bilangan bulat dari 1 hingga 10. Apa perulangan yang paling sesuai dan bagaimana gambaran flowchart yang paling sesuai dengan kasus ini jika bahasa pemrograman yang nanti digunakan adalah C++?', '', '9_a.PNG', '9_b.PNG', '9_c.PNG', '9_d.PNG', '9_e.PNG', 'A', 1, 2),
(10, 'Seorang kandidat ingin diterima di sebuah perusahaan. Jika kandidat tersebut memiliki pengalaman kerja minimal selama dua tahun, maka program akan mengeluarkan output \"Anda diterima\". Bagaimana potongan code pada C++ dan Scratch jika flowchartnya sebagai berikut?', '10_soal.PNG', '10_a.PNG', '10_b.PNG', '10_c.PNG', '10_d.PNG', '10_e.PNG', 'B', 1, 3),
(11, 'Anda ingin membuat program do while  yang menghitung jumlah semua bilangan genap dari 1 hingga N. Blok perulangan minimal mengulang satu kali  Pilihlah struktur perulangan yang paling tepat jika diberikan flowchart sebagai berikut.', '11_soal.PNG', '11_a.PNG', '11_b.PNG', '11_c.PNG', '11_d.PNG', '11_e.PNG', 'A', 1, 3),
(12, 'Seorang pelanggan restoran ingin menentukan menu makan malam yang akan dipesan berdasarkan kode pada menu. Jika kode adalah A, pelanggan akan memesan \"Nasi Goreng.\" Jika kode adalah B, pelanggan akan memesan \"Steak.\" Jika kode adalah C, pelanggan akan memesan \"Sushi.\" Jika kode yang dimasukan tidak sesuai maka menampilkan “Kode yang dimasukan tidak sesuai” Apa percabangan yang paling sesuai dan hemat code (tidak banyak menuliskan variable yang sama berulang kali dan meringkas code yang menumpuk)  dan Bagaimana flowchartnya? (Asumsi dalam bahasa C++)', '', '12_a.PNG', '12_b.PNG', '12_c.PNG', '12_d.PNG', '12_e.PNG', 'A', 1, 2),
(13, 'Seorang guru ingin menentukan siswa mana yang memiliki nilai tertinggi dalam sebuah kelas. Guru tersebut mengetahui bahwa terdapat empat siswa yang bernama M, N, O, dan P. Guru tersebut juga mengetahui bahwa nilai siswa M adalah 78, siswa N adalah 92, siswa O adalah 86, dan siswa P adalah 90. Apa data yang diketahui dan apakah data yang diberikan sudah cukup untuk menentukan jenis percabangan yang digunakan adalah percabangan tiga kasus atau lebih dipilih jika menggunakan bahasa C++?', '', ' Diketahui data nilai siswa salah satunya adalah siswa M dengan nilai 78 dan cukup ', ' Diketahui data nilai siswa salah satunya adalah siswa N dengan nilai 92 kontradiktif  ', ' Diketahui data nilai siswa salah satunya adalah siswa M dengan nilai 78 dan berlebihan  ', 'Diketahui data nilai siswa dua diantaranya  adalah siswa N dengan nilai 92 &amp; siswa P dengan nilai 90 dan tidak cukup ', 'Tidak ada konteks yang jelas', 'A', 1, 1),
(14, 'Sebuah program akan menentukan jenis buah berdasarkan kode buah yang diberikan pengguna. Pengguna akan memasukkan kode buah (A untuk \"Apel\", B untuk \"Belimbing\", J untuk \"Jeruk\", kode lainnya untuk “Tidak diketahui”). Bagaimana potongan kode C++ yang sesuai dengan penggunaan switch untuk menentukan jenis buah berdasarkan kode yang dimasukkan pengguna jika diberikan flowchart sebagai berikut?', '14_soal.PNG', '14_a.PNG', '14_b.PNG', '14_c.PNG', '14_d.PNG', '14_e.PNG', 'A', 1, 3),
(15, 'Seorang karyawan ingin mengajukan cuti. Jika karyawan tersebut memiliki sisa cuti lebih dari atau sama dengan 10 hari, maka permohonan cuti akan disetujui. Tidak ada aksi lainnya. Apa percabangan yang sesuai dan bagaimana potongan flowchart jika nanti program yang dibuat dalam bahasa C++/Scratch?', '', '15_a.PNG', '15_b.PNG', '15_c.PNG', '15_d.PNG', '15_e.PNG', 'A', 1, 2),
(16, 'Sebuah Program ditujukan untuk menentukan apakah seseorang itu remaja, dewasa, atau lansia, Jika umur seseorang kurang dari 18 tahun maka dia adalah remaja jika umur seseorang 18 tahun sampai 59 tahun maka ia adalah dewasa dan jika lebih dari 59 maka seseorang lansia. Bagaimana dan apa yang harus dilengkapi  agar code program berjalan sesuai dengan yang diinginkan dan code yang dipilih juga harus yang paling hemat penulisannya?', '16_soal.PNG', 'Pada kondisi else pertama tambahkan if(usia >=18 && usia < 60)', 'Pada kondisi else pertama tambahkan if(usia >=18 && usia < 60) dan tambahkan pada else kedua if(usia >= 60)', 'Pada kondisi else pertama tambahkan if(usia < 60)', 'Pada kondisi else pertama tambahkan if(usia < 60) dan tambahkan pada else kedua if(usia >= 60)', 'Tambahkan pada else kedua if(usia >= 60)', 'C', 1, 4),
(17, 'Seorang siswa ingin mendaftar kuliah. Jika siswa tersebut memiliki nilai tes TOEFL lebih dari atau sama dengan 550 maka siswa tersebut dapat mendaftar ke program studi internasional. Tidak ada aksi lainnya. Apa percabangan yang sesuai dan bagaimana potongan flowchart jika nanti program yang dibuat dalam bahasa C++/Scratch?', '', '17_a.PNG', '17_b.PNG', '17_c.PNG', '17_d.PNG', '17_e.PNG', 'B', 1, 2),
(18, 'Seorang siswa ingin membuat program yang menentukan makanan yang akan dia makan berdasarkan kondisi cuaca. Jika cuaca adalah cerah, dia akan makan salad. Apa data yang diketahui dan apakah data yang sudah diberikan sudah cukup untuk membuat program untuk menggambarkan bahwa percabangan yang digunakan adalah percabangan dua kasus jika menggunakan bahasa pemrograman C++ maupun Scratch? ', '', 'Jika cerah maka makan salad dan sudah cukup', 'Jika cerah maka makan salad dan belum cukup', 'Jika cerah maka makan salad dan kontradiktif', 'Jika cerah maka makan salad dan berlebihan', 'Tidak ada konteks yang jelas', 'B', 1, 1),
(19, 'Miftah ingin membuat suatu aplikasi dalam bahasa C++/Scratch yang menerapkan prinsip perulangan yang diketahui batas awalnya. Apa data yang diketahui dan apakah data ini sudah cukup untuk miftah menentukan bahwa perulangan while yang dibutuhkan?', '', ' Batas awal diketahui dan cukup ', ' Batas akhir diketahui dan kontradiktif ', ' Batas awal diketahui dan belum cukup ', 'Batas akhir diketahui dan berlebihan ', 'Tidak ada konteks yang jelas', 'C', 1, 1),
(20, 'Seorang programmer ingin membuat program dalam bahasa C++  yang akan mencetak angka-angka dari 1 hingga 10. Program tersebut akan menggunakan perulangan untuk mencetak angka-angka tersebut. Apa data yang diketahui dan apakah data ini sudah cukup bagi programmer untuk menentukan bahwa perulangan for adalah yang paling tepat? ', '', ' Perulangan mencetak 1 sampai 10 dan cukup ', ' Perulangan mencetak 1 sampai 10 dan kontradiktif  ', ' Perulangan mencetak 1 sampai 10 dan belum cukup  ', 'Perulangan mencetak 1 sampai 10 dan berlebihan ', 'Tidak ada konteks yang jelas', 'A', 1, 1),
(21, 'Seorang kandidat ingin diterima di sebuah perusahaan. Syarat yang harus dipenuhi adalah memiliki ijazah sarjana atau setidaknya dua tahun pengalaman kerja. Jika syarat ini terpenuhi, maka program akan mengeluarkan output \"Anda diterima.\" Jika syarat tidak terpenuhi, program akan mengeluarkan output \"Maaf, Anda tidak memenuhi syarat.\" Bagaimana potongan kode C++ dan Scratch yang paling tepat untuk kasus ini jika diketahui flowchart diagramnya adalah sebagai berikut?', '21_soal.PNG', '21_a.PNG', '21_b.PNG', '21_c.PNG', '21_d.PNG', '21_e.PNG', 'E', 1, 3),
(22, 'Rani ingin membuat program dalam bahasa C++ yang akan meminta pengguna memasukkan angka-angka positif dan angka nol. Program akan terus meminta input angka dari pengguna hingga pengguna memasukkan angka negatif. Jika angka yang dimasukkan adalah bilangan genap, program akan mencetak \"Genap.\" Perulangan minimal dilakukan satu kali. Jenis perulangan apa yang paling cocok untuk digunakan dalam kasus ini?', '', '22_a.PNG', '22_b.PNG', '22_c.PNG', '22_d.PNG', '22_e.PNG', 'A', 1, 2),
(23, 'Seorang pengguna aplikasi streaming ingin menonton film. Ada tiga film yang tersedia. Jika ada harga sewa yang sama jadikan salah satu sebagai patokan. Bagaimana potongan flowchart jika nanti menggunakan bahasa C++  untuk mencari aplikasi yang paling murah?', '', '23_a.PNG', '23_b.PNG', '23_c.PNG', '23_d.PNG', '23_e.PNG', 'A', 1, 2),
(24, 'Buatlah program dalam C++ yang menggunakan perulangan for untuk mencetak deret bilangan dari 10 hingga 50 dengan increment 2 Jika diberikan flowchart sebagai berikut.', '24_soal.PNG', '24_a.PNG', '24_b.PNG', '24_c.PNG', '24_d.PNG', '24_e.PNG', 'A', 1, 3),
(25, 'Seorang siswa ingin lulus ujian matematika. Jika siswa tersebut mendapat nilai minimal 70 maka output program adalah “Anda lulus”.  Jika nilainya dibawah 70 maka output program “Anda tidak lulus”. Apa data yang diketahui yang berhubungan dengan percabangan dan apakah kondisi tersebut sudah dapat untuk menentukan bahwa percabangan yang digunakan adalah percabangan tunggal jika menggunakan bahasa pemrograman C++ maupun Scratch?', '', 'Jika mencapai nilai minimal 70 program dijalankan dan cukup', 'Jika mencapai nilai 70 program dijalankan dan kontradiktif', 'Jika mencapai nilai minimal 70 program dijalankan dan berlebihan', 'Jika mencapai nilai 70 program dijalankan dan tidak cukup', 'Tidak ada konteks yang jelas', 'C', 1, 1),
(26, 'Doni ingin membuat sebuah perulangan dengan pengecekan dilakukan diawal. Jika pengguna memasukan angka 999 di awal maka perulangan tidak dilakukan. Jika perulangan dilakukan maka akan diminta menginputkan angka lainnya hingga pada akhirnya mengeluarkan output total semua angka.', '26_soal.PNG', 'Tambahkan kondisi while pada code c++ dengan while(angka!=999) dan pada Scratch tambahkan repeat untuk angka = 999. Buatkan kode input untuk angka', 'Tambahkan kondisi do while (angka != 999)', 'Tambahkan kondisi do while (angka == 999)', 'Tambahkan kondisi while pada code c++ dengan while(angka!= 100) dan pada Scratch tambahkan repeat until angka = 100', 'Tambahkan kondisi while pada code c++ dengan while(angka==999) dan pada Scratch tambahkan repeat until  angka = 999. Buatkan kode input untuk angka\n\n', 'A', 1, 4),
(27, 'Hafil adalah seorang pencinta anime. Suatu ketika hafil hendak menentukan pilihan anime yang akan ditontonnya jika ditentukan bahwa hari senin adalah 1, selasa adalah 2, rabu adalah 3 , dan seterusnya. Jika memasukan angka yang tidak valid maka menghasilkan output tidak valid. Apa data yang diketahui dan apakah data tersebut sudah cukup untuk menentukan bahwa percabangan yang paling tepat adalah switch? (Asumsinya kode ditulis dalam bahasa C++)', '', 'Diketahui bahwa dalam menentukan anime yang ditontonnya hafil menentukan berdasarkan hari, hari senin memiliki kode 1 dan hari selasa memiliki kode 2  dan sudah cukup', 'Diketahui bahwa dalam menentukan anime yang ditontonnya hafil menentukan berdasarkan hari, hari senin memiliki kode 1 dan hari selasa memiliki kode 2 dan belum cukup', 'Diketahui bahwa dalam menentukan anime yang ditontonnya hafil menentukan berdasarkan hari, hari senin memiliki kode 1 dan hari selasa memiliki kode 3 dan kontradiktif', 'Diketahui bahwa dalam menentukan anime yang ditontonnya hafil menentukan berdasarkan hari, hari senin memiliki kode 1 dan hari selasa memiliki kode 3 dan berlebihan', 'Tidak ada konteks yang jelas', 'A', 1, 1),
(28, 'Aji ingin membuat program dalam bahasa C++ yang akan meminta pengguna untuk memasukkan bilangan bulat positif. Program akan terus meminta input bilangan dari pengguna hingga pengguna memasukkan bilangan nol. Asumsinya input pertama di luar blok perulangan dan pengecekan di awal. Kira-kira apa perulangan yang  paling sesuai dan  bagaimana gambaran flowchartnya?', '', '28_a.PNG', '28_b.PNG', '28_c.PNG', '28_d.PNG', '28_e.PNG', 'A', 1, 2),
(29, 'Stefen sedang mempelajari pemrograman, Pada suatu ketika stefen sedang mempelajari materi switch, Stefen membuat program jika angka yang dideklarasikan stefen bernilai 1 maka keluarnya adalah SatuDua, perhatikan dua kode tersebut. pa yang harus stefen lakukan agar jika pilihan bernilai 1 maka menghasilkan output SatuDua ?', '29_soal.PNG', 'Pada code pertama hapus break sebelum case 2 agar blok program yang dikerjakan selesai pada case 2 jika memasukan angka 1', 'Pada code kedua hapus break sebelum case 3 agar blok program yang dikerjakan selesai pada case 3 jika memasukan angka 1', 'Pada code pertama hapus break sebelum case 2 dan pada code kedua tambahkan break sebelum  case 3 agar blok program yang dikerjakan selesai pada case 2 jika memasukan angka 1', 'Hapus code default karena tidak diperlukan', 'Pada code kedua tambahkan break sebelum code ketiga agar blok program yang dikerjakan selesai pada case 2 jika memasukan angka 1', 'C', 1, 4),
(30, 'Doni ingin membuat suatu program untuk mengecek apakah suatu bilangan itu bilangan ganjil atau genap. Doni menginginkan program mengulang minimal satu kali dan berhenti jika inputan bernilai 0, namun nyatanya program telah selesai ketika Doni mengisikan angka 0 program tidak mengulang. Bagaimana caranya untuk memperbaiki code Doni?', '30_soal.PNG', 'Ubah perulangan while menjadi do while dan tambahkan kondisi else pada if “Bilangan ganjil”', 'Ubah perulangan while menjadi do while dan tambahkan kondisi else pada if cout<<“Bilangan ganjil” dan ubah juga aksi pada if cout<<”Bilangan genap”', 'Tambahkan kondisi else pada if cout<<“Bilangan ganjil” dan ubah juga aksi pada if cout<<”Bilangan genap”', 'Tambahkan kondisi else pada if cout<<“Bilangan ganjil”', 'Ubah juga aksi pada if cout<<”Bilangan genap”', 'B', 1, 4),
(31, 'Andi ingin membuat program dalam bahasa C++ yang meminta pengguna memasukkan angka-angka positif. Program akan terus meminta input angka dari pengguna hingga pengguna memasukkan angka negatif. Jika angka yang dimasukkan adalah bilangan ganjil, program akan mencetak \"Ganjil\" .Perulangan minimal dilakukan satu kali. Apa data yang diketahui dan apakah data yang diberikan sudah cukup untuk menentukan bahwa perulangan yang digunakan adalah do while?', '', ' Perulangan minimal dilakukan satu kali dan cukup ', ' Perulangan berhenti ketika dimasukan angka negatif dan kontradiktif ', ' Perulangan minimal dilakukan satu kali dan dan belum cukup ', 'Perulangan berhenti ketika dimasukan angka negatif dan berlebihan', 'Perulangan berhenti ketika dimasukan angka negatif dan berlebihan', 'A', 2, 1),
(32, 'Anton ingin membuat suatu aplikasi yang bertujuan untuk menentukan seseorang itu lansia atau bukan. Jika umur seseorang lebih dari 60 tahun atau 60 tahun seseorang itu Lansia dan jika tidak maka belum lansia. Bagaimana caranya agar program berjalan sesuai yang Anton mau dan code yang dipilih haruslah lebih hemat dalam penulisannya?', '2_soal.PNG', 'Lengkapi kondisi percabangan pada bagian if dengan usia>60\n\n\n', 'Lengkapi kondisi percabangan pada bagian if dengan usia>=60', 'Lengkapi kondisi percabangan pada bagian if dengan usia != 60', 'Lengkapi kondisi percabangan pada bagian if dengan usia>=60 dan lengkapi kondisi elsenya dengan else if(usia <60)', 'Lengkapi kondisi percabangan pada bagian if dengan usia>60 dan lengkapi kondisi elsenya dengan else if(usia <=60)', 'B', 2, 4),
(33, 'Anda ingin membuat program yang meminta pengguna untuk menginputkan bilangan-bilangan hingga pengguna memasukkan bilangan 999. Program akan mencetak jumlah dari bilangan-bilangan tersebut. Pengecekan dilakukan di awal. Jika 999 dimasukan di awal maka blok perulangan tidak dikerjakan dan diberikan flowchart sebagai berikut.', '3_soal.PNG', '3_a.PNG', '3_b.PNG', '3_c.PNG', '3_d.PNG', '3_e.PNG', 'A', 2, 3),
(34, 'Andra ingin membuat sebuah program untuk percabangan tunggal untuk memeriksa apakah suatu bilangan itu genap atau tidak, bagaimana agar kode ini dapat berjalan sesuai dengan apa yang andra mau dengan melengkapi kode yang hilang?', '4_soal.PNG', 'Pada code C++ lengkapi kondisi percabangan umur % 2 == 0 dan pada Scratch umur mod 2 = 0', 'Pada code C++ lengkapi kondisi percabangan umur % 2 != 0 dan pada Scratch not umur mod 2 = 0', 'Pada code C++ lengkapi kondisi percabangan umur % 4 != 0 dan pada Scratch not umur mod 4 = 0', 'Pada code C++ lengkapi kondisi percabangan umur % 4 == 0 dan pada Scratch umur mod 4 = 0', 'Pada code C++ lengkapi kondisi percabangan umur % 2 == 0 dan pada Scratch umur mod 2 = 0 dan buatkan kondisi else nya pada c++ tambahkan cout<<”ganjil” dan pada Scratch tambahkan say “genap”', 'A', 2, 4),
(35, 'Arif ingin membuat program dalam bahasa C++ yang mencetak \"Selamat Datang!\" selama pengguna memasukkan huruf \"Y\" sebagai konfirmasi. Pengecekan perulangan dilakukan diawal sebelum masuk blok perulangan dan jika pengguna memasukkan huruf \"N\" dan perulangan dilakukan minimal satu kali  maka program berhenti dan apakah informasi ini sudah cukup bagi Arif untuk menentukan bahwa perulangan yang diperlukan adalah perulangan do-while? ', '', 'Pengecekan dilakukan di awal dan cukup', 'Pengecekan dilakukan di awal dan kontradiktif', 'Pengecekan dilakukan di awal dan dan belum cukup', 'Pengecekan dilakukan di awal dan Dan berlebihan	', 'Tidak ada konteks yang jelas', 'B', 2, 1),
(36, 'Seorang siswa akan menerima penghargaan akademis berdasarkan rata-rata nilai mata pelajaran. Jika rata-rata nilai lebih besar atau sama dengan 90, dia akan mendapatkan penghargaan emas. Jika rata-rata nilai antara 80 hingga 89, dia akan mendapatkan penghargaan perak. Jika rata-rata nilai kurang dari 80, dia tidak akan mendapatkan penghargaan. Bagaimana potongan kode C++ yang paling tepat untuk kasus ini Jika flowchart diagram sebagai berikut?', '6_soal.PNG', '6_a.PNG', '6_b.PNG', '6_c.PNG', '6_d.PNG', '6_e.PNG', 'A', 2, 3),
(37, 'Sani sedang berpikir untuk membuat program perulangan bilangan dari 10 sampai 1 dengan jarak 2. Kira-kira apa yang harus dilakukan oleh Sani untuk membuat program tersebut?', '7_soal.PNG', 'Tambahkan inisialisasi variable i = 10, while(i>=1) , decrement i = i-=2', 'Tambahkan while(i>=1) dan hapus for', 'Tambahkan inisialisasi variable i = 10 , while(i>=1) dan hapus for ', 'Tambahkan inisialisasi variable i = 10, while(i<=1) , decrement i = i-=2', 'Tambahkan for(int i = 10; i>=1;i-=2)', 'E', 2, 4),
(38, 'Seorang pengemudi memasuki area parkir. Jika pengemudi memilih untuk parkir di zona \"Mobil Kecil\", maka biaya parkir akan menjadi 10.000 rupiah. Namun, jika pengemudi tidak memilih parkir di zona mobil kecil, maka biaya parkir akan menjadi 20.000 rupiah. Kira-kira percabangan apakah yang mirip dengan kasus tersebut jika menggunakan bahasa pemrograman C++ maupun Scratch?', '', '8_a.PNG', '8_b.PNG', '8_c.PNG', '8_d.PNG', '8_e.PNG', 'A', 2, 2),
(39, 'Budi ingin membuat program yang mencetak huruf alfabet dari A hingga Z Apa perulangan yang paling sesuai dan bagaimana gambaran flowchart yang paling sesuai dengan kasus ini jika bahasa pemrograman yang nanti digunakan adalah C++?', '', '9_a.PNG', '9_b.PNG', '9_c.PNG', '9_d.PNG', '9_e.PNG', 'B', 2, 2),
(40, 'Seorang pelamar pekerjaan harus memiliki setidaknya satu sertifikat keahlian untuk memenuhi syarat. Jika syarat ini terpenuhi, maka program akan mengeluarkan output \"Anda diterima\" .Bagaimana potongan code pada Scratch jika flowchartnya sebagai berikut?', '10_soal.PNG', '10_a.PNG', '10_b.PNG', '10_c.PNG', '10_d.PNG', '10_e.PNG', 'A', 2, 3),
(41, 'Anda ingin membuat program yang meminta pengguna untuk menginputkan kata-kata hingga pengguna memasukkan kata \"selesai.\" Blok perulangan minimal mengulang satu kali. Bagaimana kodenya perulangannya bila diberikan flowchart sebagai berikut?', '11_soal.PNG', '11_a.PNG', '11_b.PNG', '11_c.PNG', '11_d.PNG', '11_e.PNG', 'A', 2, 3),
(42, 'Seorang pengemudi taksi ingin menentukan tarif perjalanan berdasarkan zona tujuan penumpang. Jika zona adalah \"A,\" maka harga tarif perjalanan adalah 50.000 rupiah. Jika zona adalah \"B,\" maka harga tarif perjalanan adalah 75.000 rupiah. Jika zona adalah \"C,\" maka harga tarif perjalanan adalah 100.000 rupiah. Bagaimana Apa konsep yang sesuai, hemat code (tidak banyak mengulang penulisan variable yang sama dan meringkas kode yang bertumpuk-tumpuk) dan bagaimana gambaran flowchart dari masalah ini. (Asumsi dalam bahasa C++)', '', '12_a.PNG', '12_b.PNG', '12_c.PNG', '12_d.PNG', '12_e.PNG', 'C', 2, 2),
(43, 'Seorang koki ingin menentukan menu spesial yang akan disajikan di restorannya. Keputusan ini bergantung pada musim saat ini. Jika saat ini musim panas, dia akan menyajikan hidangan salad; jika saat ini musim gugur, dia akan menyajikan hidangan kari; jika saat ini musim dingin, dia akan menyajikan hidangan sup. Apa data yang diketahui dan apakah data yang diberikan sudah cukup untuk menentukan jenis percabangan tiga kasus atau lebih yang nanti akan dipilih jika menggunakan bahasa C++?', '', 'Tidak ada konteks yang jelas', ' Jika musim panas, makanan yang disajikan adalah sup dan kontradiktif  ', ' Jika musim dingin, makanan yang disajikan adalah sup dan berlebihan  ', 'Jika musim dingin, makanan yang disajikan adalah sup dan tidak cukup ', ' Jika musim panas, makanan yang disajikan adalah salad dan cukup ', 'E', 2, 1),
(44, 'Sebuah program akan menentukan arah mata angin berdasarkan kode arah yang diberikan pengguna. Pengguna akan memasukkan kode arah (U untuk \"Utara\", B untuk \"Barat\", S untuk \"Selatan\", kode lainnya untuk “Tidak diketahui”). Bagaimana potongan kode C++ yang sesuai dengan penggunaan switch untuk menentukan arah mata angin berdasarkan kode yang dimasukkan pengguna jika diberikan flowchart sebagai berikut?', '14_soal.PNG', '14_a.PNG', '14_b.PNG', '14_c.PNG', '14_d.PNG', '14_e.PNG', 'B', 2, 3),
(45, 'Seorang pengendara ingin memasuki tol. Jika pengendara tersebut memiliki kartu tol, maka dia dapat membayar tol dengan diskon dan tidak ada kondisi dan aksi alternatif. Jenis percabangan yang mirip jika menggunakan bahasa pemrograman C++ maupun Scratch?', '', '15_a.PNG', '15_b.PNG', '15_c.PNG', '15_d.PNG', '15_e.PNG', 'A', 2, 2),
(46, 'Sebuah program ditujukan untuk menentukan predikat nilai siswa. Jika nilai siswa mendapat 90 atau lebih maka nilai siswa adalah A. Jika nilai siswa 80-89 maka nilai siswa adalah B dan jika nilai siswa lebih kecil dari 80 maka nilai siswa adalah C. Apa yang harus diubah dari program dibawah ini, ubahlah dengan code yang paling efektif?', '16_soal.PNG', 'Pada else pertama tambahkan if(nilai>= 80)', 'Pada else pertama tambahkan if(nilai>80)', 'Pada else pertama tambahkan if(nilai>= 80) dan hapus kondisi else ketiga dan keempat', 'Pada else pertama tambahkan if(nilai>80) dan pada else kedua tambahkan if(nilai <80)', 'Pada else pertama tambahkan if(nilai>80) dan pada else kedua tambahkan if(nilai <80) dan hapus kondisi else ketiga dan keempat', 'C', 2, 4),
(47, 'Seorang siswa ingin membeli sebuah buku. Jika siswa tersebut memiliki uang minimal 50.000 rupiah, maka siswa dapat membeli buku yang diinginkan. Tidak ada aksi lainnya. Apa percabangan yang paling sesuai dan bagaimana potongan flowchart jika nanti program yang dibuat dalam bahasa C++/Scratch?', '', '17_a.PNG', '17_b.PNG', '17_c.PNG', '17_d.PNG', '17_e.PNG', 'A', 2, 2),
(48, 'Seorang guru ingin membuat program penilaian untuk siswanya. Jika siswa mendapatkan nilai 70 atau  di atas 70, mereka akan diberikan predikat \"Lulus\". Jika nilai siswa di bawah 70, mereka akan diberikan predikat \"Tidak Lulus\". Jika nilai siswa dibawah 60 maka akan diberi predikat “Siswa Pemalas” Apa data yang diketahui dan apakah data yang sudah diberikan sudah cukup untuk untuk menggambarkan bahwa percabangan dua kasus yang dipergunakan,  jika menggunakan bahasa pemrograman C++ maupun Scratch? ', '', 'Jika mendapat nilai minimal 70 maka lulus dan sudah cukup', 'Jika mendapat nilai minimal 70 maka lulus dan belum cukup ', 'Jika mendapat nilai maksimal 70 maka lulus dan kontradiktif', 'Jika mendapat nilai minimal 70 maka lulus dan berlebihan', 'Tidak ada konteks yang jelas', 'D', 2, 1),
(49, 'Rudi ingin membuat program dalam bahasa C++/Scratch untuk menghitung nilai rata-rata dari sejumlah angka yang dimasukkan pengguna. Rudi hanya mengetahui bahwa program tersebut akan mengulangi proses penginputan angka hanya jika pengguna menginginkan untuk memasukkan lebih banyak angka. Pengecekan input pertama dilakukan di awal dan perulangan minimal dilakukan satu kali. Apa data yang diketahui dan apakah data ini sudah cukup bagi Rudi untuk menentukan bahwa perulangan yang diperlukan adalah perulangan while ?', '', ' Perulangan minimal dilakukan satu kali dan cukup ', ' Perulangan minimal dilakukan satu kali Kontradiktif ', ' Perulangan minimal dilakukan satu kali dan belum cukup ', 'Perulangan minimal dilakukan satu kali dan belum cukup', 'Tidak ada konteks yang jelas', 'B', 2, 1),
(50, 'Elizabeth ingin membuat program dalam bahasa C++ yang melakukan penghitungan rata-rata dari sejumlah bilangan yang dimasukkan pengguna. Namun, Elizabeth hanya diketahui batas atas dari jumlah bilangan yang akan dimasukkan pengguna. Apa data yang diketahui dan apakah data ini sudah cukup bagi Elizabeth untuk menentukan bahwa jenis perulangan for merupakan perulangan yang dibutuhkan?', '', ' Elizabeth mengetahui batas bawah dari perulangan dan cukup  ', ' Elizabeth mengetahui batas bawah dari perulangan dan kontradiktif  ', ' Elizabeth mengetahui batas atas dari perulangan dan belum cukup  ', 'Elizabeth mengetahui batas bawah dari perulangan dan berlebihan ', 'Tidak ada konteks yang jelas', 'C', 2, 1),
(51, 'Seorang kandidat ingin diterima di sebuah perusahaan. Syarat yang harus dipenuhi adalah memiliki pengalaman kerja minimal lima tahun dan memiliki ijazah magister. Jika kedua syarat ini terpenuhi, maka program akan mengeluarkan output \"Anda diterima.\" Jika tidak terpenuhi, program akan mengeluarkan output \"Maaf, Anda tidak memenuhi syarat.\" Bagaimana potongan kode C++ dan Scratch yang paling tepat untuk kasus ini?', '21_soal.PNG', '21_a.PNG', '21_b.PNG', '21_c.PNG', '21_d.PNG', '21_e.PNG', 'A', 2, 3),
(52, 'Andi ingin membuat program  dalam bahasa C++  yang meminta pengguna memasukkan angka-angka positif. Program akan terus meminta input angka dari pengguna hingga pengguna memasukkan angka negatif. Perulangan mininal dilakukan satu kali. Jenis perulangan apa yang paling cocok untuk digunakan dalam kasus ini dan bagaimana flowchartnya?', '', '22_a.PNG', '22_b.PNG', '22_C.PNG', '22_d.PNG', '22_e.PNG', 'B', 2, 2),
(53, 'Seorang penumpang pesawat ingin memilih maskapai yang menawarkan tiket paling murah untuk tujuan yang sama. Ada tiga maskapai yang melayani rute tersebut. Maskapai A menawarkan tiket seharga 500.000 rupiah, Maskapai B menawarkan tiket seharga 550.000 rupiah, dan Maskapai C menawarkan tiket seharga 480.000 rupiah. Bagaimana potongan flowchart jika nanti menggunakan bahasa C++ untuk mencari maskapai paling mahal?', '', '23_a.PNG', '23_b.PNG', '23_c.PNG', '23_d.PNG', '23_e.PNG', 'B', 2, 2),
(54, 'Buatlah program dalam C++ yang menggunakan perulangan for untuk mencetak deret angka 10 hingga 100 dengan increment 5 Jika flowchartnya.', '24_soal.PNG', '24_a.PNG', '24_b.PNG', '24_c.PNG', '24_d.PNG', '24_e.PNG', 'A', 2, 3),
(55, 'Seorang karyawan ingin mendapatkan bonus tahunan dari perusahaannya. Jika karyawan tersebut mencapai minimal 90% dari target penjualan tahunannya, program akan mengeluarkan output \"Anda akan mendapatkan bonus tahunan\". Tidak ada aksi dan kondisi lainnya. Jika mencapai target dibawah 90 % maka program mengeluarkan output \"Anda tidak akan mendapat bonus tahunan\" . Apa data yang diketahui yang berhubungan dengan percabangan dan Apakah kondisi dan aksi ini sudah cukup untuk menentukan bahwa percabangan yang digunakan adalah percabangan tunggal jika menggunakan bahasa pemrograman C++ maupun Scratch?', '', 'Jika mencapai minimal 90% dari target penjualan program dijalankan dan cukup', 'Jika mencapai  90% dari target penjualan program dijalankan dan kontradiktif', 'Jika mencapai minimal 90% dari target penjualan program dijalankan dan berlebihan', 'Jika mencapai 90% dari target penjualan program dijalankan dan tidak cukup', ' E.Tidak ada konteks yang jelas', 'B', 2, 1),
(56, 'Doni ingin membuat sebuah perulangan dengan pengecekan dilakukan diawal. Jika pengguna memasukan angka nol di awal maka perulangan tidak dilakukan. Jika perulangan dilakukan maka akan diminta menginputkan angka lainnya.', '26_soal.PNG', 'Tambahkan kondisi while pada code c++ dengan while(num != 0) dan pada Scratch tambahkan repeat untuk num = 0. Buatkan kode input untuk num', 'Tambahkan kondisi do while (num < 0)', 'Tambahkan kondisi do while (num == 0)', 'Tambahkan kondisi while pada code c++ dengan while(num >= 0) dan pada Scratch tambahkan repeat until num < 0', 'Tambahkan kondisi while pada code c++ dengan while(num == 0) dan pada Scratch tambahkan repeat until num!= 0. Buatkan kode input untuk angka', 'A', 2, 4),
(57, 'Seorang penjual bunga ingin membuat daftar harga berdasarkan jenis bunga yang tersedia di tokonya. Dia memberikan kode angka untuk mengidentifikasi setiap jenis bunga, di mana 1 adalah mawar, 2 adalah tulip, dan 3 adalah anggrek. Jika memasukan angka yang tidak valid maka menghasilkan output tidak valid. Apa data yang diketahui dan apakah data tersebut sudah cukup untuk menentukan percabangan yang paling efektif (mengurangi sesuatu yang bertingkat-tingkat) yang dapat digunakan adalah switch untuk menentukan jenis bunga? (Asumsi bahasa pemrograman yang digunakan adalah C++)', '', ' Penentuan jenis bungga berdasarkan angka dan sudah cukup ', ' Penentuan jenis bungga berdasarkan angka dan belum cukup ', ' Penentuan jenis bungga berdasarkan angka dan kontradiktif ', 'Penentuan jenis bungga berdasarkan angka dan berlebihan', 'Tidak ada konteks yang jelas', 'A', 2, 1),
(58, 'Fira ingin membuat program dalam bahasa C++ yang akan meminta pengguna untuk memasukkan angka-angka bilangan bulat. Program akan melakukan input pertama di luar blok perulangan dan melakukan pengecekan kondisi di awal. Jika pengguna memasukkan angka negatif, maka program akan menghentikan perulangan. Namun, jika pengguna memasukkan angka positif atau nol, program akan terus meminta input angka hingga pengguna memasukkan angka negatif. Kira-kira bagaimana gambaran flowchartnya?', '', '28_a.PNG', '28_b.PNG', '28_c.PNG', '28_d.PNG', '28_e.PNG', 'B', 2, 2),
(59, 'Doni ingin membuat suatu program menyatakan pilihan 1 sampai ke 3 jika yang dimasukan adalah angka 1 maka akan mengeluaran output “Satu” , jika yang dimasukan 2 maka outputnya “Dua” dan jika yang dimasukan adalah 3 maka outputnya adalah “Tiga” jika yang dimasukan adalah yang lain maka tidak akan muncul apa-apa, apa yang perlu diubah?', '29_soal.PNG', 'Tambahkan break pada akhir case 1 dan 2', 'Tambahkan break pada akhir case 1, 2, dan hapus kondisi default', 'Tambahkan break pada akhir case 1 dan 3 dan hapus kondisi default', 'Hapus kondisi default', 'Tambahkan break sebelum case 3', 'B', 2, 4),
(60, 'Doni ingin membuat suatu program yang bertujuan untuk menghitung total angka yang dimasukan oleh pengguna. Perulangan minimal dilakukan satu kali perulangan dan pengecekan dilakukan diakhir. Jika pada perulangan kedua dimasukan angka 999 maka program akan berhenti. Apa yang harus dilakukan oleh Doni jika Doni membuat code sebagai berikut?', '30_soal.PNG', 'Buatkan kondisi do while dengan kondisi pada while(angka != 999)', 'Buatkan while dengan kondisi pada while(angka != 999)', 'Buatkan kondisi for dengan for(int i = 1;i<=999;i++)', 'Buatkan kondisi for dengan for(int i = 1;i<999;i++)', 'Buatkan kondisi do while dengan kondisi pada while(angka == 999)', 'A', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_quiz`
--

CREATE TABLE `tb_quiz` (
  `id_soal` int NOT NULL,
  `soal` text NOT NULL,
  `gambar` text NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `opsi_e` varchar(255) NOT NULL,
  `kunci` varchar(255) NOT NULL,
  `pembahasan` text NOT NULL,
  `id_pertemuan` int NOT NULL,
  `id_ps` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_quiz`
--

INSERT INTO `tb_quiz` (`id_soal`, `soal`, `gambar`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `kunci`, `pembahasan`, `id_pertemuan`, `id_ps`) VALUES
(1, 'Seorang siswa, bernama Ahmad, sedang memutuskan apakah dia akan berpartisipasi dalam kompetisi matematika di sekolahnya. Ahmad tahu bahwa untuk berpartisipasi, dia harus mendaftar sebelum batas waktu pendaftaran. Ahmad sedang mempertimbangkan untuk mendaftar jika dia merasa cukup siap untuk menghadapi kompetisi tersebut. Jika Ahmad merasa cukup siap, dia akan mendaftar. Inputan berupa String, Penamaan variable dibebaskan, dan output berupa String tanpa enter, Program yang dibuat adalah dalam bahasa Scratch dan C++. Apakah data yang diketahui dan apakah data tersebut sudah dapat menentukan bahwa percabangan satu kasus merupakan percabangan yang paling cocok? ', '', 'Jika Ahmad cukup siap maka ahmad akan mendaftar, cukup', 'Jika Ahmad cukup siap maka ahmad akan mendaftar, belum cukup', 'Jika Ahmad cukup siap maka ahmad akan mendaftar, berlebihan cukup', 'Jika Ahmad tidak siap maka ahmad tidak akan mendaftar, kontraktif', 'Tidak ada konteks yang jelas', 'A', 'Jawabannya adalah A, Diketahui satu kondisi dan satu aksi maka sudah cukup untuk menentukan bahwa percabangan yang digunakan adalah percabangan tunggal', 1, 1),
(2, 'Seorang siswa, bernama Ahmad, sedang memutuskan apakah dia akan berpartisipasi dalam kompetisi matematika di sekolahnya. Ahmad tahu bahwa untuk berpartisipasi, dia harus mendaftar sebelum batas waktu pendaftaran. Ahmad sedang mempertimbangkan untuk mendaftar jika dia merasa cukup siap untuk menghadapi kompetisi tersebut. Jika Ahmad merasa cukup siap, dia akan mendaftar. Inputan berupa String, Penamaan variable dibebaskan, dan output berupa String tanpa enter, Program yang dibuat adalah dalam bahasa Scratch dan C++. Bagaimana flowchart diagram yang sesuai dengan kasus tersebut?Jika mencapai nilai minimal 70 program dijalankan dan cukup', '', '1_2_a.PNG', '1_2_b.PNG', '1_2_c.PNG', '1_2_d.PNG', '1_2_e.PNG', 'D', 'Jawaban yang benar adalah D, yaitu Percabangan Tunggal maka tidak ada aksi lainnya', 1, 2),
(3, 'Seorang siswa, bernama Ahmad, sedang memutuskan apakah dia akan berpartisipasi dalam kompetisi matematika di sekolahnya. Ahmad tahu bahwa untuk berpartisipasi, dia harus mendaftar sebelum batas waktu pendaftaran. Ahmad sedang mempertimbangkan untuk mendaftar jika dia merasa cukup siap untuk menghadapi kompetisi tersebut. Jika Ahmad merasa cukup siap, dia akan mendaftar. Inputan berupa String, Penamaan variable dibebaskan, dan output berupa String tanpa enter, Program yang dibuat adalah dalam bahasa Scratch dan C++. Bagaimana code programnya ?', '', '1_3_a.PNG', '1_3_b.PNG', '1_3_c.PNG', '1_3_d.PNG', '1_3_e.PNG', 'A', 'Jawaban yang benar adalah A karena memenuhi kondisi jika cukup siap maka dia akan mendaftar', 1, 3),
(4, 'Seorang siswa, bernama Ahmad, sedang memutuskan apakah dia akan berpartisipasi dalam kompetisi matematika di sekolahnya. Ahmad tahu bahwa untuk berpartisipasi, dia harus mendaftar sebelum batas waktu pendaftaran. Ahmad sedang mempertimbangkan untuk mendaftar jika dia merasa cukup siap untuk menghadapi kompetisi tersebut. Jika Ahmad merasa cukup siap, dia akan mendaftar. Namun, jika dia merasa tidak siap, dia tidak akan mendaftar. Inputan berupa string, penamaan variable dibebaskan, output berupa string dengan tanpa newline. Bahasa pemrograman yang digunakan adalah C++ dan scratch. Apa data yang diketahui dan apakah data yang diberikan sudah cukup untuk menentukan bahwa percabangan yang digunakan adalah percabangan 2 kasus', '', ' Jika Ahmad merasa cukup siap Ia akan mendaftar, Sudah cukup ', ' Jika Ahmad merasa cukup siap Ia akan mendaftar,  Belum cukup ', ' Jika Ahmad merasa cukup siap Ia tidak akan mendaftar, Berlebihan ', 'Jika Ahmad merasa cukup siap maka ia akan mendaftar, Kontradiktif', 'Tidak ada konteks yang jelas', 'A', 'Jawaban yang benar adalah A karena sudah dapat menentukan jenis percabangan dua kasus karena ada dua kondisi', 2, 1),
(5, 'Seorang siswa, bernama Ahmad, sedang memutuskan apakah dia akan berpartisipasi dalam kompetisi matematika di sekolahnya. Ahmad tahu bahwa untuk berpartisipasi, dia harus mendaftar sebelum batas waktu pendaftaran. Ahmad sedang mempertimbangkan untuk mendaftar jika dia merasa cukup siap untuk menghadapi kompetisi tersebut. Jika Ahmad merasa cukup siap, dia akan mendaftar. Namun, jika dia merasa tidak siap, dia tidak akan mendaftar. Inputan berupa string, penamaan variable dibebaskan, output berupa string dengan tanpa newline. Bahasa pemrograman yang digunakan adalah C++ dan scratch. Bagaimana flowchart diagram yang sesuai?', '', '2_2_a.PNG', '2_2_b.PNG', '2_2_c.PNG', '2_2_d.PNG', '2_2_e.PNG', 'E', 'Jawaban yang benar adalah E karena jika kesiapan adalah cukup siap maka ia akan mendaftar jika tidak dia tidak akan mendaftar', 2, 2),
(6, 'Seorang siswa, bernama Ahmad, sedang memutuskan apakah dia akan berpartisipasi dalam kompetisi matematika di sekolahnya. Ahmad tahu bahwa untuk berpartisipasi, dia harus mendaftar sebelum batas waktu pendaftaran. Ahmad sedang mempertimbangkan untuk mendaftar jika dia merasa cukup siap untuk menghadapi kompetisi tersebut. Jika Ahmad merasa cukup siap, dia akan mendaftar. Namun, jika dia merasa tidak siap, dia tidak akan mendaftar. Inputan berupa string, penamaan variable dibebaskan, output berupa string dengan tanpa newline. Bahasa pemrograman yang digunakan adalah C++ dan scratch. Bagaimana Code Programnya?', '', '2_3_a.PNG', '2_3_b.PNG', '2_3_c.PNG', '2_3_d.PNG', '2_3_e.PNG', 'E', 'Jawaban yang benar adalah E karena menunjukan percabangan dua kasus', 2, 3),
(7, 'Bagaimana agar code tersebut menghasilkan jika ahmad tidak siap maka menghasilkan “Ahmad akan mencoba lagi” dan tidak aksi lainnya.', '2_4_soal.PNG', 'Ubah cin menjadi getline (cin, kesiapan)', 'Ubah cin menjadi getline(cin, kesiapan) dan ubah kondisi menjadi kesiapan == “tidak siap”. Aksinya mencetak “Ahmad akan mencoba lagi”', 'Ubah cin menjadi getline(cin, kesiapan) dan ubah kondisi menjadi kesiapan == “cukup siap”.', 'Ubah cin menjadi getline (cin, kesiapan). Pada Scratch ubah kondisi dan hapus kondisi not', 'Ubah kondisi menjadi kesiapan == “cukup siap”. Pada Scratch ubah kondisi dan hapus kondisi not', 'B', 'Jawaban yang benar adalah B, karena kondisinya benar diubah, aksinya juga, dan tidak ada aksi/kondisi lainnya', 2, 4),
(8, 'Seorang siswa, bernama Rizki, sedang mempertimbangkan untuk membeli sebuah smartphone baru. Dia memiliki anggaran tertentu dan ingin memilih smartphone yang sesuai dengan anggarannya. Rizki memiliki tiga pilihan smartphone: A, B, dan C. Setiap pilihan memiliki harga yang berbeda. Jika harga smartphone A sesuai dengan anggaran Rizki, dia akan membeli smartphone tersebut. Jika harga smartphone A terlalu mahal, Rizki akan mempertimbangkan smartphone B. Namun, jika harga smartphone B juga terlalu mahal, dia akan membeli smartphone C sebagai pilihan terakhir dan pasti Rizki dapat membelinya karena harga smartphone C pasti lebih kecil daripada anggarannya. Inputan berupa integer, Output berupa string dengan enter (new line), penamaan variable dibebaskan, Harga smartphone A dan B sudah dideklarasikan di awal dengan nama variable hargaA dan HargaB dengan nilai yang ditentukan pengguna (nilai dibebaskan), dan bahasa pemrograman yang digunakan adalah C++. Apa data yang diketahui dan apakah sudah cukup untuk menentukan bahwa percabangan 3 kasus merupakan percabangan yang tepat?', '', 'Jika uang rizki cukup pertama kali ia akan mempertimbangkan Smartphone A, cukup', 'Jika uang rizki cukup pertama kali ia akan mempertimbangkan Smartphone A, belum cukup', 'Jika uang rizki cukup pertama kali ia akan mempertimbangkan Smartphone A, berlebihan cukup', 'Jika uang rizki cukup pertama kali ia akan mempertimbangkan Smartphone B, kontraktif', 'Tidak ada konteks yang jelas', 'A', 'Jawaban yang benar adalah A, karena sudah dapat menentukan percabangan tiga kasus karena terdapat 3 kasus ', 2, 1),
(9, 'Seorang siswa, bernama Rizki, sedang mempertimbangkan untuk membeli sebuah smartphone baru. Dia memiliki anggaran tertentu dan ingin memilih smartphone yang sesuai dengan anggarannya. Rizki memiliki tiga pilihan smartphone: A, B, dan C. Setiap pilihan memiliki harga yang berbeda. Jika harga smartphone A sesuai dengan anggaran Rizki, dia akan membeli smartphone tersebut. Jika harga smartphone A terlalu mahal, Rizki akan mempertimbangkan smartphone B. Namun, jika harga smartphone B juga terlalu mahal, dia akan membeli smartphone C sebagai pilihan terakhir dan pasti Rizki dapat membelinya karena harga smartphone C pasti lebih kecil daripada anggarannya. Inputan berupa integer, Output berupa string dengan enter (new line), penamaan variable dibebaskan, Harga smartphone A dan B sudah dideklarasikan di awal dengan nama variable hargaA dan HargaB dengan nilai yang ditentukan pengguna (nilai dibebaskan), dan bahasa pemrograman yang digunakan adalah C++. Bagaimana codenya jika diberikan flowchart sebagai berikut?', '', '2_7_a.PNG', '2_7_b.PNG', '2_7_c.PNG', '2_7_d.PNG', '2_7_e.PNG', 'A', 'Jawaban yang benar adalah A, karena code yang diberikan paling benar untuk mengambarkan bentuk perbandingan harga 3 barang', 2, 3),
(10, 'Bagaimana jika code hargaC <= anggaranRizki mencetak “Rizki membeli Smartphone C” dan jika tidak mencetak “Rizki akan kecewa”', '2_8_soal.PNG', 'Ubah posisi hargaA <= anggaranRizki menjadi anggaranRizki >= hargaA', 'Buatkan kondisi else if(hargaC <= anggaranRizki) dan aksi cout<<”Rizki membeli Smartphone C”; Kemudian buatkan aksi else cout<<”Rizki akan kecewa”;', 'Ubah posisi hargaA <= anggaranRizki menjadi anggaranRizki > hargaA dan  Buatkan kondisi else cout<<”Rizki membeli Smartphone C”;', ' Hapus else if', 'Ubah posisi hargaA <= anggaranRizki menjadi anggaranRizki > hargaA', 'B', 'Jawaban yang benar adalah B, karena harus menjadi 4 kondisi ', 2, 4),
(11, 'Ahmad memutuskan untuk pergi ke taman pada hari libur. Ketika dia tiba di taman, dia melihat papan pengumuman yang menampilkan beberapa nomor. Nomor tersebut menunjukkan kondisi-kondisi tertentu di taman. Ahmad mengetahui bahwa terdapat maksud dari beberapa nomor di taman. Kemudian Ahmad ingin membuat aplikasi untuk menunjukan apa maksud dari nomor pada pengumuman. Berikut adalah beberapa nomor dan kondisi yang berkaitan dengan kondisi di taman:  •Nomor 1: Taman ramai dengan orang-orang bermain sepak bola.  •Nomor 2: Taman sepi dan hujan turun dengan deras.  •Nomor 3: Taman berawan, tetapi masih cukup cerah. Buatkan dalam bentuk programnya dengan algoritma yang paling efisien dan penamaan variable dibebaskan. Inputan berupa integer. Bahasa pemrograman yang digunakan adalah C++. Output berupa string dengan new line. Apa data yang diketahui dan apakah sudah cukup untuk menentukan bahwa percabangan switch yang digunakan?', '', 'Nomor 1 menentukan Taman Ramai dengan orang-orang bermain sepak bola, Cukup', 'Nomor 1 menentukan Taman Ramai dengan orang-orang bermain sepak bola, Tidak Cukup', 'Nomor 1 menentukan Taman Ramai dengan orang-orang bermain sepak bola, Berlebihan', 'Nomor 2 menentukan Taman Sepi, Kontradiktif', 'Tidak ada konteks yang jelas', 'A', 'Jawabannya adalah A, Karena sudah cukup untuk menentukan bahwa switch yang paling efektif', 2, 1),
(12, 'Ahmad memutuskan untuk pergi ke taman pada hari libur. Ketika dia tiba di taman, dia melihat papan pengumuman yang menampilkan beberapa nomor. Nomor tersebut menunjukkan kondisi-kondisi tertentu di taman. Ahmad mengetahui bahwa terdapat maksud dari beberapa nomor di taman. Kemudian Ahmad ingin membuat aplikasi untuk menunjukan apa maksud dari nomor pada pengumuman. Berikut adalah beberapa nomor dan kondisi yang berkaitan dengan kondisi di taman:  •Nomor 1: Taman ramai dengan orang-orang bermain sepak bola.  •Nomor 2: Taman sepi dan hujan turun dengan deras.  •Nomor 3: Taman berawan, tetapi masih cukup cerah. Buatkan dalam bentuk programnya dengan algoritma yang paling efisien dan penamaan variable dibebaskan. Inputan berupa integer. Bahasa pemrograman yang digunakan adalah C++. Output berupa string dengan new line. Bagaimana flowchart diagram yang sesuai?', '', '2_10_a.PNG', '2_10_b.PNG', '2_10_c.PNG', '2_10_d.PNG', '2_10_e.PNG', 'B', 'Jawaban yang paling tepat adalah B karena menggambarkan kondisi 3 kasus dengan switch yang paling efektif', 2, 2),
(13, 'Ahmad memutuskan untuk pergi ke taman pada hari libur. Ketika dia tiba di taman, dia melihat papan pengumuman yang menampilkan beberapa nomor. Nomor tersebut menunjukkan kondisi-kondisi tertentu di taman. Ahmad mengetahui bahwa terdapat maksud dari beberapa nomor di taman. Kemudian Ahmad ingin membuat aplikasi untuk menunjukan apa maksud dari nomor pada pengumuman. Berikut adalah beberapa nomor dan kondisi yang berkaitan dengan kondisi di taman:  •Nomor 1: Taman ramai dengan orang-orang bermain sepak bola.  •Nomor 2: Taman sepi dan hujan turun dengan deras.  •Nomor 3: Taman berawan, tetapi masih cukup cerah. Buatkan dalam bentuk programnya dengan algoritma yang paling efisien dan penamaan variable dibebaskan. Inputan berupa integer. Bahasa pemrograman yang digunakan adalah C++. Output berupa string dengan new line. Bagaimana potongan code percabangannya?', '', '2_11_a.PNG', '2_11_b.PNG', '2_11_c.PNG', '2_11_d.PNG', '2_11_e.PNG', 'B', 'Jawaban yang benar adalah B karena menggambarkan struktur switch yang benar sesuai dengan permintaan soal ingat break dan tanpa default karena tidak diminta', 2, 3),
(14, 'Diberikan switch sebagai berikut.ubah switch dengan ketentuan, jika angka 3 yang dimasukan menampilkan Taman berawan, tetapi\nmasih cukup cerah', '2_12_soal.PNG', ' Hapus kondisi default', ' Hapus kondisi default dan tambahkan break sebelum default', 'Tambahkan break sebelum default', ' Tidak perlu diubah', ' Tidak perlu diubah', 'C', 'Jawabannya adalah C, Dengan cara menambahkan break sebelum default', 2, 4),
(15, 'Seorang penjual es krim ingin mencatat penjualan es krimnya setiap hari selama seminggu. Dia memiliki data penjualan es krim dalam bentuk jumlah es krim yang terjual setiap hari. Buatlah program yang menggunakan perulangan untuk meminta penjual es krim memasukkan data penjualan selama 7 hari, dan kemudian menampilkan total penjualan selama seminggu. Total penjualan tanpa new line.Bahasa pemrograman yang digunakan adalah C++. Inputan dan total berupa integer, dan penamaan variable dibebaskan. Apa data yang diketahui dan apakah data yang diberikan cukup untuk menentukan percabangan yang paling sesuai adalah for', '', 'Program dibuat untuk membuat total dari inputan user selama 7 hari, Cukup', 'Program dibuat untuk membuat total dari inputan user selama 7 hari, Tidak Cukup', 'Program dibuat untuk membuat total dari inputan user selama 1 sampai 7 hari, Berlebihan', 'Program dibuat untuk membuat total dari inputan user selama 1 sampai 7 hari, Kontradiktif', 'Tidak ada konteks yang jelas', 'A', 'Jawaban yang tepat adalah A karena sudah cukup untuk menentukan bahwa perulangan yang tepat adalah for', 3, 1),
(16, 'Seorang penjual es krim ingin mencatat penjualan es krimnya setiap hari selama seminggu. Dia memiliki data penjualan es krim dalam bentuk jumlah es krim yang terjual setiap hari. Buatlah program yang menggunakan perulangan untuk meminta penjual es krim memasukkan data penjualan selama 7 hari, dan kemudian menampilkan total penjualan selama seminggu. Total penjualan tanpa new line.Bahasa pemrograman yang digunakan adalah C++. Inputan dan total berupa integer, dan penamaan variable dibebaskan. Bagaimana flowchart diagram yang paling sesuai dengan perulangan yang paling sesuai?', '', '3_2_a.PNG', '3_2_b.PNG', '3_2_c.PNG', '3_2_d.PNG', '3_2_e.PNG', 'A', 'Jawaban yang benar adalah A karena perulangan yang paling tepat adalah for dan mengulang dari 1 sampai 7', 3, 2),
(17, 'Seorang penjual es krim ingin mencatat penjualan es krimnya setiap hari selama seminggu. Dia memiliki data penjualan es krim dalam bentuk jumlah es krim yang terjual setiap hari. Buatlah program yang menggunakan perulangan untuk meminta penjual es krim memasukkan data penjualan selama 7 hari, dan kemudian menampilkan total penjualan selama seminggu. Total penjualan tanpa new line.Bahasa pemrograman yang digunakan adalah C++. Inputan dan total berupa integer, dan penamaan variable dibebaskan. Bagaimana code programnya?', '', '3_3_a.PNG', '3_3_b.PNG', '3_3_c.PNG', '3_3_d.PNG', '3_3_e.PNG', 'A', 'Jawaban yang benar adalah A karena struktur perulangan nya paling tepat', 3, 3),
(18, 'Jika perhitungan hasil penjualan dilakukan untuk rentang waktu 5 hari dan menampilkan outputnya, apakah kode tersebut sudat tepat dan sesuai dengan perulangan yang paling efektif?', '3_4_soal.PNG', ' Sudah tepat dan tidak perlu diubah', ' Ubah menjadi perulangan for dengan batas atasnya 5 dan berikan outputnya ', ' Ubah menjadi perulangan for', ' Inisialisasi hari = 1', ' Inisialisasi hari  = 1 dan berikan outputnya', 'B', 'Jawaban yang tepat adalah B karena perulangan yang tepat adalah For kemudian ubah batas atasnya menjadi 5 ', 3, 4),
(19, 'Seorang penjual online sedang melakukan pengiriman barang. Dia memiliki daftar pesanan yang perlu dikirimkan. Penjual tersebut ingin mengirim barang-barang tersebut hingga semua pesanan terkirim ke alamat tujuan. Namun, penjual memiliki kondisi bahwa dia akan terus mengirim barang hingga total berat pengiriman mencapai 100 kg. Setiap pesanan memiliki berat yang berbeda. Proses pengecekan kondisi dilakukan di awal. Buatlah program yang menggunakan perulangan untuk memodelkan proses pengiriman barang oleh penjual hingga batas total berat pengiriman mencapai 100 kg. Bahasa pemrograman yang digunakan adalah C++ dan Scratch. Inputan berupa integer, dan penamaan variable dibebaskan. Output menampilkan total dari berat barang dalam string tanpa newline. Namun jika yang dimasukan berlebihan maka pada total ditampilkan berat berlebih.  Apa data yang diketahui dan apakah sudah cukup untuk menentukan perulangan while /repeat until yang digunakan?', '', ' Pengecekan dilakukan diawal, Cukup', ' Pengecekan dilakukan diawal, Tidak cukup', ' Pengecekan dilakukan diawal, Kontradiktif', ' Batas atas 100 kg, Berlebihan', ' Tidak ada konteks yang jelas', 'A', 'Jawaban yang tepat adalah A karena sudah cukup untuk menggambarkan perulangan while', 3, 1),
(20, 'Seorang penjual online sedang melakukan pengiriman barang. Dia memiliki daftar pesanan yang perlu dikirimkan. Penjual tersebut ingin mengirim barang-barang tersebut hingga semua pesanan terkirim ke alamat tujuan. Namun, penjual memiliki kondisi bahwa dia akan terus mengirim barang hingga total berat pengiriman mencapai 100 kg. Setiap pesanan memiliki berat yang berbeda. Proses pengecekan kondisi dilakukan di awal. Buatlah program yang menggunakan perulangan untuk memodelkan proses pengiriman barang oleh penjual hingga batas total berat pengiriman mencapai 100 kg. Bahasa pemrograman yang digunakan adalah C++ dan Scratch. Inputan berupa integer, dan penamaan variable dibebaskan. Output menampilkan total dari berat barang dalam string tanpa newline. Namun jika yang dimasukan berlebihan maka pada total ditampilkan berat berlebih.  Bagaimanakah Flowchart yang sesuai?', '', '3_6_a.PNG', '3_6_b.PNG', '3_6_c.PNG', '3_6_d.PNG', '3_6_e.PNG', 'B', 'Jawaban yang tepat adalah B karena struktur perulangan yang tepat adalah B dan berhenti jika mencapai 100 berarti kondisinya harus < 100', 3, 2),
(21, 'Diberikan kode perulangan yang akan berhenti ketika mencapai total 100\ndan pengecekan dilakukan di awal. Jika program dinginkan berhenti ketika\ntotalnya mencapai 50 kg apakah code tersebut sudah tepat?', '3_8_soal.PNG', 'Ubah batas menjadi total < 50', 'Ubah batas menjadi total <=50 ', ' Ubah while menjadi do while', ' Ubah while menjadi for', 'Ubah kondisi pada while menjadi while(total > 100)', 'A', 'Jawabannya adalah A perulangan harus berhenti ketika sudah mencapai 50 berarti batasnya harus lebih kecil dari 50', 3, 4),
(22, 'Seorang mahasiswa sedang melakukan latihan mengetik untuk meningkatkan kecepatan mengetiknya. Dia ingin mengukur jumlah karakter yang dapat diketiknya. Mahasiswa tersebut akan terus melakukan latihan hingga berhasil mengetik 100 karakter. Buatlah program yang menggunakan perulangan untuk memodelkan proses latihan mahasiswa tersebut. Perulangan minimal dilakukan satu kali. Bahasa pemrograman yang digunakan adalah C++. Inputan berupa String yang nanti akan dihitung panjangnya dan penamaan variable dibebaskan, Output berupa string menampilkan total dari karakter yang dimasukan tanpa newline. Apa data yang diketahui dan apakah sudah dapat menentukan perulangan do while yang dipergunakan?', '', ' Perulangan minimal dilakukan satu kali, Cukup', ' Perulangan minimal dilakukan satu kali, Cukup', ' Pengecekan dilakukan diawal, Kontradiktif', ' Perulangan minimal dilakukan satu kali, Berlebihan', ' Tidak ada konteks yang jelas', 'A', 'Jawabannya adalah A, Karena sudah bisa memutuskan bahwa perulangan do while yang paling tepat', 4, 1),
(23, 'Seorang mahasiswa sedang melakukan latihan mengetik untuk meningkatkan kecepatan mengetiknya. Dia ingin mengukur jumlah karakter yang dapat diketiknya. Mahasiswa tersebut akan terus melakukan latihan hingga berhasil mengetik 100 karakter. Buatlah program yang menggunakan perulangan untuk memodelkan proses latihan mahasiswa tersebut. Perulangan minimal dilakukan satu kali. Bahasa pemrograman yang digunakan adalah C++. Inputan berupa String yang nanti akan dihitung panjangnya dan penamaan variable dibebaskan, Output berupa string menampilkan total dari karakter yang dimasukan tanpa newline.', '', '4_2_a.PNG', '4_2_b.PNG', '4_2_c.PNG', '4_2_d.PNG', '4_2_e.PNG', 'A', 'Jawaban yang tepat adalah A karena perulangan yang paling tepat adalah do while sebab mengulang minimal 1 kali', 4, 2),
(24, 'Seorang mahasiswa sedang melakukan latihan mengetik untuk meningkatkan kecepatan mengetiknya. Dia ingin mengukur jumlah karakter yang dapat diketiknya. Mahasiswa tersebut akan terus melakukan latihan hingga berhasil mengetik 100 karakter. Buatlah program yang menggunakan perulangan untuk memodelkan proses latihan mahasiswa tersebut. Perulangan minimal dilakukan satu kali. Bahasa pemrograman yang digunakan adalah C++. Inputan berupa String yang nanti akan dihitung panjangnya dan penamaan variable dibebaskan, Output berupa string menampilkan total dari karakter yang dimasukan tanpa newline. Bagaimana code program yang sesuai?', '', '4_3_a.PNG', '4_3_b.PNG', '4_3_c.PNG', '4_3_d.PNG', '4_3_e.PNG', 'A', 'Jawaban yang tepat adalah A karena struktur do while yang paling tepat', 4, 3),
(25, 'Diberikan kode untuk menghitung total karakter yang diinputkan\ndan perulangan berhenti ketika mencapai 99. Jika menginginkan\nagar perulangan berhenti ketika mencapai 10 dan perulangan\nminimal dilakukan satu kali apa yang perlu diubah', '4_4_soal.PNG', ' Code tidak perlu diperbaiki', ' Ubah perulangan while menjadi do while', ' Ubah perulangan while menjadi do while', ' Ubah perulangan while menjadi for', 'Ubah perulangan while menjadi do while dan kondisi <99 menjadi <10', 'E', 'Jawaban yang benar adalah E, karena batasnya diganti jadi 10 dan mengulang min 10 kali', 4, 4),
(26, 'Seorang pelamar pekerjaan harus memiliki setidaknya dua tahun pengalaman kerja di bidang yang sama atau memiliki setidaknya tiga referensi profesional yang dapat memberikan rekomendasi. Jika salah satu syarat ini terpenuhi, maka program akan mengeluarkan output \"Anda diterima\" dan tidak ada kondisi/aksi alternatif. Bagaimana potongan kode C++ dan Scratch yang paling tepat untuk kasus ini jika diberikan flowchart sebagai berikut?', '1_5_soal.PNG', '1_5_a.PNG', '1_5_b.PNG', '1_5_c.PNG', '1_5_d.PNG', '1_5_e.PNG', 'A', 'Kunci jawaban adalah A, karena hanya code pada opsi A yang sesuai dengan flowchart diagram yang diberikan. ', 1, 3),
(27, 'Doni ingin membuat program untuk memvalidasi suatu nilai. Jika jawabannya bernilai 10 maka akan mengeluarkan output Jawaban Anda benar nilai x = 10. Apa yang harus dilakukan kita untuk membantu Doni?', '1_6_soal.PNG', 'Mengubah tipe data jawaban menjadi string dan mengubah nilainnya menjadi 10', 'Mengubah tipe data jawaban menjadi int dan mengubah nilainnya menjadi 10', 'Mengubah tipe data jawaban menjadi int dan mengubah nilainnya menjadi 10 membuat kondisi else dengan mencetak jawaban anda salah', 'Mengubah tipe data jawaban menjadi int dan mengubah nilainya menjadi 10 serta membuat kondisi if(jawaban == 10)', 'Mengubah tipe data jawaban menjadi int dan mengubah nilainya menjadi 10 serta membuat kondisi if(jawaban == ‘10’)', 'D', 'Jawaban yang benar adalah D. Karena kondisi D yang memenuhi kasus untuk diubah yaitu kita mengubah tipe data menjadi char dan mengubah nilainya kemudian barulah kita mengubah kondisi pada percabangan', 1, 4),
(28, 'Seorang karyawan ingin mendapatkan bonus tahunan dari perusahaannya. Jika karyawan tersebut mencapai minimal 90% dari target penjualan tahunannya, program akan mengeluarkan output \"Anda akan mendapatkan bonus tahunan.\". Tidak ada aksi lainnya. Apa data yang diketahui yang berhubungan dengan percabangan dan Apakah kondisi dan aksi ini sudah cukup untuk menentukan bahwa percabangan yang digunakan adalah percabangan tunggal jika menggunakan bahasa pemrograman C++ maupun Scratch?', '', 'Jika mencapai minimal 90% dari target penjualan program dijalankan dan cukup', 'Jika mencapai minimal 90% dari target penjualan program dijalankan dan kontradiktif', 'Jika mencapai minimal 90% dari target penjualan program dijalankan dan berlebihan', 'Jika mencapai minimal 90% dari target penjualan program dijalankan dan tidak cukup', 'Jika mencapai minimal 90% dari target penjualan program dijalankan dan tidak cukup', 'A', 'Kunci Jawabannya adalah A, hal tersebut karena data yang diberikan sudah cukup untuk menentukan bahwa program yang dibuat adalah percabangan tunggal', 1, 1),
(29, 'Seorang pengguna aplikasi e-commerce memilih metode pengiriman. Jika pengguna memilih \"Pengiriman Reguler,\" biaya pengiriman akan menjadi 15.000 rupiah. Namun, jika pengguna tidak memilih \"Pengiriman Reguler,\" biaya pengiriman akan menjadi 30.000 rupiah. Apa percabangan yang paling sesuai dan bagaimana potongan flowchart jika nanti program yang dibuat dalam bahasa C++/Scratch?', '', '2_13_a.PNG', '2_13_b.PNG', '2_13_c.PNG', '2_13_d.PNG', '2_13_e.PNG', 'B', 'Jawaban yang benar adalah B karena flowchart diagram yang paling cocok adalah B dan percabangan yang digunakan adalah percabangan 2 kasus', 2, 2),
(30, 'Geri merupakan seorang siswa yang jahil. Ia ingin mengubah suatu program. Jika pada kondisi normal program tersebut akan menjalankan aplikasi untuk mengecek apakah suatu bilangan bernilai positif atau negatif. Jika bernilai positif akan memprint bilangan positif jika tidak akan memprint bukan bilangan positif. Geri ingin mengubah fungsinya jika angka yang dimasukan adalah positif atau angka nol maka memprint bukan bilangan positif dan sebaliknya. Apa yang perlu diubah pada code berikut?', '2_14_soal.PNG', 'Ubah kondisi pada if menjadi bilangan < 0', 'Ubah kondisi pada if menjadi bilangan <= 0', 'Ubah kondisi pada if menjadi bilangan <= 0 dan hapus kondisi elsenya ', 'Ubah aksi ifnya menjadi memprint bukan bilangan positif', 'Ubah aksi elsenya menjadi memprint bilangan positif', 'A', 'Jawaban yang benar adalah A yaitu tinggal membalikan kondisi pada if menjadi < ', 2, 4),
(31, 'Seorang pelanggan ingin membeli sebuah smartphone. Dia mengetahui bahwa ada empat merek smartphone yang berbeda di pasaran, yaitu Brand A, Brand B, Brand C, dan Brand D. Pelanggan tersebut ingin membeli smartphone dengan spesifikasi paling tinggi. Namun, dia tidak tahu persis spesifikasi masing-masing merek smartphone tersebut. Apakah data yang diberikan sudah cukup untuk menentukan jenis percabangan yang digunakan adalah percabangan tiga kasus/lebih?', '', 'Seorang pelanggan ingin membeli sebuah smartphone dan cukup ', 'Pelanggan tidak mengetahui spesifikasi dan kontradiktif ', 'Seorang pelanggan ingin membeli sebuah smartphone dan berlebihan ', 'Pelanggan tidak mengetahui spesifikasi dan tidak cukup ', 'Tidak ada kondisi yang jelas ', 'D', 'Jawaban yang benar adalah D datanya tidak cukup, karena kita tidak bisa membandingkan jika tidak mengetahui nilai-nilai dari apa yang dibandingkan', 2, 1),
(32, 'Sebuah program akan menentukan jenis makanan berdasarkan kode makanan yang diberikan pengguna. Pengguna akan memasukkan kode makanan (P untuk \"Pizza\", B untuk \"Burger\", M untuk \"Mie\", kode lainnya untuk “Tidak diketahui”). Bagaimana potongan kode C++ yang sesuai dengan penggunaan switch untuk menentukan jenis makanan berdasarkan kode yang dimasukkan pengguna jika diberikan flowchart sebagai berikut?', '2_15_soal.PNG', '2_15_a.PNG', '2_15_b.PNG', '2_15_c.PNG', '2_15_d.PNG', '2_15_e.PNG', 'D', 'Jawaban yang benar adalah D, Opsi D adalah Opsi yang paling benar jika dibandingkan dengan flowchartnya', 2, 3),
(33, 'Cornelius ingin membuat suatu program dengan switch untuk menentukan apakah hari ini adalah Akhir Pekan Minggu atau Hari Kerja. Apa yang harus dilengkapi pada code ini. Ketentuannya dalam hari ditentukan oleh Abjad ke 2 pada kata hari Misal hari adalah senin ditentukan oleh huruf e. Dalam switch jika kasusnya hurufnya S maka outputnya  akhir pekan jika hurufnya adalah M maka output adalah minggu. Namun jika tidak bernilai S atau M maka output adalah Hari Kerja. Apa yang harus dilengkapi ?', '2_17_soal.PNG', 'Pada switch tambahkan hari[1]', 'Pada switch tambahkan hari[2]', 'Pada switch tambahkan hari[1] dan tambahkan break pada akhir case ‘S’ ', 'Pada switch tambahkan hari[1] dan tambahkan break pada akhir case ‘S’ dan pada akhir case ‘M’', 'Pada switch tambahkan hari[0] ', 'D', 'Jawaban yang benar adalah D karena kondisi yang dibandingkan adalah huruf kedua berarti menggunakan index 1 dan harus menambahkan break supaya outputnya sesuai', 2, 4),
(34, 'Seorang pengguna mengakses sebuah aplikasi musik K-Pop. Jika pengguna mengklik tombol \"Random\", maka lagu dari grup Blackpink akan diputar. Namun, jika pengguna tidak mengklik tombol \"Random\", maka lagu dari grup Twice akan diputar. Apa data yang diketahui dan apakah data yang sudah diberikan sudah cukup untuk menggambarkan bahwa percabangan yang digunakan adalah percabangan dua kasus jika menggunakan bahasa pemrograman C++ maupun Scratch? ', '', 'Jika menekan Random maka yang diputar adalah Blackpink sedangkan jika tidak maka yang diputar adalah Twice dan sudah cukup', 'Jika menekan Random maka yang diputar adalah Blackpink sedangkan jika tidak maka yang diputar adalah Twice dan belum cukup ', 'Jika menekan Random maka yang diputar adalah Blackpink sedangkan jika tidak maka yang diputar adalah Twice dan kontradiktif ', 'Jika menekan Random maka yang diputar adalah Blackpink sedangkan jika tidak maka yang diputar adalah Twice dan berlebihan ', 'Tidak ada konteks yang jelas', 'A', 'Jawaban yang benar adalah A karena kondisi yang diberikan sudah cukup untuk menjawab pertanyaan yaitu diberikan 2 kondisi', 2, 1),
(35, 'Seorang siswa yang malas pergi ke sekolah ingin menentukan jenis transportasi yang akan digunakan untuk pergi ke sekolah. Keputusan ini bergantung pada cuaca. Jika cuaca cerah, dia akan berjalan kaki; jika cuaca sedang, dia akan menggunakan sepeda; Apa informasi yang diketahui dan apakah informasi yang diberikan sudah cukup untuk menentukan bahwa percabangan yang nanti akan digunakan adalah percabangan tiga kasus atau lebih jika menggunakan bahasa C++?', '', 'Jika cuaca cerah, siswa akan berjalan kaki dan cukup', 'Jika cuaca sedang, siswa akan menggunakan sepeda dan kontradiktif', 'Jika cuaca hujan, siswa tidak akan pergi dan berlebihan', 'Jika cuaca cerah, siswa akan berjalan kaki dan tidak cukup ', 'Tidak ada konteks yang jelas', 'D', 'Jawabannya adalah D, informasi yang diberikan tidak cukup', 2, 1),
(36, 'Sebuah program akan menentukan jenis hari berdasarkan nomor hari dalam seminggu. Pengguna akan memasukkan nomor hari (1 hingga 7), dan program akan mencetak jenis hari tersebut (contoh: Senin, Selasa, Rabu, dst.). Bagaimana potongan kode C++ yang sesuai dengan penggunaan switch untuk menentukan jenis hari berdasarkan nomor hari yang dimasukkan pengguna jika diberikan flowchart sebagai berikut?', '2_19_soal.PNG', '2_19_a.PNG', '2_19_b.PNG', '2_19_c.PNG', '2_19_d.PNG', '2_19_e.PNG', 'C', 'Jawaban yang benar adalah  C karena paliing sesuai dengan flowchart dan soal', 2, 3),
(37, 'Siti ingin membuat program yang mencetak angka 10 hingga 1 secara terbalik. Kira-kira perulangan apa yang paling cocok digunakan dalam implementasi ini dalam bahasa C++ dan bagaimana flowchartnya?', '', '3_9_a.PNG', '3_9_b.PNG', '3_9_c.PNG', '3_9_d.PNG', '3_9_e.PNG', 'A', 'Jawabannya adalah A, karena paling sesuai perulangan for dan bentuk flowchartnya itu yang paling benar', 3, 2),
(38, 'Jefri ingin membuat suatu program untuk mengeprint angka 2 4 6 8 10 yang menerapkan perulangan bagaimana caranya?', '3_10_soal.PNG', 'Cetak secara manual cout <<”2 4 6 8 10”<<', 'Gunakan perulangan for(int i = 1;i<=5;i++)', 'Gunakan perulangan while(i<=5) kemudian berikan increment i++ dan inisialisasi variable int i = 1 pada luar blok perulangan', 'Gunakan perulangan while(i<=5) dan inisialisasi variable int i = 1 pada luar blok perulangan', 'Gunakan perulangan while(i<5) dan inisialisasi variable int i = 1 pada luar blok perulangan', 'B', 'Jawaban yang benar adalah B  yaitu dengan perulangan for dari 1 sampai 5', 3, 4),
(39, 'Sani ingin membuat suatu program untuk mengecek suatu bilangan apakah negatif atau bukan. Jika bilangan yang dimasukan adalah negatif maka perulangan berhenti. Pengecekan angka dilakukan diawal jadi ketika dimasukan angka negatif diawal perulangan tidak dijalankan. Apa yang harus diubah dalam program tersebut?', '3_11_soal.PNG', 'Pada kondisi scratch tambahkan repeat until (i < 0) dan pada scratch while(i>=0)', 'Pada kondisi scratch tambahkan repeat until (i < 1) dan pada scratch while(i>=1)', 'Pada kondisi scratch tambahkan repeat until (i < 2) dan pada scratch while(i>=2)\r\n\r\n', 'Berikan nilai untuk num pertama adalah 0', 'Berikan nilai untuk num pertama adalah 1', 'A', 'Jawaban yang benar adalah A, yaitu dengan menambahkan kondisi repeat until i<0 dan pada c++ while(i>=0)', 3, 4),
(40, 'Adi ingin membuat program yang mencetak tabel perkalian angka 5 dari 1 hingga 10. Apa perulangan yang paling sesuai dan bagaimana gambaran flowchart yang paling sesuai dengan kasus ini jika bahasa pemrograman yang nanti digunakan adalah C++?', '', '3_12_a.PNG', '3_12_b.PNG', '3_12_c.PNG', '3_12_d.PNG', '3_12_e.PNG', 'A', 'Kunci jawaban yang sesuai adalah A, flowchart diagram yang paling sesuai', 3, 1),
(41, 'Buatlah program dalam C++ yang menggunakan perulangan for untuk mencetak deret bilangan ganjil dari 15 hingga 45 Jika diberikan flowchart sebagai berikut.', '3_13_soal.PNG', '3_12_a1.PNG', '3_13_b.PNG', '3_13_c.PNG', '3_13_d.PNG', '3_13_e.PNG', 'A', 'Jawaban yang paling benar adalah A., Jawaban A adalah jawaban yang paling sesuai dengan flowchart yang diberikan', 3, 3),
(42, 'Sani sedang berpikir untuk membuat program perulangan bilangan dari 1 sampai 10 dengan jarak 2. Kira-kira apa yang harus dilakukan oleh Sani untuk membuat program tersebut ? ', '3_14_soal.PNG', 'Tambahkan for(int i = 1; i<10;i = i+2)', 'Tambahkan for(int i = 1; i<=10;i = i+2)', 'Tambahkan while(i<=10)', 'Tambahkan inisialisasi variable i = 1 dan while(i<=10) ', 'Tambahkan inisialisasi variable i = 1, while(i<=10) , dan increment i = i+2', 'B', 'Jawaban yang tepat adalah B perulangan yang cocok adalah for dan perulangan dari 1 sampai 10 dengan jarak 2', 3, 4),
(43, 'Buatlah program dalam C++ dan Scratch yang menggunakan perulangan untuk menghitung jumlah dari beberapa angka yang dimasukkan oleh pengguna. Pengguna akan diminta untuk memasukkan angka-angka tersebut hingga pengguna memasukkan angka 0 untuk menghentikan input. Proses penginputan angka pertama diluar blok perulangan jika diberikan flowchart sebagai berikut.', '3_15_soal.PNG', '3_15_a.PNG', '3_15_b.PNG', '3_15_c.PNG', '3_15_d.PNG', '3_15_e.PNG', 'A', 'Jawaban yang paling benar adalah A kode program yang dibuat, tersebut yang paling benar', 3, 3),
(45, 'Maya ingin membuat program dalam bahasa C++ yang akan meminta pengguna memasukkan angka-angka positif dan angka nol. Program akan terus meminta input angka dari pengguna hingga pengguna memasukkan angka negatif. Jika angka yang dimasukkan adalah bilangan kelipatan 3, program akan mencetak \"Kelipatan 3.\" Perulangan minimal dilakukan satu kali. Jenis perulangan apa yang paling cocok untuk digunakan dalam kasus ini?', '', '4_5_a.PNG', '4_5_b.PNG', '4_5_c.PNG', '4_5_d.PNG', '4_5_e.PNG', 'A', 'Jawabannya adalah A, flowchart yang sesuai adalah A', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_random`
--

CREATE TABLE `tb_random` (
  `id_random` int NOT NULL,
  `id_user` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelompok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_random`
--

INSERT INTO `tb_random` (`id_random`, `id_user`, `nama`, `kelompok`) VALUES
(1, 2, 'Doni', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_test`
--

CREATE TABLE `tb_test` (
  `id_tes` int NOT NULL,
  `nama` varchar(10) NOT NULL,
  `aktif` int NOT NULL,
  `waktu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_test`
--

INSERT INTO `tb_test` (`id_tes`, `nama`, `aktif`, `waktu`) VALUES
(1, 'pretest', 1, 90),
(2, 'posttest', 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `tugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `id_pertemuan`, `tugas`) VALUES
(11, 1, 'Pertemuan1_LKPD.pdf'),
(15, 2, 'Pertemuan2_LKPD.pdf'),
(16, 3, 'Pertemuan3_LKPD_1.pdf'),
(17, 4, 'Pertemuan4_LKPD.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_youtube`
--

CREATE TABLE `tb_youtube` (
  `id_youtube` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `youtube` text NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_youtube`
--

INSERT INTO `tb_youtube` (`id_youtube`, `id_pertemuan`, `youtube`, `kategori`) VALUES
(24, 1, 'kVImCn-aTyQ', 'Materi'),
(25, 3, 'l3W9Im-Xh7A', 'Materi'),
(26, 1, 'vCHEdSsouUc', 'Tugas'),
(27, 2, 'MklBGe4xDms', 'Tugas'),
(28, 2, 'mhbarqRWJeA', 'Tugas'),
(29, 2, '4_VELje0FxI', 'Tugas'),
(30, 3, '/zVX6g4tllLE', 'Tugas'),
(31, 3, 'wOlw_ClenPI', 'Tugas'),
(32, 4, 'uJdzc53WfTU', 'Tugas'),
(33, 1, 'KWDMp6HmvPY', 'Tugas'),
(34, 3, '63Nn67VMlBQ', 'Tugas'),
(35, 2, 'tN0qjzFL7nU', 'Tugas'),
(36, 3, 'rMNviY399ic', 'Tugas'),
(38, 4, '2jZUn6wnH3s', 'Tugas'),
(40, 2, 'Yp4h_i-DZc4', 'Tugas'),
(55, 2, 'kVImCn-aTyQ', 'Materi'),
(59, 4, 'l3W9Im-Xh7A', 'Materi'),
(60, 2, 'l8kItL4ApXM', 'Tugas'),
(61, 1, 'QyhkreCnxNs', 'Orientasi'),
(62, 4, 'EpdhAWN8FOo', 'Orientasi'),
(63, 2, 'ZlJV66Au8h8', 'Orientasi'),
(64, 3, 'c7XRQ4kNtZA', 'Orientasi'),
(65, 1, 'lSuUYM0ImOI', 'Materi'),
(66, 4, 'p9MRYyAuEPY', 'Materi'),
(67, 3, 'Bp6g671QMvg', 'Materi'),
(68, 3, 'bD1Bij7Szxs', 'Materi'),
(69, 3, '_rKl1J49JOw', 'Materi'),
(70, 2, 'rRFD64kwkj4', 'Materi'),
(71, 2, 'r6Opc201vh4', 'Materi'),
(72, 2, 'J-xPPs9YWPI', 'Materi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_attempttest`
--
ALTER TABLE `tb_attempttest`
  ADD PRIMARY KEY (`id_attempt`);

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `tb_globalchat`
--
ALTER TABLE `tb_globalchat`
  ADD PRIMARY KEY (`id_globalchat`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `tb_groupchat`
--
ALTER TABLE `tb_groupchat`
  ADD PRIMARY KEY (`id_groupchat`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `tb_hasilapersepsi`
--
ALTER TABLE `tb_hasilapersepsi`
  ADD PRIMARY KEY (`id_hasilapersepsi`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `tb_hasilprepost`
--
ALTER TABLE `tb_hasilprepost`
  ADD PRIMARY KEY (`id_hasiltest`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_test` (`id_test`);

--
-- Indexes for table `tb_hasilquiz`
--
ALTER TABLE `tb_hasilquiz`
  ADD PRIMARY KEY (`id_hasilquiz`),
  ADD KEY `id_pertemuan` (`id_pertemuan`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_hasilrefleksi`
--
ALTER TABLE `tb_hasilrefleksi`
  ADD PRIMARY KEY (`id_refleksi`),
  ADD KEY `id_pertemuan` (`id_pertemuan`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  ADD PRIMARY KEY (`id_hasiltugas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  ADD PRIMARY KEY (`id_pertemuan`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id` (`id_pengirim`),
  ADD KEY `id_lawan` (`id_lawan`);

--
-- Indexes for table `tb_prepost`
--
ALTER TABLE `tb_prepost`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_test` (`id_test`);

--
-- Indexes for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `tb_random`
--
ALTER TABLE `tb_random`
  ADD PRIMARY KEY (`id_random`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_test`
--
ALTER TABLE `tb_test`
  ADD PRIMARY KEY (`id_tes`);

--
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `tb_youtube`
--
ALTER TABLE `tb_youtube`
  ADD PRIMARY KEY (`id_youtube`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_attempttest`
--
ALTER TABLE `tb_attempttest`
  MODIFY `id_attempt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_globalchat`
--
ALTER TABLE `tb_globalchat`
  MODIFY `id_globalchat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_groupchat`
--
ALTER TABLE `tb_groupchat`
  MODIFY `id_groupchat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasilapersepsi`
--
ALTER TABLE `tb_hasilapersepsi`
  MODIFY `id_hasilapersepsi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasilprepost`
--
ALTER TABLE `tb_hasilprepost`
  MODIFY `id_hasiltest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_hasilquiz`
--
ALTER TABLE `tb_hasilquiz`
  MODIFY `id_hasilquiz` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasilrefleksi`
--
ALTER TABLE `tb_hasilrefleksi`
  MODIFY `id_refleksi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  MODIFY `id_hasiltugas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  MODIFY `id_pertemuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_prepost`
--
ALTER TABLE `tb_prepost`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1225;

--
-- AUTO_INCREMENT for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_random`
--
ALTER TABLE `tb_random`
  MODIFY `id_random` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_test`
--
ALTER TABLE `tb_test`
  MODIFY `id_tes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_youtube`
--
ALTER TABLE `tb_youtube`
  MODIFY `id_youtube` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_akun` (`id`),
  ADD CONSTRAINT `tb_comments_ibfk_2` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`);

--
-- Constraints for table `tb_globalchat`
--
ALTER TABLE `tb_globalchat`
  ADD CONSTRAINT `tb_globalchat_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_groupchat`
--
ALTER TABLE `tb_groupchat`
  ADD CONSTRAINT `tb_groupchat_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_hasilapersepsi`
--
ALTER TABLE `tb_hasilapersepsi`
  ADD CONSTRAINT `tb_hasilapersepsi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`),
  ADD CONSTRAINT `tb_hasilapersepsi_ibfk_2` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`);

--
-- Constraints for table `tb_hasilprepost`
--
ALTER TABLE `tb_hasilprepost`
  ADD CONSTRAINT `tb_hasilprepost_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`),
  ADD CONSTRAINT `tb_hasilprepost_ibfk_2` FOREIGN KEY (`id_test`) REFERENCES `tb_test` (`id_tes`);

--
-- Constraints for table `tb_hasilquiz`
--
ALTER TABLE `tb_hasilquiz`
  ADD CONSTRAINT `tb_hasilquiz_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`),
  ADD CONSTRAINT `tb_hasilquiz_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_hasilrefleksi`
--
ALTER TABLE `tb_hasilrefleksi`
  ADD CONSTRAINT `tb_hasilrefleksi_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`),
  ADD CONSTRAINT `tb_hasilrefleksi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  ADD CONSTRAINT `tb_hasiltugas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`),
  ADD CONSTRAINT `tb_hasiltugas_ibfk_2` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`);

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`);

--
-- Constraints for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `tb_akun` (`id`),
  ADD CONSTRAINT `tb_pesan_ibfk_2` FOREIGN KEY (`id_lawan`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_prepost`
--
ALTER TABLE `tb_prepost`
  ADD CONSTRAINT `tb_prepost_ibfk_1` FOREIGN KEY (`id_test`) REFERENCES `tb_test` (`id_tes`);

--
-- Constraints for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  ADD CONSTRAINT `tb_quiz_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`);

--
-- Constraints for table `tb_random`
--
ALTER TABLE `tb_random`
  ADD CONSTRAINT `tb_random_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD CONSTRAINT `tb_tugas_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`);

--
-- Constraints for table `tb_youtube`
--
ALTER TABLE `tb_youtube`
  ADD CONSTRAINT `tb_youtube_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
