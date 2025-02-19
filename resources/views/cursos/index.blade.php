@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Cursos</h2>
    <a href="{{ route('cursos.create') }}" class="btn btn-success">Adicionar Curso</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cursos as $curso)
        <tr>
            <td>{{ $curso->id }}</td>
            <td>{{ $curso->nome }}</td>
            <td>{{ $curso->descricao }}</td>
            <td>
                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este curso?')">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Nenhum curso encontrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
