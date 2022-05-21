<?php
//AUTHOR: Julian Bueno

namespace App\Http\Controllers\adminCRUD;

use Illuminate\Http\Request;
use App\Models\FishOrder;
use App\Models\FoodFishes;
use App\Models\PetFishes;
use App\Models\Order;
use App\Http\Controllers\Controller;

class FishOrdersCRUD extends Controller
{
    function fishOrders()
    {
        $allFishOrders = FishOrder::latest()
            ->with(['petFishes', 'foodFishes', 'order'])
            ->paginate(10);
        return view('admin.FishOrdersTable')
        ->with('viewData', ["allFishOrders" => $allFishOrders]);
    }

    function fishOrder(FishOrder $fishOrder)
    {
        return view('admin.FishOrder')
        ->with('viewData', ['order' => $fishOrder, 'error' => null]);
    }

    function newFishOrder()
    {
        return view('admin.FishOrderCreate')
        ->with('viewData', ["message" => null]);
    }

    function createFishOrder(Request $request)
    {
        $this->validate(
            $request, [
            'type' => 'required',
            'order_id' => 'required',
            ]
        );
        if(! Order::find($request->order_id)) {
            return view('admin.FishOrderCreate')
            ->with('viewData', ["message" => 'THIS ORDER ID DOESN\'T EXIST']);
        }

        if($request->type == 'PET') {
            $this->validate(
                $request, [
                'petFish_id' => 'required',
                'quantityFish' => 'required|numeric|gt:0'
                ]
            );
            if(! PetFishes::find($request->petFish_id)) {
                return view('admin.FishOrderCreate')
                ->with('viewData', ["message" => 'THIS PET FISH ID DOESN\'T EXIST']);
            }
            FishOrder::create(
                [
                'type' => $request->type,
                'order_id' => $request->order_id,
                'pet_fishes_id' => $request->petFish_id,
                'quantityFish' => $request->quantityFish,
                'food_fishes_id' => null,
                'quantityKG' => 0
                ]
            );
        }
        else if($request->type == 'FOOD') {
            $this->validate(
                $request, [
                'foodFish_id' => 'required',
                'quantityKG' => 'required|gt:0'
                ]
            );
            if(! FoodFishes::find($request->foodFish_id)) {
                return view('admin.FishOrderCreate')
                ->with('viewData', ["message" => 'THIS FOOD FISH ID DOESN\'T EXIST']);
            }
            FishOrder::create(
                [
                'type' => $request->type,
                'order_id' => $request->order_id,
                'food_fishes_id' => $request->foodFish_id,
                'quantityKG' => $request->quantityKG,
                'pet_fishes_id' => null,
                'quantityFish' => 0
                ]
            );
        }
        else{
            return view('admin.FishOrderCreate')
            ->with('viewData', ["message" => 'INVALID TYPE OF ORDER']);
        }
        return redirect()
        ->route('admin.fishOrders');
    }

    function updateFishOrder(FishOrder $fishOrder, Request $request)
    {
        if($request->order_id && ! Order::find($request->order_id)) {
            $viewData = [];
            $viewData['order'] = $fishOrder;
            $viewData['error'] = 'THIS ORDER ID DOESN\'T EXIST';
            return view('admin.FishOrder')
            ->with('viewData', $viewData);
        }
        if($fishOrder->getType() == 'PET') {
            $this->validate(
                $request, [
                'quantityFish' => 'nullable|numeric|gt:0'
                ]
            );
            if($request->petFish_id && ! PetFishes::find($request->petFish_id)) {
                $viewData = [];
                $viewData['order'] = $fishOrder;
                $viewData['error'] = 'THIS PET FISH ID DOESN\'T EXIST';
                return view('admin.FishOrder')
                ->with('viewData', $viewData);
            }
            if($request->petFish_id) { $fishOrder->setPetFishId($request->petFish_id);
            }
            if($request->quantityFish) { $fishOrder->setQuantityFish($request->quantityFish);
            }
        }
        else if($fishOrder->getType() == 'FOOD') {
            $this->validate(
                $request, [
                'quantityKG' => 'nullable|numeric|gt:0'
                ]
            );
            if($request->foodFish_id && ! FoodFishes::find($request->foodFish_id)) {
                $viewData = [];
                $viewData['order'] = $fishOrder;
                $viewData['error'] = 'THIS FOOD FISH ID DOESN\'T EXIST';
                return view('admin.FishOrder')
                ->with('viewData', $viewData);
            }
            if($request->foodFish_id) { $fishOrder->setFoodFishesId($request->foodFish_id);
            }
            if($request->quantityKG) { $fishOrder->setQuantityKG($request->quantityKG);
            }
        }
        else{
            $viewData = [];
            $viewData['order'] = $fishOrder;
            $viewData['error'] = 'INVALID TYPE OF ORDER';
            return view('admin.FishOrder')
            ->with('viewData', $viewData);
        }
        if($request->order_id) { $fishOrder->setOrderId($request->order_id);
        }
        $fishOrder->save();
        return redirect()
            ->route('admin.fishOrder', $fishOrder->getId());
    }

    function deleteFishOrder(FishOrder $fishOrder)
    {
        $fishOrder->delete();
        return redirect()->route('admin.fishOrders');
    }
}
