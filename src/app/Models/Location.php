<?php
//AUTHOR: Juanjose Madrigal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the location name
     * $this->attributes['geoLatitude'] - float - contains the geoLatitude value of the location 
     * $this->attributes['geoLongitude'] - float - contains the geoLongitude value of the location 
     * $this->attributes['country'] - string - contains the country name of the Location
    */

    protected $fillable = ['name','geoLatitude','geoLongitude','country'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getGeoLatitude()
    {
        return $this->attributes['geoLatitude'];
    }

    public function setGeoLatitude($geoLatitude)
    {
        $this->attributes['geoLatitude'] = $geoLatitude;
    }

    public function getGeoLongitude()
    {
        return $this->attributes['geoLongitude'];
    }

    public function setGeoLongitude($geoLongitude)
    {
        $this->attributes['geoLongitude'] = $geoLongitude;
    }

    public function getCountry()
    {
        return $this->attributes['country'];
    }

    public function setCountry($country)
    {
        $this->attributes['country'] = $country;
    }
}
