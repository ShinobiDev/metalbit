<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonificacions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum("tipo_bonificación",['REGISTRO', 'RECARGA']);
            $table->integer("fk_id_detalle_referido");
            $table->decimal("valor");
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
        Schema::dropIfExists('bonificacions');
    }
}
