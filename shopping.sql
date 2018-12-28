-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 11:30 AM
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
  `name` int(100) DEFAULT NULL,
  `address` int(100) DEFAULT NULL,
  `email` int(100) DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` int(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, 'HP', 'hp', NULL, NULL, 0, 1, '2018-12-27 02:19:34', '2018-12-27 02:19:34'),
(3, 'Assus', 'assus', NULL, NULL, 0, 1, '2018-12-27 04:51:53', '2018-12-27 07:53:03'),
(22, 'Ace', 'ace', NULL, NULL, 0, 1, '2018-12-28 04:22:37', '2018-12-28 04:35:50'),
(23, '2', '2', NULL, NULL, 0, 1, '2018-12-28 06:15:33', '2018-12-28 06:15:33');

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
