-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2025 at 12:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_penilaian_kinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `bidang` varchar(50) DEFAULT NULL,
  `penilaian_customer` varchar(20) DEFAULT NULL,
  `kedisiplinan` varchar(20) DEFAULT NULL,
  `kualitas_kerja` varchar(20) DEFAULT NULL,
  `sikap_perilaku` varchar(20) DEFAULT NULL,
  `penilaian_rekan_kerja` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`nik`, `nama`, `bidang`, `penilaian_customer`, `kedisiplinan`, `kualitas_kerja`, `sikap_perilaku`, `penilaian_rekan_kerja`) VALUES
('10293847561', 'Intan Permata', 'og', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Sangat Baik'),
('10928374658', 'Lestari Dewi', 'sales lapangan', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Baik', 'Sangat Baik'),
('10928374659', 'Bayu Firmansyah', 'mekanik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
('11234553256', 'gadis purnama sari', 'service counter', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
('11234553297', 'bayu juliandri', 'mekanik', 'Buruk', 'Baik', 'Baik', 'Baik', 'Baik'),
('123456789', 'Yudi', 'OB', NULL, '60', '80', '40', NULL),
('14315564854', 'devani aifitra', 'mekanik', 'Biasa Saja', 'Baik', 'Baik', 'Baik', 'Baik'),
('14315576334', 'dicky wandira', 'ob', 'Sangat Buruk', 'Buruk', 'Buruk', 'Buruk', 'Sangat Buruk'),
('1503060503', 'Indiani Putri', 'service counter', 'Biasa Saja', 'Baik', 'Baik', 'Baik', 'Baik'),
('19384726501', 'Hendra Wijaya', 'sales counter', 'Biasa Saja', 'Baik', 'Baik', 'Sangat Baik', 'Baik'),
('21938475601', 'Nur Aisyah', 'admin', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik'),
('37485910247', 'Budi Santoso', 'kepala mekanik', 'Sangat Baik', 'Baik', 'Baik', 'Sangat Baik', 'Baik'),
('37485910263', 'Citra Anjani', 'sales lapangan', 'Baik', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Sangat Baik'),
('38475619283', 'Yoga Prasetyo', 'mekanik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
('48392017452', 'Aulia Rahma', 'service counter', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
('48592017364', 'Andi Rian Pratama', 'driver', 'Biasa Saja', '80', '60', '60', 'Baik'),
('56473829103', 'Rafi Maulana', 'sales lapangan', 'Baik', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Baik'),
('56473829104', 'Dinda Ayu', 'part counter', 'Baik', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Sangat Baik'),
('63728194570', 'Fajar Nugroho', 'sales lapangan', 'Buruk', 'Buruk', 'Baik', 'Sangat Baik', 'Baik'),
('65748392014', 'Rizwan Hakim', 'mekanik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
('65748392015', 'Vania Putri', 'og', 'Baik', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Sangat Baik'),
('74829103647', 'Arief Ramadhan', 'sales lapangan', 'Sangat Baik', 'Baik', 'Baik', 'Sangat Baik', 'Baik'),
('74829103657', 'Melati Saraswati', 'sales counter', 'Biasa Saja', 'Baik', 'Sangat Baik', 'Baik', 'Baik'),
('81029384756', 'Dedi Kurniawan', 'sales lapangan', 'Baik', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Baik'),
('83910274635', 'Ayu Lestari', 'admin', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Sangat Baik'),
('83920174659', 'Siti Nurhaliza', 'part counter', 'Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik'),
('92018374652', 'Reza Saputra', 'part counter', 'Sangat Baik', 'Baik', 'Baik', 'Sangat Baik', 'Baik'),
('92837461502', 'Rina Kartika', 'sales counter', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik'),
('93847561029', 'Iqbal Rizky', 'sales lapangan', 'Biasa Saja', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `V` decimal(5,4) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `nik`, `nama`, `V`, `keterangan`, `ranking`) VALUES
(673, '21938475601', 'Nur Aisyah', 0.0667, 'Sudah Baik', 1),
(674, '92837461502', 'Rina Kartika', 0.0667, 'Sudah Baik', 2),
(675, '10293847561', 'Intan Permata', 0.0534, 'Sudah Baik', 3),
(676, '37485910263', 'Citra Anjani', 0.0534, 'Sudah Baik', 4),
(677, '56473829104', 'Dinda Ayu', 0.0534, 'Sudah Baik', 5),
(678, '65748392015', 'Vania Putri', 0.0534, 'Sudah Baik', 6),
(679, '83920174659', 'Siti Nurhaliza', 0.0534, 'Sudah Baik', 7),
(680, '10928374658', 'Lestari Dewi', 0.0534, 'Sudah Baik', 8),
(681, '56473829103', 'Rafi Maulana', 0.0427, 'Sudah Baik', 9),
(682, '81029384756', 'Dedi Kurniawan', 0.0427, 'Sudah Baik', 10),
(683, '83910274635', 'Ayu Lestari', 0.0427, 'Sudah Baik', 11),
(684, '37485910247', 'Budi Santoso', 0.0427, 'Sudah Baik', 12),
(685, '74829103647', 'Arief Ramadhan', 0.0427, 'Sudah Baik', 13),
(686, '92018374652', 'Reza Saputra', 0.0427, 'Sudah Baik', 14),
(687, '65748392014', 'Rizwan Hakim', 0.0342, 'Perlu diperbaiki', 15),
(688, '93847561029', 'Iqbal Rizky', 0.0320, 'Perlu diperbaiki', 16),
(689, '10928374659', 'Bayu Firmansyah', 0.0273, 'Perlu diperbaiki', 17),
(690, '11234553256', 'gadis purnama sari', 0.0273, 'Perlu diperbaiki', 18),
(691, '38475619283', 'Yoga Prasetyo', 0.0273, 'Perlu diperbaiki', 19),
(692, '48392017452', 'Aulia Rahma', 0.0273, 'Perlu diperbaiki', 20),
(693, '74829103657', 'Melati Saraswati', 0.0256, 'Perlu diperbaiki', 21),
(694, '19384726501', 'Hendra Wijaya', 0.0256, 'Perlu diperbaiki', 22),
(695, '14315564854', 'devani aifitra', 0.0205, 'Perlu diperbaiki', 23),
(696, '1503060503', 'Indiani Putri', 0.0205, 'Perlu diperbaiki', 24),
(697, '11234553297', 'bayu juliandri', 0.0137, 'Perlu diperbaiki', 25),
(698, '63728194570', 'Fajar Nugroho', 0.0085, 'Dipecat', 26),
(699, '14315576334', 'dicky wandira', 0.0002, 'Dipecat', 27),
(700, '48592017364', 'Andi Rian Pratama', 0.0000, 'Dipecat', 28);

-- --------------------------------------------------------

--
-- Table structure for table `hitung`
--

CREATE TABLE `hitung` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `bidang` varchar(50) DEFAULT NULL,
  `penilaian_customer` int(11) DEFAULT NULL,
  `kedisiplinan` int(11) DEFAULT NULL,
  `kualitas_kerja` int(11) DEFAULT NULL,
  `sikap_perilaku` int(11) DEFAULT NULL,
  `penilaian_rekan_kerja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hitung`
--

INSERT INTO `hitung` (`nik`, `nama`, `bidang`, `penilaian_customer`, `kedisiplinan`, `kualitas_kerja`, `sikap_perilaku`, `penilaian_rekan_kerja`) VALUES
('10293847561', 'Intan Permata', 'og', 80, 100, 100, 80, 100),
('10928374658', 'Lestari Dewi', 'sales lapangan', 100, 80, 100, 80, 100),
('10928374659', 'Bayu Firmansyah', 'mekanik', 80, 80, 80, 80, 80),
('11234553256', 'gadis purnama sari', 'service counter', 80, 80, 80, 80, 80),
('11234553297', 'bayu juliandri', 'mekanik', 40, 80, 80, 80, 80),
('14315564854', 'devani aifitra', 'mekanik', 60, 80, 80, 80, 80),
('14315576334', 'dicky wandira', 'ob', 20, 40, 40, 40, 20),
('1503060503', 'Indiani Putri', 'service counter', 60, 80, 80, 80, 80),
('19384726501', 'Hendra Wijaya', 'sales counter', 60, 80, 80, 100, 80),
('21938475601', 'Nur Aisyah', 'admin', 80, 100, 100, 100, 100),
('37485910247', 'Budi Santoso', 'kepala mekanik', 100, 80, 80, 100, 80),
('37485910263', 'Citra Anjani', 'sales lapangan', 80, 100, 80, 100, 100),
('38475619283', 'Yoga Prasetyo', 'mekanik', 80, 80, 80, 80, 80),
('48392017452', 'Aulia Rahma', 'service counter', 80, 80, 80, 80, 80),
('48592017364', 'Andi Rian Pratama', 'driver', 60, 0, 0, 0, 80),
('56473829103', 'Rafi Maulana', 'sales lapangan', 80, 100, 80, 100, 80),
('56473829104', 'Dinda Ayu', 'part counter', 80, 100, 80, 100, 100),
('63728194570', 'Fajar Nugroho', 'sales lapangan', 40, 40, 80, 100, 80),
('65748392014', 'Rizwan Hakim', 'mekanik', 100, 80, 80, 80, 80),
('65748392015', 'Vania Putri', 'og', 80, 100, 80, 100, 100),
('74829103647', 'Arief Ramadhan', 'sales lapangan', 100, 80, 80, 100, 80),
('74829103657', 'Melati Saraswati', 'sales counter', 60, 80, 100, 80, 80),
('81029384756', 'Dedi Kurniawan', 'sales lapangan', 80, 100, 80, 100, 80),
('83910274635', 'Ayu Lestari', 'admin', 80, 80, 100, 80, 100),
('83920174659', 'Siti Nurhaliza', 'part counter', 80, 80, 100, 100, 100),
('92018374652', 'Reza Saputra', 'part counter', 100, 80, 80, 100, 80),
('92837461502', 'Rina Kartika', 'sales counter', 80, 100, 100, 100, 100),
('93847561029', 'Iqbal Rizky', 'sales lapangan', 60, 100, 80, 100, 80);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `bidang` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `bidang`, `jenis_kelamin`) VALUES
('10293847561', 'Intan Permata', 'og', 'Perempuan'),
('10928374658', 'Lestari Dewi', 'sales lapangan', 'Perempuan'),
('10928374659', 'Bayu Firmansyah', 'mekanik', 'Laki-laki'),
('11234553256', 'gadis purnama sari', 'service counter', 'Perempuan'),
('11234553297', 'bayu juliandri', 'mekanik', 'Laki-laki'),
('123456789', 'Yudi', 'OB', 'Laki-laki'),
('14315564854', 'devani aifitra', 'mekanik', 'Perempuan'),
('14315576334', 'dicky wandira', 'ob', 'Laki-laki'),
('1503060503', 'Indiani Putri', 'service counter', 'Perempuan'),
('19384726501', 'Hendra Wijaya', 'sales counter', 'Laki-laki'),
('21938475601', 'Nur Aisyah', 'admin', 'Perempuan'),
('37485910247', 'Budi Santoso', 'kepala mekanik', 'Laki-laki'),
('37485910263', 'Citra Anjani', 'sales lapangan', 'Perempuan'),
('38475619283', 'Yoga Prasetyo', 'mekanik', 'Laki-laki'),
('48392017452', 'Aulia Rahma', 'service counter', 'Perempuan'),
('48592017364', 'Andi Rian Pratama', 'driver', 'Laki-laki'),
('56473829103', 'Rafi Maulana', 'sales lapangan', 'Laki-laki'),
('56473829104', 'Dinda Ayu', 'part counter', 'Perempuan'),
('63728194570', 'Fajar Nugroho', 'sales lapangan', 'Laki-laki'),
('65748392014', 'Rizwan Hakim', 'mekanik', 'Laki-laki'),
('65748392015', 'Vania Putri', 'og', 'Perempuan'),
('74829103647', 'Arief Ramadhan', 'sales lapangan', 'Laki-laki'),
('74829103657', 'Melati Saraswati', 'sales counter', 'Perempuan'),
('81029384756', 'Dedi Kurniawan', 'sales lapangan', 'Laki-laki'),
('83910274635', 'Ayu Lestari', 'admin', 'Perempuan'),
('83920174659', 'Siti Nurhaliza', 'part counter', 'Perempuan'),
('92018374652', 'Reza Saputra', 'part counter', 'Laki-laki'),
('92837461502', 'Rina Kartika', 'sales counter', 'Perempuan'),
('93847561029', 'Iqbal Rizky', 'sales lapangan', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode_kriteria` varchar(15) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'C01', 'Penilaian Customer', 0.30),
(2, 'C02', 'Kedisiplinan Kerja', 0.20),
(3, 'C03', 'Kualitas Kerja', 0.20),
(4, 'C04', 'Sikap Dan Perilaku', 0.20),
(5, 'C05', 'Penilaian Rekan Kerja', 0.10);

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `aktivitas` text DEFAULT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `user`, `aktivitas`, `waktu`) VALUES
(1, 'Zidan Ahmad', 'Admin berhasil login', '2025-07-05 14:19:47'),
(2, 'Zidan Ahmad', 'Admin berhasil login', '2025-07-05 14:28:08'),
(3, 'wahyu Xanders', 'Manager berhasil login', '2025-07-05 14:40:13'),
(4, 'Intan Permata', 'Karyawan berhasil login', '2025-07-05 18:08:58'),
(5, 'wahyu Xanders', 'Manager berhasil login', '2025-07-05 18:16:36'),
(6, 'Intan Permata', 'Karyawan berhasil login', '2025-07-05 18:18:33'),
(7, 'wahyu Xanders', 'Manager berhasil login', '2025-07-05 18:23:47'),
(8, 'wahyu Xanders', 'Mencetak laporan penilaian karyawan', '2025-07-05 18:27:38'),
(9, 'wahyu Xanders', 'Mencetak laporan penilaian karyawan', '2025-07-05 18:29:29'),
(10, 'Zidan Ahmad', 'Admin berhasil login', '2025-07-25 09:36:55'),
(11, 'wahyu Xanders', 'Manager berhasil login', '2025-07-25 09:38:56'),
(12, 'wahyu Xanders', 'Manager berhasil login', '2025-07-25 09:41:56'),
(13, 'wahyu Xanders', 'Mencetak laporan penilaian karyawan', '2025-07-25 09:43:29'),
(14, 'wahyu Xanders', 'Manager berhasil login', '2025-07-25 10:36:32'),
(15, 'Wahyu Prayogi', 'Manager berhasil login', '2025-08-20 21:56:31'),
(16, 'Zidan Ahmad', 'Admin berhasil login', '2025-08-20 21:57:19'),
(17, 'Wahyu Prayogi', 'Manager berhasil login', '2025-08-20 22:29:54'),
(18, 'Zidan Ahmad', 'Admin berhasil login', '2025-08-20 22:53:39'),
(19, 'Wahyu Prayogi', 'Manager berhasil login', '2025-08-20 23:02:05'),
(20, 'gadis purnama sari', 'Karyawan berhasil login', '2025-08-20 23:03:55'),
(21, 'Wahyu Prayogi', 'Manager berhasil login', '2025-08-21 00:01:53'),
(22, 'gadis purnama sari', 'Karyawan berhasil login', '2025-08-21 00:03:47'),
(23, 'Wahyu Prayogi', 'Manager berhasil login', '2025-08-21 04:22:58'),
(24, 'Wahyu Prayogi', 'Mencetak laporan penilaian karyawan', '2025-08-21 04:23:02'),
(25, 'Zidan Ahmad', 'Admin berhasil login', '2025-08-21 04:24:12'),
(26, 'Wahyu Prayogi', 'Manager berhasil login', '2025-08-21 04:26:10'),
(27, 'Zidan Ahmad', 'Admin berhasil login', '2025-08-21 04:56:31'),
(28, NULL, 'Menghapus user  (123456789)', '2025-08-21 04:58:44'),
(29, '11223345677', 'Menambahkan user Yudi Waluyo (123456789)', '2025-08-21 05:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_cus`
--

CREATE TABLE `nilai_cus` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `bidang` varchar(25) NOT NULL,
  `C01` int(11) NOT NULL,
  `C02` int(11) NOT NULL,
  `C03` int(11) NOT NULL,
  `C04` int(11) NOT NULL,
  `C05` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_cus`
--

INSERT INTO `nilai_cus` (`id`, `nama_customer`, `nama_karyawan`, `bidang`, `C01`, `C02`, `C03`, `C04`, `C05`) VALUES
(49, 'Rizka Nuraini', 'Iqbal Rizky', 'sales lapangan', 0, 0, 0, 0, 0),
(50, 'Ferry Susanto', 'Melati Saraswati', 'sales counter', 0, 0, 0, 0, 0),
(99, 'Vira Anggraini', 'Indiani Putri', 'service counter', 80, 60, 60, 80, 40),
(100, 'Rahmat Hidayat', 'Rizwan Hakim', 'mekanik', 100, 80, 60, 100, 60);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_manager`
--

CREATE TABLE `nilai_manager` (
  `nik` varchar(20) NOT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `bidang` varchar(100) DEFAULT NULL,
  `C01` int(11) DEFAULT NULL,
  `C02` int(11) DEFAULT NULL,
  `C03` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_manager`
--

INSERT INTO `nilai_manager` (`nik`, `nama_karyawan`, `bidang`, `C01`, `C02`, `C03`) VALUES
('10293847561', 'Intan Permata', 'og', 100, 100, 80),
('10928374658', 'Lestari Dewi', 'sales lapangan', 80, 100, 80),
('10928374659', 'Bayu Firmansyah', 'mekanik', 80, 80, 80),
('11234553256', 'gadis purnama sari', 'service counter', 80, 80, 80),
('11234553297', 'bayu juliandri', 'mekanik', 80, 80, 80),
('123456789', 'Yudi', 'OB', 60, 80, 40),
('14315564854', 'devani aifitra', 'mekanik', 80, 80, 80),
('14315576334', 'dicky wandira', 'ob', 40, 40, 40),
('1503060503', 'Indiani Putri', 'service counter', 80, 80, 80),
('19384726501', 'Hendra Wijaya', 'sales counter', 80, 80, 100),
('21938475601', 'Nur Aisyah', 'admin', 100, 100, 100),
('37485910247', 'Budi Santoso', 'kepala mekanik', 80, 80, 100),
('37485910263', 'Citra Anjani', 'sales lapangan', 100, 80, 100),
('38475619283', 'Yoga Prasetyo', 'mekanik', 80, 80, 80),
('48392017452', 'Aulia Rahma', 'service counter', 80, 80, 80),
('48592017364', 'Andi Rian Pratama', 'driver', 80, 60, 60),
('56473829103', 'Rafi Maulana', 'sales lapangan', 100, 80, 100),
('56473829104', 'Dinda Ayu', 'part counter', 100, 80, 100),
('63728194570', 'Fajar Nugroho', 'sales lapangan', 40, 80, 100),
('65748392014', 'Rizwan Hakim', 'mekanik', 80, 80, 80),
('65748392015', 'Vania Putri', 'og', 100, 80, 100),
('74829103647', 'Arief Ramadhan', 'sales lapangan', 80, 80, 100),
('74829103657', 'Melati Saraswati', 'sales counter', 80, 100, 80),
('81029384756', 'Dedi Kurniawan', 'sales lapangan', 100, 80, 100),
('83910274635', 'Ayu Lestari', 'admin', 80, 100, 80),
('83920174659', 'Siti Nurhaliza', 'part counter', 80, 100, 100),
('92018374652', 'Reza Saputra', 'part counter', 80, 80, 100),
('92837461502', 'Rina Kartika', 'sales counter', 100, 100, 100),
('93847561029', 'Iqbal Rizky', 'sales lapangan', 100, 80, 100);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_rekan`
--

CREATE TABLE `nilai_rekan` (
  `id` int(11) NOT NULL,
  `nik_karyawan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `bidang_karyawan` varchar(100) NOT NULL,
  `nik_rekan` varchar(20) NOT NULL,
  `nama_rekan` varchar(100) NOT NULL,
  `bidang_rekan` varchar(100) NOT NULL,
  `C01` int(11) NOT NULL,
  `C02` int(11) NOT NULL,
  `C03` int(11) NOT NULL,
  `C04` int(11) NOT NULL,
  `C05` int(11) NOT NULL,
  `tanggal_penilaian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nik_sales_counter` varchar(20) DEFAULT NULL,
  `nik_sales_lapangan` varchar(20) DEFAULT NULL,
  `nik_driver` varchar(20) DEFAULT NULL,
  `nik_customer` varchar(20) DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `invoice_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `nik_sales_counter`, `nik_sales_lapangan`, `nik_driver`, `nik_customer`, `nama_customer`, `tanggal`, `invoice_no`) VALUES
(1, '19384726501', '10928374658', '48592017364', '90000001001', 'Ahmad Fauzan', '2025-02-01', 'INV-2025-0001'),
(2, '74829103657', '37485910263', '48592017364', '90000001002', 'Lia Marlina', '2025-02-02', 'INV-2025-0002'),
(3, '92837461502', '56473829103', '48592017364', '90000001003', 'Rizky Aditya', '2025-02-02', 'INV-2025-0003'),
(4, '19384726501', '63728194570', '48592017364', '90000001004', 'Nina Kartika', '2025-02-03', 'INV-2025-0004'),
(5, '74829103657', '74829103647', '48592017364', '90000001005', 'Fikri Ramadhan', '2025-02-03', 'INV-2025-0005'),
(6, '92837461502', '81029384756', '48592017364', '90000001006', 'Yani Maulida', '2025-02-04', 'INV-2025-0006'),
(7, '19384726501', '93847561029', '48592017364', '90000001007', 'Bayu Saputra', '2025-02-04', 'INV-2025-0007'),
(8, '74829103657', '10928374658', '48592017364', '90000001008', 'Dina Rosdiana', '2025-02-05', 'INV-2025-0008'),
(9, '92837461502', '37485910263', '48592017364', '90000001009', 'Taufik Hidayat', '2025-02-05', 'INV-2025-0009'),
(10, '19384726501', '56473829103', '48592017364', '90000001010', 'Maya Sari', '2025-02-06', 'INV-2025-0010'),
(11, '74829103657', '63728194570', '48592017364', '90000001011', 'Rahmat Surya', '2025-02-06', 'INV-2025-0011'),
(12, '92837461502', '74829103647', '48592017364', '90000001012', 'Selvi Amalia', '2025-02-07', 'INV-2025-0012'),
(13, '19384726501', '81029384756', '48592017364', '90000001013', 'Ilham Fadli', '2025-02-07', 'INV-2025-0013'),
(14, '74829103657', '93847561029', '48592017364', '90000001014', 'Ria Lestari', '2025-02-08', 'INV-2025-0014'),
(15, '92837461502', '10928374658', '48592017364', '90000001015', 'Dodi Pratama', '2025-02-08', 'INV-2025-0015'),
(16, '19384726501', '37485910263', '48592017364', '90000001016', 'Putri Dwi', '2025-02-09', 'INV-2025-0016'),
(17, '74829103657', '56473829103', '48592017364', '90000001017', 'Angga Saputra', '2025-02-09', 'INV-2025-0017'),
(18, '92837461502', '63728194570', '48592017364', '90000001018', 'Lina Oktavia', '2025-02-10', 'INV-2025-0018'),
(19, '19384726501', '74829103647', '48592017364', '90000001019', 'Reza Firmansyah', '2025-02-10', 'INV-2025-0019'),
(20, '74829103657', '81029384756', '48592017364', '90000001020', 'Fani Amelia', '2025-02-11', 'INV-2025-0020'),
(21, '92837461502', '93847561029', '48592017364', '90000001021', 'Dedi Rahman', '2025-02-11', 'INV-2025-0021'),
(22, '19384726501', '10928374658', '48592017364', '90000001022', 'Nadya Azzahra', '2025-02-12', 'INV-2025-0022'),
(23, '74829103657', '37485910263', '48592017364', '90000001023', 'Satria Mahendra', '2025-02-12', 'INV-2025-0023'),
(24, '92837461502', '56473829103', '48592017364', '90000001024', 'Yulia Andriani', '2025-02-13', 'INV-2025-0024'),
(25, '19384726501', '63728194570', '48592017364', '90000001025', 'Fahmi Hidayat', '2025-02-13', 'INV-2025-0025'),
(26, '74829103657', '74829103647', '48592017364', '90000001026', 'Nurul Azizah', '2025-02-14', 'INV-2025-0026'),
(27, '92837461502', '81029384756', '48592017364', '90000001027', 'Galang Pratama', '2025-02-14', 'INV-2025-0027'),
(28, '19384726501', '93847561029', '48592017364', '90000001028', 'Rina Marlina', '2025-02-15', 'INV-2025-0028'),
(29, '74829103657', '10928374658', '48592017364', '90000001029', 'Wahyu Firmansyah', '2025-02-15', 'INV-2025-0029'),
(30, '92837461502', '37485910263', '48592017364', '90000001030', 'Tari Septiani', '2025-02-16', 'INV-2025-0030'),
(31, '19384726501', '56473829103', '48592017364', '90000001031', 'Bagus Aditya', '2025-02-16', 'INV-2025-0031'),
(32, '74829103657', '63728194570', '48592017364', '90000001032', 'Silvia Rahayu', '2025-02-17', 'INV-2025-0032'),
(33, '92837461502', '74829103647', '48592017364', '90000001033', 'Miko Wicaksono', '2025-02-17', 'INV-2025-0033'),
(34, '19384726501', '81029384756', '48592017364', '90000001034', 'Desi Amelia', '2025-02-18', 'INV-2025-0034'),
(35, '74829103657', '93847561029', '48592017364', '90000001035', 'Taufan Maulana', '2025-02-18', 'INV-2025-0035'),
(36, '92837461502', '10928374658', '48592017364', '90000001036', 'Rani Aprilia', '2025-02-19', 'INV-2025-0036'),
(37, '19384726501', '37485910263', '48592017364', '90000001037', 'Hendra Saputra', '2025-02-19', 'INV-2025-0037'),
(38, '74829103657', '56473829103', '48592017364', '90000001038', 'Tiara Wulandari', '2025-02-20', 'INV-2025-0038'),
(39, '92837461502', '63728194570', '48592017364', '90000001039', 'Aldi Yulianto', '2025-02-20', 'INV-2025-0039'),
(40, '19384726501', '74829103647', '48592017364', '90000001040', 'Siti Zulaikha', '2025-02-21', 'INV-2025-0040'),
(41, '74829103657', '81029384756', '48592017364', '90000001041', 'Vino Prasetyo', '2025-02-21', 'INV-2025-0041'),
(42, '92837461502', '93847561029', '48592017364', '90000001042', 'Mega Sari', '2025-02-22', 'INV-2025-0042'),
(43, '19384726501', '10928374658', '48592017364', '90000001043', 'Iqbal Fathoni', '2025-02-22', 'INV-2025-0043'),
(44, '74829103657', '37485910263', '48592017364', '90000001044', 'Della Oktaviani', '2025-02-23', 'INV-2025-0044'),
(45, '92837461502', '56473829103', '48592017364', '90000001045', 'Eka Saputri', '2025-02-23', 'INV-2025-0045'),
(46, '19384726501', '63728194570', '48592017364', '90000001046', 'Fahrul Rozi', '2025-02-24', 'INV-2025-0046'),
(47, '74829103657', '74829103647', '48592017364', '90000001047', 'Vira Anggraini', '2025-02-24', 'INV-2025-0047'),
(48, '92837461502', '81029384756', '48592017364', '90000001048', 'Yusuf Maulana', '2025-02-25', 'INV-2025-0048'),
(49, '19384726501', '93847561029', '48592017364', '90000001049', 'Rizka Nuraini', '2025-02-25', 'INV-2025-0049'),
(50, '74829103657', '10928374658', '48592017364', '90000001050', 'Ferry Susanto', '2025-02-26', 'INV-2025-0050');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id` int(11) NOT NULL,
  `nik_mekanik` varchar(20) NOT NULL,
  `nik_service_counter` varchar(20) NOT NULL,
  `nik_customer` varchar(20) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `plate_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id`, `nik_mekanik`, `nik_service_counter`, `nik_customer`, `nama_customer`, `tanggal`, `plate_no`) VALUES
(1, '65748392014', '11234553256', '90000000017', 'Joko Santoso', '2025-02-01', 'BH 1406 CPZ'),
(2, '14315564854', '1503060503', '90000000040', 'Taufik Hidayat', '2025-02-01', 'BH 7124 HHL'),
(3, '65748392014', '11234553256', '90000000059', 'Dian Pratama', '2025-02-01', 'BH 9566 EGL'),
(4, '10928374659', '48392017452', '90000000090', 'Oscar Pratama', '2025-02-01', 'BH 9011 OVT'),
(5, '10928374659', '48392017452', '90000000087', 'Rizki Ramadhan', '2025-02-02', 'BH 4731 DGB'),
(6, '14315564854', '1503060503', '90000000045', 'Lutfi Hakim', '2025-02-02', 'BH 2430 HBU'),
(7, '65748392014', '11234553256', '90000000022', 'Irfan Maulana', '2025-02-02', 'BH 8723 IBV'),
(8, '10928374659', '1503060503', '90000000033', 'Satria Dwi', '2025-02-03', 'BH 2242 TDR'),
(9, '14315564854', '48392017452', '90000000029', 'Fadli Ramadhan', '2025-02-03', 'BH 6522 HUK'),
(10, '65748392014', '48392017452', '90000000011', 'Bayu Nugroho', '2025-02-03', 'BH 3244 BGY'),
(11, '10928374659', '11234553256', '90000000088', 'Ardiansyah Putra', '2025-02-04', 'BH 1567 ZZT'),
(12, '65748392014', '1503060503', '90000000065', 'Syahrul Anwar', '2025-02-04', 'BH 2784 TYH'),
(13, '14315564854', '48392017452', '90000000018', 'Nina Kartika', '2025-02-04', 'BH 9003 KLM'),
(14, '10928374659', '1503060503', '90000000050', 'Ayu Lestari', '2025-02-05', 'BH 1456 LOP'),
(15, '14315564854', '11234553256', '90000000093', 'Fajar Nugraha', '2025-02-05', 'BH 7654 QAZ'),
(16, '65748392014', '1503060503', '90000000023', 'Rina Marlina', '2025-02-05', 'BH 6732 VBN'),
(17, '10928374659', '48392017452', '90000000062', 'Dedi Cahyono', '2025-02-06', 'BH 8391 KJI'),
(18, '14315564854', '1503060503', '90000000014', 'Yusuf Ardi', '2025-02-06', 'BH 9244 WER'),
(19, '65748392014', '11234553256', '90000000028', 'Siti Nurhaliza', '2025-02-06', 'BH 6782 XCV'),
(20, '10928374659', '11234553256', '90000000039', 'Hendra Wijaya', '2025-02-07', 'BH 1423 UYT'),
(21, '14315564854', '48392017452', '90000000035', 'Winda Puspita', '2025-02-07', 'BH 5566 IOP'),
(22, '65748392014', '48392017452', '90000000094', 'Lilis Suryani', '2025-02-07', 'BH 9977 HJK'),
(23, '10928374659', '1503060503', '90000000042', 'Rico Saputra', '2025-02-08', 'BH 1234 DRT'),
(24, '14315564854', '11234553256', '90000000031', 'Mega Permata', '2025-02-08', 'BH 4421 MNB'),
(25, '65748392014', '1503060503', '90000000026', 'Bagas Rahman', '2025-02-08', 'BH 8888 TGB'),
(26, '10928374659', '48392017452', '90000000015', 'Dewi Sartika', '2025-02-09', 'BH 2211 LKY'),
(27, '14315564854', '1503060503', '90000000019', 'Agus Saputra', '2025-02-09', 'BH 9987 VFR'),
(28, '65748392014', '48392017452', '90000000043', 'Surya Maulana', '2025-02-09', 'BH 1023 BNH'),
(29, '10928374659', '11234553256', '90000000032', 'Santi Dewi', '2025-02-10', 'BH 4378 POI'),
(30, '14315564854', '1503060503', '90000000038', 'Febrian Putra', '2025-02-10', 'BH 3321 MJU'),
(31, '65748392014', '1503060503', '90000000066', 'Putri Maharani', '2025-02-10', 'BH 7689 UJJ'),
(32, '10928374659', '48392017452', '90000000067', 'Dimas Prasetyo', '2025-02-11', 'BH 1122 TRF'),
(33, '14315564854', '11234553256', '90000000068', 'Novi Anggraini', '2025-02-11', 'BH 2219 KLO'),
(34, '65748392014', '11234553256', '90000000069', 'Herman Siregar', '2025-02-11', 'BH 3456 CVB'),
(35, '10928374659', '1503060503', '90000000070', 'Salma Zahra', '2025-02-12', 'BH 9988 LKO'),
(36, '14315564854', '48392017452', '90000000071', 'Irwan Saputra', '2025-02-12', 'BH 6565 VBN'),
(37, '65748392014', '1503060503', '90000000072', 'Melati Ayu', '2025-02-12', 'BH 4343 TRE'),
(38, '10928374659', '11234553256', '90000000073', 'Zulfan Fikri', '2025-02-13', 'BH 9898 POL'),
(39, '14315564854', '1503060503', '90000000074', 'Tasya Kirana', '2025-02-13', 'BH 5544 MKA'),
(40, '65748392014', '48392017452', '90000000075', 'Reza Nugroho', '2025-02-13', 'BH 7771 QWE'),
(41, '10928374659', '1503060503', '90000000076', 'Salsa Amelia', '2025-02-14', 'BH 8100 PLM'),
(42, '14315564854', '11234553256', '90000000077', 'Farhan Maulana', '2025-02-14', 'BH 9992 TGE'),
(43, '65748392014', '11234553256', '90000000078', 'Rika Damayanti', '2025-02-14', 'BH 2389 JUI'),
(44, '10928374659', '48392017452', '90000000079', 'Rizky Saputra', '2025-02-15', 'BH 8934 KMN'),
(45, '14315564854', '1503060503', '90000000080', 'Amanda Putri', '2025-02-15', 'BH 1029 OPI'),
(46, '65748392014', '1503060503', '90000000081', 'Fahri Ramadan', '2025-02-15', 'BH 5567 RFT'),
(47, '10928374659', '11234553256', '90000000082', 'Tina Safitri', '2025-02-16', 'BH 1123 VGF'),
(48, '14315564854', '48392017452', '90000000083', 'Andika Pratama', '2025-02-16', 'BH 6600 XCV'),
(49, '65748392014', '1503060503', '90000000084', 'Dewi Purnama', '2025-02-16', 'BH 3398 UIK'),
(50, '10928374659', '1503060503', '90000000085', 'Bayu Hartanto', '2025-02-17', 'BH 7789 QAZ'),
(51, '14315564854', '11234553256', '90000000086', 'Wulan Sari', '2025-02-17', 'BH 9944 BNM'),
(52, '65748392014', '48392017452', '90000000087', 'Habibie Putra', '2025-02-17', 'BH 1233 ASX'),
(53, '10928374659', '11234553256', '90000000088', 'Ardiansyah Putra', '2025-02-18', 'BH 1366 ZZT'),
(54, '14315564854', '1503060503', '90000000089', 'Syahrul Anwar', '2025-02-18', 'BH 2785 TYH'),
(55, '65748392014', '48392017452', '90000000090', 'Nina Kartika', '2025-02-18', 'BH 9004 KLM'),
(56, '10928374659', '1503060503', '90000000091', 'Ayu Lestari', '2025-02-19', 'BH 1457 LOP'),
(57, '14315564854', '11234553256', '90000000092', 'Fajar Nugraha', '2025-02-19', 'BH 7655 QAZ'),
(58, '65748392014', '1503060503', '90000000093', 'Rina Marlina', '2025-02-19', 'BH 6733 VBN'),
(59, '10928374659', '48392017452', '90000000094', 'Dedi Cahyono', '2025-02-20', 'BH 8392 KJI'),
(60, '14315564854', '1503060503', '90000000095', 'Yusuf Ardi', '2025-02-20', 'BH 9245 WER'),
(61, '65748392014', '11234553256', '90000000096', 'Yuli Andriani', '2025-02-20', 'BH 1111 RYU'),
(62, '10928374659', '48392017452', '90000000097', 'Rangga Permana', '2025-02-21', 'BH 1122 OLP'),
(63, '14315564854', '1503060503', '90000000098', 'Tia Rosalina', '2025-02-21', 'BH 2233 KJM'),
(64, '65748392014', '48392017452', '90000000099', 'Yoga Saputra', '2025-02-21', 'BH 3344 BGT'),
(65, '10928374659', '1503060503', '90000000100', 'Fira Ayu', '2025-02-22', 'BH 4455 DRT'),
(66, '14315564854', '11234553256', '90000000101', 'Ahmad Fauzi', '2025-02-22', 'BH 5566 POI'),
(67, '65748392014', '1503060503', '90000000102', 'Nadya Kurnia', '2025-02-22', 'BH 6677 TGH'),
(68, '10928374659', '11234553256', '90000000103', 'Dedi Supriadi', '2025-02-23', 'BH 7788 LKJ'),
(69, '14315564854', '48392017452', '90000000104', 'Rani Damayanti', '2025-02-23', 'BH 8899 MNB'),
(70, '65748392014', '1503060503', '90000000105', 'Wahyu Ramadhan', '2025-02-23', 'BH 9900 QAZ'),
(71, '10928374659', '11234553256', '90000000106', 'Putra Mahendra', '2025-02-24', 'BH 1001 BVC'),
(72, '14315564854', '1503060503', '90000000107', 'Melinda Putri', '2025-02-24', 'BH 1112 CVB'),
(73, '65748392014', '11234553256', '90000000108', 'Sandi Ramli', '2025-02-24', 'BH 1223 ZXC'),
(74, '10928374659', '1503060503', '90000000109', 'Dina Sari', '2025-02-25', 'BH 1334 XCV'),
(75, '14315564854', '48392017452', '90000000110', 'Reza Maulana', '2025-02-25', 'BH 1445 KLP'),
(76, '65748392014', '1503060503', '90000000111', 'Yuni Setiawati', '2025-02-25', 'BH 1556 JKI'),
(77, '10928374659', '11234553256', '90000000112', 'Imam Hidayat', '2025-02-26', 'BH 1667 POI'),
(78, '14315564854', '48392017452', '90000000113', 'Nisa Amelia', '2025-02-26', 'BH 1778 UYT'),
(79, '65748392014', '1503060503', '90000000114', 'Andri Firmansyah', '2025-02-26', 'BH 1889 LKJ'),
(80, '10928374659', '11234553256', '90000000115', 'Selvi Lestari', '2025-02-27', 'BH 1990 BNM'),
(81, '14315564854', '1503060503', '90000000116', 'Bayu Santoso', '2025-02-27', 'BH 2001 ASX'),
(82, '65748392014', '11234553256', '90000000117', 'Rizka Amelia', '2025-02-27', 'BH 2112 TGH'),
(83, '10928374659', '1503060503', '90000000118', 'Ilham Saputra', '2025-02-28', 'BH 2223 MNB'),
(84, '14315564854', '48392017452', '90000000119', 'Fika Rahmadani', '2025-02-28', 'BH 2334 ZXC'),
(85, '65748392014', '1503060503', '90000000120', 'Rehan Alfarizi', '2025-02-28', 'BH 2445 QWE'),
(86, '10928374659', '11234553256', '90000000121', 'Alya Nurhaliza', '2025-03-01', 'BH 2556 ASD'),
(87, '14315564854', '48392017452', '90000000122', 'Dodi Prayoga', '2025-03-01', 'BH 2667 RTY'),
(88, '65748392014', '1503060503', '90000000123', 'Intan Permata', '2025-03-01', 'BH 2778 FGH'),
(89, '10928374659', '11234553256', '90000000124', 'Fadil Rahman', '2025-03-02', 'BH 2889 CVB'),
(90, '14315564854', '1503060503', '90000000125', 'Lina Oktaviani', '2025-03-02', 'BH 2990 WSX'),
(91, '65748392014', '11234553256', '90000000126', 'Yoga Ramadhan', '2025-03-02', 'BH 3001 TRE'),
(92, '10928374659', '1503060503', '90000000127', 'Risma Putri', '2025-03-03', 'BH 3112 BNM'),
(93, '14315564854', '48392017452', '90000000128', 'Sultan Maulana', '2025-03-03', 'BH 3223 POI'),
(94, '65748392014', '1503060503', '90000000129', 'Nanda Permana', '2025-03-03', 'BH 3334 JKI'),
(95, '10928374659', '11234553256', '90000000130', 'Hani Kartika', '2025-03-04', 'BH 3445 PLM'),
(96, '14315564854', '1503060503', '90000000131', 'Iqbal Rizqi', '2025-03-04', 'BH 3556 YHN'),
(97, '65748392014', '48392017452', '90000000132', 'Maya Fitriani', '2025-03-04', 'BH 3667 MKI'),
(98, '10928374659', '11234553256', '90000000133', 'Taufik Ismail', '2025-03-05', 'BH 3778 UJI'),
(99, '14315564854', '1503060503', '90000000134', 'Vira Anggraini', '2025-03-05', 'BH 3889 CXZ'),
(100, '65748392014', '11234553256', '90000000135', 'Rahmat Hidayat', '2025-03-05', 'BH 3990 MLO');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub` int(11) NOT NULL,
  `kode_kriteria` varchar(15) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub`, `kode_kriteria`, `deskripsi`, `nilai`) VALUES
(1, 'C01', 'Sangat Baik', 100),
(2, 'C01', 'Baik', 80),
(3, 'C01', 'Biasa Saja', 60),
(4, 'C01', 'Buruk', 40),
(5, 'C01', 'Sangat Buruk', 20),
(6, 'C02', 'Sangat Baik', 100),
(7, 'C02', 'Baik', 80),
(8, 'C02', 'Biasa Saja', 60),
(9, 'C02', 'Buruk', 40),
(10, 'C02', 'Sangat Buruk', 20),
(11, 'C03', 'Sangat Baik', 100),
(12, 'C03', 'Baik', 80),
(13, 'C03', 'Biasa Saja', 60),
(14, 'C03', 'Buruk', 40),
(15, 'C03', 'Sangat Buruk', 20),
(16, 'C04', 'Sangat Baik', 100),
(17, 'C04', 'Baik', 80),
(18, 'C04', 'Biasa Saja', 60),
(19, 'C04', 'Buruk', 40),
(20, 'C04', 'Sangat Buruk', 20),
(21, 'C05', 'Sangat Baik', 100),
(22, 'C05', 'Baik', 80),
(23, 'C05', 'Biasa Saja', 60),
(24, 'C05', 'Buruk', 40),
(25, 'C05', 'Sangat Buruk', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','manager','karyawan') DEFAULT 'karyawan',
  `bidang` varchar(50) DEFAULT NULL,
  `status` enum('pending','aktif','ditolak') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nik`, `nama`, `password`, `role`, `bidang`, `status`) VALUES
('10293847561', 'Intan Permata', 'ffae75b9f641b58edc3f226581eb3dfe', 'karyawan', 'og', 'aktif'),
('10928374658', 'Lestari Dewi', 'f74df424a466984ae372c7766d540803', 'karyawan', 'sales lapangan', 'aktif'),
('10928374659', 'Bayu Firmansyah', 'd0c6a909f539307f0f60282674009e31', 'karyawan', 'mekanik', 'aktif'),
('11223345677', 'Zidan Ahmad', 'a2ac5b34a3c62d8eff80d642cb7ad372', 'admin', 'Admin', 'aktif'),
('11234553256', 'gadis purnama sari', '0df48cdde02249eb8efc5970f20d0f83', 'karyawan', 'service counter', 'aktif'),
('11234553297', 'bayu juliandri', 'a430e06de5ce438d499c2e4063d60fd6', 'karyawan', 'mekanik', 'aktif'),
('123456789', 'Yudi Waluyo', '14a0e93868051a20906e9f14a02487d2', 'karyawan', 'OB', 'pending'),
('14315564854', 'devani aifitra', '215c12c8b343dc33f57189594309c6f8', 'karyawan', 'mekanik', 'aktif'),
('14315576334', 'dicky wandira', 'ee0b6db238b075d0da86340048fb147a', 'karyawan', 'ob', 'aktif'),
('1503060503', 'Indiani Putri', '8cfdbf661d0e27d8bc4b9a4f8b2640be', 'karyawan', 'service counter', 'aktif'),
('19384726501', 'Hendra Wijaya', 'd536468fd4600c5244d0ee734299c743', 'karyawan', 'sales counter', 'aktif'),
('21938475601', 'Nur Aisyah', 'b8cb93487868e5ab29c78116ebba1fc9', 'karyawan', 'sales counter', 'aktif'),
('3152000004', 'Wahyu Prayogi', '6ce0e9c7dff424bb377cb6dd043fcad7', 'manager', 'manager', 'aktif'),
('37485910247', 'Budi Santoso', '5894c82cc2aeb6560140a81694f99051', 'karyawan', 'kepala mekanik', 'aktif'),
('37485910263', 'Citra Anjani', '49f9633e85794ad365335ad1cb0a9486', 'karyawan', 'sales lapangan', 'aktif'),
('38475619283', 'Yoga Prasetyo', '8be1c94fdc10945f5704322b08faa2a2', 'karyawan', 'mekanik', 'aktif'),
('48392017452', 'Aulia Rahma', 'f47a82045106bbb8c11ab7ede4f35b7a', 'karyawan', 'service counter', 'aktif'),
('48592017364', 'Andi Rian Pratama', '5f1d0630d2deaa9f541131a857240ac0', 'karyawan', 'driver', 'aktif'),
('56473829103', 'Rafi Maulana', '85c473091c49a4e9cd3aa840ad75f1cd', 'karyawan', 'sales lapangan', 'aktif'),
('56473829104', 'Dinda Ayu', '8c687f7531eac836f5dd91666c1f7779', 'karyawan', 'part counter', 'aktif'),
('63728194570', 'Fajar Nugroho', 'aa956cdbc76c25c5916c51f326f7ae3e', 'karyawan', 'sales lapangan', 'aktif'),
('65748392014', 'Rizwan Hakim', 'cd0b66c703ac58e29f48ce8500eda105', 'karyawan', 'mekanik', 'aktif'),
('65748392015', 'Vania Putri', 'b4ea46bbd6b7c4936ba7987342f392fb', 'karyawan', 'og', 'aktif'),
('74829103647', 'Arief Ramadhan', '2cec4c59c84c467829882a524926364e', 'karyawan', 'sales lapangan', 'aktif'),
('74829103657', 'Melati Saraswati', 'abcab7ea2b3f0e8feccf327a7825450c', 'karyawan', 'sales counter', 'aktif'),
('81029384756', 'Dedi Kurniawan', '06b1674142e7ac88c536d83e6ae7c31c', 'karyawan', 'sales lapangan', 'aktif'),
('83910274635', 'Ayu Lestari', '990360336255eb9016e5867c9ea8b2e1', 'karyawan', 'admin', 'aktif'),
('83920174659', 'Siti Nurhaliza', '95ad0f83653fdb01ed928a4aad362eec', 'karyawan', 'part counter', 'aktif'),
('92018374652', 'Reza Saputra', 'a7a3d0e2cec7d3f60227d16f12c424d9', 'karyawan', 'part counter', 'aktif'),
('92837461502', 'Rina Kartika', '0ca52b8ce692226686ed5e16b5540b4a', 'karyawan', 'sales counter', 'aktif'),
('93847561029', 'Iqbal Rizky', 'b160f903928e387b5f017038d5246db8', 'karyawan', 'sales lapangan', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_backup`
--

CREATE TABLE `tb_user_backup` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','manager','karyawan') DEFAULT 'karyawan',
  `bidang` varchar(50) DEFAULT NULL,
  `status` enum('pending','aktif','ditolak') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user_backup`
--

INSERT INTO `tb_user_backup` (`nik`, `nama`, `password`, `role`, `bidang`, `status`) VALUES
('10293847561', 'Intan Permata', '4a34778302a20bcc0bbe4ab37bff37e9d0214e2e896c828839a98f86af42f8cb', 'karyawan', 'og', 'aktif'),
('10928374658', 'Lestari Dewi', '92432e4f33d59aa924ea3b2e8cf9d0f8752640b4d35bf44cefebfee27930982e', 'karyawan', 'sales lapangan', 'aktif'),
('10928374659', 'Bayu Firmansyah', '99373132216e1b03dffeff5e2074976d41516deab83ced723a968e45c936abb6', 'karyawan', 'mekanik', 'aktif'),
('11223345677', 'Zidan Ahmad', '25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7', 'admin', 'Admin', 'aktif'),
('11234553256', 'gadis purnama sari', '43978b87099209eab2a08a39e1a189528947fd936cf15af52f91d31d4e1c6ca5', 'karyawan', 'service counter', 'aktif'),
('11234553297', 'bayu juliandri', '9042ee3a7602d2b51cf8376e69631b26e56d2f7e1ae53a0c5210146bdfd453cd', 'karyawan', 'mekanik', 'aktif'),
('14315564854', 'devani aifitra', '173013f5739144199df8e07268dcc482a83c9e6fdece9b7c852241b6f6d8d7ff', 'karyawan', 'mekanik', 'aktif'),
('14315576334', 'dicky wandira', '8246534b582fc296f26abee3f11057f5525a79461504c7474a989d0a16252b3b', 'karyawan', 'ob', 'aktif'),
('1503060503', 'Indiani Putri', 'a37180ce7e6ccbdc24a4c446b668a3a98c6f7bc6827b25678fc5adab9363dab6', 'karyawan', 'service counter', 'aktif'),
('19384726501', 'Hendra Wijaya', 'b246c2237342a702f264b08a5fa80c791ea38316ce9aaa345e140e6ce838d030', 'karyawan', 'sales counter', 'aktif'),
('21938475601', 'Nur Aisyah', '6941c681ebb5840bdff1df7a51b0aa0bc47e60094b5352e26d25d42713b9bff4', 'karyawan', 'sales counter', 'aktif'),
('3152000004', 'Wahyu Prayogi', '380f9771d2df8566ce2bd5b8ed772b0bb74fd6457fb803ab2d267c394d89c750', 'manager', 'manager', 'aktif'),
('37485910247', 'Budi Santoso', '12345', 'karyawan', 'kepala mekanik', 'aktif'),
('37485910263', 'Citra Anjani', '6d41f47510b397eafb483cc5c5127af62d7a6559849e3c9b67bbaed745614e0d', 'karyawan', 'sales lapangan', 'aktif'),
('38475619283', 'Yoga Prasetyo', '1907a759a5f915bb3119fd18fcdde6a350a3578198d58e2f3ac3aa6828bad5dc', 'karyawan', 'mekanik', 'aktif'),
('48392017452', 'Aulia Rahma', 'da700f21c86ec7167708b3dcbd1a112bd2722e2823cc83063b3f827c45098c6c', 'karyawan', 'service counter', 'aktif'),
('48592017364', 'Andi Rian Pratama', 'c8ffa9fcf473102b5526af2a62f39db33d006b49c8ee5324698bf1394556bd87', 'karyawan', 'driver', 'aktif'),
('56473829103', 'Rafi Maulana', '03aca46d20389611960b5dc3c81e2b7be39bac96c6d9c3e8dbaeab1af4ef3a00', 'karyawan', 'sales lapangan', 'aktif'),
('56473829104', 'Dinda Ayu', '1e1b4681cb2a32178e00448b15f53b2535538aef0d47f1c0fbf1fb97db863396', 'karyawan', 'part counter', 'aktif'),
('63728194570', 'Fajar Nugroho', '82e7d75cfb04436d74c0ac77df5762bd294de993d8f8ae89ecf470e829783923', 'karyawan', 'sales lapangan', 'aktif'),
('65748392014', 'Rizwan Hakim', '6c589307c5c6711b971fce4122a7caf332bbca9d41d34ef7e30bcaf77a4f0fa8', 'karyawan', 'mekanik', 'aktif'),
('65748392015', 'Vania Putri', 'c342405b5dd8c6a5892418f923499d936d785aedb57e9187d246b012d38415ce', 'karyawan', 'og', 'aktif'),
('74829103647', 'Arief Ramadhan', '197bb20a545d64fe90a8c448c19de777ca2b16ee8ef75273ebf5682e273fde1a', 'karyawan', 'sales lapangan', 'aktif'),
('74829103657', 'Melati Saraswati', 'e9c814d5fae1461eea01b00043837b25362cfe33ffbfb09bb9b44381a4a4ad69', 'karyawan', 'sales counter', 'aktif'),
('81029384756', 'Dedi Kurniawan', 'e8941882d2f0cbb6e126beb3e3f3e45bc379cf999a5de0bcb4f1ddff0dc00121', 'karyawan', 'sales lapangan', 'aktif'),
('83910274635', 'Ayu Lestari', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', 'karyawan', 'admin', 'aktif'),
('83920174659', 'Siti Nurhaliza', '0c0a2769d789dcb01823a73142d33a71208954976508350f292dbed2cfecf810', 'karyawan', 'part counter', 'aktif'),
('92018374652', 'Reza Saputra', '3a867164b2d3f085f2cc7b336c45ead987993035fdaf0ecfd705fc2247dca116', 'karyawan', 'part counter', 'aktif'),
('92837461502', 'Rina Kartika', 'fd0aad5b143e4402709331d26b4ec94bdfc5075f0e9bedcd220a12d23a9ef2fe', 'karyawan', 'sales counter', 'aktif'),
('93847561029', 'Iqbal Rizky', '491b1947dd7c5d0209ce2457bd5838f8489080b90d86de8f205805ce587c3f6f', 'karyawan', 'sales lapangan', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hitung`
--
ALTER TABLE `hitung`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_cus`
--
ALTER TABLE `nilai_cus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_manager`
--
ALTER TABLE `nilai_manager`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `nilai_rekan`
--
ALTER TABLE `nilai_rekan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=701;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nilai_cus`
--
ALTER TABLE `nilai_cus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `nilai_rekan`
--
ALTER TABLE `nilai_rekan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
