-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2021 at 05:02 PM
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
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `cantidad` varchar(250) DEFAULT NULL,
  `valor_preferente` varchar(250) DEFAULT NULL,
  `valor_publico` varchar(250) DEFAULT NULL,
  `valor_comisionable_pts` varchar(250) DEFAULT NULL,
  `pts_compra_mensual` varchar(250) DEFAULT NULL,
  `pts_compra_rangos` varchar(250) DEFAULT NULL,
  `pts_compra_premios` varchar(250) DEFAULT NULL,
  `valor_pts_compra` varchar(250) DEFAULT NULL,
  `estado` enum('0','1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Inactivo, 1 - Activo, 2 - Agotado, 3 - No disponible',
  `photoDB` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `producto`, `descripcion`, `cantidad`, `valor_preferente`, `valor_publico`, `valor_comisionable_pts`, `pts_compra_mensual`, `pts_compra_rangos`, `pts_compra_premios`, `valor_pts_compra`, `estado`, `photoDB`, `created_at`, `updated_at`) VALUES
(1, 'Mix Nutrex', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', '280.00', '400.00', '30', '30', '30', '30', '60', '1', '1_14297_prod1.png', '2021-04-03 18:50:35', '2021-04-05 20:53:30'),
(2, 'Café Suero de Leche', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', '150.00', '200.00', '20', '20', '20', '20', '40', '1', '2_17189_prod2.png', '2021-04-03 18:51:18', '2021-04-05 22:45:10'),
(3, 'Mix Café S', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', '202', '270.00', '20', '20', '20', '20', '40', '1', '3_16840_prod3.png', '2021-04-03 18:52:09', '2021-04-05 22:45:19'),
(4, 'Mix 4 en 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', '200.00', '20.00', '20', '20', '20', '20', '40', '1', '4_21054_prod4.png', '2021-04-03 18:52:39', '2021-04-05 22:45:29'),
(5, 'Paquete Basico', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', NULL, '840.00', NULL, NULL, NULL, NULL, NULL, '1', '5_200873_paq1.png', '2021-04-03 19:56:46', '2021-04-05 22:45:41'),
(6, 'Paquete Avanzado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', NULL, '2340.00', NULL, NULL, NULL, NULL, NULL, '1', '6_31266_paq2.png', '2021-04-03 19:58:48', '2021-04-05 22:45:49'),
(7, 'Paquete Master', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', NULL, '5760.00', NULL, NULL, NULL, NULL, NULL, '1', '7_76158_paq3.png', '2021-04-03 19:59:12', '2021-04-05 22:45:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
