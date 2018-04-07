-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2018 at 07:20 AM
-- Server version: 5.5.58
-- PHP Version: 5.6.34

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
-- Table structure for table `order_detail_tbl`
--

CREATE TABLE `order_detail_tbl` (
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail_tbl`
--

INSERT INTO `order_detail_tbl` (`order_detail_id`, `qty`, `price`, `sub_total`, `ip_address`, `user_agent`, `created_at`, `updated_at`, `order_id`, `product_id`, `user_id`) VALUES
(1, 1, 200000, 200000, '118.137.216.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-15 13:58:47', '2018-03-15 13:58:47', 1, 4, 1),
(2, 3, 900, 2700, '118.137.216.88', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '2018-03-15 14:07:05', '2018-03-15 14:07:05', 2, 3, 2),
(3, 3, 900, 2700, '118.137.216.88', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '2018-03-15 14:08:09', '2018-03-15 14:08:09', 3, 3, 2),
(4, 1, 200000, 200000, '118.137.216.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-15 14:22:42', '2018-03-15 14:22:42', 4, 4, 1),
(5, 1, 200000, 200000, '118.137.216.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-15 14:23:20', '2018-03-15 14:23:20', 5, 4, 1),
(6, 1, 200000, 200000, '118.137.216.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-15 15:30:41', '2018-03-15 15:30:41', 6, 4, 1),
(7, 1, 200000, 200000, '118.137.216.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-15 22:22:05', '2018-03-15 22:22:05', 7, 4, 1),
(8, 1, 200000, 200000, '118.137.216.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-15 22:25:30', '2018-03-15 22:25:30', 8, 4, 1),
(9, 1, 7000000, 7000000, '118.137.216.88', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2018-03-16 01:39:41', '2018-03-16 01:39:41', 9, 1, 2),
(10, 1, 200000, 200000, '114.124.149.140', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-16 02:45:51', '2018-03-16 02:45:51', 10, 4, 1),
(11, 1, 7000000, 7000000, '139.228.111.117', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2018-03-16 02:48:03', '2018-03-16 02:48:03', 11, 1, 2),
(12, 1, 7000000, 7000000, '139.193.234.142', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2018-03-17 02:44:53', '2018-03-17 02:44:53', 12, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_detail_tbl_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_tbl_product_id_foreign` (`product_id`),
  ADD KEY `order_detail_tbl_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  ADD CONSTRAINT `order_detail_tbl_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`),
  ADD CONSTRAINT `order_detail_tbl_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`product_id`),
  ADD CONSTRAINT `order_detail_tbl_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
