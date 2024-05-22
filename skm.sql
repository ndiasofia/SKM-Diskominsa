-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 05:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skm`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2024-02-28-040531', 'App\\Database\\Migrations\\Responden', 'default', 'App', 1710910440, 1),
(4, '2024-03-04-040954', 'App\\Database\\Migrations\\Pertanyaan', 'default', 'App', 1710910440, 1),
(5, '2024-03-04-041740', 'App\\Database\\Migrations\\Penilaian', 'default', 'App', 1710910463, 2),
(6, '2024-03-14-040732', 'App\\Database\\Migrations\\Saran', 'default', 'App', 1710910463, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_responden` int(11) UNSIGNED NOT NULL,
  `no_pertanyaan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_responden`, `no_pertanyaan`, `nilai`) VALUES
(6, 1, 3),
(6, 2, 3),
(6, 3, 3),
(6, 4, 4),
(6, 5, 4),
(6, 6, 3),
(6, 7, 4),
(6, 8, 4),
(6, 9, 3),
(7, 1, 4),
(7, 2, 4),
(7, 3, 2),
(7, 4, 3),
(7, 5, 3),
(7, 6, 4),
(7, 7, 4),
(7, 8, 4),
(7, 9, 4),
(8, 1, 3),
(8, 2, 3),
(8, 3, 3),
(8, 4, 3),
(8, 5, 3),
(8, 6, 4),
(8, 7, 4),
(8, 8, 4),
(8, 9, 4),
(9, 1, 3),
(9, 2, 3),
(9, 3, 4),
(9, 4, 4),
(9, 5, 4),
(9, 6, 3),
(9, 7, 3),
(9, 8, 3),
(9, 9, 4),
(10, 1, 3),
(10, 2, 3),
(10, 3, 3),
(10, 4, 4),
(10, 5, 4),
(10, 6, 4),
(10, 7, 4),
(10, 8, 4),
(10, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) UNSIGNED NOT NULL,
  `no_pertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `no_pertanyaan`, `pertanyaan`) VALUES
(1, 1, 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan  dengan jenis pelayanannya'),
(2, 2, 'Bagaimana  pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini'),
(3, 3, 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan'),
(4, 4, 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan'),
(5, 5, 'Bagaimana pendapat Saudara tentang kesesuaian  produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan'),
(6, 6, 'Bagaimana pendapat Saudara tentang kompetensi/ kemampuan petugas dalam pelayanan'),
(7, 7, 'Bagamana pendapat saudara perilaku petugas dalam    pelayanan terkait kesopanan dan keramahan'),
(8, 8, 'Bagaimana pendapat Saudara Sarana dan Prasarana di Unit Pelayanan'),
(9, 9, 'Bagaimana pendapat Saudara tentang penanganan  pengaduan pengguna layanan');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id_responden` int(11) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `usia` int(3) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`id_responden`, `jenis_kelamin`, `usia`, `pekerjaan`, `created_at`) VALUES
(6, 'Laki-Laki', 37, 'Karyawan', NULL),
(7, 'Perempuan', 19, 'Polisi', NULL),
(8, 'Perempuan', 22, 'PNS', NULL),
(9, 'Laki-Laki', 46, 'TNI', NULL),
(10, 'Perempuan', 22, 'honorer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_responden` int(11) UNSIGNED NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_responden`, `saran`) VALUES
(6, 'Good'),
(7, 'Nice'),
(8, 'Very Good'),
(9, 'bagus'),
(10, 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(5, 'diskominsa', '$2y$10$5ccs1l8hiMMZnHRFfPa4POKYXcP1uH/D/y8pP7YSfRSW3AoVJ.BGK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD KEY `penilaian_id_responden_foreign` (`id_responden`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD KEY `saran_id_responden_foreign` (`id_responden`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id_responden` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saran`
--
ALTER TABLE `saran`
  ADD CONSTRAINT `saran_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
