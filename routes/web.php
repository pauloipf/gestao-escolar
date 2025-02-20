<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;


// Rota pública inicial (pode ser um welcome ou redirecionar para login)
Route::get('/', function () {
    return view('login');
});

// Grupo de rotas protegidas (apenas usuários autenticados)
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('home');
    })->middleware('auth')->name('dashboard');

    Route::get('/', function () {
        return view('home');
    })->middleware('auth')->name('home');
    

    // Outras rotas do sistema
    Route::resource('estudantes', EstudanteController::class);
    Route::resource('professores', ProfessorController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('matriculas', MatriculaController::class)->only(['index', 'store', 'destroy']);
});

// Rotas de autenticação (gerenciadas por Breeze, Fortify, etc.)
require __DIR__ . '/auth.php';
