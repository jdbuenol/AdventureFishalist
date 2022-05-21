<?php
// EDITED BY: JULIAN BUENO

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(! \App\Models\User::exists()) {
            \App\Models\User::factory(1)->create();
        }
        \App\Models\Specie::factory(10)->create();
        \App\Models\Location::factory(10)->create();
        \App\Models\SpecieLocation::factory(10)->create();
        \App\Models\PetFishes::factory(10)->create();
        \App\Models\FoodFishes::factory(10)->create();
    }
}
