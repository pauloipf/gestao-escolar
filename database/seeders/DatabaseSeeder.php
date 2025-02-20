<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            EstudanteSeeder::class,
            ProfessorSeeder::class,
            UserSeeder::class,
            CursoSeeder::class,
            
        ]);
    }
}
