-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 02:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smekal`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `kode` int(150) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `pendidikan_terakhir` varchar(250) NOT NULL,
  `gender` int(1) NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `kontak` varchar(250) NOT NULL,
  `tahun_masuk` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `kode`, `nama`, `pendidikan_terakhir`, `gender`, `jabatan`, `kontak`, `tahun_masuk`) VALUES
(1, 1, 'AMIRUL MU\'MININ', 'S2', 1, 'KEPALA SEKOLAH', '088889996655', '2007'),
(2, 2, 'Lilis Anjas wati', 'S1', 2, 'Waka Kurikulum', '08925225522', '2008'),
(6, 23, 'MAULAL ARDI ATQO', 'S1', 1, 'KA. PRODI TKJ', '088889996655', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `kode` int(1) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `spek` varchar(250) NOT NULL,
  `kondisi` varchar(250) NOT NULL,
  `jumlah` varchar(250) NOT NULL,
  `tempat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `kode`, `nama_barang`, `spek`, `kondisi`, `jumlah`, `tempat`) VALUES
(1, 1, 'Monitor ', 'Merk HP', 'Baru', '7', 'Lab Bawah'),
(4, 2, 'Komputer', 'Core i3, Ram 4gb', 'Baru', '2', 'Perbankan'),
(5, 3, 'Motor', 'Supra', 'Rusak', '1', 'Bengkel');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `tingkat` varchar(250) NOT NULL,
  `prodi` varchar(250) NOT NULL,
  `rombel` varchar(250) NOT NULL,
  `walas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `prodi`, `rombel`, `walas`) VALUES
(3, 'X', 'TKJ', 'A', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `id_siswa` varchar(20) DEFAULT NULL,
  `id_guru` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_pemasukan` datetime DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `id_siswa` varchar(20) DEFAULT NULL,
  `id_guru` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_pemasukan` datetime DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'TKJ'),
(2, 'TKR'),
(3, 'A-PKM');

-- --------------------------------------------------------

--
-- Table structure for table `rfgeneral`
--

CREATE TABLE `rfgeneral` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfgeneral`
--

INSERT INTO `rfgeneral` (`id`, `type`, `desc`) VALUES
(1, 'jenis_pemasukan', 'SPP'),
(2, 'jenis_pemasukan', 'Lainya');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nis` varchar(250) NOT NULL,
  `nisn` varchar(250) NOT NULL,
  `alamat` longtext NOT NULL,
  `gender` int(1) NOT NULL,
  `nama_ibu` varchar(250) NOT NULL,
  `kelas` varchar(250) NOT NULL,
  `kontak` varchar(250) NOT NULL,
  `tahun_masuk` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `nisn`, `alamat`, `gender`, `nama_ibu`, `kelas`, `kontak`, `tahun_masuk`) VALUES
(6, 'AHMAD SAIFURROZIQ', '11111', '0', 'Kambangan', 1, 'SITI MARWATI', 'XII TKJ A', '088889996655', '2019'),
(7, 'IKA ISMA', '22222', '0', 'Kambangan', 2, 'SITI MARWATI', 'XII TKJ A', '088889996655', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `foto`, `username`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(1, 'Admin', 'user_default.png', 'admin', '$2y$10$t1DiBamGFU1D5rVJpYVrqeLzLo5KocvT0RWWgEWM0yG5PuVhBMR6K', 1, 1, '1658495229'),
(2, 'Kepala Sekolah', 'user_default.png', 'kepsek', '$2y$10$O.wTTrX7h7k807vYOCmC5.vSkJtx9bs63mxj2A/k4iv1ReRrw/K/m', 2, 1, '1658584445'),
(3, 'Waka Kurikulum', 'user_default.png', 'kurikulum', '$2y$10$hRthRoaPZwBcfwNx0EiCa.0v3JthXSfPebwSiOtkEfvwuXs46kY/m', 3, 1, '1658584464'),
(10, 'MAULAL ARDI ATQO', 'user_default.png', '23', '$2y$10$bC4LLUK5S9nvDvqbOnlipe5Wq1zaBHVFsfZ1c8mixhAb7VIL19DTq', 4, 1, '2022-07-26 21:38:56'),
(13, 'AHMAD SAIFURROZIQ', 'user_default.png', '11111', '$2y$10$4LMtPcRcabpE2pkuHXZ9b.needVRLhYhBen7m5ghSHAa5XZA19S66', 5, 1, '2022-07-26 21:53:29'),
(14, 'IKA ISMA', 'user_default.png', '22222', '$2y$10$.DggW/lPLi1oMC77kZHeWek34lau1enTyody3a8ct.Np7JGGG5i06', 5, 1, '2022-07-26 22:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'kepsek'),
(3, 'waka'),
(4, 'guru'),
(5, 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `rfgeneral`
--
ALTER TABLE `rfgeneral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rfgeneral`
--
ALTER TABLE `rfgeneral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
