<!DOCTYPE html>
<html >
<head>
<title>Event | Details</title>


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
        <style type="text/css">
    ul li:hover > ul{display:block;}
    #list { 
    background-color: yellow;
}
  
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
     margin-right: 200px;
    margin-left: 200px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    
    
}

tr:nth-child(even) {
    background-color: #dddddd;
    
}
</style>
 <link rel="stylesheet" href="{{ asset('css/detailsStyle.css') }}">
</head>
<body id="top">
<!-- NAV -->

        <nav class="navbar navbar-default navbar-fixed">

       @if ((Auth::guest()))
            <ul class="nav navbar-nav">
            <li class="active"><a href="{{URL('/')}}">Eventak</a></li>
              <li ><a href="{{URL('login')}}">Login</a></li>
              <li><a href="{{URL('register')}}">Sign up</a></li>
            </ul>
        @elseif (!(Auth::guest()))
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                       
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <b class="caret"></b>
                            <span class="notification">5</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Notification 1</a></li>
                            <li><a href="#">Notification 2</a></li>
                            <li><a href="#">Notification 3</a></li>
                            <li><a href="#">Notification 4</a></li>
                            <li><a href="#">Another notification</a></li>
                        </ul>
                    </li>
                    <li>
                     <a href="">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
        
            <ul class="nav navbar-nav">
                <li>
                 <a href="{{URL('create')}}">
                     Create Event
                 </a>
             </li>

        @if (!(Auth::guest()))
          <li class="dropdown active">
            <a href="{{URL('profile')}}">
              {{Auth::user()->name}}'s Profile
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{URL('editProfile')}}">Account Settings</a></li>
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>

      @endif


            
        </ul>
    </div>
</div>
@endif
</nav>

<div class="row">
<div class="wrapper">
  <div id="intro" class="col-sm-8">
    <ul>
      <a href="#"><img src="{{ asset($event->image) }}" height="370" width="700" alt="" /></a>
    </ul>
  </div>
<div class="col-sm-4">
<br>
<br>
        <h1>{{$event->title}}</h1>
    <br>
       <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
		<strong>Date and Time</strong></p>

		<p> {{$event->date}} , {{$event->start_time}}  To {{$event->end_time}} </p>
		<br>
		<p><i class="fa fa-location-arrow" aria-hidden="true"></i>
		<strong>Location</strong></p>
		<p>{{$event->location->title}}</p>
		<br>
     
     @if ((Auth::guest()))
     <a href="#"><p><i class="fa fa-user-circle" aria-hidden="true"></i>
            <a href="{{URL('/user/view/user/profile')}}/{{$event->user_id}}">   {{$event->createEvent->name}}  </a>
       </p></a>
    <br>
    <br>
    @elseif (!(Auth::guest()) &&  ($event->user_id) == Auth::user()->id)
     <a href="#"><p><i class="fa fa-user-circle" aria-hidden="true"></i>
            <a href="{{URL('/profile/user')}}">{{$event->createEvent->name}}  </a>
       </p></a>
    <br>
    <br>
    @elseif(!(Auth::guest()) && ($event->user_id) != Auth::user()->id )
     <a href="#"><p><i class="fa fa-user-circle" aria-hidden="true"></i>
            <a href="{{URL('/profile/user')}}/{{$event->user_id}}">{{$event->createEvent->name}}</a>
       </p></a>
    <br>
    <br>
    @endif


     @if (!(Auth::guest()))
		<p id="rcorners1"><font size="4">If You Interest ....  </font>

      @if(isset($event_user) && $event_user->interested == 1)
      <a id="interested" class="fa fa-heart"  style="font-size:25px;color:#0277BD;text-decoration: none;" href="#"></a>
      @else
      <a  id="interested" class="fa fa-heart-o" style="font-size:25px;color:#0277BD;text-decoration: none;" href="#" ></a>
      @endif
    </p>
    @endif
  </div>
</div>
</div>

<div class="wrapper"> 
  <!-- Content Box -->
  <div class="homecontent">
        <h2 class="title"><i class="fa fa-book" aria-hidden="true"> </i> Event's Description</h2>
        <p>{{$event->description}}</p>
        
     
  </div>
  <!-- / Content Box --> 
</div>
@if (!(Auth::guest()))
<form action="{{url('/comment')}}/{{$event->id}}" method="POST">
  {{csrf_field()}}
<div class="wrapper col2">
  <div id="projects">
    <h2>List your comment here</h2>
    <ul>
      <li> <label for="message"><br />
            <textarea id="message" name="comment" value="comment" cols="100" rows="2" placeholder="Write a comment ..."></textarea>
          </label>
     <input class="btn btn-defualt" type="submit" name="done" value="Done">
          </li>

    </ul>
    <div class="clear"></div>
  </div>
</div>

<table>
@forelse($comments as $comment)
  <tr>

  <td style="width: 7%;"><img src="{{asset($comment->user->image)}}" style= "width:60px ;height:60px";></td>
    <td style="width: 15%;padding: 15px;"><strong>{{$comment->user->name}}</strong></td>
    <td style="padding: 15px;">{{$comment->comment}}</td>
     @empty
     <h4>No Comments</h4>
  </tr>
   @endforelse 
</table>
@endif


  


</body>
 <script type="text/javascript">


      $('#interested').on('click',function(event){
            event.preventDefault();
            $.ajax({
                url : "{{url('/details')}}/{{$event->id}}",
                method: 'post',
                data:{"interested" : "interested", _token: '{{ csrf_token() }}'},
                success: function(data){
                    console.log(data);
                    if(data.success === 0){
                      $('#interested').removeClass('fa-heart').addClass('fa-heart-o');
                    }else{
                      $('#interested').removeClass('fa-heart-o').addClass('fa-heart');
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });              
      });

    </script>
    <script src="{{URL::asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

</html>
