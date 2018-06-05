<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->dateTime('fecha_partida');
            $table->dateTime('fecha_llegada');
            $table->integer('id_avion');
            $table->integer('id_aeropuerto_origen');
            $table->integer('id_aeropuerto_destino');
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
        Schema::dropIfExists('tramos');
    }
}
