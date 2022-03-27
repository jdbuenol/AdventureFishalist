<?php
// AUTHOR: JULIAN BUENO

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Specie;
use App\Models\Location;

class SpecieLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomSpecie = Specie::inRandomOrder()->first()->getId();
        $randomLocation = Location::inRandomOrder()->first()->getId();
        return [
            'poblationalDensity' => rand(1, 10000)/100,
            'location_id' => $randomLocation,
            'specie_id' => $randomSpecie
        ];
    }
}
