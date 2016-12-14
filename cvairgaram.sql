-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2016 at 12:18 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cvairgaram`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `isi_barang` int(10) DEFAULT NULL,
  `hpp` int(10) DEFAULT '0',
  `harga_agen` int(10) DEFAULT '0',
  `harga_kanvas` int(10) DEFAULT '0',
  `harga_konsumen` int(10) DEFAULT '0',
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `jenis_barang`, `isi_barang`, `hpp`, `harga_agen`, `harga_kanvas`, `harga_konsumen`) VALUES
(2, 'APL-MIXED ', 'APILO 2 IN 1 MIXED 6', 'Biskuit', 6, 5000, 6000, 7000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
  `id_gudang` int(10) NOT NULL AUTO_INCREMENT,
  `nama_gudang` varchar(20) NOT NULL,
  `nama_kantor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gudang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama_gudang`, `nama_kantor`) VALUES
(1, 'Gudang Baik', 'Lebong'),
(2, 'Gudang Rusak', 'Lebong'),
(3, 'Gudang Sample', 'Lebong');

-- --------------------------------------------------------

--
-- Table structure for table `kantor`
--

CREATE TABLE IF NOT EXISTS `kantor` (
  `id_kantor` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kantor` varchar(10) DEFAULT NULL,
  `nama_kantor` varchar(50) NOT NULL,
  `alamat_kantor` text NOT NULL,
  `telpon_kantor` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kantor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kantor`
--

INSERT INTO `kantor` (`id_kantor`, `kode_kantor`, `nama_kantor`, `alamat_kantor`, `telpon_kantor`) VALUES
(1, NULL, 'Bengkulu', 'Jl. Raya Bengkulu No.1', '0721-1111-111'),
(2, NULL, 'Curup', 'Jl. Raya Curup', '0721-6655-965'),
(6, NULL, 'Lebong', 'Jl. Lebong', '0721-2222-22');

--
-- Triggers `kantor`
--
DROP TRIGGER IF EXISTS `tambah_gudang`;
DELIMITER //
CREATE TRIGGER `tambah_gudang` AFTER INSERT ON `kantor`
 FOR EACH ROW INSERT INTO gudang (nama_gudang,nama_kantor) VALUES ('Gudang Baik',new.nama_kantor),('Gudang Rusak',new.nama_kantor),('Gudang Sample',new.nama_kantor)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_kantor` int(10) NOT NULL,
  `telpon_karyawan` varchar(15) DEFAULT NULL,
  `status_karyawan` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `id_kantor` (`id_kantor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_karyawan`, `tgl_lahir`, `alamat_karyawan`, `tgl_masuk`, `jabatan`, `id_kantor`, `telpon_karyawan`, `status_karyawan`) VALUES
('010280', 'Fransiscus', '2003-01-09', 'Jl. Perum Bukit Kemiling Permai', '2016-02-03', 'Supervisor Admin', 1, '0821-2154-3654', 'Aktif'),
('010282', 'Putra', '1995-02-01', 'Jl. Darusalam', '2016-12-01', 'Admin', 1, '0721-6655-965', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_kendaraan` int(10) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(10) DEFAULT NULL,
  `nama_kendaraan` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(10) NOT NULL,
  `pengguna_kendaraan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kendaraan`),
  KEY `id_karyawan` (`pengguna_kendaraan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `no_polisi`, `nama_kendaraan`, `jenis_kendaraan`, `pengguna_kendaraan`) VALUES
(1, 'BD 1234 AB', 'GRAND MAX D', 'Mobil', '010280');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen_agen`
--

CREATE TABLE IF NOT EXISTS `konsumen_agen` (
  `id_agen` int(10) NOT NULL AUTO_INCREMENT,
  `kode_agen` varchar(10) DEFAULT NULL,
  `nama_agen` varchar(50) NOT NULL,
  `pemilik_agen` varchar(50) NOT NULL,
  `alamat_agen` text NOT NULL,
  `kel_desa_agen` varchar(30) DEFAULT NULL,
  `kecamatan_agen` varchar(30) DEFAULT NULL,
  `kab_kota_agen` varchar(30) DEFAULT NULL,
  `provinsi_agen` varchar(30) DEFAULT NULL,
  `wilayah_agen` varchar(100) DEFAULT NULL,
  `telpon_agen` varchar(15) DEFAULT NULL,
  `limit_agen` int(11) DEFAULT '0',
  `tempo_agen` int(11) DEFAULT '0',
  `status_agen` enum('Aktif','Tidak Aktif') NOT NULL,
  `salesman_agen` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_agen`),
  KEY `salesman_agen` (`salesman_agen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `konsumen_agen`
--

INSERT INTO `konsumen_agen` (`id_agen`, `kode_agen`, `nama_agen`, `pemilik_agen`, `alamat_agen`, `kel_desa_agen`, `kecamatan_agen`, `kab_kota_agen`, `provinsi_agen`, `wilayah_agen`, `telpon_agen`, `limit_agen`, `tempo_agen`, `status_agen`, `salesman_agen`) VALUES
(1, 'AG1234', 'Yen-yen B', 'Yen-yen', 'Bengkulu', NULL, NULL, NULL, NULL, 'AG1234', '0721-6655-965', 100000000, 30, 'Aktif', '010280');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen_kanvas`
--

CREATE TABLE IF NOT EXISTS `konsumen_kanvas` (
  `id_kanvas` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kanvas` varchar(10) DEFAULT NULL,
  `nama_kanvas` varchar(50) NOT NULL,
  `pemilik_kanvas` varchar(50) NOT NULL,
  `alamat_kanvas` text NOT NULL,
  `kel_desa_kanvas` varchar(30) DEFAULT NULL,
  `kecamatan_kanvas` varchar(30) DEFAULT NULL,
  `kab_kota_kanvas` varchar(30) DEFAULT NULL,
  `provinsi_kanvas` varchar(30) DEFAULT NULL,
  `wilayah_kanvas` varchar(100) DEFAULT NULL,
  `telpon_kanvas` varchar(15) DEFAULT NULL,
  `status_kanvas` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `salesman_kanvas` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kanvas`),
  KEY `salesman_kanvas` (`salesman_kanvas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `konsumen_kanvas`
--

INSERT INTO `konsumen_kanvas` (`id_kanvas`, `kode_kanvas`, `nama_kanvas`, `pemilik_kanvas`, `alamat_kanvas`, `kel_desa_kanvas`, `kecamatan_kanvas`, `kab_kota_kanvas`, `provinsi_kanvas`, `wilayah_kanvas`, `telpon_kanvas`, `status_kanvas`, `salesman_kanvas`) VALUES
(1, 'KVS-001', 'Maju Jaya', 'Robert', 'Bengkulu', NULL, NULL, NULL, NULL, 'Bengkulu Kota', '0721-6655-965', 'Aktif', '010282');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` int(10) NOT NULL AUTO_INCREMENT,
  `kode_suplier` varchar(10) DEFAULT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `alamat_suplier` text NOT NULL,
  `telpon_suplier` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `kode_suplier`, `nama_suplier`, `alamat_suplier`, `telpon_suplier`) VALUES
(1, NULL, 'PT. REKSA AKADAMI', 'BENGKULU', '0736-2222-22'),
(2, NULL, 'PT. JAYA ABADI', 'SEMARANG', '022-0550-66'),
(3, NULL, 'PT. MANDAI', 'BANDUNG', '023-2222-22'),
(4, NULL, 'PT. KAYA RAYA', 'LAMPUNG', '0721-1111-11'),
(5, NULL, 'PT. ABCD', 'YOGYAKARTA', '0725-666-66'),
(6, NULL, 'PT. MAKMUR', 'JAKARTA', '0721-6655-965'),
(7, NULL, 'PT. COKRO', 'SEMARANG', '022-5245-54'),
(8, NULL, 'PT. MAHMUD', 'CIREBON', '024-568-544'),
(12, NULL, 'PT. MARKA', 'SURABAYA', '0258-3256-5245'),
(13, NULL, 'PT. MHN', 'SURABAYA', '0754-254-554'),
(14, NULL, 'PT. JAYA RAYA', 'MAGELANG', '0248-2546-2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status_user` enum('Aktif','Tidak Aktif') NOT NULL,
  `nik` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `status_user`, `nik`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Aktif', NULL, NULL),
('gudang', '202446dd1d6028084426867365b0c7a1', 'Admin', 'Aktif', '', ''),
('operasional', 'b4cbe3c449fc7bbc244722429f9cbec3', 'Admin', 'Aktif', '', ''),
('penjualan', '13bf2c8effae21d17a277520aa9b9277', 'Admin', 'Aktif', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_kantor`) REFERENCES `kantor` (`id_kantor`);

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`pengguna_kendaraan`) REFERENCES `karyawan` (`nik`);

--
-- Constraints for table `konsumen_agen`
--
ALTER TABLE `konsumen_agen`
  ADD CONSTRAINT `konsumen_agen_ibfk_1` FOREIGN KEY (`salesman_agen`) REFERENCES `karyawan` (`nik`);

--
-- Constraints for table `konsumen_kanvas`
--
ALTER TABLE `konsumen_kanvas`
  ADD CONSTRAINT `konsumen_kanvas_ibfk_1` FOREIGN KEY (`salesman_kanvas`) REFERENCES `karyawan` (`nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
