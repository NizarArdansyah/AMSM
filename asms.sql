-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 03:49 AM
-- Server version: 10.11.3-MariaDB
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asms`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'user', 'Warga'),
(2, 'admin', 'Administrator'),
(3, 'petugas', 'Petugas atau perangkat desa');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 3),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'buat-surat', 'Membuat surat tanpa request'),
(2, 'manage-user', 'Mengelola user'),
(3, 'manage-own-profile', 'Mengatur profil sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(17, '2017-11-20-223112', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1686691579, 1),
(18, '2022-12-27-190752', 'App\\Database\\Migrations\\CreateTableSurat', 'default', 'App', 1686691580, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `pemohon` varchar(100) NOT NULL,
  `perihal` text NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `id_user`, `nomor_surat`, `tanggal_surat`, `pemohon`, `perihal`, `keperluan`, `keterangan`, `jenis`, `status`, `pesan`) VALUES
(1, 10, '001/DS.04/II/2023', '2023-01-02', 'warga5', 'pengajuan', 'pariatur amet officiis omnis ipsa impedit', 'recusandae aut totam exercitationem officiis quae animi eius', 'Surat Keterangan tidak mampu', 'antre', NULL),
(2, 9, '002/DS.04/IV/2023', '2023-05-31', 'warga6', 'pengajuan', 'laboriosam consequuntur porro et qui et ut quisquam ad', 'fuga consequatur iusto et reiciendis', 'Surat Pengantar SKCK', 'dibatalkan', 'facilis'),
(3, 4, '003/DS.04/V/2023', '2023-01-03', 'warga1', 'pengajuan', 'accusantium quasi nesciunt tempore fugit impedit recusandae est', 'animi quae', 'Surat Pengantar SKCK', 'siap', NULL),
(4, 2, '004/DS.04/III/2023', '2023-02-25', 'warga7', 'permohonan', 'placeat in numquam sint fugiat', 'facere', 'Surat Keterangan usaha', 'siap', NULL),
(5, 7, '005/DS.04/V/2023', '2023-03-27', 'warga8', 'permohonan', 'nostrum deserunt eaque excepturi sit', 'ducimus qui', 'Surat Pengantar SKCK', 'antre', NULL),
(6, 6, '006/DS.04/II/2023', '2023-01-07', 'warga2', 'pengajuan', 'ducimus velit id aspernatur ducimus consequatur dignissimos voluptatum id', 'reiciendis sit quis doloribus voluptatem', 'Surat Keterangan tidak mampu', 'antre', NULL),
(7, 7, '007/DS.04/IV/2023', '2023-06-08', 'warga5', 'permohonan', 'harum ullam et', 'qui quaerat consequatur dolor praesentium modi molestiae officiis', 'Surat Pengantar SKCK', 'antre', NULL),
(8, 10, '008/DS.04/VI/2023', '2023-04-14', 'warga7', 'pengajuan', 'quas occaecati quasi id sit nostrum', 'sapiente ut qui facere beatae', 'Surat Keterangan tidak mampu', 'antre', NULL),
(9, 2, '009/DS.04/III/2023', '2023-03-06', 'warga5', 'permohonan', 'consequatur', 'et quod iste quibusdam', 'Surat Pengantar SKCK', 'siap', NULL),
(10, 4, '010/DS.04/II/2023', '2023-01-24', 'warga2', 'pengajuan', 'quia reiciendis error sint dolor', 'est', 'Surat Pengantar SKCK', 'siap', NULL),
(11, 3, '011/Ds.04/VI/2023', '2023-06-14', 'Gaman Simbolon', 'Permohonan', 'Keperluan', '', 'Surat Keterangan', 'antre', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `img_user` varchar(255) NOT NULL DEFAULT 'default.svg',
  `alamat` varchar(255) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `img_user`, `alamat`, `nik`, `kk`, `tgl_lahir`, `tempat_lahir`, `kewarganegaraan`, `agama`, `pekerjaan`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'namaga.rama@gmail.com', 'admin', 'Vinsen Maheswara', 'default.svg', 'Ki. Bank Dagang Negara No. 403, Balikpapan 16476, NTT', '9105502108039896', NULL, '2007-08-01', 'Yogyakarta', 'WNI', 'Islam', 'Perawat', '$2y$10$HaTIvRIBPrn9s9JK3pNVzu8MBKV07rzJDIe0MM2DTJwq5Oy2fVJZe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:20', '2023-06-14 04:26:20', NULL),
(2, 'amalia.hutagalung@budiman.id', 'petugas1', 'Iriana Melani', 'default.svg', 'Kpg. Dipenogoro No. 371, Ambon 42689, Babel', '8101495007952845', NULL, '2018-04-19', 'Makassar', 'WNI', 'Islam', 'Pemandu Wisata', '$2y$10$dNlkFpRV9I.Y/FhwxCml1eS2.K5VTuPajLFJ11Z4i5DKK0iDGjWJG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:20', '2023-06-14 04:26:20', NULL),
(3, 'dsaragih@saragih.asia', 'petugas2', 'Gaman Simbolon', 'default.svg', 'Gg. Siliwangi No. 348, Tomohon 63153, Pabar', '1175381903014410', 'default.png', '2020-11-20', 'Jambi', 'WNI', 'Islam', 'Arsitek', '$2y$10$65Iz7CHdp7.Cg1MarFaSgOJYGG99nbVPIpatD99bJ9AorgbrLcBMO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:20', '2023-06-14 04:26:20', NULL),
(4, 'adhiarja.firgantoro@pertiwi.biz', 'petugas3', 'Radika Permadi', 'default.svg', 'Jr. Bara No. 222, Jambi 42411, Kepri', '9111966707090350', NULL, '2004-05-10', 'Tebing Tinggi', 'WNI', 'Islam', 'Penyelam', '$2y$10$jCUmGlc01KC5lU1nFivgcehwGfjR0Y8M.8vm390MhW3gMTuH2YTz6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:20', '2023-06-14 04:26:20', NULL),
(5, 'winda46@utami.biz', 'petugas4', 'Ismail Wadi Damanik S.Kom', 'default.svg', 'Dk. Adisucipto No. 266, Blitar 30198, Gorontalo', '7406810802152424', NULL, '1987-06-21', 'Sawahlunto', 'WNI', 'Islam', 'Guru', '$2y$10$AemO/i9dkU56aRvWYU4nde5Frm6VyKFBrMJZ334UmVJrzIYQrgYl.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:20', '2023-06-14 04:26:20', NULL),
(6, 'jasmin46@hardiansyah.info', 'petugas5', 'Ida Kayla Anggraini', 'default.svg', 'Jln. Bah Jaya No. 257, Palu 57360, Aceh', '3501096801010665', NULL, '2000-07-06', 'Subulussalam', 'WNI', 'Islam', 'Pegawai Negeri Sipil (PNS)', '$2y$10$p0nAeMhIl9Fh12xwxTCdheLXK0SNZbIfrsPN3GpgU1fpoz5n.iRhK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:20', '2023-06-14 04:26:20', NULL),
(7, 'latika.prastuti@mandasari.biz', 'warga1', 'Cemplunk Nababan', 'default.svg', 'Dk. Acordion No. 129, Tual 47067, Kalbar', '1504121912095142', NULL, '2018-10-21', 'Tangerang', 'WNI', 'Islam', 'Penulis', '$2y$10$iS7x5xeGuD20mi3M2HzRKulCEpnZAVrIhkx9h/AO16ZshUuvVy3/y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(8, 'yuliarti.gading@mansur.web.id', 'warga2', 'Tantri Rahimah', 'default.svg', 'Jr. Dr. Junjunan No. 886, Tangerang Selatan 58001, Kalteng', '3305604207067488', NULL, '2012-07-15', 'Pekanbaru', 'WNI', 'Islam', 'Buruh Nelayan / Perikanan', '$2y$10$DHXpt5uWaEBDTm22/h6p..37lITwvSKBViSqw7PkgVLFO88QzYOkC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(9, 'sihombing.zamira@yahoo.co.id', 'warga3', 'Tedi Waskita S.Sos', 'default.svg', 'Jln. Baranangsiang No. 498, Tegal 82698, Jatim', '3577282708072512', NULL, '2004-06-07', 'Yogyakarta', 'WNI', 'Islam', 'Kondektur', '$2y$10$CPIJZuCUhbJF4MlQKWjUH.TFAzMEGyK9Coafkbcbtn1/LTZNT7Zha', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(10, 'ldamanik@adriansyah.co.id', 'warga4', 'Jaga Bambang Gunawan M.M.', 'default.svg', 'Jln. Batako No. 209, Cimahi 59441, Kepri', '1501144312958520', NULL, '1980-03-08', 'Metro', 'WNI', 'Islam', 'Akuntan', '$2y$10$9n6bW6bZVIiJQR/Go6ldZ.g50YMtFDhUBp9rfo2FauIpBgIao1Yum', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(11, 'adriansyah.kambali@anggraini.info', 'warga5', 'Simon Wahyudin', 'default.svg', 'Ki. Gardujati No. 994, Pagar Alam 82996, Riau', '8105735704067677', NULL, '1984-05-26', 'Blitar', 'WNI', 'Islam', 'Pensiunan', '$2y$10$K.FS80PQUSWNu.axl3j3iOCfx2btIeset5X00MgdrushRwd70Tgji', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(12, 'laksita.artawan@pangestu.id', 'warga6', 'Siti Maryati', 'default.svg', 'Ki. Setiabudhi No. 130, Administrasi Jakarta Barat 91564, Kalbar', '7108412410941569', NULL, '1981-11-12', 'Administrasi Jakarta Selatan', 'WNI', 'Islam', 'Wiraswasta', '$2y$10$BZia8FK39fksKlrSWqzkOOhUrgh/fjKPS4BewklqSbR.Uy0NpVRR2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(13, 'rahayu.hastuti@gmail.co.id', 'warga7', 'Raden Firmansyah', 'default.svg', 'Jln. Sampangan No. 726, Kediri 66247, Babel', '7310391107064469', NULL, '1988-07-07', 'Balikpapan', 'WNI', 'Islam', 'Perawat', '$2y$10$LBR62FmJym89ShKujSoOhOJzwoU/HDgS4jg2VpZQv00Ylj2o8sLNW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(14, 'hartati.hafshah@gmail.com', 'warga8', 'Respati Cakrabirawa Rajata M.Pd', 'default.svg', 'Psr. Bagas Pati No. 359, Jayapura 26803, NTT', '9127425011172700', NULL, '1990-12-19', 'Tangerang Selatan', 'WNI', 'Islam', 'Psikiater / Psikolog', '$2y$10$q27RYRRD7HISyXjYsODUduxvWwFyywg7fe5hcTvsdXylhXCDvUiJ6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(15, 'elvina.prasasta@gmail.co.id', 'warga9', 'Yessi Agustina', 'default.svg', 'Ki. Suharso No. 953, Semarang 18174, Papua', '1103526005107545', NULL, '2020-09-22', 'Padangsidempuan', 'WNI', 'Islam', 'Penambang', '$2y$10$eR5PpvXzzQHFuuNv8uaXu.2sJ2t65H3K54nHKToPDwoY4sB6Muwba', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL),
(16, 'slaksmiwati@purwanti.info', 'warga10', 'Dinda Melani', 'default.svg', 'Ki. Sugiono No. 301, Denpasar 19163, Sultra', '1708550206041841', NULL, '2001-06-01', 'Kediri', 'WNI', 'Islam', 'Buruh Peternakan', '$2y$10$lZ2p9BYDqSXIH.gyJflriumgoaohoiHcV7OvZEPcz7hwQ4XYBsCwq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-14 04:26:21', '2023-06-14 04:26:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_surat` (`nomor_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
