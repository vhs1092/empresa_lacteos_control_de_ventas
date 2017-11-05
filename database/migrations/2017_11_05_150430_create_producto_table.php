<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_tipo_producto')->unsigned();
            $table->foreign('id_tipo_producto')->references('id')->on('tipo_producto');
            $table->string('description')->nullable();
            $table->string('unidad')->nullable();
            $table->string('weight')->nullable();
            $table->integer('stock');
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
        Schema::dropIfExists('producto');
    }
}
