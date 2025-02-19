@extends('layouts.app')

@section('title', 'Minhas Matrículas')

@section('content')
<div class="mb-4">
    <h2>Turmas Disponíveis</h2>
    <p>Selecione as turmas em que deseja se matricular:</p>
</div>

<form action="{{ route('matriculas.store') }}" method="POST">
    @csrf
    <div class="list-group">
        @foreach($turmas as $turma)
            <div class="list-group-item">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="turma_ids[]" value="{{ $turma->id }}" id="turma{{ $turma->id }}">
                    <label class="form-check-label" for="turma{{ $turma->id }}">
                        {{ $turma->nome }} – Curso: {{ $turma->curso->nome }} – Professor: {{ $turma->professor->nome }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary mt-3">Matricular-se nas selecionadas</button>
</form>
@endsection
