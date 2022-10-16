-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk data_penduduk
CREATE DATABASE IF NOT EXISTS `data_penduduk` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `data_penduduk`;

-- membuang struktur untuk table data_penduduk.tb_anggota
CREATE TABLE IF NOT EXISTS `tb_anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_kk` int(11),
  `id_pend` int(11),
  `hubungan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_pend` (`id_pend`),
  KEY `id_kk` (`id_kk`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_penduduk.tb_anggota: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_anggota` DISABLE KEYS */;
INSERT INTO `tb_anggota` (`id_anggota`, `id_kk`, `id_pend`, `hubungan`) VALUES
	(14, 6, 14, 'Kepala Keluarga'),
	(15, 6, 16, 'Cucu'),
	(16, 7, 17, 'Menantu');
/*!40000 ALTER TABLE `tb_anggota` ENABLE KEYS */;

-- membuang struktur untuk table data_penduduk.tb_datang
CREATE TABLE IF NOT EXISTS `tb_datang` (
  `id_datang` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) DEFAULT '0',
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL,
  `dari` varchar(255) NOT NULL DEFAULT '',
  `status` enum('jadi','tidak jadi','menunggu') DEFAULT NULL,
  PRIMARY KEY (`id_datang`),
  KEY `pelapor` (`pelapor`) USING BTREE,
  KEY `id_pdd` (`id_pdd`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_penduduk.tb_datang: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_datang` DISABLE KEYS */;
INSERT INTO `tb_datang` (`id_datang`, `id_pdd`, `tgl_datang`, `pelapor`, `dari`, `status`) VALUES
	(5, 19, '2022-10-21', 18, 'bojong eek', NULL);
/*!40000 ALTER TABLE `tb_datang` ENABLE KEYS */;

-- membuang struktur untuk table data_penduduk.tb_kk
CREATE TABLE IF NOT EXISTS `tb_kk` (
  `id_kk` int(11) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_penduduk.tb_kk: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_kk` DISABLE KEYS */;
INSERT INTO `tb_kk` (`id_kk`, `no_kk`, `kepala`, `desa`, `rt`, `rw`, `kec`, `kab`, `prov`) VALUES
	(6, '102038292321', 'Nugroho', 'Tamantirto', '01', '0', 'Kasihan ', 'Bantul', 'DIY'),
	(7, '356163565', 'Restu', 'Tamantirto', '002', '004', 'Kasihan', 'Bantul', 'Daerah Istimewa Yogy');
/*!40000 ALTER TABLE `tb_kk` ENABLE KEYS */;

-- membuang struktur untuk table data_penduduk.tb_lahir
CREATE TABLE IF NOT EXISTS `tb_lahir` (
  `id_lahir` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `id_kk` int(11),
  `panjang_bayi` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_lahir`),
  KEY `id_kk` (`id_kk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_penduduk.tb_lahir: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_lahir` DISABLE KEYS */;
INSERT INTO `tb_lahir` (`id_lahir`, `nama`, `tgl_lh`, `jekel`, `id_kk`, `panjang_bayi`) VALUES
	(3, 'Restu', '2021-05-14', 'LK', 7, 120),
	(4, 'coba', '2022-10-14', 'LK', 6, 1200);
/*!40000 ALTER TABLE `tb_lahir` ENABLE KEYS */;

-- membuang struktur untuk table data_penduduk.tb_mendu
CREATE TABLE IF NOT EXISTS `tb_mendu` (
  `id_mendu` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11),
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL,
  `jam` time DEFAULT NULL,
  PRIMARY KEY (`id_mendu`),
  KEY `id_pdd` (`id_pdd`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_penduduk.tb_mendu: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_mendu` DISABLE KEYS */;
INSERT INTO `tb_mendu` (`id_mendu`, `id_pdd`, `tgl_mendu`, `sebab`, `jam`) VALUES
	(3, 15, '2021-05-13', 'covid', NULL),
	(4, 17, '2022-10-14', 'apa ya', '23:22:00');
/*!40000 ALTER TABLE `tb_mendu` ENABLE KEYS */;

-- membuang struktur untuk table data_penduduk.tb_pdd
CREATE TABLE IF NOT EXISTS `tb_pdd` (
  `id_pend` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `desa` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL,
  PRIMARY KEY (`id_pend`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_penduduk.tb_pdd: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_pdd` DISABLE KEYS */;
INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `desa`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `kewarganegaraan`, `pendidikan`, `status`) VALUES
	(14, '1234', 'Ardi', 'Jogja', '1995-02-20', 'LK', 'Tegal Sari', '01', '-', 'Islam', 'Sudah', 'Buruh', NULL, NULL, 'Pindah'),
	(15, '21712718', 'Restu', 'Bantul', '1996-09-13', 'LK', 'Tamantirto', '002', '004', 'Islam', 'Belum', 'Pegawai Swasta', NULL, NULL, 'Meninggal'),
	(16, '88812210878', 'fajar cahyadi putra', 'kota bekasi', '2022-10-04', 'LK', 'cikiwul', '01', '02', 'islam', 'Belum', 'tidak ada', 'indonesia', 'SMK 1 PUSAKANAGARA', 'Pindah'),
	(17, '88812210878', 'oop', 'kota bekasi', '2022-09-27', 'LK', 'cikiwul', '01', '02', 'islam', 'Sudah', 'tidak ada', 'indonesia', 'SMK', 'Meninggal'),
	(18, '88812210232', 'eea', 'kota bekasi', '2022-10-06', 'LK', 'cikiwul', '01', '02', 'islam', 'Sudah', 'tidak ada', 'indonesia', 'SMK', 'Ada'),
	(19, '88812210878221', 'iik', 'kota bekasi', '2022-09-28', 'LK', 'cikiwul', '01', '02', 'islam', 'Sudah', 'tidak ada', 'indonesia', 'SMK', 'Ada');
/*!40000 ALTER TABLE `tb_pdd` ENABLE KEYS */;

-- membuang struktur untuk table data_penduduk.tb_pengguna
CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah','lurah') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_penduduk.tb_pengguna: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_pengguna` DISABLE KEYS */;
INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
	(1, 'Siti Nurwiyah', 'admin', 'admin', 'Administrator'),
	(3, 'Kang Emon', 'admin2', 'admin2', 'Kaur Pemerintah'),
	(4, 'asep', 'asep', 'asep', 'lurah');
/*!40000 ALTER TABLE `tb_pengguna` ENABLE KEYS */;

-- membuang struktur untuk table data_penduduk.tb_pindah
CREATE TABLE IF NOT EXISTS `tb_pindah` (
  `id_pindah` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11),
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tempat_tujuan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pindah`),
  KEY `id_pdd` (`id_pdd`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_penduduk.tb_pindah: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_pindah` DISABLE KEYS */;
INSERT INTO `tb_pindah` (`id_pindah`, `id_pdd`, `tgl_pindah`, `alasan`, `status`, `tempat_tujuan`) VALUES
	(3, 14, '2021-05-15', 'ga tau', 'lainnya', 'rumah pak uus'),
	(4, 16, '2022-10-15', 'asa', 'belum', 'rumah pak uus');
/*!40000 ALTER TABLE `tb_pindah` ENABLE KEYS */;

-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_datang_ibfk_2` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;