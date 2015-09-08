@if (Session::has('message'))
<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert">
		<span>&times;</span>
	</button>
    {{ Session::get('message') }}
</div>

@endif