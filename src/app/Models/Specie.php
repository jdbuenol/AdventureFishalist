<?php
//AUTHOR: Juanjose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    /**
     * Specie ATTRIBUTES
     * $this->id - int - contains the specie primary key (id)
     * $this->name - string - contains the fish specie name
     * $this->petFishes - PetFishes[] - contains all the pet fishes that belong to specie
     * $this->foodFishes - FoodFishes[] - contains all the food fishes that belong to this specie
     * $this->specieLocations - SpecieLocation[] - contains all the the species locations that belong to this specie
     * $this->created_at - str - contains the date-time this specie was created
     * $this->upated_at - str - contains the date-time this specie was updated
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

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
