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
}
