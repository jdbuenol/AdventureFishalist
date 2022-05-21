<?php
//AUTHOR: Juanjose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecieLocation extends Model
{
    use HasFactory;

    /**
     * SPECIE LOCATION ATTRIBUTES
     * $this->id - int - contains the specieLocation primary key (id)
     * $this->poblationalDensity - float - contains the fish Poblational Density value of the specie in the location
     * $this->location_id - string - contains the id of the location of this specie-location relation
     * $this->location - Location - contains the location this specie-location belongs to
     * $this->specie_id - string - contains the id of the specie of this specie-location relation
     * $this->specie - Specie - contains the specie this specie-location belongs to
     * $this->created_at - str - contains the date-time this specie was created
     * $this->upated_at - str - contains the date-time this specie was updated
     */

    protected $fillable = ['poblationalDensity', 'location_id', 'specie_id'];

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
