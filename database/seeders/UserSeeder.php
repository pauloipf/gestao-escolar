<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        

        // Usuários Estudantes
        User::create([
            'name'     => 'Bernardo',
            'email'    => 'bernardo@mail.com',
            'password' => Hash::make('estudante'),
            'tipo'     => 'estudante',
        ]);

        User::create([
            'name'     => 'Julia',
            'email'    => 'julia@mail.com',
            'password' => Hash::make('estudante'),
            'tipo'     => 'estudante',
        ]);

        User::create([
            'name'     => 'Paulo',
            'email'    => 'paulo@mail.com',
            'password' => Hash::make('estudante'),
            'tipo'     => 'estudante',
        ]);

        User::create([
            'name'     => 'João Pedro',
            'email'    => 'joaopedro@mail.com',
            'password' => Hash::make('estudante'),
            'tipo'     => 'estudante',
        ]);

        // Usuário Professor
        User::create([
            'name'     => 'Professor Exemplo',
            'email'    => 'professor@ifsc.edu.br',
            'password' => Hash::make('professor'),
            'tipo'     => 'professor',
        ]);
    }
}
