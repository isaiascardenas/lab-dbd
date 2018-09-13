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
         Habitacion::create([
         	'id'=>5000,
         	'capacidad_nino'=>5,
         	'capacidad_adulto'=>5,
         	'precio_por_noche'=>99999,
         	'descripcion'=>'habitacion de prueba',
         	'hotel_id'=>2000]);
    }
}
