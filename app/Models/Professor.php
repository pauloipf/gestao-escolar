<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professores'; // Se estiver usando o nome em português

    protected $fillable = [
        'nome',
        'email',
        'password',
    ];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
