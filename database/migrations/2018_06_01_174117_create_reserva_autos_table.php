<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_autos', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_termino');
            $table->integer('precio');
            $table->integer('id_auto');
            $table->foreign('id_auto')
                ->references('id')
                ->on('autos')
                ->onDelete('cascade');
            $table->integer('id_compra');
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
        Schema::dropIfExists('reserva_autos');
    }
}
