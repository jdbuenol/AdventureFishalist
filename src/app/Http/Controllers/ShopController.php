<?php
//AUTHOR: Juan Jose Madrigal
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\FoodFishes;
use App\Models\PetFishes;

class ShopController extends Controller
{
    function index()
    {
        return view('shop.Index');
    }

    function petShop()
    {
        $viewData=[];
        $viewData['petfishs'] = PetFishes::all();
        return view('shop.PetShop')
        ->with("viewData",$viewData);
    }

    public function petShow($id)
    {
        try {
            $viewData = [];
            $petFish = PetFishes::findOrFail($id);
            $viewData["petfish"] = $petFish;
            return view('shop.PetShopShow')
            ->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }

    function foodShop()
    {
        $viewData=[];
        $viewData['foodfishs'] = FoodFishes::all();
        return view('shop.FoodShop')
        ->with("viewData",$viewData);
    }

    public function foodShow($id)
    {
        try {
            $viewData = [];
            $foodFish = FoodFishes::findOrFail($id);
            $viewData["foodfish"] = $foodFish;
            return view('shop.FoodShopShow')
            ->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }
}
