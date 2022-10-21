-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 05:48 PM
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
(1, 4, 'Icp management added a product, Summer Surf with a price of 1680', '2019-02-12 15:54:27', '2019-02-12 15:54:27'),
(2, 4, 'Icp management added a product, Pine Summer with a price of 1512', '2019-02-12 15:56:40', '2019-02-12 15:56:40'),
(3, 4, 'Icp management added a product, Tie Dye Polo with a price of 952', '2019-02-12 15:58:30', '2019-02-12 15:58:30'),
(4, 4, 'Icp management added a product, Sean Swan with a price of 1680', '2019-02-12 15:59:44', '2019-02-12 15:59:44'),
(5, 4, 'Icp management added a product, Bench Blue Polo with a price of 840', '2019-02-12 16:04:10', '2019-02-12 16:04:10'),
(6, 4, 'Icp management added a product, Hilfiger Polo with a price of 672', '2019-02-12 16:07:16', '2019-02-12 16:07:16'),
(7, 4, 'Icp management added a product, Martin Racing Polo with a price of 840', '2019-02-12 16:09:27', '2019-02-12 16:09:27'),
(8, 4, 'Icp management added a product, Blackstone Polo with a price of 616', '2019-02-12 16:13:57', '2019-02-12 16:13:57'),
(9, 4, 'Icp management added a product, Gucci Polo with a price of 2072', '2019-02-12 16:15:57', '2019-02-12 16:15:57'),
(10, 4, 'Icp management added a product, Porche Polo with a price of 952', '2019-02-12 16:19:56', '2019-02-12 16:19:56'),
(11, 4, 'Icp management added a product, Dolce Gabbana with a price of 560', '2019-02-12 16:27:07', '2019-02-12 16:27:07'),
(12, 4, 'Icp management added a product, Erdem X H&M with a price of 1006.88', '2019-02-12 16:29:20', '2019-02-12 16:29:20'),
(13, 4, 'Icp management added a product, Bird Print Patterned with a price of 558.88', '2019-02-12 16:30:48', '2019-02-12 16:30:48'),
(14, 4, 'Icp management added a product, Smoke Blue with a price of 896', '2019-02-12 16:32:36', '2019-02-12 16:32:36'),
(15, 4, 'Icp management added a product, Lysts Patterned T-shirt with a price of 894.88', '2019-02-12 16:34:02', '2019-02-12 16:34:02'),
(16, 4, 'Icp management has deleted the 15 product', '2019-02-12 17:54:32', '2019-02-12 17:54:32'),
(17, 4, 'Icp management added a product, Byou Cougar with a price of 1344', '2019-02-12 20:04:01', '2019-02-12 20:04:01'),
(18, 4, 'Icp management added a product, Chicago Bulls Hoodie with a price of 1512', '2019-02-12 20:07:32', '2019-02-12 20:07:32'),
(19, 4, 'Icp management added a product, Varsity Hoodie with a price of 1344', '2019-02-12 20:11:17', '2019-02-12 20:11:17'),
(20, 4, 'Icp management added a product, Chinese Sleeve with a price of 896', '2019-02-12 20:39:29', '2019-02-12 20:39:29'),
(21, 4, 'Icp management added a product, Chingchong Formal with a price of 896', '2019-02-12 20:42:57', '2019-02-12 20:42:57'),
(22, 4, 'Icp management added a product, Christmas Sleeve with a price of 1120', '2019-02-12 20:49:43', '2019-02-12 20:49:43'),
(23, 4, 'Icp management added a product, Aqua Splash with a price of 672', '2019-02-12 20:57:28', '2019-02-12 20:57:28'),
(24, 4, 'the order ord007 has been shipped by you.', '2019-02-13 00:43:29', '2019-02-13 00:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform` int(11) NOT NULL DEFAULT '0' COMMENT '0 = POS, 1 = Mirror, 2 = Mobile/Web',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `platform`, `created_at`, `updated_at`, `deleted_at`) VALUES
(237, 248, 0, '2019-02-11 04:21:41', '2019-02-11 04:21:41', NULL),
(239, 63, 0, '2019-02-12 16:51:16', '2019-02-12 16:51:16', NULL),
(242, 65, 0, '2019-02-13 00:07:11', '2019-02-13 00:07:11', NULL),
(243, 64, 0, '2019-02-13 00:24:46', '2019-02-13 00:24:46', NULL),
(245, 66, 0, '2019-02-13 00:41:20', '2019-02-13 00:41:20', NULL),
(246, 67, 0, '2019-02-13 00:42:27', '2019-02-13 00:42:27', NULL),
(247, 67, 1, '2019-02-12 13:00:00', '2019-02-13 00:44:43', NULL),
(249, 70, 0, '2019-02-13 00:58:57', '2019-02-13 00:58:57', NULL),
(256, 64, 2, '2019-02-12 15:17:50', '2019-02-12 15:17:50', NULL),
(257, 67, 2, '2019-02-12 16:30:09', '2019-02-12 16:30:09', NULL);

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

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_id`, `product_id`, `sub_category_id`, `size`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 242, 11, 11, 'small', 1, '2019-02-13 00:07:32', '2019-02-13 00:07:32', NULL),
(22, 242, 3, 3, 'small', 2, '2019-02-13 00:08:54', '2019-02-13 00:09:08', NULL),
(23, 242, 20, 25, 'small', 1, '2019-02-13 00:11:41', '2019-02-13 00:11:41', NULL),
(25, 243, 20, 25, 'small', 11, '2019-02-13 00:28:05', '2019-02-13 00:28:27', NULL),
(27, 245, 11, 11, 'small', 1, '2019-02-13 00:41:40', '2019-02-13 00:41:40', NULL),
(28, 246, 16, 16, 'small', 1, '2019-02-13 00:43:05', '2019-02-13 00:43:05', NULL),
(31, 243, 14, 14, 'small', 1, '2019-02-13 00:53:18', '2019-02-13 00:53:18', NULL);

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `user_id`, `image`, `updated_at`, `created_at`) VALUES
(1, 65, '12672_1549962567.jpg', '2019-02-13 00:09:27', '2019-02-13 00:09:27'),
(2, 65, '14251_1549962725.jpg', '2019-02-13 00:12:05', '2019-02-13 00:12:05'),
(3, 70, '111894_1549965566.jpg', '2019-02-13 00:59:26', '2019-02-13 00:59:26');

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
(1, 4, '2019-02-12', '2019-02-12 00:30:57', NULL, '2019-02-12 15:30:57', '2019-02-12 15:30:57'),
(2, 4, '2019-02-12', '2019-02-12 00:48:33', NULL, '2019-02-12 15:48:33', '2019-02-12 15:48:33'),
(3, 4, '2019-02-12', '2019-02-12 04:58:15', NULL, '2019-02-12 19:58:15', '2019-02-12 19:58:15'),
(4, 4, '2019-02-12', '2019-02-12 09:26:01', NULL, '2019-02-13 00:26:01', '2019-02-13 00:26:01'),
(5, 4, '2019-02-12', '2019-02-12 09:27:33', '2019-02-13 00:30:41', '2019-02-12 09:30:41', '2019-02-13 00:30:41'),
(6, 4, '2019-02-12', '2019-02-12 09:32:20', '2019-02-13 00:33:09', '2019-02-12 09:33:09', '2019-02-13 00:33:09'),
(7, 4, '2019-02-12', '2019-02-12 09:34:20', '2019-02-13 00:44:52', '2019-02-12 09:44:52', '2019-02-13 00:44:52'),
(8, 4, '2019-02-12', '2019-02-12 09:45:41', '2019-02-13 00:48:43', '2019-02-12 09:48:43', '2019-02-13 00:48:43'),
(9, 4, '2019-02-12', '2019-02-12 09:59:42', '2019-02-13 01:01:32', '2019-02-12 10:01:32', '2019-02-13 01:01:32'),
(10, 4, '2019-02-12', '2019-02-12 10:01:41', '2019-02-13 01:06:46', '2019-02-12 10:06:46', '2019-02-13 01:06:46');

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

--
-- Dumping data for table `mirror_logs`
--

INSERT INTO `mirror_logs` (`id`, `user_id`, `status`, `updated_at`, `created_at`) VALUES
(1, 63, 0, '2019-02-12 18:54:06', '2019-02-12 16:51:15'),
(2, 6, 0, '2019-02-12 03:59:36', '2019-02-12 18:55:11'),
(3, 64, 0, '2019-02-12 23:47:09', '2019-02-12 20:11:36'),
(4, 65, 0, '2019-02-13 00:14:26', '2019-02-13 00:07:10'),
(5, 66, 0, '2019-02-13 00:41:53', '2019-02-13 00:41:20'),
(6, 67, 1, '2019-02-12 14:40:49', '2019-02-13 00:42:26'),
(7, 68, 0, '2019-02-13 00:47:05', '2019-02-13 00:44:43'),
(8, 69, 0, '2019-02-13 00:51:23', '2019-02-13 00:49:59'),
(9, 64, 0, '2019-02-13 00:54:32', '2019-02-13 00:52:20'),
(10, 70, 0, '2019-02-12 13:14:37', '2019-02-13 00:58:57');

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

--
-- Dumping data for table `notify_order`
--

INSERT INTO `notify_order` (`id`, `order_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 8, 'Your order is being processed at the moment.', '2019-02-13 00:24:50', '2019-02-13 00:24:50'),
(2, 9, 'Your order is being processed at the moment.', '2019-02-13 00:34:03', '2019-02-13 00:34:03'),
(3, 9, 'Your order has been shipped by our courier.', '2019-02-13 00:43:29', '2019-02-13 00:43:29'),
(4, 10, 'Your order is being processed at the moment.', '2019-02-13 00:59:28', '2019-02-13 00:59:28');

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
  `cashier_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `amount`, `phone_number`, `address`, `status`, `type`, `cashier_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'INV-848232', 63, 'eyJpdiI6ImdVa212UE9oTnoybGxITzZtQmVVN3c9PSIsInZhbHVlIjoieXROeHY3SUNLZ250bWNcL09GZkFyN0E9PSIsIm1hYyI6Ijc2OGVmMzYxYWYxOGUwMjdkYjg4NDM0Y2Y4Y2NiMDU0MDUyYzdmN2Q3MmMwNmRlNTliYmM5YjAzODZkMDY2N2QifQ==', NULL, NULL, 2, 3, NULL, '2019-02-12 07:00:01', '2019-02-12 07:00:01', NULL),
(4, 'INV-343443', 6, 'eyJpdiI6IlN2RkIzUjBzc05Wb0ZHUE84RjZGZ0E9PSIsInZhbHVlIjoiMklhaFdGR2Z3S1BFdExXdUNKRlFYdz09IiwibWFjIjoiZWEyZjJkMTA3YjhkZTNiMzFlYjJiMGRlYjdhMjhhZmZkMTQ2YzVmYzNkMjNjN2E3ZjlhNmE4YjhmMzk3NDA1OCJ9', '639452538775', 'blk 11 lot 8 north triangle cielito camarin caloocan city', 2, 0, NULL, '2019-02-12 22:13:41', '2019-02-12 07:15:55', NULL),
(5, 'INV-16118', 6, 'eyJpdiI6IjVNS1NVS2twWmd6QW5lXC8zY1pPUEt3PT0iLCJ2YWx1ZSI6Ilp6R05kQUxcL1cxdWJrakVBb3IxdjhBPT0iLCJtYWMiOiJhY2YzZDg4NzA0N2YxZTk0MTA0NDVjMWNlNTJmYjYyZTYzYmI2ZjNhMDQ4MDFiODVmY2FmMTJkYzFhZTBhMTg4In0=', NULL, NULL, 2, 3, NULL, '2019-02-12 07:17:00', '2019-02-12 07:17:00', NULL),
(6, 'INV-546654', 6, 'eyJpdiI6InN2VDRLOHR6WWNocldNc1ZBNjl2R3c9PSIsInZhbHVlIjoiZWVhUUd0ZzVJU216WVduMDI0VWZSZz09IiwibWFjIjoiN2JhNjZmMjQ4OWNjNDcyNDIwMzc4OTc1NjZkZTBlNWYxZTNhNTgyNWM5NjNhZDEzYTk1ZTg4NDA5YTNkM2RhNCJ9', NULL, NULL, 2, 3, NULL, '2019-02-12 07:55:21', '2019-02-12 07:55:21', NULL),
(7, 'ORD007', 64, 'eyJpdiI6ImR3b2xSd3JZdUpxRXJhSUJFMnl4WVE9PSIsInZhbHVlIjoiVUVGT1ZvYjBLVFc5NzF6Y3R6WUV5UT09IiwibWFjIjoiMzhjZDgwOWY1ZGVhOWVmYmY1NzE1NzU3M2Q3NWJlZmE3NGJlOTVlOGY4MmJiYzMyMTY4MDBmOTIyMzM4YTBlNSJ9', NULL, NULL, 0, 0, NULL, '2019-02-13 00:24:45', '2019-02-13 00:24:45', NULL),
(8, 'ord006', 6, 'eyJpdiI6ImJMdWwwTGNqcWFjUGdqN3YwSHBUbVE9PSIsInZhbHVlIjoidGl1Wjk5dE9vSVZiUGFTamhNS1dxQT09IiwibWFjIjoiM2ExMWEzNmU5YjlhOTE5OTMyYmEwODhmZDZkMjk0ZWE4MzhlMTFmZmJiYWZkNzkwMDRmYmQwN2I0NDZiNjM5MSJ9', NULL, NULL, 3, 0, NULL, '2019-02-13 00:24:50', '2019-02-13 00:57:57', NULL),
(9, 'ord007', 6, 'eyJpdiI6IkZ1emhoUHhSV1NaTURBVlRFK3p3ZEE9PSIsInZhbHVlIjoidmd6aDlwZmIzWGRsdXR2SWVPSUZMQT09IiwibWFjIjoiMjZjYzUwOGQ2NWU5YmViOWQ2MGQ0YjZjZTU3MjMwYjI4ZTAxMzNiMDcxYThkZDk2YzkzYWM1ZWJkOWRiMDI2ZiJ9', NULL, NULL, 3, 0, NULL, '2019-02-13 00:34:03', '2019-02-13 00:45:13', NULL),
(10, 'ord008', 6, 'eyJpdiI6IjNYVFl5RU41SE0wcW5oTlYrZmZNdHc9PSIsInZhbHVlIjoiVk1qNWxmUUN1U3Jja1lWaGVST1V1Zz09IiwibWFjIjoiYjcyMzg0Yzc2YjZhNDA4ODRhN2Y2ZmExNDYzNjU5OWIzNWFiYTA4MTk2N2RlNTZlYjA1ZWM4YjkxNzg5YmU4MyJ9', NULL, NULL, 0, 0, NULL, '2019-02-13 00:59:28', '2019-02-13 00:59:28', NULL),
(11, 'ORD011', 67, 'eyJpdiI6ImU1YkVTOExhSE9UTW03K1pEQ1I3SGc9PSIsInZhbHVlIjoiUmNtSHFqV1BlZGJIWmw0Smt1eHIrZz09IiwibWFjIjoiMjJhOWVmMzU3Y2I2M2Y2Y2MwZGM3ODcwYTk3OGYyZTQxOWE2ZTIxNGFmZGI0ZGUyOGM0YmY2ZTU1M2Q0MGU1MCJ9', '639502144401', 'Caloocan City', 0, 0, NULL, '2019-02-12 16:30:08', '2019-02-12 16:30:08', NULL);

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
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = normal, 1 = process, 2 = returned, 3 = ignored',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `sub_category_id`, `size`, `quantity`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 3, 11, 11, 'small', 2, 0, '2019-02-12 07:00:01', '2019-02-12 07:00:01', NULL),
(6, 3, 1, 1, 'small', 2, 0, '2019-02-12 07:00:01', '2019-02-12 07:00:01', NULL),
(7, 4, 19, 22, 'small', 1, 0, '2019-02-12 22:13:41', '2019-02-12 22:13:41', NULL),
(8, 4, 19, 24, 'small', 1, 0, '2019-02-12 22:13:41', '2019-02-12 22:13:41', NULL),
(9, 4, 16, 17, 'small', 1, 0, '2019-02-12 22:13:41', '2019-02-12 22:13:41', NULL),
(10, 4, 16, 16, 'small', 1, 0, '2019-02-12 22:13:41', '2019-02-12 22:13:41', NULL),
(11, 5, 19, 22, 'small', 1, 0, '2019-02-12 07:17:00', '2019-02-12 07:17:00', NULL),
(12, 6, 3, 3, 'small', 1, 0, '2019-02-12 07:55:21', '2019-02-12 07:55:21', NULL),
(13, 6, 7, 7, 'small', 1, 0, '2019-02-12 07:55:22', '2019-02-12 07:55:22', NULL),
(14, 6, 8, 8, 'small', 1, 0, '2019-02-12 07:55:22', '2019-02-12 07:55:22', NULL),
(15, 7, 20, 25, 'small', 1, 0, '2019-02-13 00:24:45', '2019-02-13 00:24:45', NULL),
(16, 8, 20, 25, 'small', 1, 0, '2019-02-13 00:24:50', '2019-02-13 00:24:50', NULL),
(17, 9, 20, 25, 'small', 1, 0, '2019-02-13 00:34:03', '2019-02-13 00:34:03', NULL),
(18, 10, 20, 25, 'small', 1, 0, '2019-02-13 00:59:28', '2019-02-13 00:59:28', NULL),
(19, 11, 17, 19, 'small', 1, 0, '2019-02-12 16:30:08', '2019-02-12 16:30:08', NULL),
(20, 11, 19, 23, 'small', 1, 0, '2019-02-12 16:30:08', '2019-02-12 16:30:08', NULL),
(21, 11, 22, 28, 'small', 1, 0, '2019-02-12 16:30:08', '2019-02-12 16:30:08', NULL),
(22, 11, 1, 1, 'small', 1, 0, '2019-02-12 16:30:08', '2019-02-12 16:30:08', NULL);

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
  `delivery_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `image_serialize`, `barcode`, `name`, `description`, `sizes`, `category_id`, `gender_id`, `price`, `stock`, `used_stock`, `delivery_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'skin_1549932867.png', NULL, '201902121', 'Summer Surf', 'Blue Summer Surf', 'extra small,small,medium,large', 6, 17, '1680.00', 34, 0, '350.00', '2019-02-12 15:54:27', '2019-02-12 16:30:08', NULL),
(2, 'skin_1549932999.png', NULL, '201902122', 'Pine Summer', 'Summer Attire', 'extra small,small,medium,large', 6, 17, '1512.00', 12, 0, '350.00', '2019-02-12 15:56:39', '2019-02-12 15:56:39', NULL),
(3, 'skin_1549933108.png', NULL, '201902123', 'Tie Dye Polo', 'Tie Dye Polo Shirt', 'extra small,small,medium,large', 6, 17, '952.00', 12, 0, '350.00', '2019-02-12 15:58:28', '2019-02-12 15:58:28', NULL),
(4, 'skin_1549933182.png', NULL, '201902124', 'Sean Swan', 'Poloshirt', 'extra small,small,medium,large', 6, 17, '1680.00', 12, 0, '350.00', '2019-02-12 15:59:42', '2019-02-12 15:59:42', NULL),
(5, 'skin_1549933450.png', NULL, '201902125', 'Bench Blue Polo', 'Bench Blue Polo', 'extra small,small,medium,large,extra large', 6, 17, '840.00', 12, 0, '500.00', '2019-02-12 16:04:10', '2019-02-12 16:04:10', NULL),
(6, 'skin_1549933632.png', NULL, '201902126', 'Hilfiger Polo', 'Hilfiger Polo Shirt', 'extra small,small,medium,large,extra large', 6, 17, '672.00', 40, 0, '350.00', '2019-02-12 16:07:12', '2019-02-12 16:07:12', NULL),
(7, 'skin_1549933763.png', NULL, '201902127', 'Martin Racing Polo', 'Martin Racing Polo Shirt', 'extra small,small,medium,large,extra large', 6, 17, '840.00', 45, 0, '350.00', '2019-02-12 16:09:23', '2019-02-12 16:09:23', NULL),
(8, 'skin_1549934033.png', NULL, '201902128', 'Blackstone Polo', 'Blackstone Polo Shirt', 'extra small,small,medium,large,extra large', 6, 17, '616.00', 45, 0, '350.00', '2019-02-12 16:13:53', '2019-02-12 16:13:53', NULL),
(9, 'skin_1549934150.png', NULL, '201902129', 'Gucci Polo', 'Gucci Polo Shirt', 'extra small,small,medium,large,extra large', 6, 17, '2072.00', 30, 0, '350.00', '2019-02-12 16:15:50', '2019-02-12 16:15:50', NULL),
(10, 'skin_1549934394.png', NULL, '2019021210', 'Porsche Polo', 'Porche Polo Shirt', 'extra small,small,medium,large,extra large', 6, 17, '952.00', 25, 0, '350.00', '2019-02-12 16:19:54', '2019-02-13 01:02:13', NULL),
(11, 'skin_1549934819.png', NULL, '2019021211', 'Dolce Gabbana', 'Dolce Gabbana T-shirt', 'extra small,small,medium,large,extra large', 8, 17, '560.00', 50, 0, '350.00', '2019-02-12 16:27:01', '2019-02-12 16:27:01', NULL),
(12, 'skin_1549934958.png', NULL, '2019021212', 'Erdem X H&M', 'Erdem X H&M T-shirt', 'extra small,small,medium,large,extra large', 8, 17, '1006.88', 35, 0, '350.00', '2019-02-12 16:29:18', '2019-02-12 16:29:18', NULL),
(13, 'skin_1549935046.jpg', NULL, '2019021213', 'Bird Print Patterned', 'Bird Print Patterned T-shirt', 'extra small,small,medium,large,extra large', 8, 17, '558.88', 40, 0, '350.00', '2019-02-12 16:30:46', '2019-02-12 16:30:46', NULL),
(14, 'skin_1549935152.png', NULL, '2019021214', 'Smoke Blue', 'Smoke Blue T-Shirt', 'extra small,small,medium,large,extra large', 8, 17, '896.00', 30, 0, '350.00', '2019-02-12 16:32:32', '2019-02-12 16:32:32', NULL),
(15, 'skin_1549935236.png', NULL, '2019021215', 'Lysts Patterned T-shirt', 'Lysts Patterned T-shirt', 'extra small,small,medium,large,extra large', 6, 17, '894.88', 45, 0, '350.00', '2019-02-12 16:33:58', '2019-02-12 17:54:32', '2019-02-12 17:54:32'),
(16, 'skin_1549947837.png', NULL, '2019021215', 'Byou Cougar', 'Jacket', 'extra small,small,medium,large', 5, 17, '1344.00', 22, 0, '350.00', '2019-02-12 20:03:57', '2019-02-12 22:13:41', NULL),
(17, 'skin_1549948045.png', NULL, '2019021217', 'Chicago Bulls Hoodie', 'Chicago Bulls Hoodie', 'extra small,small,medium,large', 5, 17, '1512.00', 23, 0, '350.00', '2019-02-12 20:07:25', '2019-02-12 16:30:08', NULL),
(18, 'skin_1549948274.png', NULL, '2019021218', 'Varsity Jacket', 'Varsity Jacket', 'extra small,small,medium,large', 5, 17, '1344.00', 24, 0, '350.00', '2019-02-12 20:11:14', '2019-02-13 00:29:17', NULL),
(19, 'skin_1549949965.png', NULL, '2019021219', 'Chinese Sleeve', 'Chinese Sleeve', 'extra small,small,medium,large,extra large', 10, 17, '896.00', 33, 0, '350.00', '2019-02-12 20:39:25', '2019-02-12 16:30:08', NULL),
(20, 'skin_1549950175.jpg', NULL, '2019021220', 'Chingchong Formal', 'Chingchong Formal', 'extra small,small,medium,large,extra large', 10, 17, '896.00', 32, -1, '350.00', '2019-02-12 20:42:55', '2019-02-13 01:06:36', NULL),
(21, 'skin_1549950556.jpg', NULL, '2019021221', 'Christmas Sleeve', 'Christmas Sleeve', 'extra small,small,medium,large,extra large', 10, 17, '1120.00', 24, 0, '350.00', '2019-02-12 20:49:16', '2019-02-12 20:49:16', NULL),
(22, 'skin_1549950961.jpg', NULL, '2019021222', 'Aqua Splash', 'Aqua Splash', 'extra small,small,medium,large,extra large', 10, 19, '672.00', 23, 0, '350.00', '2019-02-12 20:56:01', '2019-02-12 16:30:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_by_subcategory`
--

CREATE TABLE `product_by_subcategory` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `fbx` text NOT NULL,
  `barcode` varchar(11) DEFAULT NULL,
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
(1, 'skin_1549932867.png', 'Poloshirt 1_1549932867', 'a:14:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.mat\";i:11;s:13:\"skin.mat.meta\";i:12;s:8:\"skin.png\";i:13;s:13:\"skin.png.meta\";}', NULL, 1, 13, 0, 0, '2019-02-12 16:15:53', '2019-02-12 16:15:53', '0000-00-00 00:00:00'),
(2, 'skin_1549932999.png', 'Poloshirt 2_1549932999', 'a:14:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.mat\";i:11;s:13:\"skin.mat.meta\";i:12;s:8:\"skin.png\";i:13;s:13:\"skin.png.meta\";}', NULL, 2, 16, 12, 0, '2019-02-12 15:56:40', '2019-02-12 15:56:40', '0000-00-00 00:00:00'),
(3, 'skin_1549933108.png', 'Poloshirt 3_1549933108', 'a:14:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.mat\";i:11;s:13:\"skin.mat.meta\";i:12;s:8:\"skin.png\";i:13;s:13:\"skin.png.meta\";}', NULL, 3, 11, 12, 0, '2019-02-12 15:58:30', '2019-02-12 15:58:30', '0000-00-00 00:00:00'),
(4, 'skin_1549933182.png', 'Poloshirt 4_1549933182', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:8:\"skin.mat\";i:9;s:13:\"skin.mat.meta\";i:10;s:8:\"skin.png\";i:11;s:13:\"skin.png.meta\";}', NULL, 4, 11, 12, 0, '2019-02-12 15:59:44', '2019-02-12 15:59:44', '0000-00-00 00:00:00'),
(5, 'skin_1549933450.png', 'Poloshirt 5_1549933450', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.png\";i:11;s:13:\"skin.png.meta\";}', NULL, 5, 13, 12, 0, '2019-02-12 16:04:10', '2019-02-12 16:04:10', '0000-00-00 00:00:00'),
(6, 'skin_1549933632.png', 'Poloshirt 6_1549933632', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.png\";i:11;s:13:\"skin.png.meta\";}', NULL, 6, 11, 40, 0, '2019-02-12 16:07:16', '2019-02-12 16:07:16', '0000-00-00 00:00:00'),
(7, 'skin_1549933763.png', 'Poloshirt 7_1549933763', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.png\";i:11;s:13:\"skin.png.meta\";}', NULL, 7, 11, 45, 0, '2019-02-12 16:09:27', '2019-02-12 16:09:27', '0000-00-00 00:00:00'),
(8, 'skin_1549934033.png', 'Poloshirt 8_1549934033', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.png\";i:11;s:13:\"skin.png.meta\";}', NULL, 8, 11, 45, 0, '2019-02-12 16:13:57', '2019-02-12 16:13:57', '0000-00-00 00:00:00'),
(9, 'skin_1549934150.png', 'Poloshirt 9_1549934150', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.png\";i:11;s:13:\"skin.png.meta\";}', NULL, 9, 11, 30, 0, '2019-02-12 16:15:57', '2019-02-12 16:15:57', '0000-00-00 00:00:00'),
(10, 'skin_1549934394.png', 'Poloshirt 10_1549934394', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:18:\"Material/skins.mat\";i:2;s:23:\"Material/skins.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:13:\"Poloshirt.fbx\";i:9;s:18:\"Poloshirt.fbx.meta\";i:10;s:8:\"skin.png\";i:11;s:13:\"skin.png.meta\";}', NULL, 10, 11, 25, 0, '2019-02-12 16:19:56', '2019-02-12 16:19:56', '0000-00-00 00:00:00'),
(11, 'skin_1549934821.png', 'Tshirt 1_1549934821', 'a:10:{i:0;s:9:\"Black.jpg\";i:1;s:14:\"Black.jpg.meta\";i:2;s:13:\"Material.meta\";i:3;s:17:\"Material/Skin.mat\";i:4;s:22:\"Material/Skin.mat.meta\";i:5;s:9:\"model.fbx\";i:6;s:14:\"model.fbx.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";i:9;s:12:\"Tshirt 2.zip\";}', NULL, 11, 11, 52, 0, '2019-02-12 15:28:07', '2019-02-12 15:28:07', '0000-00-00 00:00:00'),
(12, 'skin_1549934958.png', 'Tshirt 2_1549934958', 'a:12:{i:0;s:13:\"Material.meta\";i:1;s:17:\"Material/Skin.mat\";i:2;s:22:\"Material/Skin.mat.meta\";i:3;s:14:\"Materials.meta\";i:4;s:22:\"Materials/Material.mat\";i:5;s:27:\"Materials/Material.mat.meta\";i:6;s:9:\"model.fbx\";i:7;s:14:\"model.fbx.meta\";i:8;s:8:\"skin.png\";i:9;s:13:\"skin.png.meta\";i:10;s:10:\"Tshirt.fbx\";i:11;s:15:\"Tshirt.fbx.meta\";}', NULL, 12, 21, 35, 0, '2019-02-12 16:29:20', '2019-02-12 16:29:20', '0000-00-00 00:00:00'),
(13, 'skin_1549935046.jpg', 'Tshirt 3_1549935046', 'a:11:{i:0;s:14:\"Materials.meta\";i:1;s:22:\"Materials/Material.mat\";i:2;s:27:\"Materials/Material.mat.meta\";i:3;s:9:\"model.fbx\";i:4;s:14:\"model.fbx.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.mat\";i:8;s:13:\"skin.mat.meta\";i:9;s:10:\"Tshirt.fbx\";i:10;s:15:\"Tshirt.fbx.meta\";}', NULL, 13, 14, 40, 0, '2019-02-12 16:30:48', '2019-02-12 16:30:48', '0000-00-00 00:00:00'),
(14, 'skin_1549935152.png', 'Tshirt 4_1549935152', 'a:11:{i:0;s:14:\"Materials.meta\";i:1;s:22:\"Materials/Material.mat\";i:2;s:27:\"Materials/Material.mat.meta\";i:3;s:9:\"model.fbx\";i:4;s:14:\"model.fbx.meta\";i:5;s:8:\"skin.mat\";i:6;s:13:\"skin.mat.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";i:9;s:10:\"Tshirt.fbx\";i:10;s:15:\"Tshirt.fbx.meta\";}', NULL, 14, 13, 30, 0, '2019-02-12 16:32:36', '2019-02-12 16:32:36', '0000-00-00 00:00:00'),
(15, 'skin_1549935238.png', 'Tshirt 5_1549935238', 'a:11:{i:0;s:14:\"Materials.meta\";i:1;s:22:\"Materials/Material.mat\";i:2;s:27:\"Materials/Material.mat.meta\";i:3;s:9:\"model.fbx\";i:4;s:14:\"model.fbx.meta\";i:5;s:8:\"skin.mat\";i:6;s:13:\"skin.mat.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";i:9;s:10:\"Tshirt.fbx\";i:10;s:15:\"Tshirt.fbx.meta\";}', NULL, 15, 11, 45, 0, '2019-02-12 16:34:02', '2019-02-12 16:34:02', '0000-00-00 00:00:00'),
(16, 'skin_1549947837.png', 'Jacket1 blue_1549947837', 'a:9:{i:0;s:10:\"Jacket.fbx\";i:1;s:15:\"Jacket.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 16, 13, 12, 0, '2019-02-12 20:03:57', '2019-02-12 20:03:57', '0000-00-00 00:00:00'),
(17, 'skin_1549947837.jpg', 'JAcket1 red_1549947837', 'a:9:{i:0;s:10:\"Jacket.fbx\";i:1;s:15:\"Jacket.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 16, 15, 12, 0, '2019-02-12 20:04:01', '2019-02-12 20:04:01', '0000-00-00 00:00:00'),
(18, 'skin_1549948045.png', 'JACKET2 BLACK_1549948045', 'a:9:{i:0;s:10:\"Jacket.fbx\";i:1;s:15:\"Jacket.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 17, 11, 12, 0, '2019-02-12 15:43:48', '2019-02-12 15:43:48', '0000-00-00 00:00:00'),
(19, 'skin_1549948048.png', 'JACKET2 BLUE_1549948048', 'a:9:{i:0;s:10:\"Jacket.fbx\";i:1;s:15:\"Jacket.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 17, 13, 11, 0, '2019-02-12 15:28:47', '2019-02-12 15:28:47', '0000-00-00 00:00:00'),
(20, 'skin_1549948274.png', 'Jacket_1549948274', 'a:9:{i:0;s:10:\"Jacket.fbx\";i:1;s:15:\"Jacket.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 18, 13, 12, 0, '2019-02-12 20:11:14', '2019-02-12 20:11:14', '0000-00-00 00:00:00'),
(21, 'skin_1549948274.png', 'Material_1549948274', 'a:9:{i:0;s:10:\"Jacket.fbx\";i:1;s:15:\"Jacket.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 18, 15, 12, 0, '2019-02-12 20:11:17', '2019-02-12 20:11:17', '0000-00-00 00:00:00'),
(22, 'skin_1549949965.png', 'skin_1549949965', 'a:11:{i:0;s:14:\"Longsleeve.fbx\";i:1;s:19:\"Longsleeve.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:10:\"ps9F4B.tmp\";i:6;s:10:\"psD8DE.tmp\";i:7;s:8:\"skin.jpg\";i:8;s:13:\"skin.jpg.meta\";i:9;s:8:\"skin.png\";i:10;s:13:\"skin.png.meta\";}', NULL, 19, 13, 12, 0, '2019-02-12 20:39:25', '2019-02-12 20:39:25', '0000-00-00 00:00:00'),
(23, 'skin_1549949965.png', 'Longsleeve', 'a:9:{i:0;s:14:\"Longsleeve.fbx\";i:1;s:19:\"Longsleeve.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 19, 14, 12, 0, '2019-02-12 20:39:29', '2019-02-12 20:39:29', '0000-00-00 00:00:00'),
(24, 'skin_1549949969.png', 'Material_1549949969', 'a:9:{i:0;s:14:\"Longsleeve.fbx\";i:1;s:19:\"Longsleeve.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 19, 16, 11, 0, '2019-02-12 15:36:18', '2019-02-12 15:36:18', '0000-00-00 00:00:00'),
(25, 'skin_1549950175.jpg', 'Material_1549950175', 'a:9:{i:0;s:14:\"Longsleeve.fbx\";i:1;s:19:\"Longsleeve.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 20, 11, 30, 2, '2019-02-12 15:33:26', '2019-02-12 15:33:26', '0000-00-00 00:00:00'),
(26, 'skin_1549950556.jpg', 'skin_1549950556', 'a:9:{i:0;s:14:\"Longsleeve.fbx\";i:1;s:19:\"Longsleeve.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 21, 15, 12, 0, '2019-02-12 20:49:29', '2019-02-12 20:49:29', '0000-00-00 00:00:00'),
(27, 'skin_1549950570.jpg', 'skin', 'a:9:{i:0;s:14:\"Longsleeve.fbx\";i:1;s:19:\"Longsleeve.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 21, 22, 12, 0, '2019-02-12 20:49:43', '2019-02-12 20:49:43', '0000-00-00 00:00:00'),
(28, 'skin_1549950961.jpg', 'Longsleeve', 'a:9:{i:0;s:14:\"Longsleeve.fbx\";i:1;s:19:\"Longsleeve.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 22, 13, 11, 0, '2019-02-12 16:15:28', '2019-02-12 16:15:28', '0000-00-00 00:00:00'),
(29, 'skin_1549950999.jpg', 'Material_1549951005', 'a:9:{i:0;s:14:\"Longsleeve.fbx\";i:1;s:19:\"Longsleeve.fbx.meta\";i:2;s:13:\"Material.meta\";i:3;s:21:\"Material/Material.mat\";i:4;s:26:\"Material/Material.mat.meta\";i:5;s:8:\"skin.jpg\";i:6;s:13:\"skin.jpg.meta\";i:7;s:8:\"skin.png\";i:8;s:13:\"skin.png.meta\";}', NULL, 22, 22, 13, 0, '2019-02-12 14:58:12', '2019-02-12 14:58:12', '0000-00-00 00:00:00');

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
-- Table structure for table `qr_codes`
--

CREATE TABLE `qr_codes` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qr_codes`
--

INSERT INTO `qr_codes` (`id`, `code`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'X6CHNKVLWU', '2019-02-12 16:51:26', '2019-02-12 16:51:09', '2019-02-12 16:51:26'),
(2, 'WO1B26DH3N', '2019-02-12 16:54:00', '2019-02-12 16:51:26', '2019-02-12 16:54:00'),
(3, '1O9ON6O2DD', '2019-02-12 16:54:11', '2019-02-12 16:54:00', '2019-02-12 16:54:11'),
(4, '6CS9PJBFHX', '2019-02-12 16:59:00', '2019-02-12 16:54:11', '2019-02-12 16:59:00'),
(5, 'S9NX3WQMAH', '2019-02-12 16:59:12', '2019-02-12 16:59:00', '2019-02-12 16:59:12'),
(6, '8811TPY4NX', '2019-02-12 17:01:50', '2019-02-12 16:59:12', '2019-02-12 17:01:50'),
(7, 'QLLVRO1ZNI', '2019-02-12 17:02:02', '2019-02-12 17:01:50', '2019-02-12 17:02:02'),
(8, 'NSQE125UEU', '2019-02-12 17:04:19', '2019-02-12 17:02:02', '2019-02-12 17:04:19'),
(9, '5QNU4QA1I1', '2019-02-12 17:04:30', '2019-02-12 17:04:19', '2019-02-12 17:04:30'),
(10, '4CIJ4G6MSR', '2019-02-12 17:09:01', '2019-02-12 17:04:30', '2019-02-12 17:09:01'),
(11, 'TGAPH048JQ', '2019-02-12 17:09:12', '2019-02-12 17:09:01', '2019-02-12 17:09:12'),
(12, '8VWXJ0VBKN', '2019-02-12 17:12:24', '2019-02-12 17:09:12', '2019-02-12 17:12:24'),
(13, 'OPVH4ISE20', '2019-02-12 17:12:36', '2019-02-12 17:12:24', '2019-02-12 17:12:36'),
(14, '43HTDSJN0L', '2019-02-12 17:16:49', '2019-02-12 17:12:36', '2019-02-12 17:16:49'),
(15, 'PI4UK0ZVVZ', '2019-02-12 17:17:01', '2019-02-12 17:16:49', '2019-02-12 17:17:01'),
(16, 'D55VNREY9V', '2019-02-12 17:20:09', '2019-02-12 17:17:01', '2019-02-12 17:20:09'),
(17, 'QGTJP8VANR', '2019-02-12 17:20:21', '2019-02-12 17:20:09', '2019-02-12 17:20:21'),
(18, 'MVD55YFCVP', '2019-02-12 17:22:30', '2019-02-12 17:20:21', '2019-02-12 17:22:30'),
(19, 'R657U9SEW7', '2019-02-12 17:22:42', '2019-02-12 17:22:30', '2019-02-12 17:22:42'),
(20, 'S8FS462X6X', '2019-02-12 17:29:52', '2019-02-12 17:22:42', '2019-02-12 17:29:52'),
(21, 'RMNKC82A2F', '2019-02-12 17:30:04', '2019-02-12 17:29:52', '2019-02-12 17:30:04'),
(22, '8HLBKJW35D', '2019-02-12 17:35:14', '2019-02-12 17:30:04', '2019-02-12 17:35:14'),
(23, '2XTI44N8DK', '2019-02-12 17:35:26', '2019-02-12 17:35:14', '2019-02-12 17:35:26'),
(24, 'WYFMBO4Y6L', '2019-02-12 17:40:44', '2019-02-12 17:35:26', '2019-02-12 17:40:44'),
(25, 'GMON78QQRT', '2019-02-12 17:40:56', '2019-02-12 17:40:44', '2019-02-12 17:40:56'),
(26, 'W5I9XG7OTG', '2019-02-12 17:49:12', '2019-02-12 17:40:56', '2019-02-12 17:49:12'),
(27, '58F46N423K', '2019-02-12 17:49:23', '2019-02-12 17:49:12', '2019-02-12 17:49:23'),
(28, 'Z2SL25OWB8', '2019-02-12 17:51:59', '2019-02-12 17:49:23', '2019-02-12 17:51:59'),
(29, 'X3XIU2JVPC', '2019-02-12 17:52:11', '2019-02-12 17:51:59', '2019-02-12 17:52:11'),
(30, 'LTAUZYK39V', '2019-02-12 17:57:44', '2019-02-12 17:52:11', '2019-02-12 17:57:44'),
(31, 'ZD1MI10DW7', '2019-02-12 17:57:55', '2019-02-12 17:57:44', '2019-02-12 17:57:55'),
(32, 'TTSRS01FXK', '2019-02-12 18:00:09', '2019-02-12 17:57:55', '2019-02-12 18:00:09'),
(33, 'Z4QM10KMBM', '2019-02-12 18:00:21', '2019-02-12 18:00:09', '2019-02-12 18:00:21'),
(34, '4LRKJOKJBN', '2019-02-12 18:12:21', '2019-02-12 18:00:21', '2019-02-12 18:12:21'),
(35, 'GLQPI5P8KT', '2019-02-12 18:12:32', '2019-02-12 18:12:21', '2019-02-12 18:12:32'),
(36, 'CM4C96THYO', '2019-02-12 18:15:06', '2019-02-12 18:12:32', '2019-02-12 18:15:06'),
(37, 'K50Q9X5WZX', '2019-02-12 18:15:19', '2019-02-12 18:15:06', '2019-02-12 18:15:19'),
(38, 'CTYKW0WDAE', '2019-02-12 18:17:18', '2019-02-12 18:15:19', '2019-02-12 18:17:18'),
(39, 'VIIELD7R85', '2019-02-12 18:17:38', '2019-02-12 18:17:18', '2019-02-12 18:17:38'),
(40, 'SME2ZTF5KA', '2019-02-12 18:31:24', '2019-02-12 18:17:39', '2019-02-12 18:31:24'),
(41, '63QJGLHIZP', '2019-02-12 18:31:35', '2019-02-12 18:31:24', '2019-02-12 18:31:35'),
(42, 'NNLOY1O0DP', '2019-02-12 18:38:56', '2019-02-12 18:31:35', '2019-02-12 18:38:56'),
(43, 'XMA4ALZ008', '2019-02-12 18:39:08', '2019-02-12 18:38:56', '2019-02-12 18:39:08'),
(44, 'IORAVFXANP', '2019-02-12 18:42:18', '2019-02-12 18:39:08', '2019-02-12 18:42:18'),
(45, 'DN7KSXDCQ4', '2019-02-12 18:42:32', '2019-02-12 18:42:18', '2019-02-12 18:42:32'),
(46, '8SNG5I73B2', '2019-02-12 18:51:13', '2019-02-12 18:42:32', '2019-02-12 18:51:13'),
(47, 'N7EOQ9R7OO', '2019-02-12 18:51:25', '2019-02-12 18:51:13', '2019-02-12 18:51:25'),
(48, 'K3QZSU9PKJ', '2019-02-12 18:54:30', '2019-02-12 18:51:25', '2019-02-12 18:54:30'),
(49, 'GLBGDG7CSN', '2019-02-12 18:54:44', '2019-02-12 18:54:30', '2019-02-12 18:54:44'),
(50, 'QOB4ADFVAL', '2019-02-12 18:54:58', '2019-02-12 18:54:44', '2019-02-12 18:54:58'),
(51, '9500DHX1YQ', '2019-02-12 18:55:11', '2019-02-12 18:54:58', '2019-02-12 18:55:11'),
(52, '64J5QIMSZA', '2019-02-12 19:01:08', '2019-02-12 18:55:11', '2019-02-12 19:01:08'),
(53, 'HBXW0BZST1', '2019-02-12 19:01:27', '2019-02-12 19:01:08', '2019-02-12 19:01:27'),
(54, 'A0QARCA5JR', '2019-02-12 20:11:32', '2019-02-12 19:01:27', '2019-02-12 20:11:32'),
(55, '8EZLRFM5IL', '2019-02-12 20:11:47', '2019-02-12 20:11:32', '2019-02-12 20:11:47'),
(56, 'AXCLLN29WH', '2019-02-12 21:18:09', '2019-02-12 20:11:47', '2019-02-12 21:18:09'),
(57, '2VFE6BODMP', '2019-02-12 23:40:37', '2019-02-12 21:18:09', '2019-02-12 23:40:37'),
(58, 'J3HKAOARVW', '2019-02-13 00:06:39', '2019-02-12 23:40:37', '2019-02-13 00:06:39'),
(59, 'GM2DRDYG76', '2019-02-13 00:06:55', '2019-02-13 00:06:39', '2019-02-13 00:06:55'),
(60, 'V4ERTXMZN7', '2019-02-13 00:07:13', '2019-02-13 00:06:55', '2019-02-13 00:07:13'),
(61, '1Z5W5Y7E7Z', '2019-02-13 00:41:14', '2019-02-13 00:07:13', '2019-02-13 00:41:14'),
(62, '34I66H2IHF', '2019-02-13 00:41:29', '2019-02-13 00:41:14', '2019-02-13 00:41:29'),
(63, 'PM6MWO48KL', '2019-02-13 00:42:15', '2019-02-13 00:41:29', '2019-02-13 00:42:15'),
(64, '2VGNN150DV', '2019-02-13 00:42:30', '2019-02-13 00:42:15', '2019-02-13 00:42:30'),
(65, 'IRT6V4LG7B', '2019-02-13 00:44:38', '2019-02-13 00:42:30', '2019-02-13 00:44:38'),
(66, 'TPLZYHPYIM', '2019-02-13 00:44:52', '2019-02-13 00:44:38', '2019-02-13 00:44:52'),
(67, '8UL8RIW7EQ', '2019-02-13 00:49:55', '2019-02-13 00:44:52', '2019-02-13 00:49:55'),
(68, 'X1PY91D9UQ', '2019-02-13 00:50:09', '2019-02-13 00:49:55', '2019-02-13 00:50:09'),
(69, '331OZEEUYJ', '2019-02-13 00:51:45', '2019-02-13 00:50:09', '2019-02-13 00:51:45'),
(70, 'ZT1QA7U47S', '2019-02-13 00:51:58', '2019-02-13 00:51:45', '2019-02-13 00:51:58'),
(71, 'PA6X726FX8', '2019-02-13 00:52:13', '2019-02-13 00:51:58', '2019-02-13 00:52:13'),
(72, 'F7S1HRGXEV', '2019-02-13 00:52:26', '2019-02-13 00:52:13', '2019-02-13 00:52:26'),
(73, 'LA9ZTMPBXV', '2019-02-13 00:57:31', '2019-02-13 00:52:26', '2019-02-13 00:57:31'),
(74, '2IFAL42228', '2019-02-13 00:57:45', '2019-02-13 00:57:31', '2019-02-13 00:57:45'),
(75, 'XACKKV09NH', '2019-02-13 00:57:58', '2019-02-13 00:57:45', '2019-02-13 00:57:58'),
(76, '7ISINXLWPL', '2019-02-13 00:58:12', '2019-02-13 00:57:58', '2019-02-13 00:58:12'),
(77, 'KVL9NOUKEV', '2019-02-13 00:58:25', '2019-02-13 00:58:12', '2019-02-13 00:58:25'),
(78, 'TZFQIQZO1E', '2019-02-13 00:58:38', '2019-02-13 00:58:25', '2019-02-13 00:58:38'),
(79, 'DK0SFJ27DY', '2019-02-13 00:58:52', '2019-02-13 00:58:38', '2019-02-13 00:58:52'),
(80, 'NO1MAAZS70', '2019-02-13 00:59:06', '2019-02-13 00:58:52', '2019-02-13 00:59:06'),
(81, 'TSGOUS6718', '2019-02-13 00:59:06', '2019-02-13 00:59:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `returned_products`
--

CREATE TABLE `returned_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `buyer_note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
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
(4, 'U', 'C', 'C', NULL, 'ICP', 'icp@gmail.com', '$2y$10$7q.tDakqaFuuIqkubMTLveFbWo9ohd3BCbpA2E1m8gZQP9J4Vxs.W', 'Gtsdu7so9aHcOJ6Smt4f5fBFh97B8kUTsqB4yo8SDnRT633zV932025bFdBC', NULL, '', NULL, 1, 'icp', '2018-07-25 17:27:24', '2018-07-25 17:27:24', NULL),
(5, 'Store', NULL, 'Manager', NULL, 'Manager', 'store_manager@gmail.com', '$2y$10$BvyQam/KHznW3SRNCr9T9uvp0miAi5gd9d2h.f5pTImmVsrbpSsIS', 'mZp8SEJeYvCdtG9c0cO27Lf1fQFrWEgTF4M9E68t5NwfTcV6II7kEK2rLcW5', NULL, '', NULL, 1, 'manager', '2018-07-25 17:43:53', '2018-07-25 17:43:53', NULL),
(6, 'Jr', NULL, 'Roncales', NULL, 'jrroncales', 'jrroncales25@gmail.com', '$2y$10$voTEa.M57OTnP.OyR6frJ.bG81gQSf2RZUMl9Jmrj8435MKMO3Sk2', '2qRyLpbuo92Iu6dei5tcnLxy69hscwaLz34A9ZY5m0cisrgvQSGMpR7J4ez5', '639452538775', 'JSVKTT', 'blk 11 lot 8 north triangle cielito camarin caloocan city', 1, 'user', '2018-07-25 17:59:44', '2019-02-12 21:49:49', NULL),
(62, 'Monkey', 'D', 'Luffy', NULL, 'Cashier001', 'monkey@gmail.com', '$2y$10$naNDpKYb5rYD8jnZ9RX32OLyXeYCftmwGuN084X3/Tb101aPEbkCa', NULL, NULL, NULL, NULL, 1, 'cashier', '2019-02-02 16:12:45', '2019-02-02 16:12:45', NULL),
(63, 'New', NULL, 'Customer', NULL, NULL, 'sample_1549936275@sample.com', '$2y$10$cLm6w8RfEzZX30VjdjSjG.ZIWtUyQbWjS7ai6oSlhami4iX7CWVJW', NULL, NULL, 'OXCUXW', NULL, 1, 'user', '2019-02-12 16:51:15', '2019-02-12 16:51:15', NULL),
(64, 'Jessa', NULL, 'Sarmiento', NULL, NULL, 'jessa@gmail.com', '$2y$10$9kv4h6YL7n/ArOULHhcT1.LA2r04/CEnRqTkIiJHAGcJEWWcxWOvy', NULL, NULL, '0B9RNB', NULL, 1, 'user', '2019-02-12 20:11:36', '2019-02-12 23:47:29', NULL),
(65, 'Joemen', NULL, 'Barrios', NULL, NULL, 'joemen@gmail.com', '$2y$10$PANtEREOt/v5IrOH0ybZW.en4pZLriqjALNReQfDQ.HGCQA8Icid.', NULL, NULL, '6QKL8B', NULL, 1, 'user', '2019-02-13 00:07:10', '2019-02-13 00:10:27', NULL),
(66, 'New', NULL, 'Customer', NULL, NULL, 'sample_1549964480@sample.com', '$2y$10$c/ZlSEuaP9JNrcAx/vDw4emvlzDJyX4VAqnpdjNjCSc.yBPC7e8m.', NULL, NULL, '0B8FUB', NULL, 1, 'user', '2019-02-13 00:41:20', '2019-02-13 00:41:20', NULL),
(67, 'Johanne', NULL, 'Sustiguer', NULL, NULL, 'johanne@gmail.com', '$2y$10$BvyQam/KHznW3SRNCr9T9uvp0miAi5gd9d2h.f5pTImmVsrbpSsIS', NULL, NULL, 'LLT4L5', NULL, 1, 'user', '2019-02-13 00:42:26', '2019-02-13 00:42:26', NULL),
(68, 'New', NULL, 'Customer', NULL, NULL, 'sample_1549964683@sample.com', '$2y$10$6IWdZaZhYy5gMdfjVuzy1OCYkqM./fvhWFWLwRkCbcb4h7Cc2H.pq', NULL, NULL, 'DSLM87', NULL, 1, 'user', '2019-02-13 00:44:43', '2019-02-13 00:44:43', NULL),
(69, 'New', NULL, 'Customer', NULL, NULL, 'sample_1549964998@sample.com', '$2y$10$4YcYvJ7R1eAeViHViqNcMOrD6.OZ53igH0YUymn3sVEhoifIxZmvm', NULL, NULL, 'Z4X3M4', NULL, 1, 'user', '2019-02-13 00:49:59', '2019-02-13 00:49:59', NULL),
(70, 'New', NULL, 'Customer', NULL, NULL, 'sample_1549965536@sample.com', '$2y$10$lBS.eI5ua2I5o9ce8Myyk.FLxF8BFb8GgfDw0cXgIrwqXjSmAD7AO', NULL, NULL, '9XT1A3', NULL, 1, 'user', '2019-02-13 00:58:56', '2019-02-13 00:58:56', NULL);

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
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 67, 17, '2019-02-12 15:28:59', '2019-02-12 15:28:59', '2019-02-12 15:28:59'),
(2, 67, 1, '2019-02-12 15:46:15', '2019-02-12 15:46:15', NULL);

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
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
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
-- Indexes for table `qr_codes`
--
ALTER TABLE `qr_codes`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_trails`
--
ALTER TABLE `log_trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mirror_logs`
--
ALTER TABLE `mirror_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notify_order`
--
ALTER TABLE `notify_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_by_subcategory`
--
ALTER TABLE `product_by_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_codes`
--
ALTER TABLE `qr_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `returned_products`
--
ALTER TABLE `returned_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
