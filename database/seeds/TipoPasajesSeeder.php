<?php

use Illuminate\Database\Seeder;

class TipoPasajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pasajes')->delete();
        DB::table('tipo_pasajes')->insert([
        	['descripcion' => 'Económico'],
        	['descripcion' => 'Turista'],
        	['descripcion' => 'Ejecutivo']
        ]);
    }
}
