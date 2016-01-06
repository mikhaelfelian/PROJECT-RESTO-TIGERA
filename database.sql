-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2016 at 08:07 
-- Server version: 5.5.31
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_resto`
--
CREATE DATABASE IF NOT EXISTS `db_resto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_resto`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(160) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`, `ket`) VALUES
(1, 'Minuman', ''),
(2, 'Makanan', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meja`
--

CREATE TABLE IF NOT EXISTS `tbl_meja` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `no_meja` varchar(10) NOT NULL,
  `foto` varchar(56) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_meja`
--

INSERT INTO `tbl_meja` (`id`, `no_meja`, `foto`, `status`) VALUES
(1, 'Meja 1', 'meja1.jpg', 0),
(2, 'Meja 2', 'meja2.jpg', 0),
(3, 'Meja 3', 'meja3.jpg', 0),
(4, 'Meja 4', 'meja4.jpg', 0),
(5, 'Meja 5', 'meja5.jpg', 0),
(6, 'Meja 6', 'meja6.jpg', 0),
(7, 'Meja 7', 'meja7.jpg', 0),
(8, 'Meja 8', 'meja8.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `kode` varchar(160) NOT NULL,
  `menu` text NOT NULL,
  `harga` int(11) NOT NULL,
  `ket` text NOT NULL,
  `file` varchar(1024) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `id_kategori`, `kode`, `menu`, `harga`, `ket`, `file`) VALUES
(2, 1, '001', 'Blue Berry Eve', 15000, 'Blueberry Mix', 'blueberry_eve.jpg'),
(3, 2, '002', 'Nasi Rendang', 25000, '-', 'nasi_rendang.jpg'),
(4, 2, '003', 'Beef Blackpepper Rice', 55000, 'Enak kali kau', 'menu_beef_blackpepper_rice.jpg'),
(5, 1, '004', 'Angels in Sangria', 95000, 'Mabuk kau', 'menu_angels_in_sangria.jpg'),
(6, 2, '005', 'Duck Leg Confit', 56500, 'Paha Bebek dengan kombinasi', 'menu_duck_leg_confit.jpg'),
(7, 1, '006', 'Frozen Hazelnut', 45000, 'Hazelnut', 'menu_frozen_hazelnut.jpg'),
(8, 1, '007', 'Java Kiss Martini', 75500, 'Java Martini', 'menu_java_kiss_martini.jpg'),
(9, 2, '008', 'Pad Kra Pao Bai', 85000, '-', 'menu_pad_kra_pao_bai.jpg'),
(10, 1, '009', 'Poison Ivy', 95000, 'Alcohol', 'menu_poison_ivy.jpg'),
(11, 1, '010', 'Smoke Gentlement', 105000, 'Your Gentle', 'menu_smoke_gentlement.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderlist`
--

CREATE TABLE IF NOT EXISTS `tbl_orderlist` (
  `no_nota` varchar(160) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nama` varchar(360) NOT NULL,
  `jml_bayar` int(15) NOT NULL,
  `jml_ppn` int(15) NOT NULL,
  `jml_gtotal` int(15) NOT NULL,
  `tot_bayar` int(15) NOT NULL,
  `tot_kembali` int(15) NOT NULL,
  `pelayan` varchar(160) NOT NULL,
  `status_order` enum('complete','confirm','batal') NOT NULL,
  `status_payment` enum('unpaid','paid') NOT NULL,
  `status_resto` enum('1','2') NOT NULL,
  `status_meja` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`no_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orderlist`
--

INSERT INTO `tbl_orderlist` (`no_nota`, `no_meja`, `tgl`, `tgl_update`, `nama`, `jml_bayar`, `jml_ppn`, `jml_gtotal`, `tot_bayar`, `tot_kembali`, `pelayan`, `status_order`, `status_payment`, `status_resto`, `status_meja`) VALUES
('RESTO.INV.00001', 2, '2015-12-28 16:17:37', '2015-12-28 10:17:37', 'Umum', 180500, 18050, 198550, 200000, 1450, '-', 'complete', 'paid', '1', 'inactive'),
('RESTO.INV.00002', 1, '2015-12-28 16:18:09', '2015-12-28 10:18:09', 'Umum', 120000, 12000, 132000, 150000, 18000, '-', 'complete', 'paid', '1', 'inactive'),
('RESTO.INV.00003', 2, '2016-01-03 06:52:37', '2016-01-03 00:52:37', 'Umum', 90500, 9050, 99550, 100000, 450, '-', 'complete', 'paid', '1', 'inactive'),
('RESTO.INV.00004', 1, '2016-01-03 03:41:50', '2016-01-02 21:41:50', 'Umum', 652000, 65200, 717200, 750000, 32800, '-', 'complete', 'paid', '1', 'inactive'),
('RESTO.INV.00005', 1, '2016-01-03 06:50:27', '2016-01-03 00:50:27', 'Umum', 360500, 36050, 396550, 400000, 3450, '-', 'complete', 'paid', '1', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderlist_det`
--

CREATE TABLE IF NOT EXISTS `tbl_orderlist_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_meja` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `no_nota` varchar(160) NOT NULL,
  `menu` varchar(360) NOT NULL,
  `keterangan` varchar(120) NOT NULL,
  `tambahan` int(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_orderlist_det`
--

INSERT INTO `tbl_orderlist_det` (`id`, `tgl`, `id_meja`, `id_menu`, `no_nota`, `menu`, `keterangan`, `tambahan`, `harga`, `jml`, `subtotal`) VALUES
(1, '2015-12-28 09:26:11', 2, 11, 'RESTO.INV.00001', 'Smoke Gentlement', '', 0, 105000, 1, 105000),
(2, '2015-12-28 09:26:11', 2, 8, 'RESTO.INV.00001', 'Java Kiss Martini', '', 0, 75500, 1, 75500),
(3, '2015-12-28 10:08:52', 1, 3, 'RESTO.INV.00002', 'Nasi Rendang', 'Tambahan Kerupuk', 4000, 25000, 1, 25000),
(4, '2015-12-28 10:08:52', 1, 5, 'RESTO.INV.00002', 'Angels in Sangria', '-', 0, 95000, 1, 95000),
(5, '2016-01-02 05:07:42', 2, 2, 'RESTO.INV.00003', 'Blue Berry Eve', '', 1500, 15000, 1, 15000),
(6, '2016-01-02 05:07:42', 2, 8, 'RESTO.INV.00003', 'Java Kiss Martini', '', 0, 75500, 1, 75500),
(7, '2016-01-02 05:18:48', 6, 2, 'RESTO.INV.00004', 'Blue Berry Eve', '', 0, 15000, 1, 15000),
(8, '2016-01-02 05:18:48', 6, 3, 'RESTO.INV.00004', 'Nasi Rendang', '', 0, 25000, 1, 25000),
(9, '2016-01-02 05:18:48', 6, 10, 'RESTO.INV.00004', 'Poison Ivy', '', 0, 95000, 1, 95000),
(10, '2016-01-02 05:18:48', 6, 9, 'RESTO.INV.00004', 'Pad Kra Pao Bai', '', 0, 85000, 1, 85000),
(11, '2016-01-02 05:18:48', 6, 8, 'RESTO.INV.00004', 'Java Kiss Martini', '', 0, 75500, 1, 75500),
(12, '2016-01-02 05:18:48', 6, 11, 'RESTO.INV.00004', 'Smoke Gentlement', '', 0, 105000, 5, 525000),
(13, '2016-01-02 06:04:17', 1, 11, 'RESTO.INV.00004', 'Smoke Gentlement', '', 0, 105000, 1, 105000),
(14, '2016-01-02 06:04:17', 1, 10, 'RESTO.INV.00004', 'Poison Ivy', '', 0, 95000, 1, 95000),
(15, '2016-01-02 06:04:18', 1, 9, 'RESTO.INV.00004', 'Pad Kra Pao Bai', '', 0, 85000, 1, 85000),
(16, '2016-01-02 06:04:18', 1, 8, 'RESTO.INV.00004', 'Java Kiss Martini', '', 0, 75500, 1, 75500),
(17, '2016-01-02 06:04:18', 1, 7, 'RESTO.INV.00004', 'Frozen Hazelnut', '', 0, 45000, 1, 45000),
(18, '2016-01-02 06:04:18', 1, 6, 'RESTO.INV.00004', 'Duck Leg Confit', '', 0, 56500, 1, 56500),
(19, '2016-01-02 06:04:18', 1, 5, 'RESTO.INV.00004', 'Angels in Sangria', '', 0, 95000, 1, 95000),
(20, '2016-01-02 06:04:18', 1, 4, 'RESTO.INV.00004', 'Beef Blackpepper Rice', '', 0, 55000, 1, 55000),
(21, '2016-01-02 06:04:18', 1, 3, 'RESTO.INV.00004', 'Nasi Rendang', '', 0, 25000, 1, 25000),
(22, '2016-01-02 06:04:18', 1, 2, 'RESTO.INV.00004', 'Blue Berry Eve', '', 0, 15000, 1, 15000),
(23, '2016-01-03 00:50:04', 1, 11, 'RESTO.INV.00005', 'Smoke Gentlement', '', 0, 105000, 1, 105000),
(24, '2016-01-03 00:50:04', 1, 10, 'RESTO.INV.00005', 'Poison Ivy', '', 0, 95000, 1, 95000),
(25, '2016-01-03 00:50:04', 1, 9, 'RESTO.INV.00005', 'Pad Kra Pao Bai', '', 0, 85000, 1, 85000),
(26, '2016-01-03 00:50:04', 1, 8, 'RESTO.INV.00005', 'Java Kiss Martini', '', 0, 75500, 1, 75500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelayan`
--

CREATE TABLE IF NOT EXISTS `tbl_pelayan` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `domisili` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `bbm` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `line` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `active` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_pelayan`
--

INSERT INTO `tbl_pelayan` (`id`, `nama`, `jk`, `domisili`, `alamat`, `foto`, `no_hp`, `bbm`, `whatsapp`, `line`, `status`, `active`) VALUES
(1, 'Fajar Buwana Eka Paksi', 'Pria', 'Semarang', 'Jl Blimbing 2 No 345 B', 'jarbu.jpg', '08987527847', '5DECFG', '08987527847', '@fajarjarbu', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan`
--

CREATE TABLE IF NOT EXISTS `tbl_pengaturan` (
  `id_pengaturan` int(3) NOT NULL AUTO_INCREMENT,
  `website` varchar(100) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `deskripsi` varchar(768) NOT NULL,
  `deskripsi_pendek` varchar(160) NOT NULL,
  `string_nota` varchar(320) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `email` varchar(360) NOT NULL,
  `pesan` text NOT NULL,
  `tlp` varchar(160) NOT NULL,
  `fax` varchar(160) NOT NULL,
  `cust_service` varchar(360) NOT NULL,
  `banner_show` enum('TRUE','FALSE') NOT NULL,
  `keyword` text NOT NULL,
  `logo` longtext NOT NULL,
  `google_verification` varchar(360) NOT NULL,
  `alexa_id` varchar(360) NOT NULL,
  `fb` varchar(160) NOT NULL,
  `gplus` varchar(160) NOT NULL,
  `twit` varchar(160) NOT NULL,
  `ppn` int(11) NOT NULL,
  `ymket` varchar(160) NOT NULL,
  `bbket` varchar(160) NOT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id_pengaturan`, `website`, `judul`, `deskripsi`, `deskripsi_pendek`, `string_nota`, `alamat`, `email`, `pesan`, `tlp`, `fax`, `cust_service`, `banner_show`, `keyword`, `logo`, `google_verification`, `alexa_id`, `fb`, `gplus`, `twit`, `ppn`, `ymket`, `bbket`) VALUES
(1, 'http://localhost/resto/', 'RM Padang "Kota Baru"', 'Kami adalah produsen tas dan aksesoris National Geographic terbaik di Indonesia yang berlokasi di Jawa Tengah, Semarang.\n\nKami memberikan jaminan kepuasan barang untuk memastikan konsumen-konsumen kami mendapatkan yang terbaik dari NGSPECIALIST.\n\nHubungi kami di:\n085883086838 (Call, SMS, Whatsapp)\nNGSPECIALIST (Line)\n57374ef4 (BBM)', 'Selain memproduksi Tas National Geographic terbaik di Indonesia, kami juga melayani pembuatan tas custom murah untuk berbagai event penting Anda.', 'RESTO.INV', '', '', 'Produsen Tas National Geographic Terbaik di Indonesia', '085883086838', '', 'Silahkan hubungi CS jika terdapat kesulitan, keluhan, saran, kritik, pembelian grosir, atau ajakan kerjasama.\n\nMicheal H, SS.\n08989000859', '', '', '', '', '', 'http://www.facebook.com/ngspecialistindo', '+nationalgeographicspecialist', '@ng_specialist', 10, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sessions`
--

CREATE TABLE IF NOT EXISTS `tbl_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sessions`
--

INSERT INTO `tbl_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('b8c924cd2d5c837e081c3a8b13024ed4', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451804160, 'a:2:{s:5:"login";a:4:{s:4:"nama";s:5:"admin";s:8:"username";s:5:"admin";s:5:"level";s:4:"root";s:12:"is_logged_in";b:1;}s:15:"flash:old:login";s:46:"Login berhasil, silahkan melanjutkan transaksi";}'),
('6896dc9838ac029a0a2b3fd18aec0d1c', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451804465, 'a:2:{s:9:"user_data";s:0:"";s:6:"capjay";s:6:"4O6PJW";}'),
('25e7e5bc34cca4bbfa78445414f613f0', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451804535, 'a:2:{s:9:"user_data";s:0:"";s:6:"capjay";s:6:"6IFGNF";}'),
('5d19f95240f7674ee3d005a86ea8c684', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451804561, 'a:2:{s:9:"user_data";s:0:"";s:6:"capjay";s:6:"KUGUVU";}'),
('587f0a6a47072c78cc3226629e9dc23d', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451804564, ''),
('a8f38a32e39d8c0ea41525d8e8f56ab9', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451804629, 'a:2:{s:9:"user_data";s:0:"";s:6:"capjay";s:6:"IBUN9Y";}'),
('ff4bd6573bfaa859649042d500fff44e', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451804677, 'a:2:{s:9:"user_data";s:0:"";s:6:"capjay";s:6:"PZFKS3";}'),
('563a0eec34c08336f3a8e21844f41643', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451804698, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_set_meja`
--

CREATE TABLE IF NOT EXISTS `tbl_set_meja` (
  `id_set_meja` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_set_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('root','waiter','admin') NOT NULL,
  `activation_id` varchar(100) NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`time`, `nama`, `username`, `password`, `level`, `activation_id`, `status`, `last_login`) VALUES
('2016-01-03 06:56:04', 'admin', 'admin', 'L-PpIhS9REgaeSWwXWs1XR_IhS3V3htCJpq8tVVrD64', 'root', '', 'active', '2016-01-03 00:56:04'),
('2015-09-20 06:12:50', 'Admin Toko', 'admin2', 'L-PpIhS9REgaeSWwXWs1XR_IhS3V3htCJpq8tVVrD64', '', '', 'active', '2015-09-20 06:12:50'),
('2015-09-12 09:38:24', 'admin', 'admin2dev', 'L-PpIhS9REgaeSWwXWs1XR_IhS3V3htCJpq8tVVrD64', 'root', '', 'active', '2015-09-12 09:02:58'),
('2016-01-03 06:38:29', 'Waiter 1', 'pelayan', 'L-PpIhS9REgaeSWwXWs1XR_IhS3V3htCJpq8tVVrD64', 'waiter', '', 'active', '2016-01-03 00:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_akses`
--

CREATE TABLE IF NOT EXISTS `tbl_user_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(160) NOT NULL,
  `ket` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_priv`
--

CREATE TABLE IF NOT EXISTS `tbl_user_priv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_akses` int(11) NOT NULL,
  `username` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
