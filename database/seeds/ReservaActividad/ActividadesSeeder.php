<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Modulos\ReservaActividad\Actividad;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Actividad::class, 500)->create();
       Actividad::create([
       	'id'=>777,
       	'fecha_inicio'=>Carbon::create(2018,9,20,15,0,0),
       	'fecha_termino'=>Carbon::create(2018,9,21,17,0,0),
       	'descripcion'=>'actividad de prueba',
       	'titulo' => 'Actividad Santiago',
       	'max_ninos' => 5,
       	'max_adultos'=>5,
       	'costo_nino'=>7777,
       	'costo_adulto'=>15000,
       	'ciudad_id'=>999]);
    }
}
