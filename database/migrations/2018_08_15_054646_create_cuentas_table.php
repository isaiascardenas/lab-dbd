<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_cuenta', 255)->unique();
            $table->integer('saldo');
            $table->integer('tipo_cuenta_id');
            $table->foreign('tipo_cuenta_id')
                ->references('id')
                ->on('tipo_cuentas');
            
            $table->integer('banco_id');
            $table->foreign('banco_id')
                ->references('id')
                ->on('bancos');

            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('cuentas');
    }
}
