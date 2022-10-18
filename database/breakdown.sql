-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 03:53 PM
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
-- Table structure for table `breakdown`
--

CREATE TABLE `breakdown` (
  `id` int(10) NOT NULL,
  `equipment_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `breakdown_id` int(10) NOT NULL,
  `technician_id` int(10) NOT NULL,
  `date_and_time` datetime NOT NULL,
  `details` varchar(255) NOT NULL,
  `completeddate` date NOT NULL,
  `actiontaken` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breakdown`
--

INSERT INTO `breakdown` (`id`, `equipment_id`, `department_id`, `breakdown_id`, `technician_id`, `date_and_time`, `details`, `completeddate`, `actiontaken`, `product`, `quantity`, `status`, `type`) VALUES
(13, 1, 2, 1, 45, '2022-10-18 11:40:21', 'dfghghsdfghjzxcvbnhm', '2022-10-19', 'asdfghjklghjk', '', 0, 'Inprogress', 1),
(14, 2, 3, 3, 41, '2022-10-13 17:33:52', 'dsfghsdfghjm,zxcvbnm', '2022-10-14', '', '', 0, '', 2),
(15, 2, 2, 1, 49, '2022-10-18 16:51:52', 'asdfghjkfghj', '2022-10-11', 'asdfghjkdfghj', '1', 2, 'Pending', 1),
(16, 3, 3, 2, 45, '2022-10-19 17:33:16', 'sadfghjsdfghj', '2022-10-20', 'sdfghjkldfghjk', '', 0, 'Pending', 1),
(17, 4, 3, 3, 49, '2022-10-12 17:33:22', 'sdfghjsdfghjk', '2022-10-11', 'asdfghjkldfghjk', '', 0, 'Inprogress', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakdown`
--
ALTER TABLE `breakdown`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
