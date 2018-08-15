<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Aeropuerto;


$factory->define(Aeropuerto::class, function (Faker $faker) {
    $ciudades = DB::table('ciudades')->select('id')->get();
    
    return [
        'codigo' => $faker->unique()->regexify('[A-Z]{3}'),
        'nombre' => $faker->name,
        'direccion' => $faker->address,
        'ciudad_id' => $ciudades->random()->id
    ];
});
