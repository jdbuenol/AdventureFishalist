<?php
//AUTHOR: Julian Bueno

namespace App\Http\Controllers\adminCRUD;

use Illuminate\Http\Request;
use App\Models\Specie;
use App\Http\Controllers\Controller;

class SpeciesCRUD extends Controller
{
    function species()
    {
        $allSpecies = Specie::latest()
        ->paginate(10);
        return view('admin.SpeciesTable')
        ->with('viewData', ["allSpecies" => $allSpecies]);
    }

    function specie(Specie $specie)
    {
        return view('admin.Specie')
        ->with('viewData', ["specie" => $specie]);
    }

    function newSpecie(){
        return view('admin.SpecieCreate');
    }

    function createSpecie(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Specie::create([
            'name' => $request->name
        ]);
        
        return redirect()->route('admin.species');
    }

    function updateSpecie(Specie $specie, Request $request)
    {
        $this->validate($request, [
            'name' => 'max:255',
        ]);
        if($request->name) $specie->setName($request->name);
        $specie->save();
        return redirect()->route('admin.specie', $specie->getId());
    }

    function deleteSpecie(Specie $specie)
    {
        $specie->delete();
        return redirect()->route('admin.species');
    }
}
