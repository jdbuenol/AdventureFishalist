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
        'totalPrice'
    ];
    
    function getTotalPrice()
    {
        return $this->totalPrice;
    }

    function user()
    {
        return $this->belongsTo(User);
    }

    function getUser()
    {
        return $this->user;
    }
}
