<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaHotel\ReservaHabitacion;

$factory->define(ReservaHabitacion::class, function (Faker $faker) {
	$habitacion_id = DB::table('habitaciones')->get()->id;
    return [
        'fecha_inicio'=> $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 weeks', $timezone = null),
        'fecha_termino'=> dateTimeBetween($startDate = '+2 weeks', $endDate = '+4 weeks', $timezone = null),
        'fecha_reserva' => $faker->date($format= 'd-m-Y'),
        'costo' => rand(50000,200000),
        'descuento'=> rand(0,0.7),
        'habitacion_id'=> $habitacion_id->random()->id,
        'orden_compra_id'=>rand(1,50)
    ];
});
