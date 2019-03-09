-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2019 at 02:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penduduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id_person` int(255) NOT NULL,
  `name_person` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `income` int(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id_person`, `name_person`, `region_id`, `address`, `income`, `created_at`) VALUES
(1, 'Bambang', 1, 'Jln Solo - Sragen', 2000000, '2019-03-09 08:58:54'),
(7, 'Pria', 3, 'Kembangan', 2300000, '2019-03-09 08:59:20'),
(8, 'Gunawan', 1, 'Sidodadi', 1200000, '2019-03-09 08:59:39'),
(9, 'Bismar', 16, 'Sleman', 2500000, '2019-03-09 09:00:00'),
(10, 'Barep', 14, 'Condongcatur', 1900000, '2019-03-09 09:00:26'),
(12, 'Eko', 12, 'Salatiga', 1950000, '0000-00-00 00:00:00'),
(13, 'Siwi', 16, 'Uny', 3100000, '2019-03-09 09:06:38'),
(14, 'Aji', 3, 'nogosari', 1450000, '2019-03-09 10:07:30'),
(16, 'Riko', 14, 'Gronong', 2450000, '2019-03-09 10:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id_regions` int(255) NOT NULL,
  `name_regions` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id_regions`, `name_regions`, `created_at`) VALUES
(1, 'Solo', '2019-03-09 11:11:00'),
(3, 'Sragen', '2019-03-09 07:41:29'),
(12, 'Boyolali', '2019-03-09 07:41:33'),
(14, 'Klaten', '2019-03-09 07:41:50'),
(16, 'Sleman', '2019-03-09 07:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `created_at`) VALUES
(1, 'bambang@penduduk.com', 'c3ec0f7b054e729c5a716c8125839829', '2019-03-09 10:12:00'),
(2, 'coba@penduduk.com', 'c3ec0f7b054e729c5a716c8125839829', '2019-03-10 08:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id_regions`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id_regions` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `region_id` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id_regions`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
