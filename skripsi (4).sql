-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 11:15 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

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
(2, 'johanesalex774@gmail.com', 'Johannes Alexander Putra', '$2y$10$r8PU4EVHmT2HvuJ4rwIUbO/FcnLlJWlhnHmfMFbRMt72XAtJ2LGmy', 1),
(3, 'johannes@upi.edu', 'Putra', '$2y$10$/WBpb0BQ3ho5hQr7xfE0i.uCAhKSCAgdPjDnbK7mOV0FSkdP34BVq', 0),
(11, 'a455lgrowtopia@gmail.com', 'Doni', '$2y$10$hHp.EyY0RSAqFwnkaA1ggOF0FpRXaUQbkytV51yTDU0z9NEFeyiEi', 0),
(12, 'a455dlgrowtopia@gmail.com', 'dr. Udin', '$2y$10$b.6LhS3SlWpOg1.zO5tYYuUH95LWGcffpLTQ4il9nV/dljcKAAzA2', 0),
(13, 'a455wwlgrowtopia@gmail.com', 'dr. Udint', '$2y$10$A53p/6NRbSR3XRxUpATMcuwWUXbHYowBmwtCFq3xsc550B3deVVcK', 0),
(14, 'johannesap@upi.edu', 'Putra Ganteng', '$2y$10$Mym9Y9NXtwk0J2cYv3BJQOKyPDv9NbieLdouiXPN81I42Lf/l.gc.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id` int NOT NULL,
  `pertemuan` int NOT NULL,
  `id_user` int NOT NULL,
  `comment` text NOT NULL,
  `parent_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`id`, `pertemuan`, `id_user`, `comment`, `parent_id`, `created_at`, `updated_at`) VALUES
(10, 1, 14, 'Pertemuan 1 sangat hebat', 0, '2023-06-04 04:24:37', '2023-06-12 00:00:23'),
(11, 1, 14, 'Benar', 10, '2023-06-04 04:24:43', '2023-06-12 00:00:26'),
(12, 1, 14, 'Pertemuan 1 keren mas bro', 0, '2023-06-04 04:24:53', '2023-06-12 00:00:30'),
(13, 1, 14, 'yoi', 10, '2023-06-04 04:25:05', '2023-06-12 00:00:33'),
(14, 1, 14, 'tes', 0, '2023-06-11 02:16:10', '2023-06-12 00:00:36'),
(15, 1, 14, 'masok pa eko', 14, '2023-06-11 02:16:18', '2023-06-12 00:00:39'),
(16, 1, 14, 'tes', 0, '2023-06-11 02:16:30', '2023-06-12 00:00:42'),
(17, 1, 14, 'tess', 0, '2023-06-11 02:22:42', '2023-06-12 00:00:47'),
(18, 1, 14, 'oke', 17, '2023-06-11 02:22:50', '2023-06-12 00:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id_pengirim` int NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `email_pengirim` varchar(255) NOT NULL,
  `pesan_pengirim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id_pengirim`, `nama_pengirim`, `email_pengirim`, `pesan_pengirim`) VALUES
(19, 'Johannes Alexander Putra', 'johannes@upi.edu', 'baguss');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilposttest`
--

CREATE TABLE `tb_hasilposttest` (
  `id_hasilposttest` int NOT NULL,
  `id_siswa` int NOT NULL,
  `jawaban` text NOT NULL,
  `benar` int NOT NULL,
  `salah` int NOT NULL,
  `kosong` int NOT NULL,
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilpretest`
--

CREATE TABLE `tb_hasilpretest` (
  `id_hasilpretest` int NOT NULL,
  `id_siswa` int NOT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `score` int NOT NULL,
  `benar` int NOT NULL,
  `salah` int NOT NULL,
  `kosong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_hasilpretest`
--

INSERT INTO `tb_hasilpretest` (`id_hasilpretest`, `id_siswa`, `jawaban`, `score`, `benar`, `salah`, `kosong`) VALUES
(14, 3, 'opsi_aopsi_c opsi_e             opsi_d  ', 5, 1, 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasiltugas`
--

CREATE TABLE `tb_hasiltugas` (
  `id_hasiltugas` int NOT NULL,
  `nilai` varchar(11) NOT NULL,
  `pertemuan` int NOT NULL,
  `id_siswa` int NOT NULL,
  `komentar` text NOT NULL,
  `text` text NOT NULL,
  `upload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_hasiltugas`
--

INSERT INTO `tb_hasiltugas` (`id_hasiltugas`, `nilai`, `pertemuan`, `id_siswa`, `komentar`, `text`, `upload`) VALUES
(47, '', 1, 3, '', '', '768452b093fe80ccc58feb5b1220d80f.pdf'),
(49, '', 3, 2, '', '', '151ee74d12136a89760dc96fe9d3431f.pdf'),
(53, '100', 1, 14, 'keren bro', '', '3f1da01d781938ad969da5379f6742b9.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int NOT NULL,
  `pertemuan` int NOT NULL,
  `materi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `pertemuan`, `materi`) VALUES
(2, 1, 'Pertemuan1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertemuan`
--

CREATE TABLE `tb_pertemuan` (
  `id_pertemuan` int NOT NULL,
  `pertemuan` int NOT NULL,
  `aktif` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pertemuan`
--

INSERT INTO `tb_pertemuan` (`id_pertemuan`, `pertemuan`, `aktif`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int NOT NULL,
  `id` int NOT NULL,
  `id_lawan` int NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id`, `id_lawan`, `pesan`, `waktu`) VALUES
(18, 3, 2, 'tes', '2023-03-26 02:24:04'),
(19, 3, 2, 'tes', '2023-03-26 02:29:10'),
(20, 3, 2, 'bisa', '2023-03-26 13:31:36'),
(21, 14, 11, 'eee', '2023-05-23 11:23:24'),
(22, 14, 11, 'Ini fitur chat anda', '2023-05-23 11:23:54'),
(23, 14, 3, 'tes', '2023-05-23 12:21:53'),
(24, 14, 11, 'tes', '2023-05-23 12:34:20'),
(25, 14, 11, 'tes', '2023-05-24 02:48:48'),
(26, 2, 3, 'coba', '2023-05-24 03:25:33'),
(27, 2, 3, 't5es', '2023-05-24 03:30:45'),
(28, 2, 3, 'nbisa bro', '2023-05-24 03:34:58'),
(29, 14, 2, 'halo bro', '2023-05-24 03:35:25'),
(30, 2, 14, 'siap', '2023-05-24 03:35:53'),
(31, 14, 2, 'tes', '2023-06-01 12:51:30'),
(32, 14, 2, 'TES', '2023-06-04 04:55:50'),
(33, 14, 2, 'Coba saja', '2023-06-04 04:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posttest`
--

CREATE TABLE `tb_posttest` (
  `id_posttest` int NOT NULL,
  `soal` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `opsi_e` varchar(255) NOT NULL,
  `kunci` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_posttest`
--

INSERT INTO `tb_posttest` (`id_posttest`, `soal`, `gambar`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `kunci`) VALUES
(3, 'Ketika Anda dihadapkan kepada suatu kasus perulangan, apa alasan yang paling  tepat untuk menggunakan perulangan while:', '', 'Jika pada kasus tersebut tidak ada batas awal dan batas akhir', 'Jika perulangan minimal dilakukan satu kali ', 'Jika perulangan minimal dilakukan lebih dari satu kali', 'Jika diberitahu batas awal dan batas akhir', 'Tidak ada jawaban yang tepat', 'opsi_a'),
(4, 'Ketika Anda dihadapkan kepada suatu kasus perulangan, apa alasan yang paling tepat untuk menggunakan perulangan do while:', '', 'Jika tidak ada batas awal dan batas akhir', 'Jika perulangan minimal dilakukan satu kali ', 'Jika perulangan minimal dilakukan lebih dari satu kali', 'Jika diberitahu batas awal dan batas akhir', 'Tidak ada jawaban yang tepat', 'opsi_b'),
(5, 'Jika anda ingin membuat suatu pola seperti pola segitiga anda menggunakan perulangan apa?', '', 'Perulangan bersarang (misal: for di dalam for)', 'Perulangan dengan adanya percabangan', 'Percabangan dengan adanya perulangan', 'Percabangan dengan switch', 'Percabangan dengan for', 'opsi_a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pretest`
--

CREATE TABLE `tb_pretest` (
  `id_pretest` int NOT NULL,
  `soal` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `opsi_e` varchar(255) NOT NULL,
  `kunci` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pretest`
--

INSERT INTO `tb_pretest` (`id_pretest`, `soal`, `gambar`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `kunci`) VALUES
(9, 'Apa keluaran code di bawah ini?', '1.png', 'angkamu lebih kecil dari lima', 'Error', 'angkamu lebih kecil dari sembilan', 'angkamu lebih kecil sama atau dengan sepuluh', 'tidak ada jawaban yang tepat', 'opsi_e'),
(10, 'Apa keluaran code di bawah ini?', '2.png', '60', '30', '120', '150', '720', 'opsi_a'),
(11, 'Apa keluaran code di bawah ini?', '3.png', 'error', 'aku capybara', 'aku juga capybara', 'aku capybaraaku capybara tapi versi Indonesiaakujugacapybara', 'Tidak ada jawaban yang benar', 'opsi_a'),
(12, 'Mana di bawah ini yang bukan penamaan variable yang tepat', '', '_', '_Blue', 'blue$', 'blue', '2blue', 'opsi_e'),
(13, 'Wijoyo adalah seorang mahasiswa jurusan pendidikan ilmu komputer, saat ini wijoyo sedang mencoba untuk mengerjakan skripsinya, wijoyo ingin membuat suatu aplikasi yang memudahkan pembuatan skripsinya. Dalam salah satu fitur skripsinya akan membuat suatu percabangan code apa yang pertama kali wijoyo butuhkan saat akan membuat struktur percabangan', '', 'Inisialisasi angka awal', 'Pengecekan Kondisi', 'Output dari suatu program', 'Kondisi jika salah', 'Kondisi jika benar', 'opsi_a'),
(14, 'Apa Informasi yang diperlukan untuk membuat pola seperti ini:', '6.PNG', 'Batas awal dan batas akhir', 'Batas awal saja', 'Batas akhir saja', 'Tidak ada Informasi yang tepat', 'inisialisasi angka awal', 'opsi_a'),
(15, 'Apa Keluaran Code di bawah ini?', '7.png', '7 6 5 3 1', '7 5 6 3 1', '1 3 5 6 7', '1 5 3 6 7', 'Tidak ada jawaban yang tepat', 'opsi_c'),
(16, 'Apa keluaran Program di bawah ini', '8.png', '7, 6, 5, 3, 1,', '1, 5,  3 , 6,  7,', '1, 3, 5, 6, 7,', '7, 5, 6, 3, 1,', 'Tidak ada jawaban yang tepat', 'opsi_a'),
(17, 'Apa Keluaran Code di bawah ini', '9.png', '6, 5, 3, 1, 7,', '6, 5, 3, 7, 1,', '5, 6, 3, 1, 7,', '5, 6, 3, 7, 1,', 'Tidak ada jawaban yang tepat', 'opsi_a'),
(18, 'Apa Keluaran Code di bawah ini', '10.png', '7, 6, 5, 3, 1,', '7, 6, 5, 1, 3,', '6, 7, 5, 3, 1,', '7, 5, 6, 3, 1,', 'Tidak ada jawaban yang tepat', 'opsi_a'),
(19, 'Amay adalah seorang anak yang sedang mempelajari konsep perulangan dalam pemrograman. Amay mencoba untuk mengerjakan soal yang diberikan oleh gurunya. Dalam soal tersebut diberikan sebuah batas awal dan batas akhir. Apa perulangan yang bisa Amay gunakan untuk menyelesaikan soal tersebut?', '', 'While', 'For', 'Do While', 'Tidak ada jawaban yang tepat', 'semua', 'opsi_e'),
(20, 'Bagaimana Agar Code yang dihasilkan menghasilkan keluaran berupa Lebih kecil atau sama dengan dua belas', '12.png', 'memakai break setelah percabangan', 'menggunakan else if', 'kode dibiarkan saja karena sudah benar', 'tidak ada jawaban yang benar', 'semua jawaban benar', 'opsi_d'),
(21, 'Baris yang mana yang pertama kali menghasilkan error?', '13.png', 'Line 1', 'Line 2', 'Line 3', 'Line 4', 'Line 5', 'opsi_a'),
(22, 'Line berapa yang pertama kali menghasilkan error?', '14.png', 'Line 1', 'Line 2', 'Line 3', 'Line 4', 'Line 4', 'opsi_b'),
(23, 'Miftah merupakan seorang siswa dari Teknik informatika ITB, ia mencoba membuat program perulangan. Miftah menginginkan suatu output dikeluarkan minimal satu kali. jenis perulangan apakah yang akan miftah gunakan?', '', 'for each', 'while do', 'do while', 'for', 'while', 'opsi_c'),
(24, 'Mas Bro adalah seekor Capybara yang senang belajar perulangan. Ia senang sekali melakukan perulangan kegiatan, tapi mas bro ini tidak bisa menghafal angka-angka sehingga ia tidak tahu berapa kali ia harus melakukan perulangan. Mas bro akan berhenti melakukan perulangan ketika mas bro sudah merasa lelah, kira-kira mas bro menggunakan konsep perulangan apa?', '', 'Iterasi', 'For', 'While', 'Do While', 'For each', 'opsi_c'),
(25, 'Geri adalah seekor capybara tidak menyukai makan makanan manis ketika ia memakan makanan yang manis maka akan sakit akan tetapi jika geri memakan makanan yang asin geri akan biasa saja, dan jika geri tidak makan apa-apa geri akan kelaparan dalam kondisi ini ada berapa if ?', '', 'Ada 2', 'Ada 1', 'Ada 3', 'Ada 4', 'Ada 0', 'opsi_c'),
(26, 'Joni merupakan seekor capybara yang sedang belajar menghitung jumlah hari pada bulan februari.bantulah joni membuat kondisi yang menyatakan suatu tahun itu adalah kabisat', '', 'if( tahun % 100 == 0)', 'if(tahun % 100 != 0 && tahun % 400 == 0 && tahun % 4 == 0)', 'Tidak ada jawaban', 'if(tahun % 4 == 0)', 'Semua Jawaban Benar', 'opsi_c'),
(27, 'Hafil adalah seorang pencinta anime. Suatu ketika hafil hendak menentukan pilihan anime yang akan ditontonnya jika ditentukan bahwa hari senin adalah 1, selasa adalah 2,  rabu adalah 3 , dan seterusnya. Kira-kira percabangan apakah yang paling cocok, efektif, dan hemat code untuk hafil gunakan?', '', 'Percabangan Tunggal', 'Percabangan Bersarang', 'Percabangan Bertingkat', 'Switch', 'Semua percabangan yang disebutkan di atas sama efektifnya', 'opsi_d'),
(28, 'Dibaris keberapa yang pertama kali menyebabkan keluaran yang tidak diinginkan', '20.png', 'line 1', 'line 2', 'line 3', 'line 4', 'Code Berjalan dengan aman', 'opsi_c');

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
(80, 3, 'Putra', 1),
(81, 11, 'Doni', 2),
(82, 12, 'dr. Udin', 3),
(83, 13, 'dr. Udint', 4),
(84, 14, 'Putra Ganteng', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_test`
--

CREATE TABLE `tb_test` (
  `id_tes` int NOT NULL,
  `nama` varchar(10) NOT NULL,
  `aktif` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_test`
--

INSERT INTO `tb_test` (`id_tes`, `nama`, `aktif`) VALUES
(1, 'pretest', 0),
(2, 'posttest', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int NOT NULL,
  `pertemuan` int NOT NULL,
  `tugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `pertemuan`, `tugas`) VALUES
(5, 1, 'Tugas_1.pdf'),
(6, 2, 'Tugas_2.pdf'),
(7, 3, 'Tugas_3.pdf'),
(8, 4, 'tugas4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_youtube`
--

CREATE TABLE `tb_youtube` (
  `id_materi` int NOT NULL,
  `pertemuan` int NOT NULL,
  `youtube` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_youtube`
--

INSERT INTO `tb_youtube` (`id_materi`, `pertemuan`, `youtube`) VALUES
(7, 1, 'eJjPpqgXBYU'),
(8, 1, 'JprBFnCqWfQ'),
(9, 1, 'ZPd-ShDM1us'),
(11, 1, 'QyvMLEYQoYE'),
(12, 1, 'wBIiRds7qFw'),
(13, 2, '-Fz6Mn9sSMo');

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
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `tb_hasilposttest`
--
ALTER TABLE `tb_hasilposttest`
  ADD PRIMARY KEY (`id_hasilposttest`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_hasilpretest`
--
ALTER TABLE `tb_hasilpretest`
  ADD PRIMARY KEY (`id_hasilpretest`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  ADD PRIMARY KEY (`id_hasiltugas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`);

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
  ADD KEY `id` (`id`),
  ADD KEY `id_lawan` (`id_lawan`);

--
-- Indexes for table `tb_posttest`
--
ALTER TABLE `tb_posttest`
  ADD PRIMARY KEY (`id_posttest`);

--
-- Indexes for table `tb_pretest`
--
ALTER TABLE `tb_pretest`
  ADD PRIMARY KEY (`id_pretest`);

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
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tb_youtube`
--
ALTER TABLE `tb_youtube`
  ADD PRIMARY KEY (`id_materi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id_pengirim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_hasilposttest`
--
ALTER TABLE `tb_hasilposttest`
  MODIFY `id_hasilposttest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_hasilpretest`
--
ALTER TABLE `tb_hasilpretest`
  MODIFY `id_hasilpretest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  MODIFY `id_hasiltugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  MODIFY `id_pertemuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_posttest`
--
ALTER TABLE `tb_posttest`
  MODIFY `id_posttest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pretest`
--
ALTER TABLE `tb_pretest`
  MODIFY `id_pretest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_random`
--
ALTER TABLE `tb_random`
  MODIFY `id_random` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_test`
--
ALTER TABLE `tb_test`
  MODIFY `id_tes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_youtube`
--
ALTER TABLE `tb_youtube`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_hasilposttest`
--
ALTER TABLE `tb_hasilposttest`
  ADD CONSTRAINT `tb_hasilposttest_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_hasilpretest`
--
ALTER TABLE `tb_hasilpretest`
  ADD CONSTRAINT `tb_hasilpretest_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  ADD CONSTRAINT `tb_hasiltugas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tb_akun` (`id`),
  ADD CONSTRAINT `tb_pesan_ibfk_2` FOREIGN KEY (`id_lawan`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_random`
--
ALTER TABLE `tb_random`
  ADD CONSTRAINT `tb_random_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
