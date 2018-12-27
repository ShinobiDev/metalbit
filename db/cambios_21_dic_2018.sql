ALTER TABLE `pagos` ADD `code_wallet` VARCHAR(256) NULL AFTER `updated_at`, ADD `hash_txid` VARCHAR(256) NULL AFTER `code_wallet`;
ALTER TABLE `pagos` CHANGE `transactionState` `transactionStatePayU` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `pagos` ADD `transactionState` ENUM('Sin compra','Pago Aceptado','Moneda Envíada','Moneda Recibida','Pago a Comprador','Transacción Finalizada') NOT NULL AFTER `transactionStatePayU`;
ALTER TABLE `pagos` CHANGE `estado_pago` `estado_pago` ENUM('APROBADA','PENDIENTE','RECHAZADA') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDIENTE';
ALTER TABLE `pagos` CHANGE `transactionState` `transactionState` ENUM('Sin compra','Pago Aceptado','Moneda Envíada','Moneda Recibida','Pago a Comprador','Transacción Finalizada') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sin Compra';
ALTER TABLE `pagos`  ADD `type_wallet` ENUM('imagen','codigo') NOT NULL  AFTER `code_wallet`;
ALTER TABLE `pagos` CHANGE `type_wallet` `type_wallet` ENUM('imagen','codigo') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `pagos` CHANGE `type_wallet` `image_wallet` VARCHAR(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `pagos` CHANGE `transactionState` `transactionState` ENUM('Pendiente','Pago Aceptado','Moneda Envíada','Moneda Recibida','Pago a Comprador','Transacción Finalizada') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendiente';
ALTER TABLE `pagos` CHANGE `code_wallet` `code_wallet` VARCHAR(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '', CHANGE `image_wallet` `image_wallet` VARCHAR(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT ''




