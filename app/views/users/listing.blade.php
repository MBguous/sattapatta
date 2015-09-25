@extends ('layouts.master')

@section ('content')

<div class="row">
	
	@include('partials.sidebar')

	
	<div class="col-md-10">
		<h5>My Listings</h5>
		<div class="row">
			@include ('partials.showItems')
		</div>

	</div>

</div>

@stop