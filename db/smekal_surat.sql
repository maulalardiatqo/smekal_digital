-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(150) NOT NULL,
  `nama_surat` varchar(250) NOT NULL,
  `tanggal_surat` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `untuk_dari` varchar(250) NOT NULL,
  `jenis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `nomor_surat`, `nama_surat`, `tanggal_surat`, `keterangan`, `untuk_dari`, `jenis`) VALUES
(1, 'B/VI/2022', 'Permohonan Peminjaman Tempat', '2022-07-29', 'Permohonan Peminjaman Tempat PKD', 'PMII Kab Tegal', 1);
