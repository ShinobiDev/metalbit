<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transactionId');
            $table->string('transactionStatePayU');
            $table->string('transactionState');
            $table->decimal('transactionQuantity');
            $table->string('transation_value');
            $table->string('transaction_value_pagado');
            $table->decimal('valor_sobre_costo');
            $table->decimal('pay_value');
            $table->integer('id_anuncio');
            $table->integer('id_user_compra');
            $table->string('moneda_pago');
            $table->enum('estado_pago',['APROBADA', 'PENDIENTE', 'RECHAZADA')])->default('PENDIENTE');
            $table->integer('calificacion');
            $table->string('opinion');
            //$table->foreign('id_anuncio')->references('id')->on('anuncios');
            $table->timestamps();    
            $table->string('code_wallet',256);
            $table->string('image_wallet',256);
            $table->string('hash_txid',256);
            $table->string('moneda_pago',6);
            $table->decimal('porcentaje_pago',10,2);
            $table->string('numero_transaccion',256);
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
        Schema::dropIfExists('pagos');
    }
}
