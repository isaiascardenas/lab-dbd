<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_termino');
            $table->integer('capacidad');
            $table->integer('aeropuerto_id');
            $table->foreign('aeropuerto_id')
                      ->references('id')
                      ->on('aeropuertos');
            $table->integer('hotel_id');
            $table->foreign('hotel_id')
                      ->references('id')
                      ->on('hoteles');
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
        Schema::dropIfExists('traslados');
    }
}
