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
-- Table structure for table `electricity_consuming`
--

CREATE TABLE `electricity_consuming` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `am_6` varchar(255) NOT NULL,
  `pm_2` varchar(255) NOT NULL,
  `pm_10` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `electricity_consuming`
--

INSERT INTO `electricity_consuming` (`id`, `date`, `location`, `am_6`, `pm_2`, `pm_10`, `created_at`) VALUES
(4, '2022-09-30', 'Hall C', '1234', '4352', '2344', '2022-09-30 10:00:53'),
(6, '2022-09-28', 'Hall B', '1236', '4356', '2356', '2022-09-30 10:12:08'),
(8, '2022-09-12', 'Hall A', '12345', '4356', '23454', '2022-09-30 10:16:54'),
(11, '2022-10-10', 'Hall A', '1234', '4352', '2345', '2022-10-10 05:10:36'),
(13, '2022-10-13', 'Hall B', '12344', '4352', '2344', '2022-10-12 05:59:40'),
(14, '2022-10-12', 'Hall C', '1234', '43523', '2344', '2022-10-12 06:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `electricity_consuming`
--
ALTER TABLE `electricity_consuming`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electricity_consuming`
--
ALTER TABLE `electricity_consuming`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
