@extends ('layouts.master')

@section ('styleScript')
{{ HTML::style('css/bootstrap-markdown.min.css') }}
{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap-markdown.js') }}
{{-- HTML::script('js/to-markdown.js') }}
{{ HTML::script('js/markdown.js') --}}
@endsection('styleScript')

@section ('content')

		<div class="row">

				@if (Session::has('message'))
		      <div class="alert alert-info alert-dismissible" role="alert">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
		      </div>
		    @endif

	          <div class="well">

	            {{-- Form::model(array('route'=>'post.users.post', 'class'=>'form-horizontal', 'files'=>true)) --}}
	            {{ Form::model($item, array('url'=>array('update/item', $item->id), 'class'=>'form-horizontal', 'files'=>true)) }}
	              @include ('partials.itemForm')
	              	<div class="col-md-offset-2">
						<button type="reset" class="btn btn-default">Clear</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
	            {{ Form::close() }}
	          </div>

    </div>

@stop

@stop