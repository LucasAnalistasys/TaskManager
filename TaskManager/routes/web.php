<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');