<?php
//AUTHOR: Juan Jose Madrigal
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\FoodFishes;
use App\Models\PetFishes;

class ShopController extends Controller
{
    function index()
    {
        $popularPets = PetFishes::orderBy('quantityBought', 'desc')
            ->with('specie')
            ->take(5)
            ->get();
        $popularFood = FoodFishes::orderBy('quantityBought', 'desc')
            ->with('specie')
            ->take(5)
            ->get();
        return view('shop.Index')
        ->with('viewData', ['popularPets' => $popularPets, 'popularFood' => $popularFood]);
    }

    function changeLang($locale)
    {
        App::setLocale($locale);
        session()->put("locale",$locale);
        return redirect()->back();
    }  

    function petShop()
    {
        $viewData=[];
        $viewData['petfishs'] = PetFishes::orderBy('quantityBought', 'desc')
            ->with(['specie'])
            ->paginate(16);
        return view('shop.PetShop')
        ->with("viewData", $viewData);
    }

    public function petShow($id, Request $request)
    {
        try {
            
            $viewData = [];
            $petFish = PetFishes::findOrFail($id);
            $viewData["petfish"] = $petFish;
            $viewData["cartButton"] = true;
            if($request->session()->has('cart')) {
                foreach($request->session()->get('cart') as $fishItem){
                    if($fishItem["type"] == "PET" && $fishItem["fishId"] == $id) {
                        $viewData["cartButton"] = false;
                        break;
                    }
                }
            }
            return view('shop.PetShopShow')
            ->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }

    function foodShop()
    {
        $viewData=[];
        $viewData['foodfishs'] = FoodFishes::orderBy('quantityBought', 'desc')
            ->with('specie')
            ->paginate(16);
        return view('shop.FoodShop')
        ->with("viewData", $viewData);
    }

    public function foodShow($id, Request $request)
    {
        try {
            $viewData = [];
            $foodFish = FoodFishes::findOrFail($id);
            $viewData["foodfish"] = $foodFish;
            $viewData["cartButton"] = true;
            if($request->session()->has('cart')) {
                foreach($request->session()->get('cart') as $fishItem){
                    if($fishItem["type"] == "FOOD" && $fishItem["fishId"] == $id) {
                        $viewData["cartButton"] = false;
                        break;
                    }
                }
            }
            return view('shop.FoodShopShow')
            ->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }

    public function getRandomPet()
    {
        return redirect()
            ->route(
                'shop.petshopshow', PetFishes::inRandomOrder()
                    ->first()
                    ->getId()
            );
    }

    public function getRandomFood()
    {
        return redirect()
            ->route(
                'shop.foodshopshow', FoodFishes::inRandomOrder()
                    ->first()
                    ->getId()
            );
    }
}
