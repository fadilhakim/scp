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
-- Table structure for table `about_tbl`
--

CREATE TABLE `about_tbl` (
  `about_id` int(11) NOT NULL,
  `head_pic` varchar(255) NOT NULL,
  `head_title` varchar(255) NOT NULL,
  `head_subtitle` varchar(255) NOT NULL,
  `left_title` varchar(255) NOT NULL,
  `left_desc` text NOT NULL,
  `right_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_tbl`
--

INSERT INTO `about_tbl` (`about_id`, `head_pic`, `head_title`, `head_subtitle`, `left_title`, `left_desc`, `right_desc`) VALUES
(1, 'background-24.jpg', 'WE ARE STRAWBERYCELL', 'In feugiat molestie tortor a malesuada. Etiam a venenatis ipsum. Proin pharetra elit at feugiat commodo vel placerat tincidunt sapien nec', 'WE LOVE MUSIC', 'Praesent nec finibus massa. Phasellus id auctor lacus, at iaculis lorem. Donec quis arcu elit. In vehicula purus sem', 'Aenean facilisis, purus ut tristique pulvinar, odio neque commodo ligula, non vestibulum lacus justo vel diam. Aenean ac aliquet tortor, nec gravida urna. Ut nec urna elit. Etiam id scelerisque ante. Cras velit nunc, luctus a volutpat nec, blandit id dolor. Quisque commodo elit nulla, eu semper quam feugiat et. Integer quam velit, suscipit eget consectetur ac, molestie eu diam. Fusce semper rhoncus dignissim. Curabitur dapibus convallis varius. Suspendisse sem urna, ullamcorper eget porttitor ut, sagittis in justo. Vestibulum egestas nulla nec purus porttitor fermentum. Integer mauris mi, viverra eget nibh at, efficitur consectetur erat. Curabitur et imperdiet enim.\r\nFusce semper rhoncus dignissim. Curabitur dapibus convallis varius. Suspendisse sem urna, ullamcorper eget porttitor ut, sagittis in justo. Vestibulum egestas nulla nec purus porttitor fermentum. Integer mauris mi, viverra eget nibh at, efficitur consectetur erat. Curabitur et imperdiet enim.');

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

-- --------------------------------------------------------

--
-- Table structure for table `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(150) NOT NULL,
  `brand_image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(17) NOT NULL,
  `user_agent` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_tbl`
--

INSERT INTO `brand_tbl` (`brand_id`, `brand_name`, `brand_image`, `created_at`, `updated_at`, `ip_address`, `user_agent`) VALUES
(1, 'Brand 1', '', '2018-02-24 00:19:16', '2018-02-24 00:19:16', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0'),
(2, 'Brand 2', '', '2018-02-24 00:19:27', '2018-02-24 00:19:27', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `category_name`, `updated_at`, `created_at`, `ip_address`, `user_agent`) VALUES
(1, 'Category 1', '2018-01-31 17:34:54', '2018-02-01 00:34:54', '127.0.0.1', 'mozilla'),
(2, 'Category 2', '2018-01-31 17:34:54', '2018-02-01 00:34:54', '127.0.0.1', 'mozilla'),
(3, 'category 3', '2018-02-24 00:09:42', '2018-02-24 00:09:42', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_product_market_palce_tbl`
--

CREATE TABLE `detail_product_market_palce_tbl` (
  `id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_product_market_palce_tbl`
--

INSERT INTO `detail_product_market_palce_tbl` (`id`, `market_id`, `product_id`, `product_link`) VALUES
(1, 1, 30, 'https://www.tokopedia.com/tokomuramdn/pompa-galon?src=topads'),
(2, 2, 30, 'https://www.tokopedia.com/tokomuramdn/pompa-galon?src=topads'),
(3, 3, 30, 'https://www.tokopedia.com/tokomuramdn/pompa-galon?src=topads'),
(4, 4, 30, 'https://www.tokopedia.com/tokomuramdn/pompa-galon?src=topads'),
(5, 5, 30, 'https://www.tokopedia.com/tokomuramdn/pompa-galon?src=topads'),
(6, 6, 30, 'https://www.tokopedia.com/tokomuramdn/pompa-galon?src=topads');

-- --------------------------------------------------------

--
-- Table structure for table `market_place_tbl`
--

CREATE TABLE `market_place_tbl` (
  `id` int(11) NOT NULL,
  `market_name` varchar(220) NOT NULL,
  `market_logo` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_place_tbl`
--

INSERT INTO `market_place_tbl` (`id`, `market_name`, `market_logo`) VALUES
(1, 'Toko Pedia', 'tokopedia.png'),
(2, 'buka lapak', 'bukalapak.png'),
(3, 'shopee', 'shopee.png'),
(4, 'JD id', 'jd_id.png'),
(5, 'lazada', 'lazada.png'),
(6, 'blibli', 'blibli.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(30, '2018_01_18_173255_create_orders_table', 1),
(31, '2018_01_18_173814_create_products_table', 1),
(50, '2018_01_18_173832_create_payments_table', 2),
(53, '2018_01_24_161347_payment_table_transaction', 2),
(58, '2018_01_24_170133_admin_table_transaction', 4),
(66, '2018_01_29_150156_admin_table', 7),
(103, '2014_10_12_000000_create_users_table', 8),
(104, '2014_10_12_100000_create_password_resets_table', 8),
(105, '2018_01_17_044520_create_sliders_table', 8),
(106, '2018_01_18_173014_create_products_table', 8),
(107, '2018_01_18_173055_create_orders_table', 8),
(108, '2018_01_18_173137_create_order_details_table', 8),
(109, '2018_01_24_151439_order_table_transaction', 8),
(110, '2018_01_24_151710_order_detail_table_transaction', 8),
(111, '2018_01_24_162523_create_product_image_tbl', 8),
(112, '2018_01_24_163034_product_table_transaction', 8),
(113, '2018_01_24_165044_product_image_table_transaction', 8),
(114, '2018_01_24_165537_create_admin_tbl', 8),
(115, '2018_01_24_170242_create_role_tbl', 8),
(116, '2018_01_24_182237_create_user_address_tr', 8),
(117, '2018_01_24_182525_user_address_tr_transaction', 8),
(118, '2018_01_30_161811_admin_table_transaction', 8),
(119, '2018_01_30_170929_user_table_transaction', 8);

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
(1, 1, 7000000, 7000000, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-06 23:03:29', '2018-03-07 16:49:38', 2, 1, 1),
(2, 1, 110000, 110000, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-06 23:03:29', '2018-03-07 16:49:46', 2, 2, 1),
(3, 1, 110000, 110000, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2018-03-31 15:01:06', '2018-03-31 15:01:06', 3, 2, 1);

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

INSERT INTO `order_tbl` (`order_id`, `order_code`, `ip_address`, `user_agent`, `created_at`, `updated_at`, `user_id`, `voucher_code`, `voucher_type`, `voucher_nominal`, `grand_total`, `ongkir`, `subtotal`, `kurir`, `total_berat`, `kurir_service`, `tax`, `purpose_bank`, `status`, `user_addtr_id`) VALUES
(2, '', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-06 23:03:29', '2018-03-06 23:03:29', 1, '', 'discount', 0, 7117110, 0, 7110000, 'jne', 0, '', 7110.00, '', 'unpaid', 0),
(3, '', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2018-03-31 15:01:06', '2018-03-31 15:01:06', 1, 'ABC123', 'discount', 16516, 93593, 0, 110000, 'jne', 0, '', 110.00, '', 'unpaid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_image_tbl`
--

CREATE TABLE `product_image_tbl` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_field` enum('image1','image2','image3','image4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image_tbl`
--

INSERT INTO `product_image_tbl` (`image_id`, `product_id`, `image_name`, `image_field`, `updated_at`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 2, 'hp_strawberry_st22_full_set_baru_dan_lengkap_box_batray_char.jpg', 'image1', '2018-02-24 00:21:09', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-02-24 00:21:09'),
(2, 2, 'hp-strawberry-st22-black-1510113870-35217445-1871ffa8a85f9fd9b9b4e7c2957611b1-catalog_233.jpg', 'image2', '2018-02-24 00:21:09', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-02-24 00:21:09'),
(3, 2, 'strawberry+st22.png', 'image3', '2018-02-24 00:21:10', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-02-24 00:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_mini_slide`
--

CREATE TABLE `product_mini_slide` (
  `slide_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_name` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_mini_slide`
--

INSERT INTO `product_mini_slide` (`slide_id`, `product_id`, `image_name`) VALUES
(5, 5, '1467309809791.jpg'),
(6, 28, '1464940688770.jpg'),
(7, 28, 'cliffs_of_moher-1600x1200.jpg'),
(8, 28, '51974_1_other_wallpapers_sailing_ships.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_availability` enum('Ready Stock','Pre Order','Sales Stock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_subcategory` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular` tinyint(1) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `old_price` int(10) UNSIGNED DEFAULT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `weight` int(10) UNSIGNED DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_title_left` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_detail_left` text COLLATE utf8mb4_unicode_ci,
  `product_detail_left_img` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title_right` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_detail_right` text COLLATE utf8mb4_unicode_ci,
  `product_detail_right_img` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title_btm` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_detail_btm` text COLLATE utf8mb4_unicode_ci,
  `product_detail_btm_img` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technical_specs` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_title`, `product_availability`, `product_category`, `product_subcategory`, `brand_id`, `status`, `popular`, `price`, `old_price`, `stock`, `weight`, `product_description`, `created_at`, `updated_at`, `ip_address`, `user_agent`, `product_title_left`, `product_detail_left`, `product_detail_left_img`, `product_title_right`, `product_detail_right`, `product_detail_right_img`, `product_title_btm`, `product_detail_btm`, `product_detail_btm_img`, `technical_specs`) VALUES
(28, 'Smart Watch ABC', 'Ready Stock', '1', 1, 1, NULL, 1, 9500000, NULL, 20, NULL, '<p>You shouldn&#39;t need a bundle to use CKEditor - you can download the whole package of js files from the . Once you have it, place the folder containing all the downloaded files inside of your js folder</p>', '2018-04-06 02:35:53', '2018-04-08 12:48:47', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Power Bank White Super', 'Ready Stock', '2', 2, 1, NULL, 1, 2000000, NULL, 23, NULL, '<p>Saat ini <strong>Data Scraping</strong> atau menggali data di internet menjadi sebuah tren dan bahkan sudah sangat umum dilakukan oleh perusahaan atau individu untuk kepentingan tertentu.</p>', '2018-04-06 02:39:03', '2018-04-08 12:48:50', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', 'loren lipsum product', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eleifend luctus nulla, eu rutrum velit fermentum et. Nam vitae condimentum dolor. Nunc erat risus,', 'thumbnail-46.jpg', 'loren lipsum product right', 'Lorem ipsum dolor sit amet, coLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eleifend luctus nulla, eu rutrum velit fermentum et. Nam vitae condimentum dolor. Nunc erat risus, nsectetur adipiscing elit. Vestibulum eleifend luctus nulla, eu rutrum velit fermentum et. Nam vitae condimentum dolor. Nunc erat risus,', 'thumbnail-16.jpg', 'title bottom asik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eleifend luctus nulla, eu rutrum velit fermentum et. Nam vitae condimentum dolor. Nunc erat risus,', 'product-17.png', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Weight</td>\r\n			<td>12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Height</td>\r\n			<td>90 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Speaker</td>\r\n			<td>Dolby</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Monitor</td>\r\n			<td>LED</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>'),
(30, 'S1272', 'Ready Stock', '1', 1, 3, NULL, NULL, 10000, NULL, 10, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dapibus sagittis nunc, nec placerat erat convallis eget. Nulla id condimentum felis, dignissim auctor mi.</p>', '2018-04-18 11:28:35', '2018-04-18 04:28:35', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'ST3520', 'Ready Stock', '1', 4, 3, NULL, NULL, 10000, NULL, 10, NULL, '<p>Due to Instagram&#39;s recent changes, you&#39;ll need to reconnect your account to showcase your Instagram feed on your Bridestory profile. By doing so, your Instagram posts will also get a chance to be featured on our homepage!</p>', '2018-04-18 13:00:29', '2018-04-18 06:00:29', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Panda', 'Ready Stock', '1', 4, 3, NULL, NULL, 1000, NULL, 10, NULL, '<p>Pilihan Tepat untuk Mengembangkan <br />\r\nBisnis Pernikahan Anda</p>', '2018-04-18 13:03:10', '2018-04-18 06:03:59', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Shiji', 'Ready Stock', '1', 4, 3, NULL, NULL, 12345, NULL, 12, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:06:51', '2018-04-18 06:06:51', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Bamboo', 'Ready Stock', '1', 4, 3, NULL, NULL, 1234, NULL, 123, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:09:17', '2018-04-18 06:09:17', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Lucky', 'Ready Stock', '1', 4, 3, NULL, NULL, 1234, NULL, 12, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:11:18', '2018-04-18 06:11:18', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Gypsi', 'Ready Stock', '1', 4, 3, NULL, NULL, 124, NULL, 12, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:13:21', '2018-04-18 06:13:21', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Stone', 'Ready Stock', '1', 4, 3, NULL, NULL, 123, NULL, 2, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:14:56', '2018-04-18 06:14:56', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'ST 22', 'Ready Stock', '1', 4, 3, NULL, NULL, 456, NULL, 12, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:16:26', '2018-04-18 06:16:26', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Corn', 'Ready Stock', '1', 4, 3, NULL, NULL, 345, NULL, 1, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:17:30', '2018-04-18 06:17:59', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Blade', 'Ready Stock', '1', 4, 3, NULL, NULL, 231, NULL, 12, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:19:07', '2018-04-18 06:19:07', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Bomb', 'Ready Stock', '1', 4, 3, NULL, NULL, 456, NULL, 12, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>', '2018-04-18 13:20:06', '2018-04-18 06:20:06', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Handphone Strawberry Bomb5', 'Pre Order', '1', 1, 1, NULL, NULL, 800000, NULL, 20, NULL, '<p>Handphone Strawberry Bomb2 is da best bomb you ever had</p>', '2018-05-01 21:37:38', '2018-05-01 14:37:38', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl_backup1`
--

CREATE TABLE `product_tbl_backup1` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_availability` enum('Ready Stock','Pre Order','Sales Stock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_subcategory` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `old_price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `weight` int(10) UNSIGNED NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `popular` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tbl_backup1`
--

INSERT INTO `product_tbl_backup1` (`product_id`, `product_title`, `product_availability`, `product_category`, `product_subcategory`, `brand_id`, `status`, `price`, `old_price`, `stock`, `weight`, `product_description`, `popular`, `created_at`, `updated_at`, `ip_address`, `user_agent`) VALUES
(1, 'Product1', 'Ready Stock', '1', 1, 1, 'show', 7000000, 10, 10, 39, 'lorem ipsum sit dolor amet', 2, '2018-02-07 16:27:05', '2018-03-10 14:54:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0'),
(2, 'Handphone Strawberry st22', 'Ready Stock', '1', 1, 1, 'show', 110000, 22, 22, 49, 'strawberry st22 is black', 1, '2018-02-24 00:21:09', '2018-02-24 00:21:09', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0');

-- --------------------------------------------------------

--
-- Table structure for table `ringkasan_image`
--

CREATE TABLE `ringkasan_image` (
  `ringkasan_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(220) NOT NULL,
  `image_field` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ringkasan_image`
--

INSERT INTO `ringkasan_image` (`ringkasan_id`, `product_id`, `image_name`, `image_field`) VALUES
(1, 30, 'hg1.jpg', 0),
(2, 30, 'index-bg.jpg', 0),
(3, 28, 'download-free-pirate-photo.jpg', NULL),
(4, 28, 'animals_11-wallpaper-1366x768.jpg', NULL),
(5, 28, 'anime_wallpaper_aldnoah_zero_5757483893.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_tbl`
--

CREATE TABLE `role_tbl` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege` set('admin','role','marketplace','customer','order','voucher','midtrans','bank','slider') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_tbl`
--

INSERT INTO `role_tbl` (`role_id`, `role_name`, `privilege`) VALUES
(1, 'Master Account', 'admin,role,marketplace,customer,order,voucher,midtrans,bank,slider'),
(2, 'Admin', 'marketplace,customer,order,slider'),
(3, 'Finance', 'customer,order,bank');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_tbl`
--

CREATE TABLE `subcategory_tbl` (
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `subcategory_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategory_tbl`
--

INSERT INTO `subcategory_tbl` (`subcategory_id`, `subcategory_name`, `category_id`, `updated_at`, `created_at`, `ip_address`, `user_agent`) VALUES
(1, 'Sub Category 1', 1, '2018-01-31 17:36:03', '2018-02-01 00:36:03', '127.0.0.1', 'mozilla'),
(2, 'Sub Category 2', 2, '2018-01-31 17:36:03', '2018-02-01 00:36:03', '127.0.0.1', 'mozilla');

-- --------------------------------------------------------

--
-- Table structure for table `test_tbl`
--

CREATE TABLE `test_tbl` (
  `test_id` int(11) NOT NULL,
  `dataset` set('admin','role','product','slider') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_tbl`
--

INSERT INTO `test_tbl` (`test_id`, `dataset`) VALUES
(1, 'admin,role'),
(2, 'admin,slider');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('special','reseller') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_telp`, `password`, `gender`, `birthday`, `remember_token`, `created_at`, `updated_at`, `username`, `status`, `ip_address`, `user_agent`) VALUES
(1, 'Aries Dimas Yudhistira', 'alhusna901@gmail.com', '', '$2y$10$YT7NdLRsP/DiY9DCphPP8uNZDqe4YX99mcMz/8.2kfIi67gsmPa72', 'male', '0000-00-00', 'fC1W0NVEDcz5I6oCfkRnzVvaWqClbIND7nFsc4y2EuC0KJ22MHkMY9wANeIU', '2018-01-31 08:23:30', '2018-01-31 08:23:30', 'alhusna901', '', '127.0.0.0', 'mozilla'),
(2, 'Aries Dimas', 'admin@feb.com', '', '$2y$10$dJvSYshgQw3sc9QQggMZGeIMcKn437suh9BlvakNXBMcSbAVBdvTW', 'male', '0000-00-00', '', '2018-03-10 05:51:33', NULL, 'admin', 'special', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0');

-- --------------------------------------------------------

--
-- Table structure for table `user_address_tr`
--

CREATE TABLE `user_address_tr` (
  `user_addtr_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` int(10) UNSIGNED NOT NULL,
  `kota` int(10) UNSIGNED NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_tbl`
--

CREATE TABLE `voucher_tbl` (
  `voucher_id` int(11) NOT NULL,
  `voucher_code` varchar(50) NOT NULL,
  `type` enum('cashback','discount') NOT NULL,
  `discount` int(10) NOT NULL,
  `cashback` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `issued_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `ip_address` varchar(17) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_agent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_tbl`
--

INSERT INTO `voucher_tbl` (`voucher_id`, `voucher_code`, `type`, `discount`, `cashback`, `description`, `issued_date`, `expired_date`, `ip_address`, `created_at`, `user_agent`) VALUES
(1, 'ABC123', 'discount', 15, 0, 'gebyaarr...gebyaarrr', '2018-03-30', '2018-04-30', '::1', '2018-03-30 09:21:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_tbl`
--
ALTER TABLE `about_tbl`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_tbl_email_unique` (`email`);

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `detail_product_market_palce_tbl`
--
ALTER TABLE `detail_product_market_palce_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_place_tbl`
--
ALTER TABLE `market_place_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_detail_tbl_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_tbl_product_id_foreign` (`product_id`),
  ADD KEY `order_detail_tbl_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_tbl_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product_image_tbl`
--
ALTER TABLE `product_image_tbl`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `product_mini_slide`
--
ALTER TABLE `product_mini_slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_tbl_backup1`
--
ALTER TABLE `product_tbl_backup1`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ringkasan_image`
--
ALTER TABLE `ringkasan_image`
  ADD PRIMARY KEY (`ringkasan_id`);

--
-- Indexes for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification_tbl`
--
ALTER TABLE `specification_tbl`
  ADD PRIMARY KEY (`specification_id`);

--
-- Indexes for table `subcategory_tbl`
--
ALTER TABLE `subcategory_tbl`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `test_tbl`
--
ALTER TABLE `test_tbl`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_address_tr`
--
ALTER TABLE `user_address_tr`
  ADD PRIMARY KEY (`user_addtr_id`);

--
-- Indexes for table `voucher_tbl`
--
ALTER TABLE `voucher_tbl`
  ADD PRIMARY KEY (`voucher_id`),
  ADD UNIQUE KEY `code_voucher` (`voucher_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_tbl`
--
ALTER TABLE `about_tbl`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_product_market_palce_tbl`
--
ALTER TABLE `detail_product_market_palce_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `market_place_tbl`
--
ALTER TABLE `market_place_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_image_tbl`
--
ALTER TABLE `product_image_tbl`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_mini_slide`
--
ALTER TABLE `product_mini_slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `product_tbl_backup1`
--
ALTER TABLE `product_tbl_backup1`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ringkasan_image`
--
ALTER TABLE `ringkasan_image`
  MODIFY `ringkasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `role_tbl`
--
ALTER TABLE `role_tbl`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `specification_tbl`
--
ALTER TABLE `specification_tbl`
  MODIFY `specification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcategory_tbl`
--
ALTER TABLE `subcategory_tbl`
  MODIFY `subcategory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `test_tbl`
--
ALTER TABLE `test_tbl`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_address_tr`
--
ALTER TABLE `user_address_tr`
  MODIFY `user_addtr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `voucher_tbl`
--
ALTER TABLE `voucher_tbl`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  ADD CONSTRAINT `order_detail_tbl_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`),
  ADD CONSTRAINT `order_detail_tbl_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product_tbl_backup1` (`product_id`),
  ADD CONSTRAINT `order_detail_tbl_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
