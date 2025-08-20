<h1 class="primary-title">Listas de Tarefas</h1>

@if($tasks->isEmpty())
    <p>Nenhuma tarefa encontrada.</p>
    <button class="new-task-btn">Criar nova Tarefa</button>
@else
    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->Nome }}</strong> - {{ $task->Descricao }}
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

<script>
    document.querySelector('.new-task-btn').addEventListener('click', function() {
        window.location.href = "{{ route('tasks.create') }}";
    });
</script>


