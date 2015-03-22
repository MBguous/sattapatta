@extends ('layouts.master')

@section('content')
	<?php
		//dd(Hash::make('123456'));
	?>

  <head>
    <style>
      /*.form-control {
        background-color: transparent;
        color: #ffffff;
      }*/
      .panel {
        border: none;
        position: relative;
        top: 80px;
      }
    </style>
  </head>
  
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default" style="background-color:#222431">
        <div class="panel-heading" style="background:#222431">
          <strong>Enter Details To Login</strong>  
        </div>
        <div class="panel-body">
          <br>
          {{ Form::open(array('route' => 'login')) }}
        
          <!-- <div>{{ $errors->first('username', '<p class="error">:message</p>') }}
          </div>  -->       
          <!-- <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-user"  ></i></span> -->
            @if($errors->has('username'))
              {{ Form::text('username', null, ['class'=>"form-control", 'placeholder'=>$errors->first('username', ':message')]) }}
            @else
              {{ Form::text('username', null, ['class'=>"form-control", 'placeholder'=>"Username"]) }}
            @endif
          
          <!-- </div> -->
          <br>

          @if($errors->has('password'))
            @if (Session::get('password_error') == !NULL)
              {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Enter the correct password"]) }}
            @else
              {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>$errors->first('password', ':message')]) }}
            @endif
          <!-- <div class="form-group input-group"> -->
              <!-- <span class="input-group-addon"><i class="fa fa-key"  ></i></span>   -->
          @else
              {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Password"]) }}
          @endif
          <!-- </div> -->
          
          <br><br>  
          <span class="pull-right"><button type="submit" class="btn btn-default btn-sm">Sign in</button></span>
          
          Not registered? {{ HTML::linkRoute('accounts.create', 'click here') }}
          <br><br>
          or sign in using
          <div class="btn-group" role="group" aria-label="...">
            <a href="hybridauth?provider=twitter" class="btn btn-info">
              <i class="fa fa-twitter"></i>
            </a>
            <a href="hybridauth?provider=google" class="btn btn-danger">
              <i class="fa fa-google"></i>
            </a>
            <a href="hybridauth?provider=facebook" class="btn btn-primary">
              <i class="fa fa-facebook"></i>
            </a>
          </div>
          <!-- <div>
            <a href="hybridauth?provider=twitter" class="btn btn-info btn-sm">
            <i class="fa fa-twitter"></i>  Log in using Twitter
            </a>
          </div>
          <br>
          <div>
            <a href="hybridauth?provider=google" class="btn btn-danger btn-sm">
              <i class="fa fa-google"></i>  Log in using Google
            </a>
          </div>
          <br>
          <div>
            <a href="hybridauth?provider=facebook" class="btn btn-primary btn-sm">
              <i class="fa fa-facebook"></i>  Log in using Facebook
            </a>
          </div> -->
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          {{-- Form::token(); --}}
        {{ Form::close() }}
      </div>  <!-- panel-body -->
    </div> <!-- panel-default -->
  </div>
</div>

@stop