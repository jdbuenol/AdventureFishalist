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
        'totalPrice',
        'user_id'
    ];

    function getId()
    {
        return $this->id;
    }
    
    function getTotalPrice()
    {
        return $this->totalPrice;
    }

    function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
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

    function setUserId($userId)
    {
        $this->user_id = $userId;

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
