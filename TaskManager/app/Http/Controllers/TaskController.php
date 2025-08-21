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

    // Deletar tarefa, garantindo que seja do usuário logado
    public function destroy(TaskModel $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Ação não autorizada.');
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
