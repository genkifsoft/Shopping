-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2018 at 11:27 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `address`, `email`, `phone`, `avatar`, `status`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Dang QUy', NULL, 'Van dinh', 'quy.dang@mail.com', '0964944719', 'avarta', 1, 1, NULL, NULL),
(2, 'Lac Hong', NULL, 'address', 'quy.dang@gmail.com', '0964944719', 'avartar', 1, 1, NULL, NULL),
(3, 'NAME Quy', '202cb962ac59075b964b07152d234b70', 'address', 'address@gmail.com', '0964454', 'avara', 1, 1, NULL, '2018-12-31 08:47:47'),
(5, 'test anem1', '202cb962ac59075b964b07152d234b70', 'test address', 'tes@gmail.com', '123123', 'chart.png', 1, 1, '2018-12-31 04:37:17', '2018-12-31 08:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dell', 'dell', NULL, NULL, 0, 1, '2018-12-27 02:19:34', '2018-12-27 02:19:34'),
(2, 'HP', 'hp', NULL, NULL, 0, 1, '2018-12-27 02:19:34', '2018-12-31 10:17:26'),
(3, 'Assus', 'assus', NULL, NULL, 0, 1, '2018-12-27 04:51:53', '2018-12-31 10:25:52'),
(25, 'Lenovol', 'lenovol', NULL, NULL, 0, 1, '2018-12-31 09:38:31', '2018-12-31 10:17:36'),
(26, 'Acer', 'acer', NULL, NULL, 0, 1, '2018-12-31 09:38:39', '2018-12-31 10:17:35'),
(27, 'Macbook', 'macbook', NULL, NULL, 1, 1, '2018-12-31 09:39:26', '2018-12-31 10:17:32'),
(28, 'Microsoft ', 'microsoft', NULL, NULL, 0, 1, '2018-12-31 09:39:36', '2018-12-31 10:17:34'),
(29, 'Razer ', 'razer', NULL, NULL, 1, 1, '2018-12-31 09:39:50', '2018-12-31 10:22:50'),
(30, 'Alienware', 'alienware', NULL, NULL, 0, 1, '2018-12-31 09:40:04', '2018-12-31 09:40:04'),
(31, 'Sony', 'sony', NULL, NULL, 0, 1, '2018-12-31 09:40:10', '2018-12-31 09:40:10'),
(32, 'Gateway', 'gateway', NULL, NULL, 0, 1, '2018-12-31 09:40:15', '2018-12-31 09:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `head` int(11) DEFAULT '0',
  `hot` tinyint(4) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `sale` int(11) DEFAULT '0',
  `price` double DEFAULT NULL,
  `thunbar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `category_id`, `content`, `head`, `hot`, `view`, `sale`, `price`, `thunbar`, `created_at`, `updated_at`) VALUES
(1, 'Quần JEAN', 'quan-jean', 1, 'This is short JEAn beatifuly', 0, 0, 0, 0, NULL, 'This is set images', '2018-12-28 04:58:18', '2018-12-28 04:58:26'),
(2, 'Áo thun', 'áo thun', NULL, 'This is chiếc áo thun', 0, 0, 0, 0, NULL, NULL, '2018-12-28 04:58:18', '2018-12-28 04:58:26'),
(3, 'dee', 'dee', 1, '1', 0, 0, 0, 0, 1, '2018-12-28 10:12:10_chart.png', '2018-12-28 09:12:10', '0000-00-00 00:00:00'),
(4, 'dee', 'dee', 3, 'ss', 0, 0, 0, 0, 123, '2018-12-28 10:12:25_chart-large.png', '2018-12-28 09:24:25', '0000-00-00 00:00:00'),
(5, 'dee', 'dee', 1, 'ss', 0, 0, 0, 0, 122, '2018-12-28 10:12:24_chart.png', '2018-12-28 09:25:24', '0000-00-00 00:00:00'),
(6, 'Sản phẩm tét', 'san-pham-tet', 2, 'sdsd', 0, 0, 0, 0, 333, '2018-12-28 10:12:21_chart-large.png', '2018-12-28 09:31:21', '0000-00-00 00:00:00'),
(7, 'ss', 'ss', 2, 'sd', 0, 0, 0, 0, 222, '2018-12-28 10:12:04_113001447.jpg', '2018-12-28 09:33:04', '0000-00-00 00:00:00'),
(8, 'sds', 'sds', 2, 'ssd', 0, 0, 0, 0, 22, '2018-12-28_113001447.jpg', '2018-12-28 09:38:13', '0000-00-00 00:00:00'),
(9, '2a', '2a', 2, 'dd', 0, 0, 0, 0, 222, '2018-12-28 10-12-52_Capture001.png', '2018-12-28 09:38:52', '0000-00-00 00:00:00'),
(10, '232', '232', 1, 'sd', 0, 0, 0, 0, 22, '2018-12-28 10-12-12_113001447.jpg', '2018-12-28 09:39:12', '0000-00-00 00:00:00'),
(11, '123123sdsd', '123123sdsd', 3, 'sdsd', 0, 0, 0, 0, 22, '2018-12-28 11:12:45_chart-large.png', '2018-12-28 10:02:45', '0000-00-00 00:00:00'),
(12, '22sd', '22sd', 2, 'ssd', 0, 0, 0, 0, 122, '2018-12-28 11-12-15_chart-large.png', '2018-12-28 10:03:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
