@extends('layouts.app')

@section('title', 'Criar Curso')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Criar Curso</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf

            <!-- Campo Nome -->
            <div class="form-group mb-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" placeholder="Digite o nome do curso" required>
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Descrição -->
            <div class="form-group mb-3">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" placeholder="Digite uma descrição para o curso">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
