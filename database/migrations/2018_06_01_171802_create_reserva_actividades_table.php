<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_reserva');
            $table->integer('capacidad_ninos');
            $table->integer('capacidad_adultos');
            $table->integer('actividad_id');
            $table->foreign('actividad_id')
                ->references('id')
                ->on('actividades')
                ->onDelete('cascade');
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
        Schema::dropIfExists('reserva_actividades');
    }
}
