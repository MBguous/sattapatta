@if (Session::has('message'))
<div class="alert alert-info alert-dismissible flash">
	<button type="button" class="close" data-dismiss="alert">
		<span>&times;</span>
	</button>
    {{ Session::get('message') }}
</div>

@endif