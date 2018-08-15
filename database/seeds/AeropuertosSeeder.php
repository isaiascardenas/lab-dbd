<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\Aeropuerto;

class AeropuertosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Aeropuerto::class, 200)->create();
    }
}
