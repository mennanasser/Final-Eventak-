<?php
use App\Comment;
Route::get('/','test2Controller@displaycategory');
Route::get('/event/name/{id}','test2Controller@displayevents');

Route::get('/home', 'HomeController@index');
Auth::routes();
Route::group(["middleware"=>"auth"], function(){

// Route::get('/', function () {
//     return view('welcome');
// });


	Route::get('/editProfile', 'UserProfileController@viewEditProfile');
	Route::post('/editProfile', 'UserProfileController@editProfile');
	Route::get('/profile/user/{id}',"UserProfileController@logviewProfile");
	Route::get('/profile/user',"UserProfileController@viewMyProfile");


	Route::get('/profile', 'UserProfileController@index');
	Route::get('/event/{id}',"UserProfileController@display");
	Route::get('/create','EventController@showCreateForm');
	Route::get('/event/profile/{name}', "UserProfileController@selectEvents")->where('{name}','=','accepted'|'waiting'|'rejected'); 
	// Route::get('/rejected', "UserProfileController@selectEvents"); 
	// Route::get('/waiting', "UserProfileController@selectEvents"); 

	
	Route::post('/create',"EventController@store");
	Route::get('/edit/{id}','EventController@showEvents');
	Route::post("/edit/{id}","EventController@editEvents");

	Route::get("/delete/{id}","EventController@delete");


// Route::get('/comment/{id}', 'CommentsController@getcomment');


Route::post('/toggle-approve','CommentsController@approval');

Route::get('/dash', function () {
	$comments = Comment::all();
    return view('admincommentcontrol')->with('comments',$comments);
});

});

Route::get('user','TestController@displayloc');


Route::get('index', function () {
    return view('layouts/index');
});

// Route::get('/','test2Controller@displaycategory');


//user view user
Route::get('/user/view/user/profile/{id}',"UserProfileController@viewUserProfile");


Route::get('/details/{id}','EventDetailsController@get_event_details');
Route::post('/details/{id}','EventDetailsController@post_event_details');
Route::post('/comment/{id}','EventDetailsController@storecomment');
// Route::get('/details','EventDetailsController@get_event_details');
