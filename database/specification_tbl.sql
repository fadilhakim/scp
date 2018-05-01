-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 07:57 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
-- Table structure for table `specification_tbl`
--

CREATE TABLE `specification_tbl` (
  `specification_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `dimensions` varchar(100) NOT NULL,
  `bandwith` varchar(100) NOT NULL,
  `display` varchar(100) NOT NULL,
  `sim_card` varchar(100) NOT NULL,
  `radio` varchar(100) NOT NULL,
  `micro_sd` varchar(100) NOT NULL,
  `bluetooth` enum('yes','no') NOT NULL,
  `battery` varchar(100) NOT NULL,
  `charger` varchar(100) NOT NULL,
  `handsfree` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification_tbl`
--

INSERT INTO `specification_tbl` (`specification_id`, `product_id`, `type`, `color`, `dimensions`, `bandwith`, `display`, `sim_card`, `radio`, `micro_sd`, `bluetooth`, `battery`, `charger`, `handsfree`) VALUES
(1, 47, 'Bomb update in 3 seconds', 'Black update', '111*47*13.5 mm', 'GSM: (900/1800)', '1.77 inch high-definition display', 'Dual SIM dual standby', 'FM Radio Tanpa Handsfree', 'Micro SD Slot(32GB)', 'yes', '4C-500MAH', '5pin', 'Handsfree 3.5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `specification_tbl`
--
ALTER TABLE `specification_tbl`
  ADD PRIMARY KEY (`specification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `specification_tbl`
--
ALTER TABLE `specification_tbl`
  MODIFY `specification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
