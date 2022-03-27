<?php
// AUTHOR: JULIAN BUENO

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Specie;

const FOOD_IMAGES = [
    '/Crab_Sticks.jpg', '/Lobster.jpg', '/Mojarra.jpg', '/Octopus.jpg', '/Oysters.jpg',
    '/Prawns.jpg', '/Salmon_Sashimi.jpg', '/Salmon_Sushi.jpg', '/Sardines.jpg', '/Tuna_Sashimi.jpg'
];

const CUTS = ['BACK MEAT', 'TAIL MEAT', 'ABDOMEN MEAT'];

class FoodFishesFactory extends Factory
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
            'image' => '/images/FoodFish'.FOOD_IMAGES[array_rand(FOOD_IMAGES)],
            'cut' => CUTS[array_rand(CUTS)],
            'pricePerKG' => rand(1, 100000)/100,
            'inventoryKG' => rand(0, 10000)/100,
            'specie_id' => $randomSpecie
        ];
    }
}
