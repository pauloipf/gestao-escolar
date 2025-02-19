@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="text-center mb-4">
    <h1>Bem-vindo(a), {{ auth()->user()->name }}!</h1>
    <p class="lead">Escolha uma das opções abaixo:</p>
</div>

@if(auth()->user()->tipo == 'professor')
    <div class="row g-3">
        <div class="col-md-3">
            <a href="{{ route('estudantes.index') }}" class="btn btn-outline-primary w-100">Estudantes</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('professores.index') }}" class="btn btn-outline-primary w-100">Professores</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('turmas.index') }}" class="btn btn-outline-primary w-100">Turmas</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('cursos.index') }}" class="btn btn-outline-primary w-100">Cursos</a>
        </div>
    </div>
@elseif(auth()->user()->tipo == 'estudante')
    <div class="row g-3">
        <div class="col-md-6">
            <a href="{{ route('turmas.index') }}" class="btn btn-outline-primary w-100">Turmas Disponíveis</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('matriculas.index') }}" class="btn btn-outline-primary w-100">Minhas Matrículas</a>
        </div>
    </div>
@endif
@endsection
