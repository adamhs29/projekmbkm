-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
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


DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE `fakultas` (
  `id_fakultas` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `fakultas` (`id_fakultas`, `nama`, `created_at`, `updated_at`) VALUES
(1,	'Fakultas A',	'2023-06-21 02:27:57',	'2023-06-21 02:27:57'),
(2,	'Fakultas B',	'2023-06-21 02:27:57',	'2023-06-21 02:27:57'),
(3,	'Fakultas C',	'2023-06-21 02:27:57',	'2023-06-21 02:27:57');

DROP TABLE IF EXISTS `matkul`;
CREATE TABLE `matkul` (
  `id_matkul` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_matkul` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_sks` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `jumlah_sks`, `created_at`, `updated_at`) VALUES
(55,	'551',	'matkul55',	5,	NULL,	NULL),
(66,	'661',	'matkul66',	6,	NULL,	NULL),
(77,	'771',	'matkul77',	7,	NULL,	NULL),
(88,	'881',	'matkul88',	8,	NULL,	NULL),
(99,	'991',	'matkul99',	9,	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(2,	'2023_06_16_153407_create_roles_table',	1),
(3,	'2014_10_12_000000_create_users_table',	2),
(4,	'2014_10_12_100000_create_password_resets_table',	2),
(5,	'2019_08_19_000000_create_failed_jobs_table',	2),
(6,	'2023_06_20_151134_create_prodi_table',	3),
(7,	'2023_06_20_151649_create_fakultas_table',	4),
(8,	'2023_06_20_151908_create_progam_table',	5),
(9,	'2023_06_20_151908_create_program_table',	6),
(10,	'2023_06_20_144354_create_pendaftar_table',	7),
(11,	'2023_06_20_152022_create_surat_table',	8),
(12,	'2023_06_24_094712_create_pendaftar_table',	9),
(13,	'2023_06_24_100009_create_pendaftar_table',	10),
(14,	'2023_07_05_154429_create_pendaftar_table',	11),
(15,	'2023_07_20_142807_create_matkul_table',	12),
(16,	'2023_07_20_144103_create_pendaftar_table',	13),
(17,	'2023_07_23_121323_create_matkul_table',	14),
(18,	'2023_07_23_122319_create_pendaftar_table',	15),
(19,	'2023_07_24_065257_create_pendaftar_table',	16),
(20,	'2023_07_24_075125_create_pendaftar_table',	17),
(21,	'2023_07_24_081321_create_pendaftar_table',	18);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pendaftar`;
CREATE TABLE `pendaftar` (
  `id_pendaftar` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL DEFAULT '1',
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fakultas_id` bigint unsigned DEFAULT NULL,
  `prodi_id` bigint unsigned DEFAULT NULL,
  `program_id` bigint unsigned DEFAULT NULL,
  `matkul_id` bigint unsigned DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skrip_nilai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `krs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipk` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ortu` text COLLATE utf8mb4_unicode_ci,
  `no_telp_ortu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `angkatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_matkul` json DEFAULT NULL,
  `nama_matkul` json DEFAULT NULL,
  `total_sks` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pendaftar`),
  KEY `pendaftar_user_id_foreign` (`user_id`),
  KEY `pendaftar_fakultas_id_foreign` (`fakultas_id`),
  KEY `pendaftar_prodi_id_foreign` (`prodi_id`),
  KEY `pendaftar_program_id_foreign` (`program_id`),
  KEY `pendaftar_matkul_id_foreign` (`matkul_id`),
  CONSTRAINT `pendaftar_fakultas_id_foreign` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id_fakultas`),
  CONSTRAINT `pendaftar_matkul_id_foreign` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`),
  CONSTRAINT `pendaftar_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id_prodi`),
  CONSTRAINT `pendaftar_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `program` (`id_program`),
  CONSTRAINT `pendaftar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pendaftar` (`id_pendaftar`, `user_id`, `nama`, `npm`, `nik`, `jenis_kelamin`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `fakultas_id`, `prodi_id`, `program_id`, `matkul_id`, `foto`, `skrip_nilai`, `krs`, `ipk`, `semester`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `no_telp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `status`, `angkatan`, `kode_matkul`, `nama_matkul`, `total_sks`, `created_at`, `updated_at`) VALUES
(33,	26,	'Adam Harnando Syahputra',	'17119131',	'3216549870',	'Laki-Laki',	'Perum Bekasi',	'Keca',	'Kabu',	'Pro',	'TeLa',	'2023-07-25',	'08123456789',	1,	2,	3,	NULL,	'public/foto/17119131.jpg',	'public/skrip_nilai/17119131.pdf',	'public/krs/17119131.pdf',	NULL,	'6',	'Bapack',	'Ibuck',	'Perum Bekasi ORTU',	'081987654321',	'Presiden',	'Wakil Presiden',	1,	'2019',	'\"[\\\"661\\\",\\\"991\\\"]\"',	'\"[\\\"matkul66\\\",\\\"matkul99\\\"]\"',	15,	'2023-07-24 19:34:28',	'2023-07-24 19:34:28');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi` (
  `id_prodi` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `prodi` (`id_prodi`, `nama`, `created_at`, `updated_at`) VALUES
(1,	'Prodi A',	'2023-06-21 02:27:50',	'2023-06-21 02:27:50'),
(2,	'Prodi B',	'2023-06-21 02:27:50',	'2023-06-21 02:27:50'),
(3,	'Prodi C',	'2023-06-21 02:27:50',	'2023-06-21 02:27:50');

DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `id_program` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_program`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `program` (`id_program`, `nama`, `created_at`, `updated_at`) VALUES
(1,	'Program A',	'2023-06-21 00:02:57',	'2023-06-21 00:02:57'),
(2,	'Program B',	'2023-06-21 00:02:57',	'2023-06-21 00:02:57'),
(3,	'Program C',	'2023-06-21 00:02:57',	'2023-06-21 00:02:57');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_role` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id_role`, `nama`, `created_at`, `updated_at`) VALUES
(1,	'mahasiswa',	'2023-06-18 07:27:40',	'2023-06-18 07:27:40'),
(2,	'prodi',	'2023-06-18 07:27:40',	'2023-06-18 07:27:40'),
(3,	'pengurus',	'2023-06-18 07:27:40',	'2023-06-18 07:27:40');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id_user`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2,	'prodi@gmail.com',	'2023-06-18 20:37:24',	'$2y$10$6xKgTPX5FbgJaLqZ99z1TOuBj2KArcaJJhxObDKXLXhVtNDBf585W',	2,	NULL,	'2023-06-18 20:37:24',	'2023-06-18 20:37:24'),
(3,	'pengurus@gmail.com',	'2023-06-18 20:37:24',	'$2y$10$QscfevXcHINEQNyC3WUbsOLCtKTlR70VxuKNeJNxsC.biHZA9wmWG',	3,	NULL,	'2023-06-18 20:37:24',	'2023-06-18 20:37:24'),
(25,	'asd@student.gunadarma.ac.id',	NULL,	'$2y$10$H6OsdYW27wP4gtqT.mslIeqaYfxenjfwJmpvELk3/mUMF/KuuA3Pi',	1,	NULL,	'2023-07-05 07:51:53',	'2023-07-05 07:51:53'),
(26,	'adam@student.gunadarma.ac.id',	NULL,	'$2y$10$kjsVvoJMpz/AlmjuC.FV1OR6.4KiAswRUQoXonjXTgH4v/sM3f2FW',	1,	NULL,	'2023-07-18 04:24:36',	'2023-07-18 04:24:36');

-- 2023-07-25 03:45:41
