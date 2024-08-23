-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2024 at 07:05 AM
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
('PLGGN00001', 'nadia', '082383013208'),
('PLGGN00002', 'Budi', '082165443677'),
('PLGGN00003', 'mela', '082201'),
('PLGGN00004', 'ando', '082311111'),
('PLGGN00005', 'zikri', '08222222'),
('PLGGN00006', 'susan', '0823000'),
('PLGGN00007', 'apis', '08238301'),
('PLGGN00008', 'ilham', '08328080'),
('PLGGN00009', 'emi', '0877777'),
('PLGGN00010', 'boy', '08228485'),
('PLGGN00011', 'OLLA', '00000');

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
('PRDK000001', 'PENGLENGKAPAN BAYI', 'ZWITSAL', 'SABUN', 77, 15000, 18000, 'Pcs'),
('PRDK000002', 'PENGLENGKAPAN BAYI', 'Mamypoko', 'Popok Bayi', 37, 55000, 60, 'pack'),
('PRDK000003', 'PENGLENGKAPAN BAYI', 'Libby Baby', 'Baju bayi', 79, 48000, 50000, 'Set'),
('PRDK000004', 'PENGLENGKAPAN BAYI', 'Sugar Baby', 'Gendongan Bayi', 79, 125000, 130000, 'pcs'),
('PRDK000005', 'PENGLENGKAPAN BAYI', 'pliko jazz', 'stroler bayi', 39, 15000, 11000, 'pcs'),
('PRDK000006', 'PENGLENGKAPAN BAYI', 'spectra', 'Pompa asi', 50, 450000, 500000, 'pcs'),
('PRDK000007', 'PENGLENGKAPAN BAYI', 'Pigeon', 'Botol Produk', 59, 35000, 40000, 'botol'),
('PRDK000008', 'PENGLENGKAPAN BAYI', 'Perlak alas popok', 'perlak', 60, 60000, 70000, 'pcs'),
('PRDK000009', 'PENGLENGKAPAN BAYI', 'Baby does cradle', 'tempat tidur bayi', 30, 750000, 800000, 'pcs'),
('PRDK000010', 'PENGLENGKAPAN BAYI', 'Kelambu nyamuk', 'kelambu', 19, 55000, 60000, 'pcs'),
('PRDK000011', 'MAKANAN & MINUMAN', 'Indomie Goreng', 'MIE', 80, 2500, 3000, 'pcs'),
('PRDK000012', 'MAKANAN & MINUMAN', 'Aqua air mineral', 'minuman', 79, 4000, 5000, 'botol'),
('PRDK000013', 'MAKANAN & MINUMAN', 'oreo Vanlila', 'minuman', 30, 8000, 10000, 'botol'),
('PRDK000014', 'MAKANAN & MINUMAN', 'fruit tea', 'minuman', 20, 7000, 8000, 'botol'),
('PRDK000015', 'MAKANAN & MINUMAN', 'taro snack', 'snack', 20, 5000, 7000, 'bungkus'),
('PRDK000016', 'MAKANAN & MINUMAN', 'bengbeng chocolate', 'minuman', 30, 3500, 5000, 'botol'),
('PRDK000017', 'MAKANAN & MINUMAN', 'susu ultramilk', 'minuman', 30, 15000, 18000, 'botol'),
('PRDK000018', 'MAKANAN & MINUMAN', 'pillows', 'snack', 20, 8000, 11000, 'pcs'),
('PRDK000019', 'MAKANAN & MINUMAN', 'taro snack rumput laut', 'snack', 20, 3500, 5000, 'bungkus'),
('PRDK000020', 'MAKANAN & MINUMAN', 'milo active go 200ml', 'minuman', 30, 5000, 6000, 'botol'),
('PRDK000021', 'KEBUTUHAN RUMAH TANGGA', 'Bimoli', 'Minyak Goreng', 50, 18000, 20000, 'Liter'),
('PRDK000022', 'KEBUTUHAN RUMAH TANGGA', 'Beras Solok', 'Beras', 70, 100000, 40000, 'Kg'),
('PRDK000023', 'KEBUTUHAN RUMAH TANGGA', 'Giv', 'Sabun Mandi', 60, 2500, 4000, 'pcs'),
('PRDK000024', 'KEBUTUHAN RUMAH TANGGA', 'Soklin Liquid', 'Sabun Cuci', 100, 500, 1000, 'pcs'),
('PRDK000025', 'KEBUTUHAN RUMAH TANGGA', 'Pepsodent', 'Pasta Gigi', 100, 4000, 5000, 'pcs'),
('PRDK000026', 'KEBUTUHAN RUMAH TANGGA', 'Mama Lemon', 'Sabun cuci piring', 100, 3000, 5000, 'pcs'),
('PRDK000027', 'KEBUTUHAN RUMAH TANGGA', 'Segitiga Biru', 'Tepung Terigu', 20, 13000, 15000, 'kg'),
('PRDK000028', 'KEBUTUHAN RUMAH TANGGA', 'Paseo', 'Tisu', 100, 10000, 12000, 'pcs'),
('PRDK000029', 'KEBUTUHAN RUMAH TANGGA', 'Bango', 'Kecap', 50, 4000, 5000, 'pcs'),
('PRDK000030', 'KEBUTUHAN RUMAH TANGGA', 'ABC', 'Saos', 60, 14000, 15000, 'Botol'),
('PRDK000031', 'PRODUK KECANTIKAN', 'Wardah', 'Foundations', 30, 23000, 25000, 'pcs'),
('PRDK000032', 'PRODUK KECANTIKAN', 'make over', 'eyeliner', 30, 50000, 55000, 'pcs'),
('PRDK000033', 'PRODUK KECANTIKAN', 'Wardah', 'Lipstik Matte', 16, 35000, 45000, 'pcs'),
('PRDK000034', 'PRODUK KECANTIKAN', 'Radiant Skin', 'foundation ', 30, 75000, 45000, 'pcs'),
('PRDK000035', 'PRODUK KECANTIKAN', 'lowSerum', 'masker wajah', 80, 10000, 15000, 'pcs'),
('PRDK000036', 'PRODUK KECANTIKAN', 'ColorPop', 'Eyeshadow Palette', 20, 28000, 35000, 'pcs'),
('PRDK000037', 'PRODUK KECANTIKAN', 'Garnier', 'Micelar water 100ml ', 28, 35000, 28000, 'pcs'),
('PRDK000038', 'PRODUK KECANTIKAN', 'NightGlow', 'cream malam', 60, 78000, 95000, 'pcs'),
('PRDK000039', 'PRODUK KECANTIKAN', 'EssenceTouch', 'Parfum', 30, 50000, 60000, 'pcs'),
('PRDK000040', 'PRODUK KECANTIKAN', 'You', 'Conceler', 30, 40000, 50000, 'pcs');

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
(38, 'TRNSKS000000001', '2024-08-17 19:30:55', 'PLGGN00001', 'PRDK000003', 2, 30000, 44000, 200000, 61400, 15400, 'Admin'),
(39, 'TRNSKS000000001', '2024-08-17 19:30:55', 'PLGGN00001', 'PRDK000003', 5, 75000, 110000, 200000, 61400, 15400, 'Admin'),
(40, 'TRNSKS000000002', '2024-08-17 20:02:20', 'PLGGN00001', 'PRDK000003', 2, 30000, 44000, 150000, 31200, 13200, 'Admin'),
(41, 'TRNSKS000000002', '2024-08-17 20:02:20', 'PLGGN00001', 'PRDK000003', 2, 30000, 44000, 150000, 31200, 13200, 'Admin'),
(42, 'TRNSKS000000002', '2024-08-17 20:02:20', 'PLGGN00001', 'PRDK000003', 2, 30000, 44000, 150000, 31200, 13200, 'Admin'),
(43, 'TRNSKS000000003', '2024-08-17 20:22:23', 'PLGGN00002', 'PRDK000003', 1, 15000, 22000, 50000, 28000, 0, 'Admin'),
(50, 'TRNSKS000000004', '2024-08-20 14:21:55', 'PLGGN00002', 'PRDK000012', 1, 4000, 5000, 150000, 84000, 0, 'Admin'),
(51, 'TRNSKS000000004', '2024-08-20 14:21:55', 'PLGGN00002', 'PRDK000005', 1, 15000, 11000, 150000, 84000, 0, 'Admin'),
(52, 'TRNSKS000000004', '2024-08-20 14:21:55', 'PLGGN00002', 'PRDK000003', 1, 40000, 50000, 150000, 84000, 0, 'Admin'),
(53, 'TRNSKS000000005', '2024-08-23 13:59:50', 'PLGGN00002', 'PRDK000001', 1, 15000, 18000, 150000, 43800, 11800, 'Admin'),
(55, 'TRNSKS000000005', '2024-08-23 13:59:50', 'PLGGN00002', 'PRDK000007', 1, 35000, 40000, 150000, 43800, 11800, 'Admin'),
(56, 'TRNSKS000000005', '2024-08-23 13:59:50', 'PLGGN00002', 'PRDK000010', 1, 55000, 60000, 150000, 43800, 11800, 'Admin');

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
  MODIFY `keranjang_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
