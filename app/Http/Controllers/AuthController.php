<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormSignup()
    {
        return view('auth.signup');
    }

    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function signup(SignupRequest $request)
    {
    
        $user = User::query()->create($request->all());

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login()
    {
        $credentials = \request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            \request()->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        \request()->session()->invalidate();

        \request()->session()->regenerateToken();

        return redirect('/');
    }
}