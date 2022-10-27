-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 06:58 AM
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
-- Table structure for table `preventives`
--

CREATE TABLE `preventives` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `interval_id` int(11) NOT NULL,
  `last_date` date NOT NULL,
  `next_date` date NOT NULL,
  `notify` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preventives`
--

INSERT INTO `preventives` (`id`, `equipment_id`, `location_id`, `interval_id`, `last_date`, `next_date`, `notify`, `status`) VALUES
(3, 1, 1, 2, '2022-10-27', '2022-11-17', '20 ', 'Active'),
(4, 2, 1, 1, '2022-10-19', '2022-11-14', '5 ', 'Active'),
(5, 2, 2, 1, '2022-10-08', '2022-10-24', '20', 'Active'),
(12, 1, 1, 2, '2022-10-27', '2022-11-12', '20', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preventives`
--
ALTER TABLE `preventives`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `preventives`
--
ALTER TABLE `preventives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
