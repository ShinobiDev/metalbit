<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleHorarioUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detalle_horario_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->enum("dia",['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO']);
            $table->string("horario");
            $table->integer('id_usuario_canje');
            $table->timestamps();
            $table->enum("estado_dia",['ABIERTO', 'CERRADO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('detalle_horario_usuario');
    }
}
