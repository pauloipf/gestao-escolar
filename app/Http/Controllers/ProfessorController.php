<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfessorController extends Controller
{
    public function index()
    {
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    public function create()
    {
        return view('professores.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:professores,email',
            'password'              => 'required|string|min:6|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Professor::create($validated);

        return redirect()->route('professores.index')
            ->with('success', 'Professor criado com sucesso!');
    }


    public function show(Professor $professor)
    {
        return view('professores.show', compact('professor'));
    }

    public function edit(Professor $professor)
    {
        return view('professores.edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        $rules = [
            'nome'         => 'required|string|max:255',
            'email'        => 'required|email|unique:professores,email,' . $professor->id,
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        $validated = $request->validate($rules);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $professor->update($validated);

        return redirect()->route('professores.index')
            ->with('success', 'Professor atualizado com sucesso!');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()->route('professores.index')
            ->with('success', 'Professor excluído com sucesso!');
    }
}
