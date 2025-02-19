@extends('layouts.app')

@section('title', 'Detalhes do Professor')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalhes do Professor</h3>
    </div>
    <div class="card-body">
        <p><strong>Nome:</strong> {{ $professor->nome }}</p>
        <p><strong>Email:</strong> {{ $professor->email }}</p>
        <p><strong>Departamento:</strong> {{ $professor->departamento ?? 'Não informado' }}</p>
        <a href="{{ route('professores.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection
