<?php
// AUTHOR: Julian Bueno

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    function index()
    {
        return view('shop.Index');
    }

    function petShop()
    {
        return view('shop.PetShop');
    }

    function foodShop()
    {
        return view('shop.FoodShop');
    }
}
