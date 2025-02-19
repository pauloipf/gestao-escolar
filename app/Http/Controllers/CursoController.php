<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Exibe a listagem de cursos
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    // Exibe o formulário de criação de um novo curso
    public function create()
    {
        return view('cursos.create');
    }

    // Armazena um novo curso no banco de dados
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index')
                         ->with('success', 'Curso criado com sucesso!');
    }

    // Exibe os detalhes de um curso específico
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    // Exibe o formulário para edição do curso
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    // Atualiza os dados do curso no banco de dados
    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $curso->update($validated);

        return redirect()->route('cursos.index')
                         ->with('success', 'Curso atualizado com sucesso!');
    }

    // Remove o curso do banco de dados
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')
                         ->with('success', 'Curso excluído com sucesso!');
    }
}
