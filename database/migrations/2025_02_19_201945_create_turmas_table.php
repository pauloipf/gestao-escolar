<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');  // Nome da turma (ex.: "Turma A", "2023/1", etc.)
            // Relacionamento com o curso: cada turma pertence a um curso
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            // Relacionamento com o professor: cada turma é ministrada por um professor
            $table->foreignId('professor_id')->constrained('professores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('turmas');
    }
}
