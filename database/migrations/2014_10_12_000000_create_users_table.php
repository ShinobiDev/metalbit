<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->decimal('costo_clic')->defaul(0);
            $table->enum('confirmado',["SI","NO"])->defaul("NO");
            $table->integer('codigo_referido');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('calificacion');
            $table->integer('num_calificaciones');
            $table->string('cuenta_bancaria');
            $table->string('certificacion_bancaria');
            $table->enum('estado',["0","1"])->default("1");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
