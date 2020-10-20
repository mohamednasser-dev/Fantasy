-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 03:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `center_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classification` enum('1st','2nd') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1st',
  `club_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournaments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `classification`, `club_name`, `tournaments`, `date_created`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, '1st', 'barshelona', 'sgh', '2020-10-11', 'sd', 'img_1602382719.jpg', '2020-10-11 02:00:54', '2020-10-11 02:19:22'),
(2, '1st', 'real madrid', 'dfgfx', '2020-10-11', 'adsf', 'img_1602382581.png', '2020-10-11 02:16:21', '2020-10-11 02:16:21'),
(3, '1st', 'liverpool', 'dfg', '2020-10-11', 'df', 'img_1602442038.png', '2020-10-11 18:46:20', '2020-10-11 18:47:18'),
(5, '1st', 'default club', 'fsgd', '2020-09-30', 'sadfs', 'default_club.png', '2020-10-11 19:04:39', '2020-10-11 19:04:39'),
(6, '1st', 'asdfds', 'sdf', '2020-10-09', 'sfg', 'default_club.png', '2020-10-11 19:09:48', '2020-10-11 19:09:48'),
(7, '1st', 'zamalik', 'ddsfgh', '2020-10-01', 'dfsgf', 'default_club.png', '2020-10-18 11:30:31', '2020-10-18 11:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `coach_name`, `age`, `image`, `desc`, `club_id`, `created_at`, `updated_at`) VALUES
(1, 'parcha coach', 47, 'img_1602382566.jpg', 'ertsyu', 1, '2020-10-11 02:16:06', '2020-10-11 03:09:21'),
(2, 'zineden zidan', 48, 'img_1602441161.jpg', 'sfdg', 2, '2020-10-11 18:32:41', '2020-10-11 18:32:41'),
(3, 'jurgen klopp', 40, 'img_1602442097.jpg', 'بيلا', 3, '2020-10-11 18:47:59', '2020-10-11 18:48:17'),
(5, 'default coach', 30, 'default_coach.png', '\\sadsf', 5, '2020-10-11 19:04:53', '2020-10-11 19:04:53'),
(6, 'v', 30, 'img_1603020656.jpg', 'dsgh', 7, '2020-10-18 11:30:56', '2020-10-18 11:30:56');

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
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_club_id` bigint(20) UNSIGNED NOT NULL,
  `away_club_id` bigint(20) UNSIGNED NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `home_score` bigint(255) NOT NULL DEFAULT 0,
  `away_score` bigint(10) NOT NULL DEFAULT 0,
  `status` enum('not started','started','ended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not started',
  `stadium_id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_club_id`, `away_club_id`, `time`, `date`, `home_score`, `away_score`, `status`, `stadium_id`, `tour_id`, `created_at`, `updated_at`) VALUES
(3, 2, 3, '10:50:00', '2020-10-13', 1, 1, 'started', 1, 3, '2020-10-11 15:56:11', '2020-10-19 11:13:53'),
(4, 2, 1, '16:30:00', '2020-10-13', 0, 0, 'not started', 1, 3, '2020-10-11 17:18:46', '2020-10-12 22:11:14'),
(5, 1, 2, '10:30:00', '2020-10-13', 2, 7, 'not started', 1, 3, '2020-10-11 18:49:49', '2020-10-12 22:11:30'),
(6, 1, 3, '10:30:00', '2020-10-13', 0, 0, 'started', 1, 3, '2020-10-11 19:11:38', '2020-10-12 22:11:46'),
(7, 1, 5, '16:30:00', '2020-10-14', 0, 0, 'not started', 3, 3, '2020-10-12 22:59:06', '2020-10-12 22:59:06'),
(8, 3, 1, '07:30:00', '2020-10-17', 0, 0, 'not started', 1, 3, '2020-10-12 22:59:35', '2020-10-12 22:59:35'),
(9, 2, 3, '23:11:00', '2020-10-29', 0, 0, 'not started', 2, 3, '2020-10-12 23:00:05', '2020-10-12 23:00:05'),
(10, 3, 1, '22:10:00', '2020-10-29', 0, 0, 'not started', 2, 3, '2020-10-12 23:00:38', '2020-10-12 23:00:38'),
(11, 1, 3, '19:09:00', '2020-10-31', 0, 0, 'not started', 2, 3, '2020-10-12 23:01:05', '2020-10-12 23:01:05'),
(12, 2, 5, '10:30:00', '2020-10-29', 0, 0, 'not started', 1, 3, '2020-10-12 23:01:34', '2020-10-12 23:01:34'),
(13, 1, 3, '05:50:00', '2020-10-20', 0, 0, 'not started', 2, 3, '2020-10-12 23:02:13', '2020-10-12 23:02:13'),
(14, 1, 3, '02:02:00', '2020-10-29', 0, 0, 'not started', 1, 3, '2020-10-18 14:33:31', '2020-10-18 14:33:31');

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
(4, '2020_10_09_202342_create_clubs_table', 1),
(5, '2020_10_09_202358_create_coaches_table', 1),
(6, '2020_10_09_202414_create_centers_table', 1),
(7, '2020_10_09_202425_create_players_table', 1),
(8, '2020_10_09_202503_create_tournaments_table', 1),
(12, '2020_10_09_202523_create_stadiums_table', 2),
(14, '2020_10_09_202525_create_matches_table', 3),
(15, '2020_10_19_094144_create_news_categories_table', 4),
(16, '2020_10_19_094148_create_news_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_words` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('player','coach','club','tournament') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_id` bigint(20) DEFAULT NULL,
  `player_id` bigint(20) DEFAULT NULL,
  `coach_id` bigint(20) DEFAULT NULL,
  `club_id` bigint(20) UNSIGNED DEFAULT NULL,
  `news_category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `key_words`, `description`, `type`, `tour_id`, `player_id`, `coach_id`, `club_id`, `news_category_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Initial release', 'Robust  powerful responsive', 'Robust admin lite is super flexible, powerful, clean & modern responsive bootstrap 4 admin template with unlimited possibilities. Robust admin lite can be used for any type of web applications: Project Management, eCommerce backends, CRM, Analytics, Fitness or any custom admin panels. It comes with 2 niche dashboards. Robust admin lite is powered with HTML 5, SASS, GRUNT, Gulp & Twitter Bootstrap 4 which looks great on Desktops, Tablets, and Mobile Devices. Have fun :)', 'player', NULL, NULL, NULL, 3, 1, 'img_1603102621.jpg', '2020-10-19 10:17:01', '2020-10-19 10:17:01'),
(3, 'new player score 3 goals in his first match', 'd dsdd dasssasfg', 'dsfgdfhjkhj', 'player', NULL, NULL, NULL, NULL, 1, 'img_1603108986.jpg', '2020-10-19 12:03:06', '2020-10-19 12:03:06'),
(4, 'lkdsn l ,asdnflkad', 'das d fds  ass', 'ds ag a ad af', 'player', NULL, 1, NULL, NULL, 1, 'img_1603109085.jpeg', '2020-10-19 12:04:45', '2020-10-19 12:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'matches', NULL, '2020-10-19 08:57:23'),
(4, 'events', '2020-10-19 08:56:59', '2020-10-19 08:56:59');

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
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `center_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player_name`, `age`, `center_name`, `desc`, `image`, `club_id`, `created_at`, `updated_at`) VALUES
(1, 'Lionel Messi', '34', 'RM', 'fdghf', 'img_1602382785.jpg', 1, '2020-10-11 02:19:45', '2020-10-11 17:16:52'),
(2, 'neymar', '203', 'LWB', 'dsdfhg', 'img_1602382872.jpg', 1, '2020-10-11 02:21:12', '2020-10-11 02:21:12'),
(4, 'mohamed salah', '28', 'CDM', 'safdsg', 'default_player.png', 1, '2020-10-11 18:26:33', '2020-10-11 18:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stadium_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `stadium_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'stadium 1', 'img_1602431753.jpg', '2020-10-11 15:55:53', '2020-10-11 15:55:53'),
(2, 'stadium num2', 'img_1602436636.JPG', '2020-10-11 17:17:16', '2020-10-11 17:17:16'),
(3, 'default', 'default_stadium.png', '2020-10-11 19:01:17', '2020-10-11 19:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` enum('1st','2nd') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tour_name`, `classification`, `created_at`, `updated_at`) VALUES
(3, 'Champions League', '2nd', '2020-10-11 02:15:39', '2020-10-19 11:07:03'),
(4, 'kw lege', '1st', '2020-10-19 10:57:25', '2020-10-19 10:57:25'),
(5, 'gf', '1st', '2020-10-19 10:58:27', '2020-10-19 10:58:27'),
(6, 'dgdssfs', '1st', '2020-10-19 10:59:08', '2020-10-19 10:59:08');

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
(1, 'mohamed nasser', 'admin@admin.com', NULL, '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', NULL, NULL, NULL),
(2, 'Creola Herman IV', 'estel.braun@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OjuIYbDEwv', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(3, 'Mrs. Kari Lemke III', 'gleason.genesis@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JGkE2IIvQt', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(4, 'Elisa Beier', 'cristopher.lesch@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'H29KVbmdeV', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(5, 'Ms. Jewell Tromp DDS', 'evan97@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PenTUwjlGr', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(6, 'Ricky Bartell', 'rubye.swift@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XlfOeMJEZG', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(7, 'Lilliana Kshlerin', 'ichristiansen@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ye66vFpAnS', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(8, 'Jacynthe Schmitt', 'kuhic.jeff@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NtHarC1Oyy', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(9, 'Jake Morar', 'madison62@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gIrZ4zrEKp', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(10, 'Jody Donnelly', 'bjacobs@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XoCJMYwv72', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(11, 'Emile Bailey', 'wilfrid.turcotte@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mOdHG5ZGs9', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(12, 'Keith Macejkovic', 'durgan.wilfred@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xT23ja0XJL', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(13, 'Joelle Langworth', 'lucius.schuster@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L28NfRKWG7', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(14, 'Rashawn Ritchie', 'raegan.hudson@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2kkeHvSByf', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(15, 'Mrs. Rhianna Mayer', 'mafalda.herzog@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FMGftSumnn', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(16, 'Miss Amanda Tremblay II', 'alakin@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SyaqMo4uWH', '2020-10-19 10:29:30', '2020-10-19 10:29:30'),
(17, 'Johathan Hammes', 'heathcote.frederique@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SCrZkKoF1K', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(18, 'Margaret Senger', 'theodora.huels@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lYJ4fJx6Ic', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(19, 'Kaela Auer IV', 'easter.anderson@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DCaxaa7PFC', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(20, 'Verla Hand', 'schuster.ladarius@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'w5N5u7KWwp', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(21, 'Leilani Graham', 'bauch.kayden@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TZju4eQAf6', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(22, 'Jessika Leannon', 'werner40@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aXNRVuXoid', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(23, 'Dr. Amya Borer I', 'jast.zita@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '606qmW6p4w', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(24, 'Jazmyne Cummings', 'chadrick.terry@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ESGGpf3onv', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(25, 'Kiera Labadie', 'sortiz@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0Zl54Br2Jt', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(26, 'Deshawn Muller', 'amely76@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'R7prKoGmuI', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(27, 'Keyshawn Gleason', 'herzog.lucious@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yXQYhAFeiX', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(28, 'Dr. Adolphus Goodwin', 'mbernier@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8iXEmnreaY', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(29, 'Yasmin Parker', 'christy.huel@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QmsqeSLr5i', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(30, 'Daphnee Moore', 'raegan.dubuque@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'thVvGfTMR8', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(31, 'Patsy Hand III', 'lucile32@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aTOGNRH9Yh', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(32, 'Dr. Alba Hilpert', 'haag.telly@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6TON4h68oB', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(33, 'Jared Halvorson', 'ggottlieb@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qk7qmte8gG', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(34, 'Murl Treutel', 'hbeer@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3pvAvzmjZB', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(35, 'Jackie Ruecker', 'xturner@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AX0by7lyw2', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(36, 'Emmanuel Greenholt', 'rstehr@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FD7DZAjljO', '2020-10-19 10:29:31', '2020-10-19 10:29:31'),
(37, 'Dexter Nicolas', 'joshua.dickinson@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LOAkzl3eps', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(38, 'Tamara Farrell Sr.', 'jimmie.parker@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'unIIgYjpYB', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(39, 'Mrs. Leila Hessel', 'jcassin@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4LBWdK1ksO', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(40, 'Benton Kirlin DVM', 'uwiegand@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sRVzZvd3z5', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(41, 'Carolyne Ferry', 'annetta40@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qo2NwKTmpZ', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(42, 'Prof. Krystal Kertzmann', 'karlee71@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RGsizP2Wyc', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(43, 'Rebecca Carter', 'lisette.brekke@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aeIV0UW9XV', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(44, 'Magnolia Kozey', 'cummerata.gayle@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'auWbptKaR7', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(45, 'Adrienne Johnson', 'merritt.wisoky@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qVneUKwNB3', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(46, 'Gilberto Glover', 'marjorie02@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DP2kJxcEv8', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(47, 'Trudie Ratke', 'johan.harvey@example.com', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imP3FxKGGO', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(48, 'Brooks Streich Jr.', 'weissnat.melba@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bKUQnJiimU', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(49, 'Cassie Champlin', 'tremayne50@example.net', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pCP7cAxvzg', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(50, 'Norma Dickens', 'araynor@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lgKyuvJKpd', '2020-10-19 10:29:32', '2020-10-19 10:29:32'),
(51, 'Ada Nicolas', 'brayan64@example.org', '2020-10-19 10:29:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'di7cv7LI2K', '2020-10-19 10:29:32', '2020-10-19 10:29:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coaches_club_id_foreign` (`club_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_home_club_id_foreign` (`home_club_id`),
  ADD KEY `matches_away_club_id_foreign` (`away_club_id`),
  ADD KEY `matches_stadium_id_foreign` (`stadium_id`),
  ADD KEY `matches_tour_id_foreign` (`tour_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_club_id_foreign` (`club_id`),
  ADD KEY `news_news_category_id_foreign` (`news_category_id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_club_id_foreign` (`club_id`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
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
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `coaches_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_away_club_id_foreign` FOREIGN KEY (`away_club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_home_club_id_foreign` FOREIGN KEY (`home_club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_stadium_id_foreign` FOREIGN KEY (`stadium_id`) REFERENCES `stadiums` (`id`),
  ADD CONSTRAINT `matches_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
