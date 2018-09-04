<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaPaqueteVueloHotelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_paquete_vuelo_hoteles', function (Blueprint $table) {
            $table->integer('paquete_vuelo_hotel_id')->nullable();
            $table->foreign('paquete_vuelo_hotel_id')
                  ->references('id')
                  ->on('paquete_vuelo_hoteles');
            $table->integer('reserva_boleto_id')->nullable();
            $table->foreign('reserva_boleto_id')
                  ->references('id')
                  ->on('reserva_boletos');
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
        Schema::dropIfExists('reserva_paquete_vuelo_hoteles');
    }
}
