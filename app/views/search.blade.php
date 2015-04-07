@extends ('layouts.master')

@section ('content')

	<div class="container">
		<div class="row">
			<!-- <div class="form-group"> -->
				{{ Form::text('keywords', null, ['class'=>'form-control', 'id'=>'ajax-search', 'placeholder'=>'Make a quick search .......', 'onkeydown'=>'down()', 'onkeyup'=>'up()']) }}
			<!-- </div> -->
			
			<h4><strong>Search results</strong></h4>
				<div id="search-results">
					@include ('partials.showItems')
				</div>
			</div>
		</div>
	</div>

@stop