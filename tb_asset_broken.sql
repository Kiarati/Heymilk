-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2017 at 12:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heymilk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_asset_broken`
--

CREATE TABLE `tb_asset_broken` (
  `id` int(11) NOT NULL,
  `asset_broken_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `qty_asset_broken` int(11) NOT NULL,
  `date_broken` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_asset_broken`
--

INSERT INTO `tb_asset_broken` (`id`, `asset_broken_code`, `qty_asset_broken`, `date_broken`) VALUES
(1, 'A1', 20, '2017-06-06'),
(2, 'A2', 10, '2017-06-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_asset_broken`
--
ALTER TABLE `tb_asset_broken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_asset_broken`
--
ALTER TABLE `tb_asset_broken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
