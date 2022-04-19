-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 04:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divinelookbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@divinelookbd.com', '$2y$10$YCepKaOF6uhp0oAZO2/lXuPVq6WMbyn6FgFpxYLlNscdm4OjEKN0q', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `info`, `title`, `sub_title`, `button_text`, `link`, `type`, `priority`, `created_at`, `updated_at`) VALUES
(6, '1650299901.jpg', 'Sale up to 40% off', 'Spring Summer</br> Collection', 'New Price: <span class=\"number-price\"> BDT 270.00 </span>', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'slider', 1, '2022-04-18 10:38:21', '2022-04-18 10:47:45'),
(8, '1650300550.jpg', 'Take A perfume', 'Up to 25% Off <br>order now', 'Save Price: <span class=\"number-price\"> BDT 170.00 </span>', 'Shop now', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'slider', 2, '2022-04-18 10:49:10', '2022-04-18 10:49:10'),
(9, '1650301048.png', NULL, 'Pick Your Items', 'Adipiscing elit curabitur senectus sem', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'side-banner', 1, '2022-04-18 10:57:28', '2022-04-18 10:57:28'),
(10, '1650301352.png', NULL, 'Best Of Products', 'Cras pulvinar loresum dolor conse', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'side-banner', 2, '2022-04-18 11:02:32', '2022-04-18 11:02:32'),
(11, '1650303140.jpg', 'TOP STAFF PICK', 'Best Collection', 'Proin interdum magna primis id consequat', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'mid-banner', 1, '2022-04-18 11:32:20', '2022-04-18 11:32:20'),
(12, '1650303213.jpg', 'TOP STAFF PICK', 'Maybe You’ve Earned It', 'Use code: <span> DIVINELOOK </span> Get 25% Off for all items! </span>', 'SHOP NOW', 'https://www.cimuzitavi.biz', 'mid-banner', 2, '2022-04-18 11:33:33', '2022-04-18 11:33:33'),
(13, '1650303733.jpg', 'You have no items &amp; Are you <br>ready to use? come &amp; shop with us!', 'Collection Arrived', 'Price from: <span class=\"number-price\">BDT 45.00</span>', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'full-banner', 1, '2022-04-18 11:42:13', '2022-04-18 11:45:47'),
(14, 'sait-martin11650361774.jpg', NULL, 'Sait Martin', 'Best Place of Bangladesh', NULL, NULL, 'popup', 2, '2022-04-19 03:45:38', '2022-04-19 03:50:47'),
(15, '1650361839.jpg', NULL, 'Royal Bengal Tiger', 'The Pride Of Bangladesh', NULL, NULL, 'popup', 1, '2022-04-19 03:50:39', '2022-04-19 03:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Brand2', 'brand2', 'ora-townsend1649695007.jpg', '2022-04-11 10:36:47', '2022-04-15 03:00:59'),
(2, 'Brand1', 'brand1', '23432421649697303.png', '2022-04-11 11:15:03', '2022-04-15 03:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `ip_address`, `product_id`, `qty`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
(2, NULL, '127.0.0.1', 9, 1, 614.00, 614.00, '2022-04-16 08:46:06', '2022-04-16 08:46:06'),
(3, NULL, '127.0.0.1', 9, 1, 614.00, 614.00, '2022-04-16 08:46:58', '2022-04-16 08:46:58'),
(4, 1, NULL, 8, 1, 911.00, 911.00, '2022-04-16 11:14:56', '2022-04-16 11:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cat2', 'cat2', 'Jerry Thompson1649694996.png', '2022-04-11 10:36:36', '2022-04-15 03:01:33'),
(2, 'Cat1', 'cat1', '3243241649697295.png', '2022-04-11 11:14:55', '2022-04-15 03:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Black', NULL, NULL, NULL),
(2, 'Blue', NULL, NULL, NULL),
(3, 'Yellow', NULL, NULL, NULL),
(4, 'Green', NULL, NULL, NULL),
(5, 'Pink', NULL, NULL, NULL),
(6, 'Orange', NULL, NULL, NULL),
(7, 'Red', NULL, NULL, NULL),
(8, 'Violet', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_05_160844_create_admins_table', 1),
(6, '2022_04_05_160859_create_categories_table', 1),
(7, '2022_04_05_161020_create_brands_table', 1),
(8, '2022_04_05_161032_create_products_table', 1),
(9, '2022_04_05_161044_create_sizes_table', 1),
(10, '2022_04_05_161055_create_colors_table', 1),
(11, '2022_04_05_161853_create_product_images_table', 1),
(12, '2022_04_05_161906_create_orders_table', 1),
(13, '2022_04_05_161920_create_order_details_table', 1),
(15, '2022_04_05_162001_create_shippings_table', 1),
(17, '2022_04_05_161933_create_carts_table', 2),
(18, '2022_04_16_145721_create_rating_wishlists_table', 3),
(19, '2022_04_18_145745_create_banners_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_qty` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` double(8,2) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avg_rating` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `brand_id`, `image`, `name`, `slug`, `sku`, `colors`, `discount_price`, `price`, `qty`, `short_description`, `long_description`, `information`, `type`, `features`, `avg_rating`, `created_at`, `updated_at`) VALUES
(8, 2, 1, 'eagan-vaughn1649761301.jpg', 'Eagan Vaughn', 'eagan-vaughn', 'Optio est architect', NULL, 911.00, 532.00, 357, 'Quam maiores enim en', NULL, NULL, NULL, NULL, NULL, '2022-04-12 05:01:42', '2022-04-12 05:01:42'),
(9, 2, 1, 'taylor-nolan1649773607.jpg', 'Taylor Nolan', 'taylor-nolan', 'Est autem voluptate', '[\"1\",\"7\"]', 614.00, 151.00, 235, 'Nemo est non qui au', NULL, NULL, 'hot', 'featured', NULL, '2022-04-12 08:26:47', '2022-04-15 02:37:06'),
(10, 1, 2, 'knox-macias1649773639.jpg', 'Knox Macias', 'knox-macias', 'Maiores minima fugia', '[\"3\"]', 483.00, 311.00, 467, 'Pariatur Eveniet v', NULL, NULL, 'hot', 'featured', NULL, '2022-04-12 08:27:19', '2022-04-15 02:36:45'),
(11, 2, 2, 'dexter-payne1649773702.jpg', 'Dexter Payne', 'dexter-payne', 'Nisi eos iusto dolo', '[\"1\",\"7\"]', 645.00, 452.00, 799, 'Voluptatem Illum q', NULL, NULL, 'new', 'best_seller', NULL, '2022-04-12 08:28:22', '2022-04-15 02:36:33'),
(12, 1, 2, 'levi-hurst1649776786.jpg', 'Levi Hurst', 'levi-hurst', 'Sunt eos ut totam al', '[\"1\"]', 829.00, 770.00, 203, 'Dolore adipisicing d', NULL, NULL, 'discount', 'featured', NULL, '2022-04-12 09:19:46', '2022-04-15 02:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(21, 8, 'eagan-vaughn16497613020.jpg', '2022-04-12 05:01:42', '2022-04-12 05:01:42'),
(22, 8, 'eagan-vaughn16497613021.jpg', '2022-04-12 05:01:42', '2022-04-12 05:01:42'),
(23, 8, 'eagan-vaughn16497613022.jpg', '2022-04-12 05:01:42', '2022-04-12 05:01:42'),
(24, 9, 'taylor-nolan16497736070.jpg', '2022-04-12 08:26:47', '2022-04-12 08:26:47'),
(25, 9, 'taylor-nolan16497736071.jpg', '2022-04-12 08:26:47', '2022-04-12 08:26:47'),
(26, 9, 'taylor-nolan16497736072.jpg', '2022-04-12 08:26:47', '2022-04-12 08:26:47'),
(27, 9, 'taylor-nolan16497736073.jpg', '2022-04-12 08:26:47', '2022-04-12 08:26:47'),
(28, 10, 'knox-macias16497736390.jpg', '2022-04-12 08:27:19', '2022-04-12 08:27:19'),
(29, 10, 'knox-macias16497736391.jpg', '2022-04-12 08:27:19', '2022-04-12 08:27:19'),
(30, 10, 'knox-macias16497736392.jpg', '2022-04-12 08:27:19', '2022-04-12 08:27:19'),
(31, 10, 'knox-macias16497736393.jpg', '2022-04-12 08:27:19', '2022-04-12 08:27:19'),
(32, 11, 'dexter-payne16497737020.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(33, 11, 'dexter-payne16497737021.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(34, 11, 'dexter-payne16497737022.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(35, 11, 'dexter-payne16497737023.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(36, 11, 'dexter-payne16497737024.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(37, 12, 'levi-hurst16497767860.png', '2022-04-12 09:19:46', '2022-04-12 09:19:46'),
(38, 12, 'levi-hurst16497767861.jpg', '2022-04-12 09:19:46', '2022-04-12 09:19:46'),
(39, 12, 'levi-hurst16497767862.png', '2022-04-12 09:19:46', '2022-04-12 09:19:46'),
(40, 12, 'levi-hurst16497767863.jpg', '2022-04-12 09:19:46', '2022-04-12 09:19:46'),
(41, 12, 'levi-hurst16497767864.png', '2022-04-12 09:19:46', '2022-04-12 09:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `rating_wishlists`
--

CREATE TABLE `rating_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `phone`, `address`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'gage-mayer1650292814_.jpg', 'Gage Mayer', 'dygyxe@mailinator.com', '+1 (742) 394-5412', 'Quia autem cupiditat', 0, NULL, '$2y$10$VzwQ2daHC/Gzr5vsyZ2keeAeWT1aHc5aAqXno6IFTJoZiC0ixmqLS', NULL, '2022-04-18 08:40:14', '2022-04-18 08:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_wishlists`
--
ALTER TABLE `rating_wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_wishlists_user_id_foreign` (`user_id`),
  ADD KEY `rating_wishlists_product_id_foreign` (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rating_wishlists`
--
ALTER TABLE `rating_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating_wishlists`
--
ALTER TABLE `rating_wishlists`
  ADD CONSTRAINT `rating_wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
