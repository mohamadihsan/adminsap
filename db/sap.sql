-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 10:44 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sap`
--

-- --------------------------------------------------------

--
-- Table structure for table `aliran_bahan_baku_dan_produk`
--

CREATE TABLE `aliran_bahan_baku_dan_produk` (
  `id_aliran` int(15) NOT NULL,
  `id_gudang` int(15) NOT NULL,
  `id_bahan_baku` int(15) DEFAULT NULL,
  `id_produk` int(15) DEFAULT NULL,
  `qty` int(20) NOT NULL,
  `id_user` int(15) NOT NULL,
  `tanggal` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status_aliran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aliran_bahan_baku_dan_produk`
--

INSERT INTO `aliran_bahan_baku_dan_produk` (`id_aliran`, `id_gudang`, `id_bahan_baku`, `id_produk`, `qty`, `id_user`, `tanggal`, `status_aliran`) VALUES
(0, 0, NULL, 0, 0, 0, '2018-01-11 19:09:59.041637', 'TERJUAL');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(15) NOT NULL,
  `kode_bahan_baku` varchar(10) NOT NULL,
  `nama_bahan_baku` varchar(30) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `lokasi_penyimpanan` varchar(30) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `kode_bahan_baku`, `nama_bahan_baku`, `stock`, `lokasi_penyimpanan`, `status`) VALUES
(1, 'BB-0001', 'A065 BINDER', '33', 'Gudang 1', 'TERSEDIA'),
(2, 'BB-0002', 'A110 WHITE', '11', 'Gudang 1', 'TERSEDIA'),
(3, 'BB-0003', 'A140 DEEP BLACK', '35', 'Gudang 1', 'TERSEDIA'),
(4, 'BB-0004', 'A160 MIXING BLACK', '-9', 'Gudang 1', 'TERSEDIA'),
(5, 'BB-0005', 'A220 RED TRANS', '24', 'Gudang 1', 'TERSEDIA'),
(6, 'BB-0006', 'A235 ORANGE RED TRANS', '35', 'Gudang 1', 'TERSEDIA'),
(7, 'BB-0007', 'A237 RED', '35', 'Gudang 1', 'TERSEDIA'),
(8, 'BB-0008', 'A273 BRILIANT RED', '35', 'Gudang 1', 'TERSEDIA'),
(10, 'BB-0010', 'A277 BRIGHT RED TRANS', '35', 'Gudang 1', 'TERSEDIA'),
(11, 'BB-0011', 'A345 RED ORANGE', '35', 'Gudang 1', 'TERSEDIA'),
(12, 'BB-0012', 'A432 LIGHT OXIDE YELLOW', '35', 'Gudang 1', 'TERSEDIA'),
(13, 'BB-0013', 'A438 RED YELLOW', '35', 'Gudang 1', 'TERSEDIA'),
(14, 'BB-0014', 'A444 MATTING PASTE', '35', 'Gudang 1', 'TERSEDIA'),
(15, 'BB-0015', 'A452 LIGHT YELLOW ', '35', 'Gudang 1', 'TERSEDIA'),
(16, 'BB-0016', 'A454 YELLOW', '35', 'Gudang 1', 'TERSEDIA'),
(17, 'BB-0017', 'A546 GREEN TRANS', '35', 'Gudang 1', 'TERSEDIA'),
(18, 'BB-0018', 'A565 DARK GREEN TRANS', '35', 'Gudang 1', 'TERSEDIA'),
(20, 'BB-0009', 'A675 BRIGHT BLUE TRANS', '35', 'Gudang 1', 'TERSEDIA'),
(22, 'BB-0019', 'VIOLET', '23', 'Gudang 1', 'TERSEDIA'),
(23, 'BB-0020', 'BLACKMATE', '23', 'Gudang 1', 'HABIS');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `harga` int(100) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(15) NOT NULL,
  `kode_gudang` varchar(15) NOT NULL,
  `nama_gudang` varchar(30) NOT NULL,
  `kapasitas` int(20) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `kode_gudang`, `nama_gudang`, `kapasitas`, `status`) VALUES
(1, 'GD01', 'Gudang 1', 250, 'Aktif'),
(2, 'GD02', 'Gudang 2', 250, 'Aktif'),
(3, 'GD02', 'Gudang 3', 250, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(15) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'CAT READY MIX'),
(2, 'TUNNER'),
(3, 'THINNER'),
(4, 'EPOXY'),
(5, 'HARDENER'),
(6, 'DEMPUL'),
(7, 'CLEAR'),
(8, 'FILLER');

-- --------------------------------------------------------

--
-- Table structure for table `kemasan`
--

CREATE TABLE `kemasan` (
  `id_kemasan` int(15) NOT NULL,
  `nama_kemasan` varchar(30) NOT NULL,
  `isi_per_dus` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kemasan`
--

INSERT INTO `kemasan` (`id_kemasan`, `nama_kemasan`, `isi_per_dus`) VALUES
(1, '1 LITER', 6),
(2, '5 LITER', 4),
(3, '2,5 LITER', 4),
(4, '20 LITER', 1),
(5, '1,55 LITER', 2),
(6, '0,5 LITER', 6),
(7, '4 LITER', 4),
(8, '0,25 LITER', 6);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(15) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `driver` varchar(30) NOT NULL,
  `id_user` int(15) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komposisi_produk`
--

CREATE TABLE `komposisi_produk` (
  `id_produk` int(15) NOT NULL,
  `id_bahan_baku` int(15) NOT NULL,
  `komposisi` varchar(30) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komposisi_produk`
--

INSERT INTO `komposisi_produk` (`id_produk`, `id_bahan_baku`, `komposisi`, `status`) VALUES
(30, 1, '11', 'SUDAH DIBUAT'),
(33, 1, '12', 'SUDAH DIBUAT'),
(35, 4, '12', 'SUDAH DIBUAT');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(15) NOT NULL,
  `nama_merk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(1, 'SIKKENS'),
(2, 'HUBBER');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_produksi`
--

CREATE TABLE `monitoring_produksi` (
  `id_monitoring_produksi` int(15) NOT NULL,
  `tanggal_produksi` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `id_order_produk` varchar(30) NOT NULL,
  `status_produksi` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_pembelian`
--

CREATE TABLE `order_pembelian` (
  `id_order_pembelian` int(15) NOT NULL,
  `no_invoice` varchar(10) NOT NULL,
  `tanggal_order` datetime(6) NOT NULL,
  `id_supplier` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `status_order` varchar(30) NOT NULL,
  `total_bayar` int(100) NOT NULL,
  `tanggal_bayar` datetime(6) NOT NULL,
  `tanggal_kirim` datetime(6) NOT NULL,
  `tanggal_terima` datetime(6) NOT NULL,
  `persetujuan_bayar` varchar(30) NOT NULL,
  `approval` varchar(30) NOT NULL,
  `id_peramalan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_pembelian_details`
--

CREATE TABLE `order_pembelian_details` (
  `id_order_pembelian` int(15) NOT NULL,
  `id_bahan_baku` int(15) NOT NULL,
  `id_produk` int(15) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `nama_bahan_baku` varchar(30) NOT NULL,
  `qty` int(10) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_penjualan`
--

CREATE TABLE `order_penjualan` (
  `id_order_penjualan` int(15) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `tanggal_order` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `id_pelanggan` int(15) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `tgl_pesan` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status_order` varchar(30) NOT NULL,
  `total_pembayaran` int(20) NOT NULL,
  `tgl_pembayaran` datetime(6) NOT NULL,
  `tgl_kirim` datetime(6) NOT NULL,
  `tgl_terima` datetime(6) NOT NULL,
  `verifikasi_tagihan` varchar(20) NOT NULL,
  `approval` varchar(20) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_penjualan`
--

INSERT INTO `order_penjualan` (`id_order_penjualan`, `no_invoice`, `tanggal_order`, `id_pelanggan`, `nama_pelanggan`, `tgl_pesan`, `status_order`, `total_pembayaran`, `tgl_pembayaran`, `tgl_kirim`, `tgl_terima`, `verifikasi_tagihan`, `approval`, `id_user`) VALUES
(1, 'INV20180111-1', '2018-01-11 21:18:57.559607', 12, '142 PAINT WORX', '2018-01-11 21:18:57.559607', '', 396000, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '', '', 0),
(3, 'INV20180111-2', '2018-01-11 21:19:58.181545', 14, 'AGUS KAYAT', '2018-01-11 21:19:58.181545', '', 254000, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '', '', 0),
(4, 'INV20180111-3', '2018-01-11 21:20:33.197212', 16, 'TOKO CAT AMANAH', '2018-01-11 21:20:33.197212', '', 100000, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_penjualan_detail`
--

CREATE TABLE `order_penjualan_detail` (
  `id_order_penjualan` int(15) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `qty` int(20) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_penjualan_detail`
--

INSERT INTO `order_penjualan_detail` (`id_order_penjualan`, `nama_pelanggan`, `no_invoice`, `nama_produk`, `qty`, `harga`) VALUES
(1, '142 PAINT WORX', 'INV20180111-1', '0', 0, 0),
(2, '142 PAINT WORX', 'INV20180111-1', '18', 1, 254000),
(3, '142 PAINT WORX', 'INV20180111-1', '24', 1, 142000),
(4, '', '', '', 0, 0),
(5, '', '', '', 0, 0),
(6, 'AGUS KAYAT', 'INV20180111-2', '0', 0, 0),
(7, 'AGUS KAYAT', 'INV20180111-2', '18', 1, 254000),
(9, '', '', '', 0, 0),
(10, 'TOKO CAT AMANAH', 'INV20180111-3', '0', 0, 0),
(11, 'TOKO CAT AMANAH', 'INV20180111-3', '36', 1, 50000),
(12, 'TOKO CAT AMANAH', 'INV20180111-3', '44', 1, 50000),
(13, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(15) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user` int(15) NOT NULL,
  `pembuat_by` varchar(15) NOT NULL,
  `edit_by` varchar(15) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(15) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `tipe_pelanggan` varchar(30) NOT NULL,
  `id_user` int(15) NOT NULL,
  `kredit_limit` varchar(50) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `email`, `telepon`, `tipe_pelanggan`, `id_user`, `kredit_limit`, `status`) VALUES
(12, '142 PAINT WORX', 'JL. MARIBAYA NO. 142', '-', '-', 'Bodyshop', 3, '-', 'Aktif'),
(13, 'ADE SOMANTRI', 'SRI MULYA / JL. RAYA GADOBANGKONG 30H', '-', '0226626986 / 72', 'Paintshop', 3, '-', 'Aktif'),
(14, 'AGUS KAYAT', 'INDAH WARNA / JL. A.H NASUTION UJUNG BERUNG', '-', '-', 'Paintshop', 3, '-', 'Aktif'),
(15, 'ALIKA WARNA', 'JL. A.H NASUTION CILENGKANG II NO. 76 BANDUNG', '-', '-', 'Paintshop', 3, '-', 'Aktif'),
(16, 'TOKO CAT AMANAH', 'JL. KAYU AMBON 61G', '-', '02272533132', 'Paintshop', 3, '-', 'Aktif'),
(17, 'ANDY WINARTO', 'BINTANG JAYA 2 / JL. MALABAR NO. 31', '-', '-', 'Bodyshop', 3, '-', 'Aktif'),
(18, 'ANEKA NUANSA', 'JL. KOPO BIHBUL NO. 73', '-', '0225404755', 'Paintshop', 3, '-', 'Aktif'),
(19, 'ANEKA RAGAM', 'JL.PUNGKUR NO.20', '-', '0225227825', 'Paintshop', 3, '-', 'Aktif'),
(20, 'ANEKA WARNA, SUMEDANG', 'JL. PRABU GAJAH AGUNG NO. 3 SUMEDANG', '-', '-', 'Paintshop', 3, '-', 'Aktif'),
(21, 'ANUGRAH, TOKO', 'JL. OTISTA NO.423 BANDUNG', '-', '022 5205810 / 0', 'Paintshop', 3, '-', 'Aktif'),
(22, 'ANWAR TEGUH', 'BONI WARINDO TOURS/ KIARACONDONG GG MESJID RT 05 / RW 05 NO.11', '-', '-', 'Project', 3, '-', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id_pemberitahuan` int(15) NOT NULL,
  `pesan_pemberitahuan` text NOT NULL,
  `tipe_pemberitahuan` varchar(10) NOT NULL,
  `status_pemberitahuan` varchar(10) NOT NULL,
  `kirim_ke` varchar(30) NOT NULL,
  `tanggal_pemberitahuan` datetime(6) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(15) NOT NULL,
  `tanggal_kirim` datetime(6) NOT NULL,
  `id_user` int(15) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `no_polisi` varchar(20) NOT NULL,
  `kapasitas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peramalan`
--

CREATE TABLE `peramalan` (
  `id_peramalan` int(15) NOT NULL,
  `id_bahan_baku` int(15) DEFAULT NULL,
  `id_produk` int(15) DEFAULT NULL,
  `nama_bahan_baku` varchar(30) DEFAULT NULL,
  `nama_produk` varchar(30) DEFAULT NULL,
  `periode` varchar(30) NOT NULL,
  `jumlah_penjualan` int(30) NOT NULL,
  `hasil_peramalan` varchar(30) NOT NULL,
  `selisih` varchar(30) NOT NULL,
  `persentase_kesalahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(15) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga` int(100) NOT NULL,
  `status_komposisi` varchar(30) NOT NULL,
  `id_jenis` int(15) NOT NULL,
  `id_kemasan` int(15) NOT NULL,
  `id_merk` int(15) NOT NULL,
  `lokasi_penyimpanan` varchar(30) NOT NULL,
  `id_supplier` int(15) NOT NULL,
  `stok` int(10) NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(70) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `satuan`, `harga`, `status_komposisi`, `id_jenis`, `id_kemasan`, `id_merk`, `lokasi_penyimpanan`, `id_supplier`, `stok`, `gambar`, `status`, `id_user`) VALUES
(12, 'P0001', 'AB PLUS  BLENDING AGENT / 1 LT', 'pcs', 201000, '', 3, 1, 1, 'Gudang 1', 3, 12, '1.png', '', 4),
(13, 'P0002', 'AUTOCLEAR 4:1 /1L', 'pcs', 165000, '', 7, 1, 1, 'Gudang 1', 3, 1242, '2.png', '', 4),
(14, 'P0003', 'AUTOCLEAR PLUS HS / 1 LT', 'pcs', 273000, '', 7, 1, 1, 'Gudang 1', 3, 1564, '3.png', '', 4),
(15, 'P0005', 'AUTOCLEAR PLUS HS / 20 LT', 'pcs', 4007000, '', 7, 4, 1, 'Gudang 1', 3, 203, '4.png', '', 4),
(16, 'P0006', 'AUTOCLEAR PLUS HS / 5 LT', 'pcs', 1210000, '', 7, 2, 1, 'Gudang 1', 3, 181, '5.png', '', 4),
(18, 'P0008', 'AUTOCLEAR RAPID / 1L ', 'pcs', 254000, '', 7, 1, 1, 'Gudang 1', 3, 5, '6.png', '', 4),
(19, 'P0009', 'AUTOCLEAR XCEL / 1 LTR', 'pcs', 132500, '', 7, 1, 1, 'Gudang 1', 3, 74, '7.png', '', 4),
(20, 'P0010', 'AUTOCLEAR XCEL / 5 LTR', 'pcs', 650000, '', 7, 2, 1, 'Gudang 1', 3, 32, '8.png', '', 4),
(21, 'P0012', 'BT 100 HARDENER SLOW / 1L', 'pcs', 168000, '', 5, 1, 1, 'Gudang 1', 3, 39, '9.png', '', 4),
(22, 'P0004', 'ANTI SILICON / 0.5 LTR', 'pcs', 76000, '', 3, 6, 1, 'Gudang 1', 3, 67, '10.png', '', 4),
(23, 'P0011', 'AUTOCLEAR 4:1 /4L', 'pcs', 487000, '', 7, 7, 1, 'Gudang 1', 3, 814, '11.png', '', 4),
(24, 'P0013', 'AUTOCLEAR RAPID HARDENER /0.5L', 'pcs', 142000, '', 7, 1, 1, 'Gudang 1', 3, 1, '12.png', '', 4),
(25, 'P0014', 'AUTOFILLER PRO /4L', 'pcs', 683000, '', 8, 1, 1, 'Gudang 1', 3, 53, '13.png', '', 4),
(26, 'P0015', 'BT 100 2K FILLER / 5 LT', 'pcs', 567000, '', 8, 1, 1, 'Gudang 1', 3, 64, '14.png', '', 4),
(27, 'P0016', 'BT 100 2K FILLER HARDENER / 1L', 'pcs', 144000, '', 5, 1, 1, 'Gudang 1', 3, 36, '15.png', '', 4),
(28, 'P0017', 'BT 100 HARDENER SLOW / 1L', 'pcs', 168000, '', 5, 1, 1, 'Gudang 1', 3, 40, '16.png', '', 4),
(29, 'P0018', 'BT 100 PRIMER EP / 4L ', 'pcs', 381000, '', 4, 7, 1, 'Gudang 1', 3, 532, '7.png', '', 4),
(30, 'P0019', 'BT 100 PRIMER EP HARDENER / 1L', 'pcs', 85000, 'SUDAH', 1, 1, 1, 'Gudang 1', 3, 533, '3.png', '', 4),
(33, 'P0020', '8876 BLACK DOFF', 'pcs', 40000, 'SUDAH', 1, 7, 2, 'Gudang 1', 3, 67, '2.png', '', 4),
(35, 'P0021', 'DECELON 223', 'pcs', 4500, 'SUDAH', 1, 4, 2, 'Gudang 1', 4, 500, '12.png', '', 4),
(36, 'P0022', 'MIX HIJAU - METALIK', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(37, 'P0023', 'MIX MERAH - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(38, 'P0024', 'MIX HITAM  METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(39, 'P0025', 'MIX PUTIH - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(40, 'P0026', 'MIX KUNING - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(41, 'P0027', 'MIX JINGGA - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(42, 'P0028', 'MIX TOSCA - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(43, 'P0029', 'MIX UNGU - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(44, 'P0030', 'MIX DEEPBLUE - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(45, 'P0031', 'MIX RED - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(46, 'P0032', 'MIX MARSHMALLOW PINK - METALIC', 'PCS', 100000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(47, 'P0032', 'MIX MARSHMALLOW PINK - METALIC', 'PCS', 100000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(48, 'P0033', 'MIX GREEN LAZARIA - CHROME', 'PCS', 100000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(49, 'P0034', 'MIX CYAN - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4),
(50, 'P0035', 'MIX TURQUISE - METALIC', 'PCS', 50000, '', 1, 2, 1, 'Gudang 1', 3, 500, '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `id_pegawai` int(15) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `waktu_permintaan` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `id_retur` int(15) NOT NULL,
  `verifikasi` varchar(20) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `id_order_penjualan` int(15) NOT NULL,
  `tgl_pesan` datetime(6) NOT NULL,
  `tgl_kirim` datetime(6) NOT NULL,
  `id_pelanggan` int(15) NOT NULL,
  `id_produk` int(15) NOT NULL,
  `status_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `qty` int(20) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `alasan_retur` varchar(30) NOT NULL,
  `status` varchar(70) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pengiriman`
--

CREATE TABLE `riwayat_pengiriman` (
  `id_order_penjualan` int(15) NOT NULL,
  `tanggal_kirim` datetime(6) NOT NULL,
  `id_user` int(15) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `no_polisi` varchar(20) NOT NULL,
  `kapasitas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(15) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat_supplier` varchar(30) NOT NULL,
  `id_user` int(15) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `id_user`, `status`) VALUES
(3, 'PT. AKZONOBEL CAR REFINISHES', 'Jl. Pulo Kambing II No. 18 Kaw', 6, 'Aktif'),
(4, 'PT. RAJAWALI HYOTO', 'Jl. Industri II no 8 Utama Cim', 6, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `hak_akses` varchar(15) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`, `status`) VALUES
(1, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'administrator', ''),
(2, 'supervisor', '09348c20a019be0318387c08df7a783d', 'supervisor', ''),
(3, 'salesadmin', 'fc0a50fa7763838f1ecb2f2b15d73258', 'sales admin', '0'),
(4, 'kepalaproduksi', 'a334a3fc05ee58bdb3a60f0cde873a5b', 'kepala produksi', '0'),
(5, 'admingudang', '6679032ae22be1356894f3bb687f5538', 'admin gudang', '0'),
(6, 'purchasing', '74ba4e8291e8b2e40a31a50505f8b72e', 'purchasing', '0'),
(7, 'kepalakeuangan', '996783f2f94b567712b8bdd2890fea3f', 'kepala keuangan', '');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id_usergroup` int(11) NOT NULL,
  `nama_usergroup` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id_usergroup`, `nama_usergroup`) VALUES
(1, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliran_bahan_baku_dan_produk`
--
ALTER TABLE `aliran_bahan_baku_dan_produk`
  ADD PRIMARY KEY (`id_aliran`),
  ADD KEY `id_gudang` (`id_gudang`,`id_bahan_baku`,`id_produk`,`id_user`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kemasan`
--
ALTER TABLE `kemasan`
  ADD PRIMARY KEY (`id_kemasan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `komposisi_produk`
--
ALTER TABLE `komposisi_produk`
  ADD KEY `id_produk` (`id_produk`,`id_bahan_baku`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `monitoring_produksi`
--
ALTER TABLE `monitoring_produksi`
  ADD PRIMARY KEY (`id_monitoring_produksi`);

--
-- Indexes for table `order_pembelian`
--
ALTER TABLE `order_pembelian`
  ADD PRIMARY KEY (`id_order_pembelian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_peramalan` (`id_peramalan`);

--
-- Indexes for table `order_pembelian_details`
--
ALTER TABLE `order_pembelian_details`
  ADD KEY `id_bahan_baku` (`id_bahan_baku`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_order_pembelian` (`id_order_pembelian`) USING BTREE;

--
-- Indexes for table `order_penjualan`
--
ALTER TABLE `order_penjualan`
  ADD PRIMARY KEY (`id_order_penjualan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `order_penjualan_detail`
--
ALTER TABLE `order_penjualan_detail`
  ADD KEY `id_order_penjualan` (`id_order_penjualan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `status` (`status`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_kemasan` (`id_kemasan`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order_penjualan` (`id_order_penjualan`,`id_pelanggan`,`id_produk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order_penjualan`
--
ALTER TABLE `order_penjualan`
  MODIFY `id_order_penjualan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_penjualan_detail`
--
ALTER TABLE `order_penjualan_detail`
  MODIFY `id_order_penjualan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id_peramalan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
