<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Modulos\ReservaActividad\Actividad;


$factory->define(Actividad::class, function (Faker $faker) {
    
    $ciudades_id = DB::table('ciudades')->select('id')->get();
    
    $fecha = Carbon::create(2018, 9, mt_rand(1, 30), mt_rand(0, 24), 0, 0);

    return [
        'titulo' =>  $faker->realText(20),
        'descripcion' =>  $faker->realText($faker->numberBetween(100,300)),
        'fecha_inicio' => $fecha,
        'fecha_termino' => $fecha->copy()->addHours(mt_rand(1,24)),
        'ciudad_id' => $ciudades_id->random()->id,
        'max_adultos' => rand(1,10),
        'max_ninos' => rand(1,10),
        'costo_adulto' => rand(10000,20000),
        'costo_nino' => rand(5000,10000),
    ];
});
