<?php
// AUTHOR: Julian Bueno

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    function cart()
    {
        return view('order.Cart');
    }
}
