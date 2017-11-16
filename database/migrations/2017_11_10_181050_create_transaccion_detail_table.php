<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_transaccion')->unsigned();
            $table->foreign('id_tipo_transaccion')->references('id')->on('tipo_transaccion');
            $table->integer('numero');
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('producto');
            $table->integer('cantidad');
            $table->integer('numero_linea');
            $table->integer('status');
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
        Schema::dropIfExists('transaccion_detail');
    }
}
