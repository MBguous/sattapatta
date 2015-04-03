@extends ('layouts.master')

@section ('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="row">
					<div class="col-md-7">

						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><strong>{{ $swapItem->name }}</strong><small class="pull-right">2 requests</small></h2>
							</div>
							<div class="panel-body">
								

								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
								  <!-- Indicators -->
								  <ol class="carousel-indicators">
								    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
								  </ol>

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" role="listbox">
								    <div class="item active">
								    	{{ HTML::image($swapItem->photoURL, 'item image', ['class'=>'img-responsive']) }}
								      <div class="carousel-caption">
								        ...
								      </div>
								    </div>
								    <div class="item">
								      <img src="..." alt="...">
								      <div class="carousel-caption">
								        ...
								      </div>
								    </div>
								    ...
								  </div>

								  <!-- Controls -->
								  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								  </a>
								</div>

							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h5><strong>Description</strong></h5>	
							</div>
							<div class="panel-body">
								{{ $swapItem->description }}
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h5><strong>Wants for this item</strong></h5>	
							</div>
							<div class="panel-body">
							
								

						    <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>

							</div>
						</div>



						<div class="panel panel-default">
							<div class="panel-heading">
								<h5><strong>Comments</strong></h5>	
							</div>
							<div class="panel-body">

								<div class="media">
								  <div class="media-left">
								    <a href="#">
								      <img class="media-object" src="..." alt="...">
								    </a>
								  </div>
								  <div class="media-body">
								    <h4 class="media-heading">Media heading</h4>
								    <p>
								    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								    </p>
								  </div>
								</div>

								<ul class="media-list">
								  <li class="media">
								    <div class="media-left">
								      <a href="#">
								        <img class="media-object" src="..." alt="...">
								      </a>
								    </div>
								    <div class="media-body">
								      <h4 class="media-heading">Media heading</h4>
								      <p>
								      	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								      </p>
								      <ul class="media-list">
											  <li class="media">
											    <div class="media-left">
											      <a href="#">
											        <img class="media-object" src="..." alt="...">
											      </a>
											    </div>
											    <div class="media-body">
											      <h4 class="media-heading">Media heading</h4>
											      <p>
											      	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											      </p>
											    </div>
											  </li>
											</ul>
								    </div>
								  </li>
								</ul>

							</div>
						</div>

						<hr/>
						<!-- comment static popover -->
						<blockquote>2 comments</blockquote>
						{{ Form::open(array('url'=>array('users/profile/info', $swapItem->name), 'class'=>'form-horizontal')) }}
							<!-- <div class="row"> -->
								<div class="form-group">
						    	{{ HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'auto', 'class'=>'col-md-2 img-circle']) }}
						    	<div class="col-md-10">
							    	{{ Form::textArea('comment', null, ['class'=>'form-control', 'placeholder'=>'Have your say...']) }}
						    	</div>
						    </div>
						{{ Form::close() }}

						{{ HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'auto', 'class'=>'col-md-2 img-circle img-responsive']) }}
						<div class="popover-example col-md-10">
							<div class="popover right" id="comment" style="max-width:none">
					      <div class="arrow"></div>
					      <h3 class="popover-title">Popover right</h3>
					      <div class="popover-content">
					        <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
					      </div>
					    </div>
						</div>
						<div class="media">
						  <div class="media-left">
						    <a href="#">
						    	<!-- <img class="media-object" src="{{Auth::user()->photoURL}}" alt="..."> -->
						    
						    </a>
						  </div>
						  <div class="media-body">
						    <!-- <h4 class="media-heading">Media heading</h4> -->
						    
						  </div>
						</div>								

						
						<!-- /comment static popover-->

					</div>
					<div class="col-md-5">
						<div class="panel panel-default">
							<div class="panel-heading">Send request now</div>
							
							<div class="panel-body">
								{{ Form::open(array('url'=>array('users/profile/info', $swapItem->name), 'class'=>'form-horizontal')) }}
									<!-- <div class="row"> -->
										<div class="form-group">
								    	{{ Form::label('itemname', 'Swap item with', ['class'=>'col-md-4 control-label']) }}
								    	<div class="col-md-8">
									    	{{ Form::select('item', $items, null, ['class'=>'form-control']) }}
								    	</div>
								    </div>
								    
							    <!-- </div> -->
							    	<!-- <div> -->
								    	{{ HTML::link('#', 'Request now', ['class'=>'btn btn-success form-control']) }}
								    <!-- </div> -->

								{{ Form::close() }}
							</div>

						</div>
						<!-- /.panel -->
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5>About me</h5>
							</div>
							<div class="panel-body text-center">
								{{ HTML::image($user->photoURL, 'profile-pic', ['class'=>'img-circle img-responsive center-block', 'style'=>'height:200px']) }}
								<h3>{{ $user->username }}	</h3>
				    		<span class="text-muted">
					    		<p>From: {{ $user->address }}</p>
						    	<i class="fa fa-calendar"></i> Joined on {{ date('M j, 20y',strtotime($user->created_at)); }}
						    </span>
							</div>
							<div class="panel-footer">
								{{ HTML::linkRoute('users.profile', 'Contact me', $user->username, ['class'=>'btn btn-danger']) }} 
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

@stop