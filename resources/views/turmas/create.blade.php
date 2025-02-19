@extends('layouts.app')

@section('title', 'Criar Turma')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Criar Turma</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('turmas.store') }}" method="POST">
            @csrf

            <!-- Campo Nome da Turma -->
            <div class="form-group mb-3">
                <label for="nome">Nome da Turma</label>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Ex: Turma A" value="{{ old('nome') }}" required>
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Seleção do Curso -->
            <div class="form-group mb-3">
                <label for="curso_id">Curso</label>
                <select name="curso_id" id="curso_id" class="form-control @error('curso_id') is-invalid @enderror" required>
                    <option value="">Selecione um curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>{{ $curso->nome }}</option>
                    @endforeach
                </select>
                @error('curso_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Seleção do Professor -->
            <div class="form-group mb-3">
                <label for="professor_id">Professor</label>
                <select name="professor_id" id="professor_id" class="form-control @error('professor_id') is-invalid @enderror" required>
                    <option value="">Selecione um professor</option>
                    @foreach($professores as $professor)
                        <option value="{{ $professor->id }}" {{ old('professor_id') == $professor->id ? 'selected' : '' }}>{{ $professor->nome }}</option>
                    @endforeach
                </select>
                @error('professor_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
