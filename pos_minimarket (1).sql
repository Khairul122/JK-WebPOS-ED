-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2024 at 12:16 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_minimarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int NOT NULL,
  `kategori_nama` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(2, 'PENGLENGKAPAN BAYI'),
(5, 'MAKANAN & MINUMAN'),
(6, 'KEBUTUHAN RUMAH TANGGA'),
(7, 'PRODUK KECANTIKAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `keranjang_id` int NOT NULL,
  `produk_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_item` int NOT NULL,
  `total_harga_m` int NOT NULL,
  `total_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `pelanggan_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `pelanggan_nama` text COLLATE utf8mb4_general_ci NOT NULL,
  `pelanggan_no_hp` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_no_hp`) VALUES
('PLGGN00001', 'Ahmad Sudirman', '081234567890'),
('PLGGN00002', 'Rina Kartika', '082234567891'),
('PLGGN00003', 'Budi Santoso', '083234567892'),
('PLGGN00004', 'Siti Nurhaliza', '084234567893'),
('PLGGN00005', 'Andi Wijaya', '085234567894');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `pengaturan_id` int NOT NULL,
  `pengaturan_nama_sidebar` text COLLATE utf8mb4_general_ci NOT NULL,
  `pengaturan_nama_navbar` text COLLATE utf8mb4_general_ci NOT NULL,
  `pengaturan_alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `pengaturan_no_hp` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`pengaturan_id`, `pengaturan_nama_sidebar`, `pengaturan_nama_navbar`, `pengaturan_alamat`, `pengaturan_no_hp`) VALUES
(7, 'POS', 'Minimarket Sehati Mart \n', 'Alamat: Pasar Baru,Kec Bayang, Kab Pasar Baru\n', '082284858396');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int NOT NULL,
  `pengguna_nama` text COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `pengguna_pilihan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `username`, `password`, `pengguna_pilihan`) VALUES
(1, 'Admin', 'admin', 'admin', 'Admin'),
(3, 'AJO ZZ', 'A', 'A', 'Karyawan'),
(4, 'budi', 'budi', 'budi', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `produk_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `produk_kategori` text COLLATE utf8mb4_general_ci NOT NULL,
  `produk_merek` text COLLATE utf8mb4_general_ci NOT NULL,
  `produk_nama` text COLLATE utf8mb4_general_ci NOT NULL,
  `produk_stok` int NOT NULL,
  `produk_harga_modal` int NOT NULL,
  `produk_harga_jual` int NOT NULL,
  `produk_satuan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`produk_id`, `produk_kategori`, `produk_merek`, `produk_nama`, `produk_stok`, `produk_harga_modal`, `produk_harga_jual`, `produk_satuan`) VALUES
('PRDK001', 'PENGLENGKAPAN BAYI', 'Pampers', 'Pampers Premium Care', 47, 95000, 100000, 'pak'),
('PRDK002', 'PENGLENGKAPAN BAYI', 'MamyPoko', 'MamyPoko Extra Dry', 100, 75000, 80000, 'pak'),
('PRDK003', 'PENGLENGKAPAN BAYI', 'Sleek', 'Sleek Bottle Cleanser', 30, 25000, 30000, 'botol'),
('PRDK004', 'PENGLENGKAPAN BAYI', 'Zwitsal', 'Zwitsal Baby Powder', 200, 20000, 25000, 'botol'),
('PRDK005', 'PENGLENGKAPAN BAYI', 'Pigeon', 'Pigeon Baby Wipes', 150, 40000, 45000, 'pak'),
('PRDK006', 'MAKANAN & MINUMAN', 'Indomie', 'Indomie Goreng Original', 495, 2500, 3000, 'bungkus'),
('PRDK007', 'MAKANAN & MINUMAN', 'Aqua', 'Aqua Botol 600ml', 1000, 3000, 3500, 'botol'),
('PRDK008', 'MAKANAN & MINUMAN', 'Ultra Milk', 'Ultra Milk UHT 1L', 200, 12000, 15000, 'karton'),
('PRDK009', 'MAKANAN & MINUMAN', 'Teh Pucuk', 'Teh Pucuk Harum 350ml', 300, 4000, 4500, 'botol'),
('PRDK010', 'MAKANAN & MINUMAN', 'Nestle', 'Nestle Koko Krunch 80g', 100, 12000, 15000, 'kotak'),
('PRDK011', 'KEBUTUHAN RUMAH TANGGA', 'Rinso', 'Rinso Deterjen 1kg', 100, 22000, 25000, 'bungkus'),
('PRDK012', 'KEBUTUHAN RUMAH TANGGA', 'Sunlight', 'Sunlight Jeruk Nipis 800ml', 150, 15000, 18000, 'botol'),
('PRDK013', 'KEBUTUHAN RUMAH TANGGA', 'Tupperware', 'Tupperware Lunch Box', 50, 120000, 150000, 'paket'),
('PRDK014', 'KEBUTUHAN RUMAH TANGGA', 'Sania', 'Sania Minyak Goreng 2L', 200, 30000, 35000, 'botol'),
('PRDK015', 'KEBUTUHAN RUMAH TANGGA', 'Baygon', 'Baygon Semprot Anti Nyamuk', 100, 25000, 30000, 'botol'),
('PRDK016', 'PRODUK KECANTIKAN', 'Wardah', 'Wardah Lightening Day Cream', 80, 40000, 50000, 'pot'),
('PRDK017', 'PRODUK KECANTIKAN', 'Maybelline', 'Maybelline Mascara Volume Express', 50, 70000, 85000, 'pcs'),
('PRDK018', 'PRODUK KECANTIKAN', 'Emina', 'Emina Bright Stuff Face Wash', 150, 20000, 25000, 'tube'),
('PRDK019', 'PRODUK KECANTIKAN', 'Loreal', 'Loreal Paris Revitalift Serum', 40, 150000, 175000, 'botol'),
('PRDK020', 'PRODUK KECANTIKAN', 'Nivea', 'Nivea Soft Moisturizing Cream', 120, 30000, 35000, 'pot');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `keranjang_id` int NOT NULL,
  `transaksi_id` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_wktu_transaksi` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pelanggan_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `produk_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_item` int NOT NULL,
  `total_harga_m` int NOT NULL,
  `total_harga` int NOT NULL,
  `total_bayar` int NOT NULL,
  `kembalian` int NOT NULL,
  `diskon` int NOT NULL DEFAULT '0',
  `pengguna` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`keranjang_id`, `transaksi_id`, `tgl_wktu_transaksi`, `pelanggan_id`, `produk_id`, `jumlah_item`, `total_harga_m`, `total_harga`, `total_bayar`, `kembalian`, `diskon`, `pengguna`) VALUES
(1, 'TRNSKS000001', '2024-01-01 10:15:00', 'PLGGN00001', 'PRDK001', 2, 190000, 200000, 220000, 40000, 20000, 'admin'),
(2, 'TRNSKS000002', '2024-01-03 11:25:00', 'PLGGN00002', 'PRDK002', 3, 225000, 240000, 250000, 34000, 24000, 'admin'),
(3, 'TRNSKS000003', '2024-01-05 14:05:00', 'PLGGN00003', 'PRDK003', 1, 25000, 30000, 30000, 0, 0, 'admin'),
(4, 'TRNSKS000004', '2024-01-07 09:45:00', 'PLGGN00004', 'PRDK004', 5, 100000, 125000, 150000, 37500, 12500, 'admin'),
(5, 'TRNSKS000005', '2024-01-10 12:00:00', 'PLGGN00005', 'PRDK005', 4, 160000, 180000, 200000, 38000, 18000, 'admin'),
(6, 'TRNSKS000006', '2024-01-12 15:30:00', 'PLGGN00001', 'PRDK006', 6, 270000, 300000, 320000, 50000, 30000, 'admin'),
(7, 'TRNSKS000007', '2024-01-15 17:00:00', 'PLGGN00002', 'PRDK007', 10, 300000, 350000, 400000, 85000, 35000, 'admin'),
(8, 'TRNSKS000008', '2024-01-18 13:20:00', 'PLGGN00003', 'PRDK008', 8, 96000, 120000, 150000, 42000, 12000, 'admin'),
(9, 'TRNSKS000009', '2024-01-22 10:50:00', 'PLGGN00004', 'PRDK009', 7, 84000, 105000, 160000, 34000, 14000, 'admin'),
(10, 'TRNSKS000010', '2024-01-28 08:30:00', 'PLGGN00005', 'PRDK010', 9, 315000, 360000, 400000, 76000, 36000, 'admin'),
(11, 'TRNSKS000011', '2024-02-01 10:20:00', 'PLGGN00001', 'PRDK003', 2, 50000, 60000, 75000, 15000, 0, 'admin'),
(12, 'TRNSKS000012', '2024-02-03 12:15:00', 'PLGGN00002', 'PRDK010', 3, 105000, 120000, 150000, 42000, 12000, 'admin'),
(13, 'TRNSKS000013', '2024-02-05 14:00:00', 'PLGGN00003', 'PRDK008', 1, 175000, 200000, 250000, 70000, 20000, 'admin'),
(14, 'TRNSKS000014', '2024-02-08 10:45:00', 'PLGGN00004', 'PRDK005', 5, 200000, 225000, 250000, 47500, 22500, 'admin'),
(15, 'TRNSKS000015', '2024-02-10 09:30:00', 'PLGGN00005', 'PRDK012', 4, 48000, 60000, 80000, 20000, 0, 'admin'),
(16, 'TRNSKS000016', '2024-02-12 15:40:00', 'PLGGN00001', 'PRDK009', 6, 24000, 27000, 35000, 8000, 0, 'admin'),
(17, 'TRNSKS000017', '2024-02-14 18:00:00', 'PLGGN00002', 'PRDK007', 10, 120000, 150000, 180000, 45000, 15000, 'admin'),
(18, 'TRNSKS000018', '2024-02-17 14:10:00', 'PLGGN00003', 'PRDK004', 8, 160000, 200000, 210000, 30000, 20000, 'admin'),
(19, 'TRNSKS000019', '2024-02-21 10:35:00', 'PLGGN00004', 'PRDK006', 7, 17500, 21000, 50000, 29000, 0, 'admin'),
(20, 'TRNSKS000020', '2024-02-27 09:15:00', 'PLGGN00005', 'PRDK002', 9, 675000, 720000, 750000, 102000, 72000, 'admin'),
(21, 'TRNSKS000021', '2024-03-01 09:10:00', 'PLGGN00001', 'PRDK001', 3, 285000, 300000, 350000, 80000, 30000, 'admin'),
(22, 'TRNSKS000022', '2024-03-03 11:45:00', 'PLGGN00002', 'PRDK019', 2, 350000, 400000, 450000, 90000, 40000, 'admin'),
(23, 'TRNSKS000023', '2024-03-06 14:00:00', 'PLGGN00003', 'PRDK014', 1, 120000, 150000, 170000, 35000, 15000, 'admin'),
(24, 'TRNSKS000024', '2024-03-09 12:30:00', 'PLGGN00004', 'PRDK017', 5, 350000, 425000, 450000, 67500, 42500, 'admin'),
(25, 'TRNSKS000025', '2024-03-11 15:00:00', 'PLGGN00005', 'PRDK013', 4, 120000, 140000, 150000, 24000, 14000, 'admin'),
(26, 'TRNSKS000026', '2024-03-14 10:15:00', 'PLGGN00001', 'PRDK020', 6, 180000, 210000, 250000, 61000, 21000, 'admin'),
(27, 'TRNSKS000027', '2024-03-18 14:45:00', 'PLGGN00002', 'PRDK012', 10, 120000, 150000, 170000, 35000, 15000, 'admin'),
(28, 'TRNSKS000028', '2024-03-21 08:55:00', 'PLGGN00003', 'PRDK018', 3, 60000, 75000, 90000, 15000, 0, 'admin'),
(29, 'TRNSKS000029', '2024-03-24 13:20:00', 'PLGGN00004', 'PRDK005', 8, 320000, 360000, 400000, 76000, 36000, 'admin'),
(30, 'TRNSKS000030', '2024-03-28 16:30:00', 'PLGGN00005', 'PRDK006', 9, 22500, 27000, 40000, 13000, 0, 'admin'),
(31, 'TRNSKS000031', '2024-04-02 10:00:00', 'PLGGN00001', 'PRDK011', 3, 66000, 75000, 90000, 15000, 0, 'admin'),
(32, 'TRNSKS000032', '2024-04-05 14:20:00', 'PLGGN00002', 'PRDK018', 2, 40000, 50000, 80000, 30000, 0, 'admin'),
(33, 'TRNSKS000033', '2024-04-07 11:30:00', 'PLGGN00003', 'PRDK016', 5, 200000, 250000, 280000, 55000, 25000, 'admin'),
(34, 'TRNSKS000034', '2024-04-09 12:45:00', 'PLGGN00004', 'PRDK013', 4, 120000, 140000, 160000, 34000, 14000, 'admin'),
(35, 'TRNSKS000035', '2024-04-11 09:15:00', 'PLGGN00005', 'PRDK015', 6, 150000, 180000, 210000, 48000, 18000, 'admin'),
(36, 'TRNSKS000036', '2024-04-14 16:40:00', 'PLGGN00001', 'PRDK017', 8, 560000, 680000, 700000, 88000, 68000, 'admin'),
(37, 'TRNSKS000037', '2024-04-18 14:00:00', 'PLGGN00002', 'PRDK014', 3, 360000, 450000, 500000, 95000, 45000, 'admin'),
(38, 'TRNSKS000038', '2024-04-20 08:30:00', 'PLGGN00003', 'PRDK004', 10, 200000, 250000, 260000, 35000, 25000, 'admin'),
(39, 'TRNSKS000039', '2024-04-23 12:10:00', 'PLGGN00004', 'PRDK007', 5, 60000, 75000, 100000, 25000, 0, 'admin'),
(40, 'TRNSKS000040', '2024-04-28 15:50:00', 'PLGGN00005', 'PRDK002', 9, 675000, 720000, 800000, 152000, 72000, 'admin'),
(41, 'TRNSKS000041', '2024-05-02 10:30:00', 'PLGGN00001', 'PRDK001', 2, 190000, 200000, 210000, 30000, 20000, 'admin'),
(42, 'TRNSKS000042', '2024-05-04 11:15:00', 'PLGGN00002', 'PRDK003', 3, 75000, 90000, 90000, 15000, 0, 'admin'),
(43, 'TRNSKS000043', '2024-05-07 13:20:00', 'PLGGN00003', 'PRDK005', 1, 40000, 45000, 50000, 5000, 0, 'admin'),
(44, 'TRNSKS000044', '2024-05-09 14:00:00', 'PLGGN00004', 'PRDK009', 6, 24000, 27000, 35000, 8000, 0, 'admin'),
(45, 'TRNSKS000045', '2024-05-11 12:30:00', 'PLGGN00005', 'PRDK010', 4, 140000, 160000, 170000, 26000, 16000, 'admin'),
(46, 'TRNSKS000046', '2024-05-15 15:45:00', 'PLGGN00001', 'PRDK006', 9, 22500, 27000, 40000, 13000, 0, 'admin'),
(47, 'TRNSKS000047', '2024-05-17 10:10:00', 'PLGGN00002', 'PRDK002', 5, 375000, 400000, 420000, 60000, 40000, 'admin'),
(48, 'TRNSKS000048', '2024-05-20 13:50:00', 'PLGGN00003', 'PRDK008', 7, 1225000, 1400000, 1500000, 240000, 140000, 'admin'),
(49, 'TRNSKS000049', '2024-05-22 11:00:00', 'PLGGN00004', 'PRDK017', 4, 280000, 340000, 350000, 44000, 34000, 'admin'),
(50, 'TRNSKS000050', '2024-05-25 16:30:00', 'PLGGN00005', 'PRDK014', 6, 720000, 900000, 900000, 135000, 85000, 'admin'),
(51, 'TRNSKS000051', '2024-06-01 09:00:00', 'PLGGN00001', 'PRDK011', 4, 88000, 100000, 120000, 30000, 10000, 'admin'),
(52, 'TRNSKS000052', '2024-06-03 14:25:00', 'PLGGN00002', 'PRDK007', 5, 60000, 75000, 100000, 25000, 0, 'admin'),
(53, 'TRNSKS000053', '2024-06-06 10:45:00', 'PLGGN00003', 'PRDK018', 6, 120000, 150000, 160000, 25000, 15000, 'admin'),
(54, 'TRNSKS000054', '2024-06-08 15:50:00', 'PLGGN00004', 'PRDK004', 10, 200000, 250000, 260000, 35000, 25000, 'admin'),
(55, 'TRNSKS000055', '2024-06-10 11:20:00', 'PLGGN00005', 'PRDK016', 3, 120000, 150000, 160000, 25000, 15000, 'admin'),
(56, 'TRNSKS000056', '2024-06-14 12:00:00', 'PLGGN00001', 'PRDK019', 2, 350000, 400000, 500000, 140000, 40000, 'admin'),
(57, 'TRNSKS000057', '2024-06-16 17:00:00', 'PLGGN00002', 'PRDK015', 8, 200000, 240000, 250000, 34000, 24000, 'admin'),
(58, 'TRNSKS000058', '2024-06-19 08:45:00', 'PLGGN00003', 'PRDK012', 5, 60000, 75000, 90000, 15000, 0, 'admin'),
(59, 'TRNSKS000059', '2024-06-21 14:40:00', 'PLGGN00004', 'PRDK002', 7, 525000, 560000, 600000, 96000, 56000, 'admin'),
(60, 'TRNSKS000060', '2024-06-25 09:20:00', 'PLGGN00005', 'PRDK013', 9, 270000, 315000, 350000, 62000, 32000, 'admin'),
(61, 'TRNSKS000061', '2024-07-02 11:30:00', 'PLGGN00001', 'PRDK001', 3, 285000, 300000, 350000, 80000, 30000, 'admin'),
(62, 'TRNSKS000062', '2024-07-04 12:40:00', 'PLGGN00002', 'PRDK003', 2, 50000, 60000, 75000, 15000, 0, 'admin'),
(63, 'TRNSKS000063', '2024-07-06 09:15:00', 'PLGGN00003', 'PRDK005', 1, 40000, 45000, 50000, 5000, 0, 'admin'),
(64, 'TRNSKS000064', '2024-07-09 16:00:00', 'PLGGN00004', 'PRDK006', 4, 10000, 12000, 35000, 23000, 0, 'admin'),
(65, 'TRNSKS000065', '2024-07-12 10:30:00', 'PLGGN00005', 'PRDK017', 5, 350000, 425000, 450000, 67500, 42500, 'admin'),
(66, 'TRNSKS000066', '2024-07-15 13:20:00', 'PLGGN00001', 'PRDK004', 6, 120000, 150000, 160000, 25000, 15000, 'admin'),
(67, 'TRNSKS000067', '2024-07-18 12:10:00', 'PLGGN00002', 'PRDK008', 2, 350000, 400000, 500000, 140000, 40000, 'admin'),
(68, 'TRNSKS000068', '2024-07-20 09:45:00', 'PLGGN00003', 'PRDK009', 4, 16000, 18000, 35000, 17000, 0, 'admin'),
(69, 'TRNSKS000069', '2024-07-23 17:50:00', 'PLGGN00004', 'PRDK018', 8, 160000, 200000, 210000, 30000, 20000, 'admin'),
(70, 'TRNSKS000070', '2024-07-26 14:25:00', 'PLGGN00005', 'PRDK020', 7, 210000, 245000, 300000, 75000, 25000, 'admin'),
(71, 'TRNSKS000071', '2024-08-01 11:45:00', 'PLGGN00001', 'PRDK011', 6, 132000, 150000, 200000, 65000, 15000, 'admin'),
(72, 'TRNSKS000072', '2024-08-03 13:40:00', 'PLGGN00002', 'PRDK015', 4, 100000, 120000, 150000, 42000, 12000, 'admin'),
(73, 'TRNSKS000073', '2024-08-06 14:15:00', 'PLGGN00003', 'PRDK012', 7, 84000, 105000, 120000, 15000, 0, 'admin'),
(74, 'TRNSKS000074', '2024-08-08 09:50:00', 'PLGGN00004', 'PRDK002', 5, 375000, 400000, 400000, 76000, 36000, 'admin'),
(75, 'TRNSKS000075', '2024-08-10 10:40:00', 'PLGGN00005', 'PRDK016', 2, 80000, 100000, 120000, 30000, 10000, 'admin'),
(76, 'TRNSKS000076', '2024-08-13 15:10:00', 'PLGGN00001', 'PRDK007', 3, 36000, 45000, 80000, 20000, 0, 'admin'),
(77, 'TRNSKS000077', '2024-08-16 16:25:00', 'PLGGN00002', 'PRDK019', 5, 875000, 1000000, 1000000, 190000, 90000, 'admin'),
(78, 'TRNSKS000078', '2024-08-18 13:30:00', 'PLGGN00003', 'PRDK005', 8, 320000, 360000, 400000, 85000, 35000, 'admin'),
(79, 'TRNSKS000079', '2024-08-21 11:20:00', 'PLGGN00004', 'PRDK020', 10, 300000, 350000, 400000, 85000, 35000, 'admin'),
(80, 'TRNSKS000080', '2024-08-23 09:55:00', 'PLGGN00005', 'PRDK017', 4, 280000, 340000, 350000, 62000, 32000, 'admin'),
(81, 'TRNSKS000081', '2024-09-01 12:05:00', 'PLGGN00001', 'PRDK001', 5, 475000, 500000, 500000, 95000, 45000, 'admin'),
(82, 'TRNSKS000082', '2024-09-02 10:20:00', 'PLGGN00002', 'PRDK003', 4, 100000, 120000, 150000, 42000, 12000, 'admin'),
(83, 'TRNSKS000083', '2024-09-03 09:30:00', 'PLGGN00003', 'PRDK009', 6, 24000, 27000, 40000, 13000, 0, 'admin'),
(84, 'TRNSKS000084', '2024-09-04 13:45:00', 'PLGGN00004', 'PRDK018', 7, 140000, 175000, 180000, 45000, 15000, 'admin'),
(85, 'TRNSKS000085', '2024-09-05 15:15:00', 'PLGGN00005', 'PRDK014', 8, 960000, 1200000, 1250000, 170000, 120000, 'admin'),
(86, 'TRNSKS000086', '2024-09-06 16:10:00', 'PLGGN00001', 'PRDK015', 3, 75000, 90000, 95000, 5000, 0, 'admin'),
(87, 'TRNSKS000087', '2024-09-07 17:25:00', 'PLGGN00002', 'PRDK019', 2, 350000, 400000, 500000, 140000, 40000, 'admin'),
(88, 'TRNSKS000088', '2024-09-08 14:45:00', 'PLGGN00003', 'PRDK020', 9, 270000, 315000, 400000, 85000, 35000, 'admin'),
(89, 'TRNSKS000089', '2024-09-08 12:50:00', 'PLGGN00004', 'PRDK002', 7, 525000, 560000, 600000, 96000, 56000, 'admin'),
(90, 'TRNSKS000090', '2024-09-08 10:40:00', 'PLGGN00005', 'PRDK010', 10, 350000, 400000, 600000, 150000, 50000, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`pengaturan_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `keranjang_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `pengaturan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
