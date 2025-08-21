<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskModel;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Mostrar apenas tarefas do usuário logado
    public function index()
    {
        $tasks = TaskModel::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    // Tela de criação de tarefa
    public function create()
    {
        return view('tasks.create');
    }

    // Salvar nova tarefa associada ao usuário logado
    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required|string|max:255',
            'Descricao' => 'required|string|max:1000',
        ]);

        $task = new TaskModel($request->all());
        $task->user_id = Auth::id(); // associa ao usuário logado
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Tela de edição
    public function edit(TaskModel $task)
    {
        $this->authorize('update', $task); // Policy
        return view('tasks.edit', compact('task'));
    }

    // Atualizar tarefa
    public function update(Request $request, TaskModel $task)
    {
        $this->authorize('update', $task); // Policy

        $request->validate([
            'Nome' => 'required|string|max:255',
            'Descricao' => 'required|string|max:1000',
        ]);

        $task->update($request->only('Nome', 'Descricao'));
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Deletar tarefa
    public function destroy(TaskModel $task)
    {
        $this->authorize('delete', $task); // Policy
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    // Alternar status de concluída/pendente
    public function complete(TaskModel $task)
    {
        $this->authorize('toggle', $task); // Policy

        $task->Concluida = !$task->Concluida;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Status da tarefa atualizado.');
    }
}
