<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class LocalizacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localizaciones')->delete();
    	DB::statement('ALTER SEQUENCE localizaciones_id_seq RESTART WITH 1');
    	// DB::table('localizaciones')->truncate();

        $faker = Faker::create();

        for ($i=0; $i < 100; $i++) { 
        	DB::table('localizaciones')->insert([
        		'pais' 			=> $faker->country,
        		'ciudad' 		=> $faker->city,
        		'created_at' 	=> $faker->dateTime(),
        		'updated_at' 	=> $faker->dateTime()
        	]);
        }
    }
}
