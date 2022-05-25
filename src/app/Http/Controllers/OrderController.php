<?php
// AUTHOR: Julian Bueno

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetFishes;
use App\Models\FoodFishes;
use App\Models\Order;
use App\Models\FishOrder;

class OrderController extends Controller
{
    function cart(Request $request)
    {
        $viewData = [];
        $viewData['items'] = [];
        $totalPrice = 0;
        if($request->session()->has('cart')) {
            $allFishes = PetFishes::all();
            $allFood = FoodFishes::all();
            foreach($request->session()->get('cart') as $fishItem){
                if($fishItem["type"] == "PET") {
                    array_push($viewData['items'], ["fish" => $allFishes->firstWhere("id", $fishItem["fishId"]), "quantity" => $fishItem["quantity"], "price" => $fishItem["price"], "type" => "PET"]);
                }
                else{
                    array_push($viewData['items'], ["fish" => $allFood->firstWhere("id", $fishItem["fishId"]), "quantity" => $fishItem["quantity"], "price" => $fishItem["price"], "type" => "FOOD"]);
                }
                $totalPrice += $fishItem['price'];
            }
        }
        $viewData['price'] = $totalPrice;
        return view('order.Cart')
        ->with('viewData', $viewData);
    }

    function addPet(PetFishes $petFishes, Request $request)
    {
        $this->validate(
            $request, [
            'quantity' => 'required|numeric|gt:0'
            ]
        );
        if(! $request->session()->has('cart')) {
            $request->session()->put('cart', []);
        }
        $request->session()->push('cart', ["type" => "PET", "quantity" => $request->quantity, "fishId" => $petFishes->getId(), "price" => $petFishes->getPrice() * $request->quantity]);
        return redirect()->route('order.cart');
    }

    function addFood(FoodFishes $foodFishes, Request $request)
    {
        $this->validate(
            $request, [
            'quantity' => 'required|numeric|gt:0'
            ]
        );
        if(! $request->session()->has('cart')) {
            $request->session()->put('cart', []);
        }
        $request->session()->push('cart', ["type" => "FOOD", "quantity" => $request->quantity, "fishId" => $foodFishes->getId(), "price" => $foodFishes->getPricePerKG() * $request->quantity]);
        return redirect()->route('order.cart');
    }

    function deleteItem(Request $request)
    {
        $type = $request->query('type');
        $fishId = $request->query('fishId');
        $cart = $request->session()->get('cart');
        $counter = 0;
        foreach($cart as $cartItem){
            if($cartItem["type"] == $type && $cartItem["fishId"] == $fishId) {
                array_splice($cart, $counter, 1);
                break;
            }
            $counter += 1;
        }
        $request->session()->put('cart', $cart);
        return redirect()->route('order.cart');
    }

    function checkout(Request $request)
    {
        $totalPrice = 0;
        foreach($request->session()->get('cart') as $cartItem){
            if($cartItem['type'] == "PET") {
                $fish = PetFishes::find($cartItem["fishId"]);
                if($fish->getInventory() < $cartItem["quantity"]) {
                    return view('order.NotEnoughBalance')
                        ->with('viewData', ["message" => __('messages.insuf_invt1').$fish->getSpecie()->getName().' '.$fish->getSize(). __('messages.insuf_invt2')]);
                }
            }
            else{
                $fish = FoodFishes::find($cartItem["fishId"]);
                if($fish->getInventoryKG() < $cartItem["quantity"]) {
                    return view('order.NotEnoughBalance')
                        ->with('viewData', ["message" => __('messages.insuf_invt1').$fish->getSpecie()->getName().' '.$fish->getCut().__('messages.insuf_invt2')]);
                }
            }
            $totalPrice += $cartItem['price'];
        }
        if(auth()->user()->getBalance() < $totalPrice) {
            return view('order.NotEnoughBalance')
            ->with('viewData', ["message" => __('messages.insuf_bal')]);
        }
        $newOrder = Order::create(
            [
            'user_id' => auth()->user()->getId()
            ]
        );
        foreach($request->session()->get('cart') as $cartItem){
            if($cartItem["type"] == "PET") {
                $fish = PetFishes::find($cartItem["fishId"]);
                FishOrder::create(
                    [
                    'type' => "PET",
                    'order_id' => $newOrder->getId(),
                    'pet_fishes_id' => $cartItem["fishId"],
                    'quantityFish' => $cartItem["quantity"],
                    'food_fishes_id' => null,
                    'quantityKG' => 0
                    ]
                );
                $fish->buy($cartItem['quantity']);
            }
            else{
                $fish = FoodFishes::find($cartItem["fishId"]);
                FishOrder::create(
                    [
                    'type' => "FOOD",
                    'order_id' => $newOrder->getId(),
                    'pet_fishes_id' => null,
                    'quantityFish' => 0,
                    'food_fishes_id' => $cartItem["fishId"],
                    'quantityKG' => $cartItem['quantity']
                    ]
                );
                $fish->buy($cartItem['quantity']);
            }
        }
        auth()->user()->setBalance(auth()->user()->getBalance() - $totalPrice);
        auth()->user()->save();
        $request->session()->forget('cart');
        return view('order.NotEnoughBalance')
        ->with('viewData', ["message" => __('messages.succ_purch')]);
    }
}
