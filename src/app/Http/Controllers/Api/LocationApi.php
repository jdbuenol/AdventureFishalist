<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\LocationCollection;
use App\Http\Controllers\Controller;
use App\Models\Location;

class LocationApi extends Controller
{
    public function index()
    {
        return new LocationCollection(Location::all());
    }

    public function paginate()
    {
        return new LocationCollection(Location::paginate(5));
    }
}