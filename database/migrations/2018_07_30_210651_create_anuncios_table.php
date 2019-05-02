<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_anuncio');
            $table->enum("tipo_anuncio",['venta','compra']);
            $table->string('ubicacion');
            $table->string('cod_postal')->nullable();
            $table->string('localidad')->nullable();
            $table->string('departamento')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('moneda');
            $table->string('nombre_moneda');
            $table->string('criptomoneda');
            $table->string('nombre_cripto_moneda');
            $table->string('banco');
            $table->string('margen');
            $table->string('precio_minimo_moneda');
            $table->string('limite_min');
            $table->string('limite_max');
            $table->string('lugar');
            $table->string('terminos');
            $table->enum("estado_anuncio",['sin publicar','activo','bloqueado','inactivo']);
            $table->integer('user_id');
            //$table->foreign('user_id')->references('id')->on('users');            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
