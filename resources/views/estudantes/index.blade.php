@extends('layouts.app')

@section('title', 'Lista de Estudantes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Estudantes</h2>
    <a href="{{ route('estudantes.create') }}" class="btn btn-success">Adicionar Estudante</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($estudantes as $estudante)
        <tr>
            <td>{{ $estudante->id }}</td>
            <td>{{ $estudante->nome }}</td>
            <td>{{ $estudante->email }}</td>
            <td>
                <a href="{{ route('estudantes.show', $estudante->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('estudantes.edit', $estudante->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('estudantes.destroy', $estudante->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Nenhum estudante encontrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
