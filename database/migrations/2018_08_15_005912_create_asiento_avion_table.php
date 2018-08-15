<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsientoAvionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asiento_avion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asiento_id');
            $table->foreign('asiento_id')
                      ->references('id')
                      ->on('asientos');
            $table->integer('avion_id');
            $table->foreign('avion_id')
                      ->references('id')
                      ->on('aviones');
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
        Schema::dropIfExists('asiento_avion');
    }
}
