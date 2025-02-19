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
            'email'    => 'bernardo@example.com',
            'password' => Hash::make('password'),
        ]);

        Estudante::create([
            'nome'     => 'Julia',
            'email'    => 'julia@example.com',
            'password' => Hash::make('password'),
        ]);

        Estudante::create([
            'nome'     => 'Paulo',
            'email'    => 'paulo@example.com',
            'password' => Hash::make('password'),
        ]);

        Estudante::create([
            'nome'     => 'João Pedro',
            'email'    => 'joaopedro@example.com',
            'password' => Hash::make('password'),
        ]);

        // Se você tiver uma factory definida para Estudante, pode criar mais registros:
        Estudante::factory(10)->create();
    }
}
