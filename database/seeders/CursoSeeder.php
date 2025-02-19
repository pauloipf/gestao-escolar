<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    public function run()
    {
        Curso::create([
            'nome' => 'Ciência da Computação',
            'descricao' => 'Curso que aborda fundamentos da computação, algoritmos e desenvolvimento de software.',
        ]);

        Curso::create([
            'nome' => 'Engenharia Mecânica',
            'descricao' => 'Curso focado nos princípios da mecânica, projetos e processos industriais.',
        ]);

        Curso::create([
            'nome' => 'Engenharia de Alimentos',
            'descricao' => 'Curso voltado para a produção, processamento e segurança dos alimentos.',
        ]);

        Curso::create([
            'nome' => 'Agro Negócios',
            'descricao' => 'Curso que explora a gestão, inovação e desenvolvimento no setor agroindustrial.',
        ]);
    }
}
