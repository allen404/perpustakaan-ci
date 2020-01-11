-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 08:10 PM
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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(9) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Nim` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `Nama`, `Nim`, `email`, `jurusan`) VALUES
(2, 'Prof. Jewell Rolfson II', '5', 'krowe@example.net', 'Informatika'),
(4, 'Afton Parisian', '6', 'mohammed.connelly@example.org', 'Informatika'),
(5, 'Waldo Lemke', '6', 'payton.parisian@example.org', ''),
(6, 'Miss Hertha Roob II', '1', 'christiansen.sigrid@example.net', ''),
(7, 'Foster Green', '', 'thiel.evert@example.net', ''),
(8, 'Dr. Maggie Bode III', '1', 'ccasper@example.org', ''),
(9, 'Mr. Waldo Heidenreich', '2', 'selina95@example.com', ''),
(10, 'Ms. Barbara Bednar I', '5', 'koepp.keagan@example.org', ''),
(11, 'Mrs. Kaylah Mayer', '5', 'syble13@example.net', ''),
(12, 'Arvid Tremblay', '4', 'eduardo.donnelly@example.com', ''),
(13, 'Anika Wiza', '1', 'jacobi.camille@example.com', ''),
(14, 'Junior Graham DDS', '5', 'selena.watsica@example.net', ''),
(15, 'Kiley Adams Sr.', '7', 'rogelio.harber@example.org', ''),
(16, 'Audrey Altenwerth', '7', 'grant.quitzon@example.com', ''),
(17, 'Maye Hahn', '6', 'micaela07@example.com', ''),
(18, 'Donald Hayes', '9', 'brenda12@example.org', ''),
(19, 'Mustafa Schmidt', '3', 'd\'angelo.russel@example.com', ''),
(20, 'Christa Swaniawski', '', 'alfredo78@example.com', ''),
(21, 'Vida Moore IV', '7', 'runolfsdottir.royal@example.org', ''),
(22, 'Rosemary Davis', '8', 'bailey.ibrahim@example.org', ''),
(23, 'Mr. Gonzalo West', '9', 'kirlin.faye@example.com', ''),
(24, 'Lilly Rowe II', '5', 'gerlach.russell@example.net', ''),
(25, 'Troy Wolff', '6', 'jsteuber@example.net', ''),
(26, 'Prof. Trenton Davis', '6', 'cole.cooper@example.com', ''),
(27, 'Clay Kshlerin V', '3', 'shyanne19@example.org', ''),
(28, 'Mr. Jerrod Hintz III', '5', 'runolfsdottir.louisa@example.net', ''),
(29, 'Prof. Camren Doyle Jr.', '7', 'russel73@example.com', ''),
(30, 'Mr. Mike Bahringer', '9', 'jbreitenberg@example.net', ''),
(31, 'Diky Allen Prasetya', '17030008', 'allen_diky@outlook.com', 'Informatika'),
(32, 'Raden Iman Setio Nugroho', '17030007', 'radenimansn@gmail.com', 'Informatika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
