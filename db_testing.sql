-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 12:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '6d55c4de9e26fb2b0d0c308569a25993', '2022-11-04 08:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Admin'),
(2, 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 3),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'web@gmail.com', NULL, '2022-10-30 20:53:56', 0),
(2, '::1', 'web', 1, '2022-10-30 20:54:39', 0),
(3, '::1', 'hjkhkj', NULL, '2022-10-30 20:55:02', 0),
(4, '::1', 'webcoding11@gmail.com', 1, '2022-10-30 20:55:14', 0),
(5, '::1', 'webcoding11@gmail.com', 1, '2022-10-30 20:57:09', 1),
(6, '::1', 'webcoding11@gmail.com', 1, '2022-10-30 22:49:14', 1),
(7, '::1', 'webcoding11@gmail.com', 1, '2022-10-30 22:51:03', 1),
(8, '::1', 'webcoding11@gmail.com', 1, '2022-10-30 22:55:44', 1),
(9, '::1', 'webcoding11@gmail.com', 1, '2022-10-30 22:55:58', 1),
(10, '::1', 'webcoding11@gmail.com', 1, '2022-10-30 23:55:49', 1),
(11, '::1', 'webcoding11@gmail.com', 1, '2022-10-31 00:21:30', 1),
(12, '::1', 'webcoding11@gmail.com', 1, '2022-10-31 02:48:16', 1),
(13, '::1', 'webcoding11@gmail.com', 1, '2022-10-31 03:32:36', 1),
(14, '::1', 'webcoding11@gmail.com', 1, '2022-10-31 18:52:42', 1),
(15, '::1', 'webcoding11@gmail.com', 1, '2022-11-01 20:02:30', 1),
(16, '::1', 'webcoding11@gmail.com', 1, '2022-11-02 06:54:30', 1),
(17, '::1', 'webcoding11@gmail.com', 1, '2022-11-02 18:35:39', 1),
(18, '::1', 'webcoding11@gmail.com', 1, '2022-11-02 23:06:14', 1),
(19, '::1', 'webcoding11@gmail.com', 1, '2022-11-03 00:59:51', 1),
(20, '::1', 'webcoding11@gmail.com', 1, '2022-11-03 01:01:09', 1),
(21, '::1', 'webcoding11@gmail.com', 1, '2022-11-03 01:03:27', 1),
(22, '::1', 'webcoding11@gmail.com', 1, '2022-11-03 01:03:44', 1),
(23, '::1', 'admin', 2, '2022-11-03 01:36:00', 0),
(24, '::1', 'admin@gmail.com', 2, '2022-11-03 01:36:07', 1),
(25, '::1', 'admin@gmail.com', 2, '2022-11-03 01:36:25', 1),
(26, '::1', 'admin@gmail.com', 2, '2022-11-03 01:37:06', 1),
(27, '::1', 'admin@gmail.com', 2, '2022-11-03 01:37:38', 1),
(28, '::1', 'web', NULL, '2022-11-03 01:40:30', 0),
(29, '::1', 'web', NULL, '2022-11-03 01:40:40', 0),
(30, '::1', 'admin@gmail.com', 2, '2022-11-03 01:40:43', 1),
(31, '::1', 'webcoding11@gmail.com', 1, '2022-11-03 01:41:42', 1),
(32, '::1', 'admin@gmail.com', 1, '2022-11-03 01:42:41', 1),
(33, '::1', 'admin@gmail.com', 1, '2022-11-03 01:45:11', 1),
(34, '::1', 'admin@gmail.com', 1, '2022-11-03 01:46:57', 1),
(35, '::1', 'web@gmail.com', 3, '2022-11-03 01:53:00', 1),
(36, '::1', 'web', NULL, '2022-11-03 02:38:53', 0),
(37, '::1', 'web', NULL, '2022-11-03 02:39:03', 0),
(38, '::1', 'web@gmail.com', 3, '2022-11-03 02:39:09', 1),
(39, '::1', 'admin@gmail.com', 1, '2022-11-03 04:33:20', 1),
(40, '::1', 'admin@gmail.com', 1, '2022-11-03 04:35:20', 1),
(41, '::1', 'web', NULL, '2022-11-03 04:35:47', 0),
(42, '::1', 'web@gmail.com', 3, '2022-11-03 04:35:56', 1),
(43, '::1', 'admin@gmail.com', 1, '2022-11-03 04:52:56', 1),
(44, '::1', 'admin', NULL, '2022-11-03 06:16:09', 0),
(45, '::1', 'admin', NULL, '2022-11-03 06:16:18', 0),
(46, '::1', 'web', NULL, '2022-11-03 06:16:30', 0),
(47, '::1', 'web', NULL, '2022-11-03 06:16:39', 0),
(48, '::1', 'web', NULL, '2022-11-03 06:16:41', 0),
(49, '::1', 'admin@gmail.com', 1, '2022-11-03 06:17:23', 1),
(50, '::1', 'web@gmail.com', 3, '2022-11-03 06:17:36', 1),
(51, '::1', 'web@gmail.com', 3, '2022-11-03 06:54:05', 1),
(52, '::1', 'web@gmail.com', 3, '2022-11-04 00:40:47', 1),
(53, '::1', 'web@gmail.com', 3, '2022-11-04 00:49:00', 1),
(54, '::1', 'web@gmail.com', 3, '2022-11-04 01:24:11', 1),
(55, '::1', 'web@gmail.com', 3, '2022-11-04 08:08:06', 1),
(56, '::1', 'web@gmail.com', 3, '2022-11-04 08:09:48', 1),
(57, '::1', 'farozy12@gmail.com', 5, '2022-11-04 09:01:20', 1),
(58, '::1', 'farozy12@gmail.com', 5, '2022-11-04 09:01:56', 1),
(59, '::1', 'farozy12@gmail.com', 5, '2022-11-04 09:03:14', 1),
(60, '::1', 'web@gmail.com', 3, '2022-11-04 09:04:13', 1),
(61, '::1', 'farozy12', NULL, '2022-11-04 09:04:25', 0),
(62, '::1', 'farozy', NULL, '2022-11-04 09:04:32', 0),
(63, '::1', 'farozy12@gmail.com', 5, '2022-11-04 09:04:42', 1),
(64, '::1', 'web@gmail.com', 3, '2022-11-04 09:07:17', 1),
(65, '::1', 'farozy12', NULL, '2022-11-04 09:07:27', 0),
(66, '::1', 'farozy12@gmail.com', 5, '2022-11-04 09:07:34', 1),
(67, '::1', 'farozy12@gmail.com', 5, '2022-11-04 09:07:51', 1),
(68, '::1', 'web@gmail.com', 3, '2022-11-06 22:09:18', 1),
(69, '::1', 'farozy12@gmail.com', NULL, '2022-11-29 23:48:10', 0),
(70, '::1', 'farozy12@gmail.com', NULL, '2022-11-29 23:48:27', 0),
(71, '::1', 'farozy12@gmail.com', NULL, '2022-11-29 23:51:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'farozy12@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26', 'e877ad461f9b958b40731090a3313fd6', '2022-11-04 09:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kode_antrian`
--

CREATE TABLE `kode_antrian` (
  `id_kode_antrian` int(11) NOT NULL,
  `kode_antrian` varchar(100) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_antrian`
--

INSERT INTO `kode_antrian` (`id_kode_antrian`, `kode_antrian`, `created_at`, `updated_at`) VALUES
(1, 'a', '2022-11-01 22:09:23', '2022-11-01 22:09:23'),
(12, 'b', '2022-11-01 22:34:08', '2022-11-01 22:34:08'),
(13, 'c', '2022-11-01 22:34:11', '2022-11-01 22:34:11'),
(14, 'd', '2022-11-01 22:34:13', '2022-11-01 22:34:13'),
(15, 'e', '2022-11-01 22:34:17', '2022-11-01 22:34:17'),
(18, 'f', '2022-11-02 02:32:33', '2022-11-02 02:32:33'),
(19, 'g', '2022-11-02 02:32:38', '2022-11-02 02:32:38'),
(20, 'h', '2022-11-02 02:33:25', '2022-11-02 02:33:25'),
(21, 'i', '2022-11-02 02:33:29', '2022-11-02 02:33:29'),
(22, 'j', '2022-11-02 02:33:34', '2022-11-02 02:33:34'),
(23, 'k', '2022-11-02 02:34:32', '2022-11-02 02:34:32'),
(24, 'l', '2022-11-02 02:34:39', '2022-11-02 02:34:39'),
(25, 'm', '2022-11-02 02:35:06', '2022-11-02 02:35:06'),
(26, 'n', '2022-11-02 02:35:11', '2022-11-02 02:35:11'),
(27, 'o', '2022-11-02 02:35:24', '2022-11-02 02:35:24'),
(28, 'p', '2022-11-02 02:36:11', '2022-11-02 02:36:11'),
(29, 'q', '2022-11-02 02:39:12', '2022-11-02 02:39:12'),
(30, 'r', '2022-11-02 02:39:17', '2022-11-02 02:39:17'),
(31, 's', '2022-11-02 02:39:38', '2022-11-02 02:39:38'),
(32, 't', '2022-11-02 02:39:40', '2022-11-02 02:39:40'),
(33, 'u', '2022-11-02 02:39:44', '2022-11-02 02:39:44'),
(34, 'v', '2022-11-02 02:39:46', '2022-11-02 02:39:46'),
(35, 'w', '2022-11-02 02:39:47', '2022-11-02 02:39:47'),
(36, 'x', '2022-11-02 02:39:49', '2022-11-02 02:39:49'),
(37, 'y', '2022-11-02 02:39:51', '2022-11-02 02:39:51'),
(39, 'z', '2022-11-02 03:26:06', '2022-11-02 03:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1667176787, 1);

-- --------------------------------------------------------

--
-- Table structure for table `no_antrian`
--

CREATE TABLE `no_antrian` (
  `id_no_antrian` int(11) NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no_antrian`
--

INSERT INTO `no_antrian` (`id_no_antrian`, `no_antrian`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-10-31 21:35:55', '2022-10-31 21:35:55'),
(7, 2, '2022-10-31 22:00:54', '2022-10-31 22:00:54'),
(8, 3, '2022-10-31 22:00:55', '2022-10-31 22:00:55'),
(9, 4, '2022-10-31 22:00:56', '2022-10-31 22:00:56'),
(10, 5, '2022-11-02 00:19:21', '2022-11-02 00:19:21'),
(11, 6, '2022-11-02 00:19:21', '2022-11-02 00:19:21'),
(12, 7, '2022-11-02 00:19:21', '2022-11-02 00:19:21'),
(13, 8, '2022-11-02 00:19:23', '2022-11-02 00:19:23'),
(14, 9, '2022-11-02 00:19:24', '2022-11-02 00:19:24'),
(15, 10, '2022-11-02 00:19:25', '2022-11-02 00:19:25'),
(16, 11, '2022-11-02 00:19:25', '2022-11-02 00:19:25'),
(17, 12, '2022-11-02 00:19:26', '2022-11-02 00:19:26'),
(18, 13, '2022-11-02 00:19:27', '2022-11-02 00:19:27'),
(19, 14, '2022-11-02 00:19:28', '2022-11-02 00:19:28'),
(20, 15, '2022-11-02 00:19:32', '2022-11-02 00:19:32'),
(21, 16, '2022-11-02 00:19:33', '2022-11-02 00:19:33'),
(22, 17, '2022-11-02 00:19:34', '2022-11-02 00:19:34'),
(23, 18, '2022-11-02 00:19:35', '2022-11-02 00:19:35'),
(24, 19, '2022-11-02 00:19:35', '2022-11-02 00:19:35'),
(25, 20, '2022-11-02 00:19:36', '2022-11-02 00:19:36'),
(26, 21, '2022-11-02 00:19:37', '2022-11-02 00:19:37'),
(27, 22, '2022-11-02 00:19:38', '2022-11-02 00:19:38'),
(28, 23, '2022-11-02 00:19:38', '2022-11-02 00:19:38'),
(29, 24, '2022-11-02 00:19:39', '2022-11-02 00:19:39'),
(30, 25, '2022-11-02 00:19:40', '2022-11-02 00:19:40'),
(31, 26, '2022-11-02 00:19:40', '2022-11-02 00:19:40'),
(32, 27, '2022-11-02 00:19:41', '2022-11-02 00:19:41'),
(33, 28, '2022-11-02 00:19:42', '2022-11-02 00:19:42'),
(34, 29, '2022-11-02 00:19:43', '2022-11-02 00:19:43'),
(35, 30, '2022-11-02 00:19:47', '2022-11-02 00:19:47'),
(36, 31, '2022-11-02 00:19:51', '2022-11-02 00:19:51'),
(37, 32, '2022-11-02 00:19:52', '2022-11-02 00:19:52'),
(38, 33, '2022-11-02 00:19:53', '2022-11-02 00:19:53'),
(39, 34, '2022-11-02 00:19:54', '2022-11-02 00:19:54'),
(40, 35, '2022-11-02 00:19:54', '2022-11-02 00:19:54'),
(41, 36, '2022-11-02 00:19:55', '2022-11-02 00:19:55'),
(42, 37, '2022-11-02 00:19:56', '2022-11-02 00:19:56'),
(43, 38, '2022-11-02 00:19:56', '2022-11-02 00:19:56'),
(44, 39, '2022-11-02 00:19:57', '2022-11-02 00:19:57'),
(45, 40, '2022-11-02 00:19:58', '2022-11-02 00:19:58'),
(46, 41, '2022-11-02 00:19:58', '2022-11-02 00:19:58'),
(47, 42, '2022-11-02 00:19:59', '2022-11-02 00:19:59'),
(48, 43, '2022-11-02 00:20:00', '2022-11-02 00:20:00'),
(49, 44, '2022-11-02 00:20:00', '2022-11-02 00:20:00'),
(50, 45, '2022-11-02 00:20:01', '2022-11-02 00:20:01'),
(51, 46, '2022-11-02 00:20:01', '2022-11-02 00:20:01'),
(52, 47, '2022-11-02 00:20:02', '2022-11-02 00:20:02'),
(53, 48, '2022-11-02 00:20:03', '2022-11-02 00:20:03'),
(54, 49, '2022-11-02 00:20:03', '2022-11-02 00:20:03'),
(55, 50, '2022-11-02 00:20:04', '2022-11-02 00:20:04'),
(56, 51, '2022-11-02 00:20:05', '2022-11-02 00:20:05'),
(57, 52, '2022-11-02 00:20:05', '2022-11-02 00:20:05'),
(58, 53, '2022-11-02 00:20:06', '2022-11-02 00:20:06'),
(59, 54, '2022-11-02 00:20:07', '2022-11-02 00:20:07'),
(60, 55, '2022-11-02 00:20:07', '2022-11-02 00:20:07'),
(61, 56, '2022-11-02 00:20:08', '2022-11-02 00:20:08'),
(62, 57, '2022-11-02 00:20:08', '2022-11-02 00:20:08'),
(63, 58, '2022-11-02 00:20:09', '2022-11-02 00:20:09'),
(64, 59, '2022-11-02 00:20:10', '2022-11-02 00:20:10'),
(65, 60, '2022-11-02 00:20:10', '2022-11-02 00:20:10'),
(66, 61, '2022-11-02 00:20:11', '2022-11-02 00:20:11'),
(67, 62, '2022-11-02 00:20:12', '2022-11-02 00:20:12'),
(68, 63, '2022-11-02 00:20:16', '2022-11-02 00:20:16'),
(69, 64, '2022-11-02 00:20:18', '2022-11-02 00:20:18'),
(70, 65, '2022-11-02 00:20:19', '2022-11-02 00:20:19'),
(71, 66, '2022-11-02 00:20:20', '2022-11-02 00:20:20'),
(72, 67, '2022-11-02 00:20:21', '2022-11-02 00:20:21'),
(73, 68, '2022-11-02 00:20:22', '2022-11-02 00:20:22'),
(74, 69, '2022-11-02 00:20:22', '2022-11-02 00:20:22'),
(75, 70, '2022-11-02 00:20:23', '2022-11-02 00:20:23'),
(76, 71, '2022-11-02 00:20:24', '2022-11-02 00:20:24'),
(77, 72, '2022-11-02 00:20:24', '2022-11-02 00:20:24'),
(78, 73, '2022-11-02 00:20:25', '2022-11-02 00:20:25'),
(79, 74, '2022-11-02 00:20:25', '2022-11-02 00:20:25'),
(80, 75, '2022-11-02 00:20:26', '2022-11-02 00:20:26'),
(81, 76, '2022-11-02 00:20:27', '2022-11-02 00:20:27'),
(82, 77, '2022-11-02 00:20:27', '2022-11-02 00:20:27'),
(83, 78, '2022-11-02 00:20:28', '2022-11-02 00:20:28'),
(84, 79, '2022-11-02 00:20:28', '2022-11-02 00:20:28'),
(85, 80, '2022-11-02 00:20:29', '2022-11-02 00:20:29'),
(86, 81, '2022-11-02 00:20:30', '2022-11-02 00:20:30'),
(87, 82, '2022-11-02 00:20:30', '2022-11-02 00:20:30'),
(88, 83, '2022-11-02 00:20:31', '2022-11-02 00:20:31'),
(89, 84, '2022-11-02 00:20:31', '2022-11-02 00:20:31'),
(90, 85, '2022-11-02 00:20:32', '2022-11-02 00:20:32'),
(91, 86, '2022-11-02 00:20:37', '2022-11-02 00:20:37'),
(92, 87, '2022-11-02 00:20:37', '2022-11-02 00:20:37'),
(93, 88, '2022-11-02 00:20:38', '2022-11-02 00:20:38'),
(94, 89, '2022-11-02 00:20:39', '2022-11-02 00:20:39'),
(95, 90, '2022-11-02 00:20:39', '2022-11-02 00:20:39'),
(96, 91, '2022-11-02 00:20:40', '2022-11-02 00:20:40'),
(97, 92, '2022-11-02 00:20:41', '2022-11-02 00:20:41'),
(98, 93, '2022-11-02 00:20:44', '2022-11-02 00:20:44'),
(99, 94, '2022-11-02 00:20:45', '2022-11-02 00:20:45'),
(100, 95, '2022-11-02 00:20:45', '2022-11-02 00:20:45'),
(101, 96, '2022-11-02 00:20:46', '2022-11-02 00:20:46'),
(102, 97, '2022-11-02 00:20:49', '2022-11-02 00:20:49'),
(103, 98, '2022-11-02 00:20:50', '2022-11-02 00:20:50'),
(104, 99, '2022-11-02 00:20:51', '2022-11-02 00:20:51'),
(105, 100, '2022-11-02 00:20:51', '2022-11-02 00:20:51'),
(106, 101, '2022-11-02 00:20:52', '2022-11-02 00:20:52'),
(107, 102, '2022-11-02 00:20:53', '2022-11-02 00:20:53'),
(108, 103, '2022-11-02 00:20:53', '2022-11-02 00:20:53'),
(109, 104, '2022-11-02 00:20:54', '2022-11-02 00:20:54'),
(110, 105, '2022-11-02 00:20:54', '2022-11-02 00:20:54'),
(111, 106, '2022-11-02 00:20:55', '2022-11-02 00:20:55'),
(112, 107, '2022-11-02 00:20:58', '2022-11-02 00:20:58'),
(113, 108, '2022-11-02 00:20:58', '2022-11-02 00:20:58'),
(114, 109, '2022-11-02 00:20:59', '2022-11-02 00:20:59'),
(115, 110, '2022-11-02 00:21:00', '2022-11-02 00:21:00'),
(116, 111, '2022-11-02 00:21:00', '2022-11-02 00:21:00'),
(117, 112, '2022-11-02 00:21:01', '2022-11-02 00:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$Nfqvkppvh8YipqHgAWVhbOAf/RSROWGXH45sPzqT/ozN.N1fc.QAC', NULL, NULL, NULL, '3b8b2f9265c44423995d57cc760bf2bc', NULL, NULL, 1, 0, '2022-10-30 20:50:11', '2022-10-30 20:50:11', NULL),
(3, 'web@gmail.com', 'web', '$2y$10$Wrh1xvp5zwuShCGaPK7b7OTEfksE.3cXPIJ2UOihhcXVVU87JUsNO', NULL, NULL, NULL, '86f3d2286c1d64ea8cfa63d7f00c2a99', NULL, NULL, 1, 0, '2022-11-03 01:52:16', '2022-11-03 01:52:16', NULL),
(4, 'farozy00@gmail.com', 'farozy', '$2y$10$t2KZ1mkToY1bwLbwuYRFTO/93XN2YUoMnSg1AQ9VcterwEReuYX8y', 'ae069ab2d9db950161a42d8c24d6d6fd', NULL, '2022-11-04 09:50:41', '704fd90ed0ded5513d4b6db2e2b9964d', NULL, NULL, 1, 0, '2022-11-04 08:35:29', '2022-11-04 08:50:41', NULL),
(5, 'farozy12@gmail.com', 'farozy12', '$2y$10$/52ArZWUkemDJ3nxFzu2Lese8cu8TM5cW7oV0w0StoaKlbgJiC4wm', NULL, '2022-11-04 09:00:26', NULL, NULL, NULL, NULL, 1, 0, '2022-11-04 08:55:44', '2022-11-04 09:00:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `kode_antrian`
--
ALTER TABLE `kode_antrian`
  ADD PRIMARY KEY (`id_kode_antrian`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_antrian`
--
ALTER TABLE `no_antrian`
  ADD PRIMARY KEY (`id_no_antrian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kode_antrian`
--
ALTER TABLE `kode_antrian`
  MODIFY `id_kode_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `no_antrian`
--
ALTER TABLE `no_antrian`
  MODIFY `id_no_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
