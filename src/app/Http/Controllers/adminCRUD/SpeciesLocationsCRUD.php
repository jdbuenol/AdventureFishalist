<?php
//AUTHOR: Julian Bueno

namespace App\Http\Controllers\adminCRUD;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Specie;
use App\Models\SpecieLocation;
use App\Http\Controllers\Controller;

class SpeciesLocationsCRUD extends Controller
{
    function speciesLocations()
    {
        $allSpeciesLocations = SpecieLocation::latest()
        ->with(['location', 'specie'])
        ->paginate(10);
        return view('admin.SpeciesLocationsTable')
        ->with('viewData', $allSpeciesLocations);
    }

    function specieLocation(SpecieLocation $specieLocation)
    {
        return view('admin.SpecieLocation')
        ->with('viewData', ['specieLocation' => $specieLocation, 'error' => null]);
    }

    function newSpecieLocation(){
        return view('admin.SpecieLocationCreate')
        ->with('viewData', null);
    }

    function createSpecieLocation(Request $request)
    {
        $this->validate($request, [
            'poblationalDensity' => 'required|numeric|gt:0',
            'specie_id' => 'required',
            'location_id' => 'required'
        ]);

        if(! Specie::find($request->specie_id)){
            return view('admin.SpecieLocationCreate')
            ->with('viewData', 'THIS SPECIE ID DOESN\'T EXIST');
        }
        if(! Location::find($request->location_id)){
            return view('admin.SpecieLocationCreate')
            ->with('viewData', 'THIS LOCATION ID DOESN\'T EXIST');
        }
        SpecieLocation::create([
            'poblationalDensity' => $request->poblationalDensity,
            'specie_id' => $request->specie_id,
            'location_id' => $request->location_id
        ]);

        return redirect()
        ->route('admin.speciesLocations');
    }

    function updateSpecieLocation(SpecieLocation $specieLocation, Request $request)
    {
        $this->validate($request, [
            'poblationalDensity' => 'nullable|numeric|gt:0'
        ]);
        if($request->location_id && ! Location::find($request->location_id)){
            $viewData = [];
            $viewData['error'] = 'THIS LOCATION ID DOESN\'T EXIST';
            $viewData['specieLocation'] = $specieLocation;
            return view('admin.SpecieLocation')
            ->with('viewData', $viewData);
        }
        if($request->specie_id && ! Specie::find($request->specie_id)){
            $viewData = [];
            $viewData['error'] = 'THIS SPECIE ID DOESN\'T EXIST';
            $viewData['specieLocation'] = $specieLocation;
            return view('admin.SpecieLocation')
            ->with('viewData', $viewData);
        }
        if($request->poblationalDensity) $specieLocation->setPoblationalDensity($request->poblationalDensity);
        if($request->specie_id) $specieLocation->setSpecieId($request->specie_id);
        if($request -> location_id) $specieLocation->setLocationId($request->location_id);
        $specieLocation->save();
        return redirect()->route('admin.specieLocation', $specieLocation->getId());
    }

    function deleteSpecieLocation(SpecieLocation $specieLocation)
    {
        $specieLocation->delete();
        return redirect()->route('admin.speciesLocations');
    }
}
