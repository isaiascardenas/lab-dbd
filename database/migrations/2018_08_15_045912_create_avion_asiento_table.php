<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvionAsientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avion_asiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avion_id');
            $table->foreign('avion_id')
                      ->references('id')
                      ->on('aviones');
            $table->integer('asiento_id');
            $table->foreign('asiento_id')
                      ->references('id')
                      ->on('asientos');
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
        Schema::dropIfExists('avion_asiento');
    }
}
