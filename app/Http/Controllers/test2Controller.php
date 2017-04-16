<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Category;

class test2Controller extends Controller
{

	public function displaycategory(){
   	
	$categories = Category::all();
	return view('layouts/index',compact('categories'));
	}

   public function displayevents($id){
	$events = Event::where('category_id','=',$id)->where('approved','=','accepted')->get();
	return view('eventscategory',compact('events'));
	}

}
