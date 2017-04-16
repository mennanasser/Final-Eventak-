<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use auth;
use DB;

class UserProfileController extends Controller
{
    public function index()
	{
	    $user = User::find(auth::id());
        $events = Event::where('user_id' , auth::id())->get();
		return view('userprofile',compact('user','events'));
	}

	public function display()
    {
        $events = Event::where('user_id' , auth::id())->get();
        return view('userprofile',compact('events'));
    }


    public function viewEditProfile()     
    {
        $user = User::find(auth::id());
        return view('editprofile',compact('user'));
    }


    public function editProfile(Request $request)
    {
        $user = User::find(auth::id());
        $events = Event::where('user_id' , auth::id())->get();
        if($request->save){

            $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            ]);
            
            $user->name     = $request->name;
            $user->email    = $request->email;
            if($request->password){
            $user->password = bcrypt($request->password);
             }
            if($request->image){
            $user->image    = $request->file('image')->store('images');
             }
            $user->save();
            return view("userprofile",compact('user','events'));
        
        }else {
            return view("userprofile",compact('user','events'));;
        }
        
    }

public function selectEvents($name)
    {
        if($name == 'accepted')
            {
            $events = DB::table('events')->where('approved' ,'accepted')->where('user_id' , auth::id())->get();
            }
        if($name == 'waiting')
            {
            $events = DB::table('events')->where('approved' ,'waiting')->where('user_id' , auth::id())->get();
            }
        if($name == 'rejected')
            {
            $events = DB::table('events')->where('approved' ,'rejected')->where('user_id' , auth::id())->get();
            }
            return view('selectevent', compact('events'));
    }

        public function viewUserProfile($id){
            $events = Event::where('user_id' , $id)->get();
            $user = User::find($id);
            return view('userviewuserprofile',compact('events','user'));
        }


        public function logviewProfile($id)
            {
                $events = Event::where('user_id' , $id)->get();
                $user   = User::find(Auth::id());
                return view('userviewuserprofile',compact('events','user'));
            }
        public function viewMyProfile()
            {
                $events = Event::where('user_id' , Auth::id())->get();
                $user   = User::find(Auth::id());
                return view('userprofile',compact('events','user'));
            }

}
