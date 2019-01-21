-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 11:45 AM
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `address`, `email`, `phone`, `avatar`, `status`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Dang QUy', NULL, 'Van dinh', 'quy.dang@mail.com', '0964944719', 'avarta', 1, 1, '2019-01-02 04:36:30', NULL),
(2, 'Lac Hong', NULL, 'address1', 'quy.dang@gmail.com', '0964944719', 'avartar', 1, 1, '2019-01-02 04:36:30', '2019-01-02 04:34:51'),
(3, 'NAME QUY', '202cb962ac59075b964b07152d234b70', 'dia chi', 'dichi@gmail.com', '0964454', 'avara', 1, 1, '2019-01-02 04:36:30', '2019-01-04 10:30:53'),
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
(1, 'Dell', 'dell', NULL, '2019_01_03_11_01_05_banner01.jpg', 1, 1, '2018-12-27 02:19:34', '2019-01-21 05:02:48'),
(2, 'HP', 'hp', NULL, '2019_01_03_11_01_12_banner02.jpg', 1, 1, '2018-12-27 02:19:34', '2019-01-03 04:01:12'),
(3, 'Assus', 'assus', NULL, '2019_01_03_10_01_23_113001447.jpg', 0, 1, '2018-12-27 04:51:53', '2019-01-21 05:02:53'),
(25, 'Lenovol', 'lenovol', NULL, NULL, 0, 1, '2018-12-31 09:38:31', '2019-01-02 07:07:39'),
(26, 'Acer', 'acer', NULL, NULL, 0, 1, '2018-12-31 09:38:39', '2019-01-02 07:31:43'),
(27, 'Macbook', 'macbook', NULL, NULL, 0, 1, '2018-12-31 09:39:26', '2019-01-02 07:07:38'),
(28, 'Microsoft', 'microsoft', NULL, '2019_01_03_10_01_51_banner01.jpg', 0, 1, '2018-12-31 09:39:36', '2019-01-03 03:59:51'),
(29, 'Razer ', 'razer', NULL, NULL, 0, 1, '2018-12-31 09:39:50', '2019-01-02 07:11:39'),
(30, 'Alienware', 'alienware', NULL, NULL, 0, 1, '2018-12-31 09:40:04', '2019-01-02 07:11:45'),
(31, 'Sony', 'sony', NULL, NULL, 0, 1, '2018-12-31 09:40:10', '2018-12-31 09:40:10'),
(32, 'Gateway', 'gateway', NULL, NULL, 0, 1, '2018-12-31 09:40:15', '2018-12-31 09:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name_img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_comment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 1, 12000000, NULL, NULL),
(2, 16, 2, 5, 14000000, NULL, '2019-01-21 08:36:15'),
(3, 17, 1, 1, 12000000, '2019-01-21 04:02:47', '2019-01-21 04:02:47'),
(4, 17, 2, 1, 14000000, '2019-01-21 04:02:47', '2019-01-21 04:02:47'),
(5, 24, 7, 1, 35000000, '2019-01-21 04:11:38', '2019-01-21 04:11:38'),
(6, 24, 13, 1, 53000000, '2019-01-21 04:11:38', '2019-01-21 04:11:38'),
(7, 24, 6, 1, 31000000, '2019-01-21 04:11:38', '2019-01-21 04:11:38'),
(8, 25, 1, 1, 12000000, '2019-01-21 04:13:38', '2019-01-21 04:13:38'),
(9, 25, 3, 1, 20000000, '2019-01-21 04:13:38', '2019-01-21 04:13:38'),
(10, 26, 2, 1, 14000000, '2019-01-21 04:35:32', '2019-01-21 04:35:32'),
(11, 26, 7, 1, 35000000, '2019-01-21 04:35:33', '2019-01-21 04:35:33'),
(12, 27, 2, 1, 14000000, '2019-01-21 04:42:32', '2019-01-21 04:42:32'),
(13, 27, 1, 1, 12000000, '2019-01-21 04:42:32', '2019-01-21 04:42:32'),
(14, 27, 6, 1, 31000000, '2019-01-21 04:42:32', '2019-01-21 04:42:32'),
(15, 28, 1, 1, 12000000, '2019-01-21 04:44:58', '2019-01-21 04:44:58'),
(16, 29, 1, 1, 12000000, '2019-01-21 07:14:46', '2019-01-21 07:14:46');

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
  `number` int(11) NOT NULL,
  `pay` int(11) DEFAULT '0',
  `thunbar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `category_id`, `content`, `head`, `hot`, `view`, `sale`, `price`, `number`, `pay`, `thunbar`, `created_at`, `updated_at`) VALUES
(1, 'Del insprion 4000', 'del-insprion-4000', 1, 'This is short JEAn beatifuly\"\"', 0, 0, 0, 10, 12000000, 92, 0, '2019_01_02_16_01_52_del01..jpg', '2019-01-21 08:39:14', '2019-01-21 08:39:14'),
(2, 'Dell N343', 'dell-n343', 1, 'This is chiếc áo thun\"', 0, 0, 0, 0, 14000000, 81, 0, '2019_01_02_16_01_04_del02.jpg', '2019-01-21 08:39:14', '2019-01-21 08:39:14'),
(3, 'Dell M091', 'dell-m091', 1, '<p><em><strong>đây là sản phẩm dell</strong></em></p>', 0, 0, 0, 10, 20000000, 100, 0, '', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(4, 'Asus B010', 'asus-b010', 1, 'Asus la san pham dep', 0, 0, 0, 20, 23000000, 100, 0, '2019_01_02_16_01_18_del04.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(6, 'Hp N562', 'hp-n562', 2, 'Đây là chiếc máy tính cấu hình cực mạnh có chip snapgrain và chạy trên windown chưa có của microsoft nhé :D :D', 0, 0, 0, 0, 31000000, 99, 0, '2019_01_02_16_01_26_hp01.jpg', '2019-01-21 08:39:14', '2019-01-21 08:39:14'),
(7, 'HP neves400', 'hp-neves400', 2, 'HP', 0, 0, 0, 30, 35000000, 100, 0, '2019_01_02_16_01_40_hp02.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(8, 'HP C01', 'hp-c01', 2, 'HP', 0, 0, 0, 42, 16000000, 100, 0, '2019_01_02_16_01_48_hp03.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(13, 'HpD009', 'hpd009', 2, 'HP', 0, 0, 0, 30, 53000000, 100, 0, '2019_01_02_16_01_54_hp04.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(14, 'Del insprion 4000', 'del-insprion-4000', NULL, 'This is short JEAn beatifuly\"\"', 0, 0, 0, 10, 12000000, 100, 0, '2019_01_02_16_01_42_del01..jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(15, 'Del insprion 4000', 'del-insprion-4000', NULL, 'This is short JEAn beatifuly\"\"', 0, 0, 0, 10, 12000000, 100, 0, '2019_01_02_16_01_49_del01..jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(16, 'Dell N343', 'dell-n343', NULL, 'This is chiếc áo thun\"', 0, 0, 0, 0, 14000000, 100, 0, '2019_01_02_16_01_11_del03.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(17, 'Dell M091', 'dell-m091', NULL, '1\"\"\"', 0, 0, 0, 10, 20000000, 100, 0, '2019_01_02_16_01_11_del03.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(18, 'Asus B010', 'asus-b010', NULL, 'Asus la san pham dep', 0, 0, 0, 20, 23000000, 100, 0, '2019_01_02_16_01_18_del04.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(19, 'Hp N562', 'hp-n562', NULL, 'HP', 0, 0, 0, 0, 31000000, 100, 0, '2019_01_02_16_01_26_hp01.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(20, 'HP neves400', 'hp-neves400', NULL, 'HP', 0, 0, 0, 30, 35000000, 100, 0, '2019_01_02_16_01_40_hp02.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(21, 'HP C01', 'hp-c01', NULL, 'HP', 0, 0, 0, 42, 16000000, 100, 0, '2019_01_02_16_01_48_hp03.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(22, 'HpD009', 'hpd009', NULL, 'HP', 0, 0, 0, 30, 53000000, 100, 0, '2019_01_02_16_01_54_hp04.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(23, 'Dell N343', 'dell-n343', NULL, 'This is chiếc áo thun\"', 0, 0, 0, 0, 14000000, 100, 0, '2019_01_02_16_01_11_del03.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(24, 'Del insprion 4000', 'del-insprion-4000', NULL, 'This is short JEAn beatifuly\"\"', 0, 0, 0, 10, 12000000, 100, 0, '2019_01_02_16_01_52_del01..jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48'),
(25, 'Dell M091', 'dell-m091', NULL, '1\"\"\"', 0, 0, 0, 10, 20000000, 100, 0, '2019_01_02_16_01_04_del03.jpg', '2019-01-21 08:01:48', '2019-01-21 08:01:48');

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

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 181000000, 8, 1, '2019-01-21 03:45:17', '2019-01-21 07:08:11'),
(4, 181000000, 8, 0, '2019-01-21 03:46:45', '2019-01-21 08:56:51'),
(6, 26000000, 8, 1, '2019-01-21 03:56:12', '2019-01-21 07:08:16'),
(7, 26000000, 8, 0, '2019-01-21 03:56:23', '2019-01-21 08:56:47'),
(8, 26000000, 8, 1, '2019-01-21 03:56:58', '2019-01-21 07:13:16'),
(11, 26000000, 8, 1, '2019-01-21 03:57:47', '2019-01-21 07:13:18'),
(14, 26000000, 8, 0, '2019-01-21 03:58:47', '2019-01-21 03:58:47'),
(15, 26000000, 8, 0, '2019-01-21 03:59:23', '2019-01-21 03:59:23'),
(16, 26000000, 8, 1, '2019-01-21 04:00:02', '2019-01-21 08:37:58'),
(17, 26000000, 8, 1, '2019-01-21 04:02:47', '2019-01-21 08:36:24'),
(18, 26000000, 8, 0, '2019-01-21 04:02:49', '2019-01-21 04:02:49'),
(25, 32000000, 8, 0, '2019-01-21 04:13:38', '2019-01-21 04:13:38'),
(26, 49000000, 8, 0, '2019-01-21 04:35:32', '2019-01-21 04:35:32'),
(27, 57000000, 11, 1, '2019-01-21 04:42:32', '2019-01-21 08:39:14'),
(28, 12000000, 11, 1, '2019-01-21 04:44:58', '2019-01-21 08:39:13'),
(29, 12000000, 11, 1, '2019-01-21 07:14:46', '2019-01-21 07:14:54');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'ád', 'sd@gmail.cm', '123', 'ád', '6226f7cbe59e99a90b5cef6f94f966fd', '113001447.jpg', 1, NULL, '2019-01-04 10:22:28', '2019-01-04 10:34:00'),
(2, 'Dang Quy IT', 'quy@gmail.com', '03154514', 'Van Dinh', '202cb962ac59075b964b07152d234b70', '113001447.jpg', 1, NULL, '2019-01-04 10:22:28', '2019-01-04 10:33:43'),
(4, 'sdsdsdsd', 'sds@hmail.com', '123', 'sd', '202cb962ac59075b964b07152d234b70', '2019_01_04_10_01_47_113001447.jpg', 1, NULL, '2019-01-04 10:22:28', NULL),
(5, 'Dang12Quy', 'quy.dang@seldatinc.com', '123123', 'sadasd', '202cb962ac59075b964b07152d234b70', '2019_01_04_10_01_23_113001447.jpg', 1, NULL, '2019-01-04 10:22:28', '2019-01-04 03:53:29'),
(6, 'Dang Quyssd', 'dang@gmail.com123', '123', '123', '202cb962ac59075b964b07152d234b70', '2019_01_04_10_01_23_113001447.jpg', 1, NULL, '2019-01-04 10:22:28', '2019-01-04 03:58:35'),
(7, 'Dang Quy', 'dang@gmail.com123', '092564', '123sadasd', '202cb962ac59075b964b07152d234b70', '2019_01_04_10_01_52_113001447.jpg', 1, NULL, '2019-01-04 10:22:28', NULL),
(8, 'dangquy', 'quy.dang@gmail.com', '12', '123', '202cb962ac59075b964b07152d234b70', '2019_01_04_11_01_55_113001447.jpg', 1, NULL, '2019-01-04 10:22:28', NULL),
(9, 'quydang', 'quy.dang@gmail.com1', '036154854', 'add ress123', '202cb962ac59075b964b07152d234b70', '2019_01_04_14_01_10_113001447.jpg', 1, NULL, '2019-01-04 10:22:28', NULL),
(10, 'Quydanf123', 'quy.ang@gmail.com', '12312312', 'Quan1', '202cb962ac59075b964b07152d234b70', '113001447.jpg', 1, NULL, '2019-01-04 10:26:49', NULL),
(11, 'test account', 'tes@gmail.com', '01122312', 'test', '202cb962ac59075b964b07152d234b70', '2019_01_21_11_01_40chart.png', 1, NULL, '2019-01-21 04:41:40', NULL);

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
