-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 02:59 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admindesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `nomor` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pengirim` varchar(45) DEFAULT NULL,
  `isi` text,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `tanggal_surat`, `jenis`, `nomor`, `tanggal`, `pengirim`, `isi`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, '2018-12-09', 'Surat Masuk', 'adasd', '2018-12-07', 'sdsad', 'asdsadsa', NULL, '2018-12-07 09:44:58', '2018-12-07 09:44:58'),
(5, '0021-12-12', 'Surat Masuk', '121aasdfdasf', '2018-03-21', 'adssads', 'asdasda', 'asdsadsadasdsa', '2018-12-07 09:49:20', '2018-12-07 09:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `aparat_pemerintah_desa`
--

CREATE TABLE `aparat_pemerintah_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `niap` varchar(45) DEFAULT NULL,
  `nip` varchar(16) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `nomor_pengangkatan` varchar(45) DEFAULT NULL,
  `nomor_pemberhentian` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aparat_pemerintah_desa`
--

INSERT INTO `aparat_pemerintah_desa` (`id`, `nama`, `niap`, `nip`, `jenis_kelamin`, `ttl`, `agama`, `pangkat`, `jabatan`, `pendidikan_terakhir`, `nomor_pengangkatan`, `nomor_pemberhentian`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Edi Siswanto', NULL, NULL, 'P', NULL, 'Islam', NULL, NULL, 'D3 Teknik Informatika', NULL, NULL, 'ada', '2018-12-07 14:59:33', '2018-12-07 07:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `data_induk`
--

CREATE TABLE `data_induk` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `no_kk` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `gol_darah` varchar(5) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `tmp_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `pendidikan_terakhir` varchar(45) DEFAULT NULL,
  `pekerjaan` varchar(45) DEFAULT NULL,
  `dapat_membaca` varchar(10) DEFAULT NULL,
  `kewarganegaraan` varchar(45) DEFAULT NULL,
  `alamat` text,
  `rtrw` varchar(10) DEFAULT NULL,
  `dusun` varchar(45) DEFAULT NULL,
  `desa` varchar(45) DEFAULT NULL,
  `kecamatan` varchar(45) DEFAULT NULL,
  `kabupaten` varchar(45) DEFAULT NULL,
  `kedudukan` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_induk`
--

INSERT INTO `data_induk` (`id`, `nik`, `no_kk`, `nama`, `jenis_kelamin`, `gol_darah`, `status`, `tmp_lahir`, `tgl_lahir`, `agama`, `pendidikan_terakhir`, `pekerjaan`, `dapat_membaca`, `kewarganegaraan`, `alamat`, `rtrw`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `kedudukan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '361123456789', '361123456789', 'Edi Siswanto', 'L', NULL, 'BK', 'Banyuwangi', '2018-12-07', 'Islam', 'D3 Teknik Informatika', 'PNS', 'D', 'WNI', 'Banyuwangi', NULL, NULL, NULL, NULL, NULL, 'AK', 'ada', '2018-12-07 07:29:05', '2018-12-07 08:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id` int(11) NOT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `tanggal_surat` varchar(45) DEFAULT NULL,
  `isi` text,
  `tujuan` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id`, `tanggal_pengiriman`, `tanggal_surat`, `isi`, `tujuan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1997-11-11', 'sdfs/hgj/jkghjk', 'ghgfhjgf1', 'ghfghfgdsfsdfdsf', 'hgfhfjghfgh2', '2018-12-08 06:33:01', '2018-12-08 06:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_desa`
--

CREATE TABLE `inventaris_desa` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `asal` varchar(45) DEFAULT NULL,
  `keadaan` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keputusan_kepala_desa`
--

CREATE TABLE `keputusan_kepala_desa` (
  `id` int(11) NOT NULL,
  `nomor_keputusan` varchar(100) DEFAULT NULL,
  `tentang` text,
  `uraian` text,
  `nomor_dilaporkan` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan_kepala_desa`
--

INSERT INTO `keputusan_kepala_desa` (`id`, `nomor_keputusan`, `tentang`, `uraian`, `nomor_dilaporkan`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, '123', 'ada', 'ada', 'ada', 'ada', '2018-12-05 15:28:44', '2018-12-05 15:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `ktp_kk`
--

CREATE TABLE `ktp_kk` (
  `id` int(11) NOT NULL,
  `tmpt_dikeluarkan` varchar(10) DEFAULT NULL,
  `tgl_dikeluarkan` date DEFAULT NULL,
  `status_dikeluarga` varchar(45) DEFAULT NULL,
  `ayah` varchar(45) DEFAULT NULL,
  `ibu` varchar(45) DEFAULT NULL,
  `tgl_didesa` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_induk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lembaran_desa`
--

CREATE TABLE `lembaran_desa` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `nomor_ditetapkan` varchar(45) DEFAULT NULL,
  `tentang` varchar(45) DEFAULT NULL,
  `tanggal_diundangkan` date DEFAULT NULL,
  `nomor_diundangkan` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_18_125623_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_penduduk`
--

CREATE TABLE `mutasi_penduduk` (
  `id` int(11) NOT NULL,
  `tempat` varchar(45) DEFAULT NULL,
  `tanggal_datang` date DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_induk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kursuswebid@gmail.com', 'a02571f3dd98bbc33f0ea9e2c98677c0f5a4c2df9eb7c7e9662328e354ced2b1', '2018-06-01 21:22:40'),
('edisiswanto.ti8.poliwangi@gmail.com', '5ad941dac7f2d7ab5a49de0efe6ccd7db282a69e9f732ee65a0080e047def672', '2018-12-04 00:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_sementara`
--

CREATE TABLE `penduduk_sementara` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `nomor_identitas` varchar(45) DEFAULT NULL,
  `tmp_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(45) DEFAULT NULL,
  `kewarganegaraan` varchar(45) DEFAULT NULL,
  `datang_dari` varchar(45) DEFAULT NULL,
  `tujuan` text,
  `nama_didatangi` varchar(45) DEFAULT NULL,
  `alamat_didatangi` text,
  `datang_tgl` varchar(45) DEFAULT NULL,
  `pergi_tgl` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peraturan_desa`
--

CREATE TABLE `peraturan_desa` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nomor_ditetapkan` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `uraian` text NOT NULL,
  `tanggal_kesepakatan` date NOT NULL,
  `tanggal_dilaporkan` varchar(100) NOT NULL,
  `tanggal_diundang` varchar(100) NOT NULL,
  `tanggal_berita_desa` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peraturan_desa`
--

INSERT INTO `peraturan_desa` (`id`, `jenis`, `nomor_ditetapkan`, `tentang`, `uraian`, `tanggal_kesepakatan`, `tanggal_dilaporkan`, `tanggal_diundang`, `tanggal_berita_desa`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'asdasdsa', 'asdsadsa', 'asdasdasd', 'asdsadsadsa', '2018-12-04', 'adsadas', 'asdsadsa', 'asdsadsa', 'asdasdas', '2018-12-04 01:40:44', '2018-12-04 01:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `tanah_desa`
--

CREATE TABLE `tanah_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jumlah` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `penggunaan_tanah` varchar(45) DEFAULT NULL,
  `lain_lain` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanah_kas_desa`
--

CREATE TABLE `tanah_kas_desa` (
  `id` int(11) NOT NULL,
  `asal` varchar(45) DEFAULT NULL,
  `nomor_sertifikat` varchar(45) DEFAULT NULL,
  `luas` float DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `perolehan_tkd` varchar(45) DEFAULT NULL,
  `tgl_perolehan` date DEFAULT NULL,
  `jenis_tkd` varchar(45) DEFAULT NULL,
  `patok_batas` int(1) DEFAULT NULL,
  `papan_nama` varchar(45) DEFAULT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `peruntukan` varchar(45) DEFAULT NULL,
  `mutasi` varchar(45) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `gambar`, `status`, `activation_token`) VALUES
(1, 'Administrator', 'est23.edi@gmail.com', '$2y$10$EQvdODCF1FDb9TGIum.2wOFD9fDQjD8gomu442n0cySeqS1wMqcIC', 'I6IGeakBRQ7nwHenbb2Bi97j7gjdvjB4zMXjn2kkYXS0VX3Hc1ELyTbbyYEe', '2018-03-27 23:30:15', '2018-12-04 00:51:04', '', 1, 'vZwBGQlTl7bx2sUBu64UewKOUZUlkucRu6RjIM23GSTLjxGi4f8E1J8rZYVscr1hYx5uwSyxG2IFjPPXOu8hwyKYgp0JAamjcuNHfECPk9HlTgCCjKYtJhdPqxsPCm94Gw9C1ekvhfwdJ53iOpjhcxofluTCoxR2N5Vw2qXKzsCxxERCJL2Zq2YPJxdDT1UejkB6WqFlf17PwfsuBGZ4YiUwWBRI5OXQVfc75oNtpQiqwMTS7moZyLl1e2c3nH2'),
(2, 'Andre Heru', 'andreasheru29@gmail.com', '$2y$10$EQvdODCF1FDb9TGIum.2wOFD9fDQjD8gomu442n0cySeqS1wMqcIC', 'YppL4jorp8z7Tx4NuqQ71NatMcvERKi83OgCne7HgUqdsCIyHREC9vzHeZMo', '2018-05-25 15:20:45', '2018-12-04 03:07:40', '', 1, 'wR8WRtLcUwSy4Cqu6VJzEdnoNF7ix4ZEXXNKVIOOddW28d690Tg6dnPoDDRFJlgCZLA3IuBjK4OGltQhouAbVvK6fti5UyZWRV346yEisOyJhrJPqs2ZsI3SiRQMVDCKhZiwVfjoER11wjQtGONF5Ja2Ehff0bDAzQUimjaLbLEJEQBaFyxDwJrmc1yeyf1whFlNJdPNDDSpSbvlKvaG3N0mI4Fj87cHJm5AQRXIS74LXr3V4gQz7sYQdaQN26Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_UNIQUE` (`nomor`);

--
-- Indexes for table `aparat_pemerintah_desa`
--
ALTER TABLE `aparat_pemerintah_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_induk`
--
ALTER TABLE `data_induk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_UNIQUE` (`nik`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_desa`
--
ALTER TABLE `inventaris_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keputusan_kepala_desa`
--
ALTER TABLE `keputusan_kepala_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ktp_kk`
--
ALTER TABLE `ktp_kk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ktp_kk_data_induk1` (`data_induk_id`);

--
-- Indexes for table `lembaran_desa`
--
ALTER TABLE `lembaran_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_penduduk`
--
ALTER TABLE `mutasi_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mutasi_penduduk_data_induk` (`data_induk_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `penduduk_sementara`
--
ALTER TABLE `penduduk_sementara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanah_desa`
--
ALTER TABLE `tanah_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanah_kas_desa`
--
ALTER TABLE `tanah_kas_desa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_sertifikat_UNIQUE` (`nomor_sertifikat`);

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
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `aparat_pemerintah_desa`
--
ALTER TABLE `aparat_pemerintah_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_induk`
--
ALTER TABLE `data_induk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inventaris_desa`
--
ALTER TABLE `inventaris_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keputusan_kepala_desa`
--
ALTER TABLE `keputusan_kepala_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ktp_kk`
--
ALTER TABLE `ktp_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lembaran_desa`
--
ALTER TABLE `lembaran_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mutasi_penduduk`
--
ALTER TABLE `mutasi_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penduduk_sementara`
--
ALTER TABLE `penduduk_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tanah_desa`
--
ALTER TABLE `tanah_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tanah_kas_desa`
--
ALTER TABLE `tanah_kas_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ktp_kk`
--
ALTER TABLE `ktp_kk`
  ADD CONSTRAINT `fk_ktp_kk_data_induk1` FOREIGN KEY (`data_induk_id`) REFERENCES `data_induk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mutasi_penduduk`
--
ALTER TABLE `mutasi_penduduk`
  ADD CONSTRAINT `fk_mutasi_penduduk_data_induk` FOREIGN KEY (`data_induk_id`) REFERENCES `data_induk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
