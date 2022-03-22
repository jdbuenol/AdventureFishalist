<?php
//AUTHOR: Juanjose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecieLocation extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->id - int - contains the specie primary key (id)
     * $this->poblationalDensity - float - contains the fish Poblational Density value of the specie in the location
    */

    protected $fillable = ['poblationalDensity'];

    public function getId()
    {
        return $this->id;
    }

    public function getPoblationalDensity()
    {
        return $this->poblationalDensity;
    }

    public function setPoblationalDensity($poblationalDensity)
    {
        $this->poblationalDensity = $poblationalDensity;
    }

}
