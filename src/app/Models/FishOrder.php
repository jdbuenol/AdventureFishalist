<?php
// AUTHOR: JULIAN BUENO

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishOrder extends Model
{
    use HasFactory;

    /**
     * FishOrder ATTRIBUTES
     * $this->id - int - contains the fishOrder primary key (id)
     * $this->type - string - contains the type of order (Pet or Food)
     * $this->petFishID - int - contains the foreign key of PetFish
     * $this->petFish - PetFishes - Contains the object PetFish
     * $this->foodFishID - int - contains the foreign key of FoodFish
     * $this->foodFish - FoodFishes - Contains the object FoodFish
     * $this->orderID - int - contains the foreign key of Order
     * $this->order - Order - contains the object Order this item belongs to
     * $this->quantityFish - int - contains the units of pet fish the customer wants to buy
     * $this->quantityKG - float - contains the amount of food fish the customer wants to buy (in KG)
     * $this->getTotalPrice() - float - returns the total price of this item (price of fish * quantity)
     * $this->created_at - str - contains the date-time this item was created
     * $this->upated_at - str - contains the date-time this item was updated
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
        if($this->getType() == 'PET') {
            return $this->getPetFishes()->getPrice() * $this->getQuantityFish();
        }
        else{
            return $this->getFoodFishes()->getPricePerKG() * $this->getQuantityKG();
        }
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
