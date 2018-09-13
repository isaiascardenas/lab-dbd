<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaAuto\Auto;

class AutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Auto::class, 50)->create();
        Auto::create([
        	'id'=>999,
        	'patente'=>'ZZ0000',
        	'descripcion'=>'auto de prueba',
        	'precio_hora'=>'7777',
        	'capacidad'=>10,
        	'sucursal_id'=>777]);
    }
}
