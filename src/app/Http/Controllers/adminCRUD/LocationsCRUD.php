<?php
//AUTHOR: Julian Bueno

namespace App\Http\Controllers\adminCRUD;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Controllers\Controller;

class LocationsCRUD extends Controller
{
    function locations()
    {
        $allLocations = Location::latest()
        ->paginate(10);
        return view('admin.LocationsTable')
        ->with('viewData', ["allLocations" => $allLocations]);
    }

    function location(Location $location)
    {
        return view('admin.Location')
        ->with('viewData', ["location" => $location]);
    }

    function newLocation(){
        return view('admin.LocationCreate')
        ->with('viewData', ["message" => null]);
    }

    function createLocation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'geoLatitude' => 'required|numeric|between:-90,90',
            'geoLongitude' => 'required|numeric|between:-180,180',
            'country' => 'required|max:255'
        ]);
        Location::create([
            'name' => $request->name,
            'geoLatitude' => $request->geoLatitude,
            'geoLongitude' => $request->geoLongitude,
            'country' => $request->country
        ]);
        return redirect()
        ->route('admin.locations');
    }

    function updateLocation(location $location, Request $request)
    {

        $this->validate($request, [
            'name' => 'max:255',
            'country' => 'max:255',
            'geoLatitude' => 'nullable|numeric|between:-90,90',
            'geoLongitude' => 'nullable|numeric|between:-180,180'
        ]);
        if($request->name) $location->setName($request->name);
        if($request->country) $location->setCountry($request->country);
        if($request->geoLatitude) $location->setGeoLatitude($request->geoLatitude);
        if($request->geoLongitude) $location->setGeoLongitude($request->geoLongitude);
        $location->save();
        return redirect()->route('admin.location', $location->getId());
    }

    function deleteLocation(Location $location)
    {
        $location->delete();
        return redirect()->route('admin.locations');
    }
}
