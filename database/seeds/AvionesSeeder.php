<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\Avion;

class AvionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Avion::class, 100)->create();
    }
}
