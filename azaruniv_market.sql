-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2020 at 08:41 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azaruniv_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_orders`
--

DROP TABLE IF EXISTS `bank_orders`;
CREATE TABLE IF NOT EXISTS `bank_orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `is_in_person` tinyint(1) DEFAULT NULL,
  `address` text,
  `phone` varchar(255) NOT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_orders_cart_id_foreign` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `producer_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percent` int(11) DEFAULT '0',
  `stock` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_important` tinyint(1) DEFAULT NULL,
  `demo_file` varchar(250) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `producer_id`, `category_id`, `name`, `description`, `price`, `discount_percent`, `stock`, `image_path`, `is_important`, `demo_file`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 'تستی', 'توضیحات محصول تستی', 100000, 0, 10, 'uploads/images/books/2020/11/17d07h49mCAFKH8p6D8.jpg', 0, NULL, 'accepted', '2020-11-17 16:19:57', '2020-11-17 19:28:10', NULL),
(2, 4, 1, 'کیت پزشکی', 'توضیحات محصول تستی', 100000, 0, 10, 'uploads/images/books/2020/11/17d07h49mCAFKH8p6D8.jpg', 0, NULL, 'pending', '2020-11-17 16:19:57', '2020-11-17 19:28:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_contents`
--

DROP TABLE IF EXISTS `cart_contents`;
CREATE TABLE IF NOT EXISTS `cart_contents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_contents_cart_id_foreign` (`cart_id`),
  KEY `cart_contents_book_id_foreign` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'فنی و مهندسی', '2020-11-16 20:30:00', '2020-11-16 20:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_12_100131_create_books_table', 2),
(4, '2018_12_12_101832_create_sliders_table', 2),
(5, '2018_12_12_102300_create_payments_table', 2),
(6, '2018_12_12_102315_create_carts_table', 2),
(7, '2018_12_12_110429_create_cart_contents_table', 2),
(8, '2018_12_12_110557_create_orders_table', 2),
(9, '2018_12_12_111055_create_order_contents_table', 2),
(10, '2019_01_08_100808_add_role_to_users_table', 3),
(11, '2019_01_08_105232_add_some_fields_to_orders_table', 4),
(12, '2019_01_08_203911_add_post_trace_number_to_orders_table', 5),
(13, '2019_01_08_205407_add_price_to_order_contents_table', 6),
(14, '2019_01_09_171736_create_bank_orders_table', 7),
(15, '2019_01_15_210534_add_is_important_to_books_table', 7),
(16, '2019_01_21_134742_add_page_count_to_books_table', 7),
(17, '2019_02_03_113546_create_categories_table', 7),
(18, '2019_02_03_114215_add_category_id_to_books_table', 7),
(19, '2019_02_04_122459_add_is_in_person_and_buy_code_to_orders_table', 7),
(20, '2019_02_04_122721_add_is_in_person_to_bank_orders_table', 7),
(21, '2019_04_30_133211_add_demo_file_to_books_table', 7),
(22, '2019_11_21_105446_add_discount_percent_to_books', 8),
(23, '2019_11_24_130125_create_discounts_table', 9),
(24, '2019_11_24_131654_add_discount_id_to_bank_orders_table', 10),
(25, '2019_11_24_131851_add_discount_id_to_orders_table', 11),
(26, '2019_11_24_135938_add_letter_number_and_sended_at_to_orders_table', 12),
(27, '2019_12_07_133140_add_translator_to_books_table', 13),
(28, '2020_07_25_161829_add_producer_id_to_books_table', 14),
(29, '2020_07_25_210650_add_is_settled_to_order_contents_tale', 15),
(30, '2020_11_17_192741_add_status_to_books_table', 16),
(32, '2020_11_17_201655_create_settlements_table', 17),
(33, '2020_11_17_212201_add_some_fields_to_users_table', 18),
(34, '2020_11_17_214207_create_settings_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `discount_id` int(11) DEFAULT '0',
  `is_in_person` tinyint(1) DEFAULT NULL,
  `buy_code` varchar(250) DEFAULT NULL,
  `address` text,
  `phone` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `is_sent` tinyint(1) NOT NULL,
  `trace_no` varchar(255) DEFAULT NULL,
  `letter_number` varchar(255) DEFAULT NULL,
  `sended_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_payment_id_foreign` (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

DROP TABLE IF EXISTS `order_contents`;
CREATE TABLE IF NOT EXISTS `order_contents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `is_settled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_contents_order_id_foreign` (`order_id`),
  KEY `order_contents_book_id_foreign` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `retrival_ref_no` varchar(255) NOT NULL,
  `system_trace_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `is_success`, `retrival_ref_no`, `system_trace_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 100, 1, '5454', '545445', '2020-11-17 20:30:00', '2020-11-17 20:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'address', 'تبریز ،٣٥ کیلومتری جاده تبریز-مراغه ،دانشگاه شهید مدنی آذربایجان، دفتر همکاری های علمی', '2020-11-17 18:27:54', '2020-11-17 18:47:29', NULL),
(2, 'manager-name', 'دکتر لطف اللهی', '2020-11-17 18:27:54', '2020-11-17 18:46:04', NULL),
(3, 'manager-email', 'lotfollahi@azaruniv.ac.ir', '2020-11-17 18:27:54', '2020-11-17 18:46:05', NULL),
(4, 'direct-phone', '34327567-041', '2020-11-17 18:27:54', '2020-11-17 18:46:05', NULL),
(5, 'internal-phone', '2456', '2020-11-17 18:27:54', '2020-11-17 18:46:05', NULL),
(6, 'link1', 'azaruniv.ac.ir', '2020-11-17 18:27:54', '2020-11-17 18:46:05', NULL),
(7, 'link2', 'azaruniv.ac.ir', '2020-11-17 18:27:54', '2020-11-17 18:46:05', NULL),
(8, 'link3', 'azaruniv.ac.ir', '2020-11-17 18:27:54', '2020-11-17 18:46:05', NULL),
(9, 'link1-title', 'دانشگاه شهید مدنی آذربایجان', '2020-11-17 18:41:27', '2020-11-17 18:48:18', NULL),
(10, 'link2-title', 'دانشگاه شهید مدنی آذربایجان', '2020-11-17 18:41:27', '2020-11-17 18:48:18', NULL),
(11, 'link3-title', 'دانشگاه شهید مدنی آذربایجان', '2020-11-17 18:41:27', '2020-11-17 18:48:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

DROP TABLE IF EXISTS `settlements`;
CREATE TABLE IF NOT EXISTS `settlements` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `producer_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `bank_account_owenr` varchar(255) DEFAULT NULL,
  `bank_shba` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `bank_shba` varchar(255) DEFAULT NULL,
  `bank_account_owner` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `bank`, `bank_account`, `bank_shba`, `bank_account_owner`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'خریداز', 'mohsen1@gmail.com', '09145821998', 'user', NULL, NULL, NULL, NULL, '$2y$10$cQ1Ec.iEFyi42oQ/ZUy0Me2ElaZAhmKcChR9eRMdMT4EOA/QZY47.', 'lDSIGKsqtyHL0oBZpxiMYiAulVbBOAHdP1LrlZ6Mo47SiOaGt3jO1YXysqJx', '2018-12-14 20:30:00', '2018-12-14 20:30:00', NULL),
(2, 'محسن فرجامی', 'mohsen@gmail.com', '09145821998', 'admin', NULL, NULL, NULL, NULL, '$2y$10$cQ1Ec.iEFyi42oQ/ZUy0Me2ElaZAhmKcChR9eRMdMT4EOA/QZY47.', 'junr8LMuj0mA5P3hBAUqWdpCULsVigIG15UJt5lQqfoFw06glRIfk3K1ufoV', '2019-01-08 16:36:44', '2019-01-08 16:36:44', NULL),
(3, 'محسن فرجامی', 'mohsen2@gmail.com', '09145821998', 'user', NULL, NULL, NULL, NULL, '$2y$10$ImbJQHOTzjGnhP1PgpzpIuo4xeIxSA4UkOj/LJ/ZaG7HxNsx8aWPq', 'xC9hHCTAsIqSECFtG1jNexMGYuZZxxKAA2QVFisnmrRc8pIwh01WCUuQp0LG', '2019-01-09 11:04:32', '2019-01-09 11:04:32', NULL),
(4, 'محسن فرجامی', 'mohsen3@gmail.com', '09145821998', 'producer', NULL, NULL, NULL, NULL, '$2y$10$ImbJQHOTzjGnhP1PgpzpIuo4xeIxSA4UkOj/LJ/ZaG7HxNsx8aWPq', '697x2GAxarkYsMtmvma51btcrzNNTJe8rtFkz6aPMx8RaHAq4JXJo3dWiEJ3', '2019-01-09 11:04:32', '2019-01-09 11:04:32', NULL),
(5, 'فروشگاه جدید2', 'producer1@gmail.com', '222222', 'producer', 'ملی2', '2222222', 'IR2222', 'علی احمدی2', '$2y$10$sl2gZ.Cp9w1EpOZkZLHnvu.CD2bAtGw5.RG9OEnpDSqxrifRHv6Bm', NULL, '2020-11-17 18:00:46', '2020-11-17 18:07:10', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_orders`
--
ALTER TABLE `bank_orders`
  ADD CONSTRAINT `bank_orders_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_contents`
--
ALTER TABLE `cart_contents`
  ADD CONSTRAINT `cart_contents_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `cart_contents_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD CONSTRAINT `order_contents_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `order_contents_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
