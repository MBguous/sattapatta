@extends ('layouts.master')

@section ('content')

<div class="row">
	<div class="col-md-12">
		<h5>Search items</h5>
		<div class="form-group">
		{{ Form::text('keywords', null, ['class'=>'form-control', 'id'=>'quick-search', 'placeholder'=>'Make a quick search .......', 'onkeydown'=>'down()', 'onkeyup'=>'up()']) }}
		</div>
	
		<h5>Results</h5>
		<div id="search-results">
			@include ('partials.showItems')
		</div>
	</div>
</div>

@stop