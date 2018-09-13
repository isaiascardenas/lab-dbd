<?php


use Illuminate\Database\Seeder;
use App\Modulos\ReservaHabitacion\Hotel;

class HotelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Hotel::class, 100)->create();
         Hotel::create([
         	'id'=>2000,
         	'estrellas'=>4,
         	'nombre'=>'Hotel_de_prueba',
         	'descripcion'=>'este es un hotel de prueba',
         	'ciudad_id'=>999]);
    }
}
