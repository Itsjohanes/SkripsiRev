-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2023 at 01:58 PM
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
(2, 'johanesalex774@gmail.com', 'Johannes Alexander Putra', '$2y$10$ek05wAWB7X5LJlnZjEK6S.H089K.cWyTu81rqaoxi8wFTUCdLq84C', 1),
(3, 'johannes@upi.edu', 'Putra', '$2y$10$KmWSyq.OMjjYKjq0ZuLYeeQfyZuQYZJJv1ywXZIvAXaOotnHJ.Oy6', 0),
(4, 'Uyumupala@hotmail.com', 'Doni', '$2y$10$3dfmCmyvmol6u8OGvmTaguv3awokFxEKDmxWVob/8Hh6Hx1ssTs7y', 0);

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
(6, 'Johannes Alexander Putra', 'johannes@upi.edu', '12'),
(7, 'Johannes Alexander Putra', 'johanesalex774@gmail.com', '11'),
(8, 'Johannes Alexander Putra', 'johanesalex774@gmail.com', '22'),
(9, 'Johannes Alexander Putra', 'johanesalex774@gmail.com', '11'),
(10, 'Johannes Alexander Putra', 'johanesalex774@gmail.com', '11'),
(11, 'Johannes Alexander Putra', 'johannes@upi.edu', 'Kamu ganteng'),
(12, 'Johannes Alexander Putra', 'johanesalex774@gmail.com', '1'),
(13, 'hhhohujjjjpojopjpjp', 'johannes@upi.edu', 'ee'),
(14, 'hhhohujjjjpojopjpjp', 'johanesalex774@gmail.com', 'ee'),
(15, 'Johannes Alexander Putra', 'johanesalex774@gmail.com', 'ee'),
(16, 'hhhohujjjjpojopjpjp', 'johannes@upi.edu', 'ee'),
(17, 'hhhohujjjjpojopjpjp', 'johannes@upi.edu', 'ee'),
(18, 'hhhohujjjjpojopjpjp', 'johannes@upi.edu', 'ee');

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
(10, 3, 'opsi_eopsi_aopsi_aopsi_eopsi_aopsi_aopsi_copsi_aopsi_aopsi_aopsi_eopsi_dopsi_aopsi_bopsi_copsi_copsi_copsi_copsi_dopsi_c', 100, 20, 0, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int NOT NULL,
  `pertemuan` int NOT NULL,
  `youtube` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(1, 2, 3, 'tes', '2023-02-19 07:36:07'),
(2, 3, 2, 'naon\n', '2023-02-19 07:44:55'),
(3, 3, 2, 'tes', '2023-02-19 07:51:48'),
(4, 2, 3, 'tes\n', '2023-03-02 05:57:51'),
(5, 3, 2, 'halo geri\n', '2023-03-02 06:45:22');

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
(10, 'tidak ada jawaban yang tepat', '2.png', '60', '30', '120', '150', '720', 'opsi_a'),
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
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id_pengirim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_hasilposttest`
--
ALTER TABLE `tb_hasilposttest`
  MODIFY `id_hasilposttest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_hasilpretest`
--
ALTER TABLE `tb_hasilpretest`
  MODIFY `id_hasilpretest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_hasiltugas`
--
ALTER TABLE `tb_hasiltugas`
  MODIFY `id_hasiltugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_posttest`
--
ALTER TABLE `tb_posttest`
  MODIFY `id_posttest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pretest`
--
ALTER TABLE `tb_pretest`
  MODIFY `id_pretest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_random`
--
ALTER TABLE `tb_random`
  MODIFY `id_random` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

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
