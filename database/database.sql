-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table fiqih_crm.tbl_layanan
DROP TABLE IF EXISTS `tbl_layanan`;
CREATE TABLE IF NOT EXISTS `tbl_layanan` (
  `id_layanan` int NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(50) NOT NULL DEFAULT '',
  `deskripsi` text,
  `biaya_layanan` int NOT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fiqih_crm.tbl_layanan: ~2 rows (approximately)
DELETE FROM `tbl_layanan`;
INSERT INTO `tbl_layanan` (`id_layanan`, `nama_layanan`, `deskripsi`, `biaya_layanan`, `last_modified`, `created_at`, `deleted`) VALUES
	(1, '30MBps', 'cobas', 100000, '2025-02-26 12:30:56', '2025-02-26 10:49:56', 1),
	(2, '30MB', 'cobas', 100000, '2025-02-26 11:06:46', '2025-02-26 11:06:46', 0);

-- Dumping structure for table fiqih_crm.tbl_levels
DROP TABLE IF EXISTS `tbl_levels`;
CREATE TABLE IF NOT EXISTS `tbl_levels` (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `level_text` varchar(50) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fiqih_crm.tbl_levels: ~3 rows (approximately)
DELETE FROM `tbl_levels`;
INSERT INTO `tbl_levels` (`id_level`, `level_text`, `keterangan`, `created_at`, `last_modified`, `deleted`) VALUES
	(1, 'Super Admin', 'Super administrator', '2025-02-26 09:22:34', '2025-02-26 10:11:06', 0),
	(2, 'Manager', 'Divisi Manager', '2025-02-26 09:22:46', '2025-02-26 10:11:12', 0),
	(3, 'Sales', 'Divisi Sales', '2025-02-26 09:22:54', '2025-02-26 10:11:26', 0);

-- Dumping structure for table fiqih_crm.tbl_login
DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `username` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int DEFAULT '0',
  PRIMARY KEY (`id_login`),
  KEY `FK_tbl_login_tbl_levels` (`id_level`),
  CONSTRAINT `FK_tbl_login_tbl_levels` FOREIGN KEY (`id_level`) REFERENCES `tbl_levels` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fiqih_crm.tbl_login: ~4 rows (approximately)
DELETE FROM `tbl_login`;
INSERT INTO `tbl_login` (`id_login`, `username`, `password`, `id_level`, `created_at`, `last_login`, `last_modified`, `deleted`) VALUES
	(1, 'admin11', '$2y$10$R8GM8Yr4WtEP9j.I/ZwOSuURQmhWssD0El65t3PU9aTedfZ7FnNju', 1, '2025-02-26 09:25:04', '2025-02-26 02:31:42', '2025-02-26 09:31:42', 0),
	(2, 'superadm', '$2y$10$xDMhVpMiz2edGh2jzL47VODdQuH9X9QyniPB7/ONwUNwVWcGPQgIe', 1, '2025-02-26 09:32:52', '2025-02-26 11:41:24', '2025-02-26 18:41:24', 0),
	(3, 'sales1', '$2y$10$l8pBQwCx7f96EYd6.oT4uuPzOxiP7GdtkwNahhF/st5TyPbluLT6e', 3, '2025-02-26 09:33:11', '2025-02-26 11:36:46', '2025-02-26 18:36:46', 0),
	(4, 'manager1', '$2y$10$3POg7OgeN07MC1KfKYvUy.2WGu3gWrcaCF377v1NO4ysVSPjQ7yyi', 2, '2025-02-26 09:33:32', '2025-02-26 11:35:44', '2025-02-26 18:35:44', 0);

-- Dumping structure for table fiqih_crm.tbl_pegawai
DROP TABLE IF EXISTS `tbl_pegawai`;
CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `id_pegawai` int NOT NULL AUTO_INCREMENT,
  `id_login` int NOT NULL,
  `id_pegawai_detail` int NOT NULL,
  `id_level` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pegawai`),
  KEY `FK_tbl_pegawai_tbl_pegawai_detail` (`id_pegawai_detail`),
  KEY `FK_tbl_pegawai_tbl_login` (`id_login`),
  KEY `FK_tbl_pegawai_tbl_levels` (`id_level`),
  CONSTRAINT `FK_tbl_pegawai_tbl_levels` FOREIGN KEY (`id_level`) REFERENCES `tbl_levels` (`id_level`),
  CONSTRAINT `FK_tbl_pegawai_tbl_login` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`),
  CONSTRAINT `FK_tbl_pegawai_tbl_pegawai_detail` FOREIGN KEY (`id_pegawai_detail`) REFERENCES `tbl_pegawai_detail` (`id_pegawai_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fiqih_crm.tbl_pegawai: ~0 rows (approximately)
DELETE FROM `tbl_pegawai`;

-- Dumping structure for table fiqih_crm.tbl_pegawai_detail
DROP TABLE IF EXISTS `tbl_pegawai_detail`;
CREATE TABLE IF NOT EXISTS `tbl_pegawai_detail` (
  `id_pegawai_detail` int NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(50) NOT NULL,
  `telp_pegawai` varchar(11) NOT NULL,
  `alamat_pegawai` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `las_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pegawai_detail`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fiqih_crm.tbl_pegawai_detail: ~0 rows (approximately)
DELETE FROM `tbl_pegawai_detail`;

-- Dumping structure for table fiqih_crm.tbl_pelanggan
DROP TABLE IF EXISTS `tbl_pelanggan`;
CREATE TABLE IF NOT EXISTS `tbl_pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telp_pelanggan` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alamat_pelanggan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fiqih_crm.tbl_pelanggan: ~3 rows (approximately)
DELETE FROM `tbl_pelanggan`;
INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `telp_pelanggan`, `alamat_pelanggan`, `created_at`, `last_modified`, `deleted`) VALUES
	(12, 'Moch Fiqih Burhanuddin', '089539551040', 'as', '2025-02-26 15:15:27', '2025-02-26 15:23:19', 0),
	(13, 'Moch Fiqih Burhanuddin. st', '089539551040', '12', '2025-02-26 15:15:47', '2025-02-26 15:23:21', 0),
	(14, 'Coba', '089539551040', '', '2025-02-26 16:06:01', '2025-02-26 16:06:01', 0);

-- Dumping structure for table fiqih_crm.tbl_psb
DROP TABLE IF EXISTS `tbl_psb`;
CREATE TABLE IF NOT EXISTS `tbl_psb` (
  `id_psb` int NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int NOT NULL,
  `id_layanan` int DEFAULT NULL,
  `id_login` int NOT NULL,
  `status_psb` int NOT NULL DEFAULT '0' COMMENT '0 -> Approval Manajer\r\n1 -> selesai',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int DEFAULT '0',
  PRIMARY KEY (`id_psb`),
  KEY `FK_tbl_psb_tbl_layanan` (`id_layanan`),
  KEY `FK_tbl_psb_tbl_pegawai_detail` (`id_login`) USING BTREE,
  KEY `FK_tbl_psb_tbl_pelanggan` (`id_pelanggan`),
  CONSTRAINT `FK_tbl_psb_tbl_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `tbl_layanan` (`id_layanan`),
  CONSTRAINT `FK_tbl_psb_tbl_login` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`),
  CONSTRAINT `FK_tbl_psb_tbl_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fiqih_crm.tbl_psb: ~3 rows (approximately)
DELETE FROM `tbl_psb`;
INSERT INTO `tbl_psb` (`id_psb`, `id_pelanggan`, `id_layanan`, `id_login`, `status_psb`, `created_at`, `last_modified`, `deleted`) VALUES
	(1, 12, 1, 1, 1, '2025-02-26 15:15:27', '2025-02-26 17:03:24', 0),
	(2, 13, 2, 1, 1, '2025-02-26 15:15:47', '2025-02-26 17:15:12', 0),
	(3, 14, 2, 1, 1, '2025-02-26 16:06:01', '2025-02-26 17:15:16', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
