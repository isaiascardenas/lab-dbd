<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaPaqueteVueloAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_paquete_vuelo_autos', function (Blueprint $table) {
            $table->integer('paquete_vuelo_auto_id');
            $table->foreign('paquete_vuelo_auto_id')
                  ->references('id')
                  ->on('paquete_vuelo_autos');
            $table->integer('reserva_boleto_id');
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
        Schema::dropIfExists('reserva_paquete_vuelo_autos');
    }
}
