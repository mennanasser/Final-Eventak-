
<!DOCTYPE html>
<html>
<head>
<title>Event Category</title>
<meta charset="utf-8">
<link href="{{asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
<style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input[type=text]:focus {
    width: 100%;
}
</style>
</head>
<body id="top" class="bgded fixed" style="background-image:url({{asset('css/images/background_1.jpg')}});">
<div class="wrapper row0">
  <header id="header" class="clear"> 
    <div id="logo">
      <h1><a href="/">Eventak</a></h1>
      <p>We aren't to lead events but to follow them ^_^ </p>
    </div>
  </header>
</div>
<div class="wrapper row1">
  <nav id="mainav" class="clear"> 
    <ul class="clear">
      <li><a href="{{ URL('/') }}">Home</a></li>
      @if ((Auth::guest()))
      <li><a href="{{ URL('register') }}">Sign up</a></li>
      <li><a href="{{ URL('login') }}">Login</a></li>


          @elseif (!(Auth::guest()))
          <li class="active"><a class="drop" href="{{URL('profile')}}">{{Auth::user()->name}}'s Profile</a>
        <ul>
          <li><a href="{{URL('editProfile')}}">Account Settings</a></li>
          <!-- <li><a href="{{URL('logout')}}">Sign out</a></li> -->
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
        
        @endif
                  
        </ul>
      </li>
    </ul>
  </nav>
</div>
<div class="wrapper row2">
  <div id="breadcrumb"> 
    <ul>
      <input type="text" name="search" placeholder="Search..">
    </ul>
  </div>
</div>
<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
    <div id="gallery">
      <figure>
        <ul class="nospace clear">

<li></li>
@foreach($events as $event)
<li class="one_quarter">
<div class="post-img-content">
  <a ><img  src="{{ asset($event->image)}}" alt="" style=' width:300px; height:200px;'></a>
  <br><br>
  <h6 class="nospace push10">{{$event->title}}</h6>
  <p class="nospace push10">{{$event->location->title}}</p>
  <p class="nospace push10">{{$event->date}}</p>
  <p class="nospace"><a href="{{URL('details')}}/{{$event->id}}">Read more &raquo;</a></p>
</div>
</li>
@endforeach

        </ul>
      </figure>
    </div>
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper row4">
  <footer id="footer" class="clear"> 
    <div class="one_third first">
      <h6 class="title">about</h6>
      <address class="push30">
      Company Name<br>
      Street Name &amp; Number<br>
      Town<br>
      Postcode/Zip
      </address>
      <ul class="nospace">
        <li class="push10"><span class="icon-time"></span> Mon. - Fri. 9:00am - 7:00pm</li>
        <li class="push10"><span class="icon-phone"></span> +00 (123) 456 7890</li>
        <li><span class="icon-envelope-alt"></span> info@domain.com</li>
      </ul>
    </div>
  </footer>
</div>
<div class="wrapper row5">
</div>
</body>
</html>
