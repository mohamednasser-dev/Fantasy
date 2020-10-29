-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 01:09 AM
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
-- Database: `new_football`
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
(41, 'GK', 5, 1, '2020-10-28 14:18:44', '2020-10-28 14:18:44'),
(42, 'RB', 3, 1, '2020-10-28 14:18:44', '2020-10-28 14:18:44'),
(43, 'LB', 6, 1, '2020-10-28 14:18:44', '2020-10-28 14:18:44'),
(44, 'RF', 8, 1, '2020-10-28 14:18:44', '2020-10-28 14:18:44'),
(45, 'LF', 9, 1, '2020-10-28 14:18:44', '2020-10-28 14:18:44'),
(59, 'GK', 19, 2, '2020-10-28 15:45:15', '2020-10-28 15:45:15'),
(60, 'RF', 16, 2, '2020-10-28 15:45:15', '2020-10-28 15:45:15'),
(61, 'LF', 18, 2, '2020-10-28 15:45:15', '2020-10-28 15:45:15'),
(62, 'RB', 17, 2, '2020-10-28 15:52:14', '2020-10-28 15:52:14'),
(63, 'LB', 20, 2, '2020-10-28 15:52:14', '2020-10-28 15:52:14');

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
(1, 'جولة رقم 1', '2020-10-30', '2020-10-30', 1, '2020-10-27 13:18:47', '2020-10-27 13:21:13'),
(2, 'جولة رقم 2', NULL, NULL, 1, '2020-10-27 13:18:56', '2020-10-27 13:18:56'),
(3, 'جولة رقم 3', NULL, NULL, 1, '2020-10-27 13:19:06', '2020-10-27 13:19:06'),
(4, 'الجولة المحليه رقم 1', '2020-11-05', '2020-11-05', 3, '2020-10-27 13:19:40', '2020-10-27 13:21:47'),
(5, 'الجولة المحلية رقم 2', NULL, NULL, 3, '2020-10-27 13:19:51', '2020-10-27 13:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(30) NOT NULL,
  `home_club_id` bigint(20) UNSIGNED NOT NULL,
  `away_club_id` bigint(20) UNSIGNED NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `home_score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `away_score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
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
(1, 1, 2, '22:30:00', '2020-10-30', '0', '0', 'not started', 1, 1, 1, '2020-10-27 13:21:13', '2020-10-27 13:21:13'),
(2, 3, 4, '16:30:00', '2020-11-05', '0', '0', 'not started', 2, 3, 4, '2020-10-27 13:21:47', '2020-10-27 13:21:47');

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
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2020_10_09_202342_create_clubs_table', 1),
(24, '2020_10_09_202358_create_coaches_table', 1),
(25, '2020_10_09_202414_create_centers_table', 1),
(26, '2020_10_09_202425_create_players_table', 1),
(27, '2020_10_09_202503_create_tournaments_table', 1),
(28, '2020_10_09_202523_create_stadiums_table', 1),
(29, '2020_10_09_202525_create_matches_table', 1),
(30, '2020_10_19_094144_create_news_categories_table', 1),
(31, '2020_10_19_094148_create_news_table', 1),
(32, '2020_10_20_160446_create_news_targets_table', 1),
(33, '2020_10_21_124552_create_squads_table', 1),
(34, '2020_10_21_124632_create_squad_players_table', 1),
(35, '2020_10_21_133833_create_permission_tables', 1),
(36, '2020_10_21_163440_create_gwalats_table', 1),
(37, '2020_10_26_103706_create_user_clubs_table', 1),
(38, '2020_10_27_120102_create_club_formations_table', 1),
(39, '2020_10_27_133623_add_forign_to_matches', 1);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player_name`, `age`, `center_name`, `desc`, `image`, `club_id`, `created_at`, `updated_at`) VALUES
(1, 'رمضان صبحى', '28', 'CF', 'سءؤس', 'img_1603801339.jpg', 1, '2020-10-27 12:22:19', '2020-10-27 12:22:19'),
(2, 'محمود عبد المنعم كهربا', '31', 'LM', 'يسبسي', 'img_1603801642.jpg', 1, '2020-10-27 12:27:22', '2020-10-27 12:27:22'),
(3, 'على معلول', '35', 'LWB', 'سبيسب', 'img_1603801989.jpg', 1, '2020-10-27 12:33:09', '2020-10-27 12:33:09'),
(4, 'صالح جمعة', '33', 'CDM', 'ئسءسشي', 'img_1603802025.jpg', 1, '2020-10-27 12:33:45', '2020-10-27 12:33:45'),
(5, 'شريف اكرامى', '32', 'GK', 'سئي', 'img_1603802147.jpg', 1, '2020-10-27 12:35:47', '2020-10-27 12:35:47'),
(6, 'محمد فخري', '32', 'CDM', NULL, 'img_1603802423.jpg', 1, '2020-10-27 12:40:23', '2020-10-27 12:40:23'),
(7, 'الشناوى', '32', 'GK', NULL, 'img_1603802477.jpg', 1, '2020-10-27 12:41:17', '2020-10-27 12:41:17'),
(8, 'حسام عاشور', '29', 'CF', NULL, 'img_1603802509.jpg', 1, '2020-10-27 12:41:49', '2020-10-27 12:41:49'),
(9, 'احمد فتحى', '34', 'LM', NULL, 'img_1603802581.jpg', 1, '2020-10-27 12:43:01', '2020-10-27 12:43:01'),
(10, 'مروان محسن', '27', 'CAM', 'سيس', 'img_1603802612.jpg', 1, '2020-10-27 12:43:32', '2020-10-27 12:43:32'),
(11, 'حسين الشحات', '30', 'CF', NULL, 'img_1603802865.jpg', 1, '2020-10-27 12:47:45', '2020-10-27 12:47:45'),
(12, 'اليو بادجى', '30', 'CM', NULL, 'img_1603802897.jpg', 1, '2020-10-27 12:48:17', '2020-10-27 12:48:17'),
(13, 'محمود جنش', '30', 'GK', 'سشي', 'img_1603803210.PNG', 2, '2020-10-27 12:53:30', '2020-10-27 12:53:30'),
(14, 'اشرف بن شرقى', '30', 'LWB', NULL, 'img_1603803235.PNG', 2, '2020-10-27 12:53:55', '2020-10-27 12:53:55'),
(15, 'حسام اشرف', '25', 'CDM', 'شي', 'img_1603803258.PNG', 2, '2020-10-27 12:54:18', '2020-10-27 12:54:18'),
(16, 'شيكابالا', '42', 'CM', 'سشي', 'img_1603803281.PNG', 2, '2020-10-27 12:54:41', '2020-10-27 12:54:41'),
(17, 'طارق حامد', '32', 'LM', 'سيش', 'img_1603803303.PNG', 2, '2020-10-27 12:55:03', '2020-10-27 12:55:03'),
(18, 'فرجانى ساسى', '25', 'CAM', NULL, 'img_1603803332.PNG', 2, '2020-10-27 12:55:32', '2020-10-27 12:55:32'),
(19, 'محمد ابو جبل', '32', 'GK', NULL, 'img_1603803357.PNG', 2, '2020-10-27 12:55:57', '2020-10-27 12:55:57'),
(20, 'محمود علاء الدين', '28', 'CF', 'شبسشس', 'img_1603803381.PNG', 2, '2020-10-27 12:56:21', '2020-10-27 12:56:21'),
(21, 'مصطفى فتحى', '25', 'CDM', 'شس', 'img_1603803406.PNG', 2, '2020-10-27 12:56:46', '2020-10-27 12:56:46'),
(22, 'مصطفى محمد احمد', '25', 'LM', NULL, 'img_1603803430.PNG', 2, '2020-10-27 12:57:10', '2020-10-27 12:57:10'),
(25, 'مصطفى محمد احمد', '20', 'LM', NULL, 'img_1603804419.PNG', 2, '2020-10-27 13:13:39', '2020-10-27 13:13:39');

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

-- --------------------------------------------------------

--
-- Table structure for table `squad_players`
--

CREATE TABLE `squad_players` (
  `squad_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` bigint(20) NOT NULL,
  `is_captain` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','user','monitor','editor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lng`, `lat`, `gender`, `phone`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, 'mal', '01201636129', 'admin@admin.com', NULL, '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', 'admin', NULL, NULL, NULL),
(2, 'mohamed nasser', NULL, NULL, NULL, NULL, 'nasser@gmail.com', NULL, '$2y$10$QKpFF3ckuZV5yFUs30j4SuD8.U6MG1ZoAWOtY5sXjv/5rdgZwGW6a', 'editor', NULL, '2020-10-27 12:03:55', '2020-10-27 12:03:55'),
(3, 'hamed', NULL, NULL, NULL, NULL, 'hamed@gmail.com', NULL, '$2y$10$wPL57Si0TF/O8YCZ8cEx.ONnh1lGX0dFG7xJOH.NJ.b8CaiFGRexa', 'editor', NULL, '2020-10-27 13:26:31', '2020-10-27 13:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_clubs`
--

CREATE TABLE `user_clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_clubs`
--

INSERT INTO `user_clubs` (`id`, `user_id`, `club_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-10-27 13:25:37', '2020-10-27 13:25:37'),
(4, 3, 4, '2020-10-28 20:33:28', '2020-10-28 20:33:28');

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
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`home_club_id`,`away_club_id`,`gwla_id`),
  ADD UNIQUE KEY `home_club_id` (`home_club_id`,`away_club_id`,`gwla_id`),
  ADD UNIQUE KEY `id_uniquee` (`id`),
  ADD KEY `matches_away_club_id_foreign` (`away_club_id`),
  ADD KEY `matches_stadium_id_foreign` (`stadium_id`),
  ADD KEY `matches_tour_id_foreign` (`tour_id`),
  ADD KEY `matches_gwla_id_foreign` (`gwla_id`);

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
  ADD KEY `squad_players_player_id_foreign` (`player_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
-- AUTO_INCREMENT for table `gwalats`
--
ALTER TABLE `gwalats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `squads`
--
ALTER TABLE `squads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_clubs`
--
ALTER TABLE `user_clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
