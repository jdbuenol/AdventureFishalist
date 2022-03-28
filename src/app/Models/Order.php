<?php
// AUTHOR: Julian Bueno

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

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
