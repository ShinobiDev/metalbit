<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_campania');
            $table->enum('tipo_campania',['global', 'personal']);
            $table->enum('tipo_canje',['compra', 'recarga', 'regalo_recarga']);
            $table->dateTime('fecha_inicial_vigencia');
            $table->dateTime('fecha_final_vigencia');
            $table->integer('numero_de_cupones');
            $table->integer('cupones_disponibles');
            $table->integer('cupones_canjeados');
            $table->integer('id_user');
            $table->integer('limite_por_usuario');
            $table->enum('tipo_de_descuento',['porcentaje', 'valor_neto']);
            $table->decimal('valor_de_descuento',10,2);
            $table->string('moneda_descuento');
            $table->decimal('costo_minimo',10,2);
            $table->enum('es_acumulable',['0', '1']);
            $table->enum('estado_campania',['ABIERTA', 'CERRADA']);
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
        Schema::dropIfExists('campanias');
    }
}
