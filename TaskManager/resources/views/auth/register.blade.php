@extends('layouts.app')

@section('content')
<div class="register-container">
    <h1>Registrar</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirme a Senha</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Registrar
            </button>
        </div>
    </form>
    
    <div class="login-link">
        <p>Já possui uma conta? <a href="{{ route('login') }}">Entrar</a></p>
    </div>
</div>  
@endsection    