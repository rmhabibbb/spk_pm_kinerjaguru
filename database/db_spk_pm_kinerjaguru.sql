-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2021 at 07:25 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_pm_kinerjaguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

DROP TABLE IF EXISTS `akun`;
CREATE TABLE IF NOT EXISTS `akun` (
  `nip` varchar(18) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nip`, `password`, `role`, `last_login`) VALUES
('1234', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2021-09-12 01:09:03'),
('G1', '25d55ad283aa400af464c76d713c07ad', 3, '2021-09-12 01:16:32'),
('G2', '52aad4cff2745f71b04ee128c0d9e6be', 3, NULL),
('G3', '2921950ba1c734e52ca6161f0cad1483', 3, NULL),
('G4', 'a0190496ceaf3dc7c2ae9373dd7317b3', 3, NULL),
('G5', '94d310c7d04458fde088caf8ed27c9b1', 3, NULL),
('kepalasekolah', 'a3dcb4d229de6fde0db5686dee47145d', 2, '2021-09-12 01:08:47'),
('stafftu', 'eeca2f133db8617a1bd9a747a320649c', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_laporan`
--

DROP TABLE IF EXISTS `detail_laporan`;
CREATE TABLE IF NOT EXISTS `detail_laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_laporan` int(11) NOT NULL,
  `kriteria` text NOT NULL,
  `bobot` int(3) NOT NULL,
  `hasil` float(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kinerja` (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_laporan`
--

INSERT INTO `detail_laporan` (`id`, `id_laporan`, `kriteria`, `bobot`, `hasil`) VALUES
(36, 6, 'Ketaqwaan', 25, 4.70),
(37, 6, 'Kejujuran', 15, 4.80),
(38, 6, 'Penguasaan Tugas', 15, 3.80),
(39, 6, 'Interaksi Sosial', 10, 3.95),
(40, 6, 'Kehadiran & Kerajinan', 15, 4.70),
(41, 6, 'Inisiatif', 10, 3.95),
(42, 6, 'Kepemimpinan', 10, 4.40),
(43, 7, 'Ketaqwaan', 25, 4.80),
(44, 7, 'Kejujuran', 15, 4.40),
(45, 7, 'Penguasaan Tugas', 15, 4.30),
(46, 7, 'Interaksi Sosial', 10, 4.70),
(47, 7, 'Kehadiran & Kerajinan', 15, 4.40),
(48, 7, 'Inisiatif', 10, 4.00),
(49, 7, 'Kepemimpinan', 10, 4.30),
(50, 8, 'Ketaqwaan', 25, 4.65),
(51, 8, 'Kejujuran', 15, 4.80),
(52, 8, 'Penguasaan Tugas', 15, 4.80),
(53, 8, 'Interaksi Sosial', 10, 4.25),
(54, 8, 'Kehadiran & Kerajinan', 15, 4.50),
(55, 8, 'Inisiatif', 10, 4.30),
(56, 8, 'Kepemimpinan', 10, 4.60),
(57, 9, 'Ketaqwaan', 25, 4.55),
(58, 9, 'Kejujuran', 15, 4.60),
(59, 9, 'Penguasaan Tugas', 15, 4.20),
(60, 9, 'Interaksi Sosial', 10, 4.10),
(61, 9, 'Kehadiran & Kerajinan', 15, 4.40),
(62, 9, 'Inisiatif', 10, 4.15),
(63, 9, 'Kepemimpinan', 10, 4.20),
(64, 10, 'Ketaqwaan', 25, 4.70),
(65, 10, 'Kejujuran', 15, 3.80),
(66, 10, 'Penguasaan Tugas', 15, 4.40),
(67, 10, 'Interaksi Sosial', 10, 4.10),
(68, 10, 'Kehadiran & Kerajinan', 15, 4.77),
(69, 10, 'Inisiatif', 10, 4.00),
(70, 10, 'Kepemimpinan', 10, 4.60);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_guru`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `jk`, `no_telp`, `email`, `alamat`) VALUES
(1, 'G1', 'Antoni Erzal', 'Laki - Laki', '-', 'g1@gmail.com', '-'),
(2, 'G2', 'Sigit Rahardi', 'Laki - Laki', '-', 'g2@gmail.com', '-'),
(3, 'G3', 'Sepratman', 'Laki - Laki', '-', 'g3@gmail.com', '-'),
(4, 'G4', 'Hayanin Puspitasari', 'Perempuan', '-', 'g4@gmail.com', '-'),
(5, 'G5', 'M. Thoyib Thosin', 'Laki - Laki', '-', 'g5@gmail.com', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kinerja_guru`
--

DROP TABLE IF EXISTS `kinerja_guru`;
CREATE TABLE IF NOT EXISTS `kinerja_guru` (
  `id_kinerja` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `persen_NCF` float(3,1) DEFAULT NULL,
  `persen_NSF` float(3,1) DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_kinerja`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kinerja_guru`
--

INSERT INTO `kinerja_guru` (`id_kinerja`, `bulan`, `tahun`, `tgl_buat`, `persen_NCF`, `persen_NSF`, `status`) VALUES
(1, 1, 2021, '2021-09-10 04:06:36', 60.0, 40.0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` text NOT NULL,
  `bobot_kriteria` int(3) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`) VALUES
(1, 'Ketaqwaan', 25),
(2, 'Kejujuran', 15),
(3, 'Penguasaan Tugas', 15),
(4, 'Interaksi Sosial', 10),
(5, 'Kehadiran & Kerajinan', 15),
(6, 'Inisiatif', 10),
(7, 'Kepemimpinan', 10);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kinerja` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `peringkat` int(4) NOT NULL,
  `hasil_akhir` float(13,4) NOT NULL,
  PRIMARY KEY (`id_laporan`),
  KEY `id_laporan` (`id_laporan`,`id_guru`),
  KEY `id_kinerja` (`id_kinerja`),
  KEY `id_guru` (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_kinerja`, `id_guru`, `peringkat`, `hasil_akhir`) VALUES
(6, 1, 3, 1, 4.5925),
(7, 1, 2, 2, 4.4650),
(8, 1, 1, 3, 4.4000),
(9, 1, 5, 4, 4.3900),
(10, 1, 4, 5, 4.3625);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE IF NOT EXISTS `penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kinerja` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nilai` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kinerja` (`id_kinerja`),
  KEY `id_guru` (`id_guru`),
  KEY `id_sub` (`id_sub`)
) ENGINE=InnoDB AUTO_INCREMENT=456 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_kinerja`, `id_sub`, `id_guru`, `nilai`) VALUES
(1, 1, 1, 1, 5),
(2, 1, 2, 1, 5),
(3, 1, 3, 1, 5),
(4, 1, 4, 1, 5),
(5, 1, 5, 1, 4),
(6, 1, 6, 1, 4),
(7, 1, 7, 1, 5),
(8, 1, 8, 1, 5),
(9, 1, 9, 1, 5),
(10, 1, 10, 1, 5),
(11, 1, 11, 1, 5),
(12, 1, 12, 1, 5),
(13, 1, 13, 1, 5),
(14, 1, 14, 1, 3),
(15, 1, 15, 1, 5),
(16, 1, 16, 1, 5),
(17, 1, 17, 1, 5),
(18, 1, 18, 1, 5),
(19, 1, 19, 1, 5),
(20, 1, 20, 1, 3),
(21, 1, 21, 1, 4),
(22, 1, 22, 1, 4),
(23, 1, 23, 1, 4),
(24, 1, 24, 1, 5),
(25, 1, 25, 1, 5),
(26, 1, 26, 1, 5),
(27, 1, 27, 1, 5),
(28, 1, 28, 1, 5),
(29, 1, 29, 1, 4),
(30, 1, 30, 1, 5),
(31, 1, 31, 1, 4),
(32, 1, 32, 1, 5),
(33, 1, 33, 1, 5),
(34, 1, 34, 1, 5),
(35, 1, 35, 1, 5),
(36, 1, 1, 2, 4),
(37, 1, 2, 2, 4),
(38, 1, 3, 2, 5),
(39, 1, 4, 2, 4),
(40, 1, 5, 2, 5),
(41, 1, 6, 2, 5),
(42, 1, 7, 2, 4),
(43, 1, 8, 2, 5),
(44, 1, 9, 2, 5),
(45, 1, 10, 2, 4),
(46, 1, 11, 2, 5),
(47, 1, 12, 2, 4),
(48, 1, 13, 2, 4),
(49, 1, 14, 2, 4),
(50, 1, 15, 2, 5),
(51, 1, 16, 2, 4),
(52, 1, 17, 2, 5),
(53, 1, 18, 2, 5),
(54, 1, 19, 2, 3),
(55, 1, 20, 2, 5),
(56, 1, 21, 2, 5),
(57, 1, 22, 2, 4),
(58, 1, 23, 2, 5),
(59, 1, 24, 2, 5),
(60, 1, 25, 2, 3),
(61, 1, 26, 2, 5),
(62, 1, 27, 2, 4),
(63, 1, 28, 2, 5),
(64, 1, 29, 2, 3),
(65, 1, 30, 2, 4),
(66, 1, 31, 2, 4),
(67, 1, 32, 2, 4),
(68, 1, 33, 2, 4),
(69, 1, 34, 2, 5),
(70, 1, 35, 2, 3),
(106, 1, 1, 4, 5),
(107, 1, 2, 4, 4),
(108, 1, 3, 4, 5),
(109, 1, 4, 4, 4),
(110, 1, 5, 4, 5),
(111, 1, 6, 4, 4),
(112, 1, 7, 4, 5),
(113, 1, 8, 4, 5),
(114, 1, 9, 4, 5),
(115, 1, 10, 4, 4),
(116, 1, 11, 4, 5),
(117, 1, 12, 4, 5),
(118, 1, 13, 4, 5),
(119, 1, 14, 4, 4),
(120, 1, 15, 4, 5),
(121, 1, 16, 4, 4),
(122, 1, 17, 4, 5),
(123, 1, 18, 4, 4),
(124, 1, 19, 4, 5),
(125, 1, 20, 4, 3),
(126, 1, 21, 4, 4),
(127, 1, 22, 4, 4),
(128, 1, 23, 4, 5),
(129, 1, 24, 4, 5),
(130, 1, 25, 4, 5),
(131, 1, 26, 4, 4),
(132, 1, 27, 4, 5),
(133, 1, 28, 4, 4),
(134, 1, 29, 4, 4),
(135, 1, 30, 4, 5),
(136, 1, 31, 4, 5),
(137, 1, 32, 4, 4),
(138, 1, 33, 4, 5),
(139, 1, 34, 4, 3),
(140, 1, 35, 4, 5),
(316, 1, 1, 5, 4),
(317, 1, 2, 5, 4),
(318, 1, 3, 5, 4),
(319, 1, 4, 5, 4),
(320, 1, 5, 5, 4),
(321, 1, 6, 5, 5),
(322, 1, 7, 5, 5),
(323, 1, 8, 5, 5),
(324, 1, 9, 5, 5),
(325, 1, 10, 5, 1),
(326, 1, 11, 5, 5),
(327, 1, 12, 5, 4),
(328, 1, 13, 5, 5),
(329, 1, 14, 5, 5),
(330, 1, 15, 5, 5),
(331, 1, 16, 5, 5),
(332, 1, 17, 5, 4),
(333, 1, 18, 5, 5),
(334, 1, 19, 5, 5),
(335, 1, 20, 5, 5),
(336, 1, 21, 5, 4),
(337, 1, 22, 5, 3),
(338, 1, 23, 5, 4),
(339, 1, 24, 5, 5),
(340, 1, 25, 5, 5),
(341, 1, 26, 5, 5),
(342, 1, 27, 5, 4),
(343, 1, 28, 5, 4),
(344, 1, 29, 5, 3),
(345, 1, 30, 5, 5),
(346, 1, 31, 5, 4),
(347, 1, 32, 5, 4),
(348, 1, 33, 5, 5),
(349, 1, 34, 5, 4),
(350, 1, 35, 5, 5),
(421, 1, 1, 3, 5),
(422, 1, 2, 3, 4),
(423, 1, 3, 3, 5),
(424, 1, 4, 3, 4),
(425, 1, 5, 3, 5),
(426, 1, 6, 3, 5),
(427, 1, 7, 3, 5),
(428, 1, 8, 3, 5),
(429, 1, 9, 3, 4),
(430, 1, 10, 3, 4),
(431, 1, 11, 3, 5),
(432, 1, 12, 3, 5),
(433, 1, 13, 3, 4),
(434, 1, 14, 3, 5),
(435, 1, 15, 3, 4),
(436, 1, 16, 3, 4),
(437, 1, 17, 3, 4),
(438, 1, 18, 3, 4),
(439, 1, 19, 3, 5),
(440, 1, 20, 3, 5),
(441, 1, 21, 3, 4),
(442, 1, 22, 3, 4),
(443, 1, 23, 3, 5),
(444, 1, 24, 3, 4),
(445, 1, 25, 3, 5),
(446, 1, 26, 3, 4),
(447, 1, 27, 3, 4),
(448, 1, 28, 3, 4),
(449, 1, 29, 3, 4),
(450, 1, 30, 3, 5),
(451, 1, 31, 3, 4),
(452, 1, 32, 3, 5),
(453, 1, 33, 3, 4),
(454, 1, 34, 3, 5),
(455, 1, 35, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

DROP TABLE IF EXISTS `subkriteria`;
CREATE TABLE IF NOT EXISTS `subkriteria` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `nama_sub` text NOT NULL,
  `jenis` enum('Core Factor','Secondary Factor') NOT NULL,
  `nilai_standar` int(2) NOT NULL,
  PRIMARY KEY (`id_sub`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_sub`, `id_kriteria`, `nama_sub`, `jenis`, `nilai_standar`) VALUES
(1, 1, 'Mengigatkan / mengajak / membimbing murid untuk sholat berjamaah', 'Core Factor', 4),
(2, 1, 'Selalu membimbing Ikrar, Doa, dan Tadarus di sekolah', 'Core Factor', 5),
(3, 1, 'Tertib melaksanakan ibadah wajib', 'Core Factor', 5),
(4, 1, 'Tertib melaksanakan ibadah sunah', 'Core Factor', 4),
(5, 1, 'Selalu memberikan pesan pesan keagamaan', 'Secondary Factor', 4),
(6, 1, 'Tidak melakukan perbuatan tercela', 'Core Factor', 5),
(7, 1, 'Selalu menyalami murid dan memberi salam', 'Secondary Factor', 4),
(8, 1, 'Berperilaku sesuai dengan tuntunan agama islam', 'Core Factor', 5),
(9, 2, 'Berperilaku sesuai tutur kata', 'Secondary Factor', 4),
(10, 2, 'Tidak menggunakan fasilitas lembaga tanpa persetujuan dari yang berwenang', 'Core Factor', 5),
(11, 2, 'Tidak melakukan kecurangan atau pemalsuan', 'Core Factor', 5),
(12, 2, 'Tidak menyalahgunakan kedudukan atau wewenang', 'Core Factor', 5),
(13, 3, 'Menampilkan hasil kerja yng bermutu', 'Core Factor', 4),
(14, 3, 'Tepat waktu dalam menyelesaikan tugas dan perintah dinas', 'Core Factor', 5),
(15, 3, 'Teliti dan rapi dalam melaksanakan pekerjaan', 'Core Factor', 4),
(16, 3, 'Cekatan/terampil dalam melaksanakan tugas', 'Secondary Factor', 3),
(17, 3, 'Efektif dan efisien dalam melaksanakan pekerjaan', 'Secondary Factor', 3),
(18, 4, 'Mampu bekerja sama dengan orang lain dalam rangka bertugas', 'Core Factor', 4),
(19, 4, 'Santun, rendah hati dan ramah terhadap orang lain', 'Secondary Factor', 3),
(20, 4, 'Menghargai pendapat dan pandangan orang lain', 'Core Factor', 4),
(21, 5, 'Tidak pernah ijin', 'Secondary Factor', 3),
(22, 5, 'Tidak ijin karena sakit', 'Secondary Factor', 3),
(23, 5, 'Tidak mangkir kerja', 'Core Factor', 4),
(24, 5, 'Tidak datang terlambat', 'Core Factor', 4),
(25, 5, 'Tidak pulang cepat', 'Secondary Factor', 4),
(26, 5, 'Tidak meninggalkan pekerjaan', 'Core Factor', 5),
(27, 6, 'Berusaha mencari caraa yang efisien dalam melaksanakan tugas', 'Core Factor', 4),
(28, 6, 'Tidak menunggu perintah atasan dalam melaksanakan tugas', 'Secondary Factor', 3),
(29, 6, 'Mampu mengampil keputusan/tindakan dengan cepat dan tepat', 'Core Factor', 5),
(30, 6, 'Memberikan saran yang dipandang baik dan berguna bagi lembaga', 'Secondary Factor', 3),
(31, 7, 'Mampu membimbing orang lain', 'Core Factor', 3),
(32, 7, 'Bijak dalam mengambil keputusan/bertindak', 'Secondary Factor', 4),
(33, 7, 'Mampu memotivasi orang lain', 'Secondary Factor', 3),
(34, 7, 'Menerima keputusan bersama dengan penuh tanggung jawab', 'Core Factor', 4),
(35, 7, 'Memberikan keteladanan yang baik', 'Core Factor', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD CONSTRAINT `detail_laporan_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `akun` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_kinerja`) REFERENCES `kinerja_guru` (`id_kinerja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_kinerja`) REFERENCES `kinerja_guru` (`id_kinerja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_sub`) REFERENCES `subkriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
