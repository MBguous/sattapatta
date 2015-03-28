@extends ('layouts.master')

@section ('content')

	<div id="wrapper">
   
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                      {{-- HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'60px', 'class'=>'img-circle']) --}}
                    </a>
                </li>
                <li>{{ HTML::linkRoute('users.dashboard', 'Dashboard', Auth::user()->username) }}</li>
                <li>{{ HTML::linkRoute('users.post', 'Post Item', Auth::user()->username) }}</li>
                <li>{{ HTML::linkRoute('users.listing', 'My Listings', Auth::user()->username) }}</li>
                <li>{{ HTML::link('#', 'Messages') }}</li>
                <li>
                	<blockquote>
                		{{ HTML::linkRoute('users.profile', 'Profile', Auth::user()->username, ['style'=>'background:#454545']) }}
                	</blockquote>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->   

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                @if (Session::has('message'))

				  <div class="alert alert-warning alert-dismissible" id="messageDiv" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      <span aria-hidden="true">&times;</span>
				    </button>
				    <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
				  </div>
			  @endif
                    <div class="col-lg-12">
                        <a href="#menu-toggle" id="menu-toggle"><i class='fa fa-align-justify fa-2x'></i></a>
                        
  <div id="messageDiv"></div>
  
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
						      {{ Form::open(array('url'=>'users/profile/image', 'files'=>true)) }}
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
  			<!-- <div class="panel panel-success text-center">
		    	<div class="panel panel-heading">Edit info</div>
		    	<div class="panel panel-body">
		    		
		    	</div>
		    </div> -->
		    <div role="tabpanel">

				  <!-- Nav tabs -->
				  <ul class="nav nav-pills nav-justified" role="tablist">
				    <li role="presentation" class="active">
				    	<a href="#profile" aria-controls="profile" role="tab" data-toggle="pill"> Edit Profile</a>
				  	</li>
				    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="pill">Messages</a></li>
				    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="pill">Settings</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="profile">
				    	<br><br>
				    	<div class="col-md-12">
				    		<table class="table table-striped table-hover">
			        		<tr>
			        			<th>Username</th>
			        			<td>{{ Auth::user()->username }}</td>
			        		</tr>
			        		<tr>
			        			<th>Email</th>
			        			<td>{{ Auth::user()->email }}</td>
			        		</tr>
			        		<tr>
			        			<th>First Name</th>
			        			<td>{{ Auth::user()->firstName }}</td>
			        		</tr>
			        		<tr>
			        			<th>Last Name</th>
			        			<td>{{ Auth::user()->lastName }}</td>
			        		</tr>
			        		<tr>
			        			<th>Gender</th>
			        			<td>{{ Auth::user()->gender }}</td>
			        		</tr>
			        		<tr>
			        			<th>Date of Birth</th>
			        			<td>{{ Auth::user()->gender }}</td>
			        		</tr>
			        		<tr>
			        			<th>Phone</th>
			        			<td>{{ Auth::user()->phone }}</td>
			        		</tr>
			        		<tr>
			        			<th>Address</th>
			        			<td>{{ Auth::user()->address }}</td>
			        		</tr>
			        		<tr>
			        			<th>Country</th>
			        			<td>{{ Auth::user()->country }}</td>
			        		</tr>
			        	</table>
			        	{{ HTML::link('#edit-profile', 'Edit', ['data-toggle'=>'modal']) }}
				    	</div>
				    		
			    		<div class="modal fade" id="edit-profile">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="modal-title">Edit profile details</h4>
						      </div>

						      {{ Form::model(Auth::user(), array('url'=>array('users/profile/info', Auth::user()->username), 'class'=>'form-horizontal', 'id'=>'infoForm', 'method'=>'put')) }}
      {{-- Form::model(Auth::user(), array('route'=>array('users.profile.info'=>Auth::user()->id, 'method'=>'put'), 'class'=>'form-horizontal', 'id'=>'infoForm')) --}}
								      <!-- <form action="#" id="infoForm" class="form-horizontal"> -->
						      <div class="modal-body">

						    <div class="form-group">
						    	{{ Form::label('username', 'Username', ['class'=>'col-md-3 control-label']) }}
						    	<div class="col-md-9">
							    	{{ Form::text('username', null, ['class'=>'form-control']) }}
							    	<div id="username_error"></div>
						    	</div>
						    </div>

							    <div class="form-group">
							    	{{ Form::label('firstName', 'First Name', ['class'=>'col-md-3 control-label']) }}
							    	<div class="col-md-9">
								    	{{ Form::text('firstName', null, ['class'=>'form-control']) }}
								    	<div id="firstName_error"></div>
							    	</div>
							    </div>

							    <div class="form-group">
							    	{{ Form::label('lastName', 'Last Name', ['class'=>'col-md-3 control-label']) }}
							    	<div class="col-md-9">
								    	{{ Form::text('lastName', null, ['class'=>'form-control']) }}
								    	<div id="lastName_error"></div>
							    	</div>
							    </div>

							    <div class="form-group">
							      <label class="col-lg-3 control-label">Gender</label>
							      <div class="col-lg-9">
							        <div class="radio">
							          <label>
							            <input type="radio" name="gender" id="male" value="male" checked="">
							            Male
							          </label>
							        </div>
							        <div class="radio">
							          <label>
							            <input type="radio" name="gender" id="female" value="female">
							            Female
							          </label>
							        </div>
							        <div id="gender_error"></div>
							      </div>
							    </div>

							    <div class="form-group">
							    	{{ Form::label('birthDay', 'Birth Day', ['class'=>'col-md-3 control-label']) }}
							    	<div class="col-md-9">
								    	{{ Form::selectRange('birthDay', 1, 31, null, ['class'=>'form-control']) }}
								    	<div id="birthDay_error"></div>
							    	</div>
							    </div>

							    <div class="form-group">
							    	{{ Form::label('birthMonth', 'Birth Month', ['class'=>'col-md-3 control-label']) }}
							    	<div class="col-md-9">
								    	{{ Form::selectMonth('birthMonth', null, ['class'=>'form-control']) }}
								    	<div id="birthMonth_error"></div>
							    	</div>
							    </div>

							    <div class="form-group">
							    	{{ Form::label('birthYear', 'Birth Year', ['class'=>'col-md-3 control-label']) }}
							    	<div class="col-md-9">
								    	{{ Form::selectYear('birthYear', 1950, 2015, 1980, ['class'=>'form-control']) }}
								    	<div id="birthYear_error"></div>
							    	</div>
							    </div>

							    <div class="form-group">
							    	{{ Form::label('phone', 'Phone', ['class'=>'col-md-3 control-label']) }}
							    	<div class="col-md-9">
								    	{{ Form::text('phone', null, ['class'=>'form-control']) }}
							    	</div>
							    	<div id="phone_error"></div>
							    </div>

							    <div class="form-group">
							    	{{ Form::label('address', 'Address', ['class'=>'col-md-3 control-label']) }}
							    	<div class="col-md-9">
								    	{{ Form::text('address', null, ['class'=>'form-control']) }}
							    	</div>
							    	<div id="address_error"></div>
							    </div>

							    <div class="form-group">
							    	{{ Form::label('country', 'Country', ['class'=>'col-md-3 control-label']) }}
							    	<div class="col-md-9">
								    	{{ Form::text('country', null, ['class'=>'form-control']) }}
							    	</div>
							    	<div id="country_error"></div>
							    </div>
								        
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        <button type="submit" class="btn btn-primary">Save changes</button>
								      </div>
								      <!-- </form> -->
								      {{ Form::close() }}
								    </div>
								  </div>
								</div>
								<!-- /modal -->
				    	
				    </div>
				    <div role="tabpanel" class="tab-pane" id="messages">Messages</div>
				    <div role="tabpanel" class="tab-pane" id="settings">Settings</div>
				  </div>
				</div>
			</div>
			<!-- profile info div -->
    </div>
                        
                        <!-- <h2>Dashboard</h2> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<script>

	// $(document).on('submit', '#infoForm', function(event) {
	// 	event.preventDefault();
	// 	var $form = $(this); 
	// 	var data=$form.serialize();
	// 	var url=$form.attr("url");
	// 	var posting = $.post(url, {formData:data});
	// 	// posting.done(function(data){
	// 	// 	if(data.fail) {
	// 	// 		$.each(data.errors, function(index, value){
	// 	// 			var errorDiv = '#'+index+'_error';
	// 	// 			$(errorDiv).addClass('required');
	// 	// 			$(errorDiv).empty().append(value);
	// 	// 		});
	// 	// 	}
	// 	// });
	// 	$.post(url, {formData:data}, function(response){
	// 		// validation success
	// 	}).fail(function(response){
	// 		//validation fail
	// 		//if(data.fail) {
	// 			$.each(data.errors, function(index, value){
	// 				var errorDiv = '#'+index+'_error';
	// 				$(errorDiv).addClass('required');
	// 				$(errorDiv).empty().append(value);
	// 			});
	// 		//}
	// 	});
	// });

</script>

@stop