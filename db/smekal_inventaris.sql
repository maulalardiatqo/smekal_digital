
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