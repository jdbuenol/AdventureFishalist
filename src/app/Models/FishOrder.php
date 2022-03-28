<?php
// AUTHOR: JULIAN BUENO

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishOrder extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->id - int - contains the product primary key (id)
     * $this->type - string - contains the type of order (Pet or Food)
     * $this->petFishID - int - contains the foreign key of PetFish
     * $this->foodFishID - int - contains the foreign key of FoodFish
     * $this->orderID - int - contains the foreign key of Order
     * $this->quantityFish - int - contains the units of pet fish the customer wants to buy
     * $this->quantityKG - float - contains the amount of food fish the customer wants to buy (in KG)
    */

    protected $fillable = ['type', 'pet_fishes_id', 'food_fishes_id', 'order_id', 'quantityFish', 'quantityKG'];

    function getId()
    {
        return $this->id;
    }

    function getType()
    {
        return $this->type;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function getQuantityFish()
    {
        return $this->quantityFish;
    }

    function setQuantityFish($quantityFish)
    {
        $this->quantityFish = $quantityFish;
    }

    function getQuantityKG()
    {
        return $this->quantityKG;
    }

    function setQuantityKG($quantityKG)
    {
        $this->quantityKG = $quantityKG;
    }
    
    public function petFishes()
    {
        return $this->belongsTo(PetFishes::class);
    }

    public function getPetFishes()
    {
        return $this->petFishes;
    }

    public function getPetFishesId()
    {
        return $this->pet_fishes_id;
    }

    public function setPetFishesId($pet_fishes_id)
    {
        $this->pet_fishes_id = $pet_fishes_id;
    }

    public function foodFishes()
    {
        return $this->belongsTo(FoodFishes::class);
    }

    public function getFoodFishes()
    {
        return $this->foodFishes;
    }

    public function getFoodFishesId()
    {
        return $this->food_fishes_id;
    }

    public function setFoodFishesId($food_fishes_id)
    {
        $this->food_fishes_id = $food_fishes_id;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    public function getTotalPrice()
    {
        if($this->getType() == 'PET'){
            return $this->getPetFishes()->getPrice() * $this->getQuantityFish();
        }
        else{
            return $this->getFoodFishes()->getPricePerKG() * $this->getQuantityKG();
        }
    }
}
