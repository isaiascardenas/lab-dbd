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
            $table->integer('precio_nino');
            $table->integer('precio_adulto');
            $table->integer('id_localizacion');
            $table->foreign('id_localizacion')
                ->references('id')
                ->on('localizaciones')
                ->onDelete('cascade');

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
