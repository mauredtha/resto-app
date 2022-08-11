-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2022 at 11:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
('8c02ec40-aec9-47f6-8ccf-8f374a139693', 'Food', '2022-08-05 08:38:55', '2022-08-05 08:47:41'),
('bb8311eb-f7ff-42d2-9147-c51a2a991405', 'Beverages', '2022-08-05 08:27:53', '2022-08-05 08:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` char(36) NOT NULL,
  `category_id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `pict` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `name`, `description`, `pict`, `price`, `status`, `created_at`, `updated_at`) VALUES
('69354826-3243-4d68-8079-e095e2838941', 'bb8311eb-f7ff-42d2-9147-c51a2a991405', 'Dark Mocha Frappucino', 'Moca dengan campuran dark coklat dan sirup vanilla yang nikmat', '20220809082241_Screen Shot 2022-08-02 at 12.03.46.png', 20000, 'on', '2022-08-09 08:22:41', '2022-08-09 08:22:41'),
('9eeb7157-35bd-4147-90b4-b3d2cd6dacc5', '8c02ec40-aec9-47f6-8ccf-8f374a139693', 'Bakso Halus', 'Daging sapi pilihan dengan kaldu murni yang lezat dengan sayur dan mie', '20220809092107_Group 7.png', 18000, 'on', '2022-08-09 07:57:39', '2022-08-09 09:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `payment_type` varchar(15) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `generate_qr` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` char(36) NOT NULL,
  `payment_id` char(36) NOT NULL,
  `menu_id` char(36) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`, `updated_at`, `email`, `phone`) VALUES
('ae3a0f70-47f0-402a-9350-f8668d80f933', 'Benaya Xavier Hardjokusumo', 'xavier', '$2y$10$aOmpVmRuJHRKy7DykXaLD.HFldB7RykvX7PSW/GwLigmciVumWFny', 'KASIR', '2022-08-11 06:33:36', '2022-08-11 07:31:47', 'xavier@flexy.com', '083725326273'),
('e9e71692-c261-41b7-bb84-820b155d5dcc', 'Superadmin', 'admin', '$2y$10$Hr1tCAP0pks/4ZOizcB1i.0fVtBVQW3xr0UJdBiD3m4cPruqMjpc6', 'ADMIN', '2022-08-11 04:59:54', '2022-08-11 04:59:54', 'admin@admin.com', '081234567891');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
