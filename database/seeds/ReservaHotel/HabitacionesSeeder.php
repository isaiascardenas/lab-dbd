<?php


use Illuminate\Database\Seeder;
use App\Modulos\ReservaHabitacion\Habitacion;

class HabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Habitacion::class, 2000)->create();
    }
}
