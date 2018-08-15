<?php

use App\Permiso;
use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->insert([
            ['descripcion' => 'Administrar fondos'],
            ['descripcion' => 'Administrar usuarios'],
            ['descripcion' => 'Administrar paquetes'],
            ['descripcion' => 'Administrar localizaciones'],
            ['descripcion' => 'Administrar roles y permisos'],
            ['descripcion' => 'Administrar modulo Reserva de autos'],
            ['descripcion' => 'Administrar modulo Reserva de vuelos'],
            ['descripcion' => 'Administrar modulo Reserva de hoteles'],
            ['descripcion' => 'Administrar modulo Reserva de traslados'],
            ['descripcion' => 'Administrar modulo Reserva de actividades'],
        ]);
    }
}
