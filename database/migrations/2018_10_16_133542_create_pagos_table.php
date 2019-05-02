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
            $table->string('transactionState');
            $table->string('transation_value');
            $table->string('id_anuncio');
            $table->integer('id_user_compra');
            $table->string('moneda_pago');
            //$table->foreign('id_anuncio')->references('id')->on('anuncios');
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
        Schema::dropIfExists('pagos');
    }
}
