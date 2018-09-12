<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Modulos\ReservaAuto\ReservaAuto;

class ReservaAutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ReservaAuto::class, 50)->create();
    }
}
