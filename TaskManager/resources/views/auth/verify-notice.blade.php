@extends('layouts.app')

@section('title', 'Notificação de e-mail')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/mail.css') }}">
@endsection

@section('content')
    
    <p>Você precisa confirmar seu email antes de logar.</p>
    <p>Verifique sua caixa de entrada e clique no link enviado.</p>


@endsection