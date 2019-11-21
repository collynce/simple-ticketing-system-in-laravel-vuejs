-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 06:56 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_tickets`
--

CREATE TABLE `booked_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `tickets_amount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booked_tickets`
--

INSERT INTO `booked_tickets` (`id`, `user_id`, `payment_id`, `ticket_id`, `tickets_amount`) VALUES
(1, 2, 1, 1, 1),
(2, 2, 2, 1, 10),
(3, 2, 3, 1, 1),
(4, 2, 4, 1, 1),
(5, 2, 5, 1, 1),
(6, 2, 6, 1, 1),
(7, 2, 7, 1, 0),
(8, 2, 7, 2, 2),
(9, 2, 8, 1, 0),
(10, 2, 8, 2, 1),
(13, 2, 10, 1, 0),
(14, 2, 10, 2, 1),
(15, 2, 11, 1, 0),
(16, 2, 11, 2, 1),
(17, 2, 12, 1, 0),
(18, 2, 12, 2, 1),
(19, 2, 13, 1, 0),
(20, 2, 13, 2, 1),
(27, 2, 17, 1, 0),
(28, 2, 17, 2, 1),
(29, 2, 18, 1, 0),
(30, 2, 18, 2, 1),
(31, 2, 19, 1, 0),
(32, 2, 19, 2, 1),
(33, 2, 20, 1, 0),
(34, 2, 20, 2, 1),
(35, 2, 21, 1, 0),
(36, 2, 21, 2, 2),
(37, 1, 22, 1, 0),
(38, 1, 22, 2, 1),
(39, 1, 23, 1, 0),
(40, 1, 23, 2, 1),
(41, 1, 24, 1, 5),
(42, 1, 24, 2, 0),
(45, 3, 26, 4, 0),
(46, 3, 26, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_capacity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `total_capacity`, `venue`, `start_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dddd', '22', 'Nairobi', '2019-11-16 11:00:00', '2019-11-12 13:41:19', '2019-11-12 13:41:19', NULL),
(2, 'dddd', '33', 'Nairobi', '2019-11-16 11:00:00', '2019-11-13 03:19:03', '2019-11-13 03:19:03', NULL),
(3, 'dddd', '454', 'Nairobi', '0019-11-13 22:03:05', '2019-11-13 16:03:09', '2019-11-13 16:04:14', '2019-11-13 16:04:14'),
(4, 'dddd', '22', 'ssasa', '2019-11-13 22:03:54', '2019-11-13 16:04:04', '2019-11-13 16:04:04', NULL);

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(17, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(18, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(19, '2016_06_01_000004_create_oauth_clients_table', 1),
(20, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_11_09_090329_create_events_table', 1),
(24, '2019_11_10_042211_create_tickets_table', 1),
(25, '2019_11_11_184809_create_payments_table', 1),
(26, '2019_11_12_114621_create_booked_tickets', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_paid` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `user_email`, `total_paid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(2, 2, 'collinskiprotich02@gmail.com', 500.00, NULL, NULL, NULL),
(3, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(4, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(5, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(6, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(7, 2, 'collinskiprotich02@gmail.com', 100.00, NULL, NULL, NULL),
(8, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(10, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(11, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(12, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(13, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(17, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(18, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(19, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(20, 2, 'collinskiprotich02@gmail.com', 50.00, NULL, NULL, NULL),
(21, 2, 'collinskiprotich02@gmail.com', 100.00, NULL, NULL, NULL),
(22, 1, 'collinskiprotich@gmail.com', 50.00, NULL, NULL, NULL),
(23, 1, 'collinskiprotich@gmail.com', 50.00, NULL, NULL, NULL),
(24, 1, 'collinskiprotich@gmail.com', 250.00, NULL, NULL, NULL),
(26, 3, 'superuser@admin.com', 50.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `ticket_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_from` date NOT NULL,
  `available_to` date NOT NULL,
  `price` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `amount`, `ticket_type`, `available_from`, `available_to`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 15, 'vii', '2019-11-02', '2019-11-29', 50.00, '2019-11-12 13:41:47', '2019-11-14 11:10:22', '2019-11-14 11:10:22'),
(2, 1, 0, 'vii', '2019-11-02', '2019-11-29', 50.00, '2019-11-14 05:10:19', '2019-11-14 11:10:01', '2019-11-14 11:10:01'),
(3, 1, 15, 'VIP', '2019-12-05', '2019-11-14', 50.00, '2019-11-14 11:08:49', '2019-11-14 11:10:19', '2019-11-14 11:10:19'),
(4, 1, 15, 'VIP', '2019-11-14', '2019-11-14', 20.00, '2019-11-14 11:10:53', '2019-11-14 11:10:53', NULL),
(5, 1, 14, 'Regular', '2019-11-14', '2019-11-14', 50.00, '2019-11-14 11:11:31', '2019-11-14 14:51:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Collins Kiprotich', 'collinskiprotich@gmail.com', NULL, '$2y$10$2qQWA3o0DKKUw9GFWZkGNuB6ZD4h6ZLAmPxD3WhcW1BkbN4I7LSUK', 0, NULL, '2019-11-12 12:33:56', '2019-11-12 12:33:56'),
(2, 'Collins Kiprotich', 'collinskiprotich02@gmail.com', NULL, '$2y$10$F8d0ePQ5tpIMCLiSLCS9vegFcHLyBMYPpj9CVCJZDQxUzu/BHdZzW', 1, 'wDQF5I3WAnjRysjIUPBUl5i3bd16xUEMZ3E6oJ1AYnovK7bC9gTJSSsPrquA', '2019-11-12 13:39:56', '2019-11-12 13:39:56'),
(3, 'Super User', 'superuser@admin.com', NULL, '$2y$10$MNVE0HFHliIOyNU9eQjtJewB3KvgpgkbOZaLbk.evrrnOMjcsFOsC', 0, NULL, '2019-11-14 14:09:56', '2019-11-14 14:09:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booked_tickets_payment_id_foreign` (`payment_id`),
  ADD KEY `booked_tickets_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_event_id_foreign` (`event_id`),
  ADD KEY `tickets_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  ADD CONSTRAINT `booked_tickets_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booked_tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
