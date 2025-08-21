@extends('layouts.app')

@section('content')
<div class="login-container">
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
    </form>
    <div class="register-link">
        <p>Ainda não possui uma conta? <a href="{{ route('register') }}">Se Inscreva aqui</a></p>
    </div>        

@endSection