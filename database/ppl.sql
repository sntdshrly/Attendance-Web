-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2022 at 02:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendancedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `asisten`
--

CREATE TABLE `asisten` (
  `nrp` varchar(7) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asisten`
--

INSERT INTO `asisten` (`nrp`, `nama_mahasiswa`) VALUES
('2072100', 'Asep'),
('2072101', 'Ujang'),
('2072102', 'Lesti'),
('2072103', 'Rizki'),
('2072104', 'Reyhan');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `pertemuan_ke` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `jumlah_mahasiswa` int(11) DEFAULT NULL,
  `materi` varchar(100) DEFAULT NULL,
  `keterangan` varchar(300) DEFAULT NULL,
  `dibantu_asisten` int(11) DEFAULT NULL,
  `bukti` varchar(45) DEFAULT NULL,
  `jadwal_kelas_jadwal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` varchar(16) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama_dosen`, `email`, `password`) VALUES
('', '', NULL, NULL),
('72001', 'Adelia, S.Kom., M.T.', 'adelia@it.maranatha.edu', NULL),
('72002', 'Andreas Widjaja, S.Si., M.Sc., Ph.D.', 'andreas.widjaja@it.maranatha.edu', NULL),
('72003', 'Dr. Bernard Renaldy Suteja, S.Kom., M.Kom.', 'bernard.rs@it.maranatha.edu', NULL),
('72004', 'Daniel Jahja Surjawan, S.Kom., M.T.', 'daniel.js@it.maranatha.edu', NULL),
('72005', 'Diana Trivena Yulianti, S.Kom., M.T.', 'diana.trivena@it.maranatha.edu', NULL),
('72006', 'Djoni Setiawan Kartawihardja, S.T., M.T.', 'djoni.setiawan@it.maranatha.edu', NULL),
('72007', 'Doro Edi, S.T., M.Kom.', 'doro.edi@it.maranatha.edu', NULL),
('72008', 'Erico Darmawan Handoyo, S.Kom., M.T.', 'erico.dh@it.maranatha.edu', NULL),
('72009', 'Dr. Hapnes Toba, M.Sc.', 'hapnestoba@it.maranatha.edu', NULL),
('72010', 'Hendra Bunyamin, S.Si., M.T.', 'hendra.bunyamin@it.maranatha.edu', NULL),
('72011', 'Julianti Kasih, S.E., M.Kom.', 'julianti.kasih@it.maranatha.edu', NULL),
('72012', 'Maresha Caroline Wijanto, S.Kom., M.T.', 'maresha.cw@it.maranatha.edu', NULL),
('72013', 'Meliana Christianti Johan, S.Kom., M.T.', 'meliana.christianti@it.maranatha.edu', NULL),
('72014', 'Dr. Ir. Mewati Ayub, M.T.', 'mewati.ayub@it.maranatha.edu', NULL),
('72015', 'Niko Ibrahim, S.Kom., M.I.T.', 'niko.ibrahim@it.maranatha.edu', NULL),
('72016', 'Oscar Karnalim, S.T., M.T.', 'oscar.karnalim@it.maranatha.edu', NULL),
('72017', 'Radiant Victor Imbar, S.Kom., M.T.', 'radiant.vi@it.maranatha.edu', NULL),
('72018', 'Risal, S.T., M.T.', 'risal@it.maranatha.edu', NULL),
('72019', 'Robby Tan, S.T., M.Kom.', 'robby.tan@it.maranatha.edu', NULL),
('72020', 'Sendy Ferdian, S.Kom., M.T.', 'sendy.fs@it.maranatha.edu', NULL),
('72021', 'Setia Budi, S.Kom., M.Comp., Ph.D.', 'setia.budi@it.maranatha.edu', NULL),
('72022', 'Sulaeman Santoso, S.Kom., M.T.', 'sulaeman.santoso@it.maranatha.edu', NULL),
('72023', 'Ir. Teddy Marcus Zakaria, M.T.', 'teddy.marcus@it.maranatha.edu', NULL),
('72024', 'Timotius Witono, S.Kom., M.T.', 'timotius.witono@it.maranatha.edu', NULL),
('72025', 'Tiur Gantini, S.T., M.T.', 'tiur.gantini@it.maranatha.edu', NULL),
('72026', 'Tjatur Kandaga, S.Si., M.T.', 'tjatur.kandaga@it.maranatha.edu', NULL),
('72027', 'Wenny Franciska Senjaya, S.Kom., M.T.', 'wenny.fs@it.maranatha.edu', NULL),
('72028', 'Yenni Merlin Djajalaksana, Ph.D.', 'yenni.md@it.maranatha.edu', NULL),
('72029', 'Rossevine Artha Nathasya, S.Kom.', 'rossevine.an@it.maranatha.edu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kelas_jadwal` varchar(10) NOT NULL,
  `hari_jadwal` varchar(20) DEFAULT NULL,
  `waktu_mulai_jadwal` datetime DEFAULT NULL,
  `jumlah_sks_jadwal` int(11) DEFAULT NULL,
  `matkul_kode_mk` varchar(5) NOT NULL,
  `dosen_nik` varchar(16) NOT NULL,
  `semester_id_semester` int(11) NOT NULL,
  `ruangan_id_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_has_asisten`
--

CREATE TABLE `jadwal_has_asisten` (
  `jadwal_kelas_jadwal` varchar(10) NOT NULL,
  `asisten_nrp` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kode_mk` varchar(5) NOT NULL,
  `nama_mk` varchar(300) NOT NULL,
  `prodi_id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kode_mk`, `nama_mk`, `prodi_id_prodi`) VALUES
('IN250', 'Manajemen Proyek', 72),
('IN252', 'Desain Antarmuka', 72),
('IN253', 'Grafika Komputer', 72),
('IN254', 'Proyek Perangkat Lunak', 72),
('IN255', 'Proses Bisnis', 72),
('IN262', 'Pemrograman Mobile', 72),
('IN285', 'Pemrograman Multi-Platform', 72);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `tingkatan_prodi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `tingkatan_prodi`) VALUES
(71, 'Magister Ilmu Komputer', 'S2'),
(72, 'Teknik Informatika', 'S1'),
(73, 'Sistem Informasi', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'Lab Adv 1'),
(2, 'Lab Adv 3');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `nama_semester` varchar(45) NOT NULL,
  `tahun_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `nama_semester`, `tahun_semester`) VALUES
(1, 'Regular Ganjil', 2022),
(2, 'Regular Genap', 2022),
(3, 'Antara', 2023);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asisten`
--
ALTER TABLE `asisten`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD KEY `fk_detail_jadwal1_idx` (`jadwal_kelas_jadwal`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kelas_jadwal`),
  ADD KEY `fk_jadwal_matkul1_idx` (`matkul_kode_mk`),
  ADD KEY `fk_jadwal_dosen1_idx` (`dosen_nik`),
  ADD KEY `fk_jadwal_semester1_idx` (`semester_id_semester`),
  ADD KEY `fk_jadwal_ruangan1_idx` (`ruangan_id_ruangan`);

--
-- Indexes for table `jadwal_has_asisten`
--
ALTER TABLE `jadwal_has_asisten`
  ADD PRIMARY KEY (`jadwal_kelas_jadwal`,`asisten_nrp`),
  ADD KEY `fk_jadwal_has_asisten_asisten1_idx` (`asisten_nrp`),
  ADD KEY `fk_jadwal_has_asisten_jadwal1_idx` (`jadwal_kelas_jadwal`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `fk_matkul_prodi1_idx` (`prodi_id_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `fk_detail_jadwal1` FOREIGN KEY (`jadwal_kelas_jadwal`) REFERENCES `jadwal` (`kelas_jadwal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_dosen1` FOREIGN KEY (`dosen_nik`) REFERENCES `dosen` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_matkul1` FOREIGN KEY (`matkul_kode_mk`) REFERENCES `matkul` (`kode_mk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_ruangan1` FOREIGN KEY (`ruangan_id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_semester1` FOREIGN KEY (`semester_id_semester`) REFERENCES `semester` (`id_semester`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jadwal_has_asisten`
--
ALTER TABLE `jadwal_has_asisten`
  ADD CONSTRAINT `fk_jadwal_has_asisten_asisten1` FOREIGN KEY (`asisten_nrp`) REFERENCES `asisten` (`nrp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_has_asisten_jadwal1` FOREIGN KEY (`jadwal_kelas_jadwal`) REFERENCES `jadwal` (`kelas_jadwal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `fk_matkul_prodi1` FOREIGN KEY (`prodi_id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
