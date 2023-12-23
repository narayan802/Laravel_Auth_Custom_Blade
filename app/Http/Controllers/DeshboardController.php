<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeshboardController extends Controller
{

    public function showdata()
    {

        return view('dashboard');
    }
}
