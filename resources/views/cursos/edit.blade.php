@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Curso</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo Nome -->
            <div class="form-group mb-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome', $curso->nome) }}" required>
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Descrição -->
            <div class="form-group mb-3">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" required>{{ old('descricao', $curso->descricao) }}</textarea>
                @error('descricao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
