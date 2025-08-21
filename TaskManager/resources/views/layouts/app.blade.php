<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task Manager</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body>
    <div class="container">
        <header>
            <h1 class="logo">Task Manager</h1>
            <nav>
                @if(Auth::check())
                    <span>Bem-vindo, {{ Auth::user()->name }}!</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Sair</button>
                    </form>
                <ul>
                    <li><a href="{{ route('tasks.index') }}">Tarefas</a></li>
                    <li><a href="{{ route('tasks.create') }}">Criar Tarefa</a></li>
                </ul>
                @else
                    <ul>
                        <li><a href="{{ route('login') }}">Entrar</a></li>
                        <li><a href="{{ route('register') }}">Registrar</a></li>
                    </ul>
                @endif    
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Task Manager</p>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        @yield('scripts')

    </div>