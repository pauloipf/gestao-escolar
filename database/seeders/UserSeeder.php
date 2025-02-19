<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Usuário Professor
        User::create([
            'name'     => 'Professor Exemplo',
            'email'    => 'professor@ifsc.edu.br',
            'password' => Hash::make('professor'),
            'tipo'     => 'professor', // supondo que você tenha esse campo na tabela users
        ]);

        // Usuário Estudante
        User::create([
            'name'     => 'Estudante Exemplo',
            'email'    => 'estudante@example.com',
            'password' => Hash::make('estudante'),
            'tipo'     => 'estudante',
        ]);
    }
}
