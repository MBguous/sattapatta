@extends ('layouts.master')

@section ('content')

  @extends ('layouts.user')

  @section ('user-content')
  @if (Session::has('message'))
	  <div class="alert alert-info alert-dismissible" style="display:inline-block" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	    <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
	  </div>
  @endif
  	<div class="row">
  		<div class="col-md-4">
  			<div class="panel panel-success text-center">
		    	<div class="panel panel-heading">Profile Image</div>
		    	<div class="panel panel-body">
		    		<a href="#profile-image" data-toggle="modal" title="Change profile picture">
		    			{{ HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'200px', 'class'=>'img-circle']) }}
		    		</a>
		    		<div class="modal fade" id="profile-image">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="modal-title">Change profile picture</h4>
						      </div>
						      {{ Form::open(array('route'=>'post.users.profile', 'files'=>true)) }}
						      <div class="modal-body">
						        
						        	{{ Form::label('image', 'Choose an image') }}
						        	{{ Form::file('photoURL') }}
						        
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Save changes</button>
						      </div>
						      {{ Form::close() }}
						    </div>
						  </div>
						</div>
						<!-- /modal -->
		    		<br>
		    		{{ Auth::user()->username }}
		    	</div>
		    </div>
			</div>
			<!-- profile image div -->
			<div class="col-md-8">
  			<div class="panel panel-success text-center">
		    	<div class="panel panel-heading">Edit info</div>
		    	<div class="panel panel-body">
		    		
		    	</div>
		    </div>
			</div>
			<!-- profile info div -->
    </div>

  @stop

@stop