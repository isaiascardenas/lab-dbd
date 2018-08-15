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
            $table->integer('avion_id');
            $table->integer('origen_id');
            $table->integer('destino_id');
            $table->foreign('avion_id')
                    ->references('id')
                    ->on('aviones');
            $table->foreign('origen_id')
                    ->references('id')
                    ->on('aeropuertos');
            $table->foreign('destino_id')
                    ->references('id')
                    ->on('aeropuertos');
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
