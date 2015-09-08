<div class="form-group">
  {{ Form::label('name', 'Item name', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-8">
    {{ Form::text('name', null, ['class'=>'form-control']) }}
    <div class="text-danger" id="name_error">{{ $errors->first('name', ':message') }}</div>
  </div>
</div>

<div class="form-group">
  {{ Form::label('description', 'Description', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-8">
    {{ Form::textarea('description', null, ['class'=>'form-control', 'rows'=>5, 'data-provide'=>'markdown', 'data-iconlibrary'=>'fa']) }}
    <div class="text-danger" id="description_error">{{ $errors->first('description', ':message') }}</div>
  </div>
</div>

<div class="form-group">
  {{ Form::label('price', 'Price', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">Rs.</span>
    {{ Form::text('price', null, ['class'=>'form-control']) }}
    </div>
    <div class="text-danger" id="price_error">{{ $errors->first('price', ':message') }}</div>
  </div>
</div>

<div class="form-group">
  {{ Form::label('imageUrl', 'Choose images', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-8">

  {{ Form::file('imageUrl[]', ['id'=>'input-id', 'class'=>'file-loading','multiple'=>true]) }}
 
    <div class="text-danger help-block" id="photoURL_error">{{ $errors->first('imageUrl', ':message') }}</div>
  </div>
</div>

<div class="form-group">
  {{ Form::label('tags', 'Tags', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-8">
    
    {{ Form::select('tags[]', $tags, null, ['class'=>'form-control', 'multiple', 'placeholder'=>'Input tags and hit Enter', 'data-role'=>'tagsinput']) }}
    <div class="text-danger" id="tag_error">{{ $errors->first('tag', ':message') }}</div>
  </div>
</div>
