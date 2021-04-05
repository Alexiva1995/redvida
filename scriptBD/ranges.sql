-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2021 at 08:42 PM
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
-- Table structure for table `ranges`
--

CREATE TABLE `ranges` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `act_direct` varchar(250) DEFAULT NULL,
  `diamond_directors` varchar(250) DEFAULT NULL,
  `level` varchar(250) DEFAULT NULL,
  `group_vol` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `photoDB` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `name`, `act_direct`, `diamond_directors`, `level`, `group_vol`, `status`, `photoDB`, `created_at`, `updated_at`) VALUES
(1, 'Rango Distribuidor', '3', NULL, '1', NULL, 1, '1_27841_1.png', '2021-04-04 02:25:12', '2021-04-05 19:49:43'),
(2, 'Rango Emprendedor', '3', NULL, '3', '1800', 1, '2_28354_2.png', '2021-04-04 02:25:48', '2021-04-05 19:49:50'),
(3, 'Ejecutivo', '4', NULL, '3', '4000', 1, '3_23907_3.png', '2021-04-04 02:26:36', '2021-04-05 19:49:58'),
(4, 'Ejecutivo Bronce', '4', NULL, '4', '6500', 1, '4_28326_4.png', '2021-04-04 02:42:27', '2021-04-05 19:50:06'),
(5, 'Ejecutivo Plata', '4', NULL, '4', '11000', 1, '5_27683_5.png', '2021-04-04 02:42:50', '2021-04-05 19:50:15'),
(6, 'Ejecutivo Oro', '5', NULL, '4', '16000', 1, '6_27765_6.png', '2021-04-04 02:43:07', '2021-04-05 19:50:23'),
(7, 'Ejecutivo Platino', '5', NULL, '5', '20000', 1, '7_28015_7.png', '2021-04-04 02:43:26', '2021-04-05 19:50:32'),
(8, 'Ejecutivo Zafiro', '6', NULL, '5', '26000', 1, '8_28415_8.png', '2021-04-04 02:43:48', '2021-04-05 19:50:41'),
(9, 'Director Rubí', '6', NULL, '5', '35000', 1, '9_27795_9.png', '2021-04-04 02:44:57', '2021-04-05 19:50:49'),
(10, 'Director Esmeralda', '7', NULL, '6', '55000', 1, '10_26648_10.png', '2021-04-04 02:45:17', '2021-04-05 19:50:58'),
(11, 'Director Diamante', '7', NULL, '6', '80000', 1, '11_27117_11.png', '2021-04-04 02:45:39', '2021-04-05 19:51:08'),
(12, 'Director Doble Diamante', '8', NULL, '8', '150000', 1, '12_27447_12.png', '2021-04-04 02:45:59', '2021-04-05 19:51:22'),
(13, 'Embajador', '10', '2', '10', '350000', 1, '13_27446_13.png', '2021-04-04 02:46:18', '2021-04-05 19:51:31'),
(14, 'Embajador Estrella', '10', '3', '10', '750000', 1, '14_29135_14.png', '2021-04-04 02:46:59', '2021-04-05 19:51:44'),
(15, 'Embajador Presidencial', '12', '4', '10', '1500000', 1, '15_25818_15.png', '2021-04-04 02:47:25', '2021-04-05 19:51:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
