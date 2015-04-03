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
      /*.panel {
        /*border: none;*/
        /*position: relative;
        top: 80px;
      }*/
    </style>
  </head>
  
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-info">
        <div class="panel-heading text-center">
          <strong>Enter Details To Login</strong>  
        </div>
        <div class="panel-body">
          <br>
          {{ Form::open(array('route' => 'login')) }}
        
          <!-- <div>{{ $errors->first('username', '<p class="error">:message</p>') }}
          </div>  -->       
         
            <!-- <span class="input-group-addon"><i class="fa fa-user"  ></i></span> -->
            @if($errors->has('username'))
              <div class="form-group form-group-lg has-error">
                {{ Form::text('username', null, ['class'=>"form-control", 'placeholder'=>$errors->first('username', ':message')]) }}
              </div>
            @else
              <div class="form-group form-group-lg">
                {{ Form::text('username', null, ['class'=>"form-control", 'placeholder'=>"Username"]) }}
              </div>
            @endif

          <!-- </div> -->
          <!-- <br> -->
          
            @if($errors->has('password'))
              <div class="form-group form-group-lg has-error">
                @if (Session::get('password_error') == !NULL)
                  {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Enter the correct password"]) }}
                @else
                  {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>$errors->first('password', ':message')]) }}
                @endif
              </div>
                <!-- <span class="input-group-addon"><i class="fa fa-key"  ></i></span>   -->
            @else
              <div class="form-group form-group-lg">
                {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Password"]) }}
              </div>
            @endif
          
          <!-- <br><br>   -->
          <div class="form-group form-group-lg">
            {{ Form::submit('Sign in', ['class'=>'form-control btn btn-primary']) }}
          </div>
          
          <!-- <br><br> -->
          <p class="text-center text-muted">
            ------ or ------
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
      <div class="panel-footer">
        <p>
          Not registered? {{ HTML::linkRoute('accounts.create', 'click here') }}
        </p>
      </div>
    </div> <!-- panel-default -->
  </div>
</div>

@stop