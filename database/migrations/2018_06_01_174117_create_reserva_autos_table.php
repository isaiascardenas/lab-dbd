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
            $table->datetime('fecha_reserva');
            $table->integer('costo');
            $table->integer('descuento');
            $table->integer('auto_id');
            $table->foreign('auto_id')
                ->references('id')
                ->on('autos');
            $table->integer('orden_compra_id');
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
