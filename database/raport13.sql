-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2017 at 03:28 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raport13`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_main_menu` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`id_menu`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'Master Data', '#', 'fa fa-dashboard', 0),
(2, 'Keuangan', '#', 'fa fa-dashboard', 0),
(3, 'Kategori Barang', 'kategori', 'fa fa-circle-o', 1),
(4, 'Kategori Merk', 'merk', 'fa fa-circle-o', 1),
(5, 'Penjualan', 'penjualan', 'fa fa-circle-o', 2),
(6, 'Pembelian', 'pembelian', 'fa fa-circle-o', 2),
(7, 'Laporan Bulanan', 'laporan', 'fa fa-dashboard', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `temp_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `j_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(12) NOT NULL,
  `status_keluarga` varchar(15) NOT NULL,
  `anak_ke` int(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `kelas_diterima` varchar(12) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_orangtua` text NOT NULL,
  `pekerjaan_ayah` varchar(12) NOT NULL,
  `pekerjaan_ibu` varchar(12) NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `alamat_wali` text NOT NULL,
  `telp_wali` varchar(15) NOT NULL,
  `pekerjaan_wali` varchar(12) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama`, `temp_lahir`, `tgl_lahir`, `j_kelamin`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `telp`, `asal_sekolah`, `kelas_diterima`, `tgl_diterima`, `nama_ayah`, `nama_ibu`, `alamat_orangtua`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `alamat_wali`, `telp_wali`, `pekerjaan_wali`, `foto`) VALUES
(1, '141240000238', 'Dedi Widarto', 'Jepara', '1996-01-23', 'L', 'Islam', 'Kandung', 3, 'Sidigede', '089690427439', 'SD Sidigede', '1', '2017-08-07', 'bapak', 'ibuk', 'sidigede', 'tani', 'tani', 'waliku', 'sidigede', '089690427439', 'tani', 'foto.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
