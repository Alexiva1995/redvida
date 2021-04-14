-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2021 a las 17:55:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redvida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `walletlog_rentabilidad`
--

CREATE TABLE `walletlog_rentabilidad` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idinversion` int(11) DEFAULT NULL,
  `concepto` varchar(200) NOT NULL,
  `debito` double NOT NULL,
  `credito` double NOT NULL,
  `balance` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `semana` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `fecha_pago` timestamp NULL DEFAULT NULL,
  `fecha_retiro` timestamp NULL DEFAULT NULL,
  `descuento` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `walletlog_rentabilidad`
--
ALTER TABLE `walletlog_rentabilidad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `walletlog_rentabilidad`
--
ALTER TABLE `walletlog_rentabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
