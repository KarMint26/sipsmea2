-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2024 at 10:00 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipsmea_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint UNSIGNED NOT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `academic_year`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '2023/2024', '2023-08-10', '2024-08-10', '2024-05-26 09:49:18', '2024-05-26 09:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint UNSIGNED NOT NULL,
  `jarak` int NOT NULL DEFAULT '0',
  `current_peminat` int NOT NULL DEFAULT '0',
  `peminatan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `jarak`, `current_peminat`, `peminatan_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 8, 1, 2, 2, '2024-05-26 10:23:02', '2024-05-26 10:23:07'),
(7, 9, 1, 3, 2, '2024-05-26 10:23:02', '2024-05-26 10:23:07'),
(8, 8, 1, 4, 2, '2024-05-26 10:23:02', '2024-05-26 10:23:07'),
(9, 9, 1, 5, 2, '2024-05-26 10:23:02', '2024-05-26 10:23:07'),
(10, 8, 1, 6, 2, '2024-05-26 10:23:02', '2024-05-26 10:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_04_19_130644_create_academic_years_table', 1),
(4, '2024_04_19_131621_create_pkl_places_table', 1),
(5, '2024_04_19_132814_create_peminatans_table', 1),
(6, '2024_04_19_140408_create_alternatifs_table', 1),
(7, '2024_04_22_025052_create_vbobot_views', 1),
(8, '2024_04_24_130007_create_v_alternatifs_table', 1),
(9, '2024_04_24_131059_create_v_saw_min_maxes_table', 1),
(10, '2024_04_24_131524_create_v_saw_normalisasis_table', 1),
(11, '2024_04_24_132058_create_v_saw_hasils_table', 1),
(12, '2024_04_24_132842_create_v_wp_preferensis_table', 1),
(13, '2024_04_24_133603_create_v_wp_sum_preferensis_table', 1),
(14, '2024_04_24_134058_create_v_wp_hasils_table', 1),
(15, '2024_05_09_130752_create_v_topsis_pembagis_table', 1),
(16, '2024_05_09_131814_create_v_topsis_normalisasis_table', 1),
(17, '2024_05_09_132054_create_v_topsis_ternormalisasi_terbobots_table', 1),
(18, '2024_05_09_132308_create_v_topsis_solusi_ideals_table', 1),
(19, '2024_05_09_132455_create_v_topsis_alternatif_solusi_ideals_table', 1),
(20, '2024_05_09_132833_create_v_topsis_hasils_table', 1),
(21, '2024_05_27_083700_create_password_reset_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminatans`
--

CREATE TABLE `peminatans` (
  `id` bigint UNSIGNED NOT NULL,
  `peminat` int NOT NULL DEFAULT '0',
  `pkl_place_id` bigint UNSIGNED NOT NULL,
  `academic_year_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminatans`
--

INSERT INTO `peminatans` (`id`, `peminat`, `pkl_place_id`, `academic_year_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, '2024-05-26 09:56:52', '2024-05-26 16:37:36'),
(3, 1, 3, 1, '2024-05-26 09:59:35', '2024-05-26 16:37:36'),
(4, 1, 4, 1, '2024-05-26 10:00:49', '2024-05-26 16:37:36'),
(5, 1, 5, 1, '2024-05-26 10:02:32', '2024-05-26 16:37:36'),
(6, 1, 6, 1, '2024-05-26 10:11:13', '2024-05-26 16:37:36'),
(7, 0, 7, 1, '2024-05-26 10:12:23', '2024-05-26 10:12:23'),
(8, 0, 8, 1, '2024-05-26 10:14:47', '2024-05-26 10:14:47'),
(9, 0, 9, 1, '2024-05-26 10:15:37', '2024-05-26 10:15:37'),
(10, 0, 10, 1, '2024-05-26 10:16:45', '2024-05-26 10:16:45'),
(11, 0, 11, 1, '2024-05-26 10:17:29', '2024-05-26 10:17:29'),
(12, 0, 12, 1, '2024-05-26 10:18:43', '2024-05-26 10:18:43'),
(13, 0, 13, 1, '2024-05-26 10:19:40', '2024-05-26 10:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pkl_places`
--

CREATE TABLE `pkl_places` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_gmaps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `daya_tampung` int NOT NULL DEFAULT '0',
  `akses_jalan` int NOT NULL DEFAULT '0',
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pkl_places`
--

INSERT INTO `pkl_places` (`id`, `title`, `location`, `telephone`, `open_time`, `link_gmaps`, `image_url`, `rating`, `daya_tampung`, `akses_jalan`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Kejaksaan Negeri Kabupaten Tegal', 'Jl. Professor Muhammad Yamin No 16, Mangkrik Pakembaran, Kec Slawi, Kabupaten Tegal', '(0283) 491213', '8.00-16.00', 'https://maps.app.goo.gl/9CQy19M6vxmnWHTUA', 'https://lh5.googleusercontent.com/p/AF1QipPeFwH9eMOkhH2eaVxO7JvKnDTY3j-cVfCoz573=w426-h240-k-no', 4, 6, 5, 'aktif', '2024-05-26 09:56:52', '2024-05-26 09:56:52'),
(3, 'Kampus 2 Politeknik Purbaya', 'Jl. Supriyadi, Trayeman, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52414', '0857-4244-7777', '8.00-17.00', 'https://maps.app.goo.gl/yrAWuCSshGtFTKs97', 'https://lh5.googleusercontent.com/p/AF1QipNHdRbQpmR_ehROWHSK_0uHeXlgcndclhYd58I=w408-h306-k-no', 4, 5, 3, 'aktif', '2024-05-26 09:59:35', '2024-05-26 09:59:35'),
(4, 'Dinas Kependudukan dan Pencatatan Sipil', 'Jl. Ir. Juanda No. 9, Pakembaran, Kec. Slawi, Kabupaten Tegal, Jawa Tengah', '(0283) 491344', '7.15-16.15', 'https://maps.app.goo.gl/zvZk6iUXQjSumN6Q6', 'https://lh5.googleusercontent.com/p/AF1QipNmu_hqZFY4h4G9A3rsGKPpmm_d8JE4LtT6i4Qc=w408-h306-k-no', 3, 4, 4, 'aktif', '2024-05-26 10:00:49', '2024-05-26 10:00:49'),
(5, 'Kantor Samsat Daerah Slawi', 'Jl. Cut Nyak Dien, Griya Prajamukti, Kalisapu, Kec. Slawi, Kabupaten Tegal', '(0283) 6197719', '8.00-15.00', 'https://maps.app.goo.gl/EBrKpnhc6rN9e6N86', 'https://lh5.googleusercontent.com/p/AF1QipOGqZtU9UbBB22wkuk0XHH4OkMf9s983bJln3yr=w408-h305-k-no', 4, 5, 4, 'aktif', '2024-05-26 10:02:32', '2024-05-26 10:02:32'),
(6, 'Trasa CoWorking Space', 'Jl. Jenderal Ahmad Yani No.43, Mingkrik, Pakembaran, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52411', '0838-4447-5857', '9.00-17.00', 'https://maps.app.goo.gl/MUUk57rSktvzZCEW8', 'https://lh5.googleusercontent.com/p/AF1QipOimjN9gfnmQ8M6xe4ERgRNO0cjMohgVc2o8jl7=w408-h306-k-no', 4, 6, 3, 'aktif', '2024-05-26 10:11:13', '2024-05-26 10:11:13'),
(7, 'YUHLEZ Software House', 'Jl. Griya Tiara Asri II No.02, Kalisapu, Kec. Slawi, Kabupten Tegal, Jawa Tengah 52416', '0821-2512-6584', 'Buka 24 Jam', 'https://maps.app.goo.gl/pdwsf2fS1iQzecC8A', 'https://lh5.googleusercontent.com/p/AF1QipNwBcfIjLIXYRyWN6BZN6IH0n7c5P02vwDz_Itv=s473-k-no', 4, 4, 4, 'aktif', '2024-05-26 10:12:23', '2024-05-26 10:12:23'),
(8, 'SMK Muhammadiyah Slawi', 'Jalan Professor Muhammad Yamin, Kudaile, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52413', '(0283) 491239', '8.00-16.00', 'https://maps.app.goo.gl/KtGYTBZdq7Zyw9wH6', 'https://lh5.googleusercontent.com/p/AF1QipO1Lv3eMHed1WSoeoNO8Zr1MmqlssnrZ-nmXMlr=w408-h904-k-no', 4, 5, 4, 'aktif', '2024-05-26 10:14:47', '2024-05-26 10:14:47'),
(9, 'Kantor Kecamatan Pangkah', 'Jl. Raya Utara Adiwerna, Kauman, Pangkah, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52471', '(0283) 6195615', '8.00-15.00', 'https://maps.app.goo.gl/AiwrsDmJ7dnEUzBj6', 'https://lh5.googleusercontent.com/p/AF1QipOAFnKiu0zIoTTxL3yR8tcaN6Ca1Q9WIkhgKR1Q=w408-h408-k-no', 3, 2, 4, 'aktif', '2024-05-26 10:15:37', '2024-05-26 10:15:37'),
(10, 'Dinas Sosial Kabupaten Tegal', 'Jl. Raya Sel. Banjaran No.3, Procot, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52412', '(0283) 491379', '8.00-16.15', 'https://maps.app.goo.gl/UbmFwz5xwEuvuLnXA', 'https://lh5.googleusercontent.com/p/AF1QipPsjXuwqIP2-nCogqn4GuZG3m_bcgzQDbKtZClI=w408-h408-k-no', 4, 3, 5, 'aktif', '2024-05-26 10:16:45', '2024-05-26 10:16:45'),
(11, 'Dinas Perindustrian dan Tenaga Kerja', 'Jl. DR. Soetomo No.12, Prenam, Dukuhwringin, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52417', '(0283) 491784', '7.15-16.15', 'https://maps.app.goo.gl/nF9V4VQKsbHbBBkk8', 'https://lh5.googleusercontent.com/p/AF1QipOCsrq1l8Ffu-A9S2ZJ6Kp2iUSeuu6BVTsRtfEc=w408-h306-k-no', 4, 4, 3, 'aktif', '2024-05-26 10:17:29', '2024-05-26 10:17:29'),
(12, 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana', 'Jl. Merpati No.12, Slawi Kulon, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52419', '(0283) 491302', '7.15-16.15', 'https://maps.app.goo.gl/BrTzczWZXLq6i9nD8', 'https://lh5.googleusercontent.com/p/AF1QipNSH2jslFQYu8j0hJLPbaoFnWaXjh57AuQrvneX=w408-h306-k-no', 4, 7, 4, 'aktif', '2024-05-26 10:18:43', '2024-05-26 10:18:43'),
(13, 'CV. Vodeco Digital Mediatama', 'Jl. Mangga, Dagan, Procot, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52194', '0878-9992-1200', '8.00-17.00', 'https://maps.app.goo.gl/gm7ZiNbKNukPAC3Y8', 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=mIb-aTFjT9BGJaB1WI1lWQ&cb_client=search.gws-prod.gps&w=408&h=240&yaw=15.91299&pitch=0&thumbfov=100', 4, 10, 4, 'aktif', '2024-05-26 10:19:40', '2024-05-26 10:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd_nohash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `role` enum('admin','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `w1` int NOT NULL DEFAULT '0',
  `w2` int NOT NULL DEFAULT '0',
  `w3` int NOT NULL DEFAULT '0',
  `w4` int NOT NULL DEFAULT '0',
  `w5` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nisn`, `email`, `email_verified_at`, `password`, `pwd_nohash`, `google_id`, `facebook_id`, `status`, `role`, `w1`, `w2`, `w3`, `w4`, `w5`, `created_at`, `updated_at`) VALUES
(1, 'admin', '11111', 'admin@sipsmea.my.id', '2024-05-26 09:30:53', '$2y$12$eHKjerZ0rNqe8ENvs1eFO.KOfmO5xv0ZTR9ls7yWv5NLgt5Ho65.O', 'glr413fv37', NULL, NULL, 'aktif', 'admin', 0, 0, 0, 0, 0, NULL, NULL),
(2, 'Akun Demo', '12345', 'demo1@sipsmea.my.id', '2024-05-26 09:30:53', '$2y$12$o1VgxQVQgYObaKZQ8i3VEO6732.rmwjbQDZXM4UlVp258CI6OOuTS', 'hgu7lr9zSa211K0zzk', NULL, NULL, 'aktif', 'siswa', -4, 3, 5, 5, -3, NULL, '2024-05-26 12:05:37'),
(11, 'Akun Demo 2', '17822', 'demo2@sipsmea.my.id', '2024-05-26 14:49:27', '$2y$12$NbyiTjgRmqNC0Nnyc/cM7u9yfBHSBweOsx4Sqldj29dh.Hjeu3eVO', '26november2003', NULL, NULL, 'aktif', 'siswa', 0, 0, 0, 0, 0, '2024-05-26 14:48:54', '2024-05-26 14:49:27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_alternatifs`
-- (See below for the actual view)
--
CREATE TABLE `v_alternatifs` (
`c1` int
,`c2` int
,`c3` int
,`c4` int
,`c5` int
,`title` varchar(255)
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_bobot`
-- (See below for the actual view)
--
CREATE TABLE `v_bobot` (
`id` bigint unsigned
,`w1` decimal(14,4)
,`w2` decimal(14,4)
,`w3` decimal(14,4)
,`w4` decimal(14,4)
,`w5` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_saw_hasils`
-- (See below for the actual view)
--
CREATE TABLE `v_saw_hasils` (
`hasil` decimal(32,8)
,`title` varchar(255)
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_saw_min_maxes`
-- (See below for the actual view)
--
CREATE TABLE `v_saw_min_maxes` (
`m1` int
,`m2` int
,`m3` int
,`m4` int
,`m5` int
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_saw_normalisasis`
-- (See below for the actual view)
--
CREATE TABLE `v_saw_normalisasis` (
`r1` decimal(14,4)
,`r2` decimal(14,4)
,`r3` decimal(14,4)
,`r4` decimal(14,4)
,`r5` decimal(14,4)
,`title` varchar(255)
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_topsis_alternatif_solusi_ideals`
-- (See below for the actual view)
--
CREATE TABLE `v_topsis_alternatif_solusi_ideals` (
`dm` double
,`dp` double
,`title` varchar(255)
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_topsis_hasils`
-- (See below for the actual view)
--
CREATE TABLE `v_topsis_hasils` (
`hasil` double
,`title` varchar(255)
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_topsis_normalisasis`
-- (See below for the actual view)
--
CREATE TABLE `v_topsis_normalisasis` (
`r1` double
,`r2` double
,`r3` double
,`r4` double
,`r5` double
,`title` varchar(255)
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_topsis_pembagis`
-- (See below for the actual view)
--
CREATE TABLE `v_topsis_pembagis` (
`pb_c1` double
,`pb_c2` double
,`pb_c3` double
,`pb_c4` double
,`pb_c5` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_topsis_solusi_ideals`
-- (See below for the actual view)
--
CREATE TABLE `v_topsis_solusi_ideals` (
`am_tb1` double
,`am_tb2` double
,`am_tb3` double
,`am_tb4` double
,`am_tb5` double
,`ap_tb1` double
,`ap_tb2` double
,`ap_tb3` double
,`ap_tb4` double
,`ap_tb5` double
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_topsis_ternormalisasi_terbobots`
-- (See below for the actual view)
--
CREATE TABLE `v_topsis_ternormalisasi_terbobots` (
`tb1` double
,`tb2` double
,`tb3` double
,`tb4` double
,`tb5` double
,`title` varchar(255)
,`user_id` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_wp_hasils`
-- (See below for the actual view)
--
CREATE TABLE `v_wp_hasils` (
`hasil` double
,`id` bigint unsigned
,`title` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_wp_preferensis`
-- (See below for the actual view)
--
CREATE TABLE `v_wp_preferensis` (
`id` bigint unsigned
,`s` double
,`s1` double
,`s2` double
,`s3` double
,`s4` double
,`s5` double
,`title` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_wp_sum_preferensis`
-- (See below for the actual view)
--
CREATE TABLE `v_wp_sum_preferensis` (
`id` bigint unsigned
,`sum` double
);

-- --------------------------------------------------------

--
-- Structure for view `v_alternatifs`
--
DROP TABLE IF EXISTS `v_alternatifs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_alternatifs`  AS SELECT `pkl_places`.`title` AS `title`, `alternatifs`.`jarak` AS `c1`, `pkl_places`.`rating` AS `c2`, `pkl_places`.`daya_tampung` AS `c3`, `pkl_places`.`akses_jalan` AS `c4`, `alternatifs`.`current_peminat` AS `c5`, `alternatifs`.`user_id` AS `user_id` FROM (((`pkl_places` join `peminatans` on((`peminatans`.`pkl_place_id` = `pkl_places`.`id`))) join `alternatifs` on((`alternatifs`.`peminatan_id` = `peminatans`.`id`))) join `academic_years` on((`academic_years`.`id` = `peminatans`.`academic_year_id`))) WHERE ((`academic_years`.`start_date` <= now()) AND (`academic_years`.`end_date` >= now())) ;

-- --------------------------------------------------------

--
-- Structure for view `v_bobot`
--
DROP TABLE IF EXISTS `v_bobot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_bobot`  AS SELECT `users`.`id` AS `id`, (`users`.`w1` / ((((abs(`users`.`w1`) + abs(`users`.`w2`)) + abs(`users`.`w3`)) + abs(`users`.`w4`)) + abs(`users`.`w5`))) AS `w1`, (`users`.`w2` / ((((abs(`users`.`w1`) + abs(`users`.`w2`)) + abs(`users`.`w3`)) + abs(`users`.`w4`)) + abs(`users`.`w5`))) AS `w2`, (`users`.`w3` / ((((abs(`users`.`w1`) + abs(`users`.`w2`)) + abs(`users`.`w3`)) + abs(`users`.`w4`)) + abs(`users`.`w5`))) AS `w3`, (`users`.`w4` / ((((abs(`users`.`w1`) + abs(`users`.`w2`)) + abs(`users`.`w3`)) + abs(`users`.`w4`)) + abs(`users`.`w5`))) AS `w4`, (`users`.`w5` / ((((abs(`users`.`w1`) + abs(`users`.`w2`)) + abs(`users`.`w3`)) + abs(`users`.`w4`)) + abs(`users`.`w5`))) AS `w5` FROM `users` ;

-- --------------------------------------------------------

--
-- Structure for view `v_saw_hasils`
--
DROP TABLE IF EXISTS `v_saw_hasils`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_saw_hasils`  AS SELECT `v_saw_normalisasis`.`user_id` AS `user_id`, `v_saw_normalisasis`.`title` AS `title`, (((((abs(`v_bobot`.`w1`) * `v_saw_normalisasis`.`r1`) + (abs(`v_bobot`.`w2`) * `v_saw_normalisasis`.`r2`)) + (abs(`v_bobot`.`w3`) * `v_saw_normalisasis`.`r3`)) + (abs(`v_bobot`.`w4`) * `v_saw_normalisasis`.`r4`)) + (abs(`v_bobot`.`w5`) * `v_saw_normalisasis`.`r5`)) AS `hasil` FROM (`v_saw_normalisasis` join `v_bobot` on((`v_saw_normalisasis`.`user_id` = `v_bobot`.`id`))) ORDER BY (((((abs(`v_bobot`.`w1`) * `v_saw_normalisasis`.`r1`) + (abs(`v_bobot`.`w2`) * `v_saw_normalisasis`.`r2`)) + (abs(`v_bobot`.`w3`) * `v_saw_normalisasis`.`r3`)) + (abs(`v_bobot`.`w4`) * `v_saw_normalisasis`.`r4`)) + (abs(`v_bobot`.`w5`) * `v_saw_normalisasis`.`r5`)) ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_saw_min_maxes`
--
DROP TABLE IF EXISTS `v_saw_min_maxes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_saw_min_maxes`  AS SELECT min(`v_alternatifs`.`c1`) AS `m1`, max(`v_alternatifs`.`c2`) AS `m2`, max(`v_alternatifs`.`c3`) AS `m3`, max(`v_alternatifs`.`c4`) AS `m4`, min(`v_alternatifs`.`c5`) AS `m5`, `v_alternatifs`.`user_id` AS `user_id` FROM `v_alternatifs` GROUP BY `v_alternatifs`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_saw_normalisasis`
--
DROP TABLE IF EXISTS `v_saw_normalisasis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_saw_normalisasis`  AS SELECT `v_alternatifs`.`title` AS `title`, (`v_saw_min_maxes`.`m1` / `v_alternatifs`.`c1`) AS `r1`, (`v_alternatifs`.`c2` / `v_saw_min_maxes`.`m2`) AS `r2`, (`v_alternatifs`.`c3` / `v_saw_min_maxes`.`m3`) AS `r3`, (`v_alternatifs`.`c4` / `v_saw_min_maxes`.`m4`) AS `r4`, (`v_saw_min_maxes`.`m5` / `v_alternatifs`.`c5`) AS `r5`, `v_alternatifs`.`user_id` AS `user_id` FROM (`v_alternatifs` join `v_saw_min_maxes` on((`v_alternatifs`.`user_id` = `v_saw_min_maxes`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_topsis_alternatif_solusi_ideals`
--
DROP TABLE IF EXISTS `v_topsis_alternatif_solusi_ideals`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_topsis_alternatif_solusi_ideals`  AS SELECT `v_topsis_ternormalisasi_terbobots`.`user_id` AS `user_id`, `v_topsis_ternormalisasi_terbobots`.`title` AS `title`, sqrt(((((pow((`v_topsis_solusi_ideals`.`ap_tb1` - `v_topsis_ternormalisasi_terbobots`.`tb1`),2) + pow((`v_topsis_solusi_ideals`.`ap_tb2` - `v_topsis_ternormalisasi_terbobots`.`tb2`),2)) + pow((`v_topsis_solusi_ideals`.`ap_tb3` - `v_topsis_ternormalisasi_terbobots`.`tb3`),2)) + pow((`v_topsis_solusi_ideals`.`ap_tb4` - `v_topsis_ternormalisasi_terbobots`.`tb4`),2)) + pow((`v_topsis_solusi_ideals`.`ap_tb5` - `v_topsis_ternormalisasi_terbobots`.`tb5`),2))) AS `dp`, sqrt(((((pow((`v_topsis_ternormalisasi_terbobots`.`tb1` - `v_topsis_solusi_ideals`.`am_tb1`),2) + pow((`v_topsis_ternormalisasi_terbobots`.`tb2` - `v_topsis_solusi_ideals`.`am_tb2`),2)) + pow((`v_topsis_ternormalisasi_terbobots`.`tb3` - `v_topsis_solusi_ideals`.`am_tb3`),2)) + pow((`v_topsis_ternormalisasi_terbobots`.`tb4` - `v_topsis_solusi_ideals`.`am_tb4`),2)) + pow((`v_topsis_ternormalisasi_terbobots`.`tb5` - `v_topsis_solusi_ideals`.`am_tb5`),2))) AS `dm` FROM (`v_topsis_ternormalisasi_terbobots` join `v_topsis_solusi_ideals` on((`v_topsis_ternormalisasi_terbobots`.`user_id` = `v_topsis_solusi_ideals`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_topsis_hasils`
--
DROP TABLE IF EXISTS `v_topsis_hasils`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_topsis_hasils`  AS SELECT `v_topsis_alternatif_solusi_ideals`.`user_id` AS `user_id`, `v_topsis_alternatif_solusi_ideals`.`title` AS `title`, (`v_topsis_alternatif_solusi_ideals`.`dm` / (`v_topsis_alternatif_solusi_ideals`.`dm` + `v_topsis_alternatif_solusi_ideals`.`dp`)) AS `hasil` FROM `v_topsis_alternatif_solusi_ideals` ORDER BY (`v_topsis_alternatif_solusi_ideals`.`dm` / (`v_topsis_alternatif_solusi_ideals`.`dm` + `v_topsis_alternatif_solusi_ideals`.`dp`)) ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_topsis_normalisasis`
--
DROP TABLE IF EXISTS `v_topsis_normalisasis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_topsis_normalisasis`  AS SELECT `v_alternatifs`.`user_id` AS `user_id`, `v_alternatifs`.`title` AS `title`, (`v_alternatifs`.`c1` / `v_topsis_pembagis`.`pb_c1`) AS `r1`, (`v_alternatifs`.`c2` / `v_topsis_pembagis`.`pb_c2`) AS `r2`, (`v_alternatifs`.`c3` / `v_topsis_pembagis`.`pb_c3`) AS `r3`, (`v_alternatifs`.`c4` / `v_topsis_pembagis`.`pb_c4`) AS `r4`, (`v_alternatifs`.`c5` / `v_topsis_pembagis`.`pb_c5`) AS `r5` FROM (`v_alternatifs` join `v_topsis_pembagis`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_topsis_pembagis`
--
DROP TABLE IF EXISTS `v_topsis_pembagis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_topsis_pembagis`  AS SELECT sqrt(sum(pow(`v_alternatifs`.`c1`,2))) AS `pb_c1`, sqrt(sum(pow(`v_alternatifs`.`c2`,2))) AS `pb_c2`, sqrt(sum(pow(`v_alternatifs`.`c3`,2))) AS `pb_c3`, sqrt(sum(pow(`v_alternatifs`.`c4`,2))) AS `pb_c4`, sqrt(sum(pow(`v_alternatifs`.`c5`,2))) AS `pb_c5` FROM `v_alternatifs` ;

-- --------------------------------------------------------

--
-- Structure for view `v_topsis_solusi_ideals`
--
DROP TABLE IF EXISTS `v_topsis_solusi_ideals`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_topsis_solusi_ideals`  AS SELECT `v_topsis_ternormalisasi_terbobots`.`user_id` AS `user_id`, min(`v_topsis_ternormalisasi_terbobots`.`tb1`) AS `ap_tb1`, max(`v_topsis_ternormalisasi_terbobots`.`tb2`) AS `ap_tb2`, max(`v_topsis_ternormalisasi_terbobots`.`tb3`) AS `ap_tb3`, max(`v_topsis_ternormalisasi_terbobots`.`tb4`) AS `ap_tb4`, min(`v_topsis_ternormalisasi_terbobots`.`tb5`) AS `ap_tb5`, max(`v_topsis_ternormalisasi_terbobots`.`tb1`) AS `am_tb1`, min(`v_topsis_ternormalisasi_terbobots`.`tb2`) AS `am_tb2`, min(`v_topsis_ternormalisasi_terbobots`.`tb3`) AS `am_tb3`, min(`v_topsis_ternormalisasi_terbobots`.`tb4`) AS `am_tb4`, max(`v_topsis_ternormalisasi_terbobots`.`tb5`) AS `am_tb5` FROM `v_topsis_ternormalisasi_terbobots` GROUP BY `v_topsis_ternormalisasi_terbobots`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_topsis_ternormalisasi_terbobots`
--
DROP TABLE IF EXISTS `v_topsis_ternormalisasi_terbobots`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_topsis_ternormalisasi_terbobots`  AS SELECT `v_topsis_normalisasis`.`user_id` AS `user_id`, `v_topsis_normalisasis`.`title` AS `title`, (abs(`users`.`w1`) * `v_topsis_normalisasis`.`r1`) AS `tb1`, (abs(`users`.`w2`) * `v_topsis_normalisasis`.`r2`) AS `tb2`, (abs(`users`.`w3`) * `v_topsis_normalisasis`.`r3`) AS `tb3`, (abs(`users`.`w4`) * `v_topsis_normalisasis`.`r4`) AS `tb4`, (abs(`users`.`w5`) * `v_topsis_normalisasis`.`r5`) AS `tb5` FROM (`v_topsis_normalisasis` join `users` on((`v_topsis_normalisasis`.`user_id` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_wp_hasils`
--
DROP TABLE IF EXISTS `v_wp_hasils`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_wp_hasils`  AS SELECT `v_wp_preferensis`.`id` AS `id`, `v_wp_preferensis`.`title` AS `title`, (`v_wp_preferensis`.`s` / `v_wp_sum_preferensis`.`sum`) AS `hasil` FROM (`v_wp_preferensis` join `v_wp_sum_preferensis` on((`v_wp_preferensis`.`id` = `v_wp_sum_preferensis`.`id`))) ORDER BY (`v_wp_preferensis`.`s` / `v_wp_sum_preferensis`.`sum`) ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_wp_preferensis`
--
DROP TABLE IF EXISTS `v_wp_preferensis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_wp_preferensis`  AS SELECT `v_bobot`.`id` AS `id`, `v_alternatifs`.`title` AS `title`, pow(`v_alternatifs`.`c1`,`v_bobot`.`w1`) AS `s1`, pow(`v_alternatifs`.`c2`,`v_bobot`.`w2`) AS `s2`, pow(`v_alternatifs`.`c3`,`v_bobot`.`w3`) AS `s3`, pow(`v_alternatifs`.`c4`,`v_bobot`.`w4`) AS `s4`, pow(`v_alternatifs`.`c5`,`v_bobot`.`w5`) AS `s5`, ((((pow(`v_alternatifs`.`c1`,`v_bobot`.`w1`) * pow(`v_alternatifs`.`c2`,`v_bobot`.`w2`)) * pow(`v_alternatifs`.`c3`,`v_bobot`.`w3`)) * pow(`v_alternatifs`.`c4`,`v_bobot`.`w4`)) * pow(`v_alternatifs`.`c5`,`v_bobot`.`w5`)) AS `s` FROM (`v_alternatifs` join `v_bobot` on((`v_bobot`.`id` = `v_alternatifs`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_wp_sum_preferensis`
--
DROP TABLE IF EXISTS `v_wp_sum_preferensis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`karr4123`@`localhost` SQL SECURITY DEFINER VIEW `v_wp_sum_preferensis`  AS SELECT `v_wp_preferensis`.`id` AS `id`, sum(`v_wp_preferensis`.`s`) AS `sum` FROM `v_wp_preferensis` GROUP BY `v_wp_preferensis`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatifs_peminatan_id_foreign` (`peminatan_id`),
  ADD KEY `alternatifs_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminatans`
--
ALTER TABLE `peminatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminatans_pkl_place_id_foreign` (`pkl_place_id`),
  ADD KEY `peminatans_academic_year_id_foreign` (`academic_year_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pkl_places`
--
ALTER TABLE `pkl_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `peminatans`
--
ALTER TABLE `peminatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pkl_places`
--
ALTER TABLE `pkl_places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD CONSTRAINT `alternatifs_peminatan_id_foreign` FOREIGN KEY (`peminatan_id`) REFERENCES `peminatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatifs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminatans`
--
ALTER TABLE `peminatans`
  ADD CONSTRAINT `peminatans_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminatans_pkl_place_id_foreign` FOREIGN KEY (`pkl_place_id`) REFERENCES `pkl_places` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
