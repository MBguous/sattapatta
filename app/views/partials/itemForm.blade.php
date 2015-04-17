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
    {{ Form::textarea('description', null, ['class'=>'form-control', 'data-provide'=>'markdown', 'data-iconlibrary'=>'fa']) }}
    <div class="text-danger" id="description_error">{{ $errors->first('description', ':message') }}</div>
  </div>
</div>

<div class="form-group">
  {{ Form::label('price', 'Price', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-6">
    <div class="input-group">
      <span class="input-group-addon">Rs.</span>
    {{ Form::text('price', null, ['class'=>'form-control']) }}
    <div class="text-danger" id="price_error">{{ $errors->first('price', ':message') }}</div>
    </div>
  </div>
</div>

<div class="form-group">
  {{ Form::label('photoURL', 'Choose images', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-10">
  {{ Form::file('imageUrl[]', ['id'=>'input-id', 'class'=>'file', 'data-preview-file-type'=>'text', 'data-show-upload'=>false,'multiple'=>true, 'accept'=>'image/*']) }}
    <div class="text-danger help-block" id="photoURL_error">{{ $errors->first('imageUrl', ':message') }}</div>
  </div>
</div>

<!-- jasny-bootstrap file input -->
<!-- <div class="form-group">
  {{ Form::label('photoURL', 'Choose an image', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-6">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
      <div>
        <span class="btn btn-default btn-file">
          <span class="fileinput-new">Select image</span>
          <span class="fileinput-exists">Change</span>
          {{ Form::file('images[]', ['id'=>'input-id', 'class'=>'file', 'data-preview-file-type'=>'text', 'multiple'=>true]) }}
        </span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
      </div>
    </div>
  </div>
</div> -->


<div class="form-group">
  {{ Form::label('tag', 'Tags', ['class'=>'col-md-2 control-label']) }}
  <div class="col-md-6">
    <!-- <select name="tag" data-role="tagsinput" class="form-control" placeholder="Input tags separated by commas"></select> -->
    {{ Form::text('tag', null, ['class'=>'form-control', 'placeholder'=>'Input tags separated by commas', 'data-role'=>'tagsinput']) }}
    <div class="text-danger" id="tag_error">{{ $errors->first('tag', ':message') }}</div>
  </div>
</div>

