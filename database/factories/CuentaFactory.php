<?php

use Faker\Generator as Faker;


$factory->define(App\Cuenta::class, function (Faker $faker) {
	$tipo_cuentas_id = DB::table('tipo_cuentas')->select('id')->get();
	$bancos_id = DB::table('bancos')->select('id')->get();
	$users_id = DB::table('users')->select('id')->get();
    return [
        'numero_cuenta' =>  $faker->bankAccountNumber,
        'saldo' => $faker->numberBetween(0,1000000),
        'tipo_cuenta_id' => $tipo_cuentas_id->random()->id,
        'banco_id' => $bancos_id->random()->id,
        'user_id' => $users_id->random()->id,
    ]; 
});
