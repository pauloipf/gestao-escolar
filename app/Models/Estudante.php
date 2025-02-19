<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'password',
    ];

    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'matriculas', 'estudante_id', 'turma_id')
            ->withTimestamps();
    }
}
