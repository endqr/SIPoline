-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_siap.pbb_target_kec
CREATE TABLE IF NOT EXISTS `pbb_target_kec` (
  `id_target` varchar(50) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `kd_kecamatan` varchar(9) NOT NULL,
  `target_kecamatan` double DEFAULT NULL,
  `wp123` double DEFAULT NULL,
  `target123` double DEFAULT NULL,
  `wp45` double DEFAULT NULL,
  `target45` double DEFAULT NULL,
  `kode_pokja` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_target`),
  KEY `FK_pbb_target_kec_tm_pokja` (`kode_pokja`),
  CONSTRAINT `FK_pbb_target_kec_tm_pokja` FOREIGN KEY (`kode_pokja`) REFERENCES `tm_pokja` (`kode_pokja`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.pbb_target_kec: ~11 rows (approximately)
/*!40000 ALTER TABLE `pbb_target_kec` DISABLE KEYS */;
INSERT INTO `pbb_target_kec` (`id_target`, `tahun`, `kd_kecamatan`, `target_kecamatan`, `wp123`, `target123`, `wp45`, `target45`, `kode_pokja`) VALUES
	('2017010', '2017', '010', 1682885723, 5217, 233743226, 22, 1449142497, '02'),
	('2017020', '2017', '020', 9129360264, 11023, 934142072, 52, 8195218192, '04'),
	('2017030', '2017', '030', 3499521770, 21667, 1750142211, 174, 1749379559, '03'),
	('2017040', '2017', '040', 9051162956, 10748, 1388098462, 230, 7663064494, '02'),
	('2017050', '2017', '050', 4531162143, 15892, 2364838945, 262, 2166323198, '03'),
	('2017060', '2017', '060', 8834495070, 14067, 2852688107, 830, 5981806963, '01'),
	('2017070', '2017', '070', 6172278937, 13310, 2658812657, 336, 3513466280, '01'),
	('2017080', '2017', '080', 1863265308, 13790, 1579579829, 55, 283685479, '05'),
	('2017090', '2017', '090', 2607127787, 32587, 2179506438, 73, 427621349, '04'),
	('2017100', '2017', '100', 2441739469, 14478, 1141614964, 107, 1300124505, '04'),
	('2017110', '2017', '110', 9583364016, 54381, 5313062551, 759, 4270301465, '05');
/*!40000 ALTER TABLE `pbb_target_kec` ENABLE KEYS */;

-- Dumping structure for table db_siap.ref_kecamatan
CREATE TABLE IF NOT EXISTS `ref_kecamatan` (
  `id_kecamatan` varchar(9) NOT NULL,
  `kd_propinsi` varchar(2) NOT NULL,
  `kd_dati2` varchar(2) DEFAULT NULL,
  `kd_kecamatan` varchar(3) DEFAULT NULL,
  `nm_kecamatan` varchar(50) DEFAULT NULL,
  `kode_pokja` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`),
  KEY `FK_ref_kecamatan_tm_pokja` (`kode_pokja`),
  CONSTRAINT `FK_ref_kecamatan_tm_pokja` FOREIGN KEY (`kode_pokja`) REFERENCES `tm_pokja` (`kode_pokja`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.ref_kecamatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `ref_kecamatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_kecamatan` ENABLE KEYS */;

-- Dumping structure for table db_siap.ref_kelurahan
CREATE TABLE IF NOT EXISTS `ref_kelurahan` (
  `id_kelurahan` varchar(13) NOT NULL,
  `kd_propinsi` varchar(2) DEFAULT NULL,
  `kd_dati2` varchar(2) DEFAULT NULL,
  `kd_kecamatan` varchar(3) DEFAULT NULL,
  `kd_kelurahan` varchar(3) DEFAULT NULL,
  `nm_kelurahan` varchar(50) DEFAULT NULL,
  `id_kecamatan` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_kelurahan`),
  KEY `FK_ref_kelurahan_ref_kecamatan` (`id_kecamatan`),
  CONSTRAINT `FK_ref_kelurahan_ref_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `ref_kecamatan` (`id_kecamatan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.ref_kelurahan: ~0 rows (approximately)
/*!40000 ALTER TABLE `ref_kelurahan` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_kelurahan` ENABLE KEYS */;

-- Dumping structure for table db_siap.role_akses
CREATE TABLE IF NOT EXISTS `role_akses` (
  `id` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `kode_menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__tmkaryawan` (`nip`),
  KEY `FK__tmmenu` (`kode_menu`),
  CONSTRAINT `FK__tmkaryawan` FOREIGN KEY (`nip`) REFERENCES `tmkaryawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__tmmenu` FOREIGN KEY (`kode_menu`) REFERENCES `tmmenu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.role_akses: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_akses` DISABLE KEYS */;
INSERT INTO `role_akses` (`id`, `nip`, `kode_menu`) VALUES
	('89879879879_dashboard', '89879879879', 'dashboard'),
	('89879879879_ereport', '89879879879', 'ereport'),
	('89879879879_ereport_piu_tahun', '89879879879', 'ereport_piu_tahun'),
	('89879879879_no_akses', '89879879879', 'no_akses'),
	('89879879879_pbb', '89879879879', 'pbb'),
	('89879879879_pbb_laporan', '89879879879', 'pbb_laporan'),
	('89879879879_pbb_lap_belum_bayar', '89879879879', 'pbb_lap_belum_bayar'),
	('89879879879_pbb_lap_daftar_tunggakan', '89879879879', 'pbb_lap_daftar_tunggakan'),
	('89879879879_pbb_lap_daftar_tunggakan_ereport', '89879879879', 'pbb_lap_daftar_tunggakan_ereport'),
	('89879879879_pbb_lap_objek_baru', '89879879879', 'pbb_lap_objek_baru'),
	('89879879879_pbb_lap_penerimaan_per_bank', '89879879879', 'pbb_lap_penerimaan_per_bank'),
	('89879879879_pbb_lap_realisasi_penerimaan_per_kelurahan', '89879879879', 'pbb_lap_realisasi_penerimaan_per_kelurahan'),
	('89879879879_pbb_lap_real_pokok_vs_target', '89879879879', 'pbb_lap_real_pokok_vs_target'),
	('89879879879_pbb_lap_sejarah_pembayaran', '89879879879', 'pbb_lap_sejarah_pembayaran'),
	('89879879879_pbb_lap_target_vs_realisasi_per_kecamatan', '89879879879', 'pbb_lap_target_vs_realisasi_per_kecamatan'),
	('89879879879_pbb_list_bayar', '89879879879', 'pbb_list_bayar'),
	('89879879879_pbb_list_bayar_tahun', '89879879879', 'pbb_list_bayar_tahun');
/*!40000 ALTER TABLE `role_akses` ENABLE KEYS */;

-- Dumping structure for table db_siap.tmjabatan
CREATE TABLE IF NOT EXISTS `tmjabatan` (
  `kode_jabatan` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.tmjabatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `tmjabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmjabatan` ENABLE KEYS */;

-- Dumping structure for table db_siap.tmjab_kar
CREATE TABLE IF NOT EXISTS `tmjab_kar` (
  `id` varchar(50) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `kode_jab` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tmjab_kar_tmkaryawan` (`nip`),
  KEY `FK_tmjab_kar_tmjabatan` (`kode_jab`),
  CONSTRAINT `FK_tmjab_kar_tmjabatan` FOREIGN KEY (`kode_jab`) REFERENCES `tmjabatan` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tmjab_kar_tmkaryawan` FOREIGN KEY (`nip`) REFERENCES `tmkaryawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.tmjab_kar: ~0 rows (approximately)
/*!40000 ALTER TABLE `tmjab_kar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmjab_kar` ENABLE KEYS */;

-- Dumping structure for table db_siap.tmkaryawan
CREATE TABLE IF NOT EXISTS `tmkaryawan` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `kode_opd` varchar(50) DEFAULT NULL,
  `kode_pokja` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `FK_tmkaryawan_tmuser` (`user_id`),
  KEY `FK_tmkaryawan_tmopd` (`kode_opd`),
  KEY `FK_tmkaryawan_tm_pokja` (`kode_pokja`),
  CONSTRAINT `FK_tmkaryawan_tm_pokja` FOREIGN KEY (`kode_pokja`) REFERENCES `tm_pokja` (`kode_pokja`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tmkaryawan_tmopd` FOREIGN KEY (`kode_opd`) REFERENCES `tmopd` (`kd_opd`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tmkaryawan_tmuser` FOREIGN KEY (`user_id`) REFERENCES `tmuser` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.tmkaryawan: ~1 rows (approximately)
/*!40000 ALTER TABLE `tmkaryawan` DISABLE KEYS */;
INSERT INTO `tmkaryawan` (`nip`, `nama`, `hp`, `user_id`, `kode_opd`, `kode_pokja`) VALUES
	('89879879879', 'Endang', '080980809', 'EndqR', NULL, NULL);
/*!40000 ALTER TABLE `tmkaryawan` ENABLE KEYS */;

-- Dumping structure for table db_siap.tmmenu
CREATE TABLE IF NOT EXISTS `tmmenu` (
  `kode_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `lvl` varchar(50) DEFAULT NULL,
  `id_menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.tmmenu: ~18 rows (approximately)
/*!40000 ALTER TABLE `tmmenu` DISABLE KEYS */;
INSERT INTO `tmmenu` (`kode_menu`, `nama_menu`, `lvl`, `id_menu`) VALUES
	('dashboard', 'Dashboard', '', ''),
	('ereport', 'E-Report', '1', '03.04.'),
	('ereport_piu_tahun', 'Laporan Piutang Per Tahun', '2', '03.04.02.'),
	('no_akses', 'no_akses', '', ''),
	('pbb', 'PBB', '0', '03.'),
	('pbb_laporan', 'Laporan Untuk PBB', '1', '03.03.'),
	('pbb_lap_belum_bayar', 'Lap. PBB Belum Bayar', '2', '03.03.04.'),
	('pbb_lap_daftar_tunggakan', 'Daftar Tunggakan', '2', '03.03.03.'),
	('pbb_lap_daftar_tunggakan_ereport', 'Laporan Piutang', '2', '03.04.01.'),
	('pbb_lap_objek_baru', 'Laporan Objek Baru PBB', '2', '03.03.01.'),
	('pbb_lap_penerimaan_per_bank', 'Realisasi Penerimaan Per Bank', '2', '03.03.07.'),
	('pbb_lap_realisasi_penerimaan_per_kelurahan', 'Realisasi Penerimaan Per Kelurahan', '2', '03.03.05.'),
	('pbb_lap_real_pokok_vs_target', 'Laporan Realisasi Pokok Terhadap Target', '2', '03.03.09.'),
	('pbb_lap_sejarah_pembayaran', 'Sejarah Pembayaran PBB', '2', '03.03.02.'),
	('pbb_lap_target_vs_realisasi_per_kecamatan', 'Realisasi Penerimaan Per Kecamatan', '2', '03.03.06.'),
	('pbb_list_bayar', 'Laporan Pembayaran', '2', '03.04.03.'),
	('pbb_list_bayar_tahun', 'Laporan Pembayaran Per Tahun', '2', '03.03.08.');
/*!40000 ALTER TABLE `tmmenu` ENABLE KEYS */;

-- Dumping structure for table db_siap.tmopd
CREATE TABLE IF NOT EXISTS `tmopd` (
  `kd_opd` varchar(50) NOT NULL,
  `nama_opd` varchar(50) DEFAULT NULL,
  `alamat_opd` varchar(50) DEFAULT NULL,
  `telp_opd` varchar(50) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.tmopd: ~0 rows (approximately)
/*!40000 ALTER TABLE `tmopd` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmopd` ENABLE KEYS */;

-- Dumping structure for table db_siap.tmuser
CREATE TABLE IF NOT EXISTS `tmuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Index 2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.tmuser: ~1 rows (approximately)
/*!40000 ALTER TABLE `tmuser` DISABLE KEYS */;
INSERT INTO `tmuser` (`id`, `user_id`, `pass`) VALUES
	(1, 'EndqR', '7c56571ab0d25a9ea0c41f95defb4a5b');
/*!40000 ALTER TABLE `tmuser` ENABLE KEYS */;

-- Dumping structure for table db_siap.tm_app
CREATE TABLE IF NOT EXISTS `tm_app` (
  `nip` varchar(50) DEFAULT NULL,
  `app` enum('PBB','BPHTB','PAD','SUREL') DEFAULT NULL,
  KEY `FK_tm_app_tmkaryawan` (`nip`),
  CONSTRAINT `FK_tm_app_tmkaryawan` FOREIGN KEY (`nip`) REFERENCES `tmkaryawan` (`nip`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.tm_app: ~0 rows (approximately)
/*!40000 ALTER TABLE `tm_app` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_app` ENABLE KEYS */;

-- Dumping structure for table db_siap.tm_pokja
CREATE TABLE IF NOT EXISTS `tm_pokja` (
  `kode_pokja` varchar(50) NOT NULL,
  `nama_pokja` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_pokja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.tm_pokja: ~0 rows (approximately)
/*!40000 ALTER TABLE `tm_pokja` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_pokja` ENABLE KEYS */;

-- Dumping structure for table db_siap.ttlog
CREATE TABLE IF NOT EXISTS `ttlog` (
  `user_id` varchar(50) DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `FK_ttlog_tmuser` (`user_id`),
  CONSTRAINT `FK_ttlog_tmuser` FOREIGN KEY (`user_id`) REFERENCES `tmuser` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_siap.ttlog: ~0 rows (approximately)
/*!40000 ALTER TABLE `ttlog` DISABLE KEYS */;
INSERT INTO `ttlog` (`user_id`, `waktu`) VALUES
	('EndqR', '2017-10-23 09:04:04'),
	('EndqR', '2017-10-23 09:08:35');
/*!40000 ALTER TABLE `ttlog` ENABLE KEYS */;

-- Dumping structure for procedure db_siap.getkecamatan
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.getmenu
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.getRole
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.get_pokja
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_dash_pad
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_get_target_kel
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_lap_realisasi
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_lap_target
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_lap_target_mingguan
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_login
DELIMITER //
CREATE DEFINER=`EndqR`@`localhost` PROCEDURE `sp_login`(
	IN `user_id` VARCHAR(50),
	IN `pass` VARCHAR(50)
)
BEGIN
SELECT u.id, u.user_id, k.nip, k.nama, k.kode_opd 
	FROM tmuser u,  tmkaryawan k 
	WHERE u.user_id = k.user_id AND u.user_id = user_id AND u.pass = md5(pass);
END//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_rek_opd
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_user
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_view_realisasi
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.sp_view_target
DELIMITER //
//
DELIMITER ;

-- Dumping structure for procedure db_siap.v_pendapatan
DELIMITER //
//
DELIMITER ;

-- Dumping structure for function db_siap.fn_realisasi
DELIMITER //
//
DELIMITER ;

-- Dumping structure for function db_siap.fn_real_minggu
DELIMITER //
//
DELIMITER ;

-- Dumping structure for function db_siap.fn_target
DELIMITER //
//
DELIMITER ;

-- Dumping structure for function db_siap.fn_target_mingguan
DELIMITER //
//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
