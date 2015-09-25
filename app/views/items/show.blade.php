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
		top: 65px;
		z-index: 100;
	}
	.dropdown-menu > li > a{
		display: table-cell;
	}
</style>
<script>
	$(window).load(function(){
		// var spinner = $('<i></i>').addClass('fa fa-circle-o-notch fa-spin fa-2x');
		// $('#image').find('.item').append(spinner);
		$("#imageCount").children().first().addClass('active');
		$("#image").children().first().addClass('active');

	});
</script>
@stop

@section ('content')

<div class="row">

	<div class="col-md-7">

		<div class="panel panel-default">
			<div class="panel-heading">
				{{ $swapItem->name }}

				<div class="pull-right dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration:none">
						<i class="fa fa-briefcase fa-lg"></i>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">

						<li class="dropdown-header">{{ $offers->count() }} offers</li>
						<li class="divider"></li>

						@if (Auth::check() and $swapItem->user->username == Auth::user()->username)
						@forelse ($offers as $offer)
						<li>
							<a href="{{URL::route('items.show', [$offer->user->username, $offer->offerItems->first()->name, $offer->offerItems->first()->id])}}">
								{{ $offer->user->username.' offered '.$offer->offerItems->first()->name }}
							</a>

							{{ HTML::linkRoute('offer.response', 'Accept', ['response'=>'accepted',$offer->user_id, $offer->item_id], ['class'=>'btn btn-default btn-sm', 'style'=>'display:table-cell']) }}
							{{ HTML::linkRoute('offer.response', 'Reject', ['response'=>'rejected',$offer->user_id, $offer->item_id]) }}

						</li>
						@empty
						<li class="text-muted"><a>No offers</a></li>
						@endforelse
						@endif
					</ul>
				</div>
				{{-- <span> --}}
					<a href="#" class="btn btn-sm btn-o disabled">
						<i class="fa fa-eye"></i>	{{ $swapItem->view_count }} views
					</a>
					<a href="#" class="btn btn-sm btn-o disabled">
						<i class="fa fa-comment"></i> {{ $comments->count() }} comments
					</a>
				{{-- </span> --}}
				@if(Auth::check())
				@if(Auth::user()->username == $swapItem->user->username)
				<span>
					<a href="{{URL::route('item.edit', [$swapItem->user->username, $swapItem->name, $swapItem->id])}}">
						<i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Click to edit this item"></i>
					</a>
				</span>
				@endif
				@endif
			</div>

			<div class="panel-body">

				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
					<!-- Indicators -->
					<ol class="carousel-indicators" id="imageCount" style="background:rgba(169, 169, 169, 0.51)">
						@for ($i=0; $i<$swapItem->images->count(); $i++)
						<li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
						@endfor
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
				<i class="fa fa-newspaper-o fa-lg"></i> &nbsp;Description
			</div>
			<div class="panel-body">
				<p>
					{{ $swapItem->description }}
				</p>
				<p>
					<strong>Price: </strong>Rs. {{ $swapItem->price }}<br>
					<strong>Posted on: </strong>{{ $swapItem->date }}<br>
					<strong>Status: </strong>{{ $swapItem->status }}<br>
					<span class="fa fa-tags"></span><strong> Tags:</strong>
					@forelse ($swapItem->tags as $tag)
					<span class="label label-warning">{{ $tag->name }}</span>
					@empty
					none
					@endforelse
				</p>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-gift fa-lg"></i>&nbsp;Wants for this item	
			</div>
			<div class="panel-body">							
			</div>
		</div>

		<hr/>
		<!-- comment static popover -->
		<blockquote>
			<i class="fa fa-comments-o"></i>
			{{-- <i class="icon icon-MessageRight" style="font-size:xx-large"></i> --}}
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
				{{ Form::submit('Post', ['class'=>'btn btn-sm btn-default col-md-2 col-md-offset-10']) }}
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
			<div class="panel-heading"><i class="fa fa-send-o fa-lg"></i>&nbsp;Send offer now</div>

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
				{{ Form::submit('Send Offer', ['class'=>'btn btn-sm btn-info pull-right']) }}
				<!-- </div> -->

				{{ Form::close() }}
			</div>

		</div>
		<!-- /.panel -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-info fa-lg"></i>&nbsp;Owner info

				<span class="pull-right">
					@for ($i=1; $i <= 5 ; $i++)
						<span class="fa fa-star{{ ($i <= $avg) ? '' : '-o'}}"></span>
					@endfor
					({{ $reviewsCount }})
				</span>
				

			</div>
			<div class="panel-body text-center">
				{{ HTML::image($user->photoURL, 'profile-pic', ['class'=>'img-circle img-responsive center-block', 'style'=>'height:200px']) }}
				<h5>
					{{ $user->username }}
					<span class="label {{ $onlineStatus == true ? 'label-success' : 'label-default' }}">
						{{ $onlineStatus == true ? 'Online' : 'Offline' }}
					</span>
				</h5>
				<div class="text-muted">
					<p>From: {{ $user->address }}</p>
					<i class="fa fa-calendar"></i> Joined on {{ date('M j, 20y',strtotime($user->created_at)); }}
				</div>
	
				{{ HTML::linkRoute('users.profile', 'My Profile', $user->username, ['class'=>'btn btn-sm btn-success pull-right']) }}

			</div>
			{{-- <div class="panel-footer"> --}}
				
				
			{{-- </div> --}}
		</div>

	</div>

	<div class="col-md-12">
		<hr>
		<h5>Other items by {{$swapItem->user->username}}</h5>
		@include ('partials.showItems')
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