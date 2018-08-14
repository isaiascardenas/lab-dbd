<?php


use Illuminate\Database\Seeder;
use App\Habitacion;

class HabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Habitacion::class, 50)->create();
    }
}
