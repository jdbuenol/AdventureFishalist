<?php
// AUTHOR: Julian Bueno

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    function forbidden()
    {
        return view('error.403');
    }
}
