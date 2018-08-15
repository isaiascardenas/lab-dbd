<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_habitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_termino');
            $table->datetime('fecha_reserva');
            $table->integer('costo');
            $table->float('descuento');
            $table->integer('habitacion_id');
            $table->foreign('habitacion_id')
                  ->references('id')
                  ->on('habitaciones');
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
        Schema::dropIfExists('reserva_habitaciones');
    }
}
