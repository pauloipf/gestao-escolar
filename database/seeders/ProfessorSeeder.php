<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;

class ProfessorSeeder extends Seeder
{
    public function run()
    {
        // Criação de um professor de exemplo
        Professor::create([
            'nome'         => 'Robson',
            'email'        => 'robson@ifsc.edu.br',
            'password'     => Hash::make('password'),
        ]);

        Professor::create([
            'nome'         => 'Castello',
            'email'        => 'castello@ifsc.edu.br',
            'password'     => Hash::make('password'),
        ]);

        Professor::create([
            'nome'         => 'Edinilson',
            'email'        => 'edinilson@ifsc.edu.br',
            'password'     => Hash::make('password'),
        ]);

        Professor::create([
            'nome'         => 'Vilson',
            'email'        => 'vilson@ifsc.edu.br',
            'password'     => Hash::make('password'),
        ]);

        // Se tiver uma factory definida para Professor, pode criar mais registros:
        // Professor::factory(10)->create();
    }
}
