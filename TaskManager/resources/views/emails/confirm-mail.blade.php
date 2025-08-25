

    <p>Olá {{ $user->name }},</p>
    <p>Obrigado por se cadastrar! Clique no link abaixo para confirmar seu email:</p>
    <a href="{{ url('/verify-email/'.$token) }}">Confirmar Email</a>
    <p>Se você não se cadastrou, ignore este email.</p>


