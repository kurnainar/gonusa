-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for gonusa
DROP DATABASE IF EXISTS `gonusa`;
CREATE DATABASE IF NOT EXISTS `gonusa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `gonusa`;

-- Dumping structure for table gonusa._t_m_groupmenu
DROP TABLE IF EXISTS `_t_m_groupmenu`;
CREATE TABLE IF NOT EXISTS `_t_m_groupmenu` (
  `GroupMenuId` int(4) NOT NULL AUTO_INCREMENT,
  `GroupMenuName` varchar(50) NOT NULL,
  `GroupMenuStatus` int(1) NOT NULL DEFAULT 1 COMMENT '1 = Aktif; 0 = Non-Aktif;',
  `GroupMenuDelete` int(1) NOT NULL DEFAULT 0 COMMENT '1 = Ya; 0 = Tidak;',
  `GroupMenuOrder` int(2) NOT NULL,
  PRIMARY KEY (`GroupMenuId`),
  UNIQUE KEY `GroupMenuOrder` (`GroupMenuOrder`),
  KEY `GroupMenuStatus` (`GroupMenuStatus`),
  KEY `GroupMenuName` (`GroupMenuName`),
  KEY `GroupMenuDelete` (`GroupMenuDelete`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table gonusa._t_m_groupmenu: ~4 rows (approximately)
DELETE FROM `_t_m_groupmenu`;
/*!40000 ALTER TABLE `_t_m_groupmenu` DISABLE KEYS */;
INSERT INTO `_t_m_groupmenu` (`GroupMenuId`, `GroupMenuName`, `GroupMenuStatus`, `GroupMenuDelete`, `GroupMenuOrder`) VALUES
	(1, 'Pengaturan', 1, 0, 1),
	(2, 'Data', 1, 0, 2),
	(3, 'Transaksi', 1, 0, 3),
	(4, 'Laporan', 1, 0, 4);
/*!40000 ALTER TABLE `_t_m_groupmenu` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_m_product
DROP TABLE IF EXISTS `_t_m_product`;
CREATE TABLE IF NOT EXISTS `_t_m_product` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gonusa._t_m_product: ~3 rows (approximately)
DELETE FROM `_t_m_product`;
/*!40000 ALTER TABLE `_t_m_product` DISABLE KEYS */;
INSERT INTO `_t_m_product` (`product_id`, `product_name`, `stock`) VALUES
	(1, 'PRODUCT A', 100),
	(2, 'Produk B', 80);
/*!40000 ALTER TABLE `_t_m_product` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_m_reason
DROP TABLE IF EXISTS `_t_m_reason`;
CREATE TABLE IF NOT EXISTS `_t_m_reason` (
  `reason_id` int(3) NOT NULL AUTO_INCREMENT,
  `reason_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`reason_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gonusa._t_m_reason: ~4 rows (approximately)
DELETE FROM `_t_m_reason`;
/*!40000 ALTER TABLE `_t_m_reason` DISABLE KEYS */;
INSERT INTO `_t_m_reason` (`reason_id`, `reason_name`) VALUES
	(1, 'BOCOR'),
	(2, 'GUMPAL'),
	(3, 'MELELEH'),
	(4, 'EXPIRED');
/*!40000 ALTER TABLE `_t_m_reason` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_m_role
DROP TABLE IF EXISTS `_t_m_role`;
CREATE TABLE IF NOT EXISTS `_t_m_role` (
  `role_id` int(3) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gonusa._t_m_role: ~5 rows (approximately)
DELETE FROM `_t_m_role`;
/*!40000 ALTER TABLE `_t_m_role` DISABLE KEYS */;
INSERT INTO `_t_m_role` (`role_id`, `role_name`) VALUES
	(1, 'ADMIN GUDANG'),
	(2, 'KEPALA GUDANG'),
	(3, 'KEPALA CABANG'),
	(4, 'PIC KANTOR PUSAT'),
	(5, 'WAKIL KEPALA CABANG');
/*!40000 ALTER TABLE `_t_m_role` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_m_submenu
DROP TABLE IF EXISTS `_t_m_submenu`;
CREATE TABLE IF NOT EXISTS `_t_m_submenu` (
  `SubMenuId` int(4) NOT NULL AUTO_INCREMENT,
  `SubMenuName` varchar(50) NOT NULL,
  `Controller` varchar(50) NOT NULL,
  `SubMenuStatus` int(1) NOT NULL DEFAULT 1 COMMENT '1 = Aktif; 0 = Non-Aktif;',
  `SubMenuDelete` int(1) NOT NULL DEFAULT 0 COMMENT '1 = Ya; 0 = Tidak;',
  PRIMARY KEY (`SubMenuId`),
  UNIQUE KEY `Controller` (`Controller`),
  KEY `SubMenuName` (`SubMenuName`),
  KEY `SubMenuStatus` (`SubMenuStatus`),
  KEY `SubMenuDelete` (`SubMenuDelete`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table gonusa._t_m_submenu: ~9 rows (approximately)
DELETE FROM `_t_m_submenu`;
/*!40000 ALTER TABLE `_t_m_submenu` DISABLE KEYS */;
INSERT INTO `_t_m_submenu` (`SubMenuId`, `SubMenuName`, `Controller`, `SubMenuStatus`, `SubMenuDelete`) VALUES
	(1, 'Daftar Grup Menu', 'Groupmenu', 1, 0),
	(2, 'Daftar Sub Menu', 'Submenu', 1, 0),
	(3, 'Daftar Pengguna', 'User', 1, 0),
	(5, 'Daftar Pembagian Menu', 'AssignMenu', 1, 0),
	(11, 'Pengajuan Approval BS', 'ApprovalBS', 1, 0),
	(12, 'Ubah Kata Sandi', 'user/formChangePassword', 1, 0),
	(14, 'Daftar Produk', 'Product', 1, 0),
	(15, 'Daftar Persetujuan', 'Approve', 1, 0),
	(16, 'Realisasi Pemusnahan', 'Realisasi', 1, 0);
/*!40000 ALTER TABLE `_t_m_submenu` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_m_user
DROP TABLE IF EXISTS `_t_m_user`;
CREATE TABLE IF NOT EXISTS `_t_m_user` (
  `UserId` int(4) NOT NULL AUTO_INCREMENT,
  `Username` varchar(10) NOT NULL,
  `UserFullName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `LoginStatus` int(1) NOT NULL DEFAULT 0 COMMENT '0 = Logout; 1 = Login;',
  `UserStatus` int(1) NOT NULL DEFAULT 1 COMMENT '0 = Non-Aktif; 1 = Aktif;',
  `UserGroupId` int(1) NOT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastLogout` datetime DEFAULT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Username` (`Username`),
  KEY `UserFullName` (`UserFullName`),
  KEY `LoginStatus` (`LoginStatus`),
  KEY `UserStatus` (`UserStatus`),
  KEY `UserGroupId` (`UserGroupId`),
  KEY `Password` (`Password`),
  KEY `LastLogin` (`LastLogin`),
  KEY `LastLogout` (`LastLogout`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table gonusa._t_m_user: ~5 rows (approximately)
DELETE FROM `_t_m_user`;
/*!40000 ALTER TABLE `_t_m_user` DISABLE KEYS */;
INSERT INTO `_t_m_user` (`UserId`, `Username`, `UserFullName`, `Password`, `LoginStatus`, `UserStatus`, `UserGroupId`, `LastLogin`, `LastLogout`) VALUES
	(1, 'admin', 'System Administrator', '$2y$10$FK3AGd7L5qcoQVthOd9tB.XwNyeXyGe9gh0D/cf3ROf2M6gvfHWiS', 0, 1, 1, '2022-02-28 09:47:42', '2022-02-28 09:49:17'),
	(2, 'admgudang', 'Admin Gudang', '$2y$10$mN/x1mx/BiZEh0.We7aPGOHcI3kljokk6VcC0VvvByUHQ9lxwADCy', 0, 1, 2, '2022-02-28 09:49:24', '2022-02-28 15:54:03'),
	(3, 'kagudang', 'Kepala Gudang', '$2y$10$4y8QACX911F1fXwMhDe3rOon59Kv23F9FYwNUOInTIsS.FYq2zM3m', 0, 1, 3, '2022-02-28 09:19:15', '2022-02-28 09:19:25'),
	(4, 'kacabang', 'Kepala Cabang', '$2y$10$TJgtUmDNHYZ9hb.9ebeRfO/jODoeTEK4o1rGYBFAxMaf7V9bzaPD6', 0, 1, 5, '2022-02-28 09:19:29', '2022-02-28 09:19:37'),
	(5, 'pic', 'PIC', '$2y$10$HDZBRlIqwmgu6uWCPOUtR.ANoEL01lV4lH1Wr7PK9S0KT1EeW2IQa', 0, 1, 6, '2022-02-28 09:19:41', '2022-02-28 09:26:33');
/*!40000 ALTER TABLE `_t_m_user` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_m_usergroup
DROP TABLE IF EXISTS `_t_m_usergroup`;
CREATE TABLE IF NOT EXISTS `_t_m_usergroup` (
  `UserGroupId` int(4) NOT NULL AUTO_INCREMENT,
  `UserGroupName` varchar(50) NOT NULL,
  PRIMARY KEY (`UserGroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table gonusa._t_m_usergroup: ~6 rows (approximately)
DELETE FROM `_t_m_usergroup`;
/*!40000 ALTER TABLE `_t_m_usergroup` DISABLE KEYS */;
INSERT INTO `_t_m_usergroup` (`UserGroupId`, `UserGroupName`) VALUES
	(1, 'System Administrator'),
	(2, 'ADMIN GUDANG'),
	(3, 'KEPALA GUDANG'),
	(4, 'WAKIL KEPALA CABANG'),
	(5, 'KEPALA CABANG'),
	(6, 'PIC KANTOR PUSAT');
/*!40000 ALTER TABLE `_t_m_usergroup` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_t_assignmenu
DROP TABLE IF EXISTS `_t_t_assignmenu`;
CREATE TABLE IF NOT EXISTS `_t_t_assignmenu` (
  `AssignMenuId` int(4) NOT NULL AUTO_INCREMENT,
  `GroupMenuId` int(4) NOT NULL,
  `SubMenuId` int(4) NOT NULL,
  `UserGroupId` int(4) NOT NULL,
  `CreatedBy` varchar(10) NOT NULL,
  `CreatedDateTs` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`AssignMenuId`),
  KEY `GroupMenuId` (`GroupMenuId`),
  KEY `SubMenuId` (`SubMenuId`),
  KEY `UserGroupId` (`UserGroupId`),
  KEY `CreatedBy` (`CreatedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table gonusa._t_t_assignmenu: ~18 rows (approximately)
DELETE FROM `_t_t_assignmenu`;
/*!40000 ALTER TABLE `_t_t_assignmenu` DISABLE KEYS */;
INSERT INTO `_t_t_assignmenu` (`AssignMenuId`, `GroupMenuId`, `SubMenuId`, `UserGroupId`, `CreatedBy`, `CreatedDateTs`) VALUES
	(1, 2, 1, 1, 'admin', '2022-02-28 13:38:59'),
	(2, 2, 3, 1, 'admin', '2022-02-28 13:38:59'),
	(3, 2, 2, 1, 'admin', '2022-02-28 13:38:59'),
	(4, 1, 5, 1, 'admin', '2022-02-28 13:38:59'),
	(6, 2, 6, 1, 'admin', '2022-02-28 13:38:59'),
	(8, 2, 8, 1, 'admin', '2022-02-28 13:38:59'),
	(9, 2, 9, 1, 'admin', '2022-02-28 13:38:59'),
	(10, 2, 10, 1, 'admin', '2022-02-28 13:38:59'),
	(11, 3, 11, 1, 'admin', '2022-02-28 13:38:59'),
	(12, 3, 11, 2, 'admin', '2022-02-28 13:41:39'),
	(13, 3, 15, 3, 'admin', '2022-02-28 13:42:05'),
	(14, 3, 15, 4, 'admin', '2022-02-28 13:42:21'),
	(15, 3, 15, 5, 'admin', '2022-02-28 13:42:35'),
	(16, 3, 15, 6, 'admin', '2022-02-28 13:42:48'),
	(17, 2, 14, 2, 'admin', '2022-02-28 13:46:19'),
	(18, 3, 16, 1, 'admin', '2022-02-28 15:48:37'),
	(19, 3, 15, 1, 'admin', '2022-02-28 15:48:55'),
	(20, 3, 16, 2, 'admin', '2022-02-28 15:49:10');
/*!40000 ALTER TABLE `_t_t_assignmenu` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_t_pemusnahan
DROP TABLE IF EXISTS `_t_t_pemusnahan`;
CREATE TABLE IF NOT EXISTS `_t_t_pemusnahan` (
  `pemusnahan_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_document` varchar(50) NOT NULL,
  `method` int(1) NOT NULL COMMENT '1 = Vendor; 2 = Internal;',
  `nama` varchar(100) NOT NULL,
  `photo_1` varchar(255) NOT NULL,
  `photo_2` varchar(255) NOT NULL,
  `photo_3` varchar(255) NOT NULL,
  `photo_4` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_qty` int(11) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`pemusnahan_id`),
  UNIQUE KEY `no_document` (`no_document`),
  KEY `method` (`method`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gonusa._t_t_pemusnahan: ~0 rows (approximately)
DELETE FROM `_t_t_pemusnahan`;
/*!40000 ALTER TABLE `_t_t_pemusnahan` DISABLE KEYS */;
/*!40000 ALTER TABLE `_t_t_pemusnahan` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_t_pengajuan
DROP TABLE IF EXISTS `_t_t_pengajuan`;
CREATE TABLE IF NOT EXISTS `_t_t_pengajuan` (
  `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_document` varchar(18) NOT NULL,
  `qty` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `product_id` int(5) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `approval1_id` varchar(10) DEFAULT NULL,
  `approval1_status` int(1) DEFAULT NULL,
  `approval1_date` datetime DEFAULT NULL,
  `approval2_id` varchar(10) DEFAULT NULL,
  `approval2_status` int(1) DEFAULT NULL,
  `approval2_date` datetime DEFAULT NULL,
  `approval3_id` varchar(10) DEFAULT NULL,
  `approval3_status` int(1) DEFAULT NULL,
  `approval3_date` datetime DEFAULT NULL,
  `status_id` int(1) NOT NULL COMMENT '1 = Submit; 2 = Disetujui, 3 = Ditolak; 4 = Direvisi;',
  `flag_pemusnahan` int(1) NOT NULL DEFAULT 0 COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`pengajuan_id`),
  UNIQUE KEY `no_document` (`no_document`),
  KEY `product_id` (`product_id`),
  KEY `approval1_id` (`approval1_id`),
  KEY `approval2_id` (`approval2_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gonusa._t_t_pengajuan: ~0 rows (approximately)
DELETE FROM `_t_t_pengajuan`;
/*!40000 ALTER TABLE `_t_t_pengajuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `_t_t_pengajuan` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_t_pengajuan_log
DROP TABLE IF EXISTS `_t_t_pengajuan_log`;
CREATE TABLE IF NOT EXISTS `_t_t_pengajuan_log` (
  `pengajuan_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_document` varchar(18) NOT NULL,
  `approved_by` varchar(10) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(1) NOT NULL COMMENT '1 = Submit; 2 = Disetujui, 3 = Ditolak; 4 = Direvisi;',
  PRIMARY KEY (`pengajuan_log_id`) USING BTREE,
  KEY `no_document` (`no_document`),
  KEY `approved_by` (`approved_by`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table gonusa._t_t_pengajuan_log: ~0 rows (approximately)
DELETE FROM `_t_t_pengajuan_log`;
/*!40000 ALTER TABLE `_t_t_pengajuan_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `_t_t_pengajuan_log` ENABLE KEYS */;

-- Dumping structure for table gonusa._t_t_user_activity
DROP TABLE IF EXISTS `_t_t_user_activity`;
CREATE TABLE IF NOT EXISTS `_t_t_user_activity` (
  `UserActivityId` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(10) NOT NULL,
  `ActivityName` varchar(100) NOT NULL,
  `ActivityDateTs` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`UserActivityId`),
  KEY `Username` (`Username`),
  KEY `ActivityDateTs` (`ActivityDateTs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gonusa._t_t_user_activity: ~0 rows (approximately)
DELETE FROM `_t_t_user_activity`;
/*!40000 ALTER TABLE `_t_t_user_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `_t_t_user_activity` ENABLE KEYS */;

-- Dumping structure for view gonusa._t_v_approvallist
DROP VIEW IF EXISTS `_t_v_approvallist`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `_t_v_approvallist` (
	`pengajuan_id` INT(11) NOT NULL,
	`no_document` VARCHAR(18) NOT NULL COLLATE 'utf8mb4_general_ci',
	`qty` INT(11) NOT NULL,
	`reason` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`create_date` DATETIME NOT NULL,
	`product_name` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`approval1_stat` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_general_ci',
	`approval1_date` VARCHAR(19) NULL COLLATE 'utf8mb4_general_ci',
	`approval2_stat` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_general_ci',
	`approval2_date` VARCHAR(19) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gonusa._t_v_approve_1
DROP VIEW IF EXISTS `_t_v_approve_1`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `_t_v_approve_1` (
	`pengajuan_id` INT(11) NOT NULL,
	`no_document` VARCHAR(18) NOT NULL COLLATE 'utf8mb4_general_ci',
	`qty` INT(11) NOT NULL,
	`reason` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`create_date` DATETIME NOT NULL,
	`product_name` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gonusa._t_v_approve_2
DROP VIEW IF EXISTS `_t_v_approve_2`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `_t_v_approve_2` (
	`pengajuan_id` INT(11) NOT NULL,
	`no_document` VARCHAR(18) NOT NULL COLLATE 'utf8mb4_general_ci',
	`qty` INT(11) NOT NULL,
	`reason` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`create_date` DATETIME NOT NULL,
	`product_name` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gonusa._t_v_approve_3
DROP VIEW IF EXISTS `_t_v_approve_3`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `_t_v_approve_3` (
	`pengajuan_id` INT(11) NOT NULL,
	`no_document` VARCHAR(18) NOT NULL COLLATE 'utf8mb4_general_ci',
	`qty` INT(11) NOT NULL,
	`reason` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`create_date` DATETIME NOT NULL,
	`product_name` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gonusa._t_v_pengajuan
DROP VIEW IF EXISTS `_t_v_pengajuan`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `_t_v_pengajuan` (
	`pengajuan_id` INT(11) NOT NULL,
	`no_document` VARCHAR(18) NOT NULL COLLATE 'utf8mb4_general_ci',
	`qty` INT(11) NOT NULL,
	`reason` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`create_date` DATETIME NOT NULL,
	`product_name` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`stat` VARCHAR(6) NOT NULL COLLATE 'utf8mb4_general_ci',
	`approved_by` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`update_at` VARCHAR(19) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gonusa._t_v_realisasi
DROP VIEW IF EXISTS `_t_v_realisasi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `_t_v_realisasi` (
	`pengajuan_id` INT(11) NOT NULL,
	`no_document` VARCHAR(18) NOT NULL COLLATE 'utf8mb4_general_ci',
	`qty` INT(11) NOT NULL,
	`reason` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`create_date` DATETIME NOT NULL,
	`product_name` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gonusa._t_v_userlist
DROP VIEW IF EXISTS `_t_v_userlist`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `_t_v_userlist` (
	`UserId` INT(4) NOT NULL,
	`UserFullName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`Username` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`LoginStatus` VARCHAR(6) NOT NULL COLLATE 'utf8mb4_general_ci',
	`UserStatus` VARCHAR(9) NOT NULL COLLATE 'utf8mb4_general_ci',
	`UserGroupName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`LastLogin` VARCHAR(19) NULL COLLATE 'utf8mb4_general_ci',
	`LastLogout` VARCHAR(19) NULL COLLATE 'utf8mb4_general_ci',
	`UserGroupId` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gonusa._t_v_approvallist
DROP VIEW IF EXISTS `_t_v_approvallist`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `_t_v_approvallist`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `_t_v_approvallist` AS SELECT
	a.pengajuan_id, a.no_document, a.qty, a.reason, a.create_date, b.product_name,
	IF(a.approval1_status IS NULL, '-', 'Ya') approval1_stat,
	IF(a.approval1_date IS NULL, '-', a.approval1_date) approval1_date,
	IF(a.approval2_status IS NULL, '-', 'Ya') approval2_stat,
	IF(a.approval2_id IS NULL, '-', a.approval2_date) approval2_date
FROM _t_t_pengajuan a
JOIN _t_m_product b ON a.product_id = b.product_id
ORDER BY a.create_date DESC ;

-- Dumping structure for view gonusa._t_v_approve_1
DROP VIEW IF EXISTS `_t_v_approve_1`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `_t_v_approve_1`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `_t_v_approve_1` AS SELECT
	a.pengajuan_id, a.no_document, a.qty, a.reason, a.create_date, b.product_name
FROM _t_t_pengajuan a
JOIN _t_m_product b ON a.product_id = b.product_id
WHERE a.approval1_status IS NULL
AND a.approval2_status IS NULL
AND a.approval3_status IS NULL
AND a.status_id NOT IN (3,4)
ORDER BY a.create_date DESC ;

-- Dumping structure for view gonusa._t_v_approve_2
DROP VIEW IF EXISTS `_t_v_approve_2`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `_t_v_approve_2`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `_t_v_approve_2` AS SELECT
	a.pengajuan_id, a.no_document, a.qty, a.reason, a.create_date, b.product_name
FROM _t_t_pengajuan a
JOIN _t_m_product b ON a.product_id = b.product_id
WHERE a.approval1_status IS NOT NULL
AND a.approval2_status IS NULL
AND a.approval3_status IS NULL
AND a.status_id NOT IN (3,4)
ORDER BY a.create_date DESC ;

-- Dumping structure for view gonusa._t_v_approve_3
DROP VIEW IF EXISTS `_t_v_approve_3`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `_t_v_approve_3`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `_t_v_approve_3` AS SELECT
	a.pengajuan_id, a.no_document, a.qty, a.reason, a.create_date, b.product_name
FROM _t_t_pengajuan a
JOIN _t_m_product b ON a.product_id = b.product_id
WHERE a.approval1_status IS NOT NULL
AND a.approval2_status IS NOT NULL
AND a.approval3_status IS NULL
AND a.status_id = 2
ORDER BY a.create_date DESC ;

-- Dumping structure for view gonusa._t_v_pengajuan
DROP VIEW IF EXISTS `_t_v_pengajuan`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `_t_v_pengajuan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `_t_v_pengajuan` AS SELECT
	a.pengajuan_id, a.no_document, a.qty, a.reason, a.create_date, b.product_name,
	CASE
		WHEN a.status_id = 1 THEN 'Submit'
		WHEN a.status_id = 2 THEN 'Terima'
		WHEN a.status_id = 3 THEN 'Tolak'
		ELSE 'Revisi'
	END stat,
	CASE
		WHEN a.approval1_status IS NOT NULL AND a.approval2_status IS NULL THEN c.UserFullName
		WHEN a.approval1_status IS NOT NULL AND a.approval2_status IS NOT NULL THEN d.UserFullName
		ELSE '-'
	END approved_by,
	IF(a.update_at IS NULL, '-', a.update_at) update_at
FROM _t_t_pengajuan a
JOIN _t_m_product b ON a.product_id = b.product_id
LEFT JOIN _t_m_user c ON a.approval1_id = c.Username
LEFT JOIN _t_m_user d ON a.approval2_id = d.Username
ORDER BY a.create_date DESC ;

-- Dumping structure for view gonusa._t_v_realisasi
DROP VIEW IF EXISTS `_t_v_realisasi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `_t_v_realisasi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `_t_v_realisasi` AS SELECT
	a.pengajuan_id, a.no_document, a.qty, a.reason, a.create_date, b.product_name
FROM _t_t_pengajuan a
JOIN _t_m_product b ON a.product_id = b.product_id
WHERE a.approval1_status IS NOT NULL
AND a.approval2_status IS NOT NULL
AND a.approval3_status IS NOT NULL
AND a.status_id = 2 AND a.flag_pemusnahan = 0
ORDER BY a.create_date DESC ;

-- Dumping structure for view gonusa._t_v_userlist
DROP VIEW IF EXISTS `_t_v_userlist`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `_t_v_userlist`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `_t_v_userlist` AS SELECT 
	`a`.`UserId`, `a`.`UserFullName`, `a`.`Username`, 
	IF(a.LoginStatus = 0, 'Logout', 'Login') LoginStatus,
	IF(a.UserStatus = 1, 'Aktif', 'Non-Aktif') UserStatus, `b`.`UserGroupName`,
	IF(a.LastLogin IS NULL, '-', a.LastLogin) LastLogin,
	IF(a.LastLogout IS NULL, '-', a.LastLogout) LastLogout, a.UserGroupId
FROM `_t_m_user` `a`
JOIN `_t_m_usergroup` `b` ON `a`.`UserGroupId` = `b`.`UserGroupId`
ORDER BY `a`.`UserFullName` ASC ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
