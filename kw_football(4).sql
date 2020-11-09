-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 10:24 AM
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
-- Database: `kw_football`
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
  `tournaments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `classification`, `club_name`, `tournaments`, `date_created`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, '1st', 'الاهلى', '15 شيسشيشس', '2020-10-01', 'ير ءةنز سرييسيشرش', 'img_1603800360.png', '2020-10-27 12:06:00', '2020-10-27 12:06:00'),
(2, '1st', 'الزمالك', 'سشيلبيس', '2020-10-02', 'شسيلسش', 'img_1603800387.png', '2020-10-27 12:06:27', '2020-10-27 12:06:27'),
(3, '2nd', 'برشلونة', 'يئبءؤ', '2020-10-03', 'شسبشس', 'img_1603800412.jpg', '2020-10-27 12:06:52', '2020-10-27 12:06:52'),
(4, '2nd', 'ليفربول', '\\سسب', '2020-10-04', 'سيبب', 'img_1603800436.png', '2020-10-27 12:07:16', '2020-10-27 12:07:16'),
(5, '1st', 'الاسماعيلى', 'ليء', '2020-10-06', 'يب', 'img_1603800461.png', '2020-10-27 12:07:41', '2020-10-27 12:07:41'),
(6, '2nd', 'ريال مدريد', 'شسب', '2020-10-07', 'سيب', 'img_1603800484.png', '2020-10-27 12:08:04', '2020-10-27 12:08:04'),
(7, '2nd', 'انبى', 'سيب', '2020-10-08', 'سبي', 'img_1603800511.png', '2020-10-27 12:08:31', '2020-10-27 12:08:31'),
(8, '1st', 'سموحة', 'شسي', '2020-10-17', 'شسي', 'img_1603800576.jpg', '2020-10-27 12:09:36', '2020-10-27 12:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `club_formations`
--

CREATE TABLE `club_formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_id` bigint(20) UNSIGNED DEFAULT NULL,
  `club_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_formations`
--

INSERT INTO `club_formations` (`id`, `position`, `player_id`, `club_id`, `created_at`, `updated_at`) VALUES
(67, 'GK', 5, 1, '2020-10-31 18:05:25', '2020-10-31 18:05:25'),
(68, 'RB', 10, 1, '2020-10-31 18:05:25', '2020-10-31 18:05:25'),
(69, 'LB', 9, 1, '2020-10-31 18:05:25', '2020-10-31 18:05:25'),
(70, 'RF', 6, 1, '2020-10-31 18:05:25', '2020-10-31 18:05:25'),
(71, 'LF', 1, 1, '2020-10-31 18:05:25', '2020-10-31 18:05:25'),
(72, 'GK', 13, 2, '2020-10-31 18:06:03', '2020-10-31 18:06:03'),
(73, 'RB', 21, 2, '2020-10-31 18:06:03', '2020-10-31 18:06:03'),
(74, 'LB', 15, 2, '2020-10-31 18:06:03', '2020-10-31 18:06:03'),
(75, 'RF', 17, 2, '2020-10-31 18:06:03', '2020-10-31 18:06:03'),
(76, 'LF', 16, 2, '2020-10-31 18:06:03', '2020-10-31 18:06:03');

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
(1, 'باتريس كارتيرون', 39, 'img_1603800901.jpg', 'يءئؤس', 2, '2020-10-27 12:15:01', '2020-10-27 12:15:01'),
(2, 'موسمانى', 48, 'img_1603800943.PNG', '12', 1, '2020-10-27 12:15:43', '2020-10-27 12:15:43'),
(3, 'رونالد كومان', 44, 'img_1603801011.jpg', 'بيس', 3, '2020-10-27 12:16:51', '2020-10-27 12:16:51'),
(4, 'يورغن كلوب', 49, 'img_1603801064.jpg', 'سؤ', 4, '2020-10-27 12:17:44', '2020-10-27 12:17:44'),
(5, 'زيدان', 58, 'img_1603801122.jpg', 'با', 6, '2020-10-27 12:18:42', '2020-10-27 12:18:42'),
(6, 'فرج عامر', 55, 'img_1603801191.jpg', 'سشسشي', 8, '2020-10-27 12:19:51', '2020-10-27 12:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_captain` int(20) DEFAULT NULL,
  `opacity` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `key`, `value`, `name`, `is_captain`, `opacity`, `created_at`, `updated_at`) VALUES
(1, 'yellow_card', '-3', 'حصل على كرت اصفر', -6, '1', NULL, NULL),
(2, 'red_card', '-6', 'حصل على كرت احمر', -12, '1', NULL, NULL),
(3, 'score_goal', '2', 'احراز هدف', 4, '1', NULL, NULL),
(4, 'clean_sheet', '10', 'شِباك نظيفة', 20, '1', NULL, NULL),
(5, 'team_win', '3', 'كسب فريقه', 0, '0', NULL, NULL);

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
-- Table structure for table `gwalats`
--

CREATE TABLE `gwalats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gwalats`
--

INSERT INTO `gwalats` (`id`, `name`, `start`, `end`, `tour_id`, `created_at`, `updated_at`) VALUES
(1, 'جولة رقم 1', '2020-10-30', '2020-11-21', 1, '2020-10-27 13:18:47', '2020-11-08 11:41:39'),
(2, 'جولة رقم 2', NULL, NULL, 1, '2020-10-27 13:18:56', '2020-10-27 13:18:56'),
(3, 'جولة رقم 3', NULL, NULL, 1, '2020-10-27 13:19:06', '2020-10-27 13:19:06'),
(4, 'الجولة المحليه رقم 1', '2020-11-05', '2020-11-05', 3, '2020-10-27 13:19:40', '2020-10-27 13:21:47'),
(5, 'الجولة المحلية رقم 2', NULL, NULL, 3, '2020-10-27 13:19:51', '2020-10-27 13:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) NOT NULL,
  `home_club_id` bigint(20) UNSIGNED NOT NULL,
  `away_club_id` bigint(20) UNSIGNED NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `home_score` bigint(20) NOT NULL DEFAULT 0,
  `away_score` bigint(20) NOT NULL DEFAULT 0,
  `status` enum('not started','started','ended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not started',
  `stadium_id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `gwla_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_club_id`, `away_club_id`, `time`, `date`, `home_score`, `away_score`, `status`, `stadium_id`, `tour_id`, `gwla_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '22:30:00', '2020-10-30', 7, 6, 'started', 1, 1, 1, '2020-10-27 13:21:13', '2020-11-09 08:56:24'),
(2, 3, 4, '16:30:00', '2020-11-05', 0, 0, 'started', 2, 3, 4, '2020-10-27 13:21:47', '2020-10-27 13:21:47'),
(3, 8, 5, '16:00:00', '2020-11-21', 0, 0, 'not started', 1, 1, 1, '2020-11-08 11:41:39', '2020-11-08 11:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `match_events`
--

CREATE TABLE `match_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED DEFAULT NULL,
  `match_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_events`
--

INSERT INTO `match_events` (`id`, `player_id`, `match_id`, `event_id`, `created_at`, `updated_at`) VALUES
(10, 16, 1, 2, '2020-11-08 10:18:12', '2020-11-08 10:18:12'),
(11, 15, 1, 2, '2020-11-08 10:19:24', '2020-11-08 10:19:24'),
(12, 15, 1, 2, '2020-11-08 10:19:42', '2020-11-08 10:19:42'),
(13, 21, 1, 3, '2020-11-08 10:21:00', '2020-11-08 10:21:00'),
(14, 21, 1, 3, '2020-11-08 10:21:05', '2020-11-08 10:21:05'),
(15, 16, 1, 3, '2020-11-08 10:22:48', '2020-11-08 10:22:48'),
(16, 17, 1, 3, '2020-11-08 10:28:58', '2020-11-08 10:28:58'),
(17, 15, 1, 3, '2020-11-08 10:29:46', '2020-11-08 10:29:46'),
(18, 17, 1, 3, '2020-11-08 10:30:12', '2020-11-08 10:30:12'),
(19, 21, 1, 3, '2020-11-08 10:31:21', '2020-11-08 10:31:21'),
(20, 16, 1, 3, '2020-11-08 10:31:45', '2020-11-08 10:31:45'),
(21, 13, 1, 3, '2020-11-08 10:32:51', '2020-11-08 10:32:51'),
(22, 17, 1, 3, '2020-11-08 10:33:51', '2020-11-08 10:33:51'),
(23, 15, 1, 3, '2020-11-08 10:34:14', '2020-11-08 10:34:14'),
(24, 15, 1, 3, '2020-11-08 10:34:38', '2020-11-08 10:34:38'),
(25, 15, 1, 3, '2020-11-08 10:36:19', '2020-11-08 10:36:19'),
(26, 13, 1, 3, '2020-11-08 10:36:33', '2020-11-08 10:36:33'),
(27, 1, 1, 3, '2020-11-08 10:49:04', '2020-11-08 10:49:04'),
(28, 6, 1, 3, '2020-11-08 11:05:56', '2020-11-08 11:05:56'),
(29, 1, 1, 1, '2020-11-08 11:10:05', '2020-11-08 11:10:05'),
(30, 15, 1, 3, '2020-11-08 11:24:43', '2020-11-08 11:24:43'),
(31, 7, 1, 2, '2020-11-08 11:24:54', '2020-11-08 11:24:54'),
(32, 22, 1, 2, '2020-11-08 11:25:21', '2020-11-08 11:25:21'),
(33, 25, 1, 1, '2020-11-08 11:27:34', '2020-11-08 11:27:34'),
(34, 10, 1, 1, '2020-11-08 11:28:03', '2020-11-08 11:28:03'),
(35, 1, 1, 3, '2020-11-08 11:28:19', '2020-11-08 11:28:19'),
(36, 9, 1, 3, '2020-11-08 11:28:28', '2020-11-08 11:28:28'),
(37, 21, 1, 3, '2020-11-08 11:28:40', '2020-11-08 11:28:40'),
(38, 7, 1, 3, '2020-11-08 12:51:57', '2020-11-08 12:51:57'),
(39, 11, 1, 4, '2020-11-08 13:08:06', '2020-11-08 13:08:06'),
(40, 13, 1, 4, '2020-11-08 13:10:39', '2020-11-08 13:10:39'),
(41, 22, 1, 3, '2020-11-08 13:10:48', '2020-11-08 13:10:48'),
(42, 22, 1, 1, '2020-11-08 13:11:08', '2020-11-08 13:11:08'),
(43, 19, 1, 3, '2020-11-08 13:11:18', '2020-11-08 13:11:18'),
(44, 20, 1, 3, '2020-11-08 13:11:32', '2020-11-08 13:11:32'),
(45, 4, 1, 3, '2020-11-08 13:11:42', '2020-11-08 13:11:42'),
(46, 7, 1, 3, '2020-11-08 13:11:47', '2020-11-08 13:11:47'),
(47, 19, 1, 1, '2020-11-08 13:15:49', '2020-11-08 13:15:49'),
(48, 20, 1, 3, '2020-11-08 13:15:58', '2020-11-08 13:15:58'),
(49, 22, 1, 4, '2020-11-08 13:17:23', '2020-11-08 13:17:23'),
(50, 17, 1, 3, '2020-11-08 13:19:50', '2020-11-08 13:19:50'),
(51, 16, 1, 3, '2020-11-08 13:20:26', '2020-11-08 13:20:26'),
(52, 17, 1, 3, '2020-11-08 13:21:25', '2020-11-08 13:21:25'),
(53, 17, 1, 3, '2020-11-08 13:21:35', '2020-11-08 13:21:35'),
(54, 21, 1, 3, '2020-11-08 13:21:48', '2020-11-08 13:21:48'),
(55, 17, 1, 3, '2020-11-08 13:22:18', '2020-11-08 13:22:18'),
(56, 4, 1, 3, '2020-11-08 13:22:27', '2020-11-08 13:22:27'),
(57, 12, 1, 3, '2020-11-09 08:56:01', '2020-11-09 08:56:01'),
(58, 11, 1, 3, '2020-11-09 08:56:24', '2020-11-09 08:56:24');

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
(9, '2020_10_09_202523_create_stadiums_table', 1),
(10, '2020_10_09_202525_create_matches_table', 1),
(11, '2020_10_19_094144_create_news_categories_table', 1),
(12, '2020_10_19_094148_create_news_table', 1),
(13, '2020_10_20_160446_create_news_targets_table', 1),
(14, '2020_10_21_124552_create_squads_table', 1),
(15, '2020_10_21_124632_create_squad_players_table', 1),
(16, '2020_10_21_133833_create_permission_tables', 1),
(17, '2020_10_21_163440_create_gwalats_table', 1),
(18, '2020_10_26_103706_create_user_clubs_table', 1),
(19, '2020_10_27_120102_create_club_formations_table', 1),
(20, '2020_10_27_133623_add_forign_to_matches', 1),
(21, '2020_11_01_210714_create_events_table', 2),
(22, '2020_11_04_203440_create_jobs_table', 3),
(23, '2020_11_08_103204_add_to_players', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_words` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('player','coach','club','tournament') COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `news_category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `news_targets`
--

CREATE TABLE `news_targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_id` bigint(20) NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `points` bigint(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player_name`, `age`, `center_name`, `desc`, `image`, `club_id`, `created_at`, `updated_at`, `points`) VALUES
(1, 'رمضان صبحى', '28', 'RB', 'سءؤس', 'img_1603801339.jpg', 1, '2020-10-27 12:22:19', '2020-11-09 08:58:10', 2),
(2, 'محمود عبد المنعم كهربا', '31', 'RB', 'يسبسي', 'img_1603801642.jpg', 1, '2020-10-27 12:27:22', '2020-11-09 08:58:10', 3),
(3, 'على معلول', '35', 'LF', 'سبيسب', 'img_1603801989.jpg', 1, '2020-10-27 12:33:09', '2020-11-08 10:23:22', 0),
(4, 'صالح جمعة', '33', 'RF', 'ئسءسشي', 'img_1603802025.jpg', 1, '2020-10-27 12:33:45', '2020-11-08 13:31:46', 0),
(5, 'شريف اكرامى', '32', 'GK', 'سئي', 'img_1603802147.jpg', 1, '2020-10-27 12:35:47', '2020-11-08 10:23:22', 0),
(6, 'محمد فخري', '32', 'LB', NULL, 'img_1603802423.jpg', 1, '2020-10-27 12:40:23', '2020-11-08 13:31:45', 0),
(7, 'الشناوى', '32', 'GK', NULL, 'img_1603802477.jpg', 1, '2020-10-27 12:41:17', '2020-11-08 13:31:46', 0),
(8, 'حسام عاشور', '29', 'CF', NULL, 'img_1603802509.jpg', 1, '2020-10-27 12:41:49', '2020-11-08 10:23:22', 0),
(9, 'احمد فتحى', '34', 'LF', NULL, 'img_1603802581.jpg', 1, '2020-10-27 12:43:01', '2020-11-08 13:31:45', 0),
(10, 'مروان محسن', '27', 'RF', 'سيس', 'img_1603802612.jpg', 1, '2020-10-27 12:43:32', '2020-11-08 13:31:45', 0),
(11, 'حسين الشحات', '30', 'CF', NULL, 'img_1603802865.jpg', 1, '2020-10-27 12:47:45', '2020-11-08 13:31:45', 0),
(12, 'اليو بادجى', '30', 'CM', NULL, 'img_1603802897.jpg', 1, '2020-10-27 12:48:17', '2020-11-08 10:23:22', 0),
(13, 'محمود جنش', '30', 'GK', 'سشي', 'img_1603803210.PNG', 2, '2020-10-27 12:53:30', '2020-11-09 08:58:09', 14),
(14, 'اشرف بن شرقى', '30', 'LWB', NULL, 'img_1603803235.PNG', 2, '2020-10-27 12:53:55', '2020-11-08 10:49:18', 0),
(15, 'حسام اشرف', '25', 'CDM', 'شي', 'img_1603803258.PNG', 2, '2020-10-27 12:54:18', '2020-11-08 13:31:45', 0),
(16, 'شيكابالا', '42', 'CM', 'سشي', 'img_1603803281.PNG', 2, '2020-10-27 12:54:41', '2020-11-08 13:31:46', 0),
(17, 'طارق حامد', '32', 'LM', 'سيش', 'img_1603803303.PNG', 2, '2020-10-27 12:55:03', '2020-11-08 13:31:46', 0),
(18, 'فرجانى ساسى', '25', 'CAM', NULL, 'img_1603803332.PNG', 2, '2020-10-27 12:55:32', '2020-11-08 10:49:18', 0),
(19, 'محمد ابو جبل', '32', 'GK', NULL, 'img_1603803357.PNG', 2, '2020-10-27 12:55:57', '2020-11-08 13:31:46', 0),
(20, 'محمود علاء الدين', '28', 'CF', 'شبسشس', 'img_1603803381.PNG', 2, '2020-10-27 12:56:21', '2020-11-08 13:31:46', 0),
(21, 'مصطفى فتحى', '25', 'CDM', 'شس', 'img_1603803406.PNG', 2, '2020-10-27 12:56:46', '2020-11-08 13:31:46', 0),
(22, 'مصطفى محمد احمد', '25', 'LM', NULL, 'img_1603803430.PNG', 2, '2020-10-27 12:57:10', '2020-11-08 13:31:46', 0),
(25, 'مصطفى محمد احمد', '20', 'LM', NULL, 'img_1603804419.PNG', 2, '2020-10-27 13:13:39', '2020-11-08 13:31:45', 0),
(26, 'messi', '35', 'RF', NULL, 'img_1604912766.jpg', 3, '2020-11-09 09:06:06', '2020-11-09 09:06:06', 0),
(27, 'محمد صلاح', '28', 'RB', NULL, 'img_1604912813.jpg', 4, '2020-11-09 09:06:53', '2020-11-09 09:06:53', 0),
(28, 'نيمار', '25', 'LF', NULL, 'img_1604912862.jpg', 3, '2020-11-09 09:07:42', '2020-11-09 09:07:42', 0),
(29, 'الننى', '27', 'RM', NULL, 'img_1604912890.jpg', 5, '2020-11-09 09:08:10', '2020-11-09 09:08:10', 0),
(30, 'ابوتريكه', '45', 'CAM', NULL, 'img_1604912928.jpg', 8, '2020-11-09 09:08:48', '2020-11-09 09:08:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `squads`
--

CREATE TABLE `squads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `squad_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `squad_type` enum('1st','2nd') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1st',
  `points` bigint(20) NOT NULL DEFAULT 0,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `squads`
--

INSERT INTO `squads` (`id`, `squad_name`, `squad_type`, `points`, `coach_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Elahlam_team', '1st', 19, 1, 7, '2020-11-08 13:34:46', '2020-11-09 08:58:10'),
(2, 'Die', '1st', 19, 2, 6, '2020-11-08 13:34:46', '2020-11-09 08:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `squad_players`
--

CREATE TABLE `squad_players` (
  `squad_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` bigint(20) NOT NULL DEFAULT 0,
  `is_captain` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` enum('basic','replace') COLLATE utf8mb4_unicode_ci DEFAULT 'basic',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `squad_players`
--

INSERT INTO `squad_players` (`squad_id`, `player_id`, `club_id`, `position`, `points`, `is_captain`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'GK', 2, '1', 'basic', '2020-11-08 14:01:05', '2020-11-09 08:58:10'),
(1, 2, 1, 'LB', 3, '0', 'basic', '2020-11-08 14:02:42', '2020-11-09 08:58:10'),
(1, 13, 2, 'RB', 14, '0', 'basic', '2020-11-08 14:03:55', '2020-11-09 08:58:09'),
(1, 14, 2, 'RS1', 0, '0', 'basic', '2020-11-08 14:04:08', '2020-11-08 14:04:08'),
(1, 28, 3, 'RS2', 0, '0', 'basic', '2020-11-09 09:11:24', '2020-11-09 09:11:24'),
(1, 29, 5, 'LF', 0, '0', 'basic', '2020-11-09 09:11:07', '2020-11-09 09:11:07'),
(1, 30, 8, 'RF', 0, '0', 'basic', '2020-11-09 09:10:33', '2020-11-09 09:10:33'),
(2, 27, 4, 'RS2', 0, '0', 'basic', '2020-11-09 09:18:59', '2020-11-09 09:18:59'),
(2, 30, 8, 'GK', 0, '0', 'basic', '2020-11-09 09:20:51', '2020-11-09 09:20:51');

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
(1, 'stadium 1', 'img_1603804522.jpg', '2020-10-27 13:15:22', '2020-10-27 13:15:22'),
(2, 'stadium 2', 'img_1603804538.jpg', '2020-10-27 13:15:38', '2020-10-27 13:15:38'),
(3, 'stadium 3', 'img_1603804557.JPG', '2020-10-27 13:15:57', '2020-10-27 13:15:57'),
(4, 'stadium 4', 'img_1603804571.jpg', '2020-10-27 13:16:11', '2020-10-27 13:16:11'),
(5, 'stadium 5', 'img_1603804586.jpg', '2020-10-27 13:16:26', '2020-10-27 13:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` enum('1st','2nd') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1st',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tour_name`, `classification`, `created_at`, `updated_at`) VALUES
(1, 'Champions League 1st', '1st', '2020-10-27 13:16:52', '2020-10-27 13:16:52'),
(2, 'Champions League 1st 2', '1st', '2020-10-27 13:17:04', '2020-10-27 13:17:04'),
(3, 'بطولة القبائل العربية', '2nd', '2020-10-27 13:17:20', '2020-10-27 13:17:20'),
(4, 'بطولة القبائل العربية 2', '2nd', '2020-10-27 13:17:31', '2020-10-27 13:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` bigint(20) DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','user','monitor','editor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lng`, `lat`, `gender`, `phone`, `points`, `email`, `email_verified_at`, `password`, `image`, `api_token`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, 'mal', '01201636129', 0, 'admin@admin.com', NULL, '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', NULL, NULL, 'admin', NULL, NULL, NULL),
(4, 'monitor', NULL, NULL, NULL, NULL, 0, 'monitor@gmail.com', NULL, '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', NULL, NULL, 'monitor', NULL, '2020-10-29 01:01:28', '2020-10-29 01:01:28'),
(5, 'kareem', NULL, NULL, NULL, NULL, 0, 'ahmed@gmail.com', NULL, '$2y$10$.qOdLRLM8zo40f9id.VoceQE8qwdgcWx4uGIKLc1w24CqSjk7neH.', NULL, NULL, 'monitor', NULL, '2020-11-04 22:40:12', '2020-11-04 22:40:12'),
(6, 'mohamed', NULL, NULL, NULL, NULL, 0, 'mohamed@gmail.com', NULL, '$2y$10$paRqAS4zin3yvYUUcOSf6OkAwLjqj84guDpsSLGk3s/PmHvcbL7SG', NULL, 'tjUMtoAwOJHZ7A7n42Bs2gxRyF5yqOZowMCDklgRhpQx2EPfXEX0AISLDjPH', 'user', NULL, '2020-11-05 05:23:49', '2020-11-09 08:31:16'),
(7, 'omnia', NULL, NULL, NULL, NULL, 19, 'omnia@gmail.com', NULL, '$2y$10$z//vu/5Wk9awvK5gX/C4kOdtmkd8/5bNH1LCE33mj2YcijDhUzhZS', NULL, '8Ocke3wOk0TH0njaigqqUNwxr4MXcyl6KgilnygYgH8gfbWtlfcfQXr0tBkH', 'user', NULL, '2020-11-05 05:25:17', '2020-11-09 08:58:10'),
(8, 'editor', NULL, NULL, NULL, NULL, 0, 'editor@editor.com', NULL, '$2y$10$Q7SGtpapWZxXrKM0QerKX.aEhoRVGqdVLFuPVdYUuQYyp7r1hlnP2', NULL, NULL, 'editor', NULL, '2020-11-07 23:21:01', '2020-11-07 23:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_clubs`
--

CREATE TABLE `user_clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('monitor','editor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_clubs`
--

INSERT INTO `user_clubs` (`id`, `user_id`, `club_id`, `type`, `created_at`, `updated_at`) VALUES
(13, 5, 5, 'monitor', '2020-11-04 22:59:38', '2020-11-04 22:59:38'),
(14, 4, 3, 'monitor', '2020-11-04 23:00:48', '2020-11-04 23:00:48'),
(15, 4, 4, 'monitor', '2020-11-04 23:00:49', '2020-11-04 23:00:49'),
(16, 4, 6, 'monitor', '2020-11-04 23:00:49', '2020-11-04 23:00:49'),
(17, 4, 2, 'monitor', '2020-11-06 21:39:42', '2020-11-06 21:39:42'),
(18, 4, 1, 'monitor', '2020-11-08 10:37:40', '2020-11-08 10:37:40');

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
-- Indexes for table `club_formations`
--
ALTER TABLE `club_formations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `player_position_unique` (`club_id`,`position`),
  ADD UNIQUE KEY `player_unique` (`player_id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coaches_club_id_foreign` (`club_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gwalats`
--
ALTER TABLE `gwalats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gwalats_tour_id_foreign` (`tour_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`home_club_id`,`away_club_id`,`gwla_id`),
  ADD KEY `matches_away_club_id_foreign` (`away_club_id`),
  ADD KEY `matches_stadium_id_foreign` (`stadium_id`),
  ADD KEY `matches_tour_id_foreign` (`tour_id`),
  ADD KEY `matches_gwla_id_foreign` (`gwla_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `match_events`
--
ALTER TABLE `match_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_events_player_id_foreign` (`player_id`),
  ADD KEY `match_events_match_id_foreign` (`match_id`),
  ADD KEY `match_events_event_id_foreign` (`event_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_club_id_foreign` (`club_id`),
  ADD KEY `news_tour_id_foreign` (`tour_id`),
  ADD KEY `news_player_id_foreign` (`player_id`),
  ADD KEY `news_coach_id_foreign` (`coach_id`),
  ADD KEY `news_news_category_id_foreign` (`news_category_id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_targets`
--
ALTER TABLE `news_targets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_targets_news_id_foreign` (`news_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_club_id_foreign` (`club_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `squads`
--
ALTER TABLE `squads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `squads_coach_id_foreign` (`coach_id`),
  ADD KEY `squads_user_id_foreign` (`user_id`);

--
-- Indexes for table `squad_players`
--
ALTER TABLE `squad_players`
  ADD PRIMARY KEY (`squad_id`,`player_id`),
  ADD UNIQUE KEY `player_position_unique` (`squad_id`,`position`),
  ADD KEY `squad_players_player_id_foreign` (`player_id`),
  ADD KEY `squad_players_club_id_foreign` (`club_id`);

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
-- Indexes for table `user_clubs`
--
ALTER TABLE `user_clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_clubs_club_id_unique` (`club_id`),
  ADD KEY `user_clubs_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `club_formations`
--
ALTER TABLE `club_formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gwalats`
--
ALTER TABLE `gwalats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `match_events`
--
ALTER TABLE `match_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_targets`
--
ALTER TABLE `news_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `squads`
--
ALTER TABLE `squads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_clubs`
--
ALTER TABLE `user_clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club_formations`
--
ALTER TABLE `club_formations`
  ADD CONSTRAINT `club_formations_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `club_formations_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `coaches_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gwalats`
--
ALTER TABLE `gwalats`
  ADD CONSTRAINT `gwalats_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_away_club_id_foreign` FOREIGN KEY (`away_club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_gwla_id_foreign` FOREIGN KEY (`gwla_id`) REFERENCES `gwalats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_home_club_id_foreign` FOREIGN KEY (`home_club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_stadium_id_foreign` FOREIGN KEY (`stadium_id`) REFERENCES `stadiums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `match_events`
--
ALTER TABLE `match_events`
  ADD CONSTRAINT `match_events_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_events_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_targets`
--
ALTER TABLE `news_targets`
  ADD CONSTRAINT `news_targets_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `squads`
--
ALTER TABLE `squads`
  ADD CONSTRAINT `squads_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `squads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `squad_players`
--
ALTER TABLE `squad_players`
  ADD CONSTRAINT `squad_players_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `squad_players_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `squad_players_squad_id_foreign` FOREIGN KEY (`squad_id`) REFERENCES `squads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_clubs`
--
ALTER TABLE `user_clubs`
  ADD CONSTRAINT `user_clubs_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_clubs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
