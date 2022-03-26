<?php
//AUTHOR: Juanjose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->id - int - contains the specie primary key (id)
     * $this->name - string - contains the fish specie name
     * $this->petFishes - PetFish[] - contains all the fishes of this species
    */

    protected $fillable = ['name'];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function specieLocations()
    {
        return $this->hasMany(SpecieLocation::class);
    }

    public function getSpecieLocations()
    {
        return $this->specieLocations;
    }

    public function petFishes()
    {
        return $this->hasMany(PetFishes::class);
    }

    public function getPetFishes()
    {
        return $this->petFishes;
    }

    public function foodFishes()
    {
        return $this->hasMany(FoodFishes::class);
    }

    public function getFoodFishes()
    {
        return $this->foodFishes;
    }
}
