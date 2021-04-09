-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2021 a las 21:48:59
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
-- Estructura de tabla para la tabla `wp_users`
--

CREATE TABLE `wp_users` (
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
  `fecha_activacion` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp_users`
--

INSERT INTO `wp_users` (`ID`, `name`, `phone`, `country`, `birthdate`, `gender`, `address`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `referred_id`, `sponsor_id`, `position_id`, `status`, `rol_id`, `wallet_amount`, `wallet`, `rentabilidad`, `porc_rentabilidad`, `clave`, `activacion`, `token_correo`, `verificar_correo`, `toke_google`, `tipouser`, `check_token_google`, `puntos`, `paquete`, `puntosP`, `puntosizq`, `puntosder`, `ladomatrix`, `ladoregistrar`, `icono_paquete`, `clave_maestra`, `fecha_activacion`) VALUES
(1, 'admin master', '04266379981', 'Venezuela', '1990-12-13', 'M', 'juan griego/calle bermudez', 'admin', '25f9e794323b453885f5181f1b624d0b', 'admin', 'admin@gmail.com', '', '2021-04-08 21:21:51', '', 0, 'ADMIN', '$2y$10$XeFpDoIFXPwHFjGn9Ya35OdyvS3YcSjKCh9V4GithjxWPb9lImRgy', 'user__1617911277.jpg', 'XSEmcduav6A1yuiOV8ytKKB94NfcSECEJlNOzGLReVnhGE9X2atdH0fsbiQX', '2019-06-02 06:18:55', '2021-04-08 23:47:57', 0, 0, 0, 1, 0, 0.08, NULL, '-23.39', '0.00', 'eyJpdiI6ImIwZ0d3MGplZ2ZKMGlrRHlQaXEydWc9PSIsInZhbHVlIjoibU95NFRQTnpzMFJRdUx2S2JZVmVIZEVoV2tORGlFYnZCRmRvc0ZVaFo5dz0iLCJtYWMiOiI1Y2E4ZTJiMDM0YjgwMzU4MzVkYzJkZjQ2Y2QxMTMyMWY2ZDAxN2UyZWU2MWQ3ZmIwZDEwYjc2OGU4YzJmMDhlIn0=', 1, '$2y$10$Dc2zDX.3MHpXOuolJRR/aebC/v9cTYRiDxm31YJ1KeTJC6PdOvdH.', 'validado', '7U63DYGTITHXTSXW', 'Normal', 1, 0, '{\"nombre\":\"Standar\",\"fecha\":\"2021-04-12\",\"code\":0}', 0, 0, 0, NULL, 'I', '/img/paquetes/MASTER.png', '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', '2020-04-07'),
(78, NULL, NULL, NULL, NULL, NULL, NULL, '', 'c7e0f3254cbd6367e55a11a52a5e6bfc', '', 'Wilfredodamaris3@gmail.com', '', '2021-03-12 21:34:04', '', 0, '', '$2y$10$RBIFvA44KNNhRe2QZioF1OKJ65KZQF3wKaGyYhuzr/303/WhPI2N2', 'avatar.png', NULL, '2021-03-12 21:34:05', '2021-03-12 21:34:05', 56, 77, 77, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImtEb0ZjNGlFMXFENWJiXC93cGhQTDZBPT0iLCJ2YWx1ZSI6IlU2OHhWamJZNktaRHNJMnZxVmlTR0pzcFNjSXRtR21pcUNncEFLUTRmRGc9IiwibWFjIjoiMTJkODRlMzBmMDliZTcyYmIyYWRjMzJmNzAzNDRmZDY4NTcyZjQ5Mzg4ZGRhNDJjMmNkYjFjMDZjNDBjN2UxOCJ9', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-12\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(79, NULL, NULL, NULL, NULL, NULL, NULL, '', '0d7cd32d0f52b182bf53471f0fc214fe', '', 'emprendimientosinnovadores2019@gmail.com', '', '2021-03-13 00:19:21', '', 0, '', '$2y$10$mAbUFvRJ65GbjpPmKYwMEOI8KObS.zOSPUz7hhEIRsR.FaIQfPnT.', 'avatar.png', 'FztFs79dhsIvkQ7fatdM7K0HnrZ981PkQ4ZPXngMqQ0L7JKYYmYDvlkIpLrF', '2021-03-13 01:45:22', '2021-03-13 03:08:54', 77, 77, 77, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImsrQllQRWJQUmRJRHFTclA3VTJvZEE9PSIsInZhbHVlIjoia1IrVGhHYmVHczQxajZ0RFE0dTBpYnE5OWgxb3hEdzJickJkQUxScnArZz0iLCJtYWMiOiJmMTNjNGI3NDE3MWNlOTNlNzFmYjcyYWZmNTQ1M2VmNzEyYTAwNzQzNTIzZGFiZjQxODIxNzU3Y2NkYzk0N2M1In0=', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-12\",\"code\":1}', 0, 0, 0, 'D', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(80, NULL, NULL, NULL, NULL, NULL, NULL, '', '2d1e41337126700042a77fc4d651654a', '', 'solis3746@gmail.com', '', '2021-03-13 19:17:13', '', 0, '', '$2y$10$diQmPn7Q55BLHMxYCFrMDu/dWJoUWpfUQtMrZzwGQeEaxITudn3V2', 'avatar.png', NULL, '2021-03-13 19:17:14', '2021-03-13 19:17:14', 77, 79, 79, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IkQrcDFsWlNJOXJpNGxGMXFFc3dcL2R3PT0iLCJ2YWx1ZSI6IjBpZDUxTTk0WndWK0pJaWM4elNwY0FyWGJFNmp0YkVjZnBxWHV4VUZIWVU9IiwibWFjIjoiM2M0MGY3YTYyODQwOWQzMzc3YjdlNDRlNWQyMzI5ZWVmNjNlMjFmMWM4MDM3N2ZkN2I2MjUyNDU0NTA0NDEwMiJ9', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-13\",\"code\":1}', 0, 0, 0, 'D', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(81, NULL, NULL, NULL, NULL, NULL, NULL, '', '7e0835ee08f8634731f2b28b2cf07ea1', '', 'angester2510@hotmail.com', '', '2021-03-20 19:35:00', '', 0, '', '$2y$10$2Iqcht5TskhIKKv8axv28u.r0m1SQVKHwpyu/f6B6nPtQ.0kwiLWS', 'avatar.png', NULL, '2021-03-20 22:26:04', '2021-03-20 22:35:00', 63, 78, 78, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Ilg2bmZucElDcnppUDhEVUNsZG5BS3c9PSIsInZhbHVlIjoicmtzakRmYXlYNzlKWDJWM2FNT0lzTWRDeWFyQUhnbWNjOEZwaFVVYkNQMD0iLCJtYWMiOiIxYTZmYTFhZjQ5NDVjN2RmODA0YThiOWY4OTc1NzAzZGQ4Yjc1MDRmNmEyNDZlZTc4OGQzNTI2YWU2ZjM3ZDE3In0=', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-20\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(82, NULL, NULL, NULL, NULL, NULL, NULL, '', '7e0835ee08f8634731f2b28b2cf07ea1', '', 'angester2016@gmail.com', '', '2021-03-20 19:44:58', '', 0, '', '$2y$10$efNuyMsCW0tSdHBSKv1oj.N5ZUWjUeIBZrfCZJ7mH6C08Jg1molKW', 'avatar.png', NULL, '2021-03-20 22:27:05', '2021-03-20 22:44:58', 63, 81, 81, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImtyS0JVVWU3OWJQUWhOSFBGN09BY0E9PSIsInZhbHVlIjoieHgxRXdseW9OcDRcL3Q3aTI2MlRlK0V5ZWxXbHlxanhjZ1pTQXNtS0UyZU09IiwibWFjIjoiZmY4ODM3NzIwZWMyYmY2M2JjYmFiNDY3YTA5ZjgyODhkMTA4ZThmMmQzZWQyMjU2MzFlMjhmNjBkODFmMmQzZCJ9', 0, NULL, NULL, 'HKWXRF67DQA5SVJH', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-20\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(83, NULL, NULL, NULL, NULL, NULL, NULL, '', 'cdbd914d6bb9a4b5caa448f0e5cba8c8', '', 'Randradeh@misena.edu.co', '', '2021-03-21 00:36:32', '', 0, '', '$2y$10$lPFjqhcjAPjfRmAs./Jzeeq39fEdCDmh5MnzoYi9zuPRRVdqO3.NS', 'avatar.png', NULL, '2021-03-21 00:36:32', '2021-03-21 00:36:32', 82, 82, 82, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IlI5Q2libllORHFiZEVjNnl5MlwvRFBRPT0iLCJ2YWx1ZSI6InZwSmp4Y2xNTTV0TUEwakk3cW85c0ZlQmo5bEJDc1VWN05HdjRnajdua0k9IiwibWFjIjoiNmExZDM0NDU2YWU2OGE4YWMyNmRkMGJiMzY5NzA3Y2Q0ZDc2ZDJiNDZiNjhjYjgwNzZiZjgxYTk2OGQ5NTYxNSJ9', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-20\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(84, NULL, NULL, NULL, NULL, NULL, NULL, '', 'cdbd914d6bb9a4b5caa448f0e5cba8c8', '', 'Raquelandradeh0212@gmail.com', '', '2021-03-30 19:30:39', '', 0, '', '$2y$10$5FbvAelwNA7ZLgUOunPFX.jN97vyTrQG8XPHP8q2v0nY...BFLCp2', 'avatar.png', NULL, '2021-03-21 00:37:21', '2021-03-21 00:37:21', 86, 83, 83, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IkI4R1paNXZUSmNcL2Jmc2NXQVV0cTNRPT0iLCJ2YWx1ZSI6InhSUlE5SFViUWNQaVFSWVFVXC8yWFRFTmxNNE9ZemluQkJqUFJ2T3Y0OUtVPSIsIm1hYyI6IjM0NjVjZGVjMDY3MjY5YmU0YjYyZmEwMDAwNThhZGI4MjZmYzIwZGRlNDNiNGU2ZjNkY2U3ZWM0YmM0NjMwMDEifQ==', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-20\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(76, NULL, NULL, NULL, NULL, NULL, NULL, '', '08811b886629261d9a34df07c5128f79', '', 'jonathan.jj94@hotmail.com', '', '2021-03-30 19:31:10', '', 0, '', '$2y$10$SfA.GfjOBX2gLpcPo29coO5Vmsy2NrTjbIi4gX/NcGCvKRAg22KaC', 'avatar.png', NULL, '2021-03-07 02:54:08', '2021-03-07 02:54:08', 86, 75, 75, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Im1STURodTMzMzdUMXVNZDlxN05vTUE9PSIsInZhbHVlIjoiWnk5K0dDWGhQeDVuZDBxdU9uem05Zz09IiwibWFjIjoiMTJiYzM2M2FlODM1ZTVlMTUwY2Y4Mjg0NDVhM2IzMTM5OGUyMzBjODY1YTY0MGIzMjM4MTM0Nzc0YzI4ZTBiNyJ9', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-06\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(75, NULL, NULL, NULL, NULL, NULL, NULL, '', '08811b886629261d9a34df07c5128f79', '', 'Ja022373@gmail.com', '', '2021-03-09 17:45:08', '', 0, '', '$2y$10$Rg8GCqImO/JflfG71fa6yusNwiWamaSOy7pV5UJm/6mCPSNR0JbvO', 'avatar.png', NULL, '2021-03-05 21:04:09', '2021-03-09 20:45:08', 63, 74, 74, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IndoWE90SENxeENpMXFJbmIwQ1wvM2x3PT0iLCJ2YWx1ZSI6ImZrQXZRSUtOXC9HVE1PdjZnSkRpSjZ3PT0iLCJtYWMiOiIxYjFjNGQwZDNmNzk2Zjk3NDY0NmM1NjRkYTUzMGM5ZWYzYTgzMjhhYWIyZDgzZTBmN2I4ZjljYjRiMjA2OWMxIn0=', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-05\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(74, NULL, NULL, NULL, '1985-12-10', 'F', NULL, 'lacoral', '1f4f8bd9fcdb2fe003db92adf053a927', 'lacoral', 'alejandracoralbitcoin@gmail.com', '', '2021-03-31 13:37:34', '', 0, 'alejandra coral', '$2y$10$PgXJn2c7dQsUHIoW83b1u.cT2M/Sdb3A.q63/Y9Omm/4K7d40yHP.', 'avatar.png', 'pgLO2m9trc1tNe0M80OY0A2Qu6MoEWuXMsJo4rjuGP3ZrNoMWYGIOqM7dDi5', '2021-03-05 20:48:07', '2021-03-05 21:07:14', 86, 70, 70, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImJSekk0YlV2c1lMbTMwVzJHXC9HNWxRPT0iLCJ2YWx1ZSI6IisxNmNYVDBITUVSZk5OT1Jkbmo3ZXZzV0RnYW5QcHNwN3dPWDQ5eUNxZmc9IiwibWFjIjoiMDNkNzgzYjVhNWNkYjI4OWRkZjkwMDQyOWVkNWJjNzlhMzQ2Yzc0YWE3MjVlMjRkMDJiM2JkOGMwMjU1Y2VhYiJ9', 0, NULL, NULL, 'JCQR5KQISDF5MQCN', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-05\",\"code\":1}', 0, 0, 0, 'I', 'D', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(73, NULL, NULL, NULL, NULL, NULL, NULL, '', '8ae1a819a9a892d6ffc2a50d28de9fef', '', 'Mgarciacuervo189@gmail.com', '', '2021-03-05 04:20:43', '', 0, '', '$2y$10$zwCqfSdg4WaioLah8J9xO.iERywX6UTgWaAjnuRB1Zm25fcxn24O.', 'avatar.png', NULL, '2021-03-05 04:20:44', '2021-03-05 04:20:44', 64, 72, 72, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImVJb0lWblBXcTJlelNWNjJDZ3ZWQ3c9PSIsInZhbHVlIjoiR0FJUzZqMmxPVkNzMnNVemw3Ykw4alpzSG5kRW01ZjJqdlp1S0REOVFCZz0iLCJtYWMiOiI0NGY2ZWRlMzJlZDczMTNiMThiM2UyNDUxNmYxNmVlMmI4NDVjOTczYThlZGMwNWIzY2Q1N2I0ZGRlMmRhMmMyIn0=', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-05\",\"code\":1}', 0, 0, 0, 'D', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(72, NULL, NULL, NULL, NULL, NULL, NULL, '', '8ae1a819a9a892d6ffc2a50d28de9fef', '', 'Garciacuervomarlon5@gmail.com', '', '2021-03-05 04:12:00', '', 0, '', '$2y$10$.Z8fFA8ELUyJgk0E.sY7S.1juQm9IKu89iIFeKoW3TpT8dA6pQkjG', 'avatar.png', NULL, '2021-03-05 04:12:01', '2021-03-05 04:12:01', 64, 64, 64, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IkEzZThQNTI1K2hzRlYrM3dZWXZVekE9PSIsInZhbHVlIjoiT21YOW5rNFBWMEVHaEprbEM3Y2VPWk5sY1VLeWFOd3BWTk44WGZSQm1EZz0iLCJtYWMiOiIwYzBhZDFkOTIwNzkyMTk0NjM4NTI2M2NhOTM0ODY2M2MyZjA4MTczMzUzMWI5MGNkOWYyYmY5ZWVkZDk1NjhjIn0=', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-05\",\"code\":1}', 0, 0, 0, 'D', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(71, NULL, NULL, NULL, NULL, NULL, NULL, '', 'b076b913cc67d20ac07a1e93a967bd1a', '', 'lindam1170@yahoo.com', '', '2021-03-04 05:03:26', '', 0, '', '$2y$10$WezPnoioKH/xwvvyypNAG.JjeRC2IVHIC2NaNf55gkyMDR/wOSe5G', 'avatar.png', NULL, '2021-03-04 05:03:26', '2021-03-04 05:03:26', 62, 62, 62, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImdHTnI1Q0wzdUVxbWg5Z2NPN0d1Y0E9PSIsInZhbHVlIjoiWWZ1d1FUUjJGUWxUbmhRYW5XbUtDQT09IiwibWFjIjoiMTNmODc3MDc5ODAyM2FjMzkwNGU4ZjVkZjkwNDhiZTg2ZmNmMTU5NThhMjcwZTI1NWM2MzM0NjA2MTI1ODk1ZCJ9', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-04\",\"code\":1}', 0, 0, 0, 'D', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(70, NULL, NULL, NULL, '1976-05-16', 'M', NULL, 'el bravo', '12299fcab5ed5a9c6c299c8bac7dcbd5', 'el bravo', 'juanca16057@gmail.com', '', '2021-03-23 20:39:09', '', 0, 'juan carlos bravo', '$2y$10$X5ydeV6ccSKNq7cVP9NRUOa7oH4uADUkzKr.xMCHsOgcAX9lB3hFS', 'avatar.png', 'KHheRiWEZqBplorJXwHS2e7T5fYKTyWvo1VeOxOgdDSIgjiVCOhOPME43EkV', '2021-03-03 20:02:05', '2021-03-23 23:35:04', 57, 69, 69, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImdkXC9wS1hQWE1TM3N2UlhvZkZrWkdnPT0iLCJ2YWx1ZSI6InQ1M3lldUpLMjM3cFRaY2VxbURWSmc9PSIsIm1hYyI6IjZjNTg3N2YwMTQwZTIxOTAxYmRhYTA3MmRkOWJhZTU5YTU2MGFiOWJiMTZhODAwNTdjNjdhZWM0YzBkMWJhNjEifQ==', 0, NULL, NULL, 'PZDHVAUX6HK5PG4I', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-03\",\"code\":1}', 0, 0, 0, 'I', 'D', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(69, NULL, NULL, NULL, '1969-04-07', 'F', NULL, 'Estrella', 'b99fa575cb748f65b26aadb40b814a74', 'Estrella', 'marisabu514@gmail.com', '', '2021-03-03 17:03:21', '', 0, 'Martha Ines Salgado', '$2y$10$pTl2qYicfXyu6KV4VLUrsOSXHxmp454GYSTJyjJV0DkzWi.SDE7Va', 'avatar.png', 'NbAel6xRRMM1lnvDb0VztZ6XFKUflur1jceaxX9XOF7PsOYwAZpfTj7cmpGJ', '2021-02-26 06:24:43', '2021-03-03 20:03:21', 68, 68, 68, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6InYyZktOYklvVzg5cTVNYncram9zRFE9PSIsInZhbHVlIjoiaVdVSXV2Z1ZwZmJPRnVQemw2SmN6cjhrRVBKR2VIV0ZZdmVtaTNlRFhMUT0iLCJtYWMiOiJiMGY0NGYzODIzZDhiZjllZmRkMWMyNjY2M2YyNTEzYjFmOTRlMDU5NDFlNjM0MTVmY2I2MDU4ZjQ5ZTM5N2VmIn0=', 0, NULL, NULL, 'ETTT7NLBSK3EDFTL', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(68, NULL, NULL, NULL, '1980-07-20', 'M', NULL, 'Leon', 'c0078cc3cbece3aae15cb70086dde657', 'Leon', 'haroldgarcia2050@hotmail.com', '', '2021-03-23 17:59:15', '', 0, 'Harold Garcia', '$2y$10$OeAdvFt2MDrvoGcsYiwZaOfgoesE3hlE0SWJ51Ln4PWBppbKWTOqq', 'avatar.png', '6fdoPP7P2EIizxwdgort2mawXIkrhykscnbvsnYOdUvBtq1rlSrtKVUZlPoi', '2021-02-26 06:17:35', '2021-03-02 05:15:06', 64, 67, 67, 1, 1, 8, NULL, NULL, NULL, 'eyJpdiI6InRZYnVaNjJJcjVHNnZEbTNtXC82dTVnPT0iLCJ2YWx1ZSI6ImIzQlZoWmVFc2Y1VVBTc2tzRlwvR2NFMDVLdWxLelBOeENLZ1hBR1VaMG1nPSIsIm1hYyI6IjgyZmY5NGRkZDAzNzJlOWRmZWIwZDE5MTA2YTY0ZmI2MzJmMGZjNGFjZTBmN2NmZDE3OWUyY2E4ZmYzZmEyOTAifQ==', 0, NULL, NULL, '2K3A6SMMQHLCRPF5', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(67, NULL, NULL, NULL, '2004-07-23', 'M', NULL, 'Leon', '95890318a7df8a4686695e2e6f44ddf0', 'Leon', 'Miguelito07232004@gmail.com', '', '2021-03-04 02:58:22', '', 0, 'Miguel Triana', '$2y$10$WtDUx1j8P9IAbib6XsOvK.VX6HjY9NQh25ZaUGeL6xSJh1PQExxTa', 'avatar.png', 'Gq99T4I18SvOji5UBeTXBpGgRD9igEzpGzGjUk5zhnS3YMMOFyoBkUCK40bz', '2021-02-26 06:12:25', '2021-03-02 05:15:06', 64, 66, 66, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Ikd0NWJcLzhxVXNvYm12dmJjSmJ0MFBBPT0iLCJ2YWx1ZSI6IjlxM3JTTnRDSHRLUFIrV3loK3FrNXErM2FEK3lhUnRYUE9tdHJpRXJiVjQ9IiwibWFjIjoiYmRmOTFhMjM2MGViNjNjZmZkOWEzNGRkNjRjNGMwMmNmMjg5MWU5ZjY0NWJjODRiZWNjZDFmNTk5ZjdhZTIwOCJ9', 0, NULL, NULL, '2EGMMLSVHVSUIJ2J', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(66, NULL, NULL, NULL, '1977-01-01', 'F', NULL, 'Meduza', '20d7326c1fb56b0e3f904039344f13e0', 'Meduza', 'Beatrizz270777@gmail.com', '', '2021-03-19 03:26:47', '', 0, 'Beatriz Sanabria', '$2y$10$VPM0IH7h8063yPEygNwLKefIr1dqfx5IbBPnh7EM9QSpnYvMU5tzS', 'avatar.png', 'ta35YCUc1ermR3PCptQsxoFX873hB0ipDqPsOl45wdywu3DGIRiHwGWp3B3k', '2021-02-26 06:04:25', '2021-03-03 20:03:37', 64, 65, 65, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Imh3K3ppXC9Jb21HajZhT2tnYVNyTVV3PT0iLCJ2YWx1ZSI6IlBQM1FFR3BtcHZFeFdaem51NDRmTFwvZ3ozRmlTR0NYRWxwZHkzMzBMVTdRPSIsIm1hYyI6IjkyYmU2ZjkxYjY3NDIyMDZkMjlhNGQ3NTY1MGZiZWY4ODljM2I4NWNjMmQwZjM0ZjdmY2UxYzUwMzM4OTJlNzkifQ==', 0, NULL, NULL, 'DP5BYCMY3QVR34NL', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(65, NULL, NULL, NULL, '1992-01-27', 'M', NULL, 'Smoreno2792', 'ff62151c0bc2c285a2b95358ebf05268', 'Smoreno2792', 'rogees27@hotmail.com', '', '2021-03-20 16:27:22', '', 0, 'Oro Radiante Pantera', '$2y$10$WjjkrUzvtbl2PZdhVGLrdeISjy2T3JpYMbJG0YKIGSh0CHhOEeLta', 'avatar.png', 'N3EVq4lkK5u8jAnVDJM0QHc4GbSikAiXmcqg8GDKPQfhrUq3Gfo5ubFp7tXF', '2021-02-26 06:03:30', '2021-03-04 20:35:31', 57, 64, 64, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IkVKbE1HRkYrNWRpU2MrV0Y1NDN0N0E9PSIsInZhbHVlIjoiRFEyZTVkZDhUQ1g5amxKT0R5dzFoeW1HNWhvZFZQRTlOMU9pWjA1VEpxMD0iLCJtYWMiOiJiNTdhNzg5N2UzODVmMTYxZDFiMjJmMTY3NGUxYjAwYWRiZDM1MWQ3OWZmODc5OGZmNTQ2N2EzYTQ0OTUxNjJlIn0=', 0, NULL, NULL, 'VZ5CNAPYNQM6QLHL', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(64, NULL, NULL, NULL, '1978-06-28', 'M', NULL, 'Pantera', '111767c1430f3ed5baec638db6183baa', 'Pantera', 'garciacuervomarlon@gmail.com', '', '2021-03-23 18:00:08', '', 0, 'Marlon Garcia cuervo', '$2y$10$X.8KIx52R2DMuxwfGfHmmO48ssGtsnRM9uppJjOzsqDKmZxgoTYYK', 'avatar.png', 'rwVFGXuMzV5XSxPDNSy0cUhcrt2lPuxJJLrXCBGznY4ecAmJBNg0ddgegujc', '2021-02-26 06:01:56', '2021-03-23 21:00:08', 57, 63, 63, 1, 1, 176, NULL, NULL, NULL, 'eyJpdiI6IkZycit0azVYYlNlQXlkbVwvTW5MZXFBPT0iLCJ2YWx1ZSI6IkJTVVVJQXh3V2pGZjI3VDFmdElRRWc2ZjR2dUN1TEE5YWFNXC9cL0pvV05FTT0iLCJtYWMiOiI3ZDkwODE4MzZkMzkzODdmODQ2ZmM5OGIxMDAwYTI3ZmY1MDA4OTc3NjkxODg1NTgwOWI2MWZlOWNlMGM2MWU1In0=', 0, NULL, NULL, '2RAPD46EV4VFUTDW', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(63, NULL, NULL, NULL, NULL, NULL, NULL, '', '6a2fdfb874684b5c99efa8996cb98064', '', '222rosero@gmail.com', '', '2021-03-20 21:32:43', '', 0, '', '$2y$10$yMF3u7mEgD10WDPQ1xMvuegRMAsq.Bo5wGrJbEOnkejmKTa1Sa2LC', 'avatar.png', 'uW0A5L3AhNcLUe0FEQYNLM5c8kUp2SYSvvBUAS0j7n2CK8j9An7n9v76h9bN', '2021-02-26 05:55:53', '2021-03-17 00:12:45', 60, 62, 62, 1, 1, 8, NULL, NULL, NULL, 'eyJpdiI6IndCTHo5NVpXa29xc0hGcnllSUdtNXc9PSIsInZhbHVlIjoidkxFbFVSYXZUZmd2aEV0Z0VoaGIzWWdmVExWd3Yyc3RDWWVwajcrZnhCaz0iLCJtYWMiOiI2ODM5Yzg0YzYyMjkzMDM4MDYzZDIwZGRjYTFhYTJmZjJlYTBiYzhjYTQ0MDhiNGJiN2YxMGIwZTlmOTQwODE3In0=', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(62, NULL, NULL, NULL, '1985-03-14', 'M', NULL, 'kherreracoral', 'bb7c5c2f33cc3602fb901aeace23cfba', 'kherreracoral', 'kalel.herrera@hotmail.com', '', '2021-03-04 12:26:51', '', 0, 'Kalel Herrera Coral', '$2y$10$xaPIocr23MgZAdAqPxF2puL5tLs4XpTArSxfIRyhKKDeN4aLrNQGi', 'avatar.png', 'vSywn22UZZqO7ovSl2TknbjRPRGAJwANHCiUXfPOcgiBrRVr3fZF1Zq3Z9En', '2021-02-26 05:50:24', '2021-03-04 15:26:51', 57, 61, 61, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImFsbXNkWHBYbVl0a2UrTzkyNmE4S2c9PSIsInZhbHVlIjoiaDB2WWQyQzBlVmx5QndXWlE4QUpMUExrcGp6dndWS3pWcjg1aWszczB5dz0iLCJtYWMiOiJkMzUyODI3MDM5ZTI0MGUwMmIyMDNlM2Y2OWZhZjA3YzMzNGZkZWYwNGNjYWRlYjAwZGZmMzYwMjQxNWE0NzUyIn0=', 0, NULL, NULL, 'BIJOPKWN5ONFDJFV', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'D', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(61, NULL, NULL, NULL, '1990-02-18', 'M', NULL, 'Juan', 'b074c41043d817c66ad75f60c09c3fc8', 'Juan', 'valdeszamoranojuandavid@gmail.com', '', '2021-03-24 06:35:54', '', 0, 'Juan Valdes', '$2y$10$2zLhnxJSBauCi0UuQr69R.nf2XKaWjr8PHrUK9cuC7lskCHMQIbyu', 'avatar.png', 'sCDMJTR18LIJ0Ta4PGXJu812MhqbIh4MaLGtd6vzml6lgkjqsc82sX3luY2R', '2021-02-26 05:50:19', '2021-03-24 09:35:54', 60, 60, 60, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IjdNNmpJbkE0S2tuZWpGNkJZWWhxeXc9PSIsInZhbHVlIjoiRjBXQU1OZEhjUTkzbzJWSmI4UFVqV1NOKzA3XC92Tjc4Y2NOVUJlTDFpeDA9IiwibWFjIjoiYzc1ODVhM2U2NmJjNzk4NjZiZmJhODY2ZDU0NDA5YWY5ZDg5MmU5ODlmNjIxYTBmMDlkN2FhZWM4NzQyOTc2NSJ9', 0, NULL, NULL, 'O2X2I7NMN6GOMTBU', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(60, NULL, NULL, NULL, '1997-04-11', 'F', NULL, 'junysfer', 'b5d573bd4e3b809d467edee654ad861a', 'junysfer', 'junysqr@gmail.com', '', '2021-03-02 02:15:06', '', 0, 'Junys Quintero', '$2y$10$SZVDUifTuYLUKiygWidPpOdlnF2yqeRInYUNmxUYJTr08rWB.f2RK', 'avatar.png', 'Vh3VLLyoMLY63o46qhNNlcrYUvDS7ZfVWIjphoieA7tCEV6y6R25mWSOLCP0', '2021-02-26 05:47:02', '2021-03-02 05:15:06', 57, 59, 59, 1, 1, 80, NULL, NULL, NULL, 'eyJpdiI6ImdaOU9icEFJaGVZazR3RzdwMzZEdWc9PSIsInZhbHVlIjoiZ1MxWmZtdGxROU1oNWhPK2FFenlwVHhRRnpvOG1sZTNcL1NKaUFDQU91Z3c9IiwibWFjIjoiOGQwMDhkMDQzZjRhNzFmYzkzMGJkMGM2NTg5ODUzNTgxNDVlYzljODU1MzQwOGI3MjVkZDgwZTljZjI5NWZiMSJ9', 0, NULL, NULL, 'AF7ZGUF7LQWRQ5TL', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(59, NULL, NULL, NULL, '1985-11-16', 'M', NULL, 'negocio mundial', '8c957b59e06c902729eddbddcad477e8', 'negocio mundial', 'alvarocop22@gmail.com', '', '2021-03-23 20:03:24', '', 0, 'alvaro ropero barrera', '$2y$10$w3SWpyc.XWl.pUyldfo0xuu0DhqVPHTTMUxLrewNPujIYPBSWPqEG', 'avatar.png', 'LJGQ63hKMMwNeCPbxyvvJGbcCkpiZqwwhqkatzNfM4T6gHtuG9mwWKTWhbsf', '2021-02-26 05:41:28', '2021-03-23 23:03:24', 57, 58, 58, 1, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImxSUWk5KzJHOXc3V0tPdnRNXC9qRVwvZz09IiwidmFsdWUiOiJRMDJcL0VlT2prVlpyNGNrMDlIbDF2dTh0U1lFa1FLM1BcL1l5d2hWNHBmd3M9IiwibWFjIjoiMWQxOTk3NDBlMzI4NDVlNzQ0MGQ0ZDYwYmQwMTFmOGFhM2YwNWJlOTA0MjVjOTMwODEwMjM4MDI5Nzk2MTBmYSJ9', 0, NULL, NULL, 'HU4ZONEAKKMI5MEH', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(58, NULL, NULL, NULL, '1988-01-17', 'F', NULL, 'Rubí', 'c96fea40f4f4b277f9b305a9adc65153', 'Rubí', 'jirjualve1722@gmail.com', '', '2021-02-26 02:37:38', '', 0, 'Rubí D” la Vega', '$2y$10$n.MgZaN3fBe8XVrfWfyBp.rgyReN/6vGydRVdSHjeb1Y9yG6OTatq', 'avatar.png', NULL, '2021-02-26 05:34:24', '2021-02-26 05:37:38', 57, 57, 57, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6InNYWmdMM1pqVXF2dWVzTEZFMFJFZXc9PSIsInZhbHVlIjoiNWs5Z2xoemU2NHpHUWd5emhjYlZwcUF5djcwNnFxXC9BZER2NFdORzF4cFU9IiwibWFjIjoiYzQ4MmZlOTY1NzJkNzViODc4ODgyNTRjZWZkMDgxM2QyNTY4OTcxZTA4Yzg4MmJiZjYxNWE1Nzg4MjEwMzI2OSJ9', 0, NULL, NULL, 'DLVIZJV7QD37FWC5', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(57, NULL, NULL, NULL, '1990-10-25', 'F', NULL, 'AMOR', 'df8e29ba914a7eef7cfcc1fed61da8ce', 'AMOR', 'ventasgacerva@gmail.com', '', '2021-03-23 20:45:03', '', 0, 'AMOR DESDE EL ALMA', '$2y$10$HaYCAeD.WVorhAGpupps2uysmnpw95osneBf7PJtxVLAug2rnb7HS', 'avatar.png', 'syGojvUD8qGGmLjtZ8UjvJES8W4MYzbC2Xx9yGFBKOMh0MjEF5crevn4e2hQ', '2021-02-26 05:25:39', '2021-03-23 23:45:03', 56, 56, 56, 1, 1, 816, NULL, NULL, NULL, 'eyJpdiI6IitCaXVSdWlvbDg4aDd2MEc3K2RlcWc9PSIsInZhbHVlIjoiOWZSaDUwWjAzNUxkam1kMkFzN3FLXC9uWVRGUm1NZ09zWHVqRWhRMmhIeVk9IiwibWFjIjoiNjIxZGVmZGY2OGU2OThjMzNlNmJkNmRlMzMyOTFmMDU4NTcxNGYwYTBlODVlNjc5ZjhhZGNiNWVhMDRmZDNjMyJ9', 0, NULL, NULL, 'A3UVOQNJZJC45DKP', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(56, NULL, NULL, NULL, '1986-06-25', 'M', NULL, 'ONASIS', '6b6c0cb69b027d292799b23b9cf622b2', 'ONASIS', 'johnjabarbosam@gmail.com', '', '2021-03-12 00:52:30', '', 0, 'ONASIS ARISTOTELES', '$2y$10$jxCaBqfX4qReqMZFvU41veA9HE64mRRllb/HebbwlxvRjOcbLGNZK', 'avatar.png', 'UQGGusufzzBgVwwWRcEPiYrlSrC33UHlGIh8HMbctAGU4yUVAnrTREwPccLu', '2021-02-26 05:19:28', '2021-03-02 11:41:22', 51, 55, 55, 1, 1, 400, NULL, NULL, NULL, 'eyJpdiI6IlFhU0w2MmJYMzJFNnZEQWRYYmVqWEE9PSIsInZhbHVlIjoiVTdTdXRZMVNzSnRCTDV2MzdQd0dnNEF2STdmbFF3Rm9ndXozUlJQaGdJaz0iLCJtYWMiOiJjZmVkNDQ0ZWJlZDlhOTZkODRhNDdkOTY0YTQ0OGExNDZlZTk2NTgwOTE3NTZiOTZkZWM1ZmE3NmRiMjc5OWZlIn0=', 0, NULL, NULL, 'PUGBROZ2DYTQCUBQ', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(55, NULL, NULL, NULL, '1997-06-25', 'F', NULL, 'master 3', 'a283e7f8b494b95842c8cca32bad98dc', 'master 3', 'restrepovictoriac@gmail.com', '', '2021-02-26 02:18:51', '', 0, 'global master 3', '$2y$10$Xp78SScV2q0RLg6pQxT90u5cFxVbkC/y.6iiL6CzTu6p79GjWm.E2', 'avatar.png', 'IlCYQM4AeHX6GQr8Omja8DEQzXB5whbQfIdUMinl67FjNF8XKk4h8NaHY0ZB', '2021-02-26 05:17:17', '2021-02-26 05:18:13', 51, 54, 54, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Imd3dEI5cFdZSWw3QzhJKytsbjRTT2c9PSIsInZhbHVlIjoiV2tkNlVQMlQzdFpLa0EzXC9cLzF3am92VWxoN2lTdTlaMFgzMXVSUzhIbWZjPSIsIm1hYyI6ImZjYzAzYWFkZGI2NGQ0NGQ0Njk5MjVlYmMwZTVmYjY2Njc0NzNjNGY5MzZmYWVlYWRiM2Q5NDg5NDdmNWQ4MjcifQ==', 0, NULL, NULL, 'CPEGE5JHUGSVOZSN', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(53, NULL, NULL, NULL, '2021-02-25', 'F', NULL, 'masster 1', 'b5ae80938cf7d3cc78dacd52d2f53033', 'masster 1', 'globalmaster444@gmail.com', '', '2021-02-26 02:11:55', '', 0, 'global master 1', '$2y$10$Arl1QOuCJxm48gGGv9hvE.ePXjn7aaL/ZXuZpTD/CO9itik/cw6RW', 'avatar.png', 'C8zAUZSvhX9ihvzV85zRYhzH8QcDXpaW1IAxcO1UVpGGn6E915i5ve1okbDg', '2021-02-26 05:10:40', '2021-02-26 05:11:34', 51, 51, 51, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IlU5bUVqNDUwTHk0R2x4TkNVSUVYK0E9PSIsInZhbHVlIjoiMzdmaWxGM3ZYR0Vwcnh3UEZoZjdYaE9YaDFcLzBOcmZsQjlXYlRWTzNPUVU9IiwibWFjIjoiMDQwZjg4NGIwZmMxNTNlMDQ5YjVmMDMyOWFhYWZiMGJjZWFhYTljZjFjY2NjMDA3ZDc0NWVlNTg1M2RkZjhhMyJ9', 0, NULL, NULL, '42LYAUXROSJF5SDK', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(54, NULL, NULL, NULL, '1999-06-25', 'F', NULL, 'master 2', 'b5ae80938cf7d3cc78dacd52d2f53033', 'master 2', 'globalmaster888@gmail.com', '', '2021-02-26 02:16:02', '', 0, 'global master 2', '$2y$10$Uh4enj7nGUglCiDFD80wX..k4csj8nRaGq3RzmzeevntcxDZJ.3JG', 'avatar.png', 'pKKuRjVJ1dOV3aqNNz3HPXyOVH272d1JRN6nkL0evHlcv9knFTFHJutiv3wr', '2021-02-26 05:14:47', '2021-02-26 05:15:52', 51, 53, 53, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6IkdcL0krendFRmFoc3VmZmVBYSt5MFdBPT0iLCJ2YWx1ZSI6IjJNNUZ5RzFpQVRIK28zUHRHYTlLeFo2a1YrY3prS2pLRVQyV1dDS1N2cXc9IiwibWFjIjoiZjg1NzkwMTYxMjQwN2NjNmViOGE4ODZkNjViMDY3MDEyOWMyMTc5ZmVkNTVhNzIwZDZkNTEwY2Y4MjE5MjM4MiJ9', 0, NULL, NULL, 'ODI2SROJXMEW52B6', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-26\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(77, NULL, NULL, NULL, '2021-03-12', 'M', NULL, 'Sánchez', '8af3e30bfa5ed70be60803050f84731c', 'Sánchez', 'wanda18843@gmail.com', '', '2021-03-13 23:55:15', '', 0, 'Wanda Avila', '$2y$10$PhoRwJFitiFzZRJ6rdIqIOjnANjoXcq9UgztCA5PzzcGsgZjUcHkK', 'avatar.png', NULL, '2021-03-12 21:33:56', '2021-03-14 02:55:15', 56, 76, 76, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6InhSTVhseVNDTXBnRjhieUp1ZFA5REE9PSIsInZhbHVlIjoiWTNhd0FHeHcrZnFaY2ppVzVRcG8wVzZ6SVVcL2psRFljWGJBNW43KzVhSmc9IiwibWFjIjoiMmJiMTM4ZmQ3N2Y3NDJlNTFjNDE3MTgyMjZlYjUxYjE3MDc5Y2Q0NDVmMGRiNGI2M2EwOTZlZTVlOGI4MDg3NSJ9', 0, NULL, NULL, 'ASAF63G7E7XDKDVA', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-12\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(51, NULL, NULL, NULL, '2021-07-25', 'M', NULL, 'GoldenBit', '03895387c326817567db955a4fcae48c', 'GoldenBit', 'Companygoldenbit@gmail.com', '', '2021-03-02 14:46:41', '', 0, 'Company GoldenBit', '$2y$10$0g9JjqHo2iG65V4ooZCL4enotfTeH.P0kiEh3ZMNSBlfEy8dKQ7ga', 'avatar.png', 'HcxaY4Ois33Ym42g3j5m6wTqiRSFftYz7Ns5WPua9uGOZHs6ZARSyFPtoyLa', '2021-02-25 07:23:49', '2021-03-02 05:15:06', 1, 1, 1, 1, 1, 400, NULL, NULL, NULL, 'eyJpdiI6IkR4c2tkN0loSSsyMXduVVpIWVRZN2c9PSIsInZhbHVlIjoiQkgwb3pxV1BYcDRZK2xtSFVEcHBWVUI3SFpKRmRrZExha3B2T3IzVEpFMD0iLCJtYWMiOiJmZjY2ZTFkYmZjNDQ1MzQ5ZGYzMDQwZTE5YzJjMTUwOTU0NTc4OGQ4ZTlkZDQ3MTM0YzVlODhkNWNlN2I0MzAxIn0=', 0, NULL, NULL, 'INDJ25BWPZDH275D', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-03-25\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(85, 'Luisana Marín', '0412-0924871', 'Venezuela', NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'luisanaelenamarin@gmail.com', '', '2021-04-09 15:48:28', '', 0, 'Luisanaelena Marín', '$2y$10$EI.7wKvXa5KzH7IcUl2S8OojFENgBznRJZyO3/LCjdB5JBXPb5YJu', 'avatar.png', '4E1F3w4No7c1LGrjyynuNOpvJvrodvXFi3aZqQadlckujCbPioGShKrbZBdR', '2021-03-25 00:07:37', '2021-04-09 19:43:42', 1, 84, 84, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6Ilh6WW5PMUZreXJrXC9YNmJXVUdUSXFnPT0iLCJ2YWx1ZSI6InpReXNuZDU5Mk1IZ3lpTE5OaGd4Qkd5cVZDZzI1dWRjanhsVVRlUEJyeGc9IiwibWFjIjoiMTlmNTA0MGU4ZmRlMGJjOThhY2ZjNDQ3MzI4ZDJjMWY2NWRkODAxZTBiN2ViYjNhZWY4YTI3OTE4YTMxNzI5OCJ9', 0, 'aba7120966931be44371a0547917ed85', NULL, 'C5DRQG4JPFA5GTTK', 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-24\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(86, NULL, NULL, NULL, NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'lvmb29@gmail.com', '', '2021-04-06 19:23:59', '', 0, 'Luisanaelena Marín', '$2y$10$U2nuzfU5BDgSGXnaEEcImOlYh0xUs5FYtjeJ5jyzZ2IuJSTsPeNOC', 'avatar.png', 'Ba9CtYJD5aw72SNNJ8gMHpid2aaf3jxwMiKHzLK64tU5t21op8ArVtJEfmZL', '2021-03-25 00:20:22', '2021-03-25 00:20:22', 85, 85, 85, 0, 1, 250, NULL, NULL, NULL, 'eyJpdiI6InZDdVBLRDVVQVc4XC9DOEJwbCtySnd3PT0iLCJ2YWx1ZSI6IlFwTjE2bFV6TEZwXC9TZEtCT1VyZkJ4ckh4bk9WQ0JiSXRKQ0tWcDdOWDF3PSIsIm1hYyI6ImJhODk2ZDZhYThjZmQxYmExYWEwNTk0MjNlZjYwMTA1OTAzZTZkYjVhNDY0YzkxZjEzMmY4ODYyMzNiMGY1ZWYifQ==', 0, NULL, NULL, NULL, 'Normal', 0, NULL, '{\"nombre\":\"Gold\",\"fecha\":\"2021-04-24\",\"code\":1}', 0, 0, 0, 'I', 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(87, NULL, NULL, NULL, NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'fjms93@gmail.com', '', '2021-04-06 19:28:11', '', 0, '', '$2y$10$KQ5d4IQmvM36tml5loVJYuF..i4vJq70W00GtCH3drLTMyFoCCAdu', 'avatar.png', NULL, '2021-04-05 21:10:34', '2021-04-05 21:10:34', 85, 0, NULL, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImNqcDRwdlNQS3N1M3JydU42amhOWVE9PSIsInZhbHVlIjoiRVBKNkM4NWtGQ0Vacm5FTWgyRUhRQ21jd0FTUm82dnNwMjdtSGozYzZHND0iLCJtYWMiOiJjNGY3YTdkNGIyODkzY2ZkNWY0ZTQzODI2MzU1YzZjZDEzNjg2MDg1ZTA2MDhlMjNiNTJiODM5N2JkMmZiMDcyIn0=', 0, NULL, NULL, NULL, 'Normal', 0, NULL, NULL, 0, 0, 0, NULL, 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(88, NULL, NULL, NULL, NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'chechotech92@gmail.com', '', '2021-04-06 19:28:34', '', 0, '', '$2y$10$3.L2x/YToURkW8DqlgOeEuVg7afU1FnkRuofLN5YXZfdoCwIsPsLq', 'avatar.png', 'nya5RBJvDwBXZY2SXVrPkViUbRdCfFJkU5S9NdMMjAsw158a8BgHs3lXu8gM', '2021-04-05 22:59:13', '2021-04-05 22:59:13', 87, 0, NULL, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImpiQW9icTRKZW1qakNxcVJxV1YyV3c9PSIsInZhbHVlIjoic2t6UTVQXC8zOTQxWm9KSldBNmZyMFFtMUFVbWV3dGJuemZ1WlpsbVwvNXlNPSIsIm1hYyI6ImFlYTUzYjMzN2NhOGIwODA4MTE5ZWE1YjYwZjE4ZWNkYmQxY2ZjMTBhZTEyMjI0YWVkZDRmNjEwZDIzZDdlOGQifQ==', 0, NULL, NULL, NULL, 'Normal', 0, NULL, NULL, 0, 0, 0, NULL, 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL),
(89, NULL, NULL, NULL, NULL, NULL, NULL, '', '25f9e794323b453885f5181f1b624d0b', '', 'prueba@gmail.com', '', '2021-04-08 19:22:11', '', 0, '', '$2y$10$8U3gU4gCqV5.D820veQhieajateD/idpkfuYWt.kDIxbtVF4r8jh6', 'avatar.png', 'gfLwVtLSdTodOaWB2yqXh3bWVC0RU6wIefgL2Z1Cbphxwg8GWT3aoaBiTRH8', '2021-04-08 23:20:43', '2021-04-08 23:20:43', 1, 0, NULL, 0, 1, 0, NULL, NULL, NULL, 'eyJpdiI6ImwrRVlGejV6QjJZV0xrV0VSdzVXSFE9PSIsInZhbHVlIjoidUE1d1RxcVwvZkxldVFsdWJwZkdVa3lzR2NMcjYyUWMrK2JQQmlhNWF4T2c9IiwibWFjIjoiZmVhYTEzYzBjNDAxYmRjN2Y0NzNkNDNlMzk5NzQ2M2U5YTQxM2JjMWRmYmVjOGVkMmUyMGZhMThhNmU2MWUxYSJ9', 0, NULL, NULL, NULL, 'Normal', 0, NULL, NULL, 0, 0, 0, NULL, 'I', NULL, '$2y$10$lN5bwdjNkHJn.JpPwmAJFefB531ydfFdJ54FEF8S4MaVSk2OrWTFm', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
