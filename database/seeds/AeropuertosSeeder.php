<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class AeropuertosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('aeropuertos')->delete();
    	DB::statement('ALTER SEQUENCE aeropuertos_id_seq RESTART WITH 1');
    	// DB::table('aeropuertos')->truncate();

        $faker = Faker::create();

        for ($i=0; $i < 200; $i++) { 
        	DB::table('aeropuertos')->insert([
        		'codigo' 			=> $faker->unique()->regexify('[A-Z]{3}'),
        		'nombre' 			=> $faker->name,
        		'direccion' 		=> $faker->address,
        		'localizacion_id' 	=> $faker->numberBetween(1, 100),
        		'created_at' 		=> $faker->dateTime(),
        		'updated_at' 		=> $faker->dateTime()
        	]);
        }
    }
}
