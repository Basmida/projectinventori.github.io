-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 09:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `status_data` varchar(30) NOT NULL DEFAULT 'Mutasi',
  `keterangan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `merk`, `stock`, `satuan`, `kategori`, `status_data`, `keterangan`) VALUES
(38, 'BRG0012026', 'Pc', 'Asus', 205, 'Unit', 'Peralatan', 'Tersedia', ''),
(39, 'BRG0012023', 'Komputer', 'Hp', 20, 'Unit', 'Peralatan', 'Tersedia', ''),
(40, 'BRG001', 'Meja Kantor', 'Olimpic', 4, 'Unit', 'Peralatan', 'Tidak Tersedia', ''),
(41, 'BRG003456', 'Kabel', 'kabel', 15, 'Meter', 'Barang Habis Pakai', 'Tersedia', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `id_barang`, `jumlah`, `tanggal_masuk`) VALUES
(79, 39, 50, '0000-00-00'),
(80, 38, 1, '0000-00-00'),
(81, 38, 2, '0000-00-00'),
(82, 38, 3, '0000-00-00'),
(83, 41, 10, '2024-01-10'),
(84, 41, 8, '2024-01-10'),
(85, 38, 90, '2024-01-10'),
(86, 39, 30, '2024-01-12'),
(87, 38, 30, '2024-01-12'),
(88, 38, 30, '2024-01-12'),
(89, 40, 2, '2024-01-12'),
(90, 38, 2, '2024-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_mutasi` varchar(24) NOT NULL DEFAULT 'Mutasi',
  `Ruang` varchar(24) NOT NULL,
  `tanggal_mutasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_barang`, `jumlah`, `status_mutasi`, `Ruang`, `tanggal_mutasi`) VALUES
(8, 39, 10, 'Mutasi', 'E205', '2024-01-05'),
(15, 38, 6, 'Mutasi', 'E209', '2024-01-05'),
(23, 38, 6, 'Mutasi', 'E209', '2024-01-05'),
(25, 38, 6, 'Mutasi', 'E209', '2024-01-05'),
(26, 39, 31, 'Mutasi', 'E302', '2024-01-07'),
(27, 41, 3, 'Mutasi', 'Ruang Teknisi', '2024-01-06'),
(28, 39, 1, 'Mutasi', 'E303', '2024-01-07'),
(29, 38, 3, 'Mutasi', 'E201', '2024-01-07'),
(30, 39, 1, 'Mutasi', 'E206', '2024-01-08'),
(31, 41, 1, 'Mutasi', 'E201', '2024-01-08'),
(32, 39, 27, 'Mutasi', 'E206', '2024-01-10'),
(33, 39, 10, 'Mutasi', 'E202', '2024-01-12'),
(34, 38, 10, 'Mutasi', 'E202', '2024-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_barang`
--

CREATE TABLE `peminjaman_barang` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_pengembalian` date NOT NULL,
  `jaminan` varchar(20) NOT NULL,
  `status` varchar(24) NOT NULL DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_barang`
--

INSERT INTO `peminjaman_barang` (`id_peminjaman`, `id_user`, `id_barang`, `jumlah`, `tanggal_peminjaman`, `tanggal_pengembalian`, `jaminan`, `status`) VALUES
(56, 38, 38, 1, '2024-01-11', '2024-01-12', 'KTM', 'Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jenis_kelamin`, `email`, `password`, `no_hp`, `level`) VALUES
(27, 'Pimpinan', 'Laki-laki', 'pimpinan@gmail.com', 'pimpinan', '085265012678', 'pimpinan'),
(28, 'Admin', 'Laki-laki', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '081234567890', 'admin'),
(36, 'altap', 'Laki-laki', 'altap@gmail.com', '202cb962ac59075b964b07152d234b70', '08835747383', 'pimpinan'),
(37, 'Admin', 'Perempuan', 'admin11@gmail.com', '202cb962ac59075b964b07152d234b70', '081372114967', 'admin'),
(38, 'Rina', 'Perempuan', 'rina@gmail.com', 'rina', '023459045890', 'user'),
(41, 'Basmida Laia', 'Perempuan', 'basmida1@gmail.com', '202cb962ac59075b964b07152d234b70', '081372114967', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `mutasi_ibfk_1` (`id_barang`);

--
-- Indexes for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD CONSTRAINT `peminjaman_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_barang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
