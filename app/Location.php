<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    
    public function hasevent() 
    {
        return $this->hasMany('App\Event');
    }
}
 