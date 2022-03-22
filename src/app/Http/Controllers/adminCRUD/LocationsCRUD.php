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
        ->with('viewData', $allLocations);
    }

    function location(Location $location)
    {
        return view('admin.Location')
        ->with('viewData', $location);
    }

    function newLocation(){
        return view('admin.LocationCreate')
        ->with('viewData', null);
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
        if($request->name){
            $this->validate($request, [
                'name' => 'max:255'
            ]);
        }
        if($request->country){
            $this->validate($request, [
                'country' => 'max:255'
            ]);
        }
        if($request->geoLatitude){
            $this->validate($request, [
                'geoLatitude' => 'numeric|between:-90,90'
            ]);
        }
        if($request->geoLongitude){
            $this->validate($request, [
                'geoLongitude' => 'numeric|between:-180,180'
            ]);
        }
        if($request->name) $location->setName($request->name);
        if($request->country) $location->setCountry($request->country);
        if($request->geoLatitude) $location->setGeoLatitude($request->geoLatitude);
        if($request->geoLongitude) $location->setGeoLongitude($request->geoLongitude);
        $location->save();
        return redirect()->route('admin.location', $location->id);
    }

    function deleteLocation(Location $location)
    {
        $location->delete();
        return redirect()->route('admin.locations');
    }
}
