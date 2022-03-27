<?php
// AUTHOR: Juan Jose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodFishes extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->id - int - contains the food fish primary key (id)
     * $this->image - string - contains the URL to the image of the food fish
     * $this->cut - string - contains the cut of the food fish 
     * $this->pricePerKG - float - contains the price value of the each KG of food fish 
     * $this->inventoryKG - float - contains the inventory in KG of the food fish
     * $this->quantityBought - float - returns the life-long quantity bought of this product
    */

    protected $fillable = ['image','cut','pricePerKG','inventoryKG', 'specie_id', 'quantityBought'];

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

    public function getCut()
    {
        return $this->cut;
    }

    public function setCut($cut)
    {
        $this->cut = $cut;
    }

    public function getPricePerKG()
    {
        return $this->pricePerKG;
    }

    public function setPricePerKG($pricePerKG)
    {
        $this->pricePerKG = $pricePerKG;
    }

    public function getInventoryKG()
    {
        return $this->inventoryKG;
    }

    public function setInventoryKG($inventoryKG)
    {
        $this->inventoryKG = $inventoryKG;
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

    public function setSpecieId($specie_id)
    {
        $this->specie_id = $specie_id;
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
        $this->setInventoryKG($this->getInventoryKG() - $quantity);
        $this->setQuantityBought($this->getQuantityBought() + $quantity);
    }
}
