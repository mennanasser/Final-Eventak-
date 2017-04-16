<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Event;
use Auth;
use App\Comment;
use DB;
class EventDetailsController extends Controller
{
    public function get_event_details($id){
    	$event = Event::find($id);
        $comments = Comment::where('approve','1')->where('event_id','=',$id)->get();
        $event_user = DB::table('event_user')
        	->where ('user_id', '=' , Auth::id())
            ->where('event_id', '=', $id)->first();
    	return view('eventdetails', compact('event', 'event_user','comments'));
    }

     public function storecomment(Request $request , $id)
        {
            $comment = new Comment();
            $comments = Comment::where('approve','1')->where('event_id','=',$id)->get();
            if($request->comment != null){
            $comment->comment = $request->comment;
            $comment->approve = 1;
            $comment->user_id  = Auth::id();
            $comment->event_id = Event::find($id)->id;
            $comment->save();
        }
        else{
            return back();
        }
            return back();
        }
        

    public function post_event_details($id){
    
        if(DB::table('event_user')
            ->where('user_id', '=', Auth::id())
            ->where('event_id', '=', $id)->first() && DB::table('event_user')
            ->where('user_id', '=', Auth::id())
            ->where('event_id', '=', $id)->first()->interested == 1){
        
            

            DB::table('event_user')
                ->where('user_id', Auth::id())
                ->where('event_id', $id)
                ->update(['interested' => 0, 'updated_at' => \Carbon\Carbon::now()]);

                return response()->json(['success' => 0], 200);

        }elseif(DB::table('event_user')
            ->where('user_id', '=', Auth::id())
            ->where('event_id', '=', $id)->first() && DB::table('event_user')
            ->where('user_id', '=', Auth::id())
            ->where('event_id', '=', $id)->first()->interested == 0){
        

            DB::table('event_user')
                ->where('user_id', Auth::id())
                ->where('event_id', $id)
                ->update(['interested' => 1, 'updated_at' => \Carbon\Carbon::now()]);

                return response()->json(['success' => 1], 200);

        }else{


            DB::table('event_user')                
                ->insert(['interested' => 1,
                        'event_id' => $id,
                        'user_id' => Auth::id(),
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()]);

                return response()->json(['success' => 1], 200);
        }
    }

}