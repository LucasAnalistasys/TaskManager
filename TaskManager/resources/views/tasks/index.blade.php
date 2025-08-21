@extends('layouts.app')

@section('title', 'Tarefas')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">
@endsection

@section('content')
<h1 class="primary-title">Listas de Tarefas</h1>

@if(Auth::check())
    @if($tasks->isEmpty())
        <p>Nenhuma tarefa encontrada.</p>
        <button class="new-task-btn">Criar nova Tarefa</button>
    @else
        <ul>
            @foreach($tasks as $task)
                <li>
                    <strong>{{ $task->Nome }}</strong> - {{ $task->Descricao }}
                    <a href="{{ route('tasks.delete', $task->id) }}" 
                        class="delete-task-btn"
                        onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                            Excluir
                    </a>
                    @if($task->Concluida)
                        <span class="text-success">Concluída</span>
                    @else
                        <span class="text-danger">Pendente</span>
                    @endif
                </li>
            @endforeach 
        </ul>

        <button class="new-task-btn">Criar nova Tarefa</button>
    @endif
@else
    <p class="welcome-message">Por favor, <a href="{{ route('login') }}">faça login</a> 
    ou <a href="{{ route('register') }}">registre-se</a> para gerenciar suas tarefas.</p>
@endif



<script>
    document.querySelector('.new-task-btn').addEventListener('click', function() {
        window.location.href = "{{ route('tasks.create') }}";
    });
</script>

@endsection


