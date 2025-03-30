-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 30 2025 г., 15:22
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `crm_center`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cours`
--

CREATE TABLE `cours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('true','false') NOT NULL DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cours_tests`
--

CREATE TABLE `cours_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_id` bigint(20) UNSIGNED NOT NULL,
  `test` text NOT NULL,
  `javob_true` varchar(255) NOT NULL,
  `javob_false_first` varchar(255) NOT NULL,
  `javob_false_two` varchar(255) NOT NULL,
  `javob_false_thre` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cours_videos`
--

CREATE TABLE `cours_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_id` bigint(20) UNSIGNED NOT NULL,
  `cours_name` varchar(255) NOT NULL,
  `lessen_number` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `davomads`
--

CREATE TABLE `davomads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_id` bigint(20) UNSIGNED NOT NULL,
  `setting_rooms_id` bigint(20) UNSIGNED NOT NULL,
  `techer_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `setting_paymarts` bigint(20) UNSIGNED NOT NULL,
  `weekday` varchar(255) NOT NULL,
  `lessen_count` int(11) NOT NULL,
  `lessen_start` datetime NOT NULL,
  `lessen_end` datetime NOT NULL,
  `lessen_times_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `next` varchar(255) NOT NULL,
  `techer_paymart` varchar(255) NOT NULL,
  `techer_bonus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `group_davomats`
--

CREATE TABLE `group_davomats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `group_days`
--

CREATE TABLE `group_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `lessen_times_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `group_users`
--

CREATE TABLE `group_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `start_meneger` bigint(20) UNSIGNED DEFAULT NULL,
  `start_discription` text DEFAULT NULL,
  `end_meneger` bigint(20) UNSIGNED DEFAULT NULL,
  `end_discription` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `jarima_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `hodim_paymarts`
--

CREATE TABLE `hodim_paymarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `type` enum('naqt','plastik') NOT NULL,
  `description` text DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `comment` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `kassas`
--

CREATE TABLE `kassas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naqt` decimal(15,2) NOT NULL DEFAULT 0.00,
  `naqt_xar_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `naqt_chiq_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `naqt_qayt_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `plastik` decimal(15,2) NOT NULL DEFAULT 0.00,
  `plastik_xar_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `plastik_chiq_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `plastik_qayt_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kassas`
--

INSERT INTO `kassas` (`id`, `naqt`, `naqt_xar_pedding`, `naqt_chiq_pedding`, `naqt_qayt_pedding`, `plastik`, `plastik_xar_pedding`, `plastik_chiq_pedding`, `plastik_qayt_pedding`, `created_at`, `updated_at`) VALUES
(1, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2025-03-30 13:21:22', '2025-03-30 13:21:22');

-- --------------------------------------------------------

--
-- Структура таблицы `kassa_histories`
--

CREATE TABLE `kassa_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meneger_id` bigint(20) UNSIGNED NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` text DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` enum('naqt_chiq','naqt_xar','plastik_chiq','plastik_xar') NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `succes_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lessen_times`
--

CREATE TABLE `lessen_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL COMMENT 'Dars raqami',
  `time` varchar(255) NOT NULL COMMENT 'Dars vaqti MM:SS - MM:SS formatida',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `meneger_charts`
--

CREATE TABLE `meneger_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paymart_add_naqt` int(11) NOT NULL DEFAULT 0,
  `paymart_add_plastik` int(11) NOT NULL DEFAULT 0,
  `chegirma_add` int(11) NOT NULL DEFAULT 0,
  `qaytarildi_add` int(11) NOT NULL DEFAULT 0,
  `create_group` int(11) NOT NULL DEFAULT 0,
  `create_student` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_15_164831_create_personal_access_tokens_table', 1),
(5, '2025_02_15_231718_create_settings_table', 1),
(6, '2025_02_16_025735_create_lessen_times_table', 1),
(7, '2025_02_16_120638_create_holidays_table', 1),
(8, '2025_02_16_152810_create_setting_paymarts_table', 1),
(9, '2025_02_16_162427_create_setting_chegirmas_table', 1),
(10, '2025_02_16_194231_create_setting_rooms_table', 1),
(11, '2025_02_16_201009_create_cours_table', 1),
(12, '2025_02_16_201321_create_cours_videos_table', 1),
(13, '2025_02_16_201417_create_cours_tests_table', 1),
(14, '2025_02_18_105321_create_user_histories_table', 1),
(15, '2025_02_18_112724_create_meneger_charts_table', 1),
(16, '2025_02_18_124533_create_send_messages_table', 1),
(17, '2025_02_19_185012_create_socials_table', 1),
(18, '2025_02_19_231643_create_groups_table', 1),
(19, '2025_02_19_233422_create_group_days_table', 1),
(20, '2025_02_19_233914_create_group_davomats_table', 1),
(21, '2025_02_19_234619_create_group_users_table', 1),
(22, '2025_02_20_124550_update_lessen_start_end_in_groups_table', 1),
(23, '2025_02_22_211036_create_kassas_table', 1),
(24, '2025_02_22_211138_create_kassa_histories_table', 1),
(25, '2025_02_22_211553_create_paymarts_table', 1),
(26, '2025_02_22_211817_create_moliya_histories_table', 1),
(27, '2025_02_27_105050_create_techer_paymarts_table', 1),
(28, '2025_02_27_183937_create_hodim_paymarts_table', 1),
(29, '2025_03_02_215230_create_varonkas_table', 1),
(30, '2025_03_02_215435_create_varonka_histories_table', 1),
(31, '2025_03_05_000551_create_davomads_table', 1),
(32, '2025_03_05_000731_create_test_checks_table', 1),
(33, '2025_03_10_224703_create_refund_statuses_table', 1),
(34, '2025_03_30_161512_create_upload_users_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `moliya_histories`
--

CREATE TABLE `moliya_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('ish_naqt','ish_plas','xar_naqt','xar_plastik','chiq_naqt','chiq_plastik','chiq_exson') NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `comment` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `paymarts`
--

CREATE TABLE `paymarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `paymart_type` enum('naqt','plastik','chegirma','qaytarildi') NOT NULL,
  `description` text DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `refund_statuses`
--

CREATE TABLE `refund_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymart_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `send_messages`
--

CREATE TABLE `send_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dl5VLzFKcLkD1LYWs0uq4fpK8SxNcogMp57GN4ji', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYmY5eG5Qb1l6eFI4b3BqS094b3RHM2l3dDZ4cmJncFM1QXp3Z1lNaSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3NhZG1pbi9zL3NldHRpbmciO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1743340854);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('true','false','delete') NOT NULL DEFAULT 'true',
  `balans_naqt` decimal(15,2) NOT NULL DEFAULT 0.00,
  `balans_plastik` decimal(15,2) NOT NULL DEFAULT 0.00,
  `balans_exson` decimal(15,2) NOT NULL DEFAULT 0.00,
  `exson_foiz` decimal(5,2) NOT NULL DEFAULT 0.00,
  `social_telegram` int(11) NOT NULL DEFAULT 0,
  `social_instagram` int(11) NOT NULL DEFAULT 0,
  `social_facebook` int(11) NOT NULL DEFAULT 0,
  `social_youtube` int(11) NOT NULL DEFAULT 0,
  `social_banner` int(11) NOT NULL DEFAULT 0,
  `social_tanish` int(11) NOT NULL DEFAULT 0,
  `social_boshqa` int(11) NOT NULL DEFAULT 0,
  `message_mavjud` int(11) NOT NULL DEFAULT 0,
  `message_count` int(11) NOT NULL DEFAULT 0,
  `message_status` tinyint(1) NOT NULL DEFAULT 0,
  `new_student_sms` tinyint(1) NOT NULL DEFAULT 0,
  `new_hodim_sms` tinyint(1) NOT NULL DEFAULT 0,
  `pay_student_sms` tinyint(1) NOT NULL DEFAULT 0,
  `pay_hodim_sms` tinyint(1) NOT NULL DEFAULT 0,
  `update_pass_sms` tinyint(1) NOT NULL DEFAULT 0,
  `birthday_sms` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`, `status`, `balans_naqt`, `balans_plastik`, `balans_exson`, `exson_foiz`, `social_telegram`, `social_instagram`, `social_facebook`, `social_youtube`, `social_banner`, `social_tanish`, `social_boshqa`, `message_mavjud`, `message_count`, `message_status`, `new_student_sms`, `new_hodim_sms`, `pay_student_sms`, `pay_hodim_sms`, `update_pass_sms`, `birthday_sms`, `created_at`, `updated_at`) VALUES
(1, 'Asosiy Sozlamalar', 'true', 0.00, 0.00, 0.00, 5.00, 0, 0, 0, 0, 0, 0, 0, 1, 10, 1, 1, 0, 1, 0, 1, 1, '2025-03-30 13:21:22', '2025-03-30 13:21:22');

-- --------------------------------------------------------

--
-- Структура таблицы `setting_chegirmas`
--

CREATE TABLE `setting_chegirmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `chegirma` decimal(15,2) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` enum('true','delete') NOT NULL DEFAULT 'true',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `setting_paymarts`
--

CREATE TABLE `setting_paymarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `chegirma` decimal(10,2) NOT NULL DEFAULT 0.00,
  `admin_chegirma` decimal(10,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('true','false','delete') NOT NULL DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `setting_rooms`
--

CREATE TABLE `setting_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('true','delete') NOT NULL DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `socials`
--

INSERT INTO `socials` (`id`, `name`, `count`, `created_at`, `updated_at`) VALUES
(1, 'Qarshi_sh', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(2, 'Shahrisabz_sh', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(3, 'Dehqonobod', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(4, 'G\'uzor', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(5, 'Kasbi', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(6, 'Kitob', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(7, 'Koson', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(8, 'Mirishkor', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(9, 'Muborak', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(10, 'Nishon', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(11, 'Qamashi', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(12, 'Yakkabog', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(13, 'Chiroqchi', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22'),
(14, 'Shahrisabz', 0, '2025-03-30 13:21:22', '2025-03-30 13:21:22');

-- --------------------------------------------------------

--
-- Структура таблицы `techer_paymarts`
--

CREATE TABLE `techer_paymarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `type` enum('naqt','plastik') NOT NULL,
  `description` text DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `test_checks`
--

CREATE TABLE `test_checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `count_true` int(11) NOT NULL,
  `ball` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `upload_users`
--

CREATE TABLE `upload_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `commint` varchar(255) NOT NULL DEFAULT 'pedding',
  `status` varchar(255) NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `about` text DEFAULT NULL,
  `group_count` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `type` enum('sAdmin','admin','meneger','techer','student') NOT NULL,
  `status` enum('true','false','locked') NOT NULL DEFAULT 'true',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `balans` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `about`, `group_count`, `email`, `type`, `status`, `email_verified_at`, `password`, `balans`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '+998 90 123 4567', '+998 90 765 4321', 'Qarshi shahar', '1997-01-01', 'Tizim administratori', 0, 'sadmin@gmail.com', 'sAdmin', 'true', NULL, '$2y$12$xZRZtd9f4yl/oY7em/VxK.1RLlH5/Fg71E55Vead3duW34kiSruKe', 0, NULL, '2025-03-30 13:21:22', '2025-03-30 13:21:22');

-- --------------------------------------------------------

--
-- Структура таблицы `user_histories`
--

CREATE TABLE `user_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('visited','paymart_add','paymart_return','paymart_jarima','chegirma_add','group_add','group_delete','password_update') NOT NULL,
  `type_commit` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `varonkas`
--

CREATE TABLE `varonkas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` enum('new','repeat','pedding','success','cancel') NOT NULL DEFAULT 'new',
  `register_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `type_social` enum('social_telegram','social_facebook','social_youtube','social_banner','social_tanish','social_boshqa') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `varonka_histories`
--

CREATE TABLE `varonka_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `varonka_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `cours_tests`
--
ALTER TABLE `cours_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_tests_cours_id_foreign` (`cours_id`),
  ADD KEY `cours_tests_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `cours_videos`
--
ALTER TABLE `cours_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_videos_cours_id_foreign` (`cours_id`),
  ADD KEY `cours_videos_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `davomads`
--
ALTER TABLE `davomads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `davomads_user_id_foreign` (`user_id`),
  ADD KEY `davomads_group_id_foreign` (`group_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_cours_id_foreign` (`cours_id`),
  ADD KEY `groups_setting_rooms_id_foreign` (`setting_rooms_id`),
  ADD KEY `groups_techer_id_foreign` (`techer_id`),
  ADD KEY `groups_setting_paymarts_foreign` (`setting_paymarts`),
  ADD KEY `groups_lessen_times_id_foreign` (`lessen_times_id`),
  ADD KEY `groups_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `group_davomats`
--
ALTER TABLE `group_davomats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_davomats_group_id_foreign` (`group_id`),
  ADD KEY `group_davomats_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `group_days`
--
ALTER TABLE `group_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_days_group_id_foreign` (`group_id`),
  ADD KEY `group_days_room_id_foreign` (`room_id`),
  ADD KEY `group_days_lessen_times_id_foreign` (`lessen_times_id`);

--
-- Индексы таблицы `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_users_user_id_foreign` (`user_id`),
  ADD KEY `group_users_group_id_foreign` (`group_id`),
  ADD KEY `group_users_start_meneger_foreign` (`start_meneger`),
  ADD KEY `group_users_end_meneger_foreign` (`end_meneger`);

--
-- Индексы таблицы `hodim_paymarts`
--
ALTER TABLE `hodim_paymarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hodim_paymarts_user_id_foreign` (`user_id`),
  ADD KEY `hodim_paymarts_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holidays_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kassas`
--
ALTER TABLE `kassas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kassa_histories`
--
ALTER TABLE `kassa_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kassa_histories_meneger_id_foreign` (`meneger_id`),
  ADD KEY `kassa_histories_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `lessen_times`
--
ALTER TABLE `lessen_times`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `meneger_charts`
--
ALTER TABLE `meneger_charts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meneger_charts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moliya_histories`
--
ALTER TABLE `moliya_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moliya_histories_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `paymarts`
--
ALTER TABLE `paymarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymarts_user_id_foreign` (`user_id`),
  ADD KEY `paymarts_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `refund_statuses`
--
ALTER TABLE `refund_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `send_messages`
--
ALTER TABLE `send_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `send_messages_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `setting_chegirmas`
--
ALTER TABLE `setting_chegirmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_chegirmas_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `setting_paymarts`
--
ALTER TABLE `setting_paymarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_paymarts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `setting_rooms`
--
ALTER TABLE `setting_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_rooms_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `socials_name_unique` (`name`);

--
-- Индексы таблицы `techer_paymarts`
--
ALTER TABLE `techer_paymarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `techer_paymarts_user_id_foreign` (`user_id`),
  ADD KEY `techer_paymarts_group_id_foreign` (`group_id`),
  ADD KEY `techer_paymarts_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `test_checks`
--
ALTER TABLE `test_checks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_checks_user_id_foreign` (`user_id`),
  ADD KEY `test_checks_group_id_foreign` (`group_id`);

--
-- Индексы таблицы `upload_users`
--
ALTER TABLE `upload_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_type_phone1_unique` (`type`,`phone1`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_histories`
--
ALTER TABLE `user_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_histories_user_id_foreign` (`user_id`),
  ADD KEY `user_histories_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `varonkas`
--
ALTER TABLE `varonkas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `varonka_histories`
--
ALTER TABLE `varonka_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `varonka_histories_varonka_id_foreign` (`varonka_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cours`
--
ALTER TABLE `cours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cours_tests`
--
ALTER TABLE `cours_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cours_videos`
--
ALTER TABLE `cours_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `davomads`
--
ALTER TABLE `davomads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `group_davomats`
--
ALTER TABLE `group_davomats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `group_days`
--
ALTER TABLE `group_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `group_users`
--
ALTER TABLE `group_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `hodim_paymarts`
--
ALTER TABLE `hodim_paymarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kassas`
--
ALTER TABLE `kassas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `kassa_histories`
--
ALTER TABLE `kassa_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lessen_times`
--
ALTER TABLE `lessen_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `meneger_charts`
--
ALTER TABLE `meneger_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `moliya_histories`
--
ALTER TABLE `moliya_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `paymarts`
--
ALTER TABLE `paymarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `refund_statuses`
--
ALTER TABLE `refund_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `send_messages`
--
ALTER TABLE `send_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `setting_chegirmas`
--
ALTER TABLE `setting_chegirmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `setting_paymarts`
--
ALTER TABLE `setting_paymarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `setting_rooms`
--
ALTER TABLE `setting_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `techer_paymarts`
--
ALTER TABLE `techer_paymarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `test_checks`
--
ALTER TABLE `test_checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `upload_users`
--
ALTER TABLE `upload_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_histories`
--
ALTER TABLE `user_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `varonkas`
--
ALTER TABLE `varonkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `varonka_histories`
--
ALTER TABLE `varonka_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cours_tests`
--
ALTER TABLE `cours_tests`
  ADD CONSTRAINT `cours_tests_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cours_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cours_videos`
--
ALTER TABLE `cours_videos`
  ADD CONSTRAINT `cours_videos_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cours_videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `davomads`
--
ALTER TABLE `davomads`
  ADD CONSTRAINT `davomads_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `davomads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_lessen_times_id_foreign` FOREIGN KEY (`lessen_times_id`) REFERENCES `lessen_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_setting_paymarts_foreign` FOREIGN KEY (`setting_paymarts`) REFERENCES `setting_paymarts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_setting_rooms_id_foreign` FOREIGN KEY (`setting_rooms_id`) REFERENCES `setting_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_techer_id_foreign` FOREIGN KEY (`techer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `group_davomats`
--
ALTER TABLE `group_davomats`
  ADD CONSTRAINT `group_davomats_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_davomats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `group_days`
--
ALTER TABLE `group_days`
  ADD CONSTRAINT `group_days_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_days_lessen_times_id_foreign` FOREIGN KEY (`lessen_times_id`) REFERENCES `lessen_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_days_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `setting_rooms` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `group_users`
--
ALTER TABLE `group_users`
  ADD CONSTRAINT `group_users_end_meneger_foreign` FOREIGN KEY (`end_meneger`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `group_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_users_start_meneger_foreign` FOREIGN KEY (`start_meneger`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `group_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hodim_paymarts`
--
ALTER TABLE `hodim_paymarts`
  ADD CONSTRAINT `hodim_paymarts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hodim_paymarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `holidays`
--
ALTER TABLE `holidays`
  ADD CONSTRAINT `holidays_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `kassa_histories`
--
ALTER TABLE `kassa_histories`
  ADD CONSTRAINT `kassa_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kassa_histories_meneger_id_foreign` FOREIGN KEY (`meneger_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `meneger_charts`
--
ALTER TABLE `meneger_charts`
  ADD CONSTRAINT `meneger_charts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moliya_histories`
--
ALTER TABLE `moliya_histories`
  ADD CONSTRAINT `moliya_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `paymarts`
--
ALTER TABLE `paymarts`
  ADD CONSTRAINT `paymarts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paymarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `send_messages`
--
ALTER TABLE `send_messages`
  ADD CONSTRAINT `send_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `setting_chegirmas`
--
ALTER TABLE `setting_chegirmas`
  ADD CONSTRAINT `setting_chegirmas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `setting_paymarts`
--
ALTER TABLE `setting_paymarts`
  ADD CONSTRAINT `setting_paymarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `setting_rooms`
--
ALTER TABLE `setting_rooms`
  ADD CONSTRAINT `setting_rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `techer_paymarts`
--
ALTER TABLE `techer_paymarts`
  ADD CONSTRAINT `techer_paymarts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `techer_paymarts_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `techer_paymarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `test_checks`
--
ALTER TABLE `test_checks`
  ADD CONSTRAINT `test_checks_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_checks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_histories`
--
ALTER TABLE `user_histories`
  ADD CONSTRAINT `user_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `varonka_histories`
--
ALTER TABLE `varonka_histories`
  ADD CONSTRAINT `varonka_histories_varonka_id_foreign` FOREIGN KEY (`varonka_id`) REFERENCES `varonkas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
