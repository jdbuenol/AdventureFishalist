<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecieController extends Controller
{
    function index()
    {
        return view('specie.Index');
    }
}
