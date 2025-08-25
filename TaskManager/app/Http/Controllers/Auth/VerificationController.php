<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Token inválido ou expirado.');
        }

        $user->is_verified = true;
        $user->verification_token = null; // invalida o token
        $user->save();

        return redirect('/login')->with('success', 'Email confirmado com sucesso! Agora você pode fazer login.');
    }
}

