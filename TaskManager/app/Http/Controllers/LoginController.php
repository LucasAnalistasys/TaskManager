<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TaskModel;
use Illuminate\Support\Facades\Hash;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;



class LoginController extends Controller
{
    public function LoginForm()
    {
        return view('auth.login');
    }

    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            if (!Auth::user()->is_verified) {
                Auth::logout();
                return redirect()->route('verify.notice');
            }
            return redirect()->intended('/')->with('success', 'Login successful.');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    public function RegisterForm()
    {
        return view('auth.register');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $token = bin2hex(random_bytes(16));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_verified' => false, 
            'verification_token' => $token,
        ]);

        // Aqui você pode enviar o email de verificação usando o token
        Mail::to($user->email)->send(new ConfirmMail($user, $user->verification_token));

        return redirect()->route('/')->with('success', 'Registration successful.');
    }



}
