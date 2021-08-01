-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 11:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Movies', 1, '2021-07-19 19:40:46', '2021-07-19 19:40:46'),
(2, 'Series', 1, '2021-07-19 19:40:56', '2021-07-19 19:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_advertisements`
--

CREATE TABLE `customer_advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `advertisement_id` bigint(20) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `days` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `ads_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `episode_id` bigint(20) NOT NULL DEFAULT 0,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `post_id`, `episode_id`, `link`, `file_size`, `server_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'https://drive.google.com/file/d/1lWZZV6vNMKN03SlXU5F-k7_VFUjJlVWi/view?usp=sharing', '1GB', 2, '2021-07-19 20:00:50', '2021-07-19 20:00:50'),
(3, 2, 1, 'https://mega.io/', '500MB', 1, '2021-07-21 00:06:31', '2021-07-21 00:06:31'),
(4, 2, 2, 'https://drive.google.com/drive/my-drive', '450MB', 2, '2021-07-21 00:17:21', '2021-07-21 00:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `post_id`, `number`, `title`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Start Episode', '2021-07-20 23:18:11', '2021-07-20 23:18:11'),
(2, 2, 2, 'Second Episode', '2021-07-20 23:20:09', '2021-07-20 23:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Action', 1, '2021-07-19 19:41:07', '2021-07-19 19:41:07'),
(2, 'Drama', 1, '2021-07-19 19:41:14', '2021-07-19 19:41:14'),
(3, 'Laugh', 1, '2021-07-19 19:41:36', '2021-07-19 19:41:36'),
(4, 'Knowledge', 1, '2021-07-19 19:41:50', '2021-07-19 19:41:50'),
(5, 'Cartoon Movie', 1, '2021-07-19 19:41:58', '2021-07-21 03:03:28');

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
(3, '2021_07_05_155926_create_categories_table', 1),
(4, '2021_07_05_160135_create_genres_table', 1),
(5, '2021_07_05_160317_create_qualities_table', 1),
(6, '2021_07_05_160350_create_posts_table', 1),
(7, '2021_07_05_160432_create_post_genres_table', 1),
(8, '2021_07_05_160509_create_episodes_table', 1),
(9, '2021_07_05_160533_create_servers_table', 1),
(10, '2021_07_05_160600_create_downloads_table', 1),
(11, '2021_07_05_160625_create_visitors_table', 1),
(12, '2021_07_05_160704_create_customers_table', 1),
(13, '2021_07_05_160731_create_advertisements_table', 1),
(14, '2021_07_05_160808_create_customer_advertisements_table', 1),
(15, '2021_07_05_160832_create_photos_table', 1);

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `post_id`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, '60f6349312b7b_movie_multiple_photomovie_photo.jpg', '2021-07-19 19:57:31', '2021-07-19 19:57:31'),
(2, 1, '60f63823d232e_movie_multiple_photomovie_photo.jpg', '2021-07-19 20:12:43', '2021-07-19 20:12:43'),
(3, 1, '60f6386d0ded7_movie_multiple_photomovie_photo.jpg', '2021-07-19 20:13:57', '2021-07-19 20:13:57'),
(4, 1, '60f6392c8d728_movie_multiple_photomovie_photo.jpg', '2021-07-19 20:17:08', '2021-07-19 20:17:08'),
(8, 2, '60f93c1dea1c1_movie_multiple_photomovie_photo.jpg', '2021-07-22 03:06:29', '2021-07-22 03:06:29'),
(9, 2, '60f93c97acac1_movie_multiple_photomovie_photo.jpg', '2021-07-22 03:08:31', '2021-07-22 03:08:31'),
(11, 2, '60f93dbca19b7_movie_multiple_photomovie_photo.jpg', '2021-07-22 03:13:24', '2021-07-22 03:13:24'),
(12, 2, '60f93dcda6b6a_movie_multiple_photomovie_photo.png', '2021-07-22 03:13:41', '2021-07-22 03:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actors` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_year` year(4) NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `is_published` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `original_name`, `description`, `photo`, `director`, `actors`, `slug`, `excerpt`, `release_year`, `trailer`, `quality_id`, `category_id`, `user_id`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Bank Hacker', 'Hacker Movie', '<p><strong>နီကလက်ကေ့ဂျ်ကို ပေါကားပဲ ရိုက်နေတယ် ဆိုသူတွေအတွက် ချပြလိုက်ပါပြီ။</strong></p>\r\n\r\n<p><strong>ဒီရုပ်ရှင်မှာတော့ သူက ရော်ဘီ ဆိုတဲ့ တောထဲမှာတစ်ယောက်တည်း နေတဲ့ လူကြီးပေါ့။</strong></p>\r\n\r\n<p><strong>ရော်ဘီ့မှာ ဝက်မ တစ်ကောင်ရှိတယ်။ အဲဒီဝက်မက သူ့မိန်းမမသေခင် အမှတ်တရ ပေးခဲ့တာမျိုးတော့ မဟုတ်ပါဘူး။</strong></p>\r\n\r\n<p><strong>အဲဒီဝက်မက မှိုရှာတာတော်ပြီး ရော်ဘီက မှိုတွေရောင်းစားတယ်။</strong></p>\r\n\r\n<p><strong>ဒီတော့ သူ ဝက်မကိုချစ်တယ်။ ရော်ဘီဆီကနေ မှိုဝယ်နေကျ ဖောက်သည်ကောင်လေးတစ်ယောက်ရှိတယ်။</strong></p>\r\n\r\n<p><strong>တစ်နေ့တော့ ညဘက်ကြီးရော်ဘီကို ရိုက်ပြီး ဝက်မကို လုသွားတယ်။</strong></p>\r\n\r\n<p><strong>အဲဒီဝက်မကို ပြန်ရဖို့ ရော်ဘီတစ်ယောက် မြို့ပေါ်တက်လာရတော့တာပဲ။</strong></p>\r\n\r\n<p><strong>ဒီတော့မှ ရော်ဘီဟာ တစ်ချိန်က မြို့ထဲမှာ လူသိများခဲ့တဲ့ ရာဇဝင်ရှိတဲ့ ဆရာကြီးတစ်ယောက်ဆိုတာ သိလာရတော့တယ်။</strong></p>\r\n\r\n<p><strong>လူသတ်သမားကြီးတော့မဟုတ်ဘူး စားဖိုမှူးကြီးမို့လူသိများတာ။ လူသိများပေမယ့် ပြန်လာတော့လည်း သိပ်သောက်ဖက်မလုပ်ကြပါဘူး။</strong></p>\r\n\r\n<p><strong>ဒါနဲ့ပဲရော်ဘီတစ်ယောက် တစ်နေရာပြီး တစ်နေရာလိုက်စုံစမ်းရင်း လူမိုက်တွေနဲ့လည်း ရင်ဆိုင်ရတာပဲ။</strong></p>\r\n\r\n<p><strong>ရင်ဆိုင်တော့လည်း အထိုးခံရတာပေါ့။ ဒီလိုနဲ့နောက်ဆုံး ဝက်ကို ခိုးသွားတဲ့လူက နယ်နယ်ရရလူမဟုတ်တာကို သိလာချိန်မှာတော့&hellip;</strong></p>\r\n\r\n<p><strong>တစ်ခုတော့ ရှိတယ် တစ်ခုခုကို ဆုံးရှုံးရတဲ့ ခံစားချက်ဟာ အသက်ရှင်နေကြောင်း ဖြစ်တည်နေသေးကြောင်း သက်သေပါပဲတဲ့။</strong></p>', '60f91727e96bf_movie_photo.jpg', 'Thaw Ni Co', 'Nicolat', 'Bank-Hacker', 'နီကလက်ကေ့ဂျ်ကို ပေါကားပဲ ရိုက်နေတယ် ဆိုသူတွေအတွက် ချပြလိုက်ပါပြီ။\r\n\r\nဒီရုပ်ရှင်မှာတော့ သူက ရော်ဘီ ဆိ ...', 2013, 'https://www.youtube.com/watch?v=VSJTPbAm-SM', 2, 1, 1, '0', '2021-07-19 19:55:43', '2021-07-22 00:28:47'),
(2, 'Love Action', 'Love son yong', '<p><em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...<em>detail</em> &middot; an individual or minute part; an item or particular. &middot; particulars collectively; minutiae. &middot; attention to or treatment of a subject in individual or&nbsp;...</p>', '60f7ac00e2062_movie_photo.jpg', 'No Name', 'Son Yong', 'Love-Action', 'detail &middot; an individual or minute part; an item or particular. &middot; particulars collective ...', 2021, 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjN5q_KsvPxAhV-ILcAHWdKDQQQFjAMegQIJxAD&url=https%3A%2F%2Fwww.dictionary.com%2Fbrowse%2Fdetails&usg=AOvVaw0DN9CbgIdKsGKXTjscsRNm', 1, 2, 1, '0', '2021-07-20 22:39:21', '2021-07-20 22:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `post_genres`
--

CREATE TABLE `post_genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `genre_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_genres`
--

INSERT INTO `post_genres` (`id`, `post_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2021-07-20 22:39:21', '2021-07-20 22:39:21'),
(4, 1, 5, '2021-07-22 00:28:48', '2021-07-22 00:28:48'),
(5, 1, 4, '2021-07-22 00:28:48', '2021-07-22 00:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `qualities`
--

CREATE TABLE `qualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualities`
--

INSERT INTO `qualities` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1080p', 1, '2021-07-19 19:42:06', '2021-07-19 19:42:06'),
(2, '720p', 1, '2021-07-19 19:42:12', '2021-07-19 19:42:12'),
(3, '480p', 1, '2021-07-19 19:42:18', '2021-07-19 19:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `name`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Mega', '60f6316a8ae5b_icon.png', 'https://mega.io/', '2021-07-19 19:44:02', '2021-07-19 19:44:02'),
(2, 'Google Drive', '60f631c3278e4_icon.png', 'https://drive.google.com/drive/my-drive', '2021-07-19 19:45:31', '2021-07-19 19:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zaw Min Htwe', 'zawminhtwe199475@gmail.com', NULL, '$2y$10$nnaWkinykLN9naZZuF87s.wBIBV.i1ySy4/0Lt7HV0iUgHPaNQUEK', '60f6327211b98_photo.jpg', 'zQE3g16BpJuM2oGLhpEciyKLbztDSf25w1K5Gt4VVkMMlAdK7hR7w8BtpzAC', '2021-07-19 19:40:31', '2021-07-19 19:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_advertisements`
--
ALTER TABLE `customer_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_genres`
--
ALTER TABLE `post_genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_advertisements`
--
ALTER TABLE `customer_advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_genres`
--
ALTER TABLE `post_genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
