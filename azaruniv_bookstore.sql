-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2020 at 08:49 AM
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
-- Database: `azaruniv_bookstore`
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_orders`
--

INSERT INTO `bank_orders` (`id`, `cart_id`, `is_in_person`, `address`, `phone`, `postal_code`, `amount`, `discount_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 0, 'آذرشهر', '09144123449', '5371734406', 16000, 0, '2019-02-01 18:11:56', '2019-02-01 18:11:56', NULL),
(2, 1, 1, 'تحویل حضوری', '09142356985', NULL, 305000, 0, '2019-02-03 23:38:11', '2019-02-03 23:38:11', NULL),
(3, 1, 1, 'تحویل حضوری', '09145821998', NULL, 100, 0, '2019-02-03 23:46:56', '2019-02-03 23:46:56', NULL),
(4, 1, 1, 'تحویل حضوری', '09365018124', NULL, 192000, 0, '2019-02-05 08:14:01', '2019-02-05 08:14:01', NULL),
(5, 8, 0, 'تهران- منطقه 5- فلکه دوم صادقیه- خیابان ایت اله کاشانی- بوستان اول- گلستان دوم- پلاک 40- واحد1', '09124323971', '1416777751', 35000, 0, '2019-02-16 03:55:20', '2019-02-16 03:55:20', NULL),
(6, 9, 1, 'تحویل حضوری', '09155620366', NULL, 42000, 0, '2019-03-02 04:12:58', '2019-03-02 04:12:58', NULL),
(7, 10, 0, 'تهران -شهرجدید پرند- فاز صفر- مجتمع مسکونی ایستا ورودی 19 واحد 11', '09126953409', '3761391376', 12000, 0, '2019-03-05 20:32:35', '2019-03-05 20:32:35', NULL),
(8, 10, 0, 'تهران- شهر جدید پرند- فاز صفر مجنمع مسکونی ایستا ورودی 19 واحد 11', '09126953409', '3761391376', 12000, 0, '2019-03-05 20:34:16', '2019-03-05 20:34:16', NULL),
(9, 10, 0, 'تهران شهر جدید پرند فاز صفر مجتمع مسکونی ایستا ورودی 19 واحد 11', '09126953409', '3761391376', 12000, 0, '2019-03-05 20:46:53', '2019-03-05 20:46:53', NULL),
(10, 1, 1, 'تحویل حضوری', '02587963214', NULL, 45022, 0, '2019-09-18 12:43:33', '2019-09-18 12:43:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `translator` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publication_date` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percent` int(11) DEFAULT '0',
  `page_count` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_important` tinyint(1) DEFAULT NULL,
  `demo_file` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `name`, `author`, `translator`, `description`, `publisher`, `publication_date`, `price`, `discount_percent`, `page_count`, `stock`, `image_path`, `is_important`, `demo_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'مبدل های DC/DC   با مدولاسیون پهنای پالس', 'علی عجمي اسفنگره', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1393', 20000, 0, 502, 30, 'uploads/images/books/2019/01/28d11h23m8X5Mb2iMqM.jpg', 0, 'uploads/images/books/2019/01/28d11h23m8X5Mb2iMqM.jpg', '2019-01-28 19:02:51', '2019-02-03 23:45:06', NULL),
(2, NULL, 'طراحي و تحليل مبدل هاي DC-DC غير ايزوله', 'علی عجمي اسفنگره', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1394', 15000, 0, 371, 30, 'uploads/images/books/2019/01/28d10h50mAbFhQm0vQn.jpg', 1, NULL, '2019-01-28 19:20:54', '2019-02-05 17:02:09', '2019-02-05 17:02:09'),
(3, 1, 'آزمون رشد حرکتی درشت', 'بهروز  قربان زاده', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1394', 10000, 0, 106, 30, 'uploads/images/books/2019/01/28d10h53mkaaWSEOs57.jpg', 1, NULL, '2019-01-28 19:23:40', '2019-02-05 17:49:54', '2019-02-05 17:49:54'),
(4, 1, 'فراتحلیل', 'جواد مصرآبادی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1395', 12000, 0, 190, 20, 'uploads/images/books/2019/01/29d08h49m4wJ4gcK7td.jpg', 0, NULL, '2019-01-29 17:19:32', '2019-02-05 17:00:25', NULL),
(5, 6, 'طراحی و تحلیل مبدل های DC/DCغیر ایزوله', 'علی عجمی ، حسین آردی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1394', 15000, 0, 371, 30, 'uploads/images/books/2019/01/29d09h16mLge3bWUVie.jpg', 0, 'uploads/images/books/2019/01/28d11h23m8X5Mb2iMqM.jpg', '2019-01-29 17:46:23', '2019-02-05 17:00:08', NULL),
(6, 1, 'آماراستنباطی در علوم رفتاری ویرایش دوم', 'جواد مصرآبادی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'دوم1397', 45000, 0, 519, 20, 'uploads/images/books/2019/01/29d09h24m0BcNvtQiVW.jpg', 0, NULL, '2019-01-29 17:54:59', '2019-02-05 16:59:39', NULL),
(7, 3, 'مقدمه ای بربیماری شناسی و کنترل میکروبی آفات', 'علی مهرور', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1394', 18000, 0, 303, 50, 'uploads/images/books/2019/01/29d09h30mr49RbfaVzE.jpg', 0, NULL, '2019-01-29 18:00:15', '2019-02-05 16:59:14', NULL),
(8, 3, 'واکنش های گیاهان به تنش های غیر زیستی', 'حمید محمدی،سمیرا سامع اندابجدید،جاوید کاردان', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1395', 35000, 0, 800, 40, 'uploads/images/books/2019/01/29d09h34mHzIxtd8RPI.jpg', 0, NULL, '2019-01-29 18:04:34', '2019-02-05 16:58:57', NULL),
(9, 3, 'پسیل ها شناخت و رده بندی', 'علی مهرور، زینب احمدی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1394', 11000, 0, 137, 20, 'uploads/images/books/2019/01/29d09h51mzgy3NftMxL.jpg', 0, NULL, '2019-01-29 18:21:00', '2019-02-05 16:58:31', NULL),
(10, 1, 'تغذیه برای ورزشکاران نخبه', 'کریم آزالی،مصطفی آرمان فر، فرهاد غلامی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 20000, 0, 391, 30, 'uploads/images/books/2019/01/29d09h55mXW7b7Y8xdS.jpg', 0, NULL, '2019-01-29 18:25:17', '2019-02-05 16:58:13', NULL),
(11, 4, 'حقوق مالی ازدواج', 'مرتضی حاجی پور', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 18000, 0, 252, 30, 'uploads/images/books/2019/01/29d09h57mmCefAokTvI.jpg', 0, NULL, '2019-01-29 18:27:19', '2019-02-05 16:57:50', NULL),
(12, 7, 'درس گفتارهای در باره مکتب های ادبی', 'ناصر علیزاده،ویدا دستمالچی،حسین طاهری', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 18000, 0, 353, 40, 'uploads/images/books/2019/01/29d10h04mGYMYK9WCzM.jpg', 0, NULL, '2019-01-29 18:34:25', '2019-02-03 23:44:19', NULL),
(13, 2, 'مباحثی نوین درباره معادلات تفاضل متناهی مرتبه کسری', 'شهرام رضاپور', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 18000, 0, 329, 30, 'uploads/images/books/2019/01/29d10h07mmle0Y5uUgH.jpg', 0, NULL, '2019-01-29 18:37:59', '2019-02-05 16:56:47', NULL),
(14, 6, 'طراحی اعضای ساختمان های فولادی', 'ارژنگ صادقی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'دوم 1395', 20000, 0, 268, 30, 'uploads/images/books/2019/01/29d10h13mS809gRctca.jpg', 0, NULL, '2019-01-29 18:43:43', '2019-02-05 16:56:29', NULL),
(15, 4, 'الگوی قرانی پاسخ به شبهات اعتقادی', 'داوود افقی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1397', 30000, 0, 278, 25, 'uploads/images/books/2019/01/29d10h19mkXXIzyadO4.jpg', 0, NULL, '2019-01-29 18:49:08', '2019-02-05 16:56:06', NULL),
(16, 5, 'یادگیری از روی داده ها', 'مهدی هاشم زاده، نگین صمدی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 30000, 0, 294, 50, 'uploads/images/books/2019/01/29d10h33mXYIo9oH9Cy.jpg', 0, NULL, '2019-01-29 19:03:55', '2019-02-05 16:55:45', NULL),
(17, 1, 'مقدمه ای بر علوم اعصاب', 'سید محمود طباطبائی، غلامرضا چلبیانلو، پری سیما علیزاده', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 45000, 0, 582, 1, 'uploads/images/books/2019/01/29d10h39mP80t1D3m0u.jpg', 0, NULL, '2019-01-29 19:09:12', '2019-02-05 16:55:25', NULL),
(18, 7, 'بررسی اشعار عربی سعدی بر مبنای نقد کاربردی', 'امیر   مقدم متقی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1395', 10000, 0, 133, 30, 'uploads/images/books/2019/01/29d10h45muqZ8bfkli6.jpg', 0, NULL, '2019-01-29 19:15:15', '2019-02-05 16:55:05', NULL),
(19, 7, 'ابوتمام در ایران از خراسان تا آذربایجان', 'امیر   مقدم متقی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1395', 20000, 0, 307, 30, 'uploads/images/books/2019/01/29d10h47mwe7T1u5A1J.jpg', 0, NULL, '2019-01-29 19:17:24', '2019-02-05 16:54:49', NULL),
(20, 3, 'بیماریهای غلات دانه ریز', 'پریسا طاهری، نیما خالدی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 30000, 0, 246, 15, 'uploads/images/books/2019/01/29d10h51mKdy8CubbMF.jpg', 0, NULL, '2019-01-29 19:21:16', '2019-02-05 16:54:31', NULL),
(21, 2, 'مبانی اسپکتروسکوپی  NMRیک و دو بعدی ویرایش پنجم', 'عادله   مشتقی زنوز', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 42000, 0, 570, 49, 'uploads/images/books/2019/01/29d10h55mYw8zMoVi8M.jpg', 0, NULL, '2019-01-29 19:25:34', '2019-03-02 04:14:15', NULL),
(22, 7, 'A collection of English Papers on Language and Interdisciplinary Studie', 'بهروز عزبدفتری', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'دوم 1397', 22000, 0, 378, 45, 'uploads/images/books/2019/01/29d11h01m4kG2L5vWjj.jpg', 0, NULL, '2019-01-29 19:31:04', '2019-02-05 16:53:46', NULL),
(23, NULL, 'مبانی الکترومغناطیس', 'شهرام حسین زاده', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1391', 16000, 0, 520, 29, 'uploads/images/books/2019/02/01d09h33maCOS5CG9p6.jpg', 0, NULL, '2019-02-01 18:03:32', '2019-02-05 16:44:42', NULL),
(24, 5, 'مباحثی نو در مدیریت و نگهداری اطلاعات', 'محمد خودی زاده', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1397', 38000, 0, 265, 25, 'uploads/images/books/2019/02/01d10h01mNMP5YuZLAM.jpg', 0, NULL, '2019-02-01 18:31:42', '2019-02-05 16:52:16', NULL),
(25, 1, 'مقدمه ای بر روانشناسی ورزشی', 'بهروز قربان زاده', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1397', 40000, 0, 344, 2, 'uploads/images/books/2019/02/01d10h04mOJuB4ovfcd.jpg', 0, NULL, '2019-02-01 18:34:01', '2019-03-02 18:53:42', NULL),
(26, 5, 'تحلیل و طراحی سیستم های مدرن', 'علیرضا روحی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1397', 70000, 0, 777, 20, 'uploads/images/books/2019/02/01d10h05mXBurXHtCtW.jpg', 0, NULL, '2019-02-01 18:35:49', '2019-02-03 23:42:39', NULL),
(27, 2, 'پلیمر های معدنی کلاسیک و جدید', 'کامیلا نجاتی، ذوالفقار رضوانی، جمشید  رخت شه', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1393', 15000, 0, 351, 20, 'uploads/images/books/2019/02/01d11h52mUuN8YO9tUs.jpg', 0, NULL, '2019-02-01 20:22:59', '2019-02-05 16:51:20', NULL),
(28, 1, 'رفتار سازمانی و مدیریت آموزشی', 'پیمان یارمحمدزاده، سعیدرجایی پور', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1391', 10000, 0, 332, 20, 'uploads/images/books/2019/02/01d11h55mzUVQRTQpTs.jpg', 0, NULL, '2019-02-01 20:25:34', '2019-02-05 16:50:07', NULL),
(29, 1, 'برنامه درسی تلفیقی', 'سیروس اسدیان', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1394', 16000, 0, 240, 15, 'uploads/images/books/2019/02/01d11h57myG27HB86hm.jpg', 0, NULL, '2019-02-01 20:27:57', '2019-02-03 23:45:26', NULL),
(30, 1, 'تعادل انرژی در حرکت', 'کریم صالح زاده، الهام جلالی فر', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1395', 12000, 0, 140, 20, 'uploads/images/books/2019/02/01d11h59mv4Eua2Nn1f.jpg', 0, NULL, '2019-02-01 20:29:18', '2019-02-05 16:49:41', NULL),
(31, 6, 'ماشین های الکتریکی 2', 'وحید بهجت، اشکان صوفی زاده', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1392', 20000, 0, 497, 10, 'uploads/images/books/2019/02/02d12h03m9b8ojj6TA3.jpg', 0, NULL, '2019-02-01 20:33:19', '2019-02-05 16:49:21', NULL),
(32, 6, 'ماشین های الکتریکی 1', 'وحید بهجت، اشکان صوفی زاده', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1392', 25000, 0, 637, 25, 'uploads/images/books/2019/02/02d12h06mx9snXJlptn.jpg', 0, NULL, '2019-02-01 20:36:00', '2019-02-03 23:43:06', NULL),
(33, 6, 'مبانی الکترومغناطیس', 'شهرام حسین زاده', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1391', 16000, 0, 520, 15, 'uploads/images/books/2019/02/02d12h15mqOEXLEALbK.jpg', 0, NULL, '2019-02-01 20:45:51', '2019-02-03 23:42:14', NULL),
(34, 2, 'اصول ومبانی طراحی واکسن های DNAعلیه عفونت های انگلی', 'فاطمه غفاری فر', NULL, 'ندارد.', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1396', 12000, 0, 180, 20, 'uploads/images/books/2019/02/02d12h23maQbIGhKejD.jpg', 0, NULL, '2019-02-01 20:53:39', '2019-02-03 23:43:40', NULL),
(36, 1, 'آزمون رشد حرکتی درشت', 'بهروز قربان زاده،مریم لطفی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1394', 10000, 0, 106, 20, 'uploads/images/books/2019/02/05d10h19m78jyTUUJo8.jpg', 0, NULL, '2019-02-05 18:49:52', '2019-02-05 19:17:01', '2019-02-05 19:17:01'),
(37, 1, 'آزمون رشد حرکتی درشت', 'بهروز قربان زاده،مریم لطفی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1394', 10000, 0, 106, 20, 'uploads/images/books/2019/02/05d10h52mtOkAhmPcIZ.jpg', 0, NULL, '2019-02-05 19:22:35', '2019-02-05 19:22:35', NULL),
(38, 7, 'متون انگلیسی عمومی', 'علی اکبر شیری زاده، مرتضی گلزار', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1391', 6000, 0, 185, 20, 'uploads/images/books/2019/02/11d10h40mCsBYQ8jYlo.jpg', 0, NULL, '2019-02-11 19:10:35', '2019-02-11 19:10:35', NULL),
(39, 2, 'درآمدی بر کیهانشناخت کوانتومی', 'فرهاد دارابی', NULL, 'ندارد', 'انتشارات دانشگاه شهید مدنی آذربایجان', 'اول 1390', 4500, 5, 222, 20, 'uploads/images/books/2019/02/11d10h44m29lONDyaq8.jpg', 0, 'uploads/demo/books/2019/04/30d02h15mFVqdqTGGSd.pdf', '2019-02-11 19:14:28', '2019-04-30 09:45:08', NULL),
(40, 8, 'test', 'تست', 'fefef', 'test', 'تست', 'تست', 100, 0, 120, 13, 'uploads/images/books/2019/04/30d02h09m2yH7pHJArJ.jpg', 1, 'uploads/demo/books/2019/04/30d02h09mqW7dweldVy.pdf', '2019-04-30 09:39:03', '2019-12-07 10:12:16', NULL),
(41, 8, 'test2', 'تست', NULL, 'test2', 'تست', 'تست', 22, 0, 30, 22, 'uploads/images/books/2019/04/30d02h13mDbPmuqIo0y.jpg', 1, 'uploads/demo/books/2019/04/30d02h14mLEqNgoCnU3.pdf', '2019-04-30 09:43:17', '2019-04-30 09:44:30', '2019-12-01 20:30:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2019-01-29 23:04:30', '2019-01-29 23:04:30', NULL),
(2, 6, '2019-01-29 23:27:35', '2019-01-29 23:27:35', NULL),
(3, 9, '2019-02-01 18:09:52', '2019-02-01 18:09:52', NULL),
(4, 16, '2019-02-01 22:21:58', '2019-02-01 22:21:58', NULL),
(6, 18, '2019-02-08 09:00:19', '2019-02-08 09:00:19', NULL),
(7, 19, '2019-02-14 06:50:01', '2019-02-14 06:50:01', NULL),
(8, 20, '2019-02-16 03:50:32', '2019-02-16 03:50:32', NULL),
(9, 21, '2019-03-02 04:09:31', '2019-03-02 04:09:31', NULL),
(10, 22, '2019-03-05 20:29:48', '2019-03-05 20:29:48', NULL),
(11, 23, '2019-05-08 14:05:44', '2019-05-08 14:05:44', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_contents`
--

INSERT INTO `cart_contents` (`id`, `cart_id`, `book_id`, `count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 13, 6, '2019-01-29 23:04:30', '2019-01-29 23:24:47', '2019-01-29 23:24:47'),
(2, 2, 4, 1, '2019-01-30 01:55:53', '2019-01-30 01:56:12', '2019-01-30 01:56:12'),
(3, 1, 4, 18, '2019-01-31 04:48:07', '2019-01-31 04:49:04', '2019-01-31 04:49:04'),
(4, 3, 23, 1, '2019-02-01 18:10:28', '2019-02-01 18:16:35', '2019-02-01 18:16:35'),
(5, 1, 26, 1, '2019-02-01 19:43:21', '2019-02-01 22:52:33', '2019-02-01 22:52:33'),
(6, 1, 34, 5, '2019-02-01 22:56:23', '2019-02-03 23:39:16', '2019-02-03 23:39:16'),
(7, 1, 31, 3, '2019-02-01 22:57:39', '2019-02-03 23:39:25', '2019-02-03 23:39:25'),
(8, 1, 17, 1, '2019-02-03 23:37:37', '2019-02-03 23:39:19', '2019-02-03 23:39:19'),
(9, 1, 3, 1, '2019-02-03 23:43:24', '2019-02-03 23:44:25', '2019-02-03 23:44:25'),
(11, 1, 11, 9, '2019-02-04 20:43:20', '2019-02-05 22:35:45', '2019-02-05 22:35:45'),
(12, 1, 15, 1, '2019-02-05 07:48:31', '2019-02-05 22:35:47', '2019-02-05 22:35:47'),
(13, 6, 5, 1, '2019-02-08 09:01:01', '2019-02-08 09:03:29', '2019-02-08 09:03:29'),
(14, 7, 27, 1, '2019-02-14 06:51:02', '2019-02-14 06:53:04', '2019-02-14 06:53:04'),
(15, 8, 5, 1, '2019-02-16 03:51:31', '2019-02-16 03:51:31', NULL),
(16, 8, 1, 1, '2019-02-16 03:52:09', '2019-02-16 03:52:09', NULL),
(17, 1, 6, 1, '2019-02-26 07:02:01', '2019-02-26 07:02:34', '2019-02-26 07:02:34'),
(18, 9, 21, 1, '2019-03-02 04:10:24', '2019-03-02 04:14:15', '2019-03-02 04:14:15'),
(19, 9, 21, 1, '2019-03-02 04:15:42', '2019-03-02 04:16:06', '2019-03-02 04:16:06'),
(20, 1, 14, 1, '2019-03-04 19:54:10', '2019-03-04 19:55:30', '2019-03-04 19:55:30'),
(21, 1, 14, 1, '2019-03-04 19:56:01', '2019-03-04 19:56:31', '2019-03-04 19:56:31'),
(22, 10, 34, 1, '2019-03-05 20:30:39', '2019-03-05 20:30:39', NULL),
(23, 1, 41, 1, '2019-09-18 12:42:28', '2019-11-21 07:58:10', '2019-11-21 07:58:10'),
(24, 1, 6, 1, '2019-09-18 12:43:23', '2019-09-18 12:43:39', '2019-09-18 12:43:39'),
(25, 1, 39, 1, '2019-11-21 07:48:02', '2019-11-21 07:58:08', '2019-11-21 07:58:08'),
(26, 1, 39, 1, '2019-11-21 08:06:18', '2019-11-21 08:06:18', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'علوم تربیتی و روانشناسی', '2019-02-03 20:30:00', '2019-02-03 20:30:00', NULL),
(2, 'علوم پایه', '2019-02-03 20:30:00', '2019-02-03 20:30:00', NULL),
(3, 'کشاورزی', '2019-02-03 20:30:00', '2019-02-03 20:30:00', NULL),
(4, 'الهیات', '2019-02-03 20:30:00', '2019-02-03 20:30:00', NULL),
(5, 'فناوری اطلاعات', '2019-02-03 20:30:00', '2019-02-03 20:30:00', NULL),
(6, 'فنی و مهندسی', '2019-02-03 20:30:00', '2019-02-03 20:30:00', NULL),
(7, 'ادبیات و علوم انسانی', '2019-02-03 20:30:00', '2019-02-03 20:30:00', NULL),
(8, 'تازه های نشر', '2019-02-09 20:30:00', '2019-02-09 20:30:00', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `percent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dis_2', 20, '2019-11-24 10:14:14', '2019-11-24 10:15:45', '2019-11-24 10:15:45'),
(2, 'new', 50, '2019-11-24 10:15:53', '2019-11-24 10:18:05', '2019-11-24 10:18:05'),
(3, 'r3r3', 20, '2019-11-24 11:15:10', '2019-11-24 11:15:10', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(27, '2019_12_07_133140_add_translator_to_books_table', 13);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `discount_id`, `is_in_person`, `buy_code`, `address`, `phone`, `postal_code`, `is_sent`, `trace_no`, `letter_number`, `sended_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 0, 0, NULL, 'آذرشهر', '09144123449', '5371734406', 1, '555555', '8799', '2019-11-24 11:13:43', '2019-02-01 18:16:34', '2019-11-24 11:13:43', NULL),
(2, 3, 2, 0, 1, '633', 'تحویل حضوری', '09155620366', NULL, 0, ' ', ' ', '2019-11-24 11:09:10', '2019-03-02 04:14:15', '2019-11-24 11:09:10', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_contents_order_id_foreign` (`order_id`),
  KEY `order_contents_book_id_foreign` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_contents`
--

INSERT INTO `order_contents` (`id`, `order_id`, `book_id`, `count`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 23, 1, 16000, '2019-02-01 18:16:35', '2019-02-01 18:16:35', NULL),
(2, 2, 21, 1, 42000, '2019-03-02 04:14:15', '2019-03-02 04:14:15', NULL);

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mohsen2@gmail.com', '$2y$10$eougp9YqVdFYfWx4ttpSnOialqXb4GYPKeWDFBSiaoc2pWYkTmEWm', '2019-01-29 23:26:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `is_success`, `retrival_ref_no`, `system_trace_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 16000, 1, '321945808492', '000023', '2019-02-01 18:16:34', '2019-02-01 18:16:34', NULL),
(2, 21, 42000, 1, '322086503775', '000066', '2019-03-02 04:14:15', '2019-03-02 04:14:15', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'uploads/images/sliders/2019/01/cover.jpg', '2019-01-08 20:23:23', '2019-01-08 20:23:47', '2019-01-08 20:23:47'),
(2, 'uploads/images/sliders/2019/01/cover.jpg', '2019-01-08 20:24:08', '2019-01-09 09:52:56', '2019-01-09 09:52:56'),
(3, 'uploads/images/sliders/2019/01/cover.jpg', '2019-01-08 20:24:14', '2019-01-08 20:24:14', NULL),
(4, 'uploads/images/sliders/2019/01/cover.jpg', '2019-01-09 09:53:10', '2019-01-15 09:17:37', '2019-01-15 09:17:37'),
(5, 'uploads/images/sliders/2019/01/cover.jpg', '2019-01-09 14:49:35', '2019-01-15 09:17:34', '2019-01-15 09:17:34'),
(6, 'uploads/images/sliders/2019/01/cover.jpg', '2019-01-09 19:03:40', '2019-01-15 09:17:28', '2019-01-15 09:17:28'),
(7, 'uploads/images/sliders/2019/02/05d09h20mpgwLJqCudK.jpg', '2019-02-05 17:50:59', '2019-02-05 17:50:59', NULL),
(8, 'uploads/images/sliders/2019/02/05d09h21mmvC01qVrXM.jpg', '2019-02-05 17:51:14', '2019-02-05 17:51:14', NULL),
(9, 'uploads/images/sliders/2019/02/05d09h21mRBUEZ0fn49.jpg', '2019-02-05 17:51:37', '2019-02-05 17:51:37', NULL),
(10, 'uploads/images/sliders/2019/02/05d09h21moRiaPSOesc.jpg', '2019-02-05 17:51:57', '2019-02-05 17:51:57', NULL),
(11, 'uploads/images/sliders/2019/02/05d09h22meyvvBHEsPW.jpg', '2019-02-05 17:52:28', '2019-02-05 17:52:28', NULL),
(12, 'uploads/images/sliders/2019/02/05d09h22mcLdZwwf8Eu.jpg', '2019-02-05 17:52:43', '2019-02-05 17:52:43', NULL),
(13, 'uploads/images/sliders/2019/02/05d09h23mWRjtpu1iTX.jpg', '2019-02-05 17:53:01', '2019-02-05 17:53:01', NULL),
(14, 'uploads/images/sliders/2019/02/05d09h23mceeoHMVZqI.jpg', '2019-02-05 17:53:18', '2019-02-05 17:53:18', NULL),
(15, 'uploads/images/sliders/2019/02/05d09h23mPO5YtuuY4Y.jpg', '2019-02-05 17:53:34', '2019-02-05 17:53:34', NULL),
(16, 'uploads/images/sliders/2019/02/05d09h23mL9EIOFapN4.jpg', '2019-02-05 17:53:54', '2019-02-05 17:53:54', NULL),
(17, 'uploads/images/sliders/2019/02/05d09h24mlPnugImJAq.jpg', '2019-02-05 17:54:09', '2019-02-05 17:54:09', NULL),
(18, 'uploads/images/sliders/2019/02/05d09h24mDol4ysUo0K.jpg', '2019-02-05 17:54:25', '2019-02-05 17:54:25', NULL),
(19, 'uploads/images/sliders/2019/02/05d09h24m5WplYAOqx2.jpg', '2019-02-05 17:54:44', '2019-02-15 21:04:06', '2019-02-15 21:04:06'),
(20, 'uploads/images/sliders/2019/02/05d09h25mVKQKHV6evS.jpg', '2019-02-05 17:55:09', '2019-02-05 17:55:09', NULL),
(21, 'uploads/images/sliders/2019/02/05d09h25majcunyhIVT.jpg', '2019-02-05 17:55:30', '2019-02-05 17:55:30', NULL),
(22, 'uploads/images/sliders/2019/02/05d09h25mS5z3VRCTIs.jpg', '2019-02-05 17:55:43', '2019-02-05 17:55:43', NULL),
(23, 'uploads/images/sliders/2019/02/05d09h25mxOyu0DlLxw.jpg', '2019-02-05 17:55:57', '2019-02-05 17:55:57', NULL),
(24, 'uploads/images/sliders/2019/02/05d09h26mnMGl0utKpG.jpg', '2019-02-05 17:56:12', '2019-02-05 17:56:12', NULL),
(25, 'uploads/images/sliders/2019/02/05d09h26mKuEzcemMAS.jpg', '2019-02-05 17:56:28', '2019-02-05 17:56:28', NULL),
(26, 'uploads/images/sliders/2019/02/05d09h26mPMnYcneSGc.jpg', '2019-02-05 17:56:57', '2019-02-05 17:56:57', NULL),
(27, 'uploads/images/sliders/2019/02/05d09h27myxq8OMTNSk.jpg', '2019-02-05 17:57:17', '2019-02-05 17:58:31', '2019-02-05 17:58:31'),
(28, 'uploads/images/sliders/2019/02/05d09h27mQRm7V8opjG.jpg', '2019-02-05 17:57:30', '2019-02-05 17:57:30', NULL),
(29, 'uploads/images/sliders/2019/02/05d09h27ma6KhggLUyP.jpg', '2019-02-05 17:57:50', '2019-02-05 17:57:50', NULL),
(30, 'uploads/images/sliders/2019/02/05d09h28mZWS5sABOTN.jpg', '2019-02-05 17:58:22', '2019-02-05 17:58:22', NULL),
(31, 'uploads/images/sliders/2019/02/05d09h30mh1fhxNvnR7.jpg', '2019-02-05 18:00:51', '2019-02-05 18:00:51', NULL),
(32, 'uploads/images/sliders/2019/02/05d09h31mdbR02r6c1x.jpg', '2019-02-05 18:01:21', '2019-02-05 18:01:21', NULL),
(33, 'uploads/images/sliders/2019/02/05d09h32mwfRqTJ4SQl.jpg', '2019-02-05 18:02:07', '2019-02-05 18:02:07', NULL),
(34, 'uploads/images/sliders/2019/02/05d09h33mtHwORnmiMb.jpg', '2019-02-05 18:03:20', '2019-05-09 11:04:41', '2019-05-09 11:04:41'),
(35, 'uploads/images/sliders/2019/02/05d10h53mGPdXNxHBP0.jpg', '2019-02-05 19:23:07', '2019-02-05 19:23:07', NULL);

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
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'محسن فرجامی', 'mohsen1@gmail.com', '09145821998', 'user', '$2y$10$cQ1Ec.iEFyi42oQ/ZUy0Me2ElaZAhmKcChR9eRMdMT4EOA/QZY47.', 'MB2OPzcxsP4oL9OJVqSldctidpqskUwBEmJ2LlHwQoOUoS2lg5LE8mZFwD6O', '2018-12-14 20:30:00', '2018-12-14 20:30:00', NULL),
(2, 'محسن فرجامی', 'mohsen@gmail.com', '09145821998', 'admin', '$2y$10$cQ1Ec.iEFyi42oQ/ZUy0Me2ElaZAhmKcChR9eRMdMT4EOA/QZY47.', 'fTywyA8vAusD57mSqaim7P3bMEZbOlxeHNjiN8qLJh855QFeM3sDyFyOdyPD', '2019-01-08 16:36:44', '2019-01-08 16:36:44', NULL),
(3, 'محسن فرجامی', 'mohsen2@gmail.com', '09145821998', 'user', '$2y$10$ImbJQHOTzjGnhP1PgpzpIuo4xeIxSA4UkOj/LJ/ZaG7HxNsx8aWPq', 'xC9hHCTAsIqSECFtG1jNexMGYuZZxxKAA2QVFisnmrRc8pIwh01WCUuQp0LG', '2019-01-09 11:04:32', '2019-01-09 11:04:32', NULL),
(4, 'مهندس مراد پور', 'moradpoor@gmail.com', '09148500544', 'admin', '$2y$10$tM3jxgON3zuRJ5UMHSrLK.PHJ7b8xs1s5keuo3xfzp7GKbJ5Cdgz2', 'tO81YWmiZSdxGpmTCRGMN8NvWkVSaWDNlfuKt1yQmF1cpZbmZIee5YrYCDlc', '2019-01-15 09:15:43', '2019-01-28 21:35:19', NULL),
(5, 'عبدالهی', 'sina20sina27@yahoo.com', '4131452454', 'admin', '$2y$10$bXwzpMk4oarLDi4OUvZHZemIfxXMbYT0J6WEU9CEbDyB6WvSXz4cO', 'skNIEkAqjXiFeDPbC7t29ud9Aijl839i2ogVqhfC4t8l6fzAkcvroX0q3VZY', '2019-01-19 07:23:02', '2019-02-05 17:07:36', NULL),
(6, 'MohsenF', 'mnfi340@gmail.com', '09145821998', 'user', '$2y$10$3k1ijV17S/lrxyqi7BBOBetPv9FHcsze6z8e2ZzUOAanJGSHinOUO', 'jICwNYsZMrPJYcODvS0yhxF9qsCuaa6qnOsWy3C3Rp7SSczSG3PuooTNU3SE', '2019-01-29 23:27:35', '2019-05-09 12:03:04', '2019-05-09 12:03:04'),
(9, 'جواد مصرآبادی', 'mesrabadi@gmail.com', '09144123449', 'user', '$2y$10$ImbJQHOTzjGnhP1PgpzpIuo4xeIxSA4UkOj/LJ/ZaG7HxNsx8aWPq', 'KHRHu5ECPhSQgNItZmzdCON1ooZ0rn2ST4yMH68NlZeq9f40Lot0NIuMbuBL', '2019-02-01 18:09:52', '2019-02-01 18:09:52', NULL),
(16, 'mohsen', 'admin@azaruniv.ac.ir', '09145821998', 'user', '$2y$10$1Lc0aii/wjel2JvQgPc5ver//EwEUnsvjTLEA2PmVKteRC7Ay6kU2', 'tN0UuCxQeaWWiV7asA8vuqzVmj2rdX5t96qSr8xU7MiR3pTkNwcwI3CfLGmv', '2019-02-01 22:21:58', '2019-02-01 22:21:58', NULL),
(18, 'علی عجمی', 'aajami83@yahoo.com', '09143183362', 'user', '$2y$10$fSyTNm36oY3sE96.q/fXJuSGt4oXFE7QBRmbX3P.9WBUkMaG.W0X.', 'RDjJfWtVowsSckXzz2rGsm5iU5Fq6FOjonvESsFuYS7FmyR2RBntzyo6Jbjs', '2019-02-08 09:00:19', '2019-02-08 09:00:19', NULL),
(19, 'النازحیدری', 'pomaheidari66@gmail.com', '09148146537', 'user', '$2y$10$k7YXyiQbnLZ2UOFnSTbhFepOwYJsuDJRoMNjU870PqcEn9qpaDLSa', NULL, '2019-02-14 06:50:01', '2019-02-14 06:50:01', NULL),
(20, 'محمد باب اله زاده', 'mohammad.bobi@yahoo.com', '09124323971', 'user', '$2y$10$5LhV4L3HTrcjUYB7ZUTBl.BL0V1UJ6UuiLtn4vw/LWgi/a5cjogx.', 'VCRATpuOvEN4up1nyqLu2emnjZnzsvOD3gC6rbGSCFMaWfzSc4y6xBKNU3l9', '2019-02-16 03:50:32', '2019-02-16 03:50:32', NULL),
(21, 'عباسعلی اسماعیلی', 'abesmaeili@um.ac.ir', '09155620366', 'user', '$2y$10$A0F4ZQqDGNSpZcvpFBEMc.uDlQXKMkyJcLVR6LmnXeirZ0IGLqVu.', NULL, '2019-03-02 04:09:31', '2019-03-02 04:09:31', NULL),
(22, 'مریم سلطانی', 'maryamsoltani64@gmail.com', '09126953409', 'user', '$2y$10$jHhEFbvWTaKyWIaqIFQi5.DOx3iaEV.wCjRUzqmIV2pDxh7jXoyCK', 'yyLLIrHAWl3iuY4WhWanysyZiYDb1JuFp4h3EFeQKewESBhcfwlpbUCqGDLH', '2019-03-05 20:29:48', '2019-03-05 20:29:48', NULL),
(23, 'admin', 'admin@lifemo.net', '09876545678', 'user', '$2y$10$qI/QQ3x4QEpMGlkTwjWnbuJFudvjXGFyWAIrf2jvfywFciZvMMG2e', 's03tAUiKilWResToekb8dx0Gim1qjhiK6H6gavF7vGWIgSlfL6lgJWfVGNg0', '2019-05-08 14:05:44', '2019-05-08 14:05:44', NULL);

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
