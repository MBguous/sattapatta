@extends ('layouts.master')

@section ('styleScript')
{{ HTML::style('css/bootstrap-markdown.min.css') }}
{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap-markdown.js') }}
@stop

@section ('content')

<div class="row">
	
	@include ('partials.sidebar')

	<div class="col-md-8 well">

		{{ Form::model($item, array('url'=>array('update/item', $item->id), 'class'=>'form-horizontal', 'files'=>true)) }}
		
		@include ('partials.itemForm')
		@include ('partials.items.editImage')

		<div class="col-md-offset-2">
			<button type="reset" class="btn btn-sm btn-default">Clear</button>
			<button type="submit" class="btn btn-sm btn-primary">Save changes</button>
		</div>

		{{ Form::close() }}

	</div>

</div>

@stop

@section ('script')

	<script>
		var root = '{{ url("/") }}';

		$("#edit-image").fileinput({
			previewFileType: "image",
			browseClass: "btn btn-sm btn-o",
			browseLabel: " Pick Image",
			browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
			removeClass: "btn btn-sm btn-o",
			removeLabel: " Remove",
			removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
			uploadClass: "btn btn-sm btn-o",
			uploadLabel: " Upload",
			uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
			initialPreview: [
				@foreach($item->imageUrl as $url)
					'<img src="'+root+'/{{$url}}" class="file-preview-image">',
				@endforeach
				
				// '<img src="'+root+'{{$url}}" class="file-preview-image">'
			],
			overwriteInitial: true,
		});

	</script>

@stop