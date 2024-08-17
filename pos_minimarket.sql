-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2024 at 02:12 PM
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
(2, '3');

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
('PLGGN00001', 'Udin', '12321'),
('PLGGN00002', 'Budi1', '082165443677');

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
(7, 'POS', 'Minimarket Sehati Mart \n', 'Alamat: Pasar Baru,Kec Bayang, Kab pesisir selatan\n', '082284858396');

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
('PRDK000001', '3', '1', '1', 0, 1, 1, '1'),
('PRDK000002', '3', '2', '2', 1, 2, 2, '2'),
('PRDK000003', '3', 'Tekiro', 'Tang Jepit ', 955, 15000, 22000, 'Pcs');

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
(43, 'TRNSKS000000003', '2024-08-17 20:22:23', 'PLGGN00002', 'PRDK000003', 1, 15000, 22000, 50000, 28000, 0, 'Admin');

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
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `keranjang_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
