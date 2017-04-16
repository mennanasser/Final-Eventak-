<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\Feedback;
use App\User;
use App\Category;
use auth;

class EventController extends Controller
{

	public function showCreateForm(){
		$locations  = Location::all();
        $categories = Category::all();
        return view('createEvent', compact('locations', 'categories'));
	}


    public function store(Request $request)
    { 
        $this->validate($request,[
            'title'      => 'required|regex:/^[A-z][A-z0-9_,\s\.\'\/]+$/',
            'date'       => 'required|after:today',
            'start_time' => 'required|date_format:H:i',
            'end_time'   => 'required|date_format:H:i|after:start_time',
            'description'=> 'required|regex:/^[A-z][A-z0-9_,\s\.\'\/]+$/',
            'image'      => 'required|Image',
            'category'   => 'required',
            'location'   => 'required',
            ]);

        $event              = new Event;
        $event->title       = $request->title;
        $event->date        = $request->date;
        $event->start_time  = $request->start_time;
        $event->end_time    = $request->end_time;
        $event->description = $request->description ;
        $event->image       = $request->file('image')->store('images');
       
        $event->user_id     = Auth::id();
        $event->category_id = $request->category;
        $event->location_id = $request->location;
        $event->save();

        $request->session()->flash('alert-success', 'Event has submited!');
        return redirect('/create');   
        // return \Redirect::back()->withSuccess( 'Message you want show in View' );    
        
    }


    public function showEvents($id)
    {
        $event = Event::find($id);
		$locations  = Location::all();
        $categories = Category::all();
       return view('editEvent', compact('event','locations', 'categories'));
    }

     public function editEvents($id , Request $request)
    {

    	$this->validate($request,[
            'title'      => 'required|regex:/^[A-z][A-z0-9_,\s\.\'\/]+$/',
            'date'       => 'required|after:today',
            'start_time' => 'date_format:H:i:s',
            'end_time'   => 'date_format:H:i:s|after:start_time',
            'description'=> 'required|regex:/^[A-z][A-z0-9_,\s\.\'\/]+$/',
            'image'      => 'Image',
            'category'   => 'required',
            'location'   => 'required',
            ]);
    	   
           if ($request->save) {

		        $event              = Event::find($id);
		        $event->title       = $request->title;
		        $event->date        = $request->date;
		        $event->start_time  = $request->start_time;
		        $event->end_time    = $request->end_time;
		        $event->description = $request->description;
                if($request->image){
		        $event->image       = $request->file('image')->store('images');
		        }
		        $event->user_id     = Auth::id();
		        $event->category_id = $request->category;
		        $event->location_id = $request->location;
		        $event->save();
		        
	        	return redirect("/profile");
	        } else{
	        	
	            return back();
	        }
    
	}

            public function delete($id)
            {
                $event = Event::find($id);
                $event->delete();
                return redirect("/profile");
            }

}
