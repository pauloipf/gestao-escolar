<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstudanteController extends Controller
{
    // Lista todos os estudantes
    public function index()
    {
        $estudantes = Estudante::all();
        return view('estudantes.index', compact('estudantes'));
    }

    // Exibe o formulário para criação de um novo estudante
    public function create()
    {
        return view('estudantes.create');
    }

    // Armazena um novo estudante no banco de dados
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:estudantes,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Criptografa a senha antes de armazenar
        $validated['password'] = Hash::make($validated['password']);

        Estudante::create($validated);

        return redirect()->route('estudantes.index')
                         ->with('success', 'Estudante criado com sucesso!');
    }

    // Exibe os detalhes de um estudante específico
    public function show(Estudante $estudante)
    {
        return view('estudantes.show', compact('estudante'));
    }

    // Exibe o formulário para edição do estudante
    public function edit(Estudante $estudante)
    {
        return view('estudantes.edit', compact('estudante'));
    }

    // Atualiza os dados do estudante no banco de dados
    public function update(Request $request, Estudante $estudante)
    {
        $rules = [
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|unique:estudantes,email,' . $estudante->id,
        ];

        // Caso o usuário deseje atualizar a senha
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        $validated = $request->validate($rules);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $estudante->update($validated);

        return redirect()->route('estudantes.index')
                         ->with('success', 'Estudante atualizado com sucesso!');
    }

    // Remove o estudante do banco de dados
    public function destroy(Estudante $estudante)
    {
        $estudante->delete();

        return redirect()->route('estudantes.index')
                         ->with('success', 'Estudante excluído com sucesso!');
    }
}
