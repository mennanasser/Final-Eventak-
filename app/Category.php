<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
 public function user() 
    {
        return $this->belongsToMany('App\User')->withPivot('user_id','category_id');
    }


     public function event() 
    {
        return $this->hasMany('App\Event');
    }   
}
