<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('API_KEY');
            $table->string('merchantId');
            $table->string('accountId');
            $table->string('urlResponse');
            $table->string('urlConfirm');
            $table->string('urlError');
            $table->string('urlApi');
            $table->enum('type_encrypt',['MD5','SHA1','SHA256'])->default("SHA256");
            $table->string('razon_social');
            $table->string('nit');
            $table->string('tel_contacto');
            $table->enum('type',['TEST','´PRODUCTION']);
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
        Schema::dropIfExists('payus');
    }
}
