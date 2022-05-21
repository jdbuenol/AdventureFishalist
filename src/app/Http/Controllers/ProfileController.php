<?php
// AUTHOR: Julian Bueno

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function profile()
    {
        return view('profile.Profile')
        ->with('viewData', ["user" => auth()->user()]);
    }
}
