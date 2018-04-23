-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 09:09 PM
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
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `username`, `password`, `email`, `name`, `photo`, `role_id`, `status`, `updated_at`, `created_at`, `ip_address`, `user_agent`) VALUES
(1, 'alhusna901', '$2y$10$HBeavsVvcZiXGg8lNehwJOPWyKLYqPweqLr8MLvhAQI1O5tjkPx5W', 'alhusna901@gmail.com', 'Aries Dimas Yudhistira', 'whatsapp-image-2017-09-29-at-10.21.45.jpeg', 1, 'ACTIVE', '2018-04-22 15:15:06', '2018-01-31 15:29:31', '127.0.0.0', 'mozilla'),
(7, 'ariesdimasy', '$2y$10$RWGJEmX4q6iFHkZDoYUV0u.T.sD7uvXNqySTnfRfldFaiwUKmvQRy', 'ariesdimasy@gmail.com', 'Aries', '', 2, 'Kv7PcOlR0IxDohl3bSsj5bWfmADpDUwhtTA92Y6gWq9Z6489spdbH9IIX7X7', '2018-04-22 15:14:27', '2018-04-22 22:14:27', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_tbl_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
