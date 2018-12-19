-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 07:38 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metalbit3`
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
  `criptomoneda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `margen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limite_min` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limite_max` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anuncios`
--

INSERT INTO `anuncios` (`id`, `cod_anuncio`, `tipo_anuncio`, `ubicacion`, `cod_postal`, `localidad`, `departamento`, `ciudad`, `moneda`, `criptomoneda`, `banco`, `margen`, `limite_min`, `limite_max`, `lugar`, `terminos`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '12345tttt', 'venta', '12', '123', '2', '2', '2', 'COP', '5', '1', '1', '1', '1', '1', '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '12345ts', 'compra', '12', '123', '2', '2', '2', 'USD', '4', '1', '1', '1', '1', '1', '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'VENTA_1_1539902938', 'venta', 'GA, EE. UU.', NULL, NULL, 'GA', 'Estados Unidos', 'USD', '1', '123', '0', '123', '123', '123', '123', 2, '2018-10-19 03:48:58', '2018-10-19 03:48:58'),
(4, 'C_1_1539904422', 'compra', 'Canton, MI, EE. UU.', NULL, 'Canton', 'MI', 'Estados Unidos', 'USD', '1', 'www', '0', '123', '124', '123', '1234', 3, '2018-10-19 04:13:42', '2018-10-19 04:13:42'),
(5, 'C_1_1539905176', 'compra', 'Mumbai, Maharastra, India', NULL, 'Mumbai', 'MH', 'India', 'USD', '1', 'Cal', '0', '123', '123', '123', '123', 3, '2018-10-19 04:26:16', '2018-10-19 04:26:16'),
(6, 'C_1_1539905268', 'compra', 'Soacha, Cundinamarca, Colombia', NULL, 'Soacha', 'Cundinamarca', 'Colombia', 'USD', '1', 'qqqq', '0', '123', '123', '123', '123', 3, '2018-10-19 04:27:48', '2018-10-19 04:27:48'),
(7, 'V_18_1539922549', 'venta', 'CA, USA', NULL, NULL, 'CA', 'United States', 'COP', '18', 'bbvva', '0.1', '100', '1200000', 'micasa', 'aaaa', 3, '2018-10-19 09:15:49', '2018-10-19 09:15:49'),
(8, 'C_76_1539926217', 'compra', 'Nueva York, EE. UU.', NULL, NULL, NULL, NULL, 'COP', '76', '123', '02', '1500', '3000', 'll', 'll', 3, '2018-10-19 10:16:57', '2018-10-19 10:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_clic_anuncios`
--

CREATE TABLE `detalle_clic_anuncios` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `costo` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detalle_clic_anuncios`
--

INSERT INTO `detalle_clic_anuncios` (`id`, `id_anuncio`, `id_usuario`, `costo`, `created_at`, `updated_at`) VALUES
(1, 7, 3, '5000.00', '2018-10-19 10:14:13', '2018-10-19 10:14:13'),
(2, 3, 3, '0.00', '2018-10-19 10:14:34', '2018-10-19 10:14:34'),
(3, 2, 3, '-34.00', '2018-10-19 10:14:36', '2018-10-19 10:14:36'),
(4, 1, 3, '-34.00', '2018-10-19 10:14:37', '2018-10-19 10:14:37'),
(5, 3, 3, '0.00', '2018-10-19 10:15:05', '2018-10-19 10:15:05'),
(6, 7, 3, '0.00', '2018-10-19 10:17:30', '2018-10-19 10:17:30'),
(7, 7, 3, '0.00', '2018-10-19 10:18:53', '2018-10-19 10:18:53'),
(8, 3, 3, '0.00', '2018-10-19 10:19:25', '2018-10-19 10:19:25'),
(9, 1, 3, '0.00', '2018-10-19 10:21:21', '2018-10-19 10:21:21'),
(10, 1, 3, '0.00', '2018-10-19 10:21:30', '2018-10-19 10:21:30'),
(11, 4, 3, '0.00', '2018-10-19 10:23:18', '2018-10-19 10:23:18'),
(12, 5, 3, '5000.00', '2018-10-19 10:23:31', '2018-10-19 10:23:31'),
(13, 5, 3, '0.00', '2018-10-19 10:23:33', '2018-10-19 10:23:33'),
(14, 4, 3, '0.00', '2018-10-19 10:24:39', '2018-10-19 10:24:39'),
(15, 7, 3, '0.00', '2018-10-19 10:25:19', '2018-10-19 10:25:19'),
(16, 4, 3, '0.00', '2018-10-19 10:25:24', '2018-10-19 10:25:24'),
(17, 7, 3, '0.00', '2018-10-19 10:28:22', '2018-10-19 10:28:22'),
(18, 5, 3, '5000.00', '2018-10-19 10:28:28', '2018-10-19 10:28:28'),
(19, 5, 3, '5000.00', '2018-10-19 10:28:30', '2018-10-19 10:28:30'),
(20, 5, 3, '0.00', '2018-10-19 10:28:32', '2018-10-19 10:28:32'),
(21, 1, 3, '-34.00', '2018-10-19 10:28:53', '2018-10-19 10:28:53'),
(22, 1, 3, '0.00', '2018-10-19 10:28:55', '2018-10-19 10:28:55'),
(23, 1, 3, '0.00', '2018-10-19 10:29:29', '2018-10-19 10:29:29'),
(24, 2, 3, '-34.00', '2018-10-19 10:29:38', '2018-10-19 10:29:38'),
(25, 2, 3, '0.00', '2018-10-19 10:29:40', '2018-10-19 10:29:40');

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
(2, 2, 'App\\User'),
(2, 4, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `transactionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionState` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transation_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anuncio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payus`
--

INSERT INTO `payus` (`id`, `API_KEY`, `merchantId`, `accountId`, `urlResponse`, `urlConfirm`, `urlError`, `urlApi`, `type_encrypt`, `created_at`, `updated_at`) VALUES
(1, '4Vj8eK4rloUd272L48hsrarnUA', '508029', '512321', 'response', 'confirm', 'error', 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/', 'MD5', NULL, NULL);

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
(1, 'Ver Usuarios', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(2, 'Crear Usuarios', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(3, 'Editar Usuarios', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(4, 'Eliminar Usuarios', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(5, 'Ver Roles', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(6, 'Crear Roles', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(7, 'Editar Roles', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(8, 'Eliminar Roles', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(9, 'Ver Permisos', 'Ver permisos', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(10, 'Editar Permisos', 'Editar Permisos', 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `recargas`
--

CREATE TABLE `recargas` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recargas`
--

INSERT INTO `recargas` (`id`, `status`, `valor`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '22', '333292', '1', NULL, NULL),
(2, '3333333', '9999999999', '2', NULL, NULL),
(3, '3333333', '9999959999', '3', NULL, NULL);

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
(1, 'Admin', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(2, 'Usuario', NULL, 'web', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(3, 'Comerciante', 'Comprador/Vendedor', 'web', '2018-10-18 13:24:00', '2018-10-18 13:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo_clic` decimal(8,2) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `costo_clic`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Heriberto Valencia', 'hvhvalencia3@gmail.com', '$2y$10$wDjYL1KFNql.03tvWn/Vce/dIqSfWmsJ5X4aJq42bHTynnZS/DTTG', '-34.00', 'xl4DxmK9SenR5nHL0KysY6MJWMcWKPQatAoynFnDLQwWwiUQmnq24fQFlAn4', '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(2, 'Bruno Valenica', 'bruno@gmail.com', '$2y$10$wDjYL1KFNql.03tvWn/Vce/dIqSfWmsJ5X4aJq42bHTynnZS/DTTG', '0.00', NULL, '2018-08-09 04:02:48', '2018-08-09 04:02:48'),
(3, 'edgar', 'edgar.guzman21@gmail.com', '$2y$10$wDjYL1KFNql.03tvWn/Vce/dIqSfWmsJ5X4aJq42bHTynnZS/DTTG', '5000.00', 'OO9QexnO2NHMqvikwdiRKvDUbQVrXQCI1m7DOmIU20nVkNwCFTV0qr2Jc6tL', '2018-10-15 10:13:33', '2018-10-15 10:13:33'),
(4, 'stalin', 'stalin1@misena.edu.co', '$2y$10$Wz.bc/OufO8LIkm5ugub8.a2qi7F1OOuDbvmn/ESGgO4plCtceb7O', '0.00', NULL, '2018-10-18 18:21:29', '2018-10-18 18:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_total_balance`
--

CREATE TABLE `user_total_balance` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_balance` decimal(10,2) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_clic_anuncios`
--
ALTER TABLE `detalle_clic_anuncios`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_total_balance`
--
ALTER TABLE `user_total_balance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detalle_clic_anuncios`
--
ALTER TABLE `detalle_clic_anuncios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payus`
--
ALTER TABLE `payus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recargas`
--
ALTER TABLE `recargas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_total_balance`
--
ALTER TABLE `user_total_balance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
