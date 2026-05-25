-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2023 at 04:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burger-code`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Menus', '2023-05-26 13:42:32', '2023-07-07 16:42:49', NULL),
(2, 'Burgers', '2023-05-26 13:42:32', '2023-05-26 13:42:32', NULL),
(3, 'Snacks', '2023-05-26 13:42:32', '2023-05-26 13:42:32', NULL),
(4, 'Salades', '2023-05-26 13:42:32', '2023-05-26 13:42:32', NULL),
(5, 'Boissons', '2023-05-26 13:42:32', '2023-05-26 13:42:32', NULL),
(6, 'Desserts', '2023-05-26 13:42:32', '2023-05-26 13:42:32', NULL),
(7, 'redfwdsadew', '2023-07-09 14:06:01', '2023-07-09 14:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` mediumtext NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `prenom`, `nom`, `mail`, `password`, `remember_token`, `admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Edws', 'Efdws', 'wdsa@de.com', '$2y$10$xKCQR048zMmr3OTEJUg0L.I5Sm3VDdmXPkEa944eqGxsvhTzkUEmS', NULL, 1, '2023-07-04 14:01:38', '2023-07-04 14:01:38', NULL),
(2, 'Fthgnfv', 'Yjhtgrf', 'wds@hdk.com', '$2y$10$qP0DBfpS0VWwVbc.IfFf7./xOzlsAgpSWGh7PHX3eCCckcXNAY2hi', NULL, 0, '2023-07-04 19:16:53', '2023-07-04 19:16:53', NULL),
(3, 'Gaston', 'Mcklay', 'gsmck@gmail.com', '$2y$10$f6xfRELs.yEqw629DZS6xOQ80dSKmCl84c9PEW0phEiotnYpeNWp6', NULL, 1, '2023-07-05 14:28:14', '2023-07-05 14:28:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` int(11) NOT NULL,
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `nombre`, `price_id`, `item_id`, `categorie_id`, `client_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, 1, 3, '2023-07-08 16:43:35', '2023-07-08 16:43:35'),
(5, 2, 2, 2, 1, 3, '2023-07-08 16:43:41', '2023-07-08 16:43:51'),
(6, 1, 3, 3, 1, 3, '2023-07-08 16:43:50', '2023-07-08 16:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` mediumtext NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `content`, `item_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'm1.png', 1, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(2, 'm2.png', 2, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(3, 'm3.png', 3, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(4, 'm4.png', 4, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(5, 'm5.png', 5, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(6, 'm6.png', 6, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(7, 'b1.png', 7, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(8, 'b2.png', 8, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(9, 'b3.png', 9, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(10, 'b4.png', 10, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(11, 'b5.png', 11, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(12, 'b6.png', 12, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(13, 's1.png', 13, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(14, 's2.png', 14, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(15, 's3.png', 15, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(16, 's4.png', 16, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(17, 's5.png', 17, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(18, 'sa1.png', 18, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(19, 'sa2.png', 19, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(20, 'sa3.png', 20, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(21, 'sa4.png', 21, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(22, 'sa5.png', 22, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(23, 'bo1.png', 23, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(24, 'bo2.png', 24, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(25, 'bo3.png', 25, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(26, 'bo4.png', 26, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(27, 'bo5.png', 27, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(28, 'bo6.png', 28, '2023-06-24 19:58:25', '2023-06-24 19:58:25', NULL),
(29, 'd1.png', 29, '2023-06-24 20:49:48', '2023-06-24 20:49:48', NULL),
(30, 'd2.png', 30, '2023-06-24 20:49:48', '2023-06-24 20:49:48', NULL),
(31, 'd3.png', 31, '2023-06-24 20:49:48', '2023-06-24 20:49:48', NULL),
(32, 'd4.png', 32, '2023-06-24 20:49:48', '2023-06-24 20:49:48', NULL),
(33, 'd5.png', 33, '2023-06-24 20:57:50', '2023-06-24 20:57:50', NULL),
(35, 'ScreenShot2023-05-29at10.00.37.png', 37, '2023-07-09 14:05:06', '2023-07-09 14:05:06', NULL),
(36, 'ScreenShot2023-05-29at10.00.37.png', 38, '2023-07-09 14:06:01', '2023-07-09 14:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `categorie_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Burger', 'Sandwich: Burger, Salade, Tomate, Cornichon + Frites + Boisson', 1, '2023-06-23 21:10:02', '2023-07-09 12:14:16', NULL),
(2, 'Menu Bacon', 'Sandwich: Burger, Fromage, Bacon, Salade, Tomate + Frites + Boisson', 1, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(3, 'Menu Big ', 'Sandwich: Double Burger, Fromage, Cornichon, Salade + Frites + Boisson', 1, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(4, 'Menu Chicken', 'Sandwich: Poulet Frit, Tomate, Salade, Mayonnaise + Frites + Boisson', 1, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(5, 'Menu Fish', 'Sandwich: Poisson, Salade, Mayonnaise, Cornichon + Frites + Boisson', 1, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(6, 'Menu Double Steak', 'Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate + Frites + Boisson', 1, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(7, 'Classic', 'Sandwich: Burger, Salade, Tomate, Cornichon', 2, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(8, 'Bacon', 'Sandwich: Burger, Fromage, Bacon, Salade, Tomate', 2, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(9, 'Big', 'Sandwich: Double Burger, Fromage, Cornichon, Salade', 2, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(10, 'Chicken', 'Sandwich: Poulet Frit, Tomate, Salade, Mayonnaise', 2, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(11, 'Fish', 'Sandwich: Poisson Pané, Salade, Mayonnaise, Cornichon', 2, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(12, 'Double Steak', 'Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate', 2, '2023-06-23 21:10:02', '2023-06-23 21:10:02', NULL),
(13, 'Frites', 'Pommes de terre frites', 3, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(14, 'Onion Rings', 'Rondelles d\'oignon frits', 3, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(15, 'Nuggets', 'Nuggets de poulet frits', 3, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(16, 'Nuggets Fromage', 'Nuggets de fromage frits', 3, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(17, 'Ailes De Poulet', 'Ailes de poulet Barbecue', 3, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(18, 'César Poulet Pané', 'Poulet Pané, Salade, Tomate et la fameuse sauce César', 4, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(19, 'César Poulet Grillé', 'Poulet Grillé, Salade, Tomate et la fameuse sauce César', 4, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(20, 'Salades Light', 'Salade, Tomate, Concombre, Maïs et Vinaigre balsamique', 4, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(21, 'Poulet Pané', 'Poulet Pané, Salade, Tomate et la sauce de votre choix', 4, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(22, 'Poulet Grillé', 'Poulet Grillé, Salade, Tomate et la sauce de votre choix', 4, '2023-06-24 21:29:23', '2023-06-24 21:29:23', NULL),
(23, 'Coca-Cola', 'Au choix: Petit, Moyen ou Grand', 5, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(24, 'Coca-Cola Light', 'Au choix: Petit, Moyen ou Grand', 5, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(25, 'Coca-Cola Zéro', 'Au choix: Petit, Moyen ou Grand', 5, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(26, 'Fanta', 'Au choix: Petit, Moyen ou Grand', 5, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(27, 'Sprite', 'Au choix: Petit, Moyen ou Grand', 5, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(28, 'Nestea', 'Au choix: Petit, Moyen ou Grand', 5, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(29, 'Fondant Au Chocolat', 'Au choix: Chocolat Blanc ou au lait', 6, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(30, 'Muffin', 'Au choix: Au fruits ou au chocolat', 6, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(31, 'Beignet', 'Au choix: Au chocolat ou à la vanille', 6, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(32, 'Milkshake', 'Au choix: Fraise, Vanille ou Chocolat', 6, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(33, 'Sandae', 'Au choix: Fraise, Caramel ou Chocolat', 6, '2023-06-24 17:48:08', '2023-06-24 17:48:08', NULL),
(37, 'rd', 'erfdds', 6, '2023-07-09 14:05:06', '2023-07-09 14:05:06', NULL),
(38, 'e3wda', 'erwdsads', 7, '2023-07-09 14:06:01', '2023-07-09 14:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 22),
(2, '2014_10_12_100000_create_password_resets_table', 22),
(3, '2019_08_19_000000_create_failed_jobs_table', 22),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 22),
(5, '2023_05_26_133357_create_categories_table', 23),
(6, '2023_05_26_133358_create_items_table', 24),
(7, '2023_05_26_163310_create_images_table', 25),
(8, '2023_05_26_174860_create_price_table', 26),
(9, '2023_06_11_073503_create_root_data_table', 26),
(10, '2023_06_11_073914_create_secondary_titles_table', 26),
(11, '2023_06_11_073948_create_url_texts_table', 26),
(12, '2023_06_13_091411_create_commandes_table', 27),
(13, '2023_06_13_091456_create_clients_table', 27),
(14, '2023_06_26_083338_create_secondary_titles_table', 28),
(15, '2023_06_26_083339_create_url_texts_table', 29),
(16, '2023_06_26_083547_create_root_data_table', 30),
(17, '2023_06_26_083800_create_categories_table', 31),
(18, '2023_06_26_083837_create_items_table', 32),
(19, '2023_06_26_083912_create_images_table', 33),
(20, '2023_06_26_084022_create_prices_table', 34),
(21, '2023_06_26_084055_create_clients_table', 35),
(22, '2023_06_26_084212_create_commandes_table', 36),
(23, '2023_06_29_153237_create_sessions_table', 36),
(24, '2023_06_26_084056_create_clients_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` double(4,2) NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `content`, `item_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8.90, 1, '2023-06-25 02:14:49', '2023-07-09 12:12:09', NULL),
(2, 9.50, 2, '2023-06-25 02:14:49', '2023-06-25 02:14:49', NULL),
(3, 10.90, 3, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(4, 9.90, 4, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(5, 10.90, 5, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(6, 11.90, 6, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(7, 5.90, 7, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(8, 6.50, 8, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(9, 6.90, 9, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(10, 5.90, 10, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(11, 6.50, 11, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(12, 7.50, 12, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(13, 3.90, 13, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(14, 3.40, 14, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(15, 5.90, 15, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(16, 3.50, 16, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(17, 5.90, 17, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(18, 8.90, 18, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(19, 8.90, 19, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(20, 5.90, 20, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(21, 7.90, 21, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(22, 7.90, 22, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(23, 1.80, 23, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(24, 1.90, 24, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(25, 1.90, 25, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(26, 1.90, 26, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(27, 1.90, 27, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(28, 1.90, 28, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(29, 4.90, 29, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(30, 2.90, 30, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(31, 2.90, 31, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(32, 3.90, 32, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(33, 4.50, 33, '2023-06-25 01:44:41', '2023-06-25 01:44:41', NULL),
(36, 23.00, 37, '2023-07-09 14:05:06', '2023-07-09 14:05:06', NULL),
(37, 23.00, 38, '2023-07-09 14:06:01', '2023-07-09 14:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `root_data`
--

CREATE TABLE `root_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `root_data`
--

INSERT INTO `root_data` (`id`, `name`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Le Nom Du Site Web', 'Burger Code', '2023-06-25 19:57:58', '2023-07-07 16:43:46', NULL),
(2, 'Le Mot de Passe Génerale', '123456', '2023-06-25 19:57:58', '2023-06-25 19:57:58', NULL),
(3, 'L\'icon Principale Du Site', 'cutlery.png', '2023-06-25 19:57:58', '2023-07-07 16:36:16', NULL),
(4, 'Le Thème Des Pages', 'rouge', '2023-06-25 19:57:58', '2023-07-07 16:55:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `secondary_titles`
--

CREATE TABLE `secondary_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` mediumtext NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `secondary_titles`
--

INSERT INTO `secondary_titles` (`id`, `position`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Page De La Liste Des Élement', 'Liste Des Élements Dans Le Menu', '2023-06-25 20:18:03', '2023-06-25 20:18:03', NULL),
(2, 'Page De La D\'affichage Des Élement', 'Affichage Des Élements', '2023-06-25 20:18:03', '2023-07-07 17:26:19', NULL),
(3, 'Page De La Modification Des Élements', 'Modification Des Élements', '2023-06-25 20:18:03', '2023-06-25 20:18:03', NULL),
(4, 'Page De L\'ajout Des Élements', 'Ajouter Un Élement Au Menu', '2023-06-25 20:18:03', '2023-06-25 20:18:03', NULL),
(5, 'Page De La Suppression Des Élements', 'Suprimer Un Élements Du Menu', '2023-06-25 20:18:03', '2023-06-25 20:18:03', NULL),
(6, 'Page De La Gestion Des Pages', 'Gestion Du Contenue Des Pages', '2023-06-25 20:18:03', '2023-07-07 22:55:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('m8rmkidGqlSbsUtKNicMc7ReH0zuqifqevrgMFSm', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUjQ2eEhSYWxWSENHUTJlbElYMmhHT284Y0xYWkRjeTRBVnFaSHJmdCI7czo5OiJvbGRfcm91dGUiO3M6NzoiZ2VzdGlvbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9saXN0L2RlbGV0ZS0zNyI7fXM6OToiY2xpZW50X2lkIjtpOjM7fQ==', 1688912721);

-- --------------------------------------------------------

--
-- Table structure for table `url_texts`
--

CREATE TABLE `url_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` mediumtext NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `url_texts`
--

INSERT INTO `url_texts` (`id`, `position`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Page accueil', 'Burger Code', '2023-06-25 19:42:01', '2023-07-07 16:37:10', NULL),
(2, 'Page De La Liste Des Élement', 'Burger Code | Liste', '2023-06-25 19:42:01', '2023-06-25 19:42:01', NULL),
(3, 'Page De La D\'affichage Des Élement', 'Burger Code | Affichages', '2023-06-25 19:42:01', '2023-07-07 16:38:02', NULL),
(4, 'Page De Modifications Des Élements', 'Burger Code | Modifications', '2023-06-25 19:42:01', '2023-07-07 16:41:19', NULL),
(5, 'Page De L\'ajout Des Élements', 'Burger Code | Ajouts', '2023-06-25 19:42:01', '2023-07-07 16:41:25', NULL),
(6, 'Page De La Suppression Des Élements', 'Burger Code | Suppressions', '2023-06-25 19:42:01', '2023-07-07 16:41:45', NULL),
(7, 'Page De La Gestion Des Pages', 'Burger Code | Gestions', '2023-06-25 19:42:01', '2023-07-07 16:41:56', NULL),
(8, 'Pages Commandes ', 'Burger Code | Commandes', '2023-07-06 13:12:30', '2023-07-07 22:50:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_mail_unique` (`mail`) USING HASH;

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_price_id_foreign` (`price_id`),
  ADD KEY `commandes_item_id_foreign` (`item_id`),
  ADD KEY `commandes_categorie_id_foreign` (`categorie_id`),
  ADD KEY `commandes_client_id_foreign` (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_item_id_foreign` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_categorie_id_foreign` (`categorie_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_item_id_foreign` (`item_id`);

--
-- Indexes for table `root_data`
--
ALTER TABLE `root_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secondary_titles`
--
ALTER TABLE `secondary_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `url_texts`
--
ALTER TABLE `url_texts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `root_data`
--
ALTER TABLE `root_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `secondary_titles`
--
ALTER TABLE `secondary_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `url_texts`
--
ALTER TABLE `url_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `prices` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
