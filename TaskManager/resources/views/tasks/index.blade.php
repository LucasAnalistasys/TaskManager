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
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</button>
                    </form>

                    <form action="{{ route('tasks.edit', $task->id) }}" method="GET" style="display:inline;">
                        <button type="submit">Editar</button>
                    </form>    

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


