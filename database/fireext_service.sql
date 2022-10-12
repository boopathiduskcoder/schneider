-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 04:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atsproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `fireext_service`
--

CREATE TABLE `fireext_service` (
  `id` int(10) NOT NULL,
  `fireext_id` int(10) NOT NULL,
  `last_service` date NOT NULL,
  `next_service` date NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fireext_service`
--

INSERT INTO `fireext_service` (`id`, `fireext_id`, `last_service`, `next_service`, `remarks`) VALUES
(1, 1, '2022-10-13', '2022-10-28', 'dfgfgf'),
(2, 2, '2022-10-19', '2022-10-21', 'sdfgh'),
(3, 2, '2022-10-12', '2022-10-12', 'dfgfgf'),
(4, 2, '2022-10-20', '2022-10-28', 'dfgfgf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fireext_service`
--
ALTER TABLE `fireext_service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fireext_service`
--
ALTER TABLE `fireext_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
