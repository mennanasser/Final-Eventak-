<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="front/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>User profile</title>
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" /> 

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

  <link href="{{asset('css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-image="{{asset('css/images/sidebar-4.jpg')}}">

    	<div class="sidebar-wrapper">
          
            <ul class="nav">
               <li>
                     <img class="avatar border-gray" src="{{asset(Auth::user()->image)}}"  style='margin-left: 60px; width:120px; height:120px; border-radius:100% ;'/>
                </li>
                <br>

                <li>
                    <a href="{{URL('/')}}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="{{URL('profile')}}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>User Profile</p>
                    </a>
                </li>

                <li>
                    <a href="{{URL('editProfile')}}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li>
                    <a href="#">  
                        <i class="fa fa-gratipay" aria-hidden="true"></i>
                        <p>Interested Events</p>
                    </a>
                </li>
                <li>
                    <a href="{{URL('event/profile/accepted')}}">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <p>Accepted Events</p>
                    </a>
                </li>
                <li>
                    <a href="{{URL('event/profile/waiting')}}">
                        <i class="fa fa-pause" aria-hidden="true"></i>
                        <p>Waiting Events</p>
                    </a>
                </li>
                <li>
                    <a href="{{(URL('event/profile/rejected'))}}">
                        <i class="fa fa-window-close" aria-hidden="true"></i>
                        <p>Rejected Events</p>
                    </a>
                </li>
          <!--       <li>
                    <a href="{{URL('edit/{id}')}}">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        <p>Manage Events </p>
                    </a>
                </li>-->

                <li>      
                        <a href="#">
                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
  <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
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
                <li>
                 <a href="{{URL('create')}}">
                     Create Event
                 </a>
             </li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{Auth::user()->name}}
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
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
    </div>
</div>
</nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($events as $event)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <div class="post-img-content">   
                                    <img src="{{asset($event->image)}}" style= "width:290px ;height:200px"; border-radius:50% ;>
                                </div>
                                <br>
                                <div style="height:100px;width:320px ;  word-break:break-all">
                                <p><strong>{{$event->title}}</strong></p>
                                </div>
                                <a href="{{URL('event_details')}}/{{Auth::user()->id}}" type="button" class="btn btn-default" id="details" name="details" style="margin-right:10px">Show details</a>
                                <a href="{{URL('/edit')}}/{{$event->id}}" type="button" class="btn btn-default" id="details" name="details">Edit Event</a>

                                <a href="{{URL('delete')}}/{{$event->id}}"><i class="fa fa-trash fa-2x" aria-hidden="true" style="color:red; margin-left:10px"></i></a> 
                            </div> <br>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

                </div>
            </div>
        </div>
</body>
      <script src="{{URL::asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
</html>
