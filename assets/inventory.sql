-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 02:01 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courses_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `decoration`
--

CREATE TABLE `decoration` (
  `id_decor` int(11) NOT NULL,
  `kode` varchar(35) NOT NULL,
  `kunci` varchar(35) NOT NULL,
  `img` varchar(255) NOT NULL,
  `icons` varchar(255) NOT NULL,
  `tipe` char(1) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decoration`
--

INSERT INTO `decoration` (`id_decor`, `kode`, `kunci`, `img`, `icons`, `tipe`, `id_theme`) VALUES
(7, 'pengaturan', 'pengaturan', 'pengaturan.png', '<i class=\"fas fa-cog\"></i>', 'a', 7),
(9, 'user', 'user', 'user.png', '<i class=\"fas fa-address-card\"></i>', 'c', 7),
(11, 'operations', 'operations', 'operations.png', '<i class=\"fas fa-concierge-bell\"></i>', 'f', 7),
(12, 'decoration', 'decoration', 'decoration.png', '<i class=\"fas fa-snowman\"></i>', 'b', 7),
(13, 'home', 'home', 'home.png', '<i class=\"fas fa-home\"></i>', '0', 7),
(14, 'login', 'login', 'login.png', '<i class=\"fas fa-sign-in-alt\"></i>', '0', 7),
(15, 'signup', 'signup', 'signup.png', '<i class=\"fas fa-user-plus\"></i>', '0', 7),
(16, 'dashboard', 'dashboard', 'dashboard.png', '<i class=\"fas fa-desktop\"></i>', '0', 7),
(17, 'no-level', 'no-level', 'no-level.png', '<i class=\"fas fa-user-slash\"></i>', '0', 7),
(19, 'events', 'events', 'events.png', '<i class=\"fas fa-calendar-alt\"></i>', 'b', 7),
(20, 'website_licenses', 'website_licenses', 'website_licenses.png', '<i class=\"fas fa-check-square\"></i>', 'b', 7),
(21, 'website_sosmed', 'website_sosmed', 'website_sosmed.png', '<i class=\"fab fa-instagram-square\"></i>', 'b', 7),
(22, 'template', 'template', 'template.png', '<i class=\"fas fa-dice-d6\"></i>', '0', 7),
(23, '404', '404', '404.png', '<i class=\"far fa-times-circle\"></i>', '0', 7),
(24, 'website_themes', 'website_themes', 'website_themes.png', '<i class=\"fas fa-umbrella-beach\"></i>', 'b', 7),
(25, 'migrations', 'migrations', 'migrations.png', '<i class=\"fas fa-database\"></i>', 'b', 7),
(26, 'failed_jobs', 'failed_jobs', 'failed_jobs.png', '<i class=\"far fa-frown\"></i>', 'b', 7),
(27, 'website_notif_type', 'website_notif_type', 'website_notif_type.png', '<i class=\"fas fa-flag\"></i>', 'b', 7),
(28, 'website_notifications', 'website_notifications', 'website_notifications.png', '<i class=\"fas fa-bell\"></i>', 'b', 7),
(29, 'personal_access_tokens', 'personal_access_tokens', 'personal_access_tokens.png', '<i class=\"fas fa-key\"></i>', 'd', 7),
(30, 'failed_jobs', 'failed_jobs', 'failed_jobs.png', '<i class=\"fas fa-unlock-alt\"></i>', 'b', 7),
(31, 'login_histories', 'login_histories', 'login_histories.png', '<i class=\"fas fa-laptop-house\"></i>', 'd', 7),
(32, 'obat', 'obat', 'obat.jpg', '<i class=\"fas fa-pills\"></i>', 'a', 7),
(33, 'tb_barang', 'tb_barang', 'tb_barang.jpg', '<i class=\"fas fa-boxes\"></i>', 'e', 7);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `nama`, `slogan`, `img`, `keterangan`, `status`, `id_theme`) VALUES
(1, 'Birthday Party', 'Rayakan Ulang Tahun Anda dengan Kecemerlangan yang Menggetarkan!', '.jpg', 'Pulang hari, tersenyum di HOTEL HEBAT. Di sana, mimpi-mimpi dihargai, dan momen-momen dijadikan berharga. Di antara dekorasi kamar yang dipenuhi cinta dan kue ulang tahun yang menggoda, Anda merasa disambut dengan hangat oleh keluarga yang baru ditemukan. Saat Anda berendam dalam kebahagiaan, tak ada lagi ruang untuk kekhawatiran. Di HOTEL HEBAT, kami memahami arti sejati dari perayaan, dan dengan setiap sentuhan, kami berjanji untuk merangkul hati Anda.', 'aktif', 1),
(2, 'Gerhana Matahari', 'Saksikan Keajaiban Langit dengan Gemerlap Kecemerlangan di HOTEL HEBAT!', '.jpeg', '<p>Saksikan keajaiban gerhana matahari di HOTEL HEBAT! Dengan lokasi yang sempurna untuk menikmati pemandangan langit yang memukau, kami siap memberikan pengalaman tak terlupakan saat Anda menyaksikan fenomena alam yang langka ini. Bergabunglah dengan kami untuk momen yang menggetarkan hati ini!</p>\r\n', 'aktif', 1),
(3, 'Anniversary 1 tahun', 'Selamat Anniversary', 'Anniversary_1_tahun.jpg', '<p>Selamat anniversary HOTEL HEBAT.</p>\r\n', 'nonaktif', 1),
(4, 'Launching Levato', 'Levato: Solusi Terdepan untuk Memulai Bisnis Anda!', 'Launching_Levato.png', '<p>Sambut peluncuran website baru Levato dengan antusias!</p>\r\n\r\n<p>Kami hadir dengan tampilan baru yang lebih segar dan fitur-fitur inovatif yang akan membantu Anda memulai bisnis Anda dengan mudah.</p>\r\n\r\n<p>Dapatkan akses langsung ke layanan pembuatan izin usaha yang praktis dan cepat, serta panduan lengkap untuk mengurus bisnis Anda dengan lancar.</p>\r\n\r\n<p>Bersama Levato, Anda tidak hanya memulai bisnis, tapi juga mengawali perjalanan menuju kesuksesan yang lebih besar! Jangan lewatkan peluncuran istimewa ini dan jadilah bagian dari revolusi bisnis!</p>\r\n', 'aktif', 3),
(5, 'Hari UMKM Nasional - 12 Agt', 'Selamat UMKM Nasional', 'Hari_UMKM_Nasional_-_12_Agt.jpg', '<p>Hari UMKM Nasional adalah momen istimewa di mana kita merayakan peran penting Usaha Mikro, Kecil, dan Menengah (UMKM) dalam perekonomian Indonesia. Sebagai tonggak yang menghargai kerja keras, inovasi, dan ketahanan ekonomi lokal, Hari UMKM Nasional adalah kesempatan bagi kita semua untuk mengapresiasi kontribusi UMKM dalam memajukan ekonomi negara dan meningkatkan kesejahteraan masyarakat.</p>\r\n', 'nonaktif', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_histories`
--

CREATE TABLE `login_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `device_type` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_histories`
--

INSERT INTO `login_histories` (`id`, `id_user`, `created_at`, `updated_at`, `device_type`) VALUES
(1, 1, '2024-05-05 05:48:47', '2024-05-05 05:48:47', 'Desktop'),
(2, 1, '2024-05-05 07:42:47', '2024-05-05 07:42:47', 'Desktop'),
(3, 1, '2024-05-05 09:33:07', '2024-05-05 09:33:07', 'Desktop'),
(4, 1, '2024-05-05 13:38:59', '2024-05-05 13:38:59', 'Desktop'),
(5, 1, '2024-05-05 14:21:45', '2024-05-05 14:21:45', 'Desktop'),
(6, 1, '2024-05-06 01:35:30', '2024-05-06 01:35:30', 'Desktop'),
(7, 1, '2024-05-06 01:35:30', '2024-05-06 01:35:30', 'Desktop'),
(8, 1, '2024-05-06 08:31:47', '2024-05-06 08:31:47', 'Desktop'),
(9, 1, '2024-05-06 09:13:28', '2024-05-06 09:13:28', 'Desktop'),
(10, 1, '2024-05-06 09:43:40', '2024-05-06 09:43:40', 'Desktop'),
(11, 1, '2024-05-06 11:58:24', '2024-05-06 11:58:24', 'Desktop'),
(12, 1, '2024-05-06 12:10:40', '2024-05-06 12:10:40', 'Desktop'),
(13, 1, '2024-05-06 12:29:17', '2024-05-06 12:29:17', 'Desktop'),
(14, 2, '2024-05-06 12:39:35', '2024-05-06 12:39:35', 'Desktop'),
(15, 1, '2024-05-06 12:43:48', '2024-05-06 12:43:48', 'Desktop'),
(16, 1, '2024-05-06 13:06:00', '2024-05-06 13:06:00', 'Desktop'),
(17, 1, '2024-05-06 13:07:02', '2024-05-06 13:07:02', 'Desktop'),
(18, 1, '2024-05-06 13:15:04', '2024-05-06 13:15:04', 'Desktop'),
(19, 1, '2024-05-06 13:31:32', '2024-05-06 13:31:32', 'Desktop'),
(20, 1, '2024-05-06 13:32:45', '2024-05-06 13:32:45', 'Desktop'),
(21, 1, '2024-05-06 15:30:34', '2024-05-06 15:30:34', 'Desktop'),
(22, 1, '2024-05-06 15:56:35', '2024-05-06 15:56:35', 'Desktop'),
(23, 1, '2024-05-07 04:19:22', '2024-05-07 04:19:22', 'Desktop'),
(24, 1, '2024-05-07 11:24:18', '2024-05-07 11:24:18', 'Desktop'),
(25, 1, '2024-05-07 13:44:25', '2024-05-07 13:44:25', 'Desktop on Windows'),
(26, 1, '2024-05-07 13:49:29', '2024-05-07 13:49:29', 'Desktop on Windows'),
(31, 1, '2024-05-07 14:10:02', '2024-05-07 14:10:02', 'Desktop on Windows'),
(32, 2, '2024-05-07 14:10:20', '2024-05-07 14:10:20', 'Desktop on Windows'),
(34, 4, '2024-05-07 14:10:50', '2024-05-07 14:10:50', 'Desktop on Windows'),
(35, 5, '2024-05-07 14:11:07', '2024-05-07 14:11:07', 'Desktop on Windows'),
(36, 6, '2024-05-07 14:11:23', '2024-05-07 14:11:23', 'Desktop on Windows'),
(37, 7, '2024-05-07 14:11:36', '2024-05-07 14:11:36', 'Desktop on Windows'),
(38, 1, '2024-05-08 03:53:19', '2024-05-08 03:53:19', 'Desktop on Windows'),
(39, 1, '2024-05-08 08:09:19', '2024-05-08 08:09:19', 'Desktop on Windows'),
(40, 1, '2024-05-08 08:29:59', '2024-05-08 08:29:59', 'Desktop (Unknown OS)'),
(41, 1, '2024-05-08 08:43:28', '2024-05-08 08:43:28', 'Desktop on Windows'),
(42, 2, '2024-05-08 08:43:40', '2024-05-08 08:43:40', 'Desktop on Windows'),
(43, 1, '2024-05-08 14:13:56', '2024-05-08 14:13:56', 'Desktop on Windows'),
(44, 1, '2024-05-08 23:31:10', '2024-05-08 23:31:10', 'Desktop on Windows'),
(45, 1, '2024-05-09 06:44:09', '2024-05-09 06:44:09', 'Desktop on Windows'),
(46, 1, '2024-05-10 00:05:05', '2024-05-10 00:05:05', 'Desktop on Windows'),
(47, 1, '2024-05-10 00:47:45', '2024-05-10 00:47:45', 'Desktop on Windows'),
(48, 1, '2024-05-10 00:52:47', '2024-05-10 00:52:47', 'Desktop on Windows'),
(51, 1, '2024-05-10 02:37:49', '2024-05-10 02:37:49', 'Desktop on Windows'),
(52, 2, '2024-05-10 02:38:00', '2024-05-10 02:38:00', 'Desktop on Windows'),
(54, 1, '2024-05-10 02:47:03', '2024-05-10 02:47:03', 'Desktop on Windows'),
(57, 1, '2024-05-10 09:26:25', '2024-05-10 09:26:25', 'Desktop on Windows'),
(58, 1, '2024-05-10 11:31:18', '2024-05-10 11:31:18', 'Desktop on Windows'),
(59, 1, '2024-05-10 12:52:14', '2024-05-10 12:52:14', 'Desktop on Windows'),
(60, 1, '2024-05-11 03:50:23', '2024-05-11 03:50:23', 'Desktop on Windows'),
(61, 1, '2024-05-11 05:41:00', '2024-05-11 05:41:00', 'Desktop on Windows'),
(62, 1, '2024-05-11 09:10:56', '2024-05-11 09:10:56', 'Desktop on Windows'),
(63, 1, '2024-05-11 09:12:19', '2024-05-11 09:12:19', 'Desktop on Windows'),
(64, 1, '2024-05-11 09:14:39', '2024-05-11 09:14:39', 'Desktop on Windows'),
(65, 1, '2024-05-11 09:29:55', '2024-05-11 09:29:55', 'Desktop on Windows'),
(66, 1, '2024-05-11 09:30:24', '2024-05-11 09:30:24', 'Desktop on Windows'),
(67, 1, '2024-05-13 06:07:13', '2024-05-13 06:07:13', 'Desktop on Windows'),
(68, 1, '2024-05-13 06:56:23', '2024-05-13 06:56:23', 'Desktop on Windows'),
(69, 1, '2024-05-13 07:30:49', '2024-05-13 07:30:49', 'Desktop on Windows'),
(74, 3, '2024-05-13 14:03:58', '2024-05-13 14:03:58', 'Desktop on Windows'),
(75, 3, '2024-05-13 14:06:06', '2024-05-13 14:06:06', 'Desktop on Windows'),
(76, 3, '2024-05-13 14:06:14', '2024-05-13 14:06:14', 'Desktop on Windows'),
(78, 8, '2024-05-13 14:07:33', '2024-05-13 14:07:33', 'Desktop on Windows'),
(79, 3, '2024-05-13 14:14:21', '2024-05-13 14:14:21', 'Desktop on Windows'),
(80, 1, '2024-05-13 14:14:40', '2024-05-13 14:14:40', 'Desktop on Windows'),
(81, 1, '2024-05-13 14:19:13', '2024-05-13 14:19:13', 'Desktop on Windows'),
(82, 1, '2024-05-13 14:21:22', '2024-05-13 14:21:22', 'Desktop on Windows'),
(83, 1, '2024-05-13 14:23:30', '2024-05-13 14:23:30', 'Desktop on Windows'),
(84, 1, '2024-05-13 14:30:25', '2024-05-13 14:30:25', 'Desktop on Windows'),
(85, 1, '2024-05-14 12:35:22', '2024-05-14 12:35:22', 'Desktop on Windows'),
(86, 1, '2024-05-14 23:30:44', '2024-05-14 23:30:44', 'Desktop on Windows'),
(87, 1, '2024-05-15 06:33:01', '2024-05-15 06:33:01', 'Desktop on Windows'),
(88, 1, '2024-05-15 07:15:17', '2024-05-15 07:15:17', 'Desktop on Windows'),
(89, 1, '2024-05-17 02:22:24', '2024-05-17 02:22:24', 'Desktop on Windows'),
(90, 2, '2024-05-17 03:20:02', '2024-05-17 03:20:02', 'Desktop on Windows'),
(91, 2, '2024-05-17 13:32:13', '2024-05-17 13:32:13', 'Desktop on Windows'),
(92, 1, '2024-05-17 13:32:25', '2024-05-17 13:32:25', 'Desktop on Windows'),
(93, 1, '2024-05-17 22:43:02', '2024-05-17 22:43:02', 'Desktop on Windows'),
(94, 1, '2024-05-17 23:24:45', '2024-05-17 23:24:45', 'Desktop on Windows'),
(95, 1, '2024-05-18 01:36:24', '2024-05-18 01:36:24', 'Desktop on Windows'),
(96, 2, '2024-05-18 01:36:33', '2024-05-18 01:36:33', 'Desktop on Windows'),
(97, 3, '2024-05-18 01:39:08', '2024-05-18 01:39:08', 'Desktop on Windows'),
(98, 1, '2024-05-18 01:58:40', '2024-05-18 01:58:40', 'Desktop on Windows'),
(99, 3, '2024-05-18 02:04:30', '2024-05-18 02:04:30', 'Desktop on Windows'),
(100, 2, '2024-05-18 02:39:17', '2024-05-18 02:39:17', 'Desktop on Windows'),
(101, 3, '2024-05-18 03:38:09', '2024-05-18 03:38:09', 'Desktop on Windows'),
(102, 3, '2024-05-18 14:38:33', '2024-05-18 14:38:33', 'Desktop on Windows'),
(103, 3, '2024-05-19 05:09:22', '2024-05-19 05:09:22', 'Desktop on Windows'),
(104, 3, '2024-05-19 10:54:48', '2024-05-19 10:54:48', 'Desktop on Windows'),
(105, 3, '2024-05-19 10:57:09', '2024-05-19 10:57:09', 'Desktop on Windows'),
(106, 3, '2024-05-19 10:59:40', '2024-05-19 10:59:40', 'Desktop on Windows'),
(107, 1, '2024-05-19 10:59:50', '2024-05-19 10:59:50', 'Desktop on Windows'),
(108, 1, '2024-05-19 11:05:09', '2024-05-19 11:05:09', 'Desktop on Windows'),
(109, 3, '2024-05-19 11:22:50', '2024-05-19 11:22:50', 'Desktop on Windows'),
(110, 3, '2024-05-19 14:16:33', '2024-05-19 14:16:33', 'Android (Mobile)'),
(111, 1, '2024-05-20 02:05:42', '2024-05-20 02:05:42', 'Desktop on Windows'),
(112, 1, '2024-05-20 07:03:08', '2024-05-20 07:03:08', 'Desktop on Windows'),
(113, 1, '2024-05-20 08:44:56', '2024-05-20 08:44:56', 'Desktop on Windows'),
(114, 1, '2024-05-20 12:21:37', '2024-05-20 12:21:37', 'Desktop on Windows'),
(115, 1, '2024-05-21 05:27:17', '2024-05-21 05:27:17', 'Desktop on Windows'),
(116, 1, '2024-05-22 00:24:04', '2024-05-22 00:24:04', 'Desktop on Windows'),
(117, 1, '2024-05-22 03:40:59', '2024-05-22 03:40:59', 'Desktop on Windows'),
(118, 1, '2024-05-22 06:22:56', '2024-05-22 06:22:56', 'Desktop on Windows'),
(119, 3, '2024-05-22 08:03:50', '2024-05-22 08:03:50', 'Desktop on Windows'),
(120, 3, '2024-05-22 08:04:30', '2024-05-22 08:04:30', 'Desktop on Windows'),
(121, 1, '2024-05-22 11:09:55', '2024-05-22 11:09:55', 'Desktop on Windows'),
(122, 1, '2024-05-22 16:53:50', '2024-05-22 16:53:50', 'Desktop on Windows'),
(123, 1, '2024-05-23 03:31:25', '2024-05-23 03:31:25', 'Desktop on Windows'),
(124, 1, '2024-05-24 02:30:16', '2024-05-24 02:30:16', 'Desktop on Windows'),
(125, 1, '2024-05-24 04:11:04', '2024-05-24 04:11:04', 'Desktop on Windows'),
(126, 1, '2024-05-24 08:37:18', '2024-05-24 08:37:18', 'Desktop on Windows'),
(127, 1, '2024-05-25 00:07:44', '2024-05-25 00:07:44', 'Desktop on Windows'),
(128, 1, '2024-05-25 00:09:08', '2024-05-25 00:09:08', 'Desktop on Windows'),
(129, 1, '2024-05-25 00:23:34', '2024-05-25 00:23:34', 'Desktop on Windows'),
(130, 1, '2024-05-25 00:33:24', '2024-05-25 00:33:24', 'Desktop on Windows'),
(131, 2, '2024-05-25 00:33:40', '2024-05-25 00:33:40', 'Desktop on Windows'),
(132, 1, '2024-05-25 02:01:57', '2024-05-25 02:01:57', 'Desktop on Windows'),
(133, 1, '2024-05-25 04:43:08', '2024-05-25 04:43:08', 'Desktop on Windows'),
(134, 3, '2024-05-25 08:29:01', '2024-05-25 08:29:01', 'Desktop on Windows'),
(135, 1, '2024-05-25 08:45:31', '2024-05-25 08:45:31', 'Desktop on Windows'),
(136, 1, '2024-05-26 06:22:59', '2024-05-26 06:22:59', 'Desktop on Windows'),
(137, 1, '2024-05-26 13:01:11', '2024-05-26 13:01:11', 'Desktop on Windows'),
(138, 1, '2024-05-26 14:04:53', '2024-05-26 14:04:53', 'Desktop on Windows'),
(139, 1, '2024-05-27 00:18:35', '2024-05-27 00:18:35', 'Desktop on Windows'),
(140, 1, '2024-05-27 04:03:26', '2024-05-27 04:03:26', 'Desktop on Windows'),
(141, 1, '2024-05-27 04:31:42', '2024-05-27 04:31:42', 'Desktop on Windows'),
(142, 1, '2024-05-27 13:34:46', '2024-05-27 13:34:46', 'Desktop on Windows'),
(143, 1, '2024-05-29 12:54:48', '2024-05-29 12:54:48', 'Desktop on Windows'),
(144, 3, '2024-05-30 01:17:19', '2024-05-30 01:17:19', 'Desktop on Windows'),
(145, 3, '2024-05-30 09:13:42', '2024-05-30 09:13:42', 'Desktop on Windows'),
(146, 1, '2024-05-30 09:13:53', '2024-05-30 09:13:53', 'Desktop on Windows'),
(147, 1, '2024-05-30 12:12:32', '2024-05-30 12:12:32', 'Desktop on Windows'),
(148, 1, '2024-05-31 02:34:32', '2024-05-31 02:34:32', 'Desktop on Windows'),
(149, 1, '2024-05-31 02:51:01', '2024-05-31 02:51:01', 'Desktop on Windows'),
(150, 1, '2024-05-31 06:54:20', '2024-05-31 06:54:20', 'Desktop on Windows'),
(151, 1, '2024-05-31 11:01:55', '2024-05-31 11:01:55', 'Desktop on Windows'),
(152, 1, '2024-06-01 09:42:15', '2024-06-01 09:42:15', 'Desktop on Windows'),
(153, 1, '2024-06-03 12:46:34', '2024-06-03 12:46:34', 'Desktop on Windows'),
(154, 1, '2024-06-04 01:26:31', '2024-06-04 01:26:31', 'Desktop on Windows'),
(155, 1, '2024-06-04 07:35:49', '2024-06-04 07:35:49', 'Desktop on Windows'),
(156, 1, '2024-06-04 07:49:18', '2024-06-04 07:49:18', 'Desktop on Windows'),
(157, 1, '2024-06-04 07:50:02', '2024-06-04 07:50:02', 'Desktop on Windows'),
(158, 1, '2024-06-04 07:51:31', '2024-06-04 07:51:31', 'Desktop on Windows'),
(159, 1, '2024-06-04 07:52:11', '2024-06-04 07:52:11', 'Desktop on Windows'),
(160, 3, '2024-06-05 03:38:53', '2024-06-05 03:38:53', 'Desktop on Windows'),
(161, 1, '2024-06-05 03:42:47', '2024-06-05 03:42:47', 'Desktop on Windows'),
(162, 1, '2024-06-05 03:48:27', '2024-06-05 03:48:27', 'Desktop on Windows'),
(163, 1, '2024-06-05 08:12:11', '2024-06-05 08:12:11', 'Desktop on Windows'),
(164, 1, '2024-06-05 08:12:58', '2024-06-05 08:12:58', 'Desktop on Windows'),
(165, 1, '2024-06-05 10:22:35', '2024-06-05 10:22:35', 'Desktop on Windows'),
(166, 1, '2024-06-05 12:57:33', '2024-06-05 12:57:33', 'Desktop on Windows'),
(167, 1, '2024-06-06 06:27:46', '2024-06-06 06:27:46', 'Desktop on Windows'),
(168, 1, '2024-06-06 14:33:16', '2024-06-06 14:33:16', 'Desktop on Windows'),
(169, 1, '2024-06-06 14:40:50', '2024-06-06 14:40:50', 'Desktop on Windows'),
(170, 5, '2024-06-06 15:00:24', '2024-06-06 15:00:24', 'Desktop on Windows'),
(171, 1, '2024-06-06 15:07:19', '2024-06-06 15:07:19', 'Desktop on Windows'),
(172, 5, '2024-06-06 15:18:28', '2024-06-06 15:18:28', 'Desktop on Windows'),
(173, 5, '2024-06-06 15:35:42', '2024-06-06 15:35:42', 'Desktop on Windows'),
(174, 5, '2024-06-06 15:49:11', '2024-06-06 15:49:11', 'Desktop on Windows'),
(175, 5, '2024-06-06 16:12:21', '2024-06-06 16:12:21', 'Desktop on Windows'),
(176, 5, '2024-06-06 16:45:03', '2024-06-06 16:45:03', 'Desktop on Windows'),
(177, 1, '2024-06-06 13:02:18', '2024-06-06 13:02:18', 'Desktop on Windows'),
(178, 1, '2024-06-06 13:28:04', '2024-06-06 13:28:04', 'Desktop on Windows'),
(179, 1, '2024-06-06 13:29:58', '2024-06-06 13:29:58', 'Desktop on Windows'),
(180, 1, '2024-06-06 13:45:21', '2024-06-06 13:45:21', 'Desktop on Windows');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_01_27_164100_create_faculties_table', 1),
(5, '2024_01_27_164108_create_majors_table', 1),
(6, '2024_01_29_163913_create_institutions_table', 1),
(7, '2024_01_29_163946_create_languages_table', 1),
(8, '2024_01_29_164021_create_categories_table', 1),
(9, '2024_01_29_164025_create_users_table', 1),
(10, '2024_01_29_170452_create_books_table', 1),
(11, '2024_01_29_171541_create_book_moves_table', 1),
(12, '2024_01_29_172044_create_comments_table', 1),
(13, '2024_02_01_023838_create_wish_lists_table', 1),
(14, '2024_02_25_110659_create_login_histories_table', 1);

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
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_lisensi` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_website`, `alamat`, `email`, `hp`, `id_event`, `id_lisensi`, `id_tema`) VALUES
(1, 'BarangMaster', 'Jl Peternakan Dlm III 36, Dki Jakarta', 'barangmaster@gmail.com', '0-21-541-3829', 1, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(14, 'App\\Models\\User', 3, 'AuthToken', '0b1376526ff5b0122524524863f33dd0589f2313d6e748b3a8854181e05282f4', '[\"*\"]', '2024-04-03 02:31:47', '2024-04-02 19:29:07', '2024-04-03 02:31:47'),
(15, 'App\\Models\\User', 3, 'AuthTokenRefresh', '23f54ec93cae16377180189fa718765897831afeb2715171c4c907c78efdde7f', '[\"*\"]', NULL, '2024-04-02 19:29:07', '2024-04-02 19:29:07'),
(22, 'App\\Models\\User', 1, 'AuthToken', 'ac546868b7edfca4fb30fda0351d87d87b908c9766189c59d055a42a32f194d6', '[\"*\"]', '2024-04-03 02:55:19', '2024-04-03 01:38:10', '2024-04-03 02:55:19'),
(23, 'App\\Models\\User', 1, 'AuthTokenRefresh', '034848e38d7781ade84bbf31f70c8f7dc23be7567e1a5217dd96e9a0623f0fec', '[\"*\"]', NULL, '2024-04-03 01:38:10', '2024-04-03 01:38:10'),
(24, 'App\\Models\\User', 4, 'AuthToken', 'a72de5c22c948a0e8f60da0ba2f4c6e60b14723e4e840c721cbdfaed2bd348fa', '[\"*\"]', NULL, '2024-04-03 02:30:37', '2024-04-03 02:30:37'),
(25, 'App\\Models\\User', 4, 'AuthTokenRefresh', '808d378e8b1c866296d2990c8623abbc163f8acaf9f9c56eef2db5d289393248', '[\"*\"]', NULL, '2024-04-03 02:30:37', '2024-04-03 02:30:37'),
(26, 'App\\Models\\User', 2, 'AuthToken', '488eb219b4e23eb71503542a238365288210ec61d223faa581de05092b96be36', '[\"*\"]', '2024-04-03 03:06:51', '2024-04-03 02:58:53', '2024-04-03 03:06:51'),
(27, 'App\\Models\\User', 2, 'AuthTokenRefresh', 'e2678e3d76ab798a27f8a0e2b88a3417975a0f1afba8ff01fdcd33a0e6575825', '[\"*\"]', NULL, '2024-04-03 02:58:53', '2024-04-03 02:58:53'),
(28, 'App\\Models\\User', 3, 'AuthToken', '55ffba7c904b85e593cd7346d34044600bac36958e099cdcd6242f694220955f', '[\"*\"]', NULL, '2024-04-03 03:06:33', '2024-04-03 03:06:33'),
(29, 'App\\Models\\User', 3, 'AuthTokenRefresh', '905b160fd1dc32eae95a3972f7c7cc26befe9660ad4a62f93026e075738ddb29', '[\"*\"]', NULL, '2024-04-03 03:06:33', '2024-04-03 03:06:33'),
(30, 'App\\Models\\User', 1, 'authToken', '875c12bf91c3f8bd20223252bfca0b54b3e3681339332df8ce262a1269933829', '[\"*\"]', NULL, '2024-04-06 05:35:04', '2024-04-06 05:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` char(8) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `produsen` varchar(100) NOT NULL,
  `harga_beli` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `jenis`, `satuan`, `merk`, `produsen`, `harga_beli`) VALUES
('BRG00001', 'Televisi LED 32\"', 'Elektronik', 'pcs', 'Samsung', 'Samsung Electronics', 3000000),
('BRG00002', 'Sepatu Olahraga', 'Pakaian', 'pcs', 'Nike', 'PT. Nike Indonesia', 800000),
('BRG00003', 'Susu Bubuk', 'Makanan', 'box', 'Nestle', 'PT. Nestlé Indonesia', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `hp` varchar(13) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `hp`, `level`) VALUES
(1, 'Khen', 'khen@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '081234567890', 'administrator'),
(4, 'John', 'john@gmail.com', '$2y$10$9rDj5P1YkmIbbbZj0h4o2OIIPS7rYHp2seftk7BuugRIyxVbZIbv2', '082287394758', 'administrator'),
(5, 'Kara', 'kara@gmail.com', '$2y$10$pj.WUQKMFS4IbOmyat7YvuqRATmu.MlYzt3GLOALnTt1SX0G9DM6i', '082287394758', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `website_licenses`
--

CREATE TABLE `website_licenses` (
  `id_lisensi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `img` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_licenses`
--

INSERT INTO `website_licenses` (`id_lisensi`, `nama`, `konten`, `img`, `link`, `status`, `id_theme`) VALUES
(8, 'CC BY 4.0', '<p>You are free to:<br />\r\n1.&nbsp;Share &mdash; copy and redistribute the material in any medium or format for any purpose, even commercially.<br />\r\n2.&nbsp;Adapt &mdash; remix, transform, and build upon the material for any purpose, even commercially. The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by.png', 'https://creativecommons.org/licenses/by/4.0/', 'mati', 7),
(9, 'CC BY-SA 4.0', '<p>You are free to:<br />\r\n1.&nbsp;Share &mdash; copy and redistribute the material in any medium or format for any purpose, even commercially.<br />\r\n2. Adapt &mdash; remix, transform, and build upon the material for any purpose, even commercially. The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1. Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;ShareAlike &mdash; If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.<br />\r\n3.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-sa.png', 'https://creativecommons.org/licenses/by-sa/4.0/', 'mati', 7),
(10, 'CC BY-NC 4.0', '<p>You are free to:<br />\r\n1. Share &mdash; copy and redistribute the material in any medium or format<br />\r\n2.&nbsp;Adapt &mdash; remix, transform, and build upon the material The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;NonCommercial &mdash; You may not use the material for commercial purposes .<br />\r\n3.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-nc.png', 'https://creativecommons.org/licenses/by-nc/4.0/', 'mati', 7),
(11, 'CC BY-NC-SA 4.0', '<p>You are free to:<br />\r\n1.&nbsp;Share &mdash; copy and redistribute the material in any medium or format<br />\r\n2.&nbsp;Adapt &mdash; remix, transform, and build upon the material The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;NonCommercial &mdash; You may not use the material for commercial purposes .<br />\r\n3.&nbsp;ShareAlike &mdash; If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.<br />\r\n4.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-nc-sa.png', 'https://creativecommons.org/licenses/by-nc-sa/4.0/', 'aktif', 7),
(12, 'CC BY-ND 4.0', '<p>You are free to:<br />\r\n1.&nbsp;Share &mdash; copy and redistribute the material in any medium or format for any purpose, even commercially. The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;NoDerivatives &mdash; If you remix, transform, or build upon the material, you may not distribute the modified material.<br />\r\n3.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-nd.png', 'https://creativecommons.org/licenses/by-nd/4.0/', 'mati', 7),
(13, 'CC BY-NC-ND 4.0', '<p>You are free to:<br />\r\n1. Share &mdash; copy and redistribute the material in any medium or format The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2. NonCommercial &mdash; You may not use the material for commercial purposes.<br />\r\n3. NoDerivatives &mdash; If you remix, transform, or build upon the material, you may not distribute the modified material.<br />\r\n4.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-nc-nd.png', 'https://creativecommons.org/licenses/by-nc-nd/4.0/', 'mati', 7),
(14, 'CC0 1.0', '<p>No Copyright The person who associated a work with this deed has dedicated the work to the public domain by waiving all of his or her rights to the work worldwide under copyright law, including all related and neighboring rights, to the extent allowed by law.</p>\r\n', 'cc-zero.png', 'https://creativecommons.org/publicdomain/zero/1.0/', 'mati', 7),
(15, 'ISO 9001:2015', '&lt;p&gt;&lt;strong&gt;ISO 9001:&lt;/strong&gt; ISO 9001 adalah standar internasional yang mengatur sistem manajemen mutu (Quality Management System/QMS). Sertifikasi ISO 9001 menunjukkan bahwa sebuah organisasi telah memenuhi persyaratan standar internasional dalam hal manajemen mutu, termasuk kemampuan untuk menyediakan produk atau layanan yang memenuhi kebutuhan pelanggan dan persyaratan perundang-undangan yang berlaku.&lt;/p&gt;\r\n', '.jpg', 'https://www.iso.org/standard/62085.html', 'aktif', 7);

-- --------------------------------------------------------

--
-- Table structure for table `website_notifications`
--

CREATE TABLE `website_notifications` (
  `id_notif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `notif_type` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `read_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_notifications`
--

INSERT INTO `website_notifications` (`id_notif`, `id_user`, `notif_type`, `description`, `created_at`, `read_at`) VALUES
(1, 1, 'action_completed_successfully', 'Data Tema Website berhasil diubah!', '2024-05-09 18:47:13', '2024-05-08 08:03:09'),
(2, 1, 'action_completed_successfully', 'Data Tema Website berhasil diubah!', '2024-05-09 20:09:28', '2024-05-10 08:03:09'),
(3, 1, 'action_completed_successfully', 'Data Foto berhasil diubah!', '2024-05-09 21:53:56', '2024-05-10 08:03:09'),
(4, 1, 'action_completed_successfully', 'Data Foto berhasil diubah!', '2024-05-09 22:25:21', '2024-05-10 08:03:09'),
(5, 1, 'action_completed_successfully', 'Data ID Event berhasil diubah!', '2024-05-09 23:19:07', '2024-05-10 08:03:09'),
(6, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah!', '2024-05-09 23:19:52', '2024-05-10 08:03:09'),
(7, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah!', '2024-05-09 23:21:06', '2024-05-10 08:03:09'),
(8, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah!', '2024-05-09 23:22:54', '2024-05-10 08:03:09'),
(9, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah!', '2024-05-09 23:23:46', '2024-05-10 08:03:09'),
(10, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah!', '2024-05-09 23:26:25', '2024-05-10 08:03:09'),
(11, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah!', '2024-05-09 23:27:58', '2024-05-10 08:03:09'),
(12, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah!', '2024-05-09 23:33:01', '2024-05-10 08:03:09'),
(13, 1, 'action_completed_successfully', 'Data ID Event berhasil diubah!', '2024-05-10 07:58:19', '2024-05-10 08:03:09'),
(14, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah! (Notif ID) = 2', '2024-05-10 10:39:39', '2024-05-10 13:12:56'),
(15, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah! (Notif ID) = 1', '2024-05-10 10:42:42', '2024-05-10 11:16:37'),
(16, 1, 'action_completed_successfully', 'Data ID Fasilitas Kamar berhasil diubah!', '2024-05-10 11:11:08', '2024-05-10 13:12:49'),
(17, 1, 'action_completed_successfully', 'Data ID Fasilitas Kamar berhasil dihapus! (Notif ID) = ', '2024-05-10 11:12:08', '2024-05-10 12:54:39'),
(18, 1, 'action_completed_successfully', 'Data ID Fasilitas Hotel berhasil dihapus! (ID Fasilitas Hotel) = ', '2024-05-10 13:17:16', '2024-05-10 13:41:03'),
(19, 1, 'action_completed_successfully', 'Data ID Fasilitas Hotel berhasil dihapus! (ID Fasilitas Hotel) = ', '2024-05-10 13:18:22', '2024-05-10 13:41:03'),
(20, 1, 'action_completed_successfully', 'Data ID Fasilitas Hotel berhasil dihapus! (ID Fasilitas Hotel) = 12', '2024-05-10 13:26:56', '2024-05-10 13:41:03'),
(21, 3, 'action_completed_successfully', 'Data Pesanan berhasil disimpan!', '2024-05-10 13:46:16', '2024-05-30 10:19:26'),
(22, 3, 'action_completed_successfully', 'Data Transaksi berhasil disimpan!', '2024-05-10 13:48:15', '2024-05-13 21:14:29'),
(23, 3, 'action_completed_successfully', 'Data Transaksi berhasil disimpan!', '2024-05-10 13:50:08', '2024-05-18 21:46:03'),
(24, 3, 'action_completed_successfully', 'Data Pesanan berhasil diubah! (Pesanan) = 4', '2024-05-10 13:50:08', '2024-05-13 21:14:25'),
(25, 1, 'action_completed_successfully', 'Data Tema Website berhasil disimpan!', '2024-05-10 16:27:40', '2024-05-10 19:55:39'),
(26, 1, 'action_completed_successfully', 'Data Favicon berhasil diubah! (Favicon) = 3', '2024-05-10 16:28:56', '2024-05-10 19:55:39'),
(27, 1, 'action_completed_successfully', 'Data Logo berhasil diubah! (Logo) = 3', '2024-05-10 16:36:41', '2024-05-10 19:55:39'),
(28, 1, 'action_completed_successfully', 'Data Foto berhasil diubah! (ID Tema) = 3', '2024-05-10 16:43:59', '2024-05-10 19:55:39'),
(29, 1, 'action_completed_successfully', 'Data Logo berhasil diubah! (ID Tema) = 3', '2024-05-10 16:44:53', '2024-05-10 19:55:39'),
(30, 1, 'action_completed_successfully', 'Data Tema Website berhasil disimpan!', '2024-05-10 16:45:37', '2024-05-10 19:55:39'),
(31, 1, 'action_completed_successfully', 'Data Favicon berhasil diubah! (ID Tema) = 4', '2024-05-10 16:47:31', '2024-05-10 19:55:39'),
(32, 1, 'action_completed_successfully', 'Data Logo berhasil diubah! (ID Tema) = 4', '2024-05-10 16:47:51', '2024-05-10 19:55:39'),
(33, 1, 'action_completed_successfully', 'Data Foto berhasil diubah! (ID Tema) = 4', '2024-05-10 16:48:04', '2024-05-10 19:55:39'),
(34, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 31', '2024-05-10 18:07:07', '2024-05-10 19:55:39'),
(35, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 7', '2024-05-10 18:08:35', '2024-05-10 19:55:39'),
(36, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 12', '2024-05-10 18:09:10', '2024-05-10 19:55:39'),
(37, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 19', '2024-05-10 18:09:35', '2024-05-10 19:55:39'),
(38, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 25', '2024-05-10 18:09:52', '2024-05-10 19:55:39'),
(39, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 26', '2024-05-10 18:10:40', '2024-05-10 19:55:39'),
(40, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 26', '2024-05-10 18:10:59', '2024-05-10 19:55:39'),
(41, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 30', '2024-05-10 18:13:08', '2024-05-10 19:55:39'),
(42, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 24', '2024-05-10 18:13:35', '2024-05-10 19:55:39'),
(43, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 27', '2024-05-10 18:14:05', '2024-05-10 19:55:39'),
(44, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 28', '2024-05-10 18:14:23', '2024-05-10 19:55:39'),
(45, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 4', '2024-05-10 18:14:55', '2024-05-10 19:55:39'),
(46, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 9', '2024-05-10 18:15:23', '2024-05-10 19:55:39'),
(47, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 29', '2024-05-10 18:15:43', '2024-05-10 19:55:39'),
(48, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 20', '2024-05-10 18:17:17', '2024-05-10 19:55:39'),
(49, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 21', '2024-05-10 18:17:39', '2024-05-10 19:55:39'),
(50, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 11', '2024-05-10 18:18:14', '2024-05-10 19:55:39'),
(51, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 1', '2024-05-10 18:18:48', '2024-05-10 19:55:39'),
(52, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 3', '2024-05-10 18:19:10', '2024-05-10 19:55:39'),
(53, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 5', '2024-05-10 18:19:35', '2024-05-10 19:55:39'),
(54, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 2', '2024-05-10 18:19:54', '2024-05-10 19:55:39'),
(55, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 8', '2024-05-10 18:20:19', '2024-05-10 19:55:39'),
(56, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 6', '2024-05-10 18:20:51', '2024-05-10 19:55:39'),
(57, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 10', '2024-05-10 18:21:31', '2024-05-10 19:55:39'),
(58, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 24', '2024-05-10 18:35:49', '2024-05-10 19:55:39'),
(59, 1, 'action_completed_successfully', 'Data Foto berhasil diubah! (ID Tema) = 4', '2024-05-10 18:38:35', '2024-05-10 19:55:39'),
(60, 1, 'action_completed_successfully', 'Data Event Website berhasil disimpan!', '2024-05-10 19:54:02', '2024-05-10 19:55:39'),
(61, 1, 'action_completed_successfully', 'Data Event Website berhasil diubah! (Event Website) = 4', '2024-05-10 19:54:12', '2024-05-10 19:55:39'),
(62, 1, 'action_completed_successfully', 'Data Event Website berhasil disimpan!', '2024-05-10 19:55:12', '2024-05-10 19:55:39'),
(63, 1, 'action_completed_successfully', 'Data Event Website berhasil diubah! (Event Website) = 4', '2024-05-10 19:55:30', '2024-05-10 19:55:39'),
(64, 1, 'action_completed_successfully', 'Data Akun Sosial Media berhasil diubah! (Akun Sosial Media) = 4', '2024-05-11 13:01:18', '2024-05-11 16:15:23'),
(65, 1, 'action_completed_successfully', 'Data Akun Sosial Media berhasil diubah! (Akun Sosial Media) = 4', '2024-05-11 13:02:04', '2024-05-11 16:15:23'),
(66, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 4', '2024-05-11 13:04:11', '2024-05-11 16:15:23'),
(67, 1, 'action_completed_successfully', 'Data Akun Sosial Media berhasil diubah! (Akun Sosial Media) = 4', '2024-05-11 13:11:28', '2024-05-11 16:15:23'),
(68, 1, 'action_completed_successfully', 'Data Akun Sosial Media berhasil diubah! (Akun Sosial Media) = 3', '2024-05-11 13:11:43', '2024-05-11 16:15:23'),
(69, 1, 'action_completed_successfully', 'Data Akun Sosial Media berhasil diubah! (Akun Sosial Media) = 4', '2024-05-11 13:11:56', '2024-05-11 16:15:23'),
(70, 1, 'action_completed_successfully', 'Data Akun Sosial Media berhasil diubah! (Akun Sosial Media) = 4', '2024-05-11 13:13:03', '2024-05-11 16:15:23'),
(71, 1, 'action_completed_successfully', 'Data Status Lisensi berhasil diubah! (Status Lisensi) = 14', '2024-05-11 13:17:40', '2024-05-11 16:15:23'),
(72, 1, 'action_completed_successfully', 'Data Status Lisensi berhasil diubah! (Status Lisensi) = 14', '2024-05-11 13:23:40', '2024-05-11 16:15:23'),
(73, 1, 'action_completed_successfully', 'Data License berhasil diubah! (License) = 14', '2024-05-11 13:25:59', '2024-05-11 16:15:23'),
(74, 1, 'action_completed_successfully', 'Data Status Lisensi berhasil diubah! (Status Lisensi) = 11', '2024-05-11 13:29:41', '2024-05-11 16:15:23'),
(75, 1, 'action_completed_successfully', 'Data License berhasil diubah! (License) = 11', '2024-05-11 13:29:51', '2024-05-11 16:15:23'),
(76, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 3', '2024-05-11 16:11:05', '2024-05-11 16:15:23'),
(77, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah! () = ', '2024-05-11 16:12:32', '2024-05-11 16:15:23'),
(78, 1, 'action_completed_successfully', 'Data Status Lisensi berhasil diubah! (Status Lisensi) = 14', '2024-05-11 16:16:45', '2024-05-11 16:30:17'),
(79, 1, 'action_completed_successfully', 'Data Akun Sosial Media berhasil disimpan!', '2024-05-11 16:20:28', '2024-05-11 16:30:17'),
(80, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 5', '2024-05-11 16:22:33', '2024-05-11 16:30:17'),
(81, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 5', '2024-05-11 16:22:35', '2024-05-11 16:30:17'),
(82, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 5', '2024-05-11 16:26:27', '2024-05-11 16:30:17'),
(83, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 5', '2024-05-11 16:26:30', '2024-05-11 16:30:17'),
(84, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 5', '2024-05-11 16:29:41', '2024-05-11 16:30:17'),
(85, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 5', '2024-05-11 16:29:44', '2024-05-11 16:30:17'),
(86, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 5', '2024-05-11 16:29:46', '2024-05-11 16:30:17'),
(87, 1, 'action_completed_successfully', 'Data Akun Sosial Media berhasil diubah! (Akun Sosial Media) = 5', '2024-05-11 16:30:14', '2024-05-11 16:30:17'),
(88, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = 5', '2024-05-13 13:55:19', '2024-05-13 18:20:02'),
(89, 1, 'action_completed_successfully', 'Data Event Website berhasil diubah! (Event Website) = 5', '2024-05-13 14:28:31', '2024-05-13 18:20:02'),
(90, 1, 'action_completed_successfully', 'Data Event Website berhasil diubah! (Event Website) = 3', '2024-05-13 14:29:14', '2024-05-13 18:20:02'),
(91, 1, 'action_completed_successfully', 'Data Event Website berhasil diubah! (Event Website) = 5', '2024-05-13 14:30:30', '2024-05-13 18:20:02'),
(92, 1, 'action_completed_successfully', 'Data Event Website berhasil diubah! (Event Website) = 4', '2024-05-13 14:30:39', '2024-05-13 18:20:02'),
(93, 1, 'action_completed_successfully', 'Data ID Tema berhasil diubah! () = ', '2024-05-13 16:11:59', '2024-05-13 18:20:02'),
(94, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 4', '2024-05-13 17:15:00', '2024-05-13 18:20:02'),
(95, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 23', '2024-05-13 17:18:51', '2024-05-13 18:20:02'),
(96, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 22', '2024-05-13 17:19:32', '2024-05-13 18:20:02'),
(97, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 17', '2024-05-13 17:19:51', '2024-05-13 18:20:02'),
(98, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 16', '2024-05-13 17:20:16', '2024-05-13 18:20:02'),
(99, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 13', '2024-05-13 17:20:32', '2024-05-13 18:20:02'),
(100, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 15', '2024-05-13 17:20:52', '2024-05-13 18:20:02'),
(101, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = 14', '2024-05-13 17:21:06', '2024-05-13 18:20:02'),
(102, 1, 'action_completed_successfully', 'Data License berhasil diubah! (License) = ', '2024-05-13 18:30:22', '2024-05-13 21:30:31'),
(103, 1, 'action_completed_successfully', 'Data License berhasil diubah! (License) = ', '2024-05-13 18:30:28', '2024-05-13 21:30:31'),
(104, 1, 'action_completed_successfully', 'Data License berhasil diubah! (License) = ', '2024-05-13 18:30:48', '2024-05-13 21:30:31'),
(105, 1, 'action_completed_successfully', 'Data License berhasil diubah! (License) = ', '2024-05-13 18:31:14', '2024-05-13 21:30:31'),
(106, 1, 'action_completed_successfully', 'Data License berhasil diubah! (License) = ', '2024-05-13 18:31:24', '2024-05-13 21:30:31'),
(113, 3, 'informational_note', 'Selamat datang tamu Bill!', '2024-05-13 21:03:58', '2024-05-13 21:05:58'),
(114, 8, 'informational_note', 'Selamat datang tamu Duandi!', '2024-05-13 21:07:33', NULL),
(115, 1, 'informational_note', 'Selamat datang tabel_c2 Khen!', '2024-05-13 21:14:40', '2024-05-13 21:30:31'),
(116, 1, 'informational_note', 'Selamat datang tabel_c2 Khen!', '2024-05-13 21:19:13', '2024-05-13 21:29:27'),
(117, 1, 'action_completed_successfully', 'Data Event Website berhasil diubah! (Event Website) = ', '2024-05-14 21:00:18', '2024-05-15 15:40:12'),
(118, 1, 'action_completed_successfully', 'Data Event Website berhasil diubah! (Event Website) = ', '2024-05-14 21:00:24', '2024-05-15 15:40:12'),
(119, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = ', '2024-05-15 06:53:13', '2024-05-15 15:40:12'),
(120, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = ', '2024-05-15 06:53:16', '2024-05-15 15:40:12'),
(121, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = ', '2024-05-15 13:45:59', '2024-05-15 15:40:12'),
(122, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = ', '2024-05-15 13:46:01', '2024-05-15 15:40:12'),
(123, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = ', '2024-05-15 13:50:31', '2024-05-15 15:40:12'),
(124, 1, 'action_completed_successfully', 'Data Status berhasil diubah! (Status) = ', '2024-05-15 14:15:09', '2024-05-15 15:40:12'),
(125, 1, 'action_completed_successfully', 'Data Dekorasi Website berhasil diubah! (Dekorasi Website) = ', '2024-05-18 05:56:29', '2024-05-22 14:55:03'),
(126, 3, 'action_completed_successfully', 'Data Pesanan berhasil disimpan!', '2024-05-18 08:39:23', '2024-05-18 08:58:33'),
(127, 1, 'action_completed_successfully', 'Data User berhasil diubah! (User) = ', '2024-05-22 14:52:21', '2024-05-22 14:55:03'),
(128, 1, 'action_completed_successfully', 'Data ID User berhasil diubah! (ID User) = ', '2024-05-22 14:52:30', '2024-05-22 14:55:03'),
(129, 1, 'action_completed_successfully', 'Data User berhasil diubah! (User) = 1', '2024-05-22 14:53:46', '2024-05-22 14:55:03'),
(130, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status) = id', '2024-05-25 07:08:56', '2024-06-03 20:32:01'),
(131, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:12:31', '2024-06-03 20:32:01'),
(132, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:16:03', '2024-06-03 20:32:01'),
(133, 1, 'action_completed_successfully', 'Data License ID berhasil diubah! (License ID = id)', '2024-05-25 07:18:11', '2024-06-03 20:32:01'),
(134, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:26:09', '2024-06-03 20:32:01'),
(135, 1, 'action_completed_successfully', 'Data Room Facility ID berhasil dihapus! (Room Facility ID = id)', '2024-05-25 07:27:45', '2024-06-03 20:32:01'),
(136, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:30:58', '2024-06-03 20:32:01'),
(137, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:31:01', '2024-06-03 20:32:01'),
(138, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = 11)', '2024-05-25 09:02:05', '2024-06-03 20:32:01'),
(139, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = 11)', '2024-05-25 09:02:34', '2024-06-03 20:32:01'),
(140, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = 10)', '2024-05-25 09:02:37', '2024-05-31 14:50:32'),
(141, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = 10)', '2024-05-25 09:02:39', '2024-05-31 14:34:46'),
(142, 1, 'action_completed_successfully', 'Data Theme ID berhasil diubah! ( = 1)', '2024-05-31 09:50:44', '2024-05-31 14:33:13'),
(143, 1, 'action_completed_successfully', 'Data Theme ID berhasil diubah! ( = 1)', '2024-05-31 09:52:35', '2024-05-31 14:33:10'),
(144, 1, 'action_completed_successfully', 'Data Website Themes berhasil disimpan!', '2024-05-31 09:59:55', '2024-05-31 14:34:33'),
(145, 1, 'action_completed_successfully', 'Data Website Themes berhasil diubah! (Website Themes = 5)', '2024-05-31 10:00:08', '2024-05-31 14:24:06'),
(146, 1, 'action_completed_successfully', 'Data Favicon berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-05-31 10:00:17', '2024-05-31 14:33:08'),
(147, 1, 'action_completed_successfully', 'Data Logo berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-05-31 10:00:25', '2024-05-31 14:11:34'),
(148, 1, 'action_completed_successfully', 'Data Photo berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-05-31 10:00:38', '2024-05-31 14:11:27'),
(149, 1, 'action_completed_successfully', 'Data Website ID berhasil diubah! (Website ID = 1)', '2024-06-03 19:46:51', '2024-06-03 20:32:01'),
(150, 1, 'action_completed_successfully', 'Data Website Themes berhasil disimpan!', '2024-06-03 19:49:29', '2024-06-03 20:32:01'),
(151, 1, 'action_completed_successfully', 'Data Favicon berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-06-03 19:50:44', '2024-06-03 20:32:01'),
(152, 1, 'action_completed_successfully', 'Data Logo berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-06-03 19:52:06', '2024-06-03 20:32:01'),
(153, 1, 'action_completed_successfully', 'Data Photo berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-06-03 19:54:49', '2024-06-03 19:55:49'),
(154, 1, 'action_completed_successfully', 'Data Website ID berhasil diubah! (Website ID = 1)', '2024-06-03 20:02:57', '2024-06-03 20:32:01'),
(155, 1, 'action_completed_successfully', 'Data Website Themes berhasil diubah! ( = 6)', '2024-06-03 20:03:29', '2024-06-03 20:32:01'),
(156, 1, 'action_completed_successfully', 'Data Website Themes berhasil diubah! ( = 6)', '2024-06-03 20:03:45', '2024-06-03 20:32:01'),
(157, 1, 'action_completed_successfully', 'Data Website Themes berhasil diubah! ( = 6)', '2024-06-03 20:04:04', '2024-06-03 20:32:01'),
(158, 1, 'action_completed_successfully', 'Data Theme ID berhasil diubah! (Theme ID = 1)', '2024-06-03 20:04:55', '2024-06-03 20:32:01'),
(159, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:30:24', '2024-06-03 20:32:01'),
(160, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:31:56', '2024-06-03 20:32:01'),
(161, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:32:51', '2024-06-05 13:49:08'),
(162, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:33:08', '2024-06-05 13:49:08'),
(163, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:33:30', '2024-06-05 13:49:08'),
(164, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:33:46', '2024-06-05 13:49:08'),
(165, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:34:02', '2024-06-05 13:49:08'),
(166, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:34:24', '2024-06-05 13:49:08'),
(167, 1, 'action_completed_successfully', 'Data Data Obat berhasil disimpan!', '2024-06-03 20:34:39', '2024-06-05 13:49:08'),
(168, 1, 'action_completed_successfully', 'Data Kode Obat berhasil dihapus! (Kode Obat = 9)', '2024-06-03 20:50:45', '2024-06-05 13:49:08'),
(169, 1, 'action_completed_successfully', 'Data Data Obat berhasil dihapus! (Data Obat = 8)', '2024-06-03 21:04:37', '2024-06-05 13:49:08'),
(170, 1, 'action_completed_successfully', 'Data Data Obat berhasil diubah! (Data Obat = 7)', '2024-06-03 21:05:29', '2024-06-05 13:49:08'),
(171, 1, 'action_completed_successfully', 'Data Data Obat berhasil diubah! (Data Obat = 7)', '2024-06-03 21:06:01', '2024-06-05 13:49:08'),
(172, 1, 'action_completed_successfully', 'Data Website Decoration berhasil diubah! (Website Decoration = 13)', '2024-06-04 08:30:18', '2024-06-05 13:49:08'),
(173, 1, 'action_completed_successfully', 'Data Website Decoration berhasil disimpan!', '2024-06-04 08:32:41', '2024-06-05 13:49:08'),
(174, 1, 'action_completed_successfully', 'Data Website Themes berhasil diubah! (Website Themes = 6)', '2024-06-04 14:49:28', '2024-06-05 13:49:08'),
(175, 1, 'action_completed_successfully', 'Data Website Decoration berhasil diubah! (Website Decoration = 13)', '2024-06-04 14:52:00', '2024-06-05 13:49:08'),
(176, 1, 'action_completed_successfully', 'Data Website Decoration berhasil diubah! (Website Decoration = 31)', '2024-06-04 14:52:35', '2024-06-05 13:49:08'),
(177, 1, 'action_completed_successfully', 'Website Themes Data successfully updated! (ID = 6)', '2024-06-05 10:43:12', '2024-06-05 13:49:08'),
(178, 1, 'action_completed_successfully', 'Social Media Account Data successfully saved!', '2024-06-05 13:13:41', '2024-06-05 13:49:08'),
(179, 1, 'action_completed_successfully', 'Social Media Account Data successfully updated! (ID = 6)', '2024-06-05 13:14:29', '2024-06-05 13:49:08'),
(180, 1, 'action_completed_successfully', 'Social Media Account Data successfully updated! (ID = 6)', '2024-06-05 13:15:14', '2024-06-05 13:49:08'),
(181, 1, 'action_completed_successfully', 'License Status Data successfully updated! (ID = 11)', '2024-06-05 13:27:48', '2024-06-05 13:49:08'),
(182, 1, 'action_completed_successfully', 'License Status Data successfully updated! (ID = 11)', '2024-06-05 13:27:50', '2024-06-05 13:49:08'),
(183, 1, 'action_completed_successfully', 'License Status Data successfully updated! (ID = 10)', '2024-06-05 13:27:52', '2024-06-05 13:49:08'),
(184, 1, 'action_completed_successfully', 'License Status successfully updated! (ID = 13)', '2024-06-05 14:24:10', '2024-06-05 14:24:41'),
(185, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 10)', '2024-06-05 14:42:59', '2024-06-05 16:46:30'),
(186, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 8)', '2024-06-05 14:43:06', '2024-06-05 16:46:30'),
(187, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 5)', '2024-06-05 14:43:12', '2024-06-05 16:46:30'),
(188, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 2)', '2024-06-05 14:43:16', '2024-06-05 16:46:30'),
(189, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 3)', '2024-06-05 14:43:20', '2024-06-05 16:46:30'),
(190, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 1)', '2024-06-05 14:43:26', '2024-06-05 16:46:30'),
(191, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 4)', '2024-06-05 14:43:34', '2024-06-05 16:46:30'),
(192, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 6)', '2024-06-05 14:43:39', '2024-06-05 16:46:30'),
(193, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 9)', '2024-06-05 14:43:49', '2024-06-05 16:46:30'),
(194, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 7)', '2024-06-05 14:44:00', '2024-06-05 16:46:30'),
(195, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 24)', '2024-06-05 14:44:12', '2024-06-05 16:46:30'),
(196, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 28)', '2024-06-05 14:44:21', '2024-06-05 16:46:30'),
(197, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 27)', '2024-06-05 14:44:29', '2024-06-05 16:46:30'),
(198, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 22)', '2024-06-05 14:44:42', '2024-06-05 16:46:30'),
(199, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 6)', '2024-06-05 14:59:42', '2024-06-05 16:46:30'),
(200, 1, 'action_completed_successfully', 'License successfully updated! (ID = 6)', '2024-06-05 15:11:31', '2024-06-05 16:46:30'),
(201, 1, 'action_completed_successfully', 'Status successfully updated! (ID = 6)', '2024-06-05 15:12:27', '2024-06-05 16:46:30'),
(202, 1, 'action_completed_successfully', 'License Status successfully updated! (ID = 13)', '2024-06-05 15:13:10', '2024-06-05 15:20:23'),
(203, 1, 'action_completed_successfully', 'License successfully updated! (ID = 5)', '2024-06-05 16:46:01', '2024-06-05 16:46:30'),
(204, 1, 'action_completed_successfully', 'License successfully updated! (ID = 5)', '2024-06-05 16:46:04', '2024-06-05 16:46:30'),
(205, 1, 'action_completed_successfully', 'License successfully updated! (ID = 6)', '2024-06-05 16:46:11', '2024-06-05 16:46:30'),
(206, 1, 'action_completed_successfully', 'Theme ID successfully updated! (ID = 1)', '2024-06-05 20:03:57', '2024-06-05 20:05:26'),
(207, 1, 'action_completed_successfully', 'Theme ID successfully updated! (ID = 1)', '2024-06-05 20:04:12', '2024-06-05 20:05:26'),
(208, 1, 'action_completed_successfully', 'Theme ID successfully updated! (ID = 1)', '2024-06-05 20:16:02', '2024-06-05 20:16:28'),
(209, 1, 'action_completed_successfully', 'Website Themes successfully updated! (ID = 6)', '2024-06-05 20:22:44', '2024-06-05 20:46:28'),
(210, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:23:46', '2024-06-05 20:46:28'),
(211, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:24:53', '2024-06-05 20:46:28'),
(212, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:28:19', '2024-06-05 20:46:28'),
(213, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:29:01', '2024-06-05 20:46:28'),
(214, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:30:15', '2024-06-05 20:46:28'),
(215, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:30:46', '2024-06-05 20:46:28'),
(216, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:31:49', '2024-06-05 20:46:28'),
(217, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:32:02', '2024-06-05 20:46:28'),
(218, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:35:03', '2024-06-05 20:46:28'),
(219, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:36:38', '2024-06-05 20:46:28'),
(220, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:38:39', '2024-06-05 20:46:28'),
(221, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:40:19', '2024-06-05 20:46:28'),
(222, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:42:55', '2024-06-05 20:46:28'),
(223, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:44:33', '2024-06-05 20:46:28'),
(224, 1, 'action_completed_successfully', 'Favicon successfully updated! (ID = 6)', '2024-06-05 20:45:39', '2024-06-05 20:46:28'),
(225, 1, 'action_completed_successfully', 'Theme ID successfully updated! (ID = 1)', '2024-06-06 13:27:52', '2024-06-06 14:44:08'),
(226, 1, 'action_completed_successfully', 'Obat successfully saved!', '2024-06-06 13:28:07', '2024-06-06 14:44:08'),
(227, 1, 'action_completed_successfully', 'Obat successfully saved!', '2024-06-06 13:35:47', '2024-06-06 14:44:08'),
(228, 1, 'action_completed_successfully', 'Obat successfully saved!', '2024-06-06 13:44:49', '2024-06-06 14:44:08'),
(229, 1, 'action_completed_successfully', 'Social Media Account successfully deleted! (ID = 3)', '2024-06-06 13:45:22', '2024-06-06 14:44:08'),
(230, 1, 'action_completed_successfully', 'Obat successfully deleted! (ID = MED00001)', '2024-06-06 13:46:18', '2024-06-06 14:44:08'),
(231, 1, 'action_completed_successfully', 'Obat successfully deleted! (ID = MED00002)', '2024-06-06 13:46:23', '2024-06-06 14:44:08'),
(232, 1, 'action_completed_successfully', 'User successfully saved!', '2024-06-06 14:59:02', '2024-06-06 20:18:13'),
(233, 1, 'action_completed_successfully', 'User successfully saved!', '2024-06-06 15:00:12', '2024-06-06 20:18:13'),
(234, 1, 'action_completed_successfully', 'Obat successfully updated! (ID = MED00010)', '2024-06-06 15:16:17', '2024-06-06 20:18:13'),
(235, 1, 'action_completed_successfully', 'Obat successfully updated! (ID = MED00010)', '2024-06-06 15:16:23', '2024-06-06 20:18:13'),
(236, 5, 'action_completed_successfully', 'Obat successfully updated! (ID = MED00008)', '2024-06-06 15:19:24', NULL),
(237, 5, 'action_completed_successfully', 'Obat successfully saved!', '2024-06-06 15:23:24', NULL),
(238, 5, 'action_completed_successfully', 'Obat berhasil dihapus! (ID = MED00003)', '2024-06-06 15:45:10', NULL),
(239, 5, 'action_completed_successfully', 'Obat berhasil dihapus! (ID = MED00011)', '2024-06-06 15:45:16', NULL),
(240, 5, 'action_completed_successfully', 'Obat berhasil dihapus! (ID = MED00010)', '2024-06-06 15:45:35', NULL),
(241, 5, 'action_completed_successfully', 'Obat berhasil disimpan!', '2024-06-06 15:46:42', NULL),
(242, 5, 'action_completed_successfully', 'Obat berhasil dihapus! (ID = MED00010)', '2024-06-06 15:49:24', '2024-06-06 16:06:46'),
(243, 5, 'action_completed_successfully', 'Obat berhasil disimpan!', '2024-06-06 16:12:36', NULL),
(244, 5, 'action_completed_successfully', 'Obat berhasil diperbarui! (ID = MED00010)', '2024-06-06 16:12:59', '2024-06-06 16:22:07'),
(245, 5, 'action_completed_successfully', 'Obat berhasil disimpan!', '2024-06-06 16:46:01', NULL),
(246, 5, 'action_completed_successfully', 'Obat berhasil diperbarui! (ID = MED00011)', '2024-06-06 16:46:38', NULL),
(247, 5, 'action_completed_successfully', 'Obat berhasil dihapus! (ID = MED00011)', '2024-06-06 16:46:46', NULL),
(248, 1, 'action_completed_successfully', 'Pengaturan Website berhasil diperbarui! (ID = 1)', '2024-06-06 19:54:06', '2024-06-06 20:18:13'),
(249, 1, 'action_completed_successfully', 'Tema Website berhasil disimpan!', '2024-06-06 19:54:23', '2024-06-06 20:18:13'),
(250, 1, 'action_completed_successfully', 'Favicon berhasil diperbarui! (ID = 7)', '2024-06-06 19:56:01', '2024-06-06 20:18:13'),
(251, 1, 'action_completed_successfully', 'Logo berhasil diperbarui! (ID = 7)', '2024-06-06 19:56:08', '2024-06-06 20:18:13'),
(252, 1, 'action_completed_successfully', 'Foto berhasil diperbarui! (ID = 7)', '2024-06-06 19:56:14', '2024-06-06 20:18:13'),
(253, 1, 'action_completed_successfully', 'Dekorasi Website berhasil disimpan!', '2024-06-06 20:00:19', '2024-06-06 20:18:13'),
(254, 1, 'action_completed_successfully', 'Dekorasi Website berhasil diperbarui! (ID = 33)', '2024-06-06 20:00:55', '2024-06-06 20:18:13'),
(255, 1, 'action_completed_successfully', 'Dekorasi Website berhasil diperbarui! (ID = 7)', '2024-06-06 20:01:00', '2024-06-06 20:18:13'),
(256, 1, 'action_completed_successfully', 'ID Tema berhasil diperbarui! (ID = 1)', '2024-06-06 20:01:08', '2024-06-06 20:18:13'),
(257, 1, 'action_completed_successfully', 'Foto berhasil diperbarui! (ID = 7)', '2024-06-06 20:02:41', '2024-06-06 20:18:13'),
(258, 1, 'action_completed_successfully', 'Foto berhasil diperbarui! (ID = 7)', '2024-06-06 20:03:20', '2024-06-06 20:18:13'),
(259, 1, 'action_completed_successfully', 'Barang berhasil disimpan!', '2024-06-06 20:06:22', '2024-06-06 20:18:13'),
(260, 1, 'action_completed_successfully', 'Barang berhasil dihapus! (ID = BRG00001)', '2024-06-06 20:06:45', '2024-06-06 20:18:13'),
(261, 1, 'action_completed_successfully', 'Barang berhasil disimpan!', '2024-06-06 20:07:26', '2024-06-06 20:18:13'),
(262, 1, 'action_completed_successfully', 'Barang berhasil disimpan!', '2024-06-06 20:12:13', '2024-06-06 20:18:13'),
(263, 1, 'action_completed_successfully', 'Barang berhasil disimpan!', '2024-06-06 20:12:37', '2024-06-06 20:18:13'),
(264, 1, 'action_completed_successfully', 'Barang berhasil disimpan!', '2024-06-06 20:13:55', '2024-06-06 20:18:13'),
(265, 1, 'action_completed_successfully', 'Barang berhasil diperbarui! (ID = BRG00004)', '2024-06-06 20:15:54', '2024-06-06 20:18:13'),
(266, 1, 'action_completed_successfully', 'Barang berhasil diperbarui! (ID = BRG00004)', '2024-06-06 20:16:25', '2024-06-06 20:18:13'),
(267, 1, 'action_completed_successfully', 'Barang berhasil dihapus! (ID = BRG00004)', '2024-06-06 20:18:04', '2024-06-06 20:18:13'),
(268, 1, 'action_completed_successfully', 'Akun Media Sosial berhasil disimpan!', '2024-06-06 20:19:52', NULL),
(269, 1, 'action_completed_successfully', 'Status berhasil diperbarui! (ID = 7)', '2024-06-06 20:19:54', NULL),
(270, 1, 'action_completed_successfully', 'License berhasil diperbarui! (ID = 7)', '2024-06-06 20:20:06', NULL),
(271, 1, 'action_completed_successfully', 'License berhasil disimpan!', '2024-06-06 20:22:47', NULL),
(272, 1, 'action_completed_successfully', 'License berhasil diperbarui! (ID = 15)', '2024-06-06 20:23:30', NULL),
(273, 1, 'action_completed_successfully', 'License berhasil diperbarui! (ID = 15)', '2024-06-06 20:25:50', NULL),
(274, 1, 'action_completed_successfully', 'Status Lisensi berhasil diperbarui! (ID = 15)', '2024-06-06 20:26:59', NULL),
(275, 1, 'action_completed_successfully', 'License berhasil diperbarui! (ID = 15)', '2024-06-06 20:28:12', NULL),
(276, 1, 'action_completed_successfully', 'Barang berhasil disimpan!', '2024-06-06 20:58:13', NULL),
(277, 1, 'action_completed_successfully', 'Barang berhasil diperbarui! (ID = BRG00004)', '2024-06-06 20:58:50', NULL),
(278, 1, 'action_completed_successfully', 'Barang berhasil dihapus! (ID = BRG00004)', '2024-06-06 20:59:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_notif_type`
--

CREATE TABLE `website_notif_type` (
  `id_notif_type` int(11) NOT NULL,
  `notif_type` varchar(40) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_notif_type`
--

INSERT INTO `website_notif_type` (`id_notif_type`, `notif_type`, `title`, `icon`) VALUES
(1, 'new_notification_available', 'Anda memiliki notifikasi baru', '<i class=\"fas fa-bell\"></i>'),
(2, 'new_message_received', 'Anda memiliki pesan baru.', '<i class=\"fas fa-envelope\"></i>'),
(4, 'important_message_warning', 'Peringatan: Pesan penting', '<i class=\"fas fa-exclamation-triangle\"></i>'),
(5, 'action_completed_successfully', 'Berhasil!', '<i class=\"fas fa-check-circle\"></i>'),
(6, 'informational_note', 'Informasi: Harap diperhatikan.', '<i class=\"fas fa-info-circle\"></i>'),
(8, 'action_failed_error', 'Kesalahan', '<i class=\"fas fa-times-circle\"></i>'),
(9, 'need_assistance_help', 'Butuh bantuan?', '<i class=\"fas fa-question-circle\"></i>'),
(11, 'positive_feedback_received', 'Menghargai masukan Anda.', '<i class=\"fas fa-thumbs-up\"></i>'),
(12, 'negative_feedback_received', 'Masukan Anda dicatat', '<i class=\"fas fa-thumbs-down\"></i>'),
(13, 'upcoming_event_reminder', 'Acara akan datang', '<i class=\"fas fa-calendar\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `website_sosmed`
--

CREATE TABLE `website_sosmed` (
  `id_sosmed` int(11) NOT NULL,
  `platform` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_sosmed`
--

INSERT INTO `website_sosmed` (`id_sosmed`, `platform`, `nama`, `link`, `icon`, `status`, `id_theme`) VALUES
(4, 'Instagram', 'HotelHebat', 'https://instagram.com/hotelhebat', '<i class=\"fab fa-instagram\"></i>', 'aktif', 1),
(5, 'Instagram', 'LEVATO', 'https://www.instagram.com/levato.grow', '<i class=\"fab fa-instagram\"></i>', 'aktif', 3),
(6, 'Instagram', 'Kimia Farmaku', 'https://www.instagram.com/kimiafarma.batam/', '<i class=\"fab fa-instagram\"></i>', 'aktif', 6),
(7, 'Instagram', 'BarangMaster', 'https://www.instagram.com/theinventory/', '<i class=\"fab fa-instagram\"></i>', 'aktif', 7);

-- --------------------------------------------------------

--
-- Table structure for table `website_themes`
--

CREATE TABLE `website_themes` (
  `id_theme` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_themes`
--

INSERT INTO `website_themes` (`id_theme`, `nama`, `favicon`, `logo`, `foto`, `deskripsi`) VALUES
(1, 'school_ukk_hotel', 'utama_favicon.jpg', 'utama_logo.jpg', 'utama_foto.jpg', '<p>Lepaskan diri Anda ke <strong>Hotel Hebat</strong>, dikelilingi oleh keindahan pegunungan yang indah, danau, dan sawah menghijau.</p>\r\n\r\n<p>Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau; Kid&#39;s Club yang luas - menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga.</p>\r\n\r\n<p>Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.</p>\r\n'),
(2, 'christmas', 'christmas_favicon.png', 'christmas_logo.png', 'school_ukk_hotel_foto.png', '<p>Rayakan Natal Bersama dengan Hotel HEBAT</p>\r\n'),
(3, 'college_uvers_levato', 'college_uvers_levato_favicon.jpg', 'college_uvers_levato_logo.jpg', 'college_uvers_levato_foto.jpg', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;LEVATO adalah platform online yang menyediakan layanan jasa pembuatan izin usaha bagi para pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) di Kota Batam. Dengan fokus pada&amp;nbsp;&lt;strong&gt;kemudahan&lt;/strong&gt;,&amp;nbsp;&lt;strong&gt;kecepatan&lt;/strong&gt;, dan&amp;nbsp;&lt;strong&gt;kepercayaan&lt;/strong&gt;, LEVATO memungkinkan pelaku UMKM untuk&amp;nbsp;mengurus izin usaha mereka secara mudah dan cepat melalui media sosial Instagram. Kami berkomitmen untuk memberikan informasi edukasi mengenai pentingnya memiliki izin usaha serta menyediakan layanan lengkap mulai dari konsultasi hingga pendampingan dalam proses perizinan&lt;/p&gt;\r\n'),
(4, 'college_uvers_levato_2', 'college_uvers_levato_2_favicon.png', 'college_uvers_levato_2_logo.png', 'college_uvers_levato_2_foto.jpg', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;LEVATO adalah platform online yang menyediakan layanan jasa pembuatan izin usaha bagi para pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) di Kota Batam. Dengan fokus pada&amp;nbsp;&lt;strong&gt;kemudahan&lt;/strong&gt;,&amp;nbsp;&lt;strong&gt;kecepatan&lt;/strong&gt;, dan&amp;nbsp;&lt;strong&gt;kepercayaan&lt;/strong&gt;, LEVATO memungkinkan pelaku UMKM untuk&amp;nbsp;mengurus izin usaha mereka secara mudah dan cepat melalui media sosial Instagram. Kami berkomitmen untuk memberikan informasi edukasi mengenai pentingnya memiliki izin usaha serta menyediakan layanan lengkap mulai dari konsultasi hingga pendampingan dalam proses perizinan&lt;/p&gt;\r\n'),
(5, 'college_uvers_skpl', 'college_uvers_skpl_favicon.jpg', 'college_uvers_skpl_logo.jpg', 'college_uvers_skpl_foto.jpg', '<p>Selamat datang di AcadeTop- platform terdepan untuk mahasiswa yang mencari laptop yang sesuai dengan kebutuhan akademis dan gaya hidup digital mereka. Kami mengerti bahwa laptop bukan hanya alat, tapi merupakan kawan setia dalam perjalanan pendidikan Anda. Event &quot;AcadeTop Expo&quot; adalah kesempatan eksklusif bagi mahasiswa untuk menjelajahi berbagai pilihan laptop, dari yang ringkas dan efisien hingga yang kuat dan inovatif. Acara ini merupakan kolaborasi dengan merek-merek terkemuka dalam industri, sehingga Anda bisa yakin mendapatkan penawaran terbaik.</p>\r\n'),
(6, 'courses_bnsp', 'courses_bnsp_favicon.jpg', 'courses_bnsp_logo.png', 'courses_bnsp_foto.jpg', '<p>Aplikasi Kimia Farmaku adalah apotek online terpercaya yang menyediakan berbagai macam obat, vitamin, produk kesehatan, kecantikan, dan perawatan tubuh. Pengguna dapat membeli obat resep dan OTC dengan mudah, berkonsultasi dengan dokter gratis, dan mendapatkan pengiriman cepat dan gratis ke seluruh Indonesia. Aplikasi ini menawarkan harga terbaik, produk asli dan aman, serta privasi terjamin. Unduh aplikasi Kimia Farmaku sekarang untuk pengalaman belanja obat yang mudah, aman, dan nyaman!</p>\r\n'),
(7, 'courses_inventory', 'courses_inventory_favicon.png', 'courses_inventory_logo.png', 'courses_inventory_foto.jpg', '&lt;p&gt;BarangMaster adalah aplikasi manajemen inventaris yang dirancang untuk membantu distributor dan pengecer dalam mengelola stok barang, melacak pembelian, dan memantau penjualan dengan mudah dan efisien. Aplikasi ini menyediakan antarmuka yang user-friendly untuk input data barang, pengelompokan berdasarkan jenis, merk, dan produsen, serta laporan yang komprehensif untuk membantu pengambilan keputusan bisnis.&lt;/p&gt;\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decoration`
--
ALTER TABLE `decoration`
  ADD PRIMARY KEY (`id_decor`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_histories_user_id_foreign` (`id_user`);

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
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `website_licenses`
--
ALTER TABLE `website_licenses`
  ADD PRIMARY KEY (`id_lisensi`);

--
-- Indexes for table `website_notifications`
--
ALTER TABLE `website_notifications`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `website_notif_type`
--
ALTER TABLE `website_notif_type`
  ADD PRIMARY KEY (`id_notif_type`);

--
-- Indexes for table `website_sosmed`
--
ALTER TABLE `website_sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indexes for table `website_themes`
--
ALTER TABLE `website_themes`
  ADD PRIMARY KEY (`id_theme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decoration`
--
ALTER TABLE `decoration`
  MODIFY `id_decor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `website_licenses`
--
ALTER TABLE `website_licenses`
  MODIFY `id_lisensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `website_notifications`
--
ALTER TABLE `website_notifications`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `website_notif_type`
--
ALTER TABLE `website_notif_type`
  MODIFY `id_notif_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `website_sosmed`
--
ALTER TABLE `website_sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `website_themes`
--
ALTER TABLE `website_themes`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
