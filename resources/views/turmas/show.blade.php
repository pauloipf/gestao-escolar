@extends('layouts.app')

@section('title', 'Detalhes da Turma')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalhes da Turma</h3>
    </div>
    <div class="card-body">
        <p><strong>Nome:</strong> {{ $turma->nome }}</p>
        <p><strong>Curso:</strong> {{ $turma->curso->nome }}</p>
        <p><strong>Professor:</strong> {{ $turma->professor->nome }}</p>
        <!-- Se desejar, exiba os estudantes matriculados -->
        <h5>Estudantes Matriculados:</h5>
        <ul>
            @foreach($turma->estudantes as $estudante)
                <li>{{ $estudante->nome }}</li>
            @endforeach
        </ul>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection
