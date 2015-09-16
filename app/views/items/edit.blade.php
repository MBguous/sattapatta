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

	          <div class="well">

	            {{ Form::model($item, array('url'=>array('update/item', $item->id), 'class'=>'form-horizontal', 'files'=>true)) }}
	              @include ('partials.itemForm')
	              	<div class="col-md-offset-2">
							<button type="reset" class="btn btn-sm btn-default">Clear</button>
							<button type="submit" class="btn btn-sm btn-primary">Save changes</button>
						</div>
	            {{ Form::close() }}
	          </div>

    </div>

@stop

@stop