<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Models\TaskModel;
use Illuminate\Http\Request;


Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'LoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'Login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::get('/register', [LoginController::class, 'RegisterForm'])->name('register');

Route::post('/register', [LoginController::class, 'Register'])->name('register.post');


Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.delete');

});