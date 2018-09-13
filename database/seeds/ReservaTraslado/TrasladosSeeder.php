<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Modulos\ReservaTraslado\Traslado;

class TrasladosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Traslado::class, 1000)->create();
        Traslado::create([
        	'id'=> 5555,
        'tipo' => 1,
        'fecha_inicio' => Carbon::create(2018,9,20,15,0,0),
        'fecha_termino' => Carbon::create(2018,9,20,17,0,0),
        'capacidad' => 7,
        'precio_persona' => 5555,
        'aeropuerto_id' => 555,
        'hotel_id' => 2000]
    );

        Traslado::create([
        	'id'=> 6666,
        'tipo' => 0,
        'fecha_inicio' => Carbon::create(2018,9,20,15,0,0),
        'fecha_termino' => Carbon::create(2018,9,20,17,0,0),
        'capacidad' => 7,
        'precio_persona' => 7777,
        'aeropuerto_id' => 555,
        'hotel_id' => 2000]
    );
    }
}
