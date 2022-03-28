<?php
// AUTHOR: JULIAN BUENO

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word.' '.$this->faker->word,
            'geoLatitude' => rand(-9000, 9000)/100,
            'geoLongitude' => rand(-18000, 18000)/100,
            'country' => $this->faker->country
        ];
    }
}
