-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 10:33 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sam`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE `audit_trails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 4, 'Icp management added a product, New Long Sleeve with a price of 499', '2019-01-25 09:02:12', '2019-01-25 09:02:12'),
(2, 4, 'Icp management added a product, try again with a price of 1000', '2019-01-25 09:17:11', '2019-01-25 09:17:11'),
(3, 4, 'Icp management added a product, Jacket again with a price of 1000', '2019-01-25 09:31:28', '2019-01-25 09:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `size` varchar(255) NOT NULL DEFAULT 'small',
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'extra small', 'size', '2018-10-14 02:37:48', '2019-01-19 04:19:15'),
(2, 'small', 'size', '2018-10-14 02:37:48', '2019-01-19 04:19:19'),
(3, 'medium', 'size', '2018-10-14 02:37:48', '2019-01-19 04:19:23'),
(4, 'large', 'size', '2018-10-14 02:37:48', '2019-01-19 04:19:26'),
(5, 'jacket', 'product', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(6, 'polo shirt', 'product', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(7, 'three fourth\'s', 'product', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(8, 't-shirt', 'product', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(9, 'blouse', 'product', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(10, 'long sleeve', 'product', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(11, 'others', 'color', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(12, 'yellow', 'color', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(13, 'blue', 'color', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(14, 'pink', 'color', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(15, 'red', 'color', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(16, 'orange', 'color', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(17, 'male', 'gender', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(18, 'female', 'gender', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(19, 'unisex', 'gender', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(20, 'purple', 'color', '2018-10-13 18:37:58', '2018-10-13 18:37:58'),
(21, 'brown', 'color', '2018-11-23 07:38:22', '2018-11-23 07:38:22'),
(22, 'green', 'color', '2018-11-23 07:51:02', '2018-11-23 07:51:02'),
(23, 'skirt', 'product', '2018-11-26 21:29:27', '2018-11-26 21:29:27'),
(24, 'pants', 'product', '2018-11-26 21:30:14', '2018-11-26 21:30:14'),
(25, 'short', 'product', '2018-11-26 21:29:27', '2018-11-26 21:29:27'),
(26, 'dress', 'product', '2018-10-14 02:37:48', '2018-10-14 02:37:48'),
(27, 'extra large', 'size', '2019-01-19 03:31:20', '2019-01-19 04:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `logo` varchar(191) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `logo`, `name`, `email`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'Shopping Assistant Mirror', 'internsprog@gmail.com', '123', '2018-07-26 01:51:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_trails`
--

CREATE TABLE `log_trails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_date` date NOT NULL,
  `log_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_out` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_trails`
--

INSERT INTO `log_trails` (`id`, `user_id`, `log_date`, `log_in`, `log_out`, `created_at`, `updated_at`) VALUES
(1, 4, '2019-01-25', '2019-01-25 08:40:13', NULL, '2019-01-25 08:40:13', '2019-01-25 08:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `mirror_logs`
--

CREATE TABLE `mirror_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notify_order`
--

CREATE TABLE `notify_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` text NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = process, 1 = shipped, 2 = delivered',
  `type` int(11) NOT NULL COMMENT '0 = COD, 1 = Credit Card',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `size` varchar(255) NOT NULL DEFAULT 'small',
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` text,
  `image_serialize` text,
  `barcode` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `sizes` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(10) NOT NULL,
  `used_stock` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `image_serialize`, `barcode`, `name`, `description`, `sizes`, `category_id`, `gender_id`, `price`, `stock`, `used_stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'yellow_1548408687.png', NULL, 'pro1', 'Jacket again', 'Jacket again description', 'extra small,small,medium,large,extra large', 10, 19, '1000.00', 50, 0, '2019-01-25 09:31:27', '2019-01-25 09:31:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_by_subcategory`
--

CREATE TABLE `product_by_subcategory` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `fbx` text NOT NULL,
  `barcode` varchar(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` int(10) NOT NULL,
  `used_stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_by_subcategory`
--

INSERT INTO `product_by_subcategory` (`id`, `image`, `upload_file`, `fbx`, `barcode`, `product_id`, `category_id`, `stock`, `used_stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'yellow_1548408687.png', 'Jacket 1_1548408687', 'a:9:{i:0;s:9:\"Black.jpg\";i:1;s:14:\"Black.jpg.meta\";i:2;s:13:\"Material.meta\";i:3;s:17:\"Material/Skin.mat\";i:4;s:22:\"Material/Skin.mat.meta\";i:5;s:8:\"skin.png\";i:6;s:13:\"skin.png.meta\";i:7;s:10:\"Tshirt.fbx\";i:8;s:15:\"Tshirt.fbx.meta\";}', '', 4, 12, 10, 0, '2019-01-25 09:31:27', '2019-01-25 09:31:27', '0000-00-00 00:00:00'),
(10, 'blue_1548408687.png', 'Jacket 2_1548408687', 'a:11:{i:0;s:14:\"Materials.meta\";i:1;s:22:\"Materials/Material.mat\";i:2;s:27:\"Materials/Material.mat.meta\";i:3;s:9:\"model.fbx\";i:4;s:14:\"model.fbx.meta\";i:5;s:8:\"skin.mat\";i:6;s:13:\"skin.mat.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";i:9;s:10:\"Tshirt.fbx\";i:10;s:15:\"Tshirt.fbx.meta\";}', '', 4, 13, 10, 0, '2019-01-25 09:31:27', '2019-01-25 09:31:27', '0000-00-00 00:00:00'),
(11, 'pink_1548408687.png', 'Jacket 3_1548408687', 'a:11:{i:0;s:14:\"Materials.meta\";i:1;s:22:\"Materials/Material.mat\";i:2;s:27:\"Materials/Material.mat.meta\";i:3;s:9:\"model.fbx\";i:4;s:14:\"model.fbx.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.mat\";i:8;s:13:\"skin.mat.meta\";i:9;s:10:\"Tshirt.fbx\";i:10;s:15:\"Tshirt.fbx.meta\";}', '', 4, 14, 10, 0, '2019-01-25 09:31:28', '2019-01-25 09:31:28', '0000-00-00 00:00:00'),
(12, 'purple_1548408688.png', 'Jacket 4_1548408688', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:17:\"Material/Skin.mat\";i:2;s:22:\"Material/Skin.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:8:\"skin.png\";i:9;s:13:\"skin.png.meta\";i:10;s:10:\"Tshirt.fbx\";i:11;s:15:\"Tshirt.fbx.meta\";}', '', 4, 20, 10, 0, '2019-01-25 09:31:28', '2019-01-25 09:31:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returned_products`
--

CREATE TABLE `returned_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `buyer_note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `extension_name` varchar(3) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `random_code` varchar(6) DEFAULT NULL,
  `address` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `extension_name`, `username`, `email`, `password`, `remember_token`, `phone_number`, `random_code`, `address`, `status`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'S', 'A', 'M', 'SAM', 'Admin', 'web_admin@gmail.com', '$2y$10$7q.tDakqaFuuIqkubMTLveFbWo9ohd3BCbpA2E1m8gZQP9J4Vxs.W', 'LSmyCkW0wZZZtDXSFx2g9HQR9iR4UsR9MUdaMHcBo5rj465rqulQLB2Gn6wu', NULL, '', NULL, 1, 'admin', '2018-07-25 17:10:33', '2018-07-25 17:10:33', NULL),
(4, 'U', 'C', 'C', NULL, 'ICP', 'icp@gmail.com', '$2y$10$7q.tDakqaFuuIqkubMTLveFbWo9ohd3BCbpA2E1m8gZQP9J4Vxs.W', 'CzjoKwCJIQj1w5D3M5B4RujTspaKmwLNoJEhjI2MaCHV44PEu5vSO2ZB0gzr', NULL, '', NULL, 1, 'icp', '2018-07-25 17:27:24', '2018-07-25 17:27:24', NULL),
(5, 'Store', NULL, 'Manager', NULL, 'Manager', 'store_manager@gmail.com', '$2y$10$BvyQam/KHznW3SRNCr9T9uvp0miAi5gd9d2h.f5pTImmVsrbpSsIS', '8Fz8FPGzIy8YaWv07A4xTMEcEzhHua9WlGVAruPmVkG9mRBY6NGa1X1j9INA', NULL, '', NULL, 1, 'manager', '2018-07-25 17:43:53', '2018-07-25 17:43:53', NULL),
(6, 'John', NULL, 'Roncales', NULL, 'jrroncales', 'jrroncales25@gmail.com', '$2y$10$7q.tDakqaFuuIqkubMTLveFbWo9ohd3BCbpA2E1m8gZQP9J4Vxs.W', 'fQwYctJoe7G6RSl8iUtQCrN5087dvWoo3VqRoA1gBnj9YIADWlUpccaawYKm', '639452538775', 'JSVKTT', 'blk 11 lot 8 north triangle cielito camarin caloocan city', 1, 'user', '2018-07-25 17:59:44', '2018-10-13 17:41:45', NULL),
(12, 'Richard', NULL, 'Roncales', NULL, 'unno21', 'chadxx1993@gmail.com', '$2y$10$7q.tDakqaFuuIqkubMTLveFbWo9ohd3BCbpA2E1m8gZQP9J4Vxs.W', 'XoUNh0GSBNDAlIpmeeyLwOP5rzdENnSSvlXBPukZCAiZtzwXwJxgjOpAWWeK', '639507353920', 'JSSRG7', NULL, 0, 'user', '2018-09-01 22:40:37', '2018-09-01 22:40:37', NULL),
(21, 'Jade', NULL, 'Coral', NULL, 'jade_coral', 'jadecoral@gmail.com', '$2y$10$nZ55/YqUoTMTsCnBb3ftEeKp3IxVXoZJQR3qtNPFTJZnYfKuMAOGu', 'eLwmcny7jdENBQStJkicZ6JJL4ubNvCXlx6pkY204y4E4njryEsgSNdHtOij', '639507353920', '41J5YC', NULL, 0, 'user', '2018-10-02 09:09:03', '2018-10-02 09:09:03', NULL),
(22, 'Tin', NULL, 'Carpio', NULL, 'tincarpio', 'tincarpio@gmail.com', '$2y$10$usn8W/xkBBTsT56IA0LhbejwlbJaUuZnxXAwXvXCd.0/nxERRjudq', 'RUHgLDaBawnyNJQWZMDhHgTv2mBhmh6wCSDwLBR0DTHKaZTEb5W0AOuVcRvJ', '639507353920', '859Z2C', NULL, 0, 'user', '2018-10-02 09:10:26', '2018-10-02 09:10:26', NULL),
(23, 'Joseph', NULL, 'Malaga', NULL, 'joseph', 'malaga@gmail.com', '$2y$10$3YLBHu5gyLrV0g1IO7K.TuESaBYX5rhBqR.DfWK/GIj0.9m1vaKIu', 'JWjkRL7ZFFulwjfqZljmxIwR93iQRahV5MK2ohVS15FDKbA71MpooHfxR9N0', '639507353920', 'M8EIWC', NULL, 1, 'user', '2018-10-02 09:15:44', '2018-10-02 09:15:53', NULL),
(24, 'Mac', 'A', 'Acebes', NULL, 'allennegro', 'negronegro@gmail.com', '$2y$10$09IsmYTkmmJ5nwAVUC2.dOD8o5OP9i7iozCb3hjn8TOVMWHHr6b4C', NULL, NULL, NULL, NULL, 1, 'cashier', '2018-10-02 10:11:44', '2018-10-02 10:11:44', NULL),
(26, 'eohan', 'eohan', 'eohan', NULL, 'eohan', 'eohan@gmail.com', '$2y$10$2A2/bYH7TaB.3lYmKonnsuuVaWJSKQTNoggQ1Hj7/5Q79OHh.ZuIW', NULL, NULL, NULL, NULL, 1, 'cashier', '2018-10-05 04:01:58', '2018-10-05 04:01:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trails`
--
ALTER TABLE `audit_trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_trails`
--
ALTER TABLE `log_trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mirror_logs`
--
ALTER TABLE `mirror_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify_order`
--
ALTER TABLE `notify_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_by_subcategory`
--
ALTER TABLE `product_by_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returned_products`
--
ALTER TABLE `returned_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trails`
--
ALTER TABLE `audit_trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_trails`
--
ALTER TABLE `log_trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mirror_logs`
--
ALTER TABLE `mirror_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notify_order`
--
ALTER TABLE `notify_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_by_subcategory`
--
ALTER TABLE `product_by_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returned_products`
--
ALTER TABLE `returned_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
