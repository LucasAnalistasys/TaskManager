@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">
@endsection

@section('content')
<div class="edit-container">
    <h1>Editar Tarefa</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="edit-form">
            <label for="Nome">Nome da Tarefa</label>
            <input type="text" name="Nome" id="Nome" class="form-control" value="{{ $task->Nome }}" required>
            <label for="Descricao">Descrição</label>
            <textarea name="Descricao" id="Descricao" class="form-control" required>{{ $task->Descricao }}</textarea>
            <button type="submit" class="task-submit-btn">Atualizar Tarefa</button>
        </div>
    </form>
@endsection