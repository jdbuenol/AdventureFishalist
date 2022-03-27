<?php
// AUTHOR: JULIAN BUENO

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Specie;

const PET_IMAGES = [
    '/Betta.jpg', '/Carp.jpg', '/Cichlid.jpg', '/Clownfish.jpg', '/Goldfish.jpg',
    '/Guppy.jpg', '/Heckel_Discus.jpg', '/Molly.jpg', '/SeaHorse.jpg', '/Tetra.jpg'
];

const SIZES = ['SMALL', 'MEDIUM', 'BIG'];

class PetFishesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomSpecie = Specie::inRandomOrder()->first()->getId();
        return [
            'image' => '/images/PetFish'.PET_IMAGES[array_rand(PET_IMAGES)],
            'size' => SIZES[array_rand(SIZES)],
            'price' => rand(1, 100000)/100,
            'inventory' => rand(0, 100),
            'quantityBought' => 0,
            'specie_id' => $randomSpecie
        ];
    }
}
