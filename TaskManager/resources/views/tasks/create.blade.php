@extends('layouts.app')

@section('title', 'Criar Tarefa')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">
@endsection    

@section('content')

<div class="create-container">
    <h1>Criar Tarefa</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="create-form">
            <label for="Nome">Nome da Tarefa</label>
            <input type="text" name="Nome" id="Nome" class="form-control" required>
            <label for="Descricao">Descrição</label>
            <textarea name="Descricao" id="Descricao" class="form-control" required></textarea>
            <button type="submit" class="task-submit-btn">Adicionar Tarefa</button>
        </div>
    </form>
        
</div>

@endsection