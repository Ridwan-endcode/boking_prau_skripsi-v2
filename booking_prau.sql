-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 08:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_prau`
--

-- --------------------------------------------------------

--
-- Table structure for table `dendas`
--

CREATE TABLE `dendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bibit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `harga` int(191) DEFAULT NULL,
  `id_jalur` int(11) DEFAULT NULL,
  `kuota` int(191) DEFAULT NULL,
  `create_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `tgl_jadwal`, `status`, `harga`, `id_jalur`, `kuota`, `create_id`, `created_at`, `updated_at`) VALUES
(4, '03/19/2020', 1, 15000, 4, 4000, 1, '2020-03-12 16:22:08', '2020-03-25 16:50:26'),
(5, '03/20/2020', 1, 15000, 2, 2000, 1, '2020-03-12 16:29:38', '2020-03-12 19:27:44'),
(6, '03/21/2020', 1, 15000, 2, 300, 1, '2020-03-12 16:36:23', '2020-03-12 16:55:12'),
(7, '03/26/2020', 2, 15000, 2, 4, 14, '2020-03-14 10:45:23', '2020-03-25 18:39:08'),
(8, '04/01/2020', 2, 15000, 2, 22, 14, '2020-03-14 10:46:18', '2020-03-23 14:02:11'),
(9, '03/16/2020', 4, 15000, 4, 88, 14, '2020-03-14 10:46:54', '2020-03-25 22:38:55'),
(10, '03/23/2020', 4, 15000, 4, 2, 14, '2020-03-17 19:58:08', '2020-03-23 16:48:56'),
(11, '03/30/2020', 2, 15000, 2, 12, 14, '2020-03-18 16:29:16', '2020-03-23 13:59:17'),
(12, '03/22/2020', 6, 15000, 6, 40000, 14, '2020-03-19 20:09:11', '2020-03-25 18:15:03'),
(13, '04/02/2020', 4, 15000, 4, 4, 14, '2020-03-21 21:21:06', '2020-03-25 22:37:57'),
(14, '05/02/2020', 2, 15000, 2, 1212, 14, '2020-03-23 14:25:20', '2020-03-25 14:54:14'),
(15, '03/20/2020', 1, 15000, 4, 123, 14, '2020-03-25 15:23:00', '2020-03-25 15:23:00'),
(16, '04/02/2020', 1, 15000, 2, 123, 14, '2020-03-25 15:23:38', '2020-03-25 15:23:38'),
(17, '03/29/2020', 1, 15000, 5, 900, 14, '2020-03-25 22:21:55', '2020-03-25 22:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `jalur_pendakians`
--

CREATE TABLE `jalur_pendakians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jalur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_peta_jalur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_jalur` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jalur_pendakians`
--

INSERT INTO `jalur_pendakians` (`id`, `nama_jalur`, `image_peta_jalur`, `alamat_jalur`, `status`, `create_id`, `created_at`, `updated_at`) VALUES
(2, 'Jalur Pendakian Gunung Prau via Patak Banteng', '37518.jpg', 'Jl dieng raya', 1, 1, '2020-03-12 18:04:44', '2020-03-18 08:31:27'),
(4, 'Jalur Pendakian Gunung Prau via Wates', '43903.jpg', 'Jl dieng raya', 1, 1, '2020-03-13 06:59:50', '2020-03-18 08:32:33'),
(5, 'Jalur Pendakian Gunung Prau via Dieng Kulon (Dwarawati)', '98323.jpg', 'Jalur Pendakian Gunung Prau via Dieng Kulon (Dwarawati)', 1, 14, '2020-03-18 08:33:20', '2020-03-18 08:33:20'),
(6, 'Jalur Pendakian Gunung Prau via Kali Lembu', '41594.jpg', 'Jalur Pendakian Gunung Prau via Kali Lembu', 1, 14, '2020-03-18 08:34:31', '2020-03-18 08:34:31');

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
(4, '2020_03_09_211850_create_jalur_pendakians_table', 2),
(5, '2020_03_09_212752_create_jadwals_table', 2),
(6, '2020_03_09_214709_create_dendas_table', 3),
(7, '2020_03_12_200529_create_orders_table', 4),
(8, '2020_03_14_050236_create_pendakis_table', 4),
(9, '2020_03_23_183857_create_transaksis_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_jalur` int(11) NOT NULL,
  `id_pendaki` int(11) DEFAULT NULL,
  `tgl_turun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_order_denda` int(11) DEFAULT NULL,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_pendakian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pendaki_datang` int(1) DEFAULT NULL,
  `status_pendaki_turun` int(11) DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selesi_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_jadwal`, `id_jalur`, `id_pendaki`, `tgl_turun`, `harga`, `status_bayar`, `id_transaksi`, `id_order_denda`, `nama_kelompok`, `token_pendakian`, `status_pendaki_datang`, `status_pendaki_turun`, `session_id`, `selesi_order`, `created_at`, `updated_at`) VALUES
(30, 9, 4, 16, '03/31/2020', NULL, NULL, NULL, NULL, 'weqw', NULL, NULL, NULL, 'qPiTXUlQdAWkME8GKAX0Bbea0sEOhr', NULL, '2020-03-17 19:46:47', '2020-03-17 19:46:47'),
(31, 10, 4, 17, '03/11/2020', NULL, NULL, NULL, NULL, 'qwe', NULL, NULL, NULL, 'qPiTXUlQdAWkME8GKAX0Bbea0sEOhr', NULL, '2020-03-17 20:08:24', '2020-03-17 20:08:24'),
(32, 10, 4, 18, '03/30/2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qPiTXUlQdAWkME8GKAX0Bbea0sEOhr', NULL, '2020-03-17 20:10:05', '2020-03-17 20:10:05'),
(33, 7, 2, 19, '04/08/2020', NULL, NULL, NULL, NULL, 'weqw', NULL, NULL, NULL, 'kblF0xn2G0xq4rw7EZQd8Js9uEfEwz', NULL, '2020-03-18 08:37:37', '2020-03-18 08:37:37'),
(34, 5, 2, 20, '03/21/2020', 45000, NULL, NULL, NULL, 'Cicera', NULL, NULL, NULL, '03xVAu9Vz3PvH3DfnE4IzoJQnwPtLf', NULL, '2020-03-18 16:33:59', '2020-03-21 00:17:39'),
(35, 12, 6, 25, '03/23/2020', 45000, NULL, NULL, NULL, 'asas', NULL, NULL, NULL, 'RDe6XpFGlLl0gbTDHinWoKAJemBaOp', NULL, '2020-03-19 20:16:04', '2020-03-20 23:50:03'),
(36, 11, 2, 43, '05/24/2020', 45000, 0, NULL, NULL, 'Ciceraa', 'RguaNe', NULL, NULL, 'jW0l6fTdkERDXfo7h7Ywomy3azjIHN', 1, '2020-03-21 12:19:52', '2020-03-21 11:24:53'),
(37, 12, 6, 50, '04/23/2020', 30000, NULL, NULL, NULL, 'asas', NULL, NULL, NULL, 'jW0l6fTdkERDXfo7h7Ywomy3azjIHN', NULL, '2020-03-21 21:16:27', '2020-03-21 21:16:56'),
(38, 10, 4, 52, '03/24/2020', 30000, NULL, NULL, NULL, 'weqw', NULL, NULL, NULL, 'jW0l6fTdkERDXfo7h7Ywomy3azjIHN', NULL, '2020-03-21 22:27:57', '2020-03-21 22:29:03'),
(39, 13, 4, 54, '04/01/2020', 15000, NULL, NULL, NULL, 'weqw', 'SD2wIuS', NULL, NULL, 'n0CSPIYV0WqO6m5JhUaFW4lFY9MiPa', 1, '2020-03-23 16:52:30', '2020-03-23 09:54:22'),
(40, 13, 4, 55, '04/01/2020', 15000, NULL, NULL, NULL, 'weqw', 'NrAANYa', NULL, NULL, 'n0CSPIYV0WqO6m5JhUaFW4lFY9MiPa', 1, '2020-03-23 16:56:03', '2020-03-23 09:56:21'),
(41, 13, 4, 56, '03/03/2020', 30000, 14, 7, NULL, 'Cicera', '1Fmej4F', NULL, NULL, 'n0CSPIYV0WqO6m5JhUaFW4lFY9MiPa', 1, '2020-03-23 17:31:20', '2020-03-28 14:17:31'),
(42, 7, 2, 60, '2sdsf', 15000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', NULL, '2020-03-24 13:54:01', '2020-03-24 13:54:01'),
(43, 7, 2, 61, '2020-03-27', 45000, 14, 3, NULL, 'qwe', 'hJKbTOQ', NULL, NULL, 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', 1, '2020-03-24 13:56:59', '2020-03-27 02:29:52'),
(44, 7, 2, 64, '2020-03-27', 15000, 0, 0, NULL, 'qwe', 'DlWRF3x', NULL, NULL, 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', 1, '2020-03-24 19:07:20', '2020-03-27 20:46:29');

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
-- Table structure for table `pendakis`
--

CREATE TABLE `pendakis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_kelompok` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `janis_identitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_asal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_lain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_identitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendakis`
--

INSERT INTO `pendakis` (`id`, `status_kelompok`, `id_order`, `id_jadwal`, `status`, `nama`, `tgl_lahir`, `jenis_kelamin`, `janis_identitas`, `no_identitas`, `alamat`, `kota_asal`, `no_hp`, `no_hp_lain`, `email`, `image_identitas`, `session`, `created_at`, `updated_at`) VALUES
(43, NULL, 36, 10, NULL, 'Ridwan', '10 Januari 1997', 'Pria', 'ktp', '1232212322123212312', 'Jl. Raya Lenteng Agung No.56-80, Srengseng Sawah, Jakarta, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640', 'Depok', '085817761841', '(33) 333-3333-3333', 'ridwan.endan26@gmail.com', '213qe', 'jW0l6fTdkERDXfo7h7Ywomy3azjIHN', '2020-03-21 12:19:52', '2020-03-21 12:19:52'),
(48, 43, 36, 10, NULL, 'Rid', '22/33/1111', 'Wanita', 'kni', '121212121212121212', 'FAFASDDADAS', 'Depk', '(12) 313-2313-1313', 'SADASDASD', 'ridwan.endan26@gmail.com', 'SADASDSAD', 'jW0l6fTdkERDXfo7h7Ywomy3azjIHN', '2020-03-21 17:59:17', '2020-03-21 18:07:00'),
(52, NULL, 38, 10, NULL, 'qwe', '22/33/1111', 'Pria', 'ASDAS', 'ASDSDASD', '21212122', 'Depk', '085817761841', '(12) 121-2121-2121', 'ridwan.endan26@gmail.com', 'qwqwqw', 'jW0l6fTdkERDXfo7h7Ywomy3azjIHN', '2020-03-21 22:27:57', '2020-03-21 22:27:57'),
(53, 52, 38, 10, NULL, 'Testing', '22/33/1111', 'Pria', 'ZXZXZXZ', 'ASDSDASD', '21212122', 'dssds', '(12) 121-2121-2121', '(33) 333-3333-3333', 'ridwan.endan26@gmail.com', 'SADASDSAD', 'jW0l6fTdkERDXfo7h7Ywomy3azjIHN', '2020-03-21 22:29:03', '2020-03-21 22:29:03'),
(54, NULL, 39, 13, NULL, 'Ridwan', '11/11/', 'Pria', 'kni', '121212121212121212', 'qwqweqwe', 'dssds', '(12) 312-3123-2132', '(11) 111-1111-1111', 'admin@prau.com', 'qwqwqw', 'n0CSPIYV0WqO6m5JhUaFW4lFY9MiPa', '2020-03-23 16:52:30', '2020-03-23 16:52:30'),
(55, NULL, 40, 13, NULL, 'Testing', '22/33/1111', 'Pria', 'SIM', '121212121212121212', 'qwqweqwe', 'dssds', '(12) 312-3123-2132', '(12) 321-3123-3123', 'admin@prau.com', 'SADASDSAD', 'n0CSPIYV0WqO6m5JhUaFW4lFY9MiPa', '2020-03-23 16:56:03', '2020-03-23 16:56:03'),
(56, NULL, 41, 13, NULL, 'Ridwan', '11/11/1111', 'Pria', 'ASDAS', '121212121212121212', 'qwqweqwe', 'dssds', '(12) 313-2313-1313', '(12) 313-1321-3123', 'adminkaup@kaup.or.id', 'qwqwqw', 'n0CSPIYV0WqO6m5JhUaFW4lFY9MiPa', '2020-03-23 17:31:20', '2020-03-23 17:31:20'),
(59, 56, 41, 13, NULL, 'Ridwan', '22/33/1111', 'Pria', 'kni', '121212121212121212', 'qwqweqwe', 'dssds', '(11) 111-1111-1111', '(11) 111-1111-1111', 'admin@prau.com', 'SADASDSAD', 'n0CSPIYV0WqO6m5JhUaFW4lFY9MiPa', '2020-03-23 17:55:25', '2020-03-23 17:55:25'),
(60, NULL, 42, 7, 1, 'Dear Seluruh Alumni Universitas Pancasila', '11/11/1111', 'Pria', 'kni', 'ASDSDASD', 'qwqweqwe', 'Depk', '085817761841', '(12) 321-3123-3123', 'admin@prau.com', '72348.jpeg', 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', '2020-03-24 13:54:00', '2020-03-24 13:54:01'),
(61, NULL, 43, 7, 1, 'Ridwan', '22/33/1111', 'Pria', 'ASDAS', '121212121212121212', '21212122', 'Depok', '123', '(12) 313-1321-3123', 'adminkaup@kaup.or.id', '76342.jpeg', 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', '2020-03-24 13:56:59', '2020-03-24 13:56:59'),
(62, 61, 43, 7, 1, 'Testing', '2020-03-02', 'Pria', 'ASDAS', 'ASDSDASD', '21212122', 'Depk', '085817761841', '(12) 121-2121-2121', 'adminkaup@kaup.or.id', '213qe', 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', '2020-03-24 13:59:14', '2020-03-24 02:09:00'),
(63, 61, 43, 7, 1, 'Ridwan', '2020-03-09', 'Pria', 'SIM', '121212121212121212', 'qwqweqwe', 'Depk', '(12) 312-3123-2132', '(11) 111-1111-1111', 'adminkaup@kaup.or.id', '91288.jpeg', 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', '2020-03-24 14:02:24', '2020-03-24 14:02:24'),
(64, NULL, 44, 7, NULL, 'qwe', '22/33/1111', 'Pria', 'ASDAS', '1232212322123212312', 'jl Jati jajar', 'Depk', '085817761841', '(33) 333-3333-3333', 'viewdata@kaup.or.id', '14662.jpg', 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', '2020-03-24 19:07:20', '2020-03-24 19:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `foto_bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_order`, `nama_pengirim`, `bank`, `no_rek`, `jumlah`, `foto_bukti`, `session_id`, `created_at`, `updated_at`) VALUES
(3, 43, 'Ridwan', 'BCA', '2313123123', 45000, '2326.jpeg', 'G8J3QQNBG8kPElA8eSlfvokNRo3Qk2', '2020-03-24 14:13:25', '2020-03-24 14:13:25'),
(4, 44, 'Ridwan', NULL, NULL, 30000, NULL, '14', '2020-03-27 20:01:07', '2020-03-27 20:01:07'),
(5, 44, 'Endan', NULL, NULL, 30000, NULL, '14', '2020-03-27 20:26:59', '2020-03-27 20:26:59'),
(6, 44, 'Ridwan', NULL, NULL, 20000, NULL, '14', '2020-03-27 20:46:16', '2020-03-27 20:46:16'),
(7, 41, 'Endan', NULL, NULL, 30000, NULL, '14', '2020-03-28 14:17:31', '2020-03-28 14:17:31');

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
  `status` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `image`, `created_at`, `updated_at`) VALUES
(14, 'Ridwan', 'admin@prau.com', NULL, '$2y$10$OkGDnfWJFr3Q14bKiEGmPeY.n/OGf0YifYViVYnTTToLXd1C6olwa', 'uiH6mn5zY0NqnQySNFxzZtn1y9jLpxzDk7bm3iuGgmt2ty1kCV22j565EVC8i9UFWMLuKqf0sIQqMDH0', 1, '24826.jpg', '2020-03-13 08:31:22', '2020-03-13 08:31:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dendas`
--
ALTER TABLE `dendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jalur_pendakians`
--
ALTER TABLE `jalur_pendakians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendakis`
--
ALTER TABLE `pendakis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
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
-- AUTO_INCREMENT for table `dendas`
--
ALTER TABLE `dendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jalur_pendakians`
--
ALTER TABLE `jalur_pendakians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pendakis`
--
ALTER TABLE `pendakis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
