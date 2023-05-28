-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2023 at 07:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sre`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'India',
  `state` varchar(255) NOT NULL,
  `state_code` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `country`, `state`, `state_code`, `status`, `created_at`) VALUES
(1, 'India', 'Jammu And Kashmir', 1, 1, '2023-05-23 18:06:38'),
(2, 'India', 'Himachal Pradesh', 2, 1, '2023-05-23 18:07:53'),
(3, 'India', 'Punjab', 3, 1, '2023-05-23 18:08:36'),
(4, 'India', 'Chandigarh', 4, 1, '2023-05-23 18:08:59'),
(5, 'India', 'Uttarakhand', 5, 1, '2023-05-23 18:09:26'),
(6, 'India', 'Haryana', 6, 1, '2023-05-23 18:09:41'),
(7, 'India', 'Delhi', 7, 1, '2023-05-23 18:10:02'),
(8, 'India', 'Rajasthan', 8, 1, '2023-05-23 18:10:28'),
(9, 'India', 'Uttar Pradesh', 9, 1, '2023-05-23 18:13:24'),
(10, 'India', 'Bihar', 10, 1, '2023-05-23 18:13:56'),
(11, 'India', 'Sikkim', 11, 1, '2023-05-23 18:14:09'),
(12, 'India', 'Arunachal Pradesh', 12, 1, '2023-05-23 18:14:40'),
(13, 'India', 'Nagaland', 13, 1, '2023-05-23 18:14:50'),
(14, 'India', 'Manipur', 14, 1, '2023-05-23 18:15:11'),
(15, 'India', 'Mizoram', 15, 1, '2023-05-23 18:15:26'),
(16, 'India', 'Tripura', 16, 1, '2023-05-23 18:15:47'),
(17, 'India', 'Meghalaya', 17, 1, '2023-05-23 18:16:05'),
(18, 'India', 'Assam', 18, 1, '2023-05-23 18:16:19'),
(19, 'India', 'West Bengal', 19, 1, '2023-05-23 18:16:42'),
(20, 'India', 'Jharkhand', 20, 1, '2023-05-23 18:17:02'),
(21, 'India', 'Orissa', 21, 1, '2023-05-23 18:17:35'),
(22, 'India', 'Chhattisgarh', 22, 1, '2023-05-23 18:17:58'),
(23, 'India', 'Madhya Pradesh', 23, 1, '2023-05-23 18:18:16'),
(24, 'India', 'Gujarat', 24, 1, '2023-05-23 18:18:36'),
(25, 'India', 'Daman And Diu', 25, 1, '2023-05-23 18:19:05'),
(26, 'India', 'Dadra And Nagar Haveli', 26, 1, '2023-05-23 18:19:43'),
(27, 'India', 'Maharastra', 27, 1, '2023-05-23 18:20:03'),
(29, 'India', 'Karnataka', 29, 1, '2023-05-23 18:20:36'),
(30, 'India', 'Goa', 30, 1, '2023-05-23 18:20:48'),
(31, 'India', 'Lakshadweep', 31, 1, '2023-05-23 18:21:16'),
(32, 'India', 'Kerala', 32, 1, '2023-05-23 18:21:27'),
(33, 'India', 'Tamil Nadu', 33, 1, '2023-05-23 18:21:46'),
(34, 'India', 'Puducherry', 34, 1, '2023-05-23 18:22:16'),
(35, 'India', 'Andaman And Nicobar', 35, 1, '2023-05-23 18:22:47'),
(36, 'India', 'Telangana', 36, 1, '2023-05-23 18:23:19'),
(37, 'India', 'Andhra Pradesh', 37, 1, '2023-05-23 18:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `username`, `password`, `status`, `created_at`) VALUES
(1, 'Prabhat Gupta', 'prabhat', 'prabhat', 1, '2023-05-07 23:52:49'),
(2, 'Laxman Mourya', 'laxman', 'laxman', 1, '2023-05-07 23:53:11'),
(3, 'Sonu Roy', 'sonu', 'sonu', 1, '2023-05-07 23:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `company`, `brand`, `status`, `created_at`) VALUES
(1, 'Crazze', 'Berry Silk', 1, '2023-05-22 23:02:39'),
(2, 'q', 'qq', 1, '2023-05-22 23:49:13'),
(3, '12', '123', 1, '2023-05-25 17:43:09'),
(4, '1222', '12222', 1, '2023-05-25 18:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `rate` float NOT NULL,
  `hsn_code` varchar(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `mrp`, `rate`, `hsn_code`, `status`, `created_at`) VALUES
(2, 'Berry Silk M10', 'Berry Silk', 10, 7.5, '1212121', 1, '2023-05-19 12:49:26'),
(3, 'Pravin Gupta', 'Berry Silk', 34, 34, '1212121', 1, '2023-05-22 23:41:48'),
(4, 'new', 'qq', 12, 12, '12', 1, '2023-05-22 23:48:58'),
(5, 'fsf', 'qq', 354, 345, '3453', 1, '2023-05-22 23:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `person` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `gstno` varchar(20) NOT NULL,
  `panno` varchar(255) NOT NULL,
  `retailer_type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `name`, `phone`, `person`, `address1`, `address2`, `city`, `pincode`, `state`, `country`, `route`, `gstno`, `panno`, `retailer_type`, `status`, `created_at`) VALUES
(1, 'Mahadev Medical', 8691885209, 'Pravin Bhai', 'Indralok Naka', 'Near Indralok Medical', 'Bhayander East', 401105, 'Maharastra', 'India', 'Indralok', '', '', 'Chemist', 1, '2023-05-19 15:07:22'),
(2, 'Pravin Gupta', 9999999998, '', 'fdg', '', '234', 3424, 'Maharastra', 'India', 'Sai Baba Nagar', '', '', 'General Store', 1, '2023-05-23 00:13:37'),
(3, 'fg', 5654646546, '', '546', '', '546', 546, 'Maharastra', 'India', 'Indralok', '', '', 'General Store', 1, '2023-05-23 18:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Sai Baba Nagar', 1, '2023-05-19 14:40:26'),
(2, 'Indralok', 1, '2023-05-22 23:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `cgst` int(11) NOT NULL,
  `sgst` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `cgst`, `sgst`, `status`, `created_at`) VALUES
(1, 9, 9, 1, '2023-05-19 14:23:31'),
(2, 1, 1, 1, '2023-05-23 02:52:23'),
(3, 2, 2, 1, '2023-05-23 02:53:12'),
(4, 5, 5, 1, '2023-05-23 02:53:56'),
(5, 7, 7, 1, '2023-05-23 02:56:50'),
(6, 12, 12, 1, '2023-05-23 03:00:45'),
(7, 32, 23, 1, '2023-05-23 03:01:33'),
(8, 23, 34, 1, '2023-05-23 03:04:42'),
(9, 21, 121, 1, '2023-05-23 03:05:24'),
(10, 34, 34, 1, '2023-05-23 03:06:51'),
(11, 56, 56, 1, '2023-05-23 03:07:47'),
(12, 5656, 56, 1, '2023-05-23 03:13:12'),
(13, 657, 657, 1, '2023-05-23 03:17:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
