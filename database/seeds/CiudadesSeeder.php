<?php

use App\Ciudad;
use Illuminate\Database\Seeder;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ciudad::class, 10)->create();
        Ciudad::create([
        	'id' => 999,
        	'nombre' => 'Santiago',
        	'pais_id' => 999]);
    }
}
