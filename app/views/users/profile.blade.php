@extends ('layouts.master')

@section ('content')


<div class="row">

	@if (Auth::check() and Auth::user()->username == $user->username)
		@include ('partials.sidebar')
	@endif

	<div class="col-md-3">
		@include ('partials.users.profile.image')
    
    <p>
    	
    	@if(!Auth::check() or $loggedUser->username != $user->username)
    	{{ HTML::link('#contactModal', 'Contact', ['data-toggle'=>'modal', 'class'=>'btn btn-sm btn-default btn-block']) }}
    	{{ HTML::link('#chatModal', 'Chat', ['data-toggle'=>'modal', 'class'=>'btn btn-sm btn-default btn-block']) }}
    	@endif

    </p>

    <!-- #contactModal -->
    @include('partials.users.profile.contact')
    <!-- /#contactModal -->

    <!-- #chatModal -->
   	@include('partials.users.profile.chat')
    <!-- /#chatModal -->

  </div>
  <!-- profile image div -->

	<div class="col-md-7">

		{{-- <div class="row">
			
		  <div class="col-md-12"> --}}
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
		    		@if (Auth::check() and Auth::user()->id == $user->id)
			    		<li role="presentation"><a href="#watchlist" aria-controls="watchlist" role="tab" data-toggle="tab">Watchlist</a></li>
		    		@endif
		    		<li role="presentation"><a href="#listings" aria-controls="listings" role="tab" data-toggle="tab">Listings</a></li>
		    	</ul>

		    	<!-- Tab panes -->
		    	<div class="tab-content">
		    		<div role="tabpanel" class="tab-pane fade in active" id="profile">
		    			<br><br>

							@if(Auth::check() and Auth::user()->id == $user->id)
							<div class="progress">
								<div class="progress-bar progress-bar-striped" style="width: {{ $pc }}%;">
									{{ $pc }}% Profile Complete
								</div>
							</div>
							@endif
		    			<div class="col-md-12">
		    				<table class="table table-striped table-hover" id="profile-table">
		    					<tr>
		    						<th>Username</th>
		    						<td>

		    							<a href="#" id="username" data-type="text" data-pk="{{$user->id}}" data-url="profile/edit" data-title="Enter username">
		    								{{ $user->username }}
		    							</a>

		    							@if(Auth::check() and Auth::user()->id == $user->id)
		    							<a href="#edit-profile" data-toggle="modal" class="pull-right">
		    								<i class="icon icon-Pencil"></i>&nbsp;Edit username
		    							</a>
		    							@endif
		    						</td>
		    					</tr>
		    					<tr>
		    						<th>Email</th>
		    						<td>
		    							@if(Auth::check() and Auth::user()->id == $user->id)
			    							<a href="#" id="email" data-type="text" data-pk="{{$user->id}}" data-url="profile/edit" data-title="Enter email">
			    								{{ $user->email }}			
			    							</a>
			    						@else
			    							{{ $user->email }}
			    						@endif

		    						</td>
		    					</tr>
		    					<tr>
		    						<th>First Name</th>
		    						<td>
			    						@if(Auth::check() and Auth::user()->id == $user->id)
			    							<a href="#" id="firstName" data-type="text" data-pk="{{$user->id}}" data-url="profile/edit" data-title="Enter first name">
			    								{{ $user->firstName }}			
			    							</a>
		    							@else
			    							{{ $user->firstName }}
		    							@endif

		    						</td>
		    					</tr>
		    					<tr>
		    						<th>Last Name</th>
		    						<td>
		    							@if(Auth::check() and Auth::user()->id == $user->id)
			    							<a href="#" id="lastName" data-type="text" data-pk="{{$user->id}}" data-url="profile/edit" data-title="Enter last name">
			    								{{ $user->lastName }}			
			    							</a>
			    						@else
			    							{{ $user->lastName }}
			    						@endif

		    						</td>
		    					</tr>
		    					<tr>
		    						<th>Gender</th>
		    						<td>
			    						@if(Auth::check() and Auth::user()->id == $user->id)
			    							<a href="#" id="gender" data-type="select" data-pk="{{$user->id}}" data-url="profile/edit" data-title="Select gender"></a>
		    							@else
		    								@if($user->gender == 1)
		    									Male
		    								@elseif($user->gender == 2)
		    									Female
		    								@elseif($user->gender == 3)
		    									Other
		    								@endif
		    							@endif
		    							{{ Form::hidden('gender-value', $user->gender, ['id'=>'gender-value']) }}
		    						</td>
		    					</tr>
		    					<tr>
		    						<th>Date of Birth</th>
		    						<td>
			    						@if(Auth::check() and Auth::user()->id == $user->id)
			    							<a href="#" id="birthYear" data-type="select" data-pk="{{$user->id}}" data-url="profile/edit" data-value="{{$user->birthYear}}" data-title="Select year"></a>
			    							-
			    							<a href="#" id="birthMonth" data-type="select" data-pk="{{$user->id}}" data-url="profile/edit" data-value="{{$user->birthMonth}}" data-title="Select month"></a>
			    							-
			    							<a href="#" id="birthDay" data-type="select" data-pk="{{$user->id}}" data-url="profile/edit" data-value="{{$user->birthDay}}" data-title="Select day"></a>
											@else
												{{ $user->birthYear }} - {{ $user->birthMonth }} - {{ $user->birthDay }}
											@endif
		    							{{ Form::hidden('birthYear-value', $user->birthYear, ['id'=>'birthYear-value']) }}
		    							{{ Form::hidden('birthMonth-value', $user->birthMonth, ['id'=>'birthMonth-value']) }}
		    							{{ Form::hidden('birthDay-value', $user->birthDay, ['id'=>'birthDay-value']) }}
		    						</td>
		    					</tr>
		    					<tr>
		    						<th>Phone</th>
		    						<td>
		    							@if(Auth::check() and Auth::user()->id == $user->id)
			    							<a href="#" id="phone" data-type="tel" data-pk="{{$user->id}}" data-url="profile/edit" data-title="Enter phone">
			    								{{ $user->phone }}			
			    							</a>
			    						@else
			    							{{ $user->phone }}
			    						@endif

		    						</td>
		    					</tr>
		    					<tr>
		    						<th>Address</th>
		    						<td>
		    							@if(Auth::check() and Auth::user()->id == $user->id)
			    							<a href="#" id="address" data-type="text" data-pk="{{$user->id}}" data-url="profile/edit" data-title="Enter address">
			    								{{ $user->address }}			
			    							</a>
		    							@else
		    								{{ $user->address }}
		    							@endif

		    						</td>
		    					</tr>
		    					<tr>
		    						<th>Country</th>
		    						<td>
		    							@if(Auth::check() and Auth::user()->id == $user->id)
			    							<a href="#" id="country" data-type="text" data-pk="{{$user->id}}" data-url="profile/edit" data-title="Enter country">
			    								{{ $user->country }}			
			    							</a>
			    						@else
			    							{{ $user->country }}
			    						@endif
		    						</td>
		    					</tr>
		    				</table>

		    				
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

		    						<div class="modal-body">

		    							<div class="form-group">
		    								{{ Form::label('username', 'Username', ['class'=>'col-md-3 control-label']) }}
		    								<div class="col-md-9">
		    									{{ Form::text('username', null, ['class'=>'form-control']) }}
		    									<div id="username_error"></div>
		    								</div>
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
		    		@if (!Auth::guest())
			    		<div role="tabpanel" class="tab-pane fade" id="watchlist">
							@include('partials.watchlist')
			    		</div>
		    		@endif
		    		<div role="tabpanel" class="tab-pane fade" id="listings">
		    			<br>
		    			<!-- accordion -->
		    			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

		    				@foreach ($items as $item)
		    				<div class="panel panel-default">
		    					<div class="panel-heading" role="tab">
		    						<h4 class="panel-title">
		    							{{ HTML::link('#'.$item->id, $item->name, ['class'=>'collapsed', 'data-toggle'=>'collapse', 'data-parent'=>'#accordion']) }}
		    							@if ($item->status == 'unavailable')
		    							<span class="label label-warning">done deal</span>
		    							@endif
		    							<!-- <a class="collapsed" data-toggle="collapse" data-parent="accordion"  href="#{{$item->id}}">
		    								{{ $item->name }} 
		    							</a> -->
						        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Collapsible Group Item #1
						        </a> -->
						      </h4>
						    </div>
						    <div id={{ $item->id }} class="panel-collapse collapse" role="tabpanel">
						    	<div class="panel-body">
						    		<div class="col-md-4">
						    			<a href="{{URL::route('items.show', [$item->user->username, $item->name, $item->id])}}">

						    				@if(!$item->images->first())
						    				{{ HTML::image('images/placeholder.png', null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
						    				@else
						    				{{ HTML::image($item->images->first()->imageUrl, null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
						    				@endif
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
				</div> <!-- profile info div -->
			</div>
		{{-- </div> --}}
		
	{{-- </div> --}}

	<!-- <h2>Dashboard</h2> -->
</div>
</div>

@stop

@section ('script')

	<script>
		$('#username').editable('disable');



	</script>

@stop