-- phpMyAdmin SQL Dump
-- version 5.2.1-4.fc40
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 29, 2024 at 12:24 AM
-- Server version: 10.11.8-MariaDB
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms19`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails_sent`
--

CREATE TABLE `emails_sent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `email_list_id` bigint(20) UNSIGNED NOT NULL,
  `sent_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails_sent`
--

INSERT INTO `emails_sent` (`id`, `campaign_id`, `email_list_id`, `sent_at`, `created_at`, `updated_at`) VALUES
(1, 3, 62, '2024-08-28 18:31:39', '2024-08-28 18:31:39', '2024-08-28 18:31:39'),
(2, 4, 82, '2024-08-28 18:32:53', '2024-08-28 18:32:53', '2024-08-28 18:32:53'),
(3, 5, 82, '2024-08-28 18:44:14', '2024-08-28 18:44:14', '2024-08-28 18:44:14'),
(4, 5, 83, '2024-08-28 18:44:16', '2024-08-28 18:44:16', '2024-08-28 18:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

CREATE TABLE `email_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `person_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `list_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_list`
--

INSERT INTO `email_list` (`id`, `email`, `company_name`, `person_name`, `country`, `city`, `created_at`, `updated_at`, `list_name`) VALUES
(58, 'sales@themagusgroup.com', 'Magus', 'Manager', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(59, 'karmasecurity@hotmail.com', 'Track & Trace Private Detectives', 'Dinesh', 'INDIA', 'Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(60, 'deepak@yadu.in', 'Yadu Corporation', 'Manager', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(61, 'clutchmachine@gmail.com', 'Pratap Udhyog', 'Srinivas', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(62, 'avhadarvind@yahoo.co.in', 'ADV. Arvind S Avhad', 'Manager', 'INDIA', 'Pune', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(63, 'sales@arjunfarm.com', 'Arjun Farm', 'Manager', 'INDIA', 'Rajkot', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(64, 'alchemistdentallab@gmail.com', 'Zental Dental Clinic', 'Manager', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(65, 'cochin@greenparadize.com', 'Egypt Tour Package', 'sunny', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(66, 'super_trading_officefiles@yahoo.com', 'Super Trading Corporation', 'Aakash', 'INDIA', 'Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(67, 'bestdealloan10@gmail.com', 'Best Deal 4 Loans', 'Vivek', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(68, 'saraswati_gases@yahoo.com', NULL, 'Sumit', 'INDIA', 'Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(69, 'sidhant.modernite@gmail.com', 'Morden Anti Furniture', 'Sidhant', 'INDIA', 'Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(70, 'royalgems_2006@yahoo.com', 'L.D.Sons', 'Vinod', 'INDIA', 'Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(71, 'amritbawa999@gmail.com', 'Global tradex', 'Amrit', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(72, 'sales@bawaimpex.com', 'Bawa Impex', 'Bawa', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(73, 'aasthana.ansh@gmail.com', 'Mahindra Reva Electric Vehicles Private Limited', 'Anshuman', 'INDIA', 'Faizabad', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(74, 'rishabhelastomers01@gmail.com', 'Rishabh Elastomers Private Limited', 'Vinay', 'INDIA', 'Gurgaon', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(75, 'fnpflagship@gmail.com', 'FNP Flagship', 'Manager', 'INDIA', 'Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(76, 'rajatdigani@hotmail.com', 'Global Expat Management Services & Solutions', 'Rajat', 'INDIA', 'Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(77, 'vigexindia@gmail.com', 'Vigex Auto Systems India Private Limited', 'Israr', 'INDIA', 'Loni', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(78, 'mail@kingkoil.in', 'Real Innerspring Technologies Private Limited', 'Nitin', 'INDIA', 'Noida', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(79, 'info@emproindia.com', 'Empro Digital Communication Private Limited', 'Manager', 'INDIA', 'Ghaziabad', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(80, 'sales@bigboytoyz.in', 'Big Boy Toyz', 'Yagika', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(81, 'inindiainfo@rediffmail.com', 'Architectural Lighting Solutions', 'Anurag', 'INDIA', 'New Delhi', '2024-08-28 17:36:16', '2024-08-28 17:36:16', 'Indiamart B2b Contact'),
(82, 'shariqq.com@gmail.com', 'shariqq', 'shariqq', 'INDIA', NULL, '2024-08-28 18:04:58', '2024-08-28 18:04:58', 'test11'),
(83, 'shiftingbrains@gmail.com', 'sb', 'sb', 'INDIA', NULL, '2024-08-28 18:04:58', '2024-08-28 18:04:58', 'test11');

-- --------------------------------------------------------

--
-- Table structure for table `email_sent_campaigns`
--

CREATE TABLE `email_sent_campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `list_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `last_sent_email_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emails_per_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sent_campaigns`
--

INSERT INTO `email_sent_campaigns` (`id`, `name`, `list_name`, `last_sent_email_id`, `subject`, `body`, `attachment`, `created_at`, `updated_at`, `emails_per_hour`) VALUES
(1, 'Indiamart B2b Contact', NULL, NULL, 'freelancer shariqq resume', 'Hi sir im looking for freelance jojb, work, project in your company. Below is my resume', 'attachments/3yciHMeUSrNc4Ooxe4aauPMVhRfN6Ysa2OpW1UAp.pdf', '2024-08-28 17:43:23', '2024-08-28 17:43:23', 0),
(2, 'Indiamart B2b Contact', NULL, NULL, 'freelancer shariqq resume', 'Hi sir im looking for freelance jojb, work, project in your company. Below is my resume', 'attachments/iSJUZ16JgwNqY0sxy5xegwPCr5Rmc1MzfDT4MZS7.pdf', '2024-08-28 17:43:39', '2024-08-28 17:43:39', 0),
(3, 'Indiamart B2b Contact', 'Indiamart B2b Contact', 62, 'freelancer', 'HI SIR', 'attachments/asIHtENzrf1RaCyf1sXjRuIonyeL2atCSoo3KMI3.pdf', '2024-08-28 17:57:43', '2024-08-28 18:31:39', 50),
(4, 'test11', 'test11', 83, 'HEY SHARIQQ', 'hi sir tomorrow meeting, please join', 'attachments/x40aCOecEAVj0EavxtepNPkgncQTP7fYivt0NMLm.pdf', '2024-08-28 18:32:50', '2024-08-28 18:40:55', 2),
(5, 'test11once again', 'test11', 83, 'tomorrow meeting with admin', 'HI shariqq bhai, tomorrow is meeting, please check\r\nresume is attached', 'attachments/K1jQ6ya4l6Fb1giAkr3dscr6k6FPK7Zh1IkDcCwq.pdf', '2024-08-28 18:42:22', '2024-08-28 18:44:16', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2024_08_28_214538_create_email_list_table', 2),
(6, '2024_08_28_214543_create_email_sent_campaigns_table', 2),
(7, '2024_08_28_214548_create_emails_sent_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8czExpmGLNVSoJ4nGUuucjZN6ldedTEdg2GKMHRy', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVNlZEw0ckVTRmFXNHU4Zld2VlpFd3ZSeHhyRUlybmRiZUNiWEhCRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90ZXN0LWVtYWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1724890733);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed shariq', 'shariqq.com@gmail.com', NULL, '$2y$12$LdUxS1qlsgfWQ1a15r7rl.Vok2hi/Fl6BzzuH66fVSHwjIDzwCBUC', 'blVhTEhrO4XVXvXDETpxPgjbFo5vzDcUeRUHCqpULCS7pLCaxUnzVOd3diqq', '2024-08-28 16:03:33', '2024-08-28 16:03:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `emails_sent`
--
ALTER TABLE `emails_sent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emails_sent_campaign_id_foreign` (`campaign_id`),
  ADD KEY `emails_sent_email_list_id_foreign` (`email_list_id`);

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_list_email_unique` (`email`);

--
-- Indexes for table `email_sent_campaigns`
--
ALTER TABLE `email_sent_campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `emails_sent`
--
ALTER TABLE `emails_sent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `email_sent_campaigns`
--
ALTER TABLE `email_sent_campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emails_sent`
--
ALTER TABLE `emails_sent`
  ADD CONSTRAINT `emails_sent_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `email_sent_campaigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `emails_sent_email_list_id_foreign` FOREIGN KEY (`email_list_id`) REFERENCES `email_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
