<?php
// AUTHOR: Julian Bueno

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetFishes;
use App\Models\FoodFishes;

class OrderController extends Controller
{
    function cart(Request $request)
    {
        $viewData = [];
        foreach($request->session()->get('cart') as $fishItem){
            if($fishItem["type"] == "PET"){
                array_push($viewData, ["fish" => PetFishes::find($fishItem["fishId"]), "quantity" => $fishItem["quantity"], "type" => "PET"]);
            }
            else{
                array_push($viewData, ["fish" => FoodFishes::find($fishItem["fishId"]), "quantity" => $fishItem["quantity"], "type" => "FOOD"]);
            }
        }
        foreach($viewData as $item){
            error_log($item["fish"]);
            error_log("\n");
        }
        return view('order.Cart')
        ->with('viewData', $viewData);
    }

    function addPet(PetFishes $petFishes, Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required|numeric|gt:0'
        ]);
        if(! $request->session()->has('cart')){
            $request->session()->put('cart', []);
        }
        $request->session()->push('cart', ["type" => "PET", "quantity" => $request->quantity, "fishId" => $petFishes->getId()]);
        return redirect()->route('order.cart');
    }

    function addFood(FoodFishes $foodFishes, Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required|numeric|gt:0'
        ]);
        if(! $request->session()->has('cart')){
            $request->session()->put('cart', []);
        }
        $request->session()->push('cart', ["type" => "FOOD", "quantity" => $request->quantity, "fishId" => $foodFishes->getId()]);
        return redirect()->route('order.cart');
    }

    function deleteItem(Request $request)
    {
        $type = $request->query('type');
        $fishId = $request->query('fishId');
        $cart = $request->session()->get('cart');
        $counter = 0;
        foreach($cart as $cartItem){
            if($cartItem["type"] == $type && $cartItem["fishId"] == $fishId){
                array_splice($cart, $counter, 1);
                break;
            }
            $counter += 1;
        }
        $request->session()->put('cart', $cart);
        return redirect()->route('order.cart');
    }
}
