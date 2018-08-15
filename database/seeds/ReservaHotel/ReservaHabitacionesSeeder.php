<?php


use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Modulos\ReservaHotel\ReservaHotel;

class ReservaHabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ReservaHabitaciones::class, 50)->create();   
    }
}
