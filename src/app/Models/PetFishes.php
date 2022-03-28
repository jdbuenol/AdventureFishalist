<?php
// AUTHOR: Juan Jose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetFishes extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->id - int - contains the pet fish primary key (id)
     * $this->image - string - contains the URL to the image of the pet fish
     * $this->size - string - contains the size of the pet fish 
     * $this->price - float - contains the price value of the pet fish 
     * $this->inventory - integer - contains the inventory value of the pet fish
     * $this->specie_id - integer - contains the id of the specie
     * $this->quantityBought - integer - contains the number of units life-long bought of this product
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
