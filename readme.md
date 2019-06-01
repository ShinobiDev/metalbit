<p align="center"><img src="http://metalbit.co/core/img/AzulMetalicoHor.png"></p>



## Acerca de Metalbit

Metalbit es una aplicación para ofrecer anuncios para compra y venta de criptomonedas, esta creado bajo el framework [Laravel 5.5](https://laravel.com/docs/5.5)

## Recomendaciones para instalación en servidor local
   Una vez clonado el sistema se recomienda

## Paso 1 dar permisos a las carpetas de storage y storage/logs (linux)
	sudo chmod 777 -R storage

	cd storage

	sudo chmod 777 -R logs

## Paso 2 limpiar el cache de la aplicación, debe hacerlo desde la raiz

	php artisan cache:clear
## Paso 3
	NO ejecute la migración, el script de la base de datos (metal_bit_para_pruebas.sql) se encuentra en la carpeta db, los usuarios allí registrados tiene como defecto la clave '123456', para, si usted desea replicar el ambiente de producción, debe importar la base de datos (metal_bit_para_producccion.sql), en este caso las contraseñas debe ser recuperadas.