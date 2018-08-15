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
            'password' => 'secret',
            'email' => 'admin@admin.com',
            'nombre' => 'Administrador General',
        ]);
    }
}
