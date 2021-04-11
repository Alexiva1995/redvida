-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2021 a las 15:48:21
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
-- Estructura de tabla para la tabla `user_campo`
--

CREATE TABLE `user_campo` (
  `ID` bigint(20) NOT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `genero` varchar(250) DEFAULT NULL,
  `edad` date DEFAULT NULL,
  `nameuser` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `document` varchar(250) DEFAULT NULL,
  `direccion2` varchar(250) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `ciudad` varchar(250) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fijo` varchar(20) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `banco` varchar(250) DEFAULT NULL,
  `Branch` varchar(250) DEFAULT NULL,
  `titular` varchar(250) DEFAULT NULL,
  `cuenta` float DEFAULT NULL,
  `ifsc` varchar(250) DEFAULT NULL,
  `pan` float DEFAULT NULL,
  `paypal` varchar(250) DEFAULT NULL,
  `blocktrail` varchar(250) DEFAULT NULL,
  `blockchain` varchar(250) DEFAULT NULL,
  `bitgo` varchar(250) DEFAULT NULL,
  `pais` varchar(250) DEFAULT NULL,
  `pago` varchar(250) DEFAULT NULL,
  `wallet` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user_campo`
--
ALTER TABLE `user_campo`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
