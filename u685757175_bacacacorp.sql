-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2026 at 01:56 AM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u685757175_bacacacorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_logs`
--

CREATE TABLE `action_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_type` varchar(255) DEFAULT NULL,
  `document_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `trackable_type` varchar(255) DEFAULT NULL,
  `trackable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `batch_uuid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_logs`
--

INSERT INTO `action_logs` (`id`, `document_type`, `document_id`, `user_id`, `created_by`, `action`, `details`, `remarks`, `trackable_type`, `trackable_id`, `ip_address`, `user_agent`, `location`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"remember_token\":\"vQEOCdQTwl5DmN6TCzrKYoWtoO6ca7mbNJUnVpmvukEocgMSD7FQXquxx0Qb\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"remember_token\":\"C7OfYKPjuj7gltY8ZejL8VNm3LAptGAHU4neQcgN7XCeAVqe2vgkZAnlQ83A\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"remember_token\",\"from\":\"vQEOCdQTwl5DmN6TCzrKYoWtoO6ca7mbNJUnVpmvukEocgMSD7FQXquxx0Qb\",\"to\":\"C7OfYKPjuj7gltY8ZejL8VNm3LAptGAHU4neQcgN7XCeAVqe2vgkZAnlQ83A\"},{\"field\":\"role\",\"from\":\"stsg\",\"to\":\"stsg\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-09-24 17:28:57', '2025-09-24 17:28:57'),
(2, 'App\\Models\\applied_candidacy', 1, 1, 1, 'created', 'Created applied_candidacy', '{\"attributes\":{\"students_id\":\"1\",\"position_id\":\"1\",\"school_year_and_semester_id\":\"2\",\"partylist_id\":\"1\",\"grade_attachment\":\"grade_attachments\\/RCxom65Uytb2w8MK2JZkj1QcaIAcDCu78jl1eYW6.jpg\",\"is_regular_student\":true,\"status\":\"pending\",\"id\":\"1\"},\"changes_summary\":[{\"field\":\"students_id\",\"from\":null,\"to\":\"1\"},{\"field\":\"position_id\",\"from\":null,\"to\":\"1\"},{\"field\":\"school_year_and_semester_id\",\"from\":null,\"to\":\"2\"},{\"field\":\"partylist_id\",\"from\":null,\"to\":\"1\"},{\"field\":\"grade_attachment\",\"from\":null,\"to\":\"grade_attachments\\/RCxom65Uytb2w8MK2JZkj1QcaIAcDCu78jl1eYW6.jpg\"},{\"field\":\"is_regular_student\",\"from\":null,\"to\":true},{\"field\":\"status\",\"from\":null,\"to\":\"pending\"},{\"field\":\"id\",\"from\":null,\"to\":\"1\"}]}', 'App\\Models\\applied_candidacy', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-09-24 17:29:42', '2025-09-24 17:29:42'),
(3, 'App\\Models\\applied_candidacy', 1, 1, 1, 'candidacy_submitted', 'Candidacy_submitted applied_candidacy', '{\"message\":\"Candidacy application submitted by student: Maite Garner\",\"signatories_notified\":1}', 'App\\Models\\applied_candidacy', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-09-24 17:29:42', '2025-09-24 17:29:42'),
(4, 'App\\Models\\applied_candidacy', 1, 1, 1, 'updated', 'Updated applied_candidacy', '{\"old\":{\"id\":\"1\",\"students_id\":\"1\",\"position_id\":\"1\",\"school_year_and_semester_id\":\"2\",\"is_regular_student\":\"1\",\"grade_attachment\":\"grade_attachments\\/RCxom65Uytb2w8MK2JZkj1QcaIAcDCu78jl1eYW6.jpg\",\"partylist_id\":\"1\",\"remarks\":null,\"status\":\"pending\"},\"attributes\":{\"id\":\"1\",\"students_id\":\"1\",\"position_id\":\"1\",\"school_year_and_semester_id\":\"2\",\"is_regular_student\":\"1\",\"grade_attachment\":\"grade_attachments\\/RCxom65Uytb2w8MK2JZkj1QcaIAcDCu78jl1eYW6.jpg\",\"partylist_id\":\"1\",\"remarks\":\"Your application is approved\",\"status\":\"approved\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"students_id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"position_id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"school_year_and_semester_id\",\"from\":\"2\",\"to\":\"2\"},{\"field\":\"is_regular_student\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"grade_attachment\",\"from\":\"grade_attachments\\/RCxom65Uytb2w8MK2JZkj1QcaIAcDCu78jl1eYW6.jpg\",\"to\":\"grade_attachments\\/RCxom65Uytb2w8MK2JZkj1QcaIAcDCu78jl1eYW6.jpg\"},{\"field\":\"partylist_id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"remarks\",\"from\":null,\"to\":\"Your application is approved\"},{\"field\":\"status\",\"from\":\"pending\",\"to\":\"approved\"}]}', 'App\\Models\\applied_candidacy', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-09-24 17:30:07', '2025-09-24 17:30:07'),
(5, 'App\\Models\\applied_candidacy', 1, 1, 1, 'candidacy_approved', 'Candidacy_approved applied_candidacy', '{\"message\":\"Candidacy application approved by signatory\",\"approved_by\":1,\"notification_id\":8}', 'App\\Models\\applied_candidacy', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-09-24 17:30:07', '2025-09-24 17:30:07'),
(6, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"remember_token\":\"C7OfYKPjuj7gltY8ZejL8VNm3LAptGAHU4neQcgN7XCeAVqe2vgkZAnlQ83A\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"remember_token\":\"vApxaccgSg9TWYUHI7j8Ts933vYj3eAbJMHnAbLwfMvT8ZNpdfMiL9FPgACY\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"remember_token\",\"from\":\"C7OfYKPjuj7gltY8ZejL8VNm3LAptGAHU4neQcgN7XCeAVqe2vgkZAnlQ83A\",\"to\":\"vApxaccgSg9TWYUHI7j8Ts933vYj3eAbJMHnAbLwfMvT8ZNpdfMiL9FPgACY\"},{\"field\":\"role\",\"from\":\"stsg\",\"to\":\"stsg\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-09-24 17:32:58', '2025-09-24 17:32:58'),
(7, 'App\\Models\\students', 2, 2, 2, 'profile_accessed', 'Profile accessed for Student profile', '{\"user_type\":\"student\",\"access_time\":\"2025-09-24T17:36:10.243340Z\",\"profile_management\":true,\"timestamp\":\"2025-09-24T17:36:10.243529Z\"}', 'App\\Models\\students', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'Profile Management', NULL, '2025-09-24 17:36:10', '2025-09-24 17:36:10'),
(8, 'App\\Models\\system_settings', 3, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"3\",\"key\":\"login_center_logo\",\"value\":\"system_settings\\/1757310054_958f3106-933e-45f6-94d4-16494684712d-modified.png\",\"type\":\"image\",\"module_id\":\"3\",\"description\":\"bfgdbfgvbfg\",\"status\":\"active\"},\"attributes\":{\"id\":\"3\",\"key\":\"login_center_logo\",\"value\":\"C:\\\\fakepath\\\\482349334_1157297672764892_1296471932904069408_n-modified.png\",\"type\":\"image\",\"module_id\":\"3\",\"description\":\"bfgdbfgvbfg\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"3\",\"to\":\"3\"},{\"field\":\"key\",\"from\":\"login_center_logo\",\"to\":\"login_center_logo\"},{\"field\":\"value\",\"from\":\"system_settings\\/1757310054_958f3106-933e-45f6-94d4-16494684712d-modified.png\",\"to\":\"C:\\\\fakepath\\\\482349334_1157297672764892_1296471932904069408_n-modified.png\"},{\"field\":\"type\",\"from\":\"image\",\"to\":\"image\"},{\"field\":\"module_id\",\"from\":\"3\",\"to\":\"3\"},{\"field\":\"description\",\"from\":\"bfgdbfgvbfg\",\"to\":\"bfgdbfgvbfg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 3, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:05:18', '2025-10-01 17:05:18'),
(9, 'App\\Models\\system_settings', 5, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"5\",\"key\":\"login_center_text\",\"value\":\"Voting Management System\",\"type\":\"text\",\"module_id\":\"5\",\"description\":\"vdfvfvdf\",\"status\":\"active\"},\"attributes\":{\"id\":\"5\",\"key\":\"login_center_text\",\"value\":\"Bacaca PrintShop & Corp.\",\"type\":\"text\",\"module_id\":\"5\",\"description\":\"vdfvfvdf\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"5\",\"to\":\"5\"},{\"field\":\"key\",\"from\":\"login_center_text\",\"to\":\"login_center_text\"},{\"field\":\"value\",\"from\":\"Voting Management System\",\"to\":\"Bacaca PrintShop & Corp.\"},{\"field\":\"type\",\"from\":\"text\",\"to\":\"text\"},{\"field\":\"module_id\",\"from\":\"5\",\"to\":\"5\"},{\"field\":\"description\",\"from\":\"vdfvfvdf\",\"to\":\"vdfvfvdf\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 5, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:06:27', '2025-10-01 17:06:27'),
(10, 'App\\Models\\system_settings', 6, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"6\",\"key\":\"login_top_logo\",\"value\":\"system_settings\\/1757310198_958f3106-933e-45f6-94d4-16494684712d-modified.png\",\"type\":\"image\",\"module_id\":\"6\",\"description\":\"\",\"status\":\"active\"},\"attributes\":{\"id\":\"6\",\"key\":\"login_top_logo\",\"value\":\"system_settings\\/1759338395_482349334_1157297672764892_1296471932904069408_n-modified.png\",\"type\":\"image\",\"module_id\":\"6\",\"description\":\"\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"6\",\"to\":\"6\"},{\"field\":\"key\",\"from\":\"login_top_logo\",\"to\":\"login_top_logo\"},{\"field\":\"value\",\"from\":\"system_settings\\/1757310198_958f3106-933e-45f6-94d4-16494684712d-modified.png\",\"to\":\"system_settings\\/1759338395_482349334_1157297672764892_1296471932904069408_n-modified.png\"},{\"field\":\"type\",\"from\":\"image\",\"to\":\"image\"},{\"field\":\"module_id\",\"from\":\"6\",\"to\":\"6\"},{\"field\":\"description\",\"from\":\"\",\"to\":\"\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 6, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:06:35', '2025-10-01 17:06:35'),
(11, 'App\\Models\\system_settings', 1, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"1\",\"key\":\"sidebar_logo\",\"value\":\"system_settings\\/1757310064_958f3106-933e-45f6-94d4-16494684712d-modified.png\",\"type\":\"image\",\"module_id\":\"1\",\"description\":\"rtgvvfgvfvd\",\"status\":\"active\"},\"attributes\":{\"id\":\"1\",\"key\":\"sidebar_logo\",\"value\":\"system_settings\\/1759338403_482349334_1157297672764892_1296471932904069408_n-modified.png\",\"type\":\"image\",\"module_id\":\"1\",\"description\":\"rtgvvfgvfvd\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"key\",\"from\":\"sidebar_logo\",\"to\":\"sidebar_logo\"},{\"field\":\"value\",\"from\":\"system_settings\\/1757310064_958f3106-933e-45f6-94d4-16494684712d-modified.png\",\"to\":\"system_settings\\/1759338403_482349334_1157297672764892_1296471932904069408_n-modified.png\"},{\"field\":\"type\",\"from\":\"image\",\"to\":\"image\"},{\"field\":\"module_id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"description\",\"from\":\"rtgvvfgvfvd\",\"to\":\"rtgvvfgvfvd\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:06:43', '2025-10-01 17:06:43'),
(12, 'App\\Models\\system_settings', 2, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"2\",\"key\":\"sidebar_text_logo\",\"value\":\"Voting System\",\"type\":\"text\",\"module_id\":\"2\",\"description\":\"fdcvdf\",\"status\":\"active\"},\"attributes\":{\"id\":\"2\",\"key\":\"sidebar_text_logo\",\"value\":\"Bacaca PrintShop & Corp.\",\"type\":\"text\",\"module_id\":\"2\",\"description\":\"fdcvdf\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"2\",\"to\":\"2\"},{\"field\":\"key\",\"from\":\"sidebar_text_logo\",\"to\":\"sidebar_text_logo\"},{\"field\":\"value\",\"from\":\"Voting System\",\"to\":\"Bacaca PrintShop & Corp.\"},{\"field\":\"type\",\"from\":\"text\",\"to\":\"text\"},{\"field\":\"module_id\",\"from\":\"2\",\"to\":\"2\"},{\"field\":\"description\",\"from\":\"fdcvdf\",\"to\":\"fdcvdf\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 2, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:07:00', '2025-10-01 17:07:00'),
(13, 'App\\Models\\system_settings', 2, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"2\",\"key\":\"sidebar_text_logo\",\"value\":\"Bacaca PrintShop & Corp.\",\"type\":\"text\",\"module_id\":\"2\",\"description\":\"fdcvdf\",\"status\":\"active\"},\"attributes\":{\"id\":\"2\",\"key\":\"sidebar_text_logo\",\"value\":\"Bacaca\",\"type\":\"text\",\"module_id\":\"2\",\"description\":\"fdcvdf\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"2\",\"to\":\"2\"},{\"field\":\"key\",\"from\":\"sidebar_text_logo\",\"to\":\"sidebar_text_logo\"},{\"field\":\"value\",\"from\":\"Bacaca PrintShop & Corp.\",\"to\":\"Bacaca\"},{\"field\":\"type\",\"from\":\"text\",\"to\":\"text\"},{\"field\":\"module_id\",\"from\":\"2\",\"to\":\"2\"},{\"field\":\"description\",\"from\":\"fdcvdf\",\"to\":\"fdcvdf\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 2, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:07:12', '2025-10-01 17:07:12'),
(14, 'App\\Models\\system_settings', 2, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"2\",\"key\":\"sidebar_text_logo\",\"value\":\"Bacaca\",\"type\":\"text\",\"module_id\":\"2\",\"description\":\"fdcvdf\",\"status\":\"active\"},\"attributes\":{\"id\":\"2\",\"key\":\"sidebar_text_logo\",\"value\":\"Bacaca PrintShop\",\"type\":\"text\",\"module_id\":\"2\",\"description\":\"fdcvdf\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"2\",\"to\":\"2\"},{\"field\":\"key\",\"from\":\"sidebar_text_logo\",\"to\":\"sidebar_text_logo\"},{\"field\":\"value\",\"from\":\"Bacaca\",\"to\":\"Bacaca PrintShop\"},{\"field\":\"type\",\"from\":\"text\",\"to\":\"text\"},{\"field\":\"module_id\",\"from\":\"2\",\"to\":\"2\"},{\"field\":\"description\",\"from\":\"fdcvdf\",\"to\":\"fdcvdf\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 2, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:07:23', '2025-10-01 17:07:23'),
(15, 'App\\Models\\User', 1, 1, 1, 'profile_accessed', 'Profile accessed for Admin profile', '{\"user_type\":\"admin\",\"access_time\":\"2025-10-01T17:09:21.137132Z\",\"profile_management\":true,\"timestamp\":\"2025-10-01T17:09:21.137537Z\"}', 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'Profile Management', NULL, '2025-10-01 17:09:21', '2025-10-01 17:09:21'),
(16, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"remember_token\":\"vApxaccgSg9TWYUHI7j8Ts933vYj3eAbJMHnAbLwfMvT8ZNpdfMiL9FPgACY\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"remember_token\":\"Ix5AA3SmxGZGFi76VjgdMZVY2cb6tzDDeULi1JCtrMqgInXE1o5Graydy8EL\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"remember_token\",\"from\":\"vApxaccgSg9TWYUHI7j8Ts933vYj3eAbJMHnAbLwfMvT8ZNpdfMiL9FPgACY\",\"to\":\"Ix5AA3SmxGZGFi76VjgdMZVY2cb6tzDDeULi1JCtrMqgInXE1o5Graydy8EL\"},{\"field\":\"role\",\"from\":\"stsg\",\"to\":\"stsg\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:10:49', '2025-10-01 17:10:49'),
(17, 'App\\Models\\system_settings', 4, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"4\",\"key\":\"login_top_text\",\"value\":\"Voting System\",\"type\":\"text\",\"module_id\":\"4\",\"description\":\"vfgvfdvdf\",\"status\":\"active\"},\"attributes\":{\"id\":\"4\",\"key\":\"login_top_text\",\"value\":\"Bacaca PrintShop & Corp.\",\"type\":\"text\",\"module_id\":\"4\",\"description\":\"vfgvfdvdf\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"4\",\"to\":\"4\"},{\"field\":\"key\",\"from\":\"login_top_text\",\"to\":\"login_top_text\"},{\"field\":\"value\",\"from\":\"Voting System\",\"to\":\"Bacaca PrintShop & Corp.\"},{\"field\":\"type\",\"from\":\"text\",\"to\":\"text\"},{\"field\":\"module_id\",\"from\":\"4\",\"to\":\"4\"},{\"field\":\"description\",\"from\":\"vfgvfdvdf\",\"to\":\"vfgvfdvdf\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 4, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:11:19', '2025-10-01 17:11:19'),
(18, 'App\\Models\\system_settings', 3, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"3\",\"key\":\"login_center_logo\",\"value\":\"C:\\\\fakepath\\\\482349334_1157297672764892_1296471932904069408_n-modified.png\",\"type\":\"image\",\"module_id\":\"3\",\"description\":\"bfgdbfgvbfg\",\"status\":\"active\"},\"attributes\":{\"id\":\"3\",\"key\":\"login_center_logo\",\"value\":\"system_settings\\/1759338694_482349334_1157297672764892_1296471932904069408_n-modified.png\",\"type\":\"image\",\"module_id\":\"3\",\"description\":\"bfgdbfgvbfg\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"3\",\"to\":\"3\"},{\"field\":\"key\",\"from\":\"login_center_logo\",\"to\":\"login_center_logo\"},{\"field\":\"value\",\"from\":\"C:\\\\fakepath\\\\482349334_1157297672764892_1296471932904069408_n-modified.png\",\"to\":\"system_settings\\/1759338694_482349334_1157297672764892_1296471932904069408_n-modified.png\"},{\"field\":\"type\",\"from\":\"image\",\"to\":\"image\"},{\"field\":\"module_id\",\"from\":\"3\",\"to\":\"3\"},{\"field\":\"description\",\"from\":\"bfgdbfgvbfg\",\"to\":\"bfgdbfgvbfg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 3, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:11:34', '2025-10-01 17:11:34'),
(19, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"remember_token\":\"Ix5AA3SmxGZGFi76VjgdMZVY2cb6tzDDeULi1JCtrMqgInXE1o5Graydy8EL\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"remember_token\":\"lQrjYzK77wJvuHf8qRYvVwoe7N3y93oNlUlECiEi87dAZmmDMG4fIIOmRzda\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"remember_token\",\"from\":\"Ix5AA3SmxGZGFi76VjgdMZVY2cb6tzDDeULi1JCtrMqgInXE1o5Graydy8EL\",\"to\":\"lQrjYzK77wJvuHf8qRYvVwoe7N3y93oNlUlECiEi87dAZmmDMG4fIIOmRzda\"},{\"field\":\"role\",\"from\":\"stsg\",\"to\":\"stsg\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-01 17:11:37', '2025-10-01 17:11:37'),
(20, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"lQrjYzK77wJvuHf8qRYvVwoe7N3y93oNlUlECiEi87dAZmmDMG4fIIOmRzda\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"VzaOKTbXxFgoNnp0L4Vty6u0cciWTtABLAQpY01EXYAYXtN9EXSyhjg2ez8e\",\"role\":\"stsg\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"lQrjYzK77wJvuHf8qRYvVwoe7N3y93oNlUlECiEi87dAZmmDMG4fIIOmRzda\",\"to\":\"VzaOKTbXxFgoNnp0L4Vty6u0cciWTtABLAQpY01EXYAYXtN9EXSyhjg2ez8e\"},{\"field\":\"role\",\"from\":\"stsg\",\"to\":\"stsg\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-16 14:49:23', '2025-10-16 14:49:23'),
(21, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"VzaOKTbXxFgoNnp0L4Vty6u0cciWTtABLAQpY01EXYAYXtN9EXSyhjg2ez8e\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"H9k9rMAfqiohO9WW7XdrAuvZwSFfay082jRZHA6lbHWG29yD2aLUF8i8ydtX\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"VzaOKTbXxFgoNnp0L4Vty6u0cciWTtABLAQpY01EXYAYXtN9EXSyhjg2ez8e\",\"to\":\"H9k9rMAfqiohO9WW7XdrAuvZwSFfay082jRZHA6lbHWG29yD2aLUF8i8ydtX\"},{\"field\":\"role\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-16 14:57:16', '2025-10-16 14:57:16'),
(22, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"H9k9rMAfqiohO9WW7XdrAuvZwSFfay082jRZHA6lbHWG29yD2aLUF8i8ydtX\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"lQrGf1z1fszMqGZA4MBWeHMAwMsiJM02wredA76uRPcqRjIn4nzuCUaeJBR3\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"H9k9rMAfqiohO9WW7XdrAuvZwSFfay082jRZHA6lbHWG29yD2aLUF8i8ydtX\",\"to\":\"lQrGf1z1fszMqGZA4MBWeHMAwMsiJM02wredA76uRPcqRjIn4nzuCUaeJBR3\"},{\"field\":\"role\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-16 14:59:23', '2025-10-16 14:59:23'),
(23, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"lQrGf1z1fszMqGZA4MBWeHMAwMsiJM02wredA76uRPcqRjIn4nzuCUaeJBR3\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"JDLKD5uPBEHdcPXZ6YnbmwulkbGytZXuz4wGgCe9pb5OB94PPcpiCeVXal6b\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"lQrGf1z1fszMqGZA4MBWeHMAwMsiJM02wredA76uRPcqRjIn4nzuCUaeJBR3\",\"to\":\"JDLKD5uPBEHdcPXZ6YnbmwulkbGytZXuz4wGgCe9pb5OB94PPcpiCeVXal6b\"},{\"field\":\"role\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-18 08:21:42', '2025-10-18 08:21:42'),
(24, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"JDLKD5uPBEHdcPXZ6YnbmwulkbGytZXuz4wGgCe9pb5OB94PPcpiCeVXal6b\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"KnJsP3lVeGAuLBjxumqPTTIYcmXguMaSCd2OdiOM629oqv4RXhfXBNsqQpO5\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"JDLKD5uPBEHdcPXZ6YnbmwulkbGytZXuz4wGgCe9pb5OB94PPcpiCeVXal6b\",\"to\":\"KnJsP3lVeGAuLBjxumqPTTIYcmXguMaSCd2OdiOM629oqv4RXhfXBNsqQpO5\"},{\"field\":\"role\",\"from\":\"0\",\"to\":\"0\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-18 08:37:07', '2025-10-18 08:37:07'),
(25, 'App\\Models\\User', 3, 3, 3, 'updated', 'Updated user', '{\"old\":{\"id\":\"3\",\"employee_id\":\"4234234\",\"name\":\"csdcscsd\",\"email\":\"csdcscsd@gmail.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"wewqewqeqwe\",\"remember_token\":\"KnJsP3lVeGAuLBjxumqPTTIYcmXguMaSCd2OdiOM629oqv4RXhfXBNsqQpO5\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"3\",\"employee_id\":\"4234234\",\"name\":\"csdcscsd\",\"email\":\"csdcscsd@gmail.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"wewqewqeqwe\",\"remember_token\":\"uMGQeoitUwmTroSPXPdmXI8etMICuSXif9Fgckguqr1FuohmMpsEjFKxk1fX\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"3\",\"to\":\"3\"},{\"field\":\"employee_id\",\"from\":\"4234234\",\"to\":\"4234234\"},{\"field\":\"name\",\"from\":\"csdcscsd\",\"to\":\"csdcscsd\"},{\"field\":\"email\",\"from\":\"csdcscsd@gmail.com\",\"to\":\"csdcscsd@gmail.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"wewqewqeqwe\",\"to\":\"wewqewqeqwe\"},{\"field\":\"remember_token\",\"from\":\"KnJsP3lVeGAuLBjxumqPTTIYcmXguMaSCd2OdiOM629oqv4RXhfXBNsqQpO5\",\"to\":\"uMGQeoitUwmTroSPXPdmXI8etMICuSXif9Fgckguqr1FuohmMpsEjFKxk1fX\"},{\"field\":\"role\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg\",\"to\":\"profile_picture\\/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 3, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-18 09:38:56', '2025-10-18 09:38:56'),
(26, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"KnJsP3lVeGAuLBjxumqPTTIYcmXguMaSCd2OdiOM629oqv4RXhfXBNsqQpO5\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"IH3h3RweEPP7VaNthBneZRVa3ilDGZufyJpFluz9hn1wk6GFb5C1QDWCpUI4\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"KnJsP3lVeGAuLBjxumqPTTIYcmXguMaSCd2OdiOM629oqv4RXhfXBNsqQpO5\",\"to\":\"IH3h3RweEPP7VaNthBneZRVa3ilDGZufyJpFluz9hn1wk6GFb5C1QDWCpUI4\"},{\"field\":\"role\",\"from\":\"0\",\"to\":\"0\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-10-18 09:40:29', '2025-10-18 09:40:29'),
(27, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"employee\",\"login_time\":\"2025-11-17T12:50:14.357211Z\"}', 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-17 12:50:14', '2025-11-17 12:50:14'),
(28, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"employee\",\"login_time\":\"2025-11-17T13:42:19.230950Z\"}', 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-17 13:42:19', '2025-11-17 13:42:19'),
(29, 'App\\Models\\User', 1, 1, 1, 'logout', 'User logged out successfully', '{\"logout_type\":\"web\",\"user_role\":\"admin\",\"logout_time\":\"2025-11-17T13:42:57.477554Z\"}', 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-17 13:42:57', '2025-11-17 13:42:57');
INSERT INTO `action_logs` (`id`, `document_type`, `document_id`, `user_id`, `created_by`, `action`, `details`, `remarks`, `trackable_type`, `trackable_id`, `ip_address`, `user_agent`, `location`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(30, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"IH3h3RweEPP7VaNthBneZRVa3ilDGZufyJpFluz9hn1wk6GFb5C1QDWCpUI4\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"AkLg9cE9bgbFYxmzBjCbZhWONQ0dqxT39u0Wam1JVlegahT5v2FC6t0UQPKZ\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"IH3h3RweEPP7VaNthBneZRVa3ilDGZufyJpFluz9hn1wk6GFb5C1QDWCpUI4\",\"to\":\"AkLg9cE9bgbFYxmzBjCbZhWONQ0dqxT39u0Wam1JVlegahT5v2FC6t0UQPKZ\"},{\"field\":\"role\",\"from\":\"0\",\"to\":\"0\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-11-17 13:42:57', '2025-11-17 13:42:57'),
(31, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-17T13:43:09.995678Z\"}', 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-17 13:43:09', '2025-11-17 13:43:09'),
(32, 'App\\Models\\User', 1, 1, 1, 'logout', 'User logged out successfully', '{\"logout_type\":\"web\",\"user_role\":\"admin\",\"logout_time\":\"2025-11-17T15:36:18.302826Z\"}', 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-17 15:36:18', '2025-11-17 15:36:18'),
(33, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"AkLg9cE9bgbFYxmzBjCbZhWONQ0dqxT39u0Wam1JVlegahT5v2FC6t0UQPKZ\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"4CinnUQNsPdPpUvYMrKevdY7BdQb1Q1QtDgpjaaTNxe4KeaOBA9b90NUFK7T\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"AkLg9cE9bgbFYxmzBjCbZhWONQ0dqxT39u0Wam1JVlegahT5v2FC6t0UQPKZ\",\"to\":\"4CinnUQNsPdPpUvYMrKevdY7BdQb1Q1QtDgpjaaTNxe4KeaOBA9b90NUFK7T\"},{\"field\":\"role\",\"from\":\"0\",\"to\":\"0\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-11-17 15:36:18', '2025-11-17 15:36:18'),
(34, 'App\\Models\\User', 3, 3, 3, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"employee\",\"login_time\":\"2025-11-17T15:36:43.655260Z\"}', 'App\\Models\\User', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-17 15:36:43', '2025-11-17 15:36:43'),
(35, 'App\\Models\\User', 3, 3, 3, 'logout', 'User logged out successfully', '{\"logout_type\":\"web\",\"user_role\":\"employee\",\"logout_time\":\"2025-11-17T15:55:54.685306Z\"}', 'App\\Models\\User', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-17 15:55:54', '2025-11-17 15:55:54'),
(36, 'App\\Models\\User', 3, 3, 3, 'updated', 'Updated user', '{\"old\":{\"id\":\"3\",\"employee_id\":\"4234234\",\"name\":\"csdcscsd\",\"email\":\"csdcscsd@gmail.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"wewqewqeqwe\",\"remember_token\":\"uMGQeoitUwmTroSPXPdmXI8etMICuSXif9Fgckguqr1FuohmMpsEjFKxk1fX\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"3\",\"employee_id\":\"4234234\",\"name\":\"csdcscsd\",\"email\":\"csdcscsd@gmail.com\",\"email_verified_at\":\"2025-09-04 13:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"wewqewqeqwe\",\"remember_token\":\"w0csE5HfWVEYAKmdJYdBTOdQyFX0i3lrnuChNSGd57wYucsRxwXIQjTOl9K7\",\"role\":\"1\",\"profile_image\":\"profile_picture\\/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"3\",\"to\":\"3\"},{\"field\":\"employee_id\",\"from\":\"4234234\",\"to\":\"4234234\"},{\"field\":\"name\",\"from\":\"csdcscsd\",\"to\":\"csdcscsd\"},{\"field\":\"email\",\"from\":\"csdcscsd@gmail.com\",\"to\":\"csdcscsd@gmail.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":13,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756965112,\\\"formatted\\\":\\\"2025-09-04 13:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 13:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"wewqewqeqwe\",\"to\":\"wewqewqeqwe\"},{\"field\":\"remember_token\",\"from\":\"uMGQeoitUwmTroSPXPdmXI8etMICuSXif9Fgckguqr1FuohmMpsEjFKxk1fX\",\"to\":\"w0csE5HfWVEYAKmdJYdBTOdQyFX0i3lrnuChNSGd57wYucsRxwXIQjTOl9K7\"},{\"field\":\"role\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg\",\"to\":\"profile_picture\\/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 3, '127.0.0.1', 'Chrome', 'Unknown Location', NULL, '2025-11-17 15:55:54', '2025-11-17 15:55:54'),
(37, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-19T14:18:51.250845Z\"}', 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-19 14:18:51', '2025-11-19 14:18:51'),
(38, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-22T01:28:56.477804Z\"}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-22 09:28:56', '2025-11-22 09:28:56'),
(39, 'App\\Models\\User', 1, 1, 1, 'logout', 'User logged out successfully', '{\"logout_type\":\"web\",\"user_role\":\"admin\",\"logout_time\":\"2025-11-22T01:46:29.621673Z\"}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-22 09:46:29', '2025-11-22 09:46:29'),
(40, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":5,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756936312,\\\"formatted\\\":\\\"2025-09-04 05:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"4CinnUQNsPdPpUvYMrKevdY7BdQb1Q1QtDgpjaaTNxe4KeaOBA9b90NUFK7T\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 05:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"tRMEREhrxKnuAFAvrWi4a69x5ahj5RtyPp7SoYcODTvtRWQeDAgqDLD8KUtC\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":5,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756936312,\\\"formatted\\\":\\\"2025-09-04 05:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 05:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"4CinnUQNsPdPpUvYMrKevdY7BdQb1Q1QtDgpjaaTNxe4KeaOBA9b90NUFK7T\",\"to\":\"tRMEREhrxKnuAFAvrWi4a69x5ahj5RtyPp7SoYcODTvtRWQeDAgqDLD8KUtC\"},{\"field\":\"role\",\"from\":\"0\",\"to\":\"0\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Chrome', 'Unknown Location', NULL, '2025-11-22 09:46:29', '2025-11-22 09:46:29'),
(41, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-22T01:47:19.284388Z\"}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-22 09:47:19', '2025-11-22 09:47:19'),
(42, 'App\\Models\\system_settings', 1, 1, 1, 'updated', 'Updated system_settings', '{\"old\":{\"id\":\"1\",\"key\":\"sidebar_logo\",\"value\":\"system_settings\\/1759338403_482349334_1157297672764892_1296471932904069408_n-modified.png\",\"type\":\"image\",\"module_id\":\"1\",\"description\":\"rtgvvfgvfvd\",\"status\":\"active\"},\"attributes\":{\"id\":\"1\",\"key\":\"sidebar_logo\",\"value\":\"C:\\\\fakepath\\\\482349334_1157297672764892_1296471932904069408_n-modified.png\",\"type\":\"image\",\"module_id\":\"1\",\"description\":\"rtgvvfgvfvd\",\"status\":\"active\"},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"key\",\"from\":\"sidebar_logo\",\"to\":\"sidebar_logo\"},{\"field\":\"value\",\"from\":\"system_settings\\/1759338403_482349334_1157297672764892_1296471932904069408_n-modified.png\",\"to\":\"C:\\\\fakepath\\\\482349334_1157297672764892_1296471932904069408_n-modified.png\"},{\"field\":\"type\",\"from\":\"image\",\"to\":\"image\"},{\"field\":\"module_id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"description\",\"from\":\"rtgvvfgvfvd\",\"to\":\"rtgvvfgvfvd\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"}]}', 'App\\Models\\system_settings', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Chrome', 'Unknown Location', NULL, '2025-11-22 09:47:51', '2025-11-22 09:47:51'),
(43, 'App\\Models\\User', 1, 1, 1, 'logout', 'User logged out successfully', '{\"logout_type\":\"web\",\"user_role\":\"admin\",\"logout_time\":\"2025-11-22T01:51:55.608178Z\"}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-22 09:51:55', '2025-11-22 09:51:55'),
(44, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":5,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756936312,\\\"formatted\\\":\\\"2025-09-04 05:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"tRMEREhrxKnuAFAvrWi4a69x5ahj5RtyPp7SoYcODTvtRWQeDAgqDLD8KUtC\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 05:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"i47CO96o1evtfY7amWVqoUWLw2fpFwjfm6JZ5D0PsRzlupD83EcAWnKOeXQ8\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":5,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756936312,\\\"formatted\\\":\\\"2025-09-04 05:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 05:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"tRMEREhrxKnuAFAvrWi4a69x5ahj5RtyPp7SoYcODTvtRWQeDAgqDLD8KUtC\",\"to\":\"i47CO96o1evtfY7amWVqoUWLw2fpFwjfm6JZ5D0PsRzlupD83EcAWnKOeXQ8\"},{\"field\":\"role\",\"from\":\"0\",\"to\":\"0\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Chrome', 'Unknown Location', NULL, '2025-11-22 09:51:55', '2025-11-22 09:51:55'),
(45, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-22T01:53:42.824907Z\"}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-22 09:53:42', '2025-11-22 09:53:42'),
(46, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-22T02:44:07.962603Z\"}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-22 10:44:07', '2025-11-22 10:44:07'),
(47, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-22T02:47:54.002891Z\"}', 'App\\Models\\User', 1, '2001:4456:10d:3e00:d67:a00d:d991:5569', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-22 10:47:54', '2025-11-22 10:47:54'),
(48, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-25T08:27:16.662345Z\"}', 'App\\Models\\User', 1, '222.127.192.34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Avast/142.0.0.0', 'Login System', NULL, '2025-11-25 16:27:16', '2025-11-25 16:27:16'),
(49, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-11-27T06:29:57.849510Z\"}', 'App\\Models\\User', 1, '202.137.126.201', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-27 14:29:57', '2025-11-27 14:29:57'),
(50, 'App\\Models\\User', 1, 1, 1, 'profile_accessed', 'Profile accessed for Admin profile', '{\"user_type\":\"admin\",\"access_time\":\"2025-11-27T06:58:15.801634Z\",\"profile_management\":true,\"timestamp\":\"2025-11-27T06:58:15.802110Z\"}', 'App\\Models\\User', 1, '202.137.126.201', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Profile Management', NULL, '2025-11-27 14:58:15', '2025-11-27 14:58:15'),
(51, 'App\\Models\\User', 1, 1, 1, 'logout', 'User logged out successfully', '{\"logout_type\":\"web\",\"user_role\":\"admin\",\"logout_time\":\"2025-11-27T06:58:21.184235Z\"}', 'App\\Models\\User', 1, '202.137.126.201', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-11-27 14:58:21', '2025-11-27 14:58:21'),
(52, 'App\\Models\\User', 1, 1, 1, 'updated', 'Updated user', '{\"old\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":5,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756936312,\\\"formatted\\\":\\\"2025-09-04 05:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"i47CO96o1evtfY7amWVqoUWLw2fpFwjfm6JZ5D0PsRzlupD83EcAWnKOeXQ8\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"attributes\":{\"id\":\"1\",\"employee_id\":\"5445545\",\"name\":\"Test User\",\"email\":\"test@example.com\",\"email_verified_at\":\"2025-09-04 05:51:52\",\"password\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"designation_id\":\"csdcdsdcscds\",\"remember_token\":\"auz6gpeqXvpkwD3eSGyPdOYqOVfk0iwozpw80RWwRHmzCdtxMWgk26idJczM\",\"role\":\"0\",\"profile_image\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"status\":\"active\",\"employment_type_id\":\"Regular\",\"is_online\":null},\"changes_summary\":[{\"field\":\"id\",\"from\":\"1\",\"to\":\"1\"},{\"field\":\"employee_id\",\"from\":\"5445545\",\"to\":\"5445545\"},{\"field\":\"name\",\"from\":\"Test User\",\"to\":\"Test User\"},{\"field\":\"email\",\"from\":\"test@example.com\",\"to\":\"test@example.com\"},{\"field\":\"email_verified_at\",\"from\":\"{\\\"year\\\":2025,\\\"month\\\":9,\\\"day\\\":4,\\\"dayOfWeek\\\":4,\\\"dayOfYear\\\":247,\\\"hour\\\":5,\\\"minute\\\":51,\\\"second\\\":52,\\\"micro\\\":0,\\\"timestamp\\\":1756936312,\\\"formatted\\\":\\\"2025-09-04 05:51:52\\\",\\\"timezone\\\":{\\\"timezone_type\\\":3,\\\"timezone\\\":\\\"Asia\\\\\\/Manila\\\"}}\",\"to\":\"2025-09-04 05:51:52\"},{\"field\":\"password\",\"from\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\",\"to\":\"$2y$12$UAhgKL8L2kWfcFmHpIi\\/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq\"},{\"field\":\"designation_id\",\"from\":\"csdcdsdcscds\",\"to\":\"csdcdsdcscds\"},{\"field\":\"remember_token\",\"from\":\"i47CO96o1evtfY7amWVqoUWLw2fpFwjfm6JZ5D0PsRzlupD83EcAWnKOeXQ8\",\"to\":\"auz6gpeqXvpkwD3eSGyPdOYqOVfk0iwozpw80RWwRHmzCdtxMWgk26idJczM\"},{\"field\":\"role\",\"from\":\"0\",\"to\":\"0\"},{\"field\":\"profile_image\",\"from\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\",\"to\":\"profile_picture\\/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg\"},{\"field\":\"status\",\"from\":\"active\",\"to\":\"active\"},{\"field\":\"employment_type_id\",\"from\":\"Regular\",\"to\":\"Regular\"},{\"field\":\"is_online\",\"from\":null,\"to\":null}]}', 'App\\Models\\User', 1, '202.137.126.201', 'Chrome', 'Unknown Location', NULL, '2025-11-27 14:58:21', '2025-11-27 14:58:21'),
(53, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-12-03T12:07:45.820784Z\"}', 'App\\Models\\User', 1, '120.72.25.228', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'Login System', NULL, '2025-12-03 20:07:45', '2025-12-03 20:07:45'),
(54, 'App\\Models\\User', 1, 1, 1, 'login', 'User logged in successfully', '{\"login_type\":\"web\",\"user_role\":\"admin\",\"login_time\":\"2025-12-04T06:02:35.768920Z\"}', 'App\\Models\\User', 1, '158.62.81.120', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Avast/142.0.0.0', 'Login System', NULL, '2025-12-04 14:02:35', '2025-12-04 14:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL,
  `time` time DEFAULT NULL,
  `is_late` tinyint(1) DEFAULT 0,
  `late_minutes` int(11) DEFAULT 0,
  `overtime_minutes` int(11) DEFAULT 0,
  `is_undertime` varchar(45) DEFAULT NULL,
  `undertime_minutes` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `users_id`, `action`, `timestamp`, `time`, `is_late`, `late_minutes`, `overtime_minutes`, `is_undertime`, `undertime_minutes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'time_in', '2025-10-31 08:39:25', '08:39:25', 1, 39, 0, '1', '11', '2025-10-02 17:07:54', '2025-12-03 20:12:50', NULL),
(2, 3, 'time_in', '2025-11-01 07:53:56', '07:53:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(3, 3, 'time_out', '2025-10-31 12:10:44', '12:10:44', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(4, 3, 'time_in', '2025-10-31 12:15:25', '12:15:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(5, 3, 'time_out', '2025-11-01 12:11:25', '12:11:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(6, 3, 'time_out', '2025-10-31 17:15:25', '17:15:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(7, 3, 'time_in', '2025-11-01 12:15:25', '12:15:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(8, 3, 'time_out', '2025-11-01 17:15:25', '17:15:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(9, 3, 'time_in', '2025-11-03 08:03:25', '08:03:25', 1, 3, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(10, 3, 'time_out', '2025-11-03 12:03:25', '12:03:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(11, 3, 'time_in', '2025-11-03 12:10:25', '12:10:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(12, 3, 'time_out', '2025-11-03 21:08:25', '17:08:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(13, 3, 'time_in', '2025-11-04 07:50:25', '07:50:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(14, 3, 'time_out', '2025-11-04 12:12:25', '12:12:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(15, 3, 'time_in', '2025-11-04 12:14:25', '12:14:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(16, 3, 'time_out', '2025-11-04 17:14:25', '17:14:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(17, 3, 'time_in', '2025-11-05 07:38:25', '07:38:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(18, 3, 'time_out', '2025-11-05 12:10:25', '12:10:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(19, 3, 'time_in', '2025-11-05 12:12:25', '12:12:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(20, 3, 'time_out', '2025-11-05 17:12:25', '17:12:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(21, 3, 'time_in', '2025-11-07 08:01:37', '08:01:37', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(22, 3, 'time_out', '2025-11-07 12:05:37', '12:05:37', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(23, 3, 'time_in', '2025-11-07 12:08:37', '12:08:37', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(24, 3, 'time_out', '2025-11-07 17:08:37', '17:08:37', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(25, 1, 'time_in', '2025-05-26 10:20:24', '10:20:24', 1, 140, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(26, 1, 'time_in', '2025-05-26 10:20:41', '10:20:41', 1, 141, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(27, 1, 'time_in', '2025-05-26 10:24:05', '10:24:05', 1, 144, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(28, 1, 'time_in', '2025-05-26 10:27:32', '10:27:32', 1, 148, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(29, 1, 'time_in', '2025-05-26 12:04:04', '12:04:04', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(30, 1, 'time_in', '2025-05-26 12:05:38', '12:05:38', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(31, 1, 'time_out', '2025-05-26 12:05:52', '12:05:52', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(32, 1, 'time_out', '2025-05-26 12:06:00', '12:06:00', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(33, 1, 'time_out', '2025-05-26 12:06:07', '12:06:07', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(34, 1, 'time_out', '2025-05-26 12:06:22', '12:06:22', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(35, 1, 'time_in', '2025-05-26 12:06:55', '12:06:55', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(36, 1, 'time_out', '2025-05-26 12:07:11', '12:07:11', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(37, 1, 'time_in', '2025-05-26 12:07:22', '12:07:22', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(38, 1, 'time_in', '2025-05-26 12:07:29', '12:07:29', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(39, 1, 'time_out', '2025-05-26 12:07:39', '12:07:39', 1, 292, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(40, 1, 'time_in', '2025-05-26 12:52:14', '12:52:14', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(41, 1, 'time_in', '2025-05-26 12:56:46', '12:56:46', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(42, 1, 'time_in', '2025-05-26 12:59:35', '12:59:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(43, 1, 'time_in', '2025-05-26 12:59:41', '12:59:41', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(44, 1, 'time_in', '2025-05-26 13:07:47', '13:07:47', 1, 248, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(45, 1, 'time_in', '2025-05-26 13:34:17', '13:34:17', 1, 274, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(46, 1, 'time_in', '2025-05-26 16:14:04', '16:14:04', 1, 434, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(47, 1, 'time_in', '2025-05-26 16:17:40', '16:17:40', 1, 438, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(48, 1, 'time_out', '2025-05-26 17:04:59', '17:04:59', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(49, 1, 'time_out', '2025-05-26 17:05:06', '17:05:06', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(50, 1, 'time_out', '2025-05-26 17:05:20', '17:05:20', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(51, 1, 'time_out', '2025-05-26 17:09:28', '17:09:28', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(52, 1, 'time_out', '2025-05-26 17:09:36', '17:09:36', 0, 0, 10, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(53, 1, 'time_out', '2025-05-26 17:10:55', '17:10:55', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(54, 1, 'time_out', '2025-05-26 17:11:00', '17:11:00', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(55, 1, 'time_out', '2025-05-26 17:11:10', '17:11:10', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(56, 1, 'time_out', '2025-05-26 17:11:52', '17:11:52', 0, 0, 12, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(57, 1, 'time_out', '2025-05-26 17:16:56', '17:16:56', 0, 0, 17, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(58, 1, 'time_in', '2025-05-26 17:17:24', '17:17:24', 1, 497, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(59, 1, 'time_out', '2025-05-26 17:18:10', '17:18:10', 0, 0, 18, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(60, 1, 'time_out', '2025-05-26 17:25:39', '17:25:39', 0, 0, 26, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(61, 1, 'time_out', '2025-05-26 17:28:42', '17:28:42', 0, 0, 29, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(62, 1, 'time_out', '2025-05-26 17:49:53', '17:49:53', 0, 0, 50, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(63, 1, 'time_out', '2025-05-26 19:09:42', '19:09:42', 0, 0, 130, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(64, 1, 'time_out', '2025-05-26 19:25:08', '19:25:08', 0, 0, 145, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(65, 1, 'time_out', '2025-05-26 19:56:23', '19:56:23', 0, 0, 176, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(66, 1, 'time_out', '2025-05-26 19:56:43', '19:56:43', 0, 0, 177, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(67, 1, 'time_out', '2025-05-26 21:01:02', '21:01:02', 0, 0, 241, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(68, 1, 'time_in', '2025-05-27 07:34:03', '07:34:03', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(69, 1, 'time_in', '2025-05-27 07:34:10', '07:34:10', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(70, 1, 'time_in', '2025-05-27 07:35:10', '07:35:10', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(71, 1, 'time_in', '2025-05-27 07:35:31', '07:35:31', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(72, 1, 'time_in', '2025-05-27 07:38:56', '07:38:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(73, 1, 'time_in', '2025-05-27 07:42:24', '07:42:24', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(74, 1, 'time_in', '2025-05-27 07:45:35', '07:45:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(75, 1, 'time_in', '2025-05-27 07:45:48', '07:45:48', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(76, 1, 'time_in', '2025-05-27 07:45:56', '07:45:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(77, 1, 'time_in', '2025-05-27 07:46:11', '07:46:11', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(78, 1, 'time_in', '2025-05-27 07:48:17', '07:48:17', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(79, 1, 'time_in', '2025-05-27 07:51:08', '07:51:08', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(80, 1, 'time_in', '2025-05-27 07:51:48', '07:51:48', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(81, 1, 'time_in', '2025-05-27 07:52:58', '07:52:58', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(82, 1, 'time_in', '2025-05-27 07:53:06', '07:53:06', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(83, 1, 'time_in', '2025-05-27 07:57:36', '07:57:36', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(84, 1, 'time_in', '2025-05-27 07:58:21', '07:58:21', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(85, 1, 'time_out', '2025-05-27 12:04:52', '12:04:52', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(86, 1, 'time_out', '2025-05-27 12:05:03', '12:05:03', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(87, 1, 'time_out', '2025-05-27 12:05:10', '12:05:10', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(88, 1, 'time_out', '2025-05-27 12:05:23', '12:05:23', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(89, 1, 'time_out', '2025-05-27 12:07:09', '12:07:09', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(90, 1, 'time_out', '2025-05-27 12:07:16', '12:07:16', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(91, 1, 'time_out', '2025-05-27 12:07:36', '12:07:36', 1, 292, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(92, 1, 'time_out', '2025-05-27 12:08:16', '12:08:16', 1, 292, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(93, 1, 'time_in', '2025-05-27 12:08:23', '12:08:23', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(94, 1, 'time_in', '2025-05-27 12:08:29', '12:08:29', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(95, 1, 'time_in', '2025-05-27 12:08:42', '12:08:42', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(96, 1, 'time_in', '2025-05-27 12:08:49', '12:08:49', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(97, 1, 'time_out', '2025-05-27 12:09:01', '12:09:01', 1, 291, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(98, 1, 'time_out', '2025-05-27 12:11:08', '12:11:08', 1, 289, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(99, 1, 'time_in', '2025-05-27 12:48:05', '12:48:05', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(100, 1, 'time_in', '2025-05-27 12:49:41', '12:49:41', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(101, 1, 'time_in', '2025-05-27 12:57:25', '12:57:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(102, 1, 'time_in', '2025-05-27 12:57:36', '12:57:36', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(103, 1, 'time_in', '2025-05-27 12:57:51', '12:57:51', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(104, 1, 'time_in', '2025-05-27 12:57:59', '12:57:59', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(105, 1, 'time_out', '2025-05-27 17:07:34', '17:07:34', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(106, 1, 'time_out', '2025-05-27 17:07:40', '17:07:40', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(107, 1, 'time_out', '2025-05-27 17:08:09', '17:08:09', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(108, 1, 'time_out', '2025-05-27 17:08:17', '17:08:17', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(109, 1, 'time_out', '2025-05-27 17:08:42', '17:08:42', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(110, 1, 'time_out', '2025-05-27 17:14:05', '17:14:05', 0, 0, 14, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(111, 1, 'time_out', '2025-05-27 17:15:18', '17:15:18', 0, 0, 15, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(112, 1, 'time_out', '2025-05-27 17:16:41', '17:16:41', 0, 0, 17, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(113, 1, 'time_out', '2025-05-27 17:23:46', '17:23:46', 0, 0, 24, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(114, 1, 'time_out', '2025-05-27 17:26:48', '17:26:48', 0, 0, 27, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(115, 1, 'time_out', '2025-05-27 17:30:57', '17:30:57', 0, 0, 31, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(116, 1, 'time_out', '2025-05-27 19:04:03', '19:04:03', 0, 0, 124, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(117, 1, 'time_out', '2025-05-27 19:11:28', '19:11:28', 0, 0, 131, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(118, 1, 'time_out', '2025-05-27 21:06:34', '21:06:34', 0, 0, 247, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(119, 1, 'time_out', '2025-05-27 21:06:40', '21:06:40', 0, 0, 247, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(120, 1, 'time_out', '2025-05-27 21:06:48', '21:06:48', 0, 0, 247, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(121, 1, 'time_out', '2025-05-27 21:06:59', '21:06:59', 0, 0, 247, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(122, 1, 'time_out', '2025-05-27 21:07:08', '21:07:08', 0, 0, 247, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(123, 1, 'time_in', '2025-05-28 07:23:19', '07:23:19', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(124, 1, 'time_in', '2025-05-28 07:24:23', '07:24:23', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(125, 1, 'time_in', '2025-05-28 07:24:40', '07:24:40', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(126, 1, 'time_in', '2025-05-28 07:26:44', '07:26:44', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(127, 1, 'time_in', '2025-05-28 07:35:26', '07:35:26', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(128, 1, 'time_in', '2025-05-28 07:37:46', '07:37:46', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(129, 1, 'time_in', '2025-05-28 07:38:00', '07:38:00', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(130, 1, 'time_in', '2025-05-28 07:38:28', '07:38:28', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(131, 1, 'time_in', '2025-05-28 07:45:20', '07:45:20', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(132, 1, 'time_in', '2025-05-28 07:49:21', '07:49:21', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(133, 1, 'time_in', '2025-05-28 07:53:52', '07:53:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(134, 1, 'time_in', '2025-05-28 07:54:03', '07:54:03', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(135, 1, 'time_in', '2025-05-28 07:54:09', '07:54:09', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(136, 1, 'time_in', '2025-05-28 07:54:43', '07:54:43', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(137, 1, 'time_in', '2025-05-28 07:55:49', '07:55:49', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(138, 1, 'time_in', '2025-05-28 07:55:56', '07:55:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(139, 1, 'time_in', '2025-05-28 07:56:11', '07:56:11', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(140, 1, 'time_in', '2025-05-28 07:57:37', '07:57:37', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(141, 1, 'time_in', '2025-05-28 07:57:45', '07:57:45', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(142, 1, 'time_in', '2025-05-28 07:58:00', '07:58:00', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(143, 1, 'time_in', '2025-05-28 08:00:49', '08:00:49', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(144, 1, 'time_out', '2025-05-28 12:03:46', '12:03:46', 1, 296, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(145, 1, 'time_in', '2025-05-28 12:03:46', '12:03:46', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(146, 1, 'time_out', '2025-05-28 12:03:59', '12:03:59', 1, 296, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(147, 1, 'time_in', '2025-05-28 12:03:59', '12:03:59', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(148, 1, 'time_out', '2025-05-28 12:04:35', '12:04:35', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(149, 1, 'time_in', '2025-05-28 12:04:35', '12:04:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(150, 1, 'time_out', '2025-05-28 12:04:40', '12:04:40', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(151, 1, 'time_in', '2025-05-28 12:04:40', '12:04:40', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(152, 1, 'time_out', '2025-05-28 12:04:55', '12:04:55', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(153, 1, 'time_in', '2025-05-28 12:04:55', '12:04:55', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(154, 1, 'time_out', '2025-05-28 12:05:03', '12:05:03', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(155, 1, 'time_in', '2025-05-28 12:05:03', '12:05:03', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(156, 1, 'time_out', '2025-05-28 12:05:37', '12:05:37', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(157, 1, 'time_in', '2025-05-28 12:05:37', '12:05:37', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(158, 1, 'time_out', '2025-05-28 12:05:43', '12:05:43', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(159, 1, 'time_in', '2025-05-28 12:05:43', '12:05:43', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(160, 1, 'time_out', '2025-05-28 12:05:52', '12:05:52', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(161, 1, 'time_in', '2025-05-28 12:05:52', '12:05:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(162, 1, 'time_out', '2025-05-28 12:07:16', '12:07:16', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(163, 1, 'time_in', '2025-05-28 12:07:16', '12:07:16', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(164, 1, 'time_out', '2025-05-28 12:07:24', '12:07:24', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(165, 1, 'time_in', '2025-05-28 12:07:24', '12:07:24', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(166, 1, 'time_in', '2025-05-28 12:49:55', '12:49:55', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(167, 1, 'time_in', '2025-05-28 12:56:28', '12:56:28', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(168, 1, 'time_in', '2025-05-28 12:56:59', '12:56:59', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(169, 1, 'time_in', '2025-05-28 12:57:06', '12:57:06', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(170, 1, 'time_in', '2025-05-28 12:58:00', '12:58:00', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(171, 1, 'time_in', '2025-05-28 17:10:41', '17:10:41', 1, 491, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(172, 1, 'time_out', '2025-05-28 17:10:41', '17:10:41', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(173, 1, 'time_out', '2025-05-28 17:10:47', '17:10:47', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(174, 1, 'time_in', '2025-05-28 17:10:47', '17:10:47', 1, 491, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(175, 1, 'time_out', '2025-05-28 17:11:03', '17:11:03', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(176, 1, 'time_in', '2025-05-28 17:11:03', '17:11:03', 1, 491, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(177, 1, 'time_out', '2025-05-28 17:11:15', '17:11:15', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(178, 1, 'time_in', '2025-05-28 17:11:15', '17:11:15', 1, 491, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(179, 1, 'time_out', '2025-05-28 17:11:24', '17:11:24', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(180, 1, 'time_in', '2025-05-28 17:11:24', '17:11:24', 1, 491, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(181, 1, 'time_out', '2025-05-28 17:11:55', '17:11:55', 0, 0, 12, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(182, 1, 'time_in', '2025-05-28 17:11:55', '17:11:55', 1, 492, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(183, 1, 'time_out', '2025-05-28 17:12:01', '17:12:01', 0, 0, 12, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(184, 1, 'time_in', '2025-05-28 17:12:01', '17:12:01', 1, 492, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(185, 1, 'time_out', '2025-05-28 17:12:50', '17:12:50', 0, 0, 13, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(186, 1, 'time_in', '2025-05-28 17:12:50', '17:12:50', 1, 493, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(187, 1, 'time_out', '2025-05-28 17:23:03', '17:23:03', 0, 0, 23, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(188, 1, 'time_in', '2025-05-28 17:23:04', '17:23:04', 1, 503, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(189, 1, 'time_out', '2025-05-28 17:24:53', '17:24:53', 0, 0, 25, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(190, 1, 'time_in', '2025-05-28 17:24:53', '17:24:53', 1, 505, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(191, 1, 'time_out', '2025-05-28 17:27:51', '17:27:51', 0, 0, 28, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(192, 1, 'time_in', '2025-05-28 17:27:51', '17:27:51', 1, 508, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(193, 1, 'time_out', '2025-05-28 17:29:20', '17:29:20', 0, 0, 29, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(194, 1, 'time_in', '2025-05-28 17:29:20', '17:29:20', 1, 509, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(195, 1, 'time_out', '2025-05-28 17:59:00', '17:59:00', 0, 0, 59, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(196, 1, 'time_in', '2025-05-28 17:59:00', '17:59:00', 1, 539, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(197, 1, 'time_out', '2025-05-28 19:10:06', '19:10:06', 0, 0, 130, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(198, 1, 'time_in', '2025-05-28 19:10:06', '19:10:06', 1, 610, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(199, 1, 'time_out', '2025-05-28 19:38:42', '19:38:42', 0, 0, 159, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(200, 1, 'time_in', '2025-05-28 19:38:42', '19:38:42', 1, 639, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(201, 1, 'time_out', '2025-05-28 21:04:37', '21:04:37', 0, 0, 245, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(202, 1, 'time_in', '2025-05-28 21:04:37', '21:04:37', 1, 725, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(203, 1, 'time_out', '2025-05-28 21:04:43', '21:04:43', 0, 0, 245, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(204, 1, 'time_in', '2025-05-28 21:04:44', '21:04:44', 1, 725, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(205, 1, 'time_out', '2025-05-28 21:04:50', '21:04:50', 0, 0, 245, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(206, 1, 'time_in', '2025-05-28 21:04:50', '21:04:50', 1, 725, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(207, 1, 'time_out', '2025-05-28 21:06:21', '21:06:21', 0, 0, 246, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(208, 1, 'time_in', '2025-05-28 21:06:21', '21:06:21', 1, 726, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(209, 1, 'time_out', '2025-05-28 21:06:47', '21:06:47', 0, 0, 247, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(210, 1, 'time_in', '2025-05-28 21:06:47', '21:06:47', 1, 727, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(211, 1, 'time_out', '2025-05-28 21:08:50', '21:08:50', 0, 0, 249, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(212, 1, 'time_in', '2025-05-28 21:08:50', '21:08:50', 1, 729, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(213, 1, 'time_in', '2025-05-29 07:28:43', '07:28:43', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(214, 1, 'time_in', '2025-05-29 07:28:50', '07:28:50', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(215, 1, 'time_in', '2025-05-29 07:28:58', '07:28:58', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(216, 1, 'time_in', '2025-05-29 07:41:45', '07:41:45', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(217, 1, 'time_in', '2025-05-29 07:42:16', '07:42:16', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(218, 1, 'time_in', '2025-05-29 07:43:26', '07:43:26', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(219, 1, 'time_in', '2025-05-29 07:43:44', '07:43:44', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(220, 1, 'time_in', '2025-05-29 07:44:47', '07:44:47', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(221, 1, 'time_in', '2025-05-29 07:45:52', '07:45:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(222, 1, 'time_in', '2025-05-29 07:46:09', '07:46:09', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(223, 1, 'time_in', '2025-05-29 07:46:18', '07:46:18', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(224, 1, 'time_in', '2025-05-29 07:49:47', '07:49:47', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(225, 1, 'time_in', '2025-05-29 07:50:03', '07:50:03', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(226, 1, 'time_in', '2025-05-29 07:52:01', '07:52:01', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(227, 1, 'time_in', '2025-05-29 07:52:56', '07:52:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(228, 1, 'time_in', '2025-05-29 07:54:35', '07:54:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(229, 1, 'time_in', '2025-05-29 07:57:02', '07:57:02', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(230, 1, 'time_in', '2025-05-29 07:58:02', '07:58:02', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(231, 1, 'time_in', '2025-05-29 08:12:26', '08:12:26', 1, 12, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(232, 1, 'time_out', '2025-05-29 12:03:26', '12:03:26', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(233, 1, 'time_in', '2025-05-29 12:03:26', '12:03:26', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(234, 1, 'time_out', '2025-05-29 12:05:35', '12:05:35', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(235, 1, 'time_in', '2025-05-29 12:05:35', '12:05:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(236, 1, 'time_out', '2025-05-29 12:05:42', '12:05:42', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(237, 1, 'time_in', '2025-05-29 12:05:42', '12:05:42', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(238, 1, 'time_out', '2025-05-29 12:05:48', '12:05:48', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(239, 1, 'time_in', '2025-05-29 12:05:48', '12:05:48', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(240, 1, 'time_out', '2025-05-29 12:05:55', '12:05:55', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(241, 1, 'time_in', '2025-05-29 12:05:55', '12:05:55', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(242, 1, 'time_out', '2025-05-29 12:06:01', '12:06:01', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(243, 1, 'time_in', '2025-05-29 12:06:01', '12:06:01', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(244, 1, 'time_out', '2025-05-29 12:06:07', '12:06:07', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(245, 1, 'time_in', '2025-05-29 12:06:07', '12:06:07', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(246, 1, 'time_out', '2025-05-29 12:07:09', '12:07:09', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(247, 1, 'time_in', '2025-05-29 12:07:09', '12:07:09', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(248, 1, 'time_in', '2025-05-29 12:07:31', '12:07:31', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(249, 1, 'time_out', '2025-05-29 12:07:31', '12:07:31', 1, 292, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(250, 1, 'time_in', '2025-05-29 12:55:49', '12:55:49', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(251, 1, 'time_in', '2025-05-29 12:55:59', '12:55:59', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(252, 1, 'time_in', '2025-05-29 12:57:28', '12:57:28', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(253, 1, 'time_in', '2025-05-29 13:02:44', '13:02:44', 1, 243, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(254, 1, 'time_in', '2025-05-29 17:03:09', '17:03:09', 1, 483, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(255, 1, 'time_out', '2025-05-29 17:03:58', '17:03:58', 0, 0, 4, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(256, 1, 'time_in', '2025-05-29 17:03:58', '17:03:58', 1, 484, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(257, 1, 'time_out', '2025-05-29 17:05:06', '17:05:06', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(258, 1, 'time_in', '2025-05-29 17:05:06', '17:05:06', 1, 485, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(259, 1, 'time_out', '2025-05-29 17:06:07', '17:06:07', 0, 0, 6, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(260, 1, 'time_in', '2025-05-29 17:06:07', '17:06:07', 1, 486, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(261, 1, 'time_out', '2025-05-29 17:06:37', '17:06:37', 0, 0, 7, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(262, 1, 'time_in', '2025-05-29 17:06:37', '17:06:37', 1, 487, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(263, 1, 'time_out', '2025-05-29 17:08:43', '17:08:43', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(264, 1, 'time_in', '2025-05-29 17:08:43', '17:08:43', 1, 489, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(265, 1, 'time_in', '2025-05-29 17:10:37', '17:10:37', 1, 491, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(266, 1, 'time_out', '2025-05-29 17:10:37', '17:10:37', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(267, 1, 'time_out', '2025-05-29 17:11:19', '17:11:19', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(268, 1, 'time_in', '2025-05-29 17:11:19', '17:11:19', 1, 491, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(269, 1, 'time_out', '2025-05-29 17:12:29', '17:12:29', 0, 0, 12, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(270, 1, 'time_in', '2025-05-29 17:12:29', '17:12:29', 1, 492, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(271, 1, 'time_out', '2025-05-29 17:12:42', '17:12:42', 0, 0, 13, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(272, 1, 'time_in', '2025-05-29 17:12:42', '17:12:42', 1, 493, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(273, 1, 'time_out', '2025-05-29 17:15:07', '17:15:07', 0, 0, 15, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(274, 1, 'time_in', '2025-05-29 17:15:07', '17:15:07', 1, 495, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(275, 1, 'time_out', '2025-05-29 17:24:27', '17:24:27', 0, 0, 24, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(276, 1, 'time_in', '2025-05-29 17:24:27', '17:24:27', 1, 504, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(277, 1, 'time_in', '2025-05-29 17:34:10', '17:34:10', 1, 514, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(278, 1, 'time_in', '2025-05-29 17:42:52', '17:42:52', 1, 523, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(279, 1, 'time_out', '2025-05-29 21:02:29', '21:02:29', 0, 0, 242, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(280, 1, 'time_in', '2025-05-29 21:02:29', '21:02:29', 1, 722, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(281, 1, 'time_out', '2025-05-29 21:04:37', '21:04:37', 0, 0, 245, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(282, 1, 'time_in', '2025-05-29 21:04:37', '21:04:37', 1, 725, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(283, 1, 'time_in', '2025-05-29 21:05:40', '21:05:40', 1, 726, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(284, 1, 'time_out', '2025-05-29 21:05:40', '21:05:40', 0, 0, 246, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(285, 1, 'time_out', '2025-05-29 21:05:53', '21:05:53', 0, 0, 246, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(286, 1, 'time_in', '2025-05-29 21:05:53', '21:05:53', 1, 726, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(287, 1, 'time_out', '2025-05-29 22:10:14', '22:10:14', 0, 0, 310, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(288, 1, 'time_in', '2025-05-29 22:10:14', '22:10:14', 1, 790, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(289, 1, 'time_out', '2025-05-29 22:10:35', '22:10:35', 0, 0, 311, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(290, 1, 'time_in', '2025-05-29 22:10:35', '22:10:35', 1, 791, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(291, 1, 'time_in', '2025-05-29 22:18:37', '22:18:37', 1, 799, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(292, 1, 'time_out', '2025-05-29 22:18:37', '22:18:37', 0, 0, 319, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(293, 1, 'time_in', '2025-05-30 06:59:06', '06:59:06', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(294, 1, 'time_out', '2025-05-30 06:59:06', '06:59:06', 1, 601, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(295, 1, 'time_out', '2025-05-30 07:44:31', '07:44:31', 1, 555, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(296, 1, 'time_in', '2025-05-30 07:44:31', '07:44:31', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(297, 1, 'time_in', '2025-05-30 07:45:09', '07:45:09', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(298, 1, 'time_in', '2025-05-30 07:47:14', '07:47:14', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(299, 1, 'time_in', '2025-05-30 07:47:24', '07:47:24', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(300, 1, 'time_in', '2025-05-30 07:47:57', '07:47:57', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(301, 1, 'time_in', '2025-05-30 07:48:09', '07:48:09', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(302, 1, 'time_in', '2025-05-30 07:48:38', '07:48:38', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(303, 1, 'time_in', '2025-05-30 07:50:23', '07:50:23', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(304, 1, 'time_in', '2025-05-30 07:50:35', '07:50:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(305, 1, 'time_in', '2025-05-30 07:50:50', '07:50:50', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(306, 1, 'time_in', '2025-05-30 07:52:54', '07:52:54', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(307, 1, 'time_in', '2025-05-30 07:54:06', '07:54:06', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(308, 1, 'time_in', '2025-05-30 07:56:17', '07:56:17', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(309, 1, 'time_in', '2025-05-30 07:56:22', '07:56:22', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(310, 1, 'time_in', '2025-05-30 07:58:09', '07:58:09', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(311, 1, 'time_in', '2025-05-30 07:58:22', '07:58:22', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(312, 1, 'time_in', '2025-05-30 08:01:35', '08:01:35', 1, 2, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(313, 1, 'time_in', '2025-05-30 08:01:41', '08:01:41', 1, 2, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(314, 1, 'time_in', '2025-05-30 08:20:49', '08:20:49', 1, 21, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(315, 1, 'time_in', '2025-05-30 08:45:14', '08:45:14', 1, 45, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(316, 1, 'time_out', '2025-05-30 12:04:25', '12:04:25', 1, 296, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(317, 1, 'time_in', '2025-05-30 12:04:25', '12:04:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(318, 1, 'time_in', '2025-05-30 12:04:43', '12:04:43', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(319, 1, 'time_in', '2025-05-30 12:04:50', '12:04:50', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(320, 1, 'time_out', '2025-05-30 12:05:04', '12:05:04', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(321, 1, 'time_in', '2025-05-30 12:05:04', '12:05:04', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(322, 1, 'time_in', '2025-05-30 12:05:15', '12:05:15', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(323, 1, 'time_out', '2025-05-30 12:05:15', '12:05:15', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(324, 1, 'time_out', '2025-05-30 12:05:21', '12:05:21', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(325, 1, 'time_in', '2025-05-30 12:05:21', '12:05:21', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(326, 1, 'time_out', '2025-05-30 12:06:04', '12:06:04', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(327, 1, 'time_in', '2025-05-30 12:06:04', '12:06:04', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(328, 1, 'time_in', '2025-05-30 12:55:57', '12:55:57', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(329, 1, 'time_in', '2025-05-30 12:56:07', '12:56:07', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(330, 1, 'time_in', '2025-05-30 16:44:57', '16:44:57', 1, 465, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(331, 1, 'time_out', '2025-05-30 17:04:30', '17:04:30', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(332, 1, 'time_in', '2025-05-30 17:04:30', '17:04:30', 1, 485, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(333, 1, 'time_out', '2025-05-30 17:04:36', '17:04:36', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(334, 1, 'time_in', '2025-05-30 17:04:36', '17:04:36', 1, 485, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(335, 1, 'time_out', '2025-05-30 17:04:42', '17:04:42', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(336, 1, 'time_in', '2025-05-30 17:04:42', '17:04:42', 1, 485, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(337, 1, 'time_in', '2025-05-30 17:04:54', '17:04:54', 1, 485, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(338, 1, 'time_out', '2025-05-30 17:04:54', '17:04:54', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(339, 1, 'time_out', '2025-05-30 17:07:17', '17:07:17', 0, 0, 7, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(340, 1, 'time_in', '2025-05-30 17:07:17', '17:07:17', 1, 487, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(341, 1, 'time_out', '2025-05-30 17:07:55', '17:07:55', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(342, 1, 'time_in', '2025-05-30 17:07:55', '17:07:55', 1, 488, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(343, 1, 'time_out', '2025-05-30 17:08:37', '17:08:37', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(344, 1, 'time_in', '2025-05-30 17:08:37', '17:08:37', 1, 489, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(345, 1, 'time_out', '2025-05-30 17:37:20', '17:37:20', 0, 0, 37, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(346, 1, 'time_in', '2025-05-30 17:37:20', '17:37:20', 1, 517, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(347, 1, 'time_out', '2025-05-30 17:37:53', '17:37:53', 0, 0, 38, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(348, 1, 'time_in', '2025-05-30 17:37:53', '17:37:53', 1, 518, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(349, 1, 'time_out', '2025-05-30 17:43:46', '17:43:46', 0, 0, 44, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(350, 1, 'time_in', '2025-05-30 17:43:46', '17:43:46', 1, 524, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(351, 1, 'time_out', '2025-05-30 18:00:58', '18:00:58', 0, 0, 61, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(352, 1, 'time_in', '2025-05-30 18:00:58', '18:00:58', 1, 541, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(353, 1, 'time_out', '2025-05-30 18:38:40', '18:38:40', 0, 0, 99, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(354, 1, 'time_in', '2025-05-30 18:38:40', '18:38:40', 1, 579, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(355, 1, 'time_out', '2025-05-30 19:11:05', '19:11:05', 0, 0, 131, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(356, 1, 'time_in', '2025-05-30 19:11:05', '19:11:05', 1, 611, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(357, 1, 'time_out', '2025-05-30 19:18:18', '19:18:18', 0, 0, 138, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(358, 1, 'time_in', '2025-05-30 19:18:18', '19:18:18', 1, 618, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(359, 1, 'time_out', '2025-05-30 21:02:55', '21:02:55', 0, 0, 243, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(360, 1, 'time_in', '2025-05-30 21:02:55', '21:02:55', 1, 723, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(361, 1, 'time_out', '2025-05-30 21:09:10', '21:09:10', 0, 0, 249, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(362, 1, 'time_in', '2025-05-30 21:09:10', '21:09:10', 1, 729, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(363, 1, 'time_out', '2025-05-30 21:09:34', '21:09:34', 0, 0, 250, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(364, 1, 'time_in', '2025-05-30 21:09:34', '21:09:34', 1, 730, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(365, 1, 'time_out', '2025-05-30 21:10:04', '21:10:04', 0, 0, 250, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(366, 1, 'time_in', '2025-05-30 21:10:04', '21:10:04', 1, 730, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(367, 1, 'time_out', '2025-05-30 21:10:13', '21:10:13', 0, 0, 250, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(368, 1, 'time_in', '2025-05-30 21:10:13', '21:10:13', 1, 730, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(369, 1, 'time_in', '2025-05-31 07:32:30', '07:32:30', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(370, 1, 'time_in', '2025-05-31 07:32:37', '07:32:37', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(371, 1, 'time_in', '2025-05-31 07:35:01', '07:35:01', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(372, 1, 'time_in', '2025-05-31 07:37:29', '07:37:29', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(373, 1, 'time_in', '2025-05-31 07:41:20', '07:41:20', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(374, 1, 'time_in', '2025-05-31 07:44:27', '07:44:27', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(375, 1, 'time_in', '2025-05-31 07:46:59', '07:46:59', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(376, 1, 'time_in', '2025-05-31 07:47:41', '07:47:41', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(377, 1, 'time_in', '2025-05-31 07:50:45', '07:50:45', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(378, 1, 'time_in', '2025-05-31 07:50:52', '07:50:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(379, 1, 'time_in', '2025-05-31 07:51:52', '07:51:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(380, 1, 'time_in', '2025-05-31 07:53:33', '07:53:33', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(381, 1, 'time_in', '2025-05-31 07:54:53', '07:54:53', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(382, 1, 'time_in', '2025-05-31 07:55:41', '07:55:41', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(383, 1, 'time_in', '2025-05-31 07:57:33', '07:57:33', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(384, 1, 'time_in', '2025-05-31 07:59:51', '07:59:51', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(385, 1, 'time_in', '2025-05-31 08:01:40', '08:01:40', 1, 2, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(386, 1, 'time_in', '2025-05-31 08:01:46', '08:01:46', 1, 2, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(387, 1, 'time_in', '2025-05-31 08:10:21', '08:10:21', 1, 10, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(388, 1, 'time_in', '2025-05-31 08:10:26', '08:10:26', 1, 10, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(389, 1, 'time_in', '2025-05-31 08:39:09', '08:39:09', 1, 39, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(390, 1, 'time_out', '2025-05-31 12:02:35', '12:02:35', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(391, 1, 'time_in', '2025-05-31 12:02:35', '12:02:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(392, 1, 'time_out', '2025-05-31 12:03:14', '12:03:14', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(393, 1, 'time_in', '2025-05-31 12:03:14', '12:03:14', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(394, 1, 'time_out', '2025-05-31 12:03:21', '12:03:21', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(395, 1, 'time_in', '2025-05-31 12:03:21', '12:03:21', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(396, 1, 'time_out', '2025-05-31 12:03:27', '12:03:27', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(397, 1, 'time_in', '2025-05-31 12:03:27', '12:03:27', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(398, 1, 'time_out', '2025-05-31 12:04:32', '12:04:32', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(399, 1, 'time_in', '2025-05-31 12:04:32', '12:04:32', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(400, 1, 'time_out', '2025-05-31 12:04:47', '12:04:47', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(401, 1, 'time_in', '2025-05-31 12:04:47', '12:04:47', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(402, 1, 'time_out', '2025-05-31 12:04:58', '12:04:58', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(403, 1, 'time_in', '2025-05-31 12:04:58', '12:04:58', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(404, 1, 'time_out', '2025-05-31 12:07:47', '12:07:47', 1, 292, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(405, 1, 'time_in', '2025-05-31 12:07:47', '12:07:47', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(406, 1, 'time_out', '2025-05-31 12:11:28', '12:11:28', 1, 289, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(407, 1, 'time_in', '2025-05-31 12:11:28', '12:11:28', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(408, 1, 'time_in', '2025-05-31 12:55:18', '12:55:18', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(409, 1, 'time_in', '2025-05-31 12:57:56', '12:57:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(410, 1, 'time_in', '2025-05-31 12:58:02', '12:58:02', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(411, 1, 'time_in', '2025-05-31 12:59:35', '12:59:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(412, 1, 'time_in', '2025-05-31 16:04:51', '16:04:51', 1, 425, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(413, 1, 'time_out', '2025-05-31 17:03:56', '17:03:56', 0, 0, 4, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(414, 1, 'time_out', '2025-05-31 17:04:11', '17:04:11', 0, 0, 4, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(415, 1, 'time_out', '2025-05-31 17:04:37', '17:04:37', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(416, 1, 'time_out', '2025-05-31 17:04:49', '17:04:49', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(417, 1, 'time_out', '2025-05-31 17:05:10', '17:05:10', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(418, 1, 'time_out', '2025-05-31 17:07:25', '17:07:25', 0, 0, 7, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(419, 1, 'time_out', '2025-05-31 17:08:35', '17:08:35', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(420, 1, 'time_out', '2025-05-31 17:09:03', '17:09:03', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(421, 1, 'time_out', '2025-05-31 17:12:56', '17:12:56', 0, 0, 13, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(422, 1, 'time_out', '2025-05-31 17:13:13', '17:13:13', 0, 0, 13, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(423, 1, 'time_out', '2025-05-31 17:28:27', '17:28:27', 0, 0, 28, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(424, 1, 'time_out', '2025-05-31 17:28:47', '17:28:47', 0, 0, 29, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(425, 1, 'time_out', '2025-05-31 17:28:54', '17:28:54', 0, 0, 29, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(426, 1, 'time_in', '2025-05-31 17:31:12', '17:31:12', 1, 511, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(427, 1, 'time_out', '2025-05-31 17:41:47', '17:41:47', 0, 0, 42, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(428, 1, 'time_out', '2025-05-31 18:09:58', '18:09:58', 0, 0, 70, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(429, 1, 'time_out', '2025-05-31 19:23:49', '19:23:49', 0, 0, 144, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(430, 1, 'time_out', '2025-05-31 19:24:03', '19:24:03', 0, 0, 144, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(431, 1, 'time_out', '2025-05-31 19:24:12', '19:24:12', 0, 0, 144, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(432, 1, 'time_out', '2025-05-31 19:24:22', '19:24:22', 0, 0, 144, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(433, 1, 'time_in', '2025-06-01 06:59:40', '06:59:40', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(434, 1, 'time_in', '2025-06-01 07:10:59', '07:10:59', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(435, 1, 'time_in', '2025-06-01 07:12:42', '07:12:42', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(436, 1, 'time_in', '2025-06-01 07:49:16', '07:49:16', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(437, 1, 'time_in', '2025-06-01 07:49:22', '07:49:22', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(438, 1, 'time_in', '2025-06-01 07:51:52', '07:51:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(439, 1, 'time_in', '2025-06-01 07:58:24', '07:58:24', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(440, 1, 'time_in', '2025-06-01 08:01:21', '08:01:21', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(441, 1, 'time_in', '2025-06-01 08:03:22', '08:03:22', 1, 3, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(442, 1, 'time_in', '2025-06-01 08:03:29', '08:03:29', 1, 3, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(443, 1, 'time_in', '2025-06-01 08:16:17', '08:16:17', 1, 16, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(444, 1, 'time_in', '2025-06-01 08:43:48', '08:43:48', 1, 44, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(445, 1, 'time_in', '2025-06-01 08:46:27', '08:46:27', 1, 46, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(446, 1, 'time_out', '2025-06-01 15:06:49', '15:06:49', 1, 113, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(447, 1, 'time_out', '2025-06-01 15:07:08', '15:07:08', 1, 113, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(448, 1, 'time_out', '2025-06-01 15:11:14', '15:11:14', 1, 109, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL);
INSERT INTO `attendance` (`id`, `users_id`, `action`, `timestamp`, `time`, `is_late`, `late_minutes`, `overtime_minutes`, `is_undertime`, `undertime_minutes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(449, 1, 'time_out', '2025-06-01 16:07:34', '16:07:34', 1, 52, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(450, 1, 'time_out', '2025-06-01 17:05:04', '17:05:04', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(451, 1, 'time_out', '2025-06-01 17:05:36', '17:05:36', 0, 0, 6, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(452, 1, 'time_out', '2025-06-01 17:08:18', '17:08:18', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(453, 1, 'time_out', '2025-06-01 17:16:12', '17:16:12', 0, 0, 16, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(454, 1, 'time_out', '2025-06-01 17:37:29', '17:37:29', 0, 0, 37, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(455, 1, 'time_out', '2025-06-01 18:05:48', '18:05:48', 0, 0, 66, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(456, 1, 'time_out', '2025-06-01 19:05:27', '19:05:27', 0, 0, 125, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(457, 1, 'time_out', '2025-06-01 19:05:38', '19:05:38', 0, 0, 126, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(458, 1, 'time_out', '2025-06-01 19:05:45', '19:05:45', 0, 0, 126, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(459, 1, 'time_in', '2025-06-02 06:25:33', '06:25:33', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(460, 1, 'time_in', '2025-06-02 06:42:53', '06:42:53', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(461, 1, 'time_in', '2025-06-02 06:58:17', '06:58:17', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(462, 1, 'time_in', '2025-06-02 07:06:31', '07:06:31', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(463, 1, 'time_in', '2025-06-02 07:30:44', '07:30:44', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(464, 1, 'time_in', '2025-06-02 07:34:46', '07:34:46', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(465, 1, 'time_in', '2025-06-02 07:44:49', '07:44:49', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(466, 1, 'time_in', '2025-06-02 07:47:55', '07:47:55', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(467, 1, 'time_in', '2025-06-02 07:48:17', '07:48:17', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(468, 1, 'time_in', '2025-06-02 07:49:19', '07:49:19', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(469, 1, 'time_in', '2025-06-02 07:49:26', '07:49:26', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(470, 1, 'time_in', '2025-06-02 07:49:46', '07:49:46', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(471, 1, 'time_in', '2025-06-02 07:49:53', '07:49:53', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(472, 1, 'time_in', '2025-06-02 07:53:54', '07:53:54', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(473, 1, 'time_in', '2025-06-02 07:54:30', '07:54:30', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(474, 1, 'time_in', '2025-06-02 07:54:53', '07:54:53', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(475, 1, 'time_in', '2025-06-02 07:57:19', '07:57:19', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(476, 1, 'time_in', '2025-06-02 08:02:27', '08:02:27', 1, 2, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(477, 1, 'time_in', '2025-06-02 08:03:37', '08:03:37', 1, 4, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(478, 1, 'time_in', '2025-06-02 08:33:45', '08:33:45', 1, 34, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(479, 1, 'time_out', '2025-06-02 12:02:43', '12:02:43', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(480, 1, 'time_out', '2025-06-02 12:02:49', '12:02:49', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(481, 1, 'time_out', '2025-06-02 12:03:02', '12:03:02', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(482, 1, 'time_in', '2025-06-02 12:03:09', '12:03:09', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(483, 1, 'time_in', '2025-06-02 12:03:14', '12:03:14', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(484, 1, 'time_out', '2025-06-02 12:04:12', '12:04:12', 1, 296, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(485, 1, 'time_out', '2025-06-02 12:04:19', '12:04:19', 1, 296, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(486, 1, 'time_out', '2025-06-02 12:04:30', '12:04:30', 1, 296, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(487, 1, 'time_out', '2025-06-02 12:04:37', '12:04:37', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(488, 1, 'time_out', '2025-06-02 12:04:44', '12:04:44', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(489, 1, 'time_in', '2025-06-02 12:04:56', '12:04:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(490, 1, 'time_in', '2025-06-02 12:05:03', '12:05:03', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(491, 1, 'time_in', '2025-06-02 12:05:09', '12:05:09', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(492, 1, 'time_out', '2025-06-02 12:05:57', '12:05:57', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(493, 1, 'time_in', '2025-06-02 12:44:25', '12:44:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(494, 1, 'time_in', '2025-06-02 12:57:14', '12:57:14', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(495, 1, 'time_in', '2025-06-02 12:57:30', '12:57:30', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(496, 1, 'time_in', '2025-06-02 12:57:57', '12:57:57', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(497, 1, 'time_in', '2025-06-02 13:00:30', '13:00:30', 1, 241, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(498, 1, 'time_out', '2025-06-02 17:05:03', '17:05:03', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(499, 1, 'time_out', '2025-06-02 17:05:10', '17:05:10', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(500, 1, 'time_out', '2025-06-02 17:17:27', '17:17:27', 0, 0, 17, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(501, 1, 'time_out', '2025-06-02 17:27:19', '17:27:19', 0, 0, 27, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(502, 1, 'time_out', '2025-06-02 17:44:01', '17:44:01', 0, 0, 44, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(503, 1, 'time_out', '2025-06-02 17:44:12', '17:44:12', 0, 0, 44, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(504, 1, 'time_out', '2025-06-02 18:13:31', '18:13:31', 0, 0, 74, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(505, 1, 'time_out', '2025-06-02 19:00:04', '19:00:04', 0, 0, 120, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(506, 1, 'time_out', '2025-06-02 19:19:56', '19:19:56', 0, 0, 140, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(507, 1, 'time_out', '2025-06-02 21:03:09', '21:03:09', 0, 0, 243, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(508, 1, 'time_out', '2025-06-02 21:03:18', '21:03:18', 0, 0, 243, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(509, 1, 'time_out', '2025-06-02 21:03:24', '21:03:24', 0, 0, 243, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(510, 1, 'time_out', '2025-06-02 21:11:35', '21:11:35', 0, 0, 252, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(511, 1, 'time_out', '2025-06-02 21:12:07', '21:12:07', 0, 0, 252, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(512, 1, 'time_out', '2025-06-02 21:12:24', '21:12:24', 0, 0, 252, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(513, 1, 'time_out', '2025-06-02 21:13:13', '21:13:13', 0, 0, 253, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(514, 1, 'time_out', '2025-06-02 23:15:37', '23:15:37', 0, 0, 376, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(515, 1, 'time_out', '2025-06-02 23:15:43', '23:15:43', 0, 0, 376, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(516, 1, 'time_out', '2025-06-02 23:15:50', '23:15:50', 0, 0, 376, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(517, 1, 'time_out', '2025-06-02 23:15:57', '23:15:57', 0, 0, 376, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(518, 1, 'time_out', '2025-06-02 23:36:03', '23:36:03', 0, 0, 396, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(519, 1, 'time_out', '2025-06-03 07:17:23', '07:17:23', 1, 583, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(520, 1, 'time_in', '2025-06-03 07:27:16', '07:27:16', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(521, 1, 'time_in', '2025-06-03 07:38:01', '07:38:01', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(522, 1, 'time_in', '2025-06-03 07:41:01', '07:41:01', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(523, 1, 'time_in', '2025-06-03 07:45:11', '07:45:11', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(524, 1, 'time_in', '2025-06-03 07:48:41', '07:48:41', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(525, 1, 'time_in', '2025-06-03 07:49:20', '07:49:20', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(526, 1, 'time_in', '2025-06-03 07:51:17', '07:51:17', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(527, 1, 'time_in', '2025-06-03 07:52:32', '07:52:32', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(528, 1, 'time_in', '2025-06-03 07:52:51', '07:52:51', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(529, 1, 'time_in', '2025-06-03 07:57:58', '07:57:58', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(530, 1, 'time_in', '2025-06-03 07:59:01', '07:59:01', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(531, 1, 'time_in', '2025-06-03 07:59:22', '07:59:22', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(532, 1, 'time_in', '2025-06-03 07:59:38', '07:59:38', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(533, 1, 'time_in', '2025-06-03 08:02:53', '08:02:53', 1, 3, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(534, 1, 'time_in', '2025-06-03 08:06:09', '08:06:09', 1, 6, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(535, 1, 'time_in', '2025-06-03 08:08:01', '08:08:01', 1, 8, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(536, 1, 'time_in', '2025-06-03 08:08:07', '08:08:07', 1, 8, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(537, 1, 'time_in', '2025-06-03 08:10:26', '08:10:26', 1, 10, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(538, 1, 'time_in', '2025-06-03 08:10:33', '08:10:33', 1, 11, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(539, 1, 'time_in', '2025-06-03 08:11:33', '08:11:33', 1, 12, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(540, 1, 'time_out', '2025-06-03 12:04:39', '12:04:39', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(541, 1, 'time_in', '2025-06-03 12:04:44', '12:04:44', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(542, 1, 'time_out', '2025-06-03 12:05:12', '12:05:12', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(543, 1, 'time_out', '2025-06-03 12:05:32', '12:05:32', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(544, 1, 'time_out', '2025-06-03 12:05:43', '12:05:43', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(545, 1, 'time_in', '2025-06-03 12:05:59', '12:05:59', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(546, 1, 'time_in', '2025-06-03 12:06:05', '12:06:05', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(547, 1, 'time_out', '2025-06-03 12:06:38', '12:06:38', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(548, 1, 'time_out', '2025-06-03 12:07:14', '12:07:14', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(549, 1, 'time_in', '2025-06-03 12:07:24', '12:07:24', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(550, 1, 'time_out', '2025-06-03 12:09:07', '12:09:07', 1, 291, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(551, 1, 'time_out', '2025-06-03 12:18:22', '12:18:22', 1, 282, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(552, 1, 'time_in', '2025-06-03 12:18:35', '12:18:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(553, 1, 'time_in', '2025-06-03 12:57:45', '12:57:45', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(554, 1, 'time_in', '2025-06-03 12:57:51', '12:57:51', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(555, 1, 'time_in', '2025-06-03 13:04:17', '13:04:17', 1, 244, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(556, 1, 'time_out', '2025-06-03 17:05:44', '17:05:44', 0, 0, 6, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(557, 1, 'time_out', '2025-06-03 17:05:51', '17:05:51', 0, 0, 6, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(558, 1, 'time_out', '2025-06-03 17:05:59', '17:05:59', 0, 0, 6, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(559, 1, 'time_out', '2025-06-03 17:28:32', '17:28:32', 0, 0, 29, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(560, 1, 'time_out', '2025-06-03 17:31:20', '17:31:20', 0, 0, 31, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(561, 1, 'time_out', '2025-06-03 17:35:22', '17:35:22', 0, 0, 35, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(562, 1, 'time_out', '2025-06-03 17:49:33', '17:49:33', 0, 0, 50, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(563, 1, 'time_out', '2025-06-03 20:16:13', '20:16:13', 0, 0, 196, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(564, 1, 'time_out', '2025-06-03 20:23:51', '20:23:51', 0, 0, 204, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(565, 1, 'time_out', '2025-06-03 20:47:57', '20:47:57', 0, 0, 228, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(566, 1, 'time_out', '2025-06-03 21:06:49', '21:06:49', 0, 0, 247, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(567, 1, 'time_out', '2025-06-03 21:07:30', '21:07:30', 0, 0, 248, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(568, 1, 'time_out', '2025-06-03 21:10:04', '21:10:04', 0, 0, 250, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(569, 1, 'time_out', '2025-06-03 21:16:45', '21:16:45', 0, 0, 257, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(570, 1, 'time_out', '2025-06-03 22:16:12', '22:16:12', 0, 0, 316, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(571, 1, 'time_out', '2025-06-03 22:16:23', '22:16:23', 0, 0, 316, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(572, 1, 'time_out', '2025-06-03 22:16:40', '22:16:40', 0, 0, 317, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(573, 1, 'time_out', '2025-06-03 22:18:50', '22:18:50', 0, 0, 319, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(574, 1, 'time_out', '2025-06-03 23:01:57', '23:01:57', 0, 0, 362, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(575, 1, 'time_out', '2025-06-03 23:02:06', '23:02:06', 0, 0, 362, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(576, 1, 'time_out', '2025-06-03 23:04:33', '23:04:33', 0, 0, 365, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(577, 1, 'time_out', '2025-06-04 07:08:35', '07:08:35', 1, 591, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(578, 1, 'time_in', '2025-06-04 07:08:52', '07:08:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(579, 1, 'time_in', '2025-06-04 07:26:29', '07:26:29', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(580, 1, 'time_in', '2025-06-04 07:27:46', '07:27:46', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(581, 1, 'time_in', '2025-06-04 07:32:28', '07:32:28', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(582, 1, 'time_in', '2025-06-04 07:34:15', '07:34:15', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(583, 1, 'time_in', '2025-06-04 07:34:57', '07:34:57', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(584, 1, 'time_in', '2025-06-04 07:38:46', '07:38:46', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(585, 1, 'time_in', '2025-06-04 07:42:08', '07:42:08', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(586, 1, 'time_in', '2025-06-04 07:50:39', '07:50:39', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(587, 1, 'time_in', '2025-06-04 07:50:58', '07:50:58', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(588, 1, 'time_in', '2025-06-04 07:51:58', '07:51:58', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(589, 1, 'time_in', '2025-06-04 07:53:33', '07:53:33', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(590, 1, 'time_in', '2025-06-04 07:53:39', '07:53:39', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(591, 1, 'time_in', '2025-06-04 07:54:05', '07:54:05', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(592, 1, 'time_in', '2025-06-04 07:54:35', '07:54:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(593, 1, 'time_in', '2025-06-04 07:54:55', '07:54:55', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(594, 1, 'time_in', '2025-06-04 07:56:08', '07:56:08', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(595, 1, 'time_in', '2025-06-04 07:57:43', '07:57:43', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(596, 1, 'time_in', '2025-06-04 07:58:06', '07:58:06', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(597, 1, 'time_in', '2025-06-04 08:04:02', '08:04:02', 1, 4, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(598, 1, 'time_in', '2025-06-04 08:24:15', '08:24:15', 1, 24, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(599, 1, 'time_in', '2025-06-04 08:24:52', '08:24:52', 1, 25, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(600, 1, 'time_in', '2025-06-04 08:37:51', '08:37:51', 1, 38, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(601, 1, 'time_in', '2025-06-04 12:02:14', '12:02:14', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(602, 1, 'time_out', '2025-06-04 12:02:34', '12:02:34', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(603, 1, 'time_out', '2025-06-04 12:02:56', '12:02:56', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(604, 1, 'time_out', '2025-06-04 12:03:04', '12:03:04', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(605, 1, 'time_out', '2025-06-04 12:03:30', '12:03:30', 1, 297, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(606, 1, 'time_out', '2025-06-04 12:08:59', '12:08:59', 1, 291, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(607, 1, 'time_out', '2025-06-04 12:12:32', '12:12:32', 1, 287, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(608, 1, 'time_in', '2025-06-04 12:12:47', '12:12:47', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(609, 1, 'time_out', '2025-06-04 12:15:29', '12:15:29', 1, 285, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(610, 1, 'time_in', '2025-06-04 12:15:41', '12:15:41', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(611, 1, 'time_out', '2025-06-04 12:16:16', '12:16:16', 1, 284, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(612, 1, 'time_in', '2025-06-04 12:50:29', '12:50:29', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(613, 1, 'time_in', '2025-06-04 12:55:31', '12:55:31', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(614, 1, 'time_in', '2025-06-04 12:55:39', '12:55:39', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(615, 1, 'time_in', '2025-06-04 12:55:44', '12:55:44', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(616, 1, 'time_out', '2025-06-04 12:56:56', '12:56:56', 1, 243, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(617, 1, 'time_in', '2025-06-04 12:58:07', '12:58:07', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(618, 1, 'time_in', '2025-06-04 12:59:00', '12:59:00', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(619, 1, 'time_in', '2025-06-04 17:08:05', '17:08:05', 1, 488, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(620, 1, 'time_in', '2025-06-04 17:08:16', '17:08:16', 1, 488, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(621, 1, 'time_out', '2025-06-04 17:09:20', '17:09:20', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(622, 1, 'time_out', '2025-06-04 17:09:27', '17:09:27', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(623, 1, 'time_out', '2025-06-04 17:10:26', '17:10:26', 0, 0, 10, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(624, 1, 'time_out', '2025-06-04 17:11:37', '17:11:37', 0, 0, 12, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(625, 1, 'time_out', '2025-06-04 17:12:39', '17:12:39', 0, 0, 13, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(626, 1, 'time_out', '2025-06-04 17:13:57', '17:13:57', 0, 0, 14, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(627, 1, 'time_out', '2025-06-04 17:18:09', '17:18:09', 0, 0, 18, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(628, 1, 'time_out', '2025-06-04 17:23:07', '17:23:07', 0, 0, 23, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(629, 1, 'time_out', '2025-06-04 17:46:33', '17:46:33', 0, 0, 47, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(630, 1, 'time_out', '2025-06-04 17:46:47', '17:46:47', 0, 0, 47, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(631, 1, 'time_out', '2025-06-04 18:00:55', '18:00:55', 0, 0, 61, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(632, 1, 'time_out', '2025-06-04 18:01:11', '18:01:11', 0, 0, 61, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(633, 1, 'time_out', '2025-06-04 19:15:22', '19:15:22', 0, 0, 135, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(634, 1, 'time_out', '2025-06-04 19:17:56', '19:17:56', 0, 0, 138, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(635, 1, 'time_out', '2025-06-04 20:10:38', '20:10:38', 0, 0, 191, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(636, 1, 'time_out', '2025-06-04 20:14:39', '20:14:39', 0, 0, 195, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(637, 1, 'time_out', '2025-06-04 21:06:13', '21:06:13', 0, 0, 246, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(638, 1, 'time_out', '2025-06-05 01:21:52', '01:21:52', 1, 938, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(639, 1, 'time_out', '2025-06-05 01:22:21', '01:22:21', 1, 938, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(640, 1, 'time_out', '2025-06-05 01:22:28', '01:22:28', 1, 938, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(641, 1, 'time_out', '2025-06-05 01:22:37', '01:22:37', 1, 937, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(642, 1, 'time_out', '2025-06-05 07:09:13', '07:09:13', 1, 591, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(643, 1, 'time_in', '2025-06-05 07:19:56', '07:19:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(644, 1, 'time_in', '2025-06-05 07:34:12', '07:34:12', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(645, 1, 'time_in', '2025-06-05 07:41:55', '07:41:55', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(646, 1, 'time_in', '2025-06-05 07:42:48', '07:42:48', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(647, 1, 'time_in', '2025-06-05 07:49:25', '07:49:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(648, 1, 'time_in', '2025-06-05 07:50:51', '07:50:51', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(649, 1, 'time_in', '2025-06-05 07:51:48', '07:51:48', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(650, 1, 'time_in', '2025-06-05 07:52:14', '07:52:14', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(651, 1, 'time_in', '2025-06-05 07:52:25', '07:52:25', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(652, 1, 'time_in', '2025-06-05 07:54:58', '07:54:58', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(653, 1, 'time_in', '2025-06-05 07:57:34', '07:57:34', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(654, 1, 'time_in', '2025-06-05 07:58:37', '07:58:37', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(655, 1, 'time_in', '2025-06-05 07:59:14', '07:59:14', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(656, 1, 'time_in', '2025-06-05 08:00:30', '08:00:30', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(657, 1, 'time_in', '2025-06-05 08:00:36', '08:00:36', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(658, 1, 'time_in', '2025-06-05 08:12:11', '08:12:11', 1, 12, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(659, 1, 'time_in', '2025-06-05 09:19:35', '09:19:35', 1, 80, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(660, 1, 'time_in', '2025-06-05 09:19:42', '09:19:42', 1, 80, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(661, 1, 'time_in', '2025-06-05 09:25:59', '09:25:59', 1, 86, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(662, 1, 'time_in', '2025-06-05 10:52:23', '10:52:23', 1, 172, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(663, 1, 'time_in', '2025-06-05 12:04:52', '12:04:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(664, 1, 'time_out', '2025-06-05 12:06:43', '12:06:43', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(665, 1, 'time_out', '2025-06-05 12:06:53', '12:06:53', 1, 293, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(666, 1, 'time_out', '2025-06-05 12:15:49', '12:15:49', 1, 284, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(667, 1, 'time_out', '2025-06-05 12:15:58', '12:15:58', 1, 284, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(668, 1, 'time_in', '2025-06-05 12:16:08', '12:16:08', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(669, 1, 'time_in', '2025-06-05 12:16:17', '12:16:17', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(670, 1, 'time_out', '2025-06-05 12:31:24', '12:31:24', 1, 269, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(671, 1, 'time_in', '2025-06-05 12:31:35', '12:31:35', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(672, 1, 'time_in', '2025-06-05 12:55:05', '12:55:05', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(673, 1, 'time_in', '2025-06-05 12:57:01', '12:57:01', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(674, 1, 'time_in', '2025-06-05 13:00:57', '13:00:57', 1, 241, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(675, 1, 'time_out', '2025-06-05 17:05:13', '17:05:13', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(676, 1, 'time_out', '2025-06-05 17:05:27', '17:05:27', 0, 0, 5, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(677, 1, 'time_out', '2025-06-05 17:07:21', '17:07:21', 0, 0, 7, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(678, 1, 'time_out', '2025-06-05 17:08:53', '17:08:53', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(679, 1, 'time_out', '2025-06-05 17:10:18', '17:10:18', 0, 0, 10, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(680, 1, 'time_out', '2025-06-05 17:10:30', '17:10:30', 0, 0, 11, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(681, 1, 'time_out', '2025-06-05 17:12:48', '17:12:48', 0, 0, 13, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(682, 1, 'time_out', '2025-06-05 17:13:30', '17:13:30', 0, 0, 14, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(683, 1, 'time_out', '2025-06-05 17:16:50', '17:16:50', 0, 0, 17, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(684, 1, 'time_out', '2025-06-05 17:18:03', '17:18:03', 0, 0, 18, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(685, 1, 'time_out', '2025-06-05 17:19:24', '17:19:24', 0, 0, 19, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(686, 1, 'time_out', '2025-06-05 17:25:14', '17:25:14', 0, 0, 25, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(687, 1, 'time_out', '2025-06-05 19:53:17', '19:53:17', 0, 0, 173, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(688, 1, 'time_out', '2025-06-05 21:04:17', '21:04:17', 0, 0, 244, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(689, 1, 'time_out', '2025-06-05 21:04:24', '21:04:24', 0, 0, 244, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(690, 1, 'time_out', '2025-06-05 21:04:36', '21:04:36', 0, 0, 245, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(691, 1, 'time_out', '2025-06-05 21:05:27', '21:05:27', 0, 0, 245, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(692, 1, 'time_out', '2025-06-05 21:05:33', '21:05:33', 0, 0, 246, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(693, 1, 'time_out', '2025-06-05 21:07:12', '21:07:12', 0, 0, 247, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(694, 1, 'time_in', '2025-06-06 07:22:16', '07:22:16', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(695, 1, 'time_in', '2025-06-06 07:24:50', '07:24:50', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(696, 1, 'time_in', '2025-06-06 07:30:49', '07:30:49', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(697, 1, 'time_in', '2025-06-06 07:38:17', '07:38:17', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(698, 1, 'time_in', '2025-06-06 07:38:26', '07:38:26', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(699, 1, 'time_in', '2025-06-06 07:46:12', '07:46:12', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(700, 1, 'time_in', '2025-06-06 07:46:30', '07:46:30', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(701, 1, 'time_in', '2025-06-06 07:49:59', '07:49:59', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(702, 1, 'time_in', '2025-06-06 07:51:56', '07:51:56', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(703, 1, 'time_in', '2025-06-06 07:54:43', '07:54:43', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(704, 1, 'time_in', '2025-06-06 07:57:01', '07:57:01', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(705, 1, 'time_in', '2025-06-06 08:00:34', '08:00:34', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(706, 1, 'time_in', '2025-06-06 08:00:39', '08:00:39', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(707, 1, 'time_in', '2025-06-06 08:00:45', '08:00:45', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(708, 1, 'time_in', '2025-06-06 08:00:56', '08:00:56', 1, 1, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(709, 1, 'time_in', '2025-06-06 08:01:42', '08:01:42', 1, 2, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(710, 1, 'time_in', '2025-06-06 08:03:50', '08:03:50', 1, 4, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(711, 1, 'time_out', '2025-06-06 12:04:33', '12:04:33', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(712, 1, 'time_out', '2025-06-06 12:04:40', '12:04:40', 1, 295, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(713, 1, 'time_in', '2025-06-06 12:04:51', '12:04:51', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(714, 1, 'time_in', '2025-06-06 12:04:57', '12:04:57', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(715, 1, 'time_in', '2025-06-06 12:05:45', '12:05:45', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(716, 1, 'time_out', '2025-06-06 12:05:58', '12:05:58', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(717, 1, 'time_out', '2025-06-06 12:06:06', '12:06:06', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(718, 1, 'time_out', '2025-06-06 12:06:16', '12:06:16', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(719, 1, 'time_out', '2025-06-06 12:06:23', '12:06:23', 1, 294, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(720, 1, 'time_in', '2025-06-06 12:06:31', '12:06:31', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(721, 1, 'time_in', '2025-06-06 12:06:51', '12:06:51', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(722, 1, 'time_in', '2025-06-06 12:06:57', '12:06:57', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(723, 1, 'time_in', '2025-06-06 12:07:05', '12:07:05', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(724, 1, 'time_out', '2025-06-06 12:07:33', '12:07:33', 1, 292, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(725, 1, 'time_out', '2025-06-06 12:07:38', '12:07:38', 1, 292, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(726, 1, 'time_out', '2025-06-06 12:08:48', '12:08:48', 1, 291, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(727, 1, 'time_in', '2025-06-06 12:49:34', '12:49:34', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(728, 1, 'time_in', '2025-06-06 12:55:42', '12:55:42', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(729, 1, 'time_in', '2025-06-06 12:56:19', '12:56:19', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(730, 1, 'time_in', '2025-06-06 13:20:18', '13:20:18', 1, 260, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(731, 1, 'time_in', '2025-06-06 17:04:36', '17:04:36', 1, 485, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(732, 1, 'time_in', '2025-06-06 17:07:02', '17:07:02', 1, 487, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(733, 1, 'time_out', '2025-06-06 17:07:29', '17:07:29', 0, 0, 7, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(734, 1, 'time_out', '2025-06-06 17:07:35', '17:07:35', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(735, 1, 'time_out', '2025-06-06 17:07:44', '17:07:44', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(736, 1, 'time_out', '2025-06-06 17:07:50', '17:07:50', 0, 0, 8, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(737, 1, 'time_out', '2025-06-06 17:09:23', '17:09:23', 0, 0, 9, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(738, 1, 'time_out', '2025-06-06 17:10:28', '17:10:28', 0, 0, 10, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(739, 1, 'time_out', '2025-06-06 17:15:03', '17:15:03', 0, 0, 15, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(740, 1, 'time_out', '2025-06-06 17:24:36', '17:24:36', 0, 0, 25, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(741, 1, 'time_out', '2025-06-06 17:34:20', '17:34:20', 0, 0, 34, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(742, 1, 'time_out', '2025-06-06 17:35:29', '17:35:29', 0, 0, 35, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(743, 1, 'time_out', '2025-06-06 17:41:05', '17:41:05', 0, 0, 41, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(744, 1, 'time_out', '2025-06-06 17:44:45', '17:44:45', 0, 0, 45, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(745, 1, 'time_out', '2025-06-07 08:12:24', '08:12:24', 1, 528, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(746, 1, 'time_in', '2025-06-07 08:12:41', '08:12:41', 1, 13, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(747, 1, 'time_in', '2025-06-07 08:12:48', '08:12:48', 1, 13, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(748, 1, 'time_in', '2025-06-07 08:31:12', '08:31:12', 1, 31, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(749, 1, 'time_in', '2025-06-07 09:26:10', '09:26:10', 1, 86, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(750, 1, 'time_in', '2025-06-07 10:55:12', '10:55:12', 1, 175, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(751, 1, 'time_in', '2025-06-07 10:57:01', '10:57:01', 1, 177, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(752, 1, 'time_in', '2025-06-07 12:03:51', '12:03:51', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(753, 1, 'time_out', '2025-06-07 12:04:16', '12:04:16', 1, 296, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(754, 1, 'time_in', '2025-06-07 13:13:48', '13:13:48', 1, 254, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(755, 1, 'time_in', '2025-06-07 17:08:04', '17:08:04', 1, 488, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(756, 1, 'time_out', '2025-06-07 17:10:07', '17:10:07', 0, 0, 10, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(757, 1, 'time_out', '2025-06-07 17:10:16', '17:10:16', 0, 0, 10, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(758, 1, 'time_out', '2025-06-07 17:10:24', '17:10:24', 0, 0, 10, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(759, 1, 'time_out', '2025-06-07 17:12:08', '17:12:08', 0, 0, 12, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(760, 1, 'time_out', '2025-06-07 17:16:24', '17:16:24', 0, 0, 16, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(761, 1, 'time_out', '2025-06-07 17:16:34', '17:16:34', 0, 0, 17, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(762, 1, 'time_out', '2025-06-07 17:19:17', '17:19:17', 0, 0, 19, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(763, 1, 'time_out', '2025-06-08 07:32:30', '07:32:30', 1, 568, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(764, 1, 'time_in', '2025-06-08 07:32:49', '07:32:49', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(765, 1, 'time_in', '2025-06-08 07:52:34', '07:52:34', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(766, 1, 'time_in', '2025-06-08 07:52:58', '07:52:58', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(767, 1, 'time_in', '2025-06-08 07:54:33', '07:54:33', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(768, 1, 'time_in', '2025-06-08 07:55:26', '07:55:26', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(769, 1, 'time_in', '2025-06-08 07:58:10', '07:58:10', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(770, 1, 'time_in', '2025-06-08 07:59:26', '07:59:26', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(771, 1, 'time_in', '2025-06-08 07:59:39', '07:59:39', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(772, 1, 'time_in', '2025-06-08 08:11:17', '08:11:17', 1, 11, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(773, 1, 'time_in', '2025-06-08 08:20:30', '08:20:30', 1, 21, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(774, 1, 'time_in', '2025-06-08 08:58:52', '08:58:52', 1, 59, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(775, 1, 'time_in', '2025-06-08 12:00:52', '12:00:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(776, 1, 'time_in', '2025-06-14 08:00:52', '08:00:52', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(777, 1, 'time_out', '2025-06-14 12:03:55', '12:03:55', 0, 0, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(786, 1, 'time_in', '2025-06-14 14:40:17', '14:40:17', 1, 100, 0, NULL, NULL, '2025-10-02 17:07:54', NULL, NULL),
(787, 3, 'time_in', '2025-11-08 12:41:39', '12:41:39', 1, -282, 0, '1', '66', '2025-11-08 04:41:39', '2025-11-08 04:41:39', NULL),
(788, 3, 'time_out', '2025-11-08 12:42:28', '12:42:28', 0, 0, 0, NULL, NULL, '2025-11-08 04:42:28', '2025-11-08 04:42:28', NULL),
(789, 1, 'time_in', '2025-11-08 13:56:12', '13:56:12', 1, -356, 0, NULL, NULL, '2025-11-08 05:56:12', '2025-11-08 05:56:12', NULL),
(790, 1, 'time_in', '2025-11-17 21:42:19', '21:42:19', 1, -822, 0, NULL, NULL, '2025-11-17 13:42:19', '2025-11-17 13:42:19', NULL),
(791, 3, 'time_in', '2025-11-17 23:36:43', '23:36:43', 1, -937, 0, NULL, NULL, '2025-11-17 15:36:43', '2025-11-17 15:36:43', NULL),
(792, 3, 'time_out', '2025-11-17 23:55:54', '23:55:54', 0, 0, 0, NULL, NULL, '2025-11-17 15:55:54', '2025-11-17 15:55:54', NULL),
(793, 3, 'time_in', '2025-10-06 09:12:00', '09:12:00', 0, 0, 0, NULL, NULL, '2025-12-03 20:12:24', '2025-12-03 20:12:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1763776131),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1763776131;', 1763776131);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_holiday`
--

CREATE TABLE `calendar_holiday` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `repeat_type` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar_holiday`
--

INSERT INTO `calendar_holiday` (`id`, `title`, `day`, `date`, `repeat_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anniversary', 'thursday', '2025-10-02', 'yearly', 'active', '2025-10-01 15:32:46', '2025-10-01 15:39:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(10) NOT NULL,
  `payrollid` int(10) NOT NULL,
  `deductionid` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `payrollid`, `deductionid`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 1, 'Pag-Ibig', '2025-10-16 14:33:21', '2025-10-16 14:33:21', NULL),
(3, 3, 1, 'Pag-Ibig', '2025-10-16 15:03:12', '2025-10-16 15:03:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `earnings` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`id`, `users_id`, `earnings`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 'Incentives', 'active', '2025-10-06 13:34:38', NULL, NULL),
(4, 3, 'Holiday Pay', 'active', '2025-11-17 15:11:46', '2025-11-17 15:11:46', NULL),
(5, 1, 'sas', 'active', '2025-11-25 16:42:06', '2025-11-25 16:42:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `earnings_p`
--

CREATE TABLE `earnings_p` (
  `id` int(10) NOT NULL,
  `payroll_id` int(10) NOT NULL,
  `earnings_id` int(10) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earnings_p`
--

INSERT INTO `earnings_p` (`id`, `payroll_id`, `earnings_id`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '200', '2025-10-16 14:33:21', '2025-10-16 14:33:21', NULL),
(2, 3, 1, '250', '2025-10-16 15:03:12', '2025-10-16 15:03:12', NULL),
(3, 1, 4, '90', '2025-11-17 15:11:46', '2025-11-17 15:11:46', NULL),
(4, 1, 4, '90', '2025-11-17 15:24:30', '2025-11-17 15:24:30', NULL);

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
-- Table structure for table `f_payroll`
--

CREATE TABLE `f_payroll` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `net` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_payroll`
--

INSERT INTO `f_payroll` (`id`, `p_id`, `net`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1863.125', '2025-11-17 15:24:30', '2025-11-17 15:24:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `late`
--

CREATE TABLE `late` (
  `id` int(10) NOT NULL,
  `payrollidd` int(10) NOT NULL,
  `late` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `late`
--

INSERT INTO `late` (`id`, `payrollidd`, `late`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '57486', '57486', '2025-10-16 14:33:21', '2025-10-16 14:33:21', NULL),
(2, 3, '57486', '57486', '2025-10-16 15:03:12', '2025-10-16 15:03:12', NULL),
(4, 5, '43', '0', '2025-11-17 14:43:04', '2025-11-17 14:43:04', NULL),
(5, 6, '43', '26.875', '2025-11-17 14:46:47', '2025-11-17 14:46:47', NULL),
(6, 1, '43', '26.875', '2025-11-17 15:11:46', '2025-11-17 15:11:46', NULL),
(7, 1, '43', '26.875', '2025-11-17 15:24:30', '2025-11-17 15:24:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` int(10) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `recorded_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `start_date`, `end_date`, `total_days`, `reason`, `recorded_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, '2025-11-06', '2025-11-06', 1, 'Sakit Tiyan', 1, '2025-11-27 14:32:47', '2025-11-27 14:32:47', NULL),
(3, 3, '2025-11-28', '2025-11-28', 1, 'Personal', 1, '2025-11-27 14:39:10', '2025-11-27 14:39:10', NULL),
(4, 3, '2025-12-04', '2025-12-05', 2, 'sick leave', 1, '2025-12-03 20:14:11', '2025-12-03 20:14:11', NULL);

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_deduction`
--

CREATE TABLE `payroll_deduction` (
  `id` int(11) NOT NULL,
  `users_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll_deduction`
--

INSERT INTO `payroll_deduction` (`id`, `users_id`, `description`, `amount`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Pag-Ibig', '400.00', 'active', '2025-10-04 03:57:14', NULL, NULL),
(2, '1', 'SSS', '200.00', 'active', '2025-10-06 13:35:44', NULL, NULL),
(3, '1', 'Philhealth', '500', 'active', '2025-10-06 14:21:58', '2025-10-06 14:21:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_earnings`
--

CREATE TABLE `payroll_earnings` (
  `id` int(11) NOT NULL,
  `users_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_id` bigint(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `nature` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `user_id`, `position`, `job`, `salary`, `nature`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'staff', 'printer', '300', 'day', 'active', '2025-10-07 13:06:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `process_payroll`
--

CREATE TABLE `process_payroll` (
  `id` bigint(20) NOT NULL,
  `empid` int(10) NOT NULL,
  `period` varchar(255) NOT NULL,
  `partial` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `process_payroll`
--

INSERT INTO `process_payroll` (`id`, `empid`, `period`, `partial`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2025-10-31 - 2025-11-07', '1800', '2025-11-17 15:24:29', '2025-11-17 15:24:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp_id`, `position_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '2025-10-07 13:47:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('02nL10Zfeg0JyaThjgLofWS7NUvx2EVIl2MYOBJL', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDNYUEI1eTdMVU1CVHhISDFTUFJYdmpPQ2I4UkliYUZUVlVjcHRwUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vd3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819679),
('04Rr4l71XRaqyqZiiK6UwmqmsTv6Ae7o4UzN3grj', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZU5zNXJMRXFEVHRUQ3pCUkwxelM1MDZPUllZOUNjUGl6T2s4cWxUbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLnRyYXZpcy55bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819647),
('0WFhb8b6LskzIO2Izg2PgfEgXnKTxuCK7PC5CuXR', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2Z5aEpaWjdQZUpMbnlvRnkwOXNYNlVyTFVoVGxkbkxUZHpwWWRMYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYXBwc2V0dGluZ3MuUHJvZHVjdGlvbi5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819605),
('1qLEO2qcU5Yo8HAloX12mip7ryFG5P5qgWh81GFv', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2pkQ1FWbVBpeXFVMXVOWGJheDlsZG5zMTBuQUNaMzI3ZGY5cFR2NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZ3JhcGhxbC5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819676),
('1wfXGMEWuE0YVLZIwRys6OLr7c7xFKKzQDnNMjg5', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUU5bGV0ZGFoMVJNU3dyZWh4bktkN1U2N1hoQTV6Tk5KSG9OSWYyTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819551),
('4fGID66pACnXZW5w0Zzd3XcXz4qRAkq6ANaS4WLe', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFp5bkQxUTMwdjhnY2ZwZU1IbHo3bWN0YTRjYzdhYlZYZ3NSOVJLaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZW52aXJvbm1lbnQucHJvZC50cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819666),
('4VYy6Kk4mhx4yZKVNjbSTWlpUwpWp1F8vo7Cq9UI', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczI4UEdabTdRWE9KSHdPeHdBRWZIYldCeE9wZlJjbEFJWGhMR05NdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vbmV4dC5jb25maWcubWpzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819660),
('5iFLNMb7YjozX2uflZElUyybf4YmGdrQc6Dymz8M', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVhQeDNOSk5jRk5tQktzaTJKc1R4NDlwZkhTNHVwQXhscmRXdDkyeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYXBwbGljYXRpb24ueW1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819600),
('5t5vakKlshfz8msWcqXSIZsRUToLkVRgUnrngnwK', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjhBVDdOYjFoUHN0cDJZVVVkaDBhVTlnUkFJUWV5U09IcFFONkZ1SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vbG9ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819628),
('6pkD1Q0NJipAxz3uWH445evnxM2T1mkn2dqfVvqZ', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUhMNFVhalE1bmhhMjRvSkJLWk1ic2xMNDJUTDlRMHB5cHZWVFFYSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vcmVxdWlyZW1lbnRzLnR4dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819714),
('6tKK3WN5pd3EibX1DmtgMHnDahwnq5ZpdXiwngdR', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjhXVlB2aDZuRTJ4N0JXV040b3hnS0N6cDVJRmFVUWFYODBTN2F2biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYXBwbGljYXRpb24uanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819575),
('6YgHEcjMwO4Uwc4dK8X4enKIbS243ubpNsBYehZP', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWxBMzVaOFNBdkFlRFQyNEVxVkJzTHRkT0dHZnM0VWZYSHVya0phdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZ3FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819677),
('716xjd6mXcTvvhPma0WWA4Kg41OigTAemaCuD2Wi', NULL, '2a02:4780:2c:3::2', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVXZpODl4alZldzBoZ0d3bTNaWkZMUkExNldSRURjZVQ1RkFLOXNzZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766896447),
('7weF63FTWgZ7BKm9LgIMaJoZmXk8MCTB1565CW0n', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmlGbEpUR0t6ZDIyT2NCT2w0YkZPZW8yU2tXZEdSRHBBOWxza2IxeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vcG9tLnhtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819711),
('7ykHiU2ShVkNTjV1jv0uYuc7SbyfCks3OrTlK0Ga', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXRwZW4zd1ZhUDdmaGhqZXFGYlJLMFhvSk1YRHhYbXFqY0F1ZExWQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vdGVtcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819692),
('8EQbu5AR1lgv5mCCL5caBlGuNfmQQdAb0fanGxin', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEY5V2tLSTZST0dCck5QREVWVHBNUFNCMG9CSzRWdUVycnRtUzJyQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYnVpbGQuZ3JhZGxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819712),
('8SaNmyWLOlmzJBOzO7QU4IN8tgnM77AuovIjD7xX', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVB2Y2xhUmdTM05KTXY4NFdYbm1OMk5JZWJzZ2JlZEJZNTdJblpCUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZHVtcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819622),
('8wxsIHW4HuIrdsk6pNRlRVccaRMtw15I8toCf0sv', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGI4Z2F5SkhsdmxXREhLOGl0cHZEeXhBOXgwSzVodXBGc3doQW11ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYXBwc2V0dGluZ3MuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819574),
('8yGrB7pJ6R9rRq2xQaOaGrLq0fQI1GaR6sITG6Af', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3ZyVzBHekwwamtMZ3REMU9nMjBZN3dhQlN4ZWdVWTRIdE1yU3dBVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZmlsZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819695),
('9GQTC04mc9BsBLTa4H9UcYH9ly5G4podZsF6C0iX', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2JhbjVOY05udGlxMzdobHQxRzRXbkRJVGY2eDg5NktYelBNUndOaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uZmlnLmpzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819576),
('9Molk1PfXp90U2NTkTRZ4aKwLWJeRSdprQ9Eei87', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVpTVUljdHAyVUVaZnlubnlkVXdZVzNXcDhoTEs2amg1aWs0V0hxOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uZmlnLmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819566),
('a4trpTYbYpEA5qT8ttiQA64BcYxbMaFrL4JSwqeq', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickdrSXA5M0hKMW1GMklGWlRIa0o4WnZrbWt3UkpvdDhvSUEzbUZGRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYnVpbGQuZ3JhZGxlLmt0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819713),
('Aa0hbhDAFy2OFnTZGmEcQhmEVvern7UxsKfdUPCL', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmVLaENpWXZXM0xKbWI5Y3ZQUWJiYnJEaFByNlZpUXhXcEFQRG9iNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZGIucGhwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819591),
('aE4x1Raws5XJpEqJqcNRX1PIFYr4xJDIvZyVAL91', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHNSWEZ1emhpRUd6eUJUWmZ2a1l1cmlrRnFDbTNFRTJRTGwxQmhnRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZGVidWcubG9nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819629),
('AFyI9i5GNcLessMayAe0R8yjFoH9pYCv1GZpCcwE', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXQ1MExpRmdkVVpKcW9uNXFHR3BBRldQQnl5Zk9JaUduMG9Bek1GNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZG9ja2VyLWNvbXBvc2UueWFtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819641),
('AgN75TbTTZVszu0MOKRh1iQ3t5SwSrRrkYcN6Arv', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWExZdm1rc1pLdnh1NEFwME5ib05Md3R2dWk3ZjVqQXFwalB5TFRJQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLnB5dGhvbi1jcmVkZW50aWFscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819595),
('aHss2DNBwwQO6Go5v2kUUiOqnQeMbKJtLvMp8A2C', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2xDOERHMkZYV1F4WGtqbGdoaHNTSENNOElsMjAwcXc5bzBYUjZuNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vbWVkaWEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819696),
('AHUW9VIquOlnGrUjAimbBbJKiToqIGRCbPUZa1nf', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnpkZzdZdTJLM3hQMVV3Mk1WdmhLNjFLY296YnE3ZHNTNXZWN0p6MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vQ0hBTkdFTE9HLm1kIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819707),
('Az94NdskRHaqwRjdxNcQklJI4NAR2HnmLF8gKA2W', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHdMVW1rRjdDbGV4RFdmSjdQWFdwdkZNQlJId09oeG9NV3AwWVNUSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYW5ndWxhci5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819665),
('B8xWCPDzvFyqyOXu1ERLhouyxLEQONzsuNNsDT8e', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUs1akRCZ0s0eVA4WWNlNWcwZ0NHcTZhUUxlbHZITHRhb0tBb3ZjQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vcHJvbWV0aGV1cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819688),
('BFaZJHFzo3chIpOJTFsiPRaCIAUGQviuDmZZrZnO', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUI5eU9sY3VscDRlRzBobFl6U1BNM0xRWmpGbURqbG5kb2pBakhpQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZ3JhcGhxbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819675),
('BPHlN1CdBZmeQrAADLWpX8gbvc3UtrfQJavsycqZ', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVhvUlFMQ1k5N0duWnNSa0x1UG5PRENMaVA2VmNRVjJPbGVlMkVkZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYmFja3VwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819620),
('cJHtsDAXEwiPTIzqw264dsgXqO0jnRm22LshtLAW', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDFlcFJQMFloR25TY2FmckZsNjViSVNkeUNNc25XZm1weWxFcXd3ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZW52aXJvbm1lbnQudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819665),
('cNEKy42amYDy6QHBbvEGRgGV9O9TLZDG6b7ioOVA', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1A1VVoyUFdacmQ1cENUTUxMTmVab0tBU1lDV3VRa1NCSDZ6NWpyWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2VydmVybGVzcy55bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819649),
('D4xTznaSLPkoiwzWW3fV0vZvEgw3zOiKNL9TVbxT', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFRNSTJtSzZQNnZpcFlmNXgwQjRoVlg4enFTb21VckcyVGdlVXZWdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vbmV4dC5jb25maWcuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819659),
('D7SCN5VmnLT6kM4A4mgWhtaZ5pffDWbiRd5CFXgN', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNlpxMkJCSzBZSU96QzI4Mmt6dzB0eDBWWkxDYURhVzFDVHNmTUtCayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vdG1wIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819691),
('DJu8X9dTcK9gmIcmjgTSP7Dhiia3GRBp3OCNvYmy', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVBPQ2hZMjlSdE40Njltcm1UYTVCQ1dzN21JSDlGWnNnWWNodVBhNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vd3NzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819680),
('DU8zvCKWk4LK7uoIRjuIS16buo1btWM2jCuWzrdt', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1dHczc1b21TVnAxMHdxWUJzc2t3Zll5aVhwblpSSnF0bXp0Wll3WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY2VydC5wZW0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819658),
('edTqOwxYgILxDY4P3bBDTTbGc76LtLBDsQ0E4pll', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielFhWGphOXRuc01KOUxiaVlYcFgyMzdBY1FCZ2NxWWY5OTM4WTJSMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZG9ja2VyLWNvbXBvc2UueW1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819640),
('Ey42OZKVnyOZpMYiEvTUkCHpck6ync9kwEhoSvP9', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1o2NlloSXVpMlM3VVp2SXJZTlNvYzNtVjVZMW1WN1JlSkVDanVWciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYXNzZXRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819671),
('gkepXaonZkrUBqkbEHvvZkLs5Xk8UWkKMUI9vSpJ', NULL, '54.216.10.148', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREFzVTRLaURLVURaNXRKNXN4cWxTZWFEZmlWS2xCcWVSbFJ4UDdleSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767401942),
('HGl5JZU41KN1O8ghF3kbNDwhaSrPs0aHXzQhnSeX', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibG5kcXgwY05hanl0S2p3bEt3ZzNENEN3WkRvOGJ2SGk2ekJiUHk0ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vaGVhbHRoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819685),
('HLEDK8hXr4O9jqsypZ8G4gnokEgVi8YqCcKlBNuJ', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekxrYzZQTEtmR3kwSmJEcTNQY0xDMUNLOG8yQnQ0WEltZW1vRm1yOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjM6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYXBwc2V0dGluZ3MuRGV2ZWxvcG1lbnQuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819604),
('HwWp3jObbtc9xQowuDlSQQbP6r8LYz5trnLcAdTi', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVp3Zk11cVVaS25LRUI2ZFRwWFVqMlVlQmJzdk1sTkZyWTlkNHZPNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vTElDRU5TRSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819708),
('hY20MyA0yfkdqGFO6NhQD0nvtRyq2zIVriWIBOGC', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMm8xeWlZbVVkbEJlcjVPOE5YREhISmlFbmtrUkV2b1lZUzA4VDR5NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2V0dGluZ3MuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819580),
('IdJrnbxOQX4UhxoTf2wkJ6am5cXtH3m6dzaeybyb', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1BhbVk1ZVhhZmdJTk1kWmsxTWRSSnV0cnZXeHc0Y2gwTFJtUFdKNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYmFja3VwcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819621),
('ig8sXmpvahqZ3nx6bYcSaIKjbhbJ0pvN5YDbQcJQ', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUczM3lKY2MxMXh5bzlLYzdDYnhKS2x6d3pONVk4R2dkb2YyTUtjNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uZmlnLnB5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819592),
('IMLUJdowuH4DWMXEAi8V6jq0vSrbOUPVLnuhU0ib', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUVoSHA1N1lrZ01sbmhtbnBvcjBjanVLcEE0ZFZJNmc4MnltcjRFbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2V0dGluZ3MucHkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819593),
('iyFf4a0FdAjwNY98zDi0ZYY6nPfsuAuDs4rnS9Qw', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidlI4T3VFQnozdFlyaE1jb3B5Y2ZtcDFzRTZhR3FJbWhBcVpXRXJSViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLmVudi5sb2NhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819554),
('JL6lITOLtIG80qJ4TI9Sc6Ft7776s3oF03yQZiZB', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibktaWnFERVZqWHk2Tk5oem1nS0l1M1VlTXg5Uk5CbzhGR29RYmZyVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uZmlndXJhdGlvbi5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819570),
('jLzQYiF2ZGo4106z8UmPI5RuH3qL97QsfVnttKkl', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYk50NG1oREpRbGE0blpZa1NBbmhBV0VKUEVhZzhtcGJPNWt4SGlSViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZW52LmV4YW1wbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819562),
('jphYyBploJMSu1pRxeruPr1wQhCxRG59N5y8WhqV', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianIyR2h0czdaZzVld2pGSnVTWldNOExzNk1sU25jcVQ2d2FUNDVkTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vaWRfZHNhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819653),
('Js67GzFLyUTkAleZPXsjh8ItXh7ylj7O90yT0hL2', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXZ1QXdhWkU1QnZTcWlEdjBHY1RaOEpiRmJwM3A4MnM5YmhYc2RpQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vaW1hZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819697),
('kdNMeXuT4IrklEKaUmB2v6MRlVJBsHvnmgLGw7GY', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkdyMTBTb0c1ZVdiak5PZDFJWDZydTdTc3ZnMTlSanFmN1locjJsMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY3Jvc3Nkb21haW4ueG1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819704),
('Kz7itDayqbAQj9hz57zuInPZt9BhMXjwBCmfyt49', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2x3MFB2aFFsZUV4TndtUThSdmhzVUJCNWhNV1h2b2hwTWZJWVE2TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vRG9ja2VyZmlsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819642),
('L41Q8dwoOxmY7LHppCPuyDLQ1dNzl0RsSVqZuiad', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFBZUTRPVTY2dXdSUmhZbnk0Um9pVjJaN2Z6NUN1bnFRaTJLQnFIVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vbnV4dC5jb25maWcudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819664),
('LE1sz8pPypcxfYAay1FYVHtTxraKzhiyUNvi86Jc', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDFqekhkVkVCRHFtYnhVOVNKTldwdDZTQmhpWnh5d0RodjJQcWxZRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZGF0YWJhc2UucGhwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819590),
('lN8OqdmfixFWcKOGlJ7X5AHyV3QqsG88Kq9epGoq', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFNOSHRXcGFWMURERVFkbk1FdWU4QnNtUmczeGllOFhhanFKYWtIaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYXBwbGljYXRpb24ucHJvcGVydGllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819600),
('LpaEStPLKx7YfKD5z0QbPPDGOrywUSSvkF3LQAgf', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzd0RU54bDhNM0ZRa1JCWWR0RzdvRmtuSzVKamNlMHlsOEd0b1prQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vbWV0cmljcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819687),
('LrKjqUsfDVIiHTCvhw8zJYm9pHanRSCVm8wn0MT7', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXFFMFJ4RTFkOW41MGZLQXBzYWg2ZE9EZUFnZWN1cG1uZjl5bTJaZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLmlkZWEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819632),
('m0aHoji6NiEQ4NxER8SUgK0uZKdCaUC0gYyJm0ja', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibVpSemVqeERDTkJKZ2QxeVlLejFGSHFCMmFKVjk1TjdtdHhTS1liZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYXBwbGljYXRpb24ueWFtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819601),
('Muol5xlf3zYL6EbSVpIm13rdqefMXm6gCDtirDL8', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVG42U1p0U2tPTzQwYUxYNHhqaG1hSWRNUVdveExDZEk3c1ZjY2ljaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uZmlnLnltbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819597),
('MWXwM4bxoDthyWhUOwGhYJLSWAS8hFYtnocaxbnF', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHU2OUR5UEVmRDdJRnFnVkRpdXVjemMySFRxSm1JNGJqZGF4UDBCNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20va2V5LnBlbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819659),
('nax4M3WuDz0ju4ZstLHrBmTgQCJR95w5YhmkBfVs', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjZTbENVcklNZlRvU0ZrRUVTOXdVRWJPSVltMm0wQ2VrUFNzdWZlWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uZmlnLnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819585),
('nE6YRj7wfOzWNGW4OogFxhKhdf9a740Kne6Kv18d', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1JIc21VWXpvSTJMODdLZ0lvakFtcUVkTGlRMGRod0VJYXhpTmNEeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY3JlZGVudGlhbHMucHkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819594),
('nF9jfP4SJbq4hws7PSJAB6zyxIFdaJjJAQSOQ7dU', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0hmNHRteVNpWjZvR0JUcXdyYkF4VTlUV2tpYUhTVjhRalZLUkpHTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vdGVycmFmb3JtLnRmdmFycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819651),
('nhANILBAxLCQJvbQbSqXDpW09j1HsLBROCk4M1bT', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidFVqMHN0R1RsTWtJMmFkVlkyTlY5QnFVMWJLYUpMTXc1UmliT3JqSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2l0ZW1hcC54bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819700),
('nhGVGLubfsVwmbBB1vS8ztR0qPzCH76fOyT7bWt3', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlRGTmg0QzZTNkEwejNOYkd2RXhxS1lkQm5zT0xnYTI0Z2pGRElvWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vamVua2luc2ZpbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819646),
('NLGruuYGuM6DbEJdgknhmbyLy7MmdBytS5HtObju', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWlQY2cwTk81MHdWZWMxZ283VU1qZUljRm5jMkNSVG84djJHWnpCVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vbG9nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819627),
('nuDXQG8EjAjhG8SQzElKV0L1RWzqT1FhD9eyWqHf', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWsyNkp2SGd2Zk4xTWF1bERJTFM4bjJEdzAxYldmUXpLQTl1OThHRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLnByb2plY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819638),
('Od7ShuUStFqrC4R4H5czt33lZAZTiQNyCZBfv3GD', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXUxaXNzNkZYRmIyclVlRWRkNkd0cW5RWFc3aTMxTzltaWxBb1VYbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZGF0YWJhc2Uuc3FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819624),
('oYfSPiZbYxzZuAwcaDjXCDD0iMQuZGgU9gaL8ltS', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSk1tTnRuNkI4SnFlcWRiam5pOERKWkJzemtpS1lCbjhaOUNoYjZoNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uZmlnLnBocCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819588),
('P7TTnXm9X2jrrHTyBo8Q128RJMtRz62niLm0g8jy', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSElGVWdOOEZuRE5oZW1nY2JZdk5TZmpFYTVlRERDWHFObDV2RVd4YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2VjcmV0cy5weSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819596),
('PaY55pjNb3aS607rSC4atlQ2YIXEFP1OpN4E5xLq', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0k1TWl5THd0alNiWXNQNE16c2k1OWJ3ZnBPRWJzY2Q1V3dtUnduSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLmNsYXNzcGF0aCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819639),
('PBK7aCUn17fn249RLX6QvmP7tRUf0BykI0yhoEm3', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGRZWldyVTZBMjV5a2RMN0NrY2hmd3pLa1VQbGZRZFNXZ3ZpbU4zUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLmVudi5wcm9kdWN0aW9uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819555),
('pDgoxjd0xP2crz53DD69WkZujckRw308tqcCqeAO', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1VvZWttRmRRRFRuSmF6c2M3R0RCeUJ4ZHV5WUdTczFUaW44RHpSaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYmFja3VwLnNxbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819625),
('plZJprwfgqNhoYOimkH5PQRgviPBi1AcqmWtQwyX', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2oxVDlMdldHUldFOW1RVngwTkswZUtwYWNER3Vxdmg2Njc1UkM5YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vcGhwbXlhZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819619),
('PpfrY90b3XhuMkhhcSaEOKOyChKm36tqJY8gCwTK', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiek4wY3hRbjBnbDdZU2ZZMkEwT0FZN2hSMmp4TFdtSHBEY3h0NmpSYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2V0dGluZ3MucGhwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819590),
('pZ34AN6wxq2XkLyDMnEOYN6feyDJOUl32eghyDCY', NULL, '158.62.79.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXNSclRwaFdReHIxdTdkQmUxa2FyaU96eHZaM21WS1o1VnZTYWdEbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767404713),
('qPHgs5wngdA8hwgwhLtAqmj7SUHBABSvmbobM7B7', NULL, '2a02:4780:2c:3::2', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiN0VFRjRTTlM0bGpxV0U3dXNCdjlZZnBmOFN2YUFXUm83VERTVzVINiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766973189),
('QUCLQlL2IyOfUJk1RVXtvPALiNIRIZVAdLrncNgE', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0IzaVlGc2tDYWMyZXBsdHgyYXlwbUdWbUZvOW5maU5DUFVpY05wQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYm9vdHN0cmFwLnltbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819602),
('rawsFGLUL2niOmgW6efAmqolJWmoDf90EhfqNAcQ', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaW1aSldtYnd6b3RxNnpOV0ltbVZWM2RBb1VjMEFycVU5RE1QSG5mUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vd2ViLmNvbmZpZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819603),
('RkwX4XBr8Dp6IoGdCFYl94YNAkNmFEEwAnX5zICa', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnUyT1NFeWtYejJaRWRYYUNZaXdMQmFMcjRIS0JMY3IwbU9kRWFtOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819673),
('rPUObrZEutwocNHznDDQJchGlXERaZiRrsQxLCO0', NULL, '2a02:4780:2c:3::2', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSER3V1FtcnQ4RzhPSDJQWnJOVkpzWUVraHdvazE0WFE1VEhwaENGVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766824393),
('rqvYFQq3hsPwUgsHZy56YQPeylyZmpMw5bGNlogA', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTc0VTNZMEF3WUVuWmNKaHVIb0RxWmdzRTl4ZkdXdGpFTzZFYmlQUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vYWRtaW5lci5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819618),
('SI9sv6ByKObuN09cs7mzkna5Vdlv5eaw66ZHyrZc', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFZMRDhNUzVSWTQwcVVOeWFJaTExaW0zaHZsZ2QwUW1jQ1phV3lIdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY2xpZW50YWNjZXNzcG9saWN5LnhtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819705),
('SU1kpB7sAk34HtErmwC1eRT7PAfDrft1vZRBe0gQ', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUzBzTDVabjBSeGRmWWpMTHhjTXV0VlNPN3NEQWVBUVhJMGUwRnhobCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY2lyY2xlLnltbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819648),
('Sui7SnRyLk6ldMn73XQhhJc7MRMG4CelemOkgd93', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWxXYWtkbFJmY2NIMXBlRzRybXhCd3IxdnhuOUoyakVCRlRKbHdZRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLnZzY29kZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819636),
('sXbVemt1eYA0nlqz6dQTquiaWmZjTzKSSJcEP2HM', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicThkdFRWQTdZeTgwemRjRXNuYlRwY1BuTUkwYkRNVWhxT1VYRXI5aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc3RhdHVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819686),
('T6V7cKyEDU7gzN0uJuPLWKSazNcrEARz5kRhqfKa', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1dEMVVadXJyck9ZY0FIYlZwWVhFQ0I3NHVhSmFiQWdxTFl6ZjdOMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vaWRfcnNhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819652),
('tA6ZlpIatIgV8dgdVgSMimQXTmTUeMyilBZNf9rt', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTENkbGprUVJheTBVSnM0TjlYeXMwVDBoQWNJWG1ZNjRwbHQwUlQxVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vcHVibGljLmtleSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819657),
('tSkzFlaw0uVCx753YnMyRqyPjNF1Sx0QqL5we5Ao', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidklTU2Y2T04zZ0F5dGxodUY0QjlOTm9PdkRpTHJJTjQ1OVpsenV1YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc29ja2pzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819683),
('tUsOc8btl6R0EDQH8ra1dMLuF1zoK9o0ozHlCULc', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialBoNUpoUzZEZ1E5ODZEaXRwRU5MdTJraHVCZ2RBczJ2WHdZc3VXViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2V0dGluZ3MuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819571),
('tWkxB1p8uxBoPAe276D1qTSSDdSda5dr2W7uTZYi', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFI3Vng1VUJpMXhFdElUU0Q4TUN6Nk9hSTBwWk1wNkJoTTVVRmZpRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZXJyb3IubG9nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819630),
('ueUwWSwIS9HwqqaFjk64ZlnvO5qVCY3STMPsdn4n', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFNEbWtNaUJ4T3cxWVl3SlllRmQxZnlaQ200dlJBVWE1dWRzRGxqeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY2FjaGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819690),
('Uw60s0LhbP9X7se0g8Ar7RzZ488XJY6AMRmhdUxR', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzRlNWdqV0lQbFRFdDk3N0V3NmlGT0hGUzd0MG82NXJGOHQ2NEJGYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vcHJpdmF0ZS5rZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819656),
('V3JS1d8413oze0qrcRrp84WxCjtUhgUjmmV5imqL', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUNtSTVxR0tWa2FoSldSM3Q4RzQ4ZkFTT09kZm5NNFJ4aXJmNzY1SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZG9ja2VyLWNvbXBvc2Uub3ZlcnJpZGUueW1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819643),
('vIbiI1Kvv209EzuXFCjYfTBKJca3KHECNVsSA2Ga', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTE51ZXdkMDZKbUZRaVlldlVpVzRWbDF0eERyTzNnZnV5Q08yTWhYMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLmdpdGxhYi1jaS55bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819645),
('VR7qRY5nzZbumGd9GkGh7UvXYVFugAtDOQszUPcN', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlc3bjFRVk1OcmIxV1pFdVpaNmlKZ1ZjN3dKZVV4R2ZZaVR6WkVKaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2VydmVybGVzcy55YW1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819650),
('VuEhQHFM7G8szVKoxEXRochGgoxRyN8o9cSsoRXe', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGZyQjZOWkhaSGJqcEh6Mmg0ZEZOQWhxSE9abTdZb1FGelNkWmhVbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc29ja2V0LmlvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819681),
('wGDQaL5XwhAjUsGuTENKORsnkDzM3PyfP1seAHZg', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVFvdFdLU3B5ck96eGhDNG0wbTVkM0dZVzVuaEx0ajVlVk04aGRrUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uZmlndXJhdGlvbi5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819589),
('WOaWxIu5K3O7S6sbBpNflSEHAWWyDGujWocd8Dgj', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNG9uRUU0OUE5Ykl4bVYyWHpBWlRkajQ2WWk0bklycnAxWjdEY3ZEUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZHVtcC5zcWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819626);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Wxcyc9qtueKDIInwFBjLcsDOJJhJeq0VH8RmmjxD', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGFWNzBHenFWbFFSNXphb0JMUmwxV1RmdXZQdzVaRmFGb3pMUDV1OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vbnV4dC5jb25maWcuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819663),
('wxzb0WmxBO9Gomi0Q7Cf7w5pErUmo1r91FnqD24i', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFdkNmVXQ1VjaXNxVU1yREUyVEJVeDZRVUVzbzRSc1RYeGJGQ2dxciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vY29uc3RhbnRzLmpzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819582),
('x9fAnMwCB1GmRhzSxph2dumol0ZhcYNr6fONqFGz', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1RxeFFZNFJSdzQyN0JlMGRQYVBXSnBXWENtWlZIWlRjMWVUekNTbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vZG9ja2VyZmlsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819642),
('xRw85bpB5TLAo14uyNdW501QjM7FHo2GeHt8lpSV', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTFaUkFXWVFBT1JyTGE5Z3Y3MklMYnJjVVFpRkYyNUJRRGcxRGo0ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vdGVycmFmb3JtLnRmc3RhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819651),
('y1FFf8BmkWINThoVGqJOBQLnrCukRoAAY5Yzv1jY', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDNvbTZCMVM4em5aaGRHYXdYaXNJVHkwQk9QdVlNV0QyREtydThjViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLmVudi5kZXZlbG9wbWVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766819555),
('ypY4KBQzBa3xfrKq1WpQJ1P8jIgIA3usU1FTwVrM', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFWYkFCeHRLUnVqMUh5YW00RlhEQzkxZFFVTnNNRk9yYmtBRmlsSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vLmVudi5zYW1wbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819561),
('YReLcp0vEwIAsRVQzI6GzliOGeDrvr8rbpg3YRDo', NULL, '2a02:4780:2c:3::2', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQjYwdklWMHFGdGJBVFFrS2FCSGVib25IR21YZnRYaGh5VWRlazB5UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767346737),
('yxvqC8kBRS551ebvSop5jUqKtfT9kaaJdV4VyeXg', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGd3cElXQktXVzNFUWliOEZsZllIa2NOSENCazY0bEdIdFFQMHlLOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2VjcmV0cy55bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819599),
('yYEE0gLrA9oyNgkOk8VMwwof1345LPM3yXCpfI63', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWko3dTBnTWFHSnBoSjlnRFF1Q0djR1lMWldpOVZsZks3WXB3N1FlSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc2l0ZW1hcC50eHQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766819701),
('zAj1NFHDYkh0waQgohCSBIERXiQLN0vfz2sX8Wyx', NULL, '2a02:8440:f504:65d:40cf:2bfc:c39c:2568', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGVLYVNpbFlKV0VvSzIzSlJGNG4wQkZhQTJJenhCaFJwUTJLQlc0SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vYmFjYWNhLmNvZGVnb3NvbHV0aW9ucy5jb20vc3FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766819623);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `module_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `key`, `value`, `type`, `module_id`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sidebar_logo', 'C:\\fakepath\\482349334_1157297672764892_1296471932904069408_n-modified.png', 'image', '1', 'rtgvvfgvfvd', 'active', '2025-09-08 04:59:11', '2025-11-22 09:47:51', NULL),
(2, 'sidebar_text_logo', 'Bacaca PrintShop', 'text', '2', 'fdcvdf', 'active', '2025-09-08 04:59:11', '2025-10-01 17:07:23', NULL),
(3, 'login_center_logo', 'system_settings/1759338694_482349334_1157297672764892_1296471932904069408_n-modified.png', 'image', '3', 'bfgdbfgvbfg', 'active', '2025-09-08 04:59:11', '2025-10-01 17:11:34', NULL),
(4, 'login_top_text', 'Bacaca PrintShop & Corp.', 'text', '4', 'vfgvfdvdf', 'active', '2025-09-08 05:32:22', '2025-10-01 17:11:19', NULL),
(5, 'login_center_text', 'Bacaca PrintShop & Corp.', 'text', '5', 'vdfvfvdf', 'active', '2025-09-08 04:59:11', '2025-10-01 17:06:27', NULL),
(6, 'login_top_logo', 'system_settings/1759338395_482349334_1157297672764892_1296471932904069408_n-modified.png', 'image', '6', '', 'active', '2025-09-08 04:59:11', '2025-10-01 17:06:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_info`
--

CREATE TABLE `tbl_employee_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `work_schedule` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date_register` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `remark` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee_info`
--

INSERT INTO `tbl_employee_info` (`id`, `firstname`, `middlename`, `lastname`, `suffix`, `dateofbirth`, `age`, `gender`, `contact_number`, `email`, `position`, `work_schedule`, `salary`, `address`, `picture`, `date_register`, `username`, `password`, `start_date`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'MIKE HOGAN', 'UNDING', 'TAJADO', 'N/A', '1994-04-02', 31, 'Male', '09262422649', 'tajadomikehogan04@gmail.com', '7', '13', 400, 'ZAMBOANGA CITY', '../uploads/employees/68259816819d5.png', '2025-05-15', 'a', 'a', '2024-09-14', NULL, '2025-11-14 05:09:57', NULL, NULL),
(4, 'MARUEL ANGELO', 'DIAZ', 'PEÑARANDA', 'N/A', '2005-12-13', 19, 'Male', '09162110970', 'ad2787274@gmail.com', '7', '13', 457, 'BAGANGA DAVAO ORIENTAL', '../uploads/employees/682599c026432.png', '2025-05-15', 'a', 'a', '2024-10-24', NULL, '2025-11-14 05:09:57', NULL, NULL),
(5, 'MARWIN', 'UNDING', 'TAJADO', 'N/A', '1999-07-05', 25, 'Male', '09059466024', 'marwintajado@holychild.edu.ph', '9', '13', 375, 'BREAD VILLAGE, BUHANGIN DAVAO CITY', '../uploads/employees/68259d7275467.png', '2025-05-15', 'a', 'a', '2024-09-02', NULL, '2025-11-14 05:09:57', NULL, NULL),
(8, 'MARY JANE', 'CAINGLES', 'RECAPLAZA', 'N/A', '1993-01-28', 32, 'Female', '09364171383', 'ncjudabal.sfgc@gmail.com', '9', '13', 510, 'SANTO TOMAS DAVAO DEL NORTE', '../uploads/employees/6825a38491b14.png', '2025-05-15', 'a', 'a', '2023-05-15', NULL, '2025-11-14 05:09:57', NULL, NULL),
(9, 'ALFIE', 'UBAY', 'TAGLE', 'N/A', '1982-07-25', 42, 'Female', '09519205927', 'ncjudabal.sfgc@gmail.com', '9', '13', 510, 'PRK SANTA TERESITA BUHANGIN DAVAO CITY', '../uploads/employees/6825a5c839b85.png', '2025-05-15', 'a', 'a', '2023-02-06', NULL, '2025-11-14 05:09:57', NULL, NULL),
(10, 'NORBEN', 'N/A', 'VIRTUCIO', 'N/A', '2006-07-25', 18, 'Male', '09094947830', 'ncjudabal.sfgc@gmail.com', '9', '13', 375, 'MANDUS LINGIG SURIGAODEL SUR', '../uploads/employees/6825a8395f0c1.png', '2025-05-15', 'a', 'a', '2025-04-07', NULL, '2025-11-14 05:09:57', NULL, NULL),
(11, 'ARJUN RAY', 'CAWAN', 'MACALANGGAN', 'N/A', '2004-10-04', 20, 'Male', '09976409491', 'ncjudabal.sfgc@gmail.com', '7', '13', 510, 'MALITA DAVAO OCCIDENTAL', '../uploads/employees/6825ab06aee18.png', '2025-05-15', 'a', 'a', '2025-05-01', NULL, '2025-11-14 05:09:57', NULL, NULL),
(13, 'RON MARK', 'ANGELES', 'NUCOS', 'N/A', '1996-05-03', 29, 'Male', '09973247076', 'nucosronmark3@gmail.com', '7', '13', 600, 'PALANCA VILLAGE MATINA DAVAO CITY', '../uploads/employees/6826824171f00.png', '2025-05-16', 'a', 'a', '2017-09-20', NULL, '2025-11-14 05:09:57', NULL, NULL),
(14, 'ALENN MIGUEL', 'TAGLE', 'LAFUENTE', 'N/A', '2007-09-29', 17, 'Male', '09953491506', 'ncjudabal.sfgc@gmail.com', '7', '13', 450, 'TALISAY BUHANGIN DAVAO CITY', '../uploads/employees/682684a59c0f8.png', '2025-05-16', 'a', 'a', '2025-04-04', NULL, '2025-11-14 05:09:57', NULL, NULL),
(15, 'GEROME', 'LIBRE', 'PATRIMONIO', 'N/A', '2009-06-16', 15, 'Male', '09554574690', 'ncjudabal.sfgc@gmail.com', '14', '13', 350, 'MAPARAT PRK 1 COMPOSTELLA DAVAO CITY', '../uploads/employees/682686637f5dc.png', '2025-05-16', 'a', 'a', '2025-04-01', NULL, '2025-11-14 05:09:57', NULL, NULL),
(16, 'ROSTIN', 'ALBOPERA', 'ANDOYO', 'N/A', '1994-12-25', 30, 'Male', '09103565125', 'andoyorostin_@gmail.com', '7', '13', 600, 'PANABO CITY', '../uploads/employees/6826881cb43a0.png', '2025-05-16', 'a', 'a', '2025-01-06', NULL, '2025-11-14 05:09:57', NULL, NULL),
(17, 'NICOLE', 'CAPILI', 'JUDABAL', 'N/A', '2001-07-02', 23, 'Female', '09536011631', 'ncjudabal.sfgc@gmail.com', '16', '13', 510, 'NO 82 MABINI EXT BLVD DAVAO CITY', '../uploads/employees/68268bac2c295.png', '2025-05-16', 'a', 'a', '2025-05-02', 'MABINI EXT. BLVD. D.C.', '2025-11-14 05:09:57', NULL, NULL),
(18, 'DANILO', 'CAARE', 'BORINAGA', 'JR', '1996-06-01', 28, 'Male', '09619098251', 'danilojrborinaga@gmail.com', '8', '13', 510, 'KM 6 BUHANGIN ROAD DAVAO CITY', '../uploads/employees/68268c666d47b.png', '2025-05-16', 'a', 'a', '2025-02-24', NULL, '2025-11-14 05:09:57', NULL, NULL),
(19, 'CEDNEY', 'JUTAN', 'MALCAMPO', 'N/A', '2003-09-27', 21, 'Male', '09532845731', 'ncjudabal.sfgc@gmail.com', '9', '13', 400, 'TALAGUTON HIGHWAY UNO MALITA DAVAO OCCIEDENTAL', '../uploads/employees/68268d3f8f1ac.png', '2025-05-16', 'a', 'a', NULL, NULL, '2025-11-14 05:09:57', NULL, NULL),
(20, 'LENITA', 'GANTUANGCO', 'PIZON', 'N/A', '1971-10-08', 53, 'Female', '09489670166', 'gantuangcoleni@gmail.com', '8', '13', 510, 'PANABO CITY', '../uploads/employees/68268fe8b590e.png', '2025-05-16', 'a', 'a', '2024-08-01', NULL, '2025-11-14 05:09:57', NULL, NULL),
(21, 'JACKYLYN', 'PASAQUIAN', 'COQUILLA', 'N/A', '1997-08-18', 27, 'Female', '09635884802', 'jackycoqlla@gmail.com', '12', '13', 510, 'TAGUM CITY', '../uploads/employees/68269158b72d9.png', '2025-05-16', 'a', 'a', '2024-12-03', NULL, '2025-11-14 05:09:57', NULL, NULL),
(22, 'JEZIEL MAE', 'GUARDIARIO', 'JAMON', 'N/A', '2007-02-08', 18, 'Female', '09911443141', 'jezieljamon@gmail.com', '12', '13', 350, 'PRK 6 PAG ASA SALVACION STO TOMAS DAVAO DEL NORTE', '../uploads/employees/6826938d3d0cb.png', '2025-05-16', 'a', 'a', '2025-04-23', NULL, '2025-11-14 05:09:57', NULL, NULL),
(23, 'DIOGENES', 'PALOMA', 'FORMENTERA', 'N/A', '1997-04-06', 28, 'Male', '09678527047', 'dioformentera06@gmail.com', '12', '14', 510, 'PRK 5 UPPER LACSON CALINAN DAVAO CITY', '../uploads/employees/68269508b898e.png', '2025-05-16', 'a', 'a', '2025-05-15', NULL, '2025-11-14 05:09:57', NULL, NULL),
(24, 'GERALD', 'SALILAN', 'BUANTE', 'N/A', '2007-04-29', 18, 'Male', '09631802850', 'geraldbuante35@gmail.com', '10', '13', 450, 'BOLTON EXTENSION P. NINTE STREET DAVAO CITY', '../uploads/employees/6826963aa3f9a.png', '2025-05-16', 'a', 'a', '2025-04-07', NULL, '2025-11-14 05:09:57', NULL, NULL),
(25, 'MICHEAL', 'UNDING', 'TAJADO', 'N/A', '1988-10-29', 36, 'Male', '09553700130', 'ermiketajado@gail.com', '13', '13', 500, 'BREAD VILLAGE CRINCKLES STREET BUHANGIN DAVAO CITY', '../uploads/employees/6826ac83a4ea1.png', '2025-05-16', 'a', 'a', '2024-09-02', NULL, '2025-11-14 05:09:57', NULL, NULL),
(26, 'JAMES LLOYD', 'OPADA', 'PAGULA', 'N/A', '1993-04-20', 32, 'Male', '09684671093', 'mjamixonthe@gmail.com', '11', '13', 510, 'DOÑA PILAR PHASE 7 DAISY STREET SASA DAVAO CITY', '../uploads/employees/6826b5cfba240.png', '2025-05-16', 'a', 'a', '2024-06-01', NULL, '2025-11-14 05:09:57', NULL, NULL),
(27, 'Kelly', 'Sade Jacobs', 'Copeland', 'Saepe perspiciatis ', '1987-11-08', 70, 'Male', '422', 'dixotusehe@mailinator.com', '7', '13', 33, 'Corporis labore ex q', NULL, '2025-05-23', 'bototahu', 'Pa$$w0rd!', '1985-12-29', 'Ratione et porro duc', '2025-11-14 05:09:57', NULL, NULL),
(28, 'JADE', 'URTEZUELA', 'BAJENTING', 'N/A', '2004-03-02', 21, 'Male', '09489670166', 'CABELIDAGERALDINE1@GMAIL.COM', '14', '13', 38, 'Esse sint est aliqu', '../uploads/employees/6833c94b1e85b.png', '2025-05-23', 'mujih', 'Pa$$w0rd!', '2025-01-04', 'SANTA JOSEFA AGUSAN DEL SUR', '2025-11-14 05:09:57', NULL, NULL),
(29, 'John Lloyd', 'Olbes', 'Alteza', 'N/A', '2005-01-08', 20, 'Male', '09855307948', 'jljohn685@gmail.com', '14', '13', 350, 'TRENTO AGUSAN DEL SUR', '../uploads/employees/6833cb21d6741.png', '2025-05-26', 'a', 'a', '2025-05-14', '', '2025-11-14 05:09:57', NULL, NULL),
(30, 'JEFFREY', 'ANCERO ', 'ALTIZA', 'N/A', '1999-10-27', 25, 'Male', '09304147778', 'JEFFREYALTIZA@16GMAIL.COM', '7', '13', 510, 'PRK 1 CADENA DE AMOR CROSSING CUEVAS TRENTO AGUSAN DEL SUR', '../uploads/employees/6833cf287a91c.png', '2025-05-26', 'a', 'a', '2025-01-06', '', '2025-11-14 05:09:57', NULL, NULL),
(31, 'WALTER', 'CAÑO', 'PANCHO', 'N/A', '2003-06-30', 21, 'Male', '09165136541', 'walterpancho0908@gmail.com', '10', '13', 400, 'CABAYUGAN 1 DOLORES SASA DAVAO CITY', '../uploads/employees/6834239354fee.png', '2025-05-26', 'a', 'a', '2025-05-21', '', '2025-11-14 05:09:57', NULL, NULL),
(32, 'ALEXA NADINE', 'TAGLE', 'LAFUENTE', 'N/A', '2006-08-11', 18, 'Female', '09557022087', 'lafuentealexanadine@gmail.com', '9', '13', 500, 'STA. TERESITA BUHANGIN DAVAO CITY', '../uploads/employees/684f601bad3b0.png', '2025-06-16', 'a', 'a', '2025-06-16', 'ON-CALL', '2025-11-14 05:09:57', NULL, NULL),
(33, 'JUNREY', 'COLE', 'RAMAN', 'N/A', '1987-01-23', 38, 'Male', '09162258963', 'junreyraman0123@gmail.com', '11', '13', 510, 'TALAS SULOP, DAVAO DEL SUR/ DIHO PHASE 2 CABANTIAN, DAVAO CITY', '../uploads/employees/68671c69888fe.png', '2025-07-04', 'a', 'a', '2025-07-03', '', '2025-11-14 05:09:57', NULL, NULL),
(34, 'JURITO', 'LADESMA', 'BAJA', 'N/A', '1986-06-09', 39, 'Male', '09284995722', 'juribaja99@gmail.com', '8', '13', 510, 'SAN LORENZO RUIZ BUHANGIN DAVAO CITY', '../uploads/employees/68671d9970b31.png', '2025-07-04', 'a', 'a', '2025-06-30', '', '2025-11-14 05:09:57', NULL, NULL),
(35, 'ANA MAE', 'JAVA', 'MIRANDA', 'N/A', '1997-08-16', 27, 'Female', '09759602202', 'anamaemiranda74@gmail.com', '12', '13', 510, 'STO TOMAS DAVAO DEL NORTE', '../uploads/employees/6867213b709d2.png', '2025-07-04', 'a', 'a', '2025-07-01', '', '2025-11-14 05:09:57', NULL, NULL),
(36, 'HELEN GRACE', 'ESPINOCILLA', 'CHAN', 'N/A', '1994-10-31', 30, 'Female', '09099730198', 'ncjudabal.sfgc@gmail.com', '9', '13', 375, 'PRK 7 BOLI STREET BUCANA BOULEVARD DAVAO CITY', '../uploads/employees/686723cd0ed15.png', '2025-07-04', 'a', 'a', '2025-06-03', '', '2025-11-14 05:09:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fingerprint`
--

CREATE TABLE `tbl_fingerprint` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `fingerprint_image` longblob DEFAULT NULL,
  `template` text DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(45) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `designation_id` varchar(45) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `employment_type_id` varchar(45) DEFAULT NULL,
  `is_online` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `email`, `email_verified_at`, `password`, `designation_id`, `remember_token`, `role`, `profile_image`, `status`, `employment_type_id`, `is_online`, `created_at`, `updated_at`) VALUES
(1, '5445545', 'Test User', 'test@example.com', '2025-09-04 05:51:52', '$2y$12$UAhgKL8L2kWfcFmHpIi/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq', 'csdcdsdcscds', 'auz6gpeqXvpkwD3eSGyPdOYqOVfk0iwozpw80RWwRHmzCdtxMWgk26idJczM', '0', 'profile_picture/MAO7MxsiV3iwvmskyI39gP1PvR8uYhOOzAOsILXH.jpg', 'active', 'Regular', NULL, '2025-09-04 05:51:52', '2025-09-06 05:53:24'),
(3, '4234234', 'csdcscsd', 'csdcscsd@gmail.com', '2025-09-04 05:51:52', '$2y$12$UAhgKL8L2kWfcFmHpIi/XuEZQqlT.bmMdpiW1btkmQEf13Zn1xrUq', 'wewqewqeqwe', 'w0csE5HfWVEYAKmdJYdBTOdQyFX0i3lrnuChNSGd57wYucsRxwXIQjTOl9K7', '1', 'profile_picture/3MPHlHPwKEOWO1XS4krMwziVwrLANpIfkFop94rt.jpg', 'active', 'Regular', NULL, '2025-09-06 07:04:03', '2025-09-06 07:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `work_schedule`
--

CREATE TABLE `work_schedule` (
  `id` int(11) NOT NULL,
  `users_id` varchar(45) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_schedule`
--

INSERT INTO `work_schedule` (`id`, `users_id`, `day`, `time_in`, `time_out`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'monday', '01:18:00', '02:18:00', 'active', '2025-10-01 16:18:42', '2025-10-01 17:00:37', NULL),
(2, '1', 'tuesday', '02:20:00', '04:20:00', 'inactive', '2025-10-01 16:20:48', '2025-10-01 17:00:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_logs`
--
ALTER TABLE `action_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_logs_document_type_document_id_index` (`document_type`,`document_id`),
  ADD KEY `action_logs_trackable_type_trackable_id_index` (`trackable_type`,`trackable_id`),
  ADD KEY `action_logs_user_id_index` (`user_id`),
  ADD KEY `action_logs_action_index` (`action`),
  ADD KEY `action_logs_batch_uuid_index` (`batch_uuid`),
  ADD KEY `action_logs_created_at_index` (`created_at`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `calendar_holiday`
--
ALTER TABLE `calendar_holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earnings_p`
--
ALTER TABLE `earnings_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `f_payroll`
--
ALTER TABLE `f_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `late`
--
ALTER TABLE `late`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_deduction`
--
ALTER TABLE `payroll_deduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_earnings`
--
ALTER TABLE `payroll_earnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `process_payroll`
--
ALTER TABLE `process_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fingerprint`
--
ALTER TABLE `tbl_fingerprint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_logs`
--
ALTER TABLE `action_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=794;

--
-- AUTO_INCREMENT for table `calendar_holiday`
--
ALTER TABLE `calendar_holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `earnings_p`
--
ALTER TABLE `earnings_p`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_payroll`
--
ALTER TABLE `f_payroll`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `late`
--
ALTER TABLE `late`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_deduction`
--
ALTER TABLE `payroll_deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payroll_earnings`
--
ALTER TABLE `payroll_earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `pos_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `process_payroll`
--
ALTER TABLE `process_payroll`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_fingerprint`
--
ALTER TABLE `tbl_fingerprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_schedule`
--
ALTER TABLE `work_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
