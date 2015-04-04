@extends ('layouts.master')

@section ('content')

	<div id="wrapper" class="toggled">
   
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                      {{-- HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'60px', 'class'=>'img-circle']) --}}
                    </a>
                </li>
                <li>{{-- HTML::linkRoute('users.dashboard', 'Dashboard', Auth::user()->username) --}}</li>
                <li>{{-- HTML::linkRoute('users.post', 'Post Item', Auth::user()->username) --}}</li>
                <li>{{-- HTML::linkRoute('users.listing', 'My Listings', Auth::user()->username) --}}</li>
                <li>{{-- HTML::link('#', 'Messages') --}}</li>
                <li>
                	<blockquote>
                		{{-- HTML::linkRoute('users.profile', 'Profile', Auth::user()->username, ['style'=>'background:#454545']) --}}
                	</blockquote>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->   
<!-- <a href="#menu-toggle" id="menu-toggle"><i class='fa fa-align-justify fa-2x'></i></a> -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                @if (Session::has('message'))

				  <div class="alert alert-info alert-dismissible" id="messageDiv" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      <span aria-hidden="true">&times;</span>
				    </button>
				    <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
				  </div>
			  @endif

                    <div class="col-md-offset-1 col-md-10">
                        
                        
  <div id="messageDiv"></div>
  
  	<div class="row">
  		<div class="col-md-3">
  			<div class="panel panel-warning text-center">
		    	<div class="panel-heading">Profile Image</div>
		    	<div class="panel-body">
		    		<a href="#profile-image" data-toggle="modal" title="Change profile picture">
		    			{{ HTML::image($user->photoURL, 'profile-pic', ['height'=>'200px', 'class'=>'img-circle img-responsive']) }}
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
		    		<!-- <br>
		    		<hr> -->
		    		
		    	</div>
		    	<div class="panel-footer">
		    		<p>
		    			{{ $user->username }}	
		    		</p>
		    		
		    		<p>
				    	<i class="fa fa-calendar"></i> Joined on {{ date('M j, 20y',strtotime($user->created_at)); }}
				    </p>
		    	</div>
		    </div>
		    
		    <p>
		    	
			    	@if(!Auth::check() or Auth::user()->username != $user->username)
				    	{{ HTML::link('#contactModal', 'Contact', ['data-toggle'=>'modal', 'class'=>'btn btn-default']) }}
			    	@endif
			    
		    </p>

		    @if (Auth::check())
		    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">To: {{ $user->username }}</h4>
				      </div>
				      <div class="modal-body">
				        
				      {{ Form::open(array('route'=>array('send.message', $user->username), 'class'=>'form-horizontal')) }}
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-offset-1 col-md-10">
                        {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                        <div class="text-danger" id="title_error">{{ $errors->first('title', ':message') }}</div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-offset-1 col-md-10">
                        {{ Form::textarea('content', null, ['class'=>'form-control', 'placeholder'=>'Write your message']) }}
                        <div class="text-danger" id="content_error">{{ $errors->first('content', ':message') }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-offset-1 col-md-10">
                    {{ Form::submit('Send message', array('class'=>'btn btn-primary')) }}
                    {{ HTML::link('#', 'Close', array('class'=>'btn btn-default', 'data-dismiss'=>'modal')) }}
                  		</div>
                  		</div>
                  		</div>
                  {{ Form::close() }}

				      </div>
				      
				    </div>
				  </div>
				</div>
				<!-- /.modal -->
				@else
					<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">
					        	Please {{ HTML::linkRoute('login', 'log in') }}
					        </h4>
					      </div>
					      <div class="modal-body">
					      	<p>You must logged in to be able to send messages.</p>
					      </div>
				      </div>
			      </div>
		      </div>
				@endif
			</div>
			<!-- profile image div -->
			<div class="col-md-9">
  			<!-- <div class="panel panel-success text-center">
		    	<div class="panel panel-heading">Edit info</div>
		    	<div class="panel panel-body">
		    		
		    	</div>
		    </div> -->
		    <div role="tabpanel">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active">
				    	<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> Basic info</a>
				  	</li>
				    <li role="presentation"><a href="#wishlist" aria-controls="wishlist" role="tab" data-toggle="tab">Wishlist</a></li>
				    <li role="presentation"><a href="#listings" aria-controls="listings" role="tab" data-toggle="tab">Listings</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane fade in active" id="profile">
				    	<br><br>
				    	<div class="col-md-12">
				    		<table class="table table-striped table-hover">
			        		<tr>
			        			<th>Username</th>
			        			<td>{{ $user->username }}</td>
			        		</tr>
			        		<tr>
			        			<th>Email</th>
			        			<td>{{ $user->email }}</td>
			        		</tr>
			        		<tr>
			        			<th>First Name</th>
			        			<td>{{ $user->firstName }}</td>
			        		</tr>
			        		<tr>
			        			<th>Last Name</th>
			        			<td>{{ $user->lastName }}</td>
			        		</tr>
			        		<tr>
			        			<th>Gender</th>
			        			<td>{{ $user->gender }}</td>
			        		</tr>
			        		<tr>
			        			<th>Date of Birth</th>
			        			<td>{{ $user->gender }}</td>
			        		</tr>
			        		<tr>
			        			<th>Phone</th>
			        			<td>{{ $user->phone }}</td>
			        		</tr>
			        		<tr>
			        			<th>Address</th>
			        			<td>{{ $user->address }}</td>
			        		</tr>
			        		<tr>
			        			<th>Country</th>
			        			<td>{{ $user->country }}</td>
			        		</tr>
			        	</table>

			        	@if(Auth::check() and Auth::user()->id == $user->id)
				        	{{ HTML::link('#edit-profile', 'Edit', ['data-toggle'=>'modal']) }}
			        	@endif
				    	</div>
				    		
			    		<div class="modal fade" id="edit-profile">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="modal-title">Edit profile details</h4>
						      </div>

						      @if(Auth::check() and Auth::user()->id == $user->id)
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
								      @endif
								    </div>
								  </div>
								</div>
								<!-- /modal -->
				    	
				    </div>
				    <div role="tabpanel" class="tab-pane fade" id="wishlist">Wishlist</div>
				    <div role="tabpanel" class="tab-pane fade" id="listings">
				    <br>
				    	<!-- accordion -->
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

						@foreach ($items as $item)
							<div class="panel panel-info">
						    <div class="panel-heading" role="tab">
						      <h4 class="panel-title">
						      	{{ HTML::link('#'.$item->id, $item->name, ['class'=>'collapsed', 'data-toggle'=>'collapse', 'data-parent'=>'#accordion']) }}
						        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Collapsible Group Item #1
						        </a> -->
						      </h4>
						    </div>
						    <div id={{ $item->id }} class="panel-collapse collapse" role="tabpanel">
						      <div class="panel-body">
						        <div class="col-md-4">
						        	<a href="{{URL::route('items.show', [$item->user->username, $item->name, $item->id])}}">
							        	{{ HTML::image($item->photoURL, null, ['style'=>'display: lock; height:auto; max-width: 100%']) }}
						        	</a>
						        </div>
						        <div class="col-md-8">
						        	<table class="table table-striped table-hover">
						        		<tr>
						        			<th>Name</th>
						        			<td>{{ $item->name }}</td>
						        		</tr>
						        		<tr>
						        			<th>Price</th>
						        			<td>Rs. {{ $item->price }}</td>
						        		</tr>
						        		<tr>
						        			<th>Description</th>
						        			<td>{{ $item->description }}</td>
						        		</tr>
						        		<tr>
						        			<th>Posted on</th>
						        			<td>{{ $item->date }} {{ $item->time }}</td>
						        		</tr>
						        		<tr>
						        			<th>Status</th>
						        			<td>{{ $item->status }}</td>
						        		</tr>
						        	</table>
						        </div>
						      </div>
						    </div>
						  </div>
						@endforeach

						</div>
						<!-- accordion -->

				    </div>
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