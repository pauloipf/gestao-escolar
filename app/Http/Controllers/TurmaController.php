<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use App\Models\Professor;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    // Lista todas as turmas
    public function index()
    {
        $turmas = Turma::with(['curso', 'professor'])->get();
        return view('turmas.index', compact('turmas'));
    }

    // Exibe o formulário para criar uma nova turma
    public function create()
    {
        // Busque os cursos e professores para seleção no formulário
        $cursos = Curso::all();
        $professores = Professor::all();
        return view('turmas.create', compact('cursos', 'professores'));
    }

    // Armazena a nova turma no banco de dados
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'         => 'required|string|max:255',
            'curso_id'     => 'required|exists:cursos,id',
            'professor_id' => 'required|exists:professores,id',
        ]);

        Turma::create($validated);

        return redirect()->route('turmas.index')
                         ->with('success', 'Turma criada com sucesso!');
    }

    // Exibe os detalhes de uma turma
    public function show(Turma $turma)
    {
        return view('turmas.show', compact('turma'));
    }

    // Exibe o formulário para edição da turma
    public function edit(Turma $turma)
    {
        $cursos = Curso::all();
        $professores = Professor::all();
        return view('turmas.edit', compact('turma', 'cursos', 'professores'));
    }

    // Atualiza os dados da turma
    public function update(Request $request, Turma $turma)
    {
        $validated = $request->validate([
            'nome'         => 'required|string|max:255',
            'curso_id'     => 'required|exists:cursos,id',
            'professor_id' => 'required|exists:professores,id',
        ]);

        $turma->update($validated);

        return redirect()->route('turmas.index')
                         ->with('success', 'Turma atualizada com sucesso!');
    }

    // Remove a turma do banco de dados
    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turmas.index')
                         ->with('success', 'Turma excluída com sucesso!');
    }
}
