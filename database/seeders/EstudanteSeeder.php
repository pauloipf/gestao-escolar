<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudante;
use Illuminate\Support\Facades\Hash;

class EstudanteSeeder extends Seeder
{
    public function run()
    {
        // Criação de um estudante de exemplo
        Estudante::create([
            'nome'     => 'Bernardo',
            'email'    => 'bernardo@mail.com',
            'password' => Hash::make('password'),
        ]);

        Estudante::create([
            'nome'     => 'Julia',
            'email'    => 'julia@mail.com',
            'password' => Hash::make('password'),
        ]);

        Estudante::create([
            'nome'     => 'Paulo',
            'email'    => 'paulo@mail.com',
            'password' => Hash::make('password'),
        ]);

        Estudante::create([
            'nome'     => 'João Pedro',
            'email'    => 'joaopedro@mail.com',
            'password' => Hash::make('password'),
        ]);

        Estudante::factory(10)->create();
    }
}
