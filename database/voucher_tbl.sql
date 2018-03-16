-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 05:10 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `voucher_tbl`
--

CREATE TABLE `voucher_tbl` (
  `code_voucher` varchar(50) NOT NULL,
  `type` enum('cashback','discount') NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `cashback` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `issued_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `ip_address` varchar(17) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_agent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voucher_tbl`
--
ALTER TABLE `voucher_tbl`
  ADD PRIMARY KEY (`code_voucher`),
  ADD UNIQUE KEY `code_voucher` (`code_voucher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
