-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 04:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkfuzzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id_rules` int(11) NOT NULL,
  `rules` varchar(20) NOT NULL,
  `smtga` varchar(20) NOT NULL,
  `smtge` varchar(20) NOT NULL,
  `absen` varchar(20) NOT NULL,
  `perilaku` varchar(20) NOT NULL,
  `keputusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id_rules`, `rules`, `smtga`, `smtge`, `absen`, `perilaku`, `keputusan`) VALUES
(3, 'R1', 'Buruk', 'Buruk', 'Buruk', 'Buruk', 'Tidak Naik'),
(5, 'R2', 'Buruk', 'Buruk', 'Baik', 'Buruk', 'Tidak Naik'),
(6, 'R3', 'Buruk', 'Buruk', 'Buruk', 'Cukup', 'Tidak Naik'),
(7, 'R4', 'Buruk', 'Buruk', 'Baik', 'Cukup', 'Tidak Naik'),
(8, 'R5', 'Buruk', 'Buruk', 'Buruk', 'Baik', 'Tidak Naik'),
(9, 'R6', 'Buruk', 'Buruk', 'Baik', 'Baik', 'Tidak Naik'),
(10, 'R7', 'Buruk', 'Cukup', 'Buruk', 'Buruk', 'Tidak Naik'),
(11, 'R8', 'Buruk', 'Cukup', 'Baik', 'Buruk', 'Tidak Naik'),
(12, 'R9', 'Buruk', 'Cukup', 'Buruk', 'Cukup', 'Tidak Naik'),
(13, 'R10', 'Buruk', 'Cukup', 'Baik', 'Cukup', 'Naik Kelas'),
(14, 'R11', 'Buruk', 'Cukup', 'Buruk', 'Baik', 'Tidak Naik'),
(15, 'R12', 'Buruk', 'Cukup', 'Baik', 'Baik', 'Naik Kelas'),
(16, 'R13', 'Buruk', 'Baik', 'Buruk', 'Buruk', 'Tidak Naik'),
(17, 'R14', 'Buruk', 'Baik', 'Baik', 'Buruk', 'Tidak Naik'),
(18, 'R15', 'Buruk', 'Baik', 'Buruk', 'Cukup', 'Naik Kelas'),
(19, 'R16', 'Buruk', 'Baik', 'Baik', 'Cukup', 'Naik Kelas'),
(20, 'R17', 'Buruk', 'Baik', 'Buruk', 'Baik', 'Tidak Naik'),
(21, 'R18', 'Buruk', 'Baik', 'Baik', 'Baik', 'Naik Kelas'),
(22, 'R19', 'Cukup', 'Buruk', 'Buruk', 'Buruk', 'Tidak Naik'),
(23, 'R20', 'Cukup', 'Buruk', 'Baik', 'Buruk', 'Tidak Naik'),
(24, 'R21', 'Cukup', 'Buruk', 'Buruk', 'Cukup', 'Tidak Naik'),
(25, 'R22', 'Cukup', 'Buruk', 'Baik', 'Cukup', 'Naik Kelas'),
(26, 'R23', 'Cukup', 'Buruk', 'Buruk', 'Baik', 'Tidak Naik'),
(27, 'R24', 'Cukup', 'Buruk', 'Baik', 'Baik', 'Naik Kelas'),
(28, 'R25', 'Cukup', 'Cukup', 'Buruk', 'Buruk', 'Tidak Naik'),
(29, 'R26', 'Cukup', 'Cukup', 'Baik', 'Buruk', 'Naik Kelas'),
(30, 'R27', 'Cukup', 'Cukup', 'Buruk', 'Cukup', 'Tidak Naik'),
(31, 'R28', 'Cukup', 'Cukup', 'Baik', 'Cukup', 'Naik Kelas'),
(32, 'R29', 'Cukup', 'Cukup', 'Buruk', 'Baik', 'Naik Kelas'),
(33, 'R30', 'Cukup', 'Cukup', 'Baik', 'Baik', 'Naik Kelas'),
(34, 'R31', 'Cukup', 'Baik', 'Buruk', 'Buruk', 'Tidak Naik'),
(35, 'R32', 'Cukup', 'Baik', 'Baik', 'Buruk', 'Tidak Naik'),
(36, 'R33', 'Cukup', 'Baik', 'Buruk', 'Cukup', 'Tidak Naik'),
(37, 'R34', 'Cukup', 'Baik', 'Baik', 'Cukup', 'Naik Kelas'),
(38, 'R35', 'Cukup', 'Baik', 'Buruk', 'Baik', 'Naik Kelas'),
(39, 'R36', 'Cukup', 'Baik', 'Baik', 'Baik', 'Naik Kelas'),
(40, 'R37', 'Baik', 'Buruk', 'Buruk', 'Buruk', 'Tidak Naik'),
(41, 'R38', 'Baik', 'Buruk', 'Baik', 'Buruk', 'Tidak Naik'),
(42, 'R39', 'Baik', 'Buruk', 'Buruk', 'Cukup', 'Tidak Naik'),
(43, 'R40', 'Baik', 'Buruk', 'Baik', 'Cukup', 'Tidak Naik'),
(44, 'R41', 'Baik', 'Buruk', 'Buruk', 'Baik', 'Tidak Naik'),
(45, 'R42', 'Baik', 'Buruk', 'Baik', 'Baik', 'Naik Kelas'),
(46, 'R43', 'Baik', 'Cukup', 'Buruk', 'Buruk', 'Tidak Naik'),
(47, 'R44', 'Baik', 'Cukup', 'Baik', 'Buruk', 'Naik Kelas'),
(48, 'R45', 'Baik', 'Cukup', 'Buruk', 'Cukup', 'Tidak Naik'),
(49, 'R46', 'Baik', 'Cukup', 'Baik', 'Cukup', 'Naik Kelas'),
(50, 'R47', 'Baik', 'Cukup', 'Buruk', 'Baik', 'Tidak Naik'),
(51, 'R48', 'Baik', 'Cukup', 'Baik', 'Baik', 'Naik Kelas'),
(52, 'R49', 'Baik', 'Baik', 'Buruk', 'Buruk', 'Tidak Naik'),
(53, 'R50', 'Baik', 'Baik', 'Baik', 'Buruk', 'Naik Kelas'),
(54, 'R51', 'Baik', 'Baik', 'Buruk', 'Cukup', 'Tidak Naik'),
(55, 'R52', 'Baik', 'Baik', 'Baik', 'Cukup', 'Naik Kelas'),
(56, 'R53', 'Baik', 'Baik', 'Buruk', 'Baik', 'Naik Kelas'),
(60, 'R54', 'Baik', 'Baik', 'Baik', 'Baik', 'Naik Kelas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id_rules`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
