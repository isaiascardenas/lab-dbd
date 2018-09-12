<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'rut' => '11111111-1',
            'password' => bcrypt('admin'),  // '$2y$10$PDl96TYBhukWyj.XYofVUe3J4dd7WWL1pSJaQUgtyh4SFN9MihEya'
            'email' => 'admin@admin.com',
            'nombre' => 'Administrador General',
        ]);
    }
}
