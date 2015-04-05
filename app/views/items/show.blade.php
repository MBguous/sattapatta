@extends ('layouts.master')

@section ('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="row">

				@if (Session::has('message'))
		      <div class="alert alert-info alert-dismissible" role="alert">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
		      </div>
		    @endif

					<div class="col-md-7">

						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>
									<strong>{{ $swapItem->name }}</strong><small class="pull-right">
																													<a href='#'>{{ $requestCount }} requests</a>
																												</small>
								</h2>
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
								<p>
									<strong>Price: </strong>Rs. {{ $swapItem->price }}<br>
									<strong>Posted on: </strong>{{ $swapItem->date }}<br>
									<strong>Status: </strong>{{ $swapItem->status }}
								</p>
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

						<hr/>
						<!-- comment static popover -->
						@if($comments->count() == 0)
							<blockquote>No comments yet</blockquote>
						@elseif($comments->count() == 1)
							<blockquote>1 comment</blockquote>
						@else
							<blockquote>{{ $comments->count() }} comments</blockquote>
						@endif

						{{ Form::open(array('url'=>array('#', [$user->username,$swapItem->name, $swapItem->id]), 'class'=>'form-horizontal')) }}
							<!-- <div class="row"> -->
								<div class="form-group">
						    	{{ HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'auto', 'class'=>'col-md-2 img-circle']) }}
						    	<div class="col-md-10">
							    	{{ Form::textArea('comment', null, ['class'=>'form-control', 'placeholder'=>'Have your say...']) }}
							    	{{-- Form::hidden('itemid', $swapItem->id) --}}
							    	<br/>
								    {{ Form::submit('Post', ['class'=>'btn btn-default col-md-2 col-md-offset-10']) }}
						    	</div>
						    </div>

						{{ Form::close() }}

							@forelse($comments as $comment)
							<div class="row" style="margin-bottom:5px">
							{{ HTML::image($comment->user->photoURL, 'profile-pic', ['height'=>'auto', 'class'=>'col-md-2 img-circle img-responsive']) }}
							<div class="popover-example col-md-10">
								<div class="popover right" id="comment" style="max-width:none">
						      <div class="arrow"></div>
						      <h3 class="popover-title">
						      	{{ $comment->user->username }}
						      	<span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
						      </h3>
						      <div class="popover-content">
						        <p>{{ $comment->content }}</p>
						      </div>
						    </div>
							</div>
							</div>

							@empty
							<p class="text-muted"><em>Be the first to comment.</em></p>
							@endforelse
						
						
						<!-- /comment static popover-->

					</div>
					<div class="col-md-5">
						<div class="panel panel-default">
							<div class="panel-heading">Send request now</div>
							
							<div class="panel-body">
								{{ Form::open(array('url'=>array('post/request'), 'class'=>'form-horizontal')) }}
									<!-- <div class="row"> -->
										<div class="form-group">
								    	{{ Form::label('itemname', 'Swap item with', ['class'=>'col-md-4 control-label']) }}
								    	{{ Form::hidden('itemid', $swapItem->id) }}
								    	<div class="col-md-8">
									    	{{ Form::select('item', $items, null, ['class'=>'form-control']) }}
								    	</div>
								    </div>
								    
							    <!-- </div> -->
							    	<!-- <div> -->
								    	{{ Form::submit('Request now', ['class'=>'btn btn-success form-control']) }}
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