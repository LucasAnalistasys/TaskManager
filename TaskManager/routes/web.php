<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\ConfirmMail;

Route::get('/teste-mail', function() {
    $user = App\Models\User::first();
    Mail::to($user->email)->send(new App\Mail\ConfirmMail($user, '123456'));
    return 'Email de teste enviado!';
});

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'LoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'Login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::get('/register', [LoginController::class, 'RegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'Register'])->name('register.post');

//Rota para Verificação de Email
Route::get('/verify-email/{token}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verify.email');

// Rota para aviso de verificação de email
Route::get('/verify-notice', function () {
    return view('auth.verify-notice');
})->name('verify.notice');

// Rotas de tarefas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'complete'])->name('tasks.update');
});
