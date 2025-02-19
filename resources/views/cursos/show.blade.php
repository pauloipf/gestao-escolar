@extends('layouts.app')

@section('title', 'Detalhes do Curso')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalhes do Curso</h3>
    </div>
    <div class="card-body">
        <p><strong>Nome:</strong> {{ $curso->nome }}</p>
        <p><strong>Descrição:</strong> {{ $curso->descricao }}</p>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection
