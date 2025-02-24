@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Turmas</h2>
    <a href="{{ route('turmas.create') }}" class="btn btn-success">Adicionar Turma</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Curso</th>
            <th>Professor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($turmas as $turma)
        <tr>
            <td>{{ $turma->id }}</td>
            <td>{{ $turma->nome }}</td>
            <td>{{ $turma->curso->nome }}</td>
            <td>{{ $turma->professor->nome }}</td>
            <td>
                <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza de excluir esta turma?')">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Nenhuma turma encontrada.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
