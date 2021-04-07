-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2021 a las 16:00:44
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
-- Estructura de tabla para la tabla `liquidations`
--

CREATE TABLE `liquidations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `wallet` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `payment_ref` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `process_date` date DEFAULT NULL,
  `comment_reverse` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Pendiente. 1 = Liquidada. 2 = Reversada',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `liquidations`
--

INSERT INTO `liquidations` (`id`, `user_id`, `amount`, `wallet`, `comment`, `payment_ref`, `date`, `process_date`, `comment_reverse`, `status`, `created_at`, `updated_at`) VALUES
(1, 85, 50, 'fd5g45df1gfd5CGJJKKj4582', NULL, NULL, '2021-04-01', NULL, NULL, 0, '2021-04-01 09:35:32', '2021-04-01 09:35:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `liquidations`
--
ALTER TABLE `liquidations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `liquidations`
--
ALTER TABLE `liquidations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;