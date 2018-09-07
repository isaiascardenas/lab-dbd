<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_boletos', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha_reserva');
            $table->float('descuento');
            $table->integer('costo');
            $table->integer('asiento_avion_id');
            $table->foreign('asiento_avion_id')
                      ->references('id')
                      ->on('asiento_avion');
            $table->integer('tramo_id');
            $table->foreign('tramo_id')
                      ->references('id')
                      ->on('tramos');
            $table->integer('orden_compra_id')->nullable();
            // $table->foreign('orden_compra_id')
            //           ->references('id')
            //           ->on('orden_compra');
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
        Schema::dropIfExists('reserva_boletos');
    }
}
