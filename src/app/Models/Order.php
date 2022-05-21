<?php
// AUTHOR: Julian Bueno

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    /**
     * Order ATTRIBUTES
     * $this->id - int - contains the order primary key (id)
     * $this->getTotalPrice() - float - contains the total price of the order (the sum of all items)
     * $this->userId - int - foreign key with the user
     * $this->user - User - contains the User this order belongs to
     * $this->fishItems - FishOrder[] - contains an array of all the items that belongs to this order
     * $this->created_at - str - contains the date-time this order was created
     * $this->upated_at - str - contains the date-time this order was updated
    */

    protected $fillable = [
        'user_id'
    ];

    function getId()
    {
        return $this->id;
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function getUser()
    {
        return $this->user;
    }

    function getUserId()
    {
        return $this->user_id;
    }

    function setUserId($user_id)
    {
        $this->user_id = $user_id;

    }
    
    public function fishOrders()
    {
        return $this->hasMany(FishOrder::class);
    }

    public function getFishOrders()
    {
        return $this->fishOrders;
    }

    function getTotalPrice()
    {
        $totalPrice = 0;
        foreach($this->getFishOrders() as $fishOrder){
            $totalPrice += $fishOrder->getTotalPrice();
        }
        return $totalPrice;
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
