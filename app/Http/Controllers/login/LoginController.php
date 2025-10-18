<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        // Check if email exists in User model
        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            // Login as User using web guard
            Auth::guard('web')->login($user);
            $request->session()->regenerate();
            
            // Redirect based on role
            if ($user->role == 1) {
                // Employee - redirect to employee dashboard
                return redirect()->intended('/employee/dashboard?login=success');
            } else {
                // Admin - redirect to admin dashboard
                return redirect()->intended('/dashboard?login=success');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        // Logout from web guard
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
