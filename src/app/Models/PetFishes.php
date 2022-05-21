<?php
// AUTHOR: Juan Jose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetFishes extends Model
{
    use HasFactory;

    /**
     * PetFishes ATTRIBUTES
     * $this->id - int - contains the PetFish primary key (id)
     * $this->image - string - contains the path to the image that will be displayed
     * $this->price - float - contains the price of this PetFish
     * $this->inventory - int - Contains the total quantity in storage of this PetFish
     * $this->quantityBought - int - contains the total quantity that has been bought in the lifetime of this PetFish
     * $this->specieId - int - foreign key to the specie this petfish belongs to
     * $this->specie - Specie - object of the specie this petfish belongs to
     * $this->fishItems - FishOrder[] - contains an array of all fish orders that belongs to this pet fish
     * $this->created_at - str - contains the date-time this petfish was created
     * $this->upated_at - str - contains the date-time this petfish was updated
     */

    protected $fillable = ['image','size','price','inventory', 'specie_id', 'quantityBought'];

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
    }

    public function getQuantityBought()
    {
        return $this->quantityBought;
    }

    public function setQuantityBought($quantityBoguth)
    {
        $this->quantityBought = $quantityBoguth;
    }

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }

    public function getSpecie()
    {
        return $this->specie;
    }

    public function getSpecieId()
    {
        return $this->specie_id;
    }

    public function setSpecieId($specieId)
    {
        $this->specie_id = $specieId;
    }

    public function fishOrders()
    {
        return $this->hasMany(FishOrder::class);
    }

    public function getFishOrders()
    {
        return $this->fishOrders;
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

    public function buy($quantity)
    {
        $this->setInventory($this->getInventory() - $quantity);
        $this->setQuantityBought($this->getQuantityBought() + $quantity);
        $this->save();
    }
}
