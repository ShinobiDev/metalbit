<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clearcache', function(){
      Artisan::call('cache:clear');
      Artisan::call('config:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
      // Artisan::call('event:generate ');
      // Artisan::call('key:generate');
      return '<h1>se ha borrado el cache</h1>';
  });

Auth::routes();

Route::get('/','AnunciosController@index' )->name('posts.index');

Route::resource('anuncios', 'AnunciosController');
//Route::get('mis_anuncios/{id}', 'AnunciosController')->name('posts.show');

Route::get('all/{id}', 'AnunciosController@all')->name('anuncios.all');

Route::get("hash/{cod_ad}/{monto}/{moneda}","AnunciosController@hash");
Route::get("hash_anuncio/{cod_ad}/{monto}/{moneda}/{id_usuario}/{cantidad}","AnunciosController@hash_anuncio");

Route::resource('recargas','RecargasController');

Route::get('register_landing/{codigo_referido}',"Auth\RegisterController@create_landing");

Route::post("compartir_mail","AnunciosController@compartir_mail");


Route::get("/confirmar_cambio_email/{id}/{correo}","Admin\UsersController@cambio_correo");
Route::get('descontar_recargas/{id_anuncio}/{costo}/{id_user}/{tipo}/{cant}/{precio}','RecargasController@registro_consulta_ad');


Route::get('/home', 'AnunciosController@index')->name('welcome');

Route::group([
    // 'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function(){
  Route::resource('users', 'UsersController');
  Route::resource('roles', 'RolesController');
  Route::resource('permissions', 'PermissionsController');

  Route::middleware('role:Admin')->put('users/{user}/roles', 'UserRolesController@update')->name('users.roles.update');
  Route::middleware('role:Admin')->put('users/{user}/permissions', 'UserPermissionsController@update')->name('users.permissions.update');


});
Route::get("cambiar_estado_anuncio/{id_ad}/{estado}","AnunciosController@cambiar_estado_anuncio");
Route::get("obtener_valor_moneda_valida/{id_cripto}/{moneda}","AnunciosController@obtener_valor_moneda_valida");
Route::get("cambiar_valor_clic/{id_user}/{costo}","RecargasController@cambiar_valor_clic");
Route::get("ver_recargas_mis_recargas/{id}","RecargasController@ver_recargas_mis_recargas");
Route::post("calificar","AnunciosController@calificar");
Route::post("calificar_venta","AnunciosController@calificar_venta");
Route::get("mis_bonificaciones","Admin\UsersController@mis_bonificaciones");
Route::get("validar_codigo/{cod}","Admin\UsersController@validar_codigo");
Route::get("registrar_recarga/{id}/{val_recarga}/{ref_pago}","RecargasController@registrar_recarga");
Route::post("cambio_pass","Admin\UsersController@cambio_clave");
Route::get("anuncios_vistos","Admin\UsersController@anuncios_vistos_por_mi")->name('anuncios_vistos');
Route::get("ver_mas_comentarios/{id}/{min}/{max}","AnunciosController@ver_mas_comentarios");
Route::get("cambiar_horario/{id}/{hor}","Admin\UsersController@cambiar_horario");
Route::get("cambiar_estado_dia/{id}/{estado}","Admin\UsersController@cambiar_estado_dia");
Route::post("registrar_wallet/{id}","Admin\UsersController@registrar_wallet");
Route::post("registrar_wallet_qr/{id}","Admin\UsersController@registrar_wallet_qr");
Route::get('registrar_codigo_wallet/{id}',"Admin\UsersController@registrar_codigo_wallet_email");
Route::get('ver_mis_compras/{id}',"Admin\UsersController@ver_mis_compras")->name('mis_compras');
Route::get('ver_mis_ventas/{id}',"Admin\UsersController@ver_mis_ventas")->name('mis_ventas');
Route::get('ver_todas_las_transacciones',"Admin\UsersController@ver_todas_las_transacciones")->name('ver_todas_las_transacciones');
Route::post('registrar_wallet_transaccion_realizada/{id}','Admin\UsersController@registrar_wallet_transaccion_realizada')->name('registrar_wallet_transaccion_realizada');
Route::post('registrar_hash_transaccion_realizada/{id}','Admin\UsersController@registrar_hash_transaccion_realizada')->name('registrar_hash_transaccion_realizada');
Route::post('confirmar_transaccion/{id}','Admin\UsersController@confirmar_transaccion')->name('confirmar_transaccion');



/*respuesta de payu para compras*/
Route::get('response',function(){
	$r= new App\Anuncios;
	return $r->registro_venta_anuncio($_REQUEST);	
});
Route::get('confirmation',function(){
	$r= new App\Anuncios;
	return $r->registro_venta_anuncio($_REQUEST);	
});
/*respuesta de payu para compras de recargas*/
Route::get('response_recarga',function(){
	$r=new App\Recargas;
	return $r->registro_recargas($_REQUEST);	
});

Route::get('confirmation_recarga',function(){
	$r=new App\Recargas;
	return $r->registro_recargas($_REQUEST);	
});
