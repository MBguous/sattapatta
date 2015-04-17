@extends ('layouts.master')

@section ('title')
{{ $swapItem->name }} - Sattapatta
@stop

@section ('styleScript')
{{ HTML::script('js/jquery.js') }}
<style>
	#nav-show > ul > li > a{
		background-color: #ffffff;
	}
	#nav-show > ul > li.active > a{
		color: #455432;
	}
	#nav-show > ul > li.active{
		color: #455432;
		border-bottom: 4px solid #3da98d;
	}
	#nav-scrollspy {
		background-color: #ffffff;
		position: fixed;
	  border: 1px solid #eeeeee;
	  top: 50px;
	  z-index: 1;
	}
</style>
<script>
	$(document).ready(function(){
		// var spinner = $('<i></i>').addClass('fa fa-circle-o-notch fa-spin fa-2x');
		// $('#image').find('.item').append(spinner);
		$("#imageCount").children().first().addClass('active');
		$("#image").children().first().addClass('active');

	});
</script>
@stop

@section ('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="row">
				
				<div class="col-md-10" id="nav-scrollspy">
					<nav id="nav-show">
				    <ul class="nav nav-pills">
				    	<li><a href="#overview">Overview</a></li>
				    	<li><a href="#description">Description</a></li>
				    	<li><a href="#wants">Wants</a></li>
				    	<li><a href="#comments">Comments</a></li>
				    </ul>
				  </nav>
				</div>
				<br>
				<br>

				@if (Session::has('message'))
				<div class="alert alert-info alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
				</div>
				@endif

				

				<div class="col-md-7" id="left-col">

					<div class="panel panel-default" id="overview">
						<div class="panel-heading">
							<h4>
								<strong>{{ $swapItem->name }}</strong>
									<!-- <div class="pull-right">
										<a href="#">
											<i class="fa fa-suitcase"></i> <small>{{ $offers->count() }} offers</small>
										</a>
									</div> -->


									<div class="pull-right dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-suitcase"></i>
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">

											<li class="dropdown-header">{{ $offers->count() }} offers</li>
											<li class="divider"></li>
											@forelse ($offers as $offer)
											<li>
												<a href="{{URL::route('items.show', [$offer->user->username, $offer->offerItems->first()->name, $offer->offerItems->first()->id])}}">
													{{ $offer->user->username.' offered '.$offer->offerItems->first()->name }}
												</a>

												@if ($swapItem->user->username == Auth::user()->username)
												{{ HTML::linkRoute('offer.response', 'Accept', ['response'=>'accepted',$offer->user_id, $offer->item_id], ['class'=>'btn btn-default btn-sm']) }}
												{{ HTML::linkRoute('offer.response', 'Reject', ['response'=>'rejected',$offer->user_id, $offer->item_id]) }}
												@endif

											</li>
											@empty
											<li class="text-muted"><a>No offers</a></li>
											@endforelse
										</ul>
									</div>

								</h4>
							</div>
							<div class="panel-body">
								

								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
									<!-- Indicators -->
									<ol class="carousel-indicators" id="imageCount" style="background:rgba(169, 169, 169, 0.51)">
										@for ($i=0; $i<$swapItem->images->count(); $i++)
										<li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
										@endfor
								    <!-- <li data-target="#carousel-example-generic" data-slide-to="1"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
								  </ol>

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" id="image" role="listbox" style="height:450px">
								  
								  	@foreach ($swapItem->images as $image)
								  	<div class="item">
								  		<div style="display:table; margin:auto">
								  			<div style="height:450px; display:table-cell; vertical-align:middle">
								  				@if($image == NULL)
							              {{ HTML::image('images/placeholder.png', 'no image', ['class'=>'img-responsive', 'style'=>'max-height:100%; margin:auto']) }}
							            @else
							              {{ HTML::image($image->imageUrl, 'item image', ['class'=>'img-responsive', 'style'=>'max-height:100%; margin:auto']) }}
							            @endif
								  				
								  			</div>
								  		</div>

								  		<div class="carousel-caption">
								  		</div>
								  	</div>
								  	@endforeach
								    <!-- <div class="item">
								      <img src="..." alt="...">
								      <div class="carousel-caption">
								        ...
								      </div>
								    </div> -->
								    
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

						<div class="panel panel-default" id="description">
							<div class="panel-heading">
								<h5><strong>Description</strong></h5>	
							</div>
							<div class="panel-body">
								{{ $swapItem->description }}
								<p>
									<strong>Price: </strong>Rs. {{ $swapItem->price }}<br>
									<strong>Posted on: </strong>{{ $swapItem->date }}<br>
									<strong>Status: </strong>{{ $swapItem->status }}<br>
									<strong>Tags:</strong>
									@forelse ($swapItem->tags as $tag)
									<span class="label label-warning">{{ $tag->name }}</span>
									@empty
									none
									@endforelse
								</p>
							</div>
						</div>

						<div class="panel panel-default" id="wants">
							<div class="panel-heading">
								<h5><strong>Wants for this item</strong></h5>	
							</div>
							<div class="panel-body">

							

							</div>
						</div>

						<hr/>
						<!-- comment static popover -->
						<blockquote id="comments">
							<i class="fa fa-comments-o"></i>
							@if($comments->count() == 0)
								No comments yet
							@elseif($comments->count() == 1)
								1 comment
							@else
								{{ $comments->count() }} comments
							@endif
						</blockquote>
						

						{{ Form::open(array('url'=>array('#', [$user->username,$swapItem->name, $swapItem->id]), 'class'=>'form-horizontal')) }}
						<!-- <div class="row"> -->
						<div class="form-group">
							@if (Auth::check())
							{{ HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'auto', 'class'=>'col-md-2 img-circle']) }}
							@else
							{{ HTML::image('/images/male.png', 'profile-pic', ['height'=>'auto', 'class'=>'col-md-2 img-circle']) }}
							@endif
							<div class="col-md-10">
								{{ Form::textArea('comment', null, ['class'=>'form-control', 'placeholder'=>'Have your say...', 'rows'=>'3']) }}
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
								<div class="popover right" id="comment" style="max-width:none; z-index:0">
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
							<div class="panel-heading">Send offer now</div>
							
							<div class="panel-body">
								{{ Form::open(array('url'=>array('post/offer'), 'class'=>'form-horizontal')) }}
								<!-- <div class="row"> -->
								<div class="form-group">
									{{ Form::label('itemname', 'Swap item with', ['class'=>'col-md-4 control-label']) }}
									{{ Form::hidden('itemid', $swapItem->id) }}
									<div class="col-md-8">

										@if (Auth::check())
											{{ Form::select('item', $itemList, null, ['class'=>'form-control']) }}
										@else
											{{-- Form::select('item', null, null, ['class'=>'form-control-static']) --}}
											<select id="disabledSelect" class="form-control" disabled>
												<option><p class="text-muted">Please login to send offer</p></option>
											</select>
											<!--  -->
										@endif
									</div>
								</div>

								<!-- </div> -->
								<!-- <div> -->
								{{ Form::submit('Offer', ['class'=>'btn btn-success btn-block']) }}
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

					<div class="col-md-12">
						<hr>
						<h3>Other items by {{$swapItem->user->username}}</h3>
						@forelse ($items as $item)
					    <div class="col-md-3 col-sm-6">
					      <div class="thumbnail">
					        <div style="position:relative; padding:0 10px">
					          <h6>
					            By {{ HTML::linkRoute('users.profile', $item->user->username, $item->user->username) }} 
					            <span class="pull-right">{{ $item->created_at->diffForHumans() }}</span>
					          </h6>
					        </div>
					        <!-- <img src="http://placehold.it/800x500" alt=""> -->
					        <div style="text-align:center">
					          <a href="{{URL::route('items.show', [$item->user->username, $item->name, $item->id])}}">
					            @if($item->images->first() == null)
					              {{ HTML::image('images/placeholder.png', null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
					            @else
					              {{ HTML::image($item->images->first()->imageUrl, null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
					            @endif
					          </a>
					          {{-- HTML::linkRoute('items.show', HTML::image($item->photoURL, null, ['height'=>'150px']), $item->user->username, ['style'=>'height:150px']) --}}

					        </div>
					        <div class="caption">
					          <p><strong>{{ $item->name }}</strong></p> 
					          <h6 data-toggle="tooltip" data-placement="bottom" title="{{ $item->description }}">
					            {{ $item->description }}
					          </h6>
					          <div style="bottom:10px">

					            @if(Auth::check())
					            @if(Auth::user()->username != $item->user->username)
					            <a href="#">
					              <i class="fa fa-thumb-tack"></i>
					            </a>
					            @else
					            <a href="{{URL::route('item.edit', [$item->user->username, $item->name, $item->id])}}">
					              <i class="fa fa-edit"></i>
					            </a>
					            @endif
					            @endif
					            
					          </div>
					        </div>

					      </div>
					    </div>
					    <!-- /.col -->

							@empty
								<p class="text-muted">No items</p>
					    @endforelse
					</div>

				</div>
			</div>
		</div>
	</div>

	

@stop

@section ('script')

<script>

	$('#myCarousel').on('slide.bs.carousel', function () {
		$('#image').find('item').empty();
	});

	$('#left-col').scrollspy({ target: '#nav-show' })

	// smooth scroll 
	$('#nav-show').find('a').click(function(){
		// $(this).parent().addClass('active');
		// $(this).parent().siblings().removeClass('active');
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
    return false;
	});

	// $('#nav-show').find('a').blur(function(){
	// 	$(this).parent().removeClass('active');
	// });

</script>

@stop