<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class AerolineasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('aerolineas')->delete();
    	DB::statement('ALTER SEQUENCE aerolineas_id_seq RESTART WITH 1');
    	// DB::table('aerolineas')->truncate();

        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
        	DB::table('aerolineas')->insert([
        		'nombre' 		=> $faker->company,
        		'created_at' 	=> $faker->dateTime(),
        		'updated_at' 	=> $faker->dateTime()
        	]);
        }
    }
}
