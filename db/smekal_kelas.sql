
--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(250) NOT NULL,
  `prodi` varchar(250) NOT NULL,
  `walas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `prodi`, `walas`) VALUES
(1, 'X TKJ A', 'TKJ', 5);

-- --------------------------------------------------------