<?php
//AUTHOR: Julian Bueno

namespace App\Http\Controllers\adminCRUD;

use Illuminate\Http\Request;
use App\Models\FoodFishes;
use App\Models\Specie;
use App\Http\Controllers\Controller;

const IMAGES = [
    '/Crab_Sticks.jpg', '/Lobster.jpg', '/Mojarra.jpg', '/Octopus.jpg', '/Oysters.jpg',
    '/Prawns.jpg', '/Salmon_Sashimi.jpg', '/Salmon_Sushi.jpg', '/Sardines.jpg', '/Tuna_Sashimi.jpg'
];

class foodFishesCRUD extends Controller
{
    function foodFishes()
    {
        $allFoodFishes = FoodFishes::latest()
            ->with('specie')
            ->paginate(10);
        return view('admin.FoodFishesTable')
        ->with('viewData', ["allFoodFishes" => $allFoodFishes]);
    }

    function foodFish(FoodFishes $foodFish)
    {
        return view('admin.FoodFish')
        ->with('viewData', ['fish' => $foodFish, 'error' => null]);
    }

    function newFoodFish()
    {
        return view('admin.FoodFishCreate')
        ->with('viewData', ["message" => null]);
    }

    function createFoodFish(Request $request)
    {
        $this->validate(
            $request, [
            'specie_id' => 'required',
            'cut' => 'required',
            'pricePerKG' => 'required|numeric|gt:0',
            'inventoryKG' => 'required|numeric|gte:0'
            ]
        );
        if(! Specie::find($request->specie_id)) {
            return view('admin.FoodFishCreate')
            ->with('viewData', ["message" => 'THIS SPECIE ID DOESN\'T EXIST']);
        }
        FoodFishes::create(
            [
            'specie_id' => $request->specie_id,
            'cut' => $request->cut,
            'image' => '/images/FoodFish'.IMAGES[array_rand(IMAGES, 1)],
            'pricePerKG' => $request->pricePerKG,
            'inventoryKG' => $request->inventoryKG,
            'quantityBought' => 0
            ]
        );

        return redirect()
        ->route('admin.foodFishes');
    }

    function updateFoodFish(FoodFishes $foodFish, Request $request)
    {
        $this->validate(
            $request, [
            'pricePerKG' => 'nullable|numeric|gt:0',
            'inventoryKG' => 'nullable|numeric|gte:0'
            ]
        );
        if($request->specie_id && ! Specie::find($request->specie_id)) {
            $viewData = [];
            $viewData['fish'] = $foodFish;
            $viewData['error'] = 'THIS SPECIE ID DOESN\'T EXIST';
            return view('admin.FoodFish')
            ->with('viewData', $viewData);
        }
        if($request->specie_id) { $foodFish->setSpecieId($request->specie_id);
        }
        if($request->cut != '') { $foodFish->setSize($request->cut);
        }
        if($request->inventoryKG) { $foodFish->setInventoryKG($request->inventoryKG);
        }
        if($request->pricePerKG) { $foodFish->setPricePerKG($request->pricePerKG);
        }
        $foodFish->save();
        return redirect()->route('admin.foodFish', $foodFish->getId());
    }

    function deleteFoodFish(FoodFishes $foodFish)
    {
        $foodFish->delete();
        return redirect()->route('admin.foodFishes');
    }
}
