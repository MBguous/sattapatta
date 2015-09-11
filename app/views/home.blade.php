@extends ('layouts.master')

@section('title')
Sattapatta - online barter platform
@stop

@section ('styleScript')
  {{ HTML::style('css/strength-meter.css') }}
  {{ HTML::script('js/jquery.js') }}
  {{ HTML::script('js/strength-meter.js') }}
@stop

@section ('content')

  @section ('home-class')
  "active"
  @stop

  @section ('browse-class')
  ""
  @stop

  <!-- Page Content -->    
    <header class="jumbotron">
      <div class="row">
        <div class="col-md-8">
          <h1><strong>
                <i class="fa fa-quote-left pull-left fa-border"></i>
                Your only place to trade & swap!
              </strong>
          </h1>
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
        
          <!-- username -->
          <div class="form-group">
            {{ $errors->first('username', '<kbd class="error">:message</kbd>') }} 
            {{ Form::text('username', null, ['class'=>"form-control", 'placeholder'=>"Username"]) }}
          </div>
          

          <!-- password -->
          <div class="form-group">
            {{ $errors->first('password', '<kbd class="error">:message</kbd>') }}
            {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Password"]) }}
          </div>
          
          
          <!-- password again -->
          <div class="form-group">
            {{ $errors->first('password-again', '<kbd class="error">:message</kbd>') }}
            {{ Form::password('password-again', ['class'=>"form-control", 'placeholder'=>"Re-enter your password"]) }}
          </div>
          
          
          <!-- email -->
          <div class="form-group">
            {{ $errors->first('email', '<kbd class="error">:message</kbd>') }}
            {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) }}
          </div>

          <!-- submit button -->
          <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Sign up for SattaPatta</button>
          </div>

          <p class="text-center text-muted">
            or
          </p>

          <!-- oauth -->
          <!-- twitter -->
          <div class="col-md-4">
            <a href="hybridauth?provider=twitter" class="btn btn-info form-control">
              <i class="fa fa-twitter fa-2x"></i>
            </a>
          </div>
          <!-- google -->
          <div class="col-md-4">
            <a href="hybridauth?provider=google" class="btn btn-danger form-control">
              <i class="fa fa-google fa-2x"></i>
            </a>
          </div>
          <!-- facebook -->
          <div class="col-md-4">
            <a href="hybridauth?provider=facebook" class="btn btn-primary form-control">
              <i class="fa fa-facebook fa-2x"></i>
            </a>
          </div>

        </div>
      </div>
    </header>

<!-- .how-it-works -->
    <div>
        <div class="row post-item">
            <div class="col-md-5 text-center">
                <span class="fa-stack fa-5x">
                <i class="fa fa-circle fa-stack-2x text-default"></i>
                <i class="fa fa-upload fa-stack-1x fa-inverse"></i>
                </span>
                {{-- HTML::image('images/upload.png', 'upload', ['class'=>'img-responsive center-block']) --}}

            </div> <!-- .col-md-3 -->
            <div class="col-md-7">
                <strong>Post items</strong>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, minima. Praesentium fuga esse rem vitae vero vel doloremque magni laboriosam amet, ea molestiae iste a quo, quisquam eaque, nisi hic?
                </p>
            </div>
        </div> <!-- .row -->

        <div class="row find-match">
            <div class="col-md-7">
                <strong>Find match</strong>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt tenetur repellendus reiciendis accusamus, ab nobis commodi tempore sunt autem, iusto, aliquid minus voluptatibus necessitatibus ducimus assumenda tempora a neque dolore!
                </p>
            </div>
            <div class="col-md-5 text-center">
                <span class="fa-stack fa-5x">
                <i class="fa fa-circle fa-stack-2x text-warning"></i>
                <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                </span>
                {{-- HTML::image('images/search.png', 'search', ['class'=>'img-responsive center-block']) --}}
            </div> <!-- col -->
            
        </div> <!-- row -->

         <div class="row approve-request">
         <div class="col-md-5 text-center">
          <span class="fa-stack fa-5x">
            <i class="fa fa-circle fa-stack-2x text-success"></i>
            <i class="fa fa-check-square-o fa-stack-1x fa-inverse"></i>
          </span>
          {{-- HTML::image('images/check.png', 'approve', ['class'=>'img-responsive center-block']) --}}
          </div>
          <div class="col-md-7">
          <strong>Approve request</strong>
          <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum dolorum repellat sit esse quam ducimus atque, molestiae harum excepturi possimus? Distinctio ab corrupti dolorum facilis, itaque soluta? Est quasi, alias?
          </p>
         </div>
         </div> <!-- row -->

         <div class="row trade-item">
         <div class="col-md-7">
            <strong>Trade item</strong>
          <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis modi deserunt eos perferendis magni, sequi sint eaque eum consequuntur! Aut dolore pariatur nesciunt eveniet quam repudiandae nulla fugit molestias harum.
          </p>
          </div>
          <div class="col-md-5 text-center">
            <span class="fa-stack fa-5x">
            <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-refresh fa-stack-1x fa-inverse"></i>
          </span>
            {{-- HTML::image('images/refresh.png', 'trade', ['class'=>'img-responsive center-block']) --}}
         </div>
       </div>

    </div>
    <!-- /.how-it-works -->

    

   
    <!-- <div class="container">


  <div id="disqus_thread"></div>
  </div> -->
<!-- <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'sattapatta';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript> -->

@stop