-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2018 at 04:15 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metbitco_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod_anuncio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_anuncio` enum('venta','compra') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moneda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_moneda` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criptomoneda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_cripto_moneda` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `margen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_minimo_moneda` decimal(10,2) NOT NULL,
  `limite_min` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limite_max` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terminos` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_anuncio` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anuncios`
--

INSERT INTO `anuncios` (`id`, `cod_anuncio`, `tipo_anuncio`, `ubicacion`, `cod_postal`, `localidad`, `departamento`, `ciudad`, `moneda`, `nombre_moneda`, `criptomoneda`, `nombre_cripto_moneda`, `banco`, `margen`, `precio_minimo_moneda`, `limite_min`, `limite_max`, `lugar`, `terminos`, `estado_anuncio`, `user_id`, `created_at`, `updated_at`) VALUES
(104, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:22:13', '2018-12-11 03:22:13'),
(105, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:22:48', '2018-12-11 03:22:48'),
(106, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:24:01', '2018-12-11 03:24:01'),
(107, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:25:27', '2018-12-11 03:25:27'),
(108, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 5, '2018-12-11 03:26:04', '2018-12-11 03:42:52'),
(109, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:26:42', '2018-12-11 03:26:42'),
(110, 'V2', 'venta', 'Gujarat, India', NULL, NULL, 'GJ', 'India', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'BALOTO O EFECTY', '0.3', '79132.00', '80000.00', '900000.00', 'Lugares publicos', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'activo', 5, '2018-12-11 03:28:11', '2018-12-11 03:28:11'),
(111, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:34:27', '2018-12-11 03:34:27'),
(112, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:34:44', '2018-12-11 03:34:44'),
(113, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:36:52', '2018-12-11 03:36:52'),
(114, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:37:29', '2018-12-11 03:37:29'),
(115, 'V13', 'venta', 'Edgartown, MA, USA', NULL, 'Edgartown', 'MA', 'United States', 'COP', 'Colombian Peso ($)', '13', 'Ixcoin', 'BALOTO O EFECTY', '100', '155.00', '200.00', '300000.00', 'Lugares publicos', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'activo', 5, '2018-12-11 03:39:02', '2018-12-11 03:39:02'),
(116, 'V56', 'venta', 'Barbados', NULL, NULL, NULL, 'Barbados', 'COP', 'Colombian Peso ($)', '56', 'Zetacoin', 'davivienda', '0.6', '3.00', '5000.00', '100000.00', 'BIBLIOTECAS', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'activo', 5, '2018-12-11 03:42:02', '2018-12-11 03:42:02'),
(117, 'V2', 'venta', 'Pruszków, Poland', '05-800', 'Pruszków', 'Masovian Voivodeship', 'Poland', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'efecty', '0.3', '75844.00', '76000.00', '80000.00', 'Bibliotecas o cualquier lugar publico', 'prueba', 'activo', 561, '2018-12-11 20:32:04', '2018-12-11 20:32:04'),
(118, 'V13', 'venta', 'Comando de Policia de Soacha, Calle 2 Sur, Soacha, Bogota, Colombia', '250054', 'Bogotá', 'Bogotá', 'Colombia', 'COP', 'Colombian Peso ($)', '13', 'Ixcoin', 'BBVA', '0.5', '95.00', '36500.00', '50000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, realiza el pago a través de Payu y pongase en contacto conmigo.', 'activo', 571, '2018-12-20 17:02:17', '2018-12-20 17:02:17'),
(119, 'V35', 'venta', 'Providencia, Chile', NULL, 'Providencia', 'Santiago Metropolitan Region', 'Chile', 'COP', 'Colombian Peso ($)', '35', 'Phoenixcoin', 'GRUPO AVAL', '50', '10.00', '10000.00', '2000000.00', 'Transaccion electronica', 'PRUEBA', 'activo', 571, '2018-12-20 17:05:22', '2018-12-20 17:05:22'),
(120, 'V141', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '141', 'MintCoin', 'efecty', '1000', '2.00', '100000.00', '2300000.00', 'Bibliotecas o cualquier lugar publico', 'PRUEBA', 'activo', 571, '2018-12-20 17:08:00', '2018-12-20 17:08:00'),
(121, 'V8', 'venta', 'Orlando, FL, USA', NULL, 'Orlando', 'FL', 'United States', 'COP', 'Colombian Peso ($)', '8', 'Feathercoin', 'giro internacional', '0.9', '70.00', '100000.00', '1230000.00', 'Bibliotecas o cualquier lugar publico', 'PRUEBA', 'activo', 571, '2018-12-20 17:08:29', '2018-12-20 17:08:29'),
(122, 'V93', 'venta', 'Gachetá, Cundinamarca, Colombia', '251230', 'Gachetá', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '93', '42-coin', 'PRUEBA', '0', '81135077.00', '90000000.00', '100000000.00', 'Transaccion electronica', 'PRUEBA', 'activo', 571, '2018-12-20 17:09:59', '2018-12-20 17:09:59'),
(123, 'V52', 'venta', 'Paris, France', NULL, 'Paris', 'Île-de-France', 'France', 'COP', 'Colombian Peso ($)', '52', 'XRP', 'BDB', '0.3', '1245.00', '30000.00', '500000.00', 'Transaccion electronica', 'PRUEBA', 'activo', 571, '2018-12-20 17:11:23', '2018-12-20 17:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `bonificaciones`
--

CREATE TABLE `bonificaciones` (
  `id` int(11) NOT NULL,
  `tipo_bonificacion` enum('REGISTRO','RECARGA') NOT NULL,
  `fk_id_detalle_referido` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonificaciones`
--

INSERT INTO `bonificaciones` (`id`, `tipo_bonificacion`, `fk_id_detalle_referido`, `valor`, `created_at`, `updated_at`) VALUES
(25, 'REGISTRO', 20, '100.00', '2018-11-13 22:36:01', '0000-00-00 00:00:00'),
(26, 'RECARGA', 20, '2000.00', '2018-11-16 19:44:37', '0000-00-00 00:00:00'),
(28, 'REGISTRO', 22, '100.00', '2018-11-21 21:20:39', '0000-00-00 00:00:00'),
(29, 'REGISTRO', 23, '100.00', '2018-11-30 16:39:58', '0000-00-00 00:00:00'),
(30, 'REGISTRO', 24, '100.00', '2018-11-30 16:46:07', '0000-00-00 00:00:00'),
(31, 'REGISTRO', 25, '100.00', '2018-11-30 16:51:32', '0000-00-00 00:00:00'),
(33, 'REGISTRO', 27, '100.00', '2018-12-03 04:57:55', '0000-00-00 00:00:00'),
(34, 'RECARGA', 22, '200.00', '2018-12-04 21:37:13', '0000-00-00 00:00:00'),
(35, 'RECARGA', 22, '200.00', '2018-12-04 21:37:48', '0000-00-00 00:00:00'),
(36, 'RECARGA', 22, '200.00', '2018-12-04 21:37:53', '0000-00-00 00:00:00'),
(37, 'RECARGA', 22, '250.00', '2018-12-04 22:46:19', '0000-00-00 00:00:00'),
(38, 'RECARGA', 20, '200.00', '2018-12-10 22:58:58', '0000-00-00 00:00:00'),
(39, 'RECARGA', 20, '200.00', '2018-12-10 23:06:29', '0000-00-00 00:00:00'),
(41, 'REGISTRO', 29, '100.00', '2018-12-10 23:21:48', '0000-00-00 00:00:00'),
(42, 'RECARGA', 20, '210.00', '2018-12-11 16:26:40', '0000-00-00 00:00:00'),
(43, 'RECARGA', 29, '200.00', '2018-12-20 17:04:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_clic_anuncios`
--

CREATE TABLE `detalle_clic_anuncios` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_anuncio` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `costo` decimal(8,2) NOT NULL,
  `tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_vistas` int(11) NOT NULL DEFAULT '1',
  `calificacion` int(11) DEFAULT NULL,
  `opinion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detalle_clic_anuncios`
--

INSERT INTO `detalle_clic_anuncios` (`id`, `id_anuncio`, `id_usuario`, `costo`, `tipo`, `num_vistas`, `calificacion`, `opinion`, `comentario`, `created_at`, `updated_at`) VALUES
(169, 106, 1, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-11 16:46:05', '2018-12-11 11:46:05'),
(170, 117, 5, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-20 16:55:49', '2018-12-20 11:55:49'),
(171, 123, 5, '0.00', 'compra', 5, NULL, NULL, '', '2018-12-20 17:12:18', '2018-12-20 16:49:39'),
(172, 119, 5, '0.00', 'compra', 5, NULL, NULL, '', '2018-12-20 17:21:56', '2018-12-20 16:49:21'),
(173, 120, 5, '0.00', 'compra', 11, NULL, NULL, '', '2018-12-20 17:26:30', '2018-12-20 16:49:16'),
(174, 118, 5, '0.00', 'compra', 6, NULL, NULL, '', '2018-12-20 17:35:01', '2018-12-20 16:48:14'),
(175, 122, 5, '50.00', 'compra', 5, NULL, NULL, '', '2018-12-20 17:53:48', '2018-12-20 13:17:09'),
(176, 121, 5, '0.00', 'compra', 7, NULL, NULL, '', '2018-12-20 18:00:58', '2018-12-20 16:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_horario_usuario`
--

CREATE TABLE `detalle_horario_usuario` (
  `id` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `dia` enum('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO') NOT NULL,
  `horario` varchar(11) NOT NULL DEFAULT '08:00|20:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_dia` enum('ABIERTO','CERRADO') NOT NULL DEFAULT 'ABIERTO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_horario_usuario`
--

INSERT INTO `detalle_horario_usuario` (`id`, `id_user`, `dia`, `horario`, `created_at`, `updated_at`, `estado_dia`) VALUES
(2, 1, 'LUNES', '08:00|20:00', '2018-11-30 21:07:58', '2018-11-16 11:46:07', 'ABIERTO'),
(3, 1, 'MARTES', '08:00|20:00', '2018-12-11 14:50:03', '2018-11-16 11:46:07', 'ABIERTO'),
(4, 1, 'MIERCOLES', '08:00|20:00', '2018-11-16 16:46:07', '2018-11-16 11:46:07', 'ABIERTO'),
(5, 1, 'JUEVES', '08:00|20:00', '2018-11-16 16:46:08', '2018-11-16 11:46:08', 'ABIERTO'),
(6, 1, 'VIERNES', '08:00|20:00', '2018-12-11 14:50:02', '2018-11-16 11:46:08', 'ABIERTO'),
(7, 1, 'SABADO', '08:00|20:00', '2018-11-16 16:46:08', '2018-11-16 11:46:08', 'ABIERTO'),
(8, 1, 'DOMINGO', '08:00|20:00', '2018-11-16 16:46:08', '2018-11-16 11:46:08', 'ABIERTO'),
(9, 2, 'LUNES', '08:00|20:00', '2018-11-16 16:46:44', '2018-11-16 11:46:44', 'ABIERTO'),
(10, 2, 'MARTES', '08:00|20:00', '2018-11-16 16:46:44', '2018-11-16 11:46:44', 'ABIERTO'),
(11, 2, 'MIERCOLES', '08:00|20:00', '2018-11-16 16:46:44', '2018-11-16 11:46:44', 'ABIERTO'),
(12, 2, 'JUEVES', '08:00|20:00', '2018-11-16 16:46:45', '2018-11-16 11:46:45', 'ABIERTO'),
(13, 2, 'VIERNES', '08:00|20:00', '2018-11-16 16:46:45', '2018-11-16 11:46:45', 'ABIERTO'),
(14, 2, 'SABADO', '08:00|20:00', '2018-11-16 16:46:45', '2018-11-16 11:46:45', 'ABIERTO'),
(15, 2, 'DOMINGO', '08:00|20:00', '2018-11-16 16:46:45', '2018-11-16 11:46:45', 'ABIERTO'),
(16, 3, 'LUNES', '08:00|20:00', '2018-11-16 16:47:10', '2018-11-16 11:47:10', 'ABIERTO'),
(17, 3, 'MARTES', '08:00|20:00', '2018-11-16 16:47:11', '2018-11-16 11:47:11', 'ABIERTO'),
(18, 3, 'MIERCOLES', '08:00|20:00', '2018-11-16 16:47:11', '2018-11-16 11:47:11', 'ABIERTO'),
(19, 3, 'JUEVES', '08:00|20:00', '2018-11-16 16:47:11', '2018-11-16 11:47:11', 'ABIERTO'),
(20, 3, 'VIERNES', '08:00|20:00', '2018-11-16 16:47:12', '2018-11-16 11:47:12', 'ABIERTO'),
(21, 3, 'SABADO', '08:00|20:00', '2018-11-16 16:47:12', '2018-11-16 11:47:12', 'ABIERTO'),
(22, 3, 'DOMINGO', '08:00|20:00', '2018-11-16 16:47:12', '2018-11-16 11:47:12', 'ABIERTO'),
(30, 5, 'LUNES', '08:00|14:00', '2018-11-19 15:56:28', '2018-11-16 11:48:10', 'ABIERTO'),
(31, 5, 'MARTES', '08:00|23:00', '2018-11-16 19:39:43', '2018-11-16 11:48:10', 'ABIERTO'),
(32, 5, 'MIERCOLES', '08:00|20:00', '2018-11-21 15:13:02', '2018-11-16 11:48:11', 'ABIERTO'),
(33, 5, 'JUEVES', '08:00|20:00', '2018-11-16 19:46:19', '2018-11-16 11:48:11', 'CERRADO'),
(34, 5, 'VIERNES', '08:00|14:00', '2018-11-16 19:40:16', '2018-11-16 11:48:11', 'ABIERTO'),
(35, 5, 'SABADO', '08:00|20:00', '2018-11-16 16:48:11', '2018-11-16 11:48:11', 'ABIERTO'),
(36, 5, 'DOMINGO', '08:00|20:00', '2018-11-16 16:48:11', '2018-11-16 11:48:11', 'ABIERTO'),
(37, 554, 'LUNES', '08:00|20:00', '2018-11-16 16:49:18', '2018-11-16 11:48:34', 'ABIERTO'),
(38, 554, 'MARTES', '08:00|20:00', '2018-11-16 16:49:23', '2018-11-16 11:48:34', 'ABIERTO'),
(39, 554, 'MIERCOLES', '08:00|20:00', '2018-11-16 16:49:28', '2018-11-16 11:48:34', 'ABIERTO'),
(40, 554, 'JUEVES', '08:00|20:00', '2018-11-16 16:49:32', '2018-11-16 11:48:34', 'ABIERTO'),
(41, 554, 'VIERNES', '08:00|20:00', '2018-11-16 16:49:36', '2018-11-16 11:48:34', 'ABIERTO'),
(42, 554, 'SABADO', '08:00|20:00', '2018-11-16 16:49:40', '2018-11-16 11:48:34', 'ABIERTO'),
(43, 554, 'DOMINGO', '08:00|20:00', '2018-11-16 16:49:44', '2018-11-16 11:48:34', 'ABIERTO'),
(44, 555, 'LUNES', '10:14|20:00', '2018-11-19 18:38:46', '2018-11-16 12:12:37', 'CERRADO'),
(45, 555, 'MARTES', '08:00|20:00', '2018-11-16 17:12:37', '2018-11-16 12:12:37', 'ABIERTO'),
(46, 555, 'MIERCOLES', '08:00|20:00', '2018-11-16 17:12:37', '2018-11-16 12:12:37', 'ABIERTO'),
(47, 555, 'JUEVES', '08:00|20:00', '2018-11-16 17:12:37', '2018-11-16 12:12:37', 'ABIERTO'),
(48, 555, 'VIERNES', '08:00|20:00', '2018-11-16 17:12:37', '2018-11-16 12:12:37', 'ABIERTO'),
(49, 555, 'SABADO', '08:00|20:00', '2018-11-16 17:12:37', '2018-11-16 12:12:37', 'ABIERTO'),
(50, 555, 'DOMINGO', '08:00|20:00', '2018-11-16 17:12:37', '2018-11-16 12:12:37', 'ABIERTO'),
(51, 556, 'LUNES', '08:00|20:00', '2018-11-21 20:56:00', '2018-11-21 15:56:00', 'ABIERTO'),
(52, 556, 'MARTES', '08:00|20:00', '2018-11-21 20:56:00', '2018-11-21 15:56:00', 'ABIERTO'),
(53, 556, 'MIERCOLES', '08:00|20:00', '2018-11-21 20:56:00', '2018-11-21 15:56:00', 'ABIERTO'),
(54, 556, 'JUEVES', '08:00|20:00', '2018-11-21 20:56:00', '2018-11-21 15:56:00', 'ABIERTO'),
(55, 556, 'VIERNES', '08:00|20:00', '2018-11-21 20:56:00', '2018-11-21 15:56:00', 'ABIERTO'),
(56, 556, 'SABADO', '08:00|20:00', '2018-11-21 20:56:00', '2018-11-21 15:56:00', 'ABIERTO'),
(57, 556, 'DOMINGO', '08:00|20:00', '2018-11-21 20:56:00', '2018-11-21 15:56:00', 'ABIERTO'),
(65, 558, 'LUNES', '08:00|20:00', '2018-11-21 21:20:38', '2018-11-21 16:20:38', 'ABIERTO'),
(66, 558, 'MARTES', '08:00|20:00', '2018-11-21 21:20:38', '2018-11-21 16:20:38', 'ABIERTO'),
(67, 558, 'MIERCOLES', '08:00|20:00', '2018-11-21 21:20:38', '2018-11-21 16:20:38', 'ABIERTO'),
(68, 558, 'JUEVES', '08:00|20:00', '2018-11-21 21:20:38', '2018-11-21 16:20:38', 'ABIERTO'),
(69, 558, 'VIERNES', '08:00|20:00', '2018-11-21 21:20:38', '2018-11-21 16:20:38', 'ABIERTO'),
(70, 558, 'SABADO', '08:00|20:00', '2018-11-21 21:20:38', '2018-11-21 16:20:38', 'ABIERTO'),
(71, 558, 'DOMINGO', '08:00|20:00', '2018-11-21 21:20:38', '2018-11-21 16:20:38', 'ABIERTO'),
(79, 560, 'LUNES', '08:00|20:00', '2018-11-30 16:39:58', '2018-11-30 11:39:58', 'ABIERTO'),
(80, 560, 'MARTES', '08:00|20:00', '2018-11-30 16:39:58', '2018-11-30 11:39:58', 'ABIERTO'),
(81, 560, 'MIERCOLES', '08:00|20:00', '2018-11-30 16:39:58', '2018-11-30 11:39:58', 'ABIERTO'),
(82, 560, 'JUEVES', '08:00|20:00', '2018-11-30 16:39:58', '2018-11-30 11:39:58', 'ABIERTO'),
(83, 560, 'VIERNES', '08:00|20:00', '2018-11-30 16:39:58', '2018-11-30 11:39:58', 'ABIERTO'),
(84, 560, 'SABADO', '08:00|20:00', '2018-11-30 16:39:58', '2018-11-30 11:39:58', 'ABIERTO'),
(85, 560, 'DOMINGO', '08:00|20:00', '2018-11-30 16:39:58', '2018-11-30 11:39:58', 'ABIERTO'),
(86, 561, 'LUNES', '08:00|20:00', '2018-11-30 16:46:07', '2018-11-30 11:46:07', 'ABIERTO'),
(87, 561, 'MARTES', '08:00|20:00', '2018-11-30 16:46:07', '2018-11-30 11:46:07', 'ABIERTO'),
(88, 561, 'MIERCOLES', '08:00|20:00', '2018-12-11 14:49:46', '2018-11-30 11:46:07', 'CERRADO'),
(89, 561, 'JUEVES', '08:00|20:00', '2018-12-11 14:51:48', '2018-11-30 11:46:07', 'CERRADO'),
(90, 561, 'VIERNES', '08:00|20:00', '2018-11-30 16:46:07', '2018-11-30 11:46:07', 'ABIERTO'),
(91, 561, 'SABADO', '08:00|20:00', '2018-11-30 16:46:07', '2018-11-30 11:46:07', 'ABIERTO'),
(92, 561, 'DOMINGO', '08:00|20:00', '2018-12-11 14:49:53', '2018-11-30 11:46:07', 'CERRADO'),
(93, 562, 'LUNES', '08:00|20:00', '2018-11-30 16:51:32', '2018-11-30 11:51:32', 'ABIERTO'),
(94, 562, 'MARTES', '08:00|20:00', '2018-11-30 16:51:32', '2018-11-30 11:51:32', 'ABIERTO'),
(95, 562, 'MIERCOLES', '08:00|20:00', '2018-11-30 16:51:32', '2018-11-30 11:51:32', 'ABIERTO'),
(96, 562, 'JUEVES', '08:00|20:00', '2018-11-30 16:51:32', '2018-11-30 11:51:32', 'ABIERTO'),
(97, 562, 'VIERNES', '08:00|20:00', '2018-11-30 16:51:32', '2018-11-30 11:51:32', 'ABIERTO'),
(98, 562, 'SABADO', '08:00|20:00', '2018-11-30 16:51:32', '2018-11-30 11:51:32', 'ABIERTO'),
(99, 562, 'DOMINGO', '08:00|20:00', '2018-11-30 16:51:32', '2018-11-30 11:51:32', 'ABIERTO'),
(100, 563, 'LUNES', '08:00|20:00', '2018-11-30 19:40:50', '2018-11-30 14:40:50', 'ABIERTO'),
(101, 563, 'MARTES', '08:00|20:00', '2018-11-30 19:40:50', '2018-11-30 14:40:50', 'ABIERTO'),
(102, 563, 'MIERCOLES', '08:00|20:00', '2018-11-30 19:40:50', '2018-11-30 14:40:50', 'ABIERTO'),
(103, 563, 'JUEVES', '08:00|20:00', '2018-11-30 19:40:50', '2018-11-30 14:40:50', 'ABIERTO'),
(104, 563, 'VIERNES', '08:00|20:00', '2018-11-30 19:40:50', '2018-11-30 14:40:50', 'ABIERTO'),
(105, 563, 'SABADO', '08:00|20:00', '2018-11-30 19:40:50', '2018-11-30 14:40:50', 'ABIERTO'),
(106, 563, 'DOMINGO', '08:00|20:00', '2018-11-30 19:40:50', '2018-11-30 14:40:50', 'ABIERTO'),
(107, 564, 'LUNES', '08:00|20:00', '2018-11-30 20:05:25', '2018-11-30 15:05:25', 'ABIERTO'),
(108, 564, 'MARTES', '08:00|20:00', '2018-11-30 20:05:25', '2018-11-30 15:05:25', 'ABIERTO'),
(109, 564, 'MIERCOLES', '08:00|20:00', '2018-11-30 20:05:25', '2018-11-30 15:05:25', 'ABIERTO'),
(110, 564, 'JUEVES', '08:00|20:00', '2018-11-30 20:05:25', '2018-11-30 15:05:25', 'ABIERTO'),
(111, 564, 'VIERNES', '08:00|20:00', '2018-11-30 20:05:25', '2018-11-30 15:05:25', 'ABIERTO'),
(112, 564, 'SABADO', '08:00|20:00', '2018-11-30 20:05:25', '2018-11-30 15:05:25', 'ABIERTO'),
(113, 564, 'DOMINGO', '08:00|20:00', '2018-11-30 20:05:25', '2018-11-30 15:05:25', 'ABIERTO'),
(114, 565, 'LUNES', '08:00|20:00', '2018-11-30 20:22:17', '2018-11-30 15:22:17', 'ABIERTO'),
(115, 565, 'MARTES', '08:00|20:00', '2018-11-30 20:22:17', '2018-11-30 15:22:17', 'ABIERTO'),
(116, 565, 'MIERCOLES', '08:00|20:00', '2018-11-30 20:22:17', '2018-11-30 15:22:17', 'ABIERTO'),
(117, 565, 'JUEVES', '08:00|20:00', '2018-11-30 20:22:17', '2018-11-30 15:22:17', 'ABIERTO'),
(118, 565, 'VIERNES', '08:00|20:00', '2018-11-30 20:22:17', '2018-11-30 15:22:17', 'ABIERTO'),
(119, 565, 'SABADO', '08:00|20:00', '2018-11-30 20:22:17', '2018-11-30 15:22:17', 'ABIERTO'),
(120, 565, 'DOMINGO', '08:00|20:00', '2018-11-30 20:22:17', '2018-11-30 15:22:17', 'ABIERTO'),
(135, 568, 'LUNES', '00:00|20:00', '2018-12-03 05:01:34', '2018-12-02 23:48:51', 'ABIERTO'),
(136, 568, 'MARTES', '08:00|20:00', '2018-12-03 04:48:51', '2018-12-02 23:48:51', 'ABIERTO'),
(137, 568, 'MIERCOLES', '08:00|20:00', '2018-12-03 04:48:51', '2018-12-02 23:48:51', 'ABIERTO'),
(138, 568, 'JUEVES', '08:00|20:00', '2018-12-03 04:48:51', '2018-12-02 23:48:51', 'ABIERTO'),
(139, 568, 'VIERNES', '08:00|20:00', '2018-12-03 04:48:51', '2018-12-02 23:48:51', 'ABIERTO'),
(140, 568, 'SABADO', '08:00|20:00', '2018-12-03 04:48:51', '2018-12-02 23:48:51', 'ABIERTO'),
(141, 568, 'DOMINGO', '08:00|20:00', '2018-12-03 04:48:51', '2018-12-02 23:48:51', 'ABIERTO'),
(142, 569, 'LUNES', '08:00|20:00', '2018-12-03 04:57:55', '2018-12-02 23:57:55', 'ABIERTO'),
(143, 569, 'MARTES', '08:00|20:00', '2018-12-03 04:57:55', '2018-12-02 23:57:55', 'ABIERTO'),
(144, 569, 'MIERCOLES', '08:00|20:00', '2018-12-03 04:57:55', '2018-12-02 23:57:55', 'ABIERTO'),
(145, 569, 'JUEVES', '08:00|20:00', '2018-12-03 04:57:55', '2018-12-02 23:57:55', 'ABIERTO'),
(146, 569, 'VIERNES', '08:00|20:00', '2018-12-03 04:57:55', '2018-12-02 23:57:55', 'ABIERTO'),
(147, 569, 'SABADO', '08:00|20:00', '2018-12-03 04:57:55', '2018-12-02 23:57:55', 'ABIERTO'),
(148, 569, 'DOMINGO', '08:00|20:00', '2018-12-03 04:57:55', '2018-12-02 23:57:55', 'ABIERTO'),
(156, 571, 'LUNES', '08:00|20:00', '2018-12-10 23:23:26', '2018-12-10 18:21:48', 'CERRADO'),
(157, 571, 'MARTES', '08:00|20:00', '2018-12-10 23:21:48', '2018-12-10 18:21:48', 'ABIERTO'),
(158, 571, 'MIERCOLES', '08:00|20:00', '2018-12-10 23:21:48', '2018-12-10 18:21:48', 'ABIERTO'),
(159, 571, 'JUEVES', '08:00|20:00', '2018-12-10 23:21:48', '2018-12-10 18:21:48', 'ABIERTO'),
(160, 571, 'VIERNES', '08:00|20:00', '2018-12-10 23:21:48', '2018-12-10 18:21:48', 'ABIERTO'),
(161, 571, 'SABADO', '08:00|20:00', '2018-12-10 23:21:48', '2018-12-10 18:21:48', 'ABIERTO'),
(162, 571, 'DOMINGO', '08:00|20:00', '2018-12-10 23:21:48', '2018-12-10 18:21:48', 'ABIERTO');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_recargas`
--

CREATE TABLE `detalle_recargas` (
  `id` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `tipo_recarga` enum('PAGO','BONIFICACION') NOT NULL,
  `valor_recarga` decimal(10,0) NOT NULL,
  `referencia_pago` varchar(50) NOT NULL,
  `referencia_pago_pay_u` varchar(50) NOT NULL,
  `metodo_pago` varchar(256) NOT NULL,
  `estado_detalle_recarga` enum('APROVADA','PENDIENTE','RECHAZADA','REGISTRADA') NOT NULL DEFAULT 'REGISTRADA',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla para registrar las recargas';

--
-- Dumping data for table `detalle_recargas`
--

INSERT INTO `detalle_recargas` (`id`, `id_user`, `tipo_recarga`, `valor_recarga`, `referencia_pago`, `referencia_pago_pay_u`, `metodo_pago`, `estado_detalle_recarga`, `created_at`, `updated_at`) VALUES
(3, 5, 'PAGO', '20000', '1', '1', '', 'APROVADA', '2018-11-04 23:30:00', '2018-11-04 23:30:00'),
(6, 3, 'BONIFICACION', '100', '', '', 'pagp por registro', 'APROVADA', '2018-11-05 00:21:20', '2018-11-05 00:21:20'),
(9, 3, 'BONIFICACION', '10000', '444', '4444', 'pagp por recarga 10%', 'APROVADA', '2018-11-05 00:21:20', '2018-11-05 00:21:20'),
(10, 3, 'PAGO', '20000', 'rec_1541459912-32', '844913760', 'BALOTO', 'PENDIENTE', '2018-11-05 23:19:44', '2018-11-05 23:19:44'),
(11, 3, 'BONIFICACION', '100', '154146052095', '154146052095', 'BONIFICACION REGISTRO REFERIDO  edgar', 'APROVADA', '2018-11-05 23:28:40', '2018-11-05 23:28:40'),
(12, 3, 'BONIFICACION', '100', '154146069496', '154146069496', 'BONIFICACION REGISTRO REFERIDO  edgar', 'APROVADA', '2018-11-05 23:31:34', '2018-11-05 23:31:34'),
(13, 2, 'BONIFICACION', '100', '154146080597', '154146080697', 'BONIFICACION REGISTRO REFERIDO  edgar1', 'APROVADA', '2018-11-05 23:33:26', '2018-11-05 23:33:26'),
(14, 3, 'PAGO', '20000', 'rec_1541535920-20', '844917729', 'EFECTY', 'PENDIENTE', '2018-11-06 20:27:33', '2018-11-06 20:27:33'),
(15, 3, 'BONIFICACION', '100', '1541537935525', '1541537935525', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 20:58:55', '2018-11-06 20:58:55'),
(16, 3, 'BONIFICACION', '100', '1541538012526', '1541538012526', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 21:00:12', '2018-11-06 21:00:12'),
(17, 3, 'BONIFICACION', '100', '1541538371527', '1541538371527', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 21:06:11', '2018-11-06 21:06:11'),
(18, 3, 'BONIFICACION', '100', '1541538426528', '1541538426528', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 21:07:06', '2018-11-06 21:07:06'),
(21, 3, 'BONIFICACION', '100', '1541544769530', '1541544769530', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 22:52:49', '2018-11-06 22:52:49'),
(22, 3, 'BONIFICACION', '100', '1541545277531', '1541545277531', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 23:01:17', '2018-11-06 23:01:17'),
(23, 3, 'BONIFICACION', '100', '1541545363532', '1541545363532', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 23:02:43', '2018-11-06 23:02:43'),
(24, 3, 'BONIFICACION', '100', '1541545400533', '1541545400533', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 23:03:20', '2018-11-06 23:03:20'),
(25, 3, 'BONIFICACION', '100', '1541545915534', '1541545915534', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-06 23:11:55', '2018-11-06 23:11:55'),
(28, 3, 'BONIFICACION', '200', '1541547297534', '1541547297534', 'BONIFICACION RECARGA 1%  eeee', 'APROVADA', '2018-11-06 23:34:57', '2018-11-06 23:34:57'),
(30, 3, 'BONIFICACION', '200', '1541547388534', '1541547388534', 'BONIFICACION RECARGA 1%  eeee', 'APROVADA', '2018-11-06 23:36:28', '2018-11-06 23:36:28'),
(31, 3, 'PAGO', '20000', 'rec_1541549068-28', '1079860680', 'BALOTO', 'APROVADA', '2018-11-07 00:05:12', '2018-11-07 00:05:12'),
(32, 3, 'BONIFICACION', '100', '1541611541536', '1541611541536', 'BONIFICACION REGISTRO REFERIDO ', 'APROVADA', '2018-11-07 17:25:41', '2018-11-07 17:25:41'),
(51, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-08 22:06:55', '2018-12-11 16:18:07'),
(52, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-13 21:50:43', '2018-12-11 16:18:07'),
(53, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-13 22:25:32', '2018-12-11 16:18:07'),
(54, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-13 22:36:01', '2018-12-11 16:18:07'),
(55, 5, 'PAGO', '200000', 'rec_1542397323-34', '844992355', 'EFECTY', 'APROVADA', '2018-11-16 19:42:18', '2018-11-16 19:42:18'),
(56, 1, 'BONIFICACION', '2000', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-16 19:44:37', '2018-12-11 16:18:07'),
(57, 555, 'PAGO', '20000', 'rec_1542638694-54', '845002731', 'BALOTO', 'APROVADA', '2018-11-19 14:45:06', '2018-11-19 14:45:06'),
(58, 5, 'BONIFICACION', '100', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROVADA', '2018-11-21 21:18:49', '2018-12-11 03:43:05'),
(59, 5, 'BONIFICACION', '100', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROVADA', '2018-11-21 21:20:38', '2018-12-11 03:43:05'),
(60, 2, 'BONIFICACION', '100', '1543595998560', '1543595998560', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-11-30 16:39:58', '2018-11-30 16:39:58'),
(61, 2, 'BONIFICACION', '100', '1543596367561', '1543596367561', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-11-30 16:46:07', '2018-11-30 16:46:07'),
(62, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-30 16:51:32', '2018-12-11 16:18:07'),
(63, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-30 20:43:19', '2018-12-11 16:18:07'),
(64, 568, 'PAGO', '20000', 'rec_1543812575-35', '', '', 'REGISTRADA', '2018-12-03 04:49:53', '2018-12-03 04:49:53'),
(65, 568, 'BONIFICACION', '100', '1543813075569', '1543813075569', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-12-03 04:57:55', '2018-12-03 04:57:55'),
(66, 558, 'PAGO', '20000', 'rec_1543959035-35', '845060491', 'BALOTO', 'APROVADA', '2018-12-04 21:30:40', '2018-12-04 21:30:40'),
(67, 5, 'BONIFICACION', '200', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROVADA', '2018-12-04 21:37:13', '2018-12-11 03:43:05'),
(68, 5, 'BONIFICACION', '200', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROVADA', '2018-12-04 21:37:48', '2018-12-11 03:43:05'),
(69, 5, 'BONIFICACION', '200', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROVADA', '2018-12-04 21:37:53', '2018-12-11 03:43:05'),
(70, 558, 'PAGO', '20000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 21:44:08', '2018-12-05 03:39:27'),
(71, 558, 'PAGO', '20000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 21:46:29', '2018-12-05 03:39:27'),
(72, 558, 'PAGO', '20000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 21:58:16', '2018-12-05 03:39:27'),
(73, 558, 'PAGO', '20001', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:00:13', '2018-12-05 03:39:27'),
(74, 558, 'PAGO', '20000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:10:48', '2018-12-05 03:39:27'),
(75, 558, 'PAGO', '25000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:11:29', '2018-12-05 03:39:27'),
(76, 558, 'PAGO', '25000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:12:00', '2018-12-05 03:39:27'),
(77, 558, 'PAGO', '25000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:12:01', '2018-12-05 03:39:27'),
(78, 558, 'PAGO', '25000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:14:17', '2018-12-05 03:39:27'),
(79, 558, 'PAGO', '25000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:14:18', '2018-12-05 03:39:27'),
(80, 558, 'PAGO', '25000', 'rec_1543963033-92', '845060529', 'BALOTO', 'PENDIENTE', '2018-12-04 22:14:18', '2018-12-05 03:39:27'),
(81, 558, 'PAGO', '25000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:14:21', '2018-12-05 03:39:27'),
(82, 558, 'PAGO', '20000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:37:16', '2018-12-05 03:39:27'),
(83, 558, 'PAGO', '21000', 'rec_1543963033-92', '845060529', 'BALOTO', 'RECHAZADA', '2018-12-04 22:37:26', '2018-12-05 03:39:27'),
(84, 558, 'PAGO', '20000', 'rec_1543963418-66', '845060532', 'EFECTY', 'APROVADA', '2018-12-04 22:43:46', '2018-12-05 03:43:55'),
(85, 5, 'PAGO', '250', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROVADA', '2018-12-04 22:46:19', '2018-12-11 03:43:05'),
(86, 1, 'BONIFICACION', '200', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-12-10 22:58:58', '2018-12-11 16:18:07'),
(87, 5, 'PAGO', '20000', 'rec_1544483073-33', '845079024', 'EFECTY', 'APROVADA', '2018-12-10 23:00:39', '2018-12-11 04:04:47'),
(88, 1, 'BONIFICACION', '200', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-12-10 23:06:29', '2018-12-11 16:18:07'),
(89, 5, 'PAGO', '20000', 'rec_1544483204-46', '845079025', 'EFECTY', 'PENDIENTE', '2018-12-10 23:06:54', '2018-12-11 04:07:05'),
(90, 565, 'BONIFICACION', '100', '1544483746570', '1544483746570', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-12-10 23:15:46', '2018-12-10 23:15:46'),
(91, 2, 'BONIFICACION', '100', '1544484108571', '1544484108571', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-12-10 23:21:48', '2018-12-10 23:21:48'),
(92, 5, 'PAGO', '21000', 'rec_1544545427-56', '845080656', 'BALOTO', 'APROVADA', '2018-12-11 16:24:00', '2018-12-11 16:26:40'),
(93, 1, 'BONIFICACION', '210', '15445456005', '15445456005', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-11 16:26:40', '2018-12-11 16:26:40'),
(94, 5, 'PAGO', '20000', 'rec_1545232466-26', '', '', 'REGISTRADA', '2018-12-19 15:05:25', '2018-12-19 15:14:28'),
(95, 571, 'PAGO', '20000', 'rec_1545325394-14', '845106103', 'BALOTO', '', '2018-12-20 17:03:16', '2018-12-20 17:04:20'),
(96, 2, 'BONIFICACION', '200', '1545325460571', '1545325460571', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas', 'REGISTRADA', '2018-12-20 17:04:20', '2018-12-20 17:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_referidos`
--

CREATE TABLE `detalle_referidos` (
  `id` int(11) NOT NULL,
  `id_referido` int(11) UNSIGNED NOT NULL,
  `id_quien_refiere` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_referidos`
--

INSERT INTO `detalle_referidos` (`id`, `id_referido`, `id_quien_refiere`, `created_at`, `updated_at`) VALUES
(20, 1, 5, '2018-11-13 22:36:01', '0000-00-00 00:00:00'),
(22, 5, 558, '2018-11-21 21:20:38', '0000-00-00 00:00:00'),
(23, 2, 560, '2018-11-30 16:39:58', '0000-00-00 00:00:00'),
(24, 2, 561, '2018-11-30 16:46:07', '0000-00-00 00:00:00'),
(25, 1, 562, '2018-11-30 16:51:32', '0000-00-00 00:00:00'),
(27, 568, 569, '2018-12-03 04:57:55', '0000-00-00 00:00:00'),
(29, 2, 571, '2018-12-10 23:21:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_09_124447_user_total_balance', 1),
(4, '2018_05_15_201559_create_permission_tables', 1),
(5, '2018_07_30_210651_create_anuncios_table', 1),
(6, '2018_08_07_230602_create_recargas_table', 1),
(7, '2018_10_16_133542_create_pagos_table', 1),
(8, '2018_10_17_162604_create_payus_table', 1),
(9, '2018_10_19_040142_create_detalle_clic_anuncios_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(3, 2, 'App\\User'),
(3, 3, 'App\\User'),
(3, 5, 'App\\User'),
(2, 553, 'App\\User'),
(3, 554, 'App\\User'),
(3, 555, 'App\\User'),
(3, 556, 'App\\User'),
(3, 558, 'App\\User'),
(3, 560, 'App\\User'),
(3, 561, 'App\\User'),
(3, 562, 'App\\User'),
(3, 563, 'App\\User'),
(3, 564, 'App\\User'),
(3, 565, 'App\\User'),
(3, 568, 'App\\User'),
(3, 569, 'App\\User'),
(3, 571, 'App\\User'),
(1, 572, 'App\\User'),
(1, 573, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `transactionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionState` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionQuantity` decimal(10,2) NOT NULL,
  `transation_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anuncio` int(11) UNSIGNED NOT NULL,
  `id_user_compra` int(11) UNSIGNED NOT NULL,
  `metodo_pago` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_pago` enum('APROBADA','PENDIENTE','RECHAZADA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'APROBADA',
  `calificacion` int(10) DEFAULT NULL,
  `opinion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`id`, `transactionId`, `transactionState`, `transactionQuantity`, `transation_value`, `id_anuncio`, `id_user_compra`, `metodo_pago`, `estado_pago`, `calificacion`, `opinion`, `created_at`, `updated_at`) VALUES
(1, '1111', '4', '1.00', '111111', 1, 3, 'payu', 'PENDIENTE', 5, NULL, NULL, '2018-11-07 01:51:23'),
(2, '844917773', '7', '4.00', '1000000.00', 65, 528, 'EFECTY', 'PENDIENTE', 4, 'excelnet vendedor', NULL, '2018-11-07 03:43:06'),
(3, '844917775', '7', '0.00', '3.00', 64, 529, 'BALOTO', 'PENDIENTE', NULL, NULL, NULL, NULL),
(4, '844919610', '7', '4.00', '1000000.00', 65, 528, 'BALOTO', 'PENDIENTE', 5, 'excelnte vendedor', NULL, '2018-11-07 03:38:06'),
(5, '844919664', '4', '0.00', '2707.24', 5, 534, 'VISA', 'PENDIENTE', NULL, NULL, NULL, NULL),
(6, '844919670', '4', '19.00', '23000.00', 73, 534, 'VISA', 'PENDIENTE', NULL, NULL, NULL, NULL),
(7, '844919672', '4', '164.00', '10000.00', 67, 3, 'VISA', 'PENDIENTE', NULL, NULL, NULL, NULL),
(8, '844919680', '7', '0.00', '2.00', 64, 534, 'BALOTO', 'PENDIENTE', NULL, NULL, NULL, NULL),
(9, '1080034354', '7', '1.00', '32000.00', 69, 535, 'OTHERS_CASH', 'PENDIENTE', 4, 'BIEN', NULL, '2018-11-07 21:17:18'),
(10, '1080037361', '7', '42.00', '45663.00', 73, 535, 'OTHERS_CASH', 'PENDIENTE', 2, 'FFFF', NULL, '2018-11-07 21:22:11'),
(11, '1080039444', '7', '25.00', '27000.00', 73, 535, 'EFECTY', 'PENDIENTE', 5, NULL, NULL, '2018-11-07 21:24:56'),
(12, '844921889', '7', '21.00', '23000.00', 73, 547, 'BALOTO', 'PENDIENTE', 4, 'Un poco demorado pero serio', NULL, '2018-11-08 00:57:38'),
(13, '-', '0', '0.05', '4.62', 0, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-04 14:03:42', NULL),
(14, '-', '0', '1.17', '6002', 0, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-04 14:13:00', NULL),
(15, '845058796', '7', '1.97', '200001.00', 83, 5, 'OTHERS_CASH', 'PENDIENTE', 2, NULL, '2018-12-04 14:18:57', '2018-12-04 19:57:26'),
(17, '845058721', '4', '0.05', '4.62', 92, 5, 'BALOTO', 'PENDIENTE', 3, NULL, '2018-12-04 16:23:30', '2018-12-04 16:49:54'),
(18, '-', '0', '0.04', '3.620', 92, 5, 'PENDIENTE', 'PENDIENTE', 3, NULL, '2018-12-04 16:58:17', NULL),
(19, '845058783', '4', '0.09', '1000000.00', 95, 5, 'EFECTY', 'PENDIENTE', 3, NULL, '2018-12-04 19:19:44', '2018-12-04 19:33:30'),
(20, '-', '0', '0.09', '1000000.00', 95, 5, 'PENDIENTE', 'PENDIENTE', 3, NULL, '2018-12-04 19:47:46', NULL),
(21, '845060433', '6', '1.37', '7000.00', 84, 5, 'VISA', 'PENDIENTE', 3, NULL, '2018-12-04 20:28:12', NULL),
(22, '-', '0', '0.08', '1000000.00', 94, 558, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-04 21:01:19', NULL),
(23, '-', '0', '0.51', '52.60', 92, 558, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-04 21:01:38', NULL),
(24, '845060464', '7', '2.49', '250000.00', 83, 558, 'BALOTO', 'PENDIENTE', NULL, NULL, '2018-12-04 21:02:04', '2018-12-04 21:03:48'),
(25, '845060468', '6', '2.04', '10000.00', 85, 558, 'VISA', 'PENDIENTE', NULL, NULL, '2018-12-04 21:08:22', NULL),
(26, '845060478', '4', '2.50', '250000.00', 83, 5, 'VISA', 'PENDIENTE', 2, NULL, '2018-12-04 21:19:43', '2018-12-04 21:21:33'),
(27, '-', '0', '1.28', '5000', 89, 558, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-04 23:01:36', NULL),
(28, '-', '0', '0.00', '2500', 91, 558, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-04 23:01:44', NULL),
(29, '845080676', '7', '142.86', '10000.00', 106, 1, 'BALOTO', 'PENDIENTE', 2, NULL, '2018-12-11 16:46:05', '2018-12-11 16:46:57'),
(30, '845082004', '7', '2.59', '200013.00', 83, 5, 'BALOTO', 'PENDIENTE', NULL, NULL, '2018-12-11 19:48:36', '2018-12-11 19:49:20'),
(31, '-', '0', '0.70', '76000.00', 117, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 16:55:49', NULL),
(32, '-', '0', '24.10', '30000.00', 123, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 17:12:18', NULL),
(33, '-', '0', '1000.00', '10000.00', 119, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 17:21:56', NULL),
(34, '-', '0', '34843.21', '100000.00', 120, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 17:26:30', NULL),
(35, '-', '0', '384.21', '36500.00', 118, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 17:35:01', NULL),
(36, '-', '0', '1.11', '90000000.00', 122, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 17:53:51', NULL),
(37, '-', '0', '1428.57', '100000.00', 121, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 18:00:58', NULL),
(38, '-', '0', '0.11', '1500000', 90, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 18:01:03', NULL),
(39, '-', '0', '0.00', '2500', 91, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 18:02:22', NULL),
(40, '-', '0', '1.17', '6000', 84, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 20:30:36', NULL),
(41, '-', '0', '1.92', '200000', 83, 5, 'PENDIENTE', 'PENDIENTE', NULL, NULL, '2018-12-20 21:01:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('miguelrios1@hotmail.com', '$2y$10$v4a2u4YXZQNAhKlF51aZC.BeLGHYdlx1Idht1rykKolMhWaO./HGy', '2018-10-31 01:18:42'),
('stalinchacu@outlook.com', '$2y$10$DGySrvZcgC3uuAK6aMswbOWd4im1y60QfG6WPXtcQ6kfTw7Wb.vXy', '2018-11-08 04:31:14'),
('hvhvalencia3@gmail.com', '$2y$10$Jr7tF.3UCkIiSY1oVuzPCePBe5NTicSFF3QRkIDFZwQkR.ngGlP82', '2018-11-09 00:43:39'),
('miguelrios1@hotmail.com', '$2y$10$v4a2u4YXZQNAhKlF51aZC.BeLGHYdlx1Idht1rykKolMhWaO./HGy', '2018-10-31 01:18:42'),
('stalinchacu@outlook.com', '$2y$10$DGySrvZcgC3uuAK6aMswbOWd4im1y60QfG6WPXtcQ6kfTw7Wb.vXy', '2018-11-08 04:31:14'),
('hvhvalencia3@gmail.com', '$2y$10$Jr7tF.3UCkIiSY1oVuzPCePBe5NTicSFF3QRkIDFZwQkR.ngGlP82', '2018-11-09 00:43:39'),
('adrian.vargas.2018@outlook.com', '$2y$10$FsH9t.D7RoixAzfqNIHle.RSgclCbgajb6WaZTdg3RgiJZ0ViWShq', '2018-11-19 19:43:12'),
('edgar.guzman21@gmail.com', '$2y$10$oFgRoomQqCfpIe0WCRYVGODipCiJMPEpFgcqhmUfmbCpP3m0/vys2', '2018-12-11 19:43:19'),
('edgar.devmohan@gmail.com', '$2y$10$qHKII3cGkPczy0TZ5LyDUuo3Axihq9j6Kyzwk/0b81WMtfZ5w3Bza', '2018-12-20 16:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `payus`
--

CREATE TABLE `payus` (
  `id` int(10) UNSIGNED NOT NULL,
  `API_KEY` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchantId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlResponse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlConfirm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlError` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlApi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_encrypt` enum('MD5','SHA1','SHA256') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SHA256',
  `razon_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_contacto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('TEST','PRODUCTION') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payus`
--

INSERT INTO `payus` (`id`, `API_KEY`, `merchantId`, `accountId`, `urlResponse`, `urlConfirm`, `urlError`, `urlApi`, `type_encrypt`, `razon_social`, `nit`, `tel_contacto`, `type`, `created_at`, `updated_at`) VALUES
(1, 'u7oLd8dy0P6hVT07i3HvcYBsgU', '764105', '770697', '/response', '/confirm', '/error', 'https://checkout.payulatam.com/ppp-web-gateway-payu/', 'MD5', 'MetalAppbio', '12345678900', '315 820 25 62', 'PRODUCTION', NULL, NULL),
(2, '4Vj8eK4rloUd272L48hsrarnUA', '508029', '512321', '/response', '/confirm', '/error', 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu', 'MD5', 'MetalApp', '12345678900', '315 820 25 62', 'TEST', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Ver Usuarios', 'Ver Usuarios', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(2, 'Crear Usuarios', 'Crear Usuarios', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(3, 'Editar Usuarios', 'Editar Usuarios', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(4, 'Eliminar Usuarios', 'Eliminar Usuarios', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(5, 'Ver Roles', 'Ver Roles', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(6, 'Crear Roles', 'Crear Roles', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(7, 'Editar Roles', 'Editar Roles', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(8, 'Eliminar Roles', 'Eliminar Roles', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(9, 'Ver Permisos', 'Ver permisos', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(10, 'Crear Permisos', 'Crear Permisos', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(11, 'Editar Permisos', 'Editar Permisos', 'web', '2018-12-11 15:17:06', '2018-12-11 15:17:06'),
(12, 'Eliminar Permisos', 'Eliminar Permisos', 'web', '2018-12-11 15:17:26', '2018-12-11 15:17:26'),
(13, 'Ver Anuncios', 'Ver Anuncios', 'web', '2018-12-11 15:19:52', '2018-12-11 15:19:52'),
(14, 'Crear Anuncios', 'Crear Anuncios', 'web', '2018-12-11 15:19:52', '2018-12-11 15:19:52'),
(15, 'Editar Anuncios', 'Editar Anuncios', 'web', '2018-12-11 15:19:52', '2018-12-11 15:19:52'),
(16, 'Eliminar Anuncios', 'Eliminar Anuncios', 'web', '2018-12-11 15:19:52', '2018-12-11 15:19:52'),
(17, 'Ver Recargas', 'Ver Recargas', 'web', '2018-12-11 15:23:01', '2018-12-11 15:23:01'),
(18, 'Crear Recargas', 'Crear Recargas', 'web', '2018-12-11 15:23:01', '2018-12-11 15:23:01'),
(19, 'Editar Recargas', 'Editar Recargas', 'web', '2018-12-11 15:23:01', '2018-12-11 15:23:01'),
(20, 'Eliminar Recargas', 'Eliminar Recargas', 'web', '2018-12-11 15:23:01', '2018-12-11 15:23:01'),
(21, 'Ver Bonificaciones', 'Ver Bonificaciones', 'web', '2018-12-11 15:23:01', '2018-12-11 15:23:01'),
(22, 'Crear Bonificaciones', 'Crear Bonificaciones', 'web', '2018-12-11 15:23:01', '2018-12-11 15:23:01'),
(23, 'Editar Bonificaciones', 'Editar Bonificaciones', 'web', '2018-12-11 15:23:01', '2018-12-11 15:23:01'),
(24, 'Eliminar Bonificaciones', 'Eliminar Bonificaciones', 'web', '2018-12-11 15:23:01', '2018-12-11 15:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `recargas`
--

CREATE TABLE `recargas` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('ACTIVA','AGOTADA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVA',
  `valor` decimal(10,2) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recargas`
--

INSERT INTO `recargas` (`id`, `status`, `valor`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ACTIVA', '12809.00', 1, NULL, '2018-12-11 16:26:40'),
(2, 'ACTIVA', '19800.00', 2, NULL, '2018-12-20 17:04:20'),
(3, 'ACTIVA', '17899.00', 3, NULL, NULL),
(43, 'ACTIVA', '260800.00', 5, '2018-11-13 05:00:00', '2018-12-11 16:26:40'),
(44, 'ACTIVA', '38450.00', 555, '2018-11-16 22:12:45', '2018-11-19 23:12:35'),
(45, 'ACTIVA', '0.00', 556, '2018-11-22 01:56:00', '2018-11-22 01:56:00'),
(47, 'ACTIVA', '85000.00', 558, '2018-11-22 02:20:39', '2018-12-05 03:46:19'),
(49, 'ACTIVA', '0.00', 560, '2018-11-30 21:40:00', '2018-11-30 21:40:00'),
(50, 'ACTIVA', '0.00', 561, '2018-11-30 21:46:08', '2018-11-30 21:46:08'),
(51, 'ACTIVA', '0.00', 562, '2018-11-30 21:51:32', '2018-11-30 21:51:32'),
(52, 'ACTIVA', '0.00', 563, '2018-12-01 00:40:51', '2018-12-01 00:40:51'),
(53, 'ACTIVA', '0.00', 564, '2018-12-01 01:05:25', '2018-12-01 01:05:25'),
(54, 'ACTIVA', '100.00', 565, '2018-12-01 01:22:18', '2018-12-11 04:15:46'),
(57, 'AGOTADA', '0.00', 568, '2018-12-03 09:48:52', '2018-12-03 18:26:39'),
(58, 'ACTIVA', '0.00', 569, '2018-12-03 09:57:55', '2018-12-03 09:57:55'),
(60, 'ACTIVA', '19900.00', 571, '2018-12-11 04:21:49', '2018-12-20 17:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'web', '2018-08-09 04:02:48', '2018-12-11 20:00:09'),
(3, 'Comerciante', 'Comprador/Vendedor', 'web', '2018-10-18 13:24:00', '2018-10-18 13:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(13, 3),
(14, 3),
(17, 3),
(18, 3),
(21, 3),
(22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo_clic` decimal(8,2) NOT NULL DEFAULT '0.00',
  `confirmado` enum('SI','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SI',
  `codigo_referido` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `calificacion` int(11) NOT NULL DEFAULT '0',
  `num_calificaciones` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `costo_clic`, `confirmado`, `codigo_referido`, `remember_token`, `created_at`, `updated_at`, `calificacion`, `num_calificaciones`) VALUES
(1, 'Heriberto Valencia', '3014751', 'hvhvalencia3@gmail.com', '$2y$10$oX30Ts4767sRvW3PD/CRGe3YhYZ.XqTVDXIQJU4NkR4eRPOk5.OK6', '500.00', 'SI', 525, 'bniUSTQiKKTlygefEpGdAcndtr6oiOn6HYTZnUa1CORc8RU0wsKM38yfgukS', '2018-08-09 04:02:48', '2018-12-01 02:33:56', 36, 10),
(2, 'Bruno Valenica', '123456', 'bruno@gmail.com', '$2y$10$wDjYL1KFNql.03tvWn/Vce/dIqSfWmsJ5X4aJq42bHTynnZS/DTTG', '500.00', 'SI', 526, 'c8Oxuh8Q7BF0ATONGnlmOajDJzh9FXMjUwG3Yf8NIaIbS8bklSrncuPkKFST', '2018-08-09 04:02:48', '2018-11-14 03:07:49', 0, 0),
(3, 'David Cabrera', '3147684576', 'cabrera.davidf@gmail.com', '$2y$10$P72/hwGX/cscp.IyGsWWSun9i.RwMvre1XtxBfbLTEUqc3COAs4/i', '500.00', 'SI', 535, 'qnrczWP8IjEsgCyPbQriJRQMzjhQKxfzYi5G9LdcNC04IlRPUJ65TBgjRcfP', '2018-10-27 01:27:14', '2018-11-14 03:07:49', 0, 0),
(5, 'edgar.guzman.vargas.adrian', '73232504', 'edgar.guzman21@gmail.com', '$2y$10$IHFFzWFsCE5vD./UI6pyQOyuEgxDfhaUpxyLmik75qxTEX7IlB8c6', '50.00', 'SI', 539, '5o7BaqTnELDkOlZkiOG5vEwQUtn6OODl3FjTE9USqDg55b4yK8eFBgihYrfM', '2018-11-14 03:36:01', '2018-12-11 19:45:39', 28, 9),
(554, 'miguelrios', '3165287824', 'miguel.rios@prismaweb.ne\r\n', '$2y$10$1BdagLqcENUvaqroFCINXOs.6h8B8Vf20f/Yuv5J8Jvch/RP4e/Je', '500.00', 'SI', 538, NULL, '2018-10-31 01:23:35', '2018-11-14 03:07:49', 0, 0),
(555, 'Edi samuel', '1234', 'adrian.vargas.2018@outlook.com', '$2y$10$rq9jFZCTqSX5bN4abX/XreYjEqfbfDPsCf6OuXPy2JpYl674KS2nq', '50.00', 'SI', 540, NULL, '2018-11-16 22:12:37', '2018-12-11 17:11:47', 66, 29),
(556, 'adrian', '1234567', 'EDGAR.GUZMAN21@GMAIL.COM.co', '$2y$10$91jp7sB4vNni.sdO3GPhIulRO.ua3j6et1FysNR7fB3hc0M4xhpa6', '50.00', 'SI', 541, 'HZGFdbWUtL4cSiEEykRnQ5fR01wPdFWuFugcGH0DOPT7P3daIJUiydAra3i9', '2018-11-22 01:56:00', '2018-11-22 01:56:00', 0, 0),
(558, 'Helbert', '7323251', 'EDGAR.GUZMAN21@GMAIL.CM.co', '$2y$10$91jp7sB4vNni.sdO3GPhIulRO.ua3j6et1FysNR7fB3hc0M4xhpa6', '50.00', 'SI', 543, 'sitD6D5O0iKHPa43Ge33ht9EtRrcAozKFlmRTs336h77ZvFGVKWre4q0CEj7', '2018-11-22 02:20:38', '2018-11-22 02:20:38', 0, 0),
(560, 'edgar', '123456789', 'edgar.guzman21@gmail.com.mx', '$2y$10$91jp7sB4vNni.sdO3GPhIulRO.ua3j6et1FysNR7fB3hc0M4xhpa6', '50.00', 'SI', 545, '2h9TO4A4FQ5DYOFzJ7xwu65QeM07X9OCei4i7wo4WyACEaW8SzykwKjdqY2G', '2018-11-30 21:39:58', '2018-11-30 21:39:58', 0, 0),
(561, 'javier', '12345689', 'sanin@gmail.co', '$2y$10$35g3bP9Vr4svcZXslDU2oOxFR6/VU7JDPb1TM/v.TRo7PH.pK5u9W', '50.00', 'SI', 546, 'ozknuzQ5prOAASPsWCRfIVfinvzonqJcaL1iMzUevUNEFV3UrEwwA92yPi3I', '2018-11-30 21:46:07', '2018-12-11 20:44:37', 0, 0),
(562, 'edgar guzman', '123456890', 'edgar.devmohan@gmail.co', '$2y$10$91jp7sB4vNni.sdO3GPhIulRO.ua3j6et1FysNR7fB3hc0M4xhpa6', '50.00', 'SI', 547, 'yVyLRI96eKs4xdyL7akDGSkMwu4Pp5jwFvgcfFOoTpQnvjidbJxzwSLW3gD5', '2018-11-30 21:51:32', '2018-12-11 17:11:15', 12, 5),
(563, 'Heriberot valencia', '12345644', 'hvhvalenci@gmail.com', '$2y$10$91jp7sB4vNni.sdO3GPhIulRO.ua3j6et1FysNR7fB3hc0M4xhpa6', '50.00', 'SI', 548, 'SimxFt1ab3XBSFjhNXEmhMWsJDUQjjznSpN3HgJUg8R0MEurYR9sBRLxMwmr', '2018-12-01 00:40:50', '2018-12-01 00:40:50', 0, 0),
(564, 'Heriberto Valencia munioz', '123456789', 'heriimperativo@hotmail.com', '$2y$10$5rPVtz9zdkNdtW90BAIVnugTfumvkRHKzU926WkLrG9CF51wL2NwK', '50.00', 'SI', 549, NULL, '2018-12-01 01:05:25', '2018-12-01 01:05:25', 0, 0),
(565, 'Miguel Rios', '123456789', 'miguelrios1@hotmail.com', '$2y$10$32U65NrIb8koTzRwMMh8RuLSaBCmV0ojoR5nZVtEPDh1CUE/memxm', '50.00', 'SI', 550, NULL, '2018-12-01 01:22:17', '2018-12-01 01:22:17', 0, 0),
(568, 'Luis Herrera', '3204296592', 'luisherresa13@gmail.com', '$2y$10$ccF8NKGMPoNv6u5ey8wm6.VZk2MLYCLHoj1jhOj1ReouzmAmJfwpm', '50.00', 'SI', 553, NULL, '2018-12-03 09:48:51', '2018-12-11 17:11:27', 9, 3),
(569, 'Luis Salazar', '1234567', 'luisherresa13@hotmail.com', '$2y$10$qBFHDtImJC/DuU94vsu9deKBWj1jv81a/QdGWlviJfGsBnwjeN4gO', '50.00', 'SI', 554, NULL, '2018-12-03 09:57:55', '2018-12-03 09:57:55', 0, 0),
(571, 'edgar.guzman.vargas', '3158790446', 'edgar.devmohan@gmail.com', '$2y$10$UnNjq7qKBYURgVlsWqM8l.x83TE5Bkpj8ei8hSYgJpsZVhH.oS7Sa', '50.00', 'SI', 556, 'z2Zgq3lHiF6lEwYzjvFNEiYSQKW7TZFFYwm2tL5VnV2FJTOkuUbrtFHHJOa3', '2018-12-11 04:21:48', '2018-12-20 16:59:43', 0, 0),
(572, 'prueba', '123456987', 'edgar.guzman21@gmail.com.ve', '$2y$10$156fwxnR2hG/4Psse2AOjO0kqA23hYOsHxWn0W1oenoHhvVWTkLCu', '0.00', 'SI', 557, NULL, '2018-12-13 15:30:35', '2018-12-13 15:30:35', 0, 0),
(573, 'edgar.guzman', '12345678', 'el@prueba.com', '$2y$10$UoYdEccx3PCvf8AaNzUHM.p30nWBhCNSBaGFwhQHoqz1bMV9Q.1Dy', '0.00', 'SI', 558, 'A9BJM6CG3Xl9OwFwnzORBfx5zDnZzYtuhRKBtEZaUwuVYOYJrBKBePZDriWW', '2018-12-13 15:31:55', '2018-12-13 15:32:40', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bonificaciones`
--
ALTER TABLE `bonificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_detalle_referido` (`fk_id_detalle_referido`);

--
-- Indexes for table `detalle_clic_anuncios`
--
ALTER TABLE `detalle_clic_anuncios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_usuario`),
  ADD KEY `fk_id_ad` (`id_anuncio`);

--
-- Indexes for table `detalle_horario_usuario`
--
ALTER TABLE `detalle_horario_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detalle_recargas`
--
ALTER TABLE `detalle_recargas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detalle_referidos`
--
ALTER TABLE `detalle_referidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quien_refiere` (`id_quien_refiere`),
  ADD KEY `fk_id_referido` (`id_referido`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_anuncio` (`id_anuncio`),
  ADD KEY `fk_id_user_compra` (`id_user_compra`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payus`
--
ALTER TABLE `payus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recargas`
--
ALTER TABLE `recargas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user_rec` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `bonificaciones`
--
ALTER TABLE `bonificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `detalle_clic_anuncios`
--
ALTER TABLE `detalle_clic_anuncios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `detalle_horario_usuario`
--
ALTER TABLE `detalle_horario_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `detalle_recargas`
--
ALTER TABLE `detalle_recargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `detalle_referidos`
--
ALTER TABLE `detalle_referidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `payus`
--
ALTER TABLE `payus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `recargas`
--
ALTER TABLE `recargas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `fk_id_anuncio` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bonificaciones`
--
ALTER TABLE `bonificaciones`
  ADD CONSTRAINT `fk_id_detalle_referido` FOREIGN KEY (`fk_id_detalle_referido`) REFERENCES `detalle_referidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_clic_anuncios`
--
ALTER TABLE `detalle_clic_anuncios`
  ADD CONSTRAINT `fk_id_ad` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_horario_usuario`
--
ALTER TABLE `detalle_horario_usuario`
  ADD CONSTRAINT `fk_user_horario` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_recargas`
--
ALTER TABLE `detalle_recargas`
  ADD CONSTRAINT `fk_recarga_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_referidos`
--
ALTER TABLE `detalle_referidos`
  ADD CONSTRAINT `fk_id_quien_refiere` FOREIGN KEY (`id_quien_refiere`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_referente` FOREIGN KEY (`id_referido`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recargas`
--
ALTER TABLE `recargas`
  ADD CONSTRAINT `fk_recarga_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;