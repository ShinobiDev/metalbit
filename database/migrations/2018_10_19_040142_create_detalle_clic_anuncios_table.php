<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleClicAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_clic_anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_anuncio');
            $table->integer('id_usuario');
            $table->decimal('costo');
            $table->string('tipo');
            $table->integer('num_vistas');
            $table->integer('calificacion');
            $table->string('opinion');
            $table->string('comentario');
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
        Schema::dropIfExists('detalle_clic_anuncios');
    }
}
