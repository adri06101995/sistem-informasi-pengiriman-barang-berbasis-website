-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 12:43 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qualita`
--
CREATE DATABASE IF NOT EXISTS `qualita` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `qualita`;

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE IF NOT EXISTS `costumer` (
  `id_costumer` varchar(5) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `tanggal_terdaftar` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `nama_perusahaan` text NOT NULL,
  PRIMARY KEY (`id_costumer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `nama_lengkap`, `tanggal_terdaftar`, `alamat`, `no_hp`, `nama_perusahaan`) VALUES
('IC001', 'jamal adriyanto', '12-Apr-2019', 'abepura kota', '085244642030', 'PT. malas bangun pagi'),
('IC002', 'adriyanto', '12-Apr-2019', 'Jayapura', '0867232', 'PT. Semen Tiga Serangkai'),
('IC003', 'cristian rajasinga', '26-Apr-2019', 'abepura pantai', '08888888', 'PT cheater KIng'),
('IC004', 'petrus ken', '23-Mar-2020', 'jalan goa', '0854672347', 'perusahaan belum jadi');

-- --------------------------------------------------------

--
-- Table structure for table `kd_pengiriman`
--

CREATE TABLE IF NOT EXISTS `kd_pengiriman` (
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kd_pengiriman`
--

INSERT INTO `kd_pengiriman` (`kode`) VALUES
(''),
('KP001'),
('KP002'),
('KP003'),
('KP004'),
('KP005'),
('KP006'),
('KP007'),
('KP008'),
('KP009'),
('KP010'),
('KP011'),
('KP012'),
('KP013'),
('KP014'),
('KP015'),
('KP016'),
('KP017'),
('KP018');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` varchar(5) NOT NULL,
  `jenis_barang` text NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `jenis_barang`) VALUES
('BR001', 'barang haram jahanam'),
('BR003', 'barang halal'),
('BR004', 'Barang Haram Import'),
('BR005', 'BBM'),
('BR006', 'bahan makanan 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nabar`
--

CREATE TABLE IF NOT EXISTS `tb_nabar` (
  `id_nabar` varchar(5) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` text NOT NULL,
  PRIMARY KEY (`id_nabar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nabar`
--

INSERT INTO `tb_nabar` (`id_nabar`, `id_barang`, `nama_barang`) VALUES
('NB001', 'BR005', 'Bensin'),
('NB002', 'BR003', 'rokok'),
('NB003', 'BR005', 'Solar'),
('NB004', 'BR005', 'Premium'),
('NB005', 'BR006', 'indomie');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE IF NOT EXISTS `tb_pengiriman` (
  `id_pengiriman` varchar(5) NOT NULL,
  `id_costumer` varchar(5) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `id_nabar` varchar(5) NOT NULL,
  `pcs` int(20) NOT NULL,
  `berat` int(20) NOT NULL,
  `bertotal` int(20) NOT NULL,
  `tanggal_kirim` text NOT NULL,
  `kode` varchar(5) NOT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id_pengiriman`, `id_costumer`, `id_barang`, `id_nabar`, `pcs`, `berat`, `bertotal`, `tanggal_kirim`, `kode`) VALUES
('Id001', 'IC001', 'BR003', 'NB002', 12, 32, 384, '15-May-2019', 'KP011'),
('Id002', 'IC001', 'BR005', 'NB004', 12, 32, 384, '15-May-2019', 'KP011'),
('Id003', 'IC001', 'BR005', 'NB001', 12, 21, 252, '15-May-2019', 'KP012'),
('Id004', 'IC002', 'BR005', 'NB003', 12, 32, 384, '15-May-2019', 'KP013'),
('Id005', 'IC002', 'BR005', 'NB004', 32, 12, 384, '15-May-2019', 'KP013'),
('Id006', 'IC003', 'BR005', 'NB004', 12, 32, 384, '15-May-2019', 'KP014'),
('Id007', 'IC003', 'BR005', 'NB001', 12, 32, 384, '15-May-2019', 'KP014'),
('Id008', 'IC003', 'BR005', 'NB003', 43, 56, 2408, '15-May-2019', 'KP014'),
('Id009', 'IC001', 'BR005', 'NB003', 2, 44, 88, '15-May-2019', 'KP014'),
('Id010', 'IC001', 'BR005', 'NB001', 12, 34, 408, '15-May-2019', 'KP015'),
('Id011', 'IC002', 'BR005', 'NB003', 12, 32, 384, '15-May-2019', 'KP015'),
('Id012', 'IC001', 'BR003', 'NB002', 12, 34, 408, '15-May-2019', 'KP016'),
('Id013', 'IC001', 'BR005', 'NB001', 12, 23, 276, '15-May-2019', 'KP017'),
('Id014', 'IC001', 'BR003', 'NB002', 0, 0, 0, '20-May-2019', 'KP018'),
('Id015', 'IC001', 'BR003', 'NB002', 0, 0, 0, '20-May-2019', 'KP018'),
('Id016', 'IC001', 'BR005', 'NB001', 2, 40, 80, '12-Jun-2019', 'KP018'),
('Id017', 'IC001', 'BR005', 'NB004', 4, 60, 240, '14-Jun-2019', 'KP018'),
('Id018', 'IC003', 'BR005', 'NB001', 20, 10, 200, '15-Jun-2019', 'KP019'),
('Id019', 'IC004', 'BR006', 'NB005', 2, 20, 40, '23-Mar-2020', 'KP019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(5) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`, `foto`) VALUES
('Id001', 'jamal adriyanto', 'adriyanto', '1234', 'Kepala', '5cb03f11b2625.jpg'),
('Id002', 'adminz', 'admin', 'admin', 'Admin', '5cb0b3b317fe5.jpg'),
('Id003', 'kepala gudang', 'kepala', 'kepala', 'Kepala', '5cb5f5fe89165.jpg'),
('Id004', 'petrus ken', 'petrus', 'petrus', 'Admin', '5e788c44660b7.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
