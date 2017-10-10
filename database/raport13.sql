-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 04:46 AM
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
-- Stand-in structure for view `agama`
-- (See below for the actual view)
--
CREATE TABLE `agama` (
`id_siswa` int(11)
,`nama_agama` varchar(25)
,`kd_agama` varchar(2)
);

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
(2, 'Laporan Nilai', '#', 'fa fa-dashboard', 0),
(3, 'Data Sekolah', 'sekolah', 'fa fa-circle', 0),
(4, 'Data Siswa', 'siswa', 'fa fa-circle', 0),
(5, 'Jurusan', 'jurusan', 'fa fa-circle-o', 1),
(6, 'Tahun Akademik', 'tahunakademik', 'fa fa-circle-o', 1),
(7, 'Kurikulum', 'kurikulum', 'fa fa-circle-o', 1),
(8, 'Ruang Kelas', 'ruangan', 'fa fa-circle-o', 1),
(9, 'Mata Pelajaran', 'mapel', 'fa fa-circle-o', 1),
(10, 'Data Guru', 'guru', 'fa fa-circle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `kd_agama` varchar(2) NOT NULL,
  `nama_agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`kd_agama`, `nama_agama`) VALUES
('01', 'Islam'),
('02', 'Kristen / Protestan'),
('03', 'Katholik'),
('04', 'Hindu'),
('05', 'Budha'),
('06', 'Khong Hu Chu'),
('99', 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nuptk` varchar(25) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nuptk`, `nama_guru`, `jenis_kelamin`) VALUES
(1, '153635351536', 'Pak Jo', 'L'),
(2, '1564058645', 'Bu Rina', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenjang_sekolah`
--

CREATE TABLE `tbl_jenjang_sekolah` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(100) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenjang_sekolah`
--

INSERT INTO `tbl_jenjang_sekolah` (`id_jenjang`, `nama_jenjang`, `jumlah_kelas`) VALUES
(1, 'SMP', 6),
(2, 'SMK', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `kd_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`kd_jurusan`, `nama_jurusan`) VALUES
('AP', 'Administrasi Perkantoran'),
('TKJ', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum`
--

CREATE TABLE `tbl_kurikulum` (
  `kd_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(100) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum`
--

INSERT INTO `tbl_kurikulum` (`kd_kurikulum`, `nama_kurikulum`, `is_aktif`) VALUES
(1, 'krikulum 2017', 'y'),
(2, '2013', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `kd_mapel` varchar(4) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`kd_mapel`, `nama_mapel`) VALUES
('bio', 'Biologi'),
('fis', 'Fisika 1'),
('ipa', 'Ilmu Pengetahuan Alam'),
('ips', 'Ilmu Pengetahuan Sosial'),
('mtk', 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`kd_ruangan`, `nama_ruangan`) VALUES
('tkj10', 'ruang kelas 10 tkj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah_info`
--

CREATE TABLE `tbl_sekolah_info` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `id_jenjang_sekolah` int(11) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sekolah_info`
--

INSERT INTO `tbl_sekolah_info` (`id_sekolah`, `nama_sekolah`, `id_jenjang_sekolah`, `alamat_sekolah`, `email`, `telp`) VALUES
(1, 'SMP Terpadu Hadziqiyyah Nalumsari Jeparas', 1, 'blok nglarangan', 'hadziqiyyah@gmail.com', '085727236452');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `temp_lahir` varchar(15) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `j_kelamin` enum('L','P') NOT NULL,
  `kd_agama` varchar(2) NOT NULL,
  `status_keluarga` varchar(15) NOT NULL,
  `anak_ke` int(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `kelas_diterima` varchar(12) NOT NULL,
  `tgl_diterima` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_orangtua` text NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `alamat_wali` text NOT NULL,
  `telp_wali` varchar(15) NOT NULL,
  `pekerjaan_wali` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama_siswa`, `temp_lahir`, `tgl_lahir`, `j_kelamin`, `kd_agama`, `status_keluarga`, `anak_ke`, `alamat`, `telp`, `asal_sekolah`, `kelas_diterima`, `tgl_diterima`, `nama_ayah`, `nama_ibu`, `alamat_orangtua`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `alamat_wali`, `telp_wali`, `pekerjaan_wali`, `foto`) VALUES
(1, '141240000238', 'Dedi Widarto', 'Jepara', '1996-01-23', 'L', '01', 'Kandung', 3, 'Sidigede', '089690427439', 'SD Sidigede', '1', '03-10-2017', 'bapak', 'ibuk', 'sidigede', 'tani', 'tani', 'waliku', 'sidigede', '089690427439', 'tani', ''),
(2, '141240000265', 'Muhammad Auliya Rochman', 'Jepara', '1995-08-17', 'L', '99', 'Kandung', 2, 'Rajekwesi, Mayong, Jepara', '089690123456', 'SMP Terpadu Hadziqiyyah', '1', '03-10-2017', 'bapake auliya', 'ibuke auliya', 'rajekwesi', 'programmer', 'analyst', 'nama wali', 'rajekwesi', '089690432561', 'mebelan', ''),
(3, '141240000239', 'Ade Danvi Bagus Alip', 'Jepara', '2017-09-13', 'L', '03', 'Kandung', 1, 'Telukawur', '089', 'SMK slam Jepara', '', '03-10-2017', 'bapake danvi', 'ibuke danvi', 'Telukawur', 'Nelayan', 'Guru', 'bapake', 'telukawor', '089', 'nelayan', ''),
(4, '141240000237', 'Rafy Irawan', 'Jepara', '07-11-1996', 'P', '06', 'Kandung', 2, 'asd', '089', 'SMK Islam Jepara', '2', '10-10-2017', 'bapake rafy', 'ibuke rafy', 'asd', 'Nelayan', 'Guru', 'bapake', 'asd', '089', 'nelayan', ''),
(5, '141240000265', 'wer', 'Jepara', '09-10-2017', 'P', '05', 'Kandung', 4, 'dtyuiy7j', '868', 'wrerte', '4', '08-10-2017', 'bapake jaelani', 'ibuke jaelani', 'jly', 'Nelayan', 'Guru', 'bapake', 'gjjy', '089', 'nelayan', 'koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahunakademik`
--

CREATE TABLE `tbl_tahunakademik` (
  `kd_tahunakademik` int(11) NOT NULL,
  `nama_tahunakademik` varchar(15) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahunakademik`
--

INSERT INTO `tbl_tahunakademik` (`kd_tahunakademik`, `nama_tahunakademik`, `is_aktif`) VALUES
(1, '2014 / 2015', 'y'),
(2, '2015 / 2016', 'y');

-- --------------------------------------------------------

--
-- Structure for view `agama`
--
DROP TABLE IF EXISTS `agama`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `agama`  AS  select `tbl_siswa`.`id_siswa` AS `id_siswa`,`tbl_agama`.`nama_agama` AS `nama_agama`,`tbl_siswa`.`kd_agama` AS `kd_agama` from (`tbl_agama` join `tbl_siswa` on((`tbl_agama`.`kd_agama` = `tbl_siswa`.`kd_agama`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`kd_agama`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_jenjang_sekolah`
--
ALTER TABLE `tbl_jenjang_sekolah`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  ADD PRIMARY KEY (`kd_kurikulum`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`kd_ruangan`);

--
-- Indexes for table `tbl_sekolah_info`
--
ALTER TABLE `tbl_sekolah_info`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_tahunakademik`
--
ALTER TABLE `tbl_tahunakademik`
  ADD PRIMARY KEY (`kd_tahunakademik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_jenjang_sekolah`
--
ALTER TABLE `tbl_jenjang_sekolah`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  MODIFY `kd_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sekolah_info`
--
ALTER TABLE `tbl_sekolah_info`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_tahunakademik`
--
ALTER TABLE `tbl_tahunakademik`
  MODIFY `kd_tahunakademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
