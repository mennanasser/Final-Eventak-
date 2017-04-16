<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\Feedback;
use App\User;
use App\Category;

class TestController extends Controller
{
	public function displayloc(){
		$events = Event::all();
		$feedbacks = Feedback::all();
		$users = User::all();
		$categories = Category::all();
		$Locations = Location::all();
		return view("test",compact('events','feedbacks','users','categories','locations'));
	}
	
// 	public function displayuser(){
// 		$feedbacks = Feedback::all();
// 		return view("test",compact('feedbacks'));
// 	}

}
