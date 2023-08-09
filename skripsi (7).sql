-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2023 at 04:40 PM
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
(2, 'johanesalex774@gmail.com', 'Johannes Alexander Putra', '$2y$10$DgitFkqtyYH.LyELrzS0JOq1UF7yfk/Yn7AvnnKgBXV3ulzTiTKWy', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'johannes@upi.edu', 'Putra', '$2y$10$jUdluVMq/zoW1eob56Md9OmVHGnxvdPWwz3n2djYZX3ZRl9HOp.YW', 0, NULL, 0, 100, NULL, NULL, NULL),
(11, 'a455lgrowtopia@gmail.com', 'Doni', '$2y$10$9GdFYSOfqLIqzyEE00dQ3e6aGK9jhPks7mcMJU7cw.F2WoNodCd4m', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'a455dlgrowtopia@gmail.com', 'Kevin', '$2y$10$c4zrWxv6sJCiJGkbPjMruu318b.2sqwVLxGHNVNnLHQPu9B6ezqk2', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'a455wwlgrowtopia@gmail.com', 'Jie', '$2y$10$wm4tkhRanDdLLC4OwVtcreMEBdAalXU3V620mx6NQTuH.WNm0DyP6', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'johannesap@upi.edu', 'Kevina', '$2y$10$zROPeT9UQPHQpst1ArZimONOT7TLSPVyTHiAiC3KRhckBQKvpvKTG', 0, NULL, NULL, 100, NULL, NULL, NULL),
(16, 'dian@upi.edu', 'Dian Lestari', '$2y$10$4JlgGisbr7cugCbF8YSkAuOr1xmZnVN2qW12vwIe6zbpe97mIR4Wm', 0, 50, 100, 100, 100, 100, 100);

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
(48, 1, 16, 'eess', 47, '2023-06-30 12:31:04', '2023-06-30 12:31:04'),
(49, 1, 2, 'makasih', 12, '2023-07-21 02:28:14', '2023-07-21 02:28:14'),
(50, 1, 2, 'ee', 0, '2023-07-21 02:28:21', '2023-07-21 02:28:21'),
(51, 1, 2, 'rr', 0, '2023-08-03 11:55:58', '2023-08-03 11:55:58'),
(52, 1, 2, 'Pertemuan 1 masuk ajax', 0, '2023-08-03 11:59:17', '2023-08-03 11:59:17'),
(53, 1, 2, 'rr', 0, '2023-08-03 11:59:37', '2023-08-03 11:59:37'),
(54, 1, 2, 'dd', 52, '2023-08-03 11:59:57', '2023-08-03 11:59:57'),
(55, 1, 2, 'ff', 53, '2023-08-03 12:01:09', '2023-08-03 12:01:09');

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
(8, 2, 'pp', '2023-06-19 12:32:20'),
(9, 2, 'tes', '2023-08-05 13:48:06'),
(10, 2, 'dd', '2023-08-05 13:48:09');

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
  `id_test` int NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_hasilprepost`
--

INSERT INTO `tb_hasilprepost` (`id_hasiltest`, `id_siswa`, `jawaban`, `score`, `benar`, `salah`, `kosong`, `id_test`, `created_at`) VALUES
(45, 3, 'A', 0, 0, 1, 0, 2, '2023-08-03 05:58:47'),
(47, 16, 'AA', 50, 1, 1, 0, 1, '2023-08-05 19:21:42'),
(48, 16, 'B', 100, 1, 0, 0, 2, '2023-08-07 08:54:11');

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
  `text` text NOT NULL,
  `upload` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `scored_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_hasiltugas`
--

INSERT INTO `tb_hasiltugas` (`id_hasiltugas`, `nilai`, `id_pertemuan`, `id_siswa`, `komentar`, `text`, `upload`, `created_at`, `updated_at`, `scored_at`) VALUES
(53, 100, 1, 14, 'keren bro', '', '3f1da01d781938ad969da5379f6742b9.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-08-05 07:11:02'),
(63, 100, 4, 16, '', 'tes', 'aaf72886eee2ed76370e99922aef83a8.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 100, 1, 16, 'Baik, tapi harusya diupload ke classroom untuk tugas ini jika jawabannya ini', 'Ini tugas Pertemuan 1 ya bang', '0117976242289395c09886aaf5c32e63.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-08-05 07:16:51'),
(67, 100, 3, 16, '', 'Pertemuan 3', '7cad9a792639ad06a8dd6048c0dc213b.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 100, 2, 16, '', '', 'b0d5549652faf0aa13160e8f9b4fb5ca.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 100, 1, 3, 'Ok bagus', 'Pa ini perbaikan saya ', 'c2a5a492846ffcea30bd417b42641300.pdf', '0000-00-00 00:00:00', '2023-07-23 06:44:15', '2023-07-23 06:47:43'),
(81, NULL, 2, 3, '', 'tes', '4bdb8fe0c784cd88aa23289ef38792f0.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(16, 1, 'Pertemuan1_Percabangan.pdf'),
(18, 2, 'Pertemuan2-Percabangan.pdf'),
(19, 3, 'Pertemuan3-Perulangan.pdf'),
(20, 4, 'Pertemuan4-Perulangan.pdf');

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
  `videoconference` text,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pertemuan`
--

INSERT INTO `tb_pertemuan` (`id_pertemuan`, `pertemuan`, `penjelasan`, `aktif`, `tp`, `videoconference`, `gambar`) VALUES
(1, 1, 'Pada pertemuan pertama kita akan membahas jenis-jenis percabangan dan percabangan tunggal', 1, '<li> Memahami permasalahan yang berkaitan dengan jenis-jenis percabangan</li>\r\n<li> Menentukan pemecahan masalah dengan  jenis-jenis percabangan</li>\r\n<li> Melakukan implementasi  jenis-jenis percabangan untuk suatu permasalahan </li>\r\n<li> Melakukan evaluasi terhadap penggunaan  jenis-jenis percabangan</li>\r\n<li> Memahami permasalahan yang berkaitan dengan percabangan tunggal</li>\r\n<li> Menentukan pemecahan masalah dengan percabangan tunggal</li>\r\n<li> Melakukan implementasi flowchart untuk suatu percabangan tunggal</li>\r\n<li> Melakukan evaluasi terhadap penggunaan percabangan tunggal </li>\r\n', 'OffensiveHurricanesOccurHalf', 'pertemuan1.png'),
(2, 2, 'Pada pertemuan kedua kita akan membahas percabangan dua kasus, tiga kasus atau lebih, dan switch', 1, '<li> Memahami permasalahan yang berkaitan dengan percabangan dua kasus</li>\r\n<li> Menentukan pemecahan masalah dengan percabangan dua kasus</li> \r\n<li> Melakukan implementasi percabangan dua kasusuntuk suatu permasalahan </li> \r\n<li> Melakukan evaluasi terhadap penggunaan percabangan dua kasus</li> \r\n<li> Memahami permasalahan yang berkaitan dengan percabangan tiga kasus </li> \r\n<li> Menentukan pemecahan masalah dengan percabangan tiga kasus </li> \r\n<li> Melakukan implementasi percabangan tiga kasusuntuk suatu masalah </li> \r\n<li> Melakukan evaluasi terhadap penggunaan percabangan tiga kasus </li> \r\n<li> Memahami permasalahan yang berkaitan dengan percabangan switch </li> \r\n<li> Menentukan pemecahan masalah dengan percabangan switch </li> \r\n<li> Melakukan implementasi percabangan switch untuk suatu masalah </li> \r\n<li> Melakukan evaluasi terhadap penggunaan percabangan switch </li>', 'https://meet.jit.si/OffensiveHurricanesOccurHalf	', 'percabangan2.png'),
(3, 3, 'Pada pertemuan ketiga kita akan membahas jenis-jenis perulangan dan perulangan for', 1, ' <li> Memahami permasalahan yang berkaitan dengan jenis-jenis perulangan</li>  \r\n<li> Menentukan pemecahan masalah dengan jenis-jenis perulangan </li>  \r\n<li> Melakukan implementasi jenis-jenis perulangan untuk suatu permasalahan </li>  \r\n<li> Melakukan evaluasi terhadap penggunaan jenis-jenis perulangan </li>  \r\n<li> Memahami permasalahan yang berkaitan dengan perulangan for</li>  \r\n<li> Menentukan pemecahan masalah dengan perulangan for</li>  \r\n<li> Melakukan implementasi perulangan foruntuk suatu permasalahan </li>  \r\n<li> Melakukan evaluasi terhadap penggunaan perulangan for </li>', 'https://meet.jit.si/OffensiveHurricanesOccurHalf	', 'perulangan_for.jpg'),
(4, 4, 'Pada pertemuan keempat kita akan mempelajari perulangan while dan perulangan do while', 1, '<li> Memahami permasalahan yang berkaitan dengan perulangan while</li> \r\n<li> Menentukan pemecahan masalah dengan perulangan while</li> \r\n<li> Melakukan implementasi perulangan while untuk suatu permasalahan </li> \r\n<li> Melakukan evaluasi terhadap penggunaan perulangan while</li>\r\n<li> Memahami permasalahan yang berkaitan dengan perulangan while</li> \r\n<li> Menentukan pemecahan masalah dengan perulangan do while</li> \r\n<li> Melakukan implementasi perulangan do while untuk suatu permasalahan </li> \r\n<li> Melakukan evaluasi terhadap penggunaan perulangan do while</li>', 'https://meet.jit.si/OffensiveHurricanesOccurHalf	', 'perulangan2.png');

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

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_pengirim`, `id_lawan`, `pesan`, `waktu`) VALUES
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
(37, 2, 11, 'tes', '2023-07-09 01:54:35'),
(38, 3, 11, 'tes', '2023-07-10 07:26:19'),
(39, 2, 3, 'tes', '2023-07-10 08:26:53'),
(40, 3, 2, 'p', '2023-07-10 10:33:23'),
(41, 3, 2, 'tes', '2023-07-23 02:25:44'),
(42, 3, 2, 'res', '2023-07-23 02:25:51'),
(43, 3, 2, 'r', '2023-07-23 02:51:09'),
(44, 2, 3, 'apa sih', '2023-07-23 03:08:38'),
(45, 2, 11, 'tes', '2023-07-23 04:02:58'),
(46, 2, 3, 'apa', '2023-07-23 04:03:08'),
(47, 2, 3, 'ee', '2023-07-23 04:04:06'),
(48, 2, 3, 'dd', '2023-07-23 04:04:31'),
(49, 2, 3, 'ee', '2023-07-23 04:04:59'),
(50, 2, 14, 'aa', '2023-07-23 04:05:17'),
(51, 3, 2, 'c', '2023-07-23 12:58:42'),
(52, 3, 2, 'ddd', '2023-07-23 13:06:51'),
(53, 3, 2, 'dddddeww', '2023-07-23 13:06:56'),
(54, 3, 2, 'coba', '2023-07-23 13:20:22'),
(55, 2, 3, 'tes', '2023-08-05 13:54:35'),
(56, 2, 3, 'tes', '2023-08-05 13:59:04'),
(57, 2, 3, 'tes', '2023-08-05 14:01:56'),
(58, 3, 2, 'tes', '2023-08-05 14:04:03');

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
(68, '1', '', '1', '1', '1', '1', '1', 'D', 1),
(69, '1', '', '1', '1', '1', '1', '1', 'B', 2),
(70, '2', '', '2', '1', '1', '1', '1', 'A', 1);

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
(180, 12, 'Kevin', 1),
(181, 3, 'Putra', 1),
(182, 14, 'Kevina', 1),
(183, 13, 'Jie', 2),
(184, 11, 'Doni', 2),
(185, 16, 'Dian Lestari', 2);

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
(1, 'pretest', 1, 60),
(2, 'posttest', 1, 20);

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
(11, 1, 'Soal__Percabangan_1.pdf'),
(15, 2, 'TugasPercabangan_2.pdf'),
(16, 3, 'Tugas_Perulangan_1.pdf'),
(17, 4, 'Tugas_Perulangan_2.pdf');

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
(24, 1, 'gS_-I_bncnk'),
(25, 3, '-zZQWl2kKBk'),
(26, 1, 'W0wmmxRSZQY'),
(27, 2, 'BUB-AdUMMac'),
(28, 2, 'iOIiGqkSB0M'),
(29, 3, '4KeFmlF7cNs'),
(30, 3, 'zupTFpYQvLI'),
(31, 4, 'qK271uDEKng'),
(32, 4, 'uBCkUY2h5qE'),
(33, 1, 'HxAswp8V8iU'),
(34, 3, 'pfPguyBE-DU'),
(35, 2, 'yiYsfpRf6Xo'),
(36, 4, 'ukFF07IKIlg'),
(38, 4, 'BjmVvjT6b1s'),
(40, 2, ' qaeuaCVpcSI'),
(41, 2, 'wKRo4jyLgn8');

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
  ADD KEY `id` (`id_pengirim`),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id_pengirim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_globalchat`
--
ALTER TABLE `tb_globalchat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_groupchat`
--
ALTER TABLE `tb_groupchat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_hasilprepost`
--
ALTER TABLE `tb_hasilprepost`
  MODIFY `id_hasiltest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  MODIFY `id_hasiltugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  MODIFY `id_pertemuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_prepost`
--
ALTER TABLE `tb_prepost`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_random`
--
ALTER TABLE `tb_random`
  MODIFY `id_random` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

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
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  ADD CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `tb_akun` (`id`),
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
