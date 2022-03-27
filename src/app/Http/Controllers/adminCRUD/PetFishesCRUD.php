<?php
//AUTHOR: Julian Bueno

namespace App\Http\Controllers\adminCRUD;

use Illuminate\Http\Request;
use App\Models\PetFishes;
use App\Models\Specie;
use App\Http\Controllers\Controller;

const IMAGES = [
    '/Betta.jpg', '/Carp.jpg', '/Cichlid.jpg', '/Clownfish.jpg', '/Goldfish.jpg',
    '/Guppy.jpg', '/Heckel_Discus.jpg', '/Molly.jpg', '/SeaHorse.jpg', '/Tetra.jpg'
];

class petFishesCRUD extends Controller
{
    function petFishes()
    {
        $allPetFishes = PetFishes::latest()
        ->with('specie')
        ->paginate(10);
        return view('admin.PetFishesTable')
        ->with('viewData', $allPetFishes);
    }

    function petFish(PetFishes $petFish)
    {
        error_log($petFish);
        return view('admin.PetFish')
        ->with('viewData', ['fish' => $petFish, 'error' => null]);
    }

    function newPetFish(){
        return view('admin.PetFishCreate')
        ->with('viewData', null);
    }

    function createPetFish(Request $request)
    {
        $this->validate($request, [
            'specie_id' => 'required',
            'size' => 'required',
            'price' => 'required|numeric|gt:0',
            'inventory' => 'required|numeric|gte:0'
        ]);
        if(! Specie::find($request->specie_id)){
            return view('admin.PetFishCreate')
            ->with('viewData', 'THIS SPECIE ID DOESN\'T EXIST');
        }
        PetFishes::create([
            'specie_id' => $request->specie_id,
            'size' => $request->size,
            'image' => '/images/PetFish'.IMAGES[array_rand(IMAGES, 1)],
            'price' => $request->price,
            'inventory' => $request->inventory
        ]);

        return redirect()
        ->route('admin.petFishes');
    }

    function updatePetFish(PetFishes $petFish, Request $request)
    {
        $this->validate($request, [
            'price' => 'nullable|numeric|gt:0',
            'inventory' => 'nullable|numeric|gte:0'
        ]);
        if($request->specie_id && ! Specie::find($request->specie_id)){
            $viewData = [];
            $viewData['fish'] = $petFish;
            $viewData['error'] = 'THIS SPECIE ID DOESN\'T EXIST';
            return view('admin.PetFish')
            ->with('viewData', $viewData);
        }
        if($request->specie_id) $petFish->setSpecieId($request->specie_id);
        if($request->size != '') $petFish->setSize($request->size);
        if($request->inventory) $petFish->setInventory($request->inventory);
        if($request->price) $petFish->setPrice($request->price);
        $petFish->save();
        return redirect()->route('admin.petFish', $petFish->getId());
    }

    function deletePetFish(PetFishes $petFish)
    {
        $petFish->delete();
        return redirect()->route('admin.petFishes');
    }
}
