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
     * +id: int
     * +name: string
     * +email: string
     * -password: string(hashed)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'isAdmin'
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
}
