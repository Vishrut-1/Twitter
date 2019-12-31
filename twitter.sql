-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2019 at 01:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tweets_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `tweets_id`, `user_id`, `parent_id`, `comment`, `created_at`, `updated_at`) VALUES
(32, 7, 1, NULL, 'asdas', '2019-12-18 00:31:47', '2019-12-18 00:31:47'),
(33, 7, 1, 32, '6789tu', '2019-12-18 00:31:56', '2019-12-18 00:31:56'),
(34, 7, 1, 32, '86878', '2019-12-18 00:32:07', '2019-12-18 00:32:07'),
(35, 7, 1, NULL, 'yg', '2019-12-18 00:32:24', '2019-12-18 00:32:24'),
(36, 7, 1, 35, '78989iyu', '2019-12-18 00:32:39', '2019-12-18 00:32:39'),
(37, 7, 1, 35, 'yut', '2019-12-18 00:32:45', '2019-12-18 00:32:45'),
(38, 7, 3, 35, 'raju lal', '2019-12-18 00:34:55', '2019-12-18 00:34:55'),
(39, 7, 3, 32, 'Hi Raju Maharaj !', '2019-12-18 00:53:57', '2019-12-18 00:53:57'),
(40, 10, 3, NULL, 'gdfs', '2019-12-18 01:29:18', '2019-12-18 01:29:18'),
(41, 10, 3, 40, '567u6', '2019-12-18 01:29:26', '2019-12-18 01:29:26'),
(42, 10, 3, 40, 'ghj', '2019-12-18 01:29:32', '2019-12-18 01:29:32'),
(43, 9, 3, NULL, 'Hello How r u ?', '2019-12-18 03:16:33', '2019-12-18 03:16:33'),
(44, 9, 3, 43, 'I am Fine', '2019-12-18 03:16:51', '2019-12-18 03:16:51'),
(45, 9, 3, 43, 'ok', '2019-12-18 03:24:55', '2019-12-18 03:24:55'),
(46, 7, 3, 35, 'kjoikjkol', '2019-12-18 04:23:13', '2019-12-18 04:23:13'),
(47, 10, 3, 40, '.nmjknbkjnjkn', '2019-12-18 04:23:40', '2019-12-18 04:23:40'),
(48, 10, 1, NULL, 'Hello', '2019-12-18 23:24:42', '2019-12-18 23:24:42'),
(49, 10, 1, 48, 'Hi', '2019-12-18 23:24:49', '2019-12-18 23:24:49'),
(58, 10, 1, 48, 'Hello', '2019-12-23 05:30:22', '2019-12-23 05:30:22'),
(59, 10, 1, 48, 'dsg', '2019-12-23 05:30:54', '2019-12-23 05:30:54'),
(68, 109, 1, NULL, 'fsd', '2019-12-23 06:27:38', '2019-12-23 06:27:38'),
(69, 109, 1, 68, 'uyi', '2019-12-23 06:27:45', '2019-12-23 06:27:45'),
(70, 109, 1, 68, 'dfgh', '2019-12-23 06:27:48', '2019-12-23 06:27:48'),
(71, 109, 1, 68, 'ghj', '2019-12-23 06:31:51', '2019-12-23 06:31:51'),
(72, 109, 1, 68, 'iuop', '2019-12-23 06:32:15', '2019-12-23 06:32:15'),
(73, 109, 1, 68, 'yghj', '2019-12-23 06:39:33', '2019-12-23 06:39:33'),
(74, 43, 1, NULL, 'uuiy', '2019-12-23 23:26:23', '2019-12-23 23:26:23'),
(75, 109, 1, 68, 'hyi', '2019-12-23 23:35:13', '2019-12-23 23:35:13'),
(76, 114, 1, NULL, 'fsad', '2019-12-24 01:48:30', '2019-12-24 01:48:30'),
(77, 114, 1, 76, 'fdf', '2019-12-24 01:49:14', '2019-12-24 01:49:14'),
(78, 112, 1, NULL, 'afds', '2019-12-24 01:51:15', '2019-12-24 01:51:15'),
(79, 114, 1, NULL, 'asdfdsg', '2019-12-24 04:50:09', '2019-12-24 04:50:09');

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
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `follow_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `user_id`, `follow_id`, `created_at`, `updated_at`) VALUES
(147, 1, 4, '2019-12-24 01:00:21', '2019-12-24 01:00:21'),
(149, 1, 3, '2019-12-24 04:11:16', '2019-12-24 04:11:16'),
(150, 1, 1, '2019-12-24 05:24:26', '2019-12-24 05:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `like_dislike`
--

CREATE TABLE `like_dislike` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tweets_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `like` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_dislike`
--

INSERT INTO `like_dislike` (`id`, `user_id`, `tweets_id`, `created_at`, `updated_at`, `like`) VALUES
(48, 3, 43, '2019-12-20 07:08:58', '2019-12-20 07:09:09', 0),
(53, 1, 43, '2019-12-23 23:29:42', '2019-12-23 23:29:42', 1),
(54, 1, 112, '2019-12-24 01:23:12', '2019-12-24 01:23:12', 1),
(55, 1, 109, '2019-12-24 01:23:18', '2019-12-24 01:23:18', 1),
(56, 1, 7, '2019-12-24 01:31:56', '2019-12-24 01:31:56', 1),
(57, 1, 14, '2019-12-24 01:32:07', '2019-12-24 01:35:05', 1),
(58, 1, 12, '2019-12-24 01:34:58', '2019-12-24 01:34:58', 1);

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
(4, '2019_12_03_065003_create_tweets_table', 2),
(5, '2019_12_03_070246_create_comments_table', 3),
(6, '2019_12_03_071126_create_profile_table', 4),
(7, '2019_12_03_071902_create_like_dislike_table', 5),
(8, '2019_12_03_072553_create_follow_table', 6),
(9, '2019_12_10_053326_add_like_to_like_dislike', 7);

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
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `display_picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tweets_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `name`, `bio`, `location`, `dob`, `display_picture`, `created_at`, `updated_at`, `tweets_id`) VALUES
(52, 1, 'VishrutNaik', 'Software Developer', 'Anand', '1997-05-09', 'Ashton.png', '2019-12-06 04:48:29', '2019-12-20 05:48:49', 0),
(54, 2, 'Vismay', 'fasf', 'fas', '1997-09-20', '4.jpg', '2019-12-11 23:48:49', '2019-12-12 01:16:44', NULL),
(55, 3, 'Raj HIgrajiya', 'hi i am raj', 'Bhvnagar', '0048-05-09', '1.jpg', '2019-12-12 00:11:15', '2019-12-18 07:28:24', NULL),
(56, 4, 'Sanket', 'Hi This is Sanket Lakhani', 'Ahemdabad', '1996-12-15', 'saln.jpeg', '2019-12-13 04:10:42', '2019-12-13 04:10:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `content`, `image`, `created_at`, `updated_at`, `parent_id`) VALUES
(7, 1, 'asfgsadgdfshdghjf', 'SampleJPGImage_10mbmb.jpg', '2019-12-09 06:15:56', '2019-12-09 06:15:56', 0),
(8, 1, 'Gear up for 2 days of action with panel discussions, fireside chats & one-on-one interviews with stalwarts from various industries like RC Bhargava, Chairman, \r\n@Maruti_Corp\r\n, on 16th & 17th Dec at the #IndiaEconomicConclave. \r\n@IDFCFIRSTBank\r\n\r\nBuy now: http://bit.ly/2OILhZE', 'SampleJPGImage_100kbmb.jpg', '2019-12-09 06:23:16', '2019-12-09 06:23:16', 0),
(9, 1, 'Watch The New Song ........\r\n\r\nhttps://www.youtube.com/watch?v=hMy5za-m5Ew', 'SampleJPGImage_20mbmb.jpg', '2019-12-09 06:59:52', '2019-12-09 06:59:52', 0),
(10, 1, '#Live | Showdown over the Citizenship (Amendment) Bill continues in the Lok Sabha.\r\n‘Selective sensitivity & vote-bank politics are evident in the Bill’, says MP \r\n@Supriya_sule\r\n.', 'SampleJPGImage_10mbmb.jpg', '2019-12-09 08:12:43', '2019-12-09 08:12:43', 0),
(12, 1, 'AFASF', 'Screenshot from 2019-12-11 16-14-16.png', '2019-12-11 05:17:00', '2019-12-11 05:17:00', 0),
(14, 1, '#INDvWI #WIvIND\r\n\r\nHere we go!\r\n\r\n@ImRo45\r\n, \r\n@klrahul11\r\n are out in the middle\r\n\r\nSheldon Cottrell to open attack for the West Indies\r\n\r\nFOLLOW LIVE:', 'virat.jpeg', '2019-12-11 08:08:07', '2019-12-24 05:02:42', 0),
(15, 3, '123456', '13-object-model-overview.png', '2019-12-13 06:28:07', '2019-12-20 06:35:36', 0),
(40, 4, '#Watch | \"This is a scared government with a sole agenda of winning elections\": Filmmaker Anurag Kashyap on use of force during protests against #CitizenshipAct. \r\n\r\n#CAAProtests #CAA2019\r\n\r\nMore on http://ndtv.com and NDTV 24x7', '4.jpeg', '2019-12-19 06:18:38', '2019-12-19 06:18:38', NULL),
(41, 4, 'This festive season calls for one GOOD surprise! Can you guess what it is?\r\n#GoodNewwz in cinemas 27th December.\r\n\r\n@akshaykumar\r\n #KareenaKapoorKhan \r\n@diljitdosanjh\r\n \r\n@karanjohar\r\n \r\n@apoorvamehta18\r\n \r\n@ShashankKhaitan\r\n \r\n@raj_a_mehta\r\n \r\n@NotSoSnob', '6.jpg', '2019-12-19 06:19:14', '2019-12-19 06:19:14', NULL),
(43, 2, 'The citizen’ship’ doesn’t seem to have sailed. Curfew, curbs & crackdown across India.\r\nIntel alert about impending violence in Delhi\'s Trilokpuri, cops use drones to monitor the area.\r\n\r\nMore details by TIMES NOW\'s Priyank. | #ProtestYaPolitics', '5.jpeg', '2019-12-19 06:21:22', '2019-12-19 06:21:22', NULL),
(109, 3, NULL, NULL, '2019-12-23 05:53:18', '2019-12-23 05:53:18', 43),
(112, 3, 'dsfvvg', '1.jpg', '2019-12-23 08:12:40', '2019-12-23 08:12:40', NULL),
(114, 1, NULL, NULL, '2019-12-24 01:38:05', '2019-12-24 01:38:05', 7);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'VishrutNaik', 'vishrutnaik43@gmail.com', NULL, '$2y$10$scgwjj03RgGMmu9SzIYD3ONNH12ExYiFsiEniLXc40rV2xjf8h812', NULL, '2019-12-03 01:18:32', '2019-12-03 01:18:32'),
(2, 'VismayBhoi', 'vismay@gmail.com', NULL, '$2y$10$JudDtlvVN/We.t1fSwChQeAMsONUrtbGf2RKBJIq7oWclMy0wPsbO', NULL, '2019-12-11 23:15:37', '2019-12-11 23:15:37'),
(3, 'Raj', 'raj@gmail.com', NULL, '$2y$10$QREQa..ZClGVmmxyX5mXZeOcvXLUFxb62B5jWB5hYFz1PzhbzUgXi', NULL, '2019-12-12 00:10:33', '2019-12-12 00:10:33'),
(4, 'SanketLakhani', 'sanket@gmail.com', NULL, '$2y$10$2LUm7i71hXlXWW6ghtKkiOtlDOTjmF/aDtDZxx2WwDTq/lvOHJnPG', NULL, '2019-12-13 04:09:01', '2019-12-13 04:09:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_tweets_id_foreign` (`tweets_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follow_user_id_foreign` (`user_id`);

--
-- Indexes for table `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_dislike_user_id_foreign` (`user_id`),
  ADD KEY `like_dislike_tweets_id_foreign` (`tweets_id`);

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
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tweets_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `like_dislike`
--
ALTER TABLE `like_dislike`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_tweets_id_foreign` FOREIGN KEY (`tweets_id`) REFERENCES `tweets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD CONSTRAINT `like_dislike_tweets_id_foreign` FOREIGN KEY (`tweets_id`) REFERENCES `tweets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_dislike_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
