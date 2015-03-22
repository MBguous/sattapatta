@extends ('layouts.master')

@section ('content')

	<div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default" style="background-color:#222431">
        <div class="panel-heading" style="background:#222431">
          <strong>Registration</strong>  
        </div>
        <div class="panel-body">
          <br>
          {{ Form::open(array('route' => 'accounts.create')) }}
        
          <div>{{ $errors->first('username', '<p class="error">:message</p>') }}
          </div>        
          <!-- <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-user"  ></i></span> -->
            {{ Form::text('username', null, ['class'=>"form-control", 'placeholder'=>"Username"]) }}
          <!-- </div> -->
          <br>

          {{ $errors->first('password', '<p class="error">:message</p>') }}
          <!-- <div class="form-group input-group"> -->
              <!-- <span class="input-group-addon"><i class="fa fa-key"  ></i></span>   -->
              {{ Form::password('password', ['class'=>"form-control", 'placeholder'=>"Password"]) }}
              <!-- <span class="input-group-addon"><i class="fa fa-key"  ></i></span>   -->
          <!-- </div> -->
          <br>
          <div>
          	{{ $errors->first('password-again', '<p class="error">:message</p>') }}
						{{ Form::password('password-again', ['class'=>"form-control", 'placeholder'=>"Re-enter your password"]) }}
					</div>
          <br>
					<div>
						{{ $errors->first('email', '<p class="error">:message</p>') }}
						{{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) }}
					</div>

          <br><br>  
          <span class="pull-right"><button type="submit" class="btn btn-warning btn-sm">Register</button></span>
          
          <br><br>
          <div>
            <a href="twitterAuth" class="btn btn-info btn-xs">
            <i class="fa fa-twitter"></i>  Log in using Twitter
            </a>
          </div>
          <br>
          <div>
            <a href="googleAuth" class="btn btn-success btn-xs">
              <i class="fa fa-google"></i>  Log in using Google
            </a>
          </div>
          <br>
          <div>
            <a href="facebookAuth" class="btn btn-primary btn-xs">
              <i class="fa fa-facebook"></i>  Log in using Facebook
            </a>
          </div>
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          {{-- Form::token(); --}}
        {{ Form::close() }}
      </div>  <!-- panel-body -->
    </div> <!-- panel-default -->
  </div>
</div>

@stop