<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_traslados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_pasajeros');
            $table->datetime('fecha_reserva');
            $table->float('descuento');
            $table->integer('costo');
            $table->integer('traslado_id');
            $table->foreign('traslado_id')
                      ->references('id')
                      ->on('traslados');
            $table->integer('orden_compra_id');
            $table->foreign('orden_compra_id')
                      ->references('id')
                      ->on('orden_compras');
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
        Schema::dropIfExists('reserva_traslados');
    }
}
