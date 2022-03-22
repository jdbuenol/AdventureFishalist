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
     * $this->attributes['id'] - int - contains the specie primary key (id)
     * $this->attributes['poblationalDensity'] - float - contains the fish Poblational Density value of the specie in the location
     * $this->attributes['location_id'] - string - contains the id of the location of this specie-location relation
     * $this->attributes['specie_id'] - string - contains the id of the specie of this specie-location relation
    */

    protected $fillable = ['poblationalDensity'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getPoblationalDensity()
    {
        return $this->attributes['poblationalDensity'];
    }

    public function setPoblationalDensity($poblationalDensity)
    {
        $this->attributes['poblationalDensity'] = $poblationalDensity;
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getLocationId()
    {
        return $this->location_id;
    }

    public function setLocationId($locationId)
    {
        $this->location_id = $locationId;
    }

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }

    public function getSpecie()
    {
        return $this->specie;
    }

    public function getSpecieId()
    {
        return $this->specie_id;
    }

    public function setSpecieId($specieId)
    {
        $this->specie_id = $specieId;
    }
}
