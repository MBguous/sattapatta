<br>

<div class="well well-sm">

	@if(Auth::check())
		@if ($user->id != Auth::user()->id)
			<a role="button" data-toggle="collapse" href="#review-form" aria-expanded="false" aria-controls="review-form">
				Leave a review
			</a>
		@endif
	@endif


	@for ($i=1; $i <= 5 ; $i++)
		<span class="fa fa-star{{ ($i <= $avg) ? '' : '-o'}}"></span>
	@endfor
	({{ $reviews->count() }})

	@if(Auth::check())
	<div class="collapse" id="review-form">
		<div class="well">
			 
			 	{{ Form::open(['action' => 'UserController@postReview']) }}
				
					<div class="form-group">
						{{ Form::textarea('comment', null, ['placeholder'=>'Enter your review...', 'class'=>'form-control', 'rows'=>2]) }}
					</div>

					<div class="form-group">
						{{ Form::select('rating', [
							'1' => '&#xf005;',
							'2' => '&#xf005; &#xf005;',
							'3' => '&#xf005; &#xf005; &#xf005;',
							'4' => '&#xf005; &#xf005; &#xf005; &#xf005;',
							'5' => '&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;',
						], null, ['class' => 'form-control fa']) }}
					</div>

					{{ Form::hidden('reviewee_id', $user->id) }}
					{{ Form::submit('Save review', ['class'=>'btn btn-sm btn-info']) }}

				{{ Form::close() }}

		</div>
	</div>
	@endif

</div>

<div>

	@forelse ($reviews as $review)

		@for ($i=1; $i <= 5 ; $i++)
			<span class="fa fa-star{{ ($i <= $review->rating) ? '' : '-o'}}"></span>
		@endfor

		&nbsp;
		<strong>{{ $review->user->username }}</strong> 

		<span class="pull-right">{{ $review->created_at->diffForHumans() }}</span> 

		<p>{{{$review->comment}}}</p>

	@empty
		<p class="text-muted">No reviews yet</p>

	@endforelse

</div>