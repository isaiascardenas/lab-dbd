<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteVueloAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_vuelo_autos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->float('descuento');
            $table->integer('reserva_auto_id')->nullable();
            $table->foreign('reserva_auto_id')
                  ->references('id')
                  ->on('reserva_autos');
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
        Schema::dropIfExists('paquete_vuelo_autos');
    }
}
