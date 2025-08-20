<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskModel;

class TaskController extends Controller
{
    public function index(){
        $tasks = TaskModel::all();
        return view('tasks.index', compact('tasks'));
    }

   public function create(){
        return view('tasks.create');
   }
   
    public function store(Request $request){
          $request->validate([
                'Nome' => 'required|string|max:255',
                'Descricao' => 'required|string|max:1000',
          ]);
    
          TaskModel::create($request->all());
          return redirect()->route('index')->with('success', 'Task created successfully.');
     }
}
