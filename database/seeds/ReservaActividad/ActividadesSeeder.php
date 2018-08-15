<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Modulos\ReservaActividad\Actividad;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Actividad::class, 50)->create();    
    }
}
