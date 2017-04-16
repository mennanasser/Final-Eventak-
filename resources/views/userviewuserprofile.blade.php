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
<!-- 
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <!--   <link href="{{asset('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" /> -->
</head>
<body>

<div class="wrapper"> 
    <div class="sidebar" data-image="{{asset('css/images/sidebar-4.jpg')}}">  
        <div class="sidebar-wrapper">
   

       <ul class="nav">
            @foreach($events as $event)
            
             @if ((Auth::guest()))
                <li>
                     <img class="avatar border-gray" src="{{asset($event->createEvent->image)}}"  style='margin-left: 60px; width:120px; height:120px; border-radius:100% ;'/>
                </li>
                @break;
                <br>

             @elseif (!(Auth::guest()) && ($event->user_id) == Auth::user()->id)
                <li>
                     <img class="avatar border-gray" src="{{asset($user->image)}}"  style='margin-left: 60px; width:120px; height:120px; border-radius:100% ;'/>
                </li>
                @break;
                <br>

            @elseif (!(Auth::guest()) && ($event->user_id) != Auth::user()->id)
                <li>
                     <img class="avatar border-gray" src="{{asset($event->createEvent->image)}}"  style='margin-left: 60px; width:120px; height:120px; border-radius:100% ;'/>
                </li>
                @break;
                <br>
            @endif 
           @endforeach
                <li>
                    <a href="{{URL('/')}}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p>Home</p>
                    </a>
                </li>
          @if (!(Auth::guest()))
                 <li>
                    <a href="{{URL('profile')}}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>My Profile</p>
                    </a>
                </li>
          @endif
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">

       @if ((Auth::guest()))
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{URL('login')}}">Login</a></li>
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



             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{Auth::user()->name}}'s Profile
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
@endif
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
                                <p><strong>{{$event->title}}</strong></p>
                               
                                <a href="{{URL('details')}}/{{$event->id}}" type="button" class="btn btn-default" id="details" name="details" style="margin-right:10px">Show details</a>
                                
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
<!--    <script src="{{URL::asset('js/bootstrap-checkbox-radio-switch.js')}}"></script>
    <script src="{{URL::asset('js/chartist.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-notify.js')}}"></script>
    <script src="{{URL::asset('js/demo.js')}}"></script> -->
</html>
