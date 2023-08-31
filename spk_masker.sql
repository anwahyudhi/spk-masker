-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 10:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_masker`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`) VALUES
(1, 'Lapisan Masker', 20.01),
(2, 'Kualitas Masker', 20),
(3, 'Efektifitas Filtrasi Masker', 20),
(4, 'Kenyamanan Masker', 20),
(5, 'Dapat Dipakat Berulang', 20);

-- --------------------------------------------------------

--
-- Table structure for table `masker`
--

CREATE TABLE `masker` (
  `id_masker` int(11) NOT NULL,
  `nama_masker` varchar(255) NOT NULL,
  `lapisan_masker` int(11) NOT NULL,
  `kualitas_masker` int(11) NOT NULL,
  `efektifitas_masker` int(11) NOT NULL,
  `kenyamanan_masker` int(11) NOT NULL,
  `reuse` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masker`
--

INSERT INTO `masker` (`id_masker`, `nama_masker`, `lapisan_masker`, `kualitas_masker`, `efektifitas_masker`, `kenyamanan_masker`, `reuse`, `nilai`, `gambar`, `keterangan`) VALUES
(2, 'asdcx', 1, 6, 11, 16, 21, 1.0001, '', 'adsacascascascasca cascascasca acsacsa ascacsacasc'),
(3, 'ascasc', 3, 8, 12, 20, 22, 0.53934393638171, '', ''),
(7, 'vb', 1, 6, 11, 16, 21, 0, 'vb.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(8, 'masker x y z 10', 1, 6, 11, 16, 21, 0, '2012726037.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'ironman', 'ironman', 'Steve Jobs');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(255) NOT NULL,
  `bobot_subkriteria` double NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `bobot_subkriteria`, `id_kriteria`) VALUES
(1, 'Sangat Tebal', 5.03, 1),
(2, 'Tebal', 4, 1),
(3, 'Sedang', 3, 1),
(4, 'Tipis', 2, 1),
(5, 'Sangat Tipis', 1, 1),
(6, 'Tinggi', 5, 2),
(7, 'Cukup Tinggi', 4, 2),
(8, 'Sedang', 3, 2),
(9, 'Rendah', 2, 2),
(10, 'Sangat Rendah', 1, 2),
(11, 'Sangat Tinggi', 5, 3),
(12, 'Tinggi', 4, 3),
(13, 'Cukup Tinggi', 3, 3),
(14, 'Rendah', 2, 3),
(15, 'Sangat Rendah', 1, 3),
(16, 'Sangat Nyaman', 5, 4),
(17, 'Nyaman', 4, 4),
(18, 'Cukup Nyaman', 3, 4),
(19, 'Kurang Nyaman', 2, 4),
(20, 'Tidak Nyaman', 1, 4),
(21, 'Ya', 2, 5),
(22, 'Tidak', 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `masker`
--
ALTER TABLE `masker`
  ADD PRIMARY KEY (`id_masker`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masker`
--
ALTER TABLE `masker`
  MODIFY `id_masker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
