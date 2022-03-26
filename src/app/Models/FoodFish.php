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
     * $this->id - int - contains the food fish primary key (id)
     * $this->image - string - contains the URL to the image of the food fish
     * $this->cut - string - contains the cut of the food fish 
     * $this->pricePerKG - float - contains the price value of the each KG of food fish 
     * $this->inventoryKG - float - contains the inventory in KG of the food fish
    */

    protected $fillable = ['image','cut','pricePerKG','inventoryKG', 'specie_id'];

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
}
