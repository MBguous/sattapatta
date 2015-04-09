@extends ('layouts.master')

@section ('content')

  @section ('home-class')
  "active"
  @endsection

  @section ('browse-class')
  ""
  @endsection

  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '826606800708243',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  </script>

  <!-- Page Content -->
  <div class="container">
      
    @if (Session::has('message'))
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
      </div>
    @endif

    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
      <div class="row">
        <div class="col-md-8">
          <h1><strong>Your only place to trade and swap!</strong></h1>
          <p>
            Don't worry if you have unused stuffs cluttering up your space. Get rid of them and get something in return.
            Do it all without any cost at SattaPatta.
          </p>
          <p><a class="btn btn-primary btn-large">Register Now!</a>
          <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
          </div>
          </p>
          Find the project at <a href="https://github.com/MBguous/sattapatta"><i class="fa fa-github fa-lg"></i></a>
        </div>
        <div class="col-md-4">
          {{ Form::open(array('route'=>'accounts.create', 'class'=>'form-horizontal')) }}
        
          {{ $errors->first('username', '<p class="error">:message</p>') }}        
          <div class="form-group form-group-lg">
            <!-- <span class="input-group-addon"><i class="fa fa-user"  ></i></span> -->
            {{ Form::text('username', null, ['class'=>"form-control", 'placeholder'=>"Username"]) }}
          </div>
          <!-- <br> -->

          {{ $errors->first('password', '<p class="error">:message</p>') }}
          <div class="form-group form-group-lg">
              <!-- <span class="input-group-addon"><i class="fa fa-key"  ></i></span>   -->
            {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Password"]) }}
              <!-- <span class="input-group-addon"><i class="fa fa-key"  ></i></span>   -->
          </div>
          <!-- <br> -->
          
          {{ $errors->first('password-again', '<p class="error">:message</p>') }}
          <div class="form-group form-group-lg">
            {{ Form::password('password-again', ['class'=>"form-control", 'placeholder'=>"Re-enter your password"]) }}
          </div>
          <!-- <br> -->
          
          {{ $errors->first('email', '<p class="error">:message</p>') }}
          <div class="form-group form-group-lg">
            {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) }}
          </div>
          <!-- <br> -->
          <div class="form-group form-group-lg">
            <button type="submit" class="btn btn-primary btn-lg form-control">Sign up for SattaPatta</button>
          </div>

          <p class="text-center text-muted">
            or
          </p>
          <div class="col-md-4">
            <a href="hybridauth?provider=twitter" class="btn btn-info form-control">
              <i class="fa fa-twitter fa-2x"></i>
            </a>
          </div>
          <div class="col-md-4">
            <a href="hybridauth?provider=google" class="btn btn-danger form-control">
              <i class="fa fa-google fa-2x"></i>
            </a>
          </div>
          <div class="col-md-4">
            <a href="hybridauth?provider=facebook" class="btn btn-primary form-control">
              <i class="fa fa-facebook fa-2x"></i>
            </a>
          </div>

        </div>
      </div>
    </header>

    <!-- <hr> -->
    </div>
    <!-- .how-it-works -->
    <div style="background:#efefef; color:#020202; padding:20px 0 20px 0">
       <div class="row text-center">
         <div class="col-md-3">
          <!-- <span class="fa-stack fa-5x">
            <i class="fa fa-circle fa-stack-2x text-danger"></i>
            <i class="fa fa-upload fa-stack-1x fa-inverse"></i>
          </span> -->
          {{ HTML::image('images/upload.png', 'upload', ['height'=>'128px']) }}
          <br>
          <strong>Post items</strong>
         </div>
         <div class="col-md-3">
          <!-- <span class="fa-stack fa-5x">
            <i class="fa fa-circle fa-stack-2x text-info"></i>
            <i class="fa fa-send fa-stack-1x fa-inverse"></i>
          </span> -->
          {{ HTML::image('images/search.png', 'search', ['height'=>'128px']) }}
          <br>
          <strong>Find match</strong>
         </div>
         <div class="col-md-3">
          <!-- <span class="fa-stack fa-5x">
            <i class="fa fa-circle fa-stack-2x text-success"></i>
            <i class="fa fa-check-square-o fa-stack-1x fa-inverse"></i>
          </span> -->
          {{ HTML::image('images/check.png', 'approve', ['height'=>'128px']) }}
          <br>
          <strong>Approve request</strong>
         </div>
         <div class="col-md-3">
          <!-- <span class="fa-stack fa-5x">
            <i class="fa fa-circle fa-stack-2x text-warning"></i>
            <i class="fa fa-refresh fa-stack-1x fa-inverse"></i>
          </span> -->
          {{ HTML::image('images/refresh.png', 'trade', ['height'=>'128px']) }}
          <br>
          <strong>Trade items</strong>
         </div>
       </div>

    </div>
    <!-- /.how-it-works -->

   
    <div class="container">
    <hr>


  <div id="disqus_thread"></div>
  </div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'sattapatta';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

@stop