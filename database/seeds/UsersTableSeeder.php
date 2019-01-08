<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'user' => 'admin',
            'email' => 'admin@locadoraimperial.com.br',
            'password' => bcrypt('123456'),
            'profile' => 'Administração',
        ]);
        User::create([
            'name' => 'Usuário 01',
            'user' => 'user01',
            'email' => 'atendente01@locadoraimperial.com.br',
            'password' => bcrypt('123456'),
            'profile' => 'Atendimento',
        ]);
    }
}
