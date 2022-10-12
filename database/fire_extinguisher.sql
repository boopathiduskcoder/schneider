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
-- Table structure for table `fire_extinguisher`
--

CREATE TABLE `fire_extinguisher` (
  `id` int(10) NOT NULL,
  `ext_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(10) NOT NULL,
  `cylinder_no` int(10) NOT NULL,
  `last_refill` date NOT NULL,
  `next_refill` date NOT NULL,
  `last_service` date NOT NULL,
  `next_service` date NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fire_extinguisher`
--

INSERT INTO `fire_extinguisher` (`id`, `ext_id`, `location`, `capacity`, `cylinder_no`, `last_refill`, `next_refill`, `last_service`, `next_service`, `remarks`) VALUES
(1, 'FIREXT0000', 'Hall B', 1234, 353536, '2022-10-12', '2022-10-12', '2022-10-12', '2022-10-12', '2022-10-12 19:53:19'),
(2, 'FIREXT0001', 'Hall B', 2343, 234, '2022-10-10', '2022-10-29', '2022-10-20', '2022-10-28', 'dfgfgf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fire_extinguisher`
--
ALTER TABLE `fire_extinguisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fire_extinguisher`
--
ALTER TABLE `fire_extinguisher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
