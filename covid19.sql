-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 05:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `donasiID` int(12) NOT NULL,
  `DisplayName` varchar(255) NOT NULL,
  `Kategori` int(1) NOT NULL,
  `kuantitas` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id`, `donasiID`, `DisplayName`, `Kategori`, `kuantitas`, `date`) VALUES
(110, 30, 'Bagas Immanuel', 1, '50kg', '2020-05-16'),
(111, 31, 'Bagas Immanuel', 1, '50kg', '2020-05-16'),
(112, 32, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(113, 33, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(114, 34, 'Zefania Praventias', 2, '10 Strip', '2020-05-16'),
(115, 35, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(116, 36, '', 2, '10 Strip', '2020-05-16'),
(117, 37, 'Bagas Immanuel', 1, '50kg', '2020-05-16'),
(118, 38, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(119, 39, 'Bagas Immanuel', 1, '50kg', '2020-05-16'),
(120, 40, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(121, 41, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(122, 42, 'Zefania Praventias', 3, 'Rp. 100.000', '2020-05-16'),
(123, 43, 'Bagas Immanuel', 1, '50kg', '2020-05-16'),
(124, 44, 'Bagas', 1, '50 kg', '2020-05-16'),
(125, 45, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(126, 46, 'Bagas Immanuel', 1, '50kg', '2020-05-16'),
(127, 47, 'Bagas Immanuel', 3, 'Rp. 100.000', '2020-05-16'),
(128, 48, 'haoi', 2, '', '2020-05-16'),
(129, 49, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(130, 50, 'Bagas Immanuel', 2, '10 Strip', '2020-05-16'),
(131, 51, 'Bagas Immanuel', 1, '50kg', '2020-05-16'),
(132, 52, 'Bagas Immanuel', 3, 'Rp. 100.000', '2020-05-16'),
(133, 53, 'Bagas Immanuel', 1, '50kg', '2020-05-16'),
(134, 54, 'Bagas', 2, '10 Strip', '2020-05-17'),
(135, 55, 'Bagas Immanuel', 2, '10 Strip', '2020-05-17'),
(136, 56, 'Bagas Immanuel', 2, '10 Strip', '2020-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Sembako'),
(2, 'Obat-Obatan'),
(3, 'Uang'),
(4, 'Pakaian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
