<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion_header', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->string('observaciones')->nullable();
            $table->dateTime('fecha');
            $table->integer('id_tipo_transaccion')->unsigned();
            $table->foreign('id_tipo_transaccion')->references('id')->on('tipo_transaccion');
            $table->integer('id_cliente')->nullable();
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
        Schema::dropIfExists('transaccion_header');
    }
}
