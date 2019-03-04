INSERT INTO `variables` (`id`, `nombre`, `valor`, `created_at`, `updated_at`) VALUES (NULL, 'cuenta_banco', '821-995486-69', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), (NULL, 'nombre_banco', 'Bancolombia S.A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `variables` (`id`, `nombre`, `valor`, `created_at`, `updated_at`) VALUES (NULL, 'url_certificacion', '/archivos/certificaci%C3%B3n_bancaria_Metalbit_SAS.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `variables` (`id`, `nombre`, `valor`, `created_at`, `updated_at`) VALUES (NULL, 'direccion_oficina', 'Calle 114 #53 - 96\r\nBogotá D.C. - Colombia', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `variables` (`id`, `nombre`, `valor`, `created_at`, `updated_at`) VALUES (NULL, 'horario_oficina', 'Horario: Lunes a Viernes de 8:00 a.m. - 12:30m y de 1:30 p.m. a 5:00 p.m.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
ALTER TABLE `pagos` ADD `certificado_pago` VARCHAR(256) NULL AFTER `numero_transaccion`;

