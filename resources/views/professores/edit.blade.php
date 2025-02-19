@extends('layouts.app')

@section('title', 'Editar Professor')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Professor</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('professores.update', $professor) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo Nome -->
            <div class="form-group mb-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" 
                       value="{{ old('nome', $professor->nome) }}" required>
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Email -->
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email', $professor->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Senha (opcional) -->
            <div class="form-group mb-3">
                <label for="password">Senha <small class="text-muted">(Deixe em branco para não alterar)</small></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Digite uma nova senha se desejar">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Confirmação de Senha (opcional) -->
            <div class="form-group mb-3">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirme a nova senha">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('professores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
