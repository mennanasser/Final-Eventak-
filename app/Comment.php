<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';
   	protected $fillable=['comment'];

    public function event(){
     	return $this->belongsTo('App\Event');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
