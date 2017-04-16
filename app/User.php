<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'image', 'gender'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function event() //view
    {
        return $this->belongsToMany('App\Event')->withPivot('event_id','user_id');
    }

       public function createEvent() //create
    {
        return $this->hasMany('App\Event');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }



   public function feedback() //feedback
    {
        return $this->hasMany('App\Feedback');
    }

    public function category() 
    {
        return $this->belongsToMany('App\Category')->withPivot('category_id','user_id');
    }

    public function eventNotify() //notify
    {
        return $this->belongsToMany('App\Event','notify_user','event_id','user_id');
    }

}
