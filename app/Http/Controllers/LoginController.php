<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin()
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('login');
    }
    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors(['Email And Password is invalid!'])->withInput();
        }
    }
}
