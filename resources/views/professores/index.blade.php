@extends('layouts.app')

@section('title', 'Lista de Professores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Professores</h2>
    <a href="{{ route('professores.create') }}" class="btn btn-success">Adicionar Professor</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Departamento</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($professores as $professor)
        <tr>
            <td>{{ $professor->id }}</td>
            <td>{{ $professor->nome }}</td>
            <td>{{ $professor->email }}</td>
            <td>{{ $professor->departamento ?? 'N/I' }}</td>
            <td>
                <a href="{{ route('professores.show', $professor->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('professores.destroy', $professor->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este professor?')">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Nenhum professor encontrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
