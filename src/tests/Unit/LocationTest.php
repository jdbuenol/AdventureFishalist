<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

class LocationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_location_has_many_specie_locations()
    {
        $location = new Location;

        $this->assertInstanceOf(Collection::class, $location->specieLocations);
    }
}
