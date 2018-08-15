<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasajerosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pasajeros', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('rut');
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
    Schema::dropIfExists('pasajeros');
  }
}
