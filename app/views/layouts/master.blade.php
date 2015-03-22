<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SattaPatta - Online Barter</title>

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <link rel="favicon" href="{{ asset('favicon.ico') }}">

  <!-- Bootstrap Core CSS -->
  {{ HTML::style('css/darkly.bootstrap.css') }}
  {{ HTML::style('font-awesome/css/font-awesome.min.css') }}

  <!-- Custom CSS -->
  {{ HTML::style('css/heroic-features.css') }}
  {{ HTML::style('css/search.css') }}
  {{ HTML::style('css/sidebar.css') }}

  <!-- GOOGLE FONT -->
  <!--<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>-->
  <!-- <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    @font-face {
    font-family: 'OpenSans';
    src: url(fonts/OpenSans-Regular.ttf);
    }
    html {
      font-family: 'OpenSans';
    }
    footer {
      border-top: 3px solid #222222;
      background-color: #1c1e2a;
      height: 100px;
      position: relative;
      bottom: 0px;
    }
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" style="height:50px; border-bottom: 3px solid #0e0e14;">
    <div class="container" style="height:50px;">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header" style="position:relative">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="navbar-brand" href="#">
            <img src="http://placehold.it/150x50&text=Logo" alt="">
        </a> -->
          <span>
            {{ HTML::image('images/logo.png', 'logo', ['height'=>'47px', 'width'=>'80px']) }}<span class="navbar-brand">SATTAPATTA</span>
          </span>
            
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav" style="float:right;">
            <li>
              {{ HTML::linkRoute('home', 'HOME','', ['class'=>'active']) }}
              <!-- <a href="#" class="active">HOME</a> -->
            </li>
            <li>
              <a href="#">BROWSE</a>
            </li>
            <li>
              <a href="#">HAVES</a>
            </li>
            <li>
              <a href="#">WANTS</a>
            </li>
            <li>
              <form class="navbar-form navbar-left" id="search" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <!-- <button type="submit" class="btn btn-default">Submit</button> -->
              </form>
            </li>
            <!-- <div class="btn-group">
              <a href="#" class="btn btn-default">8</a>
              <div class="btn-group">
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  Dropdown
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Dropdown link</a></li>
                  <li><a href="#">Dropdown link</a></li>
                  <li><a href="#">Dropdown link</a></li>
                 </ul>
              </div>
            </div> -->
            
              @if(Auth::check())
                <li>{{ HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'47px', 'class'=>'img-circle']) }}</li>
                <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->username }}
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>{{ HTML::link('#', 'View Profile') }}</li>
                  <li>{{ HTML::linkRoute('logout', 'Log out') }}</li>
                 </ul>
              </li>
                <!-- <li class="dropdown-toggle" data-toggle="dropdown">
                  <!- <a href="#" data-toggle="dropdown" aria-expanded="false"> 
                  {{ HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'47px']) }}
                  <span class="caret"></span>
                <! </a> --><!-- /li>
                <ul class="dropdown-menu">
                  <li><a href="#">Dropdown link</a></li>
                  <li><a href="#">Dropdown link</a></li>
                  <li><a href="#">Dropdown link</a></li>
                 </ul> --> 
                  
                <!-- </li> -->
                
              @else
                <li>{{ HTML::linkRoute('login', 'LOG IN') }}</li>
              @endif
              {{-- $profile->firstName or HTML::linkRoute('login', 'LOG IN') --}}
            
            <!-- <li>
              @if(Auth::check())
                
              @endif
            </li> -->
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    <!-- /.container -->
  </nav>

  @yield('content')


    <!-- Footer -->
    <footer>
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright &copy; SattaPatta 2015</p>
        </div>
      </div>
    </footer>

  </div>
  <!-- /.container -->

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
 

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
