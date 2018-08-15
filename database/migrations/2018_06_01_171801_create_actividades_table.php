<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_inicio'); 
            $table->dateTime('fecha_termino');
            $table->string('descripcion', 255);
            $table->integer('max_ninos');
            $table->integer('max_adultos');
            $table->integer('costo_nino');
            $table->integer('costo_adulto');
            $table->integer('ciudad_id');
            $table->foreign('ciudad_id')
                ->references('id')
                ->on('ciudades');
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
        Schema::dropIfExists('actividades');
    }
}
