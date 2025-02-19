<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstudanteController extends Controller
{
    public function index()
    {
        $estudantes = Estudante::all();
        return view('estudantes.index', compact('estudantes'));
    }

    public function create()
    {
        return view('estudantes.create');
    }

    public function show(Estudante $estudante)
    {
        return view('estudantes.show', compact('estudante'));
    }

    public function edit(Estudante $estudante)
    {
        return view('estudantes.edit', compact('estudante'));
    }

    public function update(Request $request, Estudante $estudante)
    {
        $rules = [
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|unique:estudantes,email,' . $estudante->id,
        ];

        // Se o usuário deseja atualizar a senha
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        $validated = $request->validate($rules);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Removendo o campo password para não sobrescrever com null
            unset($validated['password']);
        }

        $estudante->update($validated);

        return redirect()->route('estudantes.index')
            ->with('success', 'Estudante atualizado com sucesso!');
    }


    public function destroy(Estudante $estudante)
    {
        $estudante->delete();

        return redirect()->route('estudantes.index');
    }
}
