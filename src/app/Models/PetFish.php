<?php
// AUTHOR: Juan Jose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetFish extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the pet fish primary key (id)
     * $this->attributes['image'] - string - contains the URL to the image of the pet fish
     * $this->attributes['size'] - string - contains the size of the pet fish 
     * $this->attributes['price'] - float - contains the price value of the pet fish 
     * $this->attributes['inventory'] - integer - contains the inventory value of the pet fish
    */

    protected $fillable = ['image','size','price','inventory'];

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

    public function getSize()
    {
        return $this->attributes['size'];
    }

    public function setSize($size)
    {
        $this->attributes['size'] = $size;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getInventory()
    {
        return $this->attributes['inventory'];
    }

    public function setInventory($inventory)
    {
        $this->attributes['inventory'] = $inventory;
    }
}
