-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 08:07 PM
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
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(9, '1650301048.png', NULL, 'Pick Your Items', 'Adipiscing elit curabitur senectus sem', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'side-banner', 1, '2022-04-18 10:57:28', '2022-04-18 10:57:28'),
(10, '1650301352.png', NULL, 'Best Of Products', 'Cras pulvinar loresum dolor conse', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'side-banner', 2, '2022-04-18 11:02:32', '2022-04-18 11:02:32'),
(11, '1650303140.jpg', 'TOP STAFF PICK', 'Best Collection', 'Proin interdum magna primis id consequat', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'mid-banner', 1, '2022-04-18 11:32:20', '2022-04-18 11:32:20'),
(12, '1650303213.jpg', 'TOP STAFF PICK', 'Maybe You’ve Earned It', 'Use code: <span> DIVINELOOK </span> Get 25% Off for all items! </span>', 'SHOP NOW', 'https://www.cimuzitavi.biz', 'mid-banner', 2, '2022-04-18 11:33:33', '2022-04-18 11:33:33'),
(13, '1650303733.jpg', 'You have no items &amp; Are you <br>ready to use? come &amp; shop with us!', 'Collection Arrived', 'Price from: <span class=\"number-price\">BDT 45.00</span>', 'SHOP NOW', 'https://drawsql.app/laravel-6/diagrams/divinelook#', 'full-banner', 1, '2022-04-18 11:42:13', '2022-04-18 11:45:47'),
(14, 'sait-martin11650361774.jpg', NULL, NULL, NULL, NULL, NULL, 'popup', 2, '2022-04-19 03:45:38', '2022-04-19 03:50:47'),
(15, '1650361839.jpg', NULL, NULL, 'The Pride Of Bangladesh', NULL, NULL, 'popup', 2, '2022-04-19 03:50:39', '2022-04-25 13:46:16'),
(17, '1650916044.jpg', NULL, NULL, NULL, NULL, NULL, 'popup', 4, '2022-04-25 13:47:24', '2022-04-25 13:47:24'),
(18, '1650918198.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 1, '2022-04-25 14:23:18', '2022-04-25 14:23:18'),
(19, '1650918291.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 2, '2022-04-25 14:24:51', '2022-04-25 14:24:51'),
(20, '1650918302.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 3, '2022-04-25 14:25:02', '2022-04-25 14:25:02'),
(21, '1650918313.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 4, '2022-04-25 14:25:13', '2022-04-25 14:25:13'),
(22, '1650918322.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 5, '2022-04-25 14:25:22', '2022-04-25 14:25:22'),
(23, '1650918354.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 6, '2022-04-25 14:25:40', '2022-04-25 14:25:54'),
(24, '1650918582.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 7, '2022-04-25 14:29:42', '2022-04-25 14:29:42'),
(25, '1650918592.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 8, '2022-04-25 14:29:52', '2022-04-25 14:29:52'),
(26, '1650918612.jpg', NULL, NULL, NULL, NULL, NULL, 'gallery', 9, '2022-04-25 14:30:12', '2022-04-25 14:30:12'),
(29, '1653377640.jpg', NULL, NULL, NULL, NULL, NULL, 'slider', 2, '2022-05-24 01:34:00', '2022-05-24 01:34:00');

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
(2, 'Brand1', 'brand1', '23432421649697303.png', '2022-04-11 11:15:03', '2022-04-15 03:01:16'),
(3, 'others', 'others', 'others1655397793.jpg', '2022-06-16 10:43:13', '2022-06-16 10:43:13');

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
(52, 6, '::1', 12, 3, 100.00, 300.00, '2022-06-20 12:00:57', '2022-06-20 12:01:43'),
(53, 6, '::1', 14, 1, 681.00, 681.00, '2022-06-20 12:01:28', '2022-06-20 12:01:43');

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
(2, 'Cat1', 'cat1', '3243241649697295.png', '2022-04-11 11:14:55', '2022-04-15 03:01:25'),
(3, 'Cat3', 'cat3', '3243241649697295.png', '2022-04-11 11:14:55', '2022-04-15 03:01:25'),
(4, 'foods', 'foods', 'foods1655397773.jpg', '2022-06-16 10:42:53', '2022-06-16 10:42:53');

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
(15, '2022_04_05_162001_create_shippings_table', 1),
(17, '2022_04_05_161933_create_carts_table', 2),
(18, '2022_04_16_145721_create_rating_wishlists_table', 3),
(19, '2022_04_18_145745_create_banners_table', 4),
(23, '2022_04_05_161906_create_orders_table', 5),
(24, '2022_04_23_192650_add_google_id_to_users_table', 5),
(25, '2022_04_05_161920_create_order_details_table', 6);

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
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_qty`, `total_price`, `payment_type`, `transaction_id`, `created_at`, `updated_at`) VALUES
(22, 6, 15, 25500.00, 'Cash on delivery', 'sdfdsfdsf', '2022-06-20 08:25:32', '2022-06-20 08:25:33'),
(23, 6, 20, 31000.00, 'Cash on delivery', 'sdfdsfsf', '2022-06-20 08:29:56', '2022-06-20 08:29:56'),
(24, 6, 2, 2200.00, 'Cash on delivery', 'Sint dolor exercitat', '2022-06-20 08:32:21', '2022-06-20 08:32:21'),
(25, 6, 2, 800.00, 'Cash on delivery', 'asdfdsfsdf', '2022-06-20 11:54:31', '2022-06-20 11:54:31');

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

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(28, 22, 25, 5, 1100.00, '2022-06-20 08:25:33', '2022-06-20 08:25:33'),
(29, 22, 24, 10, 2000.00, '2022-06-20 08:25:33', '2022-06-20 08:25:33'),
(30, 23, 25, 10, 1100.00, '2022-06-20 08:29:56', '2022-06-20 08:29:56'),
(31, 23, 24, 10, 2000.00, '2022-06-20 08:29:56', '2022-06-20 08:29:56'),
(32, 24, 25, 2, 1100.00, '2022-06-20 08:32:21', '2022-06-20 08:32:21'),
(33, 25, 12, 3, 100.00, '2022-06-20 11:54:31', '2022-06-20 11:54:31'),
(34, 25, 13, 1, 500.00, '2022-06-20 11:54:31', '2022-06-20 11:54:31');

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
(11, 2, 2, 'dexter-payne1649773702.jpg', 'Dexter Payne', 'dexter-payne', 'Nisi eos iusto dolo', '[\"1\",\"7\"]', 645.00, 452.00, 799, 'Voluptatem Illum q', NULL, NULL, 'new', 'best_seller', NULL, '2022-04-12 08:28:22', '2022-04-15 02:36:33'),
(12, 1, 2, 'levi-hurst1650903918.jpg', 'Levi Hurst', 'levi-hurst', 'Sunt eos ut totam al', '[\"1\"]', 100.00, 200.00, 198, 'Dolore adipisicing d', NULL, NULL, 'discount', 'featured', NULL, '2022-04-12 09:19:46', '2022-06-20 11:54:31'),
(13, 1, 2, 'amity-underwood1650453628.jpg', 'Amity Underwood', 'amity-underwood', 'Ut dolor blanditiis', '[\"4\",\"5\",\"7\",\"8\"]', NULL, 500.00, 837, 'Fugit aut tempora m', NULL, NULL, 'discount', 'best_seller', NULL, '2022-04-20 05:20:28', '2022-06-20 11:54:31'),
(14, 2, 2, 'jerry-nguyen1650453653.png', 'Jerry Nguyen', 'jerry-nguyen', 'Veniam odit minus e', '[\"2\",\"3\",\"5\",\"7\",\"8\"]', 681.00, 813.00, 498, 'Esse et quis quo atq', NULL, NULL, 'new', 'featured', NULL, '2022-04-20 05:20:53', '2022-05-19 09:26:12'),
(15, 1, 2, 'bell-mccall1650453794.png', 'Bell Mccall', 'bell-mccall', 'Dolor corporis corpo', '[\"1\",\"3\",\"5\",\"8\"]', 835.00, 639.00, 435, 'Deserunt qui vel qui', NULL, NULL, 'discount', 'featured', NULL, '2022-04-20 05:23:14', '2022-06-20 07:31:36'),
(16, 1, 1, 'jolene-edwards1650453810.jpg', 'Jolene Edwards', 'jolene-edwards', 'Corporis ea beatae i', NULL, 43.00, 932.00, 369, 'Praesentium cupidita', NULL, NULL, 'discount', 'featured', NULL, '2022-04-20 05:23:30', '2022-05-19 09:23:06'),
(24, 4, 3, 'sample.jpg', 'Cashews Unsalted 1', 'cashews-unsalted-1', 'xxxxxxxx', NULL, NULL, 2000.00, 40, 'Cashews Unsalted (Kirkland)', 'Cashews Unsalted (Kirkland)', 'Cashews Unsalted (Kirkland)', NULL, NULL, NULL, '2022-06-16 11:19:53', '2022-06-20 08:29:56'),
(25, 4, 3, 'sample.jpg', 'Cashews Unsalted 2', 'cashews-unsalted-2', 'xxxxxxxx', NULL, 1100.00, 1200.00, 73, 'Cashews Unsalted (Kirkland)', 'Cashews Unsalted (Kirkland)', 'Cashews Unsalted (Kirkland)', NULL, NULL, NULL, '2022-06-16 11:19:53', '2022-06-20 08:32:21');

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
(32, 11, 'dexter-payne16497737020.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(33, 11, 'dexter-payne16497737021.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(34, 11, 'dexter-payne16497737022.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(35, 11, 'dexter-payne16497737023.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(36, 11, 'dexter-payne16497737024.jpg', '2022-04-12 08:28:22', '2022-04-12 08:28:22'),
(42, 13, 'amity-underwood16504536280.png', '2022-04-20 05:20:28', '2022-04-20 05:20:28'),
(43, 13, 'amity-underwood16504536281.jpg', '2022-04-20 05:20:28', '2022-04-20 05:20:28'),
(44, 13, 'amity-underwood16504536282.jpg', '2022-04-20 05:20:28', '2022-04-20 05:20:28'),
(45, 13, 'amity-underwood16504536283.jpg', '2022-04-20 05:20:28', '2022-04-20 05:20:28'),
(46, 14, 'jerry-nguyen16504536530.png', '2022-04-20 05:20:53', '2022-04-20 05:20:53'),
(47, 14, 'jerry-nguyen16504536531.jpg', '2022-04-20 05:20:53', '2022-04-20 05:20:53'),
(48, 14, 'jerry-nguyen16504536532.jpg', '2022-04-20 05:20:53', '2022-04-20 05:20:53'),
(49, 14, 'jerry-nguyen16504536533.jpg', '2022-04-20 05:20:53', '2022-04-20 05:20:53'),
(50, 15, 'bell-mccall16504537940.png', '2022-04-20 05:23:14', '2022-04-20 05:23:14'),
(51, 15, 'bell-mccall16504537941.jpg', '2022-04-20 05:23:14', '2022-04-20 05:23:14'),
(52, 16, 'jolene-edwards16504538100.png', '2022-04-20 05:23:30', '2022-04-20 05:23:30'),
(53, 16, 'jolene-edwards16504538101.jpg', '2022-04-20 05:23:30', '2022-04-20 05:23:30'),
(54, 16, 'jolene-edwards16504538102.jpg', '2022-04-20 05:23:30', '2022-04-20 05:23:30'),
(55, 16, 'jolene-edwards16504538103.jpg', '2022-04-20 05:23:30', '2022-04-20 05:23:30'),
(56, 12, 'levi-hurst16509039180.jpg', '2022-04-25 10:25:18', '2022-04-25 10:25:18'),
(57, 12, 'levi-hurst16509039181.jpg', '2022-04-25 10:25:18', '2022-04-25 10:25:18'),
(58, 12, 'levi-hurst16509039182.jpg', '2022-04-25 10:25:18', '2022-04-25 10:25:18');

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

--
-- Dumping data for table `rating_wishlists`
--

INSERT INTO `rating_wishlists` (`id`, `user_id`, `product_id`, `rating`, `message`, `type`, `created_at`, `updated_at`) VALUES
(27, 6, 12, NULL, NULL, 'wishlist', '2022-04-25 14:07:54', '2022-04-25 14:07:54'),
(28, 6, 13, 5.00, NULL, 'rating', '2022-05-19 09:23:12', '2022-05-19 09:23:12'),
(29, 6, 15, 5.00, NULL, 'rating', '2022-05-19 09:23:12', '2022-05-19 09:23:12'),
(30, 6, 16, 5.00, NULL, 'rating', '2022-05-19 09:23:12', '2022-05-19 09:23:12'),
(31, 8, 15, 5.00, NULL, 'rating', '2022-05-19 09:26:16', '2022-05-19 09:26:16'),
(32, 8, 14, 5.00, NULL, 'rating', '2022-05-19 09:26:16', '2022-05-19 09:26:16'),
(33, 6, 12, 5.00, NULL, 'rating', '2022-06-20 11:54:39', '2022-06-20 11:54:39'),
(34, 6, 13, 5.00, NULL, 'rating', '2022-06-20 11:54:40', '2022-06-20 11:54:40');

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

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `address`, `created_at`, `updated_at`) VALUES
(1, 6, 'Enim sit duis archi', '2022-04-25 15:42:23', '2022-04-25 15:42:23'),
(2, 6, 'Saepe amet a obcaec', '2022-05-19 09:22:59', '2022-05-19 09:22:59'),
(3, 8, 'Aperiam est sint nes', '2022-05-19 09:26:07', '2022-05-19 09:26:07'),
(4, 6, 'sdfdsfsf', '2022-06-20 04:26:41', '2022-06-20 04:26:41'),
(5, 6, 'sdfdfdsf', '2022-06-20 07:24:08', '2022-06-20 07:24:08'),
(6, 6, 'sdfsdfsdf', '2022-06-20 07:27:10', '2022-06-20 07:27:10'),
(7, 6, 'asdsadsadsad', '2022-06-20 07:27:52', '2022-06-20 07:27:52'),
(8, 6, 'sdfsdfdsf', '2022-06-20 07:30:32', '2022-06-20 07:30:32'),
(9, 6, 'csdfsdsdf', '2022-06-20 11:54:22', '2022-06-20 11:54:22');

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
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `google_id`, `avatar`, `name`, `email`, `phone`, `address`, `division`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, NULL, 'gage-mayer1650386164_.jpg', 'Sabbir Ahmed', 'theahmedsabbir@gmail.com', '+1 (742) 394-5412', 'Quia autem cupiditat', '', 0, NULL, '$2y$10$1AuaK8TK6kVMFp7CV3oizew1/GeNNsgYmGaqXuP9XDm98gU14Rytm', 'h9LRWzlpWD2q58Xx3KBkRci5UDAXjGKTmswOaC7ssRrODV5ywYzr5akALwGJ', '2022-04-18 08:40:14', '2022-04-19 10:36:04'),
(7, NULL, 'gage-mayer1650292814_.jpg', 'Gage Mayer', 'theahmedsabbir@gmail.com1', '+1 (742) 394-54121', 'Quia autem cupiditat', '', 0, NULL, '$2y$10$1AuaK8TK6kVMFp7CV3oizew1/GeNNsgYmGaqXuP9XDm98gU14Rytm', 'MV3nmWkCvD7CZMxijj7ivaz5S5SLSvNfGECQ84jO1iM09TlwyzXXlP38ypHA', '2022-04-18 08:40:14', '2022-04-19 09:44:18'),
(8, NULL, 'justina-forbes1652973856_.jpg', 'Justina Forbes', 'qejuc@mailinator.com', '+1 (484) 637-6052', 'Tempora culpa conseq', '', 0, NULL, '$2y$10$t3nyCx0lkH8PQCNaj5Fd1u5p1whfr.1v0axmTKAA2ryOEO/UJF8g6', NULL, '2022-05-19 09:24:16', '2022-05-19 09:24:16'),
(9, NULL, 'kane-miles1655290875_.png', 'Kane Miles', 'godusulu@mailinator.com', '+1 (273) 434-5154', 'Non necessitatibus q', '', 0, NULL, '$2y$10$DBEVXkLdgAyQgvVKNY6eO.zWQr1TSJjEETayb.Y6K8X1EjDQfOa9e', NULL, '2022-06-15 05:01:15', '2022-06-15 05:01:15'),
(10, NULL, NULL, 'Raya Good', 'wofocuf@mailinator.com', '+1 (297) 766-6516', 'Fuga Deserunt tempo', 'Khulna', 0, NULL, '$2y$10$nI8Imwr2iQjJ2YeviV81tOFUyXhUCnZMprfu.7VUgp02MpchQasSq', NULL, '2022-06-15 05:03:46', '2022-06-15 05:03:46'),
(11, NULL, 'cywiqimav-at-mailinatorcom1655738108_.png', 'cywiqimav@mailinator.com', 'qado@mailinator.com', 'xifyjelob@mailinator.com', 'baxalidicy@mailinator.com', 'Khulna', 1, NULL, '$2y$10$TcmiE9njxpZukChkTIH6VeqmN33Sme3IKYZ5/n0tiMYL.9sRwMRSy', NULL, '2022-06-20 09:15:08', '2022-06-20 09:15:08'),
(12, NULL, 'mohile1655738294_.jpg', 'mohile', 'mohile@mohile.com', 'mohile', 'mohile', 'Sylhet', 1, NULL, '$2y$10$/tjydjprwN2qlt1SM8/T2uxEulBOD9v24wmP.GG9yvP7r4r5C2fGe', NULL, '2022-06-20 09:18:14', '2022-06-20 09:18:14');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `rating_wishlists`
--
ALTER TABLE `rating_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

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
