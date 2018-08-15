<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\ReservaHotel;

class ReservaHotelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ReservaHotel::class, 50)->create();   
    }
}
