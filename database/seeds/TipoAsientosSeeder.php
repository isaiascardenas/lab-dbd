<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TipoAsientosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('tipo_asientos')->insert([
    	[
        'id' => 1,
    		'descripcion' 	=> 'Económico',
    		'created_at' 	=> $faker->dateTime(),
    		'updated_at' 	=> $faker->dateTime()
    	],
    	[
        'id' => 2,
    		'descripcion' 	=> 'Turista',
    		'created_at' 	=> $faker->dateTime(),
    		'updated_at' 	=> $faker->dateTime()],
    	[
        'id' => 3,
    		'descripcion' 	=> 'Ejecutivo',
    		'created_at' 	=> $faker->dateTime(),
    		'updated_at' 	=> $faker->dateTime()
    	]
    ]);
  }
}
