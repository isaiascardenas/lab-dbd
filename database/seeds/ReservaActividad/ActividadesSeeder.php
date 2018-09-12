<?php

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
       factory(Actividad::class, 500)->create();
    }
}
