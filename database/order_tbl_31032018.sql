-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 03:04 AM
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
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL,
  `voucher_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_type` enum('discount','cashback') COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_nominal` int(11) NOT NULL,
  `grand_total` int(10) UNSIGNED NOT NULL,
  `ongkir` int(10) UNSIGNED NOT NULL,
  `subtotal` int(10) UNSIGNED NOT NULL,
  `kurir` enum('jne','tiki','pos','pickup') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_berat` int(10) UNSIGNED NOT NULL,
  `kurir_service` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` double(8,2) NOT NULL,
  `purpose_bank` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('unpaid','paid','shipping','cancel','done') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_addtr_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `ip_address`, `user_agent`, `created_at`, `updated_at`, `user_id`, `voucher_code`, `voucher_type`, `voucher_nominal`, `grand_total`, `ongkir`, `subtotal`, `kurir`, `total_berat`, `kurir_service`, `tax`, `purpose_bank`, `status`, `user_addtr_id`) VALUES
(2, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-06 23:03:29', '2018-03-06 23:03:29', 1, '', 'discount', 0, 7117110, 0, 7110000, 'jne', 0, '', 7110.00, '', 'unpaid', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_tbl_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
