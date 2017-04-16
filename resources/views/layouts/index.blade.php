

<!DOCTYPE html>

<html>
<head>
<title>Eventak | Home</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
@yield('styles')
<body id="top" class="bgded fixed" style="background-image:url('css/images/background_1.jpg');">
<div class="wrapper row0">
  <header id="header" class="clear">
    <div id="logo">
      <h1><a href="">Eventak</a></h1>
      <p>We aren't to lead events but to follow them ^_^ </p>
    </div> 
  </header>
</div>
<div class="wrapper row1">
  <nav id="mainav" class="clear">
    <ul class="clear">
      <li ><a href="">Home</a></li>
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


  </nav>
</div>
<div class="wrapper">
  <div id="slider"> 
    <div id="slidewrap">
      <div class="heading"><span id="slidecaption"></span></div>
    </div>
  </div>
</div>
<div class="wrapper row3">
  <main id="container" class="clear"> 
    <!-- container body --> 
    <ul class="nospace center clear">
    @foreach($categories as $cat)
        <li class="one_quarter">
        <a href="{{URL('event/name')}}/{{$cat->id}}"><img class="circle pad5 borderedbox push30" src="{{asset($cat->image)}}" ></a>
        <h6 class="push10">{{$cat->name}}</h6>
        <p class="nospace push10"></p>
        </li>
    @endforeach
    </ul>
    <!-- /container body -->
    <div class="clear"></div>
  </main>
</div>
@yield('content')
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

<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/supersized/supersized.min.js"></script> 
<script>

jQuery(function ($) {
    $.supersized({
        slides: [{
            image: 'css/images/slider1.jpg',
            title: '<span class="heading">You can create your event now</span> <a href="{{URL('create')}}">Click here</a>'
        }, {
            image: 'css/images/slider3.jpg',
            title: '<span class="heading">You can create your event now</span> <a href="{{URL('create')}}">Click here</a>'
        }, {
            image: 'css/images/slider2.jpg',
            title: '<span class="heading">You can create your event now</span> <a href="{{URL('create')}}">Click here</a>'
        }]
    });
});
</script>
@yield('scripts')
</body>
</html>
