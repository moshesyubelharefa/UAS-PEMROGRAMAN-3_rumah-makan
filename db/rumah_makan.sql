-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 05:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_makan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `nama`, `username`, `password`) VALUES
(28, '1@gmail.com', 'm', 'm', '6f8f57715090da2632453988d9a1501b'),
(29, 'ab@gmail.com', 'g', 'g', 'b2f5ff47436671b6e533d8dc3614845d'),
(30, 'moshesyubelhrf@gmail.com', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(31, 'moshesharefa@gmail.com', 'moshes', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(32, 'tri@gmail.com', 'tri', 'tri', 'd2cfe69af2d64330670e08efb2c86df7'),
(33, 'm@gmail.com', 'm', 'm', '6f8f57715090da2632453988d9a1501b'),
(34, 'moyu@gmail.com', 'moshes', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `menu_resto`
--

CREATE TABLE `menu_resto` (
  `no` int(50) NOT NULL,
  `id` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_resto`
--

INSERT INTO `menu_resto` (`no`, `id`, `nama`, `jenis`, `ukuran`, `harga`) VALUES
(1, 8990, 'burger', 'minuman', 'small', 25000),
(2, 2110, 'Pizza', 'makanan', 'medium', 100000),
(3, 511, 'onde-onde', 'snack', 'big', 5000),
(7, 2218, 'jus jeruk', 'minuman', 'medium', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_resto`
--
ALTER TABLE `menu_resto`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `menu_resto`
--
ALTER TABLE `menu_resto`
  MODIFY `no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
