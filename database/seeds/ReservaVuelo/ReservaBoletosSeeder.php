<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\ReservaBoleto;

class ReservaBoletosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ReservaBoleto::class, 40)->create();
    }
}
