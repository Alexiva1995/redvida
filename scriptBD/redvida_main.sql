-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2021 at 04:17 PM
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
-- Database: `redvida_main`
--
CREATE DATABASE IF NOT EXISTS `redvida_main` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `redvida_main`;

-- --------------------------------------------------------

--
-- Table structure for table `coinpayment_transactions`
--

CREATE TABLE `coinpayment_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `txn_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirms_needed` int(11) DEFAULT NULL,
  `payment_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrcode_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receivedf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recv_confirms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idorden` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `amount` double NOT NULL,
  `referred_id` int(11) NOT NULL,
  `referred_level` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `liquidation_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `arbol` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `label` varchar(250) NOT NULL,
  `nameinput` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `requerido` tinyint(1) NOT NULL DEFAULT 0,
  `input_edad` tinyint(1) NOT NULL DEFAULT 0,
  `tipo` varchar(200) NOT NULL DEFAULT 'text',
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `desactivable` tinyint(1) NOT NULL DEFAULT 1,
  `unico` int(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulario`
--

INSERT INTO `formulario` (`id`, `label`, `nameinput`, `estado`, `requerido`, `input_edad`, `tipo`, `min`, `max`, `desactivable`, `unico`, `created_at`, `updated_at`) VALUES
(1, 'Nombre', 'firstname', 0, 1, 0, 'text', 0, 0, 1, 0, '2020-02-18 02:20:54', '2020-02-18 06:20:54'),
(2, 'Apellido', 'lastname', 0, 1, 0, 'text', 0, 0, 1, 0, '2020-02-18 02:20:57', '2020-02-18 06:20:57'),
(3, 'Sexo', 'genero', 0, 0, 0, 'select', 0, 0, 1, 0, '2020-02-18 02:19:14', '2020-02-18 06:19:14'),
(4, 'Fecha de Nacimiento', 'edad', 0, 1, 1, 'date', 0, 0, 1, 0, '2020-02-18 02:19:17', '2020-02-18 06:19:17'),
(5, 'Usuario', 'nameuser', 0, 1, 0, 'text', 0, 0, 1, 1, '2020-02-18 02:21:00', '2020-02-18 06:21:00'),
(12, 'N de Documento', 'document', 0, 1, 0, 'text', 5, 20, 1, 0, '2020-02-18 02:19:24', '2020-02-18 06:19:24'),
(7, 'Direccion', 'direccion', 0, 1, 0, 'text', 0, 0, 1, 0, '2020-02-18 02:19:21', '2020-02-18 06:19:21'),
(13, 'Direccion 2', 'direccion2', 0, 0, 0, 'text', 5, 100, 1, 0, '2019-02-18 15:48:46', '2019-01-30 03:19:23'),
(18, 'Estado', 'estado', 0, 1, 0, 'text', 20, 100, 1, 0, '2019-02-18 15:48:49', '2019-01-30 03:51:28'),
(38, 'Pais', 'pais', 0, 1, 0, 'text', 5, 20, 1, 0, '2020-02-18 02:19:37', '2020-02-18 06:19:37'),
(19, 'Ciudad', 'ciudad', 0, 1, 0, 'text', 3, 100, 1, 0, '2020-02-18 02:19:28', '2020-02-18 06:19:28'),
(20, 'Codigo Postal', 'codigo', 0, 0, 0, 'text', 7, 10, 1, 0, '2019-02-18 15:48:56', '2019-01-30 03:52:34'),
(21, 'Celular', 'phone', 0, 0, 0, 'number', 0, 0, 1, 0, '2019-02-18 15:48:59', '2019-01-30 19:18:56'),
(22, 'Telefono fijo', 'fijo', 0, 0, 0, 'number', 0, 0, 1, 0, '2019-02-18 15:49:01', '2019-01-30 03:54:11'),
(23, 'Facebook', 'facebook', 0, 0, 0, 'url', 30, 100, 1, 0, '2019-02-18 15:49:07', '2019-01-30 03:59:43'),
(24, 'Twitter', 'twitter', 0, 0, 0, 'url', 30, 100, 1, 0, '2019-02-18 15:49:09', '2019-01-30 04:01:10'),
(25, 'Nombre del Banco', 'banco', 0, 0, 0, 'text', 20, 40, 1, 0, '2019-02-18 15:49:11', '2019-01-30 04:01:45'),
(26, 'Nombre de la rama', 'Branch', 0, 0, 0, 'text', 20, 50, 1, 0, '2019-02-18 15:49:14', '2019-01-30 04:03:42'),
(27, 'Titular de la cuenta', 'titular', 0, 0, 0, 'text', 20, 40, 1, 0, '2019-02-18 15:49:16', '2019-01-30 04:04:11'),
(28, 'Numero de cuenta', 'cuenta', 0, 0, 0, 'number', 0, 0, 1, 0, '2019-02-18 15:49:18', '2019-01-30 04:04:38'),
(29, 'Codigo IFSC', 'ifsc', 0, 0, 0, 'text', 0, 0, 1, 0, '2019-02-18 15:49:21', '2019-02-01 18:47:25'),
(30, 'Numero PAN', 'pan', 0, 0, 0, 'number', 0, 0, 1, 0, '2019-02-18 15:49:23', '2019-01-30 04:07:15'),
(31, 'Cuenta Paypal', 'paypal', 0, 0, 0, 'text', 10, 20, 1, 0, '2019-02-18 15:49:25', '2019-01-30 04:08:26'),
(32, 'Direccion de Blocktrail', 'blocktrail', 0, 0, 0, 'text', 10, 20, 1, 0, '2019-02-18 15:49:27', '2019-01-30 04:09:16'),
(33, 'Direccion de blockchain', 'blockchain', 0, 0, 0, 'text', 10, 20, 1, 0, '2019-02-18 15:49:29', '2019-01-30 04:09:40'),
(34, 'Direccion de Bitgo', 'bitgo', 0, 0, 0, 'text', 10, 20, 1, 0, '2019-02-18 15:49:36', '2019-01-30 04:10:03'),
(39, 'Metodo de pago', 'pago', 0, 0, 0, 'select', 0, 0, 1, 0, '2019-02-18 15:49:39', '2019-01-30 19:25:52'),
(40, 'Wallet', 'wallet', 0, 0, 0, 'text', 0, 0, 1, 0, '2019-07-29 17:38:33', '2019-07-29 15:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `liquidations`
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
  `reverse_comment` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Pendiente. 1 = Liquidada. 2 = Reversada',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monedas`
--

CREATE TABLE `monedas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `simbolo` varchar(200) NOT NULL,
  `mostrar_a_d` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 o false - despue del monto, 1 o true - antes del monto',
  `principal` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monedas`
--

INSERT INTO `monedas` (`id`, `nombre`, `simbolo`, `mostrar_a_d`, `principal`, `created_at`, `updated_at`) VALUES
(1, 'Dolar', '$', 0, 1, '2019-06-02 06:18:55', '2019-06-02 06:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `opciones_select`
--

CREATE TABLE `opciones_select` (
  `id` int(11) NOT NULL,
  `idselect` int(11) NOT NULL,
  `valor` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opciones_select`
--

INSERT INTO `opciones_select` (`id`, `idselect`, `valor`, `created_at`, `updated_at`) VALUES
(1, 3, 'M', '2019-01-08 02:13:50', '2019-01-08 02:13:50'),
(2, 3, 'F', '2019-01-08 02:13:50', '2019-01-08 02:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `orden_inversiones`
--

CREATE TABLE `orden_inversiones` (
  `id` int(11) NOT NULL,
  `invertido` double NOT NULL,
  `rendimiento` varchar(200) DEFAULT NULL,
  `concepto` varchar(150) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idtrasancion` varchar(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `paquete_inversion` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orden_retiro`
--

CREATE TABLE `orden_retiro` (
  `id` int(11) NOT NULL,
  `idinversion` int(11) NOT NULL,
  `total_retirar` decimal(40,2) NOT NULL,
  `retiro` decimal(40,2) NOT NULL,
  `penalizacion` decimal(30,2) NOT NULL,
  `iduser` int(11) NOT NULL,
  `concepto` varchar(200) NOT NULL,
  `plan` varchar(30) NOT NULL,
  `ganancia` decimal(40,2) NOT NULL,
  `porc_penalizacion` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_ref` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `amount`, `payment_method`, `payment_ref`, `date`, `status`, `created_at`, `updated_at`) VALUES
(48, 90, 4, 1, '', '', '0000-00-00', 0, '2021-04-13 19:14:44', '2021-04-13 19:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `iduser` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `monto` float NOT NULL,
  `fechasoli` date NOT NULL,
  `fechapago` date DEFAULT NULL,
  `metodo` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipopago` text DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `tipowallet` tinyint(1) DEFAULT NULL COMMENT ' 1 - cash, 2 tantech'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `preferred_value` varchar(250) DEFAULT NULL,
  `public_value` varchar(250) DEFAULT NULL,
  `commissionable_pts_value` varchar(250) DEFAULT NULL,
  `pts_buy_monthly` varchar(250) DEFAULT NULL,
  `pts_purchase_ranges` varchar(250) DEFAULT NULL,
  `pts_purchase_prizes` varchar(250) DEFAULT NULL,
  `purchase_pts_value` varchar(250) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `status` enum('0','1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Inactivo, 1 - Activo, 2 - Agotado, 3 - No disponible',
  `photoDB` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `description`, `amount`, `preferred_value`, `public_value`, `commissionable_pts_value`, `pts_buy_monthly`, `pts_purchase_ranges`, `pts_purchase_prizes`, `purchase_pts_value`, `discount`, `status`, `photoDB`, `created_at`, `updated_at`) VALUES
(1, 'Mix Nutrex', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', '280.00', '400.00', '30', '30', '30', '30', '60', NULL, '1', '1_14297_prod1.png', '2021-04-03 22:50:35', '2021-04-06 06:31:18'),
(2, 'Café Suero de Leche', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', '150.00', '200.00', '20', '20', '20', '20', '40', NULL, '1', '2_17189_prod2.png', '2021-04-03 22:51:18', '2021-04-06 02:45:10'),
(3, 'Mix Café S', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', '202', '270.00', '20', '20', '20', '20', '40', NULL, '1', '3_16840_prod3.png', '2021-04-03 22:52:09', '2021-04-06 02:45:19'),
(4, 'Mix 4 en 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', '200.00', '20.00', '20', '20', '20', '20', '40', 25, '1', '4_21054_prod4.png', '2021-04-03 22:52:39', '2021-04-08 15:02:44'),
(5, 'Paquete Basico', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', NULL, '840.00', NULL, NULL, NULL, NULL, NULL, 30, '1', '5_200873_paq1.png', '2021-04-03 23:56:46', '2021-04-08 16:01:21'),
(6, 'Paquete Avanzado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', NULL, '2340.00', NULL, NULL, NULL, NULL, NULL, 35, '1', '6_31266_paq2.png', '2021-04-03 23:58:48', '2021-04-08 16:01:37'),
(7, 'Paquete Master', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '100', NULL, '5760.00', NULL, NULL, NULL, NULL, NULL, 40, '1', '7_76158_paq3.png', '2021-04-03 23:59:12', '2021-04-08 16:01:52');

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

-- --------------------------------------------------------

--
-- Table structure for table `sesions`
--

CREATE TABLE `sesions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `fecha` date NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesions`
--

INSERT INTO `sesions` (`id`, `user_id`, `fecha`, `ip`, `actividad`, `remember_token`, `created_at`, `updated_at`) VALUES
(1600, 90, '2021-04-12', '127.0.0.1', 'Inicio Sesion', NULL, '2021-04-13 01:36:57', '2021-04-13 01:36:57'),
(1601, 90, '2021-04-13', '127.0.0.1', 'Inicio Sesion', NULL, '2021-04-13 17:56:02', '2021-04-13 17:56:02'),
(1602, 90, '2021-04-13', '127.0.0.1', 'Inicio Sesion', NULL, '2021-04-13 23:10:58', '2021-04-13 23:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `settingactivacion`
--

CREATE TABLE `settingactivacion` (
  `id` int(11) NOT NULL,
  `tipoactivacion` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 - producto, 2 - dinero',
  `tiporecompra` tinyint(4) DEFAULT 0 COMMENT '1 - producto, 2 - dinero',
  `requisitoactivacion` float NOT NULL,
  `requisitorecompra` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingactivacion`
--

INSERT INTO `settingactivacion` (`id`, `tipoactivacion`, `tiporecompra`, `requisitoactivacion`, `requisitorecompra`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, NULL, '2019-06-10 15:06:15', '2019-06-10 22:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `settingcliente`
--

CREATE TABLE `settingcliente` (
  `id` int(11) NOT NULL,
  `cliente` tinyint(1) NOT NULL,
  `permiso` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingcliente`
--

INSERT INTO `settingcliente` (`id`, `cliente`, `permiso`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '2019-06-02 06:18:55', '2019-06-02 06:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `settingcomision`
--

CREATE TABLE `settingcomision` (
  `id` int(11) NOT NULL,
  `niveles` int(11) NOT NULL,
  `tipocomision` varchar(200) NOT NULL,
  `valorgeneral` float NOT NULL,
  `valordetallado` text NOT NULL,
  `tipopago` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comisionretiro` float DEFAULT NULL COMMENT 'esta es para el metodo de pago, es la comision por retiro de dinero en la billetera',
  `comisiontransf` float DEFAULT NULL COMMENT 'esta es para el metodo de pago, es la comision por transferencia de dinero en la billetera',
  `bonoactivacion` float DEFAULT NULL,
  `directos` tinyint(1) DEFAULT 1 COMMENT 'si solo los directos aceptan el bono de activacion',
  `primera_compra` tinyint(1) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingcomision`
--

INSERT INTO `settingcomision` (`id`, `niveles`, `tipocomision`, `valorgeneral`, `valordetallado`, `tipopago`, `created_at`, `updated_at`, `comisionretiro`, `comisiontransf`, `bonoactivacion`, `directos`, `primera_compra`) VALUES
(1, 4, 'producto', 0, '[{\"idproductos\":\"1021\",\"comisiones\":[{\"nivel\":1,\"comision\":0.05000000000000000277555756156289135105907917022705078125},{\"nivel\":2,\"comision\":0},{\"nivel\":3,\"comision\":0},{\"nivel\":4,\"comision\":0}]},{\"idproductos\":\"1022\",\"comisiones\":[{\"nivel\":1,\"comision\":0.05000000000000000277555756156289135105907917022705078125},{\"nivel\":2,\"comision\":0.05000000000000000277555756156289135105907917022705078125},{\"nivel\":3,\"comision\":0},{\"nivel\":4,\"comision\":0}]},{\"idproductos\":\"1023\",\"comisiones\":[{\"nivel\":1,\"comision\":0.1000000000000000055511151231257827021181583404541015625},{\"nivel\":2,\"comision\":0.1000000000000000055511151231257827021181583404541015625},{\"nivel\":3,\"comision\":0},{\"nivel\":4,\"comision\":0}]},{\"idproductos\":\"1024\",\"comisiones\":[{\"nivel\":1,\"comision\":0.1000000000000000055511151231257827021181583404541015625},{\"nivel\":2,\"comision\":0.1000000000000000055511151231257827021181583404541015625},{\"nivel\":3,\"comision\":0.200000000000000011102230246251565404236316680908203125},{\"nivel\":4,\"comision\":0}]},{\"idproductos\":\"1025\",\"comisiones\":[{\"nivel\":1,\"comision\":0.1000000000000000055511151231257827021181583404541015625},{\"nivel\":2,\"comision\":0.1000000000000000055511151231257827021181583404541015625},{\"nivel\":3,\"comision\":0.200000000000000011102230246251565404236316680908203125},{\"nivel\":4,\"comision\":0.25}]}]', 'porcentaje', '2019-06-02 22:55:50', '2019-06-02 22:55:50', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settingpagos`
--

CREATE TABLE `settingpagos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `feed` float NOT NULL,
  `monto_min` float DEFAULT 0,
  `tipofeed` tinyint(1) NOT NULL COMMENT '0 - monto fijo 1 - porcentaje',
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `correo` tinyint(1) DEFAULT 0,
  `wallet` tinyint(1) DEFAULT 0,
  `datosbancarios` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingpagos`
--

INSERT INTO `settingpagos` (`id`, `nombre`, `logo`, `feed`, `monto_min`, `tipofeed`, `estado`, `correo`, `wallet`, `datosbancarios`, `created_at`, `updated_at`) VALUES
(1, 'Wallet', '/assets/img/metodopago/2019-07-26 21:49:44tanet.png', 0, 50, 1, 1, 0, 1, 0, '2020-03-25 13:31:34', '2019-09-13 02:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `settingpermiso`
--

CREATE TABLE `settingpermiso` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nameuser` varchar(200) NOT NULL,
  `nuevo_registro` tinyint(4) DEFAULT 0,
  `red_usuario` tinyint(4) DEFAULT 0,
  `vision_usuario` tinyint(4) DEFAULT 0,
  `billetera` tinyint(4) DEFAULT 0,
  `pago` tinyint(4) DEFAULT 0,
  `informes` tinyint(4) DEFAULT 0,
  `tickets` tinyint(4) DEFAULT 0,
  `buzon` tinyint(4) DEFAULT 0,
  `ranking` tinyint(4) DEFAULT 0,
  `historial_actividades` tinyint(4) DEFAULT 0,
  `email_marketing` tinyint(4) DEFAULT 0,
  `administrar_redes` tinyint(4) DEFAULT 0,
  `soporte` tinyint(4) DEFAULT 0,
  `ajuste` tinyint(4) DEFAULT 0,
  `herramienta` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingpermiso`
--

INSERT INTO `settingpermiso` (`id`, `iduser`, `nameuser`, `nuevo_registro`, `red_usuario`, `vision_usuario`, `billetera`, `pago`, `informes`, `tickets`, `buzon`, `ranking`, `historial_actividades`, `email_marketing`, `administrar_redes`, `soporte`, `ajuste`, `herramienta`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-06-02 06:18:55', '2019-06-02 06:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `settingplantilla`
--

CREATE TABLE `settingplantilla` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `contenido` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingplantilla`
--

INSERT INTO `settingplantilla` (`id`, `titulo`, `contenido`, `created_at`, `updated_at`) VALUES
(1, 'Bienvenido a Level Up', '<p>BIENVENIDO <b>UPPER</b>, HAS TOMADO LA MEJOR DECISIÓN DE TU VIDA.<br><br><br>Existen dos momentos realmente importantes en la vida de toda persona, el primero sin duda es el día en que nace, y el segundo es el día que decide darle sentido al hecho de estar vivo. Está claro que cada persona es completamente única e irrepetible, y que cada uno de nosotros vino a este mundo a transitar un camino de vida y una historia que nadie más vino a vivir.<br><br>Sin embargo, no importa cual sea tu camino, lo mejor que puedes hacer es tomarlo como una oportunidad para desafiarte constantemente y medir tu progreso por medio de tus resultados que cada día más y más te llevarán a un siguiente nivel.<br><br>De eso se trata ser un <b>Upper</b>, de ser alguien que constantemente se está mejorando, que siempre avanza hacia su siguiente nivel en la vida apalancado en una familia de <b>Uppers</b>, llenos de sueños y metas que cumplen retándose constantemente a si mismos. Una Familia poderosa llamada <b>LEVEL UP</b>.<br><br><br>¡Es un placer tenerte por aquí! – “La Cima es Nuestra”<br></p>', '2020-03-27 16:20:10', '2020-03-27 21:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AIO System',
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Uno para todo.',
  `name_styled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'AIO <strong>System</strong>',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_type` int(11) DEFAULT NULL,
  `enable_register` tinyint(1) DEFAULT 1,
  `enable_auth_fb` tinyint(1) DEFAULT 0,
  `enable_auth_tw` tinyint(1) DEFAULT 0,
  `enable_auth_google` tinyint(1) DEFAULT 0,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0.2.0',
  `keycode` int(11) DEFAULT NULL,
  `logo` int(11) DEFAULT 1,
  `rol_default` int(11) DEFAULT 3,
  `status_web` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referred_id_default` int(11) NOT NULL DEFAULT 1,
  `referred_level_max` int(11) NOT NULL DEFAULT 5,
  `edad_minino` int(11) NOT NULL COMMENT 'edad minimo para ingresar al sistema',
  `licencia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `prefijo_wp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no_comision` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valortantech` decimal(20,6) DEFAULT 1.000000,
  `valor_niveles` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valorrentabilidad` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slogan`, `name_styled`, `company_name`, `company_email`, `site_email`, `description`, `category_type`, `enable_register`, `enable_auth_fb`, `enable_auth_tw`, `enable_auth_google`, `version`, `keycode`, `logo`, `rol_default`, `status_web`, `created_at`, `updated_at`, `referred_id_default`, `referred_level_max`, `edad_minino`, `licencia`, `fecha_vencimiento`, `prefijo_wp`, `id_no_comision`, `valortantech`, `valor_niveles`, `valorrentabilidad`) VALUES
(1, 'GoldenBit', '123456', 'Ecripto FX', NULL, NULL, 'soporte@greenviewmds.com', NULL, NULL, 1, 0, 0, 0, '0.2.0', NULL, 1, 3, 1, '2019-06-02 06:18:55', '2019-06-02 06:18:55', 1, 5, 18, 'MjUmJU49JjVDOidQUiwjKFArM2BRKzNgVQpgCg==', '2020-01-05', 'wp_', NULL, '0.000000', '{\"_token\":\"lYOwKKx7PgPMJSAxuUS8f9zEbVOgfDzTRMx3y0lx\",\"nivel1\":\"10\",\"nivel2\":\"2\",\"nivel3\":\"3\",\"nivel4\":\"5\"}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settingsbono`
--

CREATE TABLE `settingsbono` (
  `id` int(11) NOT NULL,
  `type_bono` varchar(30) NOT NULL,
  `settings_bono` text NOT NULL,
  `info_extra` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settingsbono`
--

INSERT INTO `settingsbono` (`id`, `type_bono`, `settings_bono`, `info_extra`, `created_at`, `updated_at`) VALUES
(1, 'directo', '{\"bronce\":0.05000000000000000277555756156289135105907917022705078125,\"plata\":0.1000000000000000055511151231257827021181583404541015625,\"oro\":0.40000000000000002220446049250313080847263336181640625}', NULL, NULL, NULL),
(3, 'matrix', '{\"1\":\"8\",\"2\":\"6\",\"3\":\"5\",\"4\":\"4\",\"5\":\"3\",\"6\":\"3\",\"7\":\"2\",\"8\":\"2\",\"9\":\"1\",\"10\":\"1\"}', NULL, NULL, NULL),
(4, 'blackbox', '{\"blackbox\":\"20\"}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settingsestructura`
--

CREATE TABLE `settingsestructura` (
  `id` int(11) NOT NULL,
  `tipoestructura` varchar(50) NOT NULL,
  `cantnivel` int(11) NOT NULL,
  `cantfilas` int(11) DEFAULT NULL,
  `estructuraprincipal` tinyint(1) DEFAULT NULL COMMENT '1: arbol - 2: matriz',
  `usuarioprincipal` tinyint(1) DEFAULT NULL COMMENT '1: admin - 2:user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingsestructura`
--

INSERT INTO `settingsestructura` (`id`, `tipoestructura`, `cantnivel`, `cantfilas`, `estructuraprincipal`, `usuarioprincipal`, `created_at`, `updated_at`) VALUES
(1, 'matriz', 10000000, 2, 0, 0, '2019-10-25 16:13:18', '2019-06-02 19:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `setttingsroles`
--

CREATE TABLE `setttingsroles` (
  `id` int(11) NOT NULL,
  `rangos` int(11) NOT NULL,
  `compras` tinyint(1) DEFAULT 0,
  `comisiones` tinyint(1) DEFAULT 0,
  `niveles` tinyint(1) DEFAULT 0,
  `referidos` tinyint(1) DEFAULT 0,
  `referidosact` tinyint(1) DEFAULT 0,
  `referidosd` tinyint(1) DEFAULT 0,
  `grupal` tinyint(1) DEFAULT 0 COMMENT 'puntos grupales',
  `valorpuntos` float DEFAULT NULL,
  `bonos` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setttingsroles`
--

INSERT INTO `setttingsroles` (`id`, `rangos`, `compras`, `comisiones`, `niveles`, `referidos`, `referidosact`, `referidosd`, `grupal`, `valorpuntos`, `bonos`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 0, 0, 0, 0, 1, 1, 0, 0, '2019-07-17 23:22:50', '2019-07-18 02:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referred_id` int(11) DEFAULT 0,
  `sponsor_id` bigint(20) DEFAULT 0,
  `position_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `rol_id` int(11) NOT NULL DEFAULT 1,
  `wallet_amount` double NOT NULL DEFAULT 0,
  `wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rentabilidad` decimal(15,2) DEFAULT NULL,
  `porc_rentabilidad` decimal(15,2) DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activacion` tinyint(1) DEFAULT 0,
  `token_correo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verificar_correo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toke_google` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipouser` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'Normal',
  `check_token_google` tinyint(1) NOT NULL DEFAULT 0,
  `puntos` float DEFAULT NULL,
  `paquete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntosP` bigint(11) DEFAULT 0,
  `puntosizq` bigint(20) DEFAULT 0,
  `puntosder` bigint(20) DEFAULT 0,
  `ladomatrix` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ladoregistrar` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'I',
  `icono_paquete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clave_maestra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm',
  `fecha_activacion` date DEFAULT NULL,
  `pts_buy_monthly` int(11) DEFAULT NULL,
  `pts_purchase_ranges` int(11) DEFAULT NULL,
  `pts_purchase_prizes` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `phone`, `country`, `birthdate`, `gender`, `address`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `referred_id`, `sponsor_id`, `position_id`, `status`, `rol_id`, `wallet_amount`, `wallet`, `rentabilidad`, `porc_rentabilidad`, `clave`, `activacion`, `token_correo`, `verificar_correo`, `toke_google`, `tipouser`, `check_token_google`, `puntos`, `paquete`, `puntosP`, `puntosizq`, `puntosder`, `ladomatrix`, `ladoregistrar`, `icono_paquete`, `clave_maestra`, `fecha_activacion`, `pts_buy_monthly`, `pts_purchase_ranges`, `pts_purchase_prizes`) VALUES
(1, 'admin master', '04266379981', 'Venezuela', '1990-12-13', 'M', 'juan griego/calle bermudez', 'admin', '25f9e794323b453885f5181f1b624d0b', 'admin', 'admin@gmail.com', '', '2021-04-08 21:21:51', '', 0, 'ADMIN', '$2y$10$XeFpDoIFXPwHFjGn9Ya35OdyvS3YcSjKCh9V4GithjxWPb9lImRgy', 'user__1617911277.jpg', 'XSEmcduav6A1yuiOV8ytKKB94NfcSECEJlNOzGLReVnhGE9X2atdH0fsbiQX', '2019-06-02 06:18:55', '2021-04-08 23:47:57', 0, 0, 0, 1, 0, 0.08, NULL, '-23.39', '0.00', 'eyJpdiI6ImIwZ0d3MGplZ2ZKMGlrRHlQaXEydWc9PSIsInZhbHVlIjoibU95NFRQTnpzMFJRdUx2S2JZVmVIZEVoV2tORGlFYnZCRmRvc0ZVaFo5dz0iLCJtYWMiOiI1Y2E4ZTJiMDM0YjgwMzU4MzVkYzJkZjQ2Y2QxMTMyMWY2ZDAxN2UyZWU2MWQ3ZmIwZDEwYjc2OGU4YzJmMDhlIn0=', 1, '$2y$10$Dc2zDX.3MHpXOuolJRR/aebC/v9cTYRiDxm31YJ1KeTJC6PdOvdH.', 'validado', '7U63DYGTITHXTSXW', 'Normal', 1, 0, '{\"nombre\":\"Standar\",\"fecha\":\"2021-04-12\",\"code\":0}', 0, 0, 0, NULL, 'I', '/img/paquetes/MASTER.png', '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', '2020-04-07', NULL, NULL, NULL),
(119, 'Luisana Marín', '0412-0924871', 'Venezuela', NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'luisanaelenamarin@gmail.com', '', '2021-04-12 23:53:53', '', 0, 'Luisanaelena Marín', '$2y$10$EI.7wKvXa5KzH7IcUl2S8OojFENgBznRJZyO3/LCjdB5JBXPb5YJu', 'avatar.png', '4E1F3w4No7c1LGrjyynuNOpvJvrodvXFi3aZqQadlckujCbPioGShKrbZBdR', '2021-03-25 00:07:37', '2021-04-09 19:43:42', 90, 84, 84, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Ilh6WW5PMUZreXJrXC9YNmJXVUdUSXFnPT0iLCJ2YWx1ZSI6InpReXNuZDU5Mk1IZ3lpTE5OaGd4Qkd5cVZDZzI1dWRjanhsVVRlUEJyeGc9IiwibWFjIjoiMTlmNTA0MGU4ZmRlMGJjOThhY2ZjNDQ3MzI4ZDJjMWY2NWRkODAxZTBiN2ViYjNhZWY4YTI3OTE4YTMxNzI5OCJ9', 0, 'aba7120966931be44371a0547917ed85', NULL, 'C5DRQG4JPFA5GTTK', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-24\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL, NULL, NULL, NULL),
(92, 'Luisana Marín', '0412-0924871', 'Venezuela', NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'luisanaelenamarin@gmail.com', '', '2021-04-12 23:53:53', '', 0, 'Luisanaelena Marín', '$2y$10$EI.7wKvXa5KzH7IcUl2S8OojFENgBznRJZyO3/LCjdB5JBXPb5YJu', 'avatar.png', '4E1F3w4No7c1LGrjyynuNOpvJvrodvXFi3aZqQadlckujCbPioGShKrbZBdR', '2021-03-25 00:07:37', '2021-04-09 19:43:42', 90, 84, 84, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Ilh6WW5PMUZreXJrXC9YNmJXVUdUSXFnPT0iLCJ2YWx1ZSI6InpReXNuZDU5Mk1IZ3lpTE5OaGd4Qkd5cVZDZzI1dWRjanhsVVRlUEJyeGc9IiwibWFjIjoiMTlmNTA0MGU4ZmRlMGJjOThhY2ZjNDQ3MzI4ZDJjMWY2NWRkODAxZTBiN2ViYjNhZWY4YTI3OTE4YTMxNzI5OCJ9', 0, 'aba7120966931be44371a0547917ed85', NULL, 'C5DRQG4JPFA5GTTK', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-24\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL, NULL, NULL, NULL),
(91, 'Luisana Marín', '0412-0924871', 'Venezuela', NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'luisanaelenamarin@gmail.com', '', '2021-04-12 23:53:53', '', 0, 'Luisanaelena Marín', '$2y$10$EI.7wKvXa5KzH7IcUl2S8OojFENgBznRJZyO3/LCjdB5JBXPb5YJu', 'avatar.png', '4E1F3w4No7c1LGrjyynuNOpvJvrodvXFi3aZqQadlckujCbPioGShKrbZBdR', '2021-03-25 00:07:37', '2021-04-09 19:43:42', 90, 84, 84, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Ilh6WW5PMUZreXJrXC9YNmJXVUdUSXFnPT0iLCJ2YWx1ZSI6InpReXNuZDU5Mk1IZ3lpTE5OaGd4Qkd5cVZDZzI1dWRjanhsVVRlUEJyeGc9IiwibWFjIjoiMTlmNTA0MGU4ZmRlMGJjOThhY2ZjNDQ3MzI4ZDJjMWY2NWRkODAxZTBiN2ViYjNhZWY4YTI3OTE4YTMxNzI5OCJ9', 0, 'aba7120966931be44371a0547917ed85', NULL, 'C5DRQG4JPFA5GTTK', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-24\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL, NULL, NULL, NULL),
(85, 'Luisana Marín', '0412-0924871', 'Venezuela', NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'luisanaelenamarin@gmail.com', '', '2021-04-13 19:14:44', '', 0, 'Luisanaelena Marín', '$2y$10$EI.7wKvXa5KzH7IcUl2S8OojFENgBznRJZyO3/LCjdB5JBXPb5YJu', 'avatar.png', '4E1F3w4No7c1LGrjyynuNOpvJvrodvXFi3aZqQadlckujCbPioGShKrbZBdR', '2021-03-25 00:07:37', '2021-04-13 23:14:44', 1, 84, 84, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Ilh6WW5PMUZreXJrXC9YNmJXVUdUSXFnPT0iLCJ2YWx1ZSI6InpReXNuZDU5Mk1IZ3lpTE5OaGd4Qkd5cVZDZzI1dWRjanhsVVRlUEJyeGc9IiwibWFjIjoiMTlmNTA0MGU4ZmRlMGJjOThhY2ZjNDQ3MzI4ZDJjMWY2NWRkODAxZTBiN2ViYjNhZWY4YTI3OTE4YTMxNzI5OCJ9', 0, 'aba7120966931be44371a0547917ed85', NULL, 'HGDDYZYRNXHVPY4C', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-24\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL, 170, 130, 130),
(90, NULL, NULL, NULL, NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'william28ache@gmail.com', '', '2021-04-13 19:14:44', '', 0, 'William Ache', '$2y$10$MRd3kegVUL.zLBFi9qrpyeCGlHlyvb2G9oAsjAOZ7s9BS6DPQS9Ya', 'avatar.png', 'dVNcPGEeBmmIV7KJ3eFq4C2eaWAHNJ0k6XzeQPu3JBZ75vxA5upzSdTi1FWH', '2021-04-11 22:55:09', '2021-04-13 23:14:44', 85, 0, NULL, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Iks3Z1RTd1lJNlJxcWdUaWtFMnhCdXc9PSIsInZhbHVlIjoia3dTTmV0U3kxOGtHNmQ4TWtOS2dCM1FQdWFJeExTcGI1NHFpYXJUMnBQND0iLCJtYWMiOiJkMGJiYzE0MTZlOTczNDFhZjhmMTYyZWNjNWRkOGE0NTFjZDk2ZWFlYmZlYjM1Zjk0NjA4MmY3MGExM2Q0OTlkIn0=', 0, NULL, NULL, NULL, 'Normal', 0, NULL, NULL, 0, 0, 0, NULL, 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_point`
--

CREATE TABLE `wallet_point` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `idreferido` int(11) NOT NULL,
  `concepto` varchar(200) NOT NULL,
  `point_left` int(11) NOT NULL,
  `point_right` int(11) NOT NULL,
  `side` char(1) NOT NULL COMMENT 'lado por el cual se pago el bono',
  `status` tinyint(1) NOT NULL COMMENT '0 - espera, 1 - pagado, 2 - cancelado',
  `fecha_pagado` date DEFAULT NULL COMMENT 'permite saber cuando fueron pagados esos puntos',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_used` varchar(255) NOT NULL,
  `operation_type` varchar(20) NOT NULL COMMENT 'Débito o Crédito',
  `description` longtext DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `liquidation_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Pendiente. 1 = Completada. 2 = Cancelada',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`id`, `user_id`, `wallet_used`, `operation_type`, `description`, `amount`, `liquidation_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 90, '321', 'Crédito', 'Ingreso mensual', '20000', NULL, 0, '2021-04-13 14:32:13', '2021-04-13 14:32:13'),
(5, 90, '321', 'Crédito', 'Ingreso mensual', '20000', NULL, 1, '2021-04-13 14:32:13', '2021-04-13 14:32:13'),
(6, 90, '321', 'Debito', 'Ingreso mensual', '20000', NULL, 2, '2021-04-13 14:32:13', '2021-04-13 14:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coinpayment_transactions`
--
ALTER TABLE `coinpayment_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coinpayment_transactions_txn_id_unique` (`txn_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `label` (`label`,`nameinput`);

--
-- Indexes for table `liquidations`
--
ALTER TABLE `liquidations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monedas`
--
ALTER TABLE `monedas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opciones_select`
--
ALTER TABLE `opciones_select`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orden_retiro`
--
ALTER TABLE `orden_retiro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesions`
--
ALTER TABLE `sesions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesions_user_id_foreign` (`user_id`);

--
-- Indexes for table `settingactivacion`
--
ALTER TABLE `settingactivacion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settingcliente`
--
ALTER TABLE `settingcliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settingcomision`
--
ALTER TABLE `settingcomision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settingpagos`
--
ALTER TABLE `settingpagos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settingpermiso`
--
ALTER TABLE `settingpermiso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settingplantilla`
--
ALTER TABLE `settingplantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settingsbono`
--
ALTER TABLE `settingsbono`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settingsestructura`
--
ALTER TABLE `settingsestructura`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setttingsroles`
--
ALTER TABLE `setttingsroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `wallet_point`
--
ALTER TABLE `wallet_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coinpayment_transactions`
--
ALTER TABLE `coinpayment_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `liquidations`
--
ALTER TABLE `liquidations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monedas`
--
ALTER TABLE `monedas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opciones_select`
--
ALTER TABLE `opciones_select`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `orden_retiro`
--
ALTER TABLE `orden_retiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sesions`
--
ALTER TABLE `sesions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1603;

--
-- AUTO_INCREMENT for table `settingactivacion`
--
ALTER TABLE `settingactivacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingcliente`
--
ALTER TABLE `settingcliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingcomision`
--
ALTER TABLE `settingcomision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingpagos`
--
ALTER TABLE `settingpagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingpermiso`
--
ALTER TABLE `settingpermiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingplantilla`
--
ALTER TABLE `settingplantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingsbono`
--
ALTER TABLE `settingsbono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settingsestructura`
--
ALTER TABLE `settingsestructura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setttingsroles`
--
ALTER TABLE `setttingsroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `wallet_point`
--
ALTER TABLE `wallet_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
