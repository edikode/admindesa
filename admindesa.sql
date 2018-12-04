-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 10:55 AM
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
(2, 'Andre Heru', 'andreasheru29@gmail.com', '$2y$10$EQvdODCF1FDb9TGIum.2wOFD9fDQjD8gomu442n0cySeqS1wMqcIC', 's5ZG7ELslmisYMsPGkepliLjMQmWHTr9WAtPzvumv82HVzapyVN8D5TQNMeT', '2018-05-25 15:20:45', '2018-09-19 21:04:38', '', 1, 'wR8WRtLcUwSy4Cqu6VJzEdnoNF7ix4ZEXXNKVIOOddW28d690Tg6dnPoDDRFJlgCZLA3IuBjK4OGltQhouAbVvK6fti5UyZWRV346yEisOyJhrJPqs2ZsI3SiRQMVDCKhZiwVfjoER11wjQtGONF5Ja2Ehff0bDAzQUimjaLbLEJEQBaFyxDwJrmc1yeyf1whFlNJdPNDDSpSbvlKvaG3N0mI4Fj87cHJm5AQRXIS74LXr3V4gQz7sYQdaQN26Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
