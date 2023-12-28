-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 11:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_kita`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getKamar` (IN `kamar_id` INT)   BEGIN
    		SELECT * FROM Kamar WHERE ID_Kamar = kamar_id;
				END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `countKamar` () RETURNS INT(11)  BEGIN
    DECLARE total_kamar INT;
    SELECT COUNT(*) INTO total_kamar FROM Kamar;
    RETURN total_kamar;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `countPasien` () RETURNS INT(11)  BEGIN
    DECLARE total_pasien INT;
    SELECT COUNT(*) INTO total_pasien FROM Pasien;
    RETURN total_pasien;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` int(11) NOT NULL,
  `Nama_Admin` varchar(255) DEFAULT NULL,
  `Nomor_Telepon_Admin` varchar(15) DEFAULT NULL,
  `Jabatan_Admin` varchar(50) DEFAULT NULL,
  `Password_Admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Nama_Admin`, `Nomor_Telepon_Admin`, `Jabatan_Admin`, `Password_Admin`) VALUES
(0, 'admin', '082314471761', 'devloper', 'password123'),
(1, 'admin', '082314471761', 'devloper', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `ID_Diagnosa` int(11) NOT NULL,
  `ID_Pasien` int(11) DEFAULT NULL,
  `ID_Dokter` int(11) DEFAULT NULL,
  `Tanggal_Diagnosa` date DEFAULT NULL,
  `Catatan_Diagnosa` text DEFAULT NULL,
  `Status_Rawat` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `ID_Dokter` int(11) NOT NULL,
  `Nama_Dokter` varchar(255) DEFAULT NULL,
  `Bidang_Spesialisasi` varchar(255) DEFAULT NULL,
  `Nomor_Telepon_Dokter` varchar(15) DEFAULT NULL,
  `Jadwal_Praktek` varchar(255) DEFAULT NULL,
  `Spesialis` varchar(255) DEFAULT NULL,
  `Password_Dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `ID_Kamar` int(11) NOT NULL,
  `Nomor_Kamar` varchar(255) DEFAULT NULL,
  `Tipe_Kamar` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`ID_Kamar`, `Nomor_Kamar`, `Tipe_Kamar`, `Status`) VALUES
(5, '1', 'BPJS KELAS 1', 'Kosong'),
(6, '2', 'VVIP', 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `logs_dokter`
--

CREATE TABLE `logs_dokter` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `nama_dokter_lama` varchar(255) DEFAULT NULL,
  `nama_dokter_baru` varchar(255) DEFAULT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs_dokter`
--

INSERT INTO `logs_dokter` (`id`, `id_dokter`, `nama_dokter_lama`, `nama_dokter_baru`, `waktu_update`) VALUES
(1, 3, 'Roy', 'Jeffri Nichole', '2023-12-24 14:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `log_pasien`
--

CREATE TABLE `log_pasien` (
  `ID_Log` int(11) NOT NULL,
  `ID_Pasien` int(11) DEFAULT NULL,
  `Tanggal_Perubahan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Nama_Pasien_Sebelumnya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_pasien`
--

INSERT INTO `log_pasien` (`ID_Log`, `ID_Pasien`, `Tanggal_Perubahan`, `Nama_Pasien_Sebelumnya`) VALUES
(1, 1, '2023-12-27 01:37:42', 'roxy'),
(2, 7, '2023-12-27 03:20:33', 'ROY KOYOSHI');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `ID_Obat` int(11) NOT NULL,
  `Nama_Obat` varchar(255) DEFAULT NULL,
  `Harga_Obat_Per_Satuan` decimal(10,2) DEFAULT NULL,
  `Jumlah_Obat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `ID_Pasien` int(11) NOT NULL,
  `Nama_Pasien` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Belum Sembuh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`ID_Pasien`, `Nama_Pasien`, `Alamat`, `Status`) VALUES
(1, 'Robi', 'bekasi', 'Sembuh'),
(2, 'SUGRIWA', 'Buleleng', 'Sembuh'),
(3, 'SARIJEM', 'Buleleng', 'Sembuh'),
(4, 'sutejo', 'purwokerto', 'Belum Sembuh'),
(5, 'sarbini', 'jakarta', 'Belum Sembuh'),
(6, 'Romi', 'Jonggol', 'Perawatan Intensif');

--
-- Triggers `pasien`
--
DELIMITER $$
CREATE TRIGGER `update_pasien` BEFORE UPDATE ON `pasien` FOR EACH ROW BEGIN
    INSERT INTO log_pasien (ID_Pasien, Tanggal_Perubahan, Nama_Pasien_Sebelumnya)
    VALUES (OLD.ID_Pasien, NOW(), OLD.Nama_Pasien);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_Pembayaran` int(11) NOT NULL,
  `ID_Pasien` int(11) DEFAULT NULL,
  `Total_Biaya` decimal(10,2) DEFAULT NULL,
  `Tanggal_Pembayaran` date DEFAULT NULL,
  `Metode_Pembayaran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_Pengguna` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Kata_Sandi` varchar(255) NOT NULL,
  `Role` enum('Admin','Dokter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_Pengguna`, `Username`, `Kata_Sandi`, `Role`) VALUES
(2, 'Rico', 'password123', 'Dokter'),
(3, 'Jeffri Nichole', 'password123', 'Dokter'),
(4, 'Rico', 'password123', 'Dokter'),
(8, 'admin', 'password123', 'Admin'),
(9, 'admin', 'password123', 'Admin'),
(11, 'rofi', 'rofi232', 'Dokter'),
(12, 'kontol', 'asuu', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `ID_Rawat_Inap` int(11) NOT NULL,
  `ID_Pasien` int(11) DEFAULT NULL,
  `ID_Kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `ID_Resep_Obat` int(11) NOT NULL,
  `ID_Diagnosa` int(11) DEFAULT NULL,
  `ID_Obat` int(11) DEFAULT NULL,
  `Jumlah_Obat_Diresepkan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`ID_Diagnosa`),
  ADD KEY `ID_Pasien` (`ID_Pasien`),
  ADD KEY `ID_Dokter` (`ID_Dokter`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID_Dokter`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`ID_Kamar`),
  ADD UNIQUE KEY `Nomor_Kamar` (`Nomor_Kamar`);

--
-- Indexes for table `logs_dokter`
--
ALTER TABLE `logs_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_pasien`
--
ALTER TABLE `log_pasien`
  ADD PRIMARY KEY (`ID_Log`),
  ADD KEY `ID_Pasien` (`ID_Pasien`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`ID_Obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_Pasien`),
  ADD KEY `index_Nama_Pasien` (`Nama_Pasien`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_Pembayaran`),
  ADD KEY `ID_Pasien` (`ID_Pasien`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_Pengguna`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`ID_Rawat_Inap`),
  ADD KEY `ID_Pasien` (`ID_Pasien`),
  ADD KEY `ID_Kamar` (`ID_Kamar`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`ID_Resep_Obat`),
  ADD KEY `ID_Diagnosa` (`ID_Diagnosa`),
  ADD KEY `ID_Obat` (`ID_Obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `ID_Kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs_dokter`
--
ALTER TABLE `logs_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_pasien`
--
ALTER TABLE `log_pasien`
  MODIFY `ID_Log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `ID_Pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID_Pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `ID_Rawat_Inap` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD CONSTRAINT `diagnosa_ibfk_1` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID_Pasien`),
  ADD CONSTRAINT `diagnosa_ibfk_2` FOREIGN KEY (`ID_Dokter`) REFERENCES `dokter` (`ID_Dokter`);

--
-- Constraints for table `log_pasien`
--
ALTER TABLE `log_pasien`
  ADD CONSTRAINT `log_pasien_ibfk_1` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID_Pasien`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID_Pasien`);

--
-- Constraints for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD CONSTRAINT `rawat_inap_ibfk_1` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID_Pasien`),
  ADD CONSTRAINT `rawat_inap_ibfk_2` FOREIGN KEY (`ID_Kamar`) REFERENCES `kamar` (`ID_Kamar`);

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `resep_obat_ibfk_1` FOREIGN KEY (`ID_Diagnosa`) REFERENCES `diagnosa` (`ID_Diagnosa`),
  ADD CONSTRAINT `resep_obat_ibfk_2` FOREIGN KEY (`ID_Obat`) REFERENCES `obat` (`ID_Obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
