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


  <style>
    @font-face {
    font-family: 'OpenSans';
    src: url(fonts/OpenSans-Regular.ttf);
    }
    html {
      font-family: 'OpenSans';
    }
    /*body, html{
      min-height: 100%;
      height: 100%;
    }
    body {
      overflow-x: hidden;
    }*/
    a i{
      outline: none;
    }
    .body-container{
      min-height: 100%;

    }
    .body-container:after {
      content: "";
      display: block;
    }
    .body-container:after {
      height: 100px; 
    }
    /*footer {
      border-top: 3px solid #222222;
      background-color: #1c1e2a;
      height: 100px;
      position: relative;
      margin-bottom: 0;
      margin-top: -100px;
    }*/
    /* Sticky footer styles
-------------------------------------------------- */
    html {
      position: relative;
      min-height: 100%;
    }
    body {
      /* Margin bottom by footer height */
      margin-bottom: 60px;
    }
    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      /* Set the fixed height of the footer here */
      height: 72px;
      background-color: #222222;
    }
    .footer>.container {
      padding: 20px;
    }
  </style>

</head>

<body>
<div class="body-container">

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
              {{ HTML::linkRoute('items.browse', 'BROWSE') }}
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
                  <li>{{ HTML::linkRoute('users.dashboard', 'Dashboard', Auth::user()->username) }}</li>
                  <li>{{ HTML::linkRoute('users.post', 'Post item', Auth::user()->username) }}</li>
                  <li>{{ HTML::linkRoute('users.listing', 'My listings', Auth::user()->username) }}</li>
                  <li>{{ HTML::link('#', 'Messages') }}</li>
                  <li>{{ HTML::linkRoute('users.profile', 'Profile', Auth::user()->username) }}</li>
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


</div>
    

    <!-- Footer -->
    <!-- <footer>
      <div class="row text-center">
        <div class="col-md-4 col-md-offset-4">
          <br>
          <p class="navbar-text">Copyright &copy; SattaPatta 2015</p>
        </div>
      </div>
    </footer> -->

    

  </div>
  <!-- /.container -->

    <div class="footer">
      <div class="container">
        <p class="text-muted text-center">Copyright &copy; SattaPatta {{ date('Y') }}</p>
      </div>
    </div>

  <!-- jQuery -->
  <!-- // <script src="js/jquery.js"></script> -->
  {{ HTML::script('js/jquery.js') }}

  <!-- Bootstrap Core JavaScript -->
  <!-- // <script src="js/bootstrap.min.js"></script> -->
  {{ HTML::script('js/bootstrap.min.js') }}
 

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

 /*   $(document).ready(function(){
      $('#get').click(function(e){
        e.preventDefault();

        // ajax get
        $.get('jpt/get', function(data) {
          console.log(data);
        });
      });

      $('form').submit(function(e) {
        e.preventDefault();

        var name = $(this).find('input[name=name]').val();

        // ajax post
        $.post('jpt/get', {name: name}, function(data){
          console.log(data);
        });
      });
    });*/

    $(document).ready(function(){
      $('#infoForm').submit(function(e) {
        e.preventDefault();

        var name = $(this).find('input[name=username]').val();
        var $form = $(this); 
        var data=$form.serialize();

        // ajax post
        // $.post('profile/info', {data: name}, function(jpt){
        $.post('profile/info', {formData:data}, function(response){
          if(response.fail) {
             $.each(response.errors, function(index, value){
               var errorDiv = '#'+index+'_error';
               // console.log(errorDiv);
               $(errorDiv).addClass('text-danger');
               $(errorDiv).empty().append(value);
             });
           }
           if(response.success) {
            $('#edit-profile').slideUp();
            var successMessage = 'Profile info updated successfully';
              $('#messageDiv').empty().append(successMessage);
           }
          // console.log(response.errors);
        });
      });
    });

   
/*    $(document).on('submit', '#infoForm', function(event) {
    event.preventDefault();
    var $form = $(this); 
    var data=$form.serialize();
    var url=$form.attr("url");
    var posting = $.post(url, {formData:data});
    // posting.done(function(data){
    //  if(data.fail) {
    //    $.each(data.errors, function(index, value){
    //      var errorDiv = '#'+index+'_error';
    //      $(errorDiv).addClass('required');
    //      $(errorDiv).empty().append(value);
    //    });
    //  }
    // });
    $.post(url, {formData:data}, function(response){
      // validation success
    }).fail(function(response){
      //validation fail
      //if(data.fail) {
        $.each(data.errors, function(index, value){
          var errorDiv = '#'+index+'_error';
          $(errorDiv).addClass('required');
          $(errorDiv).empty().append(value);
        });
      //}
    });
  });*/
    </script>

</body>

</html>
