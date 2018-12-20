-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 01:26 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

-- --------------------------------------------------------

--
-- Table structure for table `aparat_pemerintah_desa`
--

CREATE TABLE `aparat_pemerintah_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `niap` varchar(45) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
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
  `kodepos` varchar(45) DEFAULT NULL,
  `kedudukan` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `dari` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_desa`
--

CREATE TABLE `inventaris_desa` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `beli_sendiri` int(11) DEFAULT '0',
  `pemerintah` int(11) DEFAULT '0',
  `provinsi` int(11) DEFAULT '0',
  `kota` int(11) DEFAULT '0',
  `sumbangan` int(11) DEFAULT '0',
  `awal_baik` int(11) DEFAULT '0',
  `awal_rusak` int(11) DEFAULT '0',
  `rusak` int(11) DEFAULT '0',
  `dijual` int(11) DEFAULT '0',
  `disumbangkan` int(11) DEFAULT '0',
  `tgl_hapus` date DEFAULT NULL,
  `akhir_baik` int(11) DEFAULT '0',
  `akhir_rusak` int(11) DEFAULT '0',
  `keterangan` text,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_pembangunan`
--

CREATE TABLE `inventaris_pembangunan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `volume` varchar(45) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kader_masyarakat`
--

CREATE TABLE `kader_masyarakat` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `pendidikan` varchar(45) DEFAULT NULL,
  `bidang` varchar(45) DEFAULT NULL,
  `alamat` text,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_pembangunan`
--

CREATE TABLE `kegiatan_pembangunan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `volume` varchar(45) DEFAULT NULL,
  `pemerintah` int(11) DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `swadaya` int(11) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `sifat` varchar(45) DEFAULT NULL,
  `pelaksana` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `ktp_kk`
--

CREATE TABLE `ktp_kk` (
  `id` int(11) NOT NULL,
  `tmp_dikeluarkan` varchar(45) DEFAULT NULL,
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
  `tentang` text,
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
  `tmp_datang` text,
  `tgl_datang` date DEFAULT NULL,
  `tmp_pindah` text,
  `tgl_pindah` date DEFAULT NULL,
  `tmp_meninggal` text,
  `tgl_meninggal` date DEFAULT NULL,
  `jenis` varchar(45) NOT NULL,
  `keterangan` text,
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

-- --------------------------------------------------------

--
-- Stand-in structure for view `rekap_per_dusun`
-- (See below for the actual view)
--
CREATE TABLE `rekap_per_dusun` (
`dusun` varchar(45)
,`jenis_kelamin` enum('L','P')
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_kerja`
--

CREATE TABLE `rencana_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `lokasi` text,
  `sumber_biaya` varchar(45) DEFAULT NULL,
  `pemerintah` int(11) DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `swadaya` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `pelaksana` varchar(45) DEFAULT NULL,
  `manfaat` text,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanah_desa`
--

CREATE TABLE `tanah_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `luas` int(11) DEFAULT NULL,
  `penggunaan_tanah` varchar(45) DEFAULT NULL,
  `luas_penggunaan` int(11) DEFAULT NULL,
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
  `asli` int(11) DEFAULT NULL,
  `pemerintah` int(11) DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `lainlain` int(11) DEFAULT NULL,
  `tgl_perolehan` date DEFAULT NULL,
  `jenis_tkd` varchar(45) DEFAULT NULL,
  `sawah` int(11) DEFAULT NULL,
  `tegal` int(11) DEFAULT NULL,
  `kebun` int(11) DEFAULT NULL,
  `tambak` int(11) DEFAULT NULL,
  `darat` int(11) DEFAULT NULL,
  `patok_batas` varchar(10) DEFAULT NULL,
  `papan_nama` varchar(45) DEFAULT NULL,
  `lokasi` text,
  `peruntukan` varchar(45) DEFAULT NULL,
  `mutasi` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
  `foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(45) COLLATE utf8_unicode_ci DEFAULT '0',
  `activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_desa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode_desa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_kades` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nip_kades` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat_kantor` text COLLATE utf8_unicode_ci,
  `telepon` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_desa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `foto`, `level`, `activation_token`, `nama_desa`, `kode_desa`, `kode_pos`, `nama_kades`, `nip_kades`, `alamat_kantor`, `telepon`, `logo_desa`) VALUES
(1, 'Edi Siswanto', 'est23.edi@gmail.com', '$2y$10$EQvdODCF1FDb9TGIum.2wOFD9fDQjD8gomu442n0cySeqS1wMqcIC', '7AeTGLPP8FEXRfLZBfgxwTn0bL84YbYc9WC5wyyjrSKjfxalOlgpjOjMGvup', '2018-03-27 23:30:15', '2018-12-17 20:11:46', 'logo_developer.png', 'Administrator', 'vZwBGQlTl7bx2sUBu64UewKOUZUlkucRu6RjIM23GSTLjxGi4f8E1J8rZYVscr1hYx5uwSyxG2IFjPPXOu8hwyKYgp0JAamjcuNHfECPk9HlTgCCjKYtJhdPqxsPCm94Gw9C1ekvhfwdJ53iOpjhcxofluTCoxR2N5Vw2qXKzsCxxERCJL2Zq2YPJxdDT1UejkB6WqFlf17PwfsuBGZ4YiUwWBRI5OXQVfc75oNtpQiqwMTS7moZyLl1e2c3nH2', 'PT DAMAR KATON', NULL, NULL, NULL, NULL, 'Halaman Developer', '082302002407', 'logo_developer.png'),
(2, 'Andre Heru', 'andreasheru29@gmail.com', '$2y$10$EQvdODCF1FDb9TGIum.2wOFD9fDQjD8gomu442n0cySeqS1wMqcIC', 'YppL4jorp8z7Tx4NuqQ71NatMcvERKi83OgCne7HgUqdsCIyHREC9vzHeZMo', '2018-05-25 15:20:45', '2018-12-04 03:07:40', 'logo_developer.png', 'Administrator', 'wR8WRtLcUwSy4Cqu6VJzEdnoNF7ix4ZEXXNKVIOOddW28d690Tg6dnPoDDRFJlgCZLA3IuBjK4OGltQhouAbVvK6fti5UyZWRV346yEisOyJhrJPqs2ZsI3SiRQMVDCKhZiwVfjoER11wjQtGONF5Ja2Ehff0bDAzQUimjaLbLEJEQBaFyxDwJrmc1yeyf1whFlNJdPNDDSpSbvlKvaG3N0mI4Fj87cHJm5AQRXIS74LXr3V4gQz7sYQdaQN26Y', 'PT DAMAR KATON', NULL, NULL, NULL, NULL, 'Halaman Developer', '081123456789', NULL);

-- --------------------------------------------------------

--
-- Structure for view `rekap_per_dusun`
--
DROP TABLE IF EXISTS `rekap_per_dusun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rekap_per_dusun`  AS  select `data_induk`.`dusun` AS `dusun`,`data_induk`.`jenis_kelamin` AS `jenis_kelamin`,count(`data_induk`.`dusun`) AS `jumlah` from `data_induk` where ((`data_induk`.`dari` = 'lahir') or (`data_induk`.`dari` = 'datang')) group by `data_induk`.`dusun`,`data_induk`.`jenis_kelamin` ;

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
-- Indexes for table `inventaris_pembangunan`
--
ALTER TABLE `inventaris_pembangunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kader_masyarakat`
--
ALTER TABLE `kader_masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_pembangunan`
--
ALTER TABLE `kegiatan_pembangunan`
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
-- Indexes for table `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aparat_pemerintah_desa`
--
ALTER TABLE `aparat_pemerintah_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_induk`
--
ALTER TABLE `data_induk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventaris_desa`
--
ALTER TABLE `inventaris_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventaris_pembangunan`
--
ALTER TABLE `inventaris_pembangunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kader_masyarakat`
--
ALTER TABLE `kader_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kegiatan_pembangunan`
--
ALTER TABLE `kegiatan_pembangunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keputusan_kepala_desa`
--
ALTER TABLE `keputusan_kepala_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ktp_kk`
--
ALTER TABLE `ktp_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lembaran_desa`
--
ALTER TABLE `lembaran_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mutasi_penduduk`
--
ALTER TABLE `mutasi_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penduduk_sementara`
--
ALTER TABLE `penduduk_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanah_desa`
--
ALTER TABLE `tanah_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanah_kas_desa`
--
ALTER TABLE `tanah_kas_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
