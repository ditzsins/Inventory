-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 10:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_barang`
--

CREATE TABLE `t_barang` (
  `kode` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_barang`
--

INSERT INTO `t_barang` (`kode`, `nama`) VALUES
(871233, 'Teh Celup'),
(871234, 'Rinso'),
(871235, 'Harpic'),
(871236, 'Sabun Lifebuoy'),
(871237, 'Sabun Lux'),
(871238, 'Sabun Duff'),
(871239, 'Sabun JF Sulfur'),
(871240, 'Nivea Body Wash'),
(871241, 'Shampoo Pantene'),
(871242, 'Shampoo Lifebuoy'),
(871243, 'Shampoo Clear'),
(871244, 'Pasta Gigi Pepsodent'),
(871245, 'Pasta Gigi Close Up'),
(871246, 'Pasta Gigi Enzim'),
(871247, 'Sabun Colek Ekonomi'),
(871248, 'Sabun Colek BuKrim'),
(871249, 'Sabun Colek Wings'),
(871250, 'Sabun Colek'),
(871251, 'Kecap Bango'),
(871252, 'Kecap ABC'),
(871253, 'Kecap Sedap'),
(871254, 'Saos ABC'),
(871255, 'Saos Tiram (Saori)'),
(876455, 'Teh Botol'),
(876456, 'Astor'),
(876457, 'Pocari Sweat'),
(876458, 'Larutan Cap Kaki Tiga');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_barang`
--

CREATE TABLE `t_detail_barang` (
  `id_detail_barang` int(11) NOT NULL,
  `kode_barang` int(255) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_detail_barang`
--

INSERT INTO `t_detail_barang` (`id_detail_barang`, `kode_barang`, `kadaluarsa`, `kuantitas`) VALUES
(1, 876456, '2018-09-07', 5),
(2, 871235, '2018-09-08', 25),
(3, 871252, '2018-10-31', 20),
(4, 871251, '2018-11-30', 170),
(5, 871253, '2018-12-31', 250),
(6, 876458, '2018-10-31', 0),
(7, 871240, '2019-09-30', 200),
(8, 871245, '2019-05-31', 20),
(9, 871246, '2019-04-25', 0),
(10, 871244, '2019-09-30', 55),
(11, 876457, '2020-01-01', 350),
(12, 871234, '2019-03-20', 200),
(13, 871250, '2019-05-31', 0),
(14, 871248, '2019-01-31', 5),
(15, 871247, '2019-03-31', 25),
(16, 871249, '2018-12-31', 50),
(17, 871238, '2019-07-31', 10),
(18, 871239, '2019-06-30', 10),
(19, 876455, '2019-09-26', 180),
(20, 871255, '2020-01-28', 15),
(21, 876456, '2019-04-30', 50),
(22, 871252, '2019-01-02', 500),
(23, 876456, '2019-04-12', 30),
(23276129, 876456, '2019-04-12', 500);

-- --------------------------------------------------------

--
-- Table structure for table `t_pemasukan`
--

CREATE TABLE `t_pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_detail_barang` int(11) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemasukan`
--

INSERT INTO `t_pemasukan` (`id_pemasukan`, `tgl_masuk`, `id_detail_barang`, `kadaluarsa`, `kuantitas`, `admin`, `id_supplier`) VALUES
(1, '2018-07-31', 1, '2018-09-07', 150, 'Aditya Pratama Dharmawan', 1),
(2, '2018-07-29', 2, '2018-09-08', 125, 'Dheannisa Ramadhani Putri', 2),
(3, '2018-06-03', 3, '2018-10-31', 120, 'Dwita Wulandari', 1),
(4, '2018-04-01', 4, '2018-11-30', 170, 'Jefri Febriyanto', 2),
(5, '2018-06-12', 5, '2018-12-31', 250, 'Aditya Pratama Dharmawan', 1),
(6, '2018-08-01', 6, '2018-10-31', 250, 'Jefri Febriyanto', 2),
(7, '2018-01-01', 7, '2019-09-30', 200, 'Dwita Wulandari', 2),
(8, '2018-07-04', 8, '2019-05-31', 300, 'Jefri Febriyanto', 2),
(9, '2018-06-20', 9, '2019-04-25', 250, 'Dheannisa Ramadhani Putri', 2),
(10, '2018-04-04', 10, '2019-09-30', 255, 'Aditya Pratama Dharmawan', 2),
(11, '2018-08-01', 11, '2020-01-01', 350, 'Dheannisa Ramadhani Putri', 1),
(12, '2018-07-31', 12, '2019-03-20', 200, 'Jefri Febriyanto', 2),
(13, '2018-06-06', 13, '2019-05-31', 100, 'Dwita Wulandari', 2),
(14, '2018-05-08', 14, '2019-01-31', 80, 'Dwita Wulandari', 2),
(15, '2018-04-04', 15, '2019-03-31', 145, 'Jefri Febriyanto', 2),
(16, '2018-08-01', 16, '2018-12-31', 50, 'Jefri Febriyanto', 2),
(17, '2018-05-31', 17, '2019-07-31', 150, 'Dheannisa Ramadhani Putri', 2),
(18, '2018-03-05', 18, '2019-06-30', 75, 'Jefri Febriyanto', 2),
(19, '2018-05-02', 19, '2019-09-26', 180, 'Dwita Wulandari', 1),
(20, '2018-04-04', 20, '2020-01-28', 125, 'Dheannisa Ramadhani Putri', 1),
(21, '2018-07-31', 21, '2019-04-30', 200, 'Dheannisa Ramadhani Putri', 1),
(22, '2018-08-02', 22, '2019-01-02', 500, 'Dheannisa Ramadhani Putri', 2),
(23276129, '2018-12-26', 23276129, '2019-04-12', 500, 'Aditya Pratama Dharmawan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_pengeluaran`
--

CREATE TABLE `t_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_detail_barang` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pengeluaran`
--

INSERT INTO `t_pengeluaran` (`id_pengeluaran`, `tgl_keluar`, `id_detail_barang`, `kuantitas`, `admin`) VALUES
(1, '2018-10-18', 2, 100, 'Jefri Febriyanto'),
(2, '2018-08-31', 3, 100, 'Dheannisa Ramadhani Putri'),
(3, '2018-06-12', 6, 150, 'Dwita Wulandari'),
(4, '2018-06-10', 14, 75, 'Jefri Febriyanto'),
(5, '2018-07-02', 15, 120, 'Dheannisa Ramadhani Putri'),
(6, '2018-06-27', 18, 65, 'Aditya Pratama Dharmawan'),
(7, '2018-06-15', 1, 125, 'Dwita Wulandari'),
(8, '2018-08-01', 13, 100, 'Jefri Febriyanto'),
(9, '2018-06-06', 21, 150, 'Dwita Wulandari'),
(10, '2018-07-03', 10, 200, 'Jefri Febriyanto'),
(11, '2018-06-01', 8, 280, 'Dheannisa Ramadhani Putri'),
(12, '2018-07-07', 6, 100, 'Aditya Pratama Dharmawan'),
(13, '2018-05-16', 17, 140, 'Jefri Febriyanto'),
(14, '2018-08-04', 20, 110, 'Dheannisa Ramadhani Putri'),
(15, '2018-07-24', 9, 250, 'Dwita Wulandari'),
(98, '2018-08-02', 1, 20, 'Dheannisa Ramadhani Putri');

-- --------------------------------------------------------

--
-- Table structure for table `t_supplier`
--

CREATE TABLE `t_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_supplier`
--

INSERT INTO `t_supplier` (`id_supplier`, `nama`) VALUES
(1, 'PT. Mayora Indah Tbk'),
(2, 'PT. Unilever Indonesia Tbk'),
(3, 'PT Maju mundur');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'aditya', 'aditya', 'Aditya Pratama Dharmawan'),
(2, 'dheannisa', 'dheannisa', 'Dheannisa Ramadhani Putri'),
(3, 'dwita', 'dwita', 'Dwita Wulandari'),
(4, 'jefri', 'jefri', 'Jefri Febriyanto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `t_detail_barang`
--
ALTER TABLE `t_detail_barang`
  ADD PRIMARY KEY (`id_detail_barang`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `t_pemasukan`
--
ALTER TABLE `t_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_detail_barang` (`id_detail_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `t_pengeluaran`
--
ALTER TABLE `t_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_detail_barang` (`id_detail_barang`);

--
-- Indexes for table `t_supplier`
--
ALTER TABLE `t_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=876459;

--
-- AUTO_INCREMENT for table `t_detail_barang`
--
ALTER TABLE `t_detail_barang`
  MODIFY `id_detail_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23276130;

--
-- AUTO_INCREMENT for table `t_supplier`
--
ALTER TABLE `t_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_detail_barang`
--
ALTER TABLE `t_detail_barang`
  ADD CONSTRAINT `t_detail_barang_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `t_barang` (`kode`);

--
-- Constraints for table `t_pemasukan`
--
ALTER TABLE `t_pemasukan`
  ADD CONSTRAINT `t_pemasukan_ibfk_1` FOREIGN KEY (`id_detail_barang`) REFERENCES `t_detail_barang` (`id_detail_barang`),
  ADD CONSTRAINT `t_pemasukan_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `t_supplier` (`id_supplier`);

--
-- Constraints for table `t_pengeluaran`
--
ALTER TABLE `t_pengeluaran`
  ADD CONSTRAINT `t_pengeluaran_ibfk_1` FOREIGN KEY (`id_detail_barang`) REFERENCES `t_detail_barang` (`id_detail_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
