<?php
// EDITED BY: Julian Bueno

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->id - int - contains the user primary key (id)
     * $this->name - str - contains the name of the user
     * $this->balance - float - contains the total money of the user
     * $this->email - str - contains the email of this user
     * $this->password - str - contains the HASHED password of the user
     * $this->isAdmin - bool - contains a boolean that determiens if the user has admin privileges
     * $this->orders - Order[] - contains an array of all the orders that belongs to this user
     * $this->created_at - str - contains the date-time this specie was created
     * $this->upated_at - str - contains the date-time this specie was updated
    */

    protected $fillable = [
        'name',
        'email',
        'password',
        'isAdmin',
        'balance'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getBalance()
    {
        return $this->balance;
    }

    function setBalance($balance)
    {
        $this->balance = $balance;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function isAdmin()
    {
        return $this->isAdmin;
    }

    function setAdmin($admin)
    {
        $this->isAdmin = $admin;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function orders()
    {
        return $this->hasMany(Order::class);
    }

    function getOrders()
    {
        return $this->orders;
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

    public function getLifeLongExpenses()
    {
        $expenses = 0;
        foreach($this->getOrders() as $order){
            $expenses += $order->getTotalPrice();
        }
        return $expenses;
    }
}
