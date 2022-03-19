<?php
// AUTHOR: Julian Bueno

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function registerScreen()
    {
        return view('auth.RegisterScreen');
    }

    function loginScreen()
    {
        return view('auth.LoginScreen');
    }
}
