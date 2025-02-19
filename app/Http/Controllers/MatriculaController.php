<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use Illuminate\Support\Facades\Auth;

class MatriculaController extends Controller
{
    // Lista as turmas disponíveis (pode filtrar para não mostrar as que o estudante já está matriculado)
    public function index()
    {
        $turmas = Turma::with(['curso', 'professor'])->get();
        return view('matriculas.index', compact('turmas'));
    }

    // Processa a matrícula do estudante
    public function store(Request $request)
    {
        $request->validate([
            'turma_ids' => 'required|array',
            'turma_ids.*' => 'exists:turmas,id',
        ]);
        
        // Supondo que o usuário autenticado é o estudante e que a relação 'turmas'
        // foi definida no model User (ou no model Estudante, se estiver usando um guard customizado)
        $user = Auth::user();
        $user->turmas()->syncWithoutDetaching($request->turma_ids);
        
        return redirect()->route('matriculas.index')->with('success', 'Matrículas realizadas com sucesso!');
    }
}
