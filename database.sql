-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ijazah
CREATE DATABASE IF NOT EXISTS `ijazah` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ijazah`;

-- Dumping structure for table ijazah.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NIM` int(30) NOT NULL,
  `Nama_Mahasiswa` varchar(30) DEFAULT NULL,
  `Nama_Fakultas` varchar(30) DEFAULT NULL,
  `Nama_Jurusan` varchar(30) DEFAULT NULL,
  `Jenjang` varchar(20) DEFAULT NULL,
  `Angkatan` varchar(20) DEFAULT NULL,
  `status` enum('Lulus','Tidak Lulus') NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `ijazah` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ijazah.mahasiswa: ~1 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`NIM`, `Nama_Mahasiswa`, `Nama_Fakultas`, `Nama_Jurusan`, `Jenjang`, `Angkatan`, `status`, `foto`, `ijazah`) VALUES
	(1177050100, 'Riki Ahmad Maulana', 'SAINTEK', 'Teknik Informatika', 'S2', '2017', 'Tidak Lulus', NULL, NULL);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table ijazah.notif
CREATE TABLE IF NOT EXISTS `notif` (
  `nim` varchar(50) NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ijazah.notif: ~3 rows (approximately)
/*!40000 ALTER TABLE `notif` DISABLE KEYS */;
INSERT INTO `notif` (`nim`, `status`) VALUES
	('1177050100', 1),
	('1177050103', 1),
	('1542301', 1);
/*!40000 ALTER TABLE `notif` ENABLE KEYS */;

-- Dumping structure for table ijazah.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ijazah.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `password`, `level`) VALUES
	('1177050100', '0417c9cb31242192e0fb0bd13aad9a52', 2),
	('admin', '21232f297a57a5a743894a0e4a801fc3', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
