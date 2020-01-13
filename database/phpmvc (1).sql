-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 11:33 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `genre_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(150) NOT NULL,
  `id_penerbit` varchar(10) NOT NULL,
  `id_penulis` varchar(10) NOT NULL,
  `tahun_buku` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `genre_buku`, `judul_buku`, `id_penerbit`, `id_penulis`, `tahun_buku`, `jumlah_buku`) VALUES
('B01', 'Pendidikan', 'Pelajaran Bahasa Indonesia', 'PB01', 'PN01', 2015, 3);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` varchar(20) DEFAULT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `status` enum('kembali','perpanjang') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `no_identitas`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `lama_pinjam`, `denda`, `status`) VALUES
(71, 16030051, 'B01', '2020-01-01', '2020-01-11', 10, 1500, 'kembali'),
(72, 17030022, 'B01', '2020-01-11', '2020-01-11', 10, 0, 'kembali'),
(73, 17030022, 'B01', '2020-01-02', '2020-01-11', 9, 1000, 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `alamat_penerbit` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `alamat_penerbit`, `no_telp`) VALUES
('PB01', 'Airlangga', 'Jakarta', '303044');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` varchar(10) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL,
  `alamat_penulis` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `alamat_penulis`, `no_telp`) VALUES
('PN01', 'Friska Ayu Dhawara', 'Magetan', '16030051');

-- --------------------------------------------------------

--
-- Table structure for table `rak_buku`
--

CREATE TABLE `rak_buku` (
  `kode_rak` varchar(10) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak_buku`
--

INSERT INTO `rak_buku` (`kode_rak`, `lokasi`) VALUES
('R01', 'Lt1 001-050'),
('R02', 'Lt1 050-100');

-- --------------------------------------------------------

--
-- Table structure for table `reg_buku`
--

CREATE TABLE `reg_buku` (
  `no_reg` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `kode_rak` varchar(10) NOT NULL,
  `tgl_registrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_buku`
--

INSERT INTO `reg_buku` (`no_reg`, `id_buku`, `kode_rak`, `tgl_registrasi`) VALUES
('RG001', 'B01', 'R01', '2020-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pend_terakhir` varchar(20) NOT NULL,
  `tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `no_identitas`, `nama`, `alamat`, `email`, `password`, `status`, `level`) VALUES
(4, 17030008, 'Diky Allen Prasetya', 'Banguntapan, Bantul', 'allen_diky@outlook.com', '5a2643513cede0ccf53179378caaa950', '', '1'),
(5, 17030022, 'Rosalia Setia Nursanti', 'Banguntapan, Bantul', 'rosaliasetianursanti@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_id_penerbit` (`id_penerbit`),
  ADD KEY `fk_id_penulis` (`id_penulis`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `rak_buku`
--
ALTER TABLE `rak_buku`
  ADD PRIMARY KEY (`kode_rak`);

--
-- Indexes for table `reg_buku`
--
ALTER TABLE `reg_buku`
  ADD PRIMARY KEY (`no_reg`),
  ADD KEY `fk_id_buku_reg` (`id_buku`),
  ADD KEY `fk_kd_rak_reg` (`kode_rak`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `no_identitas` (`no_identitas`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_id_penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `fk_id_penulis` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`);

--
-- Constraints for table `reg_buku`
--
ALTER TABLE `reg_buku`
  ADD CONSTRAINT `fk_id_buku_reg` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `fk_kd_rak_reg` FOREIGN KEY (`kode_rak`) REFERENCES `rak_buku` (`kode_rak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
