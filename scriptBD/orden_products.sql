-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2021 at 05:04 AM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `orden_products`
--

CREATE TABLE `orden_products` (
  `id` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `product` varchar(250) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orden_products`
--

INSERT INTO `orden_products` (`id`, `iduser`, `id_product`, `product`, `price`, `amount`, `created_at`, `updated_at`) VALUES
(21, 85, 2, 'Café Suero de Leche', 200, '1', '2021-04-08 01:49:08', '2021-04-08 01:49:08'),
(22, 85, 1, 'Mix Nutrex', 400, '1', '2021-04-08 01:49:10', '2021-04-08 01:49:10'),
(24, 85, 4, 'Mix 4 en 1', 15, '1', '2021-04-08 12:00:25', '2021-04-08 12:00:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orden_products`
--
ALTER TABLE `orden_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orden_products`
--
ALTER TABLE `orden_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
