-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 06:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anonsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcments`
--

CREATE TABLE `announcments` (
  `announcments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcments`
--

INSERT INTO `announcments` (`announcments`) VALUES
('hello');

-- --------------------------------------------------------

--
-- Table structure for table `anonsmsweb`
--

CREATE TABLE `anonsmsweb` (
  `apikey` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `plan` varchar(1000) NOT NULL,
  `apiaccess` varchar(10000) NOT NULL,
  `role` varchar(1000) NOT NULL,
  `smsperday` int(225) NOT NULL,
  `ip` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anonsmsweb`
--

INSERT INTO `anonsmsweb` (`apikey`, `username`, `password`, `plan`, `apiaccess`, `role`, `smsperday`, `ip`) VALUES
('jKJJKl8QBs', 'admin', '652f23fe4a88b4e533e7f43f99d9094b76390ffda61cefd8a3bc65181de14068ee19fc67d26dcb5bfcaee433e556991fdfea609453ae4fb7c7cb435854d46c53', 'free', 'False', 'troll', 0, 'null');


-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `api` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `servers` varchar(10004) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
