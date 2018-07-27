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
        DB::table('tipo_asientos')->delete();
        DB::statement('ALTER SEQUENCE tipo_asientos_id_seq RESTART WITH 1');
    	// DB::table('tipo_asientos')->truncate();

        $faker = Faker::create();
        DB::table('tipo_asientos')->insert([
        	[
        		'descripcion' 	=> 'Económico',
        		'created_at' 	=> $faker->dateTime(),
        		'updated_at' 	=> $faker->dateTime()
        	],
        	[
        		'descripcion' 	=> 'Turista',
        		'created_at' 	=> $faker->dateTime(),
        		'updated_at' 	=> $faker->dateTime()],
        	[
        		'descripcion' 	=> 'Ejecutivo',
        		'created_at' 	=> $faker->dateTime(),
        		'updated_at' 	=> $faker->dateTime()
        	]
        ]);
    }
}
