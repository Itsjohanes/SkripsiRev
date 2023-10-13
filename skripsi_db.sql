-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2023 at 12:26 AM
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
(2, 'johanesalex774@gmail.com', 'Johannes Alexander Putra', '$2y$10$DgitFkqtyYH.LyELrzS0JOq1UF7yfk/Yn7AvnnKgBXV3ulzTiTKWy', 1),
(3, 'johannes@upi.edu', 'Putra', '$2y$10$jUdluVMq/zoW1eob56Md9OmVHGnxvdPWwz3n2djYZX3ZRl9HOp.YW', 0),
(11, 'a455lgrowtopia@gmail.com', 'Doni', '$2y$10$9GdFYSOfqLIqzyEE00dQ3e6aGK9jhPks7mcMJU7cw.F2WoNodCd4m', 0),
(12, 'a455dlgrowtopia@gmail.com', 'Kevin', '$2y$10$eLOxsiRTVEnDg9Mo8HAy8.hh5EC9Ym49dh5kFP80zAIHdT0GiY2Ne', 0),
(13, 'a455wwlgrowtopia@gmail.com', 'Jie', '$2y$10$wm4tkhRanDdLLC4OwVtcreMEBdAalXU3V620mx6NQTuH.WNm0DyP6', 0),
(14, 'johannesap@upi.edu', 'Kevina', '$2y$10$zROPeT9UQPHQpst1ArZimONOT7TLSPVyTHiAiC3KRhckBQKvpvKTG', 0),
(16, 'dian@upi.edu', 'Dian Lestari', '$2y$10$eapx.RkFEI4ao2VZx46NvuXtiqVCs8wG3L/EgYDUI7Hkco858peBi', 0);

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

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`id_comment`, `id_pertemuan`, `id_user`, `comment`, `parent_id`, `created_at`, `updated_at`) VALUES
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
(55, 1, 2, 'ff', 53, '2023-08-03 12:01:09', '2023-08-03 12:01:09'),
(56, 1, 3, 'tes', 0, '2023-08-31 11:04:38', '2023-08-31 11:04:38'),
(57, 1, 3, 'benar', 10, '2023-09-07 11:59:00', '2023-09-07 11:59:00'),
(58, 1, 3, 'sekali', 10, '2023-09-07 11:59:11', '2023-09-07 11:59:11'),
(59, 1, 3, 'rrr', 0, '2023-09-07 12:05:18', '2023-09-07 12:05:18'),
(60, 1, 3, 'e', 10, '2023-09-07 12:10:18', '2023-09-07 12:10:18'),
(61, 1, 3, '#include <stdio.h>\r\nint main(){\r\n printf(\"hello world\");\r\n}', 0, '2023-09-22 11:08:16', '2023-09-22 11:08:16'),
(62, 1, 3, '#include <stdio.h>\r\nint main(){\r\n\r\n}', 0, '2023-09-22 11:18:24', '2023-09-22 11:18:24'),
(63, 1, 2, '#include <stdio.h>\r\nint main(){\r\n\r\n}', 62, '2023-09-22 11:24:19', '2023-09-22 11:24:19'),
(64, 1, 2, '#include <stdio.h>\nint main(){\nprintf(\"hello world\");\n}', 61, '2023-09-23 15:53:58', '2023-09-23 15:54:27');

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

--
-- Dumping data for table `tb_globalchat`
--

INSERT INTO `tb_globalchat` (`id_globalchat`, `sender_id`, `message`, `created_at`) VALUES
(29, 2, '<br>#include <stdio.h><br>int main(){<br><br>char Z[4][4][10] = {<br>    \"Muhammad\",\"Rizal\",\"Rifky\",\" Sri\",<br>    \"Mulky   \",\"Meggy\",\"aulia\",\"    \",<br>    \"        \",\"Andika\",\"Tika\",\"Gina\",<br>    \"Umar    \",\"ihsan \",\"    \",\"tika\"<br><br>};<br><br>for (int i=0;i<4;i++){<br><br>    for(int j=0; j<4; j++)<br>    {<br>        printf(\"%s ,\", Z[i][j]);<br><br>    }<br>    printf(\"\\n\");<br><br>}<br><br>return 0 ;<br><br>}<br>', '2023-09-22 04:47:28');

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

--
-- Dumping data for table `tb_groupchat`
--

INSERT INTO `tb_groupchat` (`id_groupchat`, `sender_id`, `message`, `kelompok`, `created_at`) VALUES
(18, 3, '#include <iostream><br><br>using namespace std;<br><br>int main()<br>{<br>    cout<<\"Hello World\";<br><br>    return 0;<br>}', 1, '2023-10-06 15:34:42'),
(19, 3, 'Sudah kuupload ya ke file manager', 1, '2023-10-06 15:35:09');

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
(63, 3, 'A', 0, 0, 100, 0, 100, 1, 0, 0, 2, '2023-10-09 06:47:59'),
(64, 3, 'ABBCD', 100, 100, 100, 100, 100, 5, 0, 0, 1, '2023-10-09 07:17:40');

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

--
-- Dumping data for table `tb_hasilquiz`
--

INSERT INTO `tb_hasilquiz` (`id_hasilquiz`, `id_siswa`, `jawaban`, `benar`, `salah`, `nilai`, `memahami_masalah`, `merencanakan_pemecahan_masalah`, `melaksanakan_pemecahan_masalah`, `memeriksa_kembali`, `kosong`, `id_pertemuan`, `timestamp`) VALUES
(9, 3, 'B', 1, 0, 100, 0, 0, 100, 0, 0, 1, '2023-10-11 06:43:35'),
(11, 3, 'AA', 2, 0, 100, 100, 0, 0, 0, 0, 2, '2023-10-11 19:32:53');

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
(53, 100, 1, 14, 'keren bro', '', '3f1da01d781938ad969da5379f6742b9.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-09-15 22:38:55'),
(63, 100, 4, 16, '', 'tes', 'aaf72886eee2ed76370e99922aef83a8.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 100, 1, 16, 'Baik, tapi harusya diupload ke classroom untuk tugas ini jika jawabannya ini', 'Ini tugas Pertemuan 1 ya bang', '0117976242289395c09886aaf5c32e63.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-08-05 07:16:51'),
(67, 100, 3, 16, '', 'Pertemuan 3', '7cad9a792639ad06a8dd6048c0dc213b.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 100, 2, 16, '', '', 'b0d5549652faf0aa13160e8f9b4fb5ca.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 100, 1, 3, 'Ok bagus', 'Pa ini perbaikan saya ', 'c2a5a492846ffcea30bd417b42641300.pdf', '0000-00-00 00:00:00', '2023-07-23 06:44:15', '2023-07-23 06:47:43'),
(81, 100, 2, 3, '', 'tes', '4bdb8fe0c784cd88aa23289ef38792f0.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-09-07 05:33:09');

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
(2, 3, 100, 100, 100, 100, NULL, NULL, 100, 100, NULL, NULL),
(3, 14, NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 16, NULL, NULL, 100, 100, 100, 100, NULL, NULL, NULL, NULL),
(5, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `kktp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateline_tgs` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pertemuan`
--

INSERT INTO `tb_pertemuan` (`id_pertemuan`, `pertemuan`, `penjelasan`, `aktif`, `tp`, `gambar`, `kktp`, `dateline_tgs`) VALUES
(1, 1, 'Pada pertemuan pertama kita akan membahas jenis-jenis percabangan dan percabangan tunggal', 1, 'Siswa mampu mengaplikasikan percabangan yang paling tepat untuk menyelesaikan masalah. ', 'pertemuan1.png', 'Siswa mampu menentukan solusi permasalahan dengan percabangan tunggal, Siswa mampu menerapkan percabangan satu kasus untuk menyelesaikan permasalahan, Siswa mampu memanipulasi percabangan satu kasus untuk menyelesaikan permasalahan ', '2023-09-23 07:10:00'),
(2, 2, 'Pada pertemuan kedua kita akan membahas percabangan dua kasus, tiga kasus atau lebih, dan switch', 1, 'Siswa mampu mengaplikasikan percabangan yang paling tepat untuk menyelesaikan masalah.', 'pertemuan2.png', 'Siswa mampu menentukan solusi permasalahan dengan percabangan dua kasus, Siswa mampu menerapkan percabangan dua kasus untuk menyelesaikan permasalahan, Siswa mampu memanipulasi percabangan dua kasus untuk menyelesaikan permasalahan, Siswa mampu menentukan solusi permasalahan dengan percabangan  tiga kasus/lebih, Siswa mampu menerapkan percabangan tiga kasus / lebih untuk menyelesaikan permasalahan, Siswa mampu memanipulasi percabangan tiga kasus / lebih untuk menyelesaikan permasalahan, Siswa mampu menentukan solusi permasalahan dengan percabangan switch, Siswa mampu menerapkan switch , Siswa mampu memanipulasi percabangan switch untuk menyelesaikan permasalahan', '2023-08-30 14:23:25'),
(3, 3, 'Pada pertemuan ketiga kita akan membahas jenis-jenis perulangan dan perulangan for', 1, 'Siswa mampu mengaplikasikan perulangan yang paling tepat untuk menyelesaikan masalah', 'pertemuan31.jpg', 'Siswa mampu menentukan solusi permasalahan dengan perulangan for,  Siswa mampu menerapkan perulangan for untuk menyelesaikan permasalahan, Siswa mampu memanipulasi perulangan for untuk menyelesaikan permasalahan, Siswa mampu menentukan solusi permasalahan dengan perulangan while, Siswa mampu menerapkan perulangan while untuk menyelesaikan permasalahan, Siswa mampu memanipulasi perulangan while untuk menyelesaikan permasalahan', '2023-08-31 14:24:02'),
(4, 4, 'Pada pertemuan keempat kita akan mempelajari perulangan while dan perulangan do while', 1, 'Siswa mampu mengaplikasikan perulangan yang paling tepat untuk menyelesaikan masalah', 'pertemuan41.png', 'Siswa mampu menentukan solusi permasalahan dengan perulangan do while, Siswa mampu menerapkan perulangan do while untuk menyelesaikan permasalahan, Siswa mampu memanipulasi perulangan do while untuk menyelesaikan permasalahan', '2023-08-28 17:00:00');

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
(73, 3, 2, 'Permisi pa jo', '2023-09-22 11:08:59'),
(86, 3, 2, '#include <stdio.h>', '2023-09-23 16:55:08'),
(87, 2, 3, '#include <stdio.h><br>int main()', '2023-09-23 16:58:05'),
(88, 2, 3, 'kon<br><br><br><br><br><br><br>', '2023-09-25 05:08:03'),
(89, 2, 3, 'tes', '2023-09-25 05:08:14'),
(90, 3, 2, '#include <iostream><br>', '2023-10-10 07:58:29');

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
(76, 'Apa Sebutan Struktur Perulangan di bawah ini? ', 'c-while.png', 'a.png', 'b.png', 'c.png', 'd.png', 'e.png', 'A', 1, 1),
(80, 'Aku Ganteng', '', '  Ya ', '  Tidak ', '  Mungkin ', ' Betul', ' Siap', 'B', 1, 1),
(81, 'Aku Ganteng', '', '  Betul ', '  Tidak ', '  Salah ', ' Benar', ' Salah', 'A', 2, 3),
(82, 'Apa Sebutan Struktur Perulangan di bawah ini? ', '', '  for ', '  while ', '  dowhile ', ' Foreach', ' Do each', 'B', 1, 2),
(83, 'Apa keluaran code di bawah ini?', '', ' a', ' b', ' c', ' d', ' e', 'C', 1, 3),
(84, 'Awalan dari pengulangan do while	', '', ' eee', ' wqwq', ' eqeqwq', ' wqwqwq', ' wqwqwq', 'D', 1, 4);

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
(17, 'Test', '', '    1   ', '    2   ', '    3   ', ' 4', ' 5', 'B', 'Soal ini jawabannya B', 1, 3),
(18, 'Apa Sebutan Struktur Perulangan di bawah ini? ', '', 'a4.png', 'b4.png', 'c4.png', 'd4.png', 'e4.png', 'A', 'Jawabannya adalah A', 2, 1),
(19, 'Apa keluaran code di bawah ini?', '', ' Tes', ' tes', ' Tes', ' Test', ' Test', 'A', 'Kunci adalah A karena begitu dari sananya', 2, 1);

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
(192, 16, 'Dian Lestari', 1),
(193, 12, 'Kevin', 1),
(194, 3, 'Putra', 1),
(195, 13, 'Jie', 2),
(196, 14, 'Kevina', 2),
(197, 11, 'Doni', 2);

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
  `id_youtube` int NOT NULL,
  `id_pertemuan` int NOT NULL,
  `youtube` text NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_youtube`
--

INSERT INTO `tb_youtube` (`id_youtube`, `id_pertemuan`, `youtube`, `kategori`) VALUES
(24, 1, 'E1Igc7pcB_U', 'Materi'),
(25, 3, '-zZQWl2kKBk', 'Materi'),
(26, 1, 'W0wmmxRSZQY', 'Tugas'),
(27, 2, 'BUB-AdUMMac', 'Tugas'),
(28, 2, 'iOIiGqkSB0M', 'Tugas'),
(29, 3, '4KeFmlF7cNs', 'Tugas'),
(30, 3, 'zupTFpYQvLI', 'Tugas'),
(31, 4, 'qK271uDEKng', 'Tugas'),
(32, 4, 'uBCkUY2h5qE', 'Tugas'),
(33, 1, 'HxAswp8V8iU', 'Tugas'),
(34, 3, 'pfPguyBE-DU', 'Tugas'),
(35, 2, 'yiYsfpRf6Xo', 'Tugas'),
(36, 4, 'ukFF07IKIlg', 'Tugas'),
(38, 4, 'BjmVvjT6b1s', 'Tugas'),
(40, 2, ' qaeuaCVpcSI', 'Tugas'),
(41, 2, 'wKRo4jyLgn8', 'Tugas'),
(45, 2, 'JgIceGaOsmk', 'Materi');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_globalchat`
--
ALTER TABLE `tb_globalchat`
  MODIFY `id_globalchat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_groupchat`
--
ALTER TABLE `tb_groupchat`
  MODIFY `id_groupchat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_hasilprepost`
--
ALTER TABLE `tb_hasilprepost`
  MODIFY `id_hasiltest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_hasilquiz`
--
ALTER TABLE `tb_hasilquiz`
  MODIFY `id_hasilquiz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  MODIFY `id_hasiltugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  MODIFY `id_pertemuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_prepost`
--
ALTER TABLE `tb_prepost`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_random`
--
ALTER TABLE `tb_random`
  MODIFY `id_random` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

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
  MODIFY `id_youtube` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
-- Constraints for table `tb_hasilquiz`
--
ALTER TABLE `tb_hasilquiz`
  ADD CONSTRAINT `tb_hasilquiz_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tb_pertemuan` (`id_pertemuan`),
  ADD CONSTRAINT `tb_hasilquiz_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_akun` (`id`);

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
