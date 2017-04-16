<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;
use App\Event;

class CommentsController extends Controller
{
    public function getcomment($id){
    $event = Event::find($id);
    $comments = Comment::where('approve','1')->get();
    return view('front', compact('comments','event'));
    }

    public function store(Request $request , $id)
    {
    	$comment = new Comment();
        $comments = Comment::where('approve','1')->get();
        $event = Event::find($id);
    	$comment->comment = $request->comment;
        $comment->approve = 1;
        $comment->user_id  = Auth::id();
        $comment->event_id = 1;
    	$comment->save();
    	return back();
    }

     public function approval(Request $request)
    {
        $comment = Comment::find($request->commentId);
        $approveVal=$request->approve;
        if($approveVal=='on'){
            $approveVal=1;
        }else{
            $approveVal=0;
        }
        $comment->approve=$approveVal;
        $comment->save();
        return back();
    }

    public function index()
    {
    	$comment = Comment::all();
    	return redirect('/status')->compact('comments');
    }

    
}
