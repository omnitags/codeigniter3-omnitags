-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 04:42 AM
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
-- Database: `college`
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
(1, 'faskamar', 'faskamar', 'faskamar.png', '<i class=\"fas fa-bath\"></i>', 'e', 1),
(2, 'history', 'history', 'history.png', '<i class=\"fas fa-calendar-check\"></i>', 'e', 1),
(3, 'fashotel', 'fashotel', 'fashotel.png', '<i class=\"fas fa-swimming-pool\"></i>', 'e', 1),
(4, 'petugas', 'petugas', 'petugas.png', '<i class=\"fas fa-users\"></i>', 'c', 1),
(5, 'kamar', 'kamar', 'kamar.png', '<i class=\"fas fa-bed\"></i>', 'e', 1),
(6, 'tipe_kamar', 'tipe_kamar', 'tipe_kamar.png', '<i class=\"fas fa-door-open\"></i>', 'e', 1),
(7, 'pengaturan', 'pengaturan', 'pengaturan.png', '<i class=\"fas fa-cog\"></i>', 'a', 1),
(8, 'pesanan', 'pesanan', 'pesanan.png', '<i class=\"fas fa-suitcase-rolling\"></i>', 'f', 1),
(9, 'user', 'user', 'user.png', '<i class=\"fas fa-address-card\"></i>', 'c', 1),
(10, 'transaksi', 'transaksi', 'transaksi.png', '<i class=\"far fa-credit-card\"></i>', 'f', 1),
(11, 'operations', 'operations', 'operations.png', '<i class=\"fas fa-concierge-bell\"></i>', 'f', 1),
(12, 'decoration', 'decoration', 'decoration.png', '<i class=\"fas fa-snowman\"></i>', 'b', 1),
(13, 'home', 'home', 'home.png', '<i class=\"fas fa-home\"></i>', 'o', 1),
(14, 'login', 'login', 'login.png', '<i class=\"fas fa-sign-in-alt\"></i>', 'o', 1),
(15, 'signup', 'signup', 'signup.png', '<i class=\"fas fa-user-plus\"></i>', 'o', 1),
(16, 'dashboard', 'dashboard', 'dashboard.png', '<i class=\"fas fa-desktop\"></i>', 'o', 1),
(17, 'no_level', 'no_level', 'no_level.png', '<i class=\"fas fa-user-slash\"></i>', 'o', 1),
(19, 'events', 'events', 'events.png', '<i class=\"fas fa-calendar-alt\"></i>', 'b', 1),
(20, 'website_licenses', 'website_licenses', 'website_licenses.png', '<i class=\"fas fa-check-square\"></i>', 'b', 1),
(21, 'website_sosmed', 'website_sosmed', 'website_sosmed.png', '<i class=\"fab fa-instagram-square\"></i>', 'b', 1),
(22, 'template', 'template', 'template.png', '<i class=\"fas fa-dice-d6\"></i>', 'o', 1),
(23, '404', '404', '404.png', '<i class=\"far fa-times-circle\"></i>', 'o', 1),
(24, 'website_themes', 'website_themes', 'website_themes.png', '<i class=\"fas fa-umbrella-beach\"></i>', 'b', 1),
(25, 'migrations', 'migrations', 'migrations.png', '<i class=\"fas fa-database\"></i>', 'b', 1),
(26, 'failed_jobs', 'failed_jobs', 'failed_jobs.png', '<i class=\"far fa-frown\"></i>', 'b', 1),
(27, 'website_notif_type', 'website_notif_type', 'website_notif_type.png', '<i class=\"fas fa-flag\"></i>', 'b', 1),
(28, 'website_notifications', 'website_notifications', 'website_notifications.png', '<i class=\"fas fa-bell\"></i>', 'b', 1),
(29, 'personal_access_tokens', 'personal_access_tokens', 'personal_access_tokens.png', '<i class=\"fas fa-key\"></i>', 'd', 1),
(30, 'password_resets', 'password_resets', 'password_resets.png', '<i class=\"fas fa-unlock-alt\"></i>', 'b', 1),
(31, 'login_histories', 'login_histories', 'login_histories.png', '<i class=\"fas fa-laptop-house\"></i>', 'd', 1),
(35, 'invalid', 'invalid', 'invalid.png', '<i class=\"fas fa-ban\"></i>', 'a', 1),
(37, 'kelas', 'kelas', 'kelas.png', '<i class=\"fas fa-chalkboard-teacher\"></i>', 'b', 1),
(38, 'no_data', 'no_data', 'no_data.png', '<i class=\"far fa-folder-open\"></i>', 'o', 1);

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
(1, 'Birthday Party 2', 'Rayakan Ulang Tahun Anda dengan Kecemerlangan yang Menggetarkan!', 'Birthday_Party_2.jpg', '<p>Pulang hari, tersenyum di HOTEL HEBAT. Di sana, mimpi-mimpi dihargai, dan momen-momen dijadikan berharga. Di antara dekorasi kamar yang dipenuhi cinta dan kue ulang tahun yang menggoda, Anda merasa disambut dengan hangat oleh keluarga yang baru ditemukan. Saat Anda berendam dalam kebahagiaan, tak ada lagi ruang untuk kekhawatiran. Di HOTEL HEBAT, kami memahami arti sejati dari perayaan, dan dengan setiap sentuhan, kami berjanji untuk merangkul hati Anda.</p>\r\n', 'aktif', 1),
(2, 'Gerhana Matahari', 'Saksikan Keajaiban Langit dengan Gemerlap Kecemerlangan di HOTEL HEBAT!', 'Gerhana_Matahari.jpg', '<p>Saksikan keajaiban gerhana matahari di HOTEL HEBAT! Dengan lokasi yang sempurna untuk menikmati pemandangan langit yang memukau, kami siap memberikan pengalaman tak terlupakan saat Anda menyaksikan fenomena alam yang langka ini. Bergabunglah dengan kami untuk momen yang menggetarkan hati ini!</p>\r\n', 'aktif', 1),
(3, 'Anniversary 1 tahun', 'Selamat Anniversary', 'Anniversary_1_tahun.jpg', '<p>Selamat anniversary HOTEL HEBAT.</p>\r\n', 'nonaktif', 1),
(4, 'Launching Levato', 'Levato: Solusi Terdepan untuk Memulai Bisnis Anda!', 'Launching_Levato.png', '<p>Sambut peluncuran website baru Levato dengan antusias!</p>\r\n\r\n<p>Kami hadir dengan tampilan baru yang lebih segar dan fitur-fitur inovatif yang akan membantu Anda memulai bisnis Anda dengan mudah.</p>\r\n\r\n<p>Dapatkan akses langsung ke layanan pembuatan izin usaha yang praktis dan cepat, serta panduan lengkap untuk mengurus bisnis Anda dengan lancar.</p>\r\n\r\n<p>Bersama Levato, Anda tidak hanya memulai bisnis, tapi juga mengawali perjalanan menuju kesuksesan yang lebih besar! Jangan lewatkan peluncuran istimewa ini dan jadilah bagian dari revolusi bisnis!</p>\r\n', 'aktif', 3),
(5, 'Hari UMKM Nasional - 12 Agt', 'Selamat UMKM Nasional', 'Hari_UMKM_Nasional_-_12_Agt.jpg', '<p>Hari UMKM Nasional adalah momen istimewa di mana kita merayakan peran penting Usaha Mikro, Kecil, dan Menengah (UMKM) dalam perekonomian Indonesia. Sebagai tonggak yang menghargai kerja keras, inovasi, dan ketahanan ekonomi lokal, Hari UMKM Nasional adalah kesempatan bagi kita semua untuk mengapresiasi kontribusi UMKM dalam memajukan ekonomi negara dan meningkatkan kesejahteraan masyarakat.</p>\r\n', 'nonaktif', 3),
(6, 'Update Terbaru', 'Nikmati Update Terbaru, kini dengan banyak fitur!', 'Update_Terbaru.jpg', '&lt;p&gt;???? &lt;strong&gt;New Features:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Feature 1:&lt;/strong&gt; We&amp;#39;ve added [new feature] to enhance your experience. Now you can [describe what the feature does and how it benefits the user].&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Feature 2:&lt;/strong&gt; Enjoy [another new feature] which allows you to [brief description of the feature and its advantages].&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;???? &lt;strong&gt;Improvements:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Performance Boost:&lt;/strong&gt; We&amp;#39;ve optimized the app&amp;#39;s performance for a smoother and faster experience.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;UI Enhancements:&lt;/strong&gt; Enjoy a cleaner and more intuitive interface with our latest design updates.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Better Notifications:&lt;/strong&gt; Stay informed with our improved notification system, ensuring you never miss an important update.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;???? &lt;strong&gt;Bug Fixes:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;We&amp;#39;ve squashed several bugs to improve overall stability and performance. Thank you for your feedback and patience!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;???? &lt;strong&gt;General Updates:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Updated to support the latest version of [OS/Platform], ensuring compatibility and leveraging new system features.&lt;/li&gt;\r\n	&lt;li&gt;Minor tweaks and adjustments for an even better user experience.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Thank you for using [App Name]! We&amp;#39;re committed to continuously improving your experience. If you have any feedback or suggestions, please don&amp;#39;t hesitate to reach out to us at [support/contact information].&lt;/p&gt;\r\n', 'nonaktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fashotel`
--

CREATE TABLE `fashotel` (
  `id_fashotel` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fashotel`
--

INSERT INTO `fashotel` (`id_fashotel`, `nama`, `keterangan`, `img`) VALUES
(1, 'Kolam Renang', 'Berada di lantai 3 dengan luas 50m persegi', '300px-Backyardpool.jpg'),
(2, 'Makan Sore', 'Berada di teras hotel dengan luas 5m x 10m ', 'lunch.jpg'),
(11, 'Gym', '-', 'gym.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faskamar`
--

CREATE TABLE `faskamar` (
  `id_faskamar` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `img` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faskamar`
--

INSERT INTO `faskamar` (`id_faskamar`, `tipe`, `nama`, `img`) VALUES
(1, 'Superior', 'Kamar berukuran luas 32m2', 'size.jpg'),
(2, 'Superior', 'Kamar mandi shower', 'shower.jpg'),
(3, 'Superior', 'Coffee Maker', 'coffeemaker.jpg'),
(4, 'Superior', 'AC', 'B900369-Waktu-Rilis-AC-Sharp-1per2-PK-1024x538.jpg'),
(5, 'Superior', 'LED TV 32 inch', 'tv.jpg'),
(6, 'Deluxe', 'Kamar berukuran luas 45m2', 'size.jpg'),
(7, 'Deluxe', 'Kamar mandi shower', 'bath.jpg'),
(8, 'Deluxe', 'Coffee Maker', 'coffeemaker.jpg'),
(9, 'Deluxe', 'Sofa', 'sofa.jpg'),
(11, 'Deluxe', 'AC', 'B900369-Waktu-Rilis-AC-Sharp-1per2-PK-1024x538.jpg'),
(12, 'Deluxe', 'LED TV 43 inch', 'tv.jpg'),
(14, 'Superior', 'Lemari', 'Lemari-Pakaian-Minimalis-Putih-Duco-Elegant-Style-Simple-HD-0168.jpg'),
(15, 'Deluxe', 'Lemari', 'lemari-pakaian-plastik-dan-kayu-bagus-yang-mana-medium.jpg'),
(16, 'Classic', 'Kamar berukuran luas 30m2', 'luxury.jpg'),
(17, 'Classic', 'Lemari', 'Almari-Pakaian-Lemari-Baju-3-Pintu-Sliding-With-Mirror-Minimalis-Kayu-Jati-Camela.jpg'),
(18, 'Classic', 'Lampu tidur', 'Lampu_tidur.jpg'),
(19, 'Superior', 'Double bed', 'double_bed.jpg'),
(20, 'Deluxe', 'Double bed', 'double_bed1.jpg'),
(21, 'Classic', 'Double bed', 'double_bed2.jpg'),
(22, 'Superior', 'Lampu tidur', 'Lampu_tidur1.jpg'),
(23, 'Superior', 'Teko listrik & gelas', 'Teko_listrik_dan_gelas.jpg'),
(24, 'Deluxe', 'Teko listrik & gelas', 'Teko_listrik_dan_gelas1.jpg'),
(25, 'Classic', 'Teko listrik & gelas', 'Teko_listrik_dan_gelas2.jpg'),
(26, 'Classic', 'LED TV 32 inch', 'tv_32_inch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `tamu` varchar(50) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `jlh` int(3) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `cek_in` date NOT NULL,
  `cek_out` date NOT NULL,
  `no_kamar` int(11) DEFAULT NULL,
  `tgl_perubahan` datetime DEFAULT NULL,
  `user_aktif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_pesanan`, `id_user`, `pemesan`, `email`, `hp`, `tamu`, `id_tipe`, `jlh`, `harga_total`, `cek_in`, `cek_out`, `no_kamar`, `tgl_perubahan`, `user_aktif`) VALUES
(43, 41, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 2, 1, 635000, '2023-12-15', '2023-12-16', 13, '2023-12-15 21:49:01', 'Eren'),
(44, 42, 6, 'Johan', 'johan@gmail', '081234567890', 'Khenjy', 2, 1, 1270000, '2023-12-16', '2023-12-18', 12, '2023-12-15 22:10:59', 'Eren'),
(46, 44, 6, 'Johan', 'johan@gmail.com', '081234567890', 'hehe', 1, 1, 510000, '2024-01-05', '2024-01-06', 11, '2023-12-18 21:54:25', 'Eren'),
(47, 1, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 1, 1, 510000, '2023-12-25', '2023-12-26', 8, '2023-12-25 00:48:55', 'Eren'),
(48, 8, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Khenjy', 2, 1, 6985000, '2024-04-06', '2024-04-17', 15, '2024-04-07 03:17:22', '2'),
(49, 9, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Alex', 3, 1, 3780000, '2024-04-09', '2024-04-18', NULL, '2024-04-08 16:56:55', NULL),
(50, 10, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Alex', 3, 1, 3780000, '2024-04-09', '2024-04-18', NULL, '2024-04-08 16:56:55', NULL),
(51, 11, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Alex', 3, 1, 3780000, '2024-04-09', '2024-04-18', NULL, '2024-04-08 16:56:55', NULL),
(52, 12, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Khen', 3, 1, 420000, '2024-04-09', '2024-04-10', NULL, '2024-04-08 16:56:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` int(3) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `status` enum('Available','Unavailable','Dirty','Damaged') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `id_tipe`, `id_pesanan`, `status`, `keterangan`) VALUES
(1, 1, NULL, 'Available', 'Baru'),
(2, 1, NULL, 'Available', ''),
(3, 2, NULL, 'Available', ''),
(4, 2, NULL, 'Available', ''),
(5, 1, NULL, 'Available', ''),
(6, 3, NULL, 'Available', ''),
(7, 3, NULL, 'Available', ''),
(8, 1, NULL, 'Available', ''),
(9, 1, NULL, 'Available', ''),
(10, 1, NULL, 'Available', ''),
(11, 1, NULL, 'Available', ''),
(12, 2, 2, 'Unavailable', ''),
(13, 2, 3, 'Unavailable', ''),
(14, 2, 6, 'Unavailable', ''),
(15, 2, NULL, 'Available', ''),
(16, 2, 4, 'Unavailable', ''),
(17, 3, NULL, 'Available', ''),
(18, 3, 22, 'Unavailable', ''),
(19, 3, NULL, 'Available', ''),
(20, 3, 14, 'Unavailable', ''),
(21, 3, NULL, 'Available', ''),
(22, 1, NULL, 'Available', ''),
(23, 4, NULL, 'Dirty', ''),
(24, 3, NULL, 'Available', ''),
(25, 1, NULL, 'Available', ''),
(26, 2, NULL, 'Available', '');

--
-- Triggers `kamar`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER DELETE ON `kamar` FOR EACH ROW BEGIN
UPDATE tipe_kamar SET stok = stok - 1 WHERE id_tipe = OLD.id_tipe;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `kamar` FOR EACH ROW BEGIN
UPDATE tipe_kamar SET stok = stok + 1 WHERE id_tipe = NEW.id_tipe;
END
$$
DELIMITER ;

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
(153, 1, '2024-06-08 09:49:10', '2024-06-08 09:49:10', 'Desktop on Windows'),
(154, 1, '2024-06-09 00:51:22', '2024-06-09 00:51:22', 'Desktop on Windows'),
(155, 1, '2024-06-09 02:10:04', '2024-06-09 02:10:04', 'Desktop on Windows'),
(156, 1, '2024-06-09 09:19:01', '2024-06-09 09:19:01', 'Desktop on Windows'),
(157, 1, '2024-06-09 13:01:27', '2024-06-09 13:01:27', 'Android (Mobile)'),
(158, 1, '2024-06-09 14:22:58', '2024-06-09 14:22:58', 'Desktop on Windows'),
(159, 1, '2024-06-09 14:40:03', '2024-06-09 14:40:03', 'Desktop on Windows'),
(160, 3, '2024-06-09 14:40:29', '2024-06-09 14:40:29', 'Desktop on Windows'),
(161, 3, '2024-06-09 14:43:57', '2024-06-09 14:43:57', 'Desktop on Windows'),
(162, 1, '2024-06-09 15:57:43', '2024-06-09 15:57:43', 'Desktop on Windows'),
(163, 1, '2024-06-10 01:46:08', '2024-06-10 01:46:08', 'Desktop on Windows'),
(164, 1, '2024-06-10 07:44:41', '2024-06-10 07:44:41', 'Desktop on Windows'),
(165, 1, '2024-06-10 09:47:08', '2024-06-10 09:47:08', 'Desktop on Windows'),
(166, 3, '2024-06-10 09:47:31', '2024-06-10 09:47:31', 'Desktop on Windows'),
(167, 3, '2024-06-11 08:08:27', '2024-06-11 08:08:27', 'Desktop on Windows'),
(168, 3, '2024-06-11 08:15:20', '2024-06-11 08:15:20', 'Desktop on Windows'),
(169, 3, '2024-06-11 08:17:50', '2024-06-11 08:17:50', 'Desktop on Windows'),
(170, 3, '2024-06-11 08:18:23', '2024-06-11 08:18:23', 'iPhone (Mobile)'),
(171, 1, '2024-06-11 11:52:30', '2024-06-11 11:52:30', 'Desktop on Windows'),
(172, 1, '2024-06-12 01:45:28', '2024-06-12 01:45:28', 'Desktop on Windows'),
(173, 3, '2024-06-12 04:17:40', '2024-06-12 04:17:40', 'Desktop on Windows'),
(174, 2, '2024-06-12 05:38:58', '2024-06-12 05:38:58', 'Desktop on Windows'),
(175, 2, '2024-06-12 06:03:58', '2024-06-12 06:03:58', 'Desktop on Windows'),
(176, 1, '2024-06-12 06:04:11', '2024-06-12 06:04:11', 'Desktop on Windows'),
(177, 1, '2024-06-12 10:14:03', '2024-06-12 10:14:03', 'Desktop on Windows'),
(178, 1, '2024-06-12 11:30:47', '2024-06-12 11:30:47', 'Desktop on Windows'),
(179, 1, '2024-06-13 01:04:08', '2024-06-13 01:04:08', 'Desktop on Windows'),
(180, 1, '2024-06-13 01:18:42', '2024-06-13 01:18:42', 'Desktop on Windows'),
(181, 1, '2024-06-13 01:29:11', '2024-06-13 01:29:11', 'Desktop on Windows'),
(182, 1, '2024-06-13 04:01:16', '2024-06-13 04:01:16', 'Desktop on Windows'),
(183, 1, '2024-06-13 05:14:00', '2024-06-13 05:14:00', 'Desktop on Windows'),
(184, 1, '2024-06-13 08:02:03', '2024-06-13 08:02:03', 'Desktop on Windows'),
(185, 1, '2024-06-13 11:40:19', '2024-06-13 11:40:19', 'Desktop on Windows'),
(186, 1, '2024-06-13 16:28:58', '2024-06-13 16:28:58', 'Desktop on Windows'),
(187, 1, '2024-06-14 01:02:51', '2024-06-14 01:02:51', 'Desktop on Windows'),
(188, 1, '2024-06-14 05:12:59', '2024-06-14 05:12:59', 'Desktop on Windows'),
(189, 3, '2024-06-14 07:19:02', '2024-06-14 07:19:02', 'Desktop on Windows'),
(190, 1, '2024-06-14 07:33:39', '2024-06-14 07:33:39', 'Desktop on Windows'),
(191, 1, '2024-06-14 11:05:26', '2024-06-14 11:05:26', 'Desktop on Windows'),
(192, 1, '2024-06-14 13:05:46', '2024-06-14 13:05:46', 'Desktop on Windows'),
(193, 1, '2024-06-14 13:15:35', '2024-06-14 13:15:35', 'Desktop on Windows'),
(194, 1, '2024-06-14 16:20:11', '2024-06-14 16:20:11', 'Desktop on Windows'),
(195, 1, '2024-06-14 16:31:40', '2024-06-14 16:31:40', 'Desktop on Windows'),
(196, 3, '2024-06-14 17:06:56', '2024-06-14 17:06:56', 'Desktop on Windows'),
(197, 2, '2024-06-14 17:46:46', '2024-06-14 17:46:46', 'Desktop on Windows'),
(198, 2, '2024-06-15 01:57:43', '2024-06-15 01:57:43', 'Desktop on Windows'),
(199, 3, '2024-06-15 02:07:31', '2024-06-15 02:07:31', 'iPhone (Mobile)'),
(200, 2, '2024-06-15 02:08:23', '2024-06-15 02:08:23', 'iPhone (Mobile)'),
(201, 3, '2024-06-15 02:16:31', '2024-06-15 02:16:31', 'Desktop on Windows'),
(202, 2, '2024-06-15 02:16:50', '2024-06-15 02:16:50', 'Desktop on Windows'),
(203, 2, '2024-06-15 02:39:22', '2024-06-15 02:39:22', 'Desktop on Windows'),
(204, 3, '2024-06-15 05:20:22', '2024-06-15 05:20:22', 'Desktop on Windows'),
(205, 1, '2024-06-15 07:29:46', '2024-06-15 07:29:46', 'Desktop on Windows'),
(206, 2, '2024-06-15 07:39:15', '2024-06-15 07:39:15', 'Desktop on Windows'),
(207, 1, '2024-06-15 08:29:52', '2024-06-15 08:29:52', 'Desktop on Windows'),
(208, 1, '2024-06-15 13:25:22', '2024-06-15 13:25:22', 'Desktop on Windows'),
(209, 2, '2024-06-16 09:57:39', '2024-06-16 09:57:39', 'Desktop on Windows'),
(210, 3, '2024-06-16 09:57:56', '2024-06-16 09:57:56', 'Desktop on Windows'),
(211, 2, '2024-06-16 10:00:27', '2024-06-16 10:00:27', 'Desktop on Windows'),
(212, 3, '2024-06-16 10:08:46', '2024-06-16 10:08:46', 'Desktop on Windows'),
(213, 1, '2024-06-16 12:44:30', '2024-06-16 12:44:30', 'Desktop on Windows'),
(214, 2, '2024-06-16 13:15:10', '2024-06-16 13:15:10', 'Desktop on Windows'),
(215, 1, '2024-06-16 13:25:49', '2024-06-16 13:25:49', 'Desktop on Windows'),
(216, 2, '2024-06-16 13:46:20', '2024-06-16 13:46:20', 'Desktop on Windows'),
(217, 1, '2024-06-16 15:41:41', '2024-06-16 15:41:41', 'Desktop on Windows'),
(218, 2, '2024-06-16 16:32:40', '2024-06-16 16:32:40', 'Desktop on Windows'),
(219, 1, '2024-06-16 16:33:45', '2024-06-16 16:33:45', 'Desktop on Windows'),
(220, 2, '2024-06-16 16:55:31', '2024-06-16 16:55:31', 'Desktop on Windows'),
(221, 2, '2024-06-17 01:07:08', '2024-06-17 01:07:08', 'Desktop on Windows'),
(222, 1, '2024-06-18 05:58:18', '2024-06-18 05:58:18', 'Desktop (Unknown OS)'),
(223, 1, '2024-06-18 06:04:52', '2024-06-18 06:04:52', 'Desktop (Unknown OS)'),
(224, 1, '2024-06-18 06:06:11', '2024-06-18 06:06:11', 'Desktop (Unknown OS)'),
(225, 1, '2024-06-18 07:34:45', '2024-06-18 07:34:45', 'Desktop on Windows'),
(226, 1, '2024-06-18 13:13:59', '2024-06-18 13:13:59', 'Desktop (Unknown OS)'),
(227, 1, '2024-06-19 09:03:07', '2024-06-19 09:03:07', 'Desktop (Unknown OS)'),
(228, 1, '2024-06-19 12:43:06', '2024-06-19 12:43:06', 'Desktop on Windows'),
(229, 3, '2024-06-19 13:06:24', '2024-06-19 13:06:24', 'Desktop on Windows'),
(230, 1, '2024-06-19 13:06:56', '2024-06-19 13:06:56', 'Desktop on Windows'),
(231, 1, '2024-06-21 03:39:42', '2024-06-21 03:39:42', 'Desktop (Unknown OS)'),
(232, 1, '2024-06-21 07:52:10', '2024-06-21 07:52:10', 'Desktop on Windows'),
(233, 3, '2024-06-21 07:53:54', '2024-06-21 07:53:54', 'Desktop on Windows'),
(234, 3, '2024-06-21 08:05:32', '2024-06-21 08:05:32', 'Desktop on Windows'),
(235, 9, '2024-06-21 15:34:34', '2024-06-21 15:34:34', 'Desktop on Windows'),
(236, 2, '2024-06-21 15:37:04', '2024-06-21 15:37:04', 'Desktop on Windows'),
(237, 9, '2024-06-21 15:37:45', '2024-06-21 15:37:45', 'Desktop on Windows'),
(238, 2, '2024-06-21 15:39:06', '2024-06-21 15:39:06', 'Desktop on Windows'),
(239, 1, '2024-06-21 15:47:16', '2024-06-21 15:47:16', 'Desktop on Windows'),
(240, 1, '2024-06-21 15:56:38', '2024-06-21 15:56:38', 'Desktop (Unknown OS)'),
(241, 3, '2024-06-22 04:07:02', '2024-06-22 04:07:02', 'Desktop on Windows'),
(242, 9, '2024-06-22 04:07:23', '2024-06-22 04:07:23', 'Desktop on Windows'),
(243, 3, '2024-06-22 04:37:31', '2024-06-22 04:37:31', 'Desktop on Windows'),
(244, 1, '2024-06-22 04:38:03', '2024-06-22 04:38:03', 'Desktop on Windows'),
(245, 1, '2024-06-22 07:07:02', '2024-06-22 07:07:02', 'Desktop on Windows'),
(246, 1, '2024-06-22 07:09:17', '2024-06-22 07:09:17', 'Desktop on Windows'),
(247, 1, '2024-06-22 07:22:57', '2024-06-22 07:22:57', 'Desktop on Windows'),
(248, 3, '2024-06-22 07:35:07', '2024-06-22 07:35:07', 'Desktop on Windows'),
(249, 3, '2024-06-23 02:33:41', '2024-06-23 02:33:41', 'Desktop on Windows'),
(250, 2, '2024-06-23 03:00:37', '2024-06-23 03:00:37', 'Desktop on Windows'),
(251, 1, '2024-06-23 07:54:35', '2024-06-23 07:54:35', 'Desktop on Windows'),
(252, 2, '2024-06-23 07:54:42', '2024-06-23 07:54:42', 'Desktop on Windows'),
(253, 2, '2024-06-23 10:19:01', '2024-06-23 10:19:01', 'Desktop on Windows'),
(254, 0, '2024-06-23 10:41:14', '2024-06-23 10:41:14', 'Desktop on Windows'),
(255, 0, '2024-06-23 10:54:39', '2024-06-23 10:54:39', 'Desktop on Windows'),
(256, 1, '2024-06-24 00:46:34', '2024-06-24 00:46:34', 'Desktop on Windows'),
(257, 1, '2024-06-24 01:06:02', '2024-06-24 01:06:02', 'Desktop on Windows'),
(258, 2, '2024-06-24 01:09:03', '2024-06-24 01:09:03', 'Desktop on Windows'),
(259, 1, '2024-06-24 01:25:51', '2024-06-24 01:25:51', 'Desktop on Windows'),
(260, 1, '2024-06-24 01:45:38', '2024-06-24 01:45:38', 'Desktop on Windows'),
(261, 2, '2024-06-24 01:45:49', '2024-06-24 01:45:49', 'Desktop on Windows'),
(262, 1, '2024-06-24 01:58:50', '2024-06-24 01:58:50', 'Desktop on Windows'),
(263, 1, '2024-06-24 04:26:27', '2024-06-24 04:26:27', 'Desktop on Windows'),
(264, 2, '2024-06-24 12:13:54', '2024-06-24 12:13:54', 'Desktop on Windows'),
(265, 1, '2024-06-26 02:51:43', '2024-06-26 02:51:43', 'Desktop on Windows'),
(266, 1, '2024-06-26 06:21:45', '2024-06-26 06:21:45', 'Desktop on Windows'),
(267, 1, '2024-06-26 08:04:07', '2024-06-26 08:04:07', 'Desktop on Windows'),
(268, 3, '2024-06-26 08:05:18', '2024-06-26 08:05:18', 'Desktop on Windows'),
(269, 1, '2024-07-11 10:36:53', '2024-07-11 10:36:53', 'Desktop on Windows');

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
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id_operations` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `keterangan` text,
  `tgl_perubahan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id_operations`, `no_kamar`, `id_user`, `id_petugas`, `status`, `keterangan`, `tgl_perubahan`) VALUES
(1, 1, 2, 1, '0', NULL, '2023-12-02 05:12:42'),
(2, 1, 2, 1, '0', NULL, '2023-12-09 08:12:17'),
(3, 1, 2, 1, '0', NULL, '2023-12-09 08:12:02'),
(4, 1, 2, 1, '0', NULL, '2023-12-09 08:12:08'),
(5, 1, 2, 2, '0', NULL, '2023-12-09 08:12:47'),
(6, 3, 2, 1, '0', 'Semua sudah bersih', '2023-12-09 08:12:57'),
(7, 5, 2, 1, '0', 'sudah diperbaiki', '2023-12-09 08:12:06'),
(8, 4, 2, 2, '0', 'Semua sudah diperbaiki', '2023-12-09 08:12:14'),
(9, 2, 2, 1, '0', 'Kotor banget, udh dibersihkan', '2023-12-11 03:12:54'),
(10, 1, 2, 2, '0', 'Butuh perbaikian wastafel', '2023-12-11 03:12:34'),
(11, 2, 2, 2, '0', 'test', '2023-12-12 09:12:36'),
(12, 5, 2, 2, '0', 'Pembersihan berhasil', '2023-12-12 02:12:47'),
(13, 13, 2, 2, '0', 'kamar sudah bersih', '2023-12-15 12:12:33'),
(14, 13, 2, 2, '0', 'Kamar sudah dibersihkan', '2023-12-15 02:12:15'),
(15, 12, 2, 1, 'Available', 'Kamar yg rusak udah diperbaiki, naikin gajinya bos', '2023-12-15 03:12:46'),
(16, 15, 2, 2, 'Available', '2024-04-06 07:04:55', '0000-00-00 00:00:00'),
(17, 15, 2, 2, 'Available', '2024-04-06 08:04:41', '0000-00-00 00:00:00'),
(18, 26, 1, 2, 'Available', '2024-04-11 03:04:15', '0000-00-00 00:00:00'),
(19, 22, 2, 2, 'Available', 'Test', '2024-06-16 08:06:54'),
(20, 1, 2, 2, 'Available', '', '2024-06-17 10:06:50'),
(21, 3, 2, 1, 'Available', '', '2024-06-17 10:06:00'),
(22, 25, 2, 2, 'Available', '', '2024-06-17 10:06:40'),
(23, 26, 2, 2, 'Available', '', '2024-06-21 10:06:21');

--
-- Triggers `operations`
--
DELIMITER $$
CREATE TRIGGER `tambah_poin` AFTER INSERT ON `operations` FOR EACH ROW BEGIN
UPDATE petugas SET poin = poin + 1 WHERE id_petugas = NEW.id_petugas;
END
$$
DELIMITER ;

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
(1, 'HOTEL HEBAT', 'Jl Peternakan Dlm III 36, Dki Jakarta', 'hotelhebat@gmail.com', '0-21-541-3829', 1, 11, 1);

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
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `tamu` varchar(50) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `jlh` int(3) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `cek_in` date NOT NULL,
  `cek_out` date NOT NULL,
  `status` enum('pending','belum bayar','menunggu','cek in','cek out') NOT NULL,
  `no_kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `pemesan`, `email`, `hp`, `tamu`, `id_tipe`, `jlh`, `harga_total`, `cek_in`, `cek_out`, `status`, `no_kamar`) VALUES
(2, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Edrick', 2, 1, 1270000, '2023-12-25', '2023-12-27', 'menunggu', 12),
(3, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Alex', 2, 1, 1905000, '2023-12-25', '2023-12-28', 'menunggu', 13),
(4, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 2, 1, 1905000, '2023-12-27', '2023-12-30', 'menunggu', 16),
(5, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 3, 1, 840000, '2023-12-27', '2023-12-29', 'pending', NULL),
(6, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 2, 1, 635000, '2024-01-27', '2024-01-28', 'cek in', 14),
(7, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 3, 1, 420000, '2024-04-15', '2024-04-16', 'pending', NULL),
(8, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Alex', 3, 1, 1260000, '2024-04-16', '2024-04-19', 'pending', NULL),
(13, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Khen', 3, 1, 420000, '2024-04-09', '2024-04-10', 'pending', NULL),
(14, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Alex', 3, 1, 420000, '2024-04-09', '2024-04-10', 'belum bayar', 20),
(15, 7, 'Vito', 'vito@gmail.com', '08123456789', 'Jojo', 3, 1, 420000, '2024-04-17', '2024-04-18', 'pending', NULL),
(16, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Jojo', 3, 1, 420000, '2024-05-16', '2024-05-17', 'pending', NULL),
(17, 3, 'Bill', 'bill@gmail.com', '081234567890', 'test', 2, 1, 635000, '2024-05-20', '2024-05-21', 'pending', NULL),
(18, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Jojo', 2, 1, 635000, '2024-06-21', '2024-06-22', 'pending', NULL),
(19, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Jojo', 2, 1, 635000, '2024-06-21', '2024-06-22', 'pending', NULL),
(20, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Jojo', 2, 1, 635000, '2024-06-21', '2024-06-22', 'pending', NULL),
(21, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Jojo', 3, 1, 420000, '2024-07-04', '2024-07-05', 'pending', NULL),
(22, 9, 'Yodi', 'yodi@gmail.com', '082287394758', 'Khenjy', 3, 1, 420000, '2024-06-22', '2024-06-23', 'belum bayar', 18),
(23, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Test', 2, 1, 635000, '2024-06-27', '2024-06-28', 'pending', NULL);

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok_tambah_stok` AFTER UPDATE ON `pesanan` FOR EACH ROW BEGIN 

UPDATE tipe_kamar SET stok = stok - NEW.jlh WHERE id_tipe = NEW.id_tipe AND NEW.status IN ('menunggu');

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_kamar` AFTER DELETE ON `pesanan` FOR EACH ROW BEGIN 
UPDATE tipe_kamar SET stok = stok + OLD.jlh WHERE id_tipe = OLD.id_tipe;

UPDATE kamar SET status = 'Available', id_pesanan = NULL WHERE no_kamar = OLD.no_kamar;

INSERT INTO history ( 
    id_pesanan, 
    id_user, 
    pemesan, 
    email, 
    hp, 
    tamu, 
    id_tipe, 
    jlh, 
    harga_total,
    cek_in, 
    cek_out, 
    no_kamar,
    tgl_perubahan) 
    VALUES (
        OLD.id_pesanan, 
        OLD.id_user, 
        OLD.pemesan, 
        OLD.email, 
        OLD.hp, 
        OLD.tamu, 
        OLD.id_tipe, 
        OLD.jlh, 
        OLD.harga_total, 
        OLD.cek_in, 
        OLD.cek_out, 
        OLD.no_kamar, 
        SYSDATE());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` text,
  `hp` varchar(35) NOT NULL,
  `img` varchar(255) NOT NULL,
  `role` enum('cleaning','maintenance') NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `email`, `password`, `hp`, `img`, `role`, `poin`) VALUES
(1, 'Gusion', 'gusion@gmail.com', '', '081234567890', 'Gusion.jpg', 'maintenance', 8),
(2, 'Clint The Cleaner', 'clint@gmail.com', '', '081234567890', 'Clint_The_Cleaner.jpg', 'cleaning', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe`, `tipe`, `img`, `stok`, `harga`) VALUES
(1, 'Superior', 'superior.jpg', 9, 510000),
(2, 'Deluxe', 'deluxe.jpg', 3, 635000),
(3, 'Classic', 'luxury.jpg', 11, 420000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `metode` enum('debit','ewallet') NOT NULL,
  `bayar` int(11) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `email`, `id_pesanan`, `metode`, `bayar`, `tgl_transaksi`) VALUES
(7, 3, 'bill@gmail.com', 33, 'debit', 20000, '2023-12-09 08:12:58'),
(8, 3, 'bill@gmail.com', 34, 'debit', 340000, '2023-12-11 08:12:33'),
(9, 3, 'bill@gmail.com', 37, 'ewallet', 0, '2023-12-11 09:12:01'),
(10, 3, 'bill@gmail.com', 38, 'debit', 40000, '2023-12-11 09:12:20'),
(11, 3, 'bill@gmail.com', 39, 'debit', 20000, '2023-12-11 03:12:02'),
(12, 3, 'bill@gmail.com', 39, 'debit', 635000, '2023-12-15 12:12:17'),
(13, 3, 'bill@gmail.com', 36, 'debit', 450000, '2023-12-15 12:12:05'),
(14, 3, 'bill@gmail.com', 40, 'ewallet', 480000, '2023-12-15 02:12:49'),
(15, 3, 'bill@gmail.com', 41, 'debit', 635000, '2023-12-15 02:12:35'),
(16, 6, 'johan@gmail', 42, 'debit', 1270000, '2023-12-15 03:12:04'),
(22, 3, 'bill@gmail.com', 43, 'debit', 800000, '2023-12-18 04:12:48'),
(23, 6, 'johan@gmail.com', 44, 'debit', 510000, '2023-12-18 02:12:19'),
(24, 3, 'bill@gmail.com', 1, 'debit', 510000, '2023-12-24 05:12:41'),
(25, 3, 'bill@gmail.com', 2, 'debit', 1270000, '2023-12-24 05:12:51'),
(26, 3, 'bill@gmail.com', 3, 'debit', 1905000, '2023-12-25 07:12:31'),
(27, 3, 'bill@gmail.com', 6, 'debit', 635000, '2024-01-27 03:01:47'),
(28, 7, 'vito@gmail.com', 8, 'debit', 6985000, '2024-04-06 07:04:12'),
(29, 7, 'vito@gmail.com', 14, 'debit', 420000, '2024-04-08 12:04:39'),
(30, 7, 'vito@gmail.com', 14, 'debit', 420000, '2024-04-08 01:04:47'),
(31, 7, 'vito@gmail.com', 49, 'debit', 420000, '2024-04-08 01:04:24'),
(32, 3, 'bill@gmail.com', 4, 'debit', 1905000, '2024-04-29 12:04:40'),
(33, 3, 'bill@gmail.com', 4, 'debit', 1905000, '2024-05-10 01:05:15'),
(34, 3, 'bill@gmail.com', 4, 'debit', 1905000, '2024-05-10 01:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(8) NOT NULL,
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
('1', 'Khen', 'khen@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '081234567890', 'administrator'),
('10', 'mine', 'mine@gmail.com', '$2y$10$Jjs0BkkQYGzdVlgRfJxnuudzrpyqXXKXVDUyMK0QHVqBrCAh37tD.', '082287394758', 'tamu'),
('11', 'test', 'test@gmail.com', '$2y$10$SARX26FWF8j5MN9/n8Uofe3DFA0CWD87QCSy7pDFOjBH80dXJqfea', '082287394758', 'tamu'),
('2', 'Eren', 'eren@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '081234567890', 'resepsionis'),
('3', 'Bill', 'bill@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '081234567890', 'tamu'),
('4', 'Alex', 'alex@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '08123456789', 'accounting'),
('5', 'Alexia', 'alexia@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '081234567890', 'tamu'),
('6', 'Johan', 'johan@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '081234567890', 'tamu'),
('7', 'Vito', 'vito@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '08123456789', 'tamu'),
('8', 'Duandi 2', 'duandi@gmail.com', '$2y$10$KjYrPzfHnNCjGfegn4rE8uB3vFIU0ETJi5B0upn.Sto/GL5geyq.6', '08123456789', 'tamu'),
('9', 'Yodi', 'yodi@gmail.com', '$2y$10$kIn7kcgl2tgLMyRRnb/o2Ohe/ZpooS2lz/.mvU7SqWYqDKZFZefoG', '082287394758', 'tamu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` bigint(20) UNSIGNED DEFAULT NULL,
  `major_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `generation` int(11) DEFAULT '2024',
  `role` enum('super_admin','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `address` text COLLATE utf8mb4_unicode_ci,
  `join_date` datetime NOT NULL DEFAULT '2024-04-01 03:47:22',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `institution_id`, `major_id`, `name`, `email`, `username`, `password`, `phone`, `gender`, `active`, `generation`, `role`, `address`, `join_date`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Administrator', 'admin@example.com', 'admin', '$2y$10$pzW30/r8ME/1PBOfsEvhdOpOq5TfrLxTUzem50Y0x5v8.C0ZKrd8C', NULL, NULL, 1, 2024, 'super_admin', NULL, '2024-04-01 03:47:22', NULL, NULL, '2024-03-31 20:47:23', '2024-04-03 02:19:58'),
(2, 1, 1, 'Williams', 'williams342002@uvers.ac.id', '2020133002', '$2y$10$aCCJNZrNTuLACT0xpQXF1.klc4r3Hc2i4Mbs3NF9Q/1tQ3vzSIWvK', NULL, NULL, 1, 2024, 'super_admin', NULL, '2024-04-01 03:47:22', NULL, NULL, '2024-03-31 20:47:23', '2024-04-03 03:06:02'),
(3, 1, 11, 'Khenjy Johnelson', 'khenjyjohnelson123@gmail.com', '2022133005', '$2y$10$HuWJ5iueyjgoirM7tHBXCOzBEKJK0aPGFy1GnpjXEPY14EGZoAIbW', '082287394758', 'male', 1, 2024, 'user', 'Komplek Perumahan Griya Mas Blok L No 12B', '2024-04-01 00:00:00', NULL, NULL, '2024-03-31 23:05:53', '2024-04-03 02:23:23'),
(4, 1, 11, 'John Wick', 'john@gmail.com', '2022133006', '$2y$10$PO/bAnooB6QgUm68zxYCUuf.iVyRIz7w7zj.m1VjLwXiKNU3bkwTK', '0812345678', 'female', 1, 2024, 'user', 'Griya Mas', '2024-04-04 03:47:22', NULL, NULL, '2024-04-03 00:48:06', '2024-04-03 00:51:36');

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
(8, 'CC BY 4.0', '<p>You are free to:<br />\r\n1.&nbsp;Share &mdash; copy and redistribute the material in any medium or format for any purpose, even commercially.<br />\r\n2.&nbsp;Adapt &mdash; remix, transform, and build upon the material for any purpose, even commercially. The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by.png', 'https://creativecommons.org/licenses/by/4.0/', 'mati', 1),
(9, 'CC BY-SA 4.0', '<p>You are free to:<br />\r\n1.&nbsp;Share &mdash; copy and redistribute the material in any medium or format for any purpose, even commercially.<br />\r\n2. Adapt &mdash; remix, transform, and build upon the material for any purpose, even commercially. The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1. Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;ShareAlike &mdash; If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.<br />\r\n3.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-sa.png', 'https://creativecommons.org/licenses/by-sa/4.0/', 'mati', 1),
(10, 'CC BY-NC 4.0', '<p>You are free to:<br />\r\n1. Share &mdash; copy and redistribute the material in any medium or format<br />\r\n2.&nbsp;Adapt &mdash; remix, transform, and build upon the material The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;NonCommercial &mdash; You may not use the material for commercial purposes .<br />\r\n3.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-nc.png', 'https://creativecommons.org/licenses/by-nc/4.0/', 'mati', 1),
(11, 'CC BY-NC-SA 4.0', '<p>You are free to:<br />\r\n1.&nbsp;Share &mdash; copy and redistribute the material in any medium or format<br />\r\n2.&nbsp;Adapt &mdash; remix, transform, and build upon the material The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;NonCommercial &mdash; You may not use the material for commercial purposes .<br />\r\n3.&nbsp;ShareAlike &mdash; If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.<br />\r\n4.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-nc-sa.png', 'https://creativecommons.org/licenses/by-nc-sa/4.0/', 'aktif', 1),
(12, 'CC BY-ND 4.0', '<p>You are free to:<br />\r\n1.&nbsp;Share &mdash; copy and redistribute the material in any medium or format for any purpose, even commercially. The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2.&nbsp;NoDerivatives &mdash; If you remix, transform, or build upon the material, you may not distribute the modified material.<br />\r\n3.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-nd.png', 'https://creativecommons.org/licenses/by-nd/4.0/', 'mati', 1),
(13, 'CC BY-NC-ND 4.0', '<p>You are free to:<br />\r\n1. Share &mdash; copy and redistribute the material in any medium or format The licensor cannot revoke these freedoms as long as you follow the license terms.</p>\r\n\r\n<p>Under the following terms:<br />\r\n1.&nbsp;Attribution &mdash; You must give appropriate credit , provide a link to the license, and indicate if changes were made . You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.<br />\r\n2. NonCommercial &mdash; You may not use the material for commercial purposes.<br />\r\n3. NoDerivatives &mdash; If you remix, transform, or build upon the material, you may not distribute the modified material.<br />\r\n4.&nbsp;No additional restrictions &mdash; You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.</p>\r\n', 'by-nc-nd.png', 'https://creativecommons.org/licenses/by-nc-nd/4.0/', 'mati', 1),
(14, 'CC0 1.0', '<p>No Copyright The person who associated a work with this deed has dedicated the work to the public domain by waiving all of his or her rights to the work worldwide under copyright law, including all related and neighboring rights, to the extent allowed by law.</p>\r\n', 'cc-zero.png', 'https://creativecommons.org/publicdomain/zero/1.0/', 'mati', 1);

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
(3, 1, 'action_completed_successfully', 'Data Foto berhasil diubah!', '2024-05-09 21:53:56', '2024-06-18 13:07:43'),
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
(21, 3, 'action_completed_successfully', 'Data Pesanan berhasil disimpan!', '2024-05-10 13:46:16', '2024-06-15 00:14:50'),
(22, 3, 'action_completed_successfully', 'Data Transaksi berhasil disimpan!', '2024-05-10 13:48:15', '2024-06-15 00:14:56'),
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
(113, 3, 'informational_note', 'Selamat datang tamu Bill!', '2024-05-13 21:03:58', '2024-06-19 20:06:32'),
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
(130, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status) = id', '2024-05-25 07:08:56', '2024-06-09 20:55:37'),
(131, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:12:31', '2024-06-09 20:55:37'),
(132, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:16:03', '2024-06-09 20:55:37'),
(133, 1, 'action_completed_successfully', 'Data License ID berhasil diubah! (License ID = id)', '2024-05-25 07:18:11', '2024-06-09 20:55:37'),
(134, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:26:09', '2024-06-09 20:55:37'),
(135, 1, 'action_completed_successfully', 'Data Room Facility ID berhasil dihapus! (Room Facility ID = id)', '2024-05-25 07:27:45', '2024-06-09 20:55:37'),
(136, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:30:58', '2024-06-09 20:55:37'),
(137, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = id)', '2024-05-25 07:31:01', '2024-06-09 20:55:37'),
(138, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = 11)', '2024-05-25 09:02:05', '2024-06-09 20:55:37'),
(139, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = 11)', '2024-05-25 09:02:34', '2024-06-09 07:54:21'),
(140, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = 10)', '2024-05-25 09:02:37', '2024-05-31 14:50:32'),
(141, 1, 'action_completed_successfully', 'Data License Status berhasil diubah! (License Status = 10)', '2024-05-25 09:02:39', '2024-05-31 14:34:46'),
(142, 1, 'action_completed_successfully', 'Data Theme ID berhasil diubah! ( = 1)', '2024-05-31 09:50:44', '2024-05-31 14:33:13'),
(143, 1, 'action_completed_successfully', 'Data Theme ID berhasil diubah! ( = 1)', '2024-05-31 09:52:35', '2024-05-31 14:33:10'),
(144, 1, 'action_completed_successfully', 'Data Website Themes berhasil disimpan!', '2024-05-31 09:59:55', '2024-05-31 14:34:33'),
(145, 1, 'action_completed_successfully', 'Data Website Themes berhasil diubah! (Website Themes = 5)', '2024-05-31 10:00:08', '2024-05-31 14:24:06'),
(146, 1, 'action_completed_successfully', 'Data Favicon berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-05-31 10:00:17', '2024-05-31 14:33:08'),
(147, 1, 'action_completed_successfully', 'Data Logo berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-05-31 10:00:25', '2024-05-31 14:11:34'),
(148, 1, 'action_completed_successfully', 'Data Photo berhasil diubah! (Theme ID = tabel_b7_field1)', '2024-05-31 10:00:38', '2024-05-31 14:11:27'),
(149, 1, 'action_completed_successfully', 'Hotel Facilities successfully updated! (ID = 1)', '2024-06-09 09:12:53', '2024-06-09 20:55:37'),
(150, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 3)', '2024-06-09 17:15:43', '2024-06-09 20:55:37'),
(151, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 1)', '2024-06-09 17:16:32', '2024-06-09 20:55:37'),
(152, 1, 'action_completed_successfully', 'License Status successfully updated! (ID = 10)', '2024-06-09 21:23:10', '2024-06-12 19:04:18'),
(153, 1, 'action_completed_successfully', 'Event Website successfully saved!', '2024-06-12 18:18:38', '2024-06-12 19:04:18'),
(154, 1, 'action_completed_successfully', 'Event Website successfully saved!', '2024-06-12 20:52:10', '2024-06-12 21:14:17'),
(155, 1, 'action_completed_successfully', 'Status successfully updated! (ID = 7)', '2024-06-12 21:14:04', '2024-06-12 21:14:17'),
(156, 1, 'action_completed_successfully', 'Status successfully updated! (ID = 7)', '2024-06-12 21:14:07', '2024-06-12 21:14:17'),
(157, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 7)', '2024-06-12 21:16:26', '2024-06-13 18:04:27'),
(158, 1, 'action_completed_successfully', 'Event Website successfully saved!', '2024-06-12 21:21:13', '2024-06-13 18:04:27'),
(159, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-12 23:19:43', '2024-06-13 18:04:27'),
(160, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-12 23:20:22', '2024-06-13 18:04:27'),
(161, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-12 23:20:47', '2024-06-13 18:04:27'),
(162, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-12 23:20:56', '2024-06-13 18:04:27'),
(163, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-12 23:21:35', '2024-06-13 18:04:27'),
(164, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-12 23:21:51', '2024-06-13 18:04:27'),
(165, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-12 23:22:05', '2024-06-13 18:04:27'),
(166, 1, 'action_completed_successfully', 'User successfully updated! (ID = 8)', '2024-06-12 23:57:13', '2024-06-13 18:04:27'),
(167, 1, 'action_completed_successfully', 'User successfully updated! (ID = 8)', '2024-06-12 23:58:14', '2024-06-13 18:04:27'),
(168, 1, 'action_completed_successfully', 'User successfully updated! (ID = 8)', '2024-06-12 23:58:39', '2024-06-13 18:04:27'),
(169, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 1)', '2024-06-13 08:22:10', '2024-06-13 18:04:27'),
(170, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 3)', '2024-06-13 09:05:52', '2024-06-13 18:04:27'),
(171, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 12:27:47', '2024-06-13 18:04:27'),
(172, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 12:29:05', '2024-06-13 18:04:27'),
(173, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 7)', '2024-06-13 12:29:28', '2024-06-13 18:04:27'),
(174, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 12:30:09', '2024-06-13 18:04:27'),
(175, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 7)', '2024-06-13 12:30:16', '2024-06-13 18:04:27'),
(176, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 4)', '2024-06-13 15:02:12', '2024-06-13 18:04:27'),
(177, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:02:34', '2024-06-13 18:04:27'),
(178, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:03:04', '2024-06-13 18:04:27'),
(179, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:12:10', '2024-06-13 18:04:27'),
(180, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:12:46', '2024-06-13 18:04:27'),
(181, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:15:54', '2024-06-13 18:04:27'),
(182, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:18:21', '2024-06-13 18:04:27'),
(183, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:18:29', '2024-06-13 18:04:27'),
(184, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:20:48', '2024-06-13 18:04:27'),
(185, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:21:31', '2024-06-13 18:04:27'),
(186, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:22:02', '2024-06-13 18:04:27'),
(187, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 8)', '2024-06-13 15:22:31', '2024-06-13 18:04:27'),
(188, 1, 'action_completed_successfully', 'Event Website successfully deleted! (ID = 8)', '2024-06-13 16:16:22', '2024-06-13 18:04:27'),
(189, 1, 'action_completed_successfully', 'Event Website successfully deleted! (ID = 7)', '2024-06-13 16:17:59', '2024-06-13 18:04:27'),
(190, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 3)', '2024-06-13 16:34:15', '2024-06-13 18:04:27'),
(191, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 3)', '2024-06-13 16:37:10', '2024-06-13 18:04:27'),
(192, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 3)', '2024-06-13 16:41:01', '2024-06-13 18:04:27'),
(193, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 4)', '2024-06-13 16:41:43', '2024-06-13 18:04:27'),
(194, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 4)', '2024-06-13 16:41:52', '2024-06-13 18:04:27'),
(195, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 4)', '2024-06-13 16:46:53', '2024-06-13 18:04:27'),
(196, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 3)', '2024-06-13 16:50:01', '2024-06-13 18:04:27'),
(197, 1, 'action_completed_successfully', 'Officer ID successfully deleted! (ID = 4)', '2024-06-13 18:01:17', '2024-06-13 18:04:27'),
(198, 1, 'action_completed_successfully', 'Officer successfully deleted! (ID = 3)', '2024-06-13 18:04:10', '2024-06-13 18:04:27'),
(199, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 1)', '2024-06-13 18:04:19', '2024-06-13 18:04:27'),
(200, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 2)', '2024-06-13 23:36:08', '2024-06-14 20:17:02'),
(201, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 2)', '2024-06-13 23:36:43', '2024-06-14 20:17:02'),
(202, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 2)', '2024-06-13 23:36:58', '2024-06-14 20:17:02'),
(203, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 2)', '2024-06-13 23:37:10', '2024-06-14 20:17:02'),
(204, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 17)', '2024-06-13 23:41:15', '2024-06-14 20:17:02'),
(205, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 28)', '2024-06-13 23:48:00', '2024-06-14 20:17:02'),
(206, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 28)', '2024-06-13 23:48:22', '2024-06-14 20:17:02'),
(207, 1, 'action_completed_successfully', 'Website Decoration successfully saved!', '2024-06-14 12:16:54', '2024-06-14 20:17:02'),
(208, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 32)', '2024-06-14 12:18:14', '2024-06-14 20:17:02'),
(209, 1, 'action_completed_successfully', 'Website Decoration successfully saved!', '2024-06-14 12:21:20', '2024-06-14 20:17:02'),
(210, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 33)', '2024-06-14 12:21:43', '2024-06-14 20:17:02'),
(211, 1, 'action_completed_successfully', 'Website Decoration successfully saved!', '2024-06-14 12:22:25', '2024-06-14 20:17:02'),
(212, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 34)', '2024-06-14 12:22:50', '2024-06-14 20:17:02'),
(213, 1, 'action_completed_successfully', 'Website Decoration successfully saved!', '2024-06-14 12:24:22', '2024-06-14 20:17:02'),
(214, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 1)', '2024-06-14 12:31:20', '2024-06-14 20:17:02'),
(215, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 1)', '2024-06-14 12:32:13', '2024-06-14 20:17:02'),
(216, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 1)', '2024-06-14 12:33:01', '2024-06-14 20:17:02'),
(217, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 2)', '2024-06-14 12:33:22', '2024-06-14 20:17:02'),
(218, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 2)', '2024-06-14 12:34:03', '2024-06-14 20:17:02'),
(219, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 2)', '2024-06-14 12:34:34', '2024-06-14 20:17:02'),
(220, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 2)', '2024-06-14 12:35:16', '2024-06-14 20:17:02'),
(221, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 2)', '2024-06-14 12:35:45', '2024-06-14 20:17:02'),
(222, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 2)', '2024-06-14 12:35:58', '2024-06-14 20:17:02'),
(223, 1, 'action_completed_successfully', 'Event Website successfully updated! (ID = 2)', '2024-06-14 12:36:11', '2024-06-14 20:17:02'),
(224, 1, 'action_completed_successfully', 'Website Themes successfully updated! (ID = 4)', '2024-06-14 15:16:20', '2024-06-14 20:17:02'),
(225, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 30)', '2024-06-14 15:50:44', '2024-06-14 20:17:02'),
(226, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 26)', '2024-06-14 15:51:24', '2024-06-14 20:17:02'),
(227, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 30)', '2024-06-14 15:52:21', '2024-06-14 20:17:02'),
(228, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 35)', '2024-06-14 18:10:25', '2024-06-14 20:17:02'),
(229, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 12)', '2024-06-14 18:12:44', '2024-06-14 20:17:02'),
(230, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 12)', '2024-06-14 18:18:39', '2024-06-14 20:17:02'),
(231, 1, 'action_completed_successfully', 'Theme ID successfully updated! (ID = 1)', '2024-06-14 20:05:57', '2024-06-14 20:17:02'),
(232, 1, 'action_completed_successfully', 'Theme ID successfully updated! (ID = 1)', '2024-06-14 20:15:42', '2024-06-14 20:17:02'),
(233, 1, 'action_completed_successfully', 'Officer successfully updated! (ID = 2)', '2024-06-14 23:30:26', '2024-06-14 23:30:36'),
(234, 1, 'action_completed_successfully', 'Website Settings successfully updated! (ID = 1)', '2024-06-15 15:30:00', '2024-06-15 15:30:45'),
(235, 2, 'action_completed_successfully', 'Hotel Operations successfully saved!', '2024-06-16 20:53:54', '2024-06-16 20:57:18'),
(236, 2, 'action_completed_successfully', 'Hotel Operations successfully saved!', '2024-06-17 10:39:50', '2024-06-17 10:45:44'),
(237, 2, 'action_completed_successfully', 'Hotel Operations successfully saved!', '2024-06-17 10:41:00', '2024-06-17 10:45:44'),
(238, 2, 'action_completed_successfully', 'Room successfully updated! (ID = 25)', '2024-06-17 10:44:32', '2024-06-17 10:45:44'),
(239, 2, 'action_completed_successfully', 'Hotel Operations successfully saved!', '2024-06-17 10:44:40', '2024-06-17 10:45:44'),
(240, 1, 'action_completed_successfully', 'Website Decoration successfully saved!', '2024-06-18 14:38:56', '2024-06-22 11:38:06'),
(241, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 36)', '2024-06-18 20:27:23', '2024-06-19 20:08:28'),
(242, 1, 'action_completed_successfully', 'Website Decoration successfully updated! (ID = 36)', '2024-06-18 20:35:31', '2024-06-22 11:38:06'),
(243, 1, 'action_completed_successfully', 'Website Decoration successfully saved!', '2024-06-19 16:06:02', '2024-06-22 11:38:06'),
(244, 1, 'action_completed_successfully', 'Website Decoration successfully deleted! (ID = 37)', '2024-06-19 16:09:06', '2024-06-19 20:07:14'),
(245, 3, 'action_completed_successfully', 'Orders successfully saved!', '2024-06-21 14:54:08', '2024-06-21 15:07:29'),
(246, 3, 'action_completed_successfully', 'Orders successfully saved!', '2024-06-21 14:56:53', '2024-06-21 15:07:29'),
(247, 3, 'action_completed_successfully', 'Orders successfully saved!', '2024-06-21 14:58:24', '2024-06-21 15:07:29'),
(248, 3, 'action_completed_successfully', 'Orders successfully saved!', '2024-06-21 15:04:26', '2024-06-21 15:07:29'),
(249, 9, 'new_message_received', 'Selamat datang tamu Yodi!', '2024-06-21 22:34:34', '2024-06-21 22:34:49'),
(250, 9, 'action_completed_successfully', 'Orders successfully saved!', '2024-06-21 22:35:23', NULL),
(251, 2, 'action_completed_successfully', 'Orders successfully updated! (ID = 22)', '2024-06-21 22:37:29', '2024-06-23 10:41:56'),
(252, 2, 'action_completed_successfully', 'Room successfully updated! (ID = 26)', '2024-06-21 22:41:00', '2024-06-23 10:41:56'),
(253, 2, 'action_completed_successfully', 'Hotel Operations successfully saved!', '2024-06-21 22:41:21', '2024-06-23 10:41:56'),
(254, 1, 'action_completed_successfully', 'Website Decorations successfully saved!', '2024-06-21 22:58:06', '2024-06-22 11:38:06'),
(255, 1, 'action_completed_successfully', 'Website Decorations successfully saved!', '2024-06-24 08:27:17', '2024-06-24 11:55:58'),
(256, 3, 'action_completed_successfully', 'Orders successfully saved!', '2024-06-26 15:05:47', NULL);

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
(3, 'Facebook', 'Hotel Hebat', 'https://facebook.com/hotelhebat', '<i class=\"fab fa-facebook\"></i>', 'aktif', 1),
(4, 'Instagram', 'HotelHebat', 'https://instagram.com/hotelhebat', '<i class=\"fab fa-instagram\"></i>', 'aktif', 1),
(5, 'Instagram', 'LEVATO', 'https://www.instagram.com/levato.grow', '<i class=\"fab fa-instagram\"></i>', 'aktif', 3);

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
(1, 'college', 'utama_favicon.jpg', 'utama_logo.jpg', 'utama_foto.jpg', '<p>Lepaskan diri Anda ke <strong>Hotel Hebat</strong>, dikelilingi oleh keindahan pegunungan yang indah, danau, dan sawah menghijau.</p>\r\n\r\n<p>Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau; Kid&#39;s Club yang luas - menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga.</p>\r\n\r\n<p>Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.</p>\r\n'),
(2, 'christmas', 'christmas_favicon.png', 'christmas_logo.png', 'college_foto.png', '<p>Rayakan Natal Bersama dengan Hotel HEBAT</p>\r\n'),
(3, 'college_uvers_levato', 'college_uvers_levato_favicon.jpg', 'college_uvers_levato_logo.jpg', 'college_uvers_levato_foto.jpg', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;LEVATO adalah platform online yang menyediakan layanan jasa pembuatan izin usaha bagi para pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) di Kota Batam. Dengan fokus pada&amp;nbsp;&lt;strong&gt;kemudahan&lt;/strong&gt;,&amp;nbsp;&lt;strong&gt;kecepatan&lt;/strong&gt;, dan&amp;nbsp;&lt;strong&gt;kepercayaan&lt;/strong&gt;, LEVATO memungkinkan pelaku UMKM untuk&amp;nbsp;mengurus izin usaha mereka secara mudah dan cepat melalui media sosial Instagram. Kami berkomitmen untuk memberikan informasi edukasi mengenai pentingnya memiliki izin usaha serta menyediakan layanan lengkap mulai dari konsultasi hingga pendampingan dalam proses perizinan&lt;/p&gt;\r\n'),
(4, 'college_uvers_levato_2', 'college_uvers_levato_2_favicon.png', 'college_uvers_levato_2_logo.png', 'college_uvers_levato_2_foto.jpg', '<p>LEVATO adalah platform online yang menyediakan layanan jasa pembuatan izin usaha bagi para pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) di Kota Batam. Dengan fokus pada&nbsp;<strong>kemudahan</strong>,&nbsp;<strong>kecepatan</strong>, dan&nbsp;<strong>kepercayaan</strong>, LEVATO memungkinkan pelaku UMKM untuk&nbsp;mengurus izin usaha mereka secara mudah dan cepat melalui media sosial Instagram. Kami berkomitmen untuk memberikan informasi edukasi mengenai pentingnya memiliki izin usaha serta menyediakan layanan lengkap mulai dari konsultasi hingga pendampingan dalam proses perizinan</p>\r\n'),
(5, 'college', 'college_favicon.jpg', 'college_logo.jpg', 'college_foto.jpg', '<p>Selamat datang di AcadeTop- platform terdepan untuk mahasiswa yang mencari laptop yang sesuai dengan kebutuhan akademis dan gaya hidup digital mereka. Kami mengerti bahwa laptop bukan hanya alat, tapi merupakan kawan setia dalam perjalanan pendidikan Anda. Event &quot;AcadeTop Expo&quot; adalah kesempatan eksklusif bagi mahasiswa untuk menjelajahi berbagai pilihan laptop, dari yang ringkas dan efisien hingga yang kuat dan inovatif. Acara ini merupakan kolaborasi dengan merek-merek terkemuka dalam industri, sehingga Anda bisa yakin mendapatkan penawaran terbaik.</p>\r\n');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fashotel`
--
ALTER TABLE `fashotel`
  ADD PRIMARY KEY (`id_fashotel`);

--
-- Indexes for table `faskamar`
--
ALTER TABLE `faskamar`
  ADD PRIMARY KEY (`id_faskamar`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `htr_id_tipe_fk` (`id_tipe`),
  ADD KEY `htr_id_user_fk` (`id_user`),
  ADD KEY `htr_no_kamar_fk` (`no_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`),
  ADD KEY `kmr_id_pesanan_fk` (`id_pesanan`),
  ADD KEY `kmr_id_tipe_fk` (`id_tipe`);

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
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id_operations`),
  ADD KEY `ops_id_petugas_fk` (`id_petugas`),
  ADD KEY `ops_id_user+fk` (`id_user`);

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
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `psn_id_user_fk` (`id_tipe`),
  ADD KEY `psn_no_kamar_fk` (`no_kamar`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pesanan_fk` (`id_pesanan`),
  ADD KEY `trs_id_user_fk` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_institution_id_foreign` (`institution_id`),
  ADD KEY `users_major_id_foreign` (`major_id`);

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
  MODIFY `id_decor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fashotel`
--
ALTER TABLE `fashotel`
  MODIFY `id_fashotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faskamar`
--
ALTER TABLE `faskamar`
  MODIFY `id_faskamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `no_kamar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id_operations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `website_licenses`
--
ALTER TABLE `website_licenses`
  MODIFY `id_lisensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `website_notifications`
--
ALTER TABLE `website_notifications`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `website_notif_type`
--
ALTER TABLE `website_notif_type`
  MODIFY `id_notif_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `website_sosmed`
--
ALTER TABLE `website_sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `website_themes`
--
ALTER TABLE `website_themes`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
