<?php

use Faker\Generator as Faker;

$factory->define(App\TipoCuenta::class, function (Faker $faker) {
    return [
        'descripcion' -> randomElement($array = array ('Cuenta Corriente','Cuenta Vista','Credito')),
    ];
});
