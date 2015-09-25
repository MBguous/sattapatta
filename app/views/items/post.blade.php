@extends ('layouts.master')

@section ('styleScript')
{{ HTML::style('css/bootstrap-markdown.min.css') }}
{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap-markdown.js') }}
@stop

@section ('content')

<div class="row">
	
	@include('partials.sidebar')

	<div class="col-md-8">

		{{ Form::open(array('route'=>'post.users.post', 'class'=>'form-horizontal', 'id'=>'item-form', 'files'=>true)) }}
		
		@include ('partials.itemForm')
		@include ('partials.items.postImage')

		<div class="col-md-offset-2">
			<button type="reset" class="btn btn-sm btn-default">Clear</button>
			<button type="submit" class="btn btn-sm btn-primary">Post item</button>
		</div>
		{{ Form::close() }}
		
	</div>

</div>

@stop