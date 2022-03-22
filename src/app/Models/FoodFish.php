<?php
// AUTHOR: Juan Jose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodFish extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the food fish primary key (id)
     * $this->attributes['image'] - string - contains the URL to the image of the food fish
     * $this->attributes['cut'] - string - contains the cut of the food fish 
     * $this->attributes['pricePerKG'] - float - contains the price value of the each KG of food fish 
     * $this->attributes['inventoryKG'] - float - contains the inventory in KG of the food fish
    */

    protected $fillable = ['image','cut','pricePerKG','inventoryKG'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getCut()
    {
        return $this->attributes['cut'];
    }

    public function setCut($cut)
    {
        $this->attributes['cut'] = $cut;
    }

    public function getPricePerKG()
    {
        return $this->attributes['pricePerKG'];
    }

    public function setPricePerKG($pricePerKG)
    {
        $this->attributes['pricePerKG'] = $pricePerKG;
    }

    public function getInventoryKG()
    {
        return $this->attributes['inventoryKG'];
    }

    public function setInventoryKG($inventoryKG)
    {
        $this->attributes['inventoryKG'] = $inventoryKG;
    }
}
