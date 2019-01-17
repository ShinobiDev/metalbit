-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2018 at 03:00 PM
-- Server version: 10.2.12-MariaDB-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(70, 'V1', 'venta', 'San Petersburgo, Rusia :)', NULL, 'San Petersburgo', NULL, 'Rusia', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'efecty', '0', '0.00', '10000', '1000', NULL, 'En un lugar de la mancha', 'activo', 1, '2018-11-07 02:34:28', '2018-11-07 02:34:28'),
(71, 'V25', 'venta', 'Gachetá, Cundinamarca, Colombia', '251230', 'Gachetá', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '25', 'GoldCoin', 'en la tienda', '0.3', '0.00', '100', '10', NULL, 'Roma', 'activo', 1, '2018-11-07 02:38:58', '2018-11-07 02:38:58'),
(81, 'V42', 'venta', 'Bosa, Bogotá, Colombia', NULL, 'Bogotá', 'Bogotá', 'Colombia', 'COP', 'Colombian Peso ($)', '42', 'Primecoin', 'bbva', '0.4', '0.00', '9000', '900000', NULL, 'llamamé', 'inactivo', 5, '2018-11-14 03:45:58', '2018-12-18 22:14:26'),
(82, 'V2', 'venta', 'Caracas, Distrito Capital, Venezuela', NULL, 'Caracas', 'Dto. Capital', 'Venezuela', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'petrobras', '-0.7', '0.00', '400000', '450000', NULL, 'llamamé', 'inactivo', 5, '2018-11-17 00:41:42', '2018-12-18 22:14:29'),
(83, 'V2', 'venta', 'Pretoria, South Africa', NULL, 'Pretoria', 'GP', 'South Africa', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'bbva', '0.6', '0.00', '200000', '250000', NULL, 'llamamé', 'activo', 555, '2018-11-19 19:44:43', '2018-11-19 19:44:43'),
(84, 'V1', 'venta', 'Bengaluru, Karnataka, India', NULL, 'Bengaluru', 'KA', 'India', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'odebrecht', '0.3', '5119.00', '6000', '8000', NULL, 'escribeme al correo', 'activo', 555, '2018-11-19 23:10:50', '2018-11-19 23:10:50'),
(85, 'V1', 'venta', 'Edinburgh, UK', NULL, 'Edinburgh', 'Scotland', 'United Kingdom', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'baloto', '0.1', '4890.00', '10000', '25000', NULL, 'Paris', 'inactivo', 5, '2018-11-20 06:41:29', '2018-12-18 22:14:31'),
(86, 'C1', 'compra', 'Estonia', NULL, NULL, NULL, 'Estonia', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'efecty', '0.6', '4917.00', '30000', '50000', NULL, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'activo', 5, '2018-11-20 06:54:53', '2018-11-20 06:54:53'),
(87, 'C1', 'compra', 'Telangana, India', NULL, NULL, 'Telangana', 'India', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'bbva', '0.6', '4539.00', '5000', '5000', NULL, 'xxxx', 'activo', 5, '2018-11-21 20:08:41', '2018-11-21 20:08:41'),
(88, 'C1', 'compra', 'Petaling Jaya, Selangor, Malaysia', NULL, 'Petaling Jaya', 'Selangor', 'Malaysia', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'bbva', '0.5', '4533.00', '5000', '5000', NULL, '555', 'activo', 555, '2018-11-21 20:11:17', '2018-11-21 20:11:17'),
(89, 'V1', 'venta', 'FF22, Vikas Marg, Vijay Block, Block E, Laxmi Nagar, Delhi, India', '110092', 'Delhi', 'DL', 'India', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'ddba', '-13', '3920.00', '5000', '6000', NULL, 'xxx', 'activo', 5, '2018-11-22 01:50:04', '2018-12-01 00:42:41'),
(90, 'V1', 'venta', 'Bogotá, Colombia', NULL, 'Bogotá', 'Bogotá', 'Colombia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'payu', '10', '10000000.00', '1500000', '2500000', 'no hay lugar de encuentro', 'ninguno termino de encuentro', 'activo', 1, '2018-11-27 21:04:47', '2018-11-27 21:04:47'),
(91, 'V1', 'venta', 'Sialkot, Pakistan', NULL, NULL, NULL, NULL, 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.5', '2500.00', '2500', '2500', 'caja', 'huella', 'activo', 1, '2018-11-28 03:05:11', '2018-11-28 03:05:11'),
(95, 'V1', 'venta', 'Cali, Valle del Cauca, Colombia', NULL, 'Cali', 'Valle del Cauca', 'Colombia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bancolombia', '-10', '11500000.00', '1000000.00', '1000000.00', 'Unicentro', 'Pago en efectivo', 'activo', 568, '2018-12-03 09:53:11', '2018-12-03 09:53:11'),
(96, 'C1', 'compra', 'Alaska, USA', NULL, NULL, 'AK', 'United States', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', '52000', '0.3', '0.00', '1500000.00', '2000000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, haga la transacción por payu', 'activo', 5, '2018-12-03 18:29:52', '2018-12-03 18:29:52'),
(97, 'C1', 'compra', 'Alaska, USA', NULL, NULL, 'AK', 'United States', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', '52000', '0.3', '0.00', '1500000.00', '2000000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, haga la transacción por payu', 'activo', 5, '2018-12-03 18:30:05', '2018-12-03 18:30:05'),
(98, 'C1', 'compra', 'Alaska, USA', NULL, NULL, 'AK', 'United States', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', '52000', '0.3', '0.00', '1500000.00', '2000000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, haga la transacción por payu', 'activo', 5, '2018-12-03 18:32:35', '2018-12-03 18:32:35'),
(99, 'C5', 'compra', 'Kissimmee, FL, USA', NULL, 'Kissimmee', 'FL', 'United States', 'COP', 'Colombian Peso ($)', '5', 'Peercoin', 'efecty', '0.3', '2335.42', '65200.00', '1000000.00', 'Bibliotecas o cualquier lugar publico', 'Por favor, haga la solicitud solo cuando puede completar el pago con dinero en efectivo en el plazo de 12 horas.', 'activo', 5, '2018-12-03 18:42:20', '2018-12-03 18:42:20'),
(100, 'C1', 'compra', 'Yucatan, Mexico', NULL, NULL, 'Yuc.', 'Mexico', 'MXN', 'Mexican peso ($)', '1', 'Bitcoin', 'efecty', '0', '80912.11', '520000.00', '600000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, póngase en contacto con MetalBit.com/ad/1234.', 'activo', 5, '2018-12-03 18:44:34', '2018-12-03 18:44:34'),
(101, 'C1', 'compra', 'East Java, Indonesia', NULL, NULL, 'East Java', 'Indonesia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'efecty', '0.4', '12940000.00', '13000000.00', '14000000.00', 'Transaccion electronica', 'Por favor, haga la solicitud solo cuando puede completar el pago con dinero en efectivo en el plazo de 12 horas.', 'activo', 5, '2018-12-03 18:45:51', '2018-12-03 18:45:51'),
(102, 'C1', 'compra', 'Dubai - United Arab Emirates', NULL, 'Dubai', 'Dubai', 'United Arab Emirates', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'efecty', '0.3', '12930934.00', '14000000.00', '150010000.00', 'Bibliotecas o cualquier lugar publico', 'Por favor, haga la solicitud solo cuando puede completar el pago con dinero en efectivo en el plazo de 12 horas.', 'activo', 5, '2018-12-03 19:23:05', '2018-12-03 19:23:05'),
(103, 'V2', 'venta', 'Soacha, Cundinamarca, Colombia', NULL, 'Soacha', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'BALOTO O EFECTY', '0.5', '79000.00', '79000.00', '90000.00', 'Lugares publicos', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'activo', 5, '2018-12-11 03:17:04', '2018-12-11 03:17:04'),
(104, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:22:13', '2018-12-11 03:22:13'),
(105, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 5, '2018-12-11 03:22:48', '2018-12-18 22:14:22'),
(106, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 5, '2018-12-11 03:24:01', '2018-12-18 22:14:21'),
(107, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 5, '2018-12-11 03:25:27', '2018-12-18 22:14:21'),
(108, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 5, '2018-12-11 03:26:04', '2018-12-11 03:42:52'),
(109, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:26:42', '2018-12-11 03:26:42'),
(110, 'V2', 'venta', 'Gujarat, India', NULL, NULL, 'GJ', 'India', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'BALOTO O EFECTY', '0.3', '79132.00', '80000.00', '900000.00', 'Lugares publicos', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'activo', 5, '2018-12-11 03:28:11', '2018-12-11 03:28:11'),
(111, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:34:27', '2018-12-11 03:34:27'),
(112, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:34:44', '2018-12-11 03:34:44'),
(113, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:36:52', '2018-12-11 03:36:52'),
(114, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 5, '2018-12-11 03:37:29', '2018-12-11 03:37:29'),
(115, 'V13', 'venta', 'Edgartown, MA, USA', NULL, 'Edgartown', 'MA', 'United States', 'COP', 'Colombian Peso ($)', '13', 'Ixcoin', 'BALOTO O EFECTY', '100', '155.00', '200.00', '300000.00', 'Lugares publicos', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'activo', 5, '2018-12-11 03:39:02', '2018-12-11 03:39:02'),
(116, 'V56', 'venta', 'Barbados', NULL, NULL, NULL, 'Barbados', 'COP', 'Colombian Peso ($)', '56', 'Zetacoin', 'davivienda', '0.6', '3.00', '5000.00', '100000.00', 'BIBLIOTECAS', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'activo', 5, '2018-12-11 03:42:02', '2018-12-11 03:42:02'),
(118, 'V298', 'venta', 'Cali', NULL, NULL, NULL, NULL, 'COP', 'Colombian Peso ($)', '298', 'NewYorkCoin', 'Bancolombia', '0', '10000.00', '40000.00', '400000.00', NULL, 'Pago por Bancolombia', 'activo', 568, '2018-12-18 21:19:22', '2018-12-18 21:19:22'),
(119, 'V1', 'venta', 'Jamundí, Valle del Cauca, Colombia', NULL, 'Jamundí', 'Valle del Cauca', 'Colombia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.5', '12079575.00', '230000000.00', '250000000.00', 'bbva', 'pruena', 'activo', 5, '2018-12-19 22:17:48', '2018-12-19 22:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `bonificaciones`
--

CREATE TABLE `bonificaciones` (
  `id` int(11) NOT NULL,
  `tipo_bonificacion` enum('REGISTRO','RECARGA') NOT NULL,
  `fk_id_detalle_referido` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonificaciones`
--

INSERT INTO `bonificaciones` (`id`, `tipo_bonificacion`, `fk_id_detalle_referido`, `valor`, `created_at`, `updated_at`) VALUES
(25, 'REGISTRO', 20, '100.00', '2018-11-13 22:36:01', '0000-00-00 00:00:00'),
(26, 'RECARGA', 20, '2000.00', '2018-11-16 19:44:37', '0000-00-00 00:00:00'),
(33, 'REGISTRO', 27, '100.00', '2018-12-03 04:57:55', '0000-00-00 00:00:00'),
(38, 'RECARGA', 20, '200.00', '2018-12-10 22:58:58', '0000-00-00 00:00:00'),
(39, 'RECARGA', 20, '200.00', '2018-12-10 23:06:29', '0000-00-00 00:00:00'),
(41, 'REGISTRO', 29, '100.00', '2018-12-10 23:21:48', '0000-00-00 00:00:00'),
(42, 'RECARGA', 20, '210.00', '2018-12-11 16:26:40', '0000-00-00 00:00:00'),
(43, 'RECARGA', 20, '200.00', '2018-12-18 21:45:17', '0000-00-00 00:00:00'),
(44, 'RECARGA', 20, '200.00', '2018-12-18 21:47:54', '0000-00-00 00:00:00'),
(45, 'RECARGA', 20, '200.00', '2018-12-18 21:47:57', '0000-00-00 00:00:00'),
(46, 'RECARGA', 20, '200.00', '2018-12-18 21:49:22', '0000-00-00 00:00:00'),
(47, 'RECARGA', 20, '200.00', '2018-12-18 21:51:51', '0000-00-00 00:00:00');

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
  `num_vistas` int(11) NOT NULL DEFAULT 1,
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
(87, 70, 5, '500.00', 'info', 192, 5, 'Lorem Ipsum is simply dummy text of the printing a', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', '2018-11-14 03:36:53', '2018-12-10 18:10:34'),
(88, 81, 1, '50.00', 'info', 17, 4, 'Recomendadísimo', '', '2018-11-14 03:46:54', '2018-11-27 10:52:17'),
(90, 71, 5, '500.00', 'compra', 55, 5, 'Nunca contestó', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', '2018-11-14 04:47:05', '2018-12-03 08:52:47'),
(91, 70, 1, '500.00', 'info', 160, 5, 'Lorem Ipsum is simply dummy text of the printing a', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', '2018-11-14 03:36:53', '2018-11-15 17:19:39'),
(92, 70, 2, '500.00', 'info', 161, 5, 'Lorem Ipsum is simply dummy text of the printing a', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', '2018-11-14 03:36:53', '2018-11-30 14:48:38'),
(93, 70, 3, '500.00', 'info', 160, 5, 'Lorem Ipsum is simply dummy text of the printing a', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', '2018-11-14 03:36:53', '2018-11-15 17:19:39'),
(95, 70, 554, '500.00', 'info', 160, 5, 'Lorem Ipsum is simply dummy text of the printing a', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', '2018-11-14 03:36:53', '2018-11-15 17:19:39'),
(96, 83, 5, '0.00', 'compra', 33, 3, 'Otros', 'EXCELENTE ATENCIOM', '2018-11-19 20:09:51', '2018-12-11 14:48:36'),
(97, 81, 555, '50.00', 'info', 5, NULL, NULL, '', '2018-11-19 20:57:45', '2018-11-19 20:17:56'),
(98, 82, 555, '50.00', 'info', 3, NULL, NULL, '', '2018-11-19 21:04:02', '2018-11-19 20:40:46'),
(99, 71, 555, '500.00', 'compra', 13, 4, 'Pesimo servicio', 'si tenaz ese man', '2018-11-19 21:04:08', '2018-11-21 11:17:06'),
(100, 85, 555, '50.00', 'compra', 3, 5, 'Usuario no fue puntual con transacción', 'pesima atención', '2018-11-20 06:43:34', '2018-11-21 11:17:13'),
(101, 86, 555, '50.00', 'compra', 4, NULL, NULL, '', '2018-11-20 06:55:15', '2018-11-21 11:09:39'),
(102, 85, 1, '0.00', 'compra', 4, 1, 'Posible fraude', '', '2018-11-21 20:21:28', '2018-11-30 16:15:58'),
(103, 82, 1, '50.00', 'info', 13, 4, 'Usuario no fue puntual con transacción', '', '2018-11-21 20:21:45', '2018-11-27 11:09:02'),
(104, 84, 5, '50.00', 'compra', 15, 3, 'Recomendadísimo', 'Lorem Ipsum is simply dummy text of the printing a...', '2018-11-22 00:52:15', '2018-12-04 15:28:12'),
(105, 88, 5, '50.00', 'info', 23, 2, 'Transacción Efectiva y segura', '', '2018-11-22 00:54:37', '2018-12-03 08:47:31'),
(106, 89, 1, '50.00', 'compra', 10, 3, 'Transacción Efectiva y segura', '', '2018-11-27 20:29:33', '2018-12-19 17:17:57'),
(107, 83, 1, '50.00', 'compra', 6, 1, 'Nunca contestó', '', '2018-11-27 20:29:50', '2018-12-20 12:43:22'),
(108, 86, 1, '50.00', 'info', 15, 4, 'Usuario no fue puntual con transacción', '', '2018-11-27 20:29:58', '2018-11-30 16:39:06'),
(109, 88, 1, '50.00', 'info', 10, 4, 'Usuario no fue puntual con transacción', '', '2018-11-27 20:30:09', '2018-11-27 11:07:10'),
(110, 89, 2, '50.00', 'info', 2, NULL, NULL, '', '2018-11-27 20:36:09', '2018-11-27 10:37:08'),
(111, 82, 2, '50.00', 'info', 2, NULL, NULL, '', '2018-11-27 20:36:17', '2018-11-27 10:37:20'),
(112, 71, 2, '500.00', 'info', 2, NULL, NULL, '', '2018-11-27 20:36:24', '2018-11-27 10:37:27'),
(113, 87, 2, '50.00', 'compra', 2, NULL, NULL, '', '2018-11-27 20:36:38', '2018-11-30 14:56:27'),
(114, 84, 2, '50.00', 'info', 1, 3, 'Recomendadísimo', 'Lorem Ipsum is simply dummy text of the printing a...', '2018-11-27 20:36:45', '2018-11-27 15:36:45'),
(115, 85, 2, '50.00', 'info', 1, NULL, NULL, '', '2018-11-27 20:37:00', '2018-11-27 15:37:00'),
(116, 81, 2, '50.00', 'info', 1, NULL, NULL, '', '2018-11-27 20:37:15', '2018-11-27 15:37:15'),
(117, 83, 2, '50.00', 'info', 1, NULL, NULL, '', '2018-11-27 20:37:24', '2018-11-27 15:37:24'),
(118, 88, 2, '50.00', 'info', 1, NULL, NULL, '', '2018-11-27 20:37:36', '2018-11-27 15:37:36'),
(119, 84, 555, '50.00', 'info', 2, 4, 'Recomendadísimo', 'Lorem Ipsum is simply dummy text of the printing a...', '2018-11-27 20:42:02', '2018-11-27 10:43:20'),
(120, 84, 1, '0.00', 'info', 15, 5, 'Recomendadísimo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ind\r\n', NULL, '2018-11-27 12:16:13'),
(123, 84, 3, '50.00', 'info', 2, 4, 'Recomendadísimo', 'Lorem Ipsum is simply dummy text of the printing a...', '2018-11-27 20:42:02', '2018-11-27 10:43:20'),
(124, 84, 2, '50.00', 'info', 2, 4, 'Recomendadísimo', 'Lorem Ipsum is simply dummy text of the printing a...', '2018-11-27 20:42:02', '2018-11-27 10:43:20'),
(126, 86, 2, '50.00', 'info', 8, 4, 'Usuario no fue puntual con transacción', 'ntrary to popular belief, Lorem Ipsum is not simply random text.', '2018-11-27 20:29:58', '2018-11-27 10:49:50'),
(128, 87, 1, '50.00', 'compra', 15, 3, 'Recomendadísimo', '', '2018-11-28 01:05:22', '2018-11-30 16:06:20'),
(129, 90, 5, '500.00', 'info', 9, 1, 'Otros', 'una pesima atención, este personaje es poco confiable', '2018-11-28 02:06:28', '2018-12-10 18:10:15'),
(130, 91, 5, '500.00', 'info', 7, 1, 'La atención no fue tan buena', '', '2018-11-28 04:10:24', '2018-12-11 12:12:41'),
(131, 89, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-11-28 04:15:36', '2018-11-27 23:15:36'),
(132, 90, 555, '500.00', 'info', 1, NULL, NULL, '', '2018-11-28 04:15:57', '2018-11-27 23:15:57'),
(133, 91, 555, '500.00', 'info', 1, NULL, NULL, '', '2018-11-28 04:16:38', '2018-11-27 23:16:38'),
(134, 70, 555, '500.00', 'info', 1, NULL, NULL, '', '2018-11-28 04:16:50', '2018-11-27 23:16:50'),
(135, 87, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-11-28 04:17:02', '2018-11-27 23:17:02'),
(138, 90, 2, '500.00', 'info', 1, NULL, NULL, '', '2018-12-01 00:45:14', '2018-11-30 19:45:14'),
(140, 91, 2, '500.00', 'info', 1, NULL, NULL, '', '2018-12-01 00:49:03', '2018-11-30 19:49:03'),
(154, 83, 563, '50.00', 'compra', 2, 1, 'Nunca contestó', '', '2018-12-01 02:34:42', '2018-11-30 16:35:12'),
(155, 84, 563, '50.00', 'info', 3, 3, 'Transacción Efectiva y segura', '', '2018-12-01 02:34:50', '2018-11-30 16:35:31'),
(156, 88, 563, '50.00', 'compra', 2, 3, 'Transacción Efectiva y segura', '', '2018-12-01 02:34:54', '2018-11-30 16:35:04'),
(163, 95, 569, '50.00', 'compra', 2, NULL, NULL, '', '2018-12-03 10:02:18', '2018-12-03 00:03:03'),
(164, 95, 5, '50.00', 'compra', 9, 3, 'Otros', 'este es un comentario escrito y minimo debe contener 110 caracteres, este actualmente tiene  110 caracteres :)', '2018-12-03 18:26:37', '2018-12-10 18:08:38'),
(169, 106, 1, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-11 16:46:05', '2018-12-11 11:46:05'),
(170, 105, 1, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 20:05:06', '2018-12-18 15:05:06'),
(171, 106, 555, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-18 20:08:49', '2018-12-18 15:08:49'),
(172, 105, 555, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-18 20:11:36', '2018-12-18 15:11:36'),
(173, 107, 555, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-18 20:12:36', '2018-12-18 15:12:36'),
(174, 104, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 20:13:56', '2018-12-18 15:13:56'),
(175, 85, 568, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-18 21:14:34', '2018-12-18 16:14:34'),
(176, 104, 568, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-18 21:15:06', '2018-12-18 16:15:06'),
(177, 118, 573, '0.00', 'compra', 2, NULL, NULL, '', '2018-12-18 21:24:18', '2018-12-18 16:42:14'),
(178, 103, 568, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-18 21:50:49', '2018-12-18 16:50:49'),
(179, 116, 568, '50.00', 'compra', 2, NULL, NULL, '', '2018-12-18 21:52:15', '2018-12-18 16:52:24'),
(180, 118, 5, '50.00', 'info', 1, 3, 'Recomendadísimo', '', '2018-12-18 22:19:37', '2018-12-18 17:19:37'),
(181, 118, 2, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-18 22:20:40', '2018-12-18 17:20:40'),
(182, 109, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 22:21:06', '2018-12-18 17:21:06'),
(183, 110, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 22:23:46', '2018-12-18 17:23:46'),
(184, 112, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 22:24:35', '2018-12-18 17:24:35'),
(185, 111, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 22:29:44', '2018-12-18 17:29:44'),
(186, 101, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 22:37:46', '2018-12-18 17:37:46'),
(187, 100, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 22:38:04', '2018-12-18 17:38:04'),
(188, 102, 555, '50.00', 'info', 1, NULL, NULL, '', '2018-12-18 22:41:23', '2018-12-18 17:41:23'),
(189, 103, 2, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-18 22:48:03', '2018-12-18 17:48:03'),
(190, 104, 1, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-19 22:18:28', '2018-12-19 17:18:28'),
(191, 109, 1, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-19 22:26:21', '2018-12-19 17:26:21'),
(192, 110, 1, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-19 22:29:16', '2018-12-19 17:29:16'),
(193, 111, 1, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-19 22:29:51', '2018-12-19 17:29:51'),
(194, 112, 1, '0.00', 'compra', 1, NULL, NULL, '', '2018-12-19 22:29:58', '2018-12-19 17:29:58'),
(195, 95, 1, '0.00', 'compra', 3, NULL, NULL, '', '2018-12-20 17:40:49', '2018-12-20 12:41:48'),
(196, 118, 1, '0.00', 'compra', 2, NULL, NULL, '', '2018-12-20 17:41:34', '2018-12-20 12:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_horario_usuario`
--

CREATE TABLE `detalle_horario_usuario` (
  `id` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `dia` enum('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO') NOT NULL,
  `horario` varchar(11) NOT NULL DEFAULT '08:00|20:00',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
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
(31, 5, 'MARTES', '08:00|23:00', '2018-12-18 22:46:21', '2018-11-16 11:48:10', 'ABIERTO'),
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
(162, 571, 'DOMINGO', '08:00|20:00', '2018-12-10 23:21:48', '2018-12-10 18:21:48', 'ABIERTO'),
(163, 573, 'LUNES', '08:00|20:00', '2018-12-18 21:22:15', '2018-12-18 16:22:15', 'ABIERTO'),
(164, 573, 'MARTES', '08:00|20:00', '2018-12-18 21:22:15', '2018-12-18 16:22:15', 'ABIERTO'),
(165, 573, 'MIERCOLES', '08:00|20:00', '2018-12-18 21:22:15', '2018-12-18 16:22:15', 'ABIERTO'),
(166, 573, 'JUEVES', '08:00|20:00', '2018-12-18 21:22:15', '2018-12-18 16:22:15', 'ABIERTO'),
(167, 573, 'VIERNES', '08:00|20:00', '2018-12-18 21:22:15', '2018-12-18 16:22:15', 'ABIERTO'),
(168, 573, 'SABADO', '08:00|20:00', '2018-12-18 21:22:15', '2018-12-18 16:22:15', 'ABIERTO'),
(169, 573, 'DOMINGO', '08:00|20:00', '2018-12-18 21:22:15', '2018-12-18 16:22:15', 'ABIERTO');

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
  `estado_detalle_recarga` enum('APROBADA','PENDIENTE','RECHAZADA','REGISTRADA') NOT NULL DEFAULT 'REGISTRADA',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla para registrar las recargas';

--
-- Dumping data for table `detalle_recargas`
--

INSERT INTO `detalle_recargas` (`id`, `id_user`, `tipo_recarga`, `valor_recarga`, `referencia_pago`, `referencia_pago_pay_u`, `metodo_pago`, `estado_detalle_recarga`, `created_at`, `updated_at`) VALUES
(3, 5, 'PAGO', '20000', '1', '1', '', 'APROBADA', '2018-11-04 23:30:00', '2018-11-04 23:30:00'),
(6, 3, 'BONIFICACION', '100', '', '', 'pagp por registro', 'APROBADA', '2018-11-05 00:21:20', '2018-11-05 00:21:20'),
(9, 3, 'BONIFICACION', '10000', '444', '4444', 'pagp por recarga 10%', 'APROBADA', '2018-11-05 00:21:20', '2018-11-05 00:21:20'),
(10, 3, 'PAGO', '20000', 'rec_1541459912-32', '844913760', 'BALOTO', 'PENDIENTE', '2018-11-05 23:19:44', '2018-11-05 23:19:44'),
(11, 3, 'BONIFICACION', '100', '154146052095', '154146052095', 'BONIFICACION REGISTRO REFERIDO  edgar', 'APROBADA', '2018-11-05 23:28:40', '2018-11-05 23:28:40'),
(12, 3, 'BONIFICACION', '100', '154146069496', '154146069496', 'BONIFICACION REGISTRO REFERIDO  edgar', 'APROBADA', '2018-11-05 23:31:34', '2018-11-05 23:31:34'),
(13, 2, 'BONIFICACION', '100', '154146080597', '154146080697', 'BONIFICACION REGISTRO REFERIDO  edgar1', 'APROBADA', '2018-11-05 23:33:26', '2018-11-05 23:33:26'),
(14, 3, 'PAGO', '20000', 'rec_1541535920-20', '844917729', 'EFECTY', 'PENDIENTE', '2018-11-06 20:27:33', '2018-11-06 20:27:33'),
(15, 3, 'BONIFICACION', '100', '1541537935525', '1541537935525', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 20:58:55', '2018-11-06 20:58:55'),
(16, 3, 'BONIFICACION', '100', '1541538012526', '1541538012526', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 21:00:12', '2018-11-06 21:00:12'),
(17, 3, 'BONIFICACION', '100', '1541538371527', '1541538371527', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 21:06:11', '2018-11-06 21:06:11'),
(18, 3, 'BONIFICACION', '100', '1541538426528', '1541538426528', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 21:07:06', '2018-11-06 21:07:06'),
(21, 3, 'BONIFICACION', '100', '1541544769530', '1541544769530', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 22:52:49', '2018-11-06 22:52:49'),
(22, 3, 'BONIFICACION', '100', '1541545277531', '1541545277531', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 23:01:17', '2018-11-06 23:01:17'),
(23, 3, 'BONIFICACION', '100', '1541545363532', '1541545363532', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 23:02:43', '2018-11-06 23:02:43'),
(24, 3, 'BONIFICACION', '100', '1541545400533', '1541545400533', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 23:03:20', '2018-11-06 23:03:20'),
(25, 3, 'BONIFICACION', '100', '1541545915534', '1541545915534', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 23:11:55', '2018-11-06 23:11:55'),
(28, 3, 'BONIFICACION', '200', '1541547297534', '1541547297534', 'BONIFICACION RECARGA 1%  eeee', 'APROBADA', '2018-11-06 23:34:57', '2018-11-06 23:34:57'),
(30, 3, 'BONIFICACION', '200', '1541547388534', '1541547388534', 'BONIFICACION RECARGA 1%  eeee', 'APROBADA', '2018-11-06 23:36:28', '2018-11-06 23:36:28'),
(31, 3, 'PAGO', '20000', 'rec_1541549068-28', '1079860680', 'BALOTO', 'APROBADA', '2018-11-07 00:05:12', '2018-11-07 00:05:12'),
(32, 3, 'BONIFICACION', '100', '1541611541536', '1541611541536', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-07 17:25:41', '2018-11-07 17:25:41'),
(51, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-08 22:06:55', '2018-12-11 16:18:07'),
(52, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-13 21:50:43', '2018-12-11 16:18:07'),
(53, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-13 22:25:32', '2018-12-11 16:18:07'),
(54, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-13 22:36:01', '2018-12-11 16:18:07'),
(55, 5, 'PAGO', '200000', 'rec_1542397323-34', '844992355', 'EFECTY', 'APROBADA', '2018-11-16 19:42:18', '2018-11-16 19:42:18'),
(56, 1, 'BONIFICACION', '2000', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-16 19:44:37', '2018-12-11 16:18:07'),
(57, 555, 'PAGO', '20000', 'rec_1542638694-54', '845002731', 'BALOTO', 'APROBADA', '2018-11-19 14:45:06', '2018-11-19 14:45:06'),
(58, 5, 'BONIFICACION', '100', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-11-21 21:18:49', '2018-12-11 03:43:05'),
(59, 5, 'BONIFICACION', '100', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-11-21 21:20:38', '2018-12-11 03:43:05'),
(60, 2, 'BONIFICACION', '100', '1543595998560', '1543595998560', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-11-30 16:39:58', '2018-11-30 16:39:58'),
(61, 2, 'BONIFICACION', '100', '1543596367561', '1543596367561', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-11-30 16:46:07', '2018-11-30 16:46:07'),
(62, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-30 16:51:32', '2018-12-11 16:18:07'),
(63, 1, 'BONIFICACION', '100', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-11-30 20:43:19', '2018-12-11 16:18:07'),
(64, 568, 'PAGO', '20000', 'rec_1545167261-41', '198847441', 'VISA', 'APROBADA', '2018-12-03 04:49:53', '2018-12-18 21:11:01'),
(65, 568, 'BONIFICACION', '100', 'rec_1545167261-41', '198847441', 'VISA', 'APROBADA', '2018-12-03 04:57:55', '2018-12-18 21:11:01'),
(67, 5, 'BONIFICACION', '200', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-12-04 21:37:13', '2018-12-11 03:43:05'),
(68, 5, 'BONIFICACION', '200', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-12-04 21:37:48', '2018-12-11 03:43:05'),
(69, 5, 'BONIFICACION', '200', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-12-04 21:37:53', '2018-12-11 03:43:05'),
(85, 5, 'PAGO', '250', 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-12-04 22:46:19', '2018-12-11 03:43:05'),
(86, 1, 'BONIFICACION', '200', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-12-10 22:58:58', '2018-12-11 16:18:07'),
(87, 5, 'PAGO', '20000', 'rec_1544483073-33', '845079024', 'EFECTY', 'APROBADA', '2018-12-10 23:00:39', '2018-12-11 04:04:47'),
(88, 1, 'BONIFICACION', '200', 'rec_1544545084-04', '845080651', 'EFECTY', 'PENDIENTE', '2018-12-10 23:06:29', '2018-12-11 16:18:07'),
(89, 5, 'PAGO', '20000', 'rec_1544483204-46', '845079025', 'EFECTY', 'PENDIENTE', '2018-12-10 23:06:54', '2018-12-11 04:07:05'),
(90, 565, 'BONIFICACION', '100', '1544483746570', '1544483746570', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-12-10 23:15:46', '2018-12-10 23:15:46'),
(91, 2, 'BONIFICACION', '100', '1544484108571', '1544484108571', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-12-10 23:21:48', '2018-12-10 23:21:48'),
(92, 5, 'PAGO', '21000', 'rec_1544545427-56', '845080656', 'BALOTO', 'APROBADA', '2018-12-11 16:24:00', '2018-12-11 16:26:40'),
(93, 1, 'BONIFICACION', '210', 'rec_1545153423-03', '198764146', 'BALOTO', 'PENDIENTE', '2018-12-11 16:26:40', '2018-12-18 17:18:02'),
(94, 1, 'PAGO', '20000', 'rec_1545153993-33', '198768005', 'BALOTO', 'PENDIENTE', '2018-12-18 17:26:38', '2018-12-18 17:27:52'),
(95, 1, 'PAGO', '20000', 'rec_1545154160-20', '198769035', 'BALOTO', 'PENDIENTE', '2018-12-18 17:29:45', '2018-12-18 17:30:33'),
(96, 555, 'PAGO', '20000', 'rec_1545161899-19', '198816692', 'BALOTO', 'PENDIENTE', '2018-12-18 19:38:23', '2018-12-18 19:39:04'),
(97, 555, 'PAGO', '20000', 'rec_1545163146-06', '', '', 'REGISTRADA', '2018-12-18 19:57:54', '2018-12-18 19:59:20'),
(98, 5, 'PAGO', '20000', 'rec_1545169141-01', '198857066', 'BALOTO', 'APROBADA', '2018-12-18 21:39:04', '2018-12-18 21:51:51'),
(99, 1, 'BONIFICACION', '200', '15451695175', '15451695175', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:45:17', '2018-12-18 21:45:17'),
(100, 1, 'BONIFICACION', '200', '15451696745', '15451696745', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:47:54', '2018-12-18 21:47:54'),
(101, 1, 'BONIFICACION', '200', '15451696775', '15451696775', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:47:57', '2018-12-18 21:47:57'),
(102, 1, 'BONIFICACION', '200', '15451697625', '15451697625', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:49:22', '2018-12-18 21:49:22'),
(103, 1, 'BONIFICACION', '200', '15451699115', '15451699115', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:51:51', '2018-12-18 21:51:51'),
(104, 5, 'PAGO', '20000', 'rec_1545232489-49', '', '', 'REGISTRADA', '2018-12-18 22:43:34', '2018-12-19 15:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_referidos`
--

CREATE TABLE `detalle_referidos` (
  `id` int(11) NOT NULL,
  `id_referido` int(11) UNSIGNED NOT NULL,
  `id_quien_refiere` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_referidos`
--

INSERT INTO `detalle_referidos` (`id`, `id_referido`, `id_quien_refiere`, `created_at`, `updated_at`) VALUES
(20, 1, 5, '2018-11-13 22:36:01', '0000-00-00 00:00:00'),
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
(1, 5, 'App\\User'),
(1, 572, 'App\\User'),
(2, 553, 'App\\User'),
(3, 2, 'App\\User'),
(3, 3, 'App\\User'),
(3, 554, 'App\\User'),
(3, 555, 'App\\User'),
(3, 563, 'App\\User'),
(3, 564, 'App\\User'),
(3, 565, 'App\\User'),
(3, 568, 'App\\User'),
(3, 569, 'App\\User'),
(3, 571, 'App\\User'),
(3, 573, 'App\\User');

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
  `estado_pago` enum('APROVADA','PENDIENTE','RECHAZADA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'APROVADA',
  `calificacion` int(10) DEFAULT NULL,
  `opinion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`id`, `transactionId`, `transactionState`, `transactionQuantity`, `transation_value`, `id_anuncio`, `id_user_compra`, `metodo_pago`, `estado_pago`, `calificacion`, `opinion`, `created_at`, `updated_at`) VALUES
(1, '1111', '4', '1.00', '111111', 1, 3, 'payu', 'APROVADA', 5, NULL, NULL, '2018-11-07 01:51:23'),
(2, '844917773', '7', '4.00', '1000000.00', 65, 528, 'EFECTY', 'APROVADA', 4, 'excelnet vendedor', NULL, '2018-11-07 03:43:06'),
(3, '844917775', '7', '0.00', '3.00', 64, 529, 'BALOTO', 'PENDIENTE', NULL, NULL, NULL, NULL),
(4, '844919610', '7', '4.00', '1000000.00', 65, 528, 'BALOTO', 'PENDIENTE', 5, 'excelnte vendedor', NULL, '2018-11-07 03:38:06'),
(5, '844919664', '4', '0.00', '2707.24', 5, 534, 'VISA', 'APROVADA', NULL, NULL, NULL, NULL),
(6, '844919670', '4', '19.00', '23000.00', 73, 534, 'VISA', 'APROVADA', NULL, NULL, NULL, NULL),
(7, '844919672', '4', '164.00', '10000.00', 67, 3, 'VISA', 'APROVADA', NULL, NULL, NULL, NULL),
(8, '844919680', '7', '0.00', '2.00', 64, 534, 'BALOTO', 'PENDIENTE', NULL, NULL, NULL, NULL),
(9, '1080034354', '7', '1.00', '32000.00', 69, 535, 'OTHERS_CASH', 'PENDIENTE', 4, 'BIEN', NULL, '2018-11-07 21:17:18'),
(10, '1080037361', '7', '42.00', '45663.00', 73, 535, 'OTHERS_CASH', 'PENDIENTE', 2, 'FFFF', NULL, '2018-11-07 21:22:11'),
(11, '1080039444', '7', '25.00', '27000.00', 73, 535, 'EFECTY', 'PENDIENTE', 5, NULL, NULL, '2018-11-07 21:24:56'),
(12, '844921889', '7', '21.00', '23000.00', 73, 547, 'BALOTO', 'APROVADA', 4, 'Un poco demorado pero serio', NULL, '2018-11-08 00:57:38'),
(13, '-', '0', '0.05', '4.62', 0, 5, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-04 14:03:42', NULL),
(14, '-', '0', '1.17', '6002', 0, 5, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-04 14:13:00', NULL),
(15, '845058796', '7', '1.97', '200001.00', 83, 5, 'OTHERS_CASH', 'PENDIENTE', 2, NULL, '2018-12-04 14:18:57', '2018-12-04 19:57:26'),
(17, '845058721', '4', '0.05', '4.62', 92, 5, 'BALOTO', 'APROVADA', 3, NULL, '2018-12-04 16:23:30', '2018-12-04 16:49:54'),
(18, '-', '0', '0.04', '3.620', 92, 5, 'PENDIENTE', 'APROVADA', 3, NULL, '2018-12-04 16:58:17', NULL),
(19, '845058783', '4', '0.09', '1000000.00', 95, 5, 'EFECTY', 'APROVADA', 3, NULL, '2018-12-04 19:19:44', '2018-12-04 19:33:30'),
(20, '-', '0', '0.09', '1000000.00', 95, 5, 'PENDIENTE', 'APROVADA', 3, NULL, '2018-12-04 19:47:46', NULL),
(21, '845060433', '6', '1.37', '7000.00', 84, 5, 'VISA', 'RECHAZADA', 3, NULL, '2018-12-04 20:28:12', NULL),
(22, '-', '0', '0.08', '1000000.00', 94, 558, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-04 21:01:19', NULL),
(23, '-', '0', '0.51', '52.60', 92, 558, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-04 21:01:38', NULL),
(24, '845060464', '7', '2.49', '250000.00', 83, 558, 'BALOTO', 'APROVADA', NULL, NULL, '2018-12-04 21:02:04', '2018-12-04 21:03:48'),
(25, '845060468', '6', '2.04', '10000.00', 85, 558, 'VISA', 'RECHAZADA', NULL, NULL, '2018-12-04 21:08:22', NULL),
(26, '845060478', '4', '2.50', '250000.00', 83, 5, 'VISA', 'APROVADA', 2, NULL, '2018-12-04 21:19:43', '2018-12-04 21:21:33'),
(27, '-', '0', '1.28', '5000', 89, 558, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-04 23:01:36', NULL),
(28, '-', '0', '0.00', '2500', 91, 558, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-04 23:01:44', NULL),
(29, '845080676', '7', '142.86', '10000.00', 106, 1, 'BALOTO', 'APROVADA', 2, NULL, '2018-12-11 16:46:05', '2018-12-11 16:46:57'),
(30, '845082004', '7', '2.59', '200013.00', 83, 5, 'BALOTO', 'APROVADA', NULL, NULL, '2018-12-11 19:48:36', '2018-12-11 19:49:20'),
(31, '198827163', '7', '142.86', '10000.00', 106, 555, 'BALOTO', 'PENDIENTE', NULL, NULL, '2018-12-18 20:08:49', '2018-12-18 20:09:14'),
(32, '198828289', '7', '142.86', '10000.00', 105, 555, 'BALOTO', 'PENDIENTE', NULL, NULL, '2018-12-18 20:11:36', '2018-12-18 20:11:56'),
(33, '1091202997', '7', '142.86', '10000.00', 107, 555, 'OTHERS_CASH', 'PENDIENTE', NULL, NULL, '2018-12-18 20:12:36', '2018-12-18 20:13:10'),
(34, '-', '0', '0.02', '100', 85, 568, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-18 21:14:34', NULL),
(35, '-', '0', '1428.57', '100000', 104, 568, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-18 21:15:06', NULL),
(36, '198852351', '4', '4.00', '40000.00', 118, 573, 'PSE', '', NULL, NULL, '2018-12-18 21:24:18', '2018-12-18 21:29:01'),
(37, '-', '0', '4.00', '40000.00', 118, 573, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-18 21:42:14', NULL),
(38, '-', '0', '1.08', '100000', 103, 568, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-18 21:50:49', NULL),
(39, '-', '0', '1538.46', '5000.00', 116, 568, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-18 21:52:24', NULL),
(40, '198878893', '7', '4.00', '40000.00', 118, 2, 'BALOTO', 'PENDIENTE', NULL, NULL, '2018-12-18 22:20:40', '2018-12-18 22:44:47'),
(41, '198880619', '7', '0.85', '79000.00', 103, 2, 'BALOTO', 'PENDIENTE', NULL, NULL, '2018-12-18 22:48:03', '2018-12-18 22:50:18'),
(42, '-', '0', '0.05', '200', 89, 1, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-19 22:17:16', NULL),
(43, '199233263', '7', '2789.79', '200000.00', 104, 1, 'BALOTO', 'PENDIENTE', NULL, NULL, '2018-12-19 22:18:28', '2018-12-19 22:19:04'),
(44, '-', '0', '1.07', '13000000.00', 109, 1, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-19 22:26:21', NULL),
(45, '-', '0', '0.84', '80000.00', 110, 1, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-19 22:29:16', NULL),
(46, '-', '0', '1.07', '13000000.00', 111, 1, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-19 22:29:51', NULL),
(47, '-', '0', '1.07', '13000000.00', 112, 1, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-19 22:29:58', NULL),
(48, '-', '0', '0.08', '1000000.00', 95, 1, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-20 17:40:49', NULL),
(49, '-', '0', '4.00', '40000.00', 118, 1, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-20 17:41:34', NULL),
(50, '-', '0', '1.90', '200000', 83, 1, 'PENDIENTE', 'APROVADA', NULL, NULL, '2018-12-20 17:43:22', NULL);

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
('stalinchacu@outlook.com', '$2y$10$DGySrvZcgC3uuAK6aMswbOWd4im1y60QfG6WPXtcQ6kfTw7Wb.vXy', '2018-11-08 04:31:14'),
('hvhvalencia3@gmail.com', '$2y$10$Jr7tF.3UCkIiSY1oVuzPCePBe5NTicSFF3QRkIDFZwQkR.ngGlP82', '2018-11-09 00:43:39'),
('stalinchacu@outlook.com', '$2y$10$DGySrvZcgC3uuAK6aMswbOWd4im1y60QfG6WPXtcQ6kfTw7Wb.vXy', '2018-11-08 04:31:14'),
('hvhvalencia3@gmail.com', '$2y$10$Jr7tF.3UCkIiSY1oVuzPCePBe5NTicSFF3QRkIDFZwQkR.ngGlP82', '2018-11-09 00:43:39'),
('adrian.vargas.2018@outlook.com', '$2y$10$FsH9t.D7RoixAzfqNIHle.RSgclCbgajb6WaZTdg3RgiJZ0ViWShq', '2018-11-19 19:43:12'),
('edgar.devmohan@gmail.com', '$2y$10$WvwxvkNhldJQHFSuZIHc0eWKwgH7NFgHXf1CVeQu3UK34JJA59v4e', '2018-12-11 05:29:46'),
('luisherresa13@gmail.com', '$2y$10$9nUl.nY3hlEIzqRR.DdstuEW3T9U/So.veR3ZNhCuEe4Lrl6sXkuW', '2018-12-18 21:03:45'),
('miguelrios1@hotmail.com', '$2y$10$2HGpUohzydGu0HC7Yzeg5uqdt8CR5wIyBSwfgqFVpwKPfgw4hGqTm', '2018-12-18 21:20:24'),
('edgar.guzman21@gmail.com', '$2y$10$cNS8pLyTy0CEjclSNk26yeGbhNv5m7aQpzXt.JsFf/69MlYdO2pi2', '2018-12-19 21:29:15');

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recargas`
--

INSERT INTO `recargas` (`id`, `status`, `valor`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ACTIVA', '13809.00', 1, NULL, '2018-12-18 21:51:51'),
(2, 'ACTIVA', '19600.00', 2, NULL, '2018-12-11 04:21:48'),
(3, 'ACTIVA', '17899.00', 3, NULL, NULL),
(43, 'ACTIVA', '360300.00', 5, '2018-11-13 05:00:00', '2018-12-18 21:51:51'),
(44, 'ACTIVA', '38450.00', 555, '2018-11-16 22:12:45', '2018-11-19 23:12:35'),
(52, 'ACTIVA', '0.00', 563, '2018-12-01 00:40:51', '2018-12-01 00:40:51'),
(53, 'ACTIVA', '0.00', 564, '2018-12-01 01:05:25', '2018-12-01 01:05:25'),
(54, 'ACTIVA', '100.00', 565, '2018-12-01 01:22:18', '2018-12-11 04:15:46'),
(57, 'ACTIVA', '19950.00', 568, '2018-12-03 09:48:52', '2018-12-18 21:11:01'),
(58, 'ACTIVA', '0.00', 569, '2018-12-03 09:57:55', '2018-12-03 09:57:55'),
(60, 'ACTIVA', '0.00', 571, '2018-12-11 04:21:49', '2018-12-11 04:21:49'),
(61, 'ACTIVA', '0.00', 573, '2018-12-18 21:22:15', '2018-12-18 21:22:15');

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
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(16, 1),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(20, 1),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(24, 1);

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
  `costo_clic` decimal(8,2) NOT NULL DEFAULT 0.00,
  `confirmado` enum('SI','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SI',
  `codigo_referido` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `calificacion` int(11) NOT NULL DEFAULT 0,
  `num_calificaciones` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `costo_clic`, `confirmado`, `codigo_referido`, `remember_token`, `created_at`, `updated_at`, `calificacion`, `num_calificaciones`) VALUES
(1, 'Heriberto Valencia', '3014751', 'hvhvalencia3@gmail.com', '$2y$10$oX30Ts4767sRvW3PD/CRGe3YhYZ.XqTVDXIQJU4NkR4eRPOk5.OK6', '500.00', 'SI', 525, 'ovJqTM14E465THqZBn2Ud2QVqwalw7ZYAi2inkL3RYQQXSd8mJ76JtRNDdsA', '2018-08-09 04:02:48', '2018-12-01 02:33:56', 36, 10),
(2, 'Bruno Valenica', '123456', 'bruno@gmail.com', '$2y$10$wDjYL1KFNql.03tvWn/Vce/dIqSfWmsJ5X4aJq42bHTynnZS/DTTG', '500.00', 'SI', 526, 'c8Oxuh8Q7BF0ATONGnlmOajDJzh9FXMjUwG3Yf8NIaIbS8bklSrncuPkKFST', '2018-08-09 04:02:48', '2018-11-14 03:07:49', 0, 0),
(3, 'David Cabrera', '3147684576', 'cabrera.davidf@gmail.com', '$2y$10$P72/hwGX/cscp.IyGsWWSun9i.RwMvre1XtxBfbLTEUqc3COAs4/i', '500.00', 'SI', 535, 'qnrczWP8IjEsgCyPbQriJRQMzjhQKxfzYi5G9LdcNC04IlRPUJ65TBgjRcfP', '2018-10-27 01:27:14', '2018-11-14 03:07:49', 0, 0),
(5, 'edgar.guzman.vargas.adrian', '73232504', 'edgar.guzman21@gmail.com', '$2y$10$zJW8t09IvGCSRFL0zUKRp.DHR07fjGmCNft0kU7fzTVUKwJQGDvPC', '50.00', 'SI', 539, 'OC1nli3w9CphWfcoVWh1Jaly7HUxAcx8KmiysvfMF5kfZ3Ei0brM8csXixJI', '2018-11-14 03:36:01', '2018-12-19 21:30:20', 28, 9),
(554, 'miguelrios', '3165287824', 'miguel.rios@prismaweb.ne\r\n', '$2y$10$1BdagLqcENUvaqroFCINXOs.6h8B8Vf20f/Yuv5J8Jvch/RP4e/Je', '500.00', 'SI', 538, NULL, '2018-10-31 01:23:35', '2018-11-14 03:07:49', 0, 0),
(555, 'Edi samuel', '1234', 'adrian.vargas.2018@outlook.com', '$2y$10$rq9jFZCTqSX5bN4abX/XreYjEqfbfDPsCf6OuXPy2JpYl674KS2nq', '50.00', 'SI', 540, 'ocBA4WyIIiD3NSf0bufSNesJ4VmJVPCD0miYxDVA6BkUkWE1d3vXsvsMI5UW', '2018-11-16 22:12:37', '2018-12-11 17:11:47', 66, 29),
(563, 'Heriberot valencia', '12345644', 'hvhvalenci@gmail.com', '$2y$10$91jp7sB4vNni.sdO3GPhIulRO.ua3j6et1FysNR7fB3hc0M4xhpa6', '50.00', 'SI', 548, 'SimxFt1ab3XBSFjhNXEmhMWsJDUQjjznSpN3HgJUg8R0MEurYR9sBRLxMwmr', '2018-12-01 00:40:50', '2018-12-01 00:40:50', 0, 0),
(564, 'Heriberto Valencia munioz', '123456789', 'heriimperativo@hotmail.com', '$2y$10$5rPVtz9zdkNdtW90BAIVnugTfumvkRHKzU926WkLrG9CF51wL2NwK', '50.00', 'SI', 549, NULL, '2018-12-01 01:05:25', '2018-12-01 01:05:25', 0, 0),
(565, 'Miguel Rios', '123456789', 'miguelrios1@hotmail.com', '$2y$10$dd44UdniR7pbXbJXlrWNYOrHQV6zUy7iuX95eZeDhVD8liDL7rIRy', '50.00', 'SI', 550, NULL, '2018-12-01 01:22:17', '2018-12-20 03:13:26', 0, 0),
(568, 'Luis Herrera', '3204296592', 'luisherresa13@gmail.com', '$2y$10$.yZLbqIk630eWvQWJ.TJEeEuKe4PdwoOWON7cOFtLfoIlYEsAay.C', '50.00', 'SI', 553, NULL, '2018-12-03 09:48:51', '2018-12-18 22:20:22', 12, 4),
(569, 'Luis Salazar', '1234567', 'luisherresa13@hotmail.com', '$2y$10$qBFHDtImJC/DuU94vsu9deKBWj1jv81a/QdGWlviJfGsBnwjeN4gO', '50.00', 'SI', 554, NULL, '2018-12-03 09:57:55', '2018-12-03 09:57:55', 0, 0),
(571, 'edgar.guzman.vargas', '3158790446', 'edgar.devmohan@gmail.com', '$2y$10$rC5BuONm5CudQyVJmZ/0.uHZBIyBNyy8RwIpJp.LDdDVbfM2k79GW', '50.00', 'SI', 556, 'DupH1Iqzu1Y93xR0eDmljoPEQB7Dhup820Syh9IopeEPt5Kq1WjXcKBACjhq', '2018-12-11 04:21:48', '2018-12-11 05:55:00', 0, 0),
(572, 'Soporte Prisma Web', '00000000', 'soporte@prismaweb.net', '$2y$10$VJWee5nsKmIN4BhnfKKntORgbnASufgnz.FCG5cOXog9mswbhq9MS', '0.00', 'SI', 557, NULL, '2018-12-13 15:35:49', '2018-12-13 15:36:22', 0, 0),
(573, 'Francisco Niño', '3166913626', 'paconino33@hotmail.com', '$2y$10$C7q3ysEtEWGNY4diaqB8pOsa9FapGmfFqVnHPklYJ.syK5w07Z90W', '50.00', 'SI', 558, NULL, '2018-12-18 21:22:15', '2018-12-18 21:22:15', 0, 0);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `bonificaciones`
--
ALTER TABLE `bonificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `detalle_clic_anuncios`
--
ALTER TABLE `detalle_clic_anuncios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `detalle_horario_usuario`
--
ALTER TABLE `detalle_horario_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `detalle_recargas`
--
ALTER TABLE `detalle_recargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
