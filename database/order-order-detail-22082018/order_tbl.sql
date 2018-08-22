-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2018 at 06:08 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL,
  `voucher_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_type` enum('discount','cashback','') COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `order_tbl` (`order_id`, `order_code`, `ip_address`, `user_agent`, `created_at`, `updated_at`, `user_id`, `voucher_code`, `voucher_type`, `voucher_nominal`, `grand_total`, `ongkir`, `subtotal`, `kurir`, `total_berat`, `kurir_service`, `tax`, `purpose_bank`, `status`, `user_addtr_id`) VALUES
(5, 'OSCP0822005', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', '2018-08-22 00:29:22', '2018-08-21 17:29:22', 1, '', '', 0, 42847000, 57500, 42500000, 'jne', 30, 'REG', 42500.00, '', 'unpaid', 3),
(7, 'OSCP0822007', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', '2018-08-22 00:32:50', '2018-08-21 17:32:50', 1, '', '', 0, 42847000, 57500, 42500000, 'jne', 30, 'REG', 42500.00, '', 'unpaid', 3),
(8, 'OSCP0822008', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', '2018-08-22 00:35:14', '2018-08-21 17:35:14', 1, '', '', 0, 42847000, 57500, 42500000, 'jne', 30, 'REG', 42500.00, '', 'unpaid', 3),
(9, 'OSCP0822009', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', '2018-08-22 11:00:14', '2018-08-22 04:00:14', 1, '', '', 0, 61619000, 0, 61500000, 'jne', 0, 'OKE', 61500.00, '', 'unpaid', 3);

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
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
