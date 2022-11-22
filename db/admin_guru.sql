-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2022 pada 06.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `admin_guru`
--

CREATE TABLE `admin_guru` (
  `id` int(11) NOT NULL,
  `kode_guru` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tahun_ajaran` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_guru`
--

INSERT INTO `admin_guru` (`id`, `kode_guru`, `jenis`, `mapel_id`, `kelas_id`, `tahun_ajaran`, `file`) VALUES
(2, 23, 1, 1, 7, '2022/2023', 'administrai23jenis1mapel1kelas7waktu1669090298');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_guru`
--
ALTER TABLE `admin_guru`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_guru`
--
ALTER TABLE `admin_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
