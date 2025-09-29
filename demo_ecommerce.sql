-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2025 at 05:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_ecommerce`
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', '2025-09-29 13:27:59', '2025-09-29 13:27:59'),
(2, 'Home Appliances', 'home-appliances', '2025-09-29 13:27:59', '2025-09-29 13:27:59'),
(3, 'Computers & Laptops', 'computers-laptops', '2025-09-29 13:27:59', '2025-09-29 13:27:59'),
(4, 'Mobiles & Tablets', 'mobiles-tablets', '2025-09-29 13:27:59', '2025-09-29 13:27:59'),
(5, 'Cameras & Photography', 'cameras-photography', '2025-09-29 13:27:59', '2025-09-29 13:27:59'),
(6, 'Audio & Headphones', 'audio-headphones', '2025-09-29 13:27:59', '2025-09-29 13:27:59'),
(7, 'Gaming Consoles', 'gaming-consoles', '2025-09-29 13:27:59', '2025-09-29 13:27:59');

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
(4, '2025_09_29_081446_create_categories_table', 1),
(5, '2025_09_29_081713_create_subcategories_table', 1),
(6, '2025_09_29_082307_create_products_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `new_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `slug`, `description`, `image`, `old_price`, `new_price`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Samsung Galaxy S23', 'samsung-galaxy-s23', 'The Samsung Galaxy S23 features a 6.1-inch Dynamic AMOLED 2X display, Snapdragon 8 Gen 2 processor, triple-lens 50MP camera system, and a sleek glass-metal design. Built for power users, it offers smooth multitasking, advanced photography, and 5G connectivity in a compact flagship form.', 'products/YKIwyMcy94le9jOgicNAMBp2rcbP1VpDmfiADebm.png', 950.00, 899.00, '2025-09-29 13:31:17', '2025-09-29 09:16:41'),
(2, 4, 2, 'iPhone 15 Pro', 'iphone-15-pro', 'Apple’s iPhone 15 Pro is powered by the cutting-edge A17 Pro chip, delivering console-quality gaming and unmatched performance. With its aerospace-grade titanium frame, 48MP Pro camera system, and iOS 17 integration, it redefines premium smartphones for both creativity and productivity.', 'iphone15pro.jpg', 1200.00, 1150.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(3, 3, 3, 'Asus ROG Strix Gaming Laptop', 'asus-rog-strix-gaming-laptop', 'The Asus ROG Strix Gaming Laptop combines a 17.3-inch 240Hz display, NVIDIA RTX 4070 GPU, and AMD Ryzen 9 processor for elite-level performance. Designed with customizable RGB keyboard lighting, advanced cooling, and immersive sound, it is the ultimate choice for competitive gamers and streamers.', 'asusrog.jpg', 1800.00, 1699.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(4, 3, 4, 'Dell OptiPlex 7090 Desktop', 'dell-optiplex-7090-desktop', 'Built for reliability and efficiency, the Dell OptiPlex 7090 desktop is equipped with Intel’s 11th Gen processors, ample RAM, and business-class security features. Its compact design, multiple connectivity options, and quiet performance make it perfect for offices, schools, and home professionals.', 'optiplex.jpg', 700.00, 650.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(5, 7, 5, 'Sony PlayStation 5 Console', 'sony-playstation-5-console', 'The PlayStation 5 delivers next-generation gaming with ultra-fast load times powered by its custom SSD, ray-tracing graphics, and 4K HDR support. With an extensive library of exclusive titles and the revolutionary DualSense controller, it offers an immersive gaming experience unlike any other.', 'ps5.jpg', 650.00, 599.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(6, 7, 6, 'Xbox Series X', 'xbox-series-x', 'The Xbox Series X is Microsoft’s most powerful gaming console, featuring a custom 1TB SSD, 12 teraflops of processing power, and 4K gaming at up to 120fps. It supports Xbox Game Pass, backward compatibility with older titles, and Dolby Atmos for immersive audio performance.', 'xboxx.jpg', 620.00, 590.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(7, 2, 7, 'LG 350L Smart Refrigerator', 'lg-350l-smart-refrigerator', 'The LG 350L Smart Refrigerator is designed with inverter technology for energy savings and optimal cooling performance. With spacious compartments, frost-free operation, and Wi-Fi smart control, it ensures fresh food storage while adding convenience and style to your modern kitchen.', 'lgfridge.jpg', 800.00, 750.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(8, 2, 8, 'Samsung EcoBubble Front Load Washing Machine', 'samsung-ecobubble-front-load-washing-machine', 'Samsung’s 6kg EcoBubble washing machine provides deep cleaning with less energy, even in cold water. Featuring multiple wash modes, quick wash function, and a durable diamond drum, it ensures gentle fabric care while maintaining washing efficiency for everyday use.', 'samsungwash.jpg', 500.00, 470.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(9, 5, 9, 'Canon EOS 90D DSLR Camera', 'canon-eos-90d-dslr-camera', 'The Canon EOS 90D is a professional-grade DSLR camera with a 32.5MP APS-C sensor and 4K video recording. Perfect for both photography enthusiasts and professionals, it offers fast autofocus, high burst shooting, and superior low-light performance.', 'canon90d.jpg', 1400.00, 1320.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(10, 6, 10, 'Sony WF-1000XM5 Wireless Earbuds', 'sony-wf-1000xm5-wireless-earbuds', 'Sony WF-1000XM5 earbuds deliver industry-leading noise cancellation, premium sound quality, and up to 24 hours of battery life with the charging case. With ergonomic design, adaptive sound control, and multipoint Bluetooth pairing, they provide the ultimate wireless listening experience.', 'sonybuds.jpg', 350.00, 320.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17'),
(11, 1, 11, 'Google Nest Hub (2nd Gen)', 'google-nest-hub-2nd-gen', 'The Google Nest Hub (2nd Gen) is a smart display with a 7-inch screen, built-in Google Assistant, and smart home control features. It allows you to stream music, watch videos, manage schedules, and control IoT devices—all with simple voice commands.', 'nesthub.jpg', 200.00, 180.00, '2025-09-29 13:31:17', '2025-09-29 13:31:17');

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
('JqtsGmu6rkpQaNhHEMwJVHdOrKysVp7EWXHIx8lJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzVpMzZXUnRoSW1CZExzVTNVcktJaWFwNzNFTkRWZE1YRDRVWWxHMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759159009);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 4, 'Android Phones', 'android-phones', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(2, 4, 'iPhones', 'iphones', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(3, 3, 'Gaming Laptops', 'gaming-laptops', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(4, 3, 'Desktop PCs', 'desktop-pcs', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(5, 7, 'PlayStation', 'playstation', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(6, 7, 'Xbox', 'xbox', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(7, 2, 'Refrigerators', 'refrigerators', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(8, 2, 'Washing Machines', 'washing-machines', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(9, 5, 'DSLR Cameras', 'dslr-cameras', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(10, 6, 'Wireless Earbuds', 'wireless-earbuds', '2025-09-29 13:29:42', '2025-09-29 13:29:42'),
(11, 1, 'Smart Home Devices', 'smart-home-devices', '2025-09-29 13:29:42', '2025-09-29 13:29:42');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
