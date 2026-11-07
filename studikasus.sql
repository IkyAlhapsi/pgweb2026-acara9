-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2026 at 06:34 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stusikasus`
--

-- --------------------------------------------------------

--
-- Table structure for table `cctv`
--

DROP TABLE IF EXISTS `cctv`;
CREATE TABLE IF NOT EXISTS `cctv` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `no` int UNSIGNED DEFAULT NULL,
  `provinsi` varchar(100) NOT NULL DEFAULT '',
  `kab_kota` varchar(100) NOT NULL DEFAULT '',
  `kecamatan` varchar(100) NOT NULL DEFAULT '',
  `kelurahan` varchar(100) NOT NULL DEFAULT '',
  `nama_cctv` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cctv`
--

INSERT INTO `cctv` (`id`, `no`, `provinsi`, `kab_kota`, `kecamatan`, `kelurahan`, `nama_cctv`, `status`, `alamat`, `longitude`, `latitude`) VALUES
(1, 12, 'Kalimantan Timur', 'Samarinda', 'Samarinda Seberang', 'Pasar Pagi', 'CCTV Simpang Masjid Raya', 'Aktif', 'Jl.Niaga Barat', 117.1482060, -0.5038360),
(2, 1, 'Kalimantan Timur', 'Samarinda', 'Samarinda Kota', 'Bugis', 'CCTV Taman Samarinda 1', 'Aktif', 'Jl. Bhayangkara', 117.1438500, -0.4973750),
(3, 107, 'Kalimantan Timur', 'Samarinda', 'Samarinda Ulu', 'Jawa', 'CCTV Teras Samarinda 1', 'Aktif', 'Jl. Gajah Mada', 117.1393115, -0.5017721),
(4, 15, 'Kalimantan Timur', 'Samarinda', 'Sungai Kunjang', 'Karang Anyar', 'CCTV Simpang Meranti', 'Aktif', 'Jl.Slamet Riyadi', 117.1202390, -0.5050030),
(5, 71, 'Kalimantan Timur', 'Samarinda', 'Samarinda Ulu', 'Air Hitam', 'CCTV PG Folder Air Hitam', 'Aktif', 'Jl.Polder Air Hitam', 117.1372110, -0.4688140),
(6, 86, 'Kalimantan Timur', 'Samarinda', 'Samarinda Seberang', 'Baqa', 'CCTV Simpang Kec Samarinda Seberang 1', 'Aktif', 'Jl.Bung Tomo', 117.1379690, -0.5099030),
(7, 69, 'Kalimantan Timur', 'Samarinda', 'Sambutan', 'Sindang Sari', 'CCTV PG Sindang Sari', 'Aktif', 'Jl.Karya Bakti', 117.2310110, -0.5605690),
(8, 54, 'Kalimantan Timur', 'Samarinda', 'Samarinda Utara', 'Budaya Pampang', 'CCTV Budaya Pampang', 'Aktif', 'Jl.Wisata Budaya Pampang', 117.2303470, -0.3777140);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
