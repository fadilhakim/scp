-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 12:05 PM
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
-- Table structure for table `midtrans_setting_tbl`
--

CREATE TABLE `midtrans_setting_tbl` (
  `midtrans_id` int(11) NOT NULL,
  `production_server_key` varchar(100) NOT NULL,
  `production_client_key` varchar(100) NOT NULL,
  `sandbox_server_key` varchar(100) NOT NULL,
  `sandbox_client_key` varchar(100) NOT NULL,
  `production_javascript_link` varchar(100) NOT NULL,
  `sandbox_javascript_link` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `active_production_version` tinyint(4) NOT NULL,
  `active_midtrans` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `midtrans_setting_tbl`
--

INSERT INTO `midtrans_setting_tbl` (`midtrans_id`, `production_server_key`, `production_client_key`, `sandbox_server_key`, `sandbox_client_key`, `production_javascript_link`, `sandbox_javascript_link`, `payment_method`, `active_production_version`, `active_midtrans`) VALUES
(1, 'asdasasd', 'asdasasd', 'asdasdas', 'dasdasdasd', 'asdasdasd', 'berubah donk', 'asdasdasdasdasdasdasdas', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `midtrans_setting_tbl`
--
ALTER TABLE `midtrans_setting_tbl`
  ADD PRIMARY KEY (`midtrans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `midtrans_setting_tbl`
--
ALTER TABLE `midtrans_setting_tbl`
  MODIFY `midtrans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
