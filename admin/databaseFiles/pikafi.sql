-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 12:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pikafi`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userToken` varchar(100) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `refCode` varchar(200) NOT NULL,
  `verifyKey` varchar(100) NOT NULL,
  `dateTime` varchar(100) NOT NULL,
  `auth` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `userToken`, `balance`, `refCode`, `verifyKey`, `dateTime`, `auth`) VALUES
(2, 'emmanuelukwe1@gmail.com', 'teser4', '$2y$10$qtDNAOR1kVE7TAZyMRsWSeIyQf4KFT6UWjlQOnHjklQq8Ba4bKaMe', '34a32f1cee3a0cd545a1092b95aff332', '0', 'MzVmMT', '', '2025-01-28 04:01:50pm', 'user'),
(8, 'pinkme@gmail.com', 'pinkme', '$2y$10$FTeYT6J/annr9NOQo8bgreqrc2BX10FHAQe.nZ8y/isABrT6a5E0u', '93631c0a2eba1b6473cfed7140b8ad51', '0', 'NmFlZW', '', '2025-03-12 06:22:44pm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
