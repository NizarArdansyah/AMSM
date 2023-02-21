-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2023 pada 18.09
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amsm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'user', 'warga'),
(2, 'admin', 'administrator'),
(3, 'petugas', 'petugas atau perangkat desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 3),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(2, 12),
(3, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
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
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'nizarni', 1, '2022-12-23 21:03:22', 0),
(2, '::1', 'admin@gmail.com', NULL, '2022-12-23 21:10:47', 0),
(3, '::1', 'admin', 2, '2022-12-23 21:17:19', 0),
(4, '::1', 'petugas', 4, '2022-12-23 21:26:23', 0),
(5, '::1', 'admin@gmail.com', 5, '2022-12-23 21:33:33', 1),
(6, '::1', 'admin@gmail.com', 5, '2022-12-24 01:35:52', 1),
(7, '::1', 'warga@gmail.com', 6, '2022-12-24 02:34:07', 1),
(8, '::1', 'warga@gmail.com', 6, '2022-12-24 02:52:42', 1),
(9, '::1', 'admin@gmail.com', 5, '2022-12-24 03:37:02', 1),
(10, '::1', 'warga@gmail.com', 6, '2022-12-24 03:44:37', 1),
(11, '::1', 'admin@gmail.com', 5, '2022-12-24 04:18:58', 1),
(12, '::1', 'admin@gmail.com', 5, '2022-12-25 05:37:24', 1),
(13, '::1', 'nizarardansyah@gmail.com', NULL, '2022-12-25 05:38:54', 0),
(14, '::1', 'asd', NULL, '2022-12-25 06:03:07', 0),
(15, '::1', 'admin', NULL, '2022-12-25 06:03:18', 0),
(16, '::1', 'admin@gmail.com', 5, '2022-12-25 06:03:24', 1),
(17, '::1', 'user', NULL, '2022-12-25 08:04:48', 0),
(18, '::1', 'warga@gmail.com', 6, '2022-12-25 08:05:21', 1),
(19, '::1', 'admin@gmail.com', 5, '2022-12-25 08:06:19', 1),
(20, '::1', 'admin@gmail.com', NULL, '2023-01-03 21:07:27', 0),
(21, '::1', 'admin@gmail.com', NULL, '2023-01-03 21:07:45', 0),
(22, '::1', 'admin@gmail.com', NULL, '2023-01-03 21:09:22', 0),
(23, '::1', 'admin@gmail.com', NULL, '2023-01-03 21:09:34', 0),
(24, '::1', 'admin@gmail.com', NULL, '2023-01-03 21:09:51', 0),
(25, '::1', 'admin@gmail.com', 7, '2023-01-03 21:12:12', 1),
(26, '::1', 'warga@gmail.com', 8, '2023-01-03 21:12:54', 1),
(27, '::1', 'admin@gmail.com', 7, '2023-01-03 21:13:27', 1),
(28, '::1', 'admin@gmail.com', 9, '2023-01-03 21:37:34', 1),
(29, '::1', 'warga@gmail.com', 10, '2023-01-04 01:35:02', 1),
(30, '::1', 'admin@gmail.com', 12, '2023-01-04 01:39:13', 1),
(31, '::1', 'petugas@gmail.com', 11, '2023-01-04 01:39:45', 1),
(32, '::1', 'warga@gmail.com', 10, '2023-01-04 01:43:23', 1),
(33, '::1', 'warga@gmail.com', 10, '2023-01-06 18:35:51', 1),
(34, '::1', 'petugas@gmail.com', 11, '2023-01-06 18:52:55', 1),
(35, '::1', 'petugas@gmail.com', 11, '2023-01-07 04:12:53', 1),
(36, '::1', 'warga@gmail.com', 10, '2023-01-07 04:19:50', 1),
(37, '::1', 'warga@gmail.com', 10, '2023-01-07 05:38:25', 1),
(38, '::1', 'petugas@gmail.com', 11, '2023-01-07 09:03:17', 1),
(39, '::1', 'warga@gmail.com', 10, '2023-01-07 09:05:01', 1),
(40, '::1', 'warga@gmail.com', 10, '2023-01-09 16:15:51', 1),
(41, '::1', 'petugas@gmail.com', 11, '2023-01-09 16:28:04', 1),
(42, '::1', 'petugas@gmail.com', 11, '2023-01-09 16:28:04', 1),
(43, '::1', 'admin@gmail.com', 12, '2023-01-09 16:41:36', 1),
(44, '::1', 'warga@gmail.com', 10, '2023-01-10 21:44:43', 1),
(45, '::1', 'warga@gmail.com', 10, '2023-01-10 22:17:40', 1),
(46, '::1', 'warga1@gmail.com', 13, '2023-01-11 14:58:12', 1),
(47, '::1', 'petugas@gmail.com', 11, '2023-01-11 15:01:03', 1),
(48, '::1', 'warga@gmail.com', 10, '2023-01-11 15:05:25', 1),
(49, '::1', 'warga@gmail.com', 10, '2023-01-11 15:33:50', 1),
(50, '::1', 'warga1@gmail.com', 13, '2023-01-12 08:40:54', 1),
(51, '::1', 'petugas', NULL, '2023-01-12 09:08:05', 0),
(52, '::1', 'petugas@gmail.com', 11, '2023-01-12 09:08:17', 1),
(53, '::1', 'petugas@gmail.com', 11, '2023-01-12 14:27:53', 1),
(54, '::1', 'petugas@gmail.com', 11, '2023-01-12 19:50:09', 1),
(55, '::1', 'warga@gmail.com', 10, '2023-01-12 22:07:36', 1),
(56, '::1', 'warga@gmail.com', 10, '2023-01-13 08:49:14', 1),
(57, '::1', 'petugas@gmail.com', 11, '2023-01-13 09:59:09', 1),
(58, '::1', 'petugas@gmail.com', 11, '2023-01-13 16:08:04', 1),
(59, '::1', 'warga1@gmail.com', 13, '2023-01-13 16:27:55', 1),
(60, '::1', 'petugas@gmail.com', 11, '2023-01-13 16:28:37', 1),
(61, '::1', 'warga@gmail.com', 10, '2023-01-13 16:34:46', 1),
(62, '::1', 'petugas@gmail.com', 11, '2023-01-13 16:34:58', 1),
(63, '::1', 'petugas@gmail.com', 11, '2023-01-13 22:47:29', 1),
(64, '::1', 'petugas@gmail.com', 11, '2023-01-14 07:11:50', 1),
(65, '::1', 'petugas@gmail.com', 11, '2023-01-14 19:20:13', 1),
(66, '::1', 'petugas@gmail.com', 11, '2023-01-15 11:26:05', 1),
(67, '::1', 'warga1@gmail.com', 13, '2023-01-15 12:56:52', 1),
(68, '::1', 'warga@gmail.com', 10, '2023-01-15 12:57:25', 1),
(69, '::1', 'warga@gmail.com', 10, '2023-01-15 18:50:22', 1),
(70, '::1', 'warga1@gmail.com', 13, '2023-01-15 18:50:42', 1),
(71, '::1', 'petugas@gmail.com', 11, '2023-01-15 18:51:08', 1),
(72, '::1', 'warga@gmail.com', 10, '2023-01-15 19:05:08', 1),
(73, '::1', 'warga1@gmail.com', 13, '2023-01-15 19:05:21', 1),
(74, '::1', 'warga2@gmail.com', 14, '2023-01-15 19:11:57', 1),
(75, '::1', 'warga@gmail.com', 10, '2023-01-15 23:04:21', 1),
(76, '::1', 'warga1@gmail.com', 13, '2023-01-15 23:12:58', 1),
(77, '::1', 'petugas@gmail.com', 11, '2023-01-15 23:26:31', 1),
(78, '::1', 'warga@gmail.com', 10, '2023-01-15 23:36:33', 1),
(79, '::1', 'warga1@gmail.com', 13, '2023-01-16 01:12:59', 1),
(80, '::1', 'warga2@gmail.com', 14, '2023-01-16 01:13:39', 1),
(81, '::1', 'warga@gmail.com', 10, '2023-01-16 01:46:39', 1),
(82, '::1', 'warga@gmail.com', 10, '2023-01-16 02:02:03', 1),
(83, '::1', 'warga@gmail.com', 10, '2023-01-16 06:50:16', 1),
(84, '::1', 'warga1@gmail.com', 13, '2023-01-16 14:33:33', 1),
(85, '::1', 'warga@gmail.com', 15, '2023-01-16 15:04:45', 1),
(86, '::1', 'warga@gmail.com', 15, '2023-01-16 15:07:20', 1),
(87, '::1', 'warga@gmail.com', 15, '2023-01-16 15:08:12', 1),
(88, '::1', 'petugas@gmail.com', 11, '2023-01-16 15:08:34', 1),
(89, '::1', 'warga@gmail.com', 15, '2023-01-16 15:10:08', 1),
(90, '::1', 'warga@gmail.com', 16, '2023-01-16 23:22:25', 1),
(91, '::1', 'petugas@gmail.com', 11, '2023-01-16 23:24:35', 1),
(92, '::1', 'warga@gmail.com', 16, '2023-01-16 23:27:00', 1),
(93, '::1', 'petugas@gmail.com', 11, '2023-01-16 23:39:52', 1),
(94, '::1', 'petugas@gmail.com', 11, '2023-01-17 10:59:29', 1),
(95, '::1', 'warga@gmail.com', 16, '2023-01-17 21:05:29', 1),
(96, '::1', 'petugas@gmail.com', 11, '2023-01-17 21:10:56', 1),
(97, '::1', 'petugas@gmail.com', 11, '2023-01-17 22:06:26', 1),
(98, '::1', 'warga@gmail.com', 16, '2023-01-18 01:58:14', 1),
(99, '::1', 'warga', NULL, '2023-01-18 02:33:16', 0),
(100, '::1', 'warga@gmail.com', 16, '2023-01-18 02:33:22', 1),
(101, '::1', 'warga@gmail.com', 16, '2023-01-18 02:41:17', 1),
(102, '::1', 'warga@gmail.com', 16, '2023-01-18 02:57:33', 1),
(103, '::1', 'petugas@gmail.com', 11, '2023-01-18 03:00:14', 1),
(104, '::1', 'warga@gmail.com', 16, '2023-01-18 03:26:52', 1),
(105, '::1', 'warga@gmail.com', 16, '2023-01-18 12:43:08', 1),
(106, '::1', 'admin@gmail.com', 12, '2023-01-18 12:43:48', 1),
(107, '::1', 'admin@gmail.com', 12, '2023-01-20 17:51:36', 1),
(108, '::1', 'warga@gmail.com', 16, '2023-01-23 19:52:04', 1),
(109, '::1', 'admin@gmail.com', 12, '2023-01-23 20:25:46', 1),
(110, '::1', 'jojo@gmail.com', 17, '2023-01-23 20:34:30', 1),
(111, '::1', 'admin@gmail.com', 12, '2023-01-23 22:50:59', 1),
(112, '::1', 'petugas@gmail.com', 11, '2023-01-23 23:06:33', 1),
(113, '::1', 'admin@gmail.com', 12, '2023-01-23 23:12:13', 1),
(114, '::1', 'warga@gmail.com', 16, '2023-01-24 00:21:40', 1),
(115, '::1', 'admin@gmail.com', 12, '2023-01-24 23:58:03', 1),
(116, '::1', 'jojo@gmail.com', 17, '2023-01-25 00:21:35', 1),
(117, '::1', 'jojo@gmail.com', 17, '2023-01-25 00:22:08', 1),
(118, '::1', 'jojo@gmail.com', 17, '2023-01-25 00:36:10', 1),
(119, '::1', 'jojo', NULL, '2023-01-25 00:36:20', 0),
(120, '::1', 'jojo@gmail.com', 17, '2023-01-25 00:36:58', 1),
(121, '::1', 'jojo', NULL, '2023-01-25 00:39:27', 0),
(122, '::1', 'jojo@gmail.com', 17, '2023-01-25 00:39:34', 1),
(123, '::1', 'asd', NULL, '2023-01-25 01:37:39', 0),
(124, '::1', 'jojo@gmail.com', 17, '2023-01-25 01:44:55', 1),
(125, '::1', 'admin@gmail.com', 12, '2023-01-25 01:45:16', 1),
(126, '::1', 'popon@gmail.com', 20, '2023-01-25 02:06:20', 1),
(127, '::1', 'admin@gmail.com', 12, '2023-01-25 02:11:56', 1),
(128, '::1', 'warga', NULL, '2023-01-25 02:19:16', 0),
(129, '::1', 'warga', NULL, '2023-01-25 02:19:32', 0),
(130, '::1', 'warga@gmail.com', 16, '2023-01-25 02:19:52', 1),
(131, '::1', 'abid@gmail.com', 21, '2023-01-25 02:32:30', 1),
(132, '::1', 'jojo@gmail.com', 17, '2023-01-25 20:39:54', 1),
(133, '::1', 'petugas@gmail.com', 11, '2023-01-25 21:54:35', 1),
(134, '::1', 'admin@gmail.com', 12, '2023-01-25 22:04:34', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'buat-surat', 'membuat surat tanpa request'),
(2, 'manage-user', 'mengelola  user'),
(3, 'manage-own-profile', 'mengatur profil sendiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
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
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
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
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1670295084, 1),
(2, '2022-12-25-163416', 'App\\Database\\Migrations\\UpdateTableUser', 'default', 'App', 1671986141, 2),
(4, '2022-12-27-190752', 'App\\Database\\Migrations\\CreateTableSurat', 'default', 'App', 1672173874, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` datetime NOT NULL,
  `pemohon` varchar(100) NOT NULL,
  `perihal` text NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `status` enum('antre','siap','dibatalkan') NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `id_user`, `nomor_surat`, `tanggal_surat`, `pemohon`, `perihal`, `keperluan`, `keterangan`, `jenis`, `status`, `pesan`) VALUES
(69, 16, '003/Ds.04/I/2023', '2023-01-25 22:41:58', 'warga', '', 'Mendapatkan Bantuan', 'keterangan', 'Surat Keterangan Tidak Mampu', 'antre', ''),
(70, 11, '004/Ds.04/I/2023', '2023-01-25 02:37:46', 'petugas', 'permohonan', 'mendaftar sekolah', 'keterangan', 'Surat Keterangan', 'siap', 'wkwwkwkwk dibatalkan'),
(72, 16, '006/Ds.04/I/2023', '2023-01-17 22:47:21', 'warga', 'permohohnan', 'mengajukan a', 'keterangan', 'Surat Keterangan', 'siap', ''),
(74, 16, '007/Ds.04/I/2023', '2023-01-25 23:35:24', 'warga', 'l', 'l', 'l', 'Surat Keterangan', 'antre', ''),
(75, 16, '008/Ds.04/I/2023', '2023-01-18 02:33:47', 'warga', 'test', 'test', 'test', 'Surat Keterangan', 'antre', ''),
(76, 16, '009/Ds.04/I/2023', '2023-01-23 20:03:24', 'warga', 'pengajuan', 'mendapatkan biata', 'iop', 'Surat Keterangan Usaha', 'antre', ''),
(77, 17, '010/Ds.04/I/2023', '2023-01-23 21:53:46', 'jojo', 'a', 'apsdio', 'asdas', 'Surat Keterangan', 'antre', ''),
(78, 17, '011/Ds.04/I/2023', '2023-01-23 23:05:24', 'jojo', 'pengajuan', 'mendapatkan bantuan', 'tolong pak', 'Surat Keterangan Tidak Mampu', 'siap', ''),
(79, 21, '012/Ds.04/I/2023', '2023-01-25 23:35:29', 'abid', 'pengajuan', 'izin kuliah', 'asdpoi', 'Surat Keterangan Usaha', 'antre', ' '),
(80, 21, '013/Ds.04/I/2023', '2023-01-25 02:54:00', 'abid', 'Pengajuan', 'mendaftar sekolah', 'keterangan banyak sekali keterangan banyak sekali keterangan banyak sekaliketerangan banyak sekali keterangan banyak sekali keterangan banyak sekali keterangan banyak sekali keterangan banyak sekali keterangan banyak sekali', 'Surat Keterangan', 'antre', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `img_user` varchar(255) NOT NULL DEFAULT 'default.svg',
  `alamat` varchar(255) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(40) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `img_user`, `alamat`, `nik`, `tgl_lahir`, `tempat_lahir`, `kewarganegaraan`, `agama`, `pekerjaan`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'petugas@gmail.com', 'petugas', 'Abdul Hamid', 'default.svg', 'RT.2 / RW.3 Desa Ambal Dukuh Sampit', '332606032881', '0000-00-00', '', 'WNI', 'Islam', 'PNS', '$2y$10$zXN0bIXzRCydkj1y1xaMn.GqPPcNSugCkVpE/BYOGV8Gs.x9K2cNm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-04 01:34:28', '2023-01-04 01:34:28', NULL),
(12, 'admin@gmail.com', 'admin', NULL, 'default.svg', NULL, NULL, '0000-00-00', '', '', '', '', '$2y$10$d78TpANMuRTiYpQyGCqP8uai0k1hM.pJMtuFPWwhims6J6hf0cJXu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-04 01:34:54', '2023-01-04 01:34:54', NULL),
(16, 'warga@gmail.com', 'warga', 'Warga baik hatiiii', 'default.svg', 'Desa Bodeh Dukuh Samir RT1 RW1', '3326041748812', '2023-01-26', 'Cirebon', 'Indonesia', 'Islam', 'Mahasiswa', '$2y$10$tPa5zFH0iCJB7X9CiWOUxuayOTgCc8sxWp/tSv18cLQNgweLqJEFK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-16 23:22:17', '2023-01-25 02:19:45', NULL),
(17, 'jojo@gmail.com', 'jojo', 'Joko Wiratno ', 'default.svg', 'Jl Kurnia no.3 Kota Denpasar', '3326192831100', '2000-02-26', 'pekalongan', 'Indonesia', 'Hindu', 'Kepolisisan RI', '$2y$10$.UnaiywJggW/mrli8fnWX.t9RH06iKc5iaSpC25YofiTByWGTCpKK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-23 20:33:13', '2023-01-25 01:37:26', NULL),
(18, 'dodo@gmail.com', 'dodo', NULL, 'default.svg', NULL, NULL, '0000-00-00', '', '', '', '', '$2y$10$gpSPsclg3eOpPaeC363HE.cinNYh7juQdibCo9N5XaUt5NDjyM2ey', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-25 01:47:25', '2023-01-25 01:55:31', '2023-01-25 01:55:31'),
(19, 'bobo@gmail.com', 'bobo', NULL, 'default.svg', NULL, NULL, '0000-00-00', '', '', '', '', '$2y$10$9mvlQma3hFDmGJhcqNcA7.b4yhBIjGloKe7qsn0mv0cIqdzE5CRB6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-25 01:48:11', '2023-01-25 01:55:02', '2023-01-25 01:55:02'),
(20, 'popon@gmail.com', 'popon', NULL, 'default.svg', NULL, NULL, '0000-00-00', '', '', '', '', '$2y$10$Xw0p8DjMMqiIzOXilEpqKeCzoeQQ3pBFzbMxtilYfuLF/boASqHJS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-25 02:00:22', '2023-01-25 02:00:22', NULL),
(21, 'abid@gmail.com', 'abid', 'asd', 'default.svg', 'asd', '3326060306010001', '0000-00-00', '', 'asd', 'asd', 'asd', '$2y$10$NRx/Ewq0N9rfonoiFFf7V.np.JxuNZtsAmist1GuyP1DNSa27QvpO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-25 02:31:29', '2023-01-25 02:31:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_surat` (`nomor_surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
