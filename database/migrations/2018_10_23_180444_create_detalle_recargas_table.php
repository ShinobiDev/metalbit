<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleRecargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_recargas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_user");
            $table->enum('tipo_recarga',['PAGO','BONIFICACION'])->default("PAGO");
            $table->decimal("valor_recarga");
            $table->decimal("valor_pagado");
            $table->string("referencia_pago")->unique();
            $table->string("referencia_pago_pay_u")->unique();
             $table->string("metodo_pago");
             $table->enum('estado_detalle_recarga',['APROBADA','PENDIENTE','RECHAZADA','REGISTRADA','PENDIENTE APROBACION'])->default('REGISTRADA');
            $table->timestamps();
            $table->string('certificado_pago',256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_recargas');
    }
}
