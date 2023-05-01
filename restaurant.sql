-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 01:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sea Food', '2023-03-05 06:02:45', '2023-03-06 02:09:36'),
(2, 'Sandwiches', '2023-03-05 23:13:06', '2023-03-05 23:13:06'),
(3, 'Pizza', '2023-03-05 23:21:27', '2023-03-05 23:21:27'),
(4, 'Entrees', '2023-03-05 23:37:57', '2023-03-05 23:37:57'),
(5, 'Pasta', '2023-03-06 00:16:47', '2023-03-06 00:16:47'),
(7, 'Seafood', '2023-03-06 00:20:50', '2023-03-06 00:20:50'),
(9, 'Fast Food', '2023-03-06 01:29:47', '2023-03-09 04:54:00'),
(17, 'Mango', '2023-03-22 07:56:06', '2023-03-22 07:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `price`, `image`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Ham Burger', '122.00', '030720230729386406e7e2e4e26.jpg', 'Big Burger', 1, '2023-03-07 01:29:38', '2023-03-07 03:34:55'),
(8, 'Cheesecake', '144.00', '030920231029196409b4ff405d4.png', 'best food', 2, '2023-03-09 04:29:19', '2023-03-09 04:29:19'),
(9, 'Tiramisu', '477.00', '030920231030286409b5444d6c7.png', 'this is tiramisu', 2, '2023-03-09 04:30:28', '2023-03-09 04:30:28'),
(10, 'Chocolate lava cake', '4526.00', '030920231031436409b58f96c18.png', 'dfgdrfg', 3, '2023-03-09 04:31:43', '2023-03-09 04:31:43');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_05_053520_create_sessions_table', 1),
(7, '2023_03_05_114949_create_categories_table', 2),
(8, '2023_03_06_085503_create_menus_table', 3),
(9, '2023_03_07_110101_create_tables_table', 4),
(10, '2023_03_12_103418_create_sales_table', 5),
(11, '2023_03_12_104858_create_sale_datails_table', 6),
(12, '2023_03_20_114535_add_role_feild_to_users', 7);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_recieved` decimal(8,2) NOT NULL DEFAULT 0.00,
  `change` decimal(8,2) NOT NULL DEFAULT 0.00,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sale_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `table_id`, `table_name`, `user_id`, `user_name`, `total_price`, `total_recieved`, `change`, `payment_type`, `sale_status`, `created_at`, `updated_at`) VALUES
(7, 1, 'A1', 1, 'admin', '122.00', '122.00', '0.00', 'cash', 'paid', '2023-03-14 04:27:45', '2023-03-16 03:28:31'),
(11, 1, 'A1', 1, 'admin', '144.00', '144.00', '0.00', 'cash', 'paid', '2023-03-16 03:36:46', '2023-03-16 03:37:00'),
(12, 1, 'A1', 1, 'admin', '122.00', '122.00', '0.00', 'cash', 'paid', '2023-03-16 03:39:50', '2023-03-16 03:40:44'),
(13, 1, 'A1', 1, 'admin', '122.00', '122.00', '0.00', 'cash', 'paid', '2023-03-16 05:37:13', '2023-03-16 05:38:08'),
(14, 1, 'A1', 1, 'admin', '122.00', '122.00', '0.00', 'cash', 'paid', '2023-03-16 05:38:26', '2023-03-18 04:04:59'),
(15, 1, 'A1', 1, 'admin', '122.00', '122.00', '0.00', 'cash', 'paid', '2023-03-18 04:07:10', '2023-03-18 04:07:35'),
(16, 1, 'A1', 1, 'admin', '122.00', '122.00', '0.00', 'cash', 'paid', '2023-03-18 04:15:30', '2023-03-18 04:15:38'),
(17, 1, 'A1', 1, 'admin', '144.00', '144.00', '0.00', 'cash', 'paid', '2023-03-18 05:08:43', '2023-03-18 05:08:51'),
(18, 1, 'A1', 1, 'admin', '5269.00', '5269.00', '0.00', 'cash', 'paid', '2023-03-18 05:22:20', '2023-03-18 05:22:46'),
(19, 1, 'A1', 1, 'admin', '144.00', '144.00', '0.00', 'cread card', 'paid', '2023-03-18 05:23:30', '2023-03-18 05:23:45'),
(20, 1, 'A1', 1, 'admin', '288.00', '288.00', '0.00', 'cash', 'paid', '2023-03-18 22:35:59', '2023-03-19 02:54:44'),
(21, 1, 'A1', 1, 'admin', '244.00', '244.00', '0.00', 'cash', 'paid', '2023-03-19 02:56:49', '2023-03-19 03:42:11'),
(22, 1, 'A1', 1, 'admin', '621.00', '621.00', '0.00', 'cread card', 'paid', '2023-03-19 03:57:54', '2023-03-19 05:01:57'),
(23, 1, 'A1', 1, 'admin', '743.00', '743.00', '0.00', 'cash', 'paid', '2023-03-19 05:05:23', '2023-03-19 05:07:49'),
(24, 1, 'A1', 1, 'admin', '122.00', '122.00', '0.00', 'cash', 'paid', '2023-03-19 05:21:50', '2023-03-19 05:32:06'),
(25, 1, 'A1', 1, 'admin', '122.00', '124.00', '2.00', 'cash', 'paid', '2023-03-19 05:40:34', '2023-03-19 05:40:45'),
(26, 1, 'A1', 1, 'admin', '266.00', '266.00', '0.00', 'cash', 'paid', '2023-03-19 05:46:29', '2023-03-20 01:47:37'),
(28, 1, 'A1', 1, 'admin', '144.00', '144.00', '0.00', 'cash', 'paid', '2023-03-22 03:56:42', '2023-03-22 07:27:37'),
(29, 1, 'A1', 1, 'admin', '765.00', '765.00', '0.00', 'cash', 'paid', '2023-03-22 07:29:58', '2023-03-22 07:30:46'),
(30, 2, 'A2', 1, 'admin', '122.00', '122.00', '0.00', 'cash', 'paid', '2023-03-22 07:34:46', '2023-03-22 07:35:12'),
(31, 1, 'A1', 1, 'admin', '266.00', '266.00', '0.00', 'cash', 'paid', '2023-03-25 22:12:42', '2023-03-25 22:13:54'),
(32, 1, 'A1', 1, 'admin', '266.00', '0.00', '0.00', '', 'unpaid', '2023-03-26 03:06:37', '2023-04-08 06:09:42'),
(33, 2, 'A2', 1, 'admin', '122.00', '0.00', '0.00', '', 'unpaid', '2023-04-30 23:34:09', '2023-04-30 23:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `sale_datails`
--

CREATE TABLE `sale_datails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noConfirm',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_datails`
--

INSERT INTO `sale_datails` (`id`, `sale_id`, `menu_id`, `menu_name`, `menu_price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(33, 7, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-14 04:29:21', '2023-03-14 04:29:25'),
(44, 9, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-16 03:33:54', '2023-03-16 03:33:57'),
(45, 10, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-16 03:35:09', '2023-03-16 03:35:17'),
(48, 11, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-16 03:36:46', '2023-03-16 03:36:48'),
(49, 12, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-16 03:39:50', '2023-03-16 03:39:53'),
(51, 13, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-16 05:37:48', '2023-03-16 05:37:50'),
(52, 14, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-16 05:38:26', '2023-03-16 05:38:32'),
(54, 15, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-18 04:07:10', '2023-03-18 04:07:23'),
(55, 16, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-18 04:15:30', '2023-03-18 04:15:32'),
(56, 17, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-18 05:08:43', '2023-03-18 05:08:45'),
(57, 18, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-18 05:22:20', '2023-03-18 05:22:28'),
(58, 18, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-18 05:22:22', '2023-03-18 05:22:28'),
(59, 18, 9, 'Tiramisu', 477, 1, 'confirm', '2023-03-18 05:22:23', '2023-03-18 05:22:28'),
(60, 18, 10, 'Chocolate lava cake', 4526, 1, 'confirm', '2023-03-18 05:22:26', '2023-03-18 05:22:28'),
(61, 19, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-18 05:23:30', '2023-03-18 05:23:32'),
(62, 20, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-18 22:35:59', '2023-03-19 02:06:00'),
(64, 20, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-19 02:05:55', '2023-03-19 02:06:00'),
(68, 21, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-19 03:42:00', '2023-03-19 03:42:04'),
(69, 21, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-19 03:42:02', '2023-03-19 03:42:04'),
(71, 22, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-19 03:58:01', '2023-03-19 03:58:05'),
(72, 22, 9, 'Tiramisu', 477, 1, 'confirm', '2023-03-19 03:58:03', '2023-03-19 03:58:05'),
(75, 23, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-19 05:07:17', '2023-03-19 05:07:41'),
(76, 23, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-19 05:07:39', '2023-03-19 05:07:41'),
(77, 23, 9, 'Tiramisu', 477, 1, 'confirm', '2023-03-19 05:07:39', '2023-03-19 05:07:41'),
(78, 24, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-19 05:21:50', '2023-03-19 05:21:53'),
(81, 25, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-19 05:40:34', '2023-03-19 05:40:37'),
(87, 26, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-20 01:47:21', '2023-03-20 01:47:25'),
(88, 26, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-20 01:47:22', '2023-03-20 01:47:25'),
(99, 28, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-22 04:13:28', '2023-03-22 07:27:28'),
(102, 29, 8, 'Cheesecake', 144, 2, 'confirm', '2023-03-22 07:29:58', '2023-03-22 07:30:09'),
(103, 29, 9, 'Tiramisu', 477, 1, 'confirm', '2023-03-22 07:30:05', '2023-03-22 07:30:09'),
(104, 30, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-22 07:34:46', '2023-03-22 07:34:50'),
(105, 31, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-25 22:12:42', '2023-03-25 22:12:53'),
(106, 31, 8, 'Cheesecake', 144, 1, 'confirm', '2023-03-25 22:12:49', '2023-03-25 22:12:53'),
(108, 32, 5, 'Ham Burger', 122, 1, 'confirm', '2023-03-26 03:46:47', '2023-04-08 06:09:42'),
(109, 32, 8, 'Cheesecake', 144, 1, 'confirm', '2023-04-08 05:22:46', '2023-04-08 06:09:33'),
(111, 33, 5, 'Ham Burger', 122, 1, 'confirm', '2023-04-30 23:34:09', '2023-04-30 23:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BBj5CFRw9J1FqYGfEfqygDZdzQUbbkSDFRnubzWw', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEpNZ1BsT3ZHTTdUZjZaTDdrYm9qU1ZCb3gxQnNWZ04xVlpQUW5oaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvcmVzdGF1cmFudC9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1681309105),
('g1kY7mNRfbkXWNW4E24HThPd8jrZTJix8zBbkyj3', 1, '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUXlHbEl4V3dTcHZLVGZPR0x6b0FZVFBmOEdsZG1DSEt0YkkxV3FGTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3QvcmVzdGF1cmFudC9wdWJsaWMvY2FzaGllciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkQ0JrQ0xSOXVsTXNDMERtb1JRRTBEdWhTZmNYRzFrbUlETElYczZBeWt2aFNwSW12NjIxeWkiO30=', 1680955927),
('L2nEYjbXJIXZbF0B47q99sMINndZywlTOqeFx1tj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZXBsTWtYSkZSc2ZsN0NXa1lhcGQ4SHByMDdNSE9ldkpXWWlJS2t4VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZXBvcnQvc2hvdz9kYXRlRW5kPTA1JTJGMDMlMkYyMDIzJmRhdGVTdGFydD0wNSUyRjAyJTJGMjAyMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkQ0JrQ0xSOXVsTXNDMERtb1JRRTBEdWhTZmNYRzFrbUlETElYczZBeWt2aFNwSW12NjIxeWkiO30=', 1682923551),
('W285QfO80z1Kiztt0Vup2yh5Z8lNCOsvADP2xM62', 1, '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicEtHcThRM3Y1bGtqZXZLZHJJZHBRWFNJMzBMQVd4ckkyMWMwVlJIbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvcmVzdGF1cmFudC9wdWJsaWMvbG9naW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1680955435),
('YWTQeqgwfflFbrIKQspRagS4cGaJxgiG51ew8FjE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1J6UlpYMnl5SDlRWEVBOXVHWlNDUFc0VU5Gd0xJWFNIMlpMcE1GSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1682939713);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'unavailable', '2023-03-07 05:21:07', '2023-03-26 03:06:37'),
(2, 'A2', 'unavailable', '2023-03-07 05:36:53', '2023-04-30 23:34:09'),
(3, 'B1', 'available', '2023-03-07 05:37:33', '2023-03-07 05:37:33'),
(4, 'B2', 'available', '2023-03-07 05:37:40', '2023-03-07 05:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$CBkCLR9ulMsC0DmoRQE0DuhSfcXG1kmIDLIXs6AykvhSpImv621yi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-04 23:41:19', '2023-03-04 23:41:19'),
(2, 'Eurosia User', 'user', 'mubineurosia@gmail.com', NULL, '$2y$10$6BA8cF7XMY5gn4Kk.a.e.ejGBRrZGcezdSjFQ0uVlnpH4MmI1Uwti', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 23:19:34', '2023-03-20 23:19:34'),
(3, 'user', 'user', 'jon@gmail.com', NULL, '$2y$10$nfFKDLKilogOIp/PUc9IG.qwFk5DehJGL5V211oNjFMwQzvkz0E5u', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 01:01:42', '2023-03-21 01:18:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_datails`
--
ALTER TABLE `sale_datails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sale_datails`
--
ALTER TABLE `sale_datails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
