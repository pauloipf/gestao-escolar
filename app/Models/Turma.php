<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'curso_id',
        'professor_id',
    ];

    // Cada turma pertence a um curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // Cada turma é ministrada por um professor
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    // Relação muitos-para-muitos com estudantes via a tabela pivot "matriculas"
    public function estudantes()
    {
        return $this->belongsToMany(Estudante::class, 'matriculas', 'turma_id', 'estudante_id')
                    ->withTimestamps();
    }
}
