<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('welcome');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:5|required|confirmed'

        ]);
        $user = new User;
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = $validate['password'];
        $user->save();
        return back()->with('message', 'Register Sucessfully');
    }
}
