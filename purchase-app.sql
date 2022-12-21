-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 08:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_12_19_115851_create_zones_table', 1),
(10, '2022_12_19_130713_create_regions_table', 1),
(11, '2022_12_19_140552_create_territorys_table', 1),
(12, '2022_12_19_161251_add_new_fields_to_users_table', 1),
(14, '2022_12_19_183606_create_products_table', 2),
(17, '2022_12_20_055351_create_purchase_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku_code` varchar(255) NOT NULL,
  `sku_name` varchar(255) NOT NULL,
  `mrp` int(11) NOT NULL,
  `distributor_price` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku_code`, `sku_name`, `mrp`, `distributor_price`, `volume`, `created_at`, `updated_at`, `unit`) VALUES
(1, 'FWC 001', 'ABC 100ML', 100, 100, 50, '2022-12-19 13:41:42', '2022-12-19 13:41:42', ''),
(3, 'CBC 001', 'CBR100ML', 50, 50, 10, '2022-12-19 23:53:58', '2022-12-19 23:53:58', 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `territory` varchar(255) NOT NULL,
  `distributor` varchar(255) NOT NULL,
  `sku_code` varchar(255) NOT NULL,
  `sku_name` varchar(255) NOT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `zone`, `region`, `territory`, `distributor`, `sku_code`, `sku_name`, `unit_price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'ZONE 1', 'REGION 1', 'TERRITORY 1', 'John Smith', 'CBC 001, FWC 001', 'CBR100ML, ABC 100ML', '50, 100', '1, 1', '50, 100', '2022-12-20 08:40:51', '2022-12-20 08:40:51'),
(2, 'ZONE 1', 'REGION 1', 'TERRITORY 1', 'John Smith', 'CBC 001, FWC 001', 'CBR100ML, ABC 100ML', '50, 100', '2, 3', '100, 300', '2022-12-20 08:41:25', '2022-12-20 08:41:25'),
(3, 'ZONE 1', 'REGION 1', 'TERRITORY 1', 'John Smith', 'CBC 001, FWC 001', 'CBR100ML, ABC 100ML', '50, 100', '1, 4', '50, 400', '2022-12-20 08:44:03', '2022-12-20 08:44:03'),
(4, 'ZONE 1', 'REGION 1', 'TERRITORY 1', 'John Smith', 'CBC 001, FWC 001', 'CBR100ML, ABC 100ML', '50, 100', '1, 2', '50, 200', '2022-12-20 08:50:43', '2022-12-20 08:50:43'),
(5, 'ZONE 1', 'REGION 1', 'TERRITORY 1', 'John Smith', 'CBC 001, FWC 001', 'CBR100ML, ABC 100ML', '50, 100', '1, 2', '50, 200', '2022-12-20 08:51:50', '2022-12-20 08:51:50'),
(6, 'ZONE 1', 'REGION 1', 'TERRITORY 1', 'John Smith', 'CBC 001, FWC 001', 'CBR100ML, ABC 100ML', '50, 100', '5, 0', '250, 0', '2022-12-20 08:52:29', '2022-12-20 08:52:29'),
(7, 'ZONE 1', 'REGION 1', 'TERRITORY 1', 'John Smith', 'CBC 001, FWC 001', 'CBR100ML, ABC 100ML', '50, 100', '2, 4', '100, 400', '2022-12-20 08:53:54', '2022-12-20 08:53:54'),
(8, 'ZONE 1', 'REGION 1', 'TERRITORY 1', 'John Smith', 'CBC 001, FWC 001', 'CBR100ML, ABC 100ML', '50, 100', '2, 3', '100, 300', '2022-12-20 08:54:11', '2022-12-20 08:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(255) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `zone`, `region_name`, `created_at`, `updated_at`) VALUES
(1, 'ZONE 1', 'REGION 1', '2022-12-19 12:23:21', '2022-12-19 12:23:21'),
(2, 'ZONE 1', 'REGION 2', '2022-12-19 12:23:30', '2022-12-19 12:23:30'),
(3, 'ZONE 2', 'REGION 3', '2022-12-19 12:23:41', '2022-12-19 12:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `territories`
--

CREATE TABLE `territories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `territory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `territories`
--

INSERT INTO `territories` (`id`, `zone`, `region`, `territory_name`, `created_at`, `updated_at`) VALUES
(1, 'ZONE 1', 'REGION 1', 'TERRITORY 1', '2022-12-19 12:26:25', '2022-12-19 12:26:25'),
(2, 'ZONE 1', 'REGION 2', 'TERRITORY 2', '2022-12-19 12:26:47', '2022-12-19 12:26:47'),
(3, 'ZONE 2', 'REGION 3', 'TERRITORY 3', '2022-12-19 12:27:02', '2022-12-19 12:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('Admin','User') NOT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `territory` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `nic`, `address`, `mobile`, `gender`, `territory`, `username`) VALUES
(1, 'Dimuthu Darshana', 'admin@gmail.com', NULL, '$2y$10$gMiyZ6phP7fPtGECVsbXTuhqUYx/MVhT28Z.8D82Dcfme6Epvl6ka', NULL, '2022-12-19 12:22:10', '2022-12-19 12:22:10', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'John Smith', 'johnsmith@gmail.com', NULL, '$2y$10$c6aXdO9QfEoAzVHwpLFa6.ZOzJ8t.mrfGVRfp6BViHH2DS7hLKomq', NULL, '2022-12-19 12:46:43', '2022-12-19 12:46:43', 'User', '874523658v', 'No.352, Backstreet road, New York, USA', '+9122685435', 'male', 'TERRITORY 1', 'johnsmith');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_long_desc` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zone_long_desc`, `short_desc`, `created_at`, `updated_at`) VALUES
(1, 'ZONE 1', 'ZO1', '2022-12-19 12:22:38', '2022-12-19 12:22:38'),
(2, 'ZONE 2', 'ZO2', '2022-12-19 12:22:50', '2022-12-19 12:22:50'),
(3, 'ZONE 3', 'ZO3', '2022-12-19 12:23:01', '2022-12-19 12:23:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `territories`
--
ALTER TABLE `territories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zones_short_desc_unique` (`short_desc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `territories`
--
ALTER TABLE `territories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
