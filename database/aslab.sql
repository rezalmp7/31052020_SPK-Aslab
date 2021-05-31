-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 05:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aslab`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(4) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `tanggal`) VALUES
(1, 'Pendaftaran Di Buka', 'Pembukaan Pendaftaran', '2020-09-01'),
(2, 'Pendaftaran Ditutup', 'Pendaftaran Ditutup', '2020-10-31'),
(3, 'Wawancara', 'Wawancara Calon Aslab', '2020-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `configurasi`
--

CREATE TABLE `configurasi` (
  `id` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `value` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `configurasi`
--

INSERT INTO `configurasi` (`id`, `nama`, `value`) VALUES
(2, 'jumlah_diterima', '2'),
(3, 'pengumuman', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `data_nilai`
--

CREATE TABLE `data_nilai` (
  `id` int(3) NOT NULL,
  `id_peserta` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `nilai` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_nilai`
--

INSERT INTO `data_nilai` (`id`, `id_peserta`, `id_kriteria`, `nilai`) VALUES
(5, 19, 1, '3.2'),
(6, 19, 2, '1'),
(7, 19, 3, 'A'),
(8, 19, 4, '1'),
(109, 37, 1, '3.5'),
(110, 37, 2, NULL),
(111, 37, 3, 'A'),
(112, 37, 4, NULL),
(113, 37, 1, '3.5'),
(114, 37, 2, NULL),
(115, 37, 3, 'A'),
(116, 37, 4, NULL),
(117, 38, 1, '3.5'),
(118, 38, 2, NULL),
(119, 38, 3, 'A'),
(120, 38, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `tipe`, `bobot`) VALUES
(1, 'IPK', 'Benefit', 0.1),
(2, 'Nilai Wawancara', 'Benefit', 0.4),
(3, 'Nilai Arorkom', 'Benefit', 0.4),
(4, 'Nilai Kedisiplinan', 'Benefit', 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `npm` int(8) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL,
  `photo` varchar(50) NOT NULL,
  `cv` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `npm`, `nama`, `username`, `password`, `email`, `no_hp`, `semester`, `alamat`, `photo`, `cv`) VALUES
(19, 17670024, 'Rezal Wahyu Pratama', 'rezal', '9946e45d7e5a707875e2f1dd60eb43ca', 'rezalwahyu10@gmail.com', '087721191226', 5, 'Pati', '19.jpg', '19.pdf'),
(37, 17670001, 'Ha', 'ha', '925cc8d2953eba624b2bfedf91a91613', 'ha@gmail.com', '08772121231', 5, 'Pati', '', '37.pdf'),
(38, 17670024, 'Supri', 'supri', 'd79444495ba8886c397b418227564d3f', 'supri@gmail.com', '087721191226', 5, 'Pati', '38.JPG', '38.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurasi`
--
ALTER TABLE `configurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `configurasi`
--
ALTER TABLE `configurasi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
