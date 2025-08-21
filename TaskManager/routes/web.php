<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'LoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'Login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::get('/register', [LoginController::class, 'RegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'Register'])->name('register.post');

// Rotas de tarefas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
