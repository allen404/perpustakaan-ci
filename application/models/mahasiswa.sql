-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Des 2019 pada 17.54
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mhs`
--

CREATE TABLE IF NOT EXISTS `data_mhs` (
  `nim` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_mhs`
--

INSERT INTO `data_mhs` (`nim`, `nama_lengkap`, `nama_panggil`) VALUES
('17030004', 'Ririanti Amanda Cistalita Sambut', 'Ririn'),
('17030007', 'Raden Iman Setio Nugroho', 'Iman'),
('17030009', 'Ramadhani Ilham', 'Rama'),
('17030010', 'Pandu Rizky', 'Pandu'),
('17030022', 'Rosalia Setia Nursanti', 'Rosa'),
('17030031', 'Farahjihan Khumairo', 'Jihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_mhs`
--

CREATE TABLE IF NOT EXISTS `input_mhs` (
  `nim` varchar(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `input_mhs`
--

INSERT INTO `input_mhs` (`nim`, `nama_lengkap`, `nama_panggil`) VALUES
('17030001', 'Nur Ali Muchtarom', 'Ali'),
('17030004', 'Ririanti Amanda Cistalita Sambut', 'Ririn'),
('17030007', 'Raden Iman Setio Nugroho', 'Iman'),
('17030008', 'Diky Allen Prasetya ', 'Diky'),
('17030009', 'Ramadhani Ilham', 'Rama'),
('17030010', 'Pandu Rizky', 'Pandu'),
('17030022', 'Rosalia Setia Nursanti', 'Rosalia'),
('17030029', 'Resky Tri Haryono', 'Resky'),
('17030031', 'Farahjihan Khumairo', 'Jihan'),
('32', 'Farahjihan Khumairo', 'Pandu'),
('45', 'rgw', 'g');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nm_mhs` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_mhs`
--
ALTER TABLE `data_mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `input_mhs`
--
ALTER TABLE `input_mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
