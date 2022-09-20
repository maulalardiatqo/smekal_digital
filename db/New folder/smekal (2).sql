-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 03:24 PM
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
-- Table structure for table `casis`
--

CREATE TABLE `casis` (
  `id` int(11) NOT NULL,
  `nama_casis` varchar(250) NOT NULL,
  `asal_sekolah` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `gender` int(1) NOT NULL,
  `pendamping` varchar(250) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `bukti` varchar(250) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casis`
--

INSERT INTO `casis` (`id`, `nama_casis`, `asal_sekolah`, `alamat`, `gender`, `pendamping`, `kontak`, `bukti`, `status`) VALUES
(4, 'Sulam', 'MTS', 'BLP', 1, 'MAULAL ARDI ATQO', '088889996655', 'Ijazah', 2);

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
  `tahun_masuk` varchar(250) NOT NULL,
  `salary_per_hour` double NOT NULL DEFAULT 29000,
  `jam_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `kode`, `nama`, `pendidikan_terakhir`, `gender`, `jabatan`, `kontak`, `tahun_masuk`, `salary_per_hour`, `jam_kerja`) VALUES
(1, 1, 'AMIRUL MU\'MININ', 'S2', 1, '0', '088889996655', '2007', 29000, 32),
(2, 2, 'Lilis Anjas wati', 'S1', 2, 'Waka Kurikulum', '08925225522', '2008', 29000, 0),
(6, 23, 'MAULAL ARDI ATQO', 'S1', 1, 'KA. PRODI TKJ', '089619166878', '2020', 29000, 0);

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
-- Table structure for table `jenispemasukan`
--

CREATE TABLE `jenispemasukan` (
  `id` int(11) NOT NULL,
  `desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenispemasukan`
--

INSERT INTO `jenispemasukan` (`id`, `desc`) VALUES
(1, 'SPP');

-- --------------------------------------------------------

--
-- Table structure for table `jenispengeluaran`
--

CREATE TABLE `jenispengeluaran` (
  `id` int(11) NOT NULL,
  `desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat` varchar(250) NOT NULL,
  `prodi` varchar(250) NOT NULL,
  `rombel` varchar(250) NOT NULL,
  `walas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat`, `prodi`, `rombel`, `walas`) VALUES
(3, 'X', 'TKJ', 'A', 6),
(7, 'XI', 'TKJ', 'A', 1);

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

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `type`, `id_siswa`, `id_guru`, `keterangan`, `tanggal_pemasukan`, `jumlah`) VALUES
(1, '1', '13', NULL, 'Pembayaran SPP Bulan Agustus', '2022-12-08 00:00:00', 25000);

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
  `tanggal_pengeluaran` date NOT NULL,
  `jumlah` double DEFAULT NULL,
  `status_gaji` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `type`, `id_siswa`, `id_guru`, `keterangan`, `tanggal_pemasukan`, `tanggal_pengeluaran`, `jumlah`, `status_gaji`) VALUES
(1, '1', NULL, '1', 'Pemberian Gaji bulan 09 tahun 2022', NULL, '2022-09-20', 928000, 'MENUNGGU KONFIRMASI');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(250) NOT NULL,
  `ka_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `ka_prodi`) VALUES
(1, 'TKJ', 23),
(2, 'TKR', 0),
(3, 'A-PKM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rfgeneral`
--

CREATE TABLE `rfgeneral` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `role_id` varchar(20) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfgeneral`
--

INSERT INTO `rfgeneral` (`id`, `type`, `role_id`, `desc`) VALUES
(1, 'jenis_pemasukan', NULL, 'SPP'),
(2, 'jenis_pemasukan', NULL, 'Lainya'),
(3, 'jabatan', '4', 'Guru');

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
  `tahun_masuk` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `nisn`, `alamat`, `gender`, `nama_ibu`, `kelas`, `kontak`, `tahun_masuk`, `is_active`) VALUES
(15, 'Suilman', '3210.10', '0', 'Kambangan', 1, 'SITI MARWATI', '6', '088889996655', '2019', 0),
(17, 'AHMAD SAIFURROZIQ', '11111', '0', 'kambangan', 1, 'SITI MARWATI', '7', '088889996655', '2019', 0),
(18, 'Fitri', '222.111', '-', 'Balaradin', 2, 'SITI MARWATI', '3', '088889996655', '2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spp_master`
--

CREATE TABLE `spp_master` (
  `id` int(11) NOT NULL,
  `tahun_masuk` varchar(250) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp_master`
--

INSERT INTO `spp_master` (`id`, `tahun_masuk`, `jumlah`) VALUES
(1, '2022', 180000),
(2, '2022', 190000);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(150) NOT NULL,
  `nama_surat` varchar(250) NOT NULL,
  `tanggal_surat` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `dari` varchar(250) NOT NULL,
  `untuk` varchar(250) NOT NULL,
  `jenis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `nomor_surat`, `nama_surat`, `tanggal_surat`, `keterangan`, `dari`, `untuk`, `jenis`) VALUES
(0, 'B/VI/2022/SMK', 'PERMOHONAN', '2022-07-30', 'PERMOHONAN PEMINJAMAN TEMPAT', 'PMII KOMSAT IBU SINA', 'KEPALA SMK AL AMIRIYAH', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `tanggal_tenggang` datetime DEFAULT NULL,
  `desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_detail`
--

CREATE TABLE `tagihan_detail` (
  `id` int(11) NOT NULL,
  `id_tagihan` varchar(20) DEFAULT NULL,
  `to` varchar(45) DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22, 'Admin PPDB', 'user_default.png', 'adminPPDB', '$2y$10$N7nlbnoo5qJpxMsiM8cUrOnYpBLGfbiY6udUtFgLfIKpJgOoJSXoG', 6, 1, '1659787996'),
(25, 'Suilman', 'user_default.png', '3210.10', '$2y$10$.yG.XS.7Rk5V0SGEUldDDeQdw0vwN1uS/6M97mLiFGfYxvF.W9fju', 5, 0, '2022-08-19 20:37:14'),
(27, 'AHMAD SAIFURROZIQ', 'user_default.png', '11111', '$2y$10$2J07msifOeTvwmJO2iqtcOAAmYczXg4ahe.rdoEu58Q.pPE5EoIvC', 5, 0, '2022-08-31 01:17:22'),
(28, 'Piket BK', 'user_default.png', 'adminPiket', '$2y$10$uEalY7PZQQr66oVrWXhBW.IsDeIe6km1tUk/r91y5gMvmBug8Dajm', 1, 1, '1662117450'),
(29, 'Fitri', 'user_default.png', '222.111', '$2y$10$nwF2mP6nNnfWIrRO2ea0muPmnewPFtjwAYySatGG3DLkeVrp.6aUC', 5, 1, '2022-09-14 21:48:14');

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
-- Indexes for table `casis`
--
ALTER TABLE `casis`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `jenispemasukan`
--
ALTER TABLE `jenispemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenispengeluaran`
--
ALTER TABLE `jenispengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

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
-- Indexes for table `spp_master`
--
ALTER TABLE `spp_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan_detail`
--
ALTER TABLE `tagihan_detail`
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
-- AUTO_INCREMENT for table `casis`
--
ALTER TABLE `casis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenispemasukan`
--
ALTER TABLE `jenispemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenispengeluaran`
--
ALTER TABLE `jenispengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rfgeneral`
--
ALTER TABLE `rfgeneral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `spp_master`
--
ALTER TABLE `spp_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tagihan_detail`
--
ALTER TABLE `tagihan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
