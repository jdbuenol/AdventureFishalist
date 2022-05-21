<?php
//AUTHOR: Juanjose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * Location ATTRIBUTES
     * $this->id - int - contains the location primary key (id)
     * $this->name - string - contains the location name
     * $this->geoLatitude - float - contains the geoLatitude value of the location 
     * $this->geoLongitude - float - contains the geoLongitude value of the location 
     * $this->country - string - contains the country name of the Location
     * $this->speciesLocations - SpecieLocation[] - contains an array with all the speciesLocations that belongs to this location
     * $this->created_at - str - contains the date-time this location was created
     * $this->upated_at - str - contains the date-time this location was updated
     */

    protected $fillable = ['name','geoLatitude','geoLongitude','country'];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getGeoLatitude()
    {
        return $this->geoLatitude;
    }

    public function setGeoLatitude($geoLatitude)
    {
        $this->geoLatitude = $geoLatitude;
    }

    public function getGeoLongitude()
    {
        return $this->geoLongitude;
    }

    public function setGeoLongitude($geoLongitude)
    {
        $this->geoLongitude = $geoLongitude;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function specieLocations()
    {
        return $this->hasMany(SpecieLocation::Class);
    }

    public function getSpecieLocations()
    {
        return $this->specieLocations;
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
