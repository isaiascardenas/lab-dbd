<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteVueloHotelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_vuelo_hoteles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->float('descuento');
            $table->integer('reserva_habitacion_id')->nullable();
            $table->foreign('reserva_habitacion_id')
                  ->references('id')
                  ->on('reserva_habitaciones');
            $table->integer('orden_compra_id')->nullable();
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
        Schema::dropIfExists('paquete_vuelo_hoteles');
    }
}
