-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2023 at 02:30 PM
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
  `role` int NOT NULL,
  `pretest` int DEFAULT NULL,
  `posttest` int DEFAULT NULL,
  `tugas_1` int DEFAULT NULL,
  `tugas_2` int DEFAULT NULL,
  `tugas_3` int DEFAULT NULL,
  `tugas_4` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `email`, `nama`, `password`, `role`, `pretest`, `posttest`, `tugas_1`, `tugas_2`, `tugas_3`, `tugas_4`) VALUES
(2, 'johanesalex774@gmail.com', 'Johannes Alexander Putra', '$2y$10$lxlUu/bTxPyE/ZYr5k6tB.g0q9MHa8CAvTToDCJc0nCZ6HpYigWM2', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'johannes@upi.edu', 'Putra', '$2y$10$jUdluVMq/zoW1eob56Md9OmVHGnxvdPWwz3n2djYZX3ZRl9HOp.YW', 0, NULL, NULL, 100, NULL, NULL, NULL),
(11, 'a455lgrowtopia@gmail.com', 'Doni', '$2y$10$9GdFYSOfqLIqzyEE00dQ3e6aGK9jhPks7mcMJU7cw.F2WoNodCd4m', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'a455dlgrowtopia@gmail.com', 'Kevin', '$2y$10$c4zrWxv6sJCiJGkbPjMruu318b.2sqwVLxGHNVNnLHQPu9B6ezqk2', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'a455wwlgrowtopia@gmail.com', 'Jie', '$2y$10$.sl9.MQ49Ob.LB1rOexO3eQPQwZli2PSGD8lwIUF5QfFeg5Fc/ZqS', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'johannesap@upi.edu', 'Kevina', '$2y$10$zROPeT9UQPHQpst1ArZimONOT7TLSPVyTHiAiC3KRhckBQKvpvKTG', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'dian@upi.edu', 'Dian Lestari,M.Pd.', '$2y$10$mRVEfFIqL//Kj03/cLqCwuCzuRRP1JVP2orr5bMPzFFDe41261t96', 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `id_user` int NOT NULL,
  `comment` text NOT NULL,
  `parent_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`id`, `id_pertemuan`, `id_user`, `comment`, `parent_id`, `created_at`, `updated_at`) VALUES
(10, 1, 14, 'Pertemuan 1 sangat hebat', 0, '2023-06-04 04:24:37', '2023-06-12 00:00:23'),
(11, 1, 14, 'Benar', 10, '2023-06-04 04:24:43', '2023-06-12 00:00:26'),
(12, 1, 14, 'Pertemuan 1 keren mas bro', 0, '2023-06-04 04:24:53', '2023-06-12 00:00:30'),
(13, 1, 14, 'yoi', 10, '2023-06-04 04:25:05', '2023-06-12 00:00:33'),
(14, 1, 14, 'tes', 0, '2023-06-11 02:16:10', '2023-06-12 00:00:36'),
(15, 1, 14, 'masok pa eko', 14, '2023-06-11 02:16:18', '2023-06-12 00:00:39'),
(16, 1, 14, 'tes', 0, '2023-06-11 02:16:30', '2023-06-12 00:00:42'),
(17, 1, 14, 'tess', 0, '2023-06-11 02:22:42', '2023-06-12 00:00:47'),
(18, 1, 14, 'oke', 17, '2023-06-11 02:22:50', '2023-06-12 00:00:49'),
(19, 1, 16, 'mencoba', 0, '2023-06-28 12:52:30', '2023-06-28 12:52:30'),
(20, 1, 16, 'bisa dian', 19, '2023-06-28 12:52:38', '2023-06-28 12:52:38'),
(21, 2, 16, 'tes ini pertemuan 2', 0, '2023-06-28 12:59:42', '2023-06-28 12:59:42'),
(22, 2, 16, 'Bisa bu', 21, '2023-06-28 12:59:49', '2023-06-28 12:59:49'),
(23, 3, 16, 'Ini pertemuan3', 0, '2023-06-28 13:07:17', '2023-06-28 13:07:17'),
(24, 3, 16, 'bener dian', 23, '2023-06-28 13:07:23', '2023-06-28 13:07:23'),
(25, 4, 16, 'ini pert 4', 0, '2023-06-28 13:14:11', '2023-06-28 13:14:11'),
(26, 4, 16, 'betul dian', 25, '2023-06-28 13:14:18', '2023-06-28 13:14:18'),
(27, 1, 2, 'ini komentar1', 0, '2023-06-29 00:19:50', '2023-06-29 00:19:50'),
(28, 1, 2, 'benar jo', 27, '2023-06-29 00:19:56', '2023-06-29 00:19:56'),
(29, 2, 2, 'pertemuan 2 ini', 0, '2023-06-29 00:24:47', '2023-06-29 00:24:47'),
(30, 2, 2, 'betul', 29, '2023-06-29 00:25:19', '2023-06-29 00:25:19'),
(31, 3, 2, 'komentar3', 0, '2023-06-29 00:25:33', '2023-06-29 00:25:33'),
(32, 3, 2, 'benar joss', 31, '2023-06-29 00:25:41', '2023-06-29 00:25:41'),
(33, 4, 2, 'tes', 0, '2023-06-29 00:25:49', '2023-06-29 00:25:49'),
(34, 4, 2, '123', 33, '2023-06-29 00:25:53', '2023-06-29 00:25:53'),
(35, 1, 2, 'tes ini pertemuan 1', 0, '2023-06-29 02:12:17', '2023-06-29 02:12:17'),
(36, 1, 2, 'masuk johanes', 35, '2023-06-29 02:12:26', '2023-06-29 02:12:26'),
(37, 2, 2, 'ini pertemuan 2 bu', 0, '2023-06-29 02:12:34', '2023-06-29 02:12:34'),
(38, 2, 2, 'betul', 37, '2023-06-29 02:12:38', '2023-06-29 02:12:38'),
(39, 1, 16, 'Ini pertemuan 1 via baru', 0, '2023-06-29 03:45:06', '2023-06-29 03:45:06'),
(40, 1, 16, 'yoi', 39, '2023-06-29 03:56:00', '2023-06-29 03:56:00'),
(41, 1, 16, 'dd', 0, '2023-06-29 03:56:15', '2023-06-29 03:56:15'),
(42, 1, 16, 'ee', 41, '2023-06-29 03:56:23', '2023-06-29 03:56:23'),
(43, 1, 16, 'tes', 0, '2023-06-29 04:13:20', '2023-06-29 04:13:20'),
(44, 1, 16, 'masuk', 43, '2023-06-29 04:13:31', '2023-06-29 04:13:31'),
(45, 1, 2, 'r', 0, '2023-06-30 12:13:47', '2023-06-30 12:13:47'),
(46, 1, 2, 'yey', 45, '2023-06-30 12:13:53', '2023-06-30 12:13:53'),
(47, 1, 16, 'dd', 0, '2023-06-30 12:30:57', '2023-06-30 12:30:57'),
(48, 1, 16, 'eess', 47, '2023-06-30 12:31:04', '2023-06-30 12:31:04');

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
-- Table structure for table `tb_globalchat`
--

CREATE TABLE `tb_globalchat` (
  `id` int NOT NULL,
  `sender_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_globalchat`
--

INSERT INTO `tb_globalchat` (`id`, `sender_id`, `message`, `created_at`) VALUES
(5, 2, 'gt4es', '2023-06-18 13:27:51'),
(6, 14, 'tes', '2023-06-18 13:30:25'),
(7, 14, 'masuk', '2023-06-18 13:39:47'),
(8, 2, 'pp', '2023-06-19 12:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_groupchat`
--

CREATE TABLE `tb_groupchat` (
  `id` int NOT NULL,
  `sender_id` int NOT NULL,
  `message` text NOT NULL,
  `kelompok` int NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilprepost`
--

CREATE TABLE `tb_hasilprepost` (
  `id_hasiltest` int NOT NULL,
  `id_siswa` int NOT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `score` int NOT NULL,
  `benar` int NOT NULL,
  `salah` int NOT NULL,
  `kosong` int NOT NULL,
  `id_test` int NOT NULL
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
  `komentar` text NOT NULL,
  `text` text NOT NULL,
  `upload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_hasiltugas`
--

INSERT INTO `tb_hasiltugas` (`id_hasiltugas`, `nilai`, `id_pertemuan`, `id_siswa`, `komentar`, `text`, `upload`) VALUES
(47, 100, 1, 3, '', '', '768452b093fe80ccc58feb5b1220d80f.pdf'),
(49, NULL, 3, 2, '', '', '151ee74d12136a89760dc96fe9d3431f.pdf'),
(53, NULL, 1, 14, 'keren bro', '', '3f1da01d781938ad969da5379f6742b9.pdf'),
(63, 100, 4, 16, '', 'tes', 'aaf72886eee2ed76370e99922aef83a8.pdf'),
(65, NULL, 1, 16, '', 'Ini tugas Pertemuan 1 ya bang', '0117976242289395c09886aaf5c32e63.pdf'),
(67, NULL, 3, 16, '', 'Pertemuan 3', '7cad9a792639ad06a8dd6048c0dc213b.pdf'),
(68, NULL, 2, 16, '', '', 'b0d5549652faf0aa13160e8f9b4fb5ca.pdf'),
(69, NULL, 2, 3, '', 'tes', 'faf9dd846a404f0e686a37e74c5a0fca.pdf');

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
(6, 1, 'Pertemuan1.pdf'),
(7, 2, 'Pertemuan2.pdf'),
(8, 3, 'Pertemuan3.pdf'),
(9, 4, 'Pertemuan4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertemuan`
--

CREATE TABLE `tb_pertemuan` (
  `id_pertemuan` int NOT NULL,
  `pertemuan` int NOT NULL,
  `aktif` int NOT NULL,
  `tp` text NOT NULL,
  `videoconference` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pertemuan`
--

INSERT INTO `tb_pertemuan` (`id_pertemuan`, `pertemuan`, `aktif`, `tp`, `videoconference`) VALUES
(1, 1, 1, '<li> Memahami permasalahan yang berkaitan dengan flowchart  </li>\r\n<li> Menentukan pemecahan masalah dengan flowchart </li>\r\n<li> Melakukan implementasi flowchart untuk suatu permasalahan </li>\r\n<li> Melakukan evaluasi terhadap penggunaan flowchart </li>\r\n<li> Memahami permasalahan yang berkaitan dengan pseudocode </li>\r\n<li> Menentukan pemecahan masalah dengan pseudocode </li>\r\n<li> Melakukan implementasi flowchart untuk suatu pseudocode </li>\r\n<li> Melakukan evaluasi terhadap penggunaan pseudocode </li>\r\n', 'https://meet.jit.si/OffensiveHurricanesOccurHalf'),
(2, 2, 0, '<li> Memahami permasalahan yang berkaitan dengan variable </li>\r\n<li> Menentukan pemecahan masalah dengan variable </li> \r\n<li> Melakukan implementasi variable untuk suatu permasalahan </li> \r\n<li> Melakukan evaluasi terhadap penggunaan variable </li> \r\n<li> Memahami permasalahan yang berkaitan dengan tipe data </li> \r\n<li> Menentukan pemecahan masalah dengan tipe data </li> \r\n<li> Melakukan implementasi tipe untuk suatu masalah </li> \r\n<li> Melakukan evaluasi terhadap penggunaan tipe data </li> \r\n<li> Memahami permasalahan yang berkaitan dengan input output </li> \r\n<li> Menentukan pemecahan masalah dengan input output </li> \r\n<li> Melakukan implementasi input output untuk suatu masalah </li> \r\n<li> Melakukan evaluasi terhadap penggunaan input output </li>', NULL),
(3, 3, 0, ' <li> Memahami permasalahan yang berkaitan dengan operator </li>  \r\n<li> Menentukan pemecahan masalah dengan operator </li>  \r\n<li> Melakukan implementasi operator untuk suatu permasalahan </li>  \r\n<li> Melakukan evaluasi terhadap penggunaan operator </li>  \r\n<li> Memahami permasalahan yang berkaitan dengan percabangan </li>  \r\n<li> Menentukan pemecahan masalah dengan percabangan </li>  \r\n<li> Melakukan implementasi percabangan untuk suatu permasalahan </li>  \r\n<li> Melakukan evaluasi terhadap penggunaan percabangan </li>', NULL),
(4, 4, 0, '<li> Memahami permasalahan yang berkaitan dengan perulangan </li> \r\n<li> Menentukan pemecahan masalah dengan perulangan </li> \r\n<li> Melakukan implementasi perulangan untuk suatu permasalahan </li> \r\n<li> Melakukan evaluasi terhadap penggunaan perulangan </li>', NULL);

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
(33, 14, 2, 'Coba saja', '2023-06-04 04:55:57'),
(34, 2, 11, 'sss', '2023-06-19 12:32:49'),
(35, 2, 11, 'tes', '2023-06-30 06:47:17'),
(36, 3, 12, 'tes', '2023-07-07 15:19:08'),
(37, 2, 11, 'tes', '2023-07-09 01:54:35');

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
  `id_test` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_prepost`
--

INSERT INTO `tb_prepost` (`id_soal`, `soal`, `gambar`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `kunci`, `id_test`) VALUES
(1, 'Mr Rubin merupakan seorang programmer yang kurang begitu mahir dalam membuat dan merancang suatu program, kurang mahir nya Mr Rubin disebabkan Mr Rubin kurang mengerti untuk menggambarkan suatu algoritma dengan objek-objek geometri Jadi apa permasalahan Mr Rubin? ', '', 'Mr Rubin kurang memahami pseudocode', 'Mr Rubin kurang memahami bahasa pemrograman', 'Mr Rubin kurang memahami deskripsi formal', 'Mr Rubin kurang memahami diagram alir', 'Mr Rubin kurang memahami bahasa formal', 'opsi_d', 1),
(2, 'Mr Rubin merupakan seorang programmer yang kurang begitu mahir dalam membuat dan merancang suatu program, kurang mahir nya Mr Rubin disebabkan Mr Rubin kurang mengerti bahasa penghubung yang merupakan penggabungan antara Bahasa Pemrograman dengan Bahasa Manusia, Jadi apa permasalahan Mr Rubin? ', '', 'Mr Rubin kurang memahami pseudocode', 'Mr Rubin kurang memahami bahasa pemrograman', 'Mr Rubin kurang memahami flowchart diagram', 'Mr Rubin kurang memahami diagram alir', 'Mr Rubin kurang memahami persoalan', 'opsi_a', 1),
(3, 'Mr Rupert merupakan seorang karyawan di bidang ekspedisi. Setiap hari ia membutuhkan container untuk mengangkut barang. Dalam dunia pemrograman programmer membutuhkan suatu tempat untuk menampung sebuah nilai. Apa yang diperlukan programmer tersebut?', '', 'Sebuah Variable', 'Sebuah konstanta', 'Sebuah tipe data', 'Sebuah proses', 'Sebuah inputan', 'opsi_a', 1),
(4, 'Tipe data double akan anda gunakan ketika', '', 'Sesuatu yang ditampung berupa bilangan bulat', 'Sesuatu yang ditampung berupa desimal', 'Sesuatu yang ditampung berupa kalimat', 'Sesuatu yang ditampung berupa benar/salah', 'Sesuatu yang ditampung berupa Objek', 'opsi_b', 1),
(5, 'Dalam Bahasa Pemrograman C++ untuk memasukan suatu nilai ke dalam variable kita menggunakan ... dan saat kita akan mencetak nilai kita menggunakan …. ', '', 'input dan output', 'cout dan cin', 'cin dan cout', 'scanner dan system.out.print', 'readline dan echo', 'opsi_c', 1),
(6, 'Operator apakah yang digunakan untuk menghitung sisa bagi?', '', 'Operator Modulo (%)', 'Operator Plus (#)', 'Operator Modulo (^)', 'Operator Modulo (@)', 'Operator Modulo (&)', 'opsi_a', 1),
(7, 'Fiona adalah seorang mahasiswi sastra korea yang sangat menyukai kpop, Ia sangat menyukai boyband dari korea. Setiap hari senin sampai jumat ia mendengarkan lagu dari EXO sedangkan sabtu dan minggu ia mendengarkan lagu dari BTS. Jika ingin dibuatkan dalam program pilihan menggunakan kita-kira algoritma  apa yang dipergunakan?', '', 'Percabangan dua kasus', 'Percabangan tunggal', 'Percabangan bertingkat', 'Percabangan Switch', 'Percabangan bersarang', 'opsi_a', 1),
(8, 'Miftah merupakan seorang siswa dari Teknik informatika ITB, ia mencoba membuat program perulangan. Miftah menginginkan suatu output dikeluarkan minimal satu kali. jenis perulangan apakah yang akan miftah gunakan?', '', 'do while', 'for each', 'for', 'while', 'while do', 'opsi_a', 1),
(9, 'Mr X merupakan seorang agen rahasia, dalam menjalankan pekerjaannya Mr X. Selalu membuat program yang membantu dalam pemecahan masalahnya. Mr X merupakan seseorang yang kurang bisa memahami tulisan tetapi lebih mudah memahami gambar, Apa yang diperlukan Mr X sebelum membuat program? ', '', 'Mr X. membuat pseudocode untuk program tersebut', 'Mr X. membuat program dalam bahasa pemrograman C++', 'Mr X. membuat flowchart diagram', 'Mr X. mencoba untuk mencompile program', 'Mr X. mencoba untuk mencompile program', 'opsi_c', 1),
(10, 'Mr X merupakan seorang agen rahasia, dalam menjalankan pekerjaannya Mr X. Selalu membuat program yang membantu dalam pemecahan masalahnya. Dalam perancangan program Mr. X memerlukan suatu bahasa yang disebut bahasa percampuran antara bahasa formal dan bahasa pemrograman. Apa yang diperlukan oleh Mr X. tersebut?  ', '', 'Mr X. membuat pseudocode untuk program tersebut', 'Mr X. membuat program dalam bahasa pemrograman C++', 'Mr X. membuat flowchart diagram', 'Mr X. mencoba untuk mencompile program', 'Mr X. membuat definisi formal', 'opsi_a', 1),
(11, 'Mr Rupert merupakan seorang karyawan di bidang ekspedisi. Suatu ketika Mr Rupert ingin memasukan binatang, barang elektronik, kosmetik, dan makanan. Dalam dunia pemrograman jika kita memiliki kasus serupa apa yang harus kita lakukan?', '', 'Memasukan secara bersamaan keempat jenis tersebut dalam suatu tempat', 'Memisahkan dan memasukan menurut jenis barang masing-masing dalam variable yang berbeda', 'Memasukan dan memilah keempat jenis tersebut menurut beratnya', 'Memasukan dan memilah menurut jenisnya masing-masing', 'Mengelompokan berdasarkan kegunaan barang tersebut', 'opsi_b', 1),
(12, 'Geri merupakan siswa teladan di SMAN 17 Bandung, Geri kebinggungan dalam menentukan sebuah tipe data yang digunakan untuk menampung lebih dari satu karakter alias sebuah kata. Kira-kira tipe data apa yang sesuai dengan kasus Geri?', '', 'String', 'Char', 'Integer', 'Double ', 'Boolean', 'opsi_a', 1),
(13, 'Geri merupakan siswa teladan di SMAN 17 Bandung, Geri kebinggungan dalam memprint 3  buah nilai pada bahasa pemrograman C++ dengan baris yang terpisah bagaimana cara yang harus geri lakukan?', '', 'menggunakan cout<< “…. \\n”', 'menggunakan cout<<”…. /n”', 'menggunakan cin << “…”', 'menggunakan cin>> “…/n”', 'menggunakan cin<<”…/n”', 'opsi_a', 1),
(14, 'Hilda merupakan seseorang wanita yang lahir pada tanggal 29 Februari yaitu bertepatan dengan hari kabisat. Perhitungan hari kabisat sangat berhubungan dengan suatu operator aritmatika, Operator Apakah itu?', '', 'Operator Pembagian (/)', 'Operator Plus (+)', 'Operator Modulo (%)', 'Operator Perkalian (*)', 'Operator Perpangkatan(^)', 'opsi_c', 1),
(15, 'Hafil adalah seorang pencinta anime. Suatu ketika hafil hendak menentukan pilihan anime yang akan ditontonnya jika ditentukan bahwa hari senin adalah 1, selasa adalah 2, rabu adalah 3 , dan seterusnya. Kira-kira percabangan apakah yang paling cocok, efektif, dan hemat code untuk hafil gunakan?	', '', 'Percabangan Tunggal	', 'Percabangan Bersarang	', 'Percabangan Bertingkat', 'Gabungan percabangan tunggal', 'Switch', 'Opsi_e', 1),
(16, 'Apa Informasi yang diperlukan untuk membuat pola seperti ini? ', 'pola_segitiga.png', 'Batas awal dan batas akhir', 'Batas Awal', 'Batas Akhir', 'Inisialisasi angka awal', 'Tidak ada jawaban yang tepat', 'opsi_a', 1),
(17, 'Pada Flowchart di bawah ini, apa yang perlu ditambahkan agar sesuai dengan masalah yang diberikan?', 'flowchart_tidakselesai.png', 'Objek berupa persegi dengan isi sisa bagi sama dengan 1', 'Objek berupa lingkaran dengan isi sisa bagi sama dengan 0', 'Objek berupa belah ketupat dengan isi sisa bagi sama dengan 0', 'Objek berupa belah ketupat dengan isi sisa bagi sama dengan 1', 'Objek berupa jajar genjang dengan isi sisa bagi sama dengan 0', 'opsi_c', 1),
(18, 'Pada Pseudocode di bawah ini, apa yang perlu ditambahkan agar sesuai dengan masalah yang diberikan?', 'pseudo_upah.png', 'Menambahkan JJK : integer {jumlah jam kerja} dalam DEKLARASI', 'Menambahkan JJK : integer {jumlah jam kerja} dan lembur : integer {jumlah jam lembur} dalam DEKLARASI', 'Menambahkan JJK : integer {jumlah jam kerja} dalam ALGORITMA', 'Menambahkan lembur : integer {jumlah jam lembur} dalam DEKLARASI', 'Menambahkan JJK : integer {jumlah jam kerja} dan lembur : integer {jumlah jam lembur} dalam ALGORITMA', 'opsi_b', 1),
(19, 'Apa yang harus dilengkapi pada potongan kode berikut agar kode dapat berjalan dengan sempurna?', 'tambahkan_deklarasi.png', 'tambahkan deklarasi untuk y, z, dan a ', 'tambahkan insialisasi untuk y', 'tambahkan deklarasi dan inisialisasi untuk y dan z', 'tambahkan inisitalisasi untuk y, z,dan x', 'tambahkan deklarasi dan inisialisasi untuk y z dan a', 'opsi_e', 1),
(20, 'Apa yang perlu diubah dan dilengkapi dari source di bawah ini agar dapat menghasilkan output berupa “Selamat Datang”?', 'tambahkan_tipedata.png', 'Baris 4 dihapus saja', 'Buat deklarasi dan inisialisasi char y = “Selamat Datang”', 'Buat deklarasi dan inisialisasi string y  = “Selamat Datang”', 'Opsi A dan C benar', 'Opsi A dan B benar.', 'opsi_d', 1),
(21, 'Lengkapi code di bawah ini agar mengeluarkan output berupa Hallo Programmer', 'lengkapi_hallo.png', 'tambahkan line cout<< x + ', 'tambahkan line cout<<x; dan cout<< y;', 'tambahkan line cin>> x; cin>>y;', 'tambahkan line cout<< x; dan cin>> y', 'tambahkan line cout<<x.y', 'opsi_a', 1),
(22, 'Apa keluaran source code berikut ini', 'output_operator.png', '1 alias true', '1 alias false', '0 alias true', '0 alias false', 'Hasil tidak terdefinisikan dan menghasilkan error', 'opsi_a', 1),
(23, 'Kira-kira apa keluaran dari program berikut ini?', 'switch_kapibara.png', 'Error', 'aku capybara	', 'aku capybara tapi versi indonesia', 'aku juga capybara', 'aku capybara aku cabybara tapi versi indonesia aku juga capybara', 'opsi_a', 1),
(24, 'Apa keluaran program di bawah ini?', 'perulangan_modulos.png', '60', '120', '30', '720', '240', 'opsi_a', 1),
(25, 'Telaah flowchart di bawah ini, kira-kira apa yang salah pada flowchart di bawah ini?', 'kesalahan_flowchart.png', 'Bagian input A dan B harusnya berupa jajar genjang karena berupa input', 'Bagian cetak nilai c harusnya berupa persegi panjang karena merupakan proses', 'Bagian start harusnya ditulis dengan mulai', 'Bagian end harusnya ditulis dengan selesai', 'Bagian start dan end harusnya ditulis mulai dan selesai', 'opsi_a', 1),
(26, 'Telaah Pseudocode di bawah ini, kira-kira apa yang salah pada pseudocode di bawah ini?', 'kesalahan_pseu.png', 'bagian A < B seharusnya ditulis A > B karena nilai A harus lebih kecil dari B', 'bagian A > C seharusnya ditulis A < C karena nilai A harus lebih kecil dari C	', 'bagian A < B seharusnya ditulis A > B karena nilai A harus lebih kecil dari B', 'bagian A < B seharusnya ditulis A > B karena nilai A harus lebih besar dari B dan bagian B > A seharusnya ditulis B < A karena  B harus lebih kecil dari A', 'bagian A < B seharusnya ditulis A > B karena nilai A harus lebih besar dari B dan bagian B < C seharusnya ditulis B >  C karena  B harus lebih besar dari C', 'opsi_e', 1),
(27, 'Apa kesalahan potongan kode di bawah ini?', 'kesalahan_variable.png', 'Belum ada deklarasi untuk y, z, dan a ', 'Belum ada insialisasi untuk y', 'Belum ada deklarasi dan inisialisasi untuk x dan z', 'Belum ada deklarasi dan inisialisasi untuk y dan z', 'Belum ada deklarasi dan inisialisasi untuk y z dan a', 'opsi_d', 1),
(28, 'Apa kesalahan kode di bawah ini? ', 'kesalahan_tipedata.png', 'x dideklarasi dua kali', 'char seharusnya berupa karakter buka kalimat', 'integer seharusnya berupa bilangan bulat', 'opsi A,B, dan C benar', 'Opsi A, B, dan C benar dan seharusnya a tidak boleh menampung karakter', 'opsi_d', 1),
(29, 'Apa kesalahan kode di bawah ini?', 'kesalahan_operator.png', 'Kita tidak dapat mengabungkan char dengan operator + ', 'Kita tidak dapat membuat string dari char', 'Alokasi memori yang diberikan sangat besar', 'Alokasi memori yang diberikan terlalu kecil', 'Seharusnya pengabungan char menggunakan operator ', 'opsi_a', 1),
(30, 'Apa kesalahan source code di bawah ini?', 'kesalahan_operator2.png', 'Perbandingan tidak sesuai seharusnya e juga berupa integer', 'Seluruh yang dibandingkan harus berupa String', 'Kode yang dihasilkan tidak akan terkompile', 'Kode berjalan tanpa error dan menghasilkan nilai 1', 'Kode berjalan tanpa error dan menghasilkan nilai 0', 'opsi_d', 1),
(31, 'Baris yang mana yang pertama kali menghasilkan error?', 'kesalahan_percabangan.png', 'Line 1', 'Line 2', 'Line 3', 'Line 4', 'Line 5', 'opsi_a', 1),
(32, 'Baris mana saja yang menyebabkan error?', 'kesalahan_perulangan.png', 'Line 1', 'Line 2', 'Line 3', 'Line 4', 'Line 1, Line 2, dan Line 3', 'opsi_b', 1),
(33, 'Mr Daniel merupakan seorang guru di SMKN 1 Bantul. Pada suatu ketika Mr Daniel Ingin mengambarkan suatu algoritma percabangan bertingkat dengan menggunakan gambar-gambar simbol. Kira-kira apa yang diperlukan Mr Daniel ? ', '', 'Mr Daniel perlu mengambarkan pseudocode', 'Mr Daniel perlu mengambarkan flowchart diagram', 'Mr Daniel perlu  mengambarkan deskripsi formal', 'Mr Daniel perlu mengambarkan bahasa pemrograman C++', 'Mr Daniel perlu mengambarkan bahasa formal.', 'opsi_b', 2),
(35, 'Mr Robin merupakan seorang programmer yang kurang begitu mahir dalam membuat dan merancang suatu program, kurang mahir nya Mr Robin disebabkan Mr Robin kurang mengerti bahasa penghubung yang merupakan penggabungan antara Bahasa Pemrograman dengan Bahasa Manusia, Jadi apa permasalahan Mr Robin? ', '', 'Mr Robin kurang memahami pseudocode', 'Mr Robin kurang memahami bahasa pemrograman', 'Mr Robin kurang memahami flowchart diagram', 'Mr Robin kurang memahami diagram alur', 'Mr Robin kurang memahami persoalan', 'opsi_a', 2),
(36, 'Sesuatu hal yang nilainya tidak pernah berubah adalah suatu?', '', 'Sebuah Variable', 'Sebuah konstanta', 'Sebuah tipe data', 'Sebuah proses', 'Sebuah inputan', 'opsi_b', 2),
(37, 'Tipe data string akan anda gunakan ketika', '', 'Sesuatu yang ditampung berupa bilangan bulat', 'Sesuatu yang ditampung berupa desimal', 'Sesuatu yang ditampung berupa kalimat', 'Sesuatu yang ditampung berupa benar/salah', 'Sesuatu yang ditampung berupa Objek', 'opsi_c', 2),
(38, 'Dalam Bahasa Pemrograman C++ untuk memasukan suatu nilai ke dalam variable kita menggunakan ... dan saat kita akan mencetak nilai kita menggunakan …. ', '', 'input dan output', 'cout dan cin', 'cin dan cout', 'scanner dan system.out.print', 'readline dan echo', 'opsi_c', 2),
(39, 'Operator apakah yang digunakan untuk menandakan logika OR', '', 'Operator Logika OR (||)', 'Operator Logika OR (|)', 'Operator Logika OR (&&)', 'Operator Logika OR (!)', 'Operator Logika OR (&)', 'opsi_a', 2),
(40, 'Doni merupakan siswa SMA Talenta Bandung, setiap harinya Doni memesan masakan di kantin hari senin dan selasa doni membeli makanan di kantin A, hari rabu doni membeli makanan di kantin B dan hari kamis dan jumat Doni membeli makanan di kantin C, Kira-kira untuk kasus ini jika dibuat dalam program termasuk percabangan jenis apa?', '', 'Percabangan dua kasus', 'Percabangan tunggal', 'Percabangan empat kasus', 'Percabangan tiga kasus', 'Percabangan bersarang', 'opsi_d', 2),
(41, 'Ketika seseorang mengetahui batas awal dan batas akhir dari suatu kasus perulangan. Kira-kira perulangan apakah yang cocok untuk kasus tersebut', '', 'do while', 'for each', 'for', 'while', 'while do', 'opsi_c', 2),
(42, 'Mr Daniel Yan merupakan seorang yang sangat mencintai pekerjaannya dalam bidang ekspedisi. Suatu ketika Mr Yan ingin membuat suatu aplikasi, namun ia tidak ahli dalam bidang pemrograman, Ia hanya mengerti algoritma dalam bentuk diagram. Kira-kita Mr Yan memerlukan apa?', '', 'Mr Daniel yan membuat pseudocode untuk program tersebut', 'Mr Daniel Yan membuat program dalam bahasa pemrograman C++', 'Mr Daniel Yan membuat flowchart diagram', 'Mr Daniel Yan mencoba untuk mencompile program', 'Mr Daniel Yan membuat definisi formal', 'opsi_c', 2),
(43, 'Mr X merupakan seorang agen rahasia, dalam menjalankan pekerjaannya Mr X. Selalu membuat program yang membantu dalam pemecahan masalahnya. Dalam perancangan program Mr. X memerlukan suatu bahasa yang disebut bahasa percampuran antara bahasa formal dan bahasa pemrograman. Apa yang diperlukan oleh Mr X. tersebut?  ', '', 'Mr X. membuat pseudocode untuk program tersebut', 'Mr X. membuat program dalam bahasa pemrograman C++', 'Mr X. membuat flowchart diagram', 'Mr X. mencoba untuk mencompile program', 'Mr X. membuat definisi formal', 'opsi_a', 2),
(44, 'Mr Rupert merupakan seorang karyawan di bidang ekspedisi. Suatu ketika Mr Rupert ingin memasukan binatang, barang elektronik, kosmetik, dan makanan. Dalam dunia pemrograman jika kita memiliki kasus serupa apa yang harus kita lakukan?', '', 'Memasukan secara bersamaan keempat jenis tersebut dalam suatu tempat', 'Memisahkan dan memasukan menurut jenis barang masing-masing dalam variable yang berbeda', 'Memasukan dan memilah keempat jenis tersebut menurut beratnya', 'Memasukan dan memilah menurut jenisnya masing-masing', 'Mengelompokan berdasarkan kegunaan barang tersebut', 'opsi_b', 2),
(45, 'Akbar merupakan siswa teladan di SMAN 18 Bandung, Akbar kebinggungan dalam menentukan sebuah tipe data yang digunakan untuk menampung lebih dari satu angka bilangan bulat dalam sebuah variable. Kira-kira tipe data apa yang sesuai dengan kasus Akbar?', '', 'Array of Integer', 'Array of Double', 'Integer', 'Double', 'Boolean', 'opsi_a', 2),
(46, 'Doni merupakan siswa teladan di SMAN 17 Bandung, Doni kebinggungan dalam memprint 3  buah nilai pada bahasa pemrograman C++ dengan baris yang terpisah bagaimana cara yang harus Doni lakukan?', '', 'menggunakan cout<< “…. \\n”', 'menggunakan cout<<”…. /n”', 'menggunakan cout << “…”<<endl;', 'Opsi A dan C benar', 'Opsi B dan C benar', 'opsi_d', 2),
(47, 'Hilda merupakan seseorang wanita yang lahir pada tanggal 29 Februari yaitu bertepatan dengan hari kabisat. Perhitungan hari kabisat sangat berhubungan dengan suatu operator aritmatika, Operator Apakah itu?', '', 'Operator Pembagian (/)', 'Operator Plus (+)', 'Operator Modulo (%)', 'Operator Perkalian (*)', 'Operator Perpangkatan(^)', 'opsi_c', 2),
(48, 'Joni merupakan seekor capybara yang sedang belajar menghitung jumlah hari pada bulan februari.bantulah joni membuat kondisi yang menyatakan suatu tahun itu adalah kabisat?	', '', 'if( tahun % 100 == 0)', 'if(tahun % 100 != 0 && tahun % 400 == 0 && tahun % 4 == 0)	', 'Tidak ada jawaban	', 'if(tahun % 4 != 0)', 'if(tahun % 4 == 0)', 'opsi_c', 2),
(49, 'Apa Informasi yang diperlukan untuk membuat pola seperti ini:	', 'diamond.png', 'Batas awal dan batas akhir dan percabangan', 'Batas Awal pada percabangan tunggal', 'Batas Akhir pada perulangan tunggal', 'Batas awal dan batas akhir pada perulangan bersarang', 'Batas awal dan batas akhir dan percabangan bertingkat', 'opsi_d', 2),
(50, 'Pada Flowchart di bawah ini, apa yang perlu ditambahkan agar sesuai dengan algoritma pencarian tahun kabisat?', 'flowchartkabisat.png', 'Objek berupa persegi dengan jika tahun mod % 400 sama dengan 0', 'Objek berupa belah ketupat dengan jika tahun mod % 400 sama tidak sama dengan 0', 'Objek berupa belah ketupat dengan jika tahun mod % 400 sama dengan 0', 'Objek berupa belah ketupat dengan jika tahun mod % 200 sama tidak sama dengan 0', 'Objek berupa belah ketupat dengan jika tahun mod % 400 dan tahun mod % 600  sama sama dengan 0', 'opsi_c', 2),
(51, 'Pada Pseudocode di bawah ini, apa yang perlu ditambahkan agar sesuai dengan masalah yang diberikan?', 'PseudocodeLS.png', 'Menambahkan deklarasi pi pada DEKLARASI', 'Menambahkan deklarasi dan inisialisasi pi pada bagian DEKLARASI', 'Menambah inisialisasi untuk variable pi', 'Menambah deklarasi dan inisialisasi untuk pi pada bagian deklarasi dan memberikan tipe data integer', 'Mengganti semua tipe data variable yang ada pada deklarasi menjadi integer.', 'opsi_b', 2),
(52, 'Apa yang harus dilengkapi pada potongan kode berikut agar kode dapat berjalan dengan sempurna?', 'penambahan_variable.png', 'tambahkan deklarasi untuk a ', 'tambahkan insialisasi untuk a', 'tambahkan deklarasi dan inisialisasi untuk a berupa int a', 'tambahkan inisisasi untuk a berupa string a', 'tambahkan deklarasi dan inisialisasi untuk a berupa int a[10]', 'opsi_e', 2),
(53, 'Apa yang perlu diubah dan dilengkapi dari source di bawah ini agar dapat menghasilkan output berupa “Selamat Datang”', 'penambahan_tipedata.png', 'Tambahkan deklarasi dan inisialisasi untuk char x[20] = “Selamat Datang”', 'Tambahkan deklarasi dan inisialisasi string x = “Selamat Datang”', 'Tambahkan  deklarasi dan inisialisasi char x[10] = “Selamat Datang”', 'Opsi A dan B benar', 'Opsi B dan C benar.', 'opsi_d', 2),
(54, 'Lengkapi code di bawah ini agar mengeluarkan output berupa Hallo Programmer', 'penambahan_output.png', 'tambahkan line cout<< x + \" \" + y;', 'tambahkan line cout<<x<<y;', 'tambahkan line cout<<x<<” “ <<y;', 'Opsi A dan C benar', 'Opsi  B dan C benar', 'opsi_d', 2),
(55, 'Apa keluaran source code berikut ini?', 'keluaran_bool.png', '1 alias true', '1 alias false', '0 alias true', '0 alias false', 'Hasil tidak terdefinisikan dan menghasilkan error', 'opsi_a', 2),
(56, 'Kira-kira apa keluaran dari program berikut ini?', 'keluaran_switch.png', 'ini angka 10ini angka 11', 'ini angka 9', 'Error', 'ini angka 9ini angka 10', 'ini angka 9ini angka 10ini angka11', 'opsi_a', 2),
(57, 'Apa keluaran program di bawah ini?', 'perulangan_apa.png', '60', '120', '30', '720', '240', 'kunci_a', 2),
(58, 'Telaah flowchart di bawah ini, kira-kira apa yang salah pada flowchart di bawah ini?', 'kesalahan_diagram.png', 'Bagian Answer seharusnya menggunakan jajar genjang ', 'Bagian perulangannya salah karena seharusnya ada tanda panah lagi kebagian sebelumnya yang menandakan bahwa ia melakukan perulangan', 'Bagian input salah karena seharusnya input menggunakan jajar genjang', 'Opsi A dan B benar', 'Opsi A, B, dan C benar', 'opsi_a', 2),
(59, 'Telaah Pseudocode di bawah ini, kira-kira apa yang salah pada pseudocode di bawah ini?', 'kesalahan_pseudo.png', 'Algoritma tersebut sudah benar', 'Algoritma tersebut salah karena x seharusnya bertipe data integer karena merupakan bilangan bulat	', 'Algoritm pada bagian tersebut salah karena seharusnya x bertipe data integer karena merupakan bilangan bulat dan x mod 2 sama dengan 1 menunjukan bilangan genap', 'Algoritma tersebut salah karena seharusnya x bertipe data integer karena merupakan bilangan bulat dan x mod 2 seharusnya 0 karena menunjukan bilangan genap', 'Opsi B dan C benar', 'opsi_d', 2),
(60, 'Apa kesalahan potongan kode di bawah ini?', 'kesalahan_outputt.png', 'Belum ada deklarasi untuk a dan b', 'Belum ada insialisasi untuk b', 'Belum ada deklarasi dan inisialisasi untuk a dan b', 'Belum ada deklarasi dan inisialisasi untuk a', 'Belum ada deklarasi dan inisialisasi untuk b', 'opsi_c', 2),
(61, 'Apa kesalahan kode di bawah ini? ', 'kesalahan_output2.png', 'Variable yang dideklarasi adalah x akan tetapi yang di print adalah y', 'Harusnya hanya string yang boleh mengantikan char x[10] karena isinya adalah kalimat dan bukan karakter', 'Jumlah karakter terlalu panjang jadi bisa dibesarkan ukuran memori yang diberikan untuk char x', 'opsi A,B', 'Opsi A,C', 'opsi_e', 2),
(62, 'Apakah terdapat kesalahan pada code di bawah ini jika kita ingin mencetak Hallo Programmer', 'kesalahan_output3.png', 'Terjadi kesalahan, karena kita tidak dapat mengabungkan char dengan operator + ', 'Tidak terjadi kesalahan karena array of char dianggap sebagai string', 'Terjadi kesalahan karena alokasi memori yang diberikan sangat besar', 'Terjadi kesalahan karena alokasi memori yang diberikan terlalu kecil', 'Terjadi kesalahan karena seharusnya ditulis cout<<x<<y', 'opsi_a', 2),
(63, 'Apa kesalahan source code di bawah ini?', 'kesalahan_boolean.png', 'Perbandingan tidak sesuai seharusnya tidak boleh membandingkan boolean', 'Seluruh yang dibandingkan harus berupa integer', 'Kode yang dihasilkan tidak akan terkompile', 'Kode berjalan tanpa error dan menghasilkan nilai 1', 'Kode berjalan tanpa error dan menghasilkan nilai 0', 'opsi_d', 2),
(64, 'Jika keluaran yang diharapkan adalah ini angka 10 maka pada baris keberapa yang menyebabkan error untuk pertama kali?', 'kesalahan_switch.png', 'Line 1', 'Line 2', 'Line 3', 'Line 4', 'Line 5', 'opsi_d', 2),
(65, 'Baris mana saja yang menyebabkan error?', 'error_perulangan.png', 'Line 1', 'Line 2', 'Line 3', 'Line 4', 'Line 1, Line 2, dan Line 3', 'opsi_b', 2);

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
(156, 13, 'Jie', 1),
(157, 16, 'Dian Lestari,M.Pd.', 1),
(158, 3, 'Putra', 2),
(159, 14, 'Kevina', 2),
(160, 11, 'Doni', 3),
(161, 12, 'Kevin', 3);

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
(1, 'pretest', 1),
(2, 'posttest', 0);

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
(5, 1, 'Tugas_1.pdf'),
(6, 2, 'Tugas_2.pdf'),
(7, 3, 'Tugas_3.pdf'),
(9, 4, 'tugas4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_youtube`
--

CREATE TABLE `tb_youtube` (
  `id_materi` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `youtube` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_youtube`
--

INSERT INTO `tb_youtube` (`id_materi`, `id_pertemuan`, `youtube`) VALUES
(7, 1, 'eJjPpqgXBYU'),
(8, 1, 'JprBFnCqWfQ'),
(9, 1, 'ZPd-ShDM1us'),
(11, 1, 'QyvMLEYQoYE'),
(12, 1, 'wBIiRds7qFw'),
(13, 2, '-Fz6Mn9sSMo'),
(14, 2, 'jKFFuLX9jgE'),
(16, 2, 'UiOJw8VafwY'),
(17, 3, 'lb3HxIsKlCs'),
(18, 3, 'TJX83BL-uqM'),
(19, 4, '-zZQWl2kKBk');

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
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `tb_globalchat`
--
ALTER TABLE `tb_globalchat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `tb_groupchat`
--
ALTER TABLE `tb_groupchat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `tb_hasilprepost`
--
ALTER TABLE `tb_hasilprepost`
  ADD PRIMARY KEY (`id_hasiltest`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_test` (`id_test`);

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
-- Indexes for table `tb_prepost`
--
ALTER TABLE `tb_prepost`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_test` (`id_test`);

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
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id_pengirim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_globalchat`
--
ALTER TABLE `tb_globalchat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_groupchat`
--
ALTER TABLE `tb_groupchat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_hasilprepost`
--
ALTER TABLE `tb_hasilprepost`
  MODIFY `id_hasiltest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  MODIFY `id_hasiltugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  MODIFY `id_pertemuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_prepost`
--
ALTER TABLE `tb_prepost`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_random`
--
ALTER TABLE `tb_random`
  MODIFY `id_random` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tb_test`
--
ALTER TABLE `tb_test`
  MODIFY `id_tes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_youtube`
--
ALTER TABLE `tb_youtube`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Constraints for table `tb_hasilprepost`
--
ALTER TABLE `tb_hasilprepost`
  ADD CONSTRAINT `tb_hasilprepost_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`),
  ADD CONSTRAINT `tb_hasilprepost_ibfk_2` FOREIGN KEY (`id_test`) REFERENCES `tb_test` (`id_tes`);

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
  ADD CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tb_akun` (`id`),
  ADD CONSTRAINT `tb_pesan_ibfk_2` FOREIGN KEY (`id_lawan`) REFERENCES `tb_akun` (`id`);

--
-- Constraints for table `tb_prepost`
--
ALTER TABLE `tb_prepost`
  ADD CONSTRAINT `tb_prepost_ibfk_1` FOREIGN KEY (`id_test`) REFERENCES `tb_test` (`id_tes`);

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
