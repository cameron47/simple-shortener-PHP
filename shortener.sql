-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 08:02 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `url_short`
--

CREATE TABLE `url_short` (
  `id_short` int(99) NOT NULL,
  `url` varchar(255) NOT NULL,
  `keys_url` varchar(255) NOT NULL,
  `view` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url_short`
--

INSERT INTO `url_short` (`id_short`, `url`, `keys_url`, `view`) VALUES
(1, 'http://google.com', 'lwakT', 1),
(6, 'http://twitter.com', 'X1BSC', 0),
(7, 'http://twitter.com', 'ECDxS', 1),
(8, 'http://facebook.com', 'AHpRW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url_short`
--
ALTER TABLE `url_short`
  ADD PRIMARY KEY (`id_short`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url_short`
--
ALTER TABLE `url_short`
  MODIFY `id_short` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
