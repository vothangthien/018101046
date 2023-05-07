-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2023 at 06:58 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dangkimonhoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminstration`
--

DROP TABLE IF EXISTS `adminstration`;
CREATE TABLE IF NOT EXISTS `adminstration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Administration','student','teacher') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Administration',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `adminstration`
--

INSERT INTO `adminstration` (`id`, `name`, `password`, `type`, `created_at`, `updated_at`, `email`) VALUES
(1, 'phong', 'e10adc3949ba59abbe56e057f20f883e', 'Administration', '2023-05-04 06:05:31', '2023-05-04 06:05:31', 'phong@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

DROP TABLE IF EXISTS `giangvien`;
CREATE TABLE IF NOT EXISTS `giangvien` (
  `msgv` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `hocvi` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `gioitinh` enum('nam','nu') COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `chuyenmon` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`msgv`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
DROP TABLE IF EXISTS `sinhvien`;
CREATE TABLE IF NOT EXISTS `sinhvien` (
  `mssv` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `gioitinh` enum('nam','nu') COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`mssv`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;


DROP TABLE IF EXISTS `lophoc`;
CREATE TABLE IF NOT EXISTS `lophoc` (
  `malop` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenlop` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `khoahoc` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`malop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

DROP TABLE IF EXISTS `monhoc`;
CREATE TABLE IF NOT EXISTS `monhoc` (
  `mamh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenmh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `sotc` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`mamh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monhoc_giangvien`
--

DROP TABLE IF EXISTS `monhoc_giangvien`;
CREATE TABLE IF NOT EXISTS `monhoc_giangvien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mamh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `msgv` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`mamh`,`msgv`),
  KEY `fk_monhoc` (`mamh`),
  KEY `fk_giangvien` (`msgv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--


-- --------------------------------------------------------

--
-- Table structure for table `sinhvien_lophoc`
--

DROP TABLE IF EXISTS `sinhvien_lophoc`;
CREATE TABLE IF NOT EXISTS `sinhvien_lophoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mssv` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `malop` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`mssv`,`malop`),
  KEY `fk_sinhvien` (`mssv`),
  KEY `fk_lophoc` (`malop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monhoc_giangvien`
--
ALTER TABLE `monhoc_giangvien`
  ADD CONSTRAINT `fk_giangvien` FOREIGN KEY (`msgv`) REFERENCES `giangvien` (`msgv`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_monhoc` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`) ON DELETE CASCADE;

--
-- Constraints for table `sinhvien_lophoc`
--
ALTER TABLE `sinhvien_lophoc`
  ADD CONSTRAINT `fk_lophoc` FOREIGN KEY (`malop`) REFERENCES `lophoc` (`malop`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sinhvien` FOREIGN KEY (`mssv`) REFERENCES `sinhvien` (`mssv`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
