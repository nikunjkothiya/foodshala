-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 05:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=Veg,2=Non-veg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `user_id`, `name`, `description`, `image`, `price`, `food_type`, `created_at`, `updated_at`) VALUES
(7, 14, 'Vadapau', 'It is very healthy and tasteful with mixing of potato and another vegetables.', 'images/1612012752vadapav.jpg', '30', '1', '2021-01-30 07:49:12', '2021-01-30 07:49:12'),
(8, 14, 'Burger', 'A burger is a very tasteful fast-food and is very famous among youngsters.', 'images/1612012837burger.jpg', '80', '1', '2021-01-30 07:50:37', '2021-01-30 07:50:37'),
(9, 15, 'Chicken Dry', 'The chicken, a subspecies of the red junglefowl, is a type of domesticated fowl.', 'images/1612013028chicken.jpg', '300', '2', '2021-01-30 07:53:48', '2021-01-30 07:53:48'),
(10, 15, 'Fish Masala Dry', 'Fish Masala is a dry gravy dish which is very easy to prepare.', 'images/1612013256fishmasala.jpg', '550', '2', '2021-01-30 07:57:36', '2021-01-30 07:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`id`, `user_id`, `food_id`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(9, 16, 8, 14, '2021-01-30 08:07:53', '2021-01-30 08:07:53'),
(10, 16, 7, 14, '2021-01-30 08:07:57', '2021-01-30 08:07:57'),
(11, 17, 8, 14, '2021-01-30 08:09:39', '2021-01-30 08:09:39'),
(12, 17, 9, 15, '2021-01-30 08:09:44', '2021-01-30 08:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_28_181026_create_foods_table', 1),
(5, '2021_01_28_181525_create_food_order_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=Customers,2=Restaurants',
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_type` enum('1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=Veg,2=Non-veg,3=Both',
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `address`, `mobile`, `email`, `open_time`, `close_time`, `password`, `food_type`, `is_active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'Jay Ambe Vadapau Center', '2', 'Manek Chowk, Nr. Sultan Cross Road, Bareli-325623.', 1234567890, 'jayambevadapau@restaurant.com', '02:00 AM', '09:30 AM', '$2y$10$Pk6l99qGG4KtBRWJizQjnOSJ.pnu0v89dP7VbR2Ifq5I5q/zOsn5u', '1', 1, NULL, NULL, '2021-01-30 07:46:57', '2021-01-30 07:46:57'),
(15, 'Salman Ali Restaurant', '2', 'Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016', 9876543210, 'salman@restaurant.com', '09:30 AM', '07:00 PM', '$2y$10$6AGVgomKdYLDrr4bHyv1Xu86szk8w5pQEDSODqq5CJ3toJ.BjKYeK', '2', 1, NULL, NULL, '2021-01-30 07:52:49', '2021-01-30 07:52:49'),
(16, 'Nikunj Kothiya', '1', 'Vikram Park, Nr. Madhav Mall , T.B.Nagar Road- Ahmedabad-238052.', 7894561230, 'nikunj@customer.com', NULL, NULL, '$2y$10$0nYcr/SI76Cgl0Gc1yNHAuQP/SYvFhPhQqSzbslirUfw8agxySlaq', '1', 1, NULL, NULL, '2021-01-30 08:00:00', '2021-01-30 08:00:00'),
(17, 'Gauranv Patel', '1', 'SANSKAR TENAMENT, NR.SUKAN BUNGLOWS,NIKOL-256310.', 1254638596, 'gaurav@customer.com', NULL, NULL, '$2y$10$1zm8SenModnZUBgGYj.3t.Eo3DGImdqzui/jMeUymyMtnlYiM5A7C', '3', 1, NULL, NULL, '2021-01-30 08:09:25', '2021-01-30 08:09:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foods_user_id_foreign` (`user_id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_order_user_id_foreign` (`user_id`),
  ADD KEY `food_order_food_id_foreign` (`food_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `food_order`
--
ALTER TABLE `food_order`
  ADD CONSTRAINT `food_order_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`),
  ADD CONSTRAINT `food_order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
