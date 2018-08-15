<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\Tramo;

class TramosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Tramo::class, 1000)->create();
    }
}
