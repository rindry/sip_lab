-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sip-lab
DROP DATABASE IF EXISTS `sip-lab`;
CREATE DATABASE IF NOT EXISTS `sip-lab` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sip-lab`;

-- Dumping structure for table sip-lab.cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.cache: ~2 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-mahasiswa@lab.test|127.0.0.1', 'i:2;', 1778250431),
	('laravel-cache-mahasiswa@lab.test|127.0.0.1:timer', 'i:1778250431;', 1778250431);

-- Dumping structure for table sip-lab.cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.cache_locks: ~0 rows (approximately)

-- Dumping structure for table sip-lab.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table sip-lab.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `stock` int NOT NULL DEFAULT '0',
  `jenis_lab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('barang','bahan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'barang',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `items_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.items: ~20 rows (approximately)
INSERT INTO `items` (`id`, `code`, `name`, `description`, `stock`, `jenis_lab`, `location`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'INV-0417', 'PC Rakitan Core i5', 'Autem sed quae exercitationem voluptatum at.', 31, 'Lab Multimedia', 'Rak e-46', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:28:25'),
	(2, 'INV-4047', 'Keyboard Mechanical', 'Aspernatur sed ea doloremque provident nulla.', 23, 'Lab Multimedia', 'Rak t-74', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(3, 'INV-9439', 'Laptop Lenovo Thinkpad', 'Quo odio incidunt laudantium itaque minus qui dolorum magni.', 27, 'Lab Jaringan', 'Rak k-76', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(4, 'INV-2623', 'Mouse Logitech Wireless', 'Necessitatibus et dignissimos velit maiores ad omnis.', 15, 'Lab Jaringan', 'Rak w-57', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(5, 'INV-4006', 'PC Rakitan Core i5', 'Cumque repellendus animi et ratione eaque dicta omnis.', 19, 'Lab Jaringan', 'Rak n-72', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(6, 'INV-6553', 'Proyektor Epson', 'Quas optio ea dolorum molestiae at impedit quis.', 30, 'Lab Multimedia', 'Rak r-18', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(7, 'INV-0885', 'Proyektor Epson', 'Aut qui aut voluptatem repellendus sequi.', 48, 'Lab Multimedia', 'Rak n-72', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(8, 'INV-1747', 'Proyektor Epson', 'Hic est aspernatur mollitia in accusamus minus et.', 14, 'Lab Jaringan', 'Rak h-49', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(9, 'INV-6555', 'Router Mikrotik RB750', 'Voluptas hic possimus aut maxime qui.', 36, 'Lab Multimedia', 'Rak e-43', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(10, 'INV-8487', 'Monitor Dell 24 Inch', 'Minima culpa repellat voluptas qui est.', 38, 'Lab Komputer', 'Rak f-12', 'barang', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(11, 'MAT-1067', 'RJ45 Connector', 'Ad est eum neque neque hic.', 17, 'Gudang Bahan', 'Rak e-09', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:29:18'),
	(12, 'MAT-9619', 'Pasta Thermal', 'Sunt hic eum explicabo dolorem.', 89, 'Gudang Bahan', 'Rak v-34', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(13, 'MAT-1065', 'Tinta Printer Black', 'Ea qui et sint a.', 90, 'Gudang Bahan', 'Rak i-62', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(14, 'MAT-7723', 'Timah Solder', 'Magni totam nisi sed labore tenetur quia.', 67, 'Gudang Bahan', 'Rak l-26', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(15, 'MAT-2104', 'Tinta Printer Black', 'Neque reprehenderit itaque aut culpa.', 58, 'Gudang Bahan', 'Rak n-31', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(16, 'MAT-3469', 'Timah Solder', 'Omnis nam ipsum similique saepe voluptatem in.', 100, 'Gudang Bahan', 'Rak l-69', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(17, 'MAT-8812', 'Tinta Printer Black', 'Et fuga dolorem laboriosam labore temporibus placeat aut facilis.', 98, 'Gudang Bahan', 'Rak v-91', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(18, 'MAT-8649', 'Isolasi Listrik', 'Ab consectetur minus magnam commodi sint nihil.', 93, 'Gudang Bahan', 'Rak x-34', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(19, 'MAT-3885', 'Baterai CMOS', 'Fugit molestiae molestiae molestiae ut modi itaque unde ut.', 64, 'Gudang Bahan', 'Rak f-99', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(20, 'MAT-8244', 'Kertas A4', 'Similique quia alias et placeat aut in.', 98, 'Gudang Bahan', 'Rak g-21', 'bahan', '2026-05-08 07:25:31', '2026-05-08 07:25:31');

-- Dumping structure for table sip-lab.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.jobs: ~0 rows (approximately)

-- Dumping structure for table sip-lab.job_batches
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.job_batches: ~0 rows (approximately)

-- Dumping structure for table sip-lab.loans
DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `amount` int NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_date_actual` date DEFAULT NULL,
  `status` enum('pending','validated','approved','rejected','returned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `head_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loans_user_id_foreign` (`user_id`),
  KEY `loans_item_id_foreign` (`item_id`),
  CONSTRAINT `loans_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.loans: ~6 rows (approximately)
INSERT INTO `loans` (`id`, `user_id`, `item_id`, `amount`, `purpose`, `borrow_date`, `return_date`, `return_date_actual`, `status`, `admin_note`, `head_note`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, 11, 'sdjaisdodyao8', '2026-05-08', '2026-05-31', NULL, 'approved', NULL, NULL, '2026-05-08 07:27:26', '2026-05-08 07:28:25'),
	(2, 3, 11, 80, 'asdhashdaoi', NULL, NULL, NULL, 'approved', NULL, NULL, '2026-05-08 07:28:55', '2026-05-08 07:29:18'),
	(3, 3, 11, 2, 'praktek', NULL, NULL, NULL, 'pending', NULL, NULL, '2026-07-14 02:11:19', '2026-07-14 02:11:19'),
	(4, 3, 11, 9, 'praktek jaringan', NULL, NULL, NULL, 'rejected', NULL, 'Ditolak Kepala Lab', '2026-07-14 02:13:51', '2026-07-14 02:16:49'),
	(5, 3, 19, 5, 'Praktek', NULL, NULL, NULL, 'pending', NULL, NULL, '2026-07-14 07:10:53', '2026-07-14 07:10:53'),
	(6, 3, 20, 5, 'praktek', NULL, NULL, NULL, 'pending', NULL, NULL, '2026-07-14 07:13:57', '2026-07-14 07:13:57');

-- Dumping structure for table sip-lab.loan_details
DROP TABLE IF EXISTS `loan_details`;
CREATE TABLE IF NOT EXISTS `loan_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `loan_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `kondisi_item` enum('Baik','Rusak Ringan','Rusak Berat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Baik',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loan_details_loan_id_foreign` (`loan_id`),
  KEY `loan_details_item_id_foreign` (`item_id`),
  CONSTRAINT `loan_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `loan_details_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.loan_details: ~0 rows (approximately)

-- Dumping structure for table sip-lab.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_01_09_021546_create_items_table', 1),
	(5, '2026_01_09_021559_create_loans_table', 1),
	(6, '2026_01_09_021611_create_loan_details_table', 1);

-- Dumping structure for table sip-lab.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table sip-lab.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.sessions: ~5 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('cUVdqDlkSaMyPH0ri54lSexRqv7QLpzJwVqdQueg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHBLSzBDYU9EVlJLTG9kc3dlZjBjeFVVS3QwVXFreGJXZ3VseEl0ciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9zaXAtbGFiLnRlc3Q6ODA4MC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1785476420),
	('rZW7bUuegqQUCa93f6JLj8XmOHIRGd4uLpmYTD4e', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUWp6SFBUaTR4QWd2bW5qZGxpNGR4ODdlalVaN1lXVGRMdlJmWjRGSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9zaXAtbGFiLnRlc3Q6ODA4MC9sb2Fucy9jcmVhdGUvYmFyYW5nIjtzOjU6InJvdXRlIjtzOjE5OiJsb2Fucy5jcmVhdGUuYmFyYW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1785385590),
	('sgmjsiWU8NKYubwysJls8VfKX2mdDwGPD3LYxrSp', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZjRpVzc4U3NZRXBOSEhmWVBIU0NaZ1NXUXBQZUF1ZVZRUmR4RVViVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9zaXAtbGFiLnRlc3Q6ODA4MC9kYXNoYm9hcmQvbWFoYXNpc3dhIjtzOjU6InJvdXRlIjtzOjE5OiJkYXNoYm9hcmQubWFoYXNpc3dhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1785317583),
	('VsYrjiCCYKKCWb14VaVwVd6XoDOOFQD0rtoe7mdA', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNVdXNUNuQ0plU05KZ0lEdWNvSWJKSGtvQU1idjVNWWt6MFRuZFJ3ZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9zaXAtbGFiLnRlc3Q6ODA4MC9sb2Fucy9jcmVhdGUvYmFoYW4iO3M6NToicm91dGUiO3M6MTg6ImxvYW5zLmNyZWF0ZS5iYWhhbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1784039939),
	('waWCOwnfBQfICo6k9d1V8xwlpeBJpV0G5mSC8td4', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWTVha2M2cXpYYTlYN2hyaGtpeng1T3BuYUxaeVVLQ2dJZTFmZzZ3ViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9zaXAtbGFiLnRlc3Q6ODA4MC9sb2Fucy9jcmVhdGUvYmFyYW5nIjtzOjU6InJvdXRlIjtzOjE5OiJsb2Fucy5jcmVhdGUuYmFyYW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1784084395);

-- Dumping structure for table sip-lab.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('mahasiswa','admin','kepala_lab') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sip-lab.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Lab', 'admin@test.com', NULL, '$2y$12$b10j01ZWe3dB0swtqb0q1.uknQRf55fBllH5LvSY5yGh5I1t8d5kC', 'admin', NULL, '2026-05-08 07:25:30', '2026-05-08 07:25:30'),
	(2, 'Pak Kepala', 'kepala@test.com', NULL, '$2y$12$BrTOe88yHLjVd3XjFjNEd.qOybTqrZIJyEFtwlEE9aBXMIjmLyDm.', 'kepala_lab', NULL, '2026-05-08 07:25:31', '2026-05-08 07:25:31'),
	(3, 'Mahasiswa 1', 'mhs@test.com', NULL, '$2y$12$uAYwBOrmSDhnzLssCsqW4Oro8lOsjJUmSqB/p3WW8lyMRmZ5ohrRm', 'mahasiswa', NULL, '2026-05-08 07:25:31', '2026-05-08 07:25:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
