<?php
/**
 * AUTHOR: Julian Bueno 
 */ 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    function registerScreen()
    {
        return view('auth.RegisterScreen');
    }

    /**
     * VIew for login of already registered users 
     */
    function loginScreen(Request $request)
    {
        if($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }
        return view('auth.LoginScreen');
    }

    function registerUser(Request $request)
    {
        $this->validate(
            $request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
            ]
        );
        User::create(
            [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => false,
            'balance' => 1000
            ]
        );
        auth()->attempt(
            [
            'email' => $request->email,
            'password' => $request->password
            ]
        );

        return redirect()->route('shop.index');
    }

    function logout(Request $request)
    {
        if($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }
        auth()->logout();
        return redirect()->route('auth.loginScreen');
    }


    function login(Request $request)
    {
        $this->validate(
            $request, [
            'email' => 'required|email',
            'password' => 'required'
            ]
        );
        if(! auth()->attempt(
            [
            'email' => $request->email,
            'password' => $request->password
            ], $request->remember
        )
        ) {
            return back()->with('viewData', ["message" => 'Invalid login details']);
        }
        return redirect()->route('shop.index');
    }
}
