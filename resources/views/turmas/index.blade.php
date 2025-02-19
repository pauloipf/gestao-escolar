@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
<div class="mb-3">
    <h2>Turmas Disponíveis</h2>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Curso</th>
            <th>Professor</th>
            @if(auth()->user()->tipo === 'professor')
                <th>Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($turmas as $turma)
        <tr>
            <td>{{ $turma->id }}</td>
            <td><a href="{{ route('turmas.show', $turma->id) }}">{{ $turma->nome }}</a></td>
            <td>{{ $turma->curso->nome }}</td>
            <td>{{ $turma->professor->nome }}</td>
            @if(auth()->user()->tipo === 'professor')
            <td>
                <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </td>
            @endif
        </tr>
        @empty
        <tr>
            <td colspan="{{ auth()->user()->tipo === 'professor' ? 5 : 4 }}" class="text-center">Nenhuma turma encontrada.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
