@extends('layouts.app')

@section('title', 'Detalhes do Estudante')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalhes do Estudante</h3>
    </div>
    <div class="card-body">
        <p><strong>Nome:</strong> {{ $estudante->nome }}</p>
        <p><strong>Email:</strong> {{ $estudante->email }}</p>
        <!-- Exiba outros campos conforme necessário -->

        <a href="{{ route('estudantes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection
