<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	
    public function user() //view
    {
        return $this->belongsToMany('App\User')->withPivot('user_id','event_id'); 
    }

    public function createEvent() //create
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function location() //location
    {
        return $this->belongsTo('App\Location');
    }

    public function userNotify() //notify
    {
        return $this->belongsToMany('App\User','notify_user','user_id','event_id');
    }

     public function category() 
    {
        return $this->belongsTo('App\Category');
    }
    
    public function comment(){
        return $this-> hasMany('App\Comment');
    }

}
