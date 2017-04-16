<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	public $table = 'feedbacks';
	
    public function user() //feedback
    {
        return $this->belongsTo('App\User');
    }
}
