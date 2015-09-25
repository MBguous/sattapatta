<div class="form-group">
	{{ Form::label('imageUrl', 'Choose images', ['class'=>'col-md-2 control-label']) }}
	<div class="col-md-10">

		{{ Form::file('imageUrl[]', ['class'=>'input-image', 'data-show-upload'=>false, 'accept'=>'image/*', 'multiple'=>true]) }}

		<div class="text-danger help-block" id="photoURL_error">{{ $errors->first('imageUrl', ':message') }}</div>
	</div>
</div>