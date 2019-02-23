-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2019 at 05:09 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tramitadores`
--

-- --------------------------------------------------------

--
-- Table structure for table `campanias`
--

CREATE TABLE `campanias` (
  `id` int(11) NOT NULL,
  `nombre_campania` varchar(256) NOT NULL,
  `tipo_campania` enum('global','personal') NOT NULL,
  `tipo_canje` enum('compra','recarga') NOT NULL,
  `fecha_inicial_vigencia` datetime DEFAULT NULL,
  `fecha_final_vigencia` datetime NOT NULL,
  `numero_de_cupones` int(11) NOT NULL,
  `cupones_disponibles` int(11) NOT NULL,
  `cupones_canjeados` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) DEFAULT NULL,
  `limite_por_usuario` int(11) NOT NULL DEFAULT '1',
  `tipo_de_descuento` enum('porcentaje','valor_neto') NOT NULL DEFAULT 'porcentaje',
  `valor_de_descuento` decimal(10,2) NOT NULL,
  `costo_minimo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `es_acumulable` enum('0','1') NOT NULL DEFAULT '0',
  `estado_campania` enum('ABIERTA','CERRADA') NOT NULL DEFAULT 'ABIERTA',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campanias`
--
ALTER TABLE `campanias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `cupones_campanias`
--
ALTER TABLE `cupones_campanias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `detalle_recargas` ADD `valor_pagado` DECIMAL(10,2) NULL DEFAULT NULL AFTER `valor_recarga`; 
ALTER TABLE `campanias` ADD `moneda_descuento` VARCHAR(256) NOT NULL AFTER `valor_de_descuento`; 
ALTER TABLE `pagos` ADD `pay_value` DECIMAL(10,2) NOT NULL AFTER `transation_value`; 
ALTER TABLE `pagos` CHANGE `pay_value` `pay_value` DECIMAL(10,2) NULL DEFAULT NULL; 