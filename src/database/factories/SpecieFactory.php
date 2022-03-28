<?php
// AUTHOR: JULIAN BUENO

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

const FISHES = ['fish', 'shark', 'seahorse', 'sponge', 'seastar', 'squirrel', 'crab', 'squid', 'octopus', 'dolphin', 'plankton', 'whale', 'sea killer whale'];

class SpecieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->safeColorName.' '.FISHES[array_rand(FISHES)]
        ];
    }
}
