-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2019 at 02:41 PM
-- Server version: 10.2.12-MariaDB-log
-- PHP Version: 7.2.7

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
  `estado_anuncio` enum('sin publicar','activo','bloqueado','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sin publicar',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anuncios`
--

INSERT INTO `anuncios` (`id`, `cod_anuncio`, `tipo_anuncio`, `ubicacion`, `cod_postal`, `localidad`, `departamento`, `ciudad`, `moneda`, `nombre_moneda`, `criptomoneda`, `nombre_cripto_moneda`, `banco`, `margen`, `precio_minimo_moneda`, `limite_min`, `limite_max`, `lugar`, `terminos`, `estado_anuncio`, `user_id`, `created_at`, `updated_at`) VALUES
(70, 'V1', 'venta', 'San Petersburgo, Rusia :)', NULL, 'San Petersburgo', NULL, 'Rusia', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'efecty', '0', '0.00', '10000', '1000', NULL, 'En un lugar de la mancha', 'bloqueado', 578, '2018-11-07 02:34:28', '2019-02-01 05:21:07'),
(71, 'V25', 'venta', 'Gachetá, Cundinamarca, Colombia', '251230', 'Gachetá', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '25', 'GoldCoin', 'en la tienda', '0.3', '0.00', '100', '10', NULL, 'Roma', 'activo', 578, '2018-11-07 02:38:58', '2018-11-07 02:38:58'),
(81, 'V42', 'venta', 'Bosa, Bogotá, Colombia', NULL, 'Bogotá', 'Bogotá', 'Colombia', 'COP', 'Colombian Peso ($)', '42', 'Primecoin', 'bbva', '0.4', '0.00', '9000', '900000', NULL, 'llamamé', 'inactivo', 555, '2018-11-14 03:45:58', '2019-02-01 04:50:56'),
(82, 'V2', 'venta', 'Caracas, Distrito Capital, Venezuela', NULL, 'Caracas', 'Dto. Capital', 'Venezuela', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'petrobras', '-0.7', '0.00', '400000', '450000', NULL, 'llamamé', 'activo', 555, '2018-11-17 00:41:42', '2019-01-31 16:30:28'),
(83, 'V2', 'venta', 'Pretoria, South Africa', NULL, 'Pretoria', 'GP', 'South Africa', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'bbva', '0.6', '0.00', '200000', '250000', NULL, 'llamamé', 'sin publicar', 555, '2018-11-19 19:44:43', '2019-02-01 04:57:44'),
(84, 'V1', 'venta', 'Bengaluru, Karnataka, India', NULL, 'Bengaluru', 'KA', 'India', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'odebrecht', '0.3', '5119.00', '6000', '8000', NULL, 'escribeme al correo', 'sin publicar', 555, '2018-11-19 23:10:50', '2019-02-01 04:57:01'),
(85, 'V1', 'venta', 'Edinburgh, UK', NULL, 'Edinburgh', 'Scotland', 'United Kingdom', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'baloto', '0.1', '4890.00', '10000', '25000', NULL, 'Paris', 'inactivo', 555, '2018-11-20 06:41:29', '2018-12-18 22:14:31'),
(86, 'C1', 'compra', 'Estonia', NULL, NULL, NULL, 'Estonia', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'efecty', '0.6', '4917.00', '30000', '50000', NULL, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'activo', 555, '2018-11-20 06:54:53', '2018-11-20 06:54:53'),
(87, 'C1', 'compra', 'Telangana, India', NULL, NULL, 'Telangana', 'India', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'bbva', '0.6', '4539.00', '5000', '5000', NULL, 'xxxx', 'activo', 555, '2018-11-21 20:08:41', '2018-11-21 20:08:41'),
(88, 'C1', 'compra', 'Petaling Jaya, Selangor, Malaysia', NULL, 'Petaling Jaya', 'Selangor', 'Malaysia', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'bbva', '0.5', '4533.00', '5000', '5000', NULL, '555', 'activo', 555, '2018-11-21 20:11:17', '2018-11-21 20:11:17'),
(89, 'V1', 'venta', 'FF22, Vikas Marg, Vijay Block, Block E, Laxmi Nagar, Delhi, India', '110092', 'Delhi', 'DL', 'India', 'USD', 'United States dollar ($)', '1', 'Bitcoin', 'ddba', '-13', '3920.00', '5000', '6000', NULL, 'xxx', 'bloqueado', 565, '2018-11-22 01:50:04', '2019-02-01 04:59:06'),
(90, 'V1', 'venta', 'Bogotá, Colombia', NULL, 'Bogotá', 'Bogotá', 'Colombia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'payu', '10', '10000000.00', '1500000', '2500000', 'no hay lugar de encuentro', 'ninguno termino de encuentro', 'activo', 578, '2018-11-27 21:04:47', '2018-11-27 21:04:47'),
(91, 'V1', 'venta', 'Sialkot, Pakistan', NULL, NULL, NULL, NULL, 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.5', '2500.00', '2500', '2500', 'caja', 'huella', 'bloqueado', 578, '2018-11-28 03:05:11', '2019-02-01 05:21:53'),
(95, 'V1', 'venta', 'Cali, Valle del Cauca, Colombia', NULL, 'Cali', 'Valle del Cauca', 'Colombia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bancolombia', '-10', '11500000.00', '1000000.00', '1000000.00', 'Unicentro', 'Pago en efectivo', 'bloqueado', 568, '2018-12-03 09:53:11', '2019-02-01 05:21:36'),
(96, 'C1', 'compra', 'Alaska, USA', NULL, NULL, 'AK', 'United States', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', '52000', '0.3', '0.00', '1500000.00', '2000000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, haga la transacción por payu', 'activo', 555, '2018-12-03 18:29:52', '2018-12-03 18:29:52'),
(97, 'C1', 'compra', 'Alaska, USA', NULL, NULL, 'AK', 'United States', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', '52000', '0.3', '0.00', '1500000.00', '2000000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, haga la transacción por payu', 'activo', 555, '2018-12-03 18:30:05', '2018-12-03 18:30:05'),
(98, 'C1', 'compra', 'Alaska, USA', NULL, NULL, 'AK', 'United States', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', '52000', '0.3', '0.00', '1500000.00', '2000000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, haga la transacción por payu', 'activo', 555, '2018-12-03 18:32:35', '2018-12-03 18:32:35'),
(99, 'C5', 'compra', 'Kissimmee, FL, USA', NULL, 'Kissimmee', 'FL', 'United States', 'COP', 'Colombian Peso ($)', '5', 'Peercoin', 'efecty', '0.3', '2335.42', '65200.00', '1000000.00', 'Bibliotecas o cualquier lugar publico', 'Por favor, haga la solicitud solo cuando puede completar el pago con dinero en efectivo en el plazo de 12 horas.', 'activo', 555, '2018-12-03 18:42:20', '2018-12-03 18:42:20'),
(100, 'C1', 'compra', 'Yucatan, Mexico', NULL, NULL, 'Yuc.', 'Mexico', 'MXN', 'Mexican peso ($)', '1', 'Bitcoin', 'efecty', '0', '80912.11', '520000.00', '600000.00', 'Bibliotecas o cualquier lugar publico', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, póngase en contacto con MetalBit.com/ad/1234.', 'activo', 569, '2018-12-03 18:44:34', '2018-12-03 18:44:34'),
(101, 'C1', 'compra', 'East Java, Indonesia', NULL, NULL, 'East Java', 'Indonesia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'efecty', '0.4', '12940000.00', '13000000.00', '14000000.00', 'Transaccion electronica', 'Por favor, haga la solicitud solo cuando puede completar el pago con dinero en efectivo en el plazo de 12 horas.', 'activo', 2, '2018-12-03 18:45:51', '2018-12-03 18:45:51'),
(102, 'C1', 'compra', 'Dubai - United Arab Emirates', NULL, 'Dubai', 'Dubai', 'United Arab Emirates', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'efecty', '0.3', '12930934.00', '14000000.00', '150010000.00', 'Bibliotecas o cualquier lugar publico', 'Por favor, haga la solicitud solo cuando puede completar el pago con dinero en efectivo en el plazo de 12 horas.', 'activo', 578, '2018-12-03 19:23:05', '2018-12-03 19:23:05'),
(103, 'V2', 'venta', 'Soacha, Cundinamarca, Colombia', NULL, 'Soacha', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'BALOTO O EFECTY', '0.5', '79000.00', '79000.00', '90000.00', 'Lugares publicos', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'activo', 555, '2018-12-11 03:17:04', '2018-12-11 03:17:04'),
(104, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 555, '2018-12-11 03:22:13', '2019-03-04 11:28:38'),
(105, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 578, '2018-12-11 03:22:48', '2018-12-18 22:14:22'),
(106, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 555, '2018-12-11 03:24:01', '2019-02-01 04:31:01'),
(107, 'V4', 'venta', 'Kennedy, Bogota, Colombia', NULL, 'Bogotá', 'Bogota', 'Colombia', 'COP', 'Colombian Peso ($)', '4', 'Terracoin', 'BBVA', '0.9', '70.00', '10000.00', '250000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 555, '2018-12-11 03:25:27', '2018-12-18 22:14:21'),
(108, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 555, '2018-12-11 03:26:04', '2018-12-11 03:42:52'),
(109, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 555, '2018-12-11 03:26:42', '2019-02-01 04:59:29'),
(110, 'V2', 'venta', 'Gujarat, India', NULL, NULL, 'GJ', 'India', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'BALOTO O EFECTY', '0.3', '79132.00', '80000.00', '900000.00', 'Lugares publicos', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'bloqueado', 555, '2018-12-11 03:28:11', '2019-02-01 05:22:13'),
(111, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'inactivo', 555, '2018-12-11 03:34:27', '2019-02-01 04:52:27'),
(112, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 555, '2018-12-11 03:34:44', '2019-02-01 04:41:53'),
(113, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'activo', 555, '2018-12-11 03:36:52', '2019-02-01 04:59:23'),
(114, 'V1', 'venta', 'São Paulo, State of São Paulo, Brazil', NULL, 'São Paulo', 'SP', 'Brazil', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.9', '11142591.00', '13000000.00', '15000000.00', 'BIBLIOTECAS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'sin publicar', 555, '2018-12-11 03:37:29', '2019-02-01 04:37:03'),
(115, 'V13', 'venta', 'Edgartown, MA, USA', NULL, 'Edgartown', 'MA', 'United States', 'COP', 'Colombian Peso ($)', '13', 'Ixcoin', 'BALOTO O EFECTY', '100', '155.00', '200.00', '300000.00', 'Lugares publicos', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'activo', 555, '2018-12-11 03:39:02', '2018-12-11 03:39:02'),
(116, 'V56', 'venta', 'Barbados', NULL, NULL, NULL, 'Barbados', 'COP', 'Colombian Peso ($)', '56', 'Zetacoin', 'davivienda', '0.6', '3.00', '5000.00', '100000.00', 'BIBLIOTECAS', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'activo', 555, '2018-12-11 03:42:02', '2018-12-11 03:42:02'),
(118, 'V298', 'venta', 'Cali', NULL, NULL, NULL, NULL, 'COP', 'Colombian Peso ($)', '298', 'NewYorkCoin', 'Bancolombia', '0', '10000.00', '40000.00', '400000.00', NULL, 'Pago por Bancolombia', 'activo', 555, '2018-12-18 21:19:22', '2018-12-18 21:19:22'),
(119, 'V1', 'venta', 'Jamundí, Valle del Cauca, Colombia', NULL, 'Jamundí', 'Valle del Cauca', 'Colombia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.5', '12079575.00', '230000000.00', '250000000.00', 'bbva', 'pruena', 'activo', 555, '2018-12-19 22:17:48', '2019-02-01 04:50:44'),
(120, 'V2', 'venta', 'Soacha, Cundinamarca, Colombia', NULL, 'Soacha', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'bbva', '0.3', '98689.00', '990000.00', '1000000.00', 'terminal del sur', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'activo', 555, '2019-01-29 17:36:52', '2019-01-29 17:36:52'),
(121, 'V2', 'venta', 'Soacha, Cundinamarca, Colombia', NULL, 'Soacha', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'bbva', '0.3', '98689.00', '990000.00', '1000000.00', 'terminal del sur', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'bloqueado', 555, '2019-01-29 17:39:41', '2019-02-01 05:12:04'),
(122, 'V37', 'venta', 'Paris, France', NULL, 'Paris', 'Île-de-France', 'France', 'JPY', 'Japanese yen (¥)', '37', 'Megacoin', 'bbva', '0', '1.00', '230.00', '23000.00', 'prueba', 'number_format', 'activo', 555, '2019-01-29 17:42:06', '2019-01-29 17:42:06'),
(123, 'V37', 'venta', 'Paris, France', NULL, 'Paris', 'Île-de-France', 'France', 'JPY', 'Japanese yen (¥)', '37', 'Megacoin', 'bbva', '0', '1.00', '230.00', '23000.00', 'prueba', 'number_format', 'activo', 555, '2019-01-29 17:43:34', '2019-01-29 17:43:34'),
(124, 'V37', 'venta', 'Paris, France', NULL, 'Paris', 'Île-de-France', 'France', 'JPY', 'Japanese yen (¥)', '37', 'Megacoin', 'bbva', '0', '1.00', '230.00', '23000.00', 'prueba', 'number_format', 'activo', 555, '2019-01-29 17:43:46', '2019-02-01 04:50:04'),
(125, 'V37', 'venta', 'Paris, France', NULL, 'Paris', 'Île-de-France', 'France', 'JPY', 'Japanese yen (¥)', '37', 'Megacoin', 'bbva', '0', '1.00', '230.00', '23000.00', 'prueba', 'number_format', 'activo', 555, '2019-01-29 17:44:35', '2019-01-29 17:44:35'),
(126, 'V37', 'venta', 'Paris, France', NULL, 'Paris', 'Île-de-France', 'France', 'JPY', 'Japanese yen (¥)', '37', 'Megacoin', 'bbva', '0', '1.00', '230.00', '23000.00', 'prueba', 'number_format', 'activo', 555, '2019-01-29 17:45:23', '2019-01-29 17:45:23'),
(127, 'V1', 'venta', 'Juana Díaz, Puerto Rico', '00795', 'Juana Díaz', 'Juana Díaz', 'Puerto Rico', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.3', '10926403.00', '20300000.00', '23000000.00', 'terminal del sur', 'prueba', 'sin publicar', 555, '2019-01-29 18:06:18', '2019-01-29 18:06:18'),
(128, 'V2', 'venta', 'Cali, Valle del Cauca, Colombia', NULL, 'Cali', 'Valle del Cauca', 'Colombia', 'CAD', 'Canadian dollar ($)', '2', 'Litecoin', 'aval', '0', '45.00', '50.00', '60.00', 'bogota', 'prueba', 'bloqueado', 555, '2019-01-29 18:29:35', '2019-03-07 13:24:59'),
(129, 'V1', 'venta', 'San Francisco, CA, USA', NULL, 'San Francisco', 'CA', 'United States', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'aval', '0.6', '10948797.00', '11000000.00', '120000000.00', 'prueba', 'prueba', 'sin publicar', 555, '2019-01-29 18:31:47', '2019-01-29 18:31:47'),
(130, 'V1', 'venta', 'Disneyland, South Harbor Boulevard, Anaheim, CA, USA', '92802', 'Anaheim', 'CA', 'United States', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'aval', '0.6', '10967384.00', '630000.00', '2300000.00', 'prueba', 'prueba', 'sin publicar', 555, '2019-01-29 18:39:46', '2019-01-29 18:39:46'),
(131, 'V1', 'venta', 'Soacha, Cundinamarca, Colombia', NULL, 'Soacha', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbva', '0.3', '10984556.00', '15000000.00', '16000000.00', 'prueba', 'Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, realiza el pago a través de Payu y pongase en contacto conmigo.', 'activo', 555, '2019-01-30 23:25:33', '2019-02-01 04:09:22'),
(132, 'V1', 'venta', 'Pretoria, South Africa', NULL, 'Pretoria', 'GP', 'South Africa', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbav', '0.3', '10975326.00', '10975326.00', '10975326.00', 'prueba', '10.975.326,00', 'activo', 555, '2019-01-30 23:30:19', '2019-03-04 19:44:04'),
(133, 'V1', 'venta', 'Pretoria, South Africa', NULL, 'Pretoria', 'GP', 'South Africa', 'COP', 'Colombian Peso ($)', '1', 'Bitcoin', 'bbav', '0.3', '10975326.00', '10975326.00', '10975326.00', 'prueba', '10.975.326,00', 'activo', 555, '2019-01-30 23:30:57', '2019-03-04 18:13:37'),
(134, 'V6', 'venta', 'Pruszków, Poland', '05-800', 'Pruszków', 'Masovian Voivodeship', 'Poland', 'COP', 'Colombian Peso ($)', '6', 'Novacoin', 'bbva', '0.3', '1401.00', '230000.00', '650000.00', 'prueba', 'SSSSSSSSSSS', 'sin publicar', 555, '2019-02-01 03:51:10', '2019-02-01 03:51:10'),
(136, 'V31', 'venta', 'Chapinero, Bogotá, Colombia', NULL, 'Bogotá', 'Bogotá', 'Colombia', 'COP', 'Colombian Peso ($)', '31', 'Argentum', 'bancolombia', '0.5', '61.00', '30000.00', '1200000.00', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'activo', 555, '2019-03-04 18:11:47', '2019-03-04 18:13:56'),
(137, 'V2', 'venta', 'Soacha, Cundinamarca, Colombia', NULL, 'Soacha', 'Cundinamarca', 'Colombia', 'COP', 'Colombian Peso ($)', '2', 'Litecoin', 'banco de bogota', '0.3', '177373.00', '200000.00', '260000.00', 'lugares publicos', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'inactivo', 578, '2019-03-07 13:13:46', '2019-03-07 13:28:23'),
(138, 'V1027', 'venta', 'Cali, Valle del Cauca, Colombia', NULL, 'Cali', 'Valle del Cauca', 'Colombia', 'COP', 'Colombian Peso ($)', '1027', 'Ethereum', 'bancolombia', '1', '440080.00', '1000000.00', '1000000.00', 'Unicentro', 'Consignación bancaria con Metalbit', 'activo', 568, '2019-03-08 20:00:11', '2019-03-08 20:42:42');

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
(47, 'RECARGA', 20, '200.00', '2018-12-18 21:51:51', '0000-00-00 00:00:00'),
(48, 'REGISTRO', 30, '100.00', '2019-01-29 17:00:10', '0000-00-00 00:00:00'),
(49, 'REGISTRO', 31, '100.00', '2019-01-31 02:09:38', '0000-00-00 00:00:00'),
(50, 'RECARGA', 31, '200.00', '2019-01-31 02:14:01', '0000-00-00 00:00:00'),
(51, 'RECARGA', 31, '210.00', '2019-01-31 02:15:07', '0000-00-00 00:00:00'),
(52, 'RECARGA', 31, '200.00', '2019-01-31 02:16:51', '0000-00-00 00:00:00'),
(53, 'RECARGA', 31, '1200.00', '2019-01-31 02:20:22', '0000-00-00 00:00:00'),
(54, 'RECARGA', 31, '200.00', '2019-01-31 02:31:00', '0000-00-00 00:00:00'),
(55, 'RECARGA', 29, '2000.00', '2019-03-04 11:31:26', '0000-00-00 00:00:00'),
(56, 'RECARGA', 29, '200.00', '2019-03-04 11:36:28', '0000-00-00 00:00:00'),
(72, 'REGISTRO', 34, '100.00', '2019-03-14 14:03:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `campanias`
--

CREATE TABLE `campanias` (
  `id` int(11) NOT NULL,
  `nombre_campania` varchar(256) NOT NULL,
  `tipo_campania` enum('global','personal') NOT NULL,
  `tipo_canje` enum('compra','recarga','regalo_recarga') NOT NULL,
  `fecha_inicial_vigencia` datetime DEFAULT NULL,
  `fecha_final_vigencia` datetime NOT NULL,
  `numero_de_cupones` int(11) NOT NULL,
  `cupones_disponibles` int(11) NOT NULL,
  `cupones_canjeados` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `limite_por_usuario` int(11) NOT NULL DEFAULT 1,
  `tipo_de_descuento` enum('porcentaje','valor_neto') NOT NULL DEFAULT 'porcentaje',
  `valor_de_descuento` decimal(10,2) NOT NULL,
  `moneda_descuento` varchar(256) NOT NULL,
  `costo_minimo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `es_acumulable` enum('0','1') NOT NULL DEFAULT '0',
  `estado_campania` enum('ABIERTA','CERRADA') NOT NULL DEFAULT 'ABIERTA',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campanias`
--

INSERT INTO `campanias` (`id`, `nombre_campania`, `tipo_campania`, `tipo_canje`, `fecha_inicial_vigencia`, `fecha_final_vigencia`, `numero_de_cupones`, `cupones_disponibles`, `cupones_canjeados`, `id_user`, `limite_por_usuario`, `tipo_de_descuento`, `valor_de_descuento`, `moneda_descuento`, `costo_minimo`, `es_acumulable`, `estado_campania`, `created_at`, `updated_at`) VALUES
(21, 'RECARGA 20 MIL', 'global', 'recarga', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 94, 6, NULL, 10, 'valor_neto', '20000.00', 'COP', '500.00', '0', 'ABIERTA', '2019-03-07 09:20:23', '2019-03-18 11:18:47'),
(22, 'COMPRAS CON EL 10.000 DE REGALO', 'global', 'compra', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1, NULL, 1, 'valor_neto', '10000.00', 'COP', '500.00', '0', 'ABIERTA', '2019-03-07 09:24:42', '2019-03-07 09:25:51'),
(23, 'compra 10', 'global', 'compra', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 4, 6, NULL, 2, 'valor_neto', '15000.00', 'COP', '500.00', '1', 'ABIERTA', '2019-03-07 09:35:32', '2019-03-07 14:51:27'),
(24, 'recarga bienvenida', 'global', 'recarga', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 99, 1, NULL, 1, 'valor_neto', '20000.00', 'COP', '100000.00', '0', 'ABIERTA', '2019-03-08 15:34:55', '2019-03-08 15:38:04'),
(25, 'RECARGA FREE BONO REGALO 20 MIL', 'personal', 'recarga', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1, 555, 1, 'valor_neto', '20000.00', 'COP', '500.00', '0', 'ABIERTA', '2019-03-11 13:30:37', '2019-03-11 13:31:16'),
(26, 'Recarga de regalo de 5000 mil', 'global', 'regalo_recarga', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1000, 996, 4, NULL, 1, 'valor_neto', '5000.00', 'COP', '5000.00', '0', 'ABIERTA', '2019-03-14 10:20:53', '2019-03-19 10:07:06'),
(27, 'COMPRA 10 % DTO', 'global', 'compra', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 8, 2, NULL, 2, 'porcentaje', '11.00', 'COP', '500.00', '0', 'ABIERTA', '2019-03-19 10:23:55', '2019-03-19 10:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `cupones_campanias`
--

CREATE TABLE `cupones_campanias` (
  `id` int(11) NOT NULL,
  `codigo_cupon` varchar(100) NOT NULL,
  `estado` enum('sin canjear','canjeado','canjeado_pagado') NOT NULL DEFAULT 'sin canjear',
  `fecha_canje` datetime DEFAULT NULL,
  `id_campania` int(10) UNSIGNED NOT NULL,
  `transaccion_donde_se_aplico` varchar(256) DEFAULT NULL,
  `monto_valor_redimido` decimal(10,2) DEFAULT NULL,
  `id_usuario_canje` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cupones_campanias`
--

INSERT INTO `cupones_campanias` (`id`, `codigo_cupon`, `estado`, `fecha_canje`, `id_campania`, `transaccion_donde_se_aplico`, `monto_valor_redimido`, `id_usuario_canje`, `created_at`, `updated_at`) VALUES
(642, '2EIZGX', 'canjeado_pagado', '2019-03-07 09:21:59', 21, 'rec_1551968513-53', '20000.00', 578, '2019-03-07 09:20:23', '2019-03-07 09:21:59'),
(643, '2EIZGX', 'canjeado_pagado', '2019-03-07 09:22:12', 21, 'rec_1551968526-06', '20000.00', 578, '2019-03-07 09:20:23', '2019-03-07 09:22:12'),
(644, '2EIZGX', 'canjeado', '2019-03-18 11:00:01', 21, 'rec_1552924791-51', '20000.00', 578, '2019-03-07 09:20:23', '2019-03-18 11:00:01'),
(645, '2EIZGX', 'canjeado_pagado', '2019-03-18 11:02:28', 21, 'rec_1552924942-22', '20000.00', 578, '2019-03-07 09:20:23', '2019-03-18 11:02:28'),
(646, '2EIZGX', 'canjeado', '2019-03-18 11:02:39', 21, 'rec_1552924952-32', '20000.00', 578, '2019-03-07 09:20:23', '2019-03-18 11:02:39'),
(647, '2EIZGX', 'canjeado', '2019-03-18 11:18:47', 21, 'rec_1552925073-33', '20000.00', 578, '2019-03-07 09:20:23', '2019-03-18 11:18:47'),
(648, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(649, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(650, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(651, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(652, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(653, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(654, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(655, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(656, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(657, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(658, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(659, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(660, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(661, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(662, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(663, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:23', '2019-03-07 09:20:23'),
(664, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(665, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(666, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(667, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(668, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(669, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(670, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(671, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(672, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(673, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(674, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(675, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(676, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(677, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(678, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(679, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(680, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(681, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(682, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(683, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(684, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(685, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(686, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(687, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(688, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(689, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(690, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(691, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(692, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(693, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(694, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(695, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(696, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(697, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(698, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(699, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(700, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(701, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(702, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(703, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(704, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(705, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(706, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(707, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(708, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(709, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(710, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(711, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(712, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(713, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(714, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(715, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(716, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(717, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(718, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(719, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(720, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(721, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(722, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(723, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(724, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(725, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(726, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(727, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(728, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(729, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(730, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(731, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(732, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(733, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(734, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(735, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(736, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(737, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(738, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(739, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(740, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(741, '2EIZGX', 'sin canjear', NULL, 21, NULL, NULL, NULL, '2019-03-07 09:20:24', '2019-03-07 09:20:24'),
(742, 'YSN647', 'canjeado_pagado', '2019-03-07 09:25:51', 22, 'V2-135-1551968733-1', NULL, 555, '2019-03-07 09:24:42', '2019-03-07 09:25:51'),
(743, 'PRUEBADEREGALO', 'canjeado_pagado', '2019-03-07 09:35:42', 23, 'V1-90-1551969228-30', NULL, 578, '2019-03-07 09:35:32', '2019-03-07 09:35:42'),
(744, 'PRUEBADEREGALO', 'canjeado_pagado', '2019-03-07 09:35:46', 23, 'V1-90-1551969228-30', NULL, 578, '2019-03-07 09:35:32', '2019-03-07 09:35:46'),
(745, 'PRUEBADEREGALO', 'canjeado_pagado', '2019-03-07 13:52:08', 23, 'V2-82-1551984517-0', NULL, 5, '2019-03-07 09:35:32', '2019-03-07 13:52:08'),
(746, 'PRUEBADEREGALO', 'canjeado_pagado', '2019-03-07 13:52:13', 23, 'V2-82-1551984517-0', NULL, 5, '2019-03-07 09:35:32', '2019-03-07 13:52:13'),
(747, 'PRUEBADEREGALO', 'canjeado_pagado', '2019-03-07 14:51:20', 23, 'V1-90-1551988267-1', NULL, 555, '2019-03-07 09:35:32', '2019-03-07 14:51:20'),
(748, 'PRUEBADEREGALO', 'canjeado_pagado', '2019-03-07 14:51:27', 23, 'V1-90-1551988267-1', NULL, 555, '2019-03-07 09:35:32', '2019-03-07 14:51:27'),
(749, 'PRUEBADEREGALO', 'sin canjear', NULL, 23, NULL, NULL, NULL, '2019-03-07 09:35:32', '2019-03-07 09:35:32'),
(750, 'PRUEBADEREGALO', 'sin canjear', NULL, 23, NULL, NULL, NULL, '2019-03-07 09:35:32', '2019-03-07 09:35:32'),
(751, 'PRUEBADEREGALO', 'sin canjear', NULL, 23, NULL, NULL, NULL, '2019-03-07 09:35:32', '2019-03-07 09:35:32'),
(752, 'PRUEBADEREGALO', 'sin canjear', NULL, 23, NULL, NULL, NULL, '2019-03-07 09:35:32', '2019-03-07 09:35:32'),
(753, '#BIENVENIDOAMETALBIT', 'canjeado', '2019-03-08 15:38:04', 24, 'rec_1552077470-50', '20000.00', 578, '2019-03-08 15:34:55', '2019-03-08 15:38:04'),
(754, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(755, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(756, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(757, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(758, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(759, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(760, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(761, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(762, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(763, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(764, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(765, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(766, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(767, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(768, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(769, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(770, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(771, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(772, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(773, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(774, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(775, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(776, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(777, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(778, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(779, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(780, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(781, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(782, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(783, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(784, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(785, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(786, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(787, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(788, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(789, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(790, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(791, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(792, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(793, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(794, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(795, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(796, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(797, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(798, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(799, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(800, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(801, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(802, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(803, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(804, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(805, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(806, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(807, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(808, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(809, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(810, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(811, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(812, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(813, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(814, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(815, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(816, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(817, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(818, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(819, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(820, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(821, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(822, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(823, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(824, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(825, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(826, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(827, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(828, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(829, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(830, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(831, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(832, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(833, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(834, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(835, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(836, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(837, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(838, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(839, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(840, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(841, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(842, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(843, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(844, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(845, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(846, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(847, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(848, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(849, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(850, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(851, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(852, '#BIENVENIDOAMETALBIT', 'sin canjear', NULL, 24, NULL, NULL, NULL, '2019-03-08 15:34:55', '2019-03-08 15:34:55'),
(853, 'G0K7DP', 'canjeado_pagado', '2019-03-11 13:31:16', 25, 'rec_1552329068-08', '20000.00', 555, '2019-03-11 13:30:37', '2019-03-11 13:31:16'),
(855, 'METALBIT', 'canjeado_pagado', '2019-03-14 10:25:23', 26, 'rec_1552577116-16', '5000.00', 578, '2019-03-14 10:20:53', '2019-03-14 10:25:23'),
(856, 'METALBIT', 'canjeado_pagado', '2019-03-14 10:26:37', 26, 'rec_1552577189-29', '5000.00', 576, '2019-03-14 10:20:53', '2019-03-14 10:26:37'),
(857, 'METALBIT', 'canjeado_pagado', '2019-03-19 10:07:06', 26, 'rec_1553007898-58', '5000.00', 555, '2019-03-14 10:20:53', '2019-03-19 10:07:06'),
(858, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(859, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(860, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(861, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(862, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(863, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(864, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(865, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(866, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(867, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(868, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(869, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(870, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(871, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(872, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(873, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(874, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(875, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(876, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(877, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(878, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(879, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(880, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(881, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(882, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(883, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(884, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(885, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(886, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(887, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(888, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(889, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(890, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(891, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(892, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(893, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(894, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(895, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(896, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(897, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(898, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(899, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(900, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(901, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(902, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(903, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(904, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(905, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(906, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(907, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(908, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(909, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(910, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(911, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(912, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(913, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(914, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(915, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(916, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(917, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(918, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(919, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(920, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(921, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(922, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(923, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(924, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(925, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(926, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(927, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(928, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(929, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(930, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(931, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(932, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(933, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(934, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(935, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(936, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(937, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(938, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(939, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(940, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(941, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(942, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(943, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(944, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(945, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(946, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(947, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(948, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(949, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(950, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(951, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(952, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(953, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(954, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(955, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(956, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(957, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(958, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(959, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(960, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(961, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(962, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(963, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(964, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(965, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(966, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(967, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(968, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(969, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(970, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(971, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(972, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(973, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(974, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(975, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(976, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(977, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(978, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(979, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(980, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(981, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(982, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(983, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(984, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(985, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(986, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(987, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(988, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(989, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(990, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(991, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(992, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(993, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(994, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(995, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(996, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(997, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(998, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(999, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1000, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1001, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1002, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1003, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1004, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1005, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1006, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1007, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1008, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1009, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1010, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1011, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1012, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1013, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1014, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1015, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1016, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1017, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1018, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1019, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1020, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1021, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1022, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1023, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1024, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1025, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1026, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1027, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1028, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1029, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1030, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1031, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1032, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1033, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1034, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1035, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1036, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1037, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1038, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1039, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1040, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1041, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1042, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1043, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1044, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1045, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1046, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1047, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1048, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1049, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1050, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1051, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1052, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1053, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1054, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1055, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1056, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1057, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1058, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1059, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1060, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1061, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1062, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1063, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1064, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1065, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1066, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1067, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1068, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1069, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1070, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1071, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1072, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1073, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1074, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1075, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1076, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1077, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1078, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1079, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1080, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1081, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1082, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1083, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1084, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1085, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1086, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1087, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1088, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1089, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1090, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1091, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1092, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1093, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1094, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53');
INSERT INTO `cupones_campanias` (`id`, `codigo_cupon`, `estado`, `fecha_canje`, `id_campania`, `transaccion_donde_se_aplico`, `monto_valor_redimido`, `id_usuario_canje`, `created_at`, `updated_at`) VALUES
(1095, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1096, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1097, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1098, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1099, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1100, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1101, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1102, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1103, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1104, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1105, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1106, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1107, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1108, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1109, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1110, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1111, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1112, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1113, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1114, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1115, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1116, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1117, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1118, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1119, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1120, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1121, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1122, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1123, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1124, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1125, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1126, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1127, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1128, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1129, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1130, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1131, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1132, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1133, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1134, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1135, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1136, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1137, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1138, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1139, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1140, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1141, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1142, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1143, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1144, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1145, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1146, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1147, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1148, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1149, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1150, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1151, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1152, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1153, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1154, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1155, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1156, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1157, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1158, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1159, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1160, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1161, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1162, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1163, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1164, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1165, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1166, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1167, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1168, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1169, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1170, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1171, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1172, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1173, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1174, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1175, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1176, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1177, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1178, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1179, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1180, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1181, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1182, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1183, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1184, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1185, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1186, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1187, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1188, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1189, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1190, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1191, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1192, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1193, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1194, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1195, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1196, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1197, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1198, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1199, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1200, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1201, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1202, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1203, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1204, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1205, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1206, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1207, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1208, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1209, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1210, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1211, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1212, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1213, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1214, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1215, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1216, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1217, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1218, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1219, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1220, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1221, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1222, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1223, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1224, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1225, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1226, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1227, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1228, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1229, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1230, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1231, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1232, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1233, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1234, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1235, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1236, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1237, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1238, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1239, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1240, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1241, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1242, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1243, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1244, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1245, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1246, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1247, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1248, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1249, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1250, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1251, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1252, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1253, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1254, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1255, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1256, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1257, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1258, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1259, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1260, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1261, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1262, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1263, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1264, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1265, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1266, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1267, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1268, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1269, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1270, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1271, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1272, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1273, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1274, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1275, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1276, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1277, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1278, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1279, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1280, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1281, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1282, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1283, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1284, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1285, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1286, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1287, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1288, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1289, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1290, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1291, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1292, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1293, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1294, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1295, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1296, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1297, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1298, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1299, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1300, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1301, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1302, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1303, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1304, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1305, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1306, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1307, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1308, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1309, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1310, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1311, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1312, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1313, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1314, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1315, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1316, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1317, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1318, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1319, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1320, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1321, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1322, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1323, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1324, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1325, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1326, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1327, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1328, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1329, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1330, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1331, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1332, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1333, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1334, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1335, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1336, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1337, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1338, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1339, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1340, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1341, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1342, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1343, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1344, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1345, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1346, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1347, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1348, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1349, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1350, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1351, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1352, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1353, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1354, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1355, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1356, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1357, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1358, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1359, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1360, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1361, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1362, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1363, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1364, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1365, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1366, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1367, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1368, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1369, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1370, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1371, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1372, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1373, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1374, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1375, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1376, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1377, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1378, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1379, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1380, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1381, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1382, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1383, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1384, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1385, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1386, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1387, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1388, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1389, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1390, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1391, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1392, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1393, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1394, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1395, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1396, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1397, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1398, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1399, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1400, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1401, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1402, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1403, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1404, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1405, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1406, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1407, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1408, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1409, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1410, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1411, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1412, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1413, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1414, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1415, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1416, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1417, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1418, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1419, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1420, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1421, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1422, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1423, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1424, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1425, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1426, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1427, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1428, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1429, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1430, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1431, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1432, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1433, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1434, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1435, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1436, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1437, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1438, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1439, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1440, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1441, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1442, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1443, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1444, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1445, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1446, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1447, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1448, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1449, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1450, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1451, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1452, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1453, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1454, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1455, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1456, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1457, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1458, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1459, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1460, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1461, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1462, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1463, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1464, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1465, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1466, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1467, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1468, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1469, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1470, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1471, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1472, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1473, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1474, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1475, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1476, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1477, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1478, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1479, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1480, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1481, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1482, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1483, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1484, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1485, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1486, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1487, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1488, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1489, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1490, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1491, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1492, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1493, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1494, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1495, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1496, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1497, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1498, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1499, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1500, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1501, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1502, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1503, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1504, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1505, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1506, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1507, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1508, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1509, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1510, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1511, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1512, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1513, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1514, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1515, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1516, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1517, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1518, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1519, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1520, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1521, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1522, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1523, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1524, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1525, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1526, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1527, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1528, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1529, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1530, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1531, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1532, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1533, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1534, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1535, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1536, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1537, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1538, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1539, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1540, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1541, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1542, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1543, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1544, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1545, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1546, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1547, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1548, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1549, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1550, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1551, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1552, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1553, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1554, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1555, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1556, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1557, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1558, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1559, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53');
INSERT INTO `cupones_campanias` (`id`, `codigo_cupon`, `estado`, `fecha_canje`, `id_campania`, `transaccion_donde_se_aplico`, `monto_valor_redimido`, `id_usuario_canje`, `created_at`, `updated_at`) VALUES
(1560, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1561, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1562, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1563, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1564, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1565, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1566, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1567, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1568, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1569, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1570, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1571, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1572, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1573, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1574, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1575, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1576, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1577, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1578, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1579, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1580, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1581, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1582, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1583, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1584, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1585, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1586, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1587, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1588, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1589, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1590, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1591, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1592, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1593, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1594, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1595, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1596, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1597, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1598, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1599, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1600, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1601, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1602, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1603, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1604, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1605, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1606, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1607, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1608, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1609, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1610, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1611, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1612, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1613, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1614, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1615, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1616, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1617, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1618, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1619, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1620, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1621, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1622, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1623, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1624, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1625, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1626, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1627, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1628, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1629, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1630, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1631, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1632, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1633, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1634, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1635, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1636, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1637, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1638, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1639, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1640, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1641, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1642, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1643, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1644, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1645, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1646, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1647, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1648, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1649, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1650, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1651, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1652, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1653, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1654, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1655, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1656, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1657, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1658, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1659, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1660, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1661, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1662, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1663, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1664, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1665, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1666, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1667, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1668, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1669, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1670, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1671, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1672, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1673, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1674, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1675, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1676, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1677, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1678, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1679, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1680, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1681, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1682, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1683, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1684, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1685, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1686, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1687, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1688, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1689, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1690, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1691, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1692, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1693, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1694, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1695, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1696, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1697, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1698, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1699, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1700, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1701, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1702, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1703, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1704, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1705, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1706, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1707, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1708, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1709, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1710, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1711, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1712, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1713, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1714, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1715, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1716, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1717, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1718, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1719, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1720, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1721, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1722, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1723, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1724, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1725, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1726, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1727, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1728, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1729, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1730, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1731, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1732, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1733, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1734, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1735, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1736, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1737, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1738, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1739, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1740, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1741, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1742, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1743, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1744, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1745, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1746, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1747, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1748, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1749, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1750, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1751, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1752, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1753, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1754, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1755, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1756, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1757, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1758, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1759, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1760, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1761, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1762, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1763, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1764, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1765, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1766, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1767, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1768, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1769, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1770, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1771, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1772, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1773, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1774, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1775, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1776, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1777, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1778, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1779, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1780, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1781, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1782, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1783, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1784, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1785, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1786, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1787, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1788, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1789, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1790, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1791, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1792, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1793, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1794, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1795, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1796, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1797, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1798, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1799, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1800, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1801, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1802, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1803, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1804, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1805, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1806, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1807, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1808, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1809, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1810, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1811, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1812, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1813, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1814, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1815, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1816, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1817, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1818, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1819, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1820, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1821, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1822, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1823, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1824, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1825, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1826, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1827, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1828, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1829, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1830, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1831, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1832, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1833, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1834, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1835, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1836, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1837, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1838, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1839, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1840, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1841, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1842, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1843, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1844, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1845, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1846, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1847, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1848, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1849, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1850, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1851, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1852, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1853, 'METALBIT', 'sin canjear', NULL, 26, NULL, NULL, NULL, '2019-03-14 10:20:53', '2019-03-14 10:20:53'),
(1854, 'DDDDD', 'canjeado', '2019-03-19 10:24:04', 27, 'V2-82-1553008900-0', '405000.00', 578, '2019-03-19 10:23:55', '2019-03-19 10:24:04'),
(1855, 'DDDDD', 'canjeado', '2019-03-19 10:35:45', 27, 'V2-103-1553009710-8', '79500.00', 578, '2019-03-19 10:23:55', '2019-03-19 10:35:45'),
(1856, 'DDDDD', 'sin canjear', NULL, 27, NULL, NULL, NULL, '2019-03-19 10:23:55', '2019-03-19 10:23:55'),
(1857, 'DDDDD', 'sin canjear', NULL, 27, NULL, NULL, NULL, '2019-03-19 10:23:55', '2019-03-19 10:23:55'),
(1858, 'DDDDD', 'sin canjear', NULL, 27, NULL, NULL, NULL, '2019-03-19 10:23:55', '2019-03-19 10:23:55'),
(1859, 'DDDDD', 'sin canjear', NULL, 27, NULL, NULL, NULL, '2019-03-19 10:23:55', '2019-03-19 10:23:55'),
(1860, 'DDDDD', 'sin canjear', NULL, 27, NULL, NULL, NULL, '2019-03-19 10:23:55', '2019-03-19 10:23:55'),
(1861, 'DDDDD', 'sin canjear', NULL, 27, NULL, NULL, NULL, '2019-03-19 10:23:55', '2019-03-19 10:23:55'),
(1862, 'DDDDD', 'sin canjear', NULL, 27, NULL, NULL, NULL, '2019-03-19 10:23:55', '2019-03-19 10:23:55'),
(1863, 'DDDDD', 'sin canjear', NULL, 27, NULL, NULL, NULL, '2019-03-19 10:23:55', '2019-03-19 10:23:55');

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
(259, 131, 5, '300.00', 'info', 7, NULL, NULL, '', '2019-03-01 16:49:14', '2019-03-01 12:52:18'),
(260, 126, 5, '300.00', 'info', 11, NULL, NULL, '', '2019-03-01 16:59:03', '2019-03-01 12:30:45'),
(261, 125, 5, '300.00', 'info', 3, NULL, NULL, '', '2019-03-01 17:08:49', '2019-03-01 12:31:04'),
(262, 124, 5, '300.00', 'info', 3, NULL, NULL, '', '2019-03-01 17:10:57', '2019-03-01 12:31:18'),
(263, 120, 5, '300.00', 'info', 2, NULL, NULL, '', '2019-03-01 17:12:41', '2019-03-01 12:32:03'),
(264, 123, 5, '300.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:31:37', '2019-03-01 12:31:37'),
(265, 122, 5, '300.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:31:56', '2019-03-01 12:31:56'),
(266, 119, 5, '300.00', 'info', 2, NULL, NULL, '', '2019-03-01 17:32:07', '2019-03-01 12:32:11'),
(267, 118, 5, '300.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:32:15', '2019-03-01 12:32:15'),
(268, 90, 5, '300.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:52:31', '2019-03-01 12:52:31'),
(269, 103, 5, '10000.00', 'compra', 3, NULL, NULL, '', '2019-03-01 17:52:32', '2019-03-19 13:02:57'),
(270, 104, 5, '300.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:52:52', '2019-03-01 12:52:52'),
(271, 106, 5, '10000.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:52:57', '2019-03-01 12:52:57'),
(272, 109, 5, '10000.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:53:01', '2019-03-01 12:53:01'),
(273, 112, 5, '10000.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:53:07', '2019-03-01 12:53:07'),
(274, 115, 5, '10000.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:53:28', '2019-03-01 12:53:28'),
(275, 116, 5, '10000.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:54:49', '2019-03-01 12:54:49'),
(276, 113, 5, '10000.00', 'info', 1, NULL, NULL, '', '2019-03-01 17:55:40', '2019-03-01 12:55:40'),
(277, 71, 5, '300.00', 'info', 2, NULL, NULL, '', '2019-03-01 18:14:38', '2019-03-01 13:15:50'),
(278, 82, 5, '300.00', 'info', 4, NULL, NULL, '', '2019-03-01 18:16:55', '2019-03-19 13:02:47'),
(279, 90, 555, '300.00', 'info', 9, NULL, NULL, '', '2019-03-01 18:55:44', '2019-03-07 15:10:44'),
(280, 71, 555, '300.00', 'compra', 25, 5, 'Recomendadísimo', 'Recomendadísimo', '2019-03-01 19:00:29', '2019-03-07 17:54:44'),
(281, 104, 555, '300.00', 'info', 2, NULL, NULL, '', '2019-03-01 19:00:35', '2019-03-01 14:46:16'),
(282, 82, 571, '300.00', 'compra', 18, NULL, NULL, '', '2019-03-01 19:01:37', '2019-03-04 15:23:16'),
(283, 106, 571, '300.00', 'compra', 3, NULL, NULL, '', '2019-03-01 19:02:08', '2019-03-01 14:02:54'),
(284, 103, 571, '300.00', 'compra', 2, NULL, NULL, '', '2019-03-04 11:28:21', '2019-03-04 15:15:50'),
(287, 86, 571, '300.00', 'info', 1, NULL, NULL, '', '2019-03-04 17:35:42', '2019-03-04 12:35:42'),
(288, 136, 555, '0.00', 'compra', 6, NULL, NULL, '', '2019-03-04 20:27:02', '2019-03-05 07:22:18'),
(289, 82, 578, '300.00', 'compra', 16, 5, 'Recomendadísimo', 'Recomendadísimo', '2019-03-07 13:20:37', '2019-03-19 11:55:15'),
(290, 103, 578, '300.00', 'compra', 12, 5, 'Recomendadísimo', 'Recomendadísimo', '2019-03-07 13:27:27', '2019-03-19 12:01:23'),
(291, 90, 578, '300.00', 'compra', 6, NULL, NULL, '', '2019-03-07 14:14:15', '2019-03-07 09:33:54'),
(292, 71, 578, '300.00', 'info', 1, NULL, NULL, '', '2019-03-07 14:14:23', '2019-03-07 09:14:23'),
(293, 100, 578, '300.00', 'info', 1, NULL, NULL, '', '2019-03-07 14:14:40', '2019-03-07 09:14:40'),
(295, 106, 578, '0.00', 'compra', 2, 4, 'Transacción Efectiva y segura', 'Transacción Efectiva y segura', '2019-03-07 15:48:13', '2019-03-19 12:00:01'),
(296, 103, 568, '0.00', 'compra', 1, NULL, NULL, '', '2019-03-08 19:40:19', '2019-03-08 14:40:19'),
(297, 113, 568, '300.00', 'info', 1, NULL, NULL, '', '2019-03-08 19:40:37', '2019-03-08 14:40:37'),
(298, 82, 568, '0.00', 'compra', 1, NULL, NULL, '', '2019-03-08 19:53:57', '2019-03-08 14:53:57'),
(299, 98, 5, '300.00', 'info', 1, NULL, NULL, '', '2019-03-18 16:21:47', '2019-03-18 12:21:47'),
(300, 122, 578, '300.00', 'info', 1, NULL, NULL, '', '2019-03-18 16:23:15', '2019-03-18 12:23:15'),
(301, 125, 578, '300.00', 'info', 1, NULL, NULL, '', '2019-03-18 16:24:07', '2019-03-18 12:24:07'),
(302, 132, 578, '300.00', 'info', 1, NULL, NULL, '', '2019-03-18 16:24:26', '2019-03-18 12:24:26');

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
(33, 5, 'JUEVES', '08:00|20:00', '2019-01-17 14:48:27', '2018-11-16 11:48:11', 'ABIERTO'),
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
(169, 573, 'DOMINGO', '08:00|20:00', '2018-12-18 21:22:15', '2018-12-18 16:22:15', 'ABIERTO'),
(170, 575, 'LUNES', '08:00|17:00', '2019-01-29 17:00:10', '2019-01-29 12:00:10', 'ABIERTO'),
(171, 575, 'MARTES', '08:00|17:00', '2019-01-29 17:00:10', '2019-01-29 12:00:10', 'ABIERTO'),
(172, 575, 'MIERCOLES', '08:00|17:00', '2019-01-29 17:00:10', '2019-01-29 12:00:10', 'ABIERTO'),
(173, 575, 'JUEVES', '08:00|17:00', '2019-01-29 17:00:10', '2019-01-29 12:00:10', 'ABIERTO'),
(174, 575, 'VIERNES', '08:00|17:00', '2019-01-29 17:00:10', '2019-01-29 12:00:10', 'ABIERTO'),
(175, 575, 'SABADO', '08:00|17:00', '2019-01-29 17:00:10', '2019-01-29 12:00:10', 'CERRADO'),
(176, 575, 'DOMINGO', '08:00|17:00', '2019-01-29 17:00:10', '2019-01-29 12:00:10', 'CERRADO'),
(177, 576, 'LUNES', '08:00|17:00', '2019-01-31 02:09:38', '2019-01-30 21:09:38', 'ABIERTO'),
(178, 576, 'MARTES', '08:00|17:00', '2019-01-31 02:09:38', '2019-01-30 21:09:38', 'ABIERTO'),
(179, 576, 'MIERCOLES', '08:00|17:00', '2019-01-31 02:09:38', '2019-01-30 21:09:38', 'ABIERTO'),
(180, 576, 'JUEVES', '08:00|17:00', '2019-01-31 02:09:38', '2019-01-30 21:09:38', 'ABIERTO'),
(181, 576, 'VIERNES', '08:00|17:00', '2019-01-31 02:09:38', '2019-01-30 21:09:38', 'ABIERTO'),
(182, 576, 'SABADO', '08:00|17:00', '2019-01-31 02:09:38', '2019-01-30 21:09:38', 'CERRADO'),
(183, 576, 'DOMINGO', '08:00|17:00', '2019-01-31 02:09:38', '2019-01-30 21:09:38', 'CERRADO'),
(191, 578, 'LUNES', '08:00|17:00', '2019-03-07 12:58:03', '2019-03-07 07:58:03', 'ABIERTO'),
(192, 578, 'MARTES', '08:00|17:00', '2019-03-07 12:58:03', '2019-03-07 07:58:03', 'ABIERTO'),
(193, 578, 'MIERCOLES', '08:00|17:00', '2019-03-07 12:58:03', '2019-03-07 07:58:03', 'ABIERTO'),
(194, 578, 'JUEVES', '09:00|17:00', '2019-03-07 13:12:13', '2019-03-07 07:58:03', 'CERRADO'),
(195, 578, 'VIERNES', '08:00|17:00', '2019-03-07 12:58:03', '2019-03-07 07:58:03', 'ABIERTO'),
(196, 578, 'SABADO', '08:00|17:00', '2019-03-07 12:58:03', '2019-03-07 07:58:03', 'CERRADO'),
(197, 578, 'DOMINGO', '08:00|17:00', '2019-03-07 12:58:03', '2019-03-07 07:58:03', 'CERRADO'),
(198, 579, 'LUNES', '08:00|17:00', '2019-03-14 14:03:11', '2019-03-14 10:03:11', 'ABIERTO'),
(199, 579, 'MARTES', '08:00|17:00', '2019-03-14 14:03:11', '2019-03-14 10:03:11', 'ABIERTO'),
(200, 579, 'MIERCOLES', '08:00|17:00', '2019-03-14 14:03:11', '2019-03-14 10:03:11', 'ABIERTO'),
(201, 579, 'JUEVES', '08:00|17:00', '2019-03-14 14:03:11', '2019-03-14 10:03:11', 'ABIERTO'),
(202, 579, 'VIERNES', '08:00|17:00', '2019-03-14 14:03:11', '2019-03-14 10:03:11', 'ABIERTO'),
(203, 579, 'SABADO', '08:00|17:00', '2019-03-14 14:03:11', '2019-03-14 10:03:11', 'CERRADO'),
(204, 579, 'DOMINGO', '08:00|17:00', '2019-03-14 14:03:11', '2019-03-14 10:03:11', 'CERRADO');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_recargas`
--

CREATE TABLE `detalle_recargas` (
  `id` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `tipo_recarga` enum('PAGO','BONIFICACION') NOT NULL,
  `valor_recarga` decimal(10,0) NOT NULL,
  `valor_pagado` decimal(10,2) DEFAULT NULL,
  `referencia_pago` varchar(50) NOT NULL,
  `referencia_pago_pay_u` varchar(50) NOT NULL,
  `metodo_pago` varchar(256) NOT NULL,
  `estado_detalle_recarga` enum('APROBADA','PENDIENTE','RECHAZADA','REGISTRADA','PENDIENTE APROBACION') NOT NULL DEFAULT 'REGISTRADA',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `certificado_pago` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla para registrar las recargas';

--
-- Dumping data for table `detalle_recargas`
--

INSERT INTO `detalle_recargas` (`id`, `id_user`, `tipo_recarga`, `valor_recarga`, `valor_pagado`, `referencia_pago`, `referencia_pago_pay_u`, `metodo_pago`, `estado_detalle_recarga`, `created_at`, `updated_at`, `certificado_pago`) VALUES
(3, 5, 'PAGO', '20000', NULL, '1', '1', '', 'APROBADA', '2018-11-04 23:30:00', '2018-11-04 23:30:00', NULL),
(6, 3, 'BONIFICACION', '100', NULL, '', '', 'pagp por registro', 'APROBADA', '2018-11-05 00:21:20', '2018-11-05 00:21:20', NULL),
(9, 3, 'BONIFICACION', '10000', NULL, '444', '4444', 'pagp por recarga 10%', 'APROBADA', '2018-11-05 00:21:20', '2018-11-05 00:21:20', NULL),
(10, 3, 'PAGO', '20000', NULL, 'rec_1541459912-32', '844913760', 'BALOTO', 'APROBADA', '2018-11-05 23:19:44', '2018-11-05 23:19:44', NULL),
(11, 3, 'BONIFICACION', '100', NULL, '154146052095', '154146052095', 'BONIFICACION REGISTRO REFERIDO  edgar', 'APROBADA', '2018-11-05 23:28:40', '2018-11-05 23:28:40', NULL),
(12, 3, 'BONIFICACION', '100', NULL, '154146069496', '154146069496', 'BONIFICACION REGISTRO REFERIDO  edgar', 'APROBADA', '2018-11-05 23:31:34', '2018-11-05 23:31:34', NULL),
(13, 2, 'BONIFICACION', '100', NULL, '154146080597', '154146080697', 'BONIFICACION REGISTRO REFERIDO  edgar1', 'APROBADA', '2018-11-05 23:33:26', '2018-11-05 23:33:26', NULL),
(14, 3, 'PAGO', '20000', NULL, 'rec_1541535920-20', '844917729', 'EFECTY', 'APROBADA', '2018-11-06 20:27:33', '2018-11-06 20:27:33', NULL),
(15, 3, 'BONIFICACION', '100', NULL, '1541537935525', '1541537935525', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 20:58:55', '2018-11-06 20:58:55', NULL),
(16, 3, 'BONIFICACION', '100', NULL, '1541538012526', '1541538012526', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 21:00:12', '2018-11-06 21:00:12', NULL),
(17, 3, 'BONIFICACION', '100', NULL, '1541538371527', '1541538371527', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 21:06:11', '2018-11-06 21:06:11', NULL),
(18, 3, 'BONIFICACION', '100', NULL, '1541538426528', '1541538426528', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 21:07:06', '2018-11-06 21:07:06', NULL),
(21, 3, 'BONIFICACION', '100', NULL, '1541544769530', '1541544769530', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 22:52:49', '2018-11-06 22:52:49', NULL),
(22, 3, 'BONIFICACION', '100', NULL, '1541545277531', '1541545277531', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 23:01:17', '2018-11-06 23:01:17', NULL),
(23, 3, 'BONIFICACION', '100', NULL, '1541545363532', '1541545363532', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 23:02:43', '2018-11-06 23:02:43', NULL),
(24, 3, 'BONIFICACION', '100', NULL, '1541545400533', '1541545400533', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 23:03:20', '2018-11-06 23:03:20', NULL),
(25, 3, 'BONIFICACION', '100', NULL, '1541545915534', '1541545915534', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-06 23:11:55', '2018-11-06 23:11:55', NULL),
(28, 3, 'BONIFICACION', '200', NULL, '1541547297534', '1541547297534', 'BONIFICACION RECARGA 1%  eeee', 'APROBADA', '2018-11-06 23:34:57', '2018-11-06 23:34:57', NULL),
(30, 3, 'BONIFICACION', '200', NULL, '1541547388534', '1541547388534', 'BONIFICACION RECARGA 1%  eeee', 'APROBADA', '2018-11-06 23:36:28', '2018-11-06 23:36:28', NULL),
(31, 3, 'PAGO', '20000', NULL, 'rec_1541549068-28', '1079860680', 'BALOTO', 'APROBADA', '2018-11-07 00:05:12', '2018-11-07 00:05:12', NULL),
(32, 3, 'BONIFICACION', '100', NULL, '1541611541536', '1541611541536', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2018-11-07 17:25:41', '2018-11-07 17:25:41', NULL),
(51, 1, 'BONIFICACION', '100', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-11-08 22:06:55', '2018-12-11 16:18:07', NULL),
(52, 1, 'BONIFICACION', '100', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-11-13 21:50:43', '2018-12-11 16:18:07', NULL),
(53, 1, 'BONIFICACION', '100', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-11-13 22:25:32', '2018-12-11 16:18:07', NULL),
(54, 1, 'BONIFICACION', '100', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-11-13 22:36:01', '2018-12-11 16:18:07', NULL),
(55, 5, 'PAGO', '200000', NULL, 'rec_1542397323-34', '844992355', 'EFECTY', 'APROBADA', '2018-11-16 19:42:18', '2018-11-16 19:42:18', NULL),
(56, 1, 'BONIFICACION', '2000', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-11-16 19:44:37', '2018-12-11 16:18:07', NULL),
(57, 555, 'PAGO', '20000', NULL, 'rec_1542638694-54', '845002731', 'BALOTO', 'APROBADA', '2018-11-19 14:45:06', '2018-11-19 14:45:06', NULL),
(58, 5, 'BONIFICACION', '100', NULL, 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-11-21 21:18:49', '2018-12-11 03:43:05', NULL),
(59, 5, 'BONIFICACION', '100', NULL, 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-11-21 21:20:38', '2018-12-11 03:43:05', NULL),
(60, 2, 'BONIFICACION', '100', NULL, '1543595998560', '1543595998560', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-11-30 16:39:58', '2018-11-30 16:39:58', NULL),
(61, 2, 'BONIFICACION', '100', NULL, '1543596367561', '1543596367561', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-11-30 16:46:07', '2018-11-30 16:46:07', NULL),
(62, 1, 'BONIFICACION', '100', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-11-30 16:51:32', '2018-12-11 16:18:07', NULL),
(63, 1, 'BONIFICACION', '100', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-11-30 20:43:19', '2018-12-11 16:18:07', NULL),
(64, 568, 'PAGO', '20000', NULL, 'rec_1545167261-41', '198847441', 'VISA', 'APROBADA', '2018-12-03 04:49:53', '2018-12-18 21:11:01', NULL),
(65, 568, 'BONIFICACION', '100', NULL, 'rec_1545167261-41', '198847441', 'VISA', 'APROBADA', '2018-12-03 04:57:55', '2018-12-18 21:11:01', NULL),
(67, 5, 'BONIFICACION', '200', NULL, 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-12-04 21:37:13', '2018-12-11 03:43:05', NULL),
(68, 5, 'BONIFICACION', '200', NULL, 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-12-04 21:37:48', '2018-12-11 03:43:05', NULL),
(69, 5, 'BONIFICACION', '200', NULL, 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-12-04 21:37:53', '2018-12-11 03:43:05', NULL),
(85, 5, 'PAGO', '250', NULL, 'rec_1544481781-01', '845079016', 'EFECTY', 'APROBADA', '2018-12-04 22:46:19', '2018-12-11 03:43:05', NULL),
(86, 1, 'BONIFICACION', '200', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-12-10 22:58:58', '2018-12-11 16:18:07', NULL),
(87, 5, 'PAGO', '20000', NULL, 'rec_1544483073-33', '845079024', 'EFECTY', 'APROBADA', '2018-12-10 23:00:39', '2018-12-11 04:04:47', NULL),
(88, 1, 'BONIFICACION', '200', NULL, 'rec_1544545084-04', '845080651', 'EFECTY', 'APROBADA', '2018-12-10 23:06:29', '2018-12-11 16:18:07', NULL),
(89, 5, 'PAGO', '20000', NULL, 'rec_1544483204-46', '845079025', 'EFECTY', 'RECHAZADA', '2018-12-10 23:06:54', '2018-12-11 04:07:05', NULL),
(90, 565, 'BONIFICACION', '100', NULL, '1544483746570', '1544483746570', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-12-10 23:15:46', '2018-12-10 23:15:46', NULL),
(91, 2, 'BONIFICACION', '100', NULL, '1544484108571', '1544484108571', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2018-12-10 23:21:48', '2018-12-10 23:21:48', NULL),
(92, 5, 'PAGO', '21000', NULL, 'rec_1544545427-56', '845080656', 'BALOTO', 'APROBADA', '2018-12-11 16:24:00', '2018-12-11 16:26:40', NULL),
(93, 1, 'BONIFICACION', '210', NULL, 'rec_1545153423-03', '198764146', 'BALOTO', 'APROBADA', '2018-12-11 16:26:40', '2018-12-18 17:18:02', NULL),
(94, 1, 'PAGO', '20000', NULL, 'rec_1545153993-33', '198768005', 'BALOTO', 'APROBADA', '2018-12-18 17:26:38', '2018-12-18 17:27:52', NULL),
(95, 1, 'PAGO', '20000', NULL, 'rec_1545154160-20', '198769035', 'BALOTO', 'APROBADA', '2018-12-18 17:29:45', '2018-12-18 17:30:33', NULL),
(96, 555, 'PAGO', '20000', NULL, 'rec_1545161899-19', '198816692', 'BALOTO', 'RECHAZADA', '2018-12-18 19:38:23', '2018-12-18 19:39:04', NULL),
(97, 555, 'PAGO', '15000', '0.00', '1500000', '', '', 'REGISTRADA', '2018-12-18 19:57:54', '2019-03-07 19:51:27', NULL),
(98, 5, 'PAGO', '20000', NULL, 'rec_1545169141-01', '198857066', 'BALOTO', 'APROBADA', '2018-12-18 21:39:04', '2018-12-18 21:51:51', NULL),
(99, 1, 'BONIFICACION', '200', NULL, '15451695175', '15451695175', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:45:17', '2018-12-18 21:45:17', NULL),
(100, 1, 'BONIFICACION', '200', NULL, '15451696745', '15451696745', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:47:54', '2018-12-18 21:47:54', NULL),
(101, 1, 'BONIFICACION', '200', NULL, '15451696775', '15451696775', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:47:57', '2018-12-18 21:47:57', NULL),
(102, 1, 'BONIFICACION', '200', NULL, '15451697625', '15451697625', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:49:22', '2018-12-18 21:49:22', NULL),
(103, 1, 'BONIFICACION', '200', NULL, '15451699115', '15451699115', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.adrian', 'REGISTRADA', '2018-12-18 21:51:51', '2018-12-18 21:51:51', NULL),
(104, 5, 'PAGO', '15000', '0.00', '400000', '', '', 'REGISTRADA', '2018-12-18 22:43:34', '2019-03-07 18:52:13', NULL),
(105, 1, 'BONIFICACION', '100', NULL, '1548781210575', '1548781210575', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2019-01-29 17:00:10', '2019-01-29 17:00:10', NULL),
(106, 571, 'BONIFICACION', '100', NULL, '1548900578576', '1548900578576', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2019-01-31 02:09:38', '2019-01-31 02:09:38', NULL),
(107, 576, 'PAGO', '20000', NULL, 'rec_1548900704-44', '845316189', 'BALOTO', 'APROBADA', '2019-01-31 02:11:47', '2019-01-31 02:14:01', NULL),
(108, 571, 'BONIFICACION', '200', NULL, '1548900841576', '1548900841576', 'BONIFICACION RECARGA 1%  EDGAR AREANDINA', 'REGISTRADA', '2019-01-31 02:14:01', '2019-01-31 02:14:01', NULL),
(109, 576, 'PAGO', '21000', NULL, 'rec_1548900845-10', '845316190', 'EFECTY', 'APROBADA', '2019-01-31 02:14:26', '2019-01-31 02:15:07', NULL),
(110, 571, 'BONIFICACION', '210', NULL, '1548900907576', '1548900907576', 'BONIFICACION RECARGA 1%  EDGAR AREANDINA', 'REGISTRADA', '2019-01-31 02:15:07', '2019-01-31 02:15:07', NULL),
(111, 576, 'PAGO', '20000', NULL, 'rec_1548900913-13', '845316191', 'BALOTO', 'APROBADA', '2019-01-31 02:16:24', '2019-01-31 02:16:51', NULL),
(112, 571, 'BONIFICACION', '200', NULL, '1548901011576', '1548901011576', 'BONIFICACION RECARGA 1%  EDGAR AREANDINA', 'REGISTRADA', '2019-01-31 02:16:51', '2019-01-31 02:16:51', NULL),
(113, 576, 'PAGO', '120000', NULL, 'rec_1548901024-63', '845316192', 'BALOTO', 'APROBADA', '2019-01-31 02:19:48', '2019-01-31 02:20:22', NULL),
(114, 571, 'BONIFICACION', '1200', NULL, '1548901222576', '1548901222576', 'BONIFICACION RECARGA 1%  EDGAR AREANDINA', 'REGISTRADA', '2019-01-31 02:20:22', '2019-01-31 02:20:22', NULL),
(115, 576, 'PAGO', '20000', NULL, 'rec_1548901501-01', '845316194', 'BALOTO', 'APROBADA', '2019-01-31 02:25:04', '2019-01-31 02:25:32', NULL),
(116, 576, 'PAGO', '20000', NULL, 'rec_1548901677-57', '845316197', 'BALOTO', 'APROBADA', '2019-01-31 02:28:01', '2019-01-31 02:28:28', NULL),
(117, 576, 'PAGO', '20000', NULL, 'rec_1548901819-19', '845316198', 'BALOTO', 'APROBADA', '2019-01-31 02:30:31', '2019-01-31 02:31:00', NULL),
(118, 571, 'BONIFICACION', '200', NULL, '1548901860576', '1548901860576', 'BONIFICACION RECARGA 1%  EDGAR AREANDINA', 'REGISTRADA', '2019-01-31 02:31:00', '2019-01-31 02:31:00', NULL),
(119, 555, 'PAGO', '20000', '20000.00', 'rec-1551459340-40', 'rec-1551459340-40', '', 'APROBADA', '2019-03-01 16:55:40', '2019-03-01 16:55:40', NULL),
(120, 555, 'PAGO', '600000', '600000.00', 'rec-1551464179-19', 'rec-1551464179-19', '', 'APROBADA', '2019-03-01 18:16:19', '2019-03-01 18:16:19', NULL),
(121, 571, 'PAGO', '200000', '200000.00', 'rec-1551699086-26', 'rec-1551699086-26', '', 'APROBADA', '2019-03-04 11:31:26', '2019-03-04 11:31:26', NULL),
(122, 2, 'BONIFICACION', '2000', NULL, '1551699086571', '1551699086571', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.mhan', 'REGISTRADA', '2019-03-04 11:31:26', '2019-03-04 11:31:26', NULL),
(123, 571, 'PAGO', '20000', '20000.00', 'rec-1551699388-28', 'rec-1551699388-28', '', 'APROBADA', '2019-03-04 11:36:28', '2019-03-04 11:36:28', NULL),
(124, 2, 'BONIFICACION', '200', NULL, '1551699388571', '1551699388571', 'BONIFICACION RECARGA 1%  edgar.guzman.vargas.mhan', 'REGISTRADA', '2019-03-04 11:36:28', '2019-03-04 11:36:28', NULL),
(125, 555, 'PAGO', '20000', '20000.00', 'rec-1551699453-33', 'rec-1551699453-33', '', 'APROBADA', '2019-03-04 11:37:33', '2019-03-04 11:37:33', NULL),
(126, 555, 'BONIFICACION', '15000', '0.00', '1500000', '1551712515577', 'BONIFICACION REGISTRO REFERIDO ', 'REGISTRADA', '2019-03-04 15:15:15', '2019-03-07 19:51:27', NULL),
(128, 555, 'BONIFICACION', '15000', '0.00', '1500000', '1551715691577', 'BONIFICACION RECARGA 1%  Edgar outlook', 'REGISTRADA', '2019-03-04 16:08:11', '2019-03-07 19:51:27', NULL),
(130, 578, 'PAGO', '20000', '20000.00', 'rec_1551967123-43', '546464', 'Transferencia bancaria', 'APROBADA', '2019-03-07 13:58:51', '2019-03-07 14:03:43', NULL),
(133, 578, 'PAGO', '20000', '20000.00', 'rec-1551967692-12', 'rec-1551967692-12', '', 'APROBADA', '2019-03-07 14:08:12', '2019-03-07 14:08:12', NULL),
(135, 555, 'PAGO', '20000', '20000.00', 'rec_1551967776-36', '65465465465', 'Transferencia bancaria', 'APROBADA', '2019-03-07 14:10:14', '2019-03-07 21:53:54', '135/pago_recarga.pdf'),
(136, 578, '', '20000', NULL, '1551968519578', '1551968519578', 'RECARGA GRATIS', 'APROBADA', '2019-03-07 14:21:59', '2019-03-07 14:21:59', NULL),
(137, 578, '', '20000', NULL, '1551968532578', '1551968532578', 'RECARGA GRATIS', 'APROBADA', '2019-03-07 14:22:12', '2019-03-07 14:22:12', NULL),
(138, 578, 'PAGO', '20000', '20000.00', '25000', '', '', 'REGISTRADA', '2019-03-07 14:35:42', '2019-03-18 15:18:47', NULL),
(139, 578, 'PAGO', '20000', '20000.00', 'rec_1551970416-36', '654646546464', 'Transferencia bancaria', 'APROBADA', '2019-03-07 14:54:15', '2019-03-07 18:44:21', '139/pago_recarga.pdf'),
(140, 578, 'PAGO', '20000', '20000.00', 'rec_1551970739-59', '0123456789', 'Transferencia bancaria', 'APROBADA', '2019-03-07 14:59:08', '2019-03-07 21:08:05', '140/pago_recarga.pdf'),
(141, 578, 'PAGO', '20000', '20000.00', 'rec_1551970773-33', '0188888', 'Transferencia bancaria', 'APROBADA', '2019-03-07 15:11:15', '2019-03-07 15:12:07', '141/pago_recarga.pdf'),
(143, 578, 'PAGO', '20000', '20000.00', 'rec_1551973195-55', '0565656565', 'Transferencia bancaria', 'APROBADA', '2019-03-07 15:40:02', '2019-03-07 18:45:14', '143/pago_recarga.pdf'),
(144, 578, 'PAGO', '20000', '20000.00', 'rec-1551973226-26', 'rec-1551973226-26', '', 'APROBADA', '2019-03-07 15:40:26', '2019-03-07 15:40:26', NULL),
(148, 578, 'PAGO', '20000', '20000.00', 'rec-1551984427-07', 'rec-1551984427-07', '', 'APROBADA', '2019-03-07 18:47:07', '2019-03-07 18:47:07', NULL),
(150, 578, 'PAGO', '20000', '20000.00', 'rec-1551984502-22', 'rec-1551984502-22', '', 'APROBADA', '2019-03-07 18:48:22', '2019-03-07 18:48:22', NULL),
(153, 555, 'PAGO', '20000', '20000.00', 'rec_1552073653-13', '545644', 'Transferencia bancaria', 'APROBADA', '2019-03-08 19:35:16', '2019-03-08 19:40:08', '153/pago_recarga.pdf'),
(154, 568, 'PAGO', '20000', '20000.00', 'rec_1552074293-53', '1234', 'Transferencia bancaria', 'PENDIENTE APROBACION', '2019-03-08 19:45:16', '2019-03-08 19:48:27', NULL),
(155, 568, 'PAGO', '20000', '20000.00', 'rec_1552074343-43', 'rec_1552074343-43', 'Pago en efectivo', 'PENDIENTE', '2019-03-08 19:48:48', '2019-03-08 19:48:48', NULL),
(156, 578, 'PAGO', '20000', '20000.00', 'rec-1552074845-05', 'rec-1552074845-05', '', 'APROBADA', '2019-03-08 19:54:05', '2019-03-08 19:54:05', NULL),
(158, 578, 'PAGO', '20000', '20000.00', 'rec-1552074858-18', 'rec-1552074858-18', '', 'APROBADA', '2019-03-08 19:54:18', '2019-03-08 19:54:18', NULL),
(160, 578, 'PAGO', '100000', '80000.00', 'rec_1552074911-11', '012121212121', 'Transferencia bancaria', 'APROBADA', '2019-03-08 19:55:20', '2019-03-18 14:56:32', '160/pago_recarga.pdf'),
(161, 578, 'PAGO', '20000', '20000.00', 'rec-1552075015-55', 'rec-1552075015-55', '', 'APROBADA', '2019-03-08 19:56:55', '2019-03-08 19:56:55', NULL),
(163, 555, '', '20000', NULL, '1552329076555', '1552329076555', 'RECARGA GRATIS', 'APROBADA', '2019-03-11 17:31:16', '2019-03-11 17:31:16', NULL),
(164, 576, 'BONIFICACION', '100', NULL, '1552572191579', '1552572191579', 'BONIFICACION REGISTRO REFERIDO ', 'APROBADA', '2019-03-14 14:03:11', '2019-03-14 14:03:11', NULL),
(165, 555, '', '5000', '0.00', '1552576888555', '1552576888555', 'RECARGA GRATIS', 'APROBADA', '2019-03-14 14:21:28', '2019-03-14 14:21:28', NULL),
(166, 578, '', '5000', '0.00', '1552577123578', '1552577123578', 'RECARGA GRATIS', 'APROBADA', '2019-03-14 14:25:23', '2019-03-14 14:25:23', NULL),
(167, 576, '', '5000', '0.00', '1552577197576', '1552577197576', 'RECARGA GRATIS', 'APROBADA', '2019-03-14 14:26:37', '2019-03-14 14:26:37', NULL),
(168, 555, 'PAGO', '20000', '20000.00', 'rec_1552671978-18', 'rec_1552671978-18', 'Transferencia bancaria', 'PENDIENTE', '2019-03-15 17:46:23', '2019-03-15 16:46:23', NULL),
(170, 578, 'PAGO', '40000', '20000.00', 'rec_1552924791-51', 'rec_1552924791-51', 'Pago en efectivo', 'APROBADA', '2019-03-18 16:00:12', '2019-03-18 15:01:39', NULL),
(172, 578, '', '20000', '0.00', '1552924948578', '1552924948578', 'RECARGA GRATIS', 'APROBADA', '2019-03-18 15:02:28', '2019-03-18 15:02:28', NULL),
(173, 578, 'PAGO', '40000', '33080.00', 'rec_1552924952-32', '21321321313131', 'Consignacion bancaria', 'APROBADA', '2019-03-18 16:02:48', '2019-03-18 15:04:24', '173/pago_recarga.pdf'),
(175, 578, 'PAGO', '25000', '5020.00', 'rec_1552925073-33', '02032321321', 'Transferencia bancaria', 'APROBADA', '2019-03-18 16:18:56', '2019-03-18 15:26:28', '175/pago_recarga.pdf'),
(177, 578, 'PAGO', '20000', '20000.00', 'rec_1552926426-06', 'rec_1552926426-06', 'Pago en efectivo', 'APROBADA', '2019-03-18 16:27:50', '2019-03-18 15:28:15', NULL),
(179, 578, 'PAGO', '20000', '33080.00', 'rec_1552926426-06', '5464654654654', 'Consignacion bancaria', 'APROBADA', '2019-03-18 16:28:21', '2019-03-18 15:30:57', '179/pago_recarga.pdf'),
(181, 578, 'PAGO', '20000', '33080.00', 'rec_1552926672-12', '7879878798', 'Consignacion bancaria', 'APROBADA', '2019-03-18 16:31:55', '2019-03-18 15:51:33', '181/pago_recarga.png'),
(184, 578, 'PAGO', '20000', '33080.00', 'rec_1552927922-02', '546546546', 'Consignacion bancaria', 'APROBADA', '2019-03-18 17:04:20', '2019-03-18 16:09:52', '184/pago_recarga.png'),
(186, 555, '', '5000', '0.00', '1553008026555', '1553008026555', 'RECARGA GRATIS', 'APROBADA', '2019-03-19 14:07:06', '2019-03-19 14:07:06', NULL),
(187, 555, 'PAGO', '20000', '33080.00', 'rec_1553008094-14', '0118032019-6', 'Consignacion bancaria', 'APROBADA', '2019-03-19 15:08:48', '2019-03-19 14:12:53', '187/pago_recarga.jpg');

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
(29, 2, 571, '2018-12-10 23:21:48', '0000-00-00 00:00:00'),
(30, 1, 575, '2019-01-31 02:08:09', '0000-00-00 00:00:00'),
(31, 571, 576, '2019-01-31 02:09:38', '0000-00-00 00:00:00'),
(34, 576, 579, '2019-03-14 14:03:11', '0000-00-00 00:00:00');

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
(3, 573, 'App\\User'),
(3, 574, 'App\\User'),
(3, 575, 'App\\User'),
(3, 576, 'App\\User'),
(3, 578, 'App\\User'),
(3, 579, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `transactionId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionStatePayU` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `transactionState` enum('Pendiente','Pago Aceptado','Moneda Envíada','Moneda Recibida','Pago hecho al anunciante','Transacción Finalizada','Visto','Pago confirmado por el anunciante') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Visto',
  `transactionQuantity` decimal(10,2) NOT NULL,
  `transation_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_value_pagado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_sobre_costo` decimal(10,2) DEFAULT 0.00,
  `pay_value` decimal(10,2) DEFAULT NULL,
  `id_anuncio` int(11) UNSIGNED NOT NULL,
  `id_user_compra` int(11) UNSIGNED NOT NULL,
  `metodo_pago` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_pago` enum('APROBADA','PENDIENTE','RECHAZADA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDIENTE',
  `calificacion` int(10) DEFAULT NULL,
  `opinion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `code_wallet` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT 'SIN REGISTRAR',
  `image_wallet` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT 'SIN REGISTRAR',
  `hash_txid` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT 'SIN REGISTRAR',
  `moneda_pago` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `porcentaje_pago` decimal(10,2) DEFAULT NULL,
  `numero_transaccion` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificado_pago` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`id`, `transactionId`, `transactionStatePayU`, `transactionState`, `transactionQuantity`, `transation_value`, `transaction_value_pagado`, `valor_sobre_costo`, `pay_value`, `id_anuncio`, `id_user_compra`, `metodo_pago`, `estado_pago`, `calificacion`, `opinion`, `created_at`, `updated_at`, `code_wallet`, `image_wallet`, `hash_txid`, `moneda_pago`, `porcentaje_pago`, `numero_transaccion`, `certificado_pago`) VALUES
(30, 'V1-90-1551466493-1', '4', 'Moneda Envíada', '0.11', '1500000', '1500000', '0.00', NULL, 90, 555, 'Pago en efectivo', 'APROBADA', NULL, NULL, '2019-03-01 18:59:22', '2019-03-07 19:00:02', 'uyiuyiuyiuyiuyuyiuy', '30/wallet.pdf', 'gfkfkfkfkfkfgfkgfkgfkgfkgfkgfkhgkgfkfluññliuñjhñkutlgljhgl', 'COP', NULL, NULL, NULL),
(31, 'V2-82-1551730443-0', '0', 'Pendiente', '2.68', '400000', '400000', '0.00', NULL, 82, 571, 'Pago en efectivo', '', NULL, NULL, '2019-03-01 19:01:54', '2019-03-04 20:15:38', '465465465465465465465465465', '31/wallet.pdf', 'SIN REGISTRAR', NULL, NULL, NULL, NULL),
(32, 'V4-106-1551466890-9', '0', 'Pendiente', '142.86', '10000', '10000', '0.00', NULL, 106, 571, 'Pago en efectivo', '', NULL, NULL, '2019-03-01 19:02:12', '2019-03-01 19:02:14', 'SIN REGISTRAR', '32/wallet.pdf', 'SIN REGISTRAR', NULL, NULL, NULL, NULL),
(34, 'V2-103-1551730443-8', '4', 'Pago Aceptado', '0.62', '90000', '90000', '0.00', NULL, 103, 571, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-04 20:15:50', '2019-03-04 20:21:17', 'uhuhuhuhuhuhuhuhuh', 'SIN REGISTRAR', 'SIN REGISTRAR', 'COP', NULL, '02544545454', NULL),
(35, 'V31-136-1551788414-0', '4', 'Pago Aceptado', '487.96', '30000', '30000', '0.00', NULL, 136, 555, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-04 20:27:02', '2019-03-05 12:32:16', 'SIN REGISTRAR', '35/wallet.pdf', 'SIN REGISTRAR', 'COP', NULL, '06666', '35/pago.pdf'),
(36, 'V2-82-1551965376-0', '4', 'Pago Aceptado', '2.28', '400000', '400000', '0.00', NULL, 82, 578, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-07 13:24:34', '2019-03-07 13:36:23', 'SIN REGISTRAR', '36/wallet.jpg', 'SIN REGISTRAR', 'COP', NULL, '5654654646546', '36/pago.pdf'),
(37, 'V2-103-1551965376-8', '4', 'Pago confirmado por el anunciante', '0.45', '79500', '79500', '0.00', NULL, 103, 578, 'Pago en efectivo', 'APROBADA', NULL, NULL, '2019-03-07 13:30:00', '2019-03-04 13:56:25', '46546546464646', '37/wallet.pdf', '87854654654654646464', 'COP', '5.00', NULL, NULL),
(39, 'V1-90-1551969228-30', '0', 'Pendiente', '0.11', '1500000', '1470000', '0.00', NULL, 90, 578, 'Pago en efectivo', '', NULL, NULL, '2019-03-07 14:31:17', '2019-03-07 14:35:57', '2EIZGX', 'SIN REGISTRAR', 'SIN REGISTRAR', NULL, NULL, NULL, NULL),
(40, 'V4-106-1551973678-9', '4', 'Moneda Envíada', '142.86', '10000', '10000', '0.00', NULL, 106, 578, 'Pago en efectivo', 'APROBADA', NULL, NULL, '2019-03-07 15:48:13', '2019-03-07 20:34:03', 'SIN REGISTRAR', 'SIN REGISTRAR', '54646464646464', 'COP', NULL, NULL, NULL),
(41, 'V2-82-1551984517-0', '0', 'Pendiente', '2.24', '400000', '370000', '0.00', NULL, 82, 5, 'Transferencia bancaria', '', NULL, NULL, '2019-03-07 18:48:46', '2019-03-07 18:52:24', 'SIN REGISTRAR', 'SIN REGISTRAR', 'SIN REGISTRAR', NULL, NULL, NULL, NULL),
(42, 'V25-71-1551997074-0', '4', 'Pago confirmado por el anunciante', '0.46', '100', '100', '0.00', NULL, 71, 555, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-07 19:51:00', '2019-03-07 22:30:18', '898123456789789585856565', '42/wallet.pdf', 'gdhgsjhg<chgkhgckhgkhgkjhkkjhkjfhgfgfgfgfg', 'COP', '5.00', '02598985656565', '42/pago.pdf'),
(43, 'V2-82-1551991309-0', '4', 'Pago confirmado por el anunciante', '2.24', '400000', '400000', '0.00', NULL, 82, 578, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-07 20:36:24', '2019-03-07 20:49:49', '87987987987987987', 'SIN REGISTRAR', 'kdjgñjcvjhcvkjzchvkjhcbvkjhcbvñjzñcbjhañcbjhñcjvbhñzbnñzb', 'COP', '5.00', '65465465465', '43/pago.pdf'),
(44, 'V25-71-1551999279-0', '4', 'Pago confirmado por el anunciante', '0.46', '100', '100', '0.00', NULL, 71, 555, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-07 22:54:44', '2019-03-07 23:01:59', '654654654654654', '44/wallet.pdf', '021212121', 'COP', '5.00', '122222', '44/pago.pdf'),
(45, NULL, '0', 'Visto', '0.44', '79000', NULL, '0.00', NULL, 103, 568, '', '', NULL, NULL, '2019-03-08 19:40:19', NULL, 'SIN REGISTRAR', 'SIN REGISTRAR', 'SIN REGISTRAR', NULL, NULL, NULL, NULL),
(46, 'V2-82-1552074818-0', '0', 'Pendiente', '2.25', '400000', '400000', '0.00', NULL, 82, 568, 'Pago en efectivo', '', NULL, NULL, '2019-03-08 19:53:57', '2019-03-08 19:57:32', '1234', 'SIN REGISTRAR', 'SIN REGISTRAR', NULL, NULL, NULL, NULL),
(47, 'V2-103-1552075103-8', '4', 'Pago confirmado por el anunciante', '0.50', '90000', '90000', '0.00', NULL, 103, 578, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-08 19:59:12', '2019-03-08 20:15:53', '1236874', '47/wallet.pdf', 'UIUIUIUIUIUIHGJHGJHGKJKHJHKJHKJHKJHKHHKJHK', 'COP', '5.10', '0125989889887874', '47/pago.pdf'),
(48, 'V2-82-1553007826-0', '4', 'Moneda Envíada', '2.42', '450000', '450000', '14800.00', NULL, 82, 578, 'Consignacion bancaria', 'APROBADA', NULL, NULL, '2019-03-18 15:59:43', '2019-03-19 14:20:09', '654654654654', 'SIN REGISTRAR', 'HaGskdbslssbhsnslsbsdsb', 'COP', NULL, '546546546546464', '48/pago.jpg'),
(49, 'V2-82-1553008900-0', '4', 'Pago Aceptado', '2.18', '405000', '360450', '1442.00', NULL, 82, 578, 'Transferencia bancaria', 'PENDIENTE', NULL, NULL, '2019-03-19 15:22:11', '2019-03-19 14:27:34', 'SIN REGISTRAR', 'SIN REGISTRAR', 'SIN REGISTRAR', 'COP', NULL, '779879879879879879798798', '49/pago.jpg'),
(50, 'V2-103-1553009710-8', '4', 'Transacción Finalizada', '0.42', '79500', '70755', '283.00', NULL, 103, 578, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-19 15:35:34', '2019-03-19 14:51:18', '46546546465', '50/wallet.jpg', 'Hahshshshsds', 'COP', NULL, '6465465465465464', '50/pago.jpg'),
(51, 'V2-82-1553014389-0', '4', 'Transacción Finalizada', '2.15', '400000', '400000', '14600.00', NULL, 82, 578, 'Consignacion bancaria', 'APROBADA', NULL, NULL, '2019-03-19 16:55:15', '2019-03-19 16:27:58', 'SDGFSADFGAF', 'SIN REGISTRAR', 'Hahahahahahahshassh', 'COP', NULL, '999999999999999', '51/pago.jpg'),
(52, 'V2-103-1553014867-8', '4', 'Pago Aceptado', '0.42', '79000', '79000', '316.00', NULL, 103, 578, 'Transferencia bancaria', 'APROBADA', NULL, NULL, '2019-03-19 16:58:27', '2019-03-19 16:09:00', 'ZDFHDFHFHHVBVB', '52/wallet.jpg', 'SIN REGISTRAR', 'COP', NULL, '666666666666666666666', '52/pago.jpg'),
(53, 'V4-106-1553014774-9', '4', 'Pago hecho al anunciante', '128.68', '10000', '10000', '0.00', NULL, 106, 578, 'Pago en efectivo', 'APROBADA', NULL, NULL, '2019-03-19 17:00:01', '2019-03-19 16:33:31', 'SDGASDGA', '53/wallet.jpg', 'Sh hay hshshssh', 'COP', '1.00', NULL, NULL),
(54, NULL, '0', 'Visto', '0.42', '79000', NULL, '0.00', NULL, 103, 5, '', '', NULL, NULL, '2019-03-19 18:02:57', NULL, 'SIN REGISTRAR', 'SIN REGISTRAR', 'SIN REGISTRAR', NULL, NULL, NULL, NULL);

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
('edgar.devmohan@gmail.com', '$2y$10$WvwxvkNhldJQHFSuZIHc0eWKwgH7NFgHXf1CVeQu3UK34JJA59v4e', '2018-12-11 05:29:46'),
('luisherresa13@gmail.com', '$2y$10$9nUl.nY3hlEIzqRR.DdstuEW3T9U/So.veR3ZNhCuEe4Lrl6sXkuW', '2018-12-18 21:03:45'),
('miguelrios1@hotmail.com', '$2y$10$2HGpUohzydGu0HC7Yzeg5uqdt8CR5wIyBSwfgqFVpwKPfgw4hGqTm', '2018-12-18 21:20:24'),
('edgar.guzman21@gmail.com', '$2y$10$TjLbyZ9bjo6GM7I1qi3c.OZUiI2ztwBQa7YJ7QBxuwM4S4J2d9HvS', '2018-12-31 20:23:54'),
('adrian.vargas.2018@outlook.com', '$2y$10$6pN7XC6G3vT0pmdo.v2fsedXVwE7BUyujWy60dk/sv1VTp1DnBm3y', '2019-03-07 14:12:10'),
('eguzman30@estudiantes.areandina.edu.co', '$2y$10$qUFs585VaWi.pliAFthA/OU88lzk.nffCblCp4pmAxnbARYI.yYuK', '2019-03-14 13:04:56');

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
(1, 'ACTIVA', '9709.00', 1, NULL, '2019-01-29 17:00:10'),
(2, 'ACTIVA', '21800.00', 2, NULL, '2019-03-04 11:36:28'),
(3, 'ACTIVA', '17899.00', 3, NULL, NULL),
(43, 'ACTIVA', '353700.00', 5, '2018-11-13 05:00:00', '2018-12-18 21:51:51'),
(44, 'ACTIVA', '701950.00', 555, '2018-11-16 22:12:45', '2019-03-19 14:12:53'),
(52, 'ACTIVA', '0.00', 563, '2018-12-01 00:40:51', '2018-12-01 00:40:51'),
(53, 'ACTIVA', '0.00', 564, '2018-12-01 01:05:25', '2018-12-01 01:05:25'),
(54, 'AGOTADA', '-200.00', 565, '2018-12-01 01:22:18', '2019-01-31 18:24:07'),
(57, 'ACTIVA', '18200.00', 568, '2018-12-03 09:48:52', '2018-12-18 21:11:01'),
(58, 'AGOTADA', '0.00', 569, '2018-12-03 09:57:55', '2019-03-07 14:14:40'),
(60, 'ACTIVA', '219710.00', 571, '2018-12-11 04:21:49', '2019-03-04 11:36:28'),
(61, 'ACTIVA', '0.00', 573, '2018-12-18 21:22:15', '2018-12-18 21:22:15'),
(62, 'ACTIVA', '0.00', 575, '2019-01-29 17:00:15', '2019-01-29 17:00:15'),
(63, 'ACTIVA', '246100.00', 576, '2019-01-31 02:09:42', '2019-03-14 14:26:37'),
(65, 'ACTIVA', '610000.00', 578, '2019-03-07 12:58:04', '2019-03-18 16:09:52'),
(66, 'ACTIVA', '0.00', 579, '2019-03-14 13:03:13', '2019-03-14 13:03:13');

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
  `calificacion` int(11) NOT NULL DEFAULT 3,
  `num_calificaciones` int(11) NOT NULL DEFAULT 1,
  `cuenta_bancaria` varchar(192) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificacion_bancaria` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `costo_clic`, `confirmado`, `codigo_referido`, `remember_token`, `created_at`, `updated_at`, `calificacion`, `num_calificaciones`, `cuenta_bancaria`, `certificacion_bancaria`, `estado`) VALUES
(1, 'Heriberto Valencia', '3014751', 'prueba@metalbit.co', '$2y$10$oX30Ts4767sRvW3PD/CRGe3YhYZ.XqTVDXIQJU4NkR4eRPOk5.OK6', '0.00', 'SI', 525, 'foHnT1Mudd2jBNnOWpvsXeKLcEfJ4qU8ax8mccXh22VC2ZtP6cx18CTOWGxv', '2018-08-09 04:02:48', '2019-03-07 18:47:38', 36, 10, NULL, NULL, '1'),
(2, 'Bruno Valenica', '123456', 'bruno@gmail.com', '$2y$10$wDjYL1KFNql.03tvWn/Vce/dIqSfWmsJ5X4aJq42bHTynnZS/DTTG', '300.00', 'SI', 526, 'c8Oxuh8Q7BF0ATONGnlmOajDJzh9FXMjUwG3Yf8NIaIbS8bklSrncuPkKFST', '2018-08-09 04:02:48', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(3, 'David Cabrera', '3147684576', 'cabrera.davidf@gmail.com', '$2y$10$P72/hwGX/cscp.IyGsWWSun9i.RwMvre1XtxBfbLTEUqc3COAs4/i', '300.00', 'SI', 535, 'qnrczWP8IjEsgCyPbQriJRQMzjhQKxfzYi5G9LdcNC04IlRPUJ65TBgjRcfP', '2018-10-27 01:27:14', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(5, 'edgar gmail', '73232504', 'edgar.guzman21@gmail.com', '$2y$10$enPRe5F0VI.SurAGdWHxruhne2FvsBMg6j5up06xY9d1RHhAqFZkK', '300.00', 'SI', 539, 'GdyXcqJVNVmBAu9YOcOWfsN0A3L4JWWjkA1g6nc3reMk4BbYvJOYdkwfAnDH', '2018-11-14 03:36:01', '2019-03-07 14:02:40', 28, 9, NULL, NULL, '1'),
(554, 'miguelrios', '3165287824', 'miguel.rios@prismaweb.ne\r\n', '$2y$10$1BdagLqcENUvaqroFCINXOs.6h8B8Vf20f/Yuv5J8Jvch/RP4e/Je', '300.00', 'SI', 538, NULL, '2018-10-31 01:23:35', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(555, 'Edi samuel', '123489544', 'adrian.vargas.2018@outlook.com', '$2y$10$XoCCXoj5zEU7FTpLNiES8uLZLPeOLniPEqILKlURW.hsWNFfpVcvu', '300.00', 'SI', 540, 'krcEe16yJ9qre5EUO9JimealDqMi07USVeqRzCME0avU42t0jv6nyCHM7iFu', '2018-11-16 22:12:37', '2019-03-19 16:33:31', 95, 35, '0000222222', '/archivos/certificaciones/555.pdf', '1'),
(563, 'Heriberot valencia', '12345644', 'hvhvalenci@gmail.com', '$2y$10$91jp7sB4vNni.sdO3GPhIulRO.ua3j6et1FysNR7fB3hc0M4xhpa6', '300.00', 'SI', 548, 'SimxFt1ab3XBSFjhNXEmhMWsJDUQjjznSpN3HgJUg8R0MEurYR9sBRLxMwmr', '2018-12-01 00:40:50', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(564, 'Heriberto Valencia munioz', '123456789', 'heriimperativo@hotmail.com', '$2y$10$5rPVtz9zdkNdtW90BAIVnugTfumvkRHKzU926WkLrG9CF51wL2NwK', '300.00', 'SI', 549, NULL, '2018-12-01 01:05:25', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(565, 'Miguel Rios', '123456789', 'miguelrios1@hotmail.com', '$2y$10$dd44UdniR7pbXbJXlrWNYOrHQV6zUy7iuX95eZeDhVD8liDL7rIRy', '300.00', 'SI', 550, NULL, '2018-12-01 01:22:17', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(568, 'Luis Herrera', '3204296592', 'luisherresa13@gmail.com', '$2y$10$.yZLbqIk630eWvQWJ.TJEeEuKe4PdwoOWON7cOFtLfoIlYEsAay.C', '300.00', 'SI', 553, 'esWtIuqMv3Tahy16HJnoaPBWh1BaXinonOIKAGffNgbAyB3dgudQPeH1mt85', '2018-12-03 09:48:51', '2019-03-07 14:02:40', 12, 4, NULL, NULL, '1'),
(569, 'Luis Salazar', '1234567', 'luisherresa13@hotmail.com', '$2y$10$qBFHDtImJC/DuU94vsu9deKBWj1jv81a/QdGWlviJfGsBnwjeN4gO', '300.00', 'SI', 554, NULL, '2018-12-03 09:57:55', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(571, 'edgar dev mohan', '3158790446', 'edgar.devmohan@gmaiil.com', '$2y$10$enPRe5F0VI.SurAGdWHxruhne2FvsBMg6j5up06xY9d1RHhAqFZkK', '300.00', 'SI', 556, '8CPURNTvyNVcJgIvxyBTItip4QAJqUfF6B0uV8Su7ixbK8irXFONBjCVAtNT', '2018-12-11 04:21:48', '2019-03-07 14:02:40', 0, 0, '121212121212', NULL, '1'),
(572, 'Soporte Prisma Web', '00000000', 'soporte@prismaweb.net', '$2y$10$VJWee5nsKmIN4BhnfKKntORgbnASufgnz.FCG5cOXog9mswbhq9MS', '300.00', 'SI', 557, NULL, '2018-12-13 15:35:49', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(573, 'Francisco Niño', '3166913626', 'paconino33@hotmail.com', '$2y$10$C7q3ysEtEWGNY4diaqB8pOsa9FapGmfFqVnHPklYJ.syK5w07Z90W', '300.00', 'SI', 558, NULL, '2018-12-18 21:22:15', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(575, 'EDGAR Hotmail 2', '123566666', 'adrian.vargas.2018@hotmail.com.co', '$2y$10$lTcO.GGEBA/Y/uUPK0gCIOxwRSpSQAFQy3KonvfktOBtL.c6nQrvu', '300.00', 'SI', 559, NULL, '2019-01-29 17:00:10', '2019-03-07 14:02:40', 0, 0, NULL, NULL, '1'),
(576, 'EDGAR AREANDINA', '315879642', 'eguzman30@estudiantes.areandina.edu.co', '$2y$10$Xcfk9vbk5UI2OOXN5zSurOd62StQch/6xCxGfC3e5JD6UFHNe9rba', '300.00', 'SI', 560, 'it9JcSNhCLSerbjDzj1e3wpBX9wvTFxxJsyoei48mtR2LlQ0z51p692gs3bZ', '2019-01-31 02:09:37', '2019-03-14 13:07:50', 0, 0, NULL, NULL, '1'),
(578, 'edgar mohan gmail', '3158790445', 'edgar.devmohan@gmail.com', '$2y$10$GBoB1fMYtfk4mDx1x9hIvOAH4TICeMOUfvF16lXU0E3aiSzhkjWdi', '300.00', 'SI', 562, 'r2Ft1j3j2gZMF1HQcrSwoaeHEVmB8oMXAO5gHb4Q9bpIa9UE9UNoagq9AllD', '2019-03-07 12:58:03', '2019-03-07 23:01:59', 13, 3, '0565656565', '/archivos/certificaciones/578.pdf', '1'),
(579, 'Stalin Chacon', '3114461157', 'stalin1@misena.edu.co', '$2y$10$CeIcUm2E/UDwNnRl90S7Aeu0pwLrXABOBRZqeFz/a9jDKNRl6Z3rG', '500.00', 'SI', 563, NULL, '2019-03-14 13:03:11', '2019-03-14 13:03:11', 3, 1, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` int(11) NOT NULL,
  `nombre` varchar(192) NOT NULL,
  `valor` varchar(192) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `nombre`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'porcentaje_tramite', '1', '2018-12-28 01:27:27', '2019-03-14 12:34:19'),
(2, 'cuenta_banco', '821-995486-69', '2019-03-04 23:03:03', '2019-03-04 23:03:03'),
(3, 'nombre_banco', 'Bancolombia S.A', '2019-03-04 23:03:03', '2019-03-04 23:03:03'),
(4, 'url_certificacion', '/archivos/certificaci%C3%B3n_bancaria_Metalbit_SAS.pdf', '2019-03-04 23:03:03', '2019-03-04 23:03:03'),
(5, 'direccion_oficina', 'Calle 114 #53 - 96\r\nBogotá D.C. - Colombia', '2019-03-04 23:03:03', '2019-03-04 23:03:03'),
(6, 'horario_oficina', 'Horario: Lunes a Viernes de 8:00 a.m. - 12:30m y de 1:30 p.m. a 5:00 p.m.', '2019-03-04 23:03:03', '2019-03-04 23:03:03'),
(7, 'precio_clic_default', '500', '2019-03-14 13:31:54', '2019-03-14 13:31:54'),
(8, 'comision_consignacion', '13000', '2019-03-18 15:43:35', '2019-03-18 15:43:35'),
(9, 'pesos_por_mil', '4', '2019-03-18 15:43:35', '2019-03-18 15:43:35');

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
-- Indexes for table `campanias`
--
ALTER TABLE `campanias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupones_campanias`
--
ALTER TABLE `cupones_campanias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_campania` (`id_campania`);

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
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `bonificaciones`
--
ALTER TABLE `bonificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `campanias`
--
ALTER TABLE `campanias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cupones_campanias`
--
ALTER TABLE `cupones_campanias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1864;

--
-- AUTO_INCREMENT for table `detalle_clic_anuncios`
--
ALTER TABLE `detalle_clic_anuncios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `detalle_horario_usuario`
--
ALTER TABLE `detalle_horario_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `detalle_recargas`
--
ALTER TABLE `detalle_recargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `detalle_referidos`
--
ALTER TABLE `detalle_referidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=580;

--
-- AUTO_INCREMENT for table `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_id_anuncio_pago` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user_pago` FOREIGN KEY (`id_user_compra`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recargas`
--
ALTER TABLE `recargas`
  ADD CONSTRAINT `fk_recarga_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
